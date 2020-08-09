<?php
require ("../../database/Database.class.php");

class Study
{
    protected $conn, $fname;
	
    public function __construct()
    {
        $db = new Database();
        $this->conn = $db->connect();
    }
	
    private function upload($folder, $fil)
    {
        $fname = $fil['name'];
        $old = $fil['tmp_name'];
        $new = "../../vendor/extra/".$folder."/".$fname;
        if (move_uploaded_file($old, $new)) {
            return $fname;
        }
        return false;
    }
	
	private function remove($folder, $picture)
	{
		$pics=glob("../../vendor/extra/$folder/$picture");
		foreach($pics as $pic) {
			if(is_file($pic)) {
				unlink($pic);
			}
		}
	}
	
	public function addstudymaterial($dept, $year, $sem, $code, $subject, $topic, $fil)
	{
		$fname = $this->upload("material", $fil);
		if( !$fname ) {
			$error = "Error in file Upload";
		} else {
			$sql = "INSERT INTO `studymaterial_tbl` VALUES(NULL, '$dept', '$year', '$sem', '$code', '$subject', '$topic', '$fname')";
			if( $this->conn->query($sql) ) {
				header("location:studymaterialView");
			}
			else {
				$this->remove("material", $fname);
				$error = "Error Occur";
			}
		}
		return $error;
	}
	
	public function addlabmanual($dept, $year, $sem, $code, $subject, $fil)
	{
		$fname = $this->upload("manual", $fil);
		if( !$fname ) {
			$error = "Error in file Upload";
		} else {
			$sql = "INSERT INTO `labmanual_tbl` VALUES(NULL, '$dept', '$year', '$sem', '$code', '$subject', '$fname')";
			if( $this->conn->query($sql) ) {
				header("location:labmanualView");
			}
			else {
				$this->remove("manual", $fname);
				$error = "Error Occur";
			}
		}
		return $error;
	}
	
	public function addbook($dept, $year, $sem, $code, $subject, $link, $fil)
	{
		if( $fil['name']=="" ) { 
			$sql = "INSERT INTO `books_tbl` VALUES(NULL, '$dept', '$year', '$sem', '$code', '$subject', '', '$link')";
			if( $this->conn->query($sql) ) {
				header("location:bookView");
			} else {
				$error = "Error Occur";
			}
		}
		elseif( $link=="" ) {
			$fname = $this->upload("books", $fil);
			if( !$fname ) {
				$error = "Error in file Upload";
			} else {
				$sql = "INSERT INTO `books_tbl` VALUES(NULL, '$dept', '$year', '$sem', '$code', '$subject', '$fname', '')";
				if( $this->conn->query($sql) ) {
					header("location:bookView");
				}
				else {
					$this->remove("books", $fname);
					$error = "Error Occur";
				}
			}
		} else {
			$fname = $this->upload("books", $fil);
			if( !$fname ) {
				$error = "Error in file Upload";
			} else {
				$sql = "INSERT INTO `books_tbl` VALUES(NULL, '$dept', '$year', '$sem', '$code', '$subject', '$fname', '$link')";
				if( $this->conn->query($sql) ) {
					header("location:bookView");
				}
				else {
					$this->remove("books", $fname);
					$error = "Error Occur";
				}
			}
		}
		return $error;
	}
	
	public function viewstudymaterial()
	{
		$sql = "SELECT * FROM `studymaterial_tbl`";
		if( $result = $this->conn->query($sql) ) {
			if( $result->num_rows > 0 ) {
				return $result;
			}
		}
		return false;
	}
	
	public function viewlabmanual()
	{
		$sql = "SELECT * FROM `labmanual_tbl`";
		if( $result = $this->conn->query($sql) ) {
			if( $result->num_rows > 0 ) {
				return $result;
			}
		}
		return false;
	}
	
	public function viewbooks()
	{
		$sql = "SELECT * FROM `books_tbl`";
		if( $result = $this->conn->query($sql) ) {
			if( $result->num_rows > 0 ) {
				return $result;
			}
		}
		return false;
	}
	
	public function deletestudymaterial($id, $file)
	{
		$sql = "DELETE FROM `studymaterial_tbl` WHERE id='$id'";
		if( $result = $this->conn->query($sql) ) {
			$this->remove("material", $file);	
			return true;
		}
		return false;
	}
	
	public function deletelabmanual($id, $file)
	{
		$sql = "DELETE FROM `labmanual_tbl` WHERE id='$id'";
		if( $result = $this->conn->query($sql) ) {
			$this->remove("manual", $file);	
			return true;
		}
		return false;
	}
	
	public function deletebook($id, $file)
	{
		$sql = "DELETE FROM `books_tbl` WHERE id='$id'";
		if( $result = $this->conn->query($sql) ) {
			$this->remove("books", $file);	
			return true;
		}
		return false;
	}
	
}