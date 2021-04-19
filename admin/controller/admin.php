<?php

/** Controller for the log in system 
 * takes input from form and buttons and redirects user
 * to the correct page.  
 */

// Start the seeion and load up connection to database and the functions for it 

//Load logic
require_once("../model/database.php");
require_once("../model/admin_db.php");

//Load the view
require_once("../view/header.php");

//Variables from forms 






$action = filter_input(INPUT_GET, "action", FILTER_SANITIZE_STRING);

$username = filter_input(INPUT_POST, "userName_Register");   //Check this for camel Case... May be a problem
$password = filter_input(INPUT_POST, "password_Register");
$confirm_password = filter_input(INPUT_POST, "password_Register_Confirm");

if(!empty($username) && !empty($password) && !empty($confirm_password)) {
    require_once("../util/valid_register.php");
    if(valid_username($username) && valid_password($password) && passwords_match($password,$confirm_password)){
        validation::add_admin($username, $password);
    }
    else{// Fix this 
        echo valid_registration($username, $password, $confirm_password)[0];
    }
}



//Check action variable, if the variable is epty action will be log in
if ($action == NULL) {
    $action = filter_input(INPUT_GET, "action");
    if ($action == NULL) {
        $action = 'login';
    }
}

//Request log in from user
//If the valid admin Log in is empty
//it means you have not logged in will be redirected to the log in page
if (!isset($_SESSION["is_valid_admin"]) || $_SESSION["is_valid_admin"] == null) {
    $action = "login";
}

// Perform chosen action
/*If one of the menu buttons in the header is clicked the its actions 
will be performed by the switch */

switch ($action) {
        /** If action is log in, user will be redirected to the admin page */
    case "login":

        $username = filter_input(INPUT_GET, "userName_login");   //Check this for camel Case... May be a problem
        $password = filter_input(INPUT_GET, "password_Login");


        if (validation::is_valid_admin_login($username, $password)) {
            $_SESSION['is_valid_admin'] = true;
            header("location: ../index.php");
            //include("../index.php/"); //Using admin.php instead of admin menu. may7 need to change it but i must check 
        } else {
            $login_message = "You're Not logged in.... Please login to view thispage";
            include("../view/login_view.php");
        }


        break;

    case 'show_admin_menu':
        if ($_SESSION['is_valid_admin'] == true) {
            header("location: ../index.php");
        } else {
            include("../view/login_view.php");
        }
        break;


    case "register":

        if ($_SESSION['is_valid_admin'] == true) {
            include("../view/register_view.php"); //Add a new adminitrator

            } 
        else {
            header("location: ../../register.php");
        }
  

        break;

    case "logout":
        $_SESSION = array(); //Make seesion data an empty array
        session_destroy();
        $login_message = "See you later.. You're logged out by the way";
        include("../view/login_view.php");
        break;
}
