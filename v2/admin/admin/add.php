<?php
session_start();
require("../required/check.php");
require("Admin.class.php");
$msg="";

$admin = new Admin();
$num = $admin->counts();

if( $num >= 4 ) {
	?><script>alert("Max Admin Present.\nCan't Add More"); history.go(-1);</script><?php
}

if($_SERVER['REQUEST_METHOD']=='POST')
{
	$unique_id = $admin->_input($_POST['unique_id']);
	$user = $admin->_input($_POST['username']);
	$pass = $admin->_input($_POST['password']);
	$role = $admin->_input($_POST['role']);
	
	if($role=="ADMINISTRATOR") {
		$msg = $admin->newAdmin( $unique_id, $user, $pass, $role );
	} else {
		$msg = $admin->newAdmin( $unique_id, $user, $pass, $role );
	}
	
}

?>
<!DOCTYPE html>
<html lang="en">

<head>
	<?php include("../required/head.php"); ?>
	<link rel="stylesheet" href="../../vendor/dist/css/password.css">
    <link rel="stylesheet" href="../../vendor/dist/css/preview.css">
</head>

<body class="hold-transition sidebar-mini">
<div class="wrapper">
    <?php include("../required/header.php"); ?>
    <?php include("../required/sidebar.php"); ?>

    <!-- Main content -->
    <div class="content">
		<div class="container">
          	<div class="page-wrapper p-t-5 p-b-10">
              	<div class="wrapper wrapper--w790">
					<div class="card card-5">
						<div class="card-heading bg-info">
							<h2 class="title text-white">Add New Admin</h2>
						</div>		
						<!-- Main Content -->
						<div class="card-body bg-gray">
							<div class="alert text-danger text-center font-weight-bold">
								<?php echo $msg; ?>
							</div>
							<form method="post" class="form-submit" name="forms" enctype="multipart/form-data" action="">
								<div class="form-group">
									<label for="Registration"><strong class="admin_label text-left">Registration Id:</strong></label>
									<input type="text" class="form-control" name="unique_id" placeholder="User Registration Id" oninput="this.value = this.value.toUpperCase()" required autofocus>
								</div>
								<div class="form-group">
									<label for="Name"><strong class="admin_label text-left">Username :</strong></label>
									<input type="text" class="form-control" name="username" placeholder="Username" required>
								</div>
								<div class="form-group">
									<label for="Password"><strong class="admin_label text-left">Password :</strong></label>
									<span><input type="password" class="form-control" id="pswd"  name="password" placeholder="Password" required></span>
									<div id="pswd_info">
										<h5 class="text-dark">Password requirements</h5>
										<ul class="list-unstyled">
											<li id="letter" class="invalid">At least <strong>one letter</strong></li>
											<li id="capital" class="invalid">At least <strong>one capital letter</strong></li>
											<li id="number" class="invalid">At least <strong>one number</strong></li>
											<li id="length" class="invalid">Be at least <strong>8 characters</strong></li>
										</ul>
									</div>
									<input type="checkbox" onclick="showpassword();">Show Password
								</div>
								<div class="form-group">
									<label for="Role"><strong class="admin_label text-left">Role :</strong></label>
									<select name="role" class="form-control" required>
										<option value="EDITOR"><b>EDITOR</b></option>
										<option value="ADMINISTRATOR"><b>ADMINISTRATOR</b></option>
									</select>
								</div>
								<button class="btn btn-info btn-lg" id="sbt_btn" disabled='disabled'>Submit</button>
							</form>

						</div>
						<!-- End Main Content -->
					</div>
				</div>
			</div>
		</div>
	</div>
    <?php include("../required/footer.php"); ?>
</div>
<?php include("../required/javascript.php"); ?>
	<script>
		function showpassword() {
			"use strict";
			var x = document.getElementById("pswd");

			if (x.type === "password") {
				x.type = "text";
			} 
			else {
				x.type = "password";
			}
		}
	</script>
	<script>
		(function($) {
			"use strict";
			$('input[type=password]').keyup(function() {
				// keyup code here

				// set password variable
				var pswd = $(this).val();

				//validate the length
				if ( pswd.length < 8 ) {
					$('#length').removeClass('valid').addClass('invalid');
				} else {
					$('#length').removeClass('invalid').addClass('valid');
				}

				//validate letter
				if ( pswd.match(/[A-z]/) ) {
					$('#letter').removeClass('invalid').addClass('valid');
				} else {
					$('#letter').removeClass('valid').addClass('invalid');
				}

				//validate capital letter
				if ( pswd.match(/[A-Z]/) ) {
					$('#capital').removeClass('invalid').addClass('valid');
				} else {
					$('#capital').removeClass('valid').addClass('invalid');
				}

				//validate number
				if ( pswd.match(/\d/) ) {
					$('#number').removeClass('invalid').addClass('valid');
				} else {
					$('#number').removeClass('valid').addClass('invalid');
				}

				if(pswd.length >= 8 && pswd.match(/[A-z]/) && pswd.match(/[A-Z]/) && pswd.match(/\d/) ){
					$('#sbt_btn').prop('disabled', false);
				}
				else {
					$('#sbt_btn').prop('disabled', true);
				}

			}).focus(function() {
				$('#pswd_info').show();
			}).blur(function() {
				$('#pswd_info').hide();
			});
		})(jQuery);
	</script>
	</body>
</html>