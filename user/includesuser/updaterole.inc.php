<?php

function roleupdate($user){

    require 'db_handler.inc.php';
    $sql= "select admin from oseba where osebaID = '".$user."';";

    $stmt = mysqli_stmt_init($conn);
    mysqli_stmt_prepare($stmt, $sql) or die(mysqli_error());
    mysqli_stmt_execute($stmt);
    mysqli_stmt_bind_result($stmt, $admin);

    while($stmt->fetch()){
        return $admin;
    }

}