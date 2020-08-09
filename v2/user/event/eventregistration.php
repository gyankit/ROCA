<?php 
session_start();
require("../required/check.php");
require("Event.class.php"); 
$home = new Event(); 

if( $_REQUEST['id']=="" or $_SESSION['user_id']=="" ) {
    header("location:../../error/404");
} else {
    $id = $_REQUEST['id'];
    $user = $_SESSION['user_id'];
}

$data = $home->notice($id);
if(!$data) { header("location:../../error/400"); }

if($_SERVER['REQUEST_METHOD']=='POST')
{
    $event = $data['heading'];
    $eid = $data['id'];
    $date = date('d-m-Y');
    $cost = $data['cost'];

    $error = $home->intrest($user, $event, $date, $eid);

    if($error) {
        if($cost == 0) {
            ?><script>
                alert('Your Request for Event Participation Received.');
                window.location.href = "../home/home";
            </script><?php
        } else {
            ?><script>
                alert('Your Request for Event Participation Received. \nComplete Payment for Confirm your Participation');
                window.location.href = "payment?cost=<?= $cost; ?>&event=<?= $event; ?>&eid=<?= $eid; ?>&uid=<?= $user ?>";
            </script>
        <?php
        }
    } else {
        ?>
        <script>alert("You are already Apply."); window.location.href = "../home/home";</script>
        <?php
    }
}
	
$contact = $home->contact();
?>
<!doctype html>
<html>
<head>
<?php include("../required/head.php");?>
</head>
<body>
<?php include("../required/header.php");?>
	<div class="">
		
		<div class="hero-wrap hero-wrap-2" style="background-attachment:fixed;">
		  	<div class="overlay"></div>
			<div class="container">
				<div class="row no-gutters slider-text align-items-center justify-content-center" data-scrollax-parent="true">
					<div class="col-md-8 text-center">
						<p class="breadcrumbs"><span class="mr-2"><a  href="../home/home">Home</a></span> <span>Event</span></p>
							<h1 class="mb-3 bread">Event Registration</h1>
					</div>
				</div>
			</div>
		</div>
		
        <section class="ftco-section">
            <div class="container">
                <div class="row d-flex">
                    <div class="col-md-6 d-flex">
                        <div class="img img-about align-self-stretch" style="width: 100%; height: 500px"><img src="../../vendor/extra/notice/<?= $data['photo']; ?>" width="400px" alt="No Pic"></div>
                    </div>
                    <div class="col-md-6 pl-md-5">
                        <h2 class="mb-4 text-center text-danger font-weight-bold"><?= $data['heading']; ?></h2>
                        <div class="alert">
                            <div class="meta mb-3 font-weight-bold">
                                <div>Date : <a href="#"><?= $data['date']; ?></a></div>
                                <div>Day : <a href="#"><?= $data['day']; ?></a></div>
                                <div>Time : <a href="#"><?= $data['time']; ?></a></div>
                                <div>Venue : <a href="#"><?= $data['venue']; ?></a></div>
                            </div>
                            <div class="alert alert-secondary h5 text-center">
                                <?= $data['notice']; ?>
                            </div>
                            <div class="alert">
                                <?php if($data['requirement']!="") { ?><p>Requirement : <?= $data['requirement']; ?></p> <?php } ?>
                            </div>
                        </div>
                        <div class="alert">
                            <form role="form" class="form-submit" method="post" action="">
                            <?php if($data['cost']==0) { ?>
                                <button type="submit" class="btn btn-block btn-success">If You are Intrested to Join<br><strong class="text-dark h5">Click Here</strong></button>
                                <?php } else { ?>
                                <button type="submit" class="btn btn-block btn-success">If You are Intrested to Participate<br><strong class="text-dark h5">Click Here</strong></button>
                                <?php } ?>
                            </form>
						</div>
                    </div>
                </div>
            </div>
        </section>
        
	</div>
	
	<?php include("../required/footer.php");?>
	<?php include("../required/javascript.php");?>
</body>
</html>