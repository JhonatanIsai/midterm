<?php function defaultView($carType, $carClass, $carMake, $orderPrice, $orderYear)
{
    if (!$carType || !$carMake || !$carClass || !$orderPrice || !$orderYear) {

        try {
   
            require(".././admin/model/database_db.php");
            // For drop Down Menu//
            require(".././admin/view/dropdown_menu.php"); ///*Changed this  */
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
                if (!empty($carType)) { //If car Type received input
                    if (!empty($orderPrice) && !$orderYear) {
                        $chosenChart = getTypeByPrice($carType);
                    } elseif (!empty($orderYear) && !$orderPrice) {
                        $chosenChart = getTypeByYear($carType);
                    } else {
                        $chosenChart = getAllByType($carType);
                    }
                } elseif (!empty($carClass)) { //If car class received input
                    if (!empty($orderPrice) && !$orderYear) {
                        $chosenChart = ClassDB::getClassByPrice($carClass);
                    } elseif (!empty($orderYear) && !$orderPrice) {
                        $chosenChart = ClassDB::getClassByYear($carClass);
                    } else {
                        $chosenChart = ClassDB::getAllByClass($carClass);
                    }
                } elseif (!empty($carMake)) { //If car make had input
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
            
            echo displayWithDelete($chosenChart); // Fixed it
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
    ClassDB::addClass($newItem);
 }
}

function callRegister(){
    try{
        require("./view/register_view.php");
    }
    catch(Exception $e){
        header("location: ./admin.php");
    }
}
?>
