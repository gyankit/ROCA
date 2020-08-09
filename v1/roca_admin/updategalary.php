<?php 
	include("config.php");
	include("check.php");
	
	$id=$_REQUEST['id'];

	$sql="SHOW TABLES LIKE 'galary_tbl'";
	$sr=mysqli_query($cn,$sql);

	if(mysqli_num_rows($sr)==0)
	{
		header("location: error.php");
	}

	$sql1="select * from galary_tbl where id='$id'";
	$rs=mysqli_query($cn,$sql1);
	$db=mysqli_fetch_array($rs);
	$event_id=$db['event_id'];

	$sql2="select * from event_tbl where id='$event_id'";
	$rs1=mysqli_query($cn,$sql2);
	$db1=mysqli_fetch_array($rs1);

	$msg="";

	if($_SERVER['REQUEST_METHOD']=='POST')
	{
		
		$fil=$_FILES['fil'];
		$fname=$fil['name'];
		$old=$fil['tmp_name'];
		$new="../images/events/".$fname;
		move_uploaded_file($old,$new);

		$sql="update galary_tbl set galary='$fname' where id='$id'";
		$rd=mysqli_query($cn,$sql);
		if($rd)
		{
			header("location:viewgalary.php");
		}
		else
		{
			$msg="Sorry! Cant Update";
		}
	}
?>

<html lang="en">
<head>
	<?php include("css.php"); ?>
	<title>R O C A</title>
</head>
	
<body>
	<div class="header">
		<?php include("header.php"); ?>
	</div>
	<div class="container">
		<div class="jumbotron">
			<div class="card-title text-capitalize text-center h2">
				Add Event Picture
			</div>
			<div class="alert text-danger text-center font-weight-bold">
				<?php echo $msg; ?>
			</div>
			<form role="form" class="form-submit" method="post" action="" enctype="multipart/form-data">
				<div class="form-group">
					<label for="Notice"><strong class="admin_label text-left">Event :</strong></label>
					<input type="text" class="form-control" value="<?php echo $db1['event'];?>" readonly>
				</div>
				<div class="form-group">
					<label for="Date"><strong class="admin_label text-left">Date :</strong></label>
					<input type="text" class="form-control" value="<?php echo $db1['date'];?>" readonly>
				</div>
				<div class="form-group">
					<label for="Picture"><strong class="admin_label text-left">Picture :</strong></label>
					<div class="input-group">
						<span class="input-group-btn">
							<span class="btn btn-danger btn-file">
								Browse...<input type="file" name="fil" id="imgInp" class="form-control-file" accept="image/*" value="<?php echo $db['galary'];?>" required>
							</span>
						</span>
						<input type="text" class="form-control" value="<?php echo $db['galary'];?>" readonly>
					</div>
					<img src="../images/events/<?php echo $db['galary'];?>" alt="No Pic" id="img-upload">
				</div>
				<button class="btn btn-info btn-lg">Submit</button>
			</form>
		</div>
	</div>
	<?php include("javascript.php"); ?>
</body>
</html>