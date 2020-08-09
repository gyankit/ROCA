<?php
session_start();
include("../required/check.php");
include("Gallery.class.php");
$msg="";
$gallery = new Gallery();
$contact = $gallery->contact();

$view = $gallery->slideshows();
?>

<html lang="en">
<head>
	<?php include("../required/head.php") ?>	
</head>

<body>
	<?php include("../required/header.php"); ?>
    
    <div class="galary_slide m-t-25 m-b-25">
        <?php if(!$view) { echo "<div> SlideShow Not Available </div>"; } else { ?>
        <div id="carouselExampleControls" class="carousel slide" data-ride="carousel">
            <div class="carousel-inner">
                <div class="carousel-item active">
                    <img class="d-block w-100" src="../../vendor/dist/img/poster.jpg" alt="First slide">
                </div>
                <?php while( $data = $view->fetch_assoc() ) { ?>
                <div class="carousel-item">
                    <img class="d-block w-100" src="../../vendor/extra/events/<?= $data['gallery'] ?>" alt="No Pic">
                </div>
                <?php } ?>
            </div>
            <a class="carousel-control-prev" href="#carouselExampleControls" role="button" data-slide="prev">
                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                <span class="sr-only">Previous</span>
            </a>
            <a class="carousel-control-next" href="#carouselExampleControls" role="button" data-slide="next">
                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                <span class="sr-only">Next</span>
            </a>
        </div>
        <?php } ?>
	</div>
	
	<?php include("../required/footer.php"); ?>
	<?php include("../required/javascript.php"); ?>
</body>
</html>