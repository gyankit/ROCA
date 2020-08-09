<?php
	include("config.php");
	if(!isset($_SESSION['user_login']))
    {
        header("location:index.php");
    }


	$sql="SHOW TABLES LIKE 'roca_member_tbl'";
	$sr=mysqli_query($cn,$sql);
	if(!$sr)
	{
		header("location: index.php");
	}
	elseif(mysqli_num_rows($sr)==0)
	{
		header("location: index.php");
	}
		
?>

<html lang="en">
<head>
	<?php include("css.php") ?>	
	<title>R O C A</title>
</head>

<body>
	<?php include("header.php"); ?>
	<div class="container">
		
		<div class="jumbotron text-center" id="first">
			<p>If you Forgot your password, You can change the password by following some steps.<br>Click below to Proceed... </p>
			<button class="btn btn-block" id="button1" onClick="location.href = 'forgot1.php'; ">Proceed</button>	
		</div>
				
	</div>
	<?php include("javascript.php"); ?>
</body>
</html>