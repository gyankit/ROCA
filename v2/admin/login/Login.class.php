<?php
session_start();
if (isset($_SESSION['admin_login']) and strcmp($_SESSION["admin_login"], "login_success") == 0) {
    header("location:../home/home");
    exit();
}
require_once("../../database/Database.class.php");

class Login
{
    protected $conn, $val;

    function __construct()
    {
        $db = new Database();
        $this->conn = $db->connect();
    }

    public function newLogin($user1, $pass1)
    {
        $user = md5($user1);
        $pass = md5($pass1);

        $sql = "SELECT * FROM `admin_tbl` WHERE username = '$user'";
        if ($result = $this->conn->query($sql)) {
            if ($result->num_rows > 0) {
                $data = $result->fetch_array();
                if (strcmp($user, $data['username']) == 0) {
                    if (strcmp($pass, $data['password']) == 0) {
                        $_SESSION["admin_login"] = "login_success";
                        $_SESSION["admin_role"] = $data["role"];
                        $_SESSION["admin_id"] = $data["unique_id"];

                        if (strcmp($data["unique_id"], "ROCA2019GYAN") == 0) {
                            $_SESSION["admin_name"] = "GYAN ANKIT";
                        } else {
                            $this->profile($data["unique_id"]);
                        }

                        setcookie("rocaadminuser", $user1, time()+2592000);
                        setcookie("rocaadminpass", $pass1, time()+2592000);

                        $this->conn->close();
                        header("location:../home/home");
                        //exit();
                    } else {
                        $msg =  "Password Not Match";
                    }
                } else {
                    $msg = "Username Not Match";
                }
            } else {
                $msg = "Username/Password not Exists";
            }
        } else {
            $msg = "Error Occur";
        }
        $this->conn->close();
        return $msg;
    }
	
	private function profile($id) {
		$sql = "SELECT * FROM `roca_member_tbl` WHERE unique_id='$id'";
		$result = $this->conn->query($sql);
		$data = $result->fetch_array();
		$_SESSION["admin_name"] = $data["name"];
		$_SESSION["admin_photo"] = $data["photo"];
	}
}
