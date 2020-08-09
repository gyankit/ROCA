<?php 
	include("config.php");
	include("check.php");

	$msg="";
	$id=$_REQUEST['id'];

	$sql="select * from admin_tbl where id='$id'";
	$res=mysqli_query($cn,$sql);
	$db=mysqli_fetch_array($res);

	if($_SERVER['REQUEST_METHOD']=='POST')
	{
		$username=$_POST['username'];
		$password=$_POST['password'];

		$sql1="update admin_tbl set username='$username', password='$password' where id='$id'";
		$rd=mysqli_query($cn,$sql1);
		if($rd)
		{
			header("location: viewadmin.php");
		}
		else
		{
			$msg="Sorry...Can't Update";
		}	
	}
?>

<html lang="en">
<head>
	<?php include("file.php"); ?>
	<title>R O C A</title>
</head>
	
<body>
	<div class="header">
		<?php include("header.php"); ?>
	</div>
	<div class="container">
		<div class="jumbotron">
			<div class="card-title text-capitalize text-center h2">
				Update Admin
			</div>
			<div class="alert text-danger text-center font-weight-bold">
				<?php echo $msg; ?>
			</div>
			<form role="form" class="form-submit" method="post" action="">
				<div class="form-group">
					<label for="Registration"><strong class="admin_label text-left">Registration Id:</strong></label>
					<input type="text" class="form-control" name="unique_id" value="<?php echo $db['unique_id']; ?>" readonly>
				</div>
				<div class="form-group">
					<label for="Name"><strong class="admin_label text-left">Full Name :</strong></label>
					<input type="text" class="form-control" name="fullname" value="<?php echo $db['name']; ?>">
				</div>
				
				<button class="btn btn-info btn-lg">Submit</button>
			</form>
		</div>
	</div>
</body>
</html>