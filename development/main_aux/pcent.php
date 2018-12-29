<?php
	$p = @file_get_contents('pcent');
	if($p === false) $p = 'x';
	echo $p;
?>
