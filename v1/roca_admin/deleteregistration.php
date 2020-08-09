<?php
include("config.php");
$sql="drop table member_register_tbl";
mysqli_query($cn,$sql);
header("location:home.php");
?>