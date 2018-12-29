<?php
require_once('iccheck.php');
$dest_name = rawurldecode($_POST['dest_name']);
file_put_contents('../mpc_short_files/dyna_name.php', $dest_name);
header('Content-disposition: attachment; filename="'.$dest_name.'.dyn"');
header('Content-type: application/octet-stream');
readfile('../mpc_short_files/dyna.db');
?>
