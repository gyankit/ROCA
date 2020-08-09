<?php 
session_start();
require("../required/check.php");
require("Profile.class.php"); 
$profile = new Profile();
$contact = $profile->contact();
$msg = "";

if($_SERVER['REQUEST_METHOD']=='POST')
{
    $contact = $_POST['contact'];
    $email = $_POST['email'];
    $date = $_POST['date'];
    $pass1 = $_POST['password1'];
    $pass2 = $_POST['password2'];
    $fil = $_FILES['fil'];

    $data1 = $profile->profiles($_SESSION['user_id']);

    if($pass1 != "" and $pass2 != "") {
        if( strcmp( $pass1, $pass2 ) != 0 ) {
            $msg = "Password not Match";
        } else {
            $pass = md5($pass1);
        }
    } else {
        $pass = $data1['password'];
    }

    $pic = $data1['photo'];
    $msg = $profile->update($contact, $email, $date, $fil, $pic, $pass, $_SESSION['user_id']);
}

$data = $profile->profiles($_SESSION['user_id']);
if(!$data) { header("location: ../../error/404"); }
?>
<!doctype html>
<html>
<head>
    <?php include("../required/head.php"); ?>
    <link rel="stylesheet" href="../../vendor/dist/css/preview.css">
    <link rel="stylesheet" href="../../vendor/dist/css/password.css">
	<style>
		#contact-info, #email-info, #date-info, #pswd_info {
			display: none;
		}
	</style>
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
							<h1 class="mb-3 bread">Update Profile</h1>
					</div>
				</div>
			</div>
		</div>
		
        <div class="container m-t-50 m-b-50">
            <div class="jumbotron">
                <div class="alert text-danger font-weight-bold text-center">
                    <?= $msg; ?>
                </div>
                <form role="form" class="form-submit" method="post" action="" enctype="multipart/form-data" name="forms" onSubmit="return(registration());">
                    <div class="form-group">
                        <label for="Name"><strong class="admin_label text-left">Name :</strong></label>
                        <input type="text" class="form-control" name="name" value="<?= $data['name']; ?>" readonly>
                    </div>
                    <div class="form-group">
                        <label for="Roll"><strong class="admin_label text-left">Roll No :</strong></label>
                        <input type="text" class="form-control" name="roll" value="<?= $data['roll']; ?>" readonly>
                    </div>
                    <div class="form-group">
                        <label for="Department"><strong class="admin_label text-left">Department :</strong></label>
                        <input type="text" class="form-control" name="department" value="<?= $data['department']; ?>" readonly>
                    </div>
                    <div class="form-group">
                        <label for="Contact"><strong class="admin_label text-left">Contact :</strong>
                        <span class="text-danger" id="contact-info"> Must contain 10 digit</span></label>
                        <input type="text" class="form-control" name="contact" id="contact" value="<?= $data['contact']; ?>" pattern="\d{10}" title="Must contain 10 digit">
                    </div>
                    <div class="form-group">
                        <label for="Email"><strong class="admin_label text-left">Email :</strong>
                        <span class="text-danger" id="email-info"> abc@abc.abc</span></label>
                        <input type="email" class="form-control" name="email" id="email" value="<?= $data['email']; ?>" pattern="[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,}$" title="abc@abc.abc">
                    </div>
                    <div class="form-group">
                        <label for="Date"><strong class="admin_label text-left">ROCA Joining Date :</strong>
                        <span class="text-danger" id="date-info"> DD-MM-YYYY</span></label>
                        <input type="text" class="form-control" name="date" id="date" value="<?= $data['date']; ?>" pattern="\d{1,2}-\d{1,2}-\d{4}" title="DD-MM-YYYY">
                    </div>
                    <div class="form-group">
                        <label for="Password"><strong class="admin_label text-left">Password :</strong></label>
                        <input type="text" class="form-control" id="pswd"  name="password1" placeholder="Password" pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}" title="Must contain at least one number and one uppercase and lowercase letter, and at least 8 or more charactor">
                        <div id="pswd_info" class="m-t-10">
                            <h5>Password requirements:</h5>
                            <ul>
                                <li id="letter" class="invalid">At least <strong>one letter</strong></li>
                                <li id="capital" class="invalid">At least <strong>one capital letter</strong></li>
                                <li id="number" class="invalid">At least <strong>one number</strong></li>
                                <li id="length" class="invalid">Be at least <strong>8 characters</strong></li>
                            </ul>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="Password"><strong class="admin_label text-left">Confirm Password :</strong></label>
                        <input type="password" class="form-control"  name="password2" placeholder="Password2" pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}" title="Must contain at least one number and one uppercase and lowercase letter, and at least 8 or more charactor">
                    </div>
                    <div class="row m-t-50">
                        <div class="col-lg-4 mb-sm-4">
                            <img src="../../vendor/extra/members/<?= $data['photo']; ?>" width="300px" alt="No Pic">
                        </div>
                        <div class="form-group col-lg-4 mb-sm-4" id="image-preview">
                            <label for="image-upload" id="image-label">Choose Picture</label>
                            <input type="file" name="fil" id="image-upload" class="form-control-file" accept="image/*">
                        </div>
                    </div>
                    
                    <button type="submit" class="btn btn-info btn-lg" id="sbt_btn">Update</button>
                </form>
                
            </div>
        </div>

        
	</div>
	
	<?php include("../required/footer.php");?>

    <?php include("../required/javascript.php");?>
    
	<script type="text/javascript" src="../../vendor/dist/js/uploadPreview.js"></script>
	<script type="text/javascript" src="../../vendor/dist/js/register.js"></script>
	<script type="text/javascript" src="../../vendor/dist/js/registration.js"></script>
</body>
</html>