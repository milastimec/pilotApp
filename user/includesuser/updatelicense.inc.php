<?php
    require 'includes_function/db_handler.inc.php';

    if(isset($_POST['update'])){

        $user = $_POST['user'];
        $license = $_POST['licenseID'];
        $date = $_POST['newDate'];

    
        $sql = "update ima_dovoljenje SET dat_pridobitve = '".$date."' WHERE osebaID = '".$user."' AND dovoljenjeID = '".$license."';";
        $stmt= mysqli_stmt_init($conn);
        mysqli_stmt_prepare($stmt, $sql);

        if(mysqli_stmt_execute($stmt)){
            header('Location: ../../indexuser.php?success');
        }
        else{
            header('Location: ../../indexuser.php?error');
        }
    }

    


   