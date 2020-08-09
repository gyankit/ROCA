<?php
require("../../database/Database.class.php");

class Study
{
	protected $conn;
	
	public function __construct()
	{
		$db = new Database();
		$this->conn = $db->connect();
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
    
    public function profile($user)
    {
        $sql = "SELECT * FROM `roca_member_tbl` WHERE unique_id='$user'";
        if($result = $this->conn->query($sql) ) {
            if($result->num_rows == 1) {
                $data = $result->fetch_array();
                return $data;
            }
        }
        return false;
    }

    public function search($sem , $code, $dept, $type)
    {
        if($sem=="" and $code=="") {
            $sql = "SELECT * FROM `$type` WHERE department='$dept'";
        }
        elseif($code=="") {
            $sql = "SELECT *  FROM `$type` WHERE semester='$sem' AND department='$dept'";
        }
        elseif($sem=="") {
            $sql = "SELECT * FROM `$type` WHERE code='$code' AND department='$dept'";
        }
        else {
            $sql = "SELECT * FROM `$type` WHERE semester='$sem' AND code='$code' AND department='$dept'";
        }

        if($result = $this->conn->query($sql)) {
            if($result->num_rows > 0) {
                return $result;
            }
        }
        return false;
    }
}