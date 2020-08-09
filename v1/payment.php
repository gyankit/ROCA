<?php
	include("config.php");
	
	$email=$_REQUEST['email'];
	$rid=$_REQUEST['uid'];
	if($email=="" and $rid=="") {
	    header("location:error.php");
	}
	
	$page=$_REQUEST['page'];
	if($page=="register") {
	    $sql="SHOW TABLES LIKE 'member_register_tbl'";
    	$sr=mysqli_query($cn,$sql);
    	if(mysqli_num_rows($sr)==0)
    	{
    		$sql1="CREATE TABLE `id8469611_clubroca`.`member_register_tbl` (
    		`unique_id` VARCHAR(15) NOT NULL ,
    		`mode` VARCHAR(30) NOT NULL ,
    		`transaction` VARCHAR(30) NOT NULL ,
    		PRIMARY KEY (`unique_id`)
    		)";
        	$sr1=mysqli_query($cn,$sql1);
        	if(!$sr1) {
        	    header("location:error.php");
        	}
    	}
	}
	
	if(!isset($_SESSION['user_login']))
    {
        header("location:index.php");
    }

	$cost=$_REQUEST['cost'];
	$event=$_REQUEST['event'];
	$eid=$_REQUEST['eid'];
	if($cost=="" or $event=="")
	{
		header("location:error.php");
	}

	$sql="SHOW TABLES LIKE 'payment_tbl'";
	$sr=mysqli_query($cn,$sql);

	if(mysqli_num_rows($sr)==0)
	{
		header("location: error.php");
	}

	$sql="select * from payment_tbl";
	$rs=mysqli_query($cn,$sql);

	if($rs==false)
	{
		?>
		<script>alert("No Payment Details Available"); window.location.href = "index.php"</script>
		<?php
	}
	
	if($_SERVER['REQUEST_METHOD']=='POST')
	{
	    $mode=$_POST['mode'];
	    $transaction=$_POST['transaction'];
	    
	    if($mode=="") {
	        ?><script>alert("Choice valid Payment Mode");</script><?php
	    }
	    else {
	    if($page=="event") {
    	    if($email != "") {
    	        $sql1="update participation_tbl set mode='$mode', transaction='$transaction' where email='$email' and id='$eid'";
    	        $rsq=mysqli_query($cn,$sql1);
    	        if($rs==true) {
    	            ?><script>
    	            alert("Payment Complete\nWait for Confirmation Mail");
    	            window.location.href= "index.php";
    	            </script><?php
    	        }
    	    }
    	    elseif($rid != ""){
    	        $sql1="update intrest_tbl set mode='$mode', transaction='$transaction' where unique_id='$rid'";
    	        $rsq=mysqli_query($cn,$sql1);
    	        if($rs==true) {
    	            ?><script>
    	            alert("Payment Complete\nWait for Confirmation Mail");
    	            window.location.href= "home.php";
    	            </script><?php
    	        }
    	    }
	    }
	    elseif($page=="register") {
	        $sql1="insert into member_register_tbl values('$rid','$mode','$transaction')";
	        $rsq=mysqli_query($cn,$sql1);
	        if($rs==true) {
	            ?><script>
	            alert("Payment Complete\nWait for Confirmation Mail");
	            //window.location.href= "index.php";
	            </script><?php
	        }
	    }
	    else {
	        ?><script>//window.location.href= "error.php";</script><?php
	    }
	    }
	}

?>

<html lang="en">
<head>
    <?php include("css.php"); ?>
	<title>R O C A</title>
</head>
	
<body>
	<div class="header">
		<?php include("header.php") ?>
	</div>
	<div class="container">
		<br><br>
		<div class="jumbotron text-center text-capitalize font-weight-bold text-danger h1">
			Payment Gateway
		</div>
		
		<div class="alert text-center font-weight-bold alert-warning h5 text-dark">
			Rs.<?php echo $cost; ?><br><?php echo $event; ?>
		</div>
		
		<div class="alert alert-success text-center font-weight-bold">
			After Payment <br> Wait for Confirmation Mail from ROCA 
		</div>
		
		<div class="alert alert-warning text-center font-weight-bold text-danger">
		    If by any means this page is Closed, before the online Payment is done then you have to pay the amount (Rs.<?php echo $cost; ?>) to the ROCA Co-ordinators Only.
		</div>
		
		<div class="alert">
		    <form role="form" class="form-submit" method="post" action="">
				<div class="form-group">
					<select name="mode" class="form-control">
					    <option value="">Payment Mode</option>
						<option value="Paytm">Paytm</option>
						<option value="Google Pay">Google Pay</option>
						<option value="PhonePe">PhonePe</option>
						<option value="MobiKwik">MobiKwik</option>
						<option value="FreeCharge">FreeCharge</option>
					</select>
				</div>
				<div class="form-group">
					<input type="text" class="form-control" name="transaction" placeholder="Transaction Id" required>
				</div>
				<button class="btn btn-block btn-success">Submit</button>
			</form>
		</div>
		
		<div class="alert alert-info">
			<?php
			if(mysqli_num_rows($rs)!=0)
			{
				while($db=mysqli_fetch_array($rs))
				{
					?>
					<div class="alert alert-danger" style="height: 360px">
						<p class="h3 text-center"><?php echo $db['mode']; ?> </p>
						<?php if($db['upi'] != "") { ?>
							<div class="alert">
								<span class="font-weight-bold float-left">UPI :</span>
								<i class="float-right"><?php echo $db['upi']; ?></i>
							</div>
						<?php } if($db['qr_code'] != "") { ?>
							<div class="alert">
								<span class="font-weight-bold float-left">Scan &amp; Pay :</span>
								<i class="float-right"><img src="images/payment/<?php echo $db['qr_code'];?>" height="200px"></i>
							</div>
						<?php } ?>
					</div>
					<?php
				}
			}
			?>
		</div>
		<p><a href="javascript: history.go(-1);">Go to Previous Page</a></p>
	</div>
	<div class="footer">
		<?php include("footer.php") ?>
	</div>
	<?php include("javascript.php"); ?>
</body>
</html>