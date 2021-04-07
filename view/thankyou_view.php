<?session_start();?>
<h2>Thank you for signing up,<? echo $_SESSION['userid'];?></h2> <!--Fix this
The Name is not showing up-->
    <br>
    <p><?php $error_message?></p>
    <br>


    <p><a href="./index.php">Back to home page.</a></p>