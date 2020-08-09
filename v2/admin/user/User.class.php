<?php
require ("../../database/Database.class.php");

class User
{
    protected $conn, $fname;
	
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

    public function newUser($unique_id, $name, $roll, $dept, $contact, $email, $date, $year, $fil, $paid, $pass)
    {
		$sql = "SELECT * FROM `roca_member_tbl` WHERE unique_id='$unique_id'";
		$result = $this->conn->query($sql);
		
		if( $result ) {
			if( $result->num_rows == 0 ) {
				if ( $this->upload($fil) ) {
					
					$sql = "INSERT INTO `roca_member_tbl` VALUES(NULL, '$unique_id', '$name', '$roll', '$dept', '$contact', '$email', '$date', '$year' , 'NO' , 'Not Specified' , 'NO' , '$this->fname' , '$pass', '$paid')";
					$result = $this->conn->query($sql);
					
					if ( $result ) {
						if( $this->phpmail($name, $roll, $dept, $email) ) {
							header("location:view");
							$this->conn->close();
							exit();
						} else {
							$msg = "Error in sending email";
						}
						
						if( !$this->delete($unique_id, $this->fname) ) {
							$msg = "Error Occur...Contact Team ROCA";
						}
					
					} else {
						$msg = "Error Occur";
					}
				} else {
					$msg = "Error in Image Uploading";
				}
			} else {
				$msg = "User already present";
			}
		} else {
			$msg = "Error Occur";
		}
        
        return $msg;
    }
	
	public function viewUser()
	{
		$date = date('Y-m-d');
		$year = date('Y');
		if ($date < "$year-06-30") { $year = $year - 1; }
		$year = $year - 3;
		
		$sql = "SELECT * FROM `roca_member_tbl` WHERE year >= '$year' ORDER BY id DESC";
		$result = $this->conn->query($sql);
		
		if( $result ) {
			if ( $result->num_rows <= 0 ) {
				$result = false;
			}
		}
		
		return $result;
	}
	
	public function updateUser($id, $contact, $email, $date, $password, $fil, $pic)
	{
		if($fil['name'] == "") {
			if( $this->update($id, $contact, $email, $date, $password, $pic) ) {
				header("location:view");	
			} else {
				$msg = "Error Occur";
			}
		} else {
			if ( $this->upload($fil) ) {
				if( $this->update($id, $contact, $email, $date, $password, $this->fname) ) {
					$this->remove($pic);
					unset($_SESSION["user_id"]);
					header("location:view");
				} else {
					$msg = "Error Occur";
					$this->remove($this->fname);
				}
			} else {
				$msg = "Error in Photo Uploading";
			}
		}
		
		return $msg;
	}
	
	private function update($id, $contact, $email, $date, $password, $pic) 
	{
		$sql="UPDATE `roca_member_tbl` SET contact='$contact', email='$email', date='$date', password='$password',  photo='$pic' WHERE unique_id='$id'";
		$result = $this->conn->query($sql);
		
		return $result;
	}
	
	public function profile($id) 
	{
		$sql="SELECT * FROM `roca_member_tbl` WHERE unique_id='$id'";
		$result = $this->conn->query($sql);
		$data = $result->fetch_array();
		
		return $data;
	}
	
	public function deleteUser($id) 
	{
		$sql="SELECT photo FROM `roca_member_tbl` WHERE unique_id='$id'";
		$result = $this->conn->query($sql);
		$data = $result->fetch_array();
		
		$pic = $data["photo"];
		
		if( $this->delete($id, $pic) ) {
			return true;
		} else {
			return false;
		}
	}
	
