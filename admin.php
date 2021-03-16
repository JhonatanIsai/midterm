
<?php function defaultView($carType, $carClass, $carMake, $orderPrice, $orderYear)
{
    if (!$carType || !$carMake || !$carClass || !$orderPrice || !$orderYear) {

        try {
            //require("./model/makes_db.php"); //HERE
            //require("./model/type_db.php"); //HERE
            //require("./model/classes_db.php"); //HERE
            require("./model/database_db.php");
            // For drop Down Menu//
            require("./view/dropdown_menu.php");
        } catch (Exception  $e) {
            echo "Error loading required files...... Please try again.";
        }
        try {

            $chosenChart = getAllByYear();
            if (!empty($carType) && (!empty($carClass) || !empty($carMake))) {
                echo "<h2> Choose Only one option from dropdown menu. </h2>"; //Center
            } elseif (!empty($carClass) && (!empty($carType) || !empty($carMake))) {
                echo "<h2> Choose Only one option from dropdown menu. </h2>"; //Center
            } elseif (!empty($carMake) && (!empty($carClass) || !empty($carType))) {
                echo "<h2> Choose Only one option from dropdown menu. </h2>"; //Center
            } else {
                if (!empty($carType)) {
                    if (!empty($orderPrice) && !$orderYear) {
                        $chosenChart = getTypeByPrice($carType);
                    } elseif (!empty($orderYear) && !$orderPrice) {
                        $chosenChart = getTypeByYear($carType);
                    } else {
                        $chosenChart = getAllByType($carType);
                    }
                } elseif (!empty($carClass)) {
                    if (!empty($orderPrice) && !$orderYear) {
                        $chosenChart = getClassByPrice($carClass);
                    } elseif (!empty($orderYear) && !$orderPrice) {
                        $chosenChart = getClassByYear($carClass);
                    } else {
                        $chosenChart = getAllByClass($carClass);
                    }
                } elseif (!empty($carMake)) {
                    if (!empty($orderPrice) && !$orderYear) {
                        $chosenChart = getMakeByPrice($carMake);
                    } elseif (!empty($orderYear) && !$orderPrice) {
                        $chosenChart = getMakeByYear($carMake);
                    } else {
                        $chosenChart = getAllByMake($carMake);
                    }
                } elseif (!empty($orderPrice) && !$orderYear) {
                    $chosenChart = getAllByPrice();
                } elseif (!empty($orderYear) && !$orderPrice) {
                    $chosenChart = getAllByYear();
                }
            }
            echo displayWithDelete($chosenChart); // Moved yhis !!!
        } catch (Exception  $e) {
            echo "Critical Error occoured... Please try again alter";
        } finally {
            require("./view/admin_footer.php"); // Make sure theres alwyas a menu
        }
    }
    //..........................................




} ?>

<?php
function addVehicleView($newCarYear, $newCarMake, $newCarModel, $newCarClass, $newCarType, $newCarPrice)
{

    if (!$newCarYear && !$newCarMake && !$newCarModel && !$newCarClass && !$newCarType && !$newCarPrice) {
        require("./view/add_vehicle_view.php");
    } else {
        insertNewCar($newCarYear, $newCarMake, $newCarModel, $newCarClass, $newCarType, $newCarPrice);
    }
    require("./view/admin_footer.php");
} ?>

<?php
function editMakeView()
{
    try {
        require("./view/edit_makes_view.php");
    } catch (Exception $e) {
        echo "Error Loading view..";
    } finally {
        require("./view/admin_footer.php");
    }
}

?>

<?php
function editTypeView()
{
    try {
        require("./view/edit_types.php");
    } catch (Exception $e) {
        echo "Error Loading view..";
    } finally {
        require("./view/admin_footer.php");
    }
}
?>
<?php
function editClassView()
{
    try {
        require("./view/edit_classes_view.php");
    } catch (Exception $e) {
        echo "Error Loading view..";
    } finally {
        require("./view/admin_footer.php");
    }
}
?>

<?php
//Function checks if the newItem is present in the  $array
function checkIfExistMake($newMake, $array)
{   $Exist = False;
    $newItem = strtolower($newMake);

 for($i=0;$i<sizeof($array);$i++){
     $arrayItem= strtolower($array[$i][1]);
     echo $arrayItem."   ";
     

    if($newItem == strtolower($arrayItem)){
        //echo "New item already exists in database.";
        $Exist = True;
        return 0;
    }
 }
 echo $Exist;
 if($Exist == False){
    addMake($newMake);
 }
}

