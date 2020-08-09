<?php 
	include("config.php");
	include("check.php");

	$id=$_REQUEST['id'];
	$pics=$_REQUEST['pic'];

	$sql="SHOW TABLES LIKE 'notice_tbl'";
	$sr=mysqli_query($cn,$sql);

	if(mysqli_num_rows($sr)==0)
	{
		header("location: error.php");
	}
	else
	{	
		$sql="SELECT * FROM notice_tbl WHERE id='$id'";
		$res=mysqli_query($cn,$sql);
		$db=mysqli_fetch_array($res);
	}

	$msg="";
	if($_SERVER['REQUEST_METHOD']=='POST')
	{
		$heading=$_POST['heading'];
		$notice=$_POST['notice'];
		$requirement=$_POST['requirement'];
		$announce=$_POST['announcement'];
		$venue=$_POST['venue'];
		$day=$_POST['day'];
		$time=$_POST['time'];
		$cost=$_POST['cost'];
		$event=$_POST['event'];

		$fil=$_FILES['pics'];
	    $fname=$fil['name'];
    	$old=$fil['tmp_name'];
	    $new="../images/notice/".$fname;
	    move_uploaded_file($old,$new);
		
		if($fname=="") {
		    $fname=$pics;
		}
		else {
			$sql2="select photo from notice_tbl where photo='$pics'";
			$sr2=mysqli_query($cn,$sql2);
			if(mysqli_num_rows($sr2)==1) {
				$files=glob("../images/notice/$pics");
				foreach($files as $file) {
					if(is_file($file)) {
						unlink($file);
					}
				}
			}
		}
		
		$sql1="UPDATE notice_tbl SET heading='$heading', notice='$notice', requirement='$requirement', announcement='$announce', venue='$venue', day='$day', time='$time', cost='$cost', photo='$fname', event='$event' WHERE id='$id'";
		$rs=mysqli_query($cn,$sql1);
		if($rs==true)
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
					<input type="text" class="form-control" value="<?php echo $db['date']; ?>" readonly>
				</div>
				<div class="form-group">
					<label for="Notice Heading"><strong class="admin_label text-left">Notice Heading :</strong></label>
					<input type="text" class="form-control" name="heading" value="<?php echo $db['heading']; ?>">
				</div>
				<div class="form-group">
					<label for="Notice"><strong class="admin_label text-left">Notice Body :</strong></label>
					<textarea name="notice" class="form-control" rows="5"><?php echo $db['notice']; ?></textarea>
				</div>
				<div class="form-group">
					<label for="Requirement"><strong class="admin_label text-left">Requirement :</strong></label>
					<textarea name="requirement" class="form-control" rows="3"><?php echo $db['requirement']; ?></textarea>
				</div>
				<div class="form-group">
					<label for="Announcement"><strong class="admin_label text-left">Announcement :</strong></label>
					<textarea name="announcement" class="form-control" rows="3"><?php echo $db['announcement']; ?></textarea>
				</div>
				<div class="form-group">
					<label for="Vanue"><strong class="admin_label text-left">Venue :</strong></label>
					<input type="text" class="form-control" name="venue" value="<?php echo $db['venue']; ?>">
				</div>
				<div class="form-group">
					<label for="Day"><strong class="admin_label text-left">Day :</strong></label>
					<input type="text" class="form-control" name="day" value="<?php echo $db['day']; ?>">
				</div>
				<div class="form-group">
					<label for="Time"><strong class="admin_label text-left">Time :</strong></label>
					<input type="text" class="form-control" name="time" value="<?php echo $db['time']; ?>">
				</div>
				<div class="form-group">
					<label for="Cost"><strong class="admin_label text-left">cost :</strong></label>
					<input type="number" class="form-control" name="cost" value="<?php echo $db['cost']; ?>">
				</div>
				<div class="form-group">
					<label for="Event"><strong class="admin_label text-left">Event for :</strong></label>
					<select class="form-control" name="event">
						<option value="Member" <?php if($db['event']=="Member") { ?>selected<?php } ?>>Only ROCA Members</option>
						<option value="All" <?php if($db['event']=="All") { ?>selected<?php } ?>>All Student</option>
					</select>
				</div>
				<div class="row">
					<div class="col-lg-3.5 mb-sm-4 ftco-animate form-group" id="image-preview">
						<label for="image-upload" id="image-label">Choose Picture <span>Size : 1Mb</span></label>
						<input type="file" name="pics" id="image-upload" class="form-control-file" accept="image/*">
					</div>
					<div class="col-lg-3.5 mb-sm-4 ftco-animate">
						<img src="../images/notice/<?php echo $db['photo'];?>" width="350px" alt="No Pic">
					</div>
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