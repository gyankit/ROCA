<?php
	include("config.php");
	include("check.php");

	$id=$_REQUEST['id'];
	$role=$_REQUEST['role'];

	if($role=="ADMINISTRATOR")
	{
		?>
		<script>
			alert("Can't Delete Administrator");
			history.go(-1);
		</script>
		<?php
	}
	else
	{
		$sql="delete from admin_tbl where unique_id='$id'";
		mysqli_query($cn,$sql);

		header("location: viewadmin.php");
	}
?>