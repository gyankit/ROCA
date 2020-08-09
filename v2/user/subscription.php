<?php 
require("Home.class.php");
$msg="";
$email=$_REQUEST['email'];

if( $_REQUEST['eamil']=="" ) {
	header("location:home");
} else {
	$home = new Home();
	$msg = $home->addsubscriber($email);
}
?>
<!doctype html>
<html lang="en">
	<head>
		<link rel="stylesheet" href="../vendor/plugins/bootstrap/css/bootstrap.min.css">
		<title>R O C A</title>
	</head>
	<body class="container text-center">
		<h1 class="text-danger"><?= $msg; ?></h1>
	</body>
</html>