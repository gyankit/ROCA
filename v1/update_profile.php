<?php 
	include("config.php");
	if(!isset($_SESSION['user_login']))
    {
        header("location:index.php");
    }
	$id=$_REQUEST['id'];
	
	if($id=="")
	{
		header("location:index.php");
	}

	$sql="select * from roca_member_tbl where unique_id='$id'";
	$sr=mysqli_query($cn,$sql);
	if($sr) {
		if(mysqli_num_rows($sr)==0) {
			header("location: error.php");
		}
		else {
			$db=mysqli_fetch_array($sr);
			$photo=$db['photo'];
		}
	}
	else {
		header("location:error.php");
	}

	$msg="";
	if($_SERVER['REQUEST_METHOD']=='POST')
	{
		$contact=$_POST['contact'];
		$email=$_POST['email'];
		$date=$_POST['date'];
		$fil=$_FILES['fil'];
		$email=filter_var($email, FILTER_SANITIZE_EMAIL);
		if(filter_var($email, FILTER_VALIDATE_EMAIL))
		{
			$fname=$fil['name'];
			$old=$fil['tmp_name'];
			$new="images/members/".$fname;
			move_uploaded_file($old,$new);

			if($fname==""){
				$fname=$photo;
			}
			
			$sql2="update roca_member_tbl set contact='$contact', email='$email', date='$date', photo='$fname' where unique_id='$id'";
			$rd1=mysqli_query($cn,$sql2);
			if($rd1){
				header("location:profile.php");
			}
			else{
				$msg="Sorry...Can't Update";
			}	
		}
		else{
			$msg="Provide a valid Email Id";
		}
	}
?>

<html lang="en">
<head>
	<?php include("css.php"); ?>
	<title>R O C A</title>
	<link rel="stylesheet" href="css/preview.css">
	<style>
		#contact-info, #email-info, #date-info {
			display: none;
		}
	</style>
</head>
	
<body>
	<div class="header">
		<?php include("header.php"); ?>
	</div>
	<div class="container">
		<div class="jumbotron">
		    <div class="alert alert-dark h2 font-weight-bold text-center">
				<h2>Update Profile</h2>
			</div>
			<hr>
			<div class="alert text-danger font-weight-bold text-center">
				<?php echo $msg; ?>
			</div>
			<form role="form" class="form-submit" method="post" action="" enctype="multipart/form-data" name="forms" onSubmit="return(registration());">
				<div class="form-group">
					<label for="Name"><strong class="admin_label text-left">Name :</strong></label>
					<input type="text" class="form-control" name="name" value="<?php echo $db['name']; ?>" readonly>
				</div>
				<div class="form-group">
					<label for="Roll"><strong class="admin_label text-left">Roll No :</strong></label>
					<input type="text" class="form-control" name="roll" value="<?php echo $db['roll']; ?>" readonly>
				</div>
				<div class="form-group">
					<label for="Department"><strong class="admin_label text-left">Department :</strong></label>
					<input type="text" class="form-control" name="department" value="<?php echo $db['department']; ?>" readonly>
				</div>
				<div class="form-group">
					<label for="Contact"><strong class="admin_label text-left">Contact :</strong>
					<span class="text-danger" id="contact-info"> Must contain 10 digit</span></label>
					<input type="text" class="form-control" name="contact" id="contact" value="<?php echo $db['contact']; ?>" pattern="\d{10}" title="Must contain 10 digit">
				</div>
				<div class="form-group">
					<label for="Email"><strong class="admin_label text-left">Email :</strong>
					<span class="text-danger" id="email-info"> abc@abc.abc</span></label>
					<input type="text" class="form-control" name="email" id="email" value="<?php echo $db['email']; ?>" pattern="[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,}$" title="abc@abc.abc">
				</div>
				<div class="form-group">
					<label for="Date"><strong class="admin_label text-left">ROCA Joining Date :</strong>
					<span class="text-danger" id="date-info"> DD-MM-YYYY</span></label>
					<input type="text" class="form-control" name="date" id="date" value="<?php echo $db['date']; ?>" pattern="\d{1,2}-\d{1,2}-\d{4}" title="DD-MM-YYYY">
				</div>
				<div class="row">
					<div class="col-lg-4 mb-sm-4 ftco-animate">
						<img src="images/members/<?php echo $db['photo'];?>" width="300px" alt="No Pic">
					</div>
					<div class="form-group col-lg-4 mb-sm-4 ftco-animate" id="image-preview">
						<label for="image-upload" id="image-label">Choose Picture</label>
						<input type="file" name="fil" id="image-upload" class="form-control-file" accept="image/*">
					</div>
				</div>
				
				<button type="submit" class="btn btn-info btn-lg" id="sbt_btn">Update</button>
			</form>
			
		</div>
	</div>
	<?php include("javascript.php"); ?>
	
	<script type="text/javascript" src="js/uploadPreview.js"></script>
	<script type="text/javascript" src="js/register.js"></script>
	<script type="text/javascript" src="js/registration.js"></script>
	
</body>
</html>