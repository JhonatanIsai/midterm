
<?php 
       function display($chart){
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
        $output .=    "<th><tb></th>";
        $output .=      "</tr>";
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

            $output.= "<td>"."<submit='removeBttn'>Remove</submit>"."</td>";

            $output .="</tr>";
            $output .="</div>";
        }

        $output .="</table>";
        $output .="</div>";
        return $output;
    }

    function displayWithDel($chart){
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
        $output .=    "<th><tb></th>";
        $output .=      "</tr>";
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

            $output.= "<td>"."<submit='removeBttn'>Remove</submit>"."</td>";

            $output .="</tr>";
            $output .="</div>";
        }

        $output .="</table>";
        $output .="</div>";
        return $output;
    }

    function displayMakes($chart){
        $output ="";
        $output.= "<form action='".$_SERVER['PHP_SELF']."' method='POST'>";

        $output .= "<div class='returnDisplay'>";
        $output .= "<h2>Invetory</h2>";
        $output .= "<table class='resultTable'>";
        $output .= "<tr>";
        $output .=    "<th>Makes</th>";
        $output .=    "<th><tb></th>";
        $output .=      "</tr>";
        foreach ($chart as $car){
            //MakeFunction from this
            $output .= "<div class='eachCar'>";
            $output .= "<tr>";

            $output .= "<td>".$car['make']."</td>";

            $output.= "<td>";
        
            $output.="<button type='submit' class='removeBttn' name='removeMake' value ='".$car[0]."'> Remove Make</button>";
            
            $output.="</td>";

            $output .="</tr>";
            $output .="</div>";

            $output.= "</form>";
        }

        $output .="</table>";
        $output .="</div>";
        return $output;
        return $output;
    }

    function displayType($chart){
        $output ="";
        $output.= "<form action='".$_SERVER['PHP_SELF']."' method='POST'>";

        $output .= "<div class='returnDisplay'>";
        $output .= "<h2>Invetory</h2>";
        $output .= "<table class='resultTable'>";
        $output .= "<tr>";
        $output .=    "<th>Types</th>";
        $output .=    "<th><tb></th>";
        $output .=      "</tr>";
        foreach ($chart as $car){
            //MakeFunction from this
            $output .= "<div class='eachCar'>";
            $output .= "<tr>";

            $output .= "<td>".$car['type']."</td>";

            $output.= "<td>";
        
            $output.="<button type='submit' class='removeBttn' name='removeType' value ='".$car[0]."'> Remove Class</button>";
            
            $output.="</td>";

            $output .="</tr>";
            $output .="</div>";

            $output.= "</form>";
        }

        $output .="</table>";
        $output .="</div>";
        return $output;
    }

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
?>