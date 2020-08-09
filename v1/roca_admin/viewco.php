<?php 
	include("config.php");
	include("check.php");

	$sql="SHOW TABLES LIKE 'coordinators_tbl'";
	$sr=mysqli_query($cn,$sql);

	if(mysqli_num_rows($sr)==0)
	{
		header("location: addco.php");
	}
	else
	{
		$sql1="select * from coordinators_tbl order by id DESC";
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
	
<body><div class="header">
		<?php include("header.php"); ?>
	</div>
	<div class="container-fluid">
		<div class="jumbotron-fluid">
			<div class="card-title text-capitalize text-center h2">
				ROCA Co-ordinators
			</div>
			<table class="table table-striped">
				<thead class="table-dark">
					<tr class="text-info">
						<th scope="col">ID</th>
						<th scope="col">Unique_id</th>
						<th scope="col">Field</th>
						<th scope="col">Head of Field</th>
						<th scope="col">Update</th>
						<th scope="col">Delete</th>
					</tr>
				</thead>
				<tbody class="table-sm">
					<?php while($db1=mysqli_fetch_array($n))
					{
					?>
					<tr>
						<th scope="row"><?php echo $db1['id'];?></td>
						<td><?php echo $db1['unique_id']; ?></td>
						<td><?php echo $db1['field']; ?></td>
						<td><?php echo $db1['head']; ?></td>
						<td><a class="text-danger font-weight-bold" href="updateco.php?id=<?php echo $db1['unique_id'];?>">Update</a></td>
						<td><a class="text-danger font-weight-bold" href="c_deleteco.php?id=<?php echo $db1['unique_id'];?>">Delete</a></td>
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