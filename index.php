<?php 
    require("./view/header.php");
    require("./model/makes_db.php"); //HERE
    require("./model/type_db.php"); //HERE
    require("./model/classes_db.php"); //HERE
    require("./model/database_db.php");
    require("./model/database.php");
    require("./view/charts.php");

    
    $carCategory = "Inventory";
    


    $carType  = filter_input(INPUT_POST, "dropDownType", FILTER_SANITIZE_NUMBER_INT);
    $carMake  = filter_input(INPUT_POST, "dropDownMake", FILTER_SANITIZE_NUMBER_INT);
    $carClass = filter_input(INPUT_POST, "dropDownClass", FILTER_SANITIZE_NUMBER_INT);
    $orderPrice  = filter_input(INPUT_POST, "price", FILTER_SANITIZE_STRING);
    $orderYear = filter_input(INPUT_POST, "year", FILTER_SANITIZE_STRING);


?>
<section>
    <!--Choose category -->
<?php if(!$carType || !$carMake || !$carClass || !$orderPrice || !$orderYear){
    $chosenChart = getAllByYear();
    require("./view/dropdown_menu.php");
  
    
    
}?>

    <?php
        if(!empty($carType) && (!empty($carClass) || !empty($carMake))){
            echo "<h2> Choose Only one option from dropdown menu. </h2>"; //Center
        }
        elseif(!empty($carClass) && (!empty($carType) || !empty($carMake))){
            echo "<h2> Choose Only one option from dropdown menu. </h2>"; //Center
        }
        elseif(!empty($carMake) && (!empty($carClass) || !empty($carType))){
            echo "<h2> Choose Only one option from dropdown menu. </h2>"; //Center
        }
        else{
            if(!empty($carType)){
                if(!empty($orderPrice) && !$orderYear){
                    $chosenChart = getTypeByPrice($carType);
                }
                elseif(!empty($orderYear) && !$orderPrice){
                    $chosenChart = getTypeByYear($carType);
                }
                else{
                    $chosenChart = getAllByType($carType);
                }
            }
            elseif(!empty($carClass)){
                if(!empty($orderPrice) && !$orderYear){
                    $chosenChart = getClassByPrice($carClass);
                }
                elseif(!empty($orderYear) && !$orderPrice){
                    $chosenChart = getClassByYear($carClass);
                }
                else{
                    $chosenChart = getAllByClass($carClass);
                }
            }
            elseif(!empty($carMake)){
                if(!empty($orderPrice) && !$orderYear){
                    $chosenChart = getMakeByPrice($carMake);
                }
                elseif(!empty($orderYear) && !$orderPrice){
                    $chosenChart = getMakeByYear($carMake);
                }
                else{
                    $chosenChart = getAllByMake($carMake);
                }
            }
            elseif(!empty($orderPrice) && !$orderYear){
                $chosenChart = getAllByPrice();
            }
            elseif(!empty($orderYear) && !$orderPrice){
                $chosenChart = getAllByYear();
            }
            
        }
    
      
        echo display($chosenChart);
    ?>

<?php require("./view/footer.php"); ?>    