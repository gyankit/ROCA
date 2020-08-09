<?php
session_start();
require("../required/check.php");
require("Notice.class.php");

if( isset($_SESSION["notice_id"]) ) {
	$notice = new Notice();
	$id = $_SESSION['notice_id'];
	$data = $notice->note($id);
}
else
{
	header("location:view.php");
}

if( $_SERVER["REQUEST_METHOD"] == "POST" )
{
	if( isset( $_POST["delete"] ) ) {
		if( $_POST["delete"] == "delete" ) {
			if( $delete = $notice->deleteNotice($id) ) {
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
	unset( $_SESSION["notice_id"] );
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
							<h2 class="title text-white">Delete Notice</h2>
						</div>		
						<!-- Main Content -->
						<div class="card-body bg-gray">
							
							<div class="alert alert-warning">
								<p><span class="float-left">Date</span><i class="float-right font-weight-bold text-dark"><?php echo $data['date']; ?></i></p>
								<br>
								<p><span class="float-left">Day</span><i class="float-right font-weight-bold text-dark"><?php echo $data['day']; ?></i></p>
								<br>
								<p><span class="float-left">Time</span><i class="float-right font-weight-bold text-dark"><?php echo $data['time']; ?></i></p>
								<br>
								<p><span class="float-left">Vanue</span><i class="float-right font-weight-bold text-dark"><?php echo $data['venue']; ?></i></p>
								<br>
								<p><span class="float-left">Heading</span><i class="float-right font-weight-bold text-dark"><?php echo $data['heading']; ?></i></p>
								<br>
								<p><span class="float-left">Requirement</span><i class="float-right font-weight-bold text-dark"><?php echo $data['requirement']; ?></i></p>
								<br>
								<p><span class="float-left">Entry Cost</span><i class="float-right font-weight-bold text-dark"><?php echo $data['cost']; ?></i></p>
								<br>
								<p><span class="float-left">Notice</span><i class="float-right font-weight-bold text-dark"><?php echo $data['notice']; ?></i></p>
								<br>
								
								<p><img src="../../vendor/extra/notice/<?php echo $data['photo']; ?>" alt="No Pic" width="300px"></p>
								<br>

								<p class="text-danger h4 text-center">Are You Sure, You Want to Delete this Event Notice.</p>
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