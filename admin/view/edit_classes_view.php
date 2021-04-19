
<section>
    <h2>Add Vehicle Class</h2>
    <form class="dropDownSection" action="<?php echo $_SERVER["PHP_SELF"] ?>" method="POST">
    <?php 
        $chosenChart = ClassDB::getAllClasses();
        echo displayClassesDel($chosenChart);
    ?>
        <!--New car prize-->
        <h2>Add Vehicle Class</h2>
        <label for="newClass"> New Class:</label>
        <input class="dropDown" type="text" id="newClass" name="newClass">


        <input type="submit" name="submitClass" value="Submit Class">
    </form>
</section>