<?php 
	include("config.php");
	include("check.php");
	$id=$_REQUEST['id'];

	$sql="select * from notice_tbl where id='$id'";
	$n=mysqli_query($cn,$sql);
	if($n==false)
	{
		header("location:addnotice.php");
	}
	elseif(mysqli_num_rows($n)==0)
	{
		header("location:addnotice.php");
	}
	else{
		$db=mysqli_fetch_array($n);
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
	<div class="jumbotron-fluid">
			<div class="card-title text-capitalize text-center h2">
				Delete Confirmation
			</div>
			<div class="alert alert-warning">
				<p><span class="float-left">Date</span><i class="float-right font-weight-bold text-dark"><?php echo $db['date']; ?></i></p><br>
				<p><span class="float-left">Day</span><i class="float-right font-weight-bold text-dark"><?php echo $db['day']; ?></i></p><br>
				<p><span class="float-left">Time</span><i class="float-right font-weight-bold text-dark"><?php echo $db['time']; ?></i></p><br>
				<p><span class="float-left">Venue</span><i class="float-right font-weight-bold text-dark"><?php echo $db['venue']; ?></i></p><br>
				<p><span class="float-left">Heading</span><i class="float-right font-weight-bold text-dark"><?php echo $db['heading']; ?></i></p><br>
				<p><span class="float-left">Notice</span><i class="float-right font-weight-bold text-dark"><?php echo $db['notice']; ?></i></p><br>
				<p><span class="float-left">Requirement</span><i class="float-right font-weight-bold text-dark"><?php echo $db['requirement']; ?></i></p><br>
				<p><span class="float-left">College Joining</span><i class="float-right font-weight-bold text-dark"><?php echo $db['cost']; ?></i></p><br>
				<p><img src="../images/notice/<?php echo $db['photo']; ?>" alt="No Pic" width="300px"></p><br>
				
				<p class="text-danger h4 text-center">Are You Sure, You Want to Delete this Event Notice.</p>
			</div>
			<div class="alert">
				<button class="btn btn-success btn-lg float-left col-5"><a class="text-white font-weight-bold text-capitalize" href="javascript:history.go(-1);">Cancel</a></button>
				<button class="btn btn-danger btn-lg float-right col-5"><a class="text-white font-weight-bold text-capitalize" href="deletenotice.php?id=<?php echo $id;?>&pic=<?php echo $db['photo']; ?>">Delete</a></button>
			</div>
		</div>
	</div>
	<?php include("javascript.php"); ?>
</body>
</html>