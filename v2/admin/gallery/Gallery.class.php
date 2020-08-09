<?php
require_once("../../database/Database.class.php");

class Gallery
{
	protected $conn;
	
	public function __construct()
	{
		$db = new Database();
		$this->conn = $db->connect();
	}
	
	public function table($table)
	{
		$sql = "SELECT DISTINCT $table FROM `event_tbl` ORDER BY id DESC";
		if ( $result = $this->conn->query($sql) ) {
			return $result;
		}
		return false;
	}
	
	public function addGallery($event, $date, $fil)
	{
		$id = $this->event($event, $date);
		if( !$id ) {
			$msg = "Event and Date not Match";
		} else {
			$fname = $this->upload($fil);
			if( !$fname ) {
				$msg = "Error in Picture Uploading";
			} else {
				$sql = "INSERT INTO `gallery_tbl` VALUES(NULL, '$fname', '$id')";
				if( $this->conn->query($sql) ) {
					$msg="Picture Added";
				}else {
					$msg="Error Occur....Try after some time...!!!";
				}
			}
		}
		return $msg;
	}
	
	private function event($event, $date)
	{
		$sql = "SELECT id FROM `event_tbl` WHERE event='$event' AND date='$date'";
		if( $result = $this->conn->query($sql) ) {
			if( $result->num_rows == 1 ) {
				$data = $result->fetch_array();
				return $data['id'];
			}
		}
		return false;
	}
	
	private function upload($fil)
    {
        $fname = $fil['name'];
        $old = $fil['tmp_name'];
        $new = "../../vendor/extra/events/".$fname;
        if (move_uploaded_file($old, $new)) {
			return $fname;
        }
        return false;
    }
	
	private function remove($picture)
	{
		$pics=glob("../../vendor/extra/events/$picture");
		foreach($pics as $pic) {
			if(is_file($pic)) {
				unlink($pic);
				return true;
			}
		}
		return false;
	}
	
	public function viewGallery()
	{
		$sql = "SELECT * FROM `gallery_tbl` ORDER BY id DESC";
		if( $result = $this->conn->query($sql) ) {
			return $result;
		}
		return false;
	}
	
	public function viewevent($id)
	{
		$sql = "SELECT * FROM `event_tbl` WHERE id='$id'";
		if( $result = $this->conn->query($sql) ) {
			$data = $result->fetch_array();
			return $data;
		}
		return false;
	}
	
	public function picture($id)
	{
		$sql = "SELECT * FROM `gallery_tbl` WHERE id='$id'";
		if( $result = $this->conn->query($sql) ) {
			$data = $result->fetch_array();
			return $data;
		}
		return false;
	}
	
	public function delete($id)
	{
		$pic = $this->picture($id);{
		$sql = "DELETE FROM `gallery_tbl` WHERE id='$id'";
		if( $this->conn->query($sql) )
			$this->remove($pic["gallery"]);
			return true;
		}
		return false;
	}
}