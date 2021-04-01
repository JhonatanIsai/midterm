<? 
function welcomeUser($userName){
    if(!$userName){
        echo "Please Sign In.";
    }
    else(
        echo "Welcome ".$userName;
    )
}

function userNotEmpty($userName){
    if(!$userName || $userName == " ")
    {
        header("location: ./logIn/register.php");
    }
    else{
        echo "Index page";
    }
}

?>