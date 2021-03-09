<?php
function insertNewCar($year, $make, $model, $type, $class, $price)
{
    require("./model/database.php");
    $query = "INSERT INTO vehicles (year, model, price, type_id, class_id, make_id)
                    VALUES(:year, :model, :price, :type_id, :class_id, :make_id)";
    $statement = $db->prepare($query);
    $statement->bindValue(":year", $year);
    $statement->bindValue(":model", $model);
    $statement->bindValue(":price", $price);
    $statement->bindValue(":type_id", $type);
    $statement->bindValue(":class_id", $class);
    $statement->bindValue(":make_id", $make);
    $statement->execute();
    $statement->closeCursor();
}
?>