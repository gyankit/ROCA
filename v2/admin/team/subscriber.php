<?php
session_start();
require("../required/check.php");
require("Team.class.php");

$team = new Team();
$view = $team->subscriber();

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
								<h2 class="title text-white">Subscriber List</h2>
							</div>		
							<!-- Main Content -->
									
									<?php if( !$view ) { echo "No Data Found"; } else { ?>
								<div class="table-responsive p-l-5 p-r-5">	
									<table class="table table-striped text-center" id="table" width="100%">
										<thead class="table-dark">
											<tr class="text-info">
												<th scope="col">Email</th>
											</tr>
										</thead>
										<tbody class="table-sm">
											
											<?php while( $data = $view->fetch_array() ) { ?>
											
											<tr><td scope="row"><?php echo $data['email'];?></td></tr>
											
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