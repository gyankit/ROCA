<?php
session_start();
require("../required/check.php");
require("Profile.class.php");

$id=$_SESSION['admin_id'];
$msg="New Administration Admin Must be an Editor Admin";

$profile = new Profile();
$data = $profile->profile($id);

if($_SERVER['REQUEST_METHOD']=='POST')
{
	$id = $profile->_input($_POST['unique_id']);
	$user = $profile->_input($_POST['username']);
	$pass = $profile->_input($_POST['password']);
	$pass = md5($pass);
	$user = md5($user);
	
	if ( $transfer = $profile->Transfer($id, $user, $pass, $data["unique_id"]) )
	{
		?>
		<script>
			alert("Site SuccessFully Transfer to New Administrator");
			window.location.href = "../logout";
		</script>
		<?php
	} else {
		$msg = $transfer;
	}
}

?>
<!DOCTYPE html>
<html lang="en">

<head>
	<?php include("../required/head.php"); ?>
	<link rel="stylesheet" href="../../vendor/dist/css/password.css">
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
							<h2 class="title text-white">Admin Transfer</h2>
						</div>		
						<!-- Main Content -->
						<div class="card-body bg-gray">
							
							<div class="alert text-danger text-center font-weight-bold fs-18">
								<?php echo $msg; ?>
							</div>
							<form role="form" class="form-submit" method="post" action="" name="forms" onSubmit="retorn(registration());">
								<div class="form-group">
									<label for="Registration"><strong class="admin_label text-left">Registration Id:</strong></label>
									<input type="text" class="form-control" name="unique_id" value="<?php echo $data['unique_id']; ?>">
								</div>
								<div class="form-group">
									<label for="Name"><strong class="admin_label text-left">Username :</strong></label>
									<input type="text" class="form-control" name="username" placeholder="Username">
								</div>
								<div class="form-group">
									<label for="Password"><strong class="admin_label text-left">Password :</strong></label>
									<span><input type="password" class="form-control" id="pswd" name="password" placeholder="Password" required></span>
									<div id="pswd_info">
										<h5 class="text-dark">Password requirements:</h5>
										<ul class="list-unstyled">
											<li id="letter" class="invalid">At least <strong>one letter</strong></li>
											<li id="capital" class="invalid">At least <strong>one capital letter</strong></li>
											<li id="number" class="invalid">At least <strong>one number</strong></li>
											<li id="length" class="invalid">Be at least <strong>8 characters</strong></li>
										</ul>
									</div>
									<input type="checkbox" onclick="showpassword();">Show Password
								</div>
								<div class="form-group">
									<label for="Role"><strong class="admin_label text-left">Role :</strong></label>					
									<input type="text" class="form-control" value="<?php echo $data['role']; ?>" readonly>
								</div>
								<button type="submit" class="btn btn-info btn-lg"> Transfer </button>
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
<script type="text/javascript" src="../../vendor/dist/js/register.js"></script>
<script type="text/javascript" src="../../vendor/dist/js/registration.js"></script>

</html>