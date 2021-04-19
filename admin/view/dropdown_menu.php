<form class="conteiner" action="<?php echo $_SERVER["PHP_SELF"] ?>" method="POST">

        <div class="dropDownSection">
            <!--Selector for Types-->
            <select class="dropDown" name="dropDownType" id="dropDownType" default="field">
                <option value="" disabled selected>Choose Type</option>
                <?php foreach (TypeDB::getAllType() as $types) : ?>
                    <option class="option" value="<?php echo intval($types["ID"]); ?>"><?php echo $types["type"]; ?></option>

                <?php endforeach ?>
            </select>

            <!--Selector for Makes-->
            <select class="dropDown" name="dropDownMake" id="dropDownMake" default="field">
                <option value="" disabled selected>Choose Make</option>
                <?php foreach (MakesDB::getAllMakes() as $makes) : ?>
                    <option class="option" value="<?php echo intval($makes["ID"]); ?>"><?php echo $makes["make"]; ?></option>

                <?php endforeach ?>
            </select>

            <!--Selector for Class-->
            <select class="dropDown" name="dropDownClass" id="dropDownClass" default="field">
                <option value="" disabled selected>Choose Class</option>
                <?php foreach (ClassDB::getAllClasses() as $classes) : ?>
                    <option class="option" value="<?php echo intval($classes["ID"]); ?>"><?php echo $classes["class"]; ?></option>

                <?php endforeach ?>
            </select>
            

        </div>
        <!--..................................................................................................................-->

        <div>
            <P>Sort by:</P>
            <input type="radio" id="price" name="price" value="price">
            <label for="price">Price</label><br>

            <input type="radio" id="year" name="year" value="year">
            <label for="year">Year</label><br>
        </div>
        
        <input type="submit" name="submit" value="Choose option">
    </form>