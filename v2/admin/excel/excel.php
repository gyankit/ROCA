<?php
	require("../database/Database.class.php");
	$db = new Database();
	$conn = $db->connect();

	$id=$_REQUEST['id'];

	header('Content-Type: text/csv; charset=utf-8');  

	header('Content-Disposition: attachment; filename=roca.csv');  

	$output = fopen("php://output", "w");  

	if($id=="alluser") {
		$date = date('Y-m-d');
		$year = date('Y');
		if ($date < "$year-06-30") { $year = $year - 1; }
		$year = $year - 3;
		
		fputcsv($output, array('Registration Id', 'Name', 'Roll NO', 'Department', 'Contact', 'Email', 'Paid'));  
		
		$sql = "SELECT unique_id, name, roll, department, contact, email, paid FROM `roca_member_tbl` ORDER BY unique_id";
	}

	if($id=="currentuser") {
		$date = date('Y-m-d');
		$year = date('Y');
		if ($date < "$year-06-30") { $year = $year - 1; }
		$year = $year - 3;
		
		fputcsv($output, array('Registration Id', 'Name', 'Roll NO', 'Department', 'Contact', 'Email', 'Paid'));  
		
		$sql = "SELECT unique_id, name, roll, department, contact, email, paid FROM `roca_member_tbl` WHERE year >= '$year' ORDER BY unique_id";
	}

	else if($id=="member") {
		$event = $_REQUEST["event"];
		$eid = $_REQUEST["eid"];
		
		fputcsv($output, array(" ", $event));
		exit();
		fputcsv($output, array('Registration Id' , 'Name' , 'Roll NO' , 'Contact' , 'Paid' , 'Mode' , 'Transaction'));  
		
		$sql = "SELECT intrest_tbl.unique_id, name, roll, contact, intrest_tbl.paid, mode, transaction FROM `roca_member_tbl`, `intrest_tbl` WHERE intrest_tbl.unique_id = roca_member_tbl.unique_id and intrest_tbl.id='$eid'";  
	}

	else if($id=="subscriber") {
		$event=$_REQUEST['event'];
		$eid=$_REQUEST['eid'];
		
		fputcsv($output, array(" ", $event));
		
		fputcsv($output, array('Name' , 'Roll NO' , 'Email' , 'Paid' , 'Mode' , 'Transaction'));
		
		$sql = "SELECT name, roll, email, paid, mode, transaction FROM `participation_tbl` WHERE id ='$eid'";  
	}

	$result = $conn->query($sql);

	while( $row = $result->fetch_assoc() )  
	{  
	   fputcsv($output, $row);  
	}  

	fclose($output);  
?>