<?php
	session_start();
	if(!isset($_SESSION['user'])){
		header("location: login.php");
	}
?>
<!DOCTYPE html>
<html>
<head>
	<title>Home</title>

	<!-- Bootstrap Link -->
		<link href="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
		<script src="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js"></script>
		<script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
	<!-- // Bootstrap Link -->

</head>
<body>
<div class="container">
  <h2><?php print_r($_SESSION['user']); ?></h2>
  <div class="card" style="width:40%">
    <img class="card-img-top" src="icon/user-icon.png" alt="Card image" style="width:30%">
    <div class="card-body">
      <h6 class="card-title">Hii <?php print_r($_SESSION['user']); ?>
      	How are You?
      </h6>
      <a href="con_logout.php" class="btn btn-primary">Log out</a>
    </div>
  </div>
  <br>
</div>
</body>
</html>