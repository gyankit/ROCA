<?php
session_start();
require("../required/check.php");
require("Team.class.php");

$team = new Team();
$view = $team->member();

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
								<h2 class="title text-white">Roca Members List</h2>
							</div>		
							<!-- Main Content -->
							
							<?php if( !$view ) { echo "No Data Found"; } else { ?>
			
							<button class="btn-lg btn-success h5 float-right" onClick="location.href= '../excel/excel?id=alluser'"> PRINT </button>
							
							<div class="table-responsive p-l-5 p-r-5">
								<table class="table table-striped" id="table" width="100%">
									<thead class="table-dark">
										<tr class="text-info">
											<th scope="col">Id</th>
											<th scope="col">Registraion Id</th>
											<th scope="col">Name</th>
											<th scope="col">Roll no</th>
											<th scope="col">Department</th>
											<th scope="col">Contact</th>
											<th scope="col">Email</th>
											<th scope="col">Joining Date</th>
											<th scope="col">Co-ordinaor</th>
											<th scope="col">Field</th>
											<th scope="col">Photo</th>
											<th scope="col">Payment</th>
										</tr>
									</thead>
									<tbody class="table-sm">
										
										<?php while( $data = $view->fetch_array() ) { ?>
										
										<tr class="font-weight-bold">
											<th scope="row"><?php echo $data['id']; ?></td>
											<td><?php echo $data['unique_id']; ?></td>
											<td><?php echo $data['name']; ?></td>
											<td><?php echo $data['roll']; ?></td>
											<td><?php echo $data['department'];?></td>
											<td><?php echo $data['contact'];?></td>
											<td><?php echo $data['email'];?></td>
											<td><?php echo $data['date'];?></td>
											<td><?php echo $data['coordinator'];?></td>
											<td><?php 
												if($data['coordinator']=="NO") {} 
												else { 
													echo $data['field']." "; 
													if($data['head']=="YES") { echo "HEAD"; } 
													else {} 
												}
												?></td>
											<td><img src="../../vendor/extra/members/<?php echo $data['photo'];?>" height="100px" alt="No Pic"></td>
											<td><?php echo $data['paid']; ?></td>
										</tr>
								
										<?php } ?>
								
									</tbody>
								</table>
						
								<?php } ?>

							</div>
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