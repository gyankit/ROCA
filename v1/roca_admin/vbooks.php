<?php 
	include("config.php");
	include("check.php");

	$sql="SHOW TABLES LIKE 'books_tbl'";
	$sr=mysqli_query($cn,$sql);
	if(mysqli_num_rows($sr)==0)
	{
		header("location: books.php");
	}

	$sql1="Select distinct department from books_tbl";
	$rs1=mysqli_query($cn,$sql1);

	$sql2="Select distinct semester from books_tbl";
	$rs2=mysqli_query($cn,$sql2);

	$sql3="Select distinct subject from books_tbl";
	$rs3=mysqli_query($cn,$sql3);

	$sql5="select * from books_tbl order by id desc";

	if($_SERVER["REQUEST_METHOD"]=="POST")
	{
		$dept=$_POST['dept'];
		$sem=$_POST['sem'];
		$sub=$_POST['sub'];

		if(($dept=="") and ($sem=="")) {
			$sql5="select * from books_tbl where and subject='$sub'";
		}
		elseif(($dept=="") and ($sub=="")) {
			$sql5="select * from books_tbl where semester='$sem'";
		}
		elseif(($sem=="") and ($sub=="")) {
			$sql5="select * from books_tbl where department='$dept'";
		}
		elseif($dept=="") {
			$sql5="select * from books_tbl where semester='$sem' and subject='$sub'";
		}
		elseif($sem=="") {
			$sql5="select * from books_tbl where department='$dept' and subject='$sub'";
		}
		elseif($sub=="") {
			$sql5="select * from books_tbl where department='$dept' and semester='$sem'";
		}	
		else {
			$sql5="select * from books_tbl where department='$dept' and semester='$sem' and subject='$sub'";
		}
	}

	$rs5=mysqli_query($cn,$sql5);
	if($rs5==false)
	{
		header("location:error.php");
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
				Books
			</div>
			
			<form role="form" class="form-submit alert bg-dark" method="post" action="">
				<div class="row">
					<div class="col-md-4 ftco-animate">
						<select class="form-control" name="dept">
							<option value=""><strong>Department</strong></option>
							<?php while($db1=mysqli_fetch_array($rs1)) { ?>
								<option value="<?php echo $db1['department'] ?>"><?php echo $db1['department'] ?></option>
							<?php } ?>
						</select>
					</div>
					<div class="col-md-4 ftco-animate">
						<select class="form-control" name="sem">
							<option value=""><strong>Semester</strong></option>
							<?php while($db2=mysqli_fetch_array($rs2)) { ?>
								<option value="<?php echo $db2['semester'] ?>"><?php echo $db2['semester'] ?></option>
							<?php } ?>
						</select>
					</div>
					<div class="col-md-4 ftco-animate">
						<select class="form-control" name="sub">
							<option value=""><strong>Subject</strong></option>
							<?php while($db3=mysqli_fetch_array($rs3)) { ?>
								<option value="<?php echo $db3['subject'] ?>"><?php echo $db3['subject'] ?></option>
							<?php } ?>
						</select>
					</div>
				</div>
				<button class="btn btn-block btn-danger" style="margin-top: 10px;"><strong>Search</strong></button>
			</form>
			
			
			<table class="table table-striped">
				<thead class="table-dark">
					<tr class="text-info">
						<th scope="col">ID</th>
						<th scope="col">Department</th>
						<th scope="col">Year</th>
						<th scope="col">Semester</th>
						<th scope="col">Subject Code</th>
						<th scope="col">Subject</th>
						<th scope="col">Books</th>
						<th scope="col">Link</th>
						<th scope="col">Update</th>
						<th scope="col">Delete</th>
					</tr>
				</thead>
				
				<tbody class="table-sm">
					<?php
					if(mysqli_num_rows($rs5)==0)
					{
						?>
						<script>alert("No Books Found...");</script>
						<?php
					}
					else
					{
						while($db=mysqli_fetch_array($rs5))
						{
						?>
						<tr>
							<th scope="row"><?php echo $db['id'];?></td>
							<td><?php echo $db['department']; ?></td>
							<td><?php echo $db['year']; ?></td>
							<td><?php echo $db['semester']; ?></td>
							<td><?php echo $db['code']; ?></td>
							<td><?php echo $db['subject']; ?></td>
							<td><?php echo $db['books'];?></td>
							<td><?php echo $db['link'];?></td>
							<td><a href="deletebooks.php?id=<?php echo $db['id'];?>&photo=<?php $db['manual']; ?>">Delete</a></td>
						</tr>
						<?php
						}
					}
					?>
				</tbody>

			</table>
		</div>
	</div>
	<?php include("javascript.php") ?>
</body>
</html>