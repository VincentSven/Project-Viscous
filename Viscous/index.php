<?php
	include_once 'php/config.php';
	include_once 'php/basic_func.php';
	include_once 'php/login/db_connect.php';

	if ($maintenance == TRUE){
		echo 'Deze website is bezig met wat verbouwingen, kom later terug';
	} elseif ($maintenance == FALSE) {
		
	sec_session_start(); 
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
							<li><a href="index.php">Home</a></li>
							<li><a href="#">Info</a></li>
							<li><a href="#">Forum</a></li>
							<li><a href="#">Spelregels</a></li>
							<?php if(login_check($mysqli)){ ?>
								<li>Logged in</li>
							<?php }else{ ?>
								<li><a href="login.php">Inloggen</a></li>
							<?php } ?>
						</ul>
					</nav>
				</div>
			</div>
			<div id="content">
				<div id="content_left">
					<p>Dit is een gloedhemeltjenieuwe site! Wat is het?
						Nu nog niks. Wat word het? Een cool gameplatform!
						(hopen we) Wat heb ik eraan? Geen idee, maar het is zo uniek dat we een site MOESTEN maken.
						dus....</p>
				</div>
				<div id="update_posts">
					<p>Hier alle updates graag! Kan iemand er een update register even in PHP'en? Danku!</p>
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
<?php
}
?>
