<?php
	include("config.php");
	include("check.php");
	$user=$_SESSION['user'];	

	$sql="SHOW TABLES LIKE 'comments_tbl'";
	$sr=mysqli_query($cn,$sql);
	if(mysqli_num_rows($sr)==0)
	{
		header("location: review.php");
	}

	$msg="";
	$sql2="select * from roca_member_tbl where unique_id='$user'";
	$rs=mysqli_query($cn,$sql2);
	$db=mysqli_fetch_array($rs);

	if($_SERVER["REQUEST_METHOD"]=="POST")
	{
		$topic=$_POST['topic'];
		$view=$_POST['view'];
		date_default_timezone_set("Asia/Kolkata");
		$date=date("Y-m-d h:i:s");

		$sql3="INSERT INTO comments_tbl VALUES(NULL,'$date','$topic','$view','$user')";
		$rs1=mysqli_query($cn,$sql3);
		if ($rs1)
		{
			header("location:review.php");
		}
		else
		{
			$msg="Error Occur....Try After Sometime..!!!";
		}
	}
?>

<html lang="en">
<head>
	<?php include("css.php") ?>	
	<title>R O C A</title>
</head>

<body>
	<div class="header">
		<?php include("header.php"); ?>
	</div>

	<div class="container">
		<div class="jumbotron">
			<div class="card-title text-capitalize text-center h2 font-weight-bold">
				Review Form
			</div>
			<div class="alert text-danger text-center font-weight-bold">
				<?php echo $msg; ?>
			</div>

			<form role="form" class="form-submit alert alert-warning" method="post" action="">
				<table class="table table-borderless">
					<tbody class="text-center">
						<tr>
							<td><label for="name"><strong class="admin_label text-left">Name :</strong></label></td>
							<td><input type="text" class="form-control" value="<?php echo $db['name']; ?>" readonly></td>
						</tr>
						<tr>
							<td><label for="roll"><strong class="admin_label text-left">Roll No :</strong></label></td>
							<td><input type="text" class="form-control" value="<?php echo $db['roll']; ?>" readonly></td>
						</tr>
						<tr>
							<td><label for="topic"><strong class="admin_label text-left">Topic :</strong></label></td>
							<td><input type="text" class="form-control" name="topic" placeholder="Regarding which Topic" required></td>
						</tr>
						<tr>
							<td><label for="comment"><strong class="admin_label text-left">Review :</strong></label></td>
							<td><textarea placeholder="Your Views" name="view" class="form-control" style="height: 100px; font-size: 12px"></textarea></td>
						</tr>
					</tbody>	
				</table>
				<button class="btn btn-block btn-info">SUBMIT</button>	
			</form>
		</div>
	</div>

	<div class="footer">
		<?php include("footer.php"); ?>
	</div>	
	<?php include("javascript.php"); ?>
</body>
</html>