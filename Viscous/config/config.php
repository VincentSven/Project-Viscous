<?php
	//This is the config file
	
	//TECHNICAL SETTINGS
	$maintenance 				= FALSE;
	

	
	//Database variables
	$dbserver					= 'localhost';
	$dbusername					= 'root';
	$dbpassword					= '';
	$db							= 'solalands';

	//DATABASE CONNECTION
	$conn						= new mysqli($dbserver, $dbusername, $dbpassword, $db);
	
	//DATABASE CONNECTION CHECK
	if ($conn->connect_error){
		die('Database connection lost!' . $conn->connect_error);
	}else{
		$query = 'SELECT _name, _separator, _description, _maintenance FROM configuration';
		$result = mysqli_query($conn, $query);
		$row = mysqli_fetch_assoc($result);
		
		//site definition variables
		$pretitle 					= $row['_name'];
		$seperator 					= $row['_separator'];
		$posttitle 					= $row['_description'];
		$title 						= $pretitle . $seperator . $posttitle;
		
		//TECHNICAL SETTINGS
		$maintenance 				= $row['_maintenance'];
	};

?>
