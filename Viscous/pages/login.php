<?php
	global $title;
?>
<html>
	<head>
		<link href="styles/divstyle.css" type="text/css" rel="stylesheet"/>
		<link href="styles/stylesheet.css" type="text/css" rel="stylesheet"/>
		<link href="styles/navbar.css" type="text/css" rel="stylesheet"/>
		<link href="styles/classes.css" type="text/css" rel="stylesheet"/>
		<title><?php echo $title;?></title>
	</head>
	<body>
		<div id="wrapper">
			<div class="spacer">
			</div>
			<?php require_once('templates/header.php') ;?>
			<div id="content">
				<div id="form">
					<form action="home.php" method="post">
						<fieldset>
							<legend> Gegevens Graag! </legend>
								Gebruikersnaam:<br />
								<input type="text" name="firstname"  /><br />
								Wachtwoord:<br />
								<input type="password" name="passw"  /><br />
								<input type="submit" value="login"   />
							</fieldset>
					</form>
				</div>
			</div>
		</div>
		<?php require_once('templates/footer.php') ;?>
	</body>
</html>