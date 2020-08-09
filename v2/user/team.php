<?php
require("Home.class.php"); 
$home = new Home();
$contact = $home->contact();

if($_SERVER["REQUEST_METHOD"]=="POST") 
{
	$email=$_POST['emails'];
	$msg = $home->subscribe($email);
	?><script>alert("<?php echo $msg; ?>");</script><?php
}

$date=date('Y-m-d');
$year=date('Y');
if($date < "$year-06-30") { $year = $year-1; }

$team1 = $home->ourteam($year-3);
$team2 = $home->ourteam($year-2);
$team3 = $home->ourteam($year-1);
$team4 = $home->ourteam($year, "NO");

?>

<!doctype html>
<html>
<head>
<?php include("head.php");?>
</head>
<body>
<?php include("header.php");?>
	<div class="">
		<div class="hero-wrap hero-wrap-2" style="background-attachment:fixed;">
		  	<div class="overlay"></div>
			<div class="container">
				<div class="row no-gutters slider-text align-items-center justify-content-center" data-scrollax-parent="true">
					<div class="col-md-8 text-center">
						<p class="breadcrumbs"><span class="mr-2"><a  href="index">Home</a></span> <span>Team</span></p>
							<h1 class="mb-3 bread">Our Team</h1>
					</div>
				</div>
			</div>
		</div>
		
		<div class="container-fluid m-t-35">
			<div class="jumbotron bg-info">
				<div class="alert alert-danger">
					<button class="btn btn-dark btn-block" type="button" data-toggle="collapse" data-target="#fourth" aria-expanded="false" aria-controls="fourth">
						4th Year
					</button>
					<div class="collapse" id="fourth">
						<div class="table-responsive m-t-5 bg-white p-l-10 p-r-10">
							<?php if(!$team1) { echo "No Data Found"; } else { ?>
								<table class="table table-striped text-dark text-center" id="table1" width="100%">
									<thead class="table-dark">
										<tr class="text-info">
											<th scope="col">Name</th>
											<th scope="col">Department</th>
											<th scope="col">Position</th>
										</tr>
									</thead>
									<?php while( $data = $team1->fetch_array() ) { ?>
									<tbody class="table-sm table-info">
									<tr>
										<td><?= $data['name']; ?></td>
										<td><?= $data['department']; ?></td>
										<td><?php
											if($data['head']=="YES") { echo $data['field']." HEAD"; }
											else { echo $data['field']; } ?>
										</td>			
									</tr>
								</tbody>
								<?php } ?>
							</table>
							<?php } ?>
						</div>
					</div>
				</div>

				<div class="alert alert-danger">
					<button class="btn btn-dark btn-block" type="button" data-toggle="collapse" data-target="#third" aria-expanded="false" aria-controls="third">3rd Year</button>
					<div class="collapse" id="third">
					<div class="table-responsive m-t-5 bg-white p-l-10 p-r-10">
						<?php if(!$team2) { echo "No Data Found"; } else { ?>
							<table class="table table-striped text-dark text-center" id="table2" width="100%">
								<thead class="table-dark">
									<tr class="text-info">
										<th scope="col">Name</th>
										<th scope="col">Department</th>
										<th scope="col">Position</th>
									</tr>
								</thead>
								<?php while( $data = $team2->fetch_array() ) { ?>
								<tbody class="table-sm table-info">
									<tr>
										<td><?= $data['name']; ?></td>
										<td><?= $data['department']; ?></td>
										<td><?= $data['field']; ?></td>						
									</tr>
								</tbody>
								<?php } ?>
							</table>
							<?php } ?>
						</div>
					</div>
				</div>

				<div class="alert alert-danger">
					<button class="btn btn-dark btn-block" type="button" data-toggle="collapse" data-target="#second" aria-expanded="false" aria-controls="second">2nd Year</button>
					<div class="collapse" id="second">
					<div class="table-responsive m-t-5 bg-white p-l-10 p-r-10">
						<?php if(!$team3) { echo "No Data Found"; } else { ?>
							<table class="table table-striped text-dark text-center" id="table3" width="100%">
								<thead class="table-dark">
									<tr class="text-info">
										<th scope="col">Name</th>
										<th scope="col">Department</th>
										<th scope="col">Position</th>
									</tr>
								</thead>
								<?php while( $data = $team3->fetch_array() ) { ?>
								<tbody class="table-sm table-info">
									<tr>
										<td><?= $data['name']; ?></td>
										<td><?= $data['department']; ?></td>
										<td><?= $data['field']; ?></td>			
									</tr>
								</tbody>
								<?php } ?>
							</table>
							<?php } ?>
						</div>
					</div>
				</div>

				<div class="alert alert-danger">
					<button class="btn btn-dark btn-block" type="button" data-toggle="collapse" data-target="#first" aria-expanded="false" aria-controls="first">1st Year</button>
					<div class="collapse" id="first">
					<div class="table-responsive m-t-5 bg-white p-l-10 p-r-10">
						<?php if(!$team4) { echo "No Data Found"; } else { ?>
							<table class="table table-striped text-dark text-center" id="table4" width="100%">
								<thead class="table-dark">
									<tr class="text-info">
										<th scope="col">Name</th>
										<th scope="col">Department</th>
									</tr>
								</thead>
								<?php while( $data = $team4->fetch_array() ) { ?>
								<tbody class="table-sm table-info">
									<tr>
										<td><?= $data['name']; ?></td>
										<td><?= $data['department']; ?></td>			
									</tr>
								</tbody>
								<?php } ?>
							</table>
							<?php } ?>
						</div>
					</div>
				</div>
			</div>
		</div>
		
		<?php include("subscribe.php");?>
	</div>
	
	<?php include("footer.php");?>

	<?php include("javascript.php");?>

<script>	
	$(document).ready(function () {
		$('#table1').DataTable();
		$('.dataTables_length').addClass('bs-select');
	});

	$(document).ready(function () {
		$('#table2').DataTable();
		$('.dataTables_length').addClass('bs-select');
	});

	$(document).ready(function () {
		$('#table3').DataTable();
		$('.dataTables_length').addClass('bs-select');
	});

	$(document).ready(function () {
		$('#table4').DataTable();
		$('.dataTables_length').addClass('bs-select');
	});
</script>
</body>
</html>