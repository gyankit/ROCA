<?php
include("config.php");
include("check.php");

$sql="SHOW TABLES LIKE 'registration_tbl'";
$sr=mysqli_query($cn,$sql);

if(mysqli_num_rows($sr)!=0)
{
	$sql1="drop table registration_tbl";
	mysqli_query($cn,$sql1);
}

header("location:home.php");
?>