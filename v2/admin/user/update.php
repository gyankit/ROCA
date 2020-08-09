<?php
session_start();
require("../required/check.php");
require("User.class.php");
$msg="";
if( isset( $_SESSION["user_id"] ) ) {
	$id = $_SESSION["user_id"];
}
else {
	header("location:view");
}

$user = new User();
$data = $user->profile($id);

if($_SERVER['REQUEST_METHOD']=='POST')
{
	//$user = new User();
	
	if(isset($_POST['contact'])) {
		$contact = $user->_input($_POST['contact']);
	} else {
		$contact = $data['contact'];
	}
	
	if(isset($_POST['email'])) {
		$email = $user->_input($_POST['email']);
	} else {
		$email = $data['email'];
	}
	
	if(isset($_POST['date'])) {
		$date = $user->_input($_POST['date']);
	} else {
		$date = $data['date'];
	}
	
	if(isset($_POST['password'])) {
		$password = md5($user->_input($_POST['password']));
	} else {
		$password = $data['$password'];
	}
		
	if(isset($_FILES['fil'])) {
		$fil = $_FILES['fil'];
	} else {
		$fil = "";
	}
	
	$pic=$data["photo"];
	
	$msg = $user->updateUser($id, $contact, $email, $date, $password, $fil, $pic);
	
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
	<?php include("../required/head.php"); ?>
	<link rel="stylesheet" href="../../vendor/dist/css/password.css">
    <link rel="stylesheet" href="../../vendor/dist/css/preview.css">
	<style>
		#contact-info, #email-info, #date-info {
			display: none;
		}
	</style>
</head>

<body class="hold-transition sidebar-mini">
<div class="wrapper">
    <?php include("../required/header.php"); ?>
    <?php include("../required/sidebar.php"); ?>

    <!-- Main content -->
    <div class="content">
		<div class="container-fluid">
          	<div class="page-wrapper p-t-5 p-b-10">
              	<div class="wrapper wrapper--w790">
					<div class="card card-5">
						<div class="card-heading bg-info">
							<h2 class="title text-danger">Update User Profile</h2>
						</div>
						<!-- Main Content -->

						<div class="card-body bg-gray">
							<div class="alert text-danger text-center font-weight-bold">
								<?php echo $msg; ?>
							</div>
							<form method="post" class="form-submit" name="forms" enctype="multipart/form-data" action="" onSubmit="return(registration());">
								<div class="form-group">
									<label for="Name"><strong class="admin_label text-left">Registration Id :</strong></label>
									<input type="text" class="form-control" value="<?php echo $data['unique_id']; ?>" readonly>
								</div>
								<div class="form-group">
									<label for="Name"><strong class="admin_label text-left">Name :</strong></label>
									<input type="text" class="form-control" value="<?php echo $data['name']; ?>" readonly>
								</div>
								<div class="form-group">
									<label for="Roll"><strong class="admin_label text-left">Roll No :</strong></label>
									<input type="text" class="form-control" value="<?php echo $data['roll']; ?>" readonly>
								</div>
								<div class="form-group">
									<label for="Department"><strong class="admin_label text-left">Department :</strong></label>
									<input type="text" class="form-control" value="<?php echo $data['department']; ?>" readonly>
								</div>
								<div class="form-group">
									<label for="Contact"><strong class="admin_label text-left">Contact :</strong>
									<span class="text-danger" id="contact-info"> Must contain 10 digit</span></label>
									<input type="text" class="form-control" name="contact" id="contact" value="<?php echo $data['contact']; ?>" pattern="\d{10}" title="Must contain 10 digit">
								</div>
								<div class="form-group">
									<label for="Email"><strong class="admin_label text-left">Email :</strong>
									<span class="text-danger" id="email-info"> abc@abc.abc</span></label>
									<input type="text" class="form-control" name="email" id="email" value="<?php echo $data['email']; ?>" pattern="[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,}$" title="abc@abc.abc">
								</div>
								<div class="form-group">
									<label for="Date"><strong class="admin_label text-left">ROCA Joining Date :</strong>
									<span class="text-danger" id="date-info"> DD-MM-YYYY</span></label>
									<input type="text" class="form-control" name="date" id="date" value="<?php echo $data['date']; ?>" pattern="\d{1,2}-\d{1,2}-\d{4}" title="DD-MM-YYYY">
								</div>
								<div class="form-group">
									<label for="Password"><strong class="admin_label text-left">Password :</strong></label>
									<input type="password" class="form-control" id="pswd"  name="password" placeholder="Password" pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}" title="Must contain at least one number and one uppercase and lowercase letter, and at least 8 or more charactor">
									<div id="pswd_info">
										<h5 class="text-dark">Password requirements</h5>
										<ul class="list-unstyled">
											<li id="letter" class="invalid">At least <strong>one letter</strong></li>
											<li id="capital" class="invalid">At least <strong>one capital letter</strong></li>
											<li id="number" class="invalid">At least <strong>one number</strong></li>
											<li id="length" class="invalid">Be at least <strong>8 characters</strong></li>
										</ul>
									</div>
									<input type="checkbox" onclick="showpassword();">Show Password
								</div>
								<div class="row">
									<div class="col-lg-6 mb-sm-4 ftco-animate">
										<img src="../../vendor/extra/members/<?php echo $data['photo'];?>" width="300px" alt="No Pic">
									</div>
									<br>
									<div class="form-group col-lg-6 mb-sm-4 ftco-animate" id="image-preview">
										<label for="image-upload" id="image-label">Choose Picture</label>
										<input type="file" name="fil" id="image-upload" class="form-control-file" accept="image/*">
									</div>
								</div>
								<button type="submit" class="btn btn-info btn-lg" id="sbt_btn" disabled='disabled'> Update </button>
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
<script type="text/javascript" src="../../vendor/dist/js/uploadPreview.js"></script>
<script type="text/javascript" src="../../vendor/dist/js/register.js"></script>
<script type="text/javascript" src="../../vendor/dist/js/registration.js"></script>
	</body>
</html>