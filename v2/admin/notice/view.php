<?php
session_start();
require("../required/check.php");
require("Notice.class.php");

$notice = new Notice();
$view = $notice->viewNotice();

if( $_SERVER["REQUEST_METHOD"] == "POST" )
{
	if( isset( $_POST["deactive"] ) ) {
		$notice->active($_POST["deactive"]);
	}
	elseif( isset( $_POST["active"] ) ) {
		$notice->deactive($_POST["active"]);
	}
	elseif( isset( $_POST["update"] ) ) {
		$_SESSION['notice_id'] = $_POST["update"];
		header ("location:update");
	}
	elseif( isset( $_POST["delete"] ) ) {
		$_SESSION['notice_id'] = $_POST["delete"];
		header ("location:delete");
	}
	else {}
}
$view = $notice->viewNotice();
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
							<h2 class="title text-white">Event Notice List</h2>
						</div>		
						<!-- Main Content -->
						
						<?php if( !$view ) { echo "No Data Found"; } else { ?>
							
						<div class="table-responsive p-l-5 p-r-5">
							<table class="table table-striped" id="table" width="100%">
								<thead class="table-dark">
									<tr class="text-info">
										<th scope="col">ID</th>
										<th scope="col">Date</th>
										<th scope="col">Notice</th>
										<th scope="col">Requirement</th>
										<th scope="col">Announcement</th>
										<th scope="col">Venue</th>
										<th scope="col">Day &amp; Time</th>
										<th scope="col">Cost</th>
										<th scope="col">Photo</th>
										<th scope="col">Event</th>
										<th scope="col">Link</th>
										<th scope="col">Update</th>
										<th scope="col">Delete</th>
									</tr>
								</thead>
								<tbody class="table-sm">
									
									<?php while( $data = $view->fetch_array() ) { ?>
									
									<tr class="font-weight-bold">
										<td scope="row"><?php echo $data['id']; ?></td>
										<td><?php echo $data['date']; ?></td>
										<td><p><i><?php echo $data['heading'];?></i></p><?php echo $data['notice'];?></td>
										<td><?php echo $data['requirement'];?></td>
										<td><?php echo $data['announcement'];?></td>
										<td><?php echo $data['venue'];?></td>
										<td><?php echo $data['day']." ".$data['time'];?></td>
										<td><?php echo $data['cost']; ?></td>
										<td><img src="../../vendor/extra/notice/<?php echo $data['photo'];?>" height="100px" alt="No Pic"></td>
										<td><?php echo $data['event']; ?></td>
										<td>
											<?php if( $data['date'] >= date('Y-m-d') ) { if( $data['link'] == 0 ) { ?>
											
											<form method="post" action="">
												<button type="submit" class="btn-sm btn-danger" name="deactive" value="<?php echo $data['id']; ?>"> Deactive </button>
											</form>
											
												<?php } else { ?>
												
											<form method="post" action="">
												<button type="submit" class="btn-sm btn-success" name="active" value="<?php echo $data['id']; ?>"> Active </button>
											</form>
											
											<?php } } else { $notice->permanentDeactive($data['date']); } ?>
										</td>
										<form method="post" action="">
											<td><button type="submit" class="btn-sm btn-info" name="update" value="<?php echo $data['id']; ?>"> Update </button></td>
											<td><button type="submit" class="btn-sm btn-warning" name="delete" value="<?php echo $data['id']; ?>"> Delete </button></td>
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