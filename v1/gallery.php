<?php
	include("config.php");
	include("check.php");
	$user=$_SESSION['user'];

	$sql="SHOW TABLES LIKE 'gallery_tbl'";
	$sr=mysqli_query($cn,$sql);

	if(mysqli_num_rows($sr)==0)
	{
		header("location: error.php");
	}

	$msg="";

	if($_SERVER["REQUEST_METHOD"]=="POST")
	{
		$year=$_POST['year'];
		$event=$_POST['event'];
	}
	else
	{
		$year= date('Y');
		$sql5="select * from event_tbl";
		$rs4=mysqli_query($cn,$sql5);
		$db4=mysqli_fetch_array($rs4);
		$event=$db4['event'];
	}

	if($year=="")
	{
		$sql4="select * from event_tbl where event='$event'";
	}
	elseif($event=="")
	{
		$sql4="select * from event_tbl where year(date)='$year'";
	}
	else
	{
		$sql4="select * from event_tbl where year(date)='$year' and event='$event'";
	}

	$rs3=mysqli_query($cn,$sql4);
?>

<html lang="en">
<head>
	<?php include("css.php") ?>	
	<title>R O C A</title>
</head>

<body>
	<div class="header">
		<?php include("header.php"); ?>
	</div>
	
	<div class="container-fluid">
		<div class="jumbotron">
			<div class="alert alert-dark">
				<form role="form" class="form-submit" method="post" action="">
					<table class="table table-borderless">
						<tbody>
							<tr>
								<td>
									<select name="event" class="form-control">
										<option value="">Select Event</option>
										<?php
										$sql3="select distinct event from event_tbl";
										$rs2=mysqli_query($cn,$sql3);

										while($db2=mysqli_fetch_array($rs2))
										{
											?>
											<option value="<?php echo $db2['event']; ?>"><?php echo $db2['event']; ?></option>
											<?php
										}
										?>
									</select>
								</td>
								<td>
									<select name="year" class="form-control">
										<option value="">Select Year</option>
										<?php
										$sql2="select distinct year(date) from event_tbl";
										$rs1=mysqli_query($cn,$sql2);

										while($db1=mysqli_fetch_array($rs1))
										{
											?>
											<option value="<?php echo $db1['year(date)']; ?>"><?php echo $db1['year(date)']; ?></option>
											<?php
										}
										?>
									</select>
								</td>
							</tr>
						</tbody>
					</table>
					<button class="btn btn-block btn-info">Search</button>
				</form>
			</div>
			
			<div class="jumbotron-fluid">
				<div class="alert alert-secondary font-weight-bold h5 text-center">
					<?php echo $event." ".$year ?>
				</div>
				<div class="alert text-danger text-center font-weight-bold">
					<?php echo $msg; ?>
				</div>
				<?php
					if(mysqli_num_rows($rs3)==0)
						{
							$msg="Event Pic not Available";
						}
					else
					{
						while($db3=mysqli_fetch_array($rs3))
						{
							$id=$db3['id'];

							$sql1="select * from gallery_tbl where event_id='$id'";
							$rs=mysqli_query($cn,$sql1);

							if(mysqli_num_rows($rs)==0)
							{
								$msg="Event Pic not Available";
							}
							else
							{
							    ?>
							    <div class="alert">
							    <?php
								while($db=mysqli_fetch_array($rs))
								{
									?>
									
										<p><img src="images/events/<?php echo $db['gallery']; ?>" width="100%" alt="No Pic"></p>
									<?php
								}
								?>
								</div>
								<?php
							}
						}
					}
				?>
			</div>
		</div>
	</div>
	
	<div class="footer">
		<?php include("footer.php"); ?>
	</div>
	<?php include("javascript.php"); ?>
</body>
</html>