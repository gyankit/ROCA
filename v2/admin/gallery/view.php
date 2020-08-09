<?php
session_start();
require("../required/check.php");
require("Gallery.class.php");

$gallery = new Gallery();

if( $_SERVER["REQUEST_METHOD"] == "POST" )
{
	if( isset( $_POST["delete"] ) ) {
		$_SESSION["gallery_id"] = $_POST["delete"];
		header ("location:delete");
	}
	else {}
}

$view = $gallery->viewGallery();
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
							<h2 class="title text-white">Event Gallery</h2>
						</div>		
						<!-- Main Content -->
							
							<?php if( !$view ) { echo "No Data Found"; } else { ?>
							<div class="table-responsive p-l-5 p-r-5">
								<table class="table table-striped" id="table"  width="100%">
									<thead class="table-dark">
										<tr class="text-info">
											<th scope="col">ID</th>
											<th scope="col">Event</th>
											<th scope="col">Date</th>
											<th scope="col">Photo</th>
											<th scope="col">Delete</th>
										</tr>
									</thead>
									<tbody class="table-sm" id="mytable">
										
										<?php while( $data = $view->fetch_array() ) { $data1 = $gallery->viewevent($data['event_id']); ?>
										
										<tr>
											<th scope="row"><?php echo $data['id'];?></td>
											<td><?php echo $data1['event']; ?></td>
											<td><?php echo $data1['date']; ?></td>
											<td><img src="../../vendor/extra/events/<?php echo $data['gallery'];?>" height="100px" alt="No Pic"><br><?php echo $data['gallery'];?></td>
											<form method="post" action="">
												<td><button type="submit" class="btn-sm btn-danger font-weight-bold" name="delete" value="<?php echo $data['id']; ?>"> Delete </button></td>
											</form>
										</tr>
								
										<?php } ?>
								
									</tbody>
								</table>
							</div>
							<div class="col-md-12 text-center">
								<ul class="pagination pagination-lg pager" id="myPager"></ul>
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