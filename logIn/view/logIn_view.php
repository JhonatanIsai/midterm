<?php 
    require("./view/header.php");
?>

<!-- Log In area... Make sure to separate-->
<main>
    
    
    <div class="container"> 
        <div class = "title">  
            <h2>User Log-In</h2> 
        </div>
    <div class= "logInForm">
        <form id = "userLogIn" name="userLogIn" class="conteiner" action="<?php echo $_SERVER["PHP_SELF"] ?>" method="POST">
            <!--User Name-->
            <div>
                <label for = "userEmail" >User Email:</label>
                <input class="textBox" type="email" id="userEmail" name="userEmail" placeholder="Email">
            </div>
            <!--Password-->
            <div>
                <label for="UserPassword">Password:</label>
                <input class="textBox"  type="passWord" id="userPassword" name="userPassword" placeholder="Password">                
            </div>
            <!--Input-->
            <div>
                <input class="button" type="submit" value="Log-In">
                <p><a href="./register.php">Register</a></p>
            </div>

        </form>

    </div>
    </div>
</main>



<?php
    require('./view/footer.php');
?>