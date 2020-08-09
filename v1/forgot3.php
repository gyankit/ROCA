<?php
	include("config.php");
	if(!isset($_SESSION['user_login']))
    {
        header("location:index.php");
    }

	$id=$_REQUEST['id'];
	$email=$_REQUEST['email'];
	
	$msg="";
	if($_SERVER['REQUEST_METHOD']=='POST')
	{
		$pass1=$_POST['pass1'];
		$pass2=$_POST['pass2'];
		
		if(strcmp($pass1,$pass2)==0)
		{
			$enpt_pass=md5($pass1);
			
			$sql2="update roca_member_tbl set password='$enpt_pass' where unique_id='$id'";
			if(mysqli_query($cn,$sql2))
			{
				$sql3="update register_users_tbl set password='$enpt_pass' where unique_id='$id'";
				if(mysqli_query($cn,$sql3))
				{
				    $to=$email;
    				
					$subject='Password Confirmation';
    				
					$rand=mt_rand(000001, 999999);
    				
					$message = 
						'<html><body>
						<div style="background-color: #000000; font-weight: bold; text-align: center">
							<br>
							<h1 style="color:#ff0000">Region of Cognitive Activites</h1>
							<p style="color:#b00fbf">As per your Request, Your Password is successfully changed.</p>
							<p style="color:#b8bfc1">Reqistration Id : '.$id.'</p>
							<p style="color:#b8bfc1">Password : '.$pass1.'</p>
							<p style="color:#b00fbf">If this is not You, Please Contact ROCA Team.</p>
							<br>
						</div>
						</body></html>';
    				
					$header = 'MINE-VERSION : 1.0' . "\r\n" .
					  'Content-type: text/html; charset=iso-8859-1' . "\r\n" .
					  'FROM: clubroca2018@gmail.com' . "\r\n" .
					  'X-Mailer: PHP/' . phpversion();
					
    				if(mail($to,$subject,$message,$header))
    				{
    					?>
    					<script>
    					    window.setTimeout(function(){window.location.href= "login.php"}, 1000);
    					</script>
    					<?php
    				}
				}
			}
		}
		else
		{
			$msg="Please Enter Same Password.\n New Password & Re-enter Password Not Match";
		}
	}
		
?>

<html lang="en">
<head>
	<?php include("css.php") ?>	
	<title>R O C A</title>
	<style>
	    #pswd_info {
        	position:inherit;
        	bottom:-75px;
        	bottom: -115px\9; /* IE Specific */
        	right:55px;
        	width:260px;
        	padding:15px;
        	background:#fefefe;
        	font-size:.875em;
        	border-radius:5px;
        	box-shadow:0 1px 3px #ccc;
        	border:1px solid #ddd;
        	display: none;
        }
        #pswd_info h5 {
        	margin:0 0 10px 0;
        	padding:0;
        	font-weight:bold;
        }
        #pswd_info::before {
        	content: "\25B2";
        	position:absolute;
        	top:-12px;
        	left:45%;
        	font-size:14px;
        	line-height:14px;
        	color:#ddd;
        	text-shadow:none;
        	display:block;
        }
        .invalid {
        	background:url(../images/invalid.png) no-repeat 0 50%;
        	padding-left:22px;
        	line-height:24px;
        	color:#ec3f41;
        }
        .valid {
        	background:url(../images/valid.png) no-repeat 0 50%;
        	padding-left:22px;
        	line-height:24px;
        	color:#3a7d34;
        }
	</style>
</head>

<body>
	<?php include("header.php"); ?>
	<div class="container">
	    
		<div class="alert alert-warning">
			<?php echo $msg; ?>
		</div>
		
		<div class="jumbotron">
			<p class="text-center">Congrats,<br>Enter New Password to finally update your Password</p>
			<form role="form" class="form-submit" action="" method="post">
				<div class="form-group">
					<input type="password" class="form-control" name="pass1" id="pswd" placeholder="New Password" required autofocus>
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
					<input type="password" class="form-control" name="pass2" placeholder="Re-Enter New Password" required>
				</div>
				<button class="btn btn-block btn-success" id="sbt_btn" disabled>Proceed</button>
			</form>
		</div>
				
	</div>
	<?php include("javascript.php"); ?>
    <script>
        (function($) {
        	"use strict";
        
        	$('input[type=password]').keyup(function() {
        		// keyup code here
        
        		// set password variable
        		var pswd = $(this).val();
        
        		//validate the length
        		if ( pswd.length < 8 ) {
        			$('#length').removeClass('valid').addClass('invalid');
        		} else {
        			$('#length').removeClass('invalid').addClass('valid');
        		}
        
        		//validate letter
        		if ( pswd.match(/[A-z]/) ) {
        			$('#letter').removeClass('invalid').addClass('valid');
        		} else {
        			$('#letter').removeClass('valid').addClass('invalid');
        		}
        
        		//validate capital letter
        		if ( pswd.match(/[A-Z]/) ) {
        			$('#capital').removeClass('invalid').addClass('valid');
        		} else {
        			$('#capital').removeClass('valid').addClass('invalid');
        		}
        
        		//validate number
        		if ( pswd.match(/\d/) ) {
        			$('#number').removeClass('invalid').addClass('valid');
        		} else {
        			$('#number').removeClass('valid').addClass('invalid');
        		}
        
        		if(pswd.length > 8 && pswd.match(/[A-z]/) && pswd.match(/[A-Z]/) && pswd.match(/\d/) ){
        			$('#sbt_btn').prop('disabled', false);
        		}
        		else {
        			$('#sbt_btn').prop('disabled', true);
        		}
        
        	}).focus(function() {
        		$('#pswd_info').show();
        	}).blur(function() {
        		$('#pswd_info').hide();
        	});
        
        })(jQuery);
    </script>
</body>
</html>