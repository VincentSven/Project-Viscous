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
	
	//PREPARING STATEMENTS
	$stmt_ins = $conn->prepare("INSERT INTO users (username, password, email) VALUES (?, ?, ?)");
	$stmt_ins->bind_param("sss", $username, $password, $mail);


	
	//ALLOCATIONS
	$mail		=	$_POST['mail'];
	$username	=	$_POST['username'];
	$passw		=	$_POST['passw'];
	
	//ENCRYPT PASSWORD
	$password = password_hash($passw, PASSWORD_DEFAULT);
	
	//TEST FOR HACKING
	
	//CHECK UNIQUENESS OF THA VALUES
	$stmt_uname = $conn->prepare("SELECT username FROM users WHERE username = ?");
	$stmt_uname->bind_param("s", $username);
	$stmt_uname->execute();
	$stmt_uname->store_result();
	if ($result= $stmt_uname) 
	{
		$rowcount_uname = $result->num_rows;
	}

	$stmt_mail = $conn->prepare("SELECT email FROM users WHERE email = ?");
	$stmt_mail->bind_param("s", $mail);
	$stmt_mail->execute();
	$stmt_mail->store_result();
	if ($result_e = $stmt_mail) {
		$rowcount_mail = $result_e->num_rows;
	}
	
	if ($rowcount_uname >= 1) 
	{
		echo 'Deze gebruikersnaam is al in gebruikersnaam is al in gebruikersnaam is al in gerbuik.';
		header("Location: ../index.php?page=registration&err=uname");
		die();
	}
	elseif($rowcount_mail >= 1)
	{
		echo 'Deze E-mail is al in gebruik.';
		header("Location: ../index.php?page=registration&err=mail");
		die();
	}
	else
	{
			
			//EXECUTE QUERY
			if ($stmt_ins->execute()	===	TRUE) {
				echo 'Account succesvol toegevoegd aan de database!';
				$_SESSION['loggedin'] = $username;
				
				header("Location: ../index.php?msg=registersuccess");
				die();
			} else {
				echo 'ERROR</br>'.$conn->error;
			}
	}
	
	$stmt_uname->close();
	$stmt_mail->close();
	$stmt_ins->close();
	$conn->close();
?>