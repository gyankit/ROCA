<?php
	include("config.php");
	include("check.php");
	$id=$_SESSION['id']; 
	
	$sql="SHOW TABLES LIKE 'payment_tbl'";
	$sr=mysqli_query($cn,$sql);
	if(mysqli_num_rows($sr)==0) {
		?><script>
			alert("Add Payment Method First...");
			window.location.href = "addpay.php";
		</script><?php
	}
	else {
	    $sqql="Select * from payment_tbl";
	    $srr=mysqli_query($cn,$sqql);
	    if(mysqli_num_rows($srr)==0) {
	        ?><script>
    			alert("Add Payment Method First...");
    			window.location.href = "addpay.php";
    		</script><?php 
	    }
	}

	$sql="SHOW TABLES LIKE 'registration_tbl'";
	$sr=mysqli_query($cn,$sql);
	if(mysqli_num_rows($sr)!=0)
	{
		?>
		<script>
			alert("Registration Process is Already Started");
			history.go(-1);
		</script>
		<?php
	}

	$msg="";
	if($_SERVER['REQUEST_METHOD']=='POST')
	{
		$amount=$_POST['amount'];
		
		$sql="create table `id8469611_clubroca`.`registration_tbl`(`amount` INT(3) NOT NULL)";
		if(mysqli_query($cn,$sql))
		{
			$sql1="insert into registration_tbl values('$amount')";
			if(mysqli_query($cn,$sql1))
			{
				?><script>
					alert("Registration Successfully Start...");
					window.location.href = "adduser.php";
				</script><?php
			}
			else
			{
				$msg="Error in Amount Update...";
			}
		}
		else
		{
			$msg="Error in Table Creation...";
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
		<div class="jumbotron card-title text-capitalize text-center h2 text-danger font-weight-bold">
			ROCA REGISTRATION PROCESS
		</div>
		<div class="jumbotron">
			<div class="alert alert-warning"><?php echo $msg; ?></div>
			<div class="alert alert-success">
				<form role="form" class="form-submit" method="post" action="">
					<div class="form-group">
						<label for="Registration"><strong class="admin_label text-left">Registration Amount:</strong></label>
						<input type="text" class="form-control" name="amount" placeholder="Registration Cost for each Student" required autofocus>
					</div>
					<button class="btn btn-info btn-lg" id="sbt_btn">Submit</button>
				</form>
			</div>
			<div class="alert alert-danger text-center">
				<p class="text-dark">To Stop Registration</p>
				<button class="btn btn-danger btn-block"><a class="text-white font-weight-bold" href="regstop.php">Clich Here</a></button>
			</div>
		</div>
		
	</div>
	<?php include("javascript.php") ?>
</body>
</html>