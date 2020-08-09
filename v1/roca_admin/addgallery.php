<?php 
	include("config.php");
	include("check.php");

	$sql="SHOW TABLES LIKE 'gallery_tbl'";
	$sr=mysqli_query($cn,$sql);

	if(mysqli_num_rows($sr)==0)
	{
		$sql1="CREATE TABLE `id8469611_clubroca`.`gallery_tbl` ( `id` INT(10) NOT NULL AUTO_INCREMENT , `gallery` VARCHAR(500) NOT NULL , `event_id` INT(10) NOT NULL , PRIMARY KEY (`id`))";
		$sr1=mysqli_query($cn,$sql1);
		if($sr1==false)
		{
			header("location: error.php");
		}
	}

	$msg="";
	if($_SERVER['REQUEST_METHOD']=='POST')
	{
		$event=$_POST['event'];
		$date=$_POST['date'];

		$sql2="SELECT * FROM event_tbl WHERE event='$event' AND date='$date'";
		$rs2=mysqli_query($cn,$sql2);
		if(mysqli_num_rows($rs2) != 0)
		{
			$d2=mysqli_fetch_array($rs2);
			$event_id=$d2['id'];

			$fil=$_FILES['fil'];
			$fname=$fil['name'];
			$old=$fil['tmp_name'];
			$new="../images/events/".$fname;
			move_uploaded_file($old,$new);

			$sql="INSERT INTO gallery_tbl VALUES(NULL, '$fname', '$event_id')";
			$rs=mysqli_query($cn,$sql);

			if ($rs)
			{
				$msg="Picture Added";
			}
			else
			{
				$msg="Error Occur....Try after some time...!!!";
			}
		}
		else
		{
			$msg="Please Select valid Event and Date...!!!";
		}
	}
?>

<html lang="en">
<head>
	<?php include("css.php"); ?>
	<title>R O C A</title>
	<link rel="stylesheet" href="../css/preview.css">
</head>
	
<body>
	<div class="header">
		<?php include("header.php"); ?>
	</div>
	<div class="container">
		<div class="jumbotron">
			<div class="card-title text-capitalize text-center h2">
				Add Event Picture
			</div>
			<div class="alert text-danger text-center font-weight-bold">
				<?php echo $msg; ?>
			</div>
			<form role="form" class="form-submit" method="post" action="" enctype="multipart/form-data">
				<div class="form-group">
					<label for="Event"><strong class="admin_label text-left">Event :</strong></label>
					<select name="event" class="form-control" required>
						<option value="">Select</option>
						<?php
						$sql1="SELECT DISTINCT event FROM event_tbl order by id desc";
						$rs=mysqli_query($cn,$sql1);
						while($d=mysqli_fetch_array($rs))
						{
							?>
							<option value="<?php echo $d['event'];?>"><?php echo $d['event'];?></option>
							<?php
						}
						?>  
					</select>
				</div>
				<div class="form-group">
					<label for="Date"><strong class="admin_label text-left">Date :</strong></label>
					<select name="date" class="form-control" required>
						<option value="">Select</option>
						<?php
						$sql1="SELECT DISTINCT date FROM event_tbl order by id desc";
						$rs1=mysqli_query($cn,$sql1);
						while($d1=mysqli_fetch_array($rs1))
						{
							?>
							<option value="<?php echo $d1['date'];?>"><?php echo $d1['date'];?></option>
							<?php
						}
						?>  
					</select>
				</div>
				<div class="form-group" id="image-preview">
					<label for="image-upload" id="image-label">Event Picture : <span>Dimension 1366*560</span></label>
					<input type="file" name="fil" id="image-upload" class="form-control-file" accept="image/*" required>
				</div>
				
				<button class="btn btn-info btn-lg">Submit</button>
			</form>
		</div>
	</div>
	
		<script type="text/javascript" src="../js/uploadPreview.js"></script>
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
	<?php include("javascript.php"); ?>
</body>
</html>