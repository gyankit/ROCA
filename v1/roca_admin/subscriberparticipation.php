<?php
	include("config.php");
	include("check.php");
?>

<html lang="en">
<head>
	<?php include("css.php") ?>	
	<title>R O C A</title>
</head>

<body>
	<?php include("header.php"); ?>
	
	
	<div class="container">
		<div class="jumbotron">
			<div class="alert h1 font-weight-bold text-center">
				Subscriber Participation List
			</div>
			<button class="btn btn-block btn-dark btn-lg" onClick="location.href = 'subscriberuppart.php'; ">Upcomming-Events</button>
			<button class="btn btn-block btn-dark btn-lg" onClick="location.href = 'subscriberpart.php'; ">Events</button>
		</div>
	</div>
	<?php include("javascript.php"); ?>
</body>
</html>