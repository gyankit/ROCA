<?php 
	include("config.php");
	include("check.php");

	$id=$_REQUEST['id'];
	$pics=$_REQUEST['photo'];

	$sql="SHOW TABLES LIKE 'payment_tbl'";
	$sr=mysqli_query($cn,$sql);

	if(mysqli_num_rows($sr)==0)
	{
		header("location: error.php");
	}

	$msg="";
	$id=$_REQUEST['id'];
	if($_SERVER['REQUEST_METHOD']=='POST')
	{
	    $upi=$_POST['upi'];
	    
		$fil=$_FILES['fil'];
		$fname=$fil['name'];
		$old=$fil['tmp_name'];
		$new="../images/payment/".$fname;
		move_uploaded_file($old,$new);
		
		if($fname=="") {
		    $fname=$pics;
		}
		else {
			$sql2="select qr_code from payment_tbl where qr_code='$pics'";
			$sr2=mysqli_query($cn,$sql2);
			if(mysqli_num_rows($sr2)==1) {
				$files=glob("../images/payment/$pics");
				foreach($files as $file) {
					if(is_file($file)) {
						unlink($file);
					}
				}
			}
		}

		$sql="update payment_tbl set upi='$upi', qr_code='$fname' where id='$id'";
		$rd=mysqli_query($cn,$sql);
		if($rd)
		{
			header("location: viewdonate.php");
		}
		else
		{
			$msg="Sorry! Cant Update";
		}
	}

	$sql1="select * from payment_tbl where id='$id'";
	$rs=mysqli_query($cn,$sql1);
	$db=mysqli_fetch_array($rs);
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
				Update Payment Mode
			</div>
			<div class="alert text-danger text-center font-weight-bold">
				<?php echo $msg; ?>
			</div>
			<form role="form" class="form-submit" method="post" action="" enctype="multipart/form-data">
				<div class="form-group">
					<label for="Mode"><strong class="admin_label text-left">Payment Mode :</strong></label>
					<input type="text" class="form-control" value="<?php echo $db['mode'];?>" readonly>
				</div>
				<div class="form-group">
					<label for="UPI"><strong class="admin_label text-left">UPI :</strong></label>
					<input type="text" class="form-control" name="upi" value="<?php echo $db['upi'];?>">
				</div>
				<div class="row">
					<div class="col-lg-4 mb-sm-4 ftco-animate">
						<img src="../images/members/<?php echo $db['qr_code'];?>" width="300px" alt="No Pic">
					</div>
					<div class="form-group col-lg-4 mb-sm-4 ftco-animate" id="image-preview">
						<label for="image-upload" id="image-label">Choose qrcode</label>
						<input type="file" name="fil" id="image-upload" class="form-control-file" accept="image/*">
					</div>
				</div>
				<button class="btn btn-info btn-lg">Submit</button>
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