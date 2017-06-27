<?php
	global $title;
	global $logo;
?>
<html>
	<head>
		<?php require_once('frontend/templates/head.php');?>
		<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, minimum-scale=1, user-scalable=no" />
		<script src="lib/jquery-3.2.1.min.js" type="text/javascript"></script>
		<script src="lib/phaser/v2/build/phaser.min.js" type="text/javascript"></script>
		<script src="game/test.js" type="application/javascript"></script>
	</head>
	<body>
		<div id="gamebg">
			<div class="g_wrapper">
				<div class="center"><img src="img/loading.gif"/></div>
				<div class="spacer"></div>
				<div class="game_content" id="game_content"></div>
			</div>
		</div>
	</body>
</html>
