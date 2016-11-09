<?php
	//This is the config file
	
	//site status variables
	$maintenance 				= FALSE;
	
	//site definition variables
	$pretitle 					= 'Sola';
	$seperator 					= ' - ';
	$posttitle 					= 'Lands';
	$title 						= $pretitle . $seperator . $posttitle;
	
	//Database variables
	$dbserver					= 'localhost';
	$dbusername					= 'root';
	$dbpassword					= '';
	$db							= 'solalands';

	//DATABASE CONNECTION
	$conn						= new mysqli($dbserver, $dbusername, $dbpassword);
	
	//DATABASE CONNECTION CHECK
	if ($conn->connect_error){
		die('Database connection lost!' . $conn->connect_error);
	}else{
		echo 'Succesvol geconnect!';
	};

?>
