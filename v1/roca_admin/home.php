<?php
	include("config.php");
	include("check.php");
	$id=$_SESSION['id']; 

	$sql="select * from roca_member_tbl";
	$rs=mysqli_query($cn,$sql);
	if($rs==false) { $n=0; }
	else { $n=mysqli_num_rows($rs); }

	$sql1="select * from subscriber_tbl";
	$rs1=mysqli_query($cn,$sql1);
	if($rs1==false) { $n1=0; }
	else { $n1=mysqli_num_rows($rs1); }

	$date=date('Y-m-d');
	$sql2="select * from notice_tbl where date < '$date'";
	$rs2=mysqli_query($cn,$sql2);
	if($rs2==false) { $n2=0; }
	else { $n2=mysqli_num_rows($rs2); }

	$sql3="select * from gallery_tbl";
	$rs3=mysqli_query($cn,$sql3);
	if($rs3==false) { $n3=0; }
	else { $n3=mysqli_num_rows($rs3); }

	$year=date('Y');
	if($date < "$year-06-30") { $year=$year-1; }
	$year3=$year-3;
	$sql4="select * from roca_member_tbl where year=$year3";
	$rs4=mysqli_query($cn,$sql4);
	if($rs4==false) { $n4=0; }
	else { $n4=mysqli_num_rows($rs4); }

	$year2=$year-2;
	$sql5="select * from roca_member_tbl where year=$year2";
	$rs5=mysqli_query($cn,$sql5);
	if($rs5==false) { $n5=0; }
	else { $n5=mysqli_num_rows($rs5); }

	$year1=$year-1;
	$sql6="select * from roca_member_tbl where year=$year1";
	$rs6=mysqli_query($cn,$sql6);
	if($rs6==false) { $n6=0; }
	else { $n6=mysqli_num_rows($rs6); }

	$sql7="select * from roca_member_tbl where year='$year'";
	$rs7=mysqli_query($cn,$sql7);
	if($rs7==false) { $n7=0; }
	else { $n7=mysqli_num_rows($rs7); }

	$sql8="select * from roca_member_tbl where coordinator='YES' and year between '$year3' and '$year1'";
	$rs8=mysqli_query($cn,$sql8);
	if($rs8==false) { $n8=0; }
	else { $n8=mysqli_num_rows($rs8); }

	$sql9="select * from notice_tbl where date > '$date'";
	$rs9=mysqli_query($cn,$sql9);
	if($rs9==false) { $n9=0; }
	else { $n9=mysqli_num_rows($rs9); }

	$sql10="select * from intrest_tbl";
	$rs10=mysqli_query($cn,$sql10);
	if($rs10==false) { $n10=0; }
	else { $n10=mysqli_num_rows($rs10); }
	
	$sql18="select * from participation_tbl";
	$rs18=mysqli_query($cn,$sql18);
	if($rs18==false) { $n18=0; }
	else { $n18=mysqli_num_rows($rs18); }

	$sql11="select * from payment_tbl";
	$rs11=mysqli_query($cn,$sql11);
	if($rs11==false) { $n11=0; }
	else { $n11=mysqli_num_rows($rs11); }

	$sql12="select * from material_tbl";
	$rs12=mysqli_query($cn,$sql12);
	if($rs12==false) { $n12=0; }
	else { $n12=mysqli_num_rows($rs12); }

	$sql13="select * from manual_tbl";
	$rs13=mysqli_query($cn,$sql13);
	if($rs13==false) { $n13=0; }
	else { $n13=mysqli_num_rows($rs13); }

	$sql14="select * from books_tbl";
	$rs14=mysqli_query($cn,$sql14);
	if($rs14==false) { $n14=0; }
	else { $n14=mysqli_num_rows($rs14); }

	$sql15="select * from comments_tbl";
	$rs15=mysqli_query($cn,$sql15);
	if($rs15==false) { $n15=0; }
	else { $n15=mysqli_num_rows($rs15); }

	$sql16="select * from faq_tbl";
	$rs16=mysqli_query($cn,$sql16);
	if($rs16==false) { $n16=0; }
	else { $n16=mysqli_num_rows($rs16); }

	$sql17="select * from roca_member_tbl where paid='NO' and year between '$year3' and '$year'";
	$rs17=mysqli_query($cn,$sql17);
	if($rs17==false) { $n17=0; }
	else { $n17=mysqli_num_rows($rs17); }
