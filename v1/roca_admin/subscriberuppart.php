<?php
	include("config.php");
	include("check.php");

	$date=date('Y-m-d');
	$sql="select * from notice_tbl where date >= '$date' order by id desc";
	$rs=mysqli_query($cn,$sql);
	if($rs==false)
	{
		?>
		<script>alert("No Upcomming Event Present..."); history.go(-1);</script>
		<?php
	}
	elseif(mysqli_num_rows($rs)==0)
	{
		?>
		<script>alert("No Upcomming Event Present..."); history.go(-1);</script>
		<?php
	}
	else
	{
?>

<html lang="en">
<head>
	<?php include("css.php") ?>	
	<title>R O C A</title>
</head>

<body>
	<?php include("header.php"); ?>
	
	
	<div class="container-fluid">
		<div class="jumbotron-fluid">
			<?php while($db=mysqli_fetch_array($rs)) {
				$eid=$db['id'];
				$event=$db['heading'];
				?>
				<div class="alert alert-danger">
					<button data-toggle="collapse" data-target="#<?php echo $eid ?>" class="btn btn-block btn-dark"><?php echo $event; ?></button>

					<div class="collapse" id="<?php echo $eid; ?>">
					    <?php 
					    $sql2="select * from participation_tbl where id='$eid'";
						$sr1=mysqli_query($cn,$sql2);
					    if($sr1==true) { ?>
						<div class="alert alert-success h4 font-weight-bold">
						    Total : <span><?php echo mysqli_num_rows($sr1); ?></span>
							<button class="btn float-right text-danger font-weight-bold" onClick="location.href = 'excel.php?id=subscriber&event=<?php $event; ?>&eid=<?php echo $eid; ?>';">Excel
							</button>
						</div>
						<br>
						<table class="table table-striped text-dark text-center">
							<thead class="table-dark">
								<tr class="text-info">
									<th scope="col">Name</th>
									<th scope="col">Roll</th>
									<th scope="col">Email</th>
									<th scope="col">Date</th>
									<th scope="col">Mode</th>
									<th scope="col">Transaction</th>
									<th scope="col">Paid</th>
								</tr>
							</thead>
							<?php
							if(mysqli_num_rows($sr1) != 0) {
							while($db1=mysqli_fetch_array($sr1)) { ?>
							<tbody class="table-sm table-info">
								<tr>
									<td><?php echo $db1['name']; ?></td>
									<td><?php echo $db1['roll']; ?></td>
									<td><?php echo $db1['email']; ?></td>			
									<td><?php echo $db1['date']; ?></td>
									<td><?php echo $db1['mode']; ?></td>
									<td><?php echo $db1['transaction']; ?></td>			
									<td>
										<?php if($db1['paid']=="NO") { ?>
										<button class="btn btn-danger"><a class="text-white" href = "eventsubconfirm.php?email=<?php echo $db1['email']; ?>&event=<?php echo $event; ?>&name=<?php echo $db1['name']; ?>&roll=<?php echo $db1['roll']; ?>&eid=<?php echo $eid; ?>">NO</a></button>
										<?php } else { ?>
										<button class="btn btn-success">YES</button>
										<?php } ?>
									</td>	
								</tr>
							</tbody>
							<?php } } ?>
						</table>
						<?php } ?>
					</div>
				</div>
			<?php } ?>
		</div>
	</div>
	<?php include("javascript.php"); ?>
</body>
</html>

<?php } ?>