function checkIfExistType($newItem, $array)
{   $Exist = False;
    $newItem = strtolower($newItem);

 for($i=0;$i<sizeof($array);$i++){
     $arrayItem= strtolower($array[$i][1]);
     echo $arrayItem."   ";
     

    if($newItem == strtolower($arrayItem)){
        //echo "New item already exists in database.";
        $Exist = True;
        return 0;
    }
 }
 echo $Exist;
 if($Exist == False){
    addType($newItem);
 }
}

function checkIfExistClass($newItem, $array)
{   $Exist = False;
    $newItem = strtolower($newItem);

 for($i=0;$i<sizeof($array);$i++){
     $arrayItem= strtolower($array[$i][1]);
     echo $arrayItem."   ";
     

    if($newItem == strtolower($arrayItem) || $newItem == " "){
        //echo "New item already exists in database.";
        $Exist = True;
        return 0;
    }
 }
 echo $Exist;
 if($Exist == False){
    addClass($newItem);
 }
}
?>


<?php
// ................................Main..................................

require("./model/makes_db.php"); //Thisa works for all So far 
require("./model/type_db.php");
require("./model/classes_db.php"); // here if 



require("./view/header.php");

require("./model/database.php");
require("./view/charts.php");

require("./model/vehicle_db.php");



$carCategory = "Inventory";


$carType  = filter_input(INPUT_POST, "dropDownType", FILTER_SANITIZE_NUMBER_INT);
$carMake  = filter_input(INPUT_POST, "dropDownMake", FILTER_SANITIZE_NUMBER_INT);
$carClass = filter_input(INPUT_POST, "dropDownClass", FILTER_SANITIZE_NUMBER_INT);
$orderPrice  = filter_input(INPUT_POST, "price", FILTER_SANITIZE_STRING);
$orderYear = filter_input(INPUT_POST, "year", FILTER_SANITIZE_STRING);
$editChoice = filter_input(INPUT_POST, "admin_edit", FILTER_SANITIZE_STRING);
//...................................................................................
$newCarMake = filter_input(INPUT_POST, "newCarMake",  FILTER_SANITIZE_NUMBER_INT);
$newCarType = filter_input(INPUT_POST, "newCarType", FILTER_SANITIZE_NUMBER_INT);
$newCarClass = filter_input(INPUT_POST, "newCarClass", FILTER_SANITIZE_NUMBER_INT);
$newCarYear = filter_input(INPUT_POST, "newCarYear", FILTER_SANITIZE_NUMBER_INT);
$newCarModel = filter_input(INPUT_POST, "newCarModel", FILTER_SANITIZE_STRING);
$newCarPrice = filter_input(INPUT_POST, "newCarPrice", FILTER_SANITIZE_NUMBER_INT);

$submitCar = filter_input(INPUT_POST, "submitCar", FILTER_SANITIZE_STRING);

//........................................................................................
$newMake = filter_input(INPUT_POST, "newMake", FILTER_SANITIZE_STRING);
$newType = filter_input(INPUT_POST, "newType", FILTER_SANITIZE_STRING);
$newClass = filter_input(INPUT_POST, "newClass", FILTER_SANITIZE_STRING);
//..................................................................................
$classNumber = filter_input(INPUT_POST, "removeClass", FILTER_SANITIZE_NUMBER_INT);
$MakeNumber = filter_input(INPUT_POST, "removeMake", FILTER_SANITIZE_NUMBER_INT);
$TypeNumber = filter_input(INPUT_POST, "removeType", FILTER_SANITIZE_NUMBER_INT);

echo $classNumber;




if($classNumber)
{   removeClass($classNumber);
    
}
elseif($MakeNumber){
    removeMake($MakeNumber);
    
}
elseIf($TypeNumber){
    removeType($TypeNumber);
    
}


//Make sure i call like this otherwise it wont work 
//Ask professor dave how to make this better
if ($newCarYear && $newCarMake && $newCarModel && $newCarClass && $newCarType && $newCarPrice) {
    insertNewCar($newCarYear, $newCarMake, $newCarModel, $newCarType, $newCarClass,  $newCarPrice);
} elseif (!empty($newMake)) {
    checkIfExistMake($newMake,getAllMakes());

} elseif (!empty($newType)) {
    checkIfExistType($newType, getAllType());

} elseif (!empty($newClass)) {
    checkIfExistClass($newClass, getAllClasses());
    
}


if ($editChoice == "default") {
    defaultView($carType, $carClass, $carMake, $orderPrice, $orderYear);
} elseif ($editChoice == "addVehicle") {

    addVehicleView($newCarYear, $newCarMake, $newCarModel, $newCarClass, $newCarType, $newCarPrice);
} elseif ($editChoice == "make") {
    editMakeView();
} elseif ($editChoice == "type") {
    editTypeView();
} elseif ($editChoice == "class") {
    editClassView();
} else {
    return defaultView($carType, $carClass, $carMake, $orderPrice, $orderYear);
}

?>








