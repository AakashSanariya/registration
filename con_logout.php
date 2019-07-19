<?php
	session_start();
	session_destroy();

	/*Delete Cookies*/
	unset($_COOKIE['Email']);
	setcookie("Email", "", -1, "/");
	header("location: login.php");
?>