<?php 
	include("config.php");
	include("check.php");
	
	$id=$_REQUEST['id'];

	$sql="select * from roca_member_tbl where unique_id='$id'";
	$n=mysqli_query($cn,$sql);
	if($n==false)
	{
		header("location:adduser.php");
	}
	elseif(mysqli_num_rows($n)==0)
	{
		header("location:adduser.php");
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
				<p><span class="float-left">Registration Id</span><i class="float-right font-weight-bold text-dark"><?php echo $db['unique_id']; ?></i></p><br>
				<p><span class="float-left">Name</span><i class="float-right font-weight-bold text-dark"><?php echo $db['name']; ?></i></p><br>
				<p><span class="float-left">Roll No</span><i class="float-right font-weight-bold text-dark"><?php echo $db['roll']; ?></i></p><br>
				<p><span class="float-left">Contact</span><i class="float-right font-weight-bold text-dark"><?php echo $db['contact']; ?></i></p><br>
				<p><span class="float-left">Email Id</span><i class="float-right font-weight-bold text-dark"><?php echo $db['email']; ?></i></p><br>
				<p><span class="float-left">ROCA Joining</span><i class="float-right font-weight-bold text-dark"><?php echo $db['date']; ?></i></p><br>
				<p><span class="float-left">College Joining</span><i class="float-right font-weight-bold text-dark"><?php echo $db['year']; ?></i></p><br>
				<p><img src="../images/members/<?php echo $db['photo']; ?>" alt="No Pic" width="300px"></p><br>
				
				<p class="text-danger h4 text-center">Are You Sure, You Want to Delete this Register User.</p>
			</div>
			<div class="alert">
				<button class="btn btn-success btn-lg float-left col-5"><a class="text-white font-weight-bold text-capitalize" href="javascript:history.go(-1);">Cancel</a></button>
				<button class="btn btn-danger btn-lg float-right col-5"><a class="text-white font-weight-bold text-capitalize" href="deleteuser.php?id=<?php echo $id;?>&pic=<?php echo $db['photo']; ?>">Delete</a></button>
			</div>
			<br>
			<br>
		</div>
	</div>
	<?php include("javascript.php"); ?>
</body>
</html>