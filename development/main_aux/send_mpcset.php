<?php
require_once('iccheck.php');
$dest_name = rawurldecode($_POST['dest_name']);
header('Content-disposition: attachment; filename="'.$dest_name.'_mpcset.zip"');
header('Content-type: application/octet-stream');
readfile('mpcset.zip');
unlink('mpcset.zip');
?>
