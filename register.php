<?php
	include('connection/conn.php');

	$successModal = false;

	if ($_SERVER['REQUEST_METHOD'] == "POST") {
		$fullname = $_POST['fullname'];
		$username = $_POST['username'];
		$password = $_POST['password'];
		$status = "pending";

		$insertIntoDatabase = "INSERT INTO accounts (fullname, username, password, status) VALUES ('$fullname', '$username', '$password', '$status')";
		if (mysqli_query($conn, $insertIntoDatabase)) {
			$successModal = true;
		}
	}
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<title>Register Form</title>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<style>
			body{
				overflow: hidden;
			}
	</style>
	<link rel="icon" type="image/png" href="template/login/images/icons/favicon.ico"/>
	<link rel="stylesheet" type="text/css" href="template/login/vendor/bootstrap/css/bootstrap.min.css">
	<link rel="stylesheet" type="text/css" href="template/login/fonts/font-awesome-4.7.0/css/font-awesome.min.css">
	<link rel="stylesheet" type="text/css" href="template/login/fonts/Linearicons-Free-v1.0.0/icon-font.min.css">
	<link rel="stylesheet" type="text/css" href="template/login/vendor/animate/animate.css">
	<link rel="stylesheet" type="text/css" href="template/login/vendor/css-hamburgers/hamburgers.min.css">
	<link rel="stylesheet" type="text/css" href="template/login/vendor/animsition/css/animsition.min.css">
	<link rel="stylesheet" type="text/css" href="template/login/vendor/select2/select2.min.css">
	<link rel="stylesheet" type="text/css" href="template/login/vendor/daterangepicker/daterangepicker.css">
	<link rel="stylesheet" type="text/css" href="template/login/css/util.css">
	<link rel="stylesheet" type="text/css" href="template/login/css/main.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
</head>
<body>
	
	<div class="limiter">
		<div class="container-login100" style="background-image: url('background_image/bg2.jpg');">
			<div class="wrap-login100 p-t-30 p-b-50">
				<span class="login100-form-title p-b-41">
					Account Register
				</span>
				<form class="login100-form validate-form p-b-33 p-t-5" action="register.php" method="post">
                    <div class="wrap-input100 validate-input" data-validate="Enter Fullname">
						<input class="input100" type="text" name="fullname" placeholder="Fullname">
						<span class="focus-input100" data-placeholder="&#xe82a;"></span>
					</div>

					<div class="wrap-input100 validate-input" data-validate="Enter username">
						<input class="input100" type="text" name="username" placeholder="Username">
						<span class="focus-input100" data-placeholder="&#xe82a;"></span>
					</div>

					<div class="wrap-input100 validate-input" data-validate="Enter password">
						<input class="input100" type="text" name="password" placeholder="Password">
						<span class="focus-input100" data-placeholder="&#xe80f;"></span>
					</div>

					<div class="container-login100-form-btn m-t-32">
						<a href="loadToIndex.php" class="btn btn-danger" style="border-radius: 30px; margin-left: -40px; margin-right: 40px; padding-left: 20px; padding-right: 20px;">Back</a>
                        <input type="submit" value="Register" class="login100-form-btn">
					</div>
				</form>
			</div>
		</div>
	</div>
	
	<div id="dropDownSelect1"></div>

	<?php if ($successModal): ?>
	<div class="modal" id="successModal" tabindex="-1" role="dialog">
	  <div class="modal-dialog" role="document">
	    <div class="modal-content">
	      <div class="modal-header">
	        <h5 class="modal-title">Registration Successful</h5>
	       
	      </div>
	      <div class="modal-body">
	        <p>Your account has been successfully registered and is pending approval.</p>
	      </div>
	      <div class="modal-footer">
	       <a href="loadToLogin.php" class = "btn btn-danger">Close</a>
	      </div>
	    </div>
	  </div>
	</div>
	<?php endif; ?>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
	<script src="template/login/vendor/jquery/jquery-3.2.1.min.js"></script>
	<script src="template/login/vendor/animsition/js/animsition.min.js"></script>
	<script src="template/login/vendor/bootstrap/js/popper.js"></script>
	<script src="template/login/vendor/bootstrap/js/bootstrap.min.js"></script>
	<script src="template/login/vendor/select2/select2.min.js"></script>
	<script src="template/login/vendor/daterangepicker/moment.min.js"></script>
	<script src="template/login/vendor/daterangepicker/daterangepicker.js"></script>
	<script src="template/login/vendor/countdowntime/countdowntime.js"></script>
	<script src="template/login/js/main.js"></script>

	<script>
		document.addEventListener("DOMContentLoaded", function() {
			<?php if ($successModal): ?>
				var successModal = new bootstrap.Modal(document.getElementById('successModal'));
				successModal.show();
			<?php endif; ?>
		});
	</script>
</body>
</html>
