<?php

class MakesDB{
    public static function numberOfMakes()
{
    $db = Database::getDB();
    $query = "SELECT COUNT(*)
                FROM Make";
    $get_Make = $db->Prepare($query);
    $get_Make->execute();
    $make_count = $get_Make->fetchAll();
    $get_Make->closeCursor();
    return intval($make_count);
}
//Get name of all the manufaturers 
public static function getAllMakes()
{
    $db = Database::getDB();
    $query = "SELECT * FROM Make";
    $get_Makes = $db->Prepare($query);
    $get_Makes->execute();
    $s = $get_Makes->fetchAll();
    $get_Makes->closeCursor();
    return $s;
};
//......................................................................................
//Adds a new make 
public static function addMake($make)
{
    $db = Database::getDB();
    $query = "INSERT INTO Make(ID, make)
    VALUES('', :make)";
    $statement = $db->prepare($query);
    $statement->bindValue(":make", $make);
    $statement->execute();
    $statement->closeCursor();
}
public static function removeMake($ID)
{
    $db = Database::getDB();
    $query = "DELETE FROM Make WHERE Make.ID= :ID";
    $statement = $db->prepare($query);
    $statement->bindValue(":ID", $ID);
    $statement->execute();
    $statement->closeCursor();
}


//......................................................................................
//Get All cars ordered by Make 
public static function getAllByMake($make)
{
    $db = Database::getDB();

    $query = "SELECT year, model, price, type,class, make 
        FROM vehicles AS v 
        INNER JOIN Type AS t ON v.type_id = t.ID 
        LEFT JOIN Class AS a ON v.class_id = a.ID 
        LEFT JOIN Make As m ON v.make_id = m.ID 
        WHERE v.make_id = :makeID";

    $get_All = $db->prepare($query);
    $get_All->bindValue(":makeID", intval($make));
    $get_All->execute();
    $all = $get_All->fetchAll();
    $get_All->closeCursor();
    return $all;
}

//Get makes by price
public static function getMakeByPrice($make)
{
    $db = Database::getDB();

    $query = "SELECT year, model, price, type,class, make 
            FROM vehicles AS v 
            INNER JOIN Type AS t ON v.type_id = t.ID 
            LEFT JOIN Class AS a ON v.class_id = a.ID 
            LEFT JOIN Make As m ON v.make_id = m.ID 
            WHERE v.make_id = :makeID
            ORDER BY price";

    $get_All = $db->prepare($query);
    $get_All->bindValue(":makeID", intval($make));
    $get_All->execute();
    $all = $get_All->fetchAll();
    $get_All->closeCursor();
    return $all;
}

//Get makes by year
public static function getMakeByYear($make)
{
    $db = Database::getDB();

    $query = "SELECT year, model, price, type,class, make 
            FROM vehicles AS v 
            INNER JOIN Type AS t ON v.type_id = t.ID 
            LEFT JOIN Class AS a ON v.class_id = a.ID 
            LEFT JOIN Make As m ON v.make_id = m.ID 
            WHERE v.make_id = :makeID
            ORDER BY year";

    $get_All = $db->prepare($query);
    $get_All->bindValue(":makeID", intval($make));
    $get_All->execute();
    $all = $get_All->fetchAll();
    $get_All->closeCursor();
    return $all;
}

}



function numberOfMakes()
{
    $db = Database::getDB();
    $query = "SELECT COUNT(*)
                FROM Make";
    $get_Make = $db->Prepare($query);
    $get_Make->execute();
    $make_count = $get_Make->fetchAll();
    $get_Make->closeCursor();
    return intval($make_count);
}
//Get name of all the manufaturers 
function getAllMakes()
{
    $db = Database::getDB();
    $query = "SELECT * FROM Make";
    $get_Makes = $db->Prepare($query);
    $get_Makes->execute();
    $s = $get_Makes->fetchAll();
    $get_Makes->closeCursor();
    return $s;
};
//......................................................................................
//Adds a new make 
function addMake($make)
{
    $db = Database::getDB();
    $query = "INSERT INTO Make(ID, make)
    VALUES('', :make)";
    $statement = $db->prepare($query);
    $statement->bindValue(":make", $make);
    $statement->execute();
    $statement->closeCursor();
}
function removeMake($ID)
{
    $db = Database::getDB();
    $query = "DELETE FROM Make WHERE Make.ID= :ID";
    $statement = $db->prepare($query);
    $statement->bindValue(":ID", $ID);
    $statement->execute();
    $statement->closeCursor();
}


//......................................................................................
//Get All cars ordered by Make 
function getAllByMake($make)
{
    $db = Database::getDB();

    $query = "SELECT year, model, price, type,class, make 
        FROM vehicles AS v 
        INNER JOIN Type AS t ON v.type_id = t.ID 
        LEFT JOIN Class AS a ON v.class_id = a.ID 
        LEFT JOIN Make As m ON v.make_id = m.ID 
        WHERE v.make_id = :makeID";

    $get_All = $db->prepare($query);
    $get_All->bindValue(":makeID", intval($make));
    $get_All->execute();
    $all = $get_All->fetchAll();
    $get_All->closeCursor();
    return $all;
}

//Get makes by price
function getMakeByPrice($make)
{
    $db = Database::getDB();

    $query = "SELECT year, model, price, type,class, make 
            FROM vehicles AS v 
            INNER JOIN Type AS t ON v.type_id = t.ID 
            LEFT JOIN Class AS a ON v.class_id = a.ID 
            LEFT JOIN Make As m ON v.make_id = m.ID 
            WHERE v.make_id = :makeID
            ORDER BY price";

    $get_All = $db->prepare($query);
    $get_All->bindValue(":makeID", intval($make));
    $get_All->execute();
    $all = $get_All->fetchAll();
    $get_All->closeCursor();
    return $all;
}

//Get makes by year
function getMakeByYear($make)
{
    $db = Database::getDB();

    $query = "SELECT year, model, price, type,class, make 
            FROM vehicles AS v 
            INNER JOIN Type AS t ON v.type_id = t.ID 
            LEFT JOIN Class AS a ON v.class_id = a.ID 
            LEFT JOIN Make As m ON v.make_id = m.ID 
            WHERE v.make_id = :makeID
            ORDER BY year";

    $get_All = $db->prepare($query);
    $get_All->bindValue(":makeID", intval($make));
    $get_All->execute();
    $all = $get_All->fetchAll();
    $get_All->closeCursor();
    return $all;
}
