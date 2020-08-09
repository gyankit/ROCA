<?php
require("../../database/Database.class.php");

class Gallery
{
	protected $conn;
	
	public function __construct()
	{
		$db = new Database();
		$this->conn = $db->connect();
	}
    
    public function events($val)
    {
        $sql = "SELECT DISTINCT $val FROM `event_tbl`";
		if( $result = $this->conn->query($sql) ) {
			return $result;
		}
		return false;
    }

    public function viewevents($event, $year)
    {
        if($event=="" and $year=="") {
            $sql = "SELECT * FROM `event_tbl`";
        } elseif($year=="") {
            $sql = "SELECT * FROM `event_tbl` WHERE event='$event'";
        } elseif($event=="") {
            $sql = "SELECT * FROM `event_tbl` WHERE year(date)='$year'";
        } else {
            $sql = "SELECT * FROM `event_tbl` WHERE year(date)='$year' AND event='$event'";
        }
		if( $result = $this->conn->query($sql) ) {
			return $result;
		}
		return false;
    }
    
    public function picture($id)
    {
        $sql = "SELECT * FROM `gallery_tbl` WHERE event_id='$id' ORDER BY id DESC";
		if( $result = $this->conn->query($sql) ) {
			return $result;
		}
		return false;
    }

    public function contact()
	{
		$sql = "SELECT contact FROM `admin_tbl`, `roca_member_tbl` WHERE admin_tbl.unique_id=roca_member_tbl.unique_id AND role='ADMINISTRATOR'";
		if( $result = $this->conn->query($sql) ) {
			if( $result->num_rows == 1 ) {
				$data = $result->fetch_array();
				return $data['contact'];
			}
		}
		return "9534470240";
	}
	
	public function slideshows() 
    {
		$sql = "SELECT * FROM `gallery_tbl` ORDER BY id DESC";
        if( $result = $this->conn->query($sql) ) {
            if( $result->num_rows > 0 ) {
                return $result;
            }
        }
        return false;
	}
}