<?php

class TypeDB{
    public static function numberOfTypes()
{
    $db = Database::getDB();
    $query = "SELECT COUNT(*)
                FROM type";
    $get_type = $db->Prepare($query);
    $get_type->execute();
    $type_count = $get_type->fetchAll();
    $get_type->closeCursor();
    return intval($type_count);
}

//Get All type names 
public static function getAllType()
{
    $db = Database::getDB();
    $query = "SELECT * FROM Type";
    $get_types = $db->Prepare($query);
    $get_types->execute();
    $types = $get_types->fetchAll();
    $get_types->closeCursor();
    return $types;
}
//...................................................................................
public static function addType($type)
{
    $db = Database::getDB();
    $query = "INSERT INTO Type(ID, type)
    VALUES('', :type)";
    $statement = $db->prepare($query);
    $statement->bindValue(":type", $type);
    $statement->execute();
    $statement->closeCursor();
}

public static function removeType($ID)
{
    $db = Database::getDB();
    $query = "DELETE FROM Type WHERE Type.ID = :ID";
    $statement = $db->prepare($query);
    $statement->bindValue(":ID", $ID);
    $statement->execute();
    $statement->closeCursor();
}
//...................................................................................

//Get all the cars ordered by type 
public static function getAllByType($type)
{
    $db = Database::getDB();
    $query = "SELECT year, model, price, type,class, make 
        FROM vehicles AS v 
        INNER JOIN Type AS t ON v.type_id = t.ID 
        LEFT JOIN Class AS a ON v.class_id = a.ID 
        LEFT JOIN Make As m ON v.make_id = m.ID 
        WHERE v.type_id = :typeID";

    $get_All = $db->prepare($query);
    ///Check here
    $get_All->bindValue(":typeID", $type);

    $get_All->execute();
    $all = $get_All->fetchAll();
    $get_All->closeCursor();
    return $all;
}

//Get types by price
public static function getTypeByPrice($type)
{
    $db = Database::getDB();

    $query = "SELECT year, model, price, type,class, make 
        FROM vehicles AS v 
        INNER JOIN Type AS t ON v.type_id = t.ID 
        LEFT JOIN Class AS a ON v.class_id = a.ID 
        LEFT JOIN Make As m ON v.make_id = m.ID 
        WHERE v.type_id = :typeID
        ORDER BY price";

    $get_All = $db->prepare($query);
    $get_All->bindValue(":typeID", intval($type));
    $get_All->execute();
    $all = $get_All->fetchAll();
    $get_All->closeCursor();
    return $all;
}

//Get tpes by Year
public static function getTypeByYear($type)
{
    $db = Database::getDB();

    $query = "SELECT year, model, price, type,class, make 
        FROM vehicles AS v 
        INNER JOIN Type AS t ON v.type_id = t.ID 
        LEFT JOIN Class AS a ON v.class_id = a.ID 
        LEFT JOIN Make As m ON v.make_id = m.ID 
        WHERE v.type_id = :typeID
        ORDER BY year";

    $get_All = $db->prepare($query);
    $get_All->bindValue(":typeID", intval($type));
    $get_All->execute();
    $all = $get_All->fetchAll();
    $get_All->closeCursor();
    return $all;
}


}

function numberOfTypes()
{
    $db = Database::getDB();
    $query = "SELECT COUNT(*)
                FROM type";
    $get_type = $db->Prepare($query);
    $get_type->execute();
    $type_count = $get_type->fetchAll();
    $get_type->closeCursor();
    return intval($type_count);
}

//Get All type names 
function getAllType()
{
    $db = Database::getDB();
    $query = "SELECT * FROM Type";
    $get_types = $db->Prepare($query);
    $get_types->execute();
    $types = $get_types->fetchAll();
    $get_types->closeCursor();
    return $types;
}
//...................................................................................
function addType($type)
{
    $db = Database::getDB();
    $query = "INSERT INTO Type(ID, type)
    VALUES('', :type)";
    $statement = $db->prepare($query);
    $statement->bindValue(":type", $type);
    $statement->execute();
    $statement->closeCursor();
}

function removeType($ID)
{
    $db = Database::getDB();
    $query = "DELETE FROM Type WHERE Type.ID = :ID";
    $statement = $db->prepare($query);
    $statement->bindValue(":ID", $ID);
    $statement->execute();
    $statement->closeCursor();
}
//...................................................................................

//Get all the cars ordered by type 
function getAllByType($type)
{
    $db = Database::getDB();
    $query = "SELECT year, model, price, type,class, make 
        FROM vehicles AS v 
        INNER JOIN Type AS t ON v.type_id = t.ID 
        LEFT JOIN Class AS a ON v.class_id = a.ID 
        LEFT JOIN Make As m ON v.make_id = m.ID 
        WHERE v.type_id = :typeID";

    $get_All = $db->prepare($query);
    ///Check here
    $get_All->bindValue(":typeID", $type);

    $get_All->execute();
    $all = $get_All->fetchAll();
    $get_All->closeCursor();
    return $all;
}

//Get types by price
function getTypeByPrice($type)
{
    $db = Database::getDB();

    $query = "SELECT year, model, price, type,class, make 
        FROM vehicles AS v 
        INNER JOIN Type AS t ON v.type_id = t.ID 
        LEFT JOIN Class AS a ON v.class_id = a.ID 
        LEFT JOIN Make As m ON v.make_id = m.ID 
        WHERE v.type_id = :typeID
        ORDER BY price";

    $get_All = $db->prepare($query);
    $get_All->bindValue(":typeID", intval($type));
    $get_All->execute();
    $all = $get_All->fetchAll();
    $get_All->closeCursor();
    return $all;
}

//Get tpes by Year
function getTypeByYear($type)
{
    $db = Database::getDB();

    $query = "SELECT year, model, price, type,class, make 
        FROM vehicles AS v 
        INNER JOIN Type AS t ON v.type_id = t.ID 
        LEFT JOIN Class AS a ON v.class_id = a.ID 
        LEFT JOIN Make As m ON v.make_id = m.ID 
        WHERE v.type_id = :typeID
        ORDER BY year";

    $get_All = $db->prepare($query);
    $get_All->bindValue(":typeID", intval($type));
    $get_All->execute();
    $all = $get_All->fetchAll();
    $get_All->closeCursor();
    return $all;
}
?>



</div>