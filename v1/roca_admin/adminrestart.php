<?php
    include("config.php");
    $sql="drop table `admin_tbl`";
    mysqli_query($cn,$sql);
    header("location:index.php");
?>