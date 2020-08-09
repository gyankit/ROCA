<?php
	include("config.php");	
	$sql="SHOW TABLES LIKE 'admin_tbl'";
	$sr=mysqli_query($cn,$sql);
	if(mysqli_num_rows($sr)==0) { header("location: roca_admin/index.php"); }
	else {
	    $sql3="select * from admin_tbl";
	    $sr3=mysqli_query($cn,$sql3);
	    if(mysqli_num_rows($sr3)==0) { header("location: roca_admin/index.php"); }
	}
	$_SESSION["user_login"]="False";
	$_SESSION["user"]="";
	function slide_shows($cn) {
		$output="";
		$count= 0;
		$sqql="select * from gallery_tbl order by id DESC";
		$resq=mysqli_query($cn,$sqql);
		if($resq==false or mysqli_num_rows($resq)==0){} else {
			while($pic=mysqli_fetch_assoc($resq)) {
				if($count==0) {
					$output .='<div class="carousel-item">';
				} else {
					$output .='<div class="carousel-item">';
				}
				$output .= '<img src="images/events/'.$pic['gallery'].'" alt="No Pic" height="auto" width="100%" onContextMenu="return false;" style="pointer-events: none;"/></div>';
				$count = $count+1;
			}
			return $output;
	}	} 
	
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
    <?php include("header.php"); ?>  
  	<div class="galary_slide">
      	<div id="sliderocagallery" class="carousel slide" data-ride="carousel">
			<div class="carousel-inner">
			    <div class="carousel-item active">
					<img src="images/poster.jpg" alt="No Pic" height="auto" width="100%"/>
				</div>
				<?php echo slide_shows($cn); ?>
				<a class="carousel-control-prev" href="#sliderocagallery" data-slide="prev">
					<span class="carousel-control-prev-icon"></span>
				</a>
				<a class="carousel-control-next" href="#sliderocagallery" data-slide="next">
					<span class="carousel-control-next-icon"></span>
				</a>
			</div>
		</div>
    </div>
 <section class="ftco-section bg-light">
      <div class="container">
      	<div class="row justify-content-center mb-5 pb-3">
          <div class="col-md-7 heading-section ftco-animate text-center">
            <h2 class="mb-4">Our Experienced Advisors</h2>
          </div>
        </div>
        <div class="row">
        	<div class="col-lg-4 mb-sm-4 ftco-animate">
        		<div class="staff">
        			<div class="d-flex mb-4">
        				<div class="img" style="background-image: url(images/ctbhunia.jpg);"></div>
        				<div class="info ml-4">
        					<h3><a href="teacher-single.html"></a>Prof. (Dr.) Chandan Tilak Bhunia</h3>
        					<span class="position">Director General</span>
        				</div>
        			</div>
        			<div class="text">
        				<p><!--Even the all-powerful Pointing has no control about the blind texts it is an almost unorthographic life One day however a small line of blind text by the name--></p>
        			</div>
        		</div>
        	</div>
			<div class="col-lg-4 mb-sm-4 ftco-animate">
        		<div class="staff">
        			<div class="d-flex mb-4">
        				<div class="img" style="background-image: url(images/PKSinha.png);"></div>
        				<div class="info ml-4">
        					<h3><a href="teacher-single.html"></a>Dr. Prasanta Kr. Sinha</h3>
        					<span class="position">Principal</span>
        				</div>
        			</div>
        			<div class="text">
        				<p><!--Even the all-powerful Pointing has no control about the blind texts it is an almost unorthographic life One day however a small line of blind text by the name--></p>
        			</div>
        		</div>
        	</div>
			<div class="col-lg-4 mb-sm-4 ftco-animate">
        		<div class="staff">
        			<div class="d-flex mb-4">
        				<div class="img" style="background-image: url(images/SubhasisJana.jpg);"></div>
        				<div class="info ml-4">
        					<h3><a href="teacher-single.html"></a>Mr. Subhasis Jana</h3>
        					<span class="position">Mentor</span>
        				</div>
        			</div>
        			<div class="text">
        				<p><!--Even the all-powerful Pointing has no control about the blind texts it is an almost unorthographic life One day however a small line of blind text by the name--></p>
        			</div>
        		</div>
        	</div>
        </div>
      </div>
	  </section>
	<?php
	  $date=date('Y-m-d');
	  $sql2="select * from notice_tbl where date > '$date' order by id asc";
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
                <h3 class="heading mb-4"><a <?php if($db1['link']==1) { if($db1['event']=="All") { ?> href="checkmember.php?id=<?php echo $db1['id']; ?>" <?php } else { ?> href="login.php" <?php } } else { ?> href="#" <?php } ?>><?php echo $db1['heading']; ?></a></h3>
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