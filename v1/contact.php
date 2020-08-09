<?php
	include("config.php");

	if(!isset($_SESSION['user_login']))
    {
        header("location:index.php");
    }

	$sql="SHOW TABLES LIKE 'query_tbl'";
	$sr=mysqli_query($cn,$sql);

	if(mysqli_num_rows($sr)==0)
	{
		$sql1="CREATE TABLE `id8469611_clubroca`.`query_tbl` ( `id` INT(10) NOT NULL AUTO_INCREMENT , `date` DATETIME NOT NULL , `name` VARCHAR(30) NOT NULL , `email` VARCHAR(30) NOT NULL , `subject` TEXT NOT NULL , `message` TEXT NOT NULL , PRIMARY KEY (`id`))";
		$sr1=mysqli_query($cn,$sql1);
		if($sr1==false)
		{
			header("location: error.php");
		}
	}

	$msg="";

	if($_SERVER["REQUEST_METHOD"]=="POST")
	{
		$name=$_POST['name'];
		$email=$_POST['email'];
		$subject=$_POST['subject'];
		$message=$_POST['message'];
		date_default_timezone_set("Asia/Kolkata");
		$date=date("Y-m-d h:i:s");

		$email=filter_var($email, FILTER_SANITIZE_EMAIL);
		if(filter_var($email, FILTER_VALIDATE_EMAIL))
		{
			$sql2="INSERT INTO query_tbl VALUES(NULL,'$date','$name','$email','$subject','$message')";
			$rs1=mysqli_query($cn,$sql2);
			if ($rs1)
			{
				$to="clubroca2018@gmail.com";
				$detail="$message \n\n Name : $name";
				$header="From : $email";
				if(mail($to,$subject,$detail,$header))
				{
					$msg="Message Sent";
				}
			}
			else
			{
				$msg="Error Occur....Try After Sometime..!!!";
			}
		}
		else
		{
			$msg="Provide Valid Email Id";
		}
	}
?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <?php include("css.php"); ?>
  </head>
  <body>
    
  <?php include("header.php"); ?>
    <!-- END nav -->
    
    <div class="hero-wrap hero-wrap-2" style="background-attachment:fixed;">
      <div class="overlay"></div>
      <div class="container">
        <div class="row no-gutters slider-text align-items-center justify-content-center" data-scrollax-parent="true">
          <div class="col-md-8 ftco-animate text-center">
            <p class="breadcrumbs"><span class="mr-2"><a <?php if($_SESSION["user_login"]=="True") { ?> href="home.php" <?php } else { ?> href="index.php" <?php } ?>>Home</a></span> <span>Contact</span></p>
            <h1 class="mb-3 bread">Contact Us</h1>
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
            <p><span>Phone:</span><br><a href="tel://+91 9534470240" target="_blank">+91 9534470240</a></p>
          </div>
          <div class="col-md-3">
            <p><span>Email:</span><br><a href="mailto:clubroca2018@gmail.com" target="_blank">cluroca2018@gmail.com</a></p>
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
				<p class="text-danger"><?php echo $msg; ?></p>
            </form>
          
          </div>
        </div>
      </div>
    </section>
  <?php include("footer.php"); ?>	  
	  
  <?php include("javascript.php"); ?>
  </body>
</html>