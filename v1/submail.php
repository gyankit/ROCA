<?php
    $email=$_REQUEST['email'];
    if($email=="") { header("location:index.php"); }
    else
    {
    	$to=$email;
    	$subject='ROCA SUBSCRIPTION MAIL';
    	$message = 
    		'<html><body>
    		<div style="background-color: #000000; font-weight: bold; text-align: center">
    			<br>
    			<h1 style="color:#ff0000">Region of Cognitive Activites</h1>
    			<h2 style="color:#1459C7">Subscription Mail</h2>
    			<p style="color:#b8bfc1">Click below for confirm your registration.</p>
    			<p style="color:#ffffff"><br><a href="http://www.roca.rahul.ac.in/subscription.php?email='.$email.'">Click Here</a></p>
    			<p style="color:#b00fbf">Kindly follow all the Procedure.</p>
    			<br>
    		</div>
    		</body></html>';
    
    	$header = 'MINE-VERSION : 1.0' . "\r\n" .
    	  'Content-type: text/html; charset=iso-8859-1' . "\r\n" .
    	  'FROM: clubroca2018@gmail.com' . "\r\n" .
    	  'X-Mailer: PHP/' . phpversion();
    
    	mail($to,$subject,$message,$header);
    }
?>
<script>
    alert("Subsciption Mail Sent to you Email id...");
    window.location.href = "index.php";
</script>