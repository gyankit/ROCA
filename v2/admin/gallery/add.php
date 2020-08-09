<?php
session_start();
require("../required/check.php");
require("Gallery.class.php");
$msg="";

$gallery = new Gallery();

$event = $gallery->table("event");
$date = $gallery->table("date");

if($_SERVER['REQUEST_METHOD']=='POST')
{
	$events = $_POST['event'];
	$dates = $_POST['date'];
	$fil = $_FILES['fil'];
	
	$msg = $gallery->addGallery($events, $dates, $fil);
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
							<h2 class="title text-white">Add Event Pictures</h2>
						</div>		
						<!-- Main Content -->
						<div class="card-body bg-gray">
							
							<div class="alert text-danger text-center font-weight-bold">
								<?php echo $msg; ?>
							</div>
							<form class="form-submit" method="post" action="" enctype="multipart/form-data">
								<div class="form-group">
									<label for="Event"><strong class="admin_label text-left">Event :</strong></label>
									<select name="event" class="form-control" required>
										<option value="">Select</option>
										
										<?php while( $data = $event->fetch_array() ) { ?>
										
											<option value="<?php echo $data['event'];?>"><?php echo $data['event'];?></option>
										
										<?php } ?>
										
									</select>
								</div>
								<div class="form-group">
									<label for="Date"><strong class="admin_label text-left">Date :</strong></label>
									<select name="date" class="form-control" required>
										<option value="">Select</option>
										
										<?php while( $data1 = $date->fetch_array() ) { ?>
										
											<option value="<?php echo $data1['date'];?>"><?php echo $data1['date'];?></option>
										
										<?php } ?>
										
									</select>
								</div>
								<div class="form-group" id="image-preview">
									<label for="image-upload" id="image-label">Event Picture : <span>Dimension 1366*560</span></label>
									<input type="file" name="fil" id="image-upload" class="form-control-file" accept="image/*" required>
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
	<script type="application/javascript" src="../../vendor/dist/js/uploadPreview.js"></script>
	<script type="text/javascript">
		(function($) {
			"use strict";
			
			$(document).ready(function() {	
				$.uploadPreview({
					input_field: "#image-upload",   // Default: .image-upload
					preview_box: "#image-preview",  // Default: .image-preview
					label_field: "#image-label",    // Default: .image-label
					label_default: "Event Picture",   // Default: Choose File
					label_selected: "Change Picture",  // Default: Change File
					no_label: false                 // Default: false
				});
			});

				$('#image-upload').bind('change',function() {
				var pic=(this.files[0].size);

				if(pic>2048000) {
					alert("Image Size Must be Less than 2Mb");
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