<?php
if( !isset($_SESSION["user_login"]) or $_SESSION["user_login"] == NULL or $_SESSION["user_login"] !== "login_success" ) {
    header ("location:../logout");
}
?>