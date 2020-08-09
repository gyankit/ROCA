<?php
session_start();
require ("../required/check.php");
require ("User.class.php");
$msg="";
if( $_SERVER["REQUEST_METHOD"] == "POST" )
{
    $user = new User();

    $name = $user->_input($_POST['name']);
    $roll = $user->_input($_POST['roll']);
    $dept = $user->_input($_POST['department']);
    $email = $user->_input($_POST['email']);
    $date = $user->_input($_POST['date']);
    $year = $user->_input($_POST['year']);
    $pass = $user->_input($_POST['password']);

    $paid="YES";
    $pass=md5($pass);

    $reg=array("ROCA","$year","$dept",substr($roll,6));
    $unique_id = join("",$reg);

	if(!isset($_POST['contact'])) {
		$contact = "";
	} else {
		$contact = $this->_input($_POST['contact']);
	}
	
	if(!isset($_FILES['pic'])) {
		$newuser = "Provide valid Image for Profile picture.";
    	
	} else {
		$fil = $_FILES['pic'];
		$email=filter_var($email, FILTER_SANITIZE_EMAIL);
		if(filter_var($email, FILTER_VALIDATE_EMAIL)) {
			$newuser = $user->newUser($unique_id, $name, $roll, $dept, $contact, $email, $date, $year, $fil, $paid, $pass);
		} else {
			$newuser = "Wrong Email Id";
		}
	}
    $msg = $newuser;
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <?php include("../required/head.php"); ?>
    <link rel="stylesheet" href="../../vendor/dist/css/password.css">
    <link rel="stylesheet" href="../../vendor/dist/css/preview.css">
	<style>
		#roll-info, #contact-info, #email-info, #date-info, #year-info {
			display: none;
		}
	</style>
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
                                <h2 class="title text-white">Add New User</h2>
                            </div>

                            <div class="card-body bg-gray">
                                <div class="text-center text-danger font-weight-bold mb-5">
                                    <?php echo $msg; ?>
                                </div>
                                <form method="POST" class="form-submit" name="forms" onSubmit="return(registration());" action="" enctype="multipart/form-data">
                                    <div class="form-group">
                                        <label for="Name"><strong class="admin_label text-left">Name :</strong></label>
                                        <input type="text" class="form-control" name="name" placeholder="Full Name" oninput="this.value = this.value.toUpperCase()" autofocus>
                                    </div>
                                    <div class="form-group">
                                        <label for="Roll"><strong class="admin_label text-left">Roll No :</strong>
                                            <span class="text-danger" id="roll-info"> Format : eg. CS/16/02</span></label>
                                        <input type="text" class="form-control" name="roll" id="roll" placeholder="College Roll No." oninput="this.value = this.value.toUpperCase()" patter="[A-Z]{2}/\d{2}/\d{2,3}" title="Format : eg. CS/16/02">
                                    </div>
                                    <div class="form-group">
                                        <label for="Department"><strong class="admin_label text-left">Department :</strong></label>
                                        <select name="department" class="form-control">
                                            <option value=""><b>Select</b></option>
                                            <option value="CSE"><b>CSE</b></option>
                                            <option value="ME"><b>ME</b></option>
                                            <option value="IT"><b>IT</b></option>
                                            <option value="EE"><b>EE</b></option>
                                            <option value="ECE"><b>ECE</b></option>
                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <label for="Contact"><strong class="admin_label text-left">Contact :</strong>
                                            <span class="text-danger" id="contact-info"> Must contain 10 digit</span></label>
                                        <input type="text" class="form-control" name="contact" id="contact" placeholder="Contact No" pattern="\d{10}" title="Must contain 10 digit">
                                    </div>
                                    <div class="form-group">
                                        <label for="Email"><strong class="admin_label text-left">Email :</strong>
                                            <span class="text-danger" id="email-info"> abc@abc.abc</span></label>
                                        <input type="text" class="form-control" name="email" id="email" placeholder="Email id" pattern="[a-z0-9._%+-]+\@[a-z0-9.-]+\.[a-z]{2,}$" title="abc@abc.abc">
                                    </div>
                                    <div class="form-group">
                                        <label for="Date"><strong class="admin_label text-left">ROCA Joining Date :</strong>
                                            <span class="text-danger" id="date-info"> DD-MM-YYYY</span></label>
                                        <input type="text" class="form-control" name="date" id="date" value="<?php echo date('d-m-Y'); ?>" pattern="\d{1,2}-\d{1,2}-\d{4}" title="DD-MM-YYYY">
                                    </div>
                                    <div class="form-group">
                                        <label for="year"><strong class="admin_label text-left">College Joining Year :</strong>
                                            <span class="text-danger" id="year-info"> YYYY (only year)</span></label></label>
                                        <input type="text" class="form-control" name="year" id="year" value="<?php echo date('Y'); ?>" pattern="\d{4}" title="YYYY (only Year)">
                                    </div>
                                    <div class="form-group">
                                        <label for="Password"><strong class="admin_label text-left">Password :</strong></label>
                                        <input type="password" class="form-control" id="pswd" name="password" placeholder="Password" pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}" title="Must contain at least one number and one uppercase and lowercase letter, and at least 8 or more charactor">
                                        <div id="pswd_info">
                                            <h5 class="text-dark">Password requirements</h5>
                                            <ul class="list-unstyled">
                                                <li id="letter" class="invalid">At least <strong>one letter</strong></li>
                                                <li id="capital" class="invalid">At least <strong>one capital letter</strong></li>
                                                <li id="number" class="invalid">At least <strong>one number</strong></li>
                                                <li id="length" class="invalid">Be at least <strong>8 characters</strong></li>
                                            </ul>
                                        </div>
										<br>
                                        <input type="checkbox" class="text-center" onclick="showpassword();">Show Password
                                    </div>
                                    <div class="form-group" id="image-preview">
                                        <label for="image-upload" id="image-label">Choose Picture</label>
                                        <input type="file" name="pic" id="image-upload" class="form-control-file" accept="image/*">
                                    </div>
                                    <br>
                                    <button type="submit" class="btn btn-info btn-lg" id="sbt_btn" disabled>Submit</button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <?php include("../required/footer.php"); ?>
    </div>
    <?php include("../required/javascript.php"); ?>
    <script type="text/javascript" src="../../vendor/dist/js/uploadPreview.js"></script>
    <script type="text/javascript" src="../../vendor/dist/js/register.js"></script>
    <script type="text/javascript" src="../../vendor/dist/js/registration.js"></script>
</body>
</html>