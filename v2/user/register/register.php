<?php 
require("register.class.php"); 
$register = new Register();
$contact = $register->contact();

$pay = $register->amount();
if(!$pay) {
    ?><script>
    alert("Registration Process is Closed...\nPlease contect ROCA Coordinaters.");
    window.location.href = "../index";
    </script><?php
}

$msg="Welcome to Our Family";

if($_SERVER['REQUEST_METHOD']=='POST')
{
    $name = $_POST['name'];
    $roll = $_POST['roll'];
    $dept = $_POST['department'];
    $contact = $_POST['contact'];
    $email = $_POST['email'];
    $date = $_POST['date'];
    $year = $_POST['year'];
    $password1 = $_POST['password1'];
    $password2 = $_POST['password2'];

    $reg=array("ROCA","$year","$dept",substr($roll,6));
    $unique_id = join("",$reg);

    $fil=$_FILES['fil'];

    if( strcmp( $password1, $password2 ) == 0 ) {
        $msg = $register->registration($unique_id, $name, $roll, $dept, $contact, $email, $date, $year, $fil, $password1);
    } else {
        $msg = "Password Not Match";
    }
}
?>
<!doctype html>
<html>
<head>
<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta content="width=device-width, initial-scale=1">
				   
	<title>R O C A</title>
				   
	<link rel="icon" href="../../vendor/dist/img/fevicon.jpg">

	<!-- Bootstrap -->
	<link rel="stylesheet" href="../../vendor/plugins/bootstrap/css/bootstrap.min.css">
	<!-- Font Awesome -->
	<link rel="stylesheet" href="../../vendor/plugins/fontawesome-free/css/all.min.css">
	<!-- Material Design -->
	<link rel="stylesheet" href="../../vendor/dist/fonts/iconic/css/material-design-iconic-font.min.css">
	<!-- Ionicons -->
	<link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
	<!-- Theme style -->
	<link rel="stylesheet" href="../../vendor/dist/css/style.css">
	<!-- overlayScrollbars -->
	<link rel="stylesheet" href="../../vendor/plugins/overlayScrollbars/css/OverlayScrollbars.min.css">
	<!-- Google Font: Source Sans Pro -->
	<link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">
	<!-- Select2 -->
	<link rel="stylesheet" href="../../vendor/plugins/select2/select2.min.css">

	<link rel="stylesheet" href="../../vendor/dist/css/util.css">

	<link rel="stylesheet" href="../../vendor/plugins/table/css/datatables.min.css">

    <link rel="stylesheet" href="../../vendor/plugins/table/css/datatables-select.min.css">
    
    <link rel="stylesheet" href="../../vendor/dist/css/password.css">

    <link rel="stylesheet" href="../../vendor/dist/css/preview.css">

    <link rel="stylesheet" href="../../vendor/dist/css/flaticon.css">

    <link rel="stylesheet" href="../../vendor/dist/css/icomoon.css">
    
	<style>
		#roll-info, #contact-info, #email-info, #date-info, #year-info { display: none; }
	</style>

