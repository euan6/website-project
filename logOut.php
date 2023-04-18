<?php 
	//Start Session
	session_start();
?>

<?php
	if ($_SERVER["REQUEST_METHOD"] == "POST") {
		session_destroy();
		include 'logIn.php';
		die();
		}
?>