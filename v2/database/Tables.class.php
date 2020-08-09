<?php
class Tables
{
    protected $conn;

    public function __construct($connect)
    {
        $this->conn = $connect;
	}
	
	public function directory()
	{
		if (!file_exists('../vendor/extra')) {
			mkdir('../vendor/extra', 0777, true); 
			if (!file_exists('../vendor/extra/books')) {
				mkdir('../vendor/extra/books', 0777, true);  
			}
			if (!file_exists('../vendor/extra/events')) {
				mkdir('../vendor/extra/events', 0777, true);  
			}
			if (!file_exists('../vendor/extra/manual')) {
				mkdir('../vendor/extra/manual', 0777, true);  
			}
			if (!file_exists('../vendor/extra/material')) {
				mkdir('../vendor/extra/material', 0777, true);  
			}
			if (!file_exists('../vendor/extra/members')) {
				mkdir('../vendor/extra/members', 0777, true);  
			}
			if (!file_exists('../vendor/extra/notice')) {
				mkdir('../vendor/extra/notice', 0777, true);  
			} 
			if (!file_exists('../vendor/extra/payment')) {
				mkdir('../vendor/extra/payment', 0777, true);  
			}
		}		
	}

    public function admin()
    {
        $sql = "CREATE TABLE IF NOT EXISTS `admin_tbl` ( 
		`unique_id` VARCHAR(20) NOT NULL ,  
		`username` VARCHAR(50) NOT NULL , 
		`password` VARCHAR(50) NOT NULL , 
		`role` VARCHAR(20) NOT NULL , 
		PRIMARY KEY (`unique_id`), 
		UNIQUE (`username`) )";

