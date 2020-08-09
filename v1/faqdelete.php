<?php
	include("config.php");
	include("check.php");

	$id=$_REQUEST['id'];

	$sql="delete from faq_tbl where id='$id'";
	mysqli_query($cn,$sql);

	header("location: faq.php");
?>