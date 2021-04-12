
<!-- Log In area... Make sure to separate-->
<main class="mainRegister">
    
    
    <div class="container"> 
        <div class = "title">  
            <h2>Register</h2> 
    </div>

    <div class= "logInForm">
        <form id = "userRegister" name="userRegister" class="conteiner" action="<?php echo $_SERVER["PHP_SELF"]?>" method="GET"> <!--May change to post-->
            <!--User Name-->
            <div>
                <label for = "userName_Register" >User Name:</label>
                <input class="textBox" type="text" id="userName_Register" name="userName_Register" placeholder="User Name" >
            </div>

            <!--User password-->
            <div>
                <label for = "password_Register" >Password:</label>
                <input class="textBox" type="text" id="password_Register" name="password_Register" placeholder="Password" >
            </div>

            <div>
            <!--Log In button-->
                <input class="button" type="submit" value="Register">
                <p><a href="../register_view.php">Log-In</a></p>
            </div>

        </form>

    </div>
    </div>
</main>
