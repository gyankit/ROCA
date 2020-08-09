<?php
session_start();
require("../required/check.php");
require("Payment.class.php");
$msg="";

$pay = new Payment();

if($_SERVER['REQUEST_METHOD']=='POST')
{
	$mode=$_POST['mode'];
	$upi=$_POST['upi'];

	$fil = $_FILES['fils'];

	$msg = $pay->addPay($mode, $upi, $fil);
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
								<h2 class="title text-white">Add Payment Mode</h2>
							</div>		
							<!-- Main Content -->
							<div class="card-body bg-gray">

								<div class="alert text-danger text-center font-weight-bold">
									<?php echo $msg; ?>
								</div>
								<form role="form" class="form-submit" method="post" action="" enctype="multipart/form-data">
									<div class="form-group">
										<label for="Mode"><strong class="admin_label text-left">Payment Mode :</strong></label>
										<select name="mode" class="form-control" required>
											<option value="Bhim">Bhim</option>
											<option value="Paytm">Paytm</option>
											<option value="Google Pay">Google Pay</option>
											<option value="PhonePe">PhonePe</option>
											<option value="MobiKwik">MobiKwik</option>
											<option value="WhatsApp Pe">WhatsApp Pe</option>
											<option value="FreeCharge">FreeCharge</option>
										</select>
									</div>
									<div class="form-group">
										<label for="UPI"><strong class="admin_label text-left">UPI:</strong></label>
										<input type="text" class="form-control" name="upi" placeholder="UPI detail"  pattern="[a-z0-9._%+-]+\@[a-z]" title="upi@upi" required>
									</div>
									<div class="form-group" id="image-preview">
										<label for="image-upload" id="image-label">Choose qr-code</label>
										<input type="file" name="fils" id="image-upload" class="form-control-file" accept="image/*">
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
	<script src="../../vendor/dist/js/uploadPreview.js"></script>
<script>
	(function($) {
	"use strict";
			$('#image-upload').bind('change',function() {
			var pic=(this.files[0].size);

			if(pic>150000) {
				alert("Image Size Must be Less than 150kb");
				$('#sbt_btn').prop('disabled', true);
			} else {
				$('#sbt_btn').prop('disabled', false);
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