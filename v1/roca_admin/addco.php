<?php 
	include("config.php");
	include("check.php");

	$sql="SHOW TABLES LIKE 'coordinators_tbl'";
	$sr=mysqli_query($cn,$sql);

	if(mysqli_num_rows($sr)==0)
	{
		$sql1="CREATE TABLE `id8469611_clubroca`.`coordinators_tbl` ( `id` INT(10) NOT NULL AUTO_INCREMENT , `unique_id` VARCHAR(15) NOT NULL , `field` TEXT NOT NULL , `head` VARCHAR(3) NOT NULL , PRIMARY KEY (`id`), UNIQUE (`unique_id`))";
		$sr1=mysqli_query($cn,$sql1);
		if($sr1==false)
		{
			header("location: error.php");
		}
	}

	$msg="";
	if($_SERVER['REQUEST_METHOD']=='POST')
	{
		$unique_id=$_POST['unique_id'];
		$field=$_POST['field'];
		$head=$_POST['head'];
		$confirm="YES";

		$sql="insert into coordinators_tbl values(NULL, '$unique_id', '$field', '$head')";
		$rs=mysqli_query($cn,$sql);
		if($rs==false)
		{
			$msg="Error Occur co...";
		}
		else
		{
			$sql2="update roca_member_tbl set coordinator='YES', field='$field', head='$head' where unique_id='$unique_id'";
			$rs3=mysqli_query($cn,$sql2);
			if ($rs3==false)
			{
				$msg="Error Occur member...";
				$sql6="delete from coordinators_tbl where unique_id='$unique_id'";
				$rs2=mysqli_query($cn,$sql6);
			}
			else
			{
				header("location:viewco.php");
			}
		}
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
	<div class="container">
		<div class="jumbotron">
			<div class="card-title text-capitalize text-center h2">
				Add New Co-ordinators
			</div>
			<div class="alert text-danger text-center font-weight-bold">
				<?php echo $msg; ?>
			</div>
			
			<form role="form" class="form-submit" method="post" action="" enctype="multipart/form-data">
				<div class="form-group">
					<label for="Id"><strong class="admin_label text-left">Unique Id :</strong></label>
					<select name="unique_id" class="form-control" required>
						<option value="">Select</option>
						<?php		
						    $date=date('Y-m-d');
                        	$year=date('Y');
                        
                        	if($date < "$year-06-30")
                        	{
                        		$year=$year-1;
                        	}
                        	
                        	$year1=$year-3;
                        	$year2=$year-1;
						   
							$sql1="select unique_id from roca_member_tbl where year BETWEEN '$year1' and '$year2' and unique_id not in (select unique_id from coordinators_tbl) order by unique_id DESC";
							$rs1=mysqli_query($cn,$sql1);
							while($d=mysqli_fetch_array($rs1))
							{
							?>
								<option value="<?php echo $d['unique_id'];?>" >
									<?php echo $d['unique_id'];?>
								</option>
							<?php
							}
						?> 
					</select>
				</div>
				<div class="form-group">
					<label for="field"><strong class="admin_label text-left">Field :</strong></label>
					<select name="field" class="form-control" required>
					    <option value="">Select</option>
					    <option value="Junior Co-ordinator">Junior Co-ordinator</option>
					    <option value="Senior Co-ordinator">Senior Co-ordinator</option>
					    <option value="Markating"><b>Marketing</b></option>
					    <option value="Faculty"><b>Faculty</b></option>
						<option value="Event Organiser & Event Management"><b>Event Organiser &amp; Event Management</b></option>
						<option value="Technical"><b>Technical</b></option>
						<option value="Speaker"><b>Speaker</b></option>
						<option value="Cash"><b>Cash</b></option>
						<option value="Vice-President"><b>Vice-President</b></option>
						<option value="President"><b>President</b></option>
						<option value="Advisor"><b>Advisor</b></option>
						<option value="Associate Secratory"><b>Associate Secratory</b></option>
						<option value="Genral Secratory"><b>Genral Secratory</b></option>
					</select>
				</div>
				<div class="form-group">
					<label for="head"><strong class="admin_label text-left">Head of Field :</strong></label>
					<select name="head" class="form-control" required>
						<option value="NO"><b>NO</b></option>
						<option value="YES"><b>YES</b></option>
					</select>
				</div>
				
				<button class="btn btn-info btn-lg">Submit</button>
			</form>	
		</div>
	</div>
	<?php include("javascript.php"); ?>
</body>
</html>