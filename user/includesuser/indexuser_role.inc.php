<?php

function role($user){
    require 'db_handler.inc.php';
    $sql= "select podjetjeID, naziv from dela_kot where osebaID = '".$user."';";

    $stmt = mysqli_stmt_init($conn);
    mysqli_stmt_prepare($stmt, $sql) or die(mysqli_error());
    mysqli_stmt_execute($stmt);
    mysqli_stmt_bind_result($stmt, $companyID, $role);

    while($stmt->fetch()){
        $role1 = $role;
        $company = $companyID;

        $array = array($user, $company, $role1);
        return $array;
        display($user, $company, $role1);
    }

}

function display($user, $company, $role){
    require 'db_handler.inc.php';

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

    require 'db_handler.inc.php';
    include_once 'includes_function/queryuser.php';
    include_once 'includes_function/queryname.php';

    $sql = "select * from ima_dovoljenje where osebaID ='".$user."';";
    $stmt = mysqli_prepare($conn, $sql) or die();
    mysqli_stmt_execute($stmt);
    mysqli_stmt_bind_result($stmt, $osebaID, $dovoljenjeID, $pridobitev);
     $table = array();

    while($stmt->fetch()){
        $dovoljenje = queryuser_user($dovoljenjeID);
        
        $_SESSION['imeDovoljenja']= $dovoljenje;
        $ime = queryname_user($osebaID);
        $pridobitev = strtotime($pridobitev);
        $potek = $_SESSION['potek'];
        $date= new DateTime (date('Y-m-d', $pridobitev));
        $currentdate = new DateTime (date('d-m-Y'));
        $date1= $date;
        date_add($date,date_interval_create_from_date_string( $potek."days"));

        $difference = date_diff($date, $currentdate);

        $row = array( $dovoljenje, $ime, $pridobitev, $date, $difference);
        array_push($_SESSION['table'],$row);
    }
 }