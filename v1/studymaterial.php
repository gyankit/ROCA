<?php 
	include("config.php");
	include("check.php");
	$user=$_SESSION['user'];

	$sql="SHOW TABLES LIKE 'studymaterial_tbl'";
	$sr=mysqli_query($cn,$sql);

	if(mysqli_num_rows($sr)==0)
	{
		header("location: error.php");
	}

	$date=date('Y-m-d');
	$year=date('Y');

	if($date < "$year-06-30")
	{
		$year=$year-1;
	}

	$sql1="select * from roca_member_tbl where unique_id='$user'";
	$sr1=mysqli_query($cn,$sql1);
	$db=mysqli_fetch_array($sr1);
	$dept=$db['department'];
	$year1=$db['year'];

	$msg="";

	
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
	<div class="container-fluid">
		<div class="jumbotron-fluid">
			<div class="card-title text-capitalize text-center h2">
				Study Material
			</div>
			<div class="alert alert-dark">
				<form role="form" class="form-submit row" method="post" action="">			
					<div class="col-md-3 ftco-animate" style="margin-top: 10px">
						<input type="text" class="form-control" value="<?php echo $dept; ?>" readonly>
					</div>
					<div class="col-md-3 ftco-animate" style="margin-top: 10px">
						<select class="form-control" name="sem">
							<option value=""><strong>Semester</strong></option>
							<?php if($year1==$year) { ?>
							<option value="1st"><strong>1st</strong></option>
							<option value="2nd"><strong>2nd</strong></option>
							<?php } elseif($year1==($year-1)) { ?>
							<option value="3rd"><strong>3rd</strong></option>
							<option value="4th"><strong>4th</strong></option>
							<?php } elseif($year1==($year-2)) { ?>
							<option value="5th"><strong>5th</strong></option>
							<option value="6th"><strong>6th</strong></option>
							<?php } elseif($year1==($year-3)) { ?>
							<option value="7th"><strong>7th</strong></option>
							<option value="8th"><strong>8th</strong></option>
							<?php } ?>
						</select>
					</div>
					<div class="col-md-3 ftco-animate" style="margin-top: 10px">
						<input type="text" class="form-control" name="code" placeholder="Subject Code">
					</div>
					<div class="col-md-3 ftco-animate" style="margin-top: 10px">
						<button class="btn btn-block btn-danger btn-lg"><strong>Search</strong></button>
					</div>
				</form>
			</div>
		</div>	
	</div>	
	
	<div class="container">
		<?php 
		if($_SERVER["REQUEST_METHOD"]=="POST")
		{
			$sem=$_POST['sem'];
			$code=$_POST['code'];

			if($sem=="" and $code=="") {
				$sql2="select * from studymaterial_tbl where department='$dept'";
			}
			elseif($code=="") {
				$sql2="select * from studymaterial_tbl where semester='$sem'";
			}
			elseif($sem=="") {
				$sql2="select * from studymaterial_tbl where code='$code'";
			}
			else {
				$sql2="select * from studymaterial_tbl where department='$dept' and semester='$sem' and code='$code'";
			}

			$rs=mysqli_query($cn,$sql2);
			if($rs) 
			{
				if(mysqli_num_rows($rs)!=0)
				{
					while($db1=mysqli_fetch_array($rs))
					{
					?>
					<div class="alert alert-success float-left text-center font-weight-bold text-danger">
						<?php echo $db1['subject']; ?><br>
						(<?php echo $db1['code']; ?>)<br>
						<?php echo $db1['topic']; ?><br>
						<a href="downloadstudy.php?file=<?php echo $db1['material'];?>"><?php echo $db1['material'];?></a>
					</div>
					<?php
					}
				}
				else
				{
					$msg="No Data Found";
				}
			}
			else
			{
				$msg="No Data Found";	
			}
		}
		if($msg=="") {} else { ?>
		<div class="alert alert-danger">
			<?php echo $msg; ?>
		</div>
		<?php } ?>
	</div>
	<?php include("javascript.php") ?>
</body>
</html>