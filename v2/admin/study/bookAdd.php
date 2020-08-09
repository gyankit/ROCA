<?php
session_start();
require("../required/check.php");
require("Study.class.php");
$msg="";

$study = new Study();

if($_SERVER['REQUEST_METHOD']=='POST')
{
	$dept=$_POST['department'];
	$year=$_POST['year'];
	$sem=$_POST['semester'];
	$code=$_POST['code'];
	$subject=$_POST['subject'];
	$link=$_POST['link'];
	$fil=$_FILES['fil'];

	if($fil=="" and $link=="") { $msg="Provide either book or book link"; }
	
	if( ( $year == "1st" ) && ( $sem == "1st" || $sem == "2nd" ) ) {
		$msg = $study->addbook($dept, $year, $sem, $code, $subject, $link, $fil);
	} elseif( ( $year == "2nd" ) && ( $sem == "3rd" || $sem == "4th" ) ) {
		$msg = $study->addbook($dept, $year, $sem, $code, $subject, $link, $fil);
	} elseif( ( $year == "3rd" ) && ( $sem == "5th" || $sem == "6th" ) ) {
		$msg = $study->addbook($dept, $year, $sem, $code, $subject, $link, $fil);
	} elseif( ( $year == "4th" ) && ( $sem == "7th" || $sem == "8th" ) ) {
		$msg = $study->addbook($dept, $year, $sem, $code, $subject, $link, $fil);
	} else {
		$msg = "Year and Semester Not Match";
	}
}

?>
<!DOCTYPE html>
<html lang="en">

<head>
	<?php include("../required/head.php"); ?>
</head>

<body class="hold-transition sidebar-mini">
	<div class="wrapper">
		<?php include("../required/header.php"); ?>
		<?php include("../required/sidebar.php"); ?>

		<!-- Main content -->
		<div class="content">
			<div class="container">
				<div class="page-wrapper p-t-5 p-b-10">
					<div class="wrapper wrapper--w790">
						<div class="card card-5">
							<div class="card-heading bg-info">
								<h2 class="title text-white">Add Books</h2>
							</div>		
							<!-- Main Content -->
							<div class="card-body bg-gray">

								<div class="alert text-danger text-center font-weight-bold">
									<?php echo $msg; ?>
								</div>
								<form role="form" class="form-submit" method="post" action="" enctype="multipart/form-data">
									<div class="form-group">
										<label for="Department"><strong class="admin_label text-left">Department :</strong></label>
										<select name="department" class="form-control" required>
											<option value=""><b>Select</b></option>
											<option value="CSE"><b>CSE</b></option>
											<option value="ME"><b>ME</b></option>
											<option value="IT"><b>IT</b></option>
											<option value="EE"><b>EE</b></option>
											<option value="ECE"><b>ECE</b></option>
										</select>
									</div>
									<div class="form-group">
										<label for="Year"><strong class="admin_label text-left">Year :</strong></label>
										<select name="year" class="form-control" required>
											<option value=""><b>Select</b></option>
											<option value="1st"><b>1st</b></option>
											<option value="2nd"><b>2nd</b></option>
											<option value="3rd"><b>3rd</b></option>
											<option value="4th"><b>4th</b></option>
										</select>
									</div>
									<div class="form-group">
										<label for="Semester"><strong class="admin_label text-left">Semester :</strong></label>
										<select name="semester" class="form-control" required>
											<option value=""><b>Select</b></option>
											<option value="1st"><b>1st</b></option>
											<option value="2nd"><b>2nd</b></option>
											<option value="3rd"><b>3rd</b></option>
											<option value="4th"><b>4th</b></option>
											<option value="5th"><b>5th</b></option>
											<option value="6th"><b>6th</b></option>
											<option value="7th"><b>7th</b></option>
											<option value="8th"><b>8th</b></option>
										</select>
									</div>
									<div class="form-group">
										<label for="Subjectcode"><strong class="admin_label text-left">Subject Code :</strong></label>
										<input type="text" class="form-control" name="code" placeholder="Subject Code" required>
									</div>
									<div class="form-group">
										<label for="Subject"><strong class="admin_label text-left">Subject :</strong></label>
										<input type="text" class="form-control" name="subject" placeholder="Subject" required>
									</div>
									<div class="form-group">
										<label for="Material"><strong class="admin_label text-left">Books :</strong></label>
										<input type="file" name="fil" class="form-control-file" accept="application/*">
									</div>
									<div class="form-group">
										<label for="Link"><strong class="admin_label text-left">Book's Link :</strong></label>
										<input type="text" class="form-control" name="link" placeholder="Link of Books">
									</div>
									<button class="btn btn-info btn-lg">Submit</button>
								</form>

							</div>
							<!-- End Main Content -->
						</div>
					</div>
				</div>
			</div>
		</div>
		<?php include("../required/footer.php"); ?>
	</div>
	<?php include("../required/javascript.php"); ?>
</body>
</html>