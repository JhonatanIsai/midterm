<?php

class VehicleDB{

    public static function insertNewCar($year, $make, $model, $type, $class, $price){

        $db = Database::getDB();
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
    public static function displayWithDelete($chart){
        $output ="";
        $output .= "<div class='returnDisplay'>";
        $output .= "<h2>Invetory</h2>";
        $output .= "<table class='resultTable'>";
        $output .= "<tr>";
        $output .=    "<th>Year</th>";
        $output .=    "<th>Make</th>";
        $output .=    "<th>Model</th>";
        $output .=    "<th>Type</th>";
        $output .=    "<th>Class</th>";
        $output .=    "<th>Price</th>";
        $output .=      "</tr>";
        //....................................
        foreach ($chart as $car){
            //MakeFunction from this
            
            $output .= "<div class='eachCar'>";
            $output .= "<tr>";
            $output .= "<td>".$car['year']."</td>";
    
            $output .= "<td>".$car['make']."</td>";
    
            $output.= "<td>".$car['model']."</td>";
    
            $output.= "<td>".$car['type']."</td>";
    
            $output.= "<td>".$car['class']."</td>";
    
            $output.= "<td>"."$" . $car['price']."</td>";
            $output .="</tr>";
            $output .="</div>";
        }
    
        $output .="</table>";
        $output .="</div>";
        return $output;
    }

}



function insertNewCar($year, $make, $model, $type, $class, $price){

    $db = Database::getDB();
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
function displayWithDelete($chart){
    $output ="";
    $output .= "<div class='returnDisplay'>";
    $output .= "<h2>Invetory</h2>";
    $output .= "<table class='resultTable'>";
    $output .= "<tr>";
    $output .=    "<th>Year</th>";
    $output .=    "<th>Make</th>";
    $output .=    "<th>Model</th>";
    $output .=    "<th>Type</th>";
    $output .=    "<th>Class</th>";
    $output .=    "<th>Price</th>";
    $output .=      "</tr>";
    //....................................
    foreach ($chart as $car){
        //MakeFunction from this
        
        $output .= "<div class='eachCar'>";
        $output .= "<tr>";
        $output .= "<td>".$car['year']."</td>";

        $output .= "<td>".$car['make']."</td>";

        $output.= "<td>".$car['model']."</td>";

        $output.= "<td>".$car['type']."</td>";

        $output.= "<td>".$car['class']."</td>";

        $output.= "<td>"."$" . $car['price']."</td>";
        $output .="</tr>";
        $output .="</div>";
    }

    $output .="</table>";
    $output .="</div>";
    return $output;
}



?>