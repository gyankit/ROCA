<?php
session_start();
require("../required/check.php");
require("Notice.class.php");
$msg="";

if( $_SERVER["REQUEST_METHOD"] == "POST" )
{
	$notice = new Notice();
	
	$date = $notice->_input($_POST['date']);
	$heading = $notice->_input($_POST['heading']);
	$notices = $notice->_input($_POST['notice']);
	$requirement = $notice->_input($_POST['requirement']);
	$announce = $notice->_input($_POST['announcement']);
	$venue = $notice->_input($_POST['venue']);
	$day = $notice->_input($_POST['day']);
	$time = $notice->_input($_POST['time']);
	$cost = $notice->_input($_POST['cost']);
	$event = $notice->_input($_POST['event']);
	
	if(!isset($_FILES['fil'])) {
		$msg = "Provide valid Image for Profile picture.";
	} else {
		$fil = $_FILES['fil'];
		$msg = $notice->newNotice($date, $heading, $notices, $requirement, $announce, $venue, $day, $time, $cost, $event, $fil);
	}
}

?>
<!DOCTYPE html>
<html lang="en">

<head>
	<?php include("../required/head.php"); ?>
	<link rel="stylesheet" href="../../vendor/dist/css/preview.css">
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
							<h2 class="title text-white">Add New Notice</h2>
						</div>		
						<!-- Main Content -->
						<div class="card-body bg-gray">
							
							<div class="alert text-danger text-center font-weight-bold">
								<?php echo $msg; ?>
							</div>
							<form class="form-submit" method="post" action="" enctype="multipart/form-data">
								<div class="form-group">
									<label for="Date"><strong class="admin_label text-left">Date :</strong></label>
									<input type="text" class="form-control" name="date" value="<?php echo date('Y-m-d'); ?>"  required autofocus>
								</div>
								<div class="form-group">
									<label for="Notice Heading"><strong class="admin_label text-left">Notice Heading :</strong></label>
									<input type="text" class="form-control" name="heading" placeholder="Subject" required>
								</div>
								<div class="form-group">
									<label for="Notice"><strong class="admin_label text-left">Notice Body :</strong></label>
									<textarea name="notice" class="form-control" placeholder="Announcement" rows="5" required></textarea>
								</div>
								<div class="form-group">
									<label for="Requirement"><strong class="admin_label text-left">Requirement :</strong></label>
									<textarea name="requirement" class="form-control" placeholder="Requirement if Any" rows="3"></textarea>
								</div>
								<div class="form-group">
									<label for="Announcement"><strong class="admin_label text-left">Announcement :</strong></label>
									<textarea name="announcement" class="form-control" placeholder="Announcement if Any" rows="3"></textarea>
								</div>
								<div class="form-group">
									<label for="Venue"><strong class="admin_label text-left">Venue :</strong></label>
									<input type="text" class="form-control" name="venue" placeholder="Place / Venue" required>
								</div>
								<div class="form-group">
									<label for="Day"><strong class="admin_label text-left">Day :</strong></label>
									<input type="text" class="form-control" name="day" placeholder="Day" required>
								</div>
								<div class="form-group">
									<label for="Time"><strong class="admin_label text-left">Time :</strong></label>
									<input type="text" class="form-control" name="time" placeholder="Time" required>
								</div>
								<div class="form-group">
									<label for="Cost"><strong class="admin_label text-left">Cost :</strong></label>
									<input type="number" class="form-control" name="cost" value="0">
								</div>
								<div class="form-group">
									<label for="For"><strong class="admin_label text-left">Event for :</strong></label>
									<select class="form-control" name="event">
										<option value="Member">Only ROCA Member</option>
										<option value="All">All Students</option>
									</select>
								</div>
								<div class="form-group" id="image-preview">
									<label for="image-upload" id="image-label">Event Logo <span>Size : 1 Mb</span></label>
									<input type="file" name="fil" id="image-upload" class="form-control-file" accept="image/*">
								</div>
								<button class="btn btn-info btn-lg" id="sbt_btn">Submit</button>
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
	<script type="text/javascript">
		(function($) {
			"use strict";
			
			$(document).ready(function() {	
				$.uploadPreview({
					input_field: "#image-upload",   // Default: .image-upload
					preview_box: "#image-preview",  // Default: .image-preview
					label_field: "#image-label",    // Default: .image-label
					label_default: "Event Logo",   // Default: Choose File
					label_selected: "Change Logo",  // Default: Change File
					no_label: false                 // Default: false
				});
			});

			$('#image-upload').bind('change',function() {
				var pic=(this.files[0].size);

				if(pic>1024000) {
					alert("Image Size Must be Less than 1Mb");
					$('#sbt_btn').prop('disabled', true);
				}
				else{
					$('#sbt_btn').prop('disabled', false);
				}
			});
		})(jQuery);
	</script>
	</body>
</html>