</head>
<body>
    <header>
        <nav class="navbar navbar-expand-lg navbar-dark ftco_navbar bg-dark ftco-navbar-light" id="ftco-navbar">
            <div class="container">
                <a class="navbar-brand" href="../index"><img src="../../vendor/dist/img/logo.png" height="45px" width="50px"/></a>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#ftco-nav" aria-controls="ftco-nav" aria-expanded="false" aria-label="Toggle navigation">
                    <i class="fas fa-bars"></i> Menu
                </button>
                <div class="collapse navbar-collapse" id="ftco-nav">
                    <ul class="navbar-nav ml-auto">
                        <li class="nav-item"><a href="../index" class="nav-link">Home</a></li>
                        <li class="nav-item"><a href="../aboutus" class="nav-link">About</a></li>
                        <li class="nav-item"><a href="../events" class="nav-link">Events</a></li>
                        <li class="nav-item"><a href="../contact" class="nav-link">Contact</a></li>
                        <li class="nav-item cta"><a href="../login/login" class="nav-link">Login/Register</a></li>
                    </ul>
                </div>
            </div>
        </nav>
    </header>
    
    <div class="container">
		<div class="jumbotron">
		    <div class="alert bg-dark font-weight-bold text-center">
				<h2 class="text-white m-t-10"><strong>REGISTRATION FORM</strong></h2>
			</div>
			<div class="alert text-center">
				<p class="h4 text-danger font-weight-bold"><?=$msg; ?></p>
			</div>
			<form role="form" class="form-submit" method="post" action="" name="forms" enctype="multipart/form-data" onSubmit="return(registration());">
				<div class="form-group">
					<label for="Name"><strong class="admin_label text-left">Name :</strong></label>
					<input type="text" class="form-control" name="name" placeholder="Full Name" oninput="this.value = this.value.toUpperCase()" autofocus required>
				</div>
				<div class="form-group">
					<label for="Roll"><strong class="admin_label text-left">Roll No :</strong>
					<span class="text-danger" id="roll-info"> Format : eg. CS/16/02</span></label>
					<input type="text" class="form-control" name="roll" id="roll" placeholder="College Roll No." oninput="this.value = this.value.toUpperCase()" patter="[A-Z]{2}/\d{2}/\d{2,3}" title="Format : eg. CS/16/02" required>	
				</div>
				<div class="form-group">
					<label for="Department"><strong class="admin_label text-left">Department :</strong></label>
					<select name="department" class="form-control" id="dept">
						<option value=""><b>Select</b></option>
						<option value="CSE"><b>CSE</b></option>
						<option value="ME"><b>ME</b></option>
						<option value="IT"><b>IT</b></option>
						<option value="EE"><b>EE</b></option>
						<option value="ECE"><b>ECE</b></option>
						<option value="CH"><b>CH</b></option>
					</select>
				</div>
				<div class="form-group">
					<label for="Contact"><strong class="admin_label text-left">Contact :</strong>
					<span class="text-danger" id="contact-info"> Must contain 10 digit</span></label>
					<input type="text" class="form-control" name="contact" id="contact" placeholder="Contact No" pattern="\d{10}" title="Must contain 10 digit" required>
				</div>
				<div class="form-group">
					<label for="Email"><strong class="admin_label text-left">Email :</strong>
					<span class="text-danger" id="email-info"> abc@abc.abc</span></label>
					<input type="email" class="form-control" name="email" id="email" placeholder="Email id" pattern="[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,}$" title="abc@abc.abc" required>
				</div>
				<div class="form-group">
					<label for="Date"><strong class="admin_label text-left">ROCA Joining Date :</strong>
					<span class="text-danger" id="date-info"> DD-MM-YYYY</span></label>
					<input type="text" class="form-control" name="date" id="date" value="<?php echo date('d-m-Y'); ?>" pattern="\d{1,2}-\d{1,2}-\d{4}" title="DD-MM-YYYY" required>
				</div>
				<div class="form-group">
					<label for="year"><strong class="admin_label text-left">College Joining Year :</strong>
					<span class="text-danger" id="year-info"> YYYY (only year)</span></label></label>
					<input type="text" class="form-control" name="year" id="year" value="<?php echo date('Y'); ?>" pattern="\d{4}" title="YYYY (only Year)" required>
				</div>
				<div class="form-group">
					<label for="Password"><strong class="admin_label text-left">Password :</strong></label>
                    <input type="text" class="form-control" id="pswd"  name="password1" placeholder="Password" pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}" title="Must contain at least one number and one uppercase and lowercase letter, and at least 8 or more charactor" required>
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
                    <input type="password" class="form-control" name="password2" placeholder="Confirm Password" pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}" title="Must contain at least one number and one uppercase and lowercase letter, and at least 8 or more charactor" required>
				</div>
				<div class="form-group" id="image-preview">
					<label for="image-upload" id="image-label">Choose Picture : <span>Size limit : 150Kb</span></label>
					<input type="file" name="fil" id="image-upload" class="form-control-file" accept="image/*" required>
				</div>
				<br>
				<button type="submit" class="btn btn-info btn-lg btn-block" id="sbt_btn">Submit</button>
			</form>
			
		</div>
	</div>
	
	<footer class="ftco-footer ftco-bg-dark ftco-section img" >
        <div class="overlay"></div>
        <div class="container">
            <div class="row mb-5">

                <div class="col-md-3">
                    <div class="ftco-footer-widget mb-4">
                        <h2><a class="navbar-brand" href="index">ROCA&ensp;<i class="flaticon-university"></i><small>DIATM</small></a></h2>
                        <p>The way a team plays as a whole determines its success. You may have the greatest bunch of individual in the world, but if they don't play together the club won't be worth a dime.</p>
                        <ul class="ftco-footer-social list-unstyled float-md-left float-lft mt-5">
                            <li><a href="https://www.facebook.com/diatmroca/" target="_blank"><span class="icon icon-facebook"></span></a></li>
                            <li><a href="https://www.youtube.com/channel/UCzq3qrhy1iqaBPSEQhwSRpg" target="_blank"><span class="icon icon-facebook"></span></a></li>
                        </ul>
                    </div>
                </div>

                <div class="col-md-3">
                    <div class="ftco-footer-widget mb-4 ml-md-4">
                        <h2 class="ftco-heading-2">Site Links</h2>
                        <ul class="list-unstyled">
                            <li><a href="../index" class="py-2 d-block">Home</a></li>
                            <li><a href="../aboutus" class="py-2 d-block">About</a></li>
                            <li><a href="../events" class="py-2 d-block">Events</a></li>
                            <li><a href="../contact" class="py-2 d-block">Contact</a></li>
                            <li><a href="../team" class="py-2 d-block">Our Team</a></li>
                        </ul>
                    </div>
                </div>

                <div class="col-md-4">
                    <div class="ftco-footer-widget mb-4">
                        <h2 class="ftco-heading-2">Have any Questions?</h2>
                        <div class="block-23 mb-3">
                            <ul>
                                <li><a href="https://maps.google.com/?q=23.474088,87.406255" target="_blank"><span class="icon icon-map-marker"></span><span class="text">DIATM College<br>Rajbandh, Durgapur<br>West Bangal, 713212</span></a></li>
                                <li><a href="tel://+91 <?= $contact; ?>"><span class="icon icon-phone"></span><span class="text">+91 <?= $contact; ?></span></a></li>
                                <li><a href="mailto:clubroca2018@gmail.com"><span class="icon icon-envelope"></span><span class="text">clubroca2018@gmail.com</span></a></li>
                            </ul>
                        </div>
                    </div>
                </div>

                <div class="col-md-2">
                    <div class="ftco-footer-widget mb-4">
                        <h2 class="ftco-heading-2">Login/Register</h2>
                        <ul class="list-unstyled">
                            <li><a href="../login/login" class="py-2 d-block">Login</a></li>
                        </ul>
                    </div>
                </div>

            </div>

            <div class="row">
                <div class="col-md-12 text-center">
                    <p>Copyright &copy; 2019-<?= date('Y'); ?> All rights reserved |</p>
                    <div class="text-center">
                        <a href="https://www.facebook.com/gyankit" target="_blank"><img src="../../vendor/dist/img/ms.png" height="50px" width="50px" alt="GYAN ANKIT SINGH"></a>&ensp;&ensp;
                        <a href="https://www.diatm.rahul.ac.in" target="_blank"><img src="../../vendor/dist/img/diatm.png" height="50px" width="50px" alt="DIATM"></a>
                    </div>
                </div>
            </div>
        </div>
    </footer>

<!-- REQUIRED JS SCRIPTS -->

<!-- jQuery 3 -->
<script src="../../vendor/plugins/jquery/jquery.min.js"></script>
<!-- Bootstrap 3.3.7 -->
<script src="../../vendor/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- AdminLTE App -->
<script src="../../vendor/dist/js/main.js"></script>
<!-- Optionally, you can add Slimscroll and FastClick plugins.
     Both of these plugins are recommended to enhance the
     user experience. -->
<script src="../../vendor/plugins/fastclick/fastclick.js"></script>


<script src="../../vendor/plugins/table/js/datatables.min.js"></script>
<!-- DataTables Select JS -->
<script src="../../vendor/plugins/table/js/datatables-select.min.js"></script>

<script type="text/javascript" src="../../vendor/dist/js/uploadPreview.js"></script>
<script type="text/javascript" src="../../vendor/dist/js/register.js"></script>
<script type="text/javascript" src="../../vendor/dist/js/registration.js"></script>
</body>
</html>