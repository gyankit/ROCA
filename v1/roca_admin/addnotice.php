<?php 
	include("config.php");
	include("check.php");
	
	$sql="SHOW TABLES LIKE 'notice_tbl'";
	$sr=mysqli_query($cn,$sql);

	if(mysqli_num_rows($sr)==0)
	{
		$sql1="CREATE TABLE `id8469611_clubroca`.`notice_tbl` ( 
		`id` INT NOT NULL AUTO_INCREMENT ,
		`date` VARCHAR(10) NOT NULL ,
		`heading` VARCHAR(100) NOT NULL ,
		`notice` TEXT NOT NULL ,
		`requirement` TEXT NOT NULL ,
		`announcement` TEXT NOT NULL ,
		`venue` VARCHAR(50) NOT NULL ,
		`day` VARCHAR(10) NOT NULL ,
		`time` VARCHAR(10) NOT NULL ,
		`cost` INT(4) NOT NULL ,
		`photo` VARCHAR(500) NOT NULL ,
		`event` VARCHAR(6) NOT NULL ,
		`link` BIT(1) NOT NULL ,
		`member` BIT(1) NOT NULL ,
		`subscriber` BIT(1) NOT NULL ,
		PRIMARY KEY(`id`))";
		$sr1=mysqli_query($cn,$sql1);
		if($sr1==false)
		{
			header("location: error.php");
		}
	}

	$msg="";
	if($_SERVER['REQUEST_METHOD']=='POST')
	{
		$date=$_POST['date'];
		$heading=$_POST['heading'];
		$notice=$_POST['notice'];
		$requirement=$_POST['requirement'];
		$announce=$_POST['announcement'];
		$venue=$_POST['venue'];
		$day=$_POST['day'];
		$time=$_POST['time'];
		$cost=$_POST['cost'];
		$event=$_POST['event'];
		
		$fil=$_FILES['fil'];
		$fname=$fil['name'];
		$old=$fil['tmp_name'];
		$new="../images/notice/".$fname;
		move_uploaded_file($old,$new);

		$sql="INSERT INTO notice_tbl VALUES(NULL, '$date', '$heading', '$notice', '$requirement', '$announce', '$venue', '$day', '$time', '$cost', '$fname', '$event', 0, 0, 0 )";
		$rs=mysqli_query($cn,$sql);
		if ($rs)
		{
			header("location:viewnotice.php");
		}
		else
		{
			$msg="Error Occur....Try After Sometime..!!!";
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
				Add Notice
			</div>
			<div class="alert text-danger text-center font-weight-bold">
				<?php echo $msg; ?>
			</div>
			<form role="form" class="form-submit" method="post" action="" enctype="multipart/form-data">
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
	<?php include("javascript.php"); ?>
</body>
</html>