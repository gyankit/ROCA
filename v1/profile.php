<?php
	include("config.php");
	include("check.php");
	$user=$_SESSION["user"];

	$sql="Select * from roca_member_tbl where unique_id='$user'";
	$rs=mysqli_query($cn,$sql);
	if($rs==true)
	{
		if (mysqli_num_rows($rs)==0)
		{
			header("location:error.php");
		}
		else
		{
			$db=mysqli_fetch_array($rs);
		}
	}
	else
	{
		header("location:error.php");
	}
?>

<!doctype html>
<html lang="en">
<head>
	<?php include("css.php"); ?>
</head>

<body>
	<?php include("header.php"); ?>
	
	<div class="hero-wrap hero-wrap-2" style="background-image: background-attachment:fixed;">
      <div class="overlay"></div>
      <div class="container">
        <div class="row no-gutters slider-text align-items-center justify-content-center" data-scrollax-parent="true">
          <div class="col-md-8 ftco-animate text-center">
            <p class="breadcrumbs"><span class="mr-2"><a <?php if($_SESSION["user_login"]=="True") { ?> href="home.php" <?php } else { ?> href="index.php" <?php } ?>>Home</a></span> <span>Profile</span></p>
            <h1 class="mb-3 bread">Profile</h1>
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
					<span class="float-left">Registration Id</span><i class="float-right font-weight-bold text-dark"><?php echo $db['unique_id']; ?></i>
				</div>
				<div class="alert">
					<span class="float-left">Name</span><i class="float-right font-weight-bold text-dark"><?php echo $db['name']; ?></i>
				</div>
				<div class="alert">
					<span class="float-left">Roll No</span><i class="float-right font-weight-bold text-dark"><?php echo $db['roll']; ?></i>
				</div>
				<div class="alert">
					<span class="float-left">Department</span><i class="float-right font-weight-bold text-dark">
					<?php 
						if ($db['department']=="CSE") { echo "Computer Science and Engineering"; } 
						if ($db['department']=="ME") { echo "Mechanical Engineering"; } 
						if ($db['department']=="IT") { echo "Information and Technology"; } 
						if ($db['department']=="ECE") { echo "Electronics Engineering"; } 
						if ($db['department']=="EE") { echo "Electrical Engineering"; } 
						if ($db['department']=="CHE") { echo "Chemical Engineering"; } 
					?></i>
				</div>
			</div>
			<div class="jumbotron-fluid">
				<div class="h3 text-center text-success">
					Contact Details
				</div>
				<div class="alert">
					<span class="float-left">Contact No</span><i class="float-right font-weight-bold text-dark"><?php echo $db['contact']; ?></i>
				</div>
				<div class="alert">
					<span class="float-left">Email id</span><i class="float-right font-weight-bold text-dark"><?php echo $db['email']; ?></i>
				</div>
			</div>
			<div class="jumbotron-fluid">
				<div class="h3 text-center text-success">
					ROCA Related Details
				</div>
				<div class="alert">
					<span class="float-left">ROCA Joining Date</span><i class="float-right font-weight-bold text-dark"><?php echo $db['date']; ?></i>
				</div>
				<div class="alert">
					<span class="float-left">Field</span><i class="float-right font-weight-bold text-dark"><?php echo $db['field']; if($db['head']=="YES") { echo "Head"; } ?></i>
				</div>
				<div class="alert">
					<a class="btn btn-lg btn-block btn-link text-danger font-weight-bold btn-warning" href="study.php">Study Resources</a>
				</div>
			</div>
			<div class="jumbotron-fluid">
				<div class="h3 text-center text-success">
					Profile Picture
				</div>
				<div class="alert">
					<img src="images/members/<?php echo $db['photo']; ?>" alt="No Pic" width="300px">
				</div>
			</div>
		</div>
	</section>
	<div class="jumbotron text-center h4">Want to Update Details <button class="btn btn-primary"><a class="cta text-dark" href="update_profile.php?id=<?php echo $user; ?>"> Click here</a></button></div>
	
	
	<?php include("footer.php") ?>
	
	<?php include("javascript.php"); ?>
</body>
</html>