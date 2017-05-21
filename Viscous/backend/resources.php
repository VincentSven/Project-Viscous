<?php
	header('Content-Type: application/json');
	$result = [];
	
	if (!isset($_POST['func'])) { $result['error'] = "Invalid POST request";
	};
	
	if (!isset($result['error'])) {
		$func = $_POST['func'];
		switch ($func) {
			case 'map' :
				if (!isset($_POST['map'])) {
					$result['error'] = "Invalid POST request";
					break;
				}
				$map = $_POST['map'];
				if(file_exists("../game/res/{$map}.tmx")){
					$file = simplexml_load_file("../game/res/{$map}.tmx");
					$result['map'] = $file;
				}else{
					$result['error'] = "Invalid POST request";
				}
				
				break;
			case 'image' :
				if (!isset($_POST['path'])) {
					$result['error'] = "Invalid POST request";
					break;
				}
				$path = $_POST['path'];
				if(file_exists("../game/res/{$path}")){
					$im = file_get_contents("../game/res/{$path}");
					header("Content-type: image/jpeg");
					echo $im;
					return;
				}else{
					$result['error'] = "Invalid POST request";
				}
				
				break;
			default :
				$result['error'] = "Invalid POST request";
				break;
		}
	}
	
	echo json_encode($result);
?>