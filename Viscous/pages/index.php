<?php
	global $title;	
?>
<html lang="nederlands">
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
					<img src="img/Sola logo.png" / class="logo">
					<h1><?php echo $title;?></h1>
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
				<div id="content_left">
					<p>Dit is een gloedhemeltjenieuwe site! Wat is het?
						Nu nog niks. Wat word het? Een cool gameplatform!
						(hopen we) Wat heb ik eraan? Geen idee, maar het is zo uniek dat we een site MOESTEN maken.
						dus....</p>
				</div>
				<div id="update_posts">
					<p>Hier alle updates graag! Kan iemand er een update register even in PHP'en? Danku!</p>
					<?php getPage();?>
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