<?php
require_once("../../database/Database.class.php");

class Event
{
	protected $conn;
	
	public function __construct()
	{
		$db = new Database();
		$this->conn = $db->connect();
	}
	
	public function addEvent($event, $date)
	{
		$sql = "INSERT INTO `event_tbl` VALUES(NULL,'$event','$date')";
		if ( $this->conn->query($sql) ) {
			header("location:view");
		}
		return "Error Occur....Try After Sometime..!!!";
	}
	
	public function table($table)
	{
		$date=date('Y-m-d');
		$sql = "SELECT DISTINCT $table FROM notice_tbl WHERE date <= '$date' ORDER BY id DESC";
		if ( $result = $this->conn->query($sql) ) {
			return $result;
		}
		return false;
	}
	
	public function viewEvent()
	{
		$sql="SELECT * FROM `event_tbl` ORDER BY id DESC";
		if( $result = $this->conn->query($sql) ) {
			if( $result->num_rows > 0 ) {
				return $result;
			}
		}
		return false;
	}
	
	public function event($id)
	{
		$sql="SELECT * FROM `event_tbl` WHERE id='$id'";
		if( $result = $this->conn->query($sql) ) {
			$data = $result->fetch_array();
			return $data;
		}
		return false;
	}
	
	public function deleteEvent($id) 
	{
		$sql = "DELETE FROM `event_tbl` WHERE id='$id'";
		if( $this->conn->query($sql) ) {
			$sql = "DELETE FROM `gallery_tbl` WHERE event_id='$id'";
			$this->conn->query($sql);
			return true;
		}
		return false;
	}
	
	public function updateEvent($id, $event)
	{
		$sql = "UPDATE `event_tbl` SET event='$event' WHERE id='$id'";
		if( $this->conn->query($sql) ) {
			unset($_SESSION["event_id"]);
			header("location:view");
		}
		else {
			$msg="Error Occur....Try After Sometime..!!!";
		}
		return $msg;
	}
}
?>