<?php
session_start();
require("../required/check.php");
require("Admin.class.php");

if( isset($_SESSION["ad_id"]) ) {
	$admin = new Admin();
	$id = $_SESSION["ad_id"];
	$data = $admin->profile($id);
}
else
{
	header("location:view.php");
}

if( $_SERVER["REQUEST_METHOD"] == "POST" )
{
	if( isset( $_POST["delete"] ) ) {
		if( $_POST["delete"] == "delete" ) {
			if( $admin->deleteAdmin($id) ) {
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
	unset( $_SESSION["ad_id"] );
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
              	<div class="wrapper">
					<div class="card card-5">
						<div class="card-heading bg-info">
							<h2 class="title text-white">Delete Confirmation</h2>
						</div>		
						<!-- Main Content -->
						<div class="card-body bg-gray">
							
							<div class="alert alert-warning">
								<p><span class="float-left">Registration Id</span><i class="float-right font-weight-bold text-dark"><?php echo $data['unique_id']; ?></i></p><br>
								<p><span class="float-left">Name</span><i class="float-right font-weight-bold text-dark"><?php echo $data['name']; ?></i></p><br>
								<p><span class="float-left">Contact</span><i class="float-right font-weight-bold text-dark"><?php echo $data['contact']; ?></i></p><br>
								<p><span class="float-left">Email Id</span><i class="float-right font-weight-bold text-dark"><?php echo $data['email']; ?></i></p><br>
								<p class="text-center"><img src="../../vendor/extra/members/<?php echo $data['photo']; ?>" alt="No Pic" width="300px"></p><br>

								<p class="text-danger h4 text-center">Are You Sure, You Want to Delete this Administrater</p>
							</div>
							<div class="alert">
								<form method="post" action="<?php echo $_SERVER["PHP_SELF"] ?>">
									<button type="submit" class="btn btn-success float-left col-5" name="cancel" value="cancel"> Cancel </button>

									<button type="submit" class="btn btn-danger float-right col-5" name="delete" value="delete"> Delete </button>
								</form>
							</div>
							<div class="alert"></div>
							
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