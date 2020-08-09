<?php 
	include("config.php");
	if(!isset($_SESSION['user_login']))
    {
        header("location:index.php");
    }	

	$sql1="SHOW TABLES LIKE 'registration_tbl'";
	$sr1=mysqli_query($cn,$sql1);
	
	if(mysqli_num_rows($sr1)==0)
	{
		?>
		<script>alert("Registration Process is Closed \nPlease Contact ROCA Team for Any Query."); history.go(-1);</script>
		<?php
	}
	else
	{
		$sql7="select amount from registration_tbl";
		$sr7=mysqli_query($cn,$sql7);
		$db=mysqli_fetch_array($sr7);
		$amount=$db['amount'];
	}


	$sql4="SHOW TABLES LIKE 'roca_member_tbl'";
    $sr4=mysqli_query($cn,$sql4);
    
    //if not then create
    if(mysqli_num_rows($sr4)==0)
    {
    	$sql5="CREATE TABLE `id8469611_clubroca`.`roca_member_tbl` (
		`id` INT(10) NOT NULL AUTO_INCREMENT ,
		`unique_id` VARCHAR(15) NOT NULL ,
		`name` VARCHAR(50) NOT NULL ,
		`roll` VARCHAR(10) NOT NULL ,
		`department` VARCHAR(10) NOT NULL ,
		`contact` VARCHAR(10) NOT NULL ,
		`email` VARCHAR(50) NOT NULL ,
		`date` VARCHAR(10) NOT NULL ,
		`year` VARCHAR(4) NOT NULL
		`coordinator` VARCHAR(3) NOT NULL ,
		`field` VARCHAR(50) NOT NULL ,
		`head` VARCHAR(3) NOT NULL ,
		`photo` VARCHAR(500) NOT NULL ,
		`password` VARCHAR(50) NOT NULL ,
		`paid` VARCHAR(3) NOT NULL ,
		PRIMARY KEY (`id`),
		UNIQUE (`unique_id`),
		UNIQUE (`roll`),
		UNIQUE (`email`)
		)";
    	$sr5=mysqli_query($cn,$sql5);
    
    	if($sr5==false)
    	{
    	    header("location: error.php");
    	}
    }

	$msg="Welcome to Our Family";
	if($_SERVER['REQUEST_METHOD']=='POST')
	{
		$name=$_POST['name'];
		$roll=$_POST['roll'];
		$dept=$_POST['department'];
		$contact=$_POST['contact'];
		$email=$_POST['email'];
		$date=$_POST['date'];
		$year=$_POST['year'];
		$password=$_POST['password'];

		$reg=array("ROCA","$year","$dept",substr($roll,6));
		$unique_id = join("",$reg);

		$fil=$_FILES['fil'];
		
		$email=filter_var($email, FILTER_SANITIZE_EMAIL);
		if(filter_var($email, FILTER_VALIDATE_EMAIL))
		{
			$fname=$fil['name'];
			$old=$fil['tmp_name'];
			$new="images/members/".$fname;
			move_uploaded_file($old,$new);

			$sql5="insert into roca_member_tbl values(NULL, '$unique_id', '$name', '$roll', '$dept', '$contact', '$email', '$date', '$year' , 'NO' , 'Not Specified' , 'NO' , '$fname' , '$password', 'NO')";
			$rs1=mysqli_query($cn,$sql5);
			if(!$rs1)
			{
				$msg="Details Already Exist...";
			}
			else
			{
				$to='clubroca2018@gmail.com';

				$subject='REQUEST MAIL';

				$message = 
					'<html><body>
					<div style="background-color: #000000; font-weight: bold; text-align: center">
						<br>
						<h1 style="color:#ff0000">Region of Cognitive Activites</h1>
						<p style="color:#b8bfc1">'.$name.'</p>
						<p style="color:#b8bfc1">'.$roll.'</p>
						<p style="color:#b8bfc1">'.$dept.' Department</p>
						<p style="color:#b00fbf">is Requested for Registration.</p>
						<p style="color:#b00fbf">Kindly Check all the Procedure.</p>
						<br>
					</div>
					</body></html>';

				$header = 'MINE-VERSION : 1.0' . "\r\n" .
				  'Content-type: text/html; charset=iso-8859-1' . "\r\n" .
				  'FROM: '.$email . "\r\n" .
				  'X-Mailer: PHP/' . phpversion();

				if(mail($to,$subject,$message,$header)) {
				?>
				<script>
					alert("Your Registration Form Successfully Uploaded. \nProceed next for Payment.");
					window.location.href = "payment.php?cost=<?php echo $amount; ?>&event=Registration Process&page=register&uid=<?php echo $unique_id; ?>&email=&eid=";
				</script>
				<?php
				}			
			}
		}
	    else
	    {
	        $msg="Please Provide Valid Email id";
	    }
	}

?>

