<?php
	global $title;
	global $logo;
?>
<html>
	<head>
		<?php require_once('frontend/templates/head.php');?>
	</head>
	<body>
	<?php require_once('frontend/templates/header.php') ;?>
		<div id="wrapper">
			<div class="spacer"></div>
			<div id="content">
				<div class="content_left">
					<?php getError();?>
				</div>
				<div class="content_right">
					<form role="form" accept-charset="utf-8" action="backend/login-handler.php" method="post">
						<fieldset>
							<legend> Gegevens Graag! </legend>
								Gebruikersnaam:<br />
								<input type="text" name="username"  required/><br />
								Wachtwoord:<br />
								<input type="password" name="passw"  required/><br />
								<input type="submit" value="login"   />
							</fieldset>
					</form>
				</div>
			</div>
		</div>
		<?php require_once('frontend/templates/footer.php') ;?>
	</body>
</html>