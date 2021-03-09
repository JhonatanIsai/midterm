

<?php   require("../view/header.php");
    require("</model/makes_db.php"); //HERE
    require(".../model/type_db.php"); //HERE
    require("../model/classes_db.php"); //HERE
    require("../model/database_db.php");
    require("../model/database.php");
    require("../view/charts.php");?>


<?php 
    $newYear = filter_input(INPUT_POST, "newYear", FILTER_SANITIZE_NUMBER_INT);
    $newMake = filter_input(INPUT_POST, "newMake", FILTER_SANITIZE_STRING);
    $newModel = filter_input(INPUT_POST, "newModel", FILTER_SANITIZE_STRING);
    $newType = filter_input(INPUT_POST, "newType", FILTER_SANITIZE_STRING);
    $newClass = filter_input(INPUT_POST, "newClass", FILTER_SANITIZE_STRING);
    $newPrice = filter_input(INPUT_POST, "newPrice", FILTER_SANITIZE_NUMBER_INT);

?>

<?php if(!$newYear || !$newMake || !$newModel || !$newType || !$newClass || !$newPrice){?>
<section>
    <h2>Add Vehicle</h2>
    <form action ="<?php echo $_SERVER["PHP_SELF"]?>" method="POST">

        <?php require("../view/dropdown_menu.php");?>
        <label for="newPrice"> Year:</label>
        <input type="text" id="newYear" name="newYear" maxlength="4" required>

        <label for="newMake"> Make:</label>
        <input type="text" id="newMake" name="newMake" required>

        <label for="newModel"> Model:</label>
        <input type="text" id="newModel" name="newModel" required>

        <label for="newType"> Type:</label>
        <input type="text" id="newType" name="newType" required>

        <label for="newClass"> Class:</label>
        <input type="text" id="newClass" name="newClass" required>

        <label for="newPrice"> Price:</label>
        <input type="text" id="newPrice" name="newPrice" maxlength="7" required>

        <button>Submit</button>
    </form>
</section>

<?php };?> 

<?php require("../view/admin_footer.php");?>