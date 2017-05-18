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
		<div id="page">
			<div id="wrapper">
				<div class="spacer"></div>
				<div id="content">
					<div class="content_left">
						<?php getError();?>
					</div>
					<div class="content_right">
						<form role="form" accept-charset="utf-8" action="backend/client-registration.php" method="post">
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
		</div>
		<?php require_once 'frontend/templates/footer.php'; ?>
	</body>
</html>
