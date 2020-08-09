<?php 
	include("config.php");
	include("check.php");

	$msg="";
	$id=$_REQUEST['id'];

	$sql="select * from coordinators_tbl where unique_id='$id'";
	$n=mysqli_query($cn,$sql);
	$db=mysqli_fetch_array($n);

	if($_SERVER['REQUEST_METHOD']=='POST')
	{
		$field=$_POST['field'];
		$head=$_POST['head'];

		$sql1="update coordinators_tbl set field='$field', head='$head' where unique_id='$id'";
		$rd=mysqli_query($cn,$sql1);
		if($rd==false)
		{
			$msg="Sorry...Can't Update";
		}
		else
		{	
		    $sql2="update roca_member_tbl set field='$field', head='$head' where unique_id='$id'";
    		$rd1=mysqli_query($cn,$sql2);
    		if($rd1==false)
    		{
    			$msg="Sorry...Can't Update";
    		}
			else
			{
				header("location: viewco.php");
			}
		}	
	}
?>

<html lang="en">
<head>
	<?php include("css.php"); ?>
	<title>R O C A</title>
</head>
	
<body>
	<div class="header">
		<?php include("header.php"); ?>
	</div>
	<div class="container">
		<div class="jumbotron">
			<div class="card-title text-capitalize text-center h2">
				Update Register User
			</div>
			<div class="alert text-danger text-center font-weight-bold">
				<?php echo $msg; ?>
			</div>
			<form role="form" class="form-submit" enctype="multipart/form-data" method="post" action="">
				<div class="form-group">
					<label for="Name"><strong class="admin_label text-left">Registration Id :</strong></label>
					<input type="text" class="form-control" name="name" value="<?php echo $db['unique_id']; ?>" readonly>
				</div>
				<div class="form-group">
					<label for="Department"><strong class="admin_label text-left">Field :</strong></label>
					<select name="field" class="form-control">
						<option <?php if ($db['field']=="Junior Co-ordinator") {
								?>selected <?php } ?>>
							<b>Junior Co-ordinator</b></option>
						<option <?php if ($db['field']=="Senior Co-ordinator") {
								?>selected <?php } ?>>
							<b>Senior Co-ordinator</b></option>
						<option <?php if ($db['field']=="Marketing") {
								?>selected <?php } ?>>
							<b>Marketing</b></option>
						<option <?php if ($db['field']=="Faculty") {
								?>selected <?php } ?>>
							<b>Faculty</b></option>
						<option <?php if ($db['field']=="Event Organiser & Event Management") {
								?>selected <?php } ?>>
							<b>Event Organiser & Event Management</b></option>
						<option <?php if ($db['field']=="Technical") {
								?>selected <?php } ?>>
							<b>Technical</b></option>
						<option <?php if ($db['field']=="Speaker") {
								?>selected <?php } ?>>
							<b>Speaker</b></option>
						<option <?php if ($db['field']=="Cash") {
								?>selected <?php } ?>>
							<b>Cash</b></option>
						<option <?php if ($db['field']=="Vice-President") {
								?>selected <?php } ?>>
							<b>Vice-President</b></option>
						<option <?php if ($db['field']=="President") {
								?>selected <?php } ?>>
							<b>President</b></option>
						<option <?php if ($db['field']=="Advisor") {
								?>selected <?php } ?>>
							<b>Advisor</b></option>
						<option <?php if ($db['field']=="Associate Secratory") {
								?>selected <?php } ?>>
							<b>Associate Secratory</b></option>
						<option <?php if ($db['field']=="Genral Secratory") {
								?>selected <?php } ?>>
							<b>Genral Secratory</b></option>
					</select>
				</div>
				<div class="form-group">
					<label for="Departmenthead"><strong class="admin_label text-left">Head of Field :</strong></label>
					<select name="head" class="form-control">
						<option <?php if ($db['head']=="NO") {
								?>selected <?php } ?>>
							<b>NO</b></option>
						<option <?php if ($db['head']=="YES") {
								?>selected <?php } ?>>
							<b>YES</b></option>
					</select>
				</div>
				<button class="btn btn-info btn-lg">Submit</button>
			</form>
		</div>
	</div>
	<?php include("javascript.php"); ?>
</body>
</html>