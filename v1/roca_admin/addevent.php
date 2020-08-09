<?php 
	include("config.php");
	include("check.php");

	$sql="SHOW TABLES LIKE 'event_tbl'";
	$sr=mysqli_query($cn,$sql);

	if(mysqli_num_rows($sr)==0)
	{
		$sql1="CREATE TABLE `id8469611_clubroca`.`event_tbl` ( `id` INT(10) NOT NULL AUTO_INCREMENT , `event` VARCHAR(500) NOT NULL , `date` DATE NOT NULL , PRIMARY KEY (`id`))";
		$sr1=mysqli_query($cn,$sql1);
		if($sr1==false)
		{
			header("location: error.php");
		}
	}

	$date=date('Y-m-d');
						
	$msg="";
	if($_SERVER['REQUEST_METHOD']=='POST')
	{
		$event=$_POST['event'];
		$date=$_POST['date'];

		$sql="INSERT INTO event_tbl VALUES(NULL,'$event','$date')";
		$rs=mysqli_query($cn,$sql);
		if ($rs)
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
				Add Event
			</div>
			<div class="alert text-danger text-center font-weight-bold">
				<?php echo $msg; ?>
			</div>
			<form role="form" class="form-submit" method="post" action="">
				<div class="form-group">
					<label for="event"><strong class="admin_label text-left">Event Name :</strong></label>
					<select name="event" class="form-control" required>
						<option value="">Select</option>
						<?php
						$sql1="SELECT heading FROM notice_tbl where date <= '$date' order by id desc";
						$rs=mysqli_query($cn,$sql1);
						while($d=mysqli_fetch_array($rs))
						{
							?>
							<option value="<?php echo $d['heading']; ?>"><?php echo $d['heading']; ?></option>
							<?php
						}
						?>  
					</select>
				</div>
				<div class="form-group">
					<label for="Date"><strong class="admin_label text-left">Date :</strong></label>
					<select name="date" class="form-control" required>
						<option value="">Select</option>
						<?php
						$sql2="SELECT DISTINCT date FROM notice_tbl where date <= '$date' order by id desc";
						$rs1=mysqli_query($cn,$sql2);
						while($d1=mysqli_fetch_array($rs1))
						{
							?>
							<option value="<?php echo $d1['date']; ?>"><?php echo $d1['date']; ?></option>
							<?php
						}
						?>  
					</select>
				</div>
				<button class="btn btn-info btn-lg">Submit</button>
			</form>
		</div>
	</div>
	<?php include("javascript.php"); ?>
</body>
</html>