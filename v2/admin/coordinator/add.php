<?php
session_start();
require("../required/check.php");
require("Coordinator.class.php");
$msg="";

$co = new Coordinator();

if($_SERVER['REQUEST_METHOD']=='POST')
{
	$unique_id = $_POST['unique_id'];
	$field = $_POST['field'];
	$head = $_POST['head'];
	
	$msg = $co->addCoordinator($unique_id, $field, $head);
	
}

$view = $co->viewmember();

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
					<div class="wrapper wrapper--w790">
						<div class="card card-5">
							<div class="card-heading bg-info">
								<h2 class="title text-white">Add New Coordinator</h2>
							</div>		
							<!-- Main Content -->
							<div class="card-body bg-gray">

								<div class="alert text-danger text-center font-weight-bold">
									<?php echo $msg; ?>
								</div>

								<form role="form" class="form-submit" method="post" action="" enctype="multipart/form-data">
									<div class="form-group">
										<label for="Id"><strong class="admin_label text-left">Unique Id :</strong></label>
										<select name="unique_id" class="form-control" required>
											<option value="">Select</option>
											
											<?php while( $data = $view->fetch_array() ) { ?>
											
												<option value="<?php echo $data['unique_id'];?>" >
													<?php echo $data['unique_id'];?>
												</option>
											
											<?php } ?>
											
										</select>
									</div>
									<div class="form-group">
										<label for="field"><strong class="admin_label text-left">Field :</strong></label>
										<select name="field" class="form-control" required>
											<option value="">Select</option>
											<option value="Junior Co-ordinator">Junior Co-ordinator</option>
											<option value="Senior Co-ordinator">Senior Co-ordinator</option>
											<option value="Markating"><b>Marketing</b></option>
											<option value="Faculty"><b>Faculty</b></option>
											<option value="Event Organiser & Event Management"><b>Event Organiser &amp; Event Management</b></option>
											<option value="Technical"><b>Technical</b></option>
											<option value="Speaker"><b>Speaker</b></option>
											<option value="Cash"><b>Cash</b></option>
											<option value="Vice-President"><b>Vice-President</b></option>
											<option value="President"><b>President</b></option>
											<option value="Advisor"><b>Advisor</b></option>
											<option value="Associate Secratory"><b>Associate Secratory</b></option>
											<option value="Genral Secratory"><b>Genral Secratory</b></option>
										</select>
									</div>
									<div class="form-group">
										<label for="head"><strong class="admin_label text-left">Head of Field :</strong></label>
										<select name="head" class="form-control" required>
											<option value="NO"><b>NO</b></option>
											<option value="YES"><b>YES</b></option>
										</select>
									</div>

									<button class="btn btn-info btn-lg">Submit</button>
								</form>

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
</body>
</html>