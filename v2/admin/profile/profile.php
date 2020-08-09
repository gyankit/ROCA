<?php
session_start();
require("../required/check.php");
require("Profile.class.php");

$id = $_SESSION['admin_id'];
$role = $_SESSION['admin_role'];
$name = $_SESSION['admin_name'];

$profile = new Profile();
$data = $profile->adminProfile($id);

if( $_SERVER["REQUEST_METHOD"] == "POST" )
{
	if( $id == "ROCA2019GYAN" ) {
		if( isset($_POST["reset"] ) ) {
			if( $_POST["reset"] == "reset" ) {
				$profile->Reset();
			}
		}
		elseif( isset($_POST["restart"] ) ) {
			if( $_POST["restart"] == "restart" ) {
				$profile->Restart();
			}
		}
	}
}

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
							<h2 class="title text-white">Profile Details</h2>
						</div>		
						<!-- Main Content -->
						<div class="card-body bg-gray">
							<div class="alert alert-info">
							<?php if( $id=="ROCA2019GYAN" ) { echo "Welcome ".$name; } else { ?>
							</div>
								<div class="alert alert-info">
									<div class="alert">
										<span class="float-left">Registration Id</span><i class="float-right font-weight-bold text-dark"><?php echo $id; ?></i>
									</div>
									<div class="alert">
										<span class="float-left">Name</span><i class="float-right font-weight-bold text-dark"><?php echo $data['name']; ?></i>
									</div>
									<div class="alert">
										<span class="float-left">Roll No</span><i class="float-right font-weight-bold text-dark"><?php echo $data['roll']; ?></i>
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
									<div class="alert">
										<span class="float-left">Contact No</span><i class="float-right font-weight-bold text-dark"><?php echo $data['contact']; ?></i>
									</div>
									<div class="alert">
										<span class="float-left">Email id</span><i class="float-right font-weight-bold text-dark"><?php echo $data['email']; ?></i>
									</div>
									<div class="alert">
										<span class="float-left">ROCA Joining Date</span><i class="float-right font-weight-bold text-dark"><?php echo $data['date']; ?></i>
									</div>
									<div class="alert">
										<span class="float-left">Field</span><i class="float-right font-weight-bold text-dark"><?php echo $data['field']; if($data['head']=="YES") { echo "Head"; } ?></i>
									</div>
									<div class="alert">
										<img src="../../vendor/extra/members/<?php echo $data['photo']; ?>" alt="No Pic" width="250px">
									</div>
								</div>		
							
							<?php } if($role=="ADMINISTRATOR" && $id!="ROCA2019GYAN") { ?>
							
							<div class="alert alert-danger">
								<p>Want to Give this site to Another</p>
								<button class="btn btn-danger btn-sm auto-captalize" onclick="location.href = 'verify';">click here</button>
							</div>
							
							<?php } if($role=="ADMINISTRATOR" && $id=="ROCA2019GYAN") { ?>
							
							<form method="post" action="<?php echo $_SERVER["PHP_SELF"] ?>">
								<div class="alert alert-warning">
									<p>Want to Reset this Site</p>
									<button type="submit" class="btn btn-danger" value="reset" name="reset"> RESET </button>
								</div>
								<div class="alert alert-warning">
									<p>Want to Restart this Site</p>
									<button type="submit" class="btn btn-danger" value="restart" name="restart"> RESTART </button>
								</div>
							</form>
							<?php } ?>
							
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

</html>