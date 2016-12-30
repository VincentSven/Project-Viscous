<?php
	global $title;
	global $logo;
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
			<?php require_once 'templates/header.php'; ?>
			<div id="content">
				<div class="content_left">
					<p>Content links</p>
				</div>
				<div class="content_right">
					<form role="form" accept-charset="utf-8" action="home.php" method="post">
						<fieldset>
							<legend> Gegevens Graag! </legend>
								<div class="mail"/>
									E-mail:<br />
									<input type="email" name="mail"  required><br />
								</div>
								<div class="username"/>
									Gebruikersnaam:<br />
									<input type="text" name="username" required><br />
								</div>
								<div class="passw"/>
									Wachtwoord:<br />
									<input type="password" name="passw" required><br />
								</div>
								<button type="submit" value="login" />Verzend</button>
							</fieldset>
					</form>
				</div>
			</div>
		</div>
		<?php require_once 'templates/header.php'; ?>
	</body>
</html>
