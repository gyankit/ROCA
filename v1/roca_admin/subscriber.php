<?php 
	include("config.php");
	include("check.php");

	$sql="SHOW TABLES LIKE 'subscriber_tbl'";
	$sr=mysqli_query($cn,$sql);
	if(mysqli_num_rows($sr)==0)
	{
		?>
		<script>
			alert("No Subscriber Present..."); history.go(-1);
		</script>
		<?php
	}
	else
	{
		$sql1="select * from subscriber_tbl";
		$sr1=mysqli_query($cn,$sql1);	
		if(mysqli_num_rows($sr1)==0)
		{
			?>
			<script>
				alert("No Subscriber Present..."); history.go(-1);
			</script>
			<?php
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
	<div class="container">
		<div class="jumbotron">
			<div class="card-title text-capitalize text-center h2">
				ROCA Subscriber List
			</div>
			<div class="alert alert-success text-center font-weight-bold text-dark">
				Total No of Subscriber : <?php echo mysqli_num_rows($sr1); ?>
			</div>
			<table class="table table-striped text-center">
				<thead class="table-dark">
					<tr class="text-info">
						<th scope="col">Email</th>
					</tr>
				</thead>
				<tbody class="table-sm">
					<?php while($db=mysqli_fetch_array($sr1)) { ?>
					<tr><td scope="row"><?php echo $db['email'];?></td></tr>
					<?php } ?>
				</tbody>
			</table>
		</div>
	</div>
	<?php include("javascript.php"); ?>
</body>
</html>