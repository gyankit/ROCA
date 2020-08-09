<?php
	include("config.php");
	$id=$_REQUEST['id'];

	$sql="SHOW TABLES LIKE 'subscriber_tbl'";
	$sr=mysqli_query($cn,$sql);

	if(mysqli_num_rows($sr)==0)
	{
		?><script>alert("No Subscriber Found..."); history.go(-1);</script><?php
	}

	$msg="";
	if($_SERVER['REQUEST_METHOD']=='POST')
	{
		$email=$_POST['email'];
		
		$email=filter_var($email, FILTER_SANITIZE_EMAIL);
		if(filter_var($email, FILTER_VALIDATE_EMAIL))
		{
			$sql="select email from subscriber_tbl where email='$email'";
			$rs=mysqli_query($cn,$sql);
			if($rs==false) {
				?>
				<script>
					alert("No Subscriber Found..."); history.go(-1);
				</script>
				<?php
			}
			else if(mysqli_num_rows($rs)==0) {
				$msg="Not a Subscriber Email\nFirst Subscribe or Newslatter.";
			}
			else {
				?><script>window.location.href = "eventregister.php?id=<?php echo $id; ?>&email=<?php echo $email; ?>"</script><?php
			}
		}
		else {
			$msg="Provide Valid Email.";
		}
	}
?>

<!DOCTYPE html>
<html lang="en">
	<head>
		<?php include("css.php"); ?>	
	</head>
	<body>
		<?php include("header.php") ?>
		<div class="container">
			<div class="jumbotron">
				<div class="alert text-center h5">
					<p>Already Subscribe Us Enter Subscriber Mail</p>
				</div>
				<form role="form" class="form-submit text-center" method="post">
					<div class="form-group">
						<input type="email" class="form-control" name="email" placeholder="Subscriber Email">
					</div>
					<button type="submit" class="btn btn-info btn-lg col-5" id="sbt-btn">Submit</button>
				</form>
				<div class="alert text-center text-danger h6"><?php echo $msg; ?></div>
			</div>
		</div>
		<?php include("footer.php"); ?>
		<?php include("javascript.php"); ?>
	</body>
</html>