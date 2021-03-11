
<?php function defaultView($carType, $carClass, $carMake, $orderPrice, $orderYear)
{
    if (!$carType || !$carMake || !$carClass || !$orderPrice || !$orderYear) {

        require("./model/makes_db.php"); //HERE
        require("./model/type_db.php"); //HERE
        require("./model/classes_db.php"); //HERE
        require("./model/database_db.php");
        require("./view/dropdown_menu.php");
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
        echo displayWithDelete($chosenChart);
    }
    //..........................................



    require("./view/admin_footer.php");
} ?>

<?php
function addVehicleView($newCarYear, $newCarMake, $newCarModel, $newCarClass, $newCarType, $newCarPrice)
{

    if (!$newCarYear && !$newCarMake && !$newCarModel && !$newCarClass && !$newCarType && !$newCarPrice) {
        require("./view/add_vehicle.php");
    } else {
        insertNewCar($newCarYear, $newCarMake, $newCarModel, $newCarClass, $newCarType, $newCarPrice);
    }
    require("./view/admin_footer.php");
} ?>

<?php 
    function editMakeView(){
        require("./view/edit_makes.php");
        require("./view/admin_footer.php");
    }

?>

<?php
    function editTypeView(){
        require("./view/edit_types.php");
        require("./view/admin_footer.php");

    }
?>

<?php
  
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


//Make sure i call like this otherwise it wont work 
//Ask professor dave how to make this better
if ($newCarYear && $newCarMake && $newCarModel && $newCarClass && $newCarType && $newCarPrice) {
    insertNewCar($newCarYear, $newCarMake, $newCarModel, $newCarType, $newCarClass,  $newCarPrice);
}
elseif(!empty($newMake)){
    require("./model/makes_db.php");
    addMake($newMake);
}
elseif(!empty($newType)){
    require("./model/Type_db.php");
    addType($newType);
}


if ($editChoice == "default") {
    defaultView($carType, $carClass, $carMake, $orderPrice, $orderYear);

} elseif ($editChoice == "addVehicle") {
  
    addVehicleView($newCarYear, $newCarMake, $newCarModel, $newCarClass, $newCarType, $newCarPrice);
}
elseif($editChoice == "make"){
    editMakeView();
}
elseif($editChoice == "type"){
    editTypeView();
}
elseif($editChoice == "class"){
    
}
else{
    return defaultView($carType, $carClass, $carMake, $orderPrice, $orderYear);

}




?>







