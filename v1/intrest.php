<?php
    include("config.php");
    include("check.php");
    $user=$_SESSION['user'];
    
	$eid=$_REQUEST['eid'];
    $id=$_REQUEST['id'];
	$cost=$_REQUEST['ct'];
	$event=$_REQUEST['db'];
	$event_date=$_REQUEST['date'];
    
    if($id=="") {
        header("location: error.php");
    }
    
	$sql="SHOW TABLES LIKE 'intrest_tbl'";
    $sr=mysqli_query($cn,$sql);
    
    //if not then create
    if(mysqli_num_rows($sr)==0)
    {
		$sql1="CREATE TABLE `id8469611_clubroca`.`intrest_tbl` (
		`id` INT(3) NOT NULL,
		`unique_id` VARCHAR(15) NOT NULL ,
		`date` VARCHAR(10) NOT NULL ,
		`event` VARCHAR(500) NOT NULL ,
		`paid` VARCHAR(3) NOT NULL ,
		`mode` VARCHAR(30) NOT NULL ,
		`transaction` VARCHAR(30) NOT NULL ,
		PRIMARY KEY (`unique_id`,`event`)
		)";
    	$sr1=mysqli_query($cn,$sql1);
	}
	
	$date=date('d-m-Y');
	$paid="NO";

	$sql3="INSERT INTO intrest_tbl VALUES('$eid', '$id', '$date', '$event','$paid','','')";
	$sr3=mysqli_query($cn,$sql3);
	if($sr3)
	{
		if($cost==0)
		{
			?>
			<script>
				alert('Your Request for Event Participation Received.');
				window.location.href = "events.php";
			</script>
			<?php	
		}
		else
		{
			?>
			<script>
				alert('Your Request for Event Participation Received. \nComplete Payment for Confirm your Participation');
				window.location.href = "payment.php?cost=<?php echo $cost; ?>&event=<?php echo $event; ?>&eid=<?php echo $eid; ?>&page=event&uid=<?php echo $id; ?>&email=";
			</script>
			<?php
		}
	}
	else
	{
		?>
		<script>alert("We already receive 1 Request from you"); history.go(-1);</script>
		<?php
	}
?>