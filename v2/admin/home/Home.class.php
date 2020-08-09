<?php
require("../../database/Database.class.php");

class Home 
{
	protected $conn;
	protected $dt;
	protected $yr;
	
	public function __construct()
	{
		$db = new Database();
		$this->conn = $db->connect();
		
		$this->dt = date('Y-m-d');
	}
	
	private function year()
	{
		$this->yr = date('Y');
		if($this->dt < "$this->yr-06-30") 
		{ 
			$this->yr = $this->yr-1; 
		}
		return $this->yr;
	}
	
	public function member()
	{
		$sql = "SELECT * FROM `roca_member_tbl`";
		$result = $this->conn->query($sql);	
		if( $result ) { return $result->num_rows; }
		return 0;
	}
	
	public function subscriber()
	{
		$sql = "SELECT * FROM `subscriber_tbl`";
		$result = $this->conn->query($sql);	
		if( $result ) { return $result->num_rows; }
		return 0;
	}
	
	public function event()
	{
		$sql = "SELECT * FROM `event_tbl`";
		$result = $this->conn->query($sql);	
		if( $result ) { return $result->num_rows; }
		return 0;
	}
	
	public function gallery()
	{
		$sql = "SELECT * FROM `gallery_tbl`";
		$result = $this->conn->query($sql);	
		if( $result ) { return $result->num_rows; }
		return 0;
	}
	
	public function fourthyear()
	{
		$year = $this->year()-3;
		$sql = "SELECT * FROM `roca_member_tbl` WHERE year=$year";
		$result = $this->conn->query($sql);	
		if( $result ) { return $result->num_rows; }
		return 0;
	}
	
	public function thirdyear()
	{
		$year = $this->year()-2;
		$sql = "SELECT * FROM `roca_member_tbl` WHERE year=$year";
		$result = $this->conn->query($sql);	
		if( $result ) { return $result->num_rows; }
		return 0;
	}
	
	public function secondyear()
	{
		$year = $this->year()-1;
		$sql = "SELECT * FROM `roca_member_tbl` WHERE year=$year";
		$result = $this->conn->query($sql);	
		if( $result ) { return $result->num_rows; }
		return 0;
	}
	
	public function firstyear()
	{
		$year = $this->year();
		$sql = "SELECT * FROM `roca_member_tbl` WHERE year=$year";
		$result = $this->conn->query($sql);	
		if( $result ) { return $result->num_rows; }
		return 0;
	}
	
	public function coordinator()
	{
		$year2 = $this->year()-3;
		$year1 = $this->year()-1;
		$sql = "SELECT * FROM `roca_member_tbl` WHERE coordinator='YES' AND year BETWEEN '$year2' AND '$year1'";
		$result = $this->conn->query($sql);	
		if( $result ) { return $result->num_rows; }
		return 0;
	}
	
	public function notice()
	{
		$sql = "SELECT * FROM `notice_tbl` WHERE date > '$this->dt'";
		$result = $this->conn->query($sql);	
		if( $result ) { return $result->num_rows; }
		return 0;
	}
	
	public function intrest()
	{
		$sql = "SELECT * FROM `intrest_tbl`";
		$result = $this->conn->query($sql);	
		if( $result ) { return $result->num_rows; }
		return 0;
	}
	
	public function participation()
	{
		$sql = "SELECT * FROM `participation_tbl`";
		$result = $this->conn->query($sql);	
		if( $result ) { return $result->num_rows; }
		return 0;
	}
	
	public function payment()
	{
		$sql = "SELECT * FROM `payment_tbl`";
		$result = $this->conn->query($sql);	
		if( $result ) { return $result->num_rows; }
		return 0;
	}
	
	public function material()
	{
		$sql = "SELECT * FROM `material_tbl`";
		$result = $this->conn->query($sql);	
		if( $result ) { return $result->num_rows; }
		return 0;
	}
	
	public function manual()
	{
		$sql = "SELECT * FROM `manual_tbl`";
		$result = $this->conn->query($sql);	
		if( $result ) { return $result->num_rows; }
		return 0;
	}
	
	public function books()
	{
		$sql = "SELECT * FROM `books_tbl`";
		$result = $this->conn->query($sql);	
		if( $result ) { return $result->num_rows; }
		return 0;
	}
	
	public function comments()
	{
		$sql = "SELECT * FROM `comments_tbl`";
		$result = $this->conn->query($sql);	
		if( $result ) { return $result->num_rows; }
		return 0;
	}
	
	public function faq()
	{
		$sql = "SELECT * FROM `faq_tbl`";
		$result = $this->conn->query($sql);	
		if( $result ) { return $result->num_rows; }
		return 0;
	}
	
	public function register()
	{
		$year2 = $this->year()-3;
		$year1 = $this->year();
		$sql = "SELECT * FROM `roca_member_tbl` WHERE paid='NO' AND year BETWEEN '$year2' AND '$year1'";
		$result = $this->conn->query($sql);	
		if( $result ) { return $result->num_rows; }
		return 0;
	}
	
	/*
	public function ()
	{
		$sql = "SELECT * FROM ``";
		$result = $this->conn->query($sql);	
		if( $result ) { return $result->num_rows; }
		return 0;
	}
	*/
	
	public function viewfaq()
	{
		$sql = "SELECT * FROM `faq_tbl` ORDER BY id DESC";
		if( $result = $this->conn->query($sql) ) {	
			if( $result->num_rows > 0 ) {
				return $result;
			}
		}
		return false;
	}
	
	public function profile($id)
	{
		$sql = "SELECT * FROM `roca_member_tbl` WHERE unique_id='$id'";
		if( $result = $this->conn->query($sql) ) {	
			return $result;
		}
		return false;
	}
	
	public function updatefaq($id, $answer)
	{
		$sql = "UPDATE `faq_tbl` SET answer='$answer' WHERE id=$id";
		if( $this->conn->query($sql) ) {	
			return "Reply Sent";
		}
		return "Error in Reply";
	}
	
	public function viewreview()
	{
		$sql="SELECT * FROM `comments_tbl` ORDER BY id DESC";
		if( $result = $this->conn->query($sql) ) {	
			return $result;
		}
		return false;
	}
	
	public function deletereview($id)
	{
		$sql="DELETE FROM `comments_tbl` WHERE id='$id'";
		if( $this->conn->query($sql) ) {	
			return "Deleted";
		}
		return "Error Occur";
	}
	
	public function viewquery()
	{
		$sql="SELECT * FROM `query_tbl` ORDER BY id DESC";
		if( $result = $this->conn->query($sql) ) {	
			return $result;
		}
		return false;
	}
	
	public function replyquery($id, $name, $email, $sub, $msg, $ans)
	{
		
	}
}