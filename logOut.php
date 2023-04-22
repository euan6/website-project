<?php 
	//Start Session
	session_start();
	if ($_SERVER["REQUEST_METHOD"] == "POST") {
		session_destroy();
		include 'logIn.php';
		die();
	}
?>