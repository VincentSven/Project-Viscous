<?php
	function year(){
		echo (date('Y',time()));
	}
	
	function getPage() {
		if (isset($_GET['page'])) {
			$page = $_GET['page'];
			
			if ($page == 'index') {
				require_once 'frontend/pages/index.php';
			}else if ($page == 'info') {
				require_once 'frontend/pages/info.php';
			}else if ($page == 'rules') {
				require_once 'frontend/pages/rules.php';
			}else if ($page == 'account') {
				require_once 'frontend/pages/account.php';
			}else if ($page == 'login') {
				require_once 'frontend/pages/login.php';
			}else if ($page == 'registration') {
				require_once 'frontend/pages/registration.php';
			}else if($page == "game") {
				require_once 'frontend/pages/game.php';
			}else if($page == "game1") {
				require_once 'frontend/pages/game1.php';
			}else if ($page == 'log_out') {
				session_destroy();
				echo 'logged out';
				
				header("Location: index.php?msg=logoutsuccess");
				die();
			}else{
				require_once 'frontend/pages/error/404.php';
			}
		} else {
			require_once 'frontend/pages/index.php';
		}
	}
	
	function getMsg(){
		if (isset($_GET['msg'])){
			$msg = $_GET['msg'];
			
			if ($msg == 'logoutsuccess') {
				?>
				<p>U bent uitgelogd.</p>
				<?php
			}else if ($msg == 'loginsuccess') {
				?>
				<p>U bent ingelogd. Welkom: </br>
				<?php echo $_SESSION['loggedin'];?>
				</p>
				<?php
			}else if ($msg == 'registersuccess') {
				?>
				<p>U bent geregistreerd.</p>
				<?php
			}
		}else if (isset($_SESSION['loggedin'])){
				?>
				<p>Welkom: 
				<?php echo $_SESSION['loggedin'];?>
				</p>
				<?php
		}else{
			?>
			<p>U bent nog niet ingelogd.</p>
			<?php
		}
	}
	
	function getError(){
		if(isset($_GET['err'])){
			$err = $_GET['err'];
			
			if($err == 'uname'){
				?>
				<p>Deze gebruikersnaam is al in gebruik, kies een andere.</p>
				<?php
			}else if($err == 'mail'){
				?>
				<p>Deze E-mail is al in gebruik, kies een andere.</p>
				<?php
			}else if($err == 'noacc'){
				?>
				<p>Deze gebruikersnaam en/of wachtwoord bestaan niet.</p>
				<?php
			}
		}else{
			?>
			<p>Heb je nog geen account? Maak een account aan!</p>
			<?php
		}
	}
	
	function getGlink(){
		if(isset($_SESSION['loggedin'])){
			?>
				<a href="index.php?page=game1">
					<div class="button">Spelen! g1</div>
				</a>
				<a href="index.php?page=game">
					<div class="button">Spelen!</div>
				</a>
			<?php
		}
	}
?>