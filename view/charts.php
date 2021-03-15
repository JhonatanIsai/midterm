
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

            $output.= "<td>"."<button='removeBttn'>Remove</button>"."</td>";

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

            $output.= "<td>"."<button='removeBttn'>Remove</button>"."</td>";

            $output .="</tr>";
            $output .="</div>";
        }

        $output .="</table>";
        $output .="</div>";
        return $output;
    }

    function displayMakes($chart){
        $output ="";
    
        $output .= "<div class='returnDisplay'>";
        $output .= "<h2>Invetory</h2>";
        $output .= "<table class='resultTable'>";
        $output .= "<tr>";
        $output .=    "<th>Make</th>";
        $output .=    "<th><tb></th>";
        $output .=      "</tr>";
        foreach ($chart as $car){
            //MakeFunction from this
            $output .= "<div class='eachCar'>";
            $output .= "<tr>";

            $output .= "<td>".$car['make']."</td>";

            $output.= "<td>"."<button='removeBttn'>Remove</button>"."</td>";

            $output .="</tr>";
            $output .="</div>";
        }

        $output .="</table>";
        $output .="</div>";
        return $output;
    }

    function displayType($chart){
        $output ="";
    
        $output .= "<div class='returnDisplay'>";
        $output .= "<h2>Invetory</h2>";
        $output .= "<table class='resultTable'>";
        $output .= "<tr>";
        $output .=    "<th>Type</th>";
        $output .=    "<th><tb></th>";
        $output .=      "</tr>";
        foreach ($chart as $car){
            //MakeFunction from this
            $output .= "<div class='eachCar'>";
            $output .= "<tr>";

            $output .= "<td>".$car['type']."</td>";

            $output.= "<td>"."<button='removeBttn'>Remove</button>"."</td>";

            $output .="</tr>";
            $output .="</div>";
        }

        $output .="</table>";
        $output .="</div>";
        return $output;
    }

    function displayClassesDel($chart){
        $output ="";
    
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

            $output.= "<td>"."<button='removeBttn'>Remove</button>"."</td>";

            $output .="</tr>";
            $output .="</div>";
        }

        $output .="</table>";
        $output .="</div>";
        return $output;
    }
?>