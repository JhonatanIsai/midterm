<?php
class ClassDB{
    public static function numberOfClass()
{
    $db = Database::getDB();
    $query = "SELECT COUNT(*)
                    FROM class";
    $get_classes = $db->Prepare($query);
    $get_classes->execute();
    $class_count = $get_classes->fetchAll();
    $get_classes->closeCursor();
    return intval($class_count);
}
public static function getAllClasses()
{
   $db = Database::getDB();
    $query = "SELECT * FROM Class";
    $get_classes = $db->Prepare($query);
    $get_classes->execute();
    $types = $get_classes->fetchAll();
    $get_classes->closeCursor();
    return $types;
}

public static function addClass($class)
{
   $db = Database::getDB();

    $query = "INSERT INTO Class(ID, class)
    VALUES('', :class)";
    $statement = $db->prepare($query);
    $statement->bindValue(":class", $class);
    $statement->execute();
    $statement->closeCursor();
}

public static function removeClass($ID)
{
   $db = Database::getDB();
    $query = "DELETE FROM Class WHERE class.ID = :ID";
    $statement = $db->prepare($query);
    $statement->bindValue(":ID", $ID);
    $statement->execute();
    $statement->closeCursor();
}

public static function getClassByPrice($class)
{
   $db = Database::getDB();

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
public static function getAllByClass($class)
{

   $db = Database::getDB();
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

public static function getClassByYear($class)
{
   $db = Database::getDB();

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


}


// function numberOfClass()
// {
//     $db = Database::getDB();
//     $query = "SELECT COUNT(*)
//                     FROM class";
//     $get_classes = $db->Prepare($query);
//     $get_classes->execute();
//     $class_count = $get_classes->fetchAll();
//     $get_classes->closeCursor();
//     return intval($class_count);
// }

// function getAllClasses()
// {
//    $db = Database::getDB();
//     $query = "SELECT * FROM Class";
//     $get_classes = $db->Prepare($query);
//     $get_classes->execute();
//     $types = $get_classes->fetchAll();
//     $get_classes->closeCursor();
//     return $types;
// }

//...................................................................................

// function addClass($class)
// {
//    $db = Database::getDB();

//     $query = "INSERT INTO Class(ID, class)
//     VALUES('', :class)";
//     $statement = $db->prepare($query);
//     $statement->bindValue(":class", $class);
//     $statement->execute();
//     $statement->closeCursor();
// }

// function removeClass($ID)
// {
//    $db = Database::getDB();
//     $query = "DELETE FROM Class WHERE class.ID = :ID";
//     $statement = $db->prepare($query);
//     $statement->bindValue(":ID", $ID);
//     $statement->execute();
//     $statement->closeCursor();
// }
//...................................................................................

//Get class by price
// function getAllByClass($class)
// {

//    $db = Database::getDB();
//     $query = "SELECT year, model, price, type,class, make 
//             FROM vehicles AS v 
//             INNER JOIN Type AS t ON v.type_id = t.ID 
//             LEFT JOIN Class AS a ON v.class_id = a.ID 
//             LEFT JOIN Make As m ON v.make_id = m.ID 
//             WHERE v.class_id = :classID";

//     $get_All = $db->prepare($query);
//     $get_All->bindValue(":classID", intval($class));
//     $get_All->execute();
//     $all = $get_All->fetchAll();
//     $get_All->closeCursor();
//     return $all;
// }
//Get class by price
// function getClassByPrice($class)
// {
//    $db = Database::getDB();

//     $query = "SELECT year, model, price, type,class, make 
//             FROM vehicles AS v 
//             INNER JOIN Type AS t ON v.type_id = t.ID 
//             LEFT JOIN Class AS a ON v.class_id = a.ID 
//             LEFT JOIN Make As m ON v.make_id = m.ID 
//             WHERE v.class_id = :classID
//             ORDER BY price";

//     $get_All = $db->prepare($query);
//     $get_All->bindValue(":classID", intval($class));
//     $get_All->execute();
//     $all = $get_All->fetchAll();
//     $get_All->closeCursor();
//     return $all;
// }

//Get class by Year
// function getClassByYear($class)
// {
//    $db = Database::getDB();

//     $query = "SELECT year, model, price, type,class, make 
//             FROM vehicles AS v 
//             INNER JOIN Type AS t ON v.type_id = t.ID 
//             LEFT JOIN Class AS a ON v.class_id = a.ID 
//             LEFT JOIN Make As m ON v.make_id = m.ID 
//             WHERE v.class_id = :classID
//             ORDER BY year";

//     $get_All = $db->prepare($query);
//     $get_All->bindValue(":classID", intval($class));
//     $get_All->execute();
//     $all = $get_All->fetchAll();
//     $get_All->closeCursor();
//     return $all;
// }

function displayClassesDel($chart){
    $output ="";
    $output.= "<form action='".$_SERVER['PHP_SELF']."' method='POST'>";

    $output .= "<div class='returnDisplay'>";
    $output .= "<h2>Invetory</h2>";
    $output .= "<table class='resultTable'>";
    $output .= "<tr>";
    $output .=    "<th>Class</th>";
    $output .=    "<th><tb></th>";
    $output .=      "</tr>";
    foreach ($chart as $car){
        //MakeFunction from this
        $output .= "<div class='eachCar'>";
        $output .= "<tr>";

        $output .= "<td>".$car['class']."</td>";

        $output.= "<td>";
    
        $output.="<button type='submit' class='removeBttn' name='removeClass' value ='".$car[0]."'> Remove Class</button>";
        
        $output.="</td>";

        $output .="</tr>";
        $output .="</div>";

        $output.= "</form>";
    }

    $output .="</table>";
    $output .="</div>";
    return $output;
}