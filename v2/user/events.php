<?php 
require("Home.class.php"); 
$home = new Home();
$view = $home->upcommingevent();
$view1 = $home->recentevent();
$view2 = $home->ongoingevent();
$contact = $home->contact();
?>
<!doctype html>
<html>
<head>
	<?php include("head.php");?>
</head>
<body>
	<?php include("header.php");?>

	<div class="">
		
		<div class="hero-wrap hero-wrap-2" style="background-attachment:fixed;">
		  	<div class="overlay"></div>
			<div class="container">
				<div class="row no-gutters slider-text align-items-center justify-content-center" data-scrollax-parent="true">
					<div class="col-md-8 text-center">
						<p class="breadcrumbs"><span class="mr-2"><a  href="index">Home</a></span> <span>Events</span></p>
							<h1 class="mb-3 bread">Events</h1>
					</div>
				</div>
			</div>
		</div>
		
		<?php if($view2) { ?>
		
		<section class="ftco-section">
      		<div class="container">
        		<div class="row justify-content-center mb-5 pb-3">
          			<div class="col-md-7 heading-section text-center">
            			<h2 class="mb-4 font-weight-bold">On Going Events</h2>
          			</div>
				</div>
				
				<div class="row">

					<?php while( $data2 = $view2->fetch_array() ) { ?>

					<div class="col-md-4 d-flex">
						<div class="blog-entry align-self-stretch">
							<img src="../vendor/extra/notice/<?= $data2['photo']; ?>" width="350px" alt="No Pic">
							<div class="text p-4 d-block">
								<div class="meta mb-3">
								  <div><a href="#"><?= $data2['date']; ?></a></div>
								  <div><a href="#"><?= $data2['day']; ?></a></div>
								</div>
								<h3 class="heading mb-4">
									<a <?php if($data2['link']==1) { if($data2['event']=="All") { ?> href="verify?id=<?= $data2['id']; ?>" <?php } else { ?> href="login/login" <?php } } else { ?> href="#" <?php } ?>><?= $data2['heading']; ?></a>
								</h3>

								<p class="time-loc"><span class="mr-2"><i class="icon-clock-o"></i>&ensp;<?= $data2['time']; ?></span><br> <span><i class="icon-map-o"></i>&ensp;Venue&ensp;<?= $data2['venue']; ?></span></p>

								<p><?= $data2['notice']; ?></p>

								<?php if($data2['requirement']!="") { ?>
								<p>Requirement : <?= $data1['requirement']; ?></p> 
								<?php } ?>

								<?php if($data2['announcement']!="") { ?>
									<p class="text-danger"><?= $data2['announcement']; ?></p> 
								<?php } ?>

								<?php if($data2['link']==1) { ?>
									<p><a <?php if($data2['event']=="All") { ?> href="verify?id=<?= $data2['id']; ?>" <?php } else { ?> href="login/login" <?php } ?>>Join Event <i class="ion-ios-arrow-forward"></i></a></p>
								<?php } ?>
							</div>
						</div>
					</div>

					<?php } ?>

				</div>
      		</div>
   		</section>
		
		<?php } ?>
		
		<section class="ftco-section">
      		<div class="container">
        		<div class="row justify-content-center mb-5 pb-3">
          			<div class="col-md-7 heading-section text-center">
            			<h2 class="mb-4 font-weight-bold">Upcomming Events</h2>
          			</div>
        		</div>
				
				<?php if($view) { ?>
				
				<div class="row">

					<?php while( $data = $view->fetch_array() ) { ?>

					<div class="col-md-4 d-flex">
						<div class="blog-entry align-self-stretch">
							<img src="../vendor/extra/notice/<?= $data['photo']; ?>" width="350px" alt="No Pic">
							<div class="text p-4 d-block">
								<div class="meta mb-3">
								  <div><a href="#"><?= $data['date']; ?></a></div>
								  <div><a href="#"><?= $data['day']; ?></a></div>
								</div>
								<h3 class="heading mb-4">
									<a <?php if($data['link']==1) { if($data['event']=="All") { ?> href="verify?id=<?= $data['id']; ?>" <?php } else { ?> href="login/login" <?php } } else { ?> href="#" <?php } ?>><?= $data['heading']; ?></a>
								</h3>

								<p class="time-loc"><span class="mr-2"><i class="icon-clock-o"></i>&ensp;<?= $data['time']; ?></span><br> <span><i class="icon-map-o"></i>&ensp;Venue&ensp;<?= $data['venue']; ?></span></p>

								<p><?= $data['notice']; ?></p>

								<?php if($data['requirement']!="") { ?>
								<p>Requirement : <?= $data['requirement']; ?></p> 
								<?php } ?>

								<?php if($data['announcement']!="") { ?>
									<p class="text-danger"><?= $data['announcement']; ?></p> 
								<?php } ?>

								<?php if($data['link']==1) { ?>
									<p><a <?php if($data['event']=="All") { ?> href="verify?id=<?= $data['id']; ?>" <?php } else { ?> href="login/login" <?php } ?>>Join Event <i class="ion-ios-arrow-forward"></i></a></p>
								<?php } ?>
							</div>
						</div>
					</div>

					<?php } ?>

				</div>
				
				<?php } ?>
				
      		</div>
   		</section>
		
		<section class="ftco-section">
      		<div class="container">
        		<div class="row justify-content-center mb-5 pb-3">
          			<div class="col-md-7 heading-section text-center">
            			<h2 class="mb-4 font-weight-bold">Recent Events</h2>
          			</div>
        		</div>
				
				<?php if($view1) { ?>
				
				<div class="row overflow-auto" style="height: 600px">

					<?php while( $data1 = $view1->fetch_array() ) { ?>

					<div class="col-md-4 d-flex">
						<div class="blog-entry align-self-stretch">
							<img src="../vendor/extra/notice/<?= $data1['photo']; ?>" width="350px" alt="No Pic">
							<div class="text p-4 d-block">
								<div class="meta mb-3">
								  <div><a href="#"><?= $data1['date']; ?></a></div>
								  <div><a href="#"><?= $data1['day']; ?></a></div>
								</div>
								<h3 class="heading mb-4">
									<a <?php if($data1['link']==1) { if($data1['event']=="All") { ?> href="member?id=<?= $data1['id']; ?>" <?php } else { ?> href="login/login" <?php } } else { ?> href="#" <?php } ?>><?= $data1['heading']; ?></a>
								</h3>

								<p class="time-loc"><span class="mr-2"><i class="icon-clock-o"></i>&ensp;<?= $data1['time']; ?></span><br> <span><i class="icon-map-o"></i>&ensp;Venue&ensp;<?= $data1['venue']; ?></span></p>

								<p><?= $data1['notice']; ?></p>

								<?php if($data1['requirement']!="") { ?>
								<p>Requirement : <?= $data1['requirement']; ?></p> 
								<?php } ?>

								<?php if($data1['announcement']!="") { ?>
									<p class="text-danger"><?= $data1['announcement']; ?></p> 
								<?php } ?>

								<?php if($data1['link']==1) { ?>
									<p><a <?php if($data1['event']=="All") { ?> href="member?id=<?= $data1['id']; ?>" <?php } else { ?> href="login/login" <?php } ?>>Join Event <i class="ion-ios-arrow-forward"></i></a></p>
								<?php } ?>
							</div>
						</div>
					</div>

					<?php } ?>

				</div>
				
				<?php } ?>
				
      		</div>
   		</section>
		
		
	</div>
	
	<?php include("footer.php");?>

	<?php include("javascript.php");?>
</body>
</html>