<?php 
    require("./view/logInHeader.php");

    $userEmail = filter_input(INPUT_POST, "userEmail", FILTER_SANITIZE_EMAIL);
    //User Password....... May Need to change the Filter
    $userPassword = filter_input(INPUT_POST, "userPassword", FILTER_SANITIZE_STRING);
    // Test inputs
     
    if($userEmail || $userPassword){
        echo $userPassword;
        echo $userEmail;
    }

    //Check log In parameters
    function checkEmail($userEmail, $userPassword){
        echo $userEmail;
    }

    try{
        checkEmail($userEmail,$userPassword);
    }
    catch(Exception $e){
        echo "Invalid Input Please Try again..";
    }
?>

<!-- Log In area... Make sure tto separate-->
<main>
    
    
    <div class="container"> 
        <div class = "title">  
            <h2>User Log-In</h2> 
        </div>
    <div class= "logInForm">
        <form id = "userLogIn" name="userLogIn" class="conteiner" action="<?php echo $_SERVER["PHP_SELF"] ?>" method="POST">
            <!--User Name-->
            <div>
                <label for = "userEmail" >UserEmail:</label>
                <input class="textBox" type="email" id="userEmail" name="userEmail">
            </div>
            <!--Password-->
            <div>
                <label for="UserPassword">Password:</label>
                <input class="textBox"  type="passWord" id="userPassword" name="userPassword">                
            </div>
            <!--Input-->
            <div>
                <input class="button" type="submit" value="Log-In">
                <a>Sign-Up</a>
            </div>

        </form>

    </div>
    </div>
</main>



<?php
    require('./view/logInFooter.php');
?>