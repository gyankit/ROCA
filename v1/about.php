<?php 
	include("config.php"); 

	if(!isset($_SESSION['user_login']))
    {
        header("location:index.php");
    }
?>

<!DOCTYPE html>
<html lang="en">
  <head>	  
    <?php include("css.php"); ?>   
  </head>
  <body>
    
  <?php include("header.php"); ?>
    <!-- END nav -->
  
    <div class="hero-wrap hero-wrap-2" style="background-attachment:fixed;">
      <div class="overlay"></div>
      <div class="container">
        <div class="row no-gutters slider-text align-items-center justify-content-center" data-scrollax-parent="true">
          <div class="col-md-8 ftco-animate text-center">
            <p class="breadcrumbs"><span class="mr-2"><a <?php if($_SESSION["user_login"]=="True") { ?> href="home.php" <?php } else { ?> href="index.php" <?php } ?>>Home</a></span> <span>About</span></p>
            <h1 class="mb-3 bread">About</h1>
          </div>
        </div>
      </div>
    </div>

    <section class="ftco-section">
    	<div class="container">
    		<div class="row d-flex">
    			<div class="col-md-6 d-flex ftco-animate">
    				<div class="img img-about align-self-stretch" style="width: 100%; height: 500px"><img src="images/logo.jpg" width="400px" alt="No Pic">
    				</div>
    			</div>
    			<div class="col-md-6 pl-md-5 ftco-animate">
    				<h2 class="mb-4 text-center">Welcome to ROCA<br>Stablished Since 2011</h2>
    				<div class="text-center font-weight-bold">
						<p>Technology brings the excitement, helps look into the future, and makes us brave enough to try to shape it.</p>
						<p class="text-success font-italic">It is the official technical club of DIATM</p>
						<p>Although its a technical club non-technical events are also organized.</p>
						<p>In this club we help students to identify their talents and enhance their skills.</p>
						<p>We the members of this club are like a huge family.</p>
						<p>The art challenges the technology,and the technology inspires the art.</p>
						<p>The highest reward for a person’s toil is not what the get for it,but what they become by it.</p>
					</div>
    			</div>
    		</div>
    	</div>
    </section>

 <section class="ftco-section bg-light">
      <div class="container">
      	<div class="row justify-content-center mb-5 pb-3">
          <div class="col-md-7 heading-section ftco-animate text-center">
            <h2 class="mb-4">Our Experienced Advisors</h2>
          </div>
        </div>
        <div class="row">
        	<div class="col-lg-4 mb-sm-4 ftco-animate">
        		<div class="staff">
        			<div class="d-flex mb-4">
        				<div class="img" style="background-image: url(images/ctbhunia.jpg);"></div>
        				<div class="info ml-4">
        					<h3>Prof. (Dr.) Chandan Tilak Bhunia</h3>
        					<span class="position">Director General</span>
        				</div>
        			</div>
        			<div class="text">
        				<p><!--Even the all-powerful Pointing has no control about the blind texts it is an almost unorthographic life One day however a small line of blind text by the name--></p>
        			</div>
        		</div>
        	</div>
			<div class="col-lg-4 mb-sm-4 ftco-animate">
        		<div class="staff">
        			<div class="d-flex mb-4">
        				<div class="img" style="background-image: url(images/PKSinha.png);"></div>
        				<div class="info ml-4">
        					<h3>Dr. Prasanta Kr. Sinha</h3>
        					<span class="position">Principal</span>
        				</div>
        			</div>
        			<div class="text">
        				<p><!--Even the all-powerful Pointing has no control about the blind texts it is an almost unorthographic life One day however a small line of blind text by the name--></p>
        			</div>
        		</div>
        	</div>
			<div class="col-lg-4 mb-sm-4 ftco-animate">
        		<div class="staff">
        			<div class="d-flex mb-4">
        				<div class="img" style="background-image: url(images/SubhasisJana.jpg);"></div>
        				<div class="info ml-4">
        					<h3>Mr. Subhasis Jana</h3>
        					<span class="position">Mentor</span>
        				</div>
        			</div>
        			<div class="text">
        				<p><!--Even the all-powerful Pointing has no control about the blind texts it is an almost unorthographic life One day however a small line of blind text by the name--></p>
        			</div>
        		</div>
        	</div>
        </div>
      </div>
</section>

  

    <section class="ftco-section testimony-section">
      <div class="container">
      	<div class="row justify-content-center mb-5 pb-3">
          <div class="col-md-7 heading-section ftco-animate text-center">
            <h2 class="mb-4">R.O.C.A. Leading Face</h2>
          </div>
        </div>
        <div class="row">
					
			<?php
			$sql1="select * from roca_member_tbl where coordinator='YES' and field='Genral Secratory' and head='YES' order by year desc";
			$rs=mysqli_query($cn,$sql1);
			if($rs==true) { if(mysqli_num_rows($rs)!=0) { while($db=mysqli_fetch_array($rs)) { 
			?>
			<div class="col-lg-4 mb-sm-4 ftco-animate">
        		<div class="staff">
        			<div class="d-flex mb-3">
						<img class="img" src="images/members/<?php echo $db['photo']; ?>" alt="No Pic"/>
        				<div class="info ml-3">
        					<h3><?php echo $db['name']; ?></h3>
        					<span class="position">General Secretary<br>(<?php echo ($db['year']+3); ?>)</span>
        				</div>
        			</div>
        		</div>
        	</div>
			<?php } } } ?>
			
			<div class="col-lg-4 mb-sm-4 ftco-animate">
        		<div class="staff">
        			<div class="d-flex mb-3">
						<img class="img" src="images/kesav.jpg" alt="No Pic"/>
        				<div class="info ml-3">
        					<h3>KESHAV JHA</h3>
        					<span class="position">General Secretary<br>(2017)</span>
        				</div>
        			</div>
        		</div>
        	</div>
			
			<div class="col-lg-4 mb-sm-4 ftco-animate">
        		<div class="staff">
        			<div class="d-flex mb-3">
						<img class="img" src="images/vaibhav.jpeg" alt="No Pic"/>
        				<div class="info ml-3">
        					<h3>KUMAR BAIBHAV</h3>
        					<span class="position">General Secretary<br>(2016)</span>
        				</div>
        			</div>
        		</div>
        	</div>
		</div>
	  </div>
	</section>

	  
  <?php include("footer.php"); ?>
 
  <?php include("javascript.php"); ?>
    
  </body>
</html>