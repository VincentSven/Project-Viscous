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
				<div class="game_content">
					<canvas id="game_canvas"></canvas>
				</div>
			</div>
		</div>
		<?php require_once 'frontend/templates/header.php'; ?>
	</body>
</html>
