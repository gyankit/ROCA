<?php 
	include("config.php");
	include("check.php");
	
	$id=$_REQUEST['id'];

	$sql="SHOW TABLES LIKE 'study_tbl'";
	$sr=mysqli_query($cn,$sql);

	if(mysqli_num_rows($sr)==0)
	{
		header("location: error.php");
	}

	$sql1="select * from study_tbl where id='$id'";
	$rs=mysqli_query($cn,$sql1);
	$db=mysqli_fetch_array($rs);

	$msg="";

	if($_SERVER['REQUEST_METHOD']=='POST')
	{
		
		$fil=$_FILES['fil'];
		$fname=$fil['name'];
		$old=$fil['tmp_name'];
		$new="../images/study/".$fname;
		move_uploaded_file($old,$new);

		$sql="update study_tbl set material='$fname' where id='$id'";
		$rd=mysqli_query($cn,$sql);
		if($rd)
		{
			header("location:viewstudy.php");
		}
		else
		{
			$msg="Sorry! Cant Update";
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
				Update Study Material
			</div>
			<div class="alert text-danger text-center font-weight-bold">
				<?php echo $msg; ?>
			</div>
			<form role="form" class="form-submit" method="post" action="" enctype="multipart/form-data">
				<div class="form-group">
					<label for="Department"><strong class="admin_label text-left">Department :</strong></label>
					<input type="text" class="form-control" value="<?php echo $db['department'];?>" readonly>
				</div>
				<div class="form-group">
					<label for="Year"><strong class="admin_label text-left">Year :</strong></label>
					<input type="text" class="form-control" value="<?php echo $db['year'];?>" readonly>
				</div>
				<div class="form-group">
					<label for="Semester"><strong class="admin_label text-left">Semester :</strong></label>
					<input type="text" class="form-control" value="<?php echo $db['semester'];?>" readonly>
				</div>
				<div class="form-group">
					<label for="Subject"><strong class="admin_label text-left">Subject &amp; Code :</strong></label>
					<input type="text" class="form-control" value="<?php echo $db['code']."-".$db['subject'];?>" readonly>
				</div>
				<div class="form-group">
					<label for="Material"><strong class="admin_label text-left">Material :</strong></label>
					<div class="input-group">
						<span class="input-group-btn">
							<span class="btn btn-danger btn-file">
								Browse...<input type="file" name="fil" id="imgInp" class="form-control-file" accept="application/*" value="<?php echo $db['material'];?>" required>
							</span>
						</span>
						<input type="text" class="form-control" value="<?php echo $db['material'];?>" readonly>
					</div>
				</div>
				<button class="btn btn-info btn-lg">Submit</button>
			</form>
		</div>
	</div>
</body>
</html>