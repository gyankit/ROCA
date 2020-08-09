<?php
require("../../database/Database.class.php");

class Home
{
	protected $conn;
	
	public function __construct()
	{
		$db = new Database();
		$this->conn = $db->connect();
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

	public function viewreview()
	{
		$sql = "SELECT * FROM `comments_tbl` ORDER BY id DESC";
		if( $result = $this->conn->query($sql) ) {
			return $result;
		}
		return false;
	}

	public function profile($id)
	{
		$sql = "SELECT * FROM `roca_member_tbl` WHERE unique_id='$id'";
		if( $result = $this->conn->query($sql) ) {
			$data = $result->fetch_array();
			return $data;
		}
		return false;
	}

	public function addreview($user, $topic, $views, $date)
	{
		$sql = "INSERT INTO `comments_tbl` VALUES(NULL,'$date','$topic','$views','$user')";
		if( $result = $this->conn->query($sql) ) {
			return $result;
		}
		return false;
	}

	public function viewfaq($user)
	{
		$sql = "SELECT * FROM `faq_tbl` WHERE unique_id='$user' ORDER BY date DESC";
		if( $result = $this->conn->query($sql) ) {
			return $result;
		}
		return false;
	}

	public function addfaq($user, $ques, $date)
	{
		$sql = "INSERT INTO `faq_tbl` VALUES(NULL,'$date','$ques','','$user')";
		if( $result = $this->conn->query($sql) ) {
			return $result;
		}
		return false;
	}

	public function deletefaq($id)
	{
		$sql = "DELETE FROM `faq_tbl` WHERE id='$id'";
		if( $result = $this->conn->query($sql) ) {
			return $result;
		}
		return false;
	}
}