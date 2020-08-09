<?php 
	include("config.php");
	include("check.php");

	$sql="SHOW TABLES LIKE 'gallery_tbl'";
	$sr=mysqli_query($cn,$sql);

	if(mysqli_num_rows($sr)==0)
	{
		header("location: addgallery.php");
	}
	else
	{
		$sql1="select * from gallery_tbl order by id DESC";
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
				Event Galary
			</div>
			<table class="table table-striped">
				<thead class="table-dark">
					<tr class="text-info">
						<th scope="col">ID</th>
						<th scope="col">Event</th>
						<th scope="col">Date</th>
						<th scope="col">Photo</th>
						<th scope="col">Delete</th>
					</tr>
				</thead>
				<tbody class="table-sm">
					<?php while($db=mysqli_fetch_array($n))
					{
						$event_id=$db['event_id'];
						$sql2="select * from event_tbl where id='$event_id'";
						$n2=mysqli_query($cn,$sql2);
						$db1=mysqli_fetch_array($n2);
					?>
					<tr>
						<th scope="row"><?php echo $db['event_id'];?></td>
						<td><?php echo $db1['event']; ?></td>
						<td><?php echo $db1['date']; ?></td>
						<td><img src="../images/events/<?php echo $db['gallery'];?>" height="100px" alt="No Pic"><br><?php echo $db['gallery'];?></td>
						<td><a href="deletegallery.php?id=<?php echo $db['id'];?>&photo=<?php $db['gallery']; ?>">Delete</a></td>
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