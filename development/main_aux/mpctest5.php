<?php
/********************************************
 *
 * Inspect server Legacy/Advanced capability
 *   https://masspagecreator.com
 *     Larry Sherman 3/10/2015
 *       (updated 10/10/2016)
 *
 *******************************************/
$cp = (isset($_GET['cp']))? $_GET['cp'] : 0;

$dir = __DIR__ . '/mpctest5__'; // subdir for all support files
if(! is_dir($dir) ) mkdir($dir, 0777, true);
// get pclzip class
if(! file_exists("$dir/pclzip.lib.php") )
{
    file_put_contents( "$dir/pclzip.lib.php", my_file_get_contents('https://masspagecreator.com/ck/pclzip/pclzip.lib.php.txt') );
}
require_once "$dir/pclzip.lib.php";

// (1) Need PHP 5.2+ (5.3+ for Advanced Mpc)
function ver_test() {
    list($major,$minor,$x) = explode('.', phpversion());
    return "$major.$minor";
}

// (2) Need SQLite3 for Advanced Mpc
function sql_test() {
    return (class_exists('SQLite3', false))? 1 : 0;
}

// (3) Proc_open
function bin_test()
{
    global $dir;

    if( (! function_exists('proc_open')) || (! function_exists('proc_close')) )
    {
        file_put_contents('error_log', 'sbt: Disabled proc_open or proc_close', FILE_APPEND);
    }

    if(strtolower(substr(php_uname('s'), 0, 3)) === 'win')
    {
        // windows
        $exe = "cd " . my_escapeshellarg(getcwd() . '\\mpctest5__') . " && " . "spintax-win-32.exe";
        loadBinaries('win32');
    }
    else
    {
        // linux
        $exe = "$dir/text.exe";
        if(strstr(php_uname('m'), 'x86_64') !== FALSE)
        {
            loadBinaries('linux64');
            $exe = "$dir/spintax-linux-64";
        }
        else
        {
            loadBinaries('linux32');
            $exe = "$dir/spintax-linux-32";
        }
        chmod($exe, 0755);
    }

    // perform test
    try {
        $pipes = array();
        $desc = array(
            0 => array('pipe', 'r'),
            1 => array('pipe', 'w')
        );

        $p = @proc_open($exe, $desc, $pipes);
        if(!is_resource($p))
        {
            file_put_contents('error_log', 'sbt: Unable to fork process', FILE_APPEND);
        }
        fclose($pipes[0]);
        $retval = stream_get_contents($pipes[1]);
        fclose($pipes[1]);
        proc_close($p);
    }
    catch (Exception $e) {
        file_put_contents('error_log', 'sbt: '.$e->getMessage(), FILE_APPEND);
        return 0;
    }
    $ret = trim($retval);
    if($ret != 'ok')
    {
        file_put_contents('error_log', 'sbt: Wrong string: '."$ret\n" , FILE_APPEND);
        return 0;
    }
    return 1;
}

// load binaries
function loadBinaries($os)
{
    global $dir;
    file_put_contents("$dir/bin.zip", my_file_get_contents('http://masspagecreator.com/ck/sbtest/'.$os.'.zip') );
    $zip = new PclZip("$dir/bin.zip");
    $zip->extract(PCLZIP_OPT_PATH, "$dir", PCLZIP_OPT_REPLACE_NEWER);
}

function my_file_get_contents($from)
{
    $url = str_replace(' ','%20',$from);
    $ch = curl_init($url);
    curl_setopt($ch, CURLOPT_HEADER, 0);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
    $z = curl_exec($ch);
    $err = curl_errno($ch); // 60 ?
    curl_close($ch);
    if($z) return $z;
    return false; // read error
}

function my_escapeshellarg($str)
{
    return '"'.str_replace("'", "'\\''", $str).'"';
}

// delete binaries subdir
function deltree($dir)
{
    _deltree($dir);
}
function _deltree($dir)
{
    foreach(scandir($dir) as $file)
    {
        if ('.' === $file || '..' === $file) continue;
        if (is_dir("$dir/$file")) _deltree("$dir/$file");
        else unlink("$dir/$file");
    }
    rmdir($dir);
}


////////
//
// perform all tests
//
$ar_out = array(
    'cap' => 'advanced',
    'ver' => ver_test(), // x.x
    'sql' => sql_test(), // 0,1
    'bin' => bin_test()  // 0,1
);

// build result json
if( ($ar_out['sql'] == 0) || ($ar_out['bin'] == 0) || ($ar_out['ver'] == 5.2) ) $ar_out['cap'] = 'legacy';
if( $ar_out['ver'] < 5.2 ) $ar_out['cap'] = 'none';
$jstr = json_encode($ar_out);

// clean up
deltree($dir);
if($cp == 0) unlink(__FILE__);

// report back
echo json_encode($ar_out);
