<?php
session_start();
require("../required/check.php");
require("Coordinator.class.php");
$msg="";
if( isset( $_SESSION["co_id"] ) ) {
	$id = $_SESSION["co_id"];
}
else {
	header("location:view.php");
}

$co = new Coordinator();
$data = $co->viewco($id);

if($_SERVER['REQUEST_METHOD']=='POST')
{
	$field=$_POST['field'];
	$head=$_POST['head'];
	
	$msg = $co->updateCoordinator($id, $field, $head);
}

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
								<h2 class="title text-white">Update User Profile</h2>
							</div>		
							<!-- Main Content -->
							<div class="card-body bg-gray">

								<div class="alert text-danger text-center font-weight-bold">
									<?php echo $msg; ?>
								</div>
								<form role="form" class="form-submit" enctype="multipart/form-data" method="post" action="">
									<div class="form-group">
										<label for="Name"><strong class="admin_label text-left">Registration Id :</strong></label>
										<input type="text" class="form-control" name="name" value="<?php echo $data['unique_id']; ?>" readonly>
									</div>
									<div class="form-group">
										<label for="Department"><strong class="admin_label text-left">Field :</strong></label>
										<select name="field" class="form-control">
											<option <?php if ($data['field']=="Junior Co-ordinator") {
													?>selected <?php } ?>>
												<b>Junior Co-ordinator</b></option>
											<option <?php if ($data['field']=="Senior Co-ordinator") {
													?>selected <?php } ?>>
												<b>Senior Co-ordinator</b></option>
											<option <?php if ($data['field']=="Marketing") {
													?>selected <?php } ?>>
												<b>Marketing</b></option>
											<option <?php if ($data['field']=="Faculty") {
													?>selected <?php } ?>>
												<b>Faculty</b></option>
											<option <?php if ($data['field']=="Event Organiser & Event Management") {
													?>selected <?php } ?>>
												<b>Event Organiser & Event Management</b></option>
											<option <?php if ($data['field']=="Technical") {
													?>selected <?php } ?>>
												<b>Technical</b></option>
											<option <?php if ($data['field']=="Speaker") {
													?>selected <?php } ?>>
												<b>Speaker</b></option>
											<option <?php if ($data['field']=="Cash") {
													?>selected <?php } ?>>
												<b>Cash</b></option>
											<option <?php if ($data['field']=="Vice-President") {
													?>selected <?php } ?>>
												<b>Vice-President</b></option>
											<option <?php if ($data['field']=="President") {
													?>selected <?php } ?>>
												<b>President</b></option>
											<option <?php if ($data['field']=="Advisor") {
													?>selected <?php } ?>>
												<b>Advisor</b></option>
											<option <?php if ($data['field']=="Associate Secratory") {
													?>selected <?php } ?>>
												<b>Associate Secratory</b></option>
											<option <?php if ($data['field']=="Genral Secratory") {
													?>selected <?php } ?>>
												<b>Genral Secratory</b></option>
										</select>
									</div>
									<div class="form-group">
										<label for="Departmenthead"><strong class="admin_label text-left">Head of Field :</strong></label>
										<select name="head" class="form-control">
											<option <?php if ($data['head']=="NO") {
													?>selected <?php } ?>>
												<b>NO</b></option>
											<option <?php if ($data['head']=="YES") {
													?>selected <?php } ?>>
												<b>YES</b></option>
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