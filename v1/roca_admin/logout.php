<?php
	include("config.php");

	$_SESSION['admin_login']="";
	$_SESSION["admin"] = "";

	unset($_SESSION['admin_login']);

	session_unset();

	header("location: ../index.php");
?>
