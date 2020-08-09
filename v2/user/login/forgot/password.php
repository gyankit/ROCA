<?php
require("Forgot.class.php");
$forgot = new Forgot();
$msg="";

$id = $_REQUEST['id'];
$email = $_REQUEST['email'];

if( $_REQUEST['id'] or $_REQUEST['email'] ) {
    header("location: ../../index");
}

if($_SERVER['REQUEST_METHOD']=='POST')
{
    $pass1=$_POST['pass1'];
    $pass2=$_POST['pass2'];
    
    if( strcmp($pass1,$pass2) == 0 ) {
        $msg = $forgot->updatepassword($id, $email, md5($pass1), $pass1);
    }
}

?>
<html lang="en">
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta content="width=device-width, initial-scale=1">
				   
	<title>R O C A</title>
				   
	<link rel="icon" href="../../../vendor/dist/img/fevicon.jpg">

	<link rel="stylesheet" href="../../../vendor/plugins/bootstrap/css/bootstrap.min.css">
	
	<link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">

    <link rel="stylesheet" href="../../../vendor/dist/css/util.css">
    
    <link rel="stylesheet" href="../../../vendor/dist/css/password.css">

    <style> #pswd_info { display: none; } </style>
</head>

<body>
	<div class="container">
		
		<section id="first" class="m-t-100">
            <?php if($msg != "") { ?>
                <div class="alert alert-warning text-dark"><?= $msg; ?></div>
            <?php } ?>
		
            <div class="jumbotron">
                <form role="form" class="form-submit" action="" method="post">
                    <div class="form-group">
                        <label>Enter new Password</label>
                        <input type="password" class="form-control" name="pass1" id="pswd" placeholder="New Password" required>
                        <br>
                        <div id="pswd_info">
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
                        <label>Re-Enter new Password</label>
                        <input type="password" class="form-control" name="pass2" placeholder="Re-Enter New Password" required>
                    </div>
                    <button class="btn btn-block btn-success" id="sbt_btn">Proceed</button>
                </form>
            </div>
		</section>
		

		<div class="back">
			<a href="../../index">Back</a>
		</div>
				
	</div>
    <script src="../../../vendor/plugins/jquery/jquery.min.js"></script>
    <script>
        (function($) {
            "use strict";
            
            $('#pswd').keyup(function() {
                var pswd = $('#pswd').val();
                //validate the length
                if ( pswd.length < 8 ) { $('#length').removeClass('valid').addClass('invalid'); }
                else { $('#length').removeClass('invalid').addClass('valid'); }

                //validate letter
                if ( pswd.match(/[A-z]/) ) { $('#letter').removeClass('invalid').addClass('valid'); }
                else { $('#letter').removeClass('valid').addClass('invalid'); }

                //validate capital letter
                if ( pswd.match(/[A-Z]/) ) { $('#capital').removeClass('invalid').addClass('valid'); }
                else { $('#capital').removeClass('valid').addClass('invalid'); }

                //validate number
                if ( pswd.match(/\d/) ) { $('#number').removeClass('invalid').addClass('valid'); }
                else { $('#number').removeClass('valid').addClass('invalid'); }

                if(pswd.length >= 8 && pswd.match(/[A-z]/) && pswd.match(/[A-Z]/) && pswd.match(/\d/) ) { 
                    $('#pswd_info').hide(); 
                    f = true;
                }
                else { 
                    $('#pswd_info').show(); 
                    f = false;
                }
            }).focus(function() { $('#pswd_info').show();}).blur(function() { $('#pswd_info').hide();});

        })(jQuery);
    </script>
</body>
</html>