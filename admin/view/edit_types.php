

<section>
    <h2>Add Vehicle Type</h2>
    <form class="dropDownSection" action="<?php echo $_SERVER["PHP_SELF"] ?>" method="POST">
    <?php 
        $chosenChart = Typedb::getAllType();
        echo displayType($chosenChart);
    ?>
        <!--New car prize-->
        <h2>Add Vehicle Type</h2>
        <label for="newType"> New Type:</label>
        <input class="dropDown" type="text" id="newType" name="newType" >


        <input type="submit" name="submitType" value="Submit Type">
    </form>
</section>

