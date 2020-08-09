<?php
session_start();
require("../required/check.php");
require("Payment.class.php");

$msg="";
if( isset( $_SESSION["pay_id"] ) ) {
	$id = $_SESSION["pay_id"];
}
else {
	header("location:view");
}

$pay = new Payment();
$data = $pay->view($id);

if($_SERVER['REQUEST_METHOD']=='POST')
{
	$upi=$_POST['upi'];

	if(isset($_FILES['fil'])) {
		$fil = $_FILES['fil'];
	} else {
		$fil = "";
	}

	$pic = $data["qr_code"];
	
	$msg = $pay->updatePay($id, $upi, $fil, $pic);
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
								<h2 class="title text-white">Welcome to ROCA</h2>
							</div>		
							<!-- Main Content -->
							<div class="card-body bg-gray">

								<div class="alert text-danger text-center font-weight-bold">
									<?php echo $msg; ?>
								</div>
								<form role="form" class="form-submit" method="post" action="" enctype="multipart/form-data">
									<div class="form-group">
										<label for="Mode"><strong class="admin_label text-left">Payment Mode :</strong></label>
										<input type="text" class="form-control" value="<?php echo $data['mode'];?>" readonly>
									</div>
									<div class="form-group">
										<label for="UPI"><strong class="admin_label text-left">UPI :</strong></label>
										<input type="text" class="form-control" name="upi" value="<?php echo $data['upi'];?>">
									</div>
									<div class="row">
										<div class="col-lg-6 mb-sm-6 ftco-animate">
											<img src="../../vendor/extra/payment/<?php echo $data['qr_code'];?>" width="300px" alt="No Pic">
										</div>
										<div class="form-group col-lg-6 mb-sm-6 ftco-animate" id="image-preview">
											<label for="image-upload" id="image-label">Choose qrcode</label>
											<input type="file" name="fil" id="image-upload" class="form-control-file" accept="image/*">
										</div>
									</div>
									<br>
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