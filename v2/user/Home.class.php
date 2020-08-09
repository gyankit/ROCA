<?php
require("../database/Database.class.php");

class Home
{
	protected $conn;
	
	public function __construct()
	{
		$db = new Database();
		$this->conn = $db->connect();
	}
	
	public function subscribe($to)
	{
		if( $result = $this->viewsubscriber($to) ) {
			$msg = $result;
		} else {
			$subject='ROCA SUBSCRIPTION MAIL';
			$message = 
				'<html><body>
				<div style="background-color: #000000; font-weight: bold; text-align: center">
					<br>
					<h1 style="color:#ff0000">Region of Cognitive Activites</h1>
					<h2 style="color:#1459C7">Subscription Mail</h2>
					<p style="color:#b8bfc1">Click below for confirm your registration.</p>
					<p style="color:#ffffff"><br><a href="http://www.roca.rahul.ac.in/user/subscription?email='.$to.'">Click Here</a></p>
					<p style="color:#b00fbf">Kindly follow all the Procedure.</p>
					<br>
				</div>
				</body></html>';

			$header = 'MINE-VERSION : 1.0' . "\r\n" .
			  'Content-type: text/html; charset=iso-8859-1' . "\r\n" .
			  'FROM: clubroca2018@gmail.com' . "\r\n" .
			  'X-Mailer: PHP/' . phpversion();

			if( mail($to,$subject,$message,$header) ) {
				$msg = "Go to Mail and Follow the Instruction";
			} else {
				$msg = "Error Occur";
			}
		}
		return $msg;
	}
	
	public function addsubscriber($email)
	{
		$sql = "INSERT INTO `subscriber_tbl` VALUES('$email')";
		if( $this->conn->query($sql) ) {
			return "Thank You for Subscribing Our mail Survice";
		}
		return "Error Occur";
	}
	
	public function viewsubscriber($email)
	{
		$sql = "SELECT * FROM `subscriber_tbl` WHERE email='$email'";
		if( $result = $this->conn->query($sql) ) {
			if( $result->num_rows == 1 ) {
				return "Already Subscribe our Service";
			}
		}
		return false;
	}
	
	public function upcommingevent()
	{
		$date = date('Y-m-d');
	  	$sql = "SELECT * FROM `notice_tbl` WHERE date > '$date'";
		if( $result = $this->conn->query($sql) ) {
			if( $result->num_rows > 0 ) {
				return $result;
			}
		}
		return false;
	}
	
	public function recentevent()
	{
		$date = date('Y-m-d');
	  	$sql = "SELECT * FROM `notice_tbl` WHERE date < '$date'";
		if( $result = $this->conn->query($sql) ) {
			if( $result->num_rows > 0 ) {
				return $result;
			}
		}
		return false;
	}
	
	public function ongoingevent()
	{
		$date = date('Y-m-d');
	  	$sql = "SELECT * FROM `notice_tbl` WHERE date = '$date'";
		if( $result = $this->conn->query($sql) ) {
			if( $result->num_rows > 0 ) {
				return $result;
			}
		}
		return false;
	}
	
	public function generalsecretary()
	{
	  	$sql = "SELECT * FROM `roca_member_tbl` WHERE coordinator='YES' AND field='Genral Secratory' AND head='YES' ORDER BY year DESC";
		if( $result = $this->conn->query($sql) ) {
			if( $result->num_rows > 0 ) {
				return $result;
			}
		}
		return false;
	}
	
	public function askquery($date, $name, $email, $subject, $message)
	{
		$sql = "INSERT INTO `query_tbl` VALUES(NULL,'$date','$name','$email','$subject','$message')";
		if( $this->conn->query($sql) ) {
			return "Thank You for Showing Interest in Us. We are trying to Reply ASAP.";
		}
		return "Error Occur";
	}
	
	public function contact()
	{
		$sql = "SELECT contact FROM `admin_tbl`, `roca_member_tbl` WHERE admin_tbl.unique_id=roca_member_tbl.unique_id AND role='ADMINISTRATOR'";
		if( $result = $this->conn->query($sql) ) {
			if( $result->num_rows == 1 ) {
				$data = $result->fetch_array();;
				return $data['contact'];
			}
		}
		return "9534470240";
	}
	
	public function ourteam($year, $co="YES")
	{
		$sql = "SELECT * FROM `roca_member_tbl` WHERE year ='$year' AND coordinator='$co'";
		if( $result = $this->conn->query($sql) ) {
			return $result;
		}
		return false;
	}

	public function verifysubs($email, $id)
	{
		$sql="SELECT email FROM `subscriber_tbl` WHERE email='$email'";
		if($this->conn->query($sql)) {
			header("location:eventregistration?id=$id&email=$email");
			exit();
		}
		header("location:../error/400");
	}

	public function notice($id)
	{
		$sql = "SELECT * FROM `notice_tbl` WHERE id='$id'";
		if( $result = $this->conn->query($sql) ) {
			if( $result->num_rows > 0 ) {
				$data = $result->fetch_array();
				return $data;
			}
		}
		return false;
	}

	public function participation($name, $roll, $email, $eid, $date)
	{
		$sql = "INSERT INTO `participation_tbl` VALUES( '$eid', '$name', '$roll', '$email', '$date', 'NO','','')";
		if($this->conn->query($sql)) {
			return true;
		}
		return false;
	}

	public function payment()
	{
		$sql = "SELECT * FROM `payment_tbl`";
		if($result = $this->conn->query($sql)) {
			if($result->num_rows >= 1) {
				return $result;
			}
		}
		return false;
	}

	public function updateparticipation($mode, $transaction, $email, $eid)
	{
		$sql = "UPDATE `participation_tbl` SET mode='$mode', transaction='$transaction' where email='$email' and id='$eid'";
		if($this->conn->query($sql)) {
			return true;
		}
		return false;
	}
}