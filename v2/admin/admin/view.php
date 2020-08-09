<?php
session_start();
require("../required/check.php");
require("Admin.class.php");

$admin = new Admin();
$view = $admin->viewAdmin();

if( $_SERVER["REQUEST_METHOD"] == "POST" )
{
	if( isset($_POST["delete"] ) ) {
		$data = $view->fetch_array();
		$_SESSION["ad_id"] = $_POST["delete"];
		header ("location:delete");
	}
}
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
							<h2 class="title text-white">Admin Details</h2>
						</div>		
						<!-- Main Content -->
						
						<?php if( !$view ) { echo "No Data Found"; } else { ?>
						<div class="table-responsive p-l-5 p-r-5">
							<table class="table table-striped" id="table" width="100%">
								<thead class="table-dark">
									<tr class="text-info">
										<th scope="col">Registraion Id</th>
										<th scope="col">Name</th>
										<th scope="col">Contact</th>
										<th scope="col">Email Id</th>
										<th scope="col">Photo</th>
										<th scope="col">Role</th>
										<th scope="col">Delete</th>
									</tr>
								</thead>
								<tbody class="table-sm">

									<?php 
									while( $data = $view->fetch_array() ) { 
										if( $data['role'] == "ADMINISTRATOR" and $data['unique_id'] == "ROCA2019GYAN" ) { continue; } 
										else { $data1 = $admin->profile($data['unique_id']); 
											if( !$data1 ) { echo "No Data Found"; }
											else {
									?>

									<tr class="font-weight-bold">
										<td><?php echo $data['unique_id']; ?></td>
										<td><?php echo $data1['name']; ?></td>
										<td><?php echo $data1['contact'];?></td>
										<td><?php echo $data1['email'];?></td>
										<td><img src="../../vendor/extra/members/<?php echo $data1['photo'];?>" height="100px" alt="No Pic"></td>
										<td><?php echo $data['role'];?></td>
										<?php 
											if( $_SESSION['admin_role'] == "ADMINISTRATOR" ) { 
												if( $data['role'] == "ADMINISTRATOR" and $data['unique_id'] != "ROCA2019GYAN" ) { ?>
										<td></td>
										<?php } else { ?>
										<td>
											<form method="post" action="">
												<button type="submit" class="btn-sm btn-danger" value="<?php echo $data['unique_id']; ?>" name="delete"> Delete </button>
											</form>
										</td>
										<?php } } ?>
									</tr>

									<?php } } } ?>

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
(function($) {
	"use strict";
	$(document).ready(function () {
		$('#table').DataTable();
		$('.dataTables_length').addClass('bs-select');
	});
})(jQuery);
</script>

</body>
</html>