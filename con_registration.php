<?php
	session_start();
	extract($_POST);

	/* Name Validation */
	if(!preg_match("/^[a-zA-Z ]*$/",$_POST['firstName']) && !preg_match("/^[a-zA-Z ]*$/",$_POST['lastName'])){
		echo "! Sorry Some error Occurs in First Name and Last Name";
	}

	/* Email Validation*/
	if(!filter_var($_POST['email'], FILTER_VALIDATE_EMAIL)){
		echo "!Sorry Some Error Occurs in Email";
	}

	/* Password Validation */
	if($_POST['password'] != $_POST['confirmPassword'] && strlen($_POST['password']) >= 6){
		echo "!Sorry password and confirm password don't match.";
	}

	/* email check already exit or not*/
	include_once("database.php");
	$email = $_POST['email'];
	$checkEmail = "SELECT * FROM user WHERE email='$email'";
	$checkResult = mysqli_query($con,$checkEmail);
	$row = mysqli_num_rows($checkResult);
	$error = "0";
	if($row > $error){
		echo "!Sorry this email address exist in our data";
		exit();
	}

	/* Database Connection*/
	else{
		/* Random generated code for verification*/
		$randomCode = rand();
		$verificationCode = md5($randomCode);
		$verified = "0";


        /* Mail Send */
		include_once("emailTemplate.php");

		include_once('database.php');
		$encPass = md5($_POST['password']);
		$sql = "INSERT INTO user (id, firstName, lastName, email, pincode, password, verificationCode, verified) VALUES (NULL, '$firstName', '$lastName', '$email', '$pincode', '$encPass', '$verificationCode', $verified)";
		$result = mysqli_query($con, $sql);
		$_SESSION['verification'] = "Verification Email Send To Your Email Address Please Check and Verify First";

		/* Check to Insert data in database*/
		$success = "1";
		if($result == $success){
			header("location: login.php");
		}
		else{
			echo "!Some error ocuurs while inserting a reacord in database";
		}
	}


?>