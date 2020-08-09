<?php
require ("../../database/Database.class.php");

class Team
{
    protected $conn;
	
    public function __construct()
    {
        $db = new Database();
        $this->conn = $db->connect();
    }
	
	public function member()
	{
		$sql = "SELECT * FROM `roca_member_tbl` WHERE paid='YES'";
		if( $result = $this->conn->query($sql) ) {
			return $result;
		}
		return false;
	}
	
	public function subscriber()
	{
		$sql = "SELECT * FROM `subscriber_tbl`";
		if( $result = $this->conn->query($sql) ) {
			return $result;
		}
		return false;
	}
	
	
	
}