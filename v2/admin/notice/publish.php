<?php
session_start();
require("../required/check.php");
require("Notice.class.php");

$notice = new Notice();
$view = $notice->publish();

if( $_SERVER["REQUEST_METHOD"] == "POST" )
{
	if( isset( $_POST["member"] ) ) {
		$id = $_POST["member"];
		$dates = date('Y-m-d');
		$year = date('Y');
		if($dates < "$year-06-30") { $year = $year-1; }	
		$year = $year-3;
		if( !$notice->member($id, $year) ) {
			?><script>alert("Error Occur");</script><?php
		}
	}
	elseif( isset( $_POST["subscriber"] ) ) {
		$id = $_POST["subscriber"];
		if( !$notice->subscriber($id) ) {
			?><script>alert("Error Occur");</script><?php
		}
	}
	else {}
}

?>
<!DOCTYPE html>
<html lang="en">

<head>
	<?php include("../required/head.php"); ?>
	<script>
		alert("This Service is not Woring Properly.");
	</script>
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
							<h2 class="title text-white">Publish Notice</h2>
						</div>		
						<!-- Main Content -->
							
							<?php if( !$view ) { echo "No Data Found"; } else { ?>
							<div class="table-responsive p-l-5 p-r-5">
								<table class="table table-striped" id="table" width="100%">
									<thead class="table-dark">
										<tr class="text-info">
											<th>Notice</th>
											<th>Publish</th>
											<th>Email to Member</th>
											<th>Email to Subscriber</th>
										</tr>
									</thead>
									<tbody>

										<?php while( $data = $view->fetch_array() ) { ?>

										<tr>
											<td><?php echo $data['heading']; ?></td>
											<td>
												<?php if($data['link']==1) { if($data['member']==0) { ?>
												<form method="post" action="">
													<button type="submit" class="btn-sm btn-primary" value="<?php echo $data['id']; ?>" name="member">Click Here</button>
												</form>
												<?php } else { ?>
												<button class="btn-sm btn-success">Mail Sent</button>
												<?php } } else { echo "Link Sharing not Available."; } ?>
											</td>
											<td>
												<?php if($data['link']==1) { if($data['subscriber']==0) { ?>
												<form method="post" action="">
													<button type="submit" class="btn-sm btn-primary" value="<?php echo $data['id']; ?>" name="subscriber">Click Here</button>
												</form>
												<?php } else { ?>
												<button class="btn-sm btn-success">Mail Sent</button>
												<?php } } else { echo "Link Sharing not Available."; } ?>
											</td>
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