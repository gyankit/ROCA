<?php
	include("config.php");
	if(!isset($_SESSION['user_login']))
    {
        header("location:index.php");
    }
	
	$msg="";
	if($_SERVER['REQUEST_METHOD']=='POST')
	{
		$id=$_POST['unique_id'];
		$u_id=md5($id);
		$email=$_POST['email'];
		
		$sql1="select * from roca_member_tbl where unique_id='$id' and email='$email' and paid='YES'";
		$sr1=mysqli_query($cn,$sql1);
		if($sr1)
		{
			if(mysqli_num_rows($sr1)==0)
			{
			    $msg="Registration Id and Email Id not Found";
			}
			else
    		{
    			$to=$email;
				
				$subject='Password Change';
				
				$rand=mt_rand(000001, 999999);
				
				$message = 
					'<html><body>
					<div style="background-color: #000000; font-weight: bold; text-align: center">
						<br>
						<h1 style="color:#ff0000">Region of Cognitive Activites</h1>
						<p style="color:#b8bfc1">As per your Request form Password Change for your ROCA Account.<br>Your OTP '.$rand.'<br>Copy & Paste or Enter this Code on the Website Page for Proceed further.<br><br>This OTP is valid for 30 Sec only.<br><br>If this is not You, Please Contact ROCA Team.</p>
						<p style="color:#b00fbf">Kindly follow all the Procedure.</p>
						<br>
					</div>
					</body></html>';
				
				$header = 'MINE-VERSION : 1.0' . "\r\n" .
				  'Content-type: text/html; charset=iso-8859-1' . "\r\n" .
				  'FROM: clubroca2018@gmail.com' . "\r\n" .
				  'X-Mailer: PHP/' . phpversion();
				
				if(mail($to,$subject,$message,$header))
				{
					$enpt_rand=md5($rand);
					?>
					<script>window.location.href = "forgot2.php?id=<?php echo $id; ?>&cd=<?php echo $enpt_rand; ?>&email=<?php echo $email; ?>";</script>
					<?php
				}
    		}
		}
		else
		{
			$msg="Error Occur...";
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
			<p class="text-center">Enter your Registration number along with your Email id.<br>or<br>If your email not exist then contect admin for help<br>We are happy to help you.</p>
			<form role="form" class="form-submit" action="" method="post">
				<div class="form-group">
					<input type="text" class="form-control" name="unique_id" placeholder="Registration Id" required oninput="this.value = this.value.toUpperCase()" autofocus>
				</div>
				<div class="form-group">
					<input type="email" class="form-control" name="email" placeholder="Email id" required>
				</div>
				
				<button class="btn btn-block btn-danger">Proceed</button>
			</form>
		</div>
				
	</div>
	<?php include("javascript.php"); ?>
	
</body>
</html>