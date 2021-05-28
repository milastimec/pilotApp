<?php
   

function function1($company){
    require 'db_handler.inc.php';
    //preveri če company že obstaja
    $stmt=mysqli_stmt_init($conn);

    $sql= "select * from podjetje where imeP = ?;";
    $stmt->prepare($sql);
    $stmt->bind_param('s', $company);
    $stmt->execute();
    mysqli_stmt_store_result($stmt);
    $resultCheck = mysqli_stmt_num_rows($stmt);

    if($resultCheck> 0){
        exit();
    }

    //nova forma za vnos podjetja- NUJNO!

    $sqlc= "insert into podjetje (imeP) values (?)";

    $stmt->prepare($sqlc);
    $stmt->bind_param('s', $company);
    $stmt->execute() or die($stmt-> error);
    $stmt->close(); 
}
function insertPersonCompany($company, $userID, $role){
    require 'db_handler.inc.php';
    $stmt=mysqli_stmt_init($conn);
    $companyx = getCompanyID($company);
    $sqlc= "insert into dela_kot (osebaID, naziv, podjetjeID) values (?, ?, ?);";
    mysqli_stmt_prepare($stmt, $sqlc);
    echo mysqli_stmt_error($stmt);
    $stmt->bind_param('isi', $userID, $role, $companyx);
    $stmt->execute();
}

function getCompanyID($company){
    require 'db_handler.inc.php';
    $stmt=mysqli_stmt_init($conn);
    $sqlc= "select podjetjeID from podjetje where imeP = '".$company."';";
    mysqli_stmt_prepare($stmt, $sqlc);
    mysqli_stmt_execute($stmt);
    $stmt->bind_result($result);
    while($stmt->fetch()){
        return $result;
    }

}

function insertPerson( $userID, $role){
    require 'db_handler.inc.php';
    $stmt=mysqli_stmt_init($conn);
    $sqlc= "insert into dela_kot (osebaID, naziv, podjetjeID) values (?, ?, NULL);";
    mysqli_stmt_prepare($stmt, $sqlc);
    echo mysqli_stmt_error($stmt);
    $stmt->bind_param('isi', $userID, $role);
    $stmt->execute();
}
