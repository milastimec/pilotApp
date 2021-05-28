<?php

function queryuser_user($ID){
    require 'db_handler.inc.php';

    $query = 'select * from Dovoljenje where dovoljenjeID ='.$ID.';';

    $stmt = mysqli_prepare($conn, $query) or die('connection died');
    mysqli_stmt_execute($stmt);
    mysqli_stmt_bind_result($stmt, $ID, $ime, $potek);
    $stmt->fetch();
    
    $_SESSION['potek'] = $potek;
    return $ime;
}
