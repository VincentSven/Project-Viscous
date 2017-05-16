<?php
	global $title;	
	global $logo;
?>
<html lang="nl">
	<head>
		<?php require_once('frontend/templates/head.php');?>
		
		<script src="lib/jquery-3.2.1.min.js"></script>
		<script type="text/javascript">
        	function loadNews() {
           		var newsfeed = document.getElementById("newsfeed");
				   		
           		jQuery.ajax({ 
           			type: "POST",
           			url: "system/news.php",
           			dataType: 'json',
           			data: { functionname: 'getNews' },
           			
           			success: function(obj, status){
           				if( !('error' in obj) ) {
                      		newsfeed.innerHTML = obj.news;
                  		} else {
                      		console.log(obj.error);
                  		}
           			}
           		});
           	}
        	window.onload = loadNews;
       	</script>
	</head>
	<body>
		<?php require_once('frontend/templates/header.php') ;?>
		<div id="wrapper">
			<div class="spacer"></div>
			<div id="content">
				<div class="content_left" id="content_left">
					<?php 
						getMsg();
						getGlink();
					?>
				</div>
				<div class="content_right" id="content_right">
					<!--<p>Hier alle updates graag! Kan iemand er een update register even in PHP'en? Danku!</p>-->
					<h2>News feed</h2>
					<div id="newsfeed">
						
					</div>
				</div>
			</div>
		</div>
		<?php require_once('frontend/templates/footer.php') ;?>
	</body>
</html>