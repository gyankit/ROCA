<?php
require("../../database/Database.class.php");

class Event
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

	public function intrest($user, $event, $date, $eid)
	{
		$sql = "INSERT INTO `intrest_tbl` VALUES('$eid', '$user', '$date', '$event','NO','','')";
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

	public function updateintrest($mode, $transaction, $uid, $eid)
	{
		$sql = "UPDATE `intrest_tbl` SET mode='$mode', transaction='$transaction' where unique_id='$uid' and id='$eid'";
		if($this->conn->query($sql)) {
			return true;
		}
		return false;
	}
}