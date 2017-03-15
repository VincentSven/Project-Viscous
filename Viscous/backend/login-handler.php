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
	$sql_uname 	= "SELECT * FROM users WHERE username = '$username' AND password = '$password'";
	if ($result=mysqli_query($conn,$sql_uname)) 
	{
		$rowcount_uname = $result->num_rows;
	}
	
	if ($rowcount_uname >= 1) 
	{
		echo 'welcome to gfazeclan mata3e </br>'; 
		$_SESSION['loggedin'] = $username;
	}
	else
	{
		echo 'No account matw';
	}
	
	echo $_SESSION['loggedin'];
?>