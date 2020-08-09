<?php
session_start();
require("../required/check.php");
require("Home.class.php");
$msg="";

$faq = new Home();

if($_SERVER['REQUEST_METHOD']=='POST')
{
	$answer = $_POST['answer'];
	$reply = $_POST['btn'];
	$id = explode(',', $reply);
	$msg = $faq->replyquery($id[0], $id[1], $id[2], $id[3], $id[4], $answer);
	
	?><script>alert("<?php echo $msg; ?>");</script><?php
}

$view = $faq->viewquery();

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
								<h2 class="title text-white">Query Reply</h2>
							</div>		
							<!-- Main Content -->
							<div class="card-body">
				
								<?php 
								if( !$view ) { echo "No Question Ask"; } else { 
									while( $data = $view->fetch_array() ) { 
								?>	
								
								<div class="alert alert-warning">	
									<div class="alert alert-primary text-center text-danger font-weight-bold">
										<?php echo $data['name']; ?>&ensp;&ensp;<?php echo $data['date']; ?>
									</div>
									
									<div class="text-dark">
										<p><b>Topic :</b>&ensp;<?php echo $data['subject']; ?></p>
										<p><b>Question :</b>&ensp;<?php echo $data['message']; ?></p>
										
										<button class="btn-sm btn-success" type="button" data-toggle="collapse" data-target="#reply<?php echo $data['id']; ?>" aria-expanded="false" aria-controls="reply<?php echo $data['id']; ?>"> Reply </button>
										<br>
										<div class="collapse" id="reply<?php echo $data['id'] ?>">
											<form role="form" class="form-submit alert alert-primary" method="post" action="">	
												<textarea name="answer" class="form-control"></textarea><br>
												<button class="btn-lg btn-block btn-success" name="btn" value="<?php echo $data['id'],$data['name'],$data['email'],$data['subject'],$data['message']; ?>">Reply</button>
											</form>
										</div>

									</div>	
								</div>
									
								<?php } } ?>
								
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