<?php
session_start();
if (isset($_SESSION['user_login']) and strcmp($_SESSION["user_login"], "login_success") == 0) {
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
        $user = $user1;
        $pass = md5($pass1);

        $sql = "SELECT * FROM `roca_member_tbl` WHERE unique_id = '$user'";
        if ($result = $this->conn->query($sql)) {
            if ($result->num_rows > 0) {
                $data = $result->fetch_array();
                if (strcmp($user, $data['unique_id']) == 0) {
                    if (strcmp($pass, $data['password']) == 0) {
                        $_SESSION["user_login"] = "login_success";
                        $_SESSION["user_id"] = $data["unique_id"];
						$_SESSION["user_name"] = $data["name"];
                        $_SESSION["user_photo"] = $data["photo"];
                        setcookie("rocauseruser", $user1, time()+2592000);
                        setcookie("rocauserpass", $pass1, time()+2592000);
                        $this->conn->close();
                        header("location:../home/home");
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
}
