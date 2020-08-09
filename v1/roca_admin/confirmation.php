<?php
include("config.php");
include("check.php");

$id=$_REQUEST['id'];
$sql="select * from roca_member_tbl where unique_id='$id'";
$sr=mysqli_query($cn,$sql);
$db=mysqli_fetch_array($sr);

$paid=$db['paid'];
$password=$db['password'];
$email=$db['email'];
$name=$db['name'];
$enpt_pass=md5($password);

if($paid=="NO")
{
	$sql2="update roca_member_tbl set paid='YES', password='$enpt_pass' where unique_id='$id'";
	if(mysqli_query($cn,$sql2))
	{
		$to=$db['email'];
			
		$subject='R O C A';
			
		$message = 
			'<html><body>
			<div style="background-color: #000000; font-weight: bold; text-align: center">
				<br>
				<h1 style="color:#ff0000">Region of Cognitive Activites</h1>
				<h2 style="color:#1459C7">Registration Confirmation</h2>
				<p style="color:#b8bfc1">'.$name.'</p>
				<p style="color:#b8bfc1">Registration Id : '.$id.'</p>
				<p style="color:#b8bfc1">Password  : '.$password.'</p>
				<p style="color:#b00fbf">You are Successfully Register.</p>
				<p style="color:#b00fbf">Use Registration id and Password for Login Purpose.</p>
				<br>
			</div>
			</body></html>';

		$header = 'MINE-VERSION : 1.0' . "\r\n" .
		  'Content-type: text/html; charset=iso-8859-1' . "\r\n" .
		  'FROM: clubroca2018@gmail.com' . "\r\n" .
		  'X-Mailer: PHP/' . phpversion();

		mail($to,$subject,$message,$header);
	}
}
header("location:viewuser.php");
?>