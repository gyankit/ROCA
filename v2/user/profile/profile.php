<?php 
session_start();
require("../required/check.php");
require("Profile.class.php"); 
$profile = new Profile();
$contact = $profile->contact();

$data = $profile->profiles($_SESSION['user_id']);
if(!$data) { header("location: ../../error/404"); }
?>
<!doctype html>
<html>
<head>
	<?php include("../required/head.php"); ?>
</head>
<body>
	<?php include("../required/header.php");?>
	

	<div class="">
	
	    <div class="hero-wrap hero-wrap-2" style="background-attachment:fixed;">
		  	<div class="overlay"></div>
			<div class="container">
				<div class="row no-gutters slider-text align-items-center justify-content-center" data-scrollax-parent="true">
					<div class="col-md-8 text-center">
						<p class="breadcrumbs"><span class="mr-2"><a  href="../home/home">Home</a></span> <span>Profile</span></p>
							<h1 class="mb-3 bread">Profile Details</h1>
					</div>
				</div>
			</div>
		</div>
		
        <section class="ftco-section">
		<div class="container">
			<div class="jumbotron-fluid">
				<div class="h3 text-center text-success">
					Basic Information
				</div>
				<div class="alert">
					<span class="float-left">Registration Id</span><i class="float-right font-weight-bold text-dark"><?= $data['unique_id']; ?></i>
				</div>
				<div class="alert">
					<span class="float-left">Name</span><i class="float-right font-weight-bold text-dark"><?= $data['name']; ?></i>
				</div>
				<div class="alert">
					<span class="float-left">Roll No</span><i class="float-right font-weight-bold text-dark"><?= $data['roll']; ?></i>
				</div>
				<div class="alert">
					<span class="float-left">Department</span><i class="float-right font-weight-bold text-dark">
					<?php 
						if ($data['department']=="CSE") { echo "Computer Science and Engineering"; } 
						if ($data['department']=="ME") { echo "Mechanical Engineering"; } 
						if ($data['department']=="IT") { echo "Information and Technology"; } 
						if ($data['department']=="ECE") { echo "Electronics Engineering"; } 
						if ($data['department']=="EE") { echo "Electrical Engineering"; } 
						if ($data['department']=="CHE") { echo "Chemical Engineering"; } 
					?></i>
				</div>
			</div>
			<div class="jumbotron-fluid">
				<div class="h3 text-center text-success">
					Contact Details
				</div>
				<div class="alert">
					<span class="float-left">Contact No</span><i class="float-right font-weight-bold text-dark"><?= $data['contact']; ?></i>
				</div>
				<div class="alert">
					<span class="float-left">Email id</span><i class="float-right font-weight-bold text-dark"><?= $data['email']; ?></i>
				</div>
			</div>
			<div class="jumbotron-fluid">
				<div class="h3 text-center text-success">
					ROCA Related Details
				</div>
				<div class="alert">
					<span class="float-left">ROCA Joining Date</span><i class="float-right font-weight-bold text-dark"><?= $data['date']; ?></i>
				</div>
				<div class="alert">
					<span class="float-left">Field</span><i class="float-right font-weight-bold text-dark"><?= $data['field']; if($data['head']=="YES") { echo "Head"; } ?></i>
				</div>
				<div class="alert">
					<a class="btn btn-lg btn-block btn-link text-danger font-weight-bold btn-warning" href="../study/study">Study Resources</a>
				</div>
			</div>
			<div class="jumbotron-fluid">
				<div class="h3 text-center text-success">
					Profile Picture
				</div>
				<div class="alert text-center">
					<img src="../../vendor/extra/members/<?= $data['photo']; ?>" alt="No Pic" width="300px">
				</div>
			</div>
		</div>
	</section>
	<div class="jumbotron text-center h4">Want to Update Details <button class="btn btn-primary" onclick="location.href='update'"> Click here</button></div>

        
	</div>
	
	<?php include("../required/footer.php");?>

	<?php include("../required/javascript.php");?>
</body>
</html>