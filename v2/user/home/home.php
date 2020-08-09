<?php 
session_start();
require("../required/check.php");
require("Home.class.php"); 
$home = new Home();
$view = $home->upcommingevent();
$contact = $home->contact();
?>

<!doctype html>
<html>
<head>
	<?php include("../required/head.php"); ?>
</head>
<body>
	<?php include("../required/header.php"); ?>

	<div class="">

		<div class="poster">
			<img src="../../vendor/dist/img/poster.jpg" alt="No Pic" height="auto" width="100%"/>
		</div>

		<!--
		<div class="card-body alert bg-dark p-l-10 p-r-10 m-t-20 p-t-20">
			<marquee><a class="text-white font-weight-bold h4" href="../download?file=roca.apk">ROCA Application Download Link</a></marquee>
		</div>
		-->

		<section class="ftco-section bg-light">
      		<div class="container">
      			<div class="row justify-content-center mb-5 pb-3">
          			<div class="col-md-7 heading-section text-center">
            			<h2 class="mb-4 text-dark font-weight-bold">Our Experienced Advisors</h2>
          			</div>
        		</div>
				<div class="row">
					<div class="col-lg-4 mb-sm-4">
						<div class="staff">
							<div class="d-flex mb-4">
								<div class="img" style="background-image: url(../../vendor/dist/img/ctbhunia.jpg);"></div>
								<div class="info ml-4">
									<h3><a href="#"></a>Prof. (Dr.) Chandan Tilak Bhunia</h3>
									<span class="position">Director General</span>
								</div>
							</div>
						</div>
					</div>
					<div class="col-lg-4 mb-sm-4">
						<div class="staff">
							<div class="d-flex mb-4">
								<div class="img" style="background-image: url(../../vendor/dist/img/PKSinha.png);"></div>
								<div class="info ml-4">
									<h3><a href="#"></a>Dr. Prasanta Kr. Sinha</h3>
									<span class="position">Principal</span>
								</div>
							</div>
						</div>
					</div>
					<div class="col-lg-4 mb-sm-4">
						<div class="staff">
							<div class="d-flex mb-4">
								<div class="img" style="background-image: url(../../vendor/dist/img/SubhasisJana.jpg);"></div>
								<div class="info ml-4">
									<h3><a href="#"></a>Mr. Subhasis Jana</h3>
									<span class="position">Mentor</span>
								</div>
							</div>
						</div>
					</div>
				</div>
      		</div>
	 	</section>
		
		<?php if($view) { ?>
		
		<section class="ftco-section">
      		<div class="container">
        		<div class="row justify-content-center mb-5 pb-3">
          			<div class="col-md-7 heading-section text-center">
            			<h2 class="mb-4 font-weight-bold">Upcomming Events</h2>
          			</div>
        		</div>
				<div class="row">

					<?php while( $data = $view->fetch_array() ) { ?>

					<div class="col-md-4 d-flex">
						<div class="blog-entry align-self-stretch">
							<img src="../../vendor/extra/notice/<?= $data['photo']; ?>" width="350px" alt="No Pic">
							<div class="text p-4 d-block">
								<div class="meta mb-3">
								  <div><a href="#"><?= $data['date']; ?></a></div>
								  <div><a href="#"><?= $data['day']; ?></a></div>
								</div>
								<h3 class="heading mb-4">
									<a <?php if($data['link']==1) { if($data['event']=="All") { ?> href="../event/eventregistration?id=<?= $data['id']; ?>" <?php } else { ?> href="../login/login" <?php } } else { ?> href="#" <?php } ?>><?= $data['heading']; ?></a>
								</h3>

								<p class="time-loc"><span class="mr-2"><i class="icon-clock-o"></i>&ensp;<?= $data['time']; ?></span><br> <span><i class="icon-map-o"></i>&ensp;Venue:&ensp;<?= $data['venue']; ?></span></p>

								<p><?= $data['notice']; ?></p>

								<?php if($data['requirement']!="") { ?>
								<p>Requirement : <?= $data['requirement']; ?></p> 
								<?php } ?>

								<?php if($data['announcement']!="") { ?>
									<p class="text-danger"><?= $data['announcement']; ?></p> 
								<?php } ?>

								<?php if($data['link']==1) { ?>
									<p><a <?php if($data['event']=="All") { ?> href="../event/eventregistration?id=<?= $data['id']; ?>" <?php } else { ?> href="../login/login" <?php } ?>>Join Event <i class="ion-ios-arrow-forward"></i></a></p>
								<?php } ?>
							</div>
						</div>
					</div>

					<?php } ?>

				</div>
      		</div>
   		</section>
		
		<?php } ?>
		
	</div>
	
	<?php include("../required/footer.php"); ?>

	<?php include("../required/javascript.php"); ?>

</body>
</html>