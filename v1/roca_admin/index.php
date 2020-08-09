<?php
//make connection with our database
include("config.php");

//search admin table present or not
$sql2="SHOW TABLES LIKE 'admin_tbl'";
$sr2=mysqli_query($cn,$sql2);

//if not then create
if(mysqli_num_rows($sr2)==0)
{
	$sql3="CREATE TABLE `id8469611_clubroca`.`admin_tbl` ( `unique_id` VARCHAR(20) NOT NULL ,  `username` VARCHAR(50) NOT NULL , `password` VARCHAR(50) NOT NULL , `role` VARCHAR(20) NOT NULL , PRIMARY KEY (`unique_id`), UNIQUE (`username`))";
	$sr3=mysqli_query($cn,$sql3);
	
	if($sr3==false)
	{
		echo "Database Admin Table Not Created...";
		exit();
	}
}

//search roca member table present or not
$sql4="SHOW TABLES LIKE 'roca_member_tbl'";
$sr4=mysqli_query($cn,$sql4);

//if not then create
if(mysqli_num_rows($sr4)==0)
{
	$sql5="CREATE TABLE `id8469611_clubroca`.`roca_member_tbl` ( `id` INT(10) NOT NULL AUTO_INCREMENT , `unique_id` VARCHAR(15) NOT NULL , `name` VARCHAR(50) NOT NULL , `roll` VARCHAR(10) NOT NULL , `department` VARCHAR(10) NOT NULL , `contact` VARCHAR(10) NOT NULL , `email` VARCHAR(50) NOT NULL , `date` VARCHAR(10) NOT NULL , `year` VARCHAR(4) NOT NULL, `coordinator` VARCHAR(3) NOT NULL , `field` VARCHAR(50) NOT NULL , `head` VARCHAR(3) NOT NULL , `photo` VARCHAR(500) NOT NULL , `password` VARCHAR(50) NOT NULL , `paid` VARCHAR(3) NOT NULL , PRIMARY KEY (`id`), UNIQUE (`unique_id`), UNIQUE (`roll`), UNIQUE (`email`))";
	$sr5=mysqli_query($cn,$sql5);

	if($sr5==false)
	{
		echo "Database Roca Members Table not Created...";
		exit();
	}
}
		
//search default admin login present or not
$sql6="SELECT * FROM admin_tbl";
$sr6=mysqli_query($cn,$sql6);

//if default admin login not found then create
if(mysqli_num_rows($sr6)==0)
{
	$sql7="INSERT INTO admin_tbl VALUES ('ROCA2019', 'ec4aac6e700584cf2fe5cac2fe53d0c9', '260b466eeb525aee3ca4cf0ee21e57d1', 'ADMINISTRATOR')";
	$sr7=mysqli_query($cn,$sql7);

	if($sr7==false)
	{
		echo "Admin Table Empty...Cant Login";
		exit();
	}
}

header("location: login.php")
?>