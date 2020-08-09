<?php 
include("config.php");
$msg="";
$email=$_REQUEST['email'];
if($email=="") {
	header("location:error.php");
}

$sql="SHOW TABLES LIKE 'subscriber_tbl'";
$sr=mysqli_query($cn,$sql);

if(mysqli_num_rows($sr)==0)
{
	$sql1="CREATE TABLE `id8469611_clubroca`.`subscriber_tbl` ( `email` VARCHAR(50) NOT NULL , PRIMARY KEY (`email`))";
	$sr1=mysqli_query($cn,$sql1);
	if($sr1==false)
	{
		header("location: error.php");
	}
}

$sql2="insert into subscriber_tbl values('$email')";
if(mysqli_query($cn,$sql2))
{
	$msg="Thank You for Subscribing Our mail Survice";
}
else
{
	$msg="You are already Subscribe Us";
}

?>

<!doctype html>
<html lang="en">
	<head>
		<?php include("css.php"); ?>
		<title>R O C A</title>
	</head>
	<body class="container text-center">
		<h1 class="text-danger"><?php echo $msg; ?></h1>
	</body>
</html>