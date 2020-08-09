<?php 
require("register.class.php"); 
$register = new Register();
$contact = $register->contact();

if(isset($_REQUEST['id'])) {
    $id = $_REQUEST['id'];
} else {
    header("location:../../error/404");
}
$pay = $register->amount();
$view = $register->payment();

if(!$pay) {
    ?><script>
    alert("Registration Process is Closed...\nPlease contect ROCA Coordinaters.");
    window.location.href = "../index";
    </script><?php
}

if($_SERVER['REQUEST_METHOD']=='POST')
{
    $mode=$_POST['mode'];
    $transaction=$_POST['transaction'];
    
    if($mode=="") {
        ?><script>alert("Choice valid Payment Mode");</script><?php
    }
    elseif($register->registered($mode, $transaction, $id)) {
        ?><script>
        alert("Payment Complete\nWait for Confirmation Mail");
        window.location.href= "../index";
        </script><?php
    }
    else {
        ?><script>
        alert("Error Occur");
        </script><?php
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
        <br><br>
        <div class="jumbotron text-center text-capitalize font-weight-bold text-danger h1">
            Payment Gateway
        </div>
        
        <div class="alert text-center font-weight-bold alert-warning h5 text-dark">
            Registration Payment<br> &#8377;<?= $pay; ?>
        </div>
        
        <div class="alert alert-success text-center font-weight-bold">
            After Payment <br> Wait for Confirmation Mail from ROCA 
        </div>
        
        <div class="alert">
            <div class="alert alert-danger text-center">Send registration payment to the upi or scan the qr-code.<br>Share your Transaction Id with us after completing payment.<br>if you are not sharing the transaction id with us then we cant confirm your registration.</div>
            <form role="form" class="form-submit" method="post" action="">
                <div class="form-group">
                    <select name="mode" class="form-control">
                        <option value="">Payment Mode</option>
                        <option value="Paytm">Paytm</option>
                        <option value="Google Pay">Google Pay</option>
                        <option value="PhonePe">PhonePe</option>
                        <option value="MobiKwik">MobiKwik</option>
                        <option value="FreeCharge">FreeCharge</option>
                    </select>
                </div>
                <div class="form-group">
                    <input type="text" class="form-control" name="transaction" placeholder="Transaction Id" required>
                </div>
                <button class="btn btn-block btn-success">SHARE</button>
            </form>
        </div>
        
        <div class="alert alert-info">
            <?php if(!$view) { ?>
            <script>
                alert("No Payment Details Available"); 
                window.location.href = "../database/index";
            </script>
            <?php } else { while($data = $view->fetch_array()) { ?>
            <div class="alert alert-danger" style="height: 360px">
                <p class="h3 text-center"><?= $data['mode']; ?> </p>
                <?php if($data['upi'] != "") { ?>
                    <div class="alert">
                        <span class="font-weight-bold float-left">UPI :</span>
                        <i class="float-right"><?= $data['upi']; ?></i>
                    </div>
                <?php } if($data['qr_code'] != "") { ?>
                    <div class="alert">
                        <span class="font-weight-bold float-left">Scan &amp; Pay :</span>
                        <i class="float-right"><img src="../../vendor/extra/payment/<?= $data['qr_code'];?>" height="200px"></i>
                    </div>
                <?php } ?>
            </div>
            <?php } } ?>
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