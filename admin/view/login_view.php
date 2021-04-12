
<!-- Log In area... Make sure to separate-->
<main class="mainRegister">
    
    
    <div class="container"> 
        <div class = "title">  
            <h2>Log In</h2> 
    </div>

    <div class= "logInForm">
        <form id = "user_Login" name="user_Login" class="conteiner" action="<?php echo $_SERVER["PHP_SELF"]?>" method="GET">
            <!--User Name-->
            <div>
                <label for = "userName_login" >User Name:</label>
                <input class="textBox" type="text" id="userName_login" name="userName_login" placeholder="User Name" required>
            </div>

            <!--User password-->
            <div>
                <label for = "password_Login" >Password</label>
                <input class="textBox" type="text" id="password_Login" name="password_Login" placeholder="Password" required>
            </div>

            <div>
            <!--Submit for button -->
                <input class="button" type="submit" value="Log In">
                <p><a href="../register_view.php">Log-In</a></p>
            </div>

        </form>

    </div>
    </div>
</main>
