<?php
if(isset($_POST['add-submit'])){

    require '../../includes/db_handler.inc.php';
    $license = $_POST['dovoljenja'];
    $person = $_POST['person'];
    $date = $_POST['dat_pridobitve'];

    $sql = "insert into ima_dovoljenje values ('".$person."', '".$license."', '".$date."');";
    $stmt = mysqli_prepare($conn, $sql) or die();
    mysqli_stmt_execute($stmt);
    header('Location: ../../indexuser.php');

}