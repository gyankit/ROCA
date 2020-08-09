<?php 
	include("config.php");
	include("check.php");	
	$date=date('Y-m-d');
	$sql="select * from notice_tbl where date > '$date'";
	$n=mysqli_query($cn,$sql);
	if($n==false) { header("location:addnotice.php"); }
	elseif(mysqli_num_rows($n)==0) { header("location:addnotice.php"); }
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
				Notice Publish
			</div>
			<table class="table table-striped">
				<thead class="table-dark">
					<tr class="text-info">
						<th>Notice</th>
						<th>Publish to Member</th>
						<th>Publish to Subscriber</th>
					</tr>
				</thead>
				<tbody>
				<?php while($db=mysqli_fetch_array($n)) { ?>
					<tr>
						<td><?php echo $db['heading']; ?></td>
						<td>
							<?php if($db['member']==0) { ?>
							<button class="btn btn-warning" onClick="location.href = 'publishmember.php?id=<?php echo $db['id']; ?>'">Click Here</button>
							<?php } else { ?>
							<button class="btn btn-success">Published</button>
							<?php } ?>
						</td>
						<td>
							<?php if($db['subscriber']==0) { ?>
							<button class="btn btn-warning" onClick="location.href = 'publishsubscriber.php?id=<?php echo $db['id']; ?>'">Click Here</button>
							<?php } else { ?>
							<button class="btn btn-success">Published</button>
							<?php } ?>
						</td>
					</tr>
				<?php } ?>
				</tbody>
			</table>
		</div>
	</div>
	<?php include("javascript.php"); ?>
</body>
</html>