<?php 
	include("config.php");
	include("check.php");

	$id=$_REQUEST['id'];

	$sql="SHOW TABLES LIKE 'event_tbl'";
	$sr=mysqli_query($cn,$sql);

	if(mysqli_num_rows($sr)==0)
	{
		header("location: error.php");
	}
	else
	{	
		$sql="SELECT * FROM event_tbl WHERE id='$id'";
		$res=mysqli_query($cn,$sql);
		$db=mysqli_fetch_array($res);
	}

	$msg="";
	if($_SERVER['REQUEST_METHOD']=='POST')
	{
		$event=$_POST['event'];

		$sql1="UPDATE event_tbl SET event='$event' WHERE id='$id'";
		$rs=mysqli_query($cn,$sql1);
		if($rs==true)
		{
			header("location: viewevent.php");
		}
		else
		{
			$msg="Error Occur....Try After Sometime..!!!";
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
				Add Notice
			</div>
			<div class="alert text-danger text-center font-weight-bold">
				<?php echo $msg; ?>
			</div>
			<form role="form" class="form-submit" method="post" action="">
				<div class="form-group">
					<label for="Date"><strong class="admin_label text-left">Date :</strong></label>
					<input type="text" class="form-control" value="<?php echo $db['date']; ?>" readonly>
				</div>
				<div class="form-group">
					<label for="Notice"><strong class="admin_label text-left">Notice :</strong></label>
					<input type="text" class="form-control" name="event" value="<?php echo $db['event']; ?>" required autofocus>
				</div>
				<button class="btn btn-info btn-lg">Submit</button>
			</form>
		</div>
	</div>
	<?php include("javascript.php"); ?>
</body>
</html>