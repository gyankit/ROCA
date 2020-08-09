<?php
require ("../../database/Database.class.php");

class Payment
{
    protected $conn;
	
    public function __construct()
    {
        $db = new Database();
        $this->conn = $db->connect();
    }
	
	public function addPay($mode, $upi, $fil) 
	{
		if($fil['name'] == "" ) {
			$sql = "INSERT INTO `payment_tbl` VALUES(NULL, '$mode', '$upi', '')";
			if( $this->conn->query($sql) ) {
				header("location:view");
			} else {
				$error = "Error Occur";
			}
		} else {
			if( $fname = $this->upload($fil) ) {
				$sql = "INSERT INTO `payment_tbl` VALUES(NULL, '$mode', '$upi', '$fname')";
				if( $this->conn->query($sql) ) {
					header("location:view");
				} else {
					$error = "Error Occur";
				}
			} else {
				$error = "Error in Image Uploading";
			}
		}
		return $error;
	}
	
	private function upload($fil)
    {
        $fname = $fil['name'];
        $old = $fil['tmp_name'];
        $new = "../../vendor/extra/payment/" . $fname;
        if (move_uploaded_file($old, $new)) {
            return $fname;
        }
        return false;
    }
	
	private function remove($picture)
	{
		$pics=glob("../../vendor/extra/payment/$picture");
		foreach($pics as $pic) {
			if(is_file($pic)) {
				unlink($pic);
			}
		}
	}
	
	public function viewPay()
	{
		$sql = "SELECT * FROM `payment_tbl`";
		if( $result = $this->conn->query($sql) ) {
			return $result;
		}
		return false;
	}
	
	public function view($id)
	{
		$sql = "SELECT * FROM `payment_tbl` WHERE id='$id'";
		if( $result = $this->conn->query($sql) ) {
			$data = $result->fetch_array();
			return $data;
		}
		return false;
	}
	
	public function updatePay($id, $upi, $fil, $pic)
	{
		if($fil['name'] == "") {
			if( $this->update($id, $upi, $pic) ) {
				unset($_SESSION["pay_id"]);
				header("location:view");
			} else {
				$msg = "Error Occur";
			}
		} else {
			if ( $fname = $this->upload($fil) ) {
				if( $this->update($id, $upi, $fname) ) {
					$this->remove($pic);
					unset($_SESSION["pay_id"]);
					header("location:view");
				} else {
					$msg = "Error Occur";
					$this->remove($fname);
				}
			} else {
				$msg = "Error in Photo Uploading";
			}
		}
		
		return $msg;
	}
	
	private function update($id, $upi, $pic)
	{
		$sql="UPDATE `payment_tbl` SET upi='$upi', qr_code='$pic' WHERE id='$id'";
		if( $this->conn->query($sql) ) {
			return true;
		}
		return false;
	}
    
	public function deletePay($id) 
	{
		$data = $this->view($id);
		$pic = $data["qr_code"];
		
		if( $this->delete($id, $pic) ) {
			return true;
		}
		return false;
	}
	
	private function delete($id, $picture)
	{
		$sql = "DELETE FROM `payment_tbl` WHERE id='$id'";
		if( $this->conn->query($sql) ) { 
			$this->remove($picture);
			return true;
		}
		return false;
	}
}