<?php
session_start();
require("../required/check.php");
require("Participant.class.php");

$member = new Participant();

if( $_SERVER["REQUEST_METHOD"] == "POST" )
{
	if( isset($_POST["paid"]) ) {
		$paid = $_POST["paid"];	
		$id = explode(',', $paid);
		if( !$confirm = $member->subscriberConfirmation($id[0], $id[1], $id[2], $id[3]) ) {
			?> <script>alert("Error Occur")</script> <?php
		}
	}
	else{}
}

$view = $member->upcommingEvent();

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
								<h2 class="title text-white">Upcomming Event Participant List</h2>
							</div>		
							<!-- Main Content -->

								<?php 
								if(!$view) { echo "No Upcomming Events"; }
								else {
								while( $data = $view->fetch_array() ) {
									$eid = $data['id'];
									$event = $data['heading'];
								?>
								
								<div class="alert alert-danger">
									<button class="btn btn-dark btn-block" type="button" data-toggle="collapse" data-target="#body<?php echo $eid; ?>" aria-expanded="false" aria-controls="body<?php echo $eid; ?>"> 
										<?php echo $event; ?> 
									</button>

									<div class="collapse" id="body<?php echo $eid; ?>">
										
									<?php 
									$result = $member->participation($eid);
									if( !$result ) { echo "Do Data Found"; } 
									else { 
									?>
										<button class="btn-lg btn-info h5 float-right" onClick="location.href = '../excel/excel?id=subscriber&event=<?php echo $event; ?>&eid=<?php echo $eid; ?>';"> PRINT </button>
										
										<br>
										<div class="table-responsive p-l-5 p-r-5">
											<table class="table table-striped text-dark text-center" id="table<?php echo $eid; ?>" width="100%">
												<thead class="table-dark">
													<tr class="text-info">
														<th scope="col">Name</th>
														<th scope="col">Roll</th>
														<th scope="col">Email</th>
														<th scope="col">Date</th>
														<th scope="col">Mode</th>
														<th scope="col">Transaction</th>
														<th scope="col">Paid</th>
													</tr>
												</thead>

												<?php 
												if($result->num_rows >= 1) {
												while( $data1 = $result->fetch_array() ) {
												?>

												<tbody class="table-sm table-info">
													<tr>
														<td><?php echo $data1['name']; ?></td>
														<td><?php echo $data1['roll']; ?></td>
														<td><?php echo $data1['email']; ?></td>			
														<td><?php echo $data1['date']; ?></td>
														<td><?php echo $data1['mode']; ?></td>
														<td><?php echo $data1['transaction']; ?></td>
														<td>

															<?php if($data1['paid']=="NO") { ?>

															<form method="post" action="">
																<button type="submit" class="btn-warning btn-sm font-weight-bold" name="paid" value="<?php echo $data1['id'].",".$data1['name'].",".$data1['roll'].",".$data1['email']; ?>"> NO </button>
															</form>

															<?php } else { ?>

															<button class="btn-sm btn-success">YES</button>

															<?php } ?>

														</td>	
													</tr>
												</tbody>
												<?php } } ?>
											</table>
											</div>
										<?php } ?>
									</div>
								</div>
							<?php } } ?>

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
		$('#table<?php echo $eid; ?>').DataTable();
		$('.dataTables_length').addClass('bs-select');
	});
</script>
</body>
</html>