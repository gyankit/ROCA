<?php
	include("config.php");
	include("check.php");
	$user=$_SESSION['user'];

	$id=$_REQUEST['id'];
	if($id=="" or $user=="")
	{
		header("location:error.php");
	}


	$sql="SHOW TABLES LIKE 'notice_tbl'";
	$sr=mysqli_query($cn,$sql);

	if(mysqli_num_rows($sr)==0)
	{
		header("location:error.php");
	}
	  
	$sql2="select * from notice_tbl where id='$id'";
	$rs1=mysqli_query($cn,$sql2);

	if($rs1==true) {
	  if(mysqli_num_rows($rs1)==0) {
		  header("location:error.php");
	  }
	  else {
		  $db1=mysqli_fetch_array($rs1);
	  }
	}
	else {
	  header("location:error.php");
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
  <div class="hero-wrap hero-wrap-2" style="background-image: url('images/bg_2.jpg'); background-attachment:fixed;">
      <div class="overlay"></div>
      <div class="container">
        <div class="row no-gutters slider-text align-items-center justify-content-center" data-scrollax-parent="true">
          <div class="col-md-8 ftco-animate text-center">
            <p class="breadcrumbs"><span class="mr-2"><a <?php if($_SESSION["user_login"]=="True") { ?> href="home.php" <?php } else { ?> href="index.php" <?php } ?>>Home</a></span><span class="mr-2"><a href="events.php">Events</a></span><span>Upcomming Event</span></p>
            <h1 class="mb-3 bread">Upcomming Event</h1>
          </div>
        </div>
      </div>
    </div>
	  
	  <section class="ftco-section">
    	<div class="container">
    		<div class="row d-flex">
    			<div class="col-md-6 d-flex ftco-animate">
    				<div class="img img-about align-self-stretch" style="width: 100%; height: 500px"><img src="images/notice/<?php echo $db1['photo']; ?>" width="400px" alt="No Pic"></div>
    			</div>
    			<div class="col-md-6 pl-md-5 ftco-animate">
    				<h2 class="mb-4 text-center text-danger font-weight-bold"><?php echo $db1['heading']; ?></h2>
    				<div class="">
						<div class="meta mb-3 font-weight-bold">
							<div>Date : <a href="#"><?php echo $db1['date']; ?></a></div>
							<div>Day : <a href="#"><?php echo $db1['day']; ?></a></div>
							<div>Time : <a href="#"><?php echo $db1['time']; ?></a></div>
							<div>Venue : <a href="#"><?php echo $db1['venue']; ?></a></div>
						</div>
						<div class="alert alert-secondary h5 text-center">
							<?php echo $db1['notice']; ?>
						</div>
						<div class="alert">
							<?php if($db1['requirement']!="") { ?><p>Requirement : <?php echo $db1['requirement']; ?></p> <?php } ?>
						</div>
						<div class="alert">
							<?php if($db1['cost']==0) { ?>
							<button class="btn btn-block btn-success">If You are Interested to Join<br>
								<a class="text-dark font-weight-bold h5" href="intrest.php?id=<?php echo $user; ?>&ct=<?php echo $db1['cost']; ?>&db=<?php echo $db1['heading'] ?>&date=<?php echo $db1['date']; ?>&eid=<?php echo $id; ?>">Click Here</a>
							</button>
							<?php } else { ?>
							<button class="btn btn-block btn-success">If You are Interested to Participate<br>
								<a class="text-dark font-weight-bold h5" href="intrest.php?id=<?php echo $user; ?>&ct=<?php echo $db1['cost']; ?>&db=<?php echo $db1['heading'] ?>&date=<?php echo $db1['date']; ?>&eid=<?php echo $id; ?>">Click Here</a>
							</button>
							<?php } ?>
						</div>
					</div
    			</div>
    		</div>
    	</div>
    </section>

  <?php include("footer.php"); ?>

  <?php include("javascript.php"); ?>
    
  </body>
</html>