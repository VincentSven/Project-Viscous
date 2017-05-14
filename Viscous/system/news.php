<?php
	global $dbserver;
	global $dbusername;
	global $dbpassword;
	global $max_news;
	
	$db = "sola_news";
	
	$conn = new mysqli($dbserver, $dbusername, $dbpassword, $db);
	if ($conn->connect_error){
		die('Database connection lost! ' . $conn->connect_error);
	}else{
		$query = "SELECT `id` FROM msg_index WHERE 1";
		$result = mysqli_query($conn, $query);
		
		$news = [];
		
		//TODO? this relies on the 'msg_index' table to only contain the $max_news latest messages in ascending chronological order
		$count = mysqli_num_rows($result);
		for ($i=0; $i < min($count, $max_news); $i++) {
			$row = mysqli_fetch_assoc($result); 
			$query = "SELECT `text`, `title`, `time` FROM news_messages WHERE `id`=" . $row['id'] . "";
			
			$msg = mysqli_query($conn, $query);
			$msg_row = mysqli_fetch_assoc($msg);
			$news[$i] = "<b>" . $msg_row['title'] . "</b><br/><i>" . $msg_row['time'] . "</i><br/>" . $msg_row['text'] . "<br/><br/>"; //TODO styling
		}
		
		echo "<h2>News feed</h2>";
		for ($i=min($count, $max_news); $i > 0; $i--) { // Reverses order to be descending chronologic
			echo $news[$i - 1];
		}
	}
?>