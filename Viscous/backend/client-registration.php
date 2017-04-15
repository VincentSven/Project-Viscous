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
	$stmt_ins->bind_param("sss", $username, $password, $mail);
	
	$stmt_select_uname = $conn->prepare("SELECT username FROM users WHERE username = ?");
	$stmt_select_uname->bind_param("s", $username);
	
	$stmt_select_mail = $conn->prepare("SELECT email FROM users WHERE email = ?");
	$stmt_select_mail->bind_param("s", $mail);
	
	//ALLOCATIONS
	$mail		=	$_POST['mail'];
	$username	=	$_POST['username'];
	$passw		=	$_POST['passw'];
	
	//ENCRYPT PASSWORD
	$password = md5($passw);
	
	//TEST FOR HACKING
	
	//CHECK UNIQUENESS OF THA VALUES
	$stmt_select_uname->execute();
	if ($result= mysqli_query($conn,$stmt_select_uname)) 
	{
		$rowcount_uname = $result->num_rows;
	}
	
	$stmt_select_mail->execute();
	if ($result_e= $stmt_select_mail) {
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
			$stmt_select_mail->close();
			$stmt_select_uname->close();
			
			//EXECUTE QUERY
			if ($stmt_ins->execute()	===	TRUE) {
				echo 'Account succesvol toegevoegd aan de database!';
			} else {
				$stmt_ins->store_result();
				$stmt_ins->bind_result($username, $password, $email);
				$stmt_ins->fetch();
				echo 'ERROR'.$users.$password.$email.'</br>'.$conn->error;
			}
	}
	
	$stmt_ins->close();
	$conn->close();
?>