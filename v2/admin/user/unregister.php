<?php
session_start();
require("../required/check.php");
require("User.class.php");

$user = new User();

if( $_SERVER["REQUEST_METHOD"] == "POST" )
{
	if( isset($_POST["paid"]) ) {
		$id = $_POST["paid"];	
		if( !$confirm = $user->confirmation($id) ) {
			?> <script>alert("Error Occur")</script> <?php
		}
	}
	elseif( isset($_POST["delete"] ) ) {
		$_SESSION["user_id"] = $_POST["delete"];
		header ("location:delete");
	}
	else {}
}

$view = $user->unregisterUser();

?>
<!DOCTYPE html>
<html lang="en">

<head>
	<?php include("../required/head.php"); ?>
</head>

<body class="hold-transition sidebar-mini">
	<div class="wrapper">
		<?php include("../required/header.php"); ?>
		<?php include("../required/sidebar.php"); ?>

		<!-- Main content -->
		<div class="content">
			<div class="container">
				<div class="page-wrapper p-t-5 p-b-10">
					<div class="wrapper">
						<div class="card card-5">
							<div class="card-heading bg-info">
								<h2 class="title text-white">Welcome to ROCA</h2>
							</div>		
							<!-- Main Content -->
								
							<?php if( !$view ) { echo "No Data Found"; } else { ?>
							<div class="table-responsive p-l-5 p-r-5">
								<table class="table table-striped" id="table" width="100%">
									<thead class="table-dark">
										<tr class="text-info">
											<th scope="col">Id</th>
											<th scope="col">Unique_id</th>
											<th scope="col">Name</th>
											<th scope="col">Roll No</th>
											<th scope="col">Department</th>
											<th scope="col">Contact</th>
											<th scope="col">Email</th>
											<th scope="col">Photo</th>
											<th scope="col">Paid</th>
											<th scope="col">Delete</th>
										</tr>
									</thead>
									<tbody class="table-sm">
										
										<?php while( $data = $view->fetch_array() ) { ?>
										
										<tr>
											<th scope="row"><?php echo $data['id'];?></td>
											<td><?php echo $data['unique_id']; ?></td>
											<td><?php echo $data['name']; ?></td>
											<td><?php echo $data['roll']; ?></td>
											<td><?php echo $data['department']; ?></td>
											<td><?php echo $data['contact']; ?></td>
											<td><?php echo $data['email']; ?></td>
											<td><img src="../../vendor/extra/members/<?php echo $data['photo'];?>" height="100px" alt="No Pic"></td>
											<td>

												<?php if ($data['paid'] == "NO") { ?>

												<form method="post" action="">
													<button type="submit" class="btn-warning btn-sm font-weight-bold" name="paid" value="<?php echo $data['unique_id']; ?>"><?php echo $data['paid']; ?></button>
												</form>

												<?php } elseif ($data['paid'] == "YES") { ?>

												<button class="btn-sm btn-success text-dark font-weight-bold"><?php echo $data['paid']; ?></button>

												<?php } ?>

											</td>
											<form method="post" action="">
												<td><button type="submit" class="btn-sm btn-danger font-weight-bold" name="delete" value="<?php echo $data['unique_id']; ?>"> Delete </button></td>
											</form>
										</tr>
										
										<?php } ?>
								
									</tbody>
								</table>
							</div>
							<?php } ?>
							<!-- End Main Content -->
						</div>
					</div>
				</div>
			</div>
		</div>
		<?php include("../required/footer.php"); ?>
	</div>
	<?php include("../required/javascript.php"); ?>
<script>	
	$(document).ready(function () {
		$('#table').DataTable();
		$('.dataTables_length').addClass('bs-select');
	});
</script>
</body>
</html>