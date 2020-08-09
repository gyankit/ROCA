<?php
	include("config.php");
	include("check.php");
	$id=$_REQUEST['id'];

	$photo=$_REQUEST['photo'];

	$sql="delete from study_tbl where id='$id'";
	mysqli_query($cn,$sql);

	$files=glob("../images/study/$photo");

	foreach($files as $file)
	{
		if(is_file($file))
		{
			unlink($file);
		}
	}

	header("location: viewstudy.php");
?>