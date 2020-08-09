<?php
require_once ("Database.class.php");
require_once ("Tables.class.php");

$db = new Database();
$conn = $db->connect();

$table = new Tables($conn);

$dir = $table->directory();

$admin = $table->admin();
$member = $table->member();
$notice = $table->notice();
$event = $table->event();
$gallery = $table->gallery();
$coordinator = $table->coordinator();
$payment = $table->payment();
$registration = $table->registartion();
$studymaterial = $table->studymaterial();
$labmanual = $table->labmanual();
$book = $table->books();

$subscriber = $table->subscriber();
$query = $table->query();
$participant = $table->participant();
$intrest = $table->intrest();
$comment = $table->comment();
$faq = $table->faq();
$registered = $table->registered();


$conn->close();

if( !$admin or !$notice or !$event or !$gallery or !$coordinator or !$payment or !$registration or !$studymaterial or !$labmanual or !$book or !$subscriber or !$query or !$participant or !$intrest or !$comment or !$faq or !$registered )
{
    header ("location:../error/500");
}
else
{
    header ("location:../user/index");
}
?>