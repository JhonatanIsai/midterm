<?php
    // $dsn ="mysql:host=xlf3ljx3beaucz9x.cbetxkdyhwsb.us-east-1.rds.amazonaws.com;dbname=wpbv8ju2q3a1ag3f";

    // $username = 'krvp3c061jjc4618';
    // $password = 'v6wfhc56voefhyp8';

    // //Try to connect tot he data base
    // try{
    //     $db = new PDO($dsn, $username,$password);

    // } //If we fail we will display the error page 
    // catch(PDOException $usernamee){
    //     $error_message = "DataBase Errot";
    //     $error_message .= $e -> getMessage();
    //     include("./view/error.php");
    //     exit();

    // }

    class Database{

        private static $dsn ="mysql:host=xlf3ljx3beaucz9x.cbetxkdyhwsb.us-east-1.rds.amazonaws.com;dbname=wpbv8ju2q3a1ag3f";
        private static $username = 'krvp3c061jjc4618';
        private static $password = 'v6wfhc56voefhyp8';
        private static $db;
    
    
        private function __construct(){}
    
        public static function getDB(){
            if(!isset(self :: $db)){
                try{
    
                    self :: $db = new PDO(self::$dsn, self::$username, self::$password);
                }catch(PDOException $e){
                    $error_message = $e -> getMessage();
                    include("../errors/database_error.php");
                    exit();
                }
            }
            return self :: $db;
        }
    }
    
?>
