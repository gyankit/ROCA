<?php 
	include("config.php");
	include("check.php");
	$id=$_REQUEST['id'];

	$sql="select * from coordinators_tbl where unique_id='$id'";
	$n=mysqli_query($cn,$sql);
	if($n==false)
	{
		header("location:addevent.php");
	}
	elseif(mysqli_num_rows($n)==0)
	{
		header("location:addevent.php");
	}
	else
	{
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
			<div class="alert alert-warning text-center">
				<p><span class="float-left">Registration Id</span><i class="float-right font-weight-bold text-dark"><?php echo $db['unique_id']; ?></i></p><br>
				<p><span class="float-left">Event</span><i class="float-right font-weight-bold text-dark"><?php echo $db['field']; if($db['head']=="YES") { echo " Head"; } else {}; ?></i></p><br>
				
				<p class="text-danger h4 text-center">Are You Sure, You Want to Remove it from Co-ordinator Post.</p>
			</div>
			<div class="alert">
				<button class="btn btn-success btn-lg float-left col-5"><a class="text-white font-weight-bold text-capitalize" href="javascript:history.go(-1);">Cancel</a></button>
				<button class="btn btn-danger btn-lg float-right col-5"><a class="text-white font-weight-bold text-capitalize" href="deleteco.php?id=<?php echo $id; ?>">Delete</a></button>
			</div>
		</div>
	</div>
	<?php include("javascript.php"); ?>
</body>
</html>