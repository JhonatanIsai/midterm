<?php
    try{
    // Start the seeion and load up connection to database and the functions for it 
        session_start();
        require_once("../model/database.php");
        require_once("../model/admin_db.php");
        //Load the view
        require("../view/register_view.php");
        
        $action = filter_input(INPUT_POST, 'action'); // What is the action LOg in or register?? 
        if($action == NULL){
            $action = filter_input(INPUT_GET, "action");
            if($action == NULL){
                $action = "show admin Menu";
            }
        }

        //Request log in from user
        if(!isset($_SESSION["is_valid_admin"])){
            $action = "login";
        }

        // Perform chosen action
        switch($action){
            case "login":
                $username = filter_input(INPUT_POST, "userName");   //Check this for camel Case... May be a problem
                $password = filter_input(INPUT_POST, "password");

                if(is_valid_admin_login($username,$password)){
                    $_SESSION['is_valid_admin'] =true;
                    include("../admin.php/"); //Using admin.php instead of admin menu. may7 need to change it but i must check 
                }else{
                    $login_message = "You're Not logged in.... Please login to view thispage";
                    include("../view/login_view.php");
                }
                break;
            case 'show_admin_menu':
                include("../admin.php"); //using admin.php here too
                break;
            case "show_product_manager":
                //Include Productmanager
                break;
            case "logout":
                $_SESSION = array(); //Make seesion data an empty array
                session_destroy();
                $login_message = "See you later.. You're logged out by the way";
                include("../view/login_view.php");
                break;
        }


    }
    catch(Exception $e){
        //include("../../index.php"); //may need to change tha paths
        // Change this to header("location: ../../index.php");
    }
?>