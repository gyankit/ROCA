<?php 
session_start();
require("../required/check.php");
require("Home.class.php"); 
$home = new Home(); 
$contact = $home->contact();
if($_SERVER["REQUEST_METHOD"]=="POST") 
{
	$name=$_POST['name'];
	$email=$_POST['email'];
	$subject=$_POST['subject'];
	$message=$_POST['message'];
	date_default_timezone_set("Asia/Kolkata");
	$date=date("Y-m-d h:i:s");
	
	$msg = $home->askquery($date, $name, $email, $subject, $message);
	?><script>alert("<?php echo $msg; ?>");</script><?php
}
?>
<!doctype html>
<html>
<head>
<?php include("../required/head.php");?>
</head>
<body>
<?php include("../required/header.php");?>

	<div class="">
		
		<div class="hero-wrap hero-wrap-2" style="background-attachment:fixed;">
		  	<div class="overlay"></div>
			<div class="container">
				<div class="row no-gutters slider-text align-items-center justify-content-center" data-scrollax-parent="true">
					<div class="col-md-8 text-center">
						<p class="breadcrumbs"><span class="mr-2"><a  href="../home/home">Home</a></span> <span>Contact</span></p>
							<h1 class="mb-3 bread">Contact</h1>
					</div>
				</div>
			</div>
		</div>
		
		<section class="ftco-section contact-section ftco-degree-bg">
      		<div class="container">
        		<div class="row d-flex mb-5 contact-info">
          			<div class="col-md-12 mb-4">
            			<h2 class="h4">Contact Information</h2>
          			</div>
          			<div class="w-100"></div>
          			<div class="col-md-3">
            			<p><span>Address:</span><br><a href="https://maps.google.com/?q=23.474088,87.406255" target="_blank">DIATM College<br>Rajbandh, Durgapur<br>West Bangal, 713212</a></p>
          			</div>
          			<div class="col-md-3">
           				<p><span>Phone:</span><br><a href="tel://+91 <?php echo $contact; ?>" target="_blank">+91 <?php echo $contact; ?></a></p>
          			</div>
          			<div class="col-md-3">
            			<p><span>Email:</span><br><a href="mailto:clubroca2018@gmail.com" target="_blank">clubroca2018@gmail.com</a></p>
          			</div>
          			<div class="col-md-3">
            			<p><span>Website</span><br><a href="http://www.roca.rahul.ac.in" target="_blank">www.roca.rahul.ac.in</a></p>
          			</div>
        		</div>
				
        		<div class="row block-9">
          			<div class="col-md-6 pr-md-5">
          				<h4 class="mb-4">Do you have any questions?</h4>
            			<form action="" method="post" role="form">
              				<div class="form-group">
                				<input type="text" class="form-control" placeholder="Your Name" name="name" required>
              				</div>
              				<div class="form-group">
                				<input type="email"class="form-control" placeholder="Your Email" name="email" required>
              				</div>
              				<div class="form-group">
                				<input type="text" class="form-control" placeholder="Subject" name="subject" required>
              				</div>
              				<div class="form-group">
                				<textarea name="message" cols="30" rows="7" class="form-control" placeholder="Message" required></textarea>
              				</div>
              				<div class="form-group">
                				<button id="sbt_btn" class="btn btn-primary py-3 px-5">Send Message</button>
              				</div>
            			</form>
          			</div>
        		</div>
      		</div>
    	</section>
		
	</div>
	
	<?php include("../required/footer.php");?>

	<?php include("../required/javascript.php");?>

</body>
</html>