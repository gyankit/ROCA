<?php 
	include("config.php");
	$id=$_REQUEST['id'];
	if($id=="") { header("location:index.php"); }
	if($_SERVER["REQUEST_METHOD"]=="POST")
	{
	    $email=$_POST['emails'];
	    ?><script>window.location.href = "submail.php?email=<?php echo $email; ?>"</script><?php
	}
?>
<!DOCTYPE html>
<html lang="en">
	<head>
		<?php include("css.php"); ?>	
	</head>
	<body>
		<?php include("header.php") ?>
		<div class="container">
			<div class="jumbotron">
				<div class="alert text-center h5">
					<p>Already a ROCA Member</p>
					<button class="btn btn-primary text-center" onClick="location.href = 'login.php';">Click Here</button>
				</div>
				<div class="alert text-center h5">
					<p>Not a ROCA Member<br>First Subscribe our Newsletter below</p>
					<p>Already Subscribed?</p>
					<button class="btn btn-primary text-center" onClick="location.href = 'subscheck.php?id=<?php echo $id; ?>';">Click Here</button>
				</div>
			</div>
		</div>
		<section class="ftco-section-parallax">
  <div class="parallax-img d-flex align-items-center">
	<div class="container">
	  <div class="row d-flex justify-content-center">
		<div class="col-md-7 text-center heading-section heading-section-white ftco-animate">
		  <h2>Subscribe to our Newsletter</h2>
		  <p></p>
		  <div class="row d-flex justify-content-center mt-5">
			<div class="col-md-8">
			  <form role="form" method="post" action="" class="subscribe-form">
				<div class="form-group d-flex">
				  <input type="email" class="form-control" id="subscribe" placeholder="Enter email address" name="emails" required>
				  <input type="submit" value="Subscribe" class="submit px-3">
				</div>
			  </form>
			  <p class="font-weight-bold text-dark text center"></p>
			</div>
		  </div>
		</div>
	  </div>
	</div>
  </div>
</section>
		<?php include("footer.php"); ?>
		<?php include("javascript.php"); ?>
	</body>
</html>