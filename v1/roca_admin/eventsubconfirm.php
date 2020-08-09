<?php
include("config.php");
include("check.php");
$email=$_REQUEST['email'];
$event=$_REQUEST['event'];
$eid=$_REQUEST['eid'];
$name=$_REQUEST['name'];
$roll=$_REQUEST['roll'];

if($email=="" or $event=="")
{
	header("location:index.php");
}
else
{
	$sql="select * from subscriber_tbl where email='$email'";
	$rs=mysqli_query($cn,$sql);
	if($rs)
	{
		if(mysqli_num_rows($rs)==1)
		{
			$db=mysqli_fetch_array($rs);

			$to=$db['email'];
			
			$subject='R O C A';
			
			$message = 
				'<html><body>
				<div style="background-color: #000000; font-weight: bold; text-align: center">
					<br>
					<h1 style="color:#ff0000">Region of Cognitive Activites</h1>
					<h2 style="color:#1459C7">'.$event.'</h2>
					<p style="color:#b8bfc1">'.$name.'</p>
					<p style="color:#b8bfc1">'.$roll.'</p>
					<p style="color:#b00fbf">You are Successfully Register.</p>
					<p style="color:#b00fbf">All the Best for your Success.</p>
					<br>
				</div>
				</body></html>';
			
			$header = 'MINE-VERSION : 1.0' . "\r\n" .
			  'Content-type: text/html; charset=iso-8859-1' . "\r\n" .
			  'FROM: clubroca2018@gmail.com' . "\r\n" .
			  'X-Mailer: PHP/' . phpversion();
			
			if(mail($to,$subject,$message,$header))
			{
				$sql1="update participation_tbl set paid='YES' where email='$email' and id='$eid'";
				if(mysqli_query($cn,$sql1)) {
				    header("location:subscriberuppart.php");
				}
			}
		}
	}
}
header("location:subcriberuppart.php");
?>