<?php
	include("config.php");
	include("check.php");
	$id=$_REQUEST['id'];
	$photo=$_REQUEST['pic'];
	$sql="delete from roca_member_tbl where unique_id='$id'";
	if(mysqli_query($cn,$sql)) {
		$sql1="select photo from roca_member_tbl where photo='$photo'";
		$sr1=mysqli_query($cn,$sql1);
		if(mysqli_num_rows($sr1)==1) {
			$files=glob("../images/members/$photo");
			foreach($files as $file) {
				if(is_file($file)) {
					unlink($file);
				}
			}
		}
	}
	header("location: viewuser.php");
?>