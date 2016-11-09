<html>
	<head>
		<title>Login page</title>
		<link href="styles/divstyle.css" type="text/css" rel="stylesheet"/>
		<link href="styles/stylesheet.css" type="text/css" rel="stylesheet"/>
		<link href="styles/navbar.css" type="text/css" rel="stylesheet"/>
		<script src="js/sha512.js"></script>
		<script src="js/form.js"></script>
	</head>
	<body>
		<?php
		if (isset($_GET['nouser'])) {
			echo 'No user with that name';
		}
		if (isset($_GET['locked'])) {
			echo 'Your account is locked';
		}
		if (isset($_GET['password'])) {
			echo 'Incorrect password';
		}
		?>
		
		<form action="php/login/process_login.php" method="post" name="login_form">
			<input type="text" name="email" />
			<input type="password" name="password" id="password"/>
			<input type="button" value="Login"  onclick="formhash(this.form, this.form.password);" /> 
		</form>
	</body>
</html>