<?php
session_start();
require("../required/check.php");
require("Coordinator.class.php");

if( isset($_SESSION["co_id"]) ) {
	$co = new Coordinator();
	$id = $_SESSION['co_id'];
	$data = $co->viewco($id);
}
else
{
	header("location:view");
}

if( $_SERVER["REQUEST_METHOD"] == "POST" )
{
	if( isset( $_POST["delete"] ) ) {
		if( $_POST["delete"] == "delete" ) {
			if( $co->deleteCoordinator($id) ) {
				back();
			} else {
				?> <script>alert("Error Occur");</script> <?php
			}
		} else {
			back();
		}
	}
	elseif( isset( $_POST["cancel"] ) ) {
		back();
	}
	else {
		back();
	}
}

function back() {
	unset( $_SESSION["co_id"] );
	header("location:view");
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
								<h2 class="title text-white">Welcome to ROCA</h2>
							</div>		
							<!-- Main Content -->
							<div class="card-body bg-gray">

								<div class="alert alert-warning text-center">
									<p><span class="float-left">Registration Id</span><i class="float-right font-weight-bold text-dark"><?php echo $data['unique_id']; ?></i></p>
									<br>
									<p><span class="float-left">Event</span><i class="float-right font-weight-bold text-dark"><?php echo $data['field']; if($data['head']=="YES") { echo " Head"; } else {}; ?></i></p>
									<br>

									<p class="text-danger h4 text-center">Are You Sure,<br>You Want to Remove it from Coordinator Post.</p>
								</div>
								<div class="alert">
									<form method="post" action="">
										<button type="submit" class="btn btn-success float-left col-5" name="cancel" value="cancel"> Cancel </button>

										<button type="submit" class="btn btn-danger float-right col-5" name="delete" value="delete"> Delete </button>
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