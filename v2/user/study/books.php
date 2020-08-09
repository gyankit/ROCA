<?php
session_start();
include("../required/check.php");
require("Study.class.php"); 
$study = new Study(); 
$contact = $study->contact();

$date=date('Y-m-d');
$year=date('Y');
if($date < "$year-06-30") { $year=$year-1; }

$data = $study->profile($_SESSION['user_id']);
if(!$data) { header("location:../../error/404"); } else {
    $year1 = $data["year"];
    $dept = $data["department"];
}
?>

<html lang="en">
<head>
	<?php include("../required/head.php") ?>
</head>

<body>
	<?php include("../required/header.php"); ?>
    
    <div class="hero-wrap hero-wrap-2" style="background-attachment:fixed;">
        <div class="overlay"></div>
        <div class="container">
            <div class="row no-gutters slider-text align-items-center justify-content-center" data-scrollax-parent="true">
                <div class="col-md-8 text-center">
                    <p class="breadcrumbs"><span class="mr-2"><a  href="../home/home">Home</a></span> <span>Study</span></p>
                        <h1 class="mb-3 bread">Books</h1>
                </div>
            </div>
        </div>
    </div>

    <div class="container-fluid m-b-20">
		<div class="jumbotron-fluid">
			<div class="alert bg-warning m-t-20">
				<form role="form" class="form-submit row" method="post" action="">			
					<div class="col-md-3 m-t-10">
						<input type="text" class="form-control" value="<?= $dept; ?>" readonly>
					</div>
					<div class="col-md-3 m-t-10">
						<select class="form-control" name="sem">
							<option value=""><strong>Semester</strong></option>
							<?php if($year1==$year) { ?>
							<option value="1st"><strong>1st</strong></option>
							<option value="2nd"><strong>2nd</strong></option>
							<?php } elseif($year1==($year-1)) { ?>
							<option value="3rd"><strong>3rd</strong></option>
							<option value="4th"><strong>4th</strong></option>
							<?php } elseif($year1==($year-2)) { ?>
							<option value="5th"><strong>5th</strong></option>
							<option value="6th"><strong>6th</strong></option>
							<?php } elseif($year1==($year-3)) { ?>
							<option value="7th"><strong>7th</strong></option>
							<option value="8th"><strong>8th</strong></option>
							<?php } ?>
						</select>
					</div>
					<div class="col-md-3 m-t-10">
						<input type="text" class="form-control" name="code" placeholder="Subject Code">
					</div>
					<div class="col-md-3 m-t-15">
						<button class="btn btn-block btn-danger btn-lg"><strong>Search</strong></button>
					</div>
				</form>
			</div>
		</div>	
	</div>	
    
    <div class="container">

    <?php if($_SERVER["REQUEST_METHOD"]=="POST")
    {
        $sem=$_POST['sem'];
        $code=$_POST['code'];
        $view = $study->search($sem, $code, $dept, "books_tbl");

        if(!$view) { 
            echo "<div class='alert alert-danger text-center'>No Data Found</div>"; 
        } else { ?>

        <div class="alert bg-primary text-center row">
        <?php while($data1 = $view->fetch_array()) { ?>
            <div class="alert bg-success text-white col-md-3">
                <p><?= $data1['subject']; ?></p>
                <p>&lpar;<?= $data1['code']; ?>&rpar;</p>
                <p><?= $data1['topic']; ?></p>
				<button class="btn btn-link" onclick="location.href= 'download?file=<?= $data1['material'] ?>&path=books'">Download</button>
				<p><?= $data1['link']; ?></p>
            </div>
        <?php } ?>
        </div>

    <?php } } ?>

    </div>
    
	<?php include("../required/footer.php"); ?>
	<?php include("../required/javascript.php"); ?>
</body>
</html>