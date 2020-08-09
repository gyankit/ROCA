<?php 
	session_start();

	$cn=mysqli_connect("localhost","root","","id8469611_clubroca");
	
	if(!$cn)
	{
		header("location: error.php");
	}
	
	define("SITE_TITLE","R O C A")
?>