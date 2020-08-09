<?php
	include("config.php");
	include("check.php");
	$id=$_REQUEST['id'];
	$photo=$_REQUEST['photo'];
	$sql="delete from payment_tbl where id='$id'";
	if(mysqli_query($cn,$sql)) {
		$sql1="select qr_code from payment_tbl where qr_code='$photo'";
		$sr1=mysqli_query($cn,$sql1);
		if(mysqli_num_rows($sr1)==1) {
			$files=glob("../images/payment/$photo");
			foreach($files as $file) {
				if(is_file($file)) {
					unlink($file);
				}
			}
		}
	}
	header("location: viewpay.php");
?>