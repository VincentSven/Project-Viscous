<?php
//include_once 'psl-config.php';   // As functions.php is not included
include_once('/php/config.php');

$mysqli = new mysqli(DB_HOST, DB_USER, DB_PASSWORD, DB_DATABASE);

function sec_session_start() {
	$session_name = 'sec_session_id';
	session_name($session_name);
	$secure = true;
	$httponly = true;

	if (ini_set('session.use_only_cookies', 1) === FALSE) {
		header("Location: ../error.php?err=Could not initiate a safe session (ini_set)");
		exit();
	}

	$cookieParams = session_get_cookie_params();
	session_set_cookie_params($cookieParams["lifetime"], $cookieParams["path"], $cookieParams["domain"], $secure, $httponly);

	session_start();
	session_regenerate_id(true);
	echo 'DEBUG: Session ID ' . session_id();
}

function login($email, $password, $mysqli) {
	// Using prepared statements means that SQL injection is not possible.
	if ($stmt = $mysqli -> prepare("SELECT uuid, name, password FROM users WHERE email = ? LIMIT 1")) {
		$stmt -> bind_param('s', $email);
		// Bind "$email" to parameter.
		$stmt -> execute();
		// Execute the prepared query.
		$stmt -> store_result();

		// get variables from result.
		$stmt -> bind_result($user_id, $username, $db_password);
		$stmt -> fetch();

		if ($stmt -> num_rows == 1) {
			// If the user exists we check if the account is locked
			// from too many login attempts

			if (checkbrute($user_id, $mysqli) == true) {
				// Account is locked
				// Send an email to user saying their account is locked
				return 'locked';
			} else {
				// Check if the password in the database matches
				// the password the user submitted. We are using
				// the password_verify function to avoid timing attacks.
				if (password_verify($password, $db_password)) {
					// Password is correct!
					// Get the user-agent string of the user.
					$user_browser = $_SERVER['HTTP_USER_AGENT'];
					// XSS protection as we might print this value
					//$user_id = preg_replace("/[^0-9]+/", "", $user_id);
					$_SESSION['user_id'] = $user_id;
					// XSS protection as we might print this value
					$username = preg_replace("/[^a-zA-Z0-9_\-]+/", "", $username);
					$_SESSION['username'] = $username;
					$_SESSION['login_string'] = hash('sha512', $db_password . $user_browser);
				
					// Login successful.
					return 'success';
				} else {
					// Password is not correct
					// We record this attempt in the database
					$now = time();
					//$mysqli->query("INSERT INTO login_attempts(user_id, time) VALUES ('$user_id', '$now')");
					return 'password';
				}
			}
		} else {
			// No user exists.
			return 'nouser';
		}
	}
}

function checkbrute($user_id, $mysqli) {
	return false;
}

function login_check($mysqli) {
	// Check if all session variables are set
	if (isset($_SESSION['user_id'], $_SESSION['username'], $_SESSION['login_string'])) {

		$user_id = $_SESSION['user_id'];
		$login_string = $_SESSION['login_string'];
		$username = $_SESSION['username'];

		// Get the user-agent string of the user.
		$user_browser = $_SERVER['HTTP_USER_AGENT'];

		if ($stmt = $mysqli -> prepare("SELECT password FROM users WHERE uuid = ? LIMIT 1")) {
			// Bind "$user_id" to parameter.
			$stmt -> bind_param('i', $user_id);
			$stmt -> execute();
			// Execute the prepared query.
			$stmt -> store_result();

			if ($stmt -> num_rows == 1) {
				// If the user exists get variables from result.
				$stmt -> bind_result($password);
				$stmt -> fetch();
				$login_check = hash('sha512', $password . $user_browser);

				if (hash_equals($login_check, $login_string)) {
					// Logged In!!!!
					return true;
				} else {
					echo 'Password did not match';
					// Not logged in
					return false;
				}
			} else {
				echo 'Database returned invalid number of rows';
				// Not logged in
				return false;
			}
		} else {
			echo 'Database returned null';
			// Not logged in
			return false;
		}
	} else {
		echo 'SESSION vars not set';
		// Not logged in
		return false;
	}
}
?>