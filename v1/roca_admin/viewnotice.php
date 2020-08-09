<?php 
	include("config.php");
	include("check.php");

	$sql="SHOW TABLES LIKE 'notice_tbl'";
	$sr=mysqli_query($cn,$sql);

	if(mysqli_num_rows($sr)==0)
	{
		header("location: addnotice.php");
	}
	else
	{
		$sql="select * from notice_tbl order by id DESC";
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
				Notice Details
			</div>
			<table class="table table-striped">
				<thead class="table-dark">
					<tr class="text-info">
						<th scope="col">ID</th>
						<th scope="col">Date</th>
						<th scope="col">Notice</th>
						<th scope="col">Requirement</th>
						<th scope="col">Announcement</th>
						<th scope="col">Venue</th>
						<th scope="col">Day &amp; Time</th>
						<th scope="col">Cost</th>
						<th scope="col">Photo</th>
						<th scope="col">Event</th>
						<th scope="col">Link</th>
						<th scope="col">Update</th>
						<th scope="col">Delete</th>
					</tr>
				</thead>
				<tbody class="table-sm">
					<?php while($db=mysqli_fetch_array($n))
					{
					?>
					<tr class="font-weight-bold">
						<td scope="row"><?php echo $db['id']; ?></td>
						<td><?php echo $db['date']; ?></td>
						<td><p><i><?php echo $db['heading'];?></i></p><?php echo $db['notice'];?></td>
						<td><?php echo $db['requirement'];?></td>
						<td><?php echo $db['announcement'];?></td>
						<td><?php echo $db['venue'];?></td>
						<td><?php echo $db['day']." ".$db['time'];?></td>
						<td><?php echo $db['cost']; ?></td>
						<td><img src="../images/notice/<?php echo $db['photo'];?>" height="100px" alt="No Pic"></td>
						<td><?php echo $db['event']; ?></td>
						<td>
						    <?php if($db['link']==0) { ?>
						    <button class="btn btn-danger" onClick="location.href = 'noticelink.php?id=<?php echo $db['id']; ?>&link=<?php echo $db['link']; ?>'"><?php echo "Deactive"; ?></button>
						    <?php } else { ?>
						    <button class="btn btn-success" onClick="location.href = 'noticelink.php?id=<?php echo $db['id']; ?>&link=<?php echo $db['link']; ?>'"><?php echo "Active"; ?></button>
						    <?php } ?>
						</td>
						<td><a href="updatenotice.php?id=<?php echo $db['id'];?>&pic=<?php echo $db['photo']; ?>">Update</a></td>
						<td><a href="c_deletenotice.php?id=<?php echo $db['id'];?>">Delete</a></td>
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