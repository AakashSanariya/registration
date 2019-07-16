<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
?>
<!DOCTYPE html>
<html>
<head>
	<title>Registration</title>

	<!-- Bootstrap Link -->
	<link href="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
	<script src="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js"></script>
	<script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
	<!-- // Bootstrap Link -->

	<!-- Style -->
	<link rel="stylesheet" type="text/css" href="css/style.css">
	<!-- //Style -->

	<!-- Jquery validator -->
	<script src="//cdnjs.cloudflare.com/ajax/libs/jquery-form-validator/2.3.26/jquery.form-validator.min.js"></script>
	<!-- // Jquery validator -->

</head>
<body>
	<div class="container register">
		<div class="row">
			<div class="col-md-3 register-left">
			</div>
			<div class="col-md-9 register-right">
				<div class="tab-content" id="myTabContent">
					<div class="tab-pane fade show active" id="home" role="tabpanel" aria-labelledby="home-tab">
						<h3 class="register-heading">User Registration</h3>
						<form action="con_registration.php" method="POST" id="registration-form">
							<div class="row register-form">
								<div class="col-md-12">
									<div class="form-group">
										<input type="text" class="form-control" name="firstName"
										placeholder="First Name *"
										data-validation="alphanumeric"
										data-validation-error-msg = "First name only character"
										required
										/>
									</div>
									<div class="form-group">
										<input type="text" class="form-control" placeholder="Last Name *" name="lastName"
										data-validation="alphanumeric"
										data-validation-error-msg = "First name only character"
										required
										/>
									</div>
									<div class="form-group">
										<input type="email" class="form-control" placeholder="Your Email *" name="email" 
										data-validation = "email"
										required
										/>
									</div>
									<div class="form-group">
										<input type="number" class="form-control" placeholder="PinCode *" 
										id = "pin"
										name="pincode"
										data-validation = "length"
										data-validation-length = "6-8"
										data-validation-error-msg = "Pincode between 6 to 8 character"
										required
										/>
									</div>
									<div class="form-group">
										<input type="password" class="form-control" placeholder="Password *" name="password"
										data-validation="length"
										data-validation-length= "min6"
										data-validation-error-msg = "Password Must be greater than 6 character"
										required
										/>
									</div>
									<div class="form-group">
										<input type="password" class="form-control"  placeholder="Confirm Password *" name="confirmPassword"
										data-validation="confirmation"
										data-validation-confirm="password"
										data-validation-error-msg="Password and Confirm Password Not Same"
										required 
										/>
									</div>
									<input type="submit" class="btnRegister col-md-6"  value="Register"/>
									<a href="login.php" class="btnRegister col-md-6">Sign In</a>
								</div>
							</div>
						</form>
					</div>
				</div>
			</div>
		</div>
	</div>
	<script type="text/javascript">
		$.validate({
			modules : 'security'
		});
	</script>
</body>
</html>