<?php 
session_start();
require("../required/check.php");
require("Home.class.php"); 
$home = new Home();
$contact = $home->contact();
$view = $home->viewreview();
$data3 = $home->profile($_SESSION['user_id']);

if($_SERVER["REQUEST_METHOD"]=="POST")
{
    $topic = $_POST['topic'];
    $views = $_POST['view'];
    date_default_timezone_set("Asia/Kolkata");
    $date = date("Y-m-d h:i:s");

    if( !$home->addreview($_SESSION['user_id'], $topic, $views, $date) ) {
        ?><script>alert("Error Occur...");</script><?php
    }
}

$view = $home->viewreview();
$data3 = $home->profile($_SESSION['user_id']);
?>
<!doctype html>
<html>
<head>
	<?php include("../required/head.php"); ?>
</head>
<body>
	<?php include("../required/header.php");?>
	

	<div class="">
	
	    <div class="hero-wrap hero-wrap-2" style="background-attachment:fixed;">
		  	<div class="overlay"></div>
			<div class="container">
				<div class="row no-gutters slider-text align-items-center justify-content-center" data-scrollax-parent="true">
					<div class="col-md-8 text-center">
						<p class="breadcrumbs"><span class="mr-2"><a  href="../home/home">Home</a></span> <span>Review</span></p>
							<h1 class="mb-3 bread">Review</h1>
					</div>
				</div>
			</div>
        </div>
        
        <div class="alert text-center">
            <button type="button" class="btn btn-danger col-6" data-toggle="modal" data-target="#exampleModalCenter">Add Review</button>
        </div>
        
        
        <section class="ftco-section testimony-section">
            <div class="container">
      	        <div class="row justify-content-center mb-5 pb-3">
                    <div class="col-md-7 heading-section text-center">
                        <h2 class="mb-4">What Our Student Says</h2>
                    </div>
                </div>

                <?php if(!$view) { echo "No Review"; } else { ?>  

                <div class="row">
        	        <div class="col-md-12">
                        <div class="carousel-testimony owl-carousel">
                            <div class="row">
                            <?php 
                            while ($data = $view->fetch_array()) {
                                $id = $data['unique_id'];
                                $data1 = $home->profile($id);
                            ?>
                                <div class="col-lg-4 mb-sm-4">
                                    <div class="staff">
                                        <div class="d-flex mb-4">
                                            <div class="img" style="background-image: url(../../vendor/extra/members/<?= $data1['photo']; ?>);"></div>
                                            <div class="info ml-4">
                                                <h3><?= $data1['name']; ?></h3>
                                                <span class="position"><?= $data1['department']." Department"; ?></span>
                                            </div>
                                        </div>
                                        <div class="text">
                                            <h4><?= $data['topic']; ?></h4>
                                            <p><?= $data['comment']; ?></p>
                                        </div>
                                    </div>
                                </div>
                            <?php } ?>
                            </div>
                        </div>
                    </div>
                </div>
            <?php } ?>
            </div>
        </section>
	    <div class="alert text-center">
            <button type="button" class="btn btn-danger col-6" data-toggle="modal" data-target="#exampleModalCenter">Add Review</button>
        </div>
	
        <!-- Modal -->
        <div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLongTitle">Review Form</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <form role="form" class="form-submit alert alert-warning" method="post" action="">
                            <table class="table table-borderless">
                                <tbody class="text-center">
                                    <tr>
                                        <td><label for="name"><strong class="admin_label text-left">Name :</strong></label></td>
                                        <td><input type="text" class="form-control" value="<?= $data3['name']; ?>" readonly></td>
                                    </tr>
                                    <tr>
                                        <td><label for="roll"><strong class="admin_label text-left">Roll No :</strong></label></td>
                                        <td><input type="text" class="form-control" value="<?= $data3['roll']; ?>" readonly></td>
                                    </tr>
                                    <tr>
                                        <td><label for="topic"><strong class="admin_label text-left">Topic :</strong></label></td>
                                        <td><input type="text" class="form-control" name="topic" placeholder="Regarding which Topic" required></td>
                                    </tr>
                                    <tr>
                                        <td><label for="comment"><strong class="admin_label text-left">Review :</strong></label></td>
                                        <td><textarea placeholder="Your Views" name="view" class="form-control" rows="5" style="font-size: 12px"></textarea></td>
                                    </tr>
                                </tbody>	
                            </table>
                            <button class="btn btn-block btn-info">SUBMIT</button>	
                        </form>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        <button type="button" class="btn btn-primary">Submit</button>
                    </div>
                </div>
            </div>
        </div>
        
	</div>
	
	<?php include("../required/footer.php");?>

	<?php include("../required/javascript.php");?>
</body>
</html>