<html lang="en">
<head>
	<?php include("css.php"); ?>
	<title>R O C A</title>
	<link rel="stylesheet" href="css/password.css">
	<link rel="stylesheet" href="css/preview.css">
	<style>
		#roll-info, #contact-info, #email-info, #date-info, #year-info {
			display: none;
		}
	</style>
</head>
	
<body>
	<div class="header">
		<?php include("header.php"); ?>
	</div>
	<div class="container">
		<div class="jumbotron">
		    <div class="alert alert-dark h2 font-weight-bold text-center">
				<h2>Registration Form</h2>
			</div>
			<div class="alert text-danger font-weight-bold text-center">
				<?php echo $msg; ?>
			</div>
			<form role="form" class="form-submit" method="post" action="" name="forms" enctype="multipart/form-data" onSubmit="return(registration());">
				<div class="form-group">
					<label for="Name"><strong class="admin_label text-left">Name :</strong></label>
					<input type="text" class="form-control" name="name" placeholder="Full Name" oninput="this.value = this.value.toUpperCase()" autofocus required>
				</div>
				<div class="form-group">
					<label for="Roll"><strong class="admin_label text-left">Roll No :</strong>
					<span class="text-danger" id="roll-info"> Format : eg. CS/16/02</span></label>
					<input type="text" class="form-control" name="roll" id="roll" placeholder="College Roll No." oninput="this.value = this.value.toUpperCase()" patter="[A-Z]{2}/\d{2}/\d{2,3}" title="Format : eg. CS/16/02" required>	
				</div>
				<div class="form-group">
					<label for="Department"><strong class="admin_label text-left">Department :</strong></label>
					<select name="department" class="form-control" id="dept">
						<option value=""><b>Select</b></option>
						<option value="CSE"><b>CSE</b></option>
						<option value="ME"><b>ME</b></option>
						<option value="IT"><b>IT</b></option>
						<option value="EE"><b>EE</b></option>
						<option value="ECE"><b>ECE</b></option>
						<option value="CH"><b>CH</b></option>
					</select>
				</div>
				<div class="form-group">
					<label for="Contact"><strong class="admin_label text-left">Contact :</strong>
					<span class="text-danger" id="contact-info"> Must contain 10 digit</span></label>
					<input type="text" class="form-control" name="contact" id="contact" placeholder="Contact No" pattern="\d{10}" title="Must contain 10 digit" required>
				</div>
				<div class="form-group">
					<label for="Email"><strong class="admin_label text-left">Email :</strong>
					<span class="text-danger" id="email-info"> abc@abc.abc</span></label>
					<input type="text" class="form-control" name="email" id="email" placeholder="Email id" pattern="[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,}$" title="abc@abc.abc" required>
				</div>
				<div class="form-group">
					<label for="Date"><strong class="admin_label text-left">ROCA Joining Date :</strong>
					<span class="text-danger" id="date-info"> DD-MM-YYYY</span></label>
					<input type="text" class="form-control" name="date" id="date" value="<?php echo date('d-m-Y'); ?>" pattern="\d{1,2}-\d{1,2}-\d{4}" title="DD-MM-YYYY" required>
				</div>
				<div class="form-group">
					<label for="year"><strong class="admin_label text-left">College Joining Year :</strong>
					<span class="text-danger" id="year-info"> YYYY (only year)</span></label></label>
					<input type="text" class="form-control" name="year" id="year" value="<?php echo date('Y'); ?>" pattern="\d{4}" title="YYYY (only Year)" required>
				</div>
				<div class="form-group">
					<label for="Password"><strong class="admin_label text-left">Password :</strong></label>
                    <input type="password" class="form-control" id="pswd"  name="password" placeholder="Password" pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}" title="Must contain at least one number and one uppercase and lowercase letter, and at least 8 or more charactor" required>
					<div id="pswd_info">
						<h5>Password requirements:</h5>
						<ul>
							<li id="letter" class="invalid">At least <strong>one letter</strong></li>
							<li id="capital" class="invalid">At least <strong>one capital letter</strong></li>
							<li id="number" class="invalid">At least <strong>one number</strong></li>
							<li id="length" class="invalid">Be at least <strong>8 characters</strong></li>
						</ul>
					</div>
					<input type="checkbox" onclick="showpassword();">Show Password
				</div>
				<div class="form-group" id="image-preview">
					<label for="image-upload" id="image-label">Choose Picture : <span>Size limit : 150Kb</span></label>
					<input type="file" name="fil" id="image-upload" class="form-control-file" accept="image/*" required>
				</div>
				<br>
				<button type="submit" class="btn btn-info btn-lg btn-block" id="sbt_btn">Submit</button>
			</form>
			
		</div>
		<div class="alert"></div>
	</div>
	<?php include("javascript.php"); ?>
	
	<script type="text/javascript" src="js/uploadPreview.js"></script>
	<script type="text/javascript" src="js/register.js"></script>
	<script type="text/javascript" src="js/registration.js"></script>
	
</body>
</html>