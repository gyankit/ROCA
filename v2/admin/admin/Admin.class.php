<?php
require("../../database/Database.class.php");

class Admin
{
	protected $conn;
	
	public function __construct()
	{
		$db = new Database();
		$this->conn = $db->connect();
	}
	
	public function counts()
	{
		$sql = "SELECT * FROM `admin_tbl`";
		$result = $this->conn->query($sql);
		return $result->num_rows;
	}
	
	public function _input($data)
    {
        $data = trim($data);
        $data = stripslashes($data);
        $data = htmlspecialchars($data);
        return $data;
    }
	
	public function newAdmin($unique_id, $user, $pass, $role)
	{
		$sql = "SELECT * FROM `admin_tbl` WHERE role='$role'";
		$result = $this->conn->query($sql);
		
		if( $result->num_rows >= 2 ) {
			$msg = "One Administrator is Already Present...";
		} else {
			$sql = "SELECT * FROM `roca_member_tbl` WHERE unique_id='$unique_id'";
    		$result = $this->conn->query($sql);
			
			if( $result->num_rows == 0 )
			{	
				$msg="Not a valid Registration Id";
			}
			else
			{
				$user=md5($user);
				$pass=md5($pass);

				$sql="INSERT INTO `admin_tbl` VALUES('$unique_id', '$user', '$pass', '$role')";
				$result = $this->conn->query($sql);
				if ( $result ) {
					header("location:view");
				} else {
					$msg="Details Already Exists";
				}
			}
		}
		
		return $msg;
	}
	
	public function viewAdmin()
	{
		$sql = "SELECT * FROM `admin_tbl`";
		$result = $this->conn->query($sql);
		if( $result ) {
			return $result;
		}
		return false;
	}
	
	public function profile($id)
	{
		$sql = "SELECT * FROM `roca_member_tbl` WHERE unique_id='$id'";
		$result = $this->conn->query($sql);
		if( $result ) {
			if ( $result->num_rows >= 1 ) {
				$data = $result->fetch_array();
				return $data;
			}
		}
		return false;
	}
	
	public function deleteAdmin($id)
	{
		$sql="DELETE FROM `admin_tbl` WHERE unique_id='$id'";
		if( $this->conn->query($sql) ) {
			return true;
		} else {
			return false;
		}
	}
}
?>