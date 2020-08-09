<?php
session_start();
include("../required/check.php");
require("Study.class.php"); 
$study = new Study(); 
$contact = $study->contact();
?>

<html lang="en">
<head>
	<?php include("../required/head.php") ?>
</head>

<body>
	<?php include("../required/header.php"); ?>
	
	<div class="hero-wrap hero-wrap-2" style="background-attachment:fixed;">
		<div class="overlay"></div>
		<div class="container">
			<div class="row no-gutters slider-text align-items-center justify-content-center" data-scrollax-parent="true">
				<div class="col-md-8 text-center">
					<p class="breadcrumbs"><span class="mr-2"><a  href="../home/home">Home</a></span> <span>Study</span></p>
						<h1 class="mb-3 bread">Study</h1>
				</div>
			</div>
		</div>
	</div>
	
	<div class="container m-t-50 m-b-50">
		<div class="jumbotron">
			
			<button class="btn btn-block btn-dark btn-lg" onClick="location.href = 'studymaterial'; ">Study Material</button>

			<button class="btn btn-block btn-dark btn-lg" onClick="location.href = 'labmanual'; ">Lab Manual</button>

			<button class="btn btn-block btn-dark btn-lg" onClick="location.href = 'books'; ">Books</button>
		</div>
	</div>
	<?php include("../required/footer.php"); ?>
	<?php include("../required/javascript.php"); ?>
</body>
</html>