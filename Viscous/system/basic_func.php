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
				
				header("Location: index.php?msg=logoutsuccess");
				die();
			}
		} 
		
		else {
			require_once 'Frontend/pages/index.php';
		}
	}
	
	function getMsg()
	{
		if (isset($_GET['msg'])){
			$msg = $_GET['msg'];
			
			if ($msg == 'logoutsuccess') {
				?>
				<p>U bent uitgelogd.</p>
				<?php
			}
			
			if ($msg == 'loginsuccess') {
				?>
				<p>U bent ingelogd. Welkom: </br>
				<?php echo $_SESSION['loggedin'];?>
				</p>
				<?php
			}

			if ($msg == 'registersuccess') {
				?>
				<p>U bent geregistreerd.</p>
				<?php
			}
		}elseif (isset($_SESSION['loggedin'])){
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
	
	function getError()
	{
		if(isset($_GET['err'])){
			$err = $_GET['err'];
			
			if($err == 'uname'){
				?>
				<p>Deze gebruikersnaam is al in gebruik, kies een andere.</p>
				<?php
			}
			
			if($err == 'mail'){
				?>
				<p>Deze E-mail is al in gebruik, kies een andere.</p>
				<?php
			}
			
			if($err == 'noacc'){
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
	
	function getGlink()
	{
		if(isset($_SESSION['loggedin'])){
			?>
				<a href="index.php?page=game"><div class="button">Spelen!</div></a>
			<?php
		}
	}
















?>