<?php
  session_start();
?>
<!DOCTYPE html>
<html>
<head>
  <title>Login</title>

  <!-- Bootstrap -->
    <link href="//maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
    <script src="//maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
    <script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
  <!-- // Bootstrap -->

  <!-- Jquery validator -->
  <script src="//cdnjs.cloudflare.com/ajax/libs/jquery-form-validator/2.3.26/jquery.form-validator.min.js"></script>
  <!-- // Jquery validator -->

  <!-- Css -->
    <link rel="stylesheet" type="text/css" href="css/loginStyle.css">
  <!-- Css -->

</head>
<body>
<div class="wrapper fadeInDown">
  <div id="formContent">
    <!-- Tabs Titles -->

    <!-- Icon -->
    <div class="fadeIn first">
      <img src="icon/user-icon.png" id="icon" alt="User Icon" />
    </div>
    <div class="fadeIn second">
        <?php
          if(isset($_SESSION['error'])){
            echo "<div><span style='color:red;'>".$_SESSION['error']."</span><div>";
            session_unset($_SESSION['error']);
          }
          else{
            echo "<div><span style='color:red;'></span><div>";
          }
        ?>
    </div>
    <!-- Login Form -->
    <form action="con_login.php" method="POST" id="registration-form">
      <input type="text" id="login" class="fadeIn second" name="email" placeholder="enter email"
      data-validation = "email"
      required>
      <input type="password" id="password" class="fadeIn third" name="password" placeholder="password" required>
      <input type="submit" class="fadeIn fourth" value="Log In">
      <a href="index.php">New one User ? Create Account</a>
    </form>
  </div>
</div>
<script type="text/javascript">
  $.validate();
</script>
</body>
</html>