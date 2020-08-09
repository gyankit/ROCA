<?php 
session_start();
require("../required/check.php");
require("Home.class.php"); 
$msg="";
$home = new Home();
$contact = $home->contact();

if($_SERVER["REQUEST_METHOD"]=="POST")
{
    if($_POST['btn'] == "ask") {
        $ques=$_POST['ques'];
        date_default_timezone_set("Asia/Kolkata");
        $date=date("Y-m-d h:i:s");

        $error =  $home->addfaq($_SESSION['user_id'], $ques, $date);
        if($error) {
            $msg="Upload SuccessFull";
        } else {
            $msg="Error Occur....Try After Sometime..!!!";
        }
    }
    else {
        $home->deletefaq($_POST['btn']);
    }
}

$view = $home->viewfaq($_SESSION['user_id']);
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
						<p class="breadcrumbs"><span class="mr-2"><a  href="../home/home">Home</a></span> <span>FAQ</span></p>
							<h1 class="mb-3 bread">Frequentry Ask Question</h1>
					</div>
				</div>
			</div>
		</div>
		
        <div class="container m-t-40">
		<div class="jumbotron">
			<div class="alert alert-danger">
				<form role="form" class="form-submit" method="post" action="">
					<table class="table table-borderless">
						<tbody>
							<tr>
								<td><textarea placeholder="Enter Your Question..." name="ques" class="form-control" rows="3" required></textarea></td>
								<td><button class="btn btn-block btn-lg btn-info" name="btn" value="ask">Ask</button></td>
							</tr>
						</tbody>
					</table>
				</form>
				<div class="alert font-weight-bold text-danger text-center">
					<?= $msg; ?>
				</div>
			</div>
			<div class="jumbotron-fluid">
                <?php if(!$view) { echo "Ask your Question."; } else { while( $data = $view->fetch_array() ) { ?>
				<div class="alert alert-dark font-weight-bold">
					<p>
                        <?php echo $data['date']; ?>&ensp;&ensp;&ensp;
                        <form action="" method="post" class="form-submit">
                            <button type="submit" class="close" name="btn" value="<?= $data['id'] ?>">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </form>
                    </p>
					<p class="text-info"><b class="text-dark">Question :</b>&ensp;<?= $data['question']; ?></p>
					<p class="text-danger"><b class="text-dark">Answer :</b>&ensp;<?= $data['answer']; ?></p>
				</div>
				<?php } } ?>
			</div>
			
		</div>
	</div>
	
        
	</div>
	
	<?php include("../required/footer.php");?>

	<?php include("../required/javascript.php");?>
</body>
</html>