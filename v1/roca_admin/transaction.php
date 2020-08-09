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
	<div class="container-fluid">
		<div class="jumbotron-fluid">
			<div class="card-title text-capitalize text-center h2">
				Transaction Details
			</div>
			<?php 
			if(mysqli_num_rows($n)==0) { echo "No Data Found"; }
			else { ?>
			<div class="alert alert-danger text-center">
				<button class="btn btn-danger font-weight-bold h6" onClick="location.href = 'c_transaction.php'">Delete All Transaction Details</button>
			</div>
			<table class="table table-striped">
				<thead class="table-dark">
					<tr class="text-info">
						<th scope="col">Registration Id</th>
						<th scope="col">Name</th>
						<th scope="col">Roll</th>
						<th scope="col">Mode</th>
						<th scope="col">Transaction Id</th>
					</tr>
				</thead>
				<tbody class="table-sm">
					<?php 
					while($db=mysqli_fetch_array($n)) {
					$rid=$db['unique_id'];
					$sql1="select * from roca_member_tbl where unique_id='$rid'";
					$n1=mysqli_query($cn,$sql1);
					$db1=mysqli_fetch_array($n1)
					?>
					<tr class="font-weight-bold">
						<th scope="row"><?php echo $db['unique_id']; ?></td>
						<td><?php echo $db1['name']; ?></td>
						<td><?php echo $db1['roll'];?></td>
						<td><?php echo $db['mode'];?></td>
						<td><?php echo $db['transaction'];?></td>
					</tr>
					<?php } ?>
				</tbody>
			</table>
			<?php } ?>
		</div>
	</div>
	<?php include("javascript.php"); ?>
</body>
</html>