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
		<script src="//ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>
		<script src="game/main.js" type="text/javascript"></script>
		<script src="game/keyboard.js" type="text/javascript"></script>
		<script src="game/util.js"></script>
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
							<li><a href="game.php">Spel</a></li>
							<li><a href="#">Inloggen</a></li>
						</ul>
					</nav>
				</div>
			</div>
			<div id="content">
				<div id="canvas_wrapper">
					<canvas id="canvas" width="720" height="600">
					
					</canvas>
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