<?php
    require 'includes_function/db_handler.inc.php';
    echo 'tukaj';

    if(isset($_POST['update'])){
        echo 'tukaj';

        $user = $_POST['user'];
        $license = $_POST['licenseID'];
        $date = $_POST['newDate'];
        $date = date('Y-m-d', $date);
    
        $sql = "update ima_dovoljenje SET dat_pridobitve = '".$date."' WHERE osebaID = '".$user."' AND dovoljenjeID = '".$license."';";
        $stmt= mysqli_stmt_init($conn);
        mysqli_stmt_prepare($stmt, $sql);
        mysqli_stmt_execute($stmt);
    }

    


   