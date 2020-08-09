<?php
session_start();
require("../required/check.php");
require("Home.class.php");
$msg="";

$faq = new Home();

if($_SERVER['REQUEST_METHOD']=='POST')
{
	$answer = $_POST['answer'];
	$id = $_POST['btn'];

	$msg = $faq->updatefaq($id, $answer);
}

$view = $faq->viewfaq();

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
				<div class="page-wrapper p-t-5 p-b-10">
					<div class="wrapper">
						<div class="card card-5">
							<div class="card-heading bg-info">
								<h2 class="title text-white">Frequently Ask Question</h2>
							</div>		
							<!-- Main Content -->
							<div class="card-body">

								<div class="alert text-danger text-center font-weight-bold">
									<?php echo $msg; ?>
								</div>
				
								<?php 
								if( !$view ) { echo "No Question Ask"; } else { 
									while( $data = $view->fetch_array() ) { 
										$unique_id = $data['unique_id'];
										$result = $faq->profile($unique_id);
										if(!$result) {} else {
											$data1 = $result->fetch_array();
								?>	
								
								<div class="alert alert-warning">	
									<div class="alert alert-primary text-center text-danger font-weight-bold">
										<?php echo $data1['name'] ?>&ensp;&ensp;<?php echo $data1['roll'] ?>&ensp;&ensp;<?php echo $data['date'] ?>
									</div>
									
									<div class="text-dark">
										<p><b>Question :</b>&ensp;<?php echo $data['question'] ?></p>
										
										<?php if($data['answer']==""){ ?>
										
										<button class="btn-sm btn-success" type="button" data-toggle="collapse" data-target="#reply<?php echo $data['id'] ?>" aria-expanded="false" aria-controls="reply<?php echo $data['id'] ?>"> Reply </button>
										
										<?php } else { ?>
										
										<p>
											<b>Answer :</b>
											&ensp;<?php echo $data['answer'] ?>&ensp;
											<button class="btn-sm btn-danger" type="button" data-toggle="collapse" data-target="#edit<?php echo $data['id']; ?>" aria-expanded="false" aria-controls="edit<?php echo $data['id']; ?>"> Edit </button>
										</p>
										
										<?php } ?>
										
									</div>	
									
									<div class="collapse" id="reply<?php echo $data['id'] ?>">
										<form role="form" class="form-submit alert alert-primary" method="post" action="">	
											<textarea name="answer" class="form-control" placeholder="<?php echo $data['answer']; ?>"></textarea><br>
											<button class="btn-lg btn-block btn-success" name="btn" value="<?php echo $data['id']; ?>">Reply</button>
										</form>
									</div>
									
									<div class="collapse" id="edit<?php echo $data['id']; ?>">
										<form role="form" class="form-submit alert alert-primary" method="post" action="">	
											<textarea name="answer" class="form-control" placeholder="<?php echo $data['answer']; ?>"></textarea><br>
											<button class="btn-lg btn-block btn-danger" name="btn" value="<?php echo $data['id']; ?>">Edit</button>
										</form>
									</div>
									
								</div>	
									
								<?php } } } ?>
								
							</div>
							<!-- End Main Content -->
						</div>
					</div>
				</div>
			</div>
		</div>
		<?php include("../required/footer.php"); ?>
	</div>
	<?php include("../required/javascript.php"); ?>
</body>
</html>