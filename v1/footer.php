<?php 
    $qry="select * from admin_tbl where role='ADMINISTRATOR'";
    $rqs=mysqli_query($cn,$qry);
    if(mysqli_num_rows($rqs)==1) {
        $adname="Gyan Ankit Singh";
        $adphone="9534470240";
    }
    else {
        while($dbs=mysqli_fetch_array($rqs)) {
            if($dbs['unique_id']=="ROCA2019") {continue;}
            else {
                $idd=$dbs['unique_id'];
                $qry1="select * from roca_member_tbl where unique_id='$idd'";
                $rqs1=mysqli_query($cn,$qry1);
                $dbs1=mysqli_fetch_array($rqs1);
                $adname=$dbs1['name'];
                $adphone=$dbs1['contact'];
            }
        }
    }
?>
<footer class="ftco-footer ftco-bg-dark ftco-section img" style="background-image: url(images/bg_2.jpg); background-attachment:fixed;">
	<div class="overlay"></div>
  <div class="container">
    <div class="row mb-5">
      <div class="col-md-3">
        <div class="ftco-footer-widget mb-4">
          <h2><a class="navbar-brand" <?php if($_SESSION["user_login"]=="True") { ?> href="home.php" <?php } else { ?> href="index.php" <?php } ?>>ROCA&ensp;<i class="flaticon-university"></i><small>DIATM</small></a></h2>
          <p>The way a team plays as a whole determines its success. You may have the greatest bunch of individual in the world, but if they don't play together the club won't be worth a dime.</p>
          <ul class="ftco-footer-social list-unstyled float-md-left float-lft mt-5">
            <li class="ftco-animate"><a href="https://www.facebook.com/diatmroca/" target="_blank"><span class="icon-facebook"></span></a></li>
            <li class="ftco-animate"><a href="https://www.youtube.com/channel/UCzq3qrhy1iqaBPSEQhwSRpg" target="_blank"><span class="icon-youtube"></span></a></li>
          </ul>
        </div>
      </div>
      <div class="col-md-3">
         <div class="ftco-footer-widget mb-4 ml-md-4">
          <h2 class="ftco-heading-2">Site Links</h2>
          <ul class="list-unstyled">
            <li><a <?php if($_SESSION["user_login"]=="True") { ?> href="home.php" <?php } else { ?> href="index.php" <?php } ?> class="py-2 d-block">Home</a></li>
            <li><a href="gallery.php" class="py-2 d-block">Gallery</a></li>
            <li><a href="ourteam.php" class="py-2 d-block">Our Team</a></li>
            <li><a href="study.php" class="py-2 d-block">Study Resources</a></li>
            <li><a href="review.php" class="py-2 d-block">Review</a></li>
            <li><a href="faq.php" class="py-2 d-block">FAQ</a></li>
          </ul>
        </div>
      </div>
      <div class="col-md-4">
        <div class="ftco-footer-widget mb-4">
        	<h2 class="ftco-heading-2">Have any Questions?</h2>
        	<div class="block-23 mb-3">
              <ul>
                <li><a href="https://maps.google.com/?q=23.474088,87.406255" target="_blank"><span class="icon icon-map-marker"></span><span class="text">DIATM College<br>Rajbandh, Durgapur<br>West Bangal, 713212</span></a></li>
                <li><a href="tel://+91 <?php echo $adphone; ?>"><span class="icon icon-phone"></span><span class="text">+91 <?php echo $adphone; ?></span></a></li>
                <li><a href="mailto:clubroca2018@gmail.com"><span class="icon icon-envelope"></span><span class="text">clubroca2018@gmail.com</span></a></li>
              </ul>
            </div>
        </div>
      </div>
		
	  <div class="col-md-2">
        <div class="ftco-footer-widget mb-4">
			<h2 class="ftco-heading-2">Login/Register</h2>
        	<ul class="list-unstyled">
			<?php if($_SESSION["user_login"]=="False" or $_SESSION["user_login"]=="") { ?>
			  <li><a href="register.php" class="py-2 d-block">Register</a></li>
			  <li><a href="login.php" class="py-2 d-block">User Login</a></li>
			<?php } else { ?>
			  <li><a href="logout.php" class="py-2 d-block">Logout</a></li>
			<?php } ?>
			</ul>
        </div>
      </div>
    </div>
    <div class="row">
      <div class="col-md-12 text-center">
        <p>
  			Copyright &copy; 2019-<script>document.write(new Date().getFullYear());</script> All rights reserved |
		</p>
		<div class="text-center">
			<a href="https://www.facebook.com/gyankit" target="_blank"><img src="images/ms.png" height="50px" width="50px" alt="GYAN ANKIT SINGH"></a>&ensp;&ensp;
			<a href="https://www.diatm.rahul.ac.in" target="_blank"><img src="images/diatm.png" height="50px" width="50px" alt="DIATM"></a>
		</div>
      </div>
    </div>
  </div>
</footer>