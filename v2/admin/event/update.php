<?php
session_start();
require("../required/check.php");
require("Event.class.php");
$msg="";
if( isset( $_SESSION["event_id"] ) ) {
	$id = $_SESSION["event_id"];
}
else {
	header("location:view");
}

$event = new Event();
$data = $event->event($id);

if($_SERVER['REQUEST_METHOD']=='POST')
{
	$events = $_POST['event'];
	$msg = $event->updateEvent($id, $events);
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
							
							<div class="alert text-danger text-center font-weight-bold">
								<?php echo $msg; ?>
							</div>
							<form role="form" class="form-submit" method="post" action="">
								<div class="form-group">
									<label for="Date"><strong class="admin_label text-left">Date :</strong></label>
									<input type="text" class="form-control" value="<?php echo $data['date']; ?>" readonly>
								</div>
								<div class="form-group">
									<label for="Notice"><strong class="admin_label text-left">Notice :</strong></label>
									<input type="text" class="form-control" name="event" value="<?php echo $data['event']; ?>" required autofocus>
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