<?php
	include("config.php");
	$id=$_REQUEST['id'];
	header('Content-Type: text/csv; charset=utf-8');  
	header('Content-Disposition: attachment; filename=roca.csv');  
	$output = fopen("php://output", "w");  

	if($id=="user") {
		fputcsv($output, array('Registration Id', 'Name', 'Roll NO', 'Department', 'Contact', 'Email', 'Paid'));  
		$query = "SELECT unique_id, name, roll, department, contact, email, paid from roca_member_tbl ORDER BY unique_id DESC";  
	}

	else if($id=="member") {
		$event=$_REQUEST['event'];
		$eid=$_REQUEST['eid'];
		fputcsv($output, array('$event'));
		fputcsv($output, array('Registration Id' , 'Name' , 'Roll NO' , 'Contact' , 'Paid' , 'Mode' , 'Transaction'));  
		$query = "SELECT intrest_tbl.unique_id, name, roll, contact, paid, mode, transaction from roca_member_tbl, intrest_tbl where intrest_tbl.unique_id = roca_member_tbl.unique_id and id = '$eid'"; 
	}

	else if($id=="subscriber") {
		$event=$_REQUEST['event'];
		$eid=$_REQUEST['eid'];
		fputcsv($output, array('$event'));
		fputcsv($output, array('Name' , 'Roll NO' , 'Email' , 'Paid' , 'Mode' , 'Transaction'));  
		$query = "SELECT name, roll, email, paid, mode, transaction from participation_tbl where id ='$eid'";  
	}

	$result = mysqli_query($cn, $query);  
	while($row = mysqli_fetch_assoc($result))  
	{  
	   fputcsv($output, $row);  
	}  
	fclose($output);  
?>