        if ( $this->conn->query($sql) ) {
            if ($this->addAdmin()) {
				//echo "admin true";
                return true;
            }
        }
		//echo "admin false";
        return false;
    }

    public function member()
    {
        $sql = "CREATE TABLE IF NOT EXISTS `roca_member_tbl` ( 
		`id` INT(10) NOT NULL AUTO_INCREMENT , 
		`unique_id` VARCHAR(15) NOT NULL , 
		`name` VARCHAR(50) NOT NULL , 
		`roll` VARCHAR(10) NOT NULL , 
		`department` VARCHAR(10) NOT NULL , 
		`contact` VARCHAR(10) NOT NULL , 
		`email` VARCHAR(50) NOT NULL , 
		`date` VARCHAR(10) NOT NULL , 
		`year` VARCHAR(4) NOT NULL, 
		`coordinator` VARCHAR(3) NOT NULL , 
		`field` VARCHAR(50) NOT NULL , 
		`head` VARCHAR(3) NOT NULL , 
		`photo` VARCHAR(500) NOT NULL , 
		`password` VARCHAR(50) NOT NULL , 
		`paid` VARCHAR(3) NOT NULL , 
		PRIMARY KEY (`id`), 
		UNIQUE (`unique_id`), 
		UNIQUE (`roll`), 
		UNIQUE (`email`) )";

        if ( $this->conn->query($sql) ) {
			//echo "member true";
            return true;
        }
		//echo "member false";
        return false;
    }
	
	public function notice()
    {
        $sql = "CREATE TABLE IF NOT EXISTS `notice_tbl` ( 
		`id` INT NOT NULL AUTO_INCREMENT ,
		`date` VARCHAR(10) NOT NULL ,
		`heading` VARCHAR(100) NOT NULL ,
		`notice` TEXT NOT NULL ,
		`requirement` TEXT NOT NULL ,
		`announcement` TEXT NOT NULL ,
		`venue` VARCHAR(50) NOT NULL ,
		`day` VARCHAR(10) NOT NULL ,
		`time` VARCHAR(10) NOT NULL ,
		`cost` INT(4) NOT NULL ,
		`photo` VARCHAR(500) NOT NULL ,
		`event` VARCHAR(6) NOT NULL ,
		`link` BIT(1) NOT NULL ,
		`member` BIT(1) NOT NULL ,
		`subscriber` BIT(1) NOT NULL ,
		PRIMARY KEY(`id`))";

        if ( $this->conn->query($sql) ) {
			//echo "notice true";
            return true;
        }
		//echo "notice false";
        return false;
    }
	
	public function event()
	{
		$sql = "CREATE TABLE IF NOT EXISTS `event_tbl` ( 
		`id` INT(10) NOT NULL AUTO_INCREMENT , 
		`event` VARCHAR(500) NOT NULL , 
		`date` DATE NOT NULL , 
		PRIMARY KEY (`id`))";
		
		if ( $this->conn->query($sql) ) {
			//echo "event true";
            return true;
        }
		//echo "event false";
        return false;
	}
	
	public function gallery()
	{
		$sql = "CREATE TABLE IF NOT EXISTS `gallery_tbl` ( 
		`id` INT(10) NOT NULL AUTO_INCREMENT , 
		`gallery` VARCHAR(500) NOT NULL , 
		`event_id` INT(10) NOT NULL , 
		PRIMARY KEY (`id`))";
		
		if ( $this->conn->query($sql) ) {
			//echo "gallery true";
            return true;
        }
		//echo "gallery false";
        return false;
	}
	
	public function coordinator()
	{
		$sql = "CREATE TABLE IF NOT EXISTS `coordinators_tbl` ( 
		`id` INT(10) NOT NULL AUTO_INCREMENT , 
		`unique_id` VARCHAR(15) NOT NULL , 
		`field` TEXT NOT NULL , 
		`head` VARCHAR(3) NOT NULL , 
		PRIMARY KEY (`id`), 
		UNIQUE (`unique_id`))";
		
		if ( $this->conn->query($sql) ) {
			//echo "coordinator true";
            return true;
        }
		//echo "coordinator false";
        return false;
	}
	
	public function payment()
	{
		$sql = "CREATE TABLE IF NOT EXISTS `payment_tbl` ( 
		`id` INT(10) NOT NULL AUTO_INCREMENT , 
		`mode` VARCHAR(15) NOT NULL, 
		`upi` VARCHAR(50) NOT NULL, 
		`qr_code` VARCHAR(500) NOT NULL , 
		PRIMARY KEY (`id`))";
		
		if ( $this->conn->query($sql) ) {
			//echo "payment true";
            return true;
        }
		//echo "payment false";
        return false;
	}
	
    private function addAdmin()
    {
        $rocaid = "ROCA2019GYAN";
        $username = md5("gyankit");
        $password = md5("Gy@n26548");
        $role = "ADMINISTRATOR";

        $sql = "SELECT * FROM `admin_tbl` WHERE unique_id = '$rocaid'";
		$result = $this->conn->query($sql);

        if ($result->num_rows <= 0) {
			$sql = "INSERT INTO `admin_tbl` VALUES ('$rocaid', '$username', '$password', '$role')";
            if ( $this->conn->query($sql) ) {
				//echo "add true";
                return true;
            } else {
				echo "add false";
                return false;
            }
        }
		echo "already add";
        return true;
    }
	
	public function registartion()
	{
		$sql = "CREATE TABLE IF NOT EXISTS `registration_tbl`(`amount` INT(3) NOT NULL)";
		if ( $this->conn->query($sql) ) {
			//echo "registration true";
            return true;
        }
		//echo "registration false";
        return false;
	}
	
	public function studymaterial()
	{
		$sql = "CREATE TABLE IF NOT EXISTS `studymaterial_tbl` ( 
		`id` INT(10) NOT NULL AUTO_INCREMENT , 
		`department` VARCHAR(3) NOT NULL , 
		`year` VARCHAR(3) NOT NULL , 
		`semester` VARCHAR(3) NOT NULL , 
		`code` VARCHAR(10) NOT NULL , 
		`subject` VARCHAR(100) NOT NULL , 
		`topic` VARCHAR(100) NOT NULL , 
		`material` TEXT NOT NULL , 
		PRIMARY KEY (`id`))";
		
		if ( $this->conn->query($sql) ) {
			//echo "studymaterial true";
            return true;
        }
		//echo "studymaterial false";
        return false;
	}
	
	public function labmanual()
	{
		$sql = "CREATE TABLE IF NOT EXISTS `labmanual_tbl` ( 
		`id` INT(10) NOT NULL AUTO_INCREMENT , 
		`department` VARCHAR(3) NOT NULL , 
		`year` VARCHAR(3) NOT NULL , 
		`semester` VARCHAR(3) NOT NULL , 
		`code` VARCHAR(10) NOT NULL , 
		`subject` VARCHAR(100) NOT NULL , 
		`manual` TEXT NOT NULL , 
		PRIMARY KEY (`id`))";
		
		if ( $this->conn->query($sql) ) {
			//echo "labmanual true";
            return true;
        }
		//echo "labmanual false";
        return false;
	}
	
	public function books()
	{
		$sql = "CREATE TABLE IF NOT EXISTS `books_tbl` ( 
		`id` INT(10) NOT NULL AUTO_INCREMENT , 
		`department` VARCHAR(3) NOT NULL , 
		`year` VARCHAR(3) NOT NULL , 
		`semester` VARCHAR(3) NOT NULL , 
		`code` VARCHAR(10) NOT NULL , 
		`subject` VARCHAR(100) NOT NULL , 
		`book` TEXT NOT NULL , 
		`link` TEXT NOT NULL , 
		PRIMARY KEY (`id`))";
		
		if ( $this->conn->query($sql) ) {
			//echo "books true";
            return true;
        }
		//echo "books false";
        return false;
	}
	
	public function subscriber()
	{
		$sql = "CREATE TABLE IF NOT EXISTS `subscriber_tbl` ( 
		`email` VARCHAR(50) NOT NULL , 
		PRIMARY KEY (`email`))";
		
		if ( $this->conn->query($sql) ) {
			//echo "subscriber true";
            return true;
        }
		//echo "subscriber false";
        return false;
	}
	
	public function query()
	{
		$sql = "CREATE TABLE IF NOT EXISTS `query_tbl` ( 
		`id` INT(10) NOT NULL AUTO_INCREMENT , 
		`date` DATETIME NOT NULL , 
		`name` VARCHAR(30) NOT NULL , 
		`email` VARCHAR(30) NOT NULL , 
		`subject` TEXT NOT NULL , 
		`message` TEXT NOT NULL , 
		PRIMARY KEY (`id`))";
		
		if ( $this->conn->query($sql) ) {
			//echo "query true";
            return true;
        }
		//echo "query false";
        return false;
	}

	public function participant()
	{
		$sql = "CREATE TABLE IF NOT EXISTS `participation_tbl` ( 
			`id` INT(10) NOT NULL , 
			`name` VARCHAR(50) NOT NULL , 
			`roll` VARCHAR(10) NOT NULL , 
			`email` VARCHAR(50) NOT NULL , 
			`date` VARCHAR(10) NOT NULL , 
			`paid` VARCHAR(3) NOT NULL , 
			`mode` VARCHAR(30) NOT NULL , 
			`transaction` VARCHAR(30) NOT NULL , 
			PRIMARY KEY (`id`,`email`))";
		
		if ( $this->conn->query($sql) ) {
			//echo "participant true";
            return true;
        }
		//echo "participant false";
        return false;
	}

	public function register()
	{
		$sql = "CREATE TABLE IF NOT EXISTS `member_register_tbl` (
    		`unique_id` VARCHAR(15) NOT NULL ,
    		`mode` VARCHAR(30) NOT NULL ,
    		`transaction` VARCHAR(30) NOT NULL ,
    		PRIMARY KEY (`unique_id`))";
		
		if ( $this->conn->query($sql) ) {
			//echo "register true";
            return true;
        }
		//echo "register false";
        return false;
	}

	public function intrest()
	{
		$sql = "CREATE TABLE IF NOT EXISTS `intrest_tbl` (
			`id` INT(3) NOT NULL,
			`unique_id` VARCHAR(15) NOT NULL ,
			`date` VARCHAR(10) NOT NULL ,
			`event` VARCHAR(500) NOT NULL ,
			`paid` VARCHAR(3) NOT NULL ,
			`mode` VARCHAR(30) NOT NULL ,
			`transaction` VARCHAR(30) NOT NULL ,
			PRIMARY KEY (`unique_id`,`event`))";
		
		if ( $this->conn->query($sql) ) {
			//echo "intrest true";
            return true;
        }
		//echo "intrest false";
        return false;
	}

	public function comment()
	{
		$sql = "CREATE TABLE IF NOT EXISTS `comments_tbl` ( 
			`id` INT(10) NOT NULL AUTO_INCREMENT , 
			`date` DATETIME NOT NULL , 
			`topic` VARCHAR(100) NOT NULL , 
			`comment` TEXT NOT NULL , 
			`unique_id` VARCHAR(15) NOT NULL , 
			PRIMARY KEY (`id`))";
		
		if ( $this->conn->query($sql) ) {
			//echo "comment true";
            return true;
        }
		//echo "comment false";
        return false;
	}

	public function faq()
	{
		$sql = "CREATE TABLE IF NOT EXISTS `faq_tbl` ( 
			`id` INT(10) NOT NULL AUTO_INCREMENT , 
			`date` DATETIME NOT NULL , 
			`question` TEXT NOT NULL , 
			`answer` TEXT NOT NULL , 
			`unique_id` VARCHAR(15) NOT NULL , 
			PRIMARY KEY (`id`))";
		
		if ( $this->conn->query($sql) ) {
			//echo "faq true";
            return true;
        }
		//echo "faq false";
        return false;
	}

	public function registered()
	{
		$sql = "CREATE TABLE IF NOT EXISTS `registered_tbl` ( 
			`id` VARCHAR(15) NOT NULL ,
			`mode` VARCHAR(30) NOT NULL ,
			`transaction` VARCHAR(30) NOT NULL ,
			PRIMARY KEY (`id`))";
		
		if ( $this->conn->query($sql) ) {
			//echo "registerd true";
            return true;
        }
		//echo "registered false";
        return false;
	}
}
