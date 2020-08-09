<?php
session_start();
require("../required/check.php");
require("Home.class.php");
$msg = "";
$review = new Home();

if( $_SERVER["REQUEST_METHOD"] == "POST" )
{
	if( isset($_POST["delete"] ) ) {
		$id = $_POST["delete"];
		$msg = $review->deletereview($id);
	}
	else{}
}

$view = $review->viewreview();

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
								<h2 class="title text-white"> Reviews </h2>
							</div>		
							<!-- Main Content -->
							<div class="text-center text-danger font-weight-bold mb-5">
								<?php echo $msg; ?>
							</div>
							
							<?php if(!$view) { echo "No Review Available"; } else { ?>
							
							<div class="card-body table-responsive">
								<table class="table table-borderless well alert-primary" id="table" width="100%">
									<?php
										while ( $data = $view->fetch_array() ) {
											$id=$data['unique_id'];
											$result = $review->profile($id);
											$data1 = $result->fetch_array();
									?>
									
									<tbody class="border-bottom border-danger">
										<tr>
											<td>
												<ul class="alert alert-secondary" style="list-style: none; width: auto">
													<li><strong>Name:<br></strong><?php echo $data1['name']; ?></li>
													<li><strong>Roll No:<br></strong><?php echo $data1['roll']; ?></li>
													<li><strong>Department:<br></strong><?php echo $data1['department']; ?></li>
													<li><strong>Date:<br></strong><?php echo $data['date']; ?></li>
												</ul>
												<form method="post" action="">
													<button type="submit" class="btn btn-block btn-danger" name="delete" value="<?php echo $data['id']; ?>"> Delete </button>
												</form>
											</td>

											<td>
												<p class="alert alert-danger"><strong>Topic : </strong><?php echo $data['topic']; ?></p>
												<p class="alert alert-warning"><?php echo $data['comment']; ?></p>
											</td>
										</tr>
									</tbody>
										
									<?php } ?>
										
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