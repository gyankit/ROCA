<?php
	include("config.php");
	if(!isset($_SESSION['user_login'])) { header("location: index.php"); }
	$sql="SHOW TABLES LIKE 'roca_member_tbl'";
	$sr=mysqli_query($cn,$sql);

	if(mysqli_num_rows($sr)==0)
	{
		?>
		<script>alert("Database Connection Error..."); history.go(-1);</script>
		<?php
	}
	
	$date=date('Y-m-d');
	$year=date('Y');
	if($date < "$year-06-30") {
		$year=$year-1;
	}
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
		<div class="jumbotron bg-info">
			<div class="alert alert-danger">
				<button data-toggle="collapse" data-target="#fourth" class="btn btn-block btn-dark">4th Year</button>
				<div class="collapse" id="fourth">
					<?php
					$year1=$year-3;
					$sql="select * from roca_member_tbl where year='$year1' and coordinator='YES' order by name ASC";
					$rs=mysqli_query($cn,$sql);
					if(mysqli_num_rows($rs)!=0) { ?>
					<br>
					<table class="table table-striped text-dark text-center">
						<thead class="table-dark">
							<tr class="text-info">
								<th scope="col">Name</th>
								<th scope="col">Department</th>
								<th scope="col">Position</th>
							</tr>
						</thead>
						<?php while($db=mysqli_fetch_array($rs)) { ?>
						<tbody class="table-sm table-info">
							<tr>
								<td><?php echo $db['name']; ?></td>
								<td><?php echo $db['department']; ?></td>
								<td><?php
									if($db['head']=="YES") { echo $db['field']." HEAD"; }
									else { echo $db['field']; } ?>
								</td>			
							</tr>
						</tbody>
						<?php } ?>
					</table>
					<?php } ?>
				</div>
			</div>
			<div class="alert alert-danger">
				<button data-toggle="collapse" data-target="#third" class="btn btn-block btn-dark">3rd Year</button>
				<div class="collapse" id="third">
					<?php
					$year1=$year-2;
					$sql="select * from roca_member_tbl where year='$year1' and coordinator='YES' order by name ASC";
					$rs=mysqli_query($cn,$sql);
					if(mysqli_num_rows($rs)!=0) { ?>
					<br>
					<table class="table table-striped text-dark text-center">
						<thead class="table-dark">
							<tr class="text-info">
								<th scope="col">Name</th>
								<th scope="col">Department</th>
								<th scope="col">Position</th>
							</tr>
						</thead>
						<?php while($db=mysqli_fetch_array($rs)) { ?>
						<tbody class="table-sm table-info">
							<tr>
								<td><?php echo $db['name']; ?></td>
								<td><?php echo $db['department']; ?></td>
								<td>Senior Co-ordinator</td>			
							</tr>
						</tbody>
						<?php } ?>
					</table>
					<?php } ?>
				</div>
			</div>
			<div class="alert alert-danger">
				<button data-toggle="collapse" data-target="#second" class="btn btn-block btn-dark">2nd Year</button>
				<div class="collapse" id="second">
					<?php
					$year1=$year-1;
					$sql="select * from roca_member_tbl where year='$year1' and coordinator='YES' order by name ASC";
					$rs=mysqli_query($cn,$sql);
					if(mysqli_num_rows($rs)!=0) { ?>
					<br>
					<table class="table table-striped text-dark text-center">
						<thead class="table-dark">
							<tr class="text-info">
								<th scope="col">Name</th>
								<th scope="col">Department</th>
								<th scope="col">Position</th>
							</tr>
						</thead>
						<?php while($db=mysqli_fetch_array($rs)) { ?>
						<tbody class="table-sm table-info">
							<tr>
								<td><?php echo $db['name']; ?></td>
								<td><?php echo $db['department']; ?></td>
								<td>Junior Co-ordinator</td>			
							</tr>
						</tbody>
						<?php } ?>
					</table>
					<?php } ?>
				</div>
			</div>
		</div>
	</div>	
	<?php include("footer.php"); ?>
	<?php include("javascript.php"); ?>
</body>
</html>