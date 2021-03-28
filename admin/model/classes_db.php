<?php



function numberOfClass()
{
    global $db;
    $query = "SELECT COUNT(*)
                    FROM class";
    $get_classes = $db->Prepare($query);
    $get_classes->execute();
    $class_count = $get_classes->fetchAll();
    $get_classes->closeCursor();
    return intval($class_count);
}

function getAllClasses()
{
    global $db;
    $query = "SELECT * FROM Class";
    $get_classes = $db->Prepare($query);
    $get_classes->execute();
    $types = $get_classes->fetchAll();
    $get_classes->closeCursor();
    return $types;
}

//...................................................................................

function addClass($class)
{
    global $db;

    $query = "INSERT INTO Class(ID, class)
    VALUES('', :class)";
    $statement = $db->prepare($query);
    $statement->bindValue(":class", $class);
    $statement->execute();
    $statement->closeCursor();
}

function removeClass($ID)
{
    global $db;
    $query = "DELETE FROM Class WHERE class.ID = :ID";
    $statement = $db->prepare($query);
    $statement->bindValue(":ID", $ID);
    $statement->execute();
    $statement->closeCursor();
}
//...................................................................................

//Get class by price
function getAllByClass($class)
{

    global $db;
    $query = "SELECT year, model, price, type,class, make 
            FROM vehicles AS v 
            INNER JOIN Type AS t ON v.type_id = t.ID 
            LEFT JOIN Class AS a ON v.class_id = a.ID 
            LEFT JOIN Make As m ON v.make_id = m.ID 
            WHERE v.class_id = :classID";

    $get_All = $db->prepare($query);
    $get_All->bindValue(":classID", intval($class));
    $get_All->execute();
    $all = $get_All->fetchAll();
    $get_All->closeCursor();
    return $all;
}
//Get class by price
function getClassByPrice($class)
{
    global $db;

    $query = "SELECT year, model, price, type,class, make 
            FROM vehicles AS v 
            INNER JOIN Type AS t ON v.type_id = t.ID 
            LEFT JOIN Class AS a ON v.class_id = a.ID 
            LEFT JOIN Make As m ON v.make_id = m.ID 
            WHERE v.class_id = :classID
            ORDER BY price";

    $get_All = $db->prepare($query);
    $get_All->bindValue(":classID", intval($class));
    $get_All->execute();
    $all = $get_All->fetchAll();
    $get_All->closeCursor();
    return $all;
}

//Get class by Year
function getClassByYear($class)
{
    global $db;

    $query = "SELECT year, model, price, type,class, make 
            FROM vehicles AS v 
            INNER JOIN Type AS t ON v.type_id = t.ID 
            LEFT JOIN Class AS a ON v.class_id = a.ID 
            LEFT JOIN Make As m ON v.make_id = m.ID 
            WHERE v.class_id = :classID
            ORDER BY year";

    $get_All = $db->prepare($query);
    $get_All->bindValue(":classID", intval($class));
    $get_All->execute();
    $all = $get_All->fetchAll();
    $get_All->closeCursor();
    return $all;
}
