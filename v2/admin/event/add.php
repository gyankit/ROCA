<?php
session_start();
require("../required/check.php");
require("Event.class.php");
$msg="";

$event = new Event();

$date=date('Y-m-d');

$heading = $event->table("heading");
$dates = $event->table("date");

if($_SERVER['REQUEST_METHOD']=='POST')
{
	$events = $_POST['event'];
	$date = $_POST['date'];
	
	$msg = $event->addEvent($events, $date);
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
							<h2 class="title text-white">Add Event Titles</h2>
						</div>		
						<!-- Main Content -->
						<div class="card-body bg-gray">
							
							<div class="alert text-danger text-center font-weight-bold">
								<?php echo $msg; ?>
							</div>
							<form role="form" class="form-submit" method="post" action="">
								<div class="form-group">
									<label for="event"><strong class="admin_label text-left">Event Name :</strong></label>
									<select name="event" class="form-control" required>
										<option value="">Select</option>
										
										<?php while( $data = $heading->fetch_array() ) { ?>
										
											<option value="<?php echo $data['heading']; ?>"><?php echo $data['heading']; ?></option>
										
										<?php } ?>  
										
									</select>
								</div>
								<div class="form-group">
									<label for="Date"><strong class="admin_label text-left">Date :</strong></label>
									<select name="date" class="form-control" required>
										<option value="">Select</option>
										
										<?php while( $data1 = $dates->fetch_array() ) { ?>
										 
											<option value="<?php echo $data1['date']; ?>"><?php echo $data1['date']; ?></option>
										  
										<?php } ?>
										
									</select>
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