<?php 
        
        require("./model/type_db.php");
        require("./model/makes_db.php");
        require("./model/classes_db.php");
        global $newCarPrice;

?>

<section>
    <h2>Add Vehicle</h2>
    <form class="dropDownSection" action="<?php echo $_SERVER["PHP_SELF"] ?>" method="POST">

        <!--Selector for Makes-->
        <label for="newCarMake"> Make:</label>
        <select class="dropDown" name="newCarMake" id="newCarMake" default="field">
            <option value="" disabled selected>Choose Make</option>
            <?php foreach (getAllMakes() as $makes) : ?>
                <option class="option" value="<?php echo intval($makes["ID"]); ?>"><?php echo $makes["make"]; ?></option>

            <?php endforeach ?>
        </select>

        <!--Selector for Types-->
        <label for="newCarType"> Type:</label>
        <select class="dropDown" name="newCarType" id="newCarType" default="field">
            <option value="" disabled selected>Choose Type</option>
            <?php foreach (getAllType() as $types) : ?>
                <option class="option" value="<?php echo intval($types["ID"]); ?>"><?php echo $types["type"]; ?></option>

            <?php endforeach ?>
        </select>

        <!--Selector for Class-->
        <label for="newCarClass"> Class:</label>
        <select class="dropDown" name="newCarClass" id="newCarClass" default="field">
            <option value="" disabled selected>Choose Class</option>
            <?php foreach (getAllClasses() as $classes) : ?>
                <option class="option" value="<?php echo intval($classes["ID"]); ?>"><?php echo $classes["class"]; ?></option>

            <?php endforeach ?>
        </select>

        <!--New car year-->
        <label for="newCarYear"> Year:</label>
        <input class="dropDown" type="text" id="newCarYear" name="newCarYear" maxlength="4" required>



        <!--New car model-->
        <label for="newCarModel"> Model:</label>
        <input class="dropDown" type="text" id="newCarModel" name="newCarModel" required>



        <!--New car prize-->
        <label for="newCarPrice"> Price:</label>
        <input class="dropDown" type="text" id="newCarPrice" name="newCarPrice" maxlength="7" required>


        <input type="submit" name="submitCar" value="Submit Car">
    </form>
</section>