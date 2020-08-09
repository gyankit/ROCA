<?php
	include("config.php");
	include("check.php");
	$user=$_SESSION['user'];	

	$sql="SHOW TABLES LIKE 'faq_tbl'";
	$sr=mysqli_query($cn,$sql);

	if(mysqli_num_rows($sr)==0)
	{
		$sql1="CREATE TABLE `id8469611_clubroca`.`faq_tbl` ( `id` INT(10) NOT NULL AUTO_INCREMENT , `date` DATETIME NOT NULL , `question` TEXT NOT NULL , `answer` TEXT NOT NULL , `unique_id` VARCHAR(15) NOT NULL , PRIMARY KEY (`id`))";
		$sr1=mysqli_query($cn,$sql1);
		if($sr1==false)
		{
			header("location: error.php");
		}
	}

	$msg="";

	if($_SERVER["REQUEST_METHOD"]=="POST")
	{
		$ques=$_POST['ques'];
		date_default_timezone_set("Asia/Kolkata");
		$date=date("Y-m-d h:i:s");

		$sql1="INSERT INTO faq_tbl VALUES(NULL,'$date','$ques','','$user')";
		$rs1=mysqli_query($cn,$sql1);
		if ($rs1)
		{
			$msg="Upload SuccessFull";
		}
		else
		{
			$msg="Error Occur....Try After Sometime..!!!";
		}
	}
?>

<html lang="en">
<head>
	<?php include("css.php") ?>	
	<title>R O C A</title>
</head>

<body>
	<?php include("header.php"); ?>
			
<div class="hero-wrap hero-wrap-2" style="background-attachment:fixed;">
	<div class="overlay"></div>
	<div class="container">
		<div class="row no-gutters slider-text align-items-center justify-content-center" data-scrollax-parent="true">
		<div class="col-md-8 ftco-animate text-center">
		<p class="breadcrumbs"><span class="mr-2"><a <?php if($_SESSION["user_login"]=="True") { ?> href="home.php" <?php } else { ?> href="index.php" <?php } ?>>Home</a></span> <span>FAQ</span></p>
		<h1 class="mb-3 bread">Frequently Ask Question</h1>
		</div>
		</div>
	</div>
</div>
	
	<div class="container">
		<div class="jumbotron">
			<div class="alert alert-danger">
				<form role="form" class="form-submit" method="post" action="">
					<table class="table table-borderless">
						<tbody>
							<tr>
								<td><textarea placeholder="Enter Your Question..." name="ques" class="form-control" rows="3"></textarea></td>
								<td><button class="btn btn-block btn-lg btn-info">Ask</button></td>
							</tr>
						</tbody>
					</table>
				</form>
				<div class="alert font-weight-bold text-danger text-center">
					<?php echo $msg; ?>
				</div>
			</div>
			<div class="jumbotron-fluid">
				<?php
					$sql="select * from faq_tbl where unique_id='$user' order by date DESC";
					$rs=mysqli_query($cn,$sql);
					
					if(mysqli_num_rows($rs)==0)
					{
						echo("Ask Your Question");
					}
					else
					{
						while($db=mysqli_fetch_array($rs))
						{
							$id=$db['id'];
				?>
				<div class="alert alert-dark font-weight-bold">
					<p><?php echo $db['date']; ?>&ensp;&ensp;&ensp;<a href="faqdelete.php?id=<?php echo $db['id'] ?>" class="text-danger"><b><span>x</span></b></a></p>
					<p class="text-info"><b class="text-dark">Question :</b>&ensp;<?php echo $db['question']; ?></p>
					<p class="text-danger"><b class="text-dark">Answer :</b>&ensp;<?php echo $db['answer']; ?></p>
				</div>
				<?php	
						}
					}
				?>
			</div>
			
		</div>
	</div>
	
	<div class="footer">
		<?php include("footer.php"); ?>
	</div>
	<?php include("javascript.php"); ?>
</body>
</html>