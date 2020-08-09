<?php 
	include("config.php");
	include("check.php");

	$date=date('d-m-Y');

	$msg="";
	if($_SERVER['REQUEST_METHOD']=='POST')
	{
		$mode=$_POST['mode'];
		$event=$_POST['event'];
		$sub=$_POST['subject'];
		$msg=$_POST['message'];
		$reciver=$_POST['reciver'];
		
		if($mode=="sms")
		{
			if($reciver=="All") {
				$msg="This Service Not for Subscribers...";
			}
			else {
			    $sql1="select id from notice_tbl where heading='$event'";
    			$sr1=mysqli_query($cn,$sql1);
    			$db1=mysqli_fetch_array($sr1);
    			$id=$db1['id'];
			    
				$sql2="select unique_id from intrest_tbl where id='$id'";
				$sr2=mysqli_query($cn,$sql2);
				if($sr2==false) {
					$msg="No Event Registration Found...";
				}
				elseif(mysqli_num_rows($sr2)==0) {
					$msg="No Event Registration Found...";
				}
				else {
					while($db2=mysqli_fetch_array($sr2)) {
						$uid=$db2['unique_id'];
						$sql3="select contact from roca_member_tbl where unique_id='$uid'";
						$sr3=mysqli_query($cn,$sql3);
						$db3=mysqli_fetch_array($sr3);
						$contact=$db3['contact'];
						
						$to=$contact.'@vtext.com';

						$subject='R O C A';

						$message ='Region of Cognitive Activities';
						$message .= $event."\n\n";
						$message .= $sub."\n\n";
						$message .= $msg."\n";
						
						$header = 'From : rocaclub2019@gamil.com';
						
						if(mail($to,$subject,$message,$header)) {
							$msg="SMS Send Successfully...";
						}
						else {
							$msg="Error Occur...";
						}						
					}
				}
			}
		}
		else
		{
			$sql1="select id from notice_tbl where heading='$event'";
			$sr1=mysqli_query($cn,$sql1);
			$db1=mysqli_fetch_array($sr1);
			$id=$db1['id'];
			
			if($reciver=="Member") {
				$sql2="select unique_id from intrest_tbl where id='$id'";
				$sr2=mysqli_query($cn,$sql2);
				if($sr2==false) {
					$msg="No Event Registration Found...";
				}
				elseif(mysqli_num_rows($sr2)==0) {
					$msg="No Event Registration Found...";
				}
				else {
					while($db2=mysqli_fetch_array($sr2)) {
						$uid=$db2['unique_id'];
						$sql3="select * from roca_member_tbl where unique_id='$uid'";
						$sr3=mysqli_query($cn,$sql3);
						$db3=mysqli_fetch_array($sr3);
						
						$to=$db3['email'];
						$name=$db3['name'];
						$roll=$db3['roll'];

						$subject='R O C A';

						$message = 
							'<html><body>
							<div style="background-color: #000000; font-weight: bold; text-align: center">
								<br>
								<h1 style="color:#ff0000">Region of Cognitive Activites</h1>
								<h2 style="color:#1459C7">'.$event.'</h2>
								<p style="color:#b00fbf">'.$name.'&ensp;&ensp;'.$roll.'</p>
								<h3 style="color:#1459C7">'.$sub.'</h3>
								<p style="color:#b8bfc1">'.$msg.'</p>
								<br>
							</div>
							</body></html>';

						$header = 'MINE-VERSION : 1.0' . "\r\n" .
						  'Content-type: text/html; charset=iso-8859-1' . "\r\n" .
						  'FROM: clubroca2018@gmail.com' . "\r\n" .
						  'X-Mailer: PHP/' . phpversion();

						if(mail($to,$subject,$message,$header)) {
							$msg="Email Send Successfully...";
						}
						else {
							$msg="Error Occur...";
						}
					}
				}
			}
			else {
				$sql2="select * from participation_tbl where id='$id'";
				$sr2=mysqli_query($cn,$sql2);
				if($sr2==false) {
					$msg="No Event Registration Found...";
				}
				elseif(mysqli_num_rows($sr2)==0) {
					$msg="No Event Registration Found...";
				}
				else {
					while($db2=mysqli_fetch_array($sr2)) {
						$name=$db2['name'];
						$roll=$db2['roll'];
						
						$to=$db2['email'];

						$subject='R O C A';

						$message = 
							'<html><body>
							<div style="background-color: #000000; font-weight: bold; text-align: center">
								<br>
								<h1 style="color:#ff0000">Region of Cognitive Activites</h1>
								<h2 style="color:#1459C7">'.$event.'</h2>
								<p style="color:#b00fbf">'.$name.'&ensp;&ensp;'.$roll.'</p>
								<h3 style="color:#1459C7">'.$sub.'</h3>
								<p style="color:#b8bfc1">'.$msg.'</p>
								<br>
							</div>
							</body></html>';

						$header = 'MINE-VERSION : 1.0' . "\r\n" .
						  'Content-type: text/html; charset=iso-8859-1' . "\r\n" .
						  'FROM: clubroca2018@gmail.com' . "\r\n" .
						  'X-Mailer: PHP/' . phpversion();

						if(mail($to,$subject,$message,$header)) {
							$msg="Email Send Successfully...";
						}
						else {
							$msg="Error Occur...";
						}
					}			
				}
			}
		}
	}
