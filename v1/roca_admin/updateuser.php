<?php 
	include("config.php");
	include("check.php");

	$msg="";
	$id=$_REQUEST['id'];
	$pics=$_REQUEST['pc'];
	$pass=$_REQUEST['ps'];

	$sql="select * from roca_member_tbl where unique_id='$id'";
	$res=mysqli_query($cn,$sql);
	$db=mysqli_fetch_array($res);

	if($_SERVER['REQUEST_METHOD']=='POST')
	{
		$contact=$_POST['contact'];
		$email=$_POST['email'];
		$date=$_POST['date'];
		$password=$_POST['password'];
		if($password="") {
			$enpt_pass=$pass;
		}
		else {
			$enpt_pass=md5($password);
		}
		
		$fil=$_FILES['fil'];
		$fname=$fil['name'];
		$old=$fil['tmp_name'];
		$new="../images/members/".$fname;
		move_uploaded_file($old,$new);
		
		if($fname=="") {
		    $fname=$pics;
		}
		else {
			$sql2="select photo from roca_member_tbl where photo='$pics'";
			$sr2=mysqli_query($cn,$sql2);
			if(mysqli_num_rows($sr2)==1) {
				$files=glob("../images/members/$pics");
				foreach($files as $file) {
					if(is_file($file)) {
						unlink($file);
					}
				}
			}
		}

		$sql2="update roca_member_tbl set contact='$contact', email='$email', date='$date', password='$enpt_pass',  photo='$fname' where unique_id='$id'";
		$rd1=mysqli_query($cn,$sql2);

		if($rd1==true)
		{
			header("location: viewuser.php");
		}
		else
		{
			$msg="Sorry...Can't Update";
		}	
		
	}
?>

<html lang="en">
<head>
	<?php include("css.php"); ?>
	<title>R O C A</title>
	<link rel="stylesheet" href="../css/password.css">
	<link rel="stylesheet" href="../css/preview.css">
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
			<div class="card-title text-capitalize text-center h2">
				Update Register User
			</div>
			<div class="alert text-danger text-center font-weight-bold">
				<?php echo $msg; ?>
			</div>
			<form role="form" class="form-submit" enctype="multipart/form-data" method="post" action="" name="forms" onSubmit="return(registration());">
				<div class="form-group">
					<label for="Name"><strong class="admin_label text-left">Registration Id :</strong></label>
					<input type="text" class="form-control" value="<?php echo $db['unique_id']; ?>" readonly>
				</div>
				<div class="form-group">
					<label for="Name"><strong class="admin_label text-left">Name :</strong></label>
					<input type="text" class="form-control" value="<?php echo $db['name']; ?>" readonly>
				</div>
				<div class="form-group">
					<label for="Roll"><strong class="admin_label text-left">Roll No :</strong></label>
					<input type="text" class="form-control" value="<?php echo $db['roll']; ?>" readonly>
				</div>
				<div class="form-group">
					<label for="Department"><strong class="admin_label text-left">Department :</strong></label>
					<input type="text" class="form-control" value="<?php echo $db['department']; ?>" readonly>
				</div>
				<div class="form-group">
					<label for="Contact"><strong class="admin_label text-left">Contact :</strong>
					<span class="text-danger" id="contact-info"> Must contain 10 digit</span></label>
					<input type="text" class="form-control" name="contact" id="contact" placeholder="Contact No" pattern="\d{10}" title="Must contain 10 digit">
				</div>
				<div class="form-group">
					<label for="Email"><strong class="admin_label text-left">Email :</strong>
					<span class="text-danger" id="email-info"> abc@abc.abc</span></label>
					<input type="text" class="form-control" name="email" id="email" placeholder="Email id" pattern="[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,}$" title="abc@abc.abc">
				</div>
				<div class="form-group">
					<label for="Date"><strong class="admin_label text-left">ROCA Joining Date :</strong>
					<span class="text-danger" id="date-info"> DD-MM-YYYY</span></label>
					<input type="text" class="form-control" name="date" id="date" value="<?php echo date('d-m-Y'); ?>" pattern="\d{1,2}-\d{1,2}-\d{4}" title="DD-MM-YYYY">
				</div>
				<div class="form-group">
					<label for="Password"><strong class="admin_label text-left">Password :</strong></label>
                    <input type="password" class="form-control" id="pswd"  name="password" placeholder="Password" pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}" title="Must contain at least one number and one uppercase and lowercase letter, and at least 8 or more charactor">
					<div id="pswd_info">
						<h5>Password requirements:</h5>
						<ul>
							<li id="letter" class="invalid">At least <strong>one letter</strong></li>
							<li id="capital" class="invalid">At least <strong>one capital letter</strong></li>
							<li id="number" class="invalid">At least <strong>one number</strong></li>
							<li id="length" class="invalid">Be at least <strong>8 characters</strong></li>
						</ul>
					</div>
					<input type="checkbox" onclick="showpassword();">Show Password
				</div>
				<div class="row">
					<div class="col-lg-4 mb-sm-4 ftco-animate">
						<img src="../images/members/<?php echo $db['photo'];?>" width="300px" alt="No Pic">
					</div>
					<div class="form-group col-lg-4 mb-sm-4 ftco-animate" id="image-preview">
						<label for="image-upload" id="image-label">Choose Picture</label>
						<input type="file" name="fil" id="image-upload" class="form-control-file" accept="image/*">
					</div>
				</div>
				<button type="submit" class="btn btn-info btn-lg" id="sbt_btn" disabled='disabled'>Submit</button>
			</form>
		</div>
	</div>
	
	<script type="text/javascript" src="../js/uploadPreview.js"></script>
	<script type="text/javascript" src="../js/register.js"></script>
	<script type="text/javascript" src="../js/registration.js"></script>
	
	<?php include("javascript.php"); ?>
</body>
</html>