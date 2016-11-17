<?php
	//This is the config file
	
	//TECHNICAL SETTINGS
	$maintenance 				= FALSE;
	

	
	//Database variables
	$dbserver					= "localhost";
	$dbusername					= "root";
	$dbpassword					= "";
	$db							= "solalands";

	//DATABASE CONNECTION
	$conn						= new mysqli($dbserver, $dbusername, $dbpassword, $db);
	
	//DATABASE CONNECTION CHECK
	if ($conn->connect_error){
		die('Database connection lost!' . $conn->connect_error);
	}else{
		$query = "SELECT `name`, `separator`, `discription`, `maintenance` FROM configuration";
		$result = mysqli_query($conn, $query);
		$row = mysqli_fetch_assoc($result);
		
		//site definition variables
		$pretitle 					= $row['name'];
		$seperator 					= $row['separator'];
		$posttitle 					= $row['discription'];
		$title 						= $pretitle . $seperator . $posttitle;
		
		//TECHNICAL SETTINGS
		$maintenance 				= $row['maintenance'];
	};

?>
