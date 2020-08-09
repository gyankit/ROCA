<?php
session_start();
require("../required/check.php");
require("Registration.class.php");
$msg = "";

$register = new Registration();

if($_SERVER['REQUEST_METHOD']=='POST')
{
	if( isset($_POST['stop']) ) {
		if($_POST['stop']=="stop") {
			if( $register->stop() ) {
				$msg = "Registration Process Successfully Stop";
			} else {
				$msg = "Error in Stoping Registration Process";
			}
		}
	}
	elseif( isset($_POST['start']) ) {
		if($_POST['start']=="start") {
			$amount=$_POST['amount'];
			if( $register->start($amount) ) {
				$msg = "Registration SuccessFully Start";
			} else {
				$msg = "Error in Registation Process Starting";
			}
		}
	}
	else {}
	
}

$data = $register->check();
if( !$data ) {
	$notice = "Registration Process Stopped";
} else {
	$notice = "Registration Process Already Running <br>and<br> Registration fee is ". $data['amount'];
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
								<h2 class="title text-white">Start Registration</h2>
							</div>		
							<!-- Main Content -->
							<div class="card-body">

								<div class="text-center text-danger font-weight-bold mb-5">
                                    <?php echo $msg; ?>
                                </div>
								<div class="alert alert-warning font-weight-bold text-center">
									<?php echo $notice; ?>
								</div>
								<div class="alert alert-success">
									<form class="form-submit" method="post" action="">
										<div class="form-group">
											<label for="Registration"><strong class="admin_label text-left">Registration Amount:</strong></label>
											<input type="text" class="form-control" name="amount" placeholder="Registration Cost for each Student" required autofocus>
										</div>
										<?php if(!$data) { ?>
										<button type="submit" class="btn-info btn-lg" name="start" value="start"> START </button>
										<?php } ?>
									</form>
								</div>
								<div class="alert alert-warning text-center">
									<p class="text-dark font-weight-bold">To Stop Registration Process</p>
									<br>
									<form method="post" action="">
										<button type="submit" class="btn btn-block btn-danger" name="stop" value="stop"> Click Here </button>
									</form>
								</div>

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