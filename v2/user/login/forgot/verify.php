<?php
require("Forgot.class.php");
$forgot = new Forgot();
$msg="";

if( $_REQUEST['cd'] or $_REQUEST['id'] or $_REQUEST['email'] ) {
    header("location: ../../index");
}

$rcode = $_REQUEST['cd'];
$id = $_REQUEST['id'];
$email = $_REQUEST['email'];

if($_SERVER['REQUEST_METHOD']=='POST')
{
    $code = md5($_POST['code']);
    if($code === $rcode) {
        header("location:password?id=$id&email=$email");
    } else {
        $msg="Enter Code is Not Correct";
    }
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
                <p class="text-center">Open your Email.<br>Enter the code sent to your Email id.</p>
                <form role="form" class="form-submit" action="" method="post">
                    <div class="form-group">
                        <input type="text" class="form-control" name="code" placeholder="Code" required oninput="this.value = this.value.toUpperCase()" autofocus>
                    </div>
                    
                    <button class="btn btn-block btn-secondary">Proceed</button>
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