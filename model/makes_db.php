<?php
function numberOfMakes()
{
    global $db;
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
    global $db;
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
    global $db;
    $query = "INSERT INTO Make(ID, make)
    VALUES('', :make)";
    $statement = $db->prepare($query);
    $statement->bindValue(":make", $make);
    $statement->execute();
    $statement->closeCursor();
}
function removeMake($make)
{
    global $db;
    $query = "DELETE FROM Make WHERE make = :make";
    $statement = $db->prepare($query);
    $statement->bindValue(":make", $make);
    $statement->execute();
    $statement->closeCursor();
}


//......................................................................................
//Get All cars ordered by Make 
function getAllByMake($make)
{
    global $db;

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
    global $db;

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
    global $db;

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
