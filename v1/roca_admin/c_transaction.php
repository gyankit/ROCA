<?php 
	include("config.php");
	include("check.php");

	$sql="SHOW TABLES LIKE 'member_register_tbl'";
	$sr=mysqli_query($cn,$sql);
	if(mysqli_num_rows($sr)==0) {
		?><script>alert("No Transaction Details Found...");history.go(-1);</script><?php
	} else {
		$sql="select * from member_register_tbl";
		$n=mysqli_query($cn,$sql);		
		if($n==false) { header("location: error.php"); }
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
		<div class="jumbotron alert-danger">
			<div class="alert h5 text-center">
				Are you Confirm to Delete All ROCA Member Registration Transaction Details<br><br>
				<button class="btn btn-danger h4 float-right" onClick="location.href = 'deleteregistration.php'">Confirm Delete</button>
				<button class="btn btn-danger h4 float-left" onClick="javascript: history.go(-1);">Go Back</button>
			</div>
		</div>
	</div>
	<?php include("javascript.php"); ?>
</body>
</html>