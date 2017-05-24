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
	
	//CHECK PASSWORD

	
	
	//CHECK UNIQUENESS OF THA VALUES
	$stmt = $conn->prepare("SELECT * FROM users WHERE username = ?");
	$stmt->bind_param("s", $username);
	$stmt->execute();
	$stmt->store_result();
	
	if ($result= $stmt) 
	{
		$rowcount_uname = $result->num_rows;
	}
	
	if ($rowcount_uname === 0) 
	{
		echo 'No account matw';
		
		header("Location: ../index.php?page=login&err=noacc");
		die();
	}
	else
	{
		$data = mysqli_query($conn, "SELECT password FROM users WHERE username = '$username'", MYSQLI_STORE_RESULT);
		$hash = mysqli_fetch_array($data, MYSQLI_ASSOC);
		$pass_check = password_verify($passw, $hash['password']);
		
		if($pass_check != 1){
			header("Location: ../index.php?page=login&err=noacc");
			die();	
		}else{
			$_SESSION['loggedin'] = $username;
			header("Location: ../index.php?page=index&msg=loginsuccess");
			die();
		}
	}
?>