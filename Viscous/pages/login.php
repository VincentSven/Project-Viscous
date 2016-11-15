<?php
	global $title;
?>
<html>
	<head>
		<link href="styles/divstyle.css" type="text/css" rel="stylesheet"/>
		<link href="styles/stylesheet.css" type="text/css" rel="stylesheet"/>
		<link href="styles/navbar.css" type="text/css" rel="stylesheet"/>
		<title><?php echo $title;?></title>
	</head>
	<body>
		<div id="wrapper">
			<div class="spacer">
			</div>
			<div id="top">
				<div id="header">
					<h1>Sola lands</h1>
				</div>
				<div id="menu">
					<nav>
						<ul>
							<li><a href="index.php?page=index">Home</a></li>
							<li><a href="index.php?page=login">Inloggen</a></li>
							<li><a href="#">Info</a></li>
							<li><a href="#">Forum</a></li>
							<li><a href="#">Spelregels</a></li>
						</ul>
					</nav>
				</div>
			</div>
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
		<div id="footer">
			<div id="toe">
				<p class="small">copyrighted by The Unargroup &copy; <?php year();?>.</p>				
			</div>
		</div>
	</body>
</html>