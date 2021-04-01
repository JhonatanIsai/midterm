<?session_start();
echo $_SESSION["userid"]?>
<h2>Thank you for signing up,</h2>
    <br>
    <p><?php $error_message?></p>
    <br>


    <p><a href="../../index.php">Back to home page.</a></p>