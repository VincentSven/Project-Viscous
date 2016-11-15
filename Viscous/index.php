<?php

	include 'Functions/basic_func.php';
	include 'config/config.php';
	
if ($maintenance == TRUE){
	echo 'Deze website is bezig met wat verbouwingen, kom later terug';
} elseif ($maintenance == FALSE) {
	getPage();
}
?>
