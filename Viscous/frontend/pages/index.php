<?php
	global $title;	
	global $logo;
?>
<html lang="nl">
	<head>
		<?php require_once('Frontend/templates/head.php');?>
	</head>
	<body>
		<?php require_once('Frontend/templates/header.php') ;?>
		<div id="wrapper">
			<div class="spacer"></div>
			<div id="content">
				<div class="content_left">
					<?php 
						getMsg();
						getGlink();
					?>
				</div>
				<div class="content_right">
					<!--<p>Hier alle updates graag! Kan iemand er een update register even in PHP'en? Danku!</p>-->
					<h2>News feed</h2>
					<?php require_once('system/news.php'); ?>
				</div>
			</div>
		</div>
		<?php require_once('Frontend/templates/footer.php') ;?>
	</body>
</html>