?>

<html lang="en">
<head>
	<?php include("css.php"); ?>
	<title>R O C A</title>
	<link rel="stylesheet" href="../css/preview.css">
</head>
	
<body>
	<div class="header">
		<?php include("header.php"); ?>
	</div>
	<div class="container">
		<div class="jumbotron">
			<div class="card-title text-capitalize text-center h2">
				Message
			</div>
			<div class="alert text-danger text-center font-weight-bold">
				<?php echo $msg; ?>
			</div>
			<form role="form" class="form-submit" method="post" action="" enctype="multipart/form-data">
				<div class="form-group">
					<label for="Mode"><strong class="admin_label text-left">Send Info using : </strong></label>
					<select name="mode" class="form-control" required>
						<option value="email">Email</option>
						<option value="sms">SMS</option>
					</select>
				</div>
				<div class="form-group">
					<label for="Event"><strong class="admin_label text-left">Event :</strong></label>
					<select name="event" class="form-control" required>
						<option value="">Select</option>
						<?php 
						$sql="select DISTINCT heading from notice_tbl where date >= '$date'"; 
						$sr=mysqli_query($cn,$sql);
						if($sr==false) {
							?><script>alert("No Upcomming Event Found..."); //history.go(-1);</script><?php
						}
						elseif(mysqli_num_rows($sr)==0) {
							?><script>alert("No Upcomming Event Found..."); //history.go(-1);</script><?php
						}
						else {
							while($db=mysqli_fetch_array($sr)) {
								?><option value="<?php echo $db['heading']; ?>"><?php echo $db['heading']; ?></option><?php
							}
						}
						?>
					</select>
				</div>
				<div class="form-group">
					<label for="reciver"><strong class="admin_label text-left">Reciver : </strong></label>
					<select name="reciver" class="form-control" required>
						<option value="Member">ROCA Members</option>
						<option value="All">Subscribers</option>
					</select>
				</div>
				<div class="form-group">
					<label for="Subject"><strong class="admin_label text-left">Subject :</strong></label>
					<input type="text" class="form-control" name="subject" placeholder="Subject" required>		
				</div>
				<div class="form-group">
					<label for="Message"><strong class="admin_label text-left">Message:</strong></label>
					<textarea name="message" class="form-control" rows="5" placeholder="Message..."></textarea>
				</div>
				<button class="btn btn-info btn-lg" id="sbt_btn">Submit</button>
			</form>
		</div>
	</div>
	<?php include("javascript.php"); ?>
</body>
</html>