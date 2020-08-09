<?php
include("config.php");
include("check.php");
$id=$_REQUEST['id'];
if($id=="") {
	header("location:error.php");
}
$sql1="select * from notice_tbl where id='$id'";
$sr1=mysqli_query($cn,$sql1);
if(mysqli_num_rows($sr1)==0) {
	header("location:error.php");
}
else {
	$db=mysqli_fetch_array($sr1);
	$heading=$db['heading'];
	$dt=$db['date'];
}
$date=date('Y-m-d');
$year=date('Y');
if($date < "$year-06-30") {
	$year=$year-1;
}	
$year=$year-3;
$sql="select email from roca_member_tbl where year >= '$year'";
$sr=mysqli_query($cn,$sql);
if($sr==false) {
    header("location:publishnotice.php");
}
elseif(mysqli_num_rows($sr)==0) {
    header("location:publishnotice.php");
}
else {
while($db1=mysqli_fetch_array($sr))
{
	$to=$db1['email'];
	$subject='R O C A';
	$link='http://www.roca.rahul.ac.in'."\r\n";
	$message = 
		'<html><body>
		<div style="background-color: #000000; font-weight: bold; text-align: center">
			<br>
			<h1 style="color:#ff0000">Region of Cognitive Activites</h1>
			<h2 style="color:#1459C7">Event Notice</h2>
			<h3 style="color:#b8bfc1">'.$heading.'</h3>
			<p style="color:#b8bfc1">Event Date : '.$dt.'</p>
			<p style="color:#b00fbf">If you are intrested follow the below link to take part.</p>
			<p style="color:#b8bfc1">'.$link.'</p>
			<br>
		</div>
		</body></html>';

	$header = 'MINE-VERSION : 1.0' . "\r\n" .
	  'Content-type: text/html; charset=iso-8859-1' . "\r\n" .
	  'FROM: clubroca2018@gmail.com' . "\r\n" .
	  'X-Mailer: PHP/' . phpversion();

	mail($to,$subject,$message,$header);
}
$sql2="update notice_tbl set member=1 where id='$id'";
mysqli_query($cn,$sql2);
header("location:publishnotice.php");
}
?>