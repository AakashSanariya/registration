<?php
    session_start();
    extract($_GET);
    include_once("database.php");

    /* Check Timeout for verification Code*/
    $verificationTime = "SELECT * FROM user WHERE verificationCode='".$_GET['code']."'";
    $verificationTimeResult = mysqli_query($con,$verificationTime);
    while ($row=mysqli_fetch_assoc($verificationTimeResult)) {
        $currentTime = date('Y-m-d H:i');
        $expireTime = date('Y-m-d H:i', strtotime('+1 day',strtotime($row['verificationTimeOut'])));
        if ($currentTime >= $expireTime) {

            $removeVerificationCode = "DELETE FROM user WHERE verificationCode='" . $_GET['code'] . "'";
            $removeResult = mysqli_query($con, $removeVerificationCode);
            $_SESSION['expire'] = "Your verification Code Expire Please Fill Form And Verify Email";
            header("location:index.php");
        }
    }
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