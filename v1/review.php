<?php
	include("config.php");
	
	if(!isset($_SESSION['user_login']))
    {
        header("location:index.php");
    }

	$msg="No Review Present";

	$sql="SHOW TABLES LIKE 'comments_tbl'";
	$sr=mysqli_query($cn,$sql);
	if(mysqli_num_rows($sr)==0)
	{
		$sql1="CREATE TABLE `id8469611_clubroca`.`comments_tbl` ( `id` INT(10) NOT NULL AUTO_INCREMENT , `date` DATETIME NOT NULL , `topic` VARCHAR(100) NOT NULL , `comment` TEXT NOT NULL , `unique_id` VARCHAR(15) NOT NULL , PRIMARY KEY (`id`))";
		$sr1=mysqli_query($cn,$sql1);
		if($sr1==false)
		{
			header("location: error.php");
		}
	}
?>
<html lang="en">
  <head>
    <?php include("css.php"); ?>
  </head>
  <body>
    
  <?php include("header.php"); ?>
    <!-- END nav -->
  <div class="hero-wrap hero-wrap-2" style="background-image: url('images/bg_2.jpg'); background-attachment:fixed;">
      <div class="overlay"></div>
      <div class="container">
        <div class="row no-gutters slider-text align-items-center justify-content-center" data-scrollax-parent="true">
          <div class="col-md-8 ftco-animate text-center">
            <p class="breadcrumbs"><span class="mr-2"><a <?php if($_SESSION["user_login"]=="True") { ?> href="home.php" <?php } else { ?> href="index.php" <?php } ?>>Home</a></span> <span>Review</span></p>
            <h1 class="mb-3 bread">Review</h1>
          </div>
        </div>
      </div>
    </div>
	 
	<?php if ($_SESSION["user_login"]=="True") { ?>
	  <div class="alert text-center">
	  <button class="btn btn-danger col-6" onClick="location.href = 'reviewform.php'">Add Review</button>
	  </div>
	  <?php } ?> 

    <section class="ftco-section testimony-section">
      <div class="container">
      	<div class="row justify-content-center mb-5 pb-3">
          <div class="col-md-7 heading-section ftco-animate text-center">
            <h2 class="mb-4">What Our Student Says</h2>
          </div>
        </div>
<?php
  $sql1="select * from comments_tbl order by id desc";
  $rs=mysqli_query($cn,$sql1); 
	if(!$rs) { echo $msg; }
	else { ?>  
        <div class="row">
        	<div class="col-md-12 ftco-animate">
            <div class="carousel-testimony owl-carousel">
			<?php 
				while($db=mysqli_fetch_array($rs))
				{
					$u_id=$db['unique_id'];
					
					$sql3="select * from roca_member_tbl where unique_id='$u_id'";
					$rs2=mysqli_query($cn,$sql3);
					$data=mysqli_fetch_array($rs2);
				?>
			  <div class="item">
				<div class="testimony-wrap text-center">
				  <div class="user-img mb-5">
					<img src="images/members/<?php echo $data['photo']; ?>" alt="No Pic">
				  </div>
				  <div class="text">
					<p class="md-5 font-italic font-weight-bold"><?php echo $db['topic']; ?></p>
					<p class="mb-5"><?php echo $db['comment']; ?></p>
					<p class="name"><?php echo $data['name']; ?></p>
					<span class="position"><?php echo $data['department']; ?>&ensp;Department</span>
				  </div>
				</div>
			  </div>
				<?php } ?>
			</div>
		  </div>
		</div>
		  <?php
	  }
?>
	  </div>
	</section>
	  <?php if ($_SESSION["user_login"]=="True") { ?>
	  <div class="alert text-center">
	  <button class="btn btn-danger col-6" onClick="location.href = 'reviewform.php'">Add Review</button>
	  </div>
	  <?php } ?>
	  
  <?php include("footer.php"); ?>

  <?php include("javascript.php"); ?>
    
  </body>
</html>