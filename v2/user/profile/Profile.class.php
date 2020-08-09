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
    
    public function profiles($user)
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

    private function remove($picture)
	{
		$pics=glob("../../vendor/extra/members/$picture");
		foreach($pics as $pic) {
			if(is_file($pic)) {
				unlink($pic);
			}
		}
	}
	
    private function upload($fil)
    {
        $fname = $fil['name'];
        $old = $fil['tmp_name'];
        $new = "../../vendor/extra/members/" . $fname;
        if (move_uploaded_file($old, $new)) {
            return $fname;
        }
        return false;
    }

    public function update($contact, $email, $date, $fil, $pic, $pass, $user)
    {
        if($fil['name'] != "") { 
            $fname = $this->upload($fil); 
            if(!$fname) { 
                return "Error in Picture Uploading"; 
            }
            $sql  = "UPDATE `roca_member_tbl` SET contact='$contact', email='$email', date='$date', password='$pass', photo='$fname' WHERE unique_id='$user'";
            $this->remove($pic);
        } else {
            $sql  = "UPDATE `roca_member_tbl` SET contact='$contact', email='$email', date='$date', password='$pass' WHERE unique_id='$user'";
        }
        if($this->conn->query($sql)) {
            return "Profile Updated";
        }
        $this->remove($fname);
        return "Error Occur";
    }
}