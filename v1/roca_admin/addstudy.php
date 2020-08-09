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
				Add Resources
			</div>
			<button class="btn btn-block btn-dark btn-lg" onClick="location.href = 'studymaterial.php'; ">Study Material</button>

			<button class="btn btn-block btn-dark btn-lg" onClick="location.href = 'labmanual.php'; ">Lab Manual</button>

			<button class="btn btn-block btn-dark btn-lg" onClick="location.href = 'books.php'; ">Books</button>
		</div>
	</div>
	<?php include("javascript.php"); ?>
</body>
</html>