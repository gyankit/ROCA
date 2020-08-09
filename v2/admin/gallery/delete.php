<?php
session_start();
require("../required/check.php");
require("Gallery.class.php");

if( isset($_SESSION["gallery_id"]) ) {
	$gallery = new Gallery();
	$id = $_SESSION['gallery_id'];
	$data1 = $gallery->picture($id);
	$data = $gallery->viewevent($data1["event_id"]);
}
else
{
	header("location:view");
}

if( $_SERVER["REQUEST_METHOD"] == "POST" )
{
	if( isset( $_POST["delete"] ) ) {
		if( $_POST["delete"] == "delete" ) {
			if( $gallery->delete($id) ) {
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
	unset( $_SESSION["gallery_id"] );
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
							<h2 class="title text-white">Delete Event Picture</h2>
						</div>		
						<!-- Main Content -->
						<div class="card-body bg-gray">
							
							<div class="alert alert-warning text-center">
								<p><span class="float-left">Event</span><i class="float-right font-weight-bold text-dark"><?php echo $data['event']; ?></i></p>
								<br>
								<p><span class="float-left">Date</span><i class="float-right font-weight-bold text-dark"><?php echo $data['date']; ?></i></p>
								<br>
								<p><img src="../../vendor/extra/events/<?php echo $data1['gallery']; ?>" alt="No Pic" width="300px"></p>
								<br>
								<p class="text-danger h4 text-center">If you Delete this Picture, There is no way to get it back<br>Are You Sure, You Want to Proceed.</p>
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