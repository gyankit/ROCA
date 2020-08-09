<?php 
	include("config.php");
	
	$sql2="SHOW TABLES LIKE 'admin_tbl'";
    $sr2=mysqli_query($cn,$sql2);
    
    if(mysqli_num_rows($sr2)==0)
    {
    	header("location: index.php");
    }
    
	$msg="";
	if ($_SERVER["REQUEST_METHOD"]=="POST")
	{
		$norm_user=$_POST['admin_user'];
		$norm_pass=$_POST['admin_pass'];
		$user=md5($norm_user);
		$pass=md5($norm_pass);

		$sql5="SELECT * FROM admin_tbl WHERE username ='$user' and password='$pass'";
		$sr5=mysqli_query($cn,$sql5);
        if($sr5==false)
        {
            $msg="No Data Found";
        }
        
		elseif(mysqli_num_rows($sr5)==0)
		{
			$msg="Please Enter Valid Username/Password";
		}
		
		else
		{
		    $data=mysqli_fetch_array($sr5);
		    
			if(strcmp($user,$data['username'])==0)
			{
				if(strcmp($pass,$data['password'])==0)
				{
					$_SESSION["admin_login"] = "True";
					$_SESSION["role"] = $data['role'];
					$_SESSION["id"] = $data['unique_id'];
					header("location: home.php");
				}
			}
			else
			{
				$msg="Username/Password Not Match";
			}
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
	<link rel="icon" type="image/png" href="../images/fevicon.jpg"/>
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="../login/vendor/bootstrap/css/bootstrap.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="../login/fonts/font-awesome-4.7.0/css/font-awesome.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="../login/fonts/iconic/css/material-design-iconic-font.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="../login/vendor/animate/animate.css">
<!--===============================================================================================-->	
	<link rel="stylesheet" type="text/css" href="../login/vendor/css-hamburgers/hamburgers.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="../login/vendor/animsition/css/animsition.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="../login/vendor/select2/select2.min.css">
<!--===============================================================================================-->	
	<link rel="stylesheet" type="text/css" href="../login/vendor/daterangepicker/daterangepicker.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="../login/css/util.css">
	<link rel="stylesheet" type="text/css" href="../login/css/main.css">
<!--===============================================================================================-->
</head>
<body>
	
	<div class="limiter">
		<div class="container-login100">
			<div class="wrap-login100">
				<form role="form" method="post" class="login100-form" action="">
					<span class="login100-form-logo">
						<img src="../images/logo.png" height="80px" width="80px">
					</span>

					<span class="login100-form-title p-b-34 p-t-27">
						Admin Login
					</span>
					<div class="text-center text-dark font-weight-bold"><?php echo $msg; ?></div>

					<div class="wrap-input100" data-validate = "Enter username">
						<input class="input100" type="text" name="admin_user" placeholder="Username" required>
						<span class="focus-input100" data-placeholder="&#xf207;"></span>
					</div>

					<div class="wrap-input100" data-validate="Enter password">
						<input class="input100" type="password" name="admin_pass" placeholder="Password" id="password" required>
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