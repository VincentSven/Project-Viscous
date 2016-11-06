<?php
	include 'config/config.php';
	include 'Functions/basic_func.php';

if ($maintenance == TRUE){
	echo 'Deze website is bezig met wat verbouwingen, kom later terug';
} elseif ($maintenance == FALSE) {
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
							<li><a href="#">Inloggen</a></li>
							<li><a href="#">Info</a></li>
							<li><a href="#">Forum</a></li>
							<li><a href="#">Spelregels</a></li>
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
				<div id="update posts">
					Hier alle updates graag! Kan iemand er een update register even in PHP'en? Danku!
				</div>
			</div>
		</div>
		<div id="footer">
			<div id="toe">
				<p>copyrighted by The Unargroup &copy; <?php year();?>.</p>				
			</div>
		</div>
	</body>
</html>
<?php
}
?>
