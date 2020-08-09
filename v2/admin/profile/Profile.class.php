<?php
require("../../database/Database.class.php");

class Profile
{
	protected $conn;
	public function __construct()
	{
		$db = new Database();
		$this->conn = $db->connect();
	}
	
	public function _input($data)
    {
        $data = trim($data);
        $data = stripslashes($data);
        $data = htmlspecialchars($data);
        return $data;
    }
	
	public function adminProfile($id)
	{
		$sql = "SELECT * FROM `roca_member_tbl` WHERE unique_id='$id'";
		$result = $this->conn->query($sql);
		$data = $result->fetch_array();
		return $data;
	}
	
	public function profile($id)
	{
		$sql = "SELECT * FROM `admin_tbl` WHERE unique_id='$id'";
		$result = $this->conn->query($sql);
		$data = $result->fetch_array();
		return $data;
	}
	
	public function Reset()
	{
		$sql = "DROP TABLE `admin_tbl`";
		if( $this->conn->query($sql) ) {
			header ("location:../logout");
		}
	}
	
	public function Restart()
	{
		$sql = "DROP TABLE `admin_tbl`, `comments_tbl`, `coordinators_tbl`, `event_tbl`, `faq_tbl`, `gallery_tbl`, `intrest_tbl`, `member_register_tbl`, `notice_tbl`, `participation_tbl`, `payment_tbl`, `query_tbl`, `registration_tbl`, `roca_member_tbl`, `subscriber_tbl`";
		if( $this->conn->query($sql) ) {
			header ("location:../logout");
		}
	}
	
	public function Transfer($id, $user, $pass, $aid)
	{
		$sql = "SELECT * FROM `admin_tbl` WHERE unique_id='$id' AND role='EDITOR'";
		$result = $this->conn->query($sql);
		if( $result->num_rows == 0 )
		{
			$msg="Not a valid Registration Id";
		}
		else
		{
			$sql = "DELETE FROM `admin_tbl` WHERE unique_id='$id'";
			if( $this->conn->query($sql) )
			{
				$sql = "UPDATE `admin_tbl` SET unique_id='$id', username='$user', password='$pass' WHERE unique_id='$aid'";
				if( $result = $this->conn->query($sql) )
				{
					return true;
				}
				else
				{
					$msg="Sorry...Can't Update";
				}
			}
		}
		
		return $msg;
	}
	
}
?>