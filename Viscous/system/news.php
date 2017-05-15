<?php
	function updateNews(){
		global $dbserver;
		global $dbusername;
		global $dbpassword;
		global $max_news;
		
		$conn = new mysqli($dbserver, $dbusername, $dbpassword, "sola_news");
		if ($conn->connect_error){
			
		}else{
			$query = "SELECT `id`, `time` FROM news_messages WHERE 1";
			$result = mysqli_query($conn, $query);
		
			$news = [];
			$time = [];
			
			$count = mysqli_num_rows($result);
			for ($i=0; $i < $count; $i++) {
				$row = mysqli_fetch_assoc($result); 
				$news[$i] = $row['id'];
				$time[$i] = $row['time'];
			}
			array_multisort($time, SORT_DESC, $news);
			
			$dom = new DomDocument('1.0', 'UTF-8'); 
	    	$root = $dom->appendChild($dom->createElement('news'));
			for ($i=0; $i < min($count, $max_news); $i++) {
				$query = "SELECT `text`, `title` FROM news_messages WHERE `id`=" . $news[$i] . "";
				$res = mysqli_query($conn, $query);
				$msg_row = mysqli_fetch_assoc($res);
				
	    		$msg = $dom->createElement('message');
	    		$root->appendChild($msg);
				
				$msg_title = $dom->createAttribute('title');
    			$msg_title->appendChild($dom->createTextNode($msg_row['title']));
    			$msg->appendChild($msg_title);
				
				$msg_text = $dom->createAttribute('text');
				$msg_text->appendChild($dom->createTextNode($msg_row['text']));
    			$msg->appendChild($msg_text);
				
				$msg_date = $dom->createAttribute('date');
				$msg_date->appendChild($dom->createTextNode($time[$i]));
    			$msg->appendChild($msg_date);
			}
	
	    	$dom->formatOutput = true; // Set to false to save a little bit of space
	    	$dom->save('news.xml');
		}
	}

	function getNews(){
		$xml = simplexml_load_file('http://localhost/phpwebgame/viscous/news.xml');
		
		$total = "";
		foreach($xml->message as $msg){
			$title = $msg['title'][0];
			$text = $msg['text'][0];
			$date = $msg['date'][0];
			
			$text = "<div class=\"news_message\">
				<div class=\"news_title\">{$title}</div>
				<div class=\"news_date\">{$date}</div>
				<div class=\"news_text\">{$text}</div>
				</div>";
			$total .= $text;
		}
		return $total;
	}
	
	header('Content-Type: application/json');
	$result = [];
	
	if( !isset($_POST['functionname']) ) { $result['error'] = 'Invalid POST request'; }
	if( !isset($result['error']) ) {
        switch($_POST['functionname']) {
			case 'getNews':
				$result['news'] = getNews();
				break;
			default:
				$result['error'] = 'Invalid POST request';
				break;
		}
	}
	
	echo json_encode($result);
?>