<?php
	if(!isset($_SESSION['user_login']) or $_SESSION["user_login"]=="" or $_SESSION["user_login"]=="False")
	{
		header("location: login.php");
	}
?>