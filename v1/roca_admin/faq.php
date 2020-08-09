<?php
	include("config.php");
	include("check.php");

	$sql="SHOW TABLES LIKE 'faq_tbl'";
	$sr=mysqli_query($cn,$sql);

	if(mysqli_num_rows($sr)==0)
	{
		?>
		<script>
			alert("No Question Present...");
			history.go(-1);
		</script>
		<?php
	}

	$msg="";
	if($_SERVER['REQUEST_METHOD']=='POST')
	{
		$answer=$_POST['answer'];
		$id=$_POST['id'];

		$sql="update faq_tbl set answer='$answer' where id=$id";
		$rs=mysqli_query($cn,$sql);

		if ($rs==false)
		{
			$msg="Error Occur....Try After Sometime..!!!";
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
	<div class="container-fluid">
		<div class="jumbotron-fluid">
			<div class="card-title text-capitalize text-center h2 text-danger font-weight-bold">
				Frequently Ask Question
			</div>
			<div class="alert text-danger text-center font-weight-bold">
				<?php echo $msg; ?>
			</div>
			
			<div class="alert alert-danger">
				<?php
				$sql1="select * from faq_tbl order by id DESC";
				$rs1=mysqli_query($cn,$sql1);

				if(mysqli_num_rows($rs1)==0)
				{
					echo "No Question Ask";
				}
				else
				{
					while($db=mysqli_fetch_array($rs1))
					{
						?>
						<form role="form" class="form-submit alert alert-warning" method="post" action="">
							<?php
								$unique_id=$db['unique_id'];
								$sql2="select * from roca_member_tbl where unique_id='$unique_id'";
								$sr1=mysqli_query($cn,$sql2);

								$db1=mysqli_fetch_array($sr1);
							?>
							<div class="text-dark">
								<p class="font-weight-bold"><?php echo $db1['name'] ?>&ensp;&ensp;<?php echo $db1['roll'] ?>&ensp;&ensp;<?php echo $db['date'] ?></p>
								<p><b>Question :</b>&ensp;<?php echo $db['question'] ?></p>
								<p><b>Answer :</b>&ensp;<?php echo $db['answer'] ?></p>
								<p><textarea name="answer" class="form-control" placeholder="<?php echo $db['answer']; ?>"></textarea></p>
								<p>
									<?php
										if($db['answer']=="")
										{
											?><button class="btn btn-block btn-success" name="id" value="<?php echo $db['id']; ?>">Reply</button><?php
										}
										else
										{
											?>
											<button class="btn btn-block btn-danger" name="id" value="<?php echo $db['id']; ?>">Edit</button>
											<?php
										}
									?>
								</p>
							</div>
						</form>
						<?php
						}
					}
				?>
			</div>
		</div>
	</div>
	<?php include("javascript.php") ?>
</body>
</html>	