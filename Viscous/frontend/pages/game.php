<?php
	global $title;
	global $logo;
?>
<html>
	<head>
		<?php require_once('frontend/templates/head.php');?>
		<script src="lib/jquery-3.2.1.min.js" type="text/javascript"></script>
	</head>
	<body>
	<?php require_once('frontend/templates/header.php') ;?>
		<div id="page">
			<div id="wrapper">
				<div class="spacer"></div>
				<div class="game_content">
					<canvas id="game_canvas"></canvas>
				</div>
			</div>
		</div>
		<?php require_once 'frontend/templates/header.php'; ?>
	</body>
</html>
