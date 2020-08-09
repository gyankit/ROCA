<?php 
	include("config.php");
	include("check.php");

	$sql="SHOW TABLES LIKE 'payment_tbl'";
	$sr=mysqli_query($cn,$sql);

	if(mysqli_num_rows($sr)==0)
	{
		header("location: adddonate.php");
	}
	else
	{
		$sql1="select * from payment_tbl order by id DESC";
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
				Payment Mode Available
			</div>
			<table class="table table-striped">
				<thead class="table-dark">
					<tr class="text-info">
						<th scope="col">ID</th>
						<th scope="col">Mode</th>
						<th scope="col">UPI</th>
						<th scope="col">Qr-Code</th>
						<th scope="col">Update</th>
						<th scope="col">Delete</th>
					</tr>
				</thead>
				<tbody class="table-sm">
					<?php while($db=mysqli_fetch_array($n))
					{
					?>
					<tr>
						<th scope="row"><?php echo $db['id'];?></td>
						<td><?php echo $db['mode']; ?></td>
						<td><?php echo $db['upi'] ?></td>
						<td><img src="../images/payment/<?php echo $db['qr_code'];?>" height="100px" alt="No Pic"><br></td>
						<td><a href="updatepay.php?id=<?php echo $db['id'];?>&photo=<?php $db['qr_code']; ?>">Update</a></td>
						<td><a href="deletepay.php?id=<?php echo $db['id'];?>&photo=<?php $db['qr_code']; ?>">Delete</a></td>
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