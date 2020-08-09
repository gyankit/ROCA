<?php
require("Login.class.php");
$msg = "";

$login = new Login();

if ($_SERVER["REQUEST_METHOD"] == "POST") {
	function _input($data)
	{
		$data = trim($data);
		$data = stripslashes($data);
		$data = htmlspecialchars($data);
		return $data;
	}

	$user = _input($_POST["user_user"]);
	$pass = _input($_POST["user_pass"]);

	$login = new Login();
	$newlogin = $login->newLogin($user, $pass);

	$msg = $newlogin;
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
	<title>R O C A</title>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<!--===============================================================================================-->
	<link rel="icon" type="image/png" href="../../vendor/dist/img/fevicon.jpg" />
	<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="../../vendor/plugins/bootstrap/css/bootstrap.min.css">
	<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="../../vendor/dist/fonts/font-awesome-4.7.0/css/font-awesome.min.css">
	<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="../../vendor/dist/fonts/iconic/css/material-design-iconic-font.min.css">
	<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="../../vendor/plugins/hamburgers/css/hamburgers.min.css">
	<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="../../vendor/plugins/animsition/css/animsition.min.css">
	<!--===============================================================================================-->
	<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">
	<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="../../vendor/dist/css/util.css">
	<link rel="stylesheet" type="text/css" href="../../vendor/dist/login/main.css">
	<!--===============================================================================================-->
</head>

<body>

	<div class="limiter">
		<div class="container-login100">
			<div class="wrap-login100">
				<form role="form" method="post" class="login100-form" action="">
					<span class="login100-form-logo">
						<img src="../../vendor/dist/img/logo.png" height="80px" width="80px">
					</span>

					<span class="login100-form-title p-b-24 p-t-27">
						User Login
					</span>
					<div class="text-center text-danger p-b-10 fs-16"><strong><?= $msg; ?></strong></div>

					<div class="wrap-input100" data-validate="Enter Registration Id">
						<input class="input100" type="text" name="user_user" placeholder="Registration Id" <?php if(isset($_COOKIE["rocauseruser"])) { ?> value="<?= $_COOKIE["rocauseruser"]; ?>" <?php } else { ?> placeholder="Password" <?php } ?> required>
						<span class="focus-input100" data-placeholder="&#xf207;"></span>
					</div>

					<div class="wrap-input100" data-validate="Enter Password">
						<input class="input100" type="password" name="user_pass" placeholder="Password" id="password" <?php if(isset($_COOKIE["rocauserpass"])) { ?> value="<?= $_COOKIE["rocauserpass"]; ?>" <?php } else { ?> placeholder="Password" <?php } ?> required>
						<span class="focus-input100" data-placeholder="&#xf191;"></span>
					</div>

					<div class="contact100-form-checkbox">
						<input class="input-checkbox100" id="btn-show-pass" type="checkbox" onClick="showpassword();">
						<label class="label-checkbox100" for="btn-show-pass">
							Show Password
						</label>
					</div>

					<div class="container-login100-form-btn">
						<button class="login100-form-btn" type="submit">
							Login
						</button>
					</div>
				</form>

				<div class="text-center p-t-20">
						<a class="txt1" href="password">
							Forgot Password?
						</a>
					</div>
					
					<div class="text-center p-t-20">Create New Account 
						<a class="txt1" href="../register/register">
							Click Here
						</a>
					</div>
			</div>
		</div>
	</div>

	<!--===============================================================================================-->
	<script>
		function showpassword() {
			"use strict";
			var x = document.getElementById("password");

			if (x.type === "password") {
				x.type = "text";
			} else {
				x.type = "password";
			}
		}
	</script>

</body>

</html>