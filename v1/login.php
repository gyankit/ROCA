<?php
	include("config.php");

	if(!isset($_SESSION['user_login']))
	{
		header("location: index.php");
	}
	elseif($_SESSION["user_login"]=="True")
	{
		?>
		<script>
			alert("Already Login");
			history.go(-1);
		</script>
		<?php
	}
	
	$sql5="SELECT * FROM roca_member_tbl";
	$sr5=mysqli_query($cn,$sql5);
	if($sr5==false)
	{
		header("location:register.php");
	}
	elseif(mysqli_num_rows($sr5)==0)
	{
		header("location:register.php");
	}

	$msg="";
	if ($_SERVER["REQUEST_METHOD"]=="POST")
	{
		$user=$_POST['user'];
		$pass=$_POST['pass'];
		$enpt_pass=md5($pass);

		$sql="SELECT * FROM roca_member_tbl WHERE unique_id ='$user' and password ='$enpt_pass'";
		$sr=mysqli_query($cn,$sql);

		if($sr==false)
		{
			$msg="There is no Register User right now";
		}
		elseif(mysqli_num_rows($sr)!=0)
		{
			$data=mysqli_fetch_array($sr);
			$paid=$data['paid'];
			
			if($paid=="NO")
			{
			    $msg="You are Not Authorised for Login";
			}
			else
			{
    			if(strcmp($user,$data['unique_id'])==0)
    			{
    				if(strcmp($enpt_pass,$data['password'])==0)
    				{
    					$_SESSION["user_login"] = "True";
    					$_SESSION["user"] = $data['unique_id'];	
    					header("location: home.php");
    				}
    				else
    				{
    					$msg="Password Not Match";
    				}
    			}
    			else
    			{
    				$msg="Username Not Match";
    			}
			}
		}
		else
		{
			$msg="Username/Password not Exist";
		}
	}
?>

<!DOCTYPE html>
<html lang="en">
<head>
	<title>R O C A</title>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
<!--===============================================================================================-->	
	<link rel="icon" type="image/png" href="images/fevicon.jpg"/>
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="login/vendor/bootstrap/css/bootstrap.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="login/fonts/font-awesome-4.7.0/css/font-awesome.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="login/fonts/iconic/css/material-design-iconic-font.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="login/vendor/animate/animate.css">
<!--===============================================================================================-->	
	<link rel="stylesheet" type="text/css" href="login/vendor/css-hamburgers/hamburgers.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="login/vendor/animsition/css/animsition.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="login/vendor/select2/select2.min.css">
<!--===============================================================================================-->	
	<link rel="stylesheet" type="text/css" href="login/vendor/daterangepicker/daterangepicker.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="login/css/util.css">
	<link rel="stylesheet" type="text/css" href="login/css/main.css">
<!--===============================================================================================-->
</head>
<body>
	
	<div class="limiter">
		<div class="container-login100">
			<div class="wrap-login100">
				<form role="form" method="post" class="login100-form" action="">
					<span class="login100-form-logo">
						<img src="images/logo.png" height="80px" width="80px">
					</span>

					<span class="login100-form-title p-b-34 p-t-27">
						Log in
					</span>
					<div class="text-center text-dark font-weight-bold"><?php echo $msg; ?></div>

					<div class="wrap-input100" data-validate = "Enter Registration Id">
						<input class="input100" type="text" name="user" placeholder="ROCA Registration ID" required oninput="this.value = this.value.toUpperCase()" autofocus>
						<span class="focus-input100" data-placeholder="&#xf207;"></span>
					</div>

					<div class="wrap-input100" data-validate="Enter Password">
						<input class="input100" type="password" name="pass" placeholder="Password" id="password" required>
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

					<div class="text-center p-t-20">
						<a class="txt1" href="forgot.php">
							Forgot Password?
						</a>
					</div>
					
					<div class="text-center p-t-20">Create New Account 
						<a class="txt1" href="register.php">
							Click Here
						</a>
					</div>
				</form>
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
			} 
			else {
				x.type = "password";
			}
		}
	</script>
	
</body>
</html>