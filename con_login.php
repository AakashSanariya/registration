<?php
	session_start();
	extract($_POST);
		include_once("database.php");
		$userName = $_POST['email'];
		$password = md5($_POST['password']);
		$sql = "SELECT * FROM user WHERE email='$userName' AND password='$password'";
		$result = mysqli_query($con, $sql);
		$sucess = "1";
		if(mysqli_num_rows($result) == $sucess){
			$_SESSION['login'] = "Sucssfully Login";
			$_SESSION['user'] = $userName;
			/* Session time out*/
			$_SESSION['expire'] = time() + (50);

			/* Set Cookies*/
			$cookesValue = $userName;
			setcookie("Email", $cookesValue, time() + (50), "/");
			header("location: home.php");
		}
		else{
			$_SESSION['error'] = "!Opps Some error occurs";
			header("location: login.php");
		}
?>