<?php
session_start();
require("../required/check.php");
require("Coordinator.class.php");

$co = new Coordinator();

if( $_SERVER["REQUEST_METHOD"] == "POST" )
{
	if( isset($_POST["delete"] ) ) {
		$_SESSION["co_id"] = $_POST["delete"];
		header ("location:delete");
	}
	elseif( isset( $_POST["update"] ) ) {
		$_SESSION["co_id"] = $_POST["update"];
		header ("location:update");
	}
	else{}
}

$view = $co->viewCoordinator();

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
								<h2 class="title text-white">Coordinator List</h2>
							</div>		
							<!-- Main Content -->
								
							<?php if( !$view ) { echo "No Data Found"; } else { ?>
							<div class="table-responsive p-l-5 p-r-5">
								<table class="table table-striped" id="table" width="100%">
									<thead class="table-dark">
										<tr class="text-info">
											<th scope="col">Id</th>
											<th scope="col">Unique_id</th>
											<th scope="col">Field</th>
											<th scope="col">Head of Field</th>
											<th scope="col">Update</th>
											<th scope="col">Delete</th>
										</tr>
									</thead>
									<tbody class="table-sm">
										
										<?php while( $data = $view->fetch_array() ) { ?>
										
										<tr>
											<th scope="row"><?php echo $data['id'];?></td>
											<td><?php echo $data['unique_id']; ?></td>
											<td><?php echo $data['field']; ?></td>
											<td><?php echo $data['head']; ?></td>
											<form method="post" action="">
												<td><button type="submit" class="btn-sm btn-primary font-weight-bold" name="update" value="<?php echo $data['unique_id']; ?>"> Update </button>

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