<?php 
require("Home.class.php"); 
$home = new Home(); 

if($_REQUEST['id']=="") {
    header("location:../error/404");
} else {
    $id = $_REQUEST['id'];
}

if($_SERVER['REQUEST_METHOD']=='POST')
{
    $email=$_POST['email'];
    $home->verifysubs($email, $id);
}
	

$contact = $home->contact();
?>
<!doctype html>
<html>
<head>
<?php include("head.php");?>
</head>
<body>
<?php include("header.php");?>
	<div class="">
		
		<div class="hero-wrap hero-wrap-2" style="background-attachment:fixed;">
		  	<div class="overlay"></div>
			<div class="container">
				<div class="row no-gutters slider-text align-items-center justify-content-center" data-scrollax-parent="true">
					<div class="col-md-8 text-center">
						<p class="breadcrumbs"><span class="mr-2"><a  href="index">Home</a></span> <span>Event</span></p>
							<h1 class="mb-3 bread">Event Registration</h1>
					</div>
				</div>
			</div>
		</div>
		
		<div class="container-fluid">
			<div class="jumbotron">
				<div class="alert text-center h5">
					<p>Already a ROCA Member</p>
					<button class="btn btn-primary text-center" onClick="location.href = 'login/login';">Click Here</button>
				</div>
				<div class="alert text-center h5">
					<p>Not a ROCA Member<br>First Subscribe our Newsletter below</p>
                    <p>Already Subscribed?</p>
                    <button class="btn btn-primary text-center" type="button" data-toggle="collapse" data-target="#form" aria-expanded="false" aria-controls="form">Click Here</button>
                    <div class="collapse m-t-10 " id="form">
                        <form role="form" class="form-submit text-center alert bg-danger" method="post" action="">
                            <div class="form-group">
                                <input type="email" class="form-control" name="email" placeholder="Subscriber Email">
                            </div>
                            <button type="submit" class="btn btn-info btn-lg" id="sbt-btn">Submit</button>
                        </form>
                    </div>
				</div>
			</div>
		</div>
		
	</div>
	
	<?php include("footer.php");?>
	<?php include("javascript.php");?>
</body>
</html>