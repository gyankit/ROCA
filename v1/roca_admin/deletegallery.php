<?php
	include("config.php");
	include("check.php");
	$id=$_REQUEST['id'];
	$photo=$_REQUEST['photo'];
	$sql="delete from gallery_tbl where id='$id'";
	if(mysqli_query($cn,$sql)) {
		$sql1="select gallery from gallery_tbl where gallery='$photo'";
		$sr1=mysqli_query($cn,$sql1);
		if(mysqli_num_rows($sr1)==1) {
			$files=glob("../images/events/$photo");
			foreach($files as $file) {
				if(is_file($file)) {
					unlink($file);
				}
			}
		}
	}
	header("location: viewgallery.php");
?>