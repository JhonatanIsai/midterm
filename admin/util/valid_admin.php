<?php
//Needthis for later 
    //require_once("./secure_conn.php");
    //require_once("./valid_admin.php");

    //cHECK IF THE USER IS LOGGED IN
    if (!isset($_SESSION["is_valid_admin"])){
        header("location: ../controller/admin_register.php");
    }

?>