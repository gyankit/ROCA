<?php
session_start();
require("../required/check.php");
require("User.class.php");

if( isset($_SESSION["user_id"]) ) {
	$user = new User();
	$id = $_SESSION['user_id'];
	$data = $user->profile($id);
}
else
{
	header("location:view");
}

if( $_SERVER["REQUEST_METHOD"] == "POST" )
{
	if( isset( $_POST["delete"] ) ) {
		if( $_POST["delete"] == "delete" ) {
			if( $delete = $user->deleteUser($id) ) {
				back();
			} else {
				?> <script>alert("Error Occur");</script> <?php
			}
		} else {
			back();
		}
	}
	elseif( isset( $_POST["cancel"] ) ) {
		back();
	}
	else {
		back();
	}
}

function back() {
	unset( $_SESSION["user_id"] );
	header("location:view");
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
			<div class="card card-5">
				<div class="card-heading">
					<h2 class="title text-danger">Delete User Profile</h2>
				</div>
			</div>
			<!-- Main Content -->

			<div class="jumbotron-fluid">
				<div class="card-heading text-center h2">
					Delete Confirmation
				</div>
				<div class="alert alert-warning">
					<p><span class="float-left">Registration Id</span><i class="float-right font-weight-bold text-dark"><?php echo $data['unique_id']; ?></i></p>
					<br>
					<p><span class="float-left">Name</span><i class="float-right font-weight-bold text-dark"><?php echo $data['name']; ?></i></p>
					<br>
					<p><span class="float-left">Roll No</span><i class="float-right font-weight-bold text-dark"><?php echo $data['roll']; ?></i></p>
					<br>
					<p><span class="float-left">Contact</span><i class="float-right font-weight-bold text-dark"><?php echo $data['contact']; ?></i></p>
					<br>
					<p><span class="float-left">Email Id</span><i class="float-right font-weight-bold text-dark"><?php echo $data['email']; ?></i></p>
					<br>
					<p><span class="float-left">ROCA Joining</span><i class="float-right font-weight-bold text-dark"><?php echo $data['date']; ?></i></p>
					<br>
					<p><span class="float-left">College Joining</span><i class="float-right font-weight-bold text-dark"><?php echo $data['year']; ?></i></p>
					<br><br>
					<p class="text-center"><img src="../../vendor/extra/members/<?php echo $data['photo']; ?>" alt="No Pic" width="300px"></p>
					<br>

					<p class="text-danger h4 text-center">Are You Sure, You Want to Delete this Register User.</p>
				</div>
				<div class="alert">
					<form method="post" action="">
						<button type="submit" class="btn btn-success float-left col-5" name="cancel" value="cancel"> Cancel </button>
					
						<button type="submit" class="btn btn-danger float-right col-5" name="delete" value="delete"> Delete </button>
					</form>
				</div>
				<br>
				<br>
			</div>
			
			<!-- End Main Content -->
		</div>
	</div>
    <?php include("../required/footer.php"); ?>
</div>
<?php include("../required/javascript.php"); ?>
	</body>
</html>