<?php 
	include("config.php");
	include("check.php");

	$sql="SHOW TABLES LIKE 'admin_tbl'";
	$sr=mysqli_query($cn,$sql);

	if(mysqli_num_rows($sr)==0)
	{
		header("location: addadmin.php");
	}
	else
	{
		$sql1="select * from admin_tbl";
		$n=mysqli_query($cn,$sql1);
		if($n==false)
		{
			header("location: error.php");
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
	<div class="container-fluid">
		<div class="jumbotron-fluid">
			<div class="card-title text-capitalize text-center h2">
				Admin Details
			</div>
			<table class="table table-striped">
				<thead class="table-dark">
					<tr class="text-info">
						<th scope="col">Registraion Id</th>
						<th scope="col">Name</th>
						<th scope="col">Contact</th>
						<th scope="col">Email Id</th>
						<th scope="col">Photo</th>
						<th scope="col">Role</th>
						<th scope="col">Delete</th>
					</tr>
				</thead>
				<tbody class="table-sm">
					<?php while($db=mysqli_fetch_array($n))
					{
					if($db['unique_id']=="ROCA2019") { continue; }
					else {
						$id=$db['unique_id'];
						$sql2="select * from roca_member_tbl where unique_id='$id'";
						$sr2=mysqli_query($cn,$sql2);
						$db1=mysqli_fetch_array($sr2);
					?>
					<tr class="font-weight-bold">
						<td><?php echo $db['unique_id']; ?></td>
						<td><?php echo $db1['name']; ?></td>
						<td><?php echo $db1['contact'];?></td>
						<td><?php echo $db1['email'];?></td>
						<td><img src="../images/members/<?php echo $db1['photo'];?>" height="100px" alt="No Pic"></td>
						<td><?php echo $db['role'];?></td>
						<?php if($db['role']=="ADMINISTRATOR") { } else { ?>
						<td><a href="c_deleteadmin.php?id=<?php echo $db['unique_id'];?>&role=<?php echo $db['role']; ?>">Delete</a></td>
						<?php } ?>
					</tr>
					<?php
					} }
					?>
				</tbody>
			</table>
		</div>
	</div>
	<?php include("javascript.php"); ?>
</body>
</html>