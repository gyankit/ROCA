<?php
	include("config.php");
	if(!isset($_SESSION['user_login']))
    {
        header("location:index.php");
    }
	
	$rand_code=$_REQUEST['cd'];
	$id=$_REQUEST['id'];
	$email=$_REQUEST['email'];
		
	$msg="";
	if($_SERVER['REQUEST_METHOD']=='POST')
	{		
		$code=$_POST['code'];
		$enpt_code=md5($code);

		if($enpt_code==$rand_code)
		{
			?>
			<script>window.location.href = "forgot3.php?id=<?php echo $id; ?>&email=<?php echo $email; ?>";</script>
			<?php
		}
		else
		{
			$msg="Enter Code is Not Correct";
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
	<div class="container">
		
		<div class="alert alert-warning">
			<?php echo $msg; ?>
		</div>
		
		<div class="jumbotron">
			<p class="text-center">Open your Email.<br>Enter the code sent to your Email id.</p>
			<form role="form" class="form-submit" action="" method="post">
				<div class="form-group">
					<input type="text" class="form-control" name="code" placeholder="Code" required oninput="this.value = this.value.toUpperCase()" autofocus>
				</div>
				
				<button class="btn btn-block btn-secondary">Proceed</button>
			</form>
		</div>
				
	</div>
	<?php include("javascript.php"); ?>
</body>
</html>