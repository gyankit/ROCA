<?php
include("config.php");
$id=$_REQUEST['id'];
$link=$_REQUEST['link'];
if($id=="" or $link=="") {
    header("location: viewnotice.php");
}

if($link==0) {
    $sql="update notice_tbl set link=1 where id='$id'";
    mysqli_query($cn,$sql);
}
else {
    $sql="update notice_tbl set link=0 where id='$id'";
    mysqli_query($cn,$sql);
}

header("location: viewnotice.php");
?>