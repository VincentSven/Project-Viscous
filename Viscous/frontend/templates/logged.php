<?php
	if (isset($_SESSION['loggedin'])){
?>

	<div id="menu">
		<nav>
			<ul>
				<li><a href="index.php?page=index">Home</a></li>
				<li><a href="index.php?page=log_out">Uitloggen</a></li>
				<li><a href="#">Info</a></li>
				<li><a href="index.php?page=account">Account</a></li>
				<li><a href="#">Spelregels</a></li>
			</ul>
		</nav>
	</div>
	
<?php	
	}
	else{
?>

	<div id="menu">
		<nav>
			<ul>
				<li><a href="index.php?page=index">Home</a></li>
				<li><a href="index.php?page=login">Inloggen</a></li>
				<li><a href="#">Info</a></li>
				<li><a href="index.php?page=registration">Registreren</a></li>
				<li><a href="#">Spelregels</a></li>
			</ul>
		</nav>
	</div>
	
<?php
	}
	
?>