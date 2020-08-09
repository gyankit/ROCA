<?php
session_start();
require("../required/check.php");
require("User.class.php");
$msg="";
$pay = new User();

if( $_SERVER["REQUEST_METHOD"] == "POST" )
{
	if( isset($_POST["delete"] ) ) {
		$msg = $pay->deletepay();
	}
	else{}
}

$view = $pay->viewpay();

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
								<h2 class="title text-white">Transaction Details</h2>
							</div>		
							<!-- Main Content -->
							
							<div class="text-center text-danger font-weight-bold mb-5">
								<?php echo $msg; ?>
							</div>
							<?php if(!$view) { echo "No Data Found"; } else { ?>
							
							<div class="alert alert-warning text-center">
								<form method="post" action="">
									<button type="submit" class="btn-lg btn-danger" name="delete" value="delete"> Delete All Transaction Details </button>
								</form>
							</div>
							<div class="table-responsive p-l-5 p-r-5">
								<table class="table table-striped" id="table" width="100%">
									<thead class="table-dark">
										<tr class="text-info">
											<th scope="col">Registration Id</th>
											<th scope="col">Name</th>
											<th scope="col">Roll</th>
											<th scope="col">Mode</th>
											<th scope="col">Transaction Id</th>
										</tr>
									</thead>
									<tbody class="table-sm">
										<?php 
										while($data = $view->fetch_array()) { 
											$data1 = $pay->member($data['id'])
										?>
										<tr class="font-weight-bold">
											<th scope="row"><?php echo $data['id']; ?></th>
											<td><?php echo $data1['name']; ?></td>
											<td><?php echo $data1['roll'];?></td>
											<td><?php echo $data['mode'];?></td>
											<td><?php echo $data['transaction'];?></td>
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