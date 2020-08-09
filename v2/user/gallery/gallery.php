<?php
session_start();
include("../required/check.php");
include("Gallery.class.php");
$msg="";
$gallery = new Gallery();
$contact = $gallery->contact();
$view1 = $gallery->events("event");
$view2 = $gallery->events("year(date)");

$year = date('Y');
$ev = $view1->fetch_array();
$event = $ev['event'];

if($_SERVER["REQUEST_METHOD"]=="POST")
{
    $year = $_POST['year'];
    $event = $_POST['event'];
}

$view3 = $gallery->viewevents($event, $year);
?>

<html lang="en">
<head>
	<?php include("../required/head.php") ?>	
</head>

<body>
	<?php include("../required/header.php"); ?>
	
	<div class="hero-wrap hero-wrap-2" style="background-attachment:fixed;">
		<div class="overlay"></div>
		<div class="container">
			<div class="row no-gutters slider-text align-items-center justify-content-center" data-scrollax-parent="true">
				<div class="col-md-8 text-center">
					<p class="breadcrumbs"><span class="mr-2"><a  href="../home/home">Home</a></span> <span>Gallery</span></p>
						<h1 class="mb-3 bread">Events Gallery</h1>
				</div>
			</div>
		</div>
	</div>


	<div class="container-fluid">
		<div class="jumbotron">
            <div class="m-b-20">
                <button class="btn btn-block btn-danger" onclick="location.href='slideshow'">Slide Show</button>
            </div>
			<div class="alert alert-dark">
				<form role="form" class="form-submit" method="post" action="">
					<table class="table table-borderless">
						<tbody>
							<tr>
								<td>
									<select name="event" class="form-control">
										<option value="">Select Event</option>
										<?php while( $data1 = $view1->fetch_array() ) { ?>
                                        <option value="<?= $data1['event']; ?>"><?= $data1['event']; ?></option>
                                        <?php } ?>
									</select>
								</td>
								<td>
									<select name="year" class="form-control">
										<option value="">Select Year</option>
										<?php while( $data2 = $view2->fetch_array() ) { ?>
										<option value="<?= $data2['year(date)']; ?>"><?= $data2['year(date)']; ?></option>
										<?php } ?>
									</select>
								</td>
							</tr>
						</tbody>
					</table>
					<button class="btn btn-block btn-info">Search</button>
				</form>
			</div>
			
			<div class="jumbotron-fluid">
				<div class="alert alert-secondary font-weight-bold h5 text-center">
					<?= $event." ".$year ?>
				</div>
				<div class="alert text-danger text-center font-weight-bold">
					<?= $msg; ?>
				</div>
				<?php
					if(!$view3) { 
                        $msg="Event Pic not Available"; 
                    } else {
						while( $data3 = $view3->fetch_array() ) {
                            $view = $gallery->picture($data3['id']);
							if(!$view) { 
                                $msg="Event Pic not Available"; 
                            } else {
							?>
				<div class="alert">
                    <div class="row">
                    <?php while( $data = $view->fetch_array() ) { ?>
                        <div class="col-lg-4 mb-sm-4">
                            <img src="../../vendor/extra/events/<?= $data['gallery']; ?>" width="350px" alt="No Pic">
                        </div>
                    <?php } ?>
                    </div>
				</div>
				<?php } } } ?>
			</div>
		</div>
	</div>
	
	<?php include("../required/footer.php"); ?>
	<?php include("../required/javascript.php"); ?>
</body>
</html>