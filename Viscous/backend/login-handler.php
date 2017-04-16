<?php
	
	session_start();
	
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
	}
	
	
	//ALLOCATIONS
	$username	=	$_POST['username'];
	$passw		=	$_POST['passw'];
	
	//ENCRYPT PASSWORD
	$password = md5($passw);
	
	//CHECK UNIQUENESS OF THA VALUES
	$stmt = $conn->prepare("SELECT * FROM users WHERE username = ? AND password = ?");
	$stmt->bind_param("ss", $username, $password);
	$stmt->execute();
	$stmt->store_result();
	if ($result= $stmt) 
	{
		$rowcount_uname = $result->num_rows;
	}
	
	if ($rowcount_uname >= 1) 
	{
		echo 'welcome to gfazeclan mata3e </br>'; 
		$_SESSION['loggedin'] = $username;
		
		header("Location: ../index.php");
		die();
	}
	else
	{
		echo 'No account matw';
	}
?>