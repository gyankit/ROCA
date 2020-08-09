<?php
	include("config.php");
	include("check.php");
	$id=$_REQUEST['id'];

	$sql="delete from coordinators_tbl where unique_id='$id'";
	if(mysqli_query($cn,$sql)) 
	{ 
		$sql2="update roca_member_tbl set coordinator='NO' field='Not Specified', head='NO' where unique_id='$id'";
		mysqli_query($cn,$sql2);
	}

	header("location: viewco.php");
?>