	public function confirmation($id)
	{
		$sql="SELECT * FROM `roca_member_tbl` WHERE unique_id='$id'";
		$result = $this->conn->query($sql);
		$data = $result->fetch_array();
		
		$password = $data['password'];
		$email = $data['email'];
		$name = $data['name'];
		$pass = md5($password);
		
		$sql="UPDATE `roca_member_tbl` set paid='YES', password='$pass' where unique_id='$id'";
		$result = $this->conn->query($sql);

		$to = $data['email'];

		$subject = 'R O C A';

		$message = 
			'<html><body>
			<div style="background-color: #000000; font-weight: bold; text-align: center">
				<br>
				<h1 style="color:#ff0000">Region of Cognitive Activites</h1>
				<h2 style="color:#1459C7">Registration Confirmation</h2>
				<p style="color:#b8bfc1">'.$name.'</p>
				<p style="color:#b8bfc1">Registration Id : '.$id.'</p>
				<p style="color:#b8bfc1">Password  : '.$password.'</p>
				<p style="color:#b00fbf">You are Successfully Register.</p>
				<p style="color:#b00fbf">Use Registration id and Password for Login Purpose.</p>
				<br>
			</div>
			</body></html>';

		$header = 'MINE-VERSION : 1.0' . "\r\n" .
		  'Content-type: text/html; charset=iso-8859-1' . "\r\n" .
		  'FROM: clubroca2018@gmail.com' . "\r\n" .
		  'X-Mailer: PHP/' . phpversion();

		if( mail($to,$subject,$message,$header) ) {
			return true;
		} else {
			$sql="UPDATE `roca_member_tbl` set paid='NO', password='$password' where unique_id='$id'";
			$result = $this->conn->query($sql);
		}

		return false;
	}
	
	public function delete($id, $picture)
	{
		$sql = "DELETE FROM `roca_member_tbl` WHERE unique_id='$id'";
		if( $this->conn->query($sql) ) { 
			$this->remove($picture);
			return true;
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
        $this->fname = $fil['name'];
        $old = $fil['tmp_name'];
        $new = "../../vendor/extra/members/" . $this->fname;
        if (move_uploaded_file($old, $new)) {
            return true;
        }
        return false;
    }

    private function phpmail($name, $roll, $dept, $email)
    {
        $to = 'clubroca2018@gmail.com';
        $subject = 'REQUEST MAIL';
        $message =
            '<html><body>
					<div style="background-color: #000000; font-weight: bold; text-align: center">
						<br>
						<h1 style="color:#ff0000">Region of Cognitive Activites</h1>
						<p style="color:#b8bfc1">Mr. ' . $name . '</p>
						<p style="color:#b8bfc1">' . $roll . '</p>
						<p style="color:#b8bfc1">' . $dept . ' Department</p>
						<p style="color:#b00fbf">is Requested for Registration.</p>
						<p style="color:#b00fbf">Kindly Check all the Procedure.</p>
						<br>
					</div>
					</body></html>';

        $header = 'MINE-VERSION : 1.0' . "\r\n" .
            'Content-type: text/html; charset=iso-8859-1' . "\r\n" .
            'FROM: ' . $email . "\r\n" .
            'X-Mailer: PHP/' . phpversion();

        if (mail($to, $subject, $message, $header)) {
            return true;
        }
		return false;
    }
	
	public function unregisterUser()
	{	
		$sql = "SELECT * FROM `roca_member_tbl` WHERE paid='NO' ORDER BY id DESC";
		if( $result = $this->conn->query($sql) ) {
			return $result;
		}
		return false;
	}

	public function viewpay()
	{
		$sql = "SELECT * FROM `registered_tbl`";
		if($result = $this->conn->query($sql)) {
			if($result->num_rows > 0) {
				return $result;
			}
		}
		return false;
	}
	
	public function deletepay()
	{
		$sql = "TRUNCATE TABLE `registered_tbl`";
		if($this->conn->query($sql)) {
			return "All Data Successfully Deleted";
		}
		return "Error Occur";
	}

	public function member($id)
	{
		$sql = "SELECT * FROM `roca_member_tbl` WHERE unique_id='$id'";
		if( $result = $this->conn->query($sql) ) {
			$data = $result->fetch_array();
			return $data;
		}
		return false;
	}
}
