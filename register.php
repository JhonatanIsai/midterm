<?php 
    require("./view/header.php");

    


    $userEmail = filter_input(INPUT_POST, "userEmail", FILTER_SANITIZE_EMAIL);
    //User Password....... May Need to change the Filter
    $userPassword = filter_input(INPUT_POST, "userPassword", FILTER_SANITIZE_STRING);

    $userName = filter_input(INPUT_GET, "userName", FILTER_SANITIZE_STRING);



  //.......................User Name.........................................

    $firstName = "";
    // If the user name is empty or too short leave the variable blank
    
    if(!isset($userName) || strlen($userName)<4){
        try{      
            require("./view/register_view.php");
            
        }
        catch(Exception $e){
            echo "Error Loading page. PLase try again later...";
            header("location: ./index.php");
        }
    
    }
    else{ 
        //If the entered name is not the the same name in session
        if($_SESSION["userid"] !=  $userName){
            // Set variable to entered user name
            $_SESSION["userid"] =  $userName;

            // If name is valid Say thank you
            require("./view/thankyou_view.php");

        }
        else{
            header("location: ./index.php");
        }
    }



    //...................Footer..............................
    // Try to load the footer
    try{ // Try loading the welcome page if it fails display message
        require("./view/footer.php");
        
    }
    catch(Exception $e){
        echo "Error Loading page. PLase try again later...";
    }
        

?>
