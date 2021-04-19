<?php

// ................................Main..................................
require("./controller/controller.php");
require("./model/makes_db.php"); //Thisa works for all So far 
require("./model/type_db.php");
require("./model/classes_db.php"); // here if 
require("../admin/model/admin_db.php");
require("../admin/view/header.php");
require("../admin/model/database.php");
require("../admin/view/charts.php");
require("../admin/model/vehicle_db.php");

require_once("./model/admin_db.php");

$carCategory = "Inventory";


//...................................For Drop Down Menu...............................
$carType  = filter_input(INPUT_POST, "dropDownType", FILTER_SANITIZE_NUMBER_INT);
$carMake  = filter_input(INPUT_POST, "dropDownMake", FILTER_SANITIZE_NUMBER_INT);
$carClass = filter_input(INPUT_POST, "dropDownClass", FILTER_SANITIZE_NUMBER_INT);
$orderPrice  = filter_input(INPUT_POST, "price", FILTER_SANITIZE_STRING);
$orderYear = filter_input(INPUT_POST, "year", FILTER_SANITIZE_STRING);

//...................................For Form in footer...............................
$editChoice = filter_input(INPUT_GET, "admin_edit", FILTER_SANITIZE_STRING);

//...................................Input for adding new car information...............................
$newCarMake = filter_input(INPUT_POST, "newCarMake",  FILTER_SANITIZE_NUMBER_INT);
$newCarType = filter_input(INPUT_POST, "newCarType", FILTER_SANITIZE_NUMBER_INT);
$newCarClass = filter_input(INPUT_POST, "newCarClass", FILTER_SANITIZE_NUMBER_INT);
$newCarYear = filter_input(INPUT_POST, "newCarYear", FILTER_SANITIZE_NUMBER_INT);
$newCarModel = filter_input(INPUT_POST, "newCarModel", FILTER_SANITIZE_STRING);
$newCarPrice = filter_input(INPUT_POST, "newCarPrice", FILTER_SANITIZE_NUMBER_INT);

$submitCar = filter_input(INPUT_POST, "submitCar", FILTER_SANITIZE_STRING);

//.............................New car info ...........................................................
$newMake = filter_input(INPUT_POST, "newMake", FILTER_SANITIZE_STRING);
$newType = filter_input(INPUT_POST, "newType", FILTER_SANITIZE_STRING);
$newClass = filter_input(INPUT_POST, "newClass", FILTER_SANITIZE_STRING);
//.............................Removing car info.....................................................
$classNumber = filter_input(INPUT_POST, "removeClass", FILTER_SANITIZE_NUMBER_INT);
$MakeNumber = filter_input(INPUT_POST, "removeMake", FILTER_SANITIZE_NUMBER_INT);
$TypeNumber = filter_input(INPUT_POST, "removeType", FILTER_SANITIZE_NUMBER_INT);

//............................. Verification Information ...........................................................
$action = filter_input(INPUT_GET, "action", FILTER_SANITIZE_STRING);
$userName= filter_input(INPUT_GET, "action", FILTER_SANITIZE_STRING);
$password = filter_input(INPUT_GET, "action", FILTER_SANITIZE_STRING);
$confirm_password = filter_input(INPUT_GET, "action", FILTER_SANITIZE_STRING);

switch($action){
    case "login":
        header("location: ./controller/admin.php?action=login");
        break;
    case "register":
        header("location: ./controller/admin.php?action=register");
        break;
    case "logout":
        header("location: ./controller/admin.php?action=logout");
        break;
    case "logout":
        header("location: ./controller/admin.php?action=show_admin_menu");
        break;
}


if($_SESSION["is_valid_admin"] == false){
    header("location: ./controller/admin.php?action=login");
}

    if ($classNumber) {
        ClassDB::removeClass($classNumber);
    } elseif ($MakeNumber) {
        removeMake($MakeNumber);
    } elseif ($TypeNumber) {
        removeType($TypeNumber);
    }


    //Make sure i call like this otherwise it wont work 
    //Ask professor dave how to make this better
    if ($newCarYear && $newCarMake && $newCarModel && $newCarClass && $newCarType && $newCarPrice) {
        insertNewCar($newCarYear, $newCarMake, $newCarModel, $newCarType, $newCarClass,  $newCarPrice);
    } elseif (!empty($newMake)) {
        checkIfExistMake($newMake, getAllMakes());
    } elseif (!empty($newType)) {
        checkIfExistType($newType, getAllType());
    } elseif (!empty($newClass)) {
        checkIfExistClass($newClass, ClassDB::getAllClasses());
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