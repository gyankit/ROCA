<?php
require ("../../database/Database.class.php");

class Registration
{
    protected $conn;
	
    public function __construct()
    {
        $db = new Database();
        $this->conn = $db->connect();
    }
	
	public function check()
	{
		$sql = "SELECT * FROM `registration_tbl`";
		if( $result = $this->conn->query($sql) ) {
			if( $result->num_rows == 1 ) {
				$data = $result->fetch_array();
				return $data;
			}
		}
		return false;
	}
	
	public function start($amt)
	{
		if( $this->stop() ) {	
			$sql = "INSERT INTO `registration_tbl` VALUES('$amt')";
			if($this->conn->query($sql)) {
				return true;
			}
		}
		return false;
	}
	
	public function stop()
	{
		$sql = "TRUNCATE TABLE `registration_tbl`";
		if($this->conn->query($sql)) {
			return true;
		}
		return false;
	}
	
}