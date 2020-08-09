<?php 
	include("config.php");
	include("check.php");

	$sql="SHOW TABLES LIKE 'payment_tbl'";
	$sr=mysqli_query($cn,$sql);

	if(mysqli_num_rows($sr)==0)
	{
		$sql1="CREATE TABLE `id8469611_clubroca`.`payment_tbl` ( `id` INT(10) NOT NULL AUTO_INCREMENT , `mode` VARCHAR(15) NOT NULL, `upi` VARCHAR(50) NOT NULL, `qr_code` VARCHAR(500) NOT NULL , PRIMARY KEY (`id`))";
		$sr1=mysqli_query($cn,$sql1);
		if($sr1==false)
		{
			header("location: error.php");
		}
	}

	$msg="";
	if($_SERVER['REQUEST_METHOD']=='POST')
	{
		$mode=$_POST['mode'];
		$upi=$_POST['upi'];

		$fil=$_FILES['fil'];
		$fname=$fil['name'];
		$old=$fil['tmp_name'];
		$new="../images/payment/".$fname;
		move_uploaded_file($old,$new);

	    if($upi=="" and $fname=="")
		{
			$msg="Please Provide Valid Details";
		}
		else
		{
			$sql="insert into payment_tbl values(NULL, '$mode', '$upi', '$fname')";
			$rs=mysqli_query($cn,$sql);

			if ($rs)
			{
				header("location: viewpay.php");
			}
			else
			{
				$msg="Error Occur....Try after some time...!!!";
			}
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
				Add Payment Mode
			</div>
			<div class="alert text-danger text-center font-weight-bold">
				<?php echo $msg; ?>
			</div>
			<form role="form" class="form-submit" method="post" action="" enctype="multipart/form-data">
				<div class="form-group">
					<label for="Mode"><strong class="admin_label text-left">Payment Mode :</strong></label>
					<select name="mode" class="form-control">
						<option value="Paytm">Paytm</option>
						<option value="Google Pay">Google Pay</option>
						<option value="PhonePe">PhonePe</option>
						<option value="MobiKwik">MobiKwik</option>
						<option value="FreeCharge">FreeCharge</option>
					</select>
				</div>
				<div class="form-group">
					<label for="UPI"><strong class="admin_label text-left">UPI:</strong></label>
					<input type="text" class="form-control" name="upi" placeholder="UPI detail" required>
				</div>
				<div class="form-group" id="image-preview">
					<label for="image-upload" id="image-label">Choose qr-code</label>
					<input type="file" name="fil" id="image-upload" class="form-control-file" accept="image/*">
				</div>
				<button class="btn btn-info btn-lg" id="sbt_btn">Submit</button>
			</form>
		</div>
	</div>
	<?php include("javascript.php"); ?>
	
	<script type="text/javascript" src="../js/uploadPreview.js"></script>
	<script>
	(function($) {
	"use strict";
			$('#image-upload').bind('change',function() {
			var pic=(this.files[0].size);

			if(pic>150000) {
				alert("Image Size Must be Less than 150kb");
				$('#sbt_btn').prop('disabled', true);
			}
		});

		$(document).ready(function() {	
			$.uploadPreview({
				input_field: "#image-upload",   // Default: .image-upload
				preview_box: "#image-preview",  // Default: .image-preview
				label_field: "#image-label",    // Default: .image-label
				label_default: "Choose qrcode",   // Default: Choose File
				label_selected: "Change qrcode",  // Default: Change File
				no_label: false                 // Default: false
			});
		});

	})(jQuery);
	</script>
</body>
</html>