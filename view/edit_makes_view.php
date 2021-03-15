<?php// require("./model/makes_db.php");
?>
  
<section>
    <h2>Add Vehicle Make</h2>
    <form class="dropDownSection" action="<?php echo $_SERVER["PHP_SELF"] ?>" method="POST">
    <?php 
        $chosenChart = getAllMakes();
        echo displayMakes($chosenChart);
    ?>




        <!--New car prize-->
        <h2>Add Vehicle Make</h2>
        <label for="newMake"> New Make:</label>
        <input class="dropDown" type="text" id="newMake" name="newMake"  required>


        <input type="submit" name="submitMake" value="Submit Make">
    </form>
</section>