<?php
    session_start();
    extract($_GET);
    include_once("database.php");

    /* Verify for Verification Code*/
    $sql = "SELECT id FROM user WHERE verificationCode='".$_GET['code']."'";
    $result = mysqli_query($con, $sql);

    /* verification code is correct than change verified */
    if($row = mysqli_num_rows($result) == "1"){
        $query = "UPDATE user SET verified='1' WHERE verificationCode='".$_GET['code']."'";
        $verified = mysqli_query($con, $query);
        $_SESSION['verified'] = "Your Email Verified successfully";
        header("Location: login.php");
    }
    else{
        echo "We can not find your verification code";
    }

?>