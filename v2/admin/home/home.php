<?php
session_start();
require("../required/check.php");
require("Home.class.php");

$home = new Home();

$n1 = $home->member();
$n2 = $home->subscriber();
$n3 = $home->event();
$n4 = $home->gallery();
$n5 = $home->fourthyear();
$n6 = $home->thirdyear();
$n7 = $home->secondyear();
$n8 = $home->firstyear();
$n9 = $home->register();
$n10 = $home->coordinator();
$n11 = $home->notice();
$n12 = $home->intrest();
$n13 = $home->participation();
$n14 = $home->payment();
$n15 = $home->material();
$n16 = $home->manual();
$n17 = $home->books();
$n18 = $home->comments();
$n19 = $home->faq();
//$n = $home->;
?>
<!DOCTYPE html>
<html lang="en">

<head>
	<?php include("../required/head.php"); ?>
</head>

<body class="hold-transition sidebar-mini">
<div class="wrapper">
    <?php include("../required/header.php"); ?>
    <?php include("../required/sidebar.php"); ?>

    <!-- Main content -->
    <div class="content">
		<div class="container">
			<div class="page-wrapper bg-gra-03 p-t-5 p-b-10">
				<div class="wrapper">
					<div class="card card-5">
						<div class="card-heading">
							<h2 class="title text-white">Welcome to ROCA</h2>
						</div>
					</div>
					<!--
					<div class="card-body alert bg-white p-l-10 p-r-10">
						<marquee><a class="text-danger font-weight-bold h4" href="download?file=roca-admin.apk">ROCA Admin Application Download Link</a></marquee>
					</div>
					-->
					
					<div class="row p-l-50 p-r-50">
						
					  	<div class="col-lg-3 col-6">
							<?php if( $n1 == 0 ) { ?> <div class="small-box bg-danger">
							<?php } else { ?> <div class="small-box bg-success">
							<?php } ?>
						  		<div class="inner">
									<h3><?= $n1; ?></h3>
									<p>Total ROCA Member</p>
						  		</div>
						  		<div class="icon"><i class="ion ion-pie-graph"></i></div>
						  	<a href="../user/view" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
							</div>
					  	</div>
						
					  	<div class="col-lg-3 col-6">
							<?php if( $n2 == 0 ) { ?> <div class="small-box bg-danger">
							<?php } else { ?> <div class="small-box bg-success">
							<?php } ?>
						 		<div class="inner">
									<h3><?= $n2; ?></h3>
									<p>Total Subscriber</p>
						  		</div>
						  		<div class="icon"><i class="ion ion-pie-graph"></i></div>
						  		<a href="../team/subscriber" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
							</div>
					  	</div>
						
					  	<div class="col-lg-3 col-6">
							<?php if( $n3 == 0 ) { ?> <div class="small-box bg-danger">
							<?php } else { ?> <div class="small-box bg-success">
							<?php } ?>
						  		<div class="inner">
									<h3><?= $n3; ?></h3>
									<p>Total Event</p>
						  		</div>
						  		<div class="icon"><i class="ion ion-pie-graph"></i></div>
						  		<a href="../event/view" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
							</div>
					  	</div>
						
					  	<div class="col-lg-3 col-6">
							<?php if( $n4 == 0 ) { ?> <div class="small-box bg-danger">
							<?php } else { ?> <div class="small-box bg-success">
							<?php } ?>
								<div class="inner">
									<h3><?= $n4; ?></h3>
									<p>Total Gallery</p>
								</div>
							  <div class="icon"><i class="ion ion-pie-graph"></i></div>
							  <a href="../gallery/view" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
							</div>
					  	</div>
						
						<div class="col-lg-3 col-6">
							<?php if( $n5 == 0 ) { ?> <div class="small-box bg-danger">
							<?php } else { ?> <div class="small-box bg-success">
							<?php } ?>
								<div class="inner">
									<h3><?= $n5; ?></h3>
									<p>ROCA Member <br>4th Year</p>
								</div>
							  <div class="icon"><i class="ion ion-pie-graph"></i></div>
							  <a href="../user/view" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
							</div>
					  	</div>
						
						<div class="col-lg-3 col-6">
							<?php if( $n6 == 0 ) { ?> <div class="small-box bg-danger">
							<?php } else { ?> <div class="small-box bg-success">
							<?php } ?>
								<div class="inner">
									<h3><?= $n6; ?></h3>
									<p>ROCA Member <br>3rd Year</p>
								</div>
							  <div class="icon"><i class="ion ion-pie-graph"></i></div>
							  <a href="../user/view" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
							</div>
					  	</div>
						
						<div class="col-lg-3 col-6">
							<?php if( $n7 == 0 ) { ?> <div class="small-box bg-danger">
							<?php } else { ?> <div class="small-box bg-success">
							<?php } ?>
								<div class="inner">
									<h3><?= $n7; ?></h3>
									<p>ROCA Member <br>2nd Year</p>
								</div>
							  <div class="icon"><i class="ion ion-pie-graph"></i></div>
							  <a href="../user/view" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
							</div>
					  	</div>
						
						<div class="col-lg-3 col-6">
							<?php if( $n8 == 0 ) { ?> <div class="small-box bg-danger">
							<?php } else { ?> <div class="small-box bg-success">
							<?php } ?>
								<div class="inner">
									<h3><?= $n8; ?></h3>
									<p>ROCA Member <br>1st Year</p>
								</div>
							  <div class="icon"><i class="ion ion-pie-graph"></i></div>
							  <a href="../user/view" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
							</div>
					  	</div>
						
						<div class="col-lg-3 col-6">
							<?php if( $n9 == 0 ) { ?> <div class="small-box bg-danger">
							<?php } else { ?> <div class="small-box bg-success">
							<?php } ?>
								<div class="inner">
									<h3><?= $n9; ?></h3>
									<p>ROCA Membership Request</p>
								</div>
							  <div class="icon"><i class="ion ion-pie-graph"></i></div>
							  <a href="../user/view" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
							</div>
					  	</div>
						
						<div class="col-lg-3 col-6">
							<?php if( $n10 == 0 ) { ?> <div class="small-box bg-danger">
							<?php } else { ?> <div class="small-box bg-success">
							<?php } ?>
								<div class="inner">
									<h3><?= $n10; ?></h3>
									<p>ROCA Active Co-ordinators</p>
								</div>
							  <div class="icon"><i class="ion ion-pie-graph"></i></div>
							  <a href="../coordinator/view" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
							</div>
					  	</div>
						
						<div class="col-lg-3 col-6">
							<?php if( $n11 == 0 ) { ?> <div class="small-box bg-danger">
							<?php } else { ?> <div class="small-box bg-success">
							<?php } ?>
								<div class="inner">
									<h3><?= $n11; ?></h3>
									<p>Total Upcomming Event</p>
								</div>
							  <div class="icon"><i class="ion ion-pie-graph"></i></div>
							  <a href="../notice/view" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
							</div>
					  	</div>
						
						<div class="col-lg-3 col-6">
							<?php if( $n12 == 0 ) { ?> <div class="small-box bg-danger">
							<?php } else { ?> <div class="small-box bg-success">
							<?php } ?>
								<div class="inner">
									<h3><?= $n12; ?></h3>
									<p>Total Event Participation &lpar;ROCA Member&rpar;</p>
								</div>
							  <div class="icon"><i class="ion ion-pie-graph"></i></div>
							  <a href="../participant/member_upcomming" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
							</div>
					  	</div>
						
						<div class="col-lg-3 col-6">
							<?php if( $n13 == 0 ) { ?> <div class="small-box bg-danger">
							<?php } else { ?> <div class="small-box bg-success">
							<?php } ?>
								<div class="inner">
									<h3><?= $n13; ?></h3>
									<p>Total Event Participation &lpar;Non-ROCA Member&rpar;</p>
								</div>
							  <div class="icon"><i class="ion ion-pie-graph"></i></div>
							  <a href="../participant/subscriber_upcomming" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
							</div>
					  	</div>
						
						<div class="col-lg-3 col-6">
							<?php if( $n14 == 0 ) { ?> <div class="small-box bg-danger">
							<?php } else { ?> <div class="small-box bg-success">
							<?php } ?>
								<div class="inner">
									<h3><?= $n14; ?></h3>
									<p>Total Payment Mode</p>
								</div>
							  <div class="icon"><i class="ion ion-pie-graph"></i></div>
							  <a href="../payment/view" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
							</div>
					  	</div>
						
						<div class="col-lg-3 col-6">
							<?php if( $n15 == 0 ) { ?> <div class="small-box bg-danger">
							<?php } else { ?> <div class="small-box bg-success">
							<?php } ?>
								<div class="inner">
									<h3><?= $n15; ?></h3>
									<p>Total Study Material</p>
								</div>
							  <div class="icon"><i class="ion ion-pie-graph"></i></div>
							  <a href="../study/studymaterialView" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
							</div>
					  	</div>
						
						<div class="col-lg-3 col-6">
							<?php if( $n16 == 0 ) { ?> <div class="small-box bg-danger">
							<?php } else { ?> <div class="small-box bg-success">
							<?php } ?>
								<div class="inner">
									<h3><?= $n16; ?></h3>
									<p>Total Lab Manual</p>
								</div>
							  <div class="icon"><i class="ion ion-pie-graph"></i></div>
							  <a href="../study/labmanualView" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
							</div>
					  	</div>
						
						<div class="col-lg-3 col-6">
							<?php if( $n17 == 0 ) { ?> <div class="small-box bg-danger">
							<?php } else { ?> <div class="small-box bg-success">
							<?php } ?>
								<div class="inner">
									<h3><?= $n17; ?></h3>
									<p>Total Books</p>
								</div>
							  <div class="icon"><i class="ion ion-pie-graph"></i></div>
							  <a href="../study/bookView" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
							</div>
					  	</div>
						
						<div class="col-lg-3 col-6">
							<?php if( $n18 == 0 ) { ?> <div class="small-box bg-danger">
							<?php } else { ?> <div class="small-box bg-success">
							<?php } ?>
								<div class="inner">
									<h3><?= $n18; ?></h3>
									<p>Total Review</p>
								</div>
							  <div class="icon"><i class="ion ion-pie-graph"></i></div>
							  <a href="../home/review" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
							</div>
					  	</div>
						
						<div class="col-lg-3 col-6">
							<?php if( $n19 == 0 ) { ?> <div class="small-box bg-danger">
							<?php } else { ?> <div class="small-box bg-success">
							<?php } ?>
								<div class="inner">
									<h3><?= $n19; ?></h3>
									<p>Total FAQ</p>
								</div>
							  <div class="icon"><i class="ion ion-pie-graph"></i></div>
							  <a href="../home/faq" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
							</div>
					  	</div>
						<!--
						<div class="col-lg-3 col-6">
							<div class="small-box bg-danger">
								<div class="inner">
									<h3></h3>
									<p></p>
								</div>
							  <div class="icon"><i class="ion ion-pie-graph"></i></div>
							  <a href="#" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
							</div>
					  	</div>
						-->
						
					</div>
					<!-- /.row -->
				</div>
			</div>
		</div>
	</div>
    <?php include("../required/footer.php"); ?>
</div>
<?php include("../required/javascript.php"); ?>

</html>