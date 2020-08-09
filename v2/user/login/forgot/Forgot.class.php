<?php
session_start();
if (isset($_SESSION['user_login']) and strcmp($_SESSION["user_login"], "login_success") == 0) {
    header("location:../home/home");
    exit();
}
require_once("../../../database/Database.class.php");

class Forgot
{
    protected $conn, $val;

    function __construct()
    {
        $db = new Database();
        $this->conn = $db->connect();
    }

    public function forgots($id, $email)
    {
        $sql = "SELECT * FROM `roca_member_tbl` WHERE unique_id='$id' AND email='$email' AND paid='YES'";
        if($result = $this->conn->query($sql)) {
            if( $result->num_rows == 0 ) {
                $error="Registration Id and Email Id not Found";
            } else {
                $error = $this->phpmail1($id, $email);
            }
        } else {
            $error = "Error Occur";
        }
        return $error;
    }

    public function phpmail1($id, $email)
    {  
        $subject='Password Change'; 
        $rand=mt_rand(000001, 999999); 
        $message = 
            '<html><body>
            <div style="background-color: #000000; font-weight: bold; text-align: center">
                <br>
                <h1 style="color:#ff0000">Region of Cognitive Activites</h1>
                <p style="color:#b8bfc1">As per your Request form Password Change for your ROCA Account.<br>Your OTP '.$rand.'<br>Copy & Paste or Enter this Code on the Website Page for Proceed further.<br><br>This OTP is valid for 30 Sec only.<br><br>If this is not You, Please Contact ROCA Team.</p>
                <p style="color:#b00fbf">Kindly follow all the Procedure.</p>
                <br>
            </div>
            </body></html>';
        
        $header = 'MINE-VERSION : 1.0' . "\r\n" .
            'Content-type: text/html; charset=iso-8859-1' . "\r\n" .
            'FROM: clubroca2018@gmail.com' . "\r\n" .
            'X-Mailer: PHP/' . phpversion();
        
        if(mail($email,$subject,$message,$header))
        {
            $enpt_rand=md5($rand);
            header("location:verify?id=$id&cd=$enpt_rand&email=$email");
        } else {
            return "Error in Sending Mail";
        }
    }

    public function updatepassword($id, $email, $pass, $pass1)
    {
        $sql = "UPDATE `roca_member_tbl` SET password='$pass' WHERE unique_id='$id'";
        if($result = $this->conn->query($sql)) {
            if( $this->phpmail2($id, $email, $pass1) ) {
                ?><script>alert("Password Successfully Updated");</script><?php
            } else {
                $error = "Error Occur";
            }
        } else {
            $error = "Error Occur";
        }
        return $error;
    }

    public function phpmail2($id, $email, $pass1)
    {
        $subject='Password Confirmation';
        $message = 
            '<html><body>
            <div style="background-color: #000000; font-weight: bold; text-align: center">
                <br>
                <h1 style="color:#ff0000">Region of Cognitive Activites</h1>
                <p style="color:#b00fbf">As per your Request, Your Password is successfully changed.</p>
                <p style="color:#b8bfc1">Reqistration Id : '.$id.'</p>
                <p style="color:#b8bfc1">Password : '.$pass1.'</p>
                <p style="color:#b00fbf">If this is not You, Please Contact ROCA Team.</p>
                <br>
            </div>
            </body></html>';
        
        $header = 'MINE-VERSION : 1.0' . "\r\n" .
            'Content-type: text/html; charset=iso-8859-1' . "\r\n" .
            'FROM: clubroca2018@gmail.com' . "\r\n" .
            'X-Mailer: PHP/' . phpversion();
        
        if(mail($email,$subject,$message,$header)) {
            return true;
        } else {
            return false;
        }
    }
}
