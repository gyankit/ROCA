<?php
session_start();
require("../required/check.php");
require("Study.class.php");

$study = new Study();

if( $_SERVER["REQUEST_METHOD"] == "POST" )
{
	if( isset($_POST["delete"]) ) {
		$delete = $_POST["delete"];	
		$id = explode(',', $delete);
		if( !$confirm = $study->deletebook($id[0], $id[1]) ) {
			?> <script>alert("Error Occur")</script> <?php
		}
	}
	else{}
}

$view = $study->viewbooks();
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
								<h2 class="title text-white">View Study Materials</h2>
							</div>		
							<!-- Main Content -->
								
							<?php if(!$view) { echo "No Data Found"; } else { ?>
							<div class="table-responsive p-l-5 p-r-5">
								<table class="table table-striped" id="table" width="100%">
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
											<th scope="col">Delete</th>
										</tr>
									</thead>

									<tbody class="table-sm">
										
										<?php while( $data = $view->fetch_array() ) { ?>
										
										<tr>
											<th scope="row"><?php echo $data['id'];?></th>
											<td><?php echo $data['department']; ?></td>
											<td><?php echo $data['year']; ?></td>
											<td><?php echo $data['semester']; ?></td>
											<td><?php echo $data['code']; ?></td>
											<td><?php echo $data['subject']; ?></td>
											<td><?php echo $data['book'];?></td>
											<td><?php echo $data['link'];?></td>
											<td>
												<form method="post" action="">
													<button type="submit" class="btn-sm btn-danger font-weight-bold" name="delete" value="<?php echo $data['id'].",".$data['book']; ?>"> Delete </button>
												</form>
											</td>
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