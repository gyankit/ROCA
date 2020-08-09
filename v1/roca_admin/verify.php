<?php
	include("config.php");
	include("check.php");
?>
<html lang="en">
<head>
	<?php include("css.php"); ?>
	<title>R O C A</title>
</head>

<body>
	<div class="header">
		<?php include("header.php"); ?>
	</div>
	 
	<div class="container-fluid">
		<div class="jumbotron card-title text-capitalize text-center h2 text-danger font-weight-bold">
			Welcome to ROCA Family
		</div>
		<br><br>
		<div class="alert alert-danger h3 font-weight-bold text-center">
			Are, you sure<br>You want to Transfer Your Rights to New Admin<br><br>
		</div>
			<button class="btn btn-danger font-weight-bold float-right">Procced to Transfer <a class="btn btn-link text-primary font-weight-bold" href="transfer.php">Click Here</a> </button>
			<button class="btn btn-primary font-weight-bold float-left">Go to previous page <a class="btn btn-link text-danger font-weight-bold" href="profile.php">Click Here</a> </button>
	</div>
	<?php include("javascript.php") ?>
</body>
</html>