<?php
class Database 
{
    protected $host, $user, $pass, $database;

    public function __construct() 
    {
        $this->host = "localhost";
        //Username & Password
        $this->user = "root";
        $this->pass = "";
        //Database Name
        $this->database = "roca";
    }

    public function connect()
    {
        $conn = new mysqli( $this->host, $this->user, $this->pass, $this->database );
        if( mysqli_connect_errno() )
        {
            $_SESSION["db_error"] = mysqli_connect_error();
            header ("location:../error/503");
        }
        else
        {
            return $conn;
        }
    }
}

?>