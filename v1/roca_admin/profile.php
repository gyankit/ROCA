<?php
	include("config.php");
	include("check.php");
	$id=$_SESSION['id'];
	$role=$_SESSION['role'];

	$sql="select * from roca_member_tbl where unique_id='$id'";
	$res=mysqli_query($cn,$sql);
	if($res)
	{
	    $db=mysqli_fetch_array($res);
	}
	else
	{
	    header("location: error.php");
	} 
?>
<html lang="en">
<head>
	<?php include("css.php"); ?>
	<title>R O C A</title>
</head>

<body>
	<div class="header">
		<?php include("header.php"); ?>
	</div>
	 
	<div class="container-fluid">
		<div class="jumbotron card-title text-capitalize text-center h2 text-danger font-weight-bold">
			Welcome to ROCA Family
		</div>
		<br><br>
		<div class="jumbotron">
		    <?php
		    if($id=="ROCA2019")
		    {
		        echo "Welcome ".$id;
		    }
		    else
		    {
		        ?>
		        <div class="alert alert-info">
    		        <div class="alert">
    					<span class="float-left">Registration Id</span><i class="float-right font-weight-bold text-dark"><?php echo $id; ?></i>
    				</div>
    				<div class="alert">
    					<span class="float-left">Name</span><i class="float-right font-weight-bold text-dark"><?php echo $db['name']; ?></i>
    				</div>
    				<div class="alert">
    					<span class="float-left">Roll No</span><i class="float-right font-weight-bold text-dark"><?php echo $db['roll']; ?></i>
    				</div>
    				<div class="alert">
    					<span class="float-left">Department</span><i class="float-right font-weight-bold text-dark">
    					<?php 
    						if ($db['department']=="CSE") { echo "Computer Science and Engineering"; } 
    						if ($db['department']=="ME") { echo "Mechanical Engineering"; } 
    						if ($db['department']=="IT") { echo "Information and Technology"; } 
    						if ($db['department']=="ECE") { echo "Electronics Engineering"; } 
    						if ($db['department']=="EE") { echo "Electrical Engineering"; } 
    						if ($db['department']=="CHE") { echo "Chemical Engineering"; } 
    					?></i>
    				</div>
        			<div class="alert">
        				<span class="float-left">Contact No</span><i class="float-right font-weight-bold text-dark"><?php echo $db['contact']; ?></i>
        			</div>
        			<div class="alert">
        				<span class="float-left">Email id</span><i class="float-right font-weight-bold text-dark"><?php echo $db['email']; ?></i>
        			</div>
        			<div class="alert">
        				<span class="float-left">ROCA Joining Date</span><i class="float-right font-weight-bold text-dark"><?php echo $db['date']; ?></i>
        			</div>
        			<div class="alert">
        				<span class="float-left">Field</span><i class="float-right font-weight-bold text-dark"><?php echo $db['field']; if($db['head']=="YES") { echo "Head"; } ?></i>
        			</div>
        			<div class="alert">
        				<img src="../images/members/<?php echo $db['photo']; ?>" alt="No Pic" width="250px">
        			</div>
                </div>		       
    			<?php
    		}
			if($role=="ADMINISTRATOR" && $id!="ROCA2019") {
    		?>
    		<div class="alert alert-danger">
    		    <p>Want to Give this site to Another</p>
    		    <button class="btn btn-danger btn-sm auto-captalize" onclick="location.href = 'verify.php';">click here</button>
    		</div>
			<?php }
			if($role=="ADMINISTRATOR" && $id=="ROCA2019") {
    		?>
    		<div class="alert alert-danger">
    		    <p>Want to Reset this Site</p>
    		    <button class="btn btn-danger btn-sm auto-captalize" onclick="location.href = 'adminreset.php';">click here</button>
    		</div>
    		<div class="alert alert-danger">
    		    <p>Want to Restart this Site</p>
    		    <button class="btn btn-danger btn-sm auto-captalize" onclick="location.href = 'adminrestart.php';">click here</button>
    		</div>
			<?php } ?>
		</div>
	</div>
	<?php include("javascript.php") ?>
</body>
</html>