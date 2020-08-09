<?php 
require("Event.class.php"); 
$home = new Event(); 

if($_REQUEST['uid']=="" or $_REQUEST['cost']=="" or $_REQUEST['event']=="" or $_REQUEST['eid']=="" )
{
    header("location:../error/404");
} else {
    $uid = $_REQUEST['uid'];
    $cost = $_REQUEST['cost'];
    $event = $_REQUEST['event'];
    $eid = $_REQUEST['eid'];
}

$view = $home->payment();

if($_SERVER['REQUEST_METHOD']=='POST')
{
    $mode=$_POST['mode'];
    $transaction=$_POST['transaction'];
    
    if($mode=="") {
        ?><script>alert("Choice valid Payment Mode");</script><?php
    }
    elseif($home->updateintrest($mode, $transaction, $uid, $eid)) {
        ?><script>
        alert("Payment Complete\nWait for Confirmation Mail");
        window.location.href= "../home/home";
        </script><?php
    }
    else {
        ?><script>
        alert("Error Occur");
        </script><?php
    }
}

$contact = $home->contact();
?>
<!doctype html>
<html>
<head>
<?php include("../required/head.php");?>
</head>
<body>
<?php include("../required/header.php");?>
	<div class="">
		
        <div class="container">
            <br><br>
            <div class="jumbotron text-center text-capitalize font-weight-bold text-danger h1">
                Payment Gateway
            </div>
            
            <div class="alert text-center font-weight-bold alert-warning h5 text-dark">
                Rs.<?= $cost; ?><br><?= $event; ?>
            </div>
            
            <div class="alert alert-success text-center font-weight-bold">
                After Payment <br> Wait for Confirmation Mail from ROCA 
            </div>
            
            <div class="alert alert-warning text-center font-weight-bold text-danger">
                If by any means this page is Closed, before the online Payment is done then you have to pay the amount (Rs.<?= $cost; ?>) to the ROCA Co-ordinators Only.
            </div>
            
            <div class="alert">
            <div class="alert alert-danger text-center">Send registration payment to the upi or scan the qr-code.<br>Share your Transaction Id with us after completing payment.<br>if you are not sharing the transaction id with us then we cant confirm your registration.</div>
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
                    <button class="btn btn-block btn-success">Share</button>
                </form>
            </div>
            
            <div class="alert alert-info">
                <?php if(!$view) { ?>
		        <script>
                    alert("No Payment Details Available"); 
                    window.location.href = "database/index";
                </script>
                <?php } else { while($data = $view->fetch_array()) { ?>
                <div class="alert alert-danger" style="height: 360px">
                    <p class="h3 text-center"><?= $data['mode']; ?> </p>
                    <?php if($data['upi'] != "") { ?>
                        <div class="alert">
                            <span class="font-weight-bold float-left">UPI :</span>
                            <i class="float-right"><?= $data['upi']; ?></i>
                        </div>
                    <?php } if($data['qr_code'] != "") { ?>
                        <div class="alert">
                            <span class="font-weight-bold float-left">Scan &amp; Pay :</span>
                            <i class="float-right"><img src="../../vendor/extra/payment/<?= $data['qr_code'];?>" height="200px"></i>
                        </div>
                    <?php } ?>
                </div>
                <?php } } ?>
            </div>
            <p><a href="javascript: history.go(-1);">Go to Previous Page</a></p>
        </div>
		
	</div>
	
	<?php include("../required/footer.php");?>
	<?php include("../required/javascript.php");?>
</body>
</html>