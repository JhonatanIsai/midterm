


<!-- Log In area... Make sure to separate-->
<main>
    
    
    <div class="container"> 
        <div class = "title">  
            <h2>User Log-In</h2> 
    </div>

    <div class= "logInForm">
        <form id = "user" name="user" class="conteiner" action="<?php echo $_SERVER["PHP_SELF"]?>" method="GET">
            <!--User Name-->
            <div>
                <label for = "userName" >User Name:</label>
                <input class="textBox" type="text" id="userName" name="userName" placeholder="User Name" required>
            </div>

            <div>
                <input class="button" type="submit" value="Register">
                <p><a href="./logIn_view.php">Log-In</a></p>
            </div>

        </form>

    </div>
    </div>
</main>



