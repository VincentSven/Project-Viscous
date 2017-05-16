<?php
	session_start();
	require_once('system/include.php'); 
	if ($maintenance == 1){
		echo 'Deze website is bezig met wat verbouwingen, kom later terug';
	} elseif ($maintenance == 0) {
		getPage();	
	}
?>