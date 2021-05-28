<?php
// it works don't touch
require 'includes_function/db_handler.inc.php';

$user = $_POST['user_id'];
$license = $_POST['licenseID'];
$date = $_POST['date'];
$date = date('Y-m-d', $date);

$sql= "delete from ima_dovoljenje where osebaID = '".$user."' AND dovoljenjeID = '".$license."' AND dat_pridobitve = '".$date."';";
$stmt = mysqli_prepare($conn, $sql) or die();
mysqli_stmt_execute($stmt);

header('Location: ../../indexuser.php');