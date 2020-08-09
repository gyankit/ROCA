<?php
require("../../database/Database.class.php");

class Register
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

    public function phpmail1($email, $name, $roll, $dept, $fname)
    {
        $to='clubroca2018@gmail.com';
        $subject='REQUEST MAIL';
        $message = 
            '<html><body>
            <div style="background-color: #000000; font-weight: bold; text-align: center">
                <br>
                <h1 style="color:#ff0000">Region of Cognitive Activites</h1>
                <p style="color:#b8bfc1">'.$name.'</p>
                <p style="color:#b8bfc1">'.$roll.'</p>
                <p style="color:#b8bfc1">'.$dept.' Department</p>
                <p style="color:#b00fbf">is Requested for Registration.</p>
                <p style="color:#b00fbf">Kindly follow all the procedure to confirm your registration.</p>
                <p><a href="https://www.roca.rahul.ac.in/user/register/payment?id=<?= $unique_id; ?>">click here </a> to complete your payment</p>
                <br>
            </div>
            </body></html>';

        $header = 'MINE-VERSION : 1.0' . "\r\n" .
            'Content-type: text/html; charset=iso-8859-1' . "\r\n" .
            'FROM: '.$email . "\r\n" .
            'X-Mailer: PHP/' . phpversion();

        if(mail($to,$subject,$message,$header)) {
        ?>
        <script>
            alert("Your Registration Form Successfully Uploaded. \nCheck your Mail.");
            window.location.href = "../index";
        </script>
        <?php
        } else {
            $this->remove($fname);
            $this->conn->query("DELETE FROM `roca_member_tbl` WHERE email='$email'");
            return "Failed in Sending Mail";
        }		
    }
    
    public function registration($id, $name, $roll, $dept, $contact, $email, $date, $year, $fil, $password)
    {
        if($fname = $this->upload($fil)) {
            $sql = "INSERT INTO `roca_member_tbl` VALUES(NULL, '$id', '$name', '$roll', '$dept', '$contact', '$email', '$date', '$year' , 'NO' , 'Not Specified' , 'NO' , '$fname' , '$password', 'NO')";
            if($this->conn->query($sql)) {
                $error = $this->phpmail1($email, $name, $roll, $dept, $fname, $id);
            } else {
                $this->remove($fname);
                $error = "Details Already Exists...";
            }
        } else {
            $error = "Error in Picture Uploading...";
        } 
        return $error;
    }

    public function amount()
    {
        $sql = "SELECT * FROM `registration_tbl`";
        if($result = $this->conn->query($sql)) {
            if($result->num_rows == 1) {
                $data = $result->fetch_array();
                return $data["amount"];
            }
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
    
    public function registered($mode, $transaction, $id)
	{
		$sql = "INSERT INTO `registered_tbl` VALUES('$id', '$mode', '$transaction')";
		if($this->conn->query($sql)) {
			return true;
		}
		return false;
	}
}