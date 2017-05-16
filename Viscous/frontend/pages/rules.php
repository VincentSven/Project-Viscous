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
		<div id="wrapper">
			<div class="spacer"></div>
			<div id="content">
				<div class="content_left" id="content_left">
					Content left
				</div>
				<div class="content_right" id="content_right">
					Content right
				</div>
			</div>
		</div>
		<?php require_once('frontend/templates/footer.php') ;?>
	</body>
</html>
