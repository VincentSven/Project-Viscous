<?php
	global $title;	
	global $logo;
?>
<html lang="ned">
	<head>
		<link href="styles/divstyle.css" type="text/css" rel="stylesheet"/>
		<link href="styles/stylesheet.css" type="text/css" rel="stylesheet"/>
		<link href="styles/navbar.css" type="text/css" rel="stylesheet"/>
		<link href="styles/classes.css" type="text/css" rel="stylesheet"/>
		<title><?php echo $title;?></title>
	</head>
	<body>
		<?php require_once('Frontend/templates/header.php') ;?>
		<div id="wrapper">
			<div class="spacer"></div>
			<div id="content">
				<div class="content_left">
					<p>Dit is een gloedhemeltjenieuwe site! Wat is het?
						Nu nog niks. Wat word het? Een cool gameplatform!
						(hopen we) Wat heb ik eraan? Geen idee, maar het is zo uniek dat we een site MOESTEN maken.
						dus....</p>
				</div>
				<div class="content_right">
					<p>Hier alle updates graag! Kan iemand er een update register even in PHP'en? Danku!</p>
					<?php getPage();?>
				</div>
			</div>
		</div>
		<?php require_once('Frontend/templates/footer.php') ;?>
	</body>
</html>