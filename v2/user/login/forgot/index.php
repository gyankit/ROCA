<?php
require("Forgot.class.php");
$forgot = new Forgot();
$msg="";
if($_SERVER['REQUEST_METHOD']=='POST')
{
    $id = $_POST['unique_id'];
    $email = $_POST['email'];
    
    $msg = $forgot->forgots($id, $email);
}

?>
<html lang="en">
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta content="width=device-width, initial-scale=1">
				   
	<title>R O C A</title>
				   
	<link rel="icon" href="../../../vendor/dist/img/fevicon.jpg">

	<link rel="stylesheet" href="../../../vendor/plugins/bootstrap/css/bootstrap.min.css">
	
	<link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">

	<link rel="stylesheet" href="../../../vendor/dist/css/util.css">
</head>

<body>
	<div class="container">
		
		<section id="first" class="m-t-100">
            <?php if($msg != "") { ?>
                <div class="alert alert-warning text-dark"><?= $msg; ?></div>
            <?php } ?>
            
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
		</section>
		

		<div class="back">
			<a href="../../index">Back</a>
		</div>
				
	</div>
	<script src="../../../vendor/plugins/jquery/jquery.min.js"></script>
</body>
</html>