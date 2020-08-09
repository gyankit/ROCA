<?php 
	include("config.php");
	include("check.php");

	$sql="SHOW TABLES LIKE 'roca_member_tbl'";
	$sr=mysqli_query($cn,$sql);

	if(mysqli_num_rows($sr)==0)
	{
		header("location: adduser.php");
	}
	else
	{
		$date=date('Y-m-d');
		$year=date('Y');
		if($date < "$year-06-30") {
			$year=$year-1;
		}	
		$year=$year-3;
		
		$sql1="select * from roca_member_tbl where year >= '$year'  order by unique_id DESC";
		$n=mysqli_query($cn,$sql1);		
		if($n==false) {
			header("location: error.php");
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
	<div class="container-fluid">
		<div class="jumbotron-fluid">
			<div class="card-title text-capitalize text-center h2">
				Current 4 Year ROCA Memebrs
			</div>
			<div class="alert alert-success h4 font-weight-bold">
				Total : <span><?php echo mysqli_num_rows($n); ?></span>
				<button class="btn float-right text-danger font-weight-bold" onClick="location.href = 'excel.php?id=user';">Excel
				</button>
			</div>
			<table class="table table-striped">
				<thead class="table-dark">
					<tr class="text-info">
						<th scope="col">Registration id</th>
						<th scope="col">Name</th>
						<th scope="col">Roll No</th>
						<th scope="col">Department</th>
						<th scope="col">Contact</th>
						<th scope="col">Email</th>
						<th scope="col">Photo</th>
						<th scope="col">Paid</th>
						<th scope="col">Update</th>
						<th scope="col">Delete</th>
					</tr>
				</thead>
				<tbody class="table-sm">
					<?php while($db1=mysqli_fetch_array($n))
					{
					?>
					<tr>
						<td><?php echo $db1['unique_id']; ?></td>
						<td><?php echo $db1['name']; ?></td>
						<td><?php echo $db1['roll']; ?></td>
						<td><?php echo $db1['department']; ?></td>
						<td><?php echo $db1['contact']; ?></td>
						<td><?php echo $db1['email']; ?></td>
						<td><img src="../images/members/<?php echo $db1['photo'];?>" height="100px" alt="No Pic"></td>
					    <td>
							<?php 
							if($db1['paid']=="NO")
							{
								?>
								<button class="btn btn-warning"><a class="text-dark font-weight-bold" href="confirmation.php?id=<?php echo $db1['unique_id']; ?>"><?php echo $db1['paid']; ?></a></button>
								<?php
							}
							elseif($db1['paid']=="YES")
							{
								?>
								<button class="btn btn-success text-dark font-weight-bold"><?php echo $db1['paid']; ?></button>
								<?php
							}
							?>
						</td>
						<td><a class="text-danger font-weight-bold" href="updateuser.php?id=<?php echo $db1['unique_id'];?>&ps=<?php echo $db1['password'] ?>&pc=<?php echo $db1['photo']; ?>">Update</a></td>
						<td><a class="text-danger font-weight-bold" href="c_deleteuser.php?id=<?php echo $db1['unique_id'];?>&photo=<?php echo $db1['photo'] ?>">Delete</a></td>
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