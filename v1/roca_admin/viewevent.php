<?php 
	include("config.php");
	include("check.php");

	$sql="SHOW TABLES LIKE 'event_tbl'";
	$sr=mysqli_query($cn,$sql);

	if(mysqli_num_rows($sr)==0)
	{
		header("location: addevent.php");
	}
	else
	{
		$sql="select * from event_tbl order by id DESC";
		$n=mysqli_query($cn,$sql);
		
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
				Event Details
			</div>
			<table class="table table-striped">
				<thead class="table-dark">
					<tr class="text-info">
						<th scope="col">ID</th>
						<th scope="col">Date</th>
						<th scope="col">Event</th>
						<th scope="col">Update</th>
						<th scope="col">Delete</th>
					</tr>
				</thead>
				<tbody class="table-sm">
					<?php while($db=mysqli_fetch_array($n))
					{
					?>
					<tr class="font-weight-bold">
						<th scope="row"><?php echo $db['id']; ?></td>
						<td><?php echo $db['date']; ?></td>
						<td><?php echo $db['event'];?></td>
						<td><a href="updateevent.php?id=<?php echo $db['id'];?>">Update</a></td>
						<td><a href="deleteevent.php?id=<?php echo $db['id'];?>">Delete</a></td>
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