<?php
	function year(){
		echo (date('Y',time()));
	}
	
	function getPage()
	{
		if (isset($_GET['page'])) {
			$page = $_GET['page'];
			
			if ($page == 'index') {
				require_once 'Frontend/pages/index.php';
			}
			if ($page == 'login') {
				require_once 'Frontend/pages/login.php';
			}
			if ($page == 'registration') {
				require_once 'Frontend/pages/registration.php';
			}
			if ($page == 'log_out') {
				session_destroy();
				echo 'logged out';
				
				header("Location: index.php");
				die();
			}
		} 
		
		else {
			require_once 'Frontend/pages/index.php';
		}
	}
?>