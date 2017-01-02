<?php

	include 'system/basic_func.php';
	include 'system/config.php';
	
	if ($maintenance == TRUE){
		
		echo 'Deze website is bezig met wat verbouwingen, kom later terug';
		
	} elseif ($maintenance == FALSE) {
		
		getPage();
		
	}
	
?>
