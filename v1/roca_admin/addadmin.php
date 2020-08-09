<?php 
	include("config.php");
	include("check.php");

	$sql1="select * from admin_tbl";
	$rsq=mysqli_query($cn,$sql1);
	if(mysqli_num_rows($rsq)>=4)
	{
		?>
		<script>alert("Max Admin Present.\nCan't Add More"); history.go(-1);</script>
		<?php
	}

	$msg="";
	if($_SERVER['REQUEST_METHOD']=='POST')
	{
		$unique_id=$_POST['unique_id'];
		$username=$_POST['username'];
		$password=$_POST['password'];
		$role=$_POST['role'];
		
		if($role=="ADMINISTRATOR") {
			$sql3="select * from admin_tbl where role='$role'";
			$sr1=mysqli_query($cn,$sql3);
			if(mysqli_num_rows($sr1)>=2) {
				$msg="One Administrator is Already Present...";
			}
			else {
			    $sql2="select * from roca_member_tbl where unique_id='$unique_id'";
    			$req=mysqli_query($cn,$sql2);
    			if(mysqli_num_rows($req)==0)
    			{	
    				$msg="Not a valid Registration Id";
    			}
    			else
    			{
    				$enpt_user=md5($username);
    				$enpt_pass=md5($password);
    
    				$sql="INSERT INTO admin_tbl VALUES('$unique_id', '$enpt_user', '$enpt_pass', '$role')";
    				$rs=mysqli_query($cn,$sql);
    				if ($rs)
    				{
    					header("location: viewadmin.php");
    				}
    				else
    				{
    					$msg="Details Already Exists";
    				}
    			}
			}
		}
		else {
			$sql2="select * from roca_member_tbl where unique_id='$unique_id'";
			$req=mysqli_query($cn,$sql2);
			if(mysqli_num_rows($req)==0)
			{	
				$msg="Not a valid Registration Id";
			}
			else
			{
				$enpt_user=md5($username);
				$enpt_pass=md5($password);

				$sql="INSERT INTO admin_tbl VALUES('$unique_id', '$enpt_user', '$enpt_pass', '$role')";
				$rs=mysqli_query($cn,$sql);
				if ($rs)
				{
					header("location: viewadmin.php");
				}
				else
				{
					$msg="Details Already Exists";
				}
			}	
		}
	}
?>

<html lang="en">
<head>
	<?php include("css.php"); ?>
	<title>R O C A</title>
	<link rel="stylesheet" href="../css/password.css">
	<link rel="stylesheet" href="../css/preview.css">
</head>
	
<body>
	<div class="header">
		<?php include("header.php"); ?>
	</div>
	<div class="container">
		<div class="jumbotron">
			<div class="card-title text-capitalize text-center h2">
				Add New Admin
			</div>
			<div class="alert text-danger text-center font-weight-bold">
				<?php echo $msg; ?>
			</div>
			<form role="form" class="form-submit" method="post" action="">
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
						<h5>Password requirements:</h5>
						<ul>
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
	</div>
	
	<?php include("javascript.php"); ?>

	<script type="text/javascript" src="../js/register.js"></script>
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

				if(pswd.length > 8 && pswd.match(/[A-z]/) && pswd.match(/[A-Z]/) && pswd.match(/\d/) ){
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