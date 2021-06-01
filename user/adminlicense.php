<?php
    session_start();
    require 'includesuser/db_handler.inc.php';

    if(!isset($_SESSION['user'])){
        header("Location: ../indexuser.php");
        exit();
    }
    if($_SESSION['admin']!= 1){
        header("Location: ../indexuser.php");
        exit();
    }
?>
<html>
    <body>
        <form action="adminlicense.inc.php" method= "post">
            <label>The name of the License </label>
            <input type="text" name= "lName"><br>
            <label>Duration of License (in days)</label>
            <input type="number" name="last" min="1"><br>
            <input type="submit" name="newLic">

        </form>
    </body>

</html>