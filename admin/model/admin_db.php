<?php
/** Functions to add users and validates user credentials  */

class validation{
    public static function add_admin($userName, $password){
        $db = Database::getDB();
        $hash = password_hash($password, PASSWORD_BCRYPT);
        $query = 'INSERT INTO administrators (userName,  password)
                    VALUES(:userName, :password)';
        $statement = $db ->prepare($query);
        $statement -> bindValue(":userName", $userName);
        $statement -> bindValue(":password", $hash);
        $statement -> execute();
        $statement -> closeCursor();
    }
}
    // function add_admin($userName, $password){
    //     $db = Database::getDB();
    //     $hash = password_hash($password, PASSWORD_BCRYPT);
    //     $query = 'INSERT INTO administrators (userName,  password)
    //                 VALUES(:userName, :password)';
    //     $statement = $db ->prepare($query);
    //     $statement -> bindValue(":userName", $userName);
    //     $statement -> bindValue(":password", $hash);
    //     $statement -> execute();
    //     $statement -> closeCursor();
    // }

    function is_valid_admin_login($userName, $password){
        $db = Database::getDB();
        $query = 'SELECT password FROM administrators WHERE userName = :userName';
        $statement = $db -> prepare($query);
        $statement -> bindValue(":userName", $userName);
        $statement -> execute();

        $row = $statement -> fetch();
        $statement -> closeCursor();
        //.......................................................
        if(!empty($password) && !empty($userName)){
            $hash = $row["password"];
            return password_verify($password,$hash);
        }
        elseif(strlen($userName<8)){
            //Error
            $php_errormsg = "User name or password are incorrect.";
            return false;
        }
        else{
            return false;
        }
        //.......................................................
    }

    function username_exists($userName){
        $db = Database::getDB();
        $query = 'SELECT COUNT(*) from administrators WHERE userName = :userName';
        $statement = $db ->prepare($query);
        $statement -> bindValue(":userName", $userName);
        $statement -> execute();
        $count  = $statement -> fetch();
        $statement -> closeCursor();

        if($count[0]>0){
            return true;
        }
        else{
            return false;
        }

    

    }

?>