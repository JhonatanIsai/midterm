<?php
session_start(); 
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href=".././admin/view/scss/style.css" media="screen">
    <title>Document</title>
</head>
<body> <!--Header-->

    <header>
        <h1> <a href=".././index.php"> Zippy's auto</a></h1>
    </header>
    <div class="headerMenu" >
        <form id = "authentication_act" name="authentication_act" class="conteiner" action="<?php echo $_SERVER["PHP_SELF"]?>" method="GET">
        
        <button class="action_authen" type="submit" name="action" value="login">Login</button>
        <button class="action_authen" type="submit" name="action" value="register">Register New Admin User</button>

        <button class="action_authen" type="submit" name="action" value="logout">Logout</button>
        <button class="action_authen" type="submit" name="action" value="show_admin_menu">Admin Menu</button>
        
        </form>
    </div>


    <!--Display cars-->