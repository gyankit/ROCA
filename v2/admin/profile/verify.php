<?php
session_start();
require("../required/check.php");
require("Profile.class.php");


if( $_SERVER["REQUEST_METHOD"] == "POST" )
{
	if( isset($_POST["back"] ) ) {
		if( $_POST["back"] == "cancel" ) {
			header ("location:profile");
		}
	}
	elseif( isset($_POST["next"] ) ) {
		if( $_POST["next"] == "submit" ) {
			header ("location:transfer");
		}
	}
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
							<h2 class="title text-white">Site Transfer</h2>
						</div>		
						<!-- Main Content -->
						<div class="card-body bg-gray">
							
							<div class="alert alert-warning h3 font-weight-bold text-center">
								Are, you sure<br>You want to Transfer Your Rights to New Admin<br><br>
							</div>
							<form method="post" action="<?php echo $_SERVER["PHP_SELF"] ?>">
								<button type="submit" class="btn btn-danger font-weight-bold float-right" name="next" value="submit"> Procced to Transfer </button>
								<button type="submit" class="btn btn-primary font-weight-bold float-left" name="back" value="cancel"> Go to previous page </button>
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

</html>