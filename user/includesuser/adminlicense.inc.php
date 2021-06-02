<?php
    session_start();
    require 'db_handler.inc.php';

    if(!isset($_SESSION['user'])){
        header("Location: ../../indexuser.php");
        exit();
    }
    if($_SESSION['admin']!= 1){
        header("Location: ../../indexuser.php");
        exit();
    }
    if(isset($_POST["newLic"])){
        if(empty($_POST['last']>59) || empty($_POST["lname"])){ //not working
            
            header("Location: ../adminlicense.php?error=error");
            exit();
        }
        else{
            $lifetime = $_POST['last'];
            $name=$_POST["lname"];
        }

        $sql ="insert into dovoljenje (naziv, rok_trajanja) values (?, ?);";
        $stmt = mysqli_stmt_init($conn);
        mysqli_stmt_prepare($stmt, $sql);
        $stmt->bind_param('si', $name, $lifetime);
        $stmt->execute();

        header("Location: ../../indexuser.php");
        exit();   
    }
