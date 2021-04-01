<?php 
require("./controller/register_con.php");
require("./view/logInHeader.php");
    


    $userEmail = filter_input(INPUT_POST, "userEmail", FILTER_SANITIZE_EMAIL);
    //User Password....... May Need to change the Filter
    $userPassword = filter_input(INPUT_POST, "userPassword", FILTER_SANITIZE_STRING);

    $userName = filter_input(INPUT_GET, "userName", FILTER_SANITIZE_STRING);
////................................................................
    $firstName = "";

    if(!$userName || strlen($userName)<4){
       
    }
    else{
    $_SESSION["userid"] =  $userName;
        header("location: ./view/thankyou.php");
    }
   
    try{
        require("./view/register_view.php");
    }
    catch(Exception $e){
        echo "Error Loading page. PLase try again later...";
    }
    
    
        
   require("./view/logInFooter.php");
?>
