<?php
	include("config.php");
	include("check.php");

	$_SESSION['user_login']="";
	$_SESSION["user"] = "";
	unset($_SESSION['user_login']);

	session_unset();

	header("location: index.php");
?>
