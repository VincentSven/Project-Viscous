<?php
include_once '../config.php';
include_once 'db_connect.php';
include_once '../basic_func.php';
 
sec_session_start(); // Our custom secure way of starting a PHP session.
 
if (isset($_POST['email'], $_POST['p'])) {
    $email = $_POST['email'];
    $password = $_POST['p']; // The hashed password.
 
 	$result = login($email, $password, $mysqli);
    if ($result == 'success') {
        // Login success 
        header('Location: ../../index.php');
    } else {
        // Login failed 
        header('Location: ../../login.php?' . $result . '=1');
    }
} else {
    // The correct POST variables were not sent to this page. 
    echo 'Invalid Request';
}
?>