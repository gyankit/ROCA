<?php
	include("config.php");
	if(!isset($_SESSION['user_login'])) { header("location:index.php"); }
	$sql="SHOW TABLES LIKE 'notice_tbl'";
	$sr=mysqli_query($cn,$sql);

	if(mysqli_num_rows($sr)==0)
	{
		?>
		<script>alert("No Event Notice Updates Available...");</script>
		<?php
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
            <p class="breadcrumbs"><span class="mr-2"><a <?php if($_SESSION["user_login"]=="True") { ?> href="home.php" <?php } else { ?> href="index.php" <?php } ?>>Home</a></span> <span>Event</span></p>
            <h1 class="mb-3 bread">Events</h1>
          </div>
        </div>
      </div>
    </div>
    
<?php
	  $date=date('Y-m-d');
	  $sql2="select * from notice_tbl where date >= '$date' order by id asc";
	  $rs1=mysqli_query($cn,$sql2);
	  if($rs1==true) { if(mysqli_num_rows($rs1)!=0) { ?>
    <section class="ftco-section">
      <div class="container">
        <div class="row justify-content-center mb-5 pb-3">
          <div class="col-md-7 heading-section ftco-animate text-center">
            <h2 class="mb-4">Upcomming Events</h2>
          </div>
        </div>
		  <div class="row">
		  <?php while($db1=mysqli_fetch_array($rs1)) { ?>
        	<div class="col-md-4 d-flex ftco-animate">
          	<div class="blog-entry align-self-stretch">
              <img src="images/notice/<?php echo $db1['photo']; ?>" width="350px" alt="No Pic">
              <div class="text p-4 d-block">
              	<div class="meta mb-3">
                  <div><a href="#"><?php echo $db1['date']; ?></a></div>
                  <div><a href="#"><?php echo $db1['day']; ?></a></div>
                </div>
                <h3 class="heading mb-4"><a href="login.php"><?php echo $db1['heading']; ?></a></h3>
                <p class="time-loc"><span class="mr-2"><i class="icon-clock-o"></i>&ensp;<?php echo $db1['time']; ?></span><br> <span><i class="icon-map-o"></i>&ensp;Venue&ensp;<?php echo $db1['venue']; ?></span></p>
                <p><?php echo $db1['notice']; ?></p>
				<?php if($db1['requirement']!="") { ?><p>Requirement : <?php echo $db1['requirement']; ?></p> <?php } ?>
				<?php if($db1['announcement']!="") { ?><p class="text-danger"><?php echo $db1['announcement']; ?></p> <?php } ?>
                <?php if($db1['link']==1) { ?><p><a <?php if($db1['event']=="All") { ?> href="checkmember.php?id=<?php echo $db1['id']; ?>" <?php } else { ?> href="login.php" <?php } ?>>Join Event <i class="ion-ios-arrow-forward"></i></a></p><?php } ?>
              </div>
            </div>
		  </div>
		  <?php } ?>
		</div>
      </div>
    </section>
	<?php } } ?>	
	  
    <?php
	  $date=date('Y-m-d');
	  $sql2="select * from notice_tbl where date < '$date' order by id desc";
	  $rs1=mysqli_query($cn,$sql2);
	  
	  if($rs1==true)
	  {
		  if(mysqli_num_rows($rs1)!=0)
	  {
	  ?>
    <section class="ftco-section">
      <div class="container">
        <div class="row justify-content-center mb-5 pb-3">
		  <div class="col-md-7 heading-section ftco-animate text-center">
			<h2 class="mb-4">Latest Events</h2>
		  </div>
		</div>
		  <div class="row">
		  <?php 
		  		while($db1=mysqli_fetch_array($rs1))
				{
				?>
        	<div class="col-md-4 d-flex ftco-animate">
          	<div class="blog-entry align-self-stretch">
              <img src="images/notice/<?php echo $db1['photo']; ?>" width="350px" alt="No Pic">
              <div class="text p-4 d-block">
              	<div class="meta mb-3">
                  <div><a href="#"><?php echo $db1['date']; ?></a></div>
                  <div><a href="#"><?php echo $db1['day']; ?></a></div>
                </div>
                <h3 class="heading mb-4"><a <?php if($db1['link']==1) { if($db1['event']=="All") { ?> href="checkmember.php?id=<?php echo $db1['id']; ?>" <?php } else { ?> href="login.php" <?php } } else { ?> href="#" <?php } ?>><?php echo $db1['heading']; ?></a></h3>
                <p class="time-loc"><span class="mr-2"><i class="icon-clock-o"></i>&ensp;<?php echo $db1['time']; ?></span><br> <span><i class="icon-map-o"></i>&ensp;Venue&ensp;<?php echo $db1['vanue']; ?></span></p>
                <p><?php echo $db1['notice']; ?></p>
				<?php if($db1['requirement']!="") { ?><p>Requirement : <?php echo $db1['requirement']; ?></p> <?php } ?>
              </div>
            </div>
		  </div>
		  <?php } ?>
		</div>
      </div>
    </section>
	<?php
	  }
	  }
?>	
		
	  
  <?php include("footer.php"); ?>
    
  <?php include("javascript.php"); ?>
    
  </body>
</html>