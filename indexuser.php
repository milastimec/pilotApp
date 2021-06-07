<?php

    require 'header.php';
//footer when it will work
    require 'includes/queryuser.inc.php';
    require 'includes/queryname.inc.php';
    require 'includes/sendmail.php';
    require 'user/includesuser/indexuser_role.inc.php';

    $user = $_SESSION['user'];
    $mail = $_SESSION['mail'];
    $_SESSION['table'] = array();
    $table = array();

    if(!isset($_SESSION['user'])){
        header("location: index.php");
        exit();
    }
    
    echo 
    '<div class="panel panel-default">
    <div class="panel-heading container">Licenses</div>
    <div class="panel-body container"><table class = "table table-striped">';
        echo '<tr><th>License </th> <th> Person </th> <th> Maturity date </th> <th> Expiry date </th> <th> Days till Expiration</th> <th> Send Email </th></tr> ';

        $roles= array();
        $roles = role($user);

        $user = $roles[0];
        $company = $roles[1];
        $role = $roles[2];

        display($user, $company, $role);

        $table = $_SESSION['table'];

        usort($table, "tablearray");
        
        foreach($table as $row){

            $dovoljenje = $row[0];
            $ime = $row[1];
            $pridobitev = $row[2];
            $date = $row[3];
            $difference = $row[4];
            $dovoljenjeID = $row[5];
            $osebaID = $row[6];

            echo '<tr> <td>'.$dovoljenje.
            '</td><td>'.$ime.'</td><td>'
            .date('d/m/Y', $pridobitev).'</td><td>'.$date->format('d/m/Y').
            '</td> <td>'.$difference->days.'
            </td><td><form method = "POST" action=""> <input type= "submit" value= "email me!">
            <input hidden name="licenseid" value="'.$dovoljenjeID.'">
            <input hidden name="userid" value="'.$osebaID.'">
            <input hidden name= "action" value="emailme" ></form></td></tr>'; 
        }
    
    echo '</table></div></div>';

    echo '<form action= "user/updatelicense.php"><button style= "float: right; margin-right: 300px;"> Update </button></form>';
    echo '<form action= "user/includesuser/addlicense.php"><button style= "float: right; margin-right: 50px;">Add License </button></form>';

    function tablearray($a, $b){
        if($a[4]->days == $b[4]->days)
            return 0;
        if($a[4]->days<$b[4]->days)
            return -1;
        if($a[4]->days>$b[4]->days)
            return 1;
    }