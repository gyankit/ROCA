<?php
	include("config.php");
	if(!isset($_SESSION['user_login'])) { header("location: index.php"); }
	$email=$_REQUEST['email'];
	$id=$_REQUEST['id'];
	if($id=="" or $email=="")
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

	$sql="SHOW TABLES LIKE 'participation_tbl'";
	$sr=mysqli_query($cn,$sql);

	if(mysqli_num_rows($sr)==0)
	{
		$sql3="CREATE TABLE `id8469611_clubroca`.`participation_tbl` ( `id` INT(10) NOT NULL , `name` VARCHAR(50) NOT NULL , `roll` VARCHAR(10) NOT NULL , `email` VARCHAR(50) NOT NULL , `date` VARCHAR(10) NOT NULL , `paid` VARCHAR(3) NOT NULL , `mode` VARCHAR(30) NOT NULL , `transaction` VARCHAR(30) NOT NULL , PRIMARY KEY (`id`,`email`))";
		$rs2=mysqli_query($cn,$sql3);
		if($rs2==false)
		{
		    header("location:error.php");
		}
	}
	
	$msg="";
	if($_SERVER['REQUEST_METHOD']=='POST')
	{
		$name=$_POST['name'];
		$roll=$_POST['roll'];
        $event=$db1['heading'];
        $eid=$db1['id'];
		$date=date('d-m-Y');
		$sql4="insert into participation_tbl values( '$eid', '$name', '$roll', '$email', '$date', 'NO','','')";
		$rs3=mysqli_query($cn,$sql4);
		if($rs3==true)
		{
		    if($db1['cost'] == 0) { ?>
		        <script>
    				alert('Your Request for Event Participation Received.');
    				window.location.href = "index.php";
    			</script><?php	
    	    } else { ?>
        	    <script>
    				alert('Your Request for Event Participation Received. \nComplete Payment for Confirm your Participation');
    				window.location.href = "payment.php?cost=<?php echo $db1['cost']; ?>&event=<?php echo $event; ?>&eid=<?php echo $eid; ?>&page=event&email=<?php echo $email; ?>&uid=";
    			</script>
			<?php
    		}
		}
		else
		{
			?>
			<script>alert("You are already Apply."); window.location.href = "index.php";</script>
			<?php
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
    				<div class="alert">
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
					</div>
    			</div>
    		</div>
			<div class="alert alert-danger">
				<form role="form" class="form-submit" method="post" action="">
					<div class="form-group">
						<label for="Name"><strong class="admin_label text-left">Name :</strong></label>
						<input type="text" class="form-control" name="name" placeholder="Full Name" oninput="this.value = this.value.toUpperCase()" required autofocus>
					</div>
					<div class="form-group">
						<label for="Roll"><strong class="admin_label text-left">Roll No :</strong></label>
						<input type="text" class="form-control" name="roll" placeholder="College Roll No" oninput="this.value = this.value.toUpperCase()" patter="[A-Z]{2}/\d{2}/\d{2,3}" title="Roll no must be in Format __/__/__ " required>
					</div>

					<?php if($db1['cost']==0) { ?>
					<button class="btn btn-block btn-success">If You are Intrested to Join<br>Click Here</button>
					<?php } else { ?>
					<button class="btn btn-block btn-success">If You are Intrested to Participate<br>Click Here</button>
					<?php } ?>
				</form>
			</div>
    	</div>
    </section>

  <?php include("footer.php"); ?>

  <?php include("javascript.php"); ?>
    
  </body>
</html>