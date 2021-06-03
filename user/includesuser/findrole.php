<?php

 function findrole($user){
    require '../../includes/db_handler.inc.php';
    $sql= "select podjetjeID, naziv from dela_kot where osebaID = '".$user."';";

    $stmt = mysqli_stmt_init($conn);
    mysqli_stmt_prepare($stmt, $sql) or die(mysqli_error());
    mysqli_stmt_execute($stmt);
    mysqli_stmt_bind_result($stmt, $companyID, $role);

    while($stmt->fetch()){
        $role1 = $role;
        $company = $companyID;
        display($user, $company, $role1);
    }

 }

 function display($user, $company, $role){
    require '../../includes/db_handler.inc.php';

    if($role == 'vodja'){
        $sql = 'select * from dela_kot where podjetjeID = '.$company.';';

        $stmt = mysqli_stmt_init($conn);
        mysqli_stmt_prepare($stmt, $sql) or die(mysqli_error());
        mysqli_stmt_execute($stmt);
        mysqli_stmt_bind_result($stmt, $osebaID, $companyID, $role);

        while($stmt->fetch()){

            getName($osebaID);
        }
    }
    else{
        getName($user);
    }
 }

 function getName($user){
    require '/db_handler.inc.php';

    $sql= 'select ime, priimek from oseba where osebaID = "'.$user.'";';

    $stmt = mysqli_stmt_init($conn);
    mysqli_stmt_prepare($stmt, $sql) or die(mysqli_error());
    mysqli_stmt_execute($stmt);
    mysqli_stmt_bind_result($stmt, $ime, $priimek);

    while($stmt->fetch()){
        echo '<option  name = "person" value = "'.$user.'">'.$ime.' '.$priimek.'</option>';

    }

 }

 function licenca($name){
     require 'db_handler.inc.php';

     $sql= 'select count(dovoljenjeID) from dovoljenje where lower(naziv) = lower(?);';

    $stmt = mysqli_stmt_init($conn);
    mysqli_stmt_prepare($stmt, $sql);
    $stmt->bind_param('s', $name);
    mysqli_stmt_execute($stmt);
    $stmt->bind_result($count);

    while($stmt->fetch()){
        return $count;
    }
    
 }
