<?php require("./model/makes_db.php");
?>
  
<section>
    <h2>Add Vehicle Class</h2>
    <form class="dropDownSection" action="<?php echo $_SERVER["PHP_SELF"] ?>" method="POST">
    <?php 
        $chosenChart = getAllClasss();
        echo displayClasss($chosenChart);
    ?>




        <!--New car prize-->
        <h2>Add Vehicle Class</h2>
        <label for="newClass"> New Class:</label>
        <input class="dropDown" type="text" id="newClass" name="newClass"  required>


        <input type="submit" name="submitClass" value="Submit Class">
    </form>
</section>