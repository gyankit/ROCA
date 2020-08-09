<?php
session_start();
require("../required/check.php");
require("Study.class.php");

?>
<!DOCTYPE html>
<html lang="en">

<head>
	<?php include("../required/head.php"); ?>
</head>

<body class="hold-transition sidebar-mini">
	<div class="wrapper">
		<?php include("../required/header.php"); ?>
		<?php include("../required/sidebar.php"); ?>

		<!-- Main content -->
		<div class="content">
			<div class="container">
				<div class="page-wrapper p-t-5 p-b-10">
					<div class="wrapper wrapper--w790">
						<div class="card card-5">
							<div class="card-heading bg-info">
								<h2 class="title text-white">View Study Resources</h2>
							</div>		
							<!-- Main Content -->
							<div class="card-body bg-gray">

								<button class="btn btn-block btn-dark btn-lg" onClick="location.href = 'studymaterialView'; ">Study Material</button>

								<button class="btn btn-block btn-dark btn-lg" onClick="location.href = 'labmanualView'; ">Lab Manual</button>

								<button class="btn btn-block btn-dark btn-lg" onClick="location.href = 'bookView'; ">Books</button>

							</div>
							<!-- End Main Content -->
						</div>
					</div>
				</div>
			</div>
		</div>
		<?php include("../required/footer.php"); ?>
	</div>
	<?php include("../required/javascript.php"); ?>
</body>
</html>