<?php
require ("../../database/Database.class.php");

class Coordinator
{
    protected $conn;
	
    public function __construct()
    {
        $db = new Database();
        $this->conn = $db->connect();
    }
	
	public function viewmember()
	{
		$date=date('Y-m-d');
		$year=date('Y');
		if($date < "$year-06-30") { $year=$year-1; }

		$year1=$year-3;
		$year2=$year-1;
		
		$sql = "SELECT unique_id FROM `roca_member_tbl` WHERE year BETWEEN '$year1' AND '$year2' AND unique_id NOT IN ( SELECT `unique_id` FROM `coordinators_tbl` ) ORDER BY unique_id DESC";
		if( $result = $this->conn->query($sql) ) {
			return $result;
		}
		return false;
	}
	
	public function addCoordinator($id, $field, $head)
	{
		$sql = "INSERT INTO `coordinators_tbl` VALUES(NULL, '$id', '$field', '$head')";
		if( $error = $this->conn->query($sql) ) {
			if( $error = $this->updatemember($id, $field, $head) ) {
				header("location:view");
			} else {
				$error = $this->delete($id);
				$error = "Error Occur";
			}
		} else {
			$error = "Error in Updating Profile";
		}
		return $error;
	}
	
	private function updatemember($id, $field, $head)
	{
		$sql = "UPDATE `roca_member_tbl` SET coordinator='YES', field='$field', head='$head' WHERE unique_id='$id'";
		if( $this->conn->query($sql) ) {
			return true;
		}
		return "Can't Update User Profile";
	}
	
	private function delete($id) {
		$sql = "DELETE FROM `coordinators_tbl` WHERE unique_id='$id'";
		if( $this->conn->query($sql) ) {
			return true;
		}
		return false;
	}
	
	public function viewCoordinator()
	{
		$sql = "SELECT * FROM `coordinators_tbl` ORDER BY id DESC";
		if( $result = $this->conn->query($sql) ) {
			if( $result->num_rows > 0 ) {
				return $result;
			} 
		}
		return false;
	}
	
	public function viewco($id)
	{
		$sql = "SELECT * FROM `coordinators_tbl` WHERE unique_id='$id'";
		if( $result = $this->conn->query($sql) ) {
			$data = $result->fetch_array();
			return $data;
		}
		return false;
	}
	
	public function updateCoordinator($id, $field, $head)
	{
		$sql = "UPDATE `coordinators_tbl` SET field='$field', head='$head' WHERE unique_id='$id'";
		if( $error = $this->conn->query($sql) ) {
			if( $error = $this->updatemember($id, $field, $head) ) {
				unset($_SESSION["co_id"]);
				header("location:view");
			} else {
				$error = "Error Occur";
			}
		} else {
			$error = "Error in Updating Profile";
		}
		return $error;
	}
	
	public function deleteCoordinator($id)
	{
		if( $this->delete($id) ) {
			$sql = "UPDATE `roca_member_tbl` SET coordinator='NO', field='Not Specified', head='NO' WHERE unique_id='$id'";
			if( $this->conn->query($sql) ) {
				return true;
			}
		}
		return false;
	}
}