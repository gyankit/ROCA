<?php 
	include("config.php");
	include("check.php");

	$id=$_SESSION['id'];
	$msg="New Administration Admin Must be an Editor Admin";

	$sql="select * from admin_tbl where unique_id='$id'";
	$res=mysqli_query($cn,$sql);
	$db=mysqli_fetch_array($res);

	if($_SERVER['REQUEST_METHOD']=='POST')
	{
		$unique_id=$_POST['unique_id'];
		$username=$_POST['username'];
		$password=$_POST['password'];
		$enpt_pass=md5($password);
		$enpt_user=md5($username);
		
		$sql2="select * from admin_tbl where unique_id='$unique_id' and role='EDITOR'";
		$sr1=mysqli_query($cn,$sql2);
		if(mysqli_num_rows($sr1)==0)
		{
			$msg="Not a valid Registration Id";
		}
		else
		{
			$sql3="delete from admin_tbl where unique_id='$unique_id'";
			if(mysqli_query($cn,$sql3))
			{
				$sql1="update admin_tbl set unique_id='$unique_id', username='$enpt_user', password='$enpt_pass' where unique_id='$id'";
				$rd=mysqli_query($cn,$sql1);
				if($rd)
				{
					?>
					<script>
						alert("Site SuccessFully Transfer to New Administrator");
						window.location.href = "logout.php";
					</script>
					<?php
				}
				else
				{
					$msg="Sorry...Can't Update";
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
</head>
	
<body>
	<div class="header">
		<?php include("header.php"); ?>
	</div>
	<div class="container">
		<div class="jumbotron">
			<div class="card-title text-capitalize text-center h2">
				Transfer Site Admin
			</div>
			<div class="alert text-danger text-center font-weight-bold">
				<?php echo $msg; ?>
			</div>
			<form role="form" class="form-submit" method="post" action="" name="forms" onSubmit="retorn(registration());">
				<div class="form-group">
					<label for="Registration"><strong class="admin_label text-left">Registration Id:</strong></label>
					<input type="text" class="form-control" name="unique_id" value="<?php echo $db['unique_id']; ?>">
				</div>
				<div class="form-group">
					<label for="Name"><strong class="admin_label text-left">Username :</strong></label>
					<input type="text" class="form-control" name="username" placeholder="Username">
				</div>
				<div class="form-group">
					<label for="Password"><strong class="admin_label text-left">Password :</strong></label>
                    <span><input type="password" class="form-control" id="pswd" name="password" placeholder="Password" required></span>
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
					<input type="text" class="form-control" value="<?php echo $db['role']; ?>" readonly>
				</div>
				<button type="submit" class="btn btn-info btn-lg">Submit</button>
			</form>
		</div>
	</div>
	
	<?php include("javascript.php"); ?>
	<script type="text/javascript" src="../js/register.js"></script>
	<script type="text/javascript" src="../js/registration.js"></script>
</body>
</html>