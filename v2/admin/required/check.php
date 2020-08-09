<?php
if( !isset($_SESSION["admin_login"]) or $_SESSION["admin_login"] == NULL or $_SESSION["admin_login"] !== "login_success" )
{
    header ("location:../login/logout");
}
?>