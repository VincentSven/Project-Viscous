<?php
	global $title;
	global $logo;
?>
<html>
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
				<div id="content_left">
					<p>Content links</p>
				</div>
				<div id="update_posts">
					<p>Content Rechts (makkelijk toch?)</p>
				</div>
			</div>
		</div>
		<?php require_once 'Frontend/templates/header.php'; ?>
	</body>
</html>
