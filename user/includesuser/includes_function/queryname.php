<?php

function queryname_user($ID){
    require 'db_handler.inc.php';

    $query = 'select ime, priimek from oseba where osebaID ='.$ID.';';

    $stmt = mysqli_prepare($conn, $query) or die('connection died');
    mysqli_stmt_execute($stmt);
    mysqli_stmt_bind_result($stmt, $ime, $priimek);
    $stmt->fetch();
    $_SESSION['imeOsebe']= $ime;
    $_SESSION['priimekOsebe']= $priimek;
    return $ime.' '.$priimek;
}
