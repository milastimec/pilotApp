<?php
// it works don't touch
session_start();
require 'db_handler.inc.php';

if(isset($_SESSION['user'])){
    if(isset($_POST['delete'])){
        $user = $_POST['userid'];
        $license = $_POST['licenseid'];
        

        $sql= "delete from ima_dovoljenje where osebaID = '".$user."' AND dovoljenjeID = '".$license."';";
        $stmt = mysqli_prepare($conn, $sql) or die();
        
        if(mysqli_stmt_execute($stmt)){
            header('Location: ../../indexuser.php?success');
        }
        else{
            header('Location: ../../indexuser.php?error');
        }

        
    }
}

