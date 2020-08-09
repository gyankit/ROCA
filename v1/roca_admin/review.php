<?php 
	include("config.php");
	include("check.php");

	$sql="SHOW TABLES LIKE 'comments_tbl'";
	$sr=mysqli_query($cn,$sql);

	if(mysqli_num_rows($sr)==0)
	{
		?>
		<script>
			alert("No Notification Present");	
			histroy.go(-1;)
		</script>
		<?php
	}
	$msg="";

	$sql="select * from comments_tbl order by id DESC";
	$n=mysqli_query($cn,$sql);

	if($n==false)
	{
		?>
		<script>alert("No Review Present...");history.go(-1);</script>
		<?php
	}
	elseif(mysqli_num_rows($n)==0)
	{
		$msg="No review";
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
			<div class="card-title text-capitalize text-center h2 text-danger font-weight-bold">
				Reviews
			</div>
			<div class="well alert-secondary" style="height: 1000px; overflow-y: scroll">
				<table class="table table-borderless well alert-primary">
					<?php
					while($db=mysqli_fetch_array($n))
					{
						$id=$db['unique_id'];

						$sql1="select * from roca_member_tbl where unique_id='$id'";
						$rs=mysqli_query($cn,$sql1);
						$db1=mysqli_fetch_array($rs);

						?>
						<tbody class="border-bottom border-danger">
							<tr>
								<td>
									<ul class="alert alert-secondary" style="list-style: none; width: auto">
										<li><strong>Name:<br></strong><?php echo $db1['name']; ?></li>
										<li><strong>Roll No:<br></strong><?php echo $db1['roll']; ?></li>
										<li><strong>Department:<br></strong><?php echo $db1['department']; ?></li>
										<li><strong>Date:<br></strong><?php echo $db['date']; ?></li>
									<ul>
								</td>

								<td>
									<p class="alert alert-danger"><strong>Topic : </strong><?php echo $db['topic']; ?></p>
									<p class="alert alert-warning"><?php echo $db['comment']; ?></p>
								</td>
							</tr>
						</tbody>
						<?php
					}
					?>
				</table>
			</div>
		</div>	
	</div>
	<?php include("javascript.php"); ?>
</body>
</html>