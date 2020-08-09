<?php 
	include("config.php");
	include("check.php");

	$sql="SHOW TABLES LIKE 'roca_member_tbl'";
	$sr=mysqli_query($cn,$sql);

	if(mysqli_num_rows($sr)==0)
	{
		header("location: error.php");
	}
	else
	{
		$sql="select * from roca_member_tbl order by id DESC";
		$n=mysqli_query($cn,$sql);
		
		if($n==false)
		{
			header("location: error.php");
		}
		else if (mysqli_num_rows($n)==0)
		{
			?>
			<script>alert("Database Empty"); history.go(-1);</script>
			<?php
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
				Roca Member List
			</div>
			<table class="table table-striped">
				<thead class="table-dark">
					<tr class="text-info">
						<th scope="col">ID</th>
						<th scope="col">Registraion Id</th>
						<th scope="col">Name</th>
						<th scope="col">Roll no</th>
						<th scope="col">Department</th>
						<th scope="col">Contact</th>
						<th scope="col">Email</th>
						<th scope="col">Joining Date</th>
						<th scope="col">Co-ordinaor</th>
						<th scope="col">Field</th>
						<th scope="col">Photo</th>
						<th scope="col">Payment</th>
					</tr>
				</thead>
				<tbody class="table-sm">
					<?php while($db=mysqli_fetch_array($n))
					{
					?>
					<tr class="font-weight-bold">
						<th scope="row"><?php echo $db['id']; ?></td>
						<td><?php echo $db['unique_id']; ?></td>
						<td><?php echo $db['name']; ?></td>
						<td><?php echo $db['roll']; ?></td>
						<td><?php echo $db['department'];?></td>
						<td><?php echo $db['contact'];?></td>
						<td><?php echo $db['email'];?></td>
						<td><?php echo $db['date'];?></td>
						<td><?php echo $db['coordinator'];?></td>
						<td><?php 
							if($db['coordinator']=="NO") {} 
							else { 
								echo $db['field']." "; 
								if($db['head']=="YES") { echo "HEAD"; } 
								else {} 
							}
							?></td>
						<td><img src="../images/members/<?php echo $db['photo'];?>" height="100px" alt="No Pic"></td>
						<td><?php echo $db['paid']; ?></td>
					</tr>
					<?php
					}
					?>
				</tbody>
			</table>
		</div>
	</div>
	<?php include("javascript.php"); ?>
</body>
</html>