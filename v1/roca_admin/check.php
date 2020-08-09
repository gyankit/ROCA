<?php
	if(!isset($_SESSION['admin_login']) or $_SESSION["admin_login"]=="")
	{
		header("location: index.php");
	}

	$sql="SHOW TABLES LIKE 'admin_tbl'";
	$sr=mysqli_query($cn,$sql);

	if(mysqli_num_rows($sr)==0)
	{
		header("location: index.php");
	}
?>