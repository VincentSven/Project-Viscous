<?php
	if (isset($_SESSION['loggedin'])){
?>
	<div class="head_right">
		<nav>
			<ul>
				<li><a href="index.php?page=index">Home</a></li>
				<li><a href="index.php?page=info">Info</a></li>
				<li><a href="index.php?page=rules">Spelregels</a></li>
				<li><a href="index.php?page=account">Account</a></li>
				<li><a href="index.php?page=log_out">Uitloggen</a></li>
			</ul>
		</nav>
	</div>
	
<?php	
	}else{
?>
	<div class="head_right">
		<nav>
			<ul>
				<li><a href="index.php?page=index">Home</a></li>
				<li><a href="index.php?page=info">Info</a></li>
				<li><a href="index.php?page=rules">Spelregels</a></li>
				<li><a href="index.php?page=registration">Registreren</a></li>
				<li><a href="index.php?page=login">Inloggen</a></li>
			</ul>
		</nav>
	</div>
<?php
	}
?>