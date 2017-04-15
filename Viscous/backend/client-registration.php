<?php
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
	$stmt_ins->bind_param("sss", $username, $password, $email);
	
	
	//ALLOCATIONS
	$mail		=	$_POST['mail'];
	$username	=	$_POST['username'];
	$passw		=	$_POST['passw'];
	
	//ENCRYPT PASSWORD
	$password = md5($passw);
	
	//TEST FOR HACKING
	
	//CHECK UNIQUENESS OF THA VALUES
	$sql_uname 	= "SELECT username FROM users WHERE username = '$username'";
	if ($result=mysqli_query($conn,$sql_uname)) 
	{
		$rowcount_uname = $result->num_rows;
	}
	
	$sql_uname 	= "SELECT email FROM users WHERE email = '$mail'";	
	if ($result_e=mysqli_query($conn, $sql_uname)) {
		$rowcount_mail = $result_e->num_rows;
	}
	
	if ($rowcount_uname >= 1) 
	{
		echo 'Dit accountnaam is al in gebruik.';
	}
	elseif($rowcount_mail >= 1)
	{
		echo 'Deze E-mail is al in gebruik.';		
	}
	else
	{
			
			//EXECUTE QUERY
			if ($stmt_ins->execute()	===	TRUE) {
				echo 'Account succesvol toegevoegd aan de database!';
			} else {
				echo 'ERROR'.$stmt_ins.'</br>'.$conn->error;
			}
	}
	
	$stmt_ins->close();
	$conn->close();
?>