<?php
	include("config.php");
	include("check.php");
	$id=$_REQUEST['id'];

	$sql="delete from event_tbl where id='$id'";
	if(mysqli_query($cn,$sql))
	{
		$sql1="delete from gallery_tbl where event_id='$id'";
		mysqli_query($cn,$sql1);
	}

	header("location: viewevent.php");
?>