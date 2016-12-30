<?php
	function year(){
		echo (date('Y',time()));
	}
	
	function getPage()
	{
		if (isset($_GET['page'])) {
			$page = $_GET['page'];
			
			if ($page == 'index') {
				require_once 'pages/index.php';
			}
			if ($page == 'login') {
				require_once 'pages/login.php';
			}
			if ($page == 'registration') {
				require_once 'pages/registration.php';
			}
		} 
		
		else {
			require_once 'pages/index.php';
		}
	}
?>