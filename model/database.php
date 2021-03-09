<?php
    $dsn ="mysql:host=localhost;dbname=zippy";
    $username = 'root';
    $password = 'pa55word';

    
    //Try to connect tot he data base
    try{
        $db = new PDO($dsn, $username);
    } //If we fail we will display the error page 
    catch(PDOException $usernamee){
        $error_message = "DataBase Errot";
        $error_message .= $e -> getMessage();
        include("./view/error.php");
        exit();

    }
?>