<?php
    require '../header.php';
    //footer here when it works
    require '../includes/db_handler.inc.php';
    require 'includesuser/updatelicense.inc.php';
    require 'includesuser/updaterole.inc.php';
    require 'includesuser/indexuser_role.inc.php';

    if(!isset($_SESSION['user'])){
        header("../../index.php");
    }
    else{
           
    $user = $_SESSION['user'];
    $mail = $_SESSION['mail'];
    $ime = $_SESSION['imeOsebe'];
    $priimek = $_SESSION['priimekOsebe'];
    $_SESSION['table'] = array();


    $table = array();
 
    
    echo 
    '<div class="panel panel-default">
    <div class="panel-heading container">Licenses</div>
    <div class="panel-body container"><table class = "table table-striped">';
        echo '<tr><th>License </th> <th> Person </th> <th> Maturity date </th> <th> Delete it </th><th> New Date</th><th>Update</th></tr> ';

        $sql = 'select * from ima_dovoljenje where osebaID ='.$user.';';
        $stmt = mysqli_prepare($conn, $sql) or die();
        mysqli_stmt_execute($stmt);
        mysqli_stmt_bind_result($stmt, $osebaID, $dovoljenjeID, $pridobitev1);

        $pridobitev = $pridobitev1;
        $table1 = array();
        $table1 = role($user);

        display($table1[0], $table1[1], $table1[2]);


        $table = array();
        $table = $_SESSION['table'];
        usort($table, "tablearray");
        
        foreach($table as $row){

            $ime = $row[1];
            $dovoljenje = $row[0];
            $pridobitev = $row[2];
            $dovoljenjeID = $row[5];
            $osebaID = $row[6];

            echo '<tr> <td>'.$dovoljenje.
            '</td><td>'.$ime.'</td><td>'
            .date('d/m/Y', $pridobitev).'</td><td>
            <form action="includesuser/delete.inc.php" method= "POST" id="delete">
            <input hidden name="licenseid" value="'.$dovoljenjeID.'">
            <input hidden name="userid" value="'.$osebaID.'">
            <input type="hidden" value="'.$pridobitev.'" name="date">
            <input type= "submit" value= "delete" name= "delete"></form></td>
            
            <td> <form action= "includesuser/updatelicense.inc.php" method = "POST"> <input type= "date" name= "newDate">
            <input type="hidden" value="'.$row[1].'" name="userid">
            <input type="hidden" value="'.$row[0].'" name="licenseID"></td><td>
             <input type= "submit" name = "update" value= "Update" ></form></td></tr>'; 
        }
    
    echo '</table></div></div>';

    echo '<form action= "includesuser/addlicense.php"><button style= "float: right; margin-right: 500px; margin-top: 20px;"> Add License </button></form>';

    $role = roleupdate($user);
    if($role == 1){
        echo '<form action= "adminlicense.php"><button style= "float: right; margin-right: 330px;">Create New License</button></form>';
    }

    }
 
    function tablearray($a, $b){
        if($a[4]->days == $b[4]->days)
            return 0;
        if($a[4]->days<$b[4]->days)
            return -1;
        if($a[4]->days>$b[4]->days)
            return 1;
    }