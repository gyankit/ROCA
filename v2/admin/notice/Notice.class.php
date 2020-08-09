<?php
require("../../database/Database.class.php");

class Notice
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
	
	public function newNotice( $date, $heading, $notices, $requirement, $announce, $venue, $day, $time, $cost, $event, $fil )
    {
		if ( $this->upload($fil) ) {
			$sql = "INSERT INTO `notice_tbl` VALUES(NULL, '$date', '$heading', '$notices', '$requirement', '$announce', '$venue', '$day', '$time', '$cost', '$this->fname', '$event', 0, 0, 0 )";
			if ( $this->conn->query($sql) ) {
				header("location:view");
			} else {
				$this->remove($this->fname);
				$msg="Error Occur....Try After Sometime..!!!";
			}
		} else {
			$msg = "Error in Image Uploading";   
		}
        return $msg;
    }
	
	public function updateNotice($id, $heading, $notices, $requirement, $announce, $venue, $day, $time, $cost, $event, $fil, $pic)
	{
		if($fil['name'] == "") {
			if( $this->update($id, $heading, $notices, $requirement, $announce, $venue, $day, $time, $cost, $event , $pic) ) {
				unset($_SESSION["notice_id"]);
				header("location:view");
			} else {
				$msg = "Error Occur";
			}
		} else {
			if ( $this->upload($fil) ) {
				if( $this->update($id, $heading, $notices, $requirement, $announce, $venue, $day, $time, $cost, $event, $this->fname) ) {
					$this->remove($pic);
					unset($_SESSION["notice_id"]);
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
	
	private function update($id, $heading, $notices, $requirement, $announce, $venue, $day, $time, $cost, $event, $pic)
	{
		$sql = "UPDATE `notice_tbl` SET heading='$heading', notice='$notices', requirement='$requirement', announcement='$announce', venue='$venue', day='$day', time='$time', cost='$cost', photo='$pic', event='$event' WHERE id='$id'";
		$result = $this->conn->query($sql);
		
		return $result;
	}
	
	public function deleteNotice($id) 
	{
		$data = $this->note($id);
		$pic = $data["photo"];
		
		if( $this->delete($id, $pic) ) {
			return true;
		} else {
			return false;
		}
	}
	
	private function delete($id, $picture)
	{
		$sql = "DELETE FROM `notice_tbl` WHERE id='$id'";
		if( $this->conn->query($sql) ) { 
			$this->remove($picture);
			return true;
		}
		return false;
	}
	
	public function note($id) {
		$sql = "SELECT * FROM `notice_tbl` WHERE id='$id'";
		if( $result = $this->conn->query($sql) ) {
			if($result->num_rows > 0) {
				$data = $result->fetch_array();
				return $data;
			}
		}
		return false;
	}
	
	public function viewNotice()
	{
		$sql = "SELECT * FROM `notice_tbl`";
		if( $result = $this->conn->query($sql) ) {
			return $result;
		}
		return false;
	}
	
	public function active($id)
	{
		$sql = "UPDATE `notice_tbl` SET link=1 WHERE id='$id'";
		$this->conn->query($sql);
	}
	
	public function deactive($id)
	{
		$sql = "UPDATE `notice_tbl` SET link=0 WHERE id='$id'";
		$this->conn->query($sql);
	}
	
	public function permanentDeactive($date)
	{
		$sql = "UPDATE `notice_tbl` SET link=0 WHERE date='$date'";
		$this->conn->query($sql);
	}
	
	private function upload($fil)
    {
        $this->fname = $fil['name'];
        $old = $fil['tmp_name'];
        $new = "../../vendor/extra/notice/".$this->fname;
        if (move_uploaded_file($old, $new)) {
			return true;
        }
        return false;
    }
	
	private function remove($picture)
	{
		$pics=glob("../../vendor/extra/notice/$picture");
		foreach($pics as $pic) {
			if(is_file($pic)) {
				unlink($pic);
			}
		}
	}
	
	public function publish()
	{
		$date=date('Y-m-d');
		$sql="SELECT * FROM `notice_tbl` WHERE date >= '$date'";
		if( !$result = $this->conn->query($sql) ) {
			$result = false;
		}
		return $result;
	}
	
	public function member($id, $year) 
	{
		$data = $this->note($id);
		$heading = $data['heading'];
		$date = $data['date'];
		
		$sql = "SELECT email FROM `roca_member_tbl` WHERE year >= '$year'";
		$member = $this->conn->query($sql);
		if( !$member ) {
			return false;
		} elseif ( $member->num_rows <= 0 ) {
			return false;
		} else {
			while ( $email = $member->fetch_array() )
			{
				$to=$email['email'];
				$subject='R O C A';
				$link='http://www.roca.rahul.ac.in'."\r\n";
				$message = 
					'<html><body>
					<div style="background-color: #000000; font-weight: bold; text-align: center">
						<br>
						<h1 style="color:#ff0000">Region of Cognitive Activites</h1>
						<h2 style="color:#1459C7">Event Notice</h2>
						<h3 style="color:#b8bfc1">'.$heading.'</h3>
						<p style="color:#b8bfc1">Event Date : '.$date.'</p>
						<p style="color:#b00fbf">If you are intrested follow the below link to take part.</p>
						<p style="color:#b8bfc1">'.$link.'</p>
						<br>
					</div>
					</body></html>';

				$header = 'MINE-VERSION : 1.0' . "\r\n" .
				  'Content-type: text/html; charset=iso-8859-1' . "\r\n" .
				  'FROM: clubroca2018@gmail.com' . "\r\n" .
				  'X-Mailer: PHP/' . phpversion();

				mail($to,$subject,$message,$header);
			}
		}
		
		$sql = "UPDATE `notice_tbl` SET member=1 where id='$id'";
		if( !$this->conn->query($sql) ) {
			return false;
		}
		
		return true;
	}
	
	public function subscriber($id) 
	{
		$data = $this->note($id);
		$heading = $data['heading'];
		$date = $data['date'];
		
		$sql = "SELECT email FROM `subscriber_tbl`";
		$member = $this->conn->query($sql);
		if( !$member ) {
			return false;
		} elseif ( $member->num_rows <= 0 ) {
			return false;
		} else {
			while ( $email = $member->fetch_array() )
			{
				$to=$email['email'];
				$subject='R O C A';
				$link='http://www.roca.rahul.ac.in'."\r\n";
				$message = 
					'<html><body>
					<div style="background-color: #000000; font-weight: bold; text-align: center">
						<br>
						<h1 style="color:#ff0000">Region of Cognitive Activites</h1>
						<h2 style="color:#1459C7">Event Notice</h2>
						<h3 style="color:#b8bfc1">'.$heading.'</h3>
						<p style="color:#b8bfc1">Event Date : '.$date.'</p>
						<p style="color:#b00fbf">If you are intrested follow the below link to take part.</p>
						<p style="color:#b8bfc1">'.$link.'</p>
						<br>
					</div>
					</body></html>';

				$header = 'MINE-VERSION : 1.0' . "\r\n" .
				  'Content-type: text/html; charset=iso-8859-1' . "\r\n" .
				  'FROM: clubroca2018@gmail.com' . "\r\n" .
				  'X-Mailer: PHP/' . phpversion();

				mail($to,$subject,$message,$header);
			}
		}
		
		$sql = "UPDATE `notice_tbl` SET member=1 where id='$id'";
		if( !$this->conn->query($sql) ) {
			return false;
		}
		
		return true;
	}
}
?>