?>
<html lang="en">
<head>
	<?php include("css.php"); ?>
	<title>R O C A</title>
</head>

<body>
	<div class="header">
		<?php include("header.php"); ?>
	</div>
	 
	<div class="container">
		<div class="jumbotron card-title text-capitalize text-center h1 text-danger font-weight-bold bg-dark">
			Welcome to ROCA Family
		</div>
		<br><br>
		<div class="jumbotron-fluid">
			<div class="row breadcrumb bg-info">
				<div class="alert col-xl-3 col-lg-6 col-md-6 col-sm-12 col-12">
					<div class="card">
						<div class="card-body">
							<h5 class="text-muted">Total ROCA Member</h5>
							<div class="metric-value d-inline-block text-right">
								<h1 class="md-1"><?php echo $n; ?></h1>
							</div>
						</div>
					</div>
				</div>
				<div class="alert col-xl-3 col-lg-6 col-md-6 col-sm-12 col-12">
					<div class="card">
						<div class="card-body">
							<h5 class="text-muted">Total Subscriber</h5>
							<div class="metric-value d-inline-block">
								<h1 class="mb-1"><?php echo $n1; ?></h1>
							</div>
						</div>
					</div>
				</div>				
				<div class="alert col-xl-3 col-lg-6 col-md-6 col-sm-12 col-12">
					<div class="card">
						<div class="card-body">
							<h5 class="text-muted">Total Event</h5>
							<div class="metric-value d-inline-block">
								<h1 class="mb-1"><?php echo $n2; ?></h1>
							</div>
						</div>
					</div>
				</div>
				<div class="alert col-xl-3 col-lg-6 col-md-6 col-sm-12 col-12">
					<div class="card">
						<div class="card-body">
							<h5 class="text-muted">Total Gallery</h5>
							<div class="metric-value d-inline-block">
								<h1 class="mb-1"><?php echo $n3; ?></h1>
							</div>
						</div>
					</div>
				</div>
				<div class="alert col-xl-3 col-lg-6 col-md-6 col-sm-12 col-12">
					<div class="card">
						<div class="card-body">
							<h5 class="text-muted">ROCA Member :<br>4th Year</h5>
							<div class="metric-value d-inline-block">
								<h1 class="mb-1"><?php echo $n4; ?></h1>
							</div>
						</div>
					</div>
				</div>
				<div class="alert col-xl-3 col-lg-6 col-md-6 col-sm-12 col-12">
					<div class="card">
						<div class="card-body">
							<h5 class="text-muted">ROCA Member :<br>3rd Year</h5>
							<div class="metric-value d-inline-block">
								<h1 class="mb-1"><?php echo $n5; ?></h1>
							</div>
						</div>
					</div>
				</div>
				<div class="alert col-xl-3 col-lg-6 col-md-6 col-sm-12 col-12">
					<div class="card">
						<div class="card-body">
							<h5 class="text-muted">ROCA Member :<br>2nd Year</h5>
							<div class="metric-value d-inline-block">
								<h1 class="mb-1"><?php echo $n6; ?></h1>
							</div>
						</div>
					</div>
				</div>
				<div class="alert col-xl-3 col-lg-6 col-md-6 col-sm-12 col-12">
					<div class="card">
						<div class="card-body">
							<h5 class="text-muted">ROCA Member :<br>1st Year</h5>
							<div class="metric-value d-inline-block">
								<h1 class="mb-1"><?php echo $n7; ?></h1>
							</div>
						</div>
					</div>
				</div>
				<div class="alert col-xl-3 col-lg-6 col-md-6 col-sm-12 col-12">
					<div class="card">
						<div class="card-body">
							<h5 class="text-muted">ROCA Membership Request</h5>
							<div class="metric-value d-inline-block">
								<h1 class="mb-1"><?php echo $n17; ?></h1>
							</div>
						</div>
					</div>
				</div>
				<div class="alert col-xl-3 col-lg-6 col-md-6 col-sm-12 col-12">
					<div class="card">
						<div class="card-body">
							<h5 class="text-muted">ROCA Active Co-ordinators</h5>
							<div class="metric-value d-inline-block">
								<h1 class="mb-1"><?php echo $n8; ?></h1>
							</div>
						</div>
					</div>
				</div>
				<div class="alert col-xl-3 col-lg-6 col-md-6 col-sm-12 col-12">
					<div class="card">
						<div class="card-body">
							<h5 class="text-muted">Total Upcomming Event</h5>
							<div class="metric-value d-inline-block">
								<h1 class="mb-1"><?php echo $n9; ?></h1>
							</div>
						</div>
					</div>
				</div>
				<div class="alert col-xl-3 col-lg-6 col-md-6 col-sm-12 col-12">
					<div class="card">
						<div class="card-body">
							<h5 class="text-muted">Total Event Participation (ROCA Member)</h5>
							<div class="metric-value d-inline-block">
								<h1 class="mb-1"><?php echo $n10; ?></h1>
							</div>
						</div>
					</div>
				</div>
				<div class="alert col-xl-3 col-lg-6 col-md-6 col-sm-12 col-12">
					<div class="card">
						<div class="card-body">
							<h5 class="text-muted">Total Event Participation (Non-ROCA Member)</h5>
							<div class="metric-value d-inline-block">
								<h1 class="mb-1"><?php echo $n18; ?></h1>
							</div>
						</div>
					</div>
				</div>
				<div class="alert col-xl-3 col-lg-6 col-md-6 col-sm-12 col-12">
					<div class="card">
						<div class="card-body">
							<h5 class="text-muted">Total Payment Mode</h5>
							<div class="metric-value d-inline-block">
								<h1 class="mb-1"><?php echo $n11; ?></h1>
							</div>
						</div>
					</div>
				</div>
				<div class="alert col-xl-3 col-lg-6 col-md-6 col-sm-12 col-12">
					<div class="card">
						<div class="card-body">
							<h5 class="text-muted">Total Study Material</h5>
							<div class="metric-value d-inline-block">
								<h1 class="mb-1"><?php echo $n12; ?></h1>
							</div>
						</div>
					</div>
				</div>
				<div class="alert col-xl-3 col-lg-6 col-md-6 col-sm-12 col-12">
					<div class="card">
						<div class="card-body">
							<h5 class="text-muted">Total Lab Manual</h5>
							<div class="metric-value d-inline-block">
								<h1 class="mb-1"><?php echo $n13; ?></h1>
							</div>
						</div>
					</div>
				</div>
				<div class="alert col-xl-3 col-lg-6 col-md-6 col-sm-12 col-12">
					<div class="card">
						<div class="card-body">
							<h5 class="text-muted">Total Books</h5>
							<div class="metric-value d-inline-block">
								<h1 class="mb-1"><?php echo $n14; ?></h1>
							</div>
						</div>
					</div>
				</div>
				<div class="alert col-xl-3 col-lg-6 col-md-6 col-sm-12 col-12">
					<div class="card">
						<div class="card-body">
							<h5 class="text-muted">Total Review</h5>
							<div class="metric-value d-inline-block">
								<h1 class="mb-1"><?php echo $n15; ?></h1>
							</div>
						</div>
					</div>
				</div>
				<div class="alert col-xl-3 col-lg-6 col-md-6 col-sm-12 col-12">
					<div class="card">
						<div class="card-body">
							<h5 class="text-muted">Total FAQ</h5>
							<div class="metric-value d-inline-block">
								<h1 class="mb-1"><?php echo $n16; ?></h1>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>		
	</div>
	<?php include("javascript.php") ?>
</body>
</html>