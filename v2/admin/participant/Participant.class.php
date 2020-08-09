<?php
require ("../../database/Database.class.php");

class Participant
{
    protected $conn, $fname;
	
    public function __construct()
    {
        $data = new Database();
        $this->conn = $data->connect();
    }
	
	public function upcommingEvent()
	{
		$date=date('Y-m-d');
		$sql = "SELECT * FROM `notice_tbl` WHERE date >= '$date' ORDER BY id ASC";
		if( $result = $this->conn->query($sql) ) {
			if( $result->num_rows > 0 ) {
				return $result;
			}
		}
		return false;
	}
	
	public function recentEvent()
	{
		$date=date('Y-m-d');
		$sql = "SELECT * FROM `notice_tbl` WHERE date < '$date' ORDER BY id ASC";
		if( $result = $this->conn->query($sql) ) {
			if( $result->num_rows > 0 ) {
				return $result;
			}
		}
		return false;
	}
	
	public function intrest($eid)
	{
		$sql = "SELECT * FROM `intrest_tbl` WHERE id='$eid'";
		if( $result = $this->conn->query($sql) ) {
			return $result;
		}
		return false;
	}
	
	public function participation($eid)
	{
		$sql = "SELECT * FROM `participation_tbl` WHERE id='$eid'";
		if( $result = $this->conn->query($sql) ) {
			return $result;
		}
		return false;
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
	
	private function event($eid) {
		$sql = "SELECT heading FROM `notice_tbl` WHERE id='$eid'";
		if($result = $this->conn->query($sql)) {
			$data = $result->fetch_array();
			return $data['heading'];
		}
	}
	
	public function memberConfirmation($eid, $uid)
	{
		if($data = $this->member($uid) and $event = $this->event($eid)) {		
			$name=$data['name'];
			$roll=$data['roll'];
			$dept=$data['department'];
			$to=$data['email'];
			
			$subject='R O C A';
			$message = 
				'<html><body>
				<div style="background-color: #000000; font-weight: bold; text-align: center">
					<br>
					<h1 style="color:#ff0000">Region of Cognitive Activites</h1>
					<h2 style="color:#1459C7">'.$event.'</h2>
					<p style="color:#b8bfc1">'.$name.'</p>
					<p style="color:#b8bfc1">'.$roll.'</p>
					<p style="color:#b8bfc1">'.$dept.' Department</p>
					<p style="color:#b00fbf">You are Successfully Register.</p>
					<p style="color:#b00fbf">All the Best for your Success.</p>
					<br>
				</div>
				</body></html>';

			$header = 'MINE-VERSION : 1.0' . "\r\n" .
			  'Content-type: text/html; charset=iso-8859-1' . "\r\n" .
			  'FROM: clubroca2018@gmail.com' . "\r\n" .
			  'X-Mailer: PHP/' . phpversion();

			if(mail($to, $subject, $message, $header)) {
				$sql = "UPDATE `intrest_tbl` SET paid='YES' WHERE unique_id='$uid' and id='$eid'";
				if($this->conn->query($sql)) {
					return true;
				}
			}
		}
		return false;
	}
	
	public function subscriberConfirmation($eid, $name, $roll, $to)
	{
		if($event = $this->event($eid)) {
			$subject='R O C A';

			$message = 
				'<html><body>
				<div style="background-color: #000000; font-weight: bold; text-align: center">
					<br>
					<h1 style="color:#ff0000">Region of Cognitive Activites</h1>
					<h2 style="color:#1459C7">'.$event.'</h2>
					<p style="color:#b8bfc1">'.$name.'</p>
					<p style="color:#b8bfc1">'.$roll.'</p>
					<p style="color:#b00fbf">You are Successfully Register.</p>
					<p style="color:#b00fbf">All the Best for your Success.</p>
					<br>
				</div>
				</body></html>';

			$header = 'MINE-VERSION : 1.0' . "\r\n" .
			  'Content-type: text/html; charset=iso-8859-1' . "\r\n" .
			  'FROM: clubroca2018@gmail.com' . "\r\n" .
			  'X-Mailer: PHP/' . phpversion();

			if(mail($to,$subject,$message,$header))
			{
				$sql = "UPDATE `participation_tbl` SET paid='YES' WHERE email='$to' and id='$eid'";
				if($this->conn->query($sql)) {
					return true;
				}
			}
		}
		return false;
	}
	
	
}