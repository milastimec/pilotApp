<?php
    session_start();
    require 'db_handler.inc.php';
    require 'function1.inc.php';


    if(isset($_POST['secondaryInfo'])){

        $company = $_POST['company'];
        $city = $_POST['place'];
        $role = $_POST['role'];
        $user=$_SESSION['newuser'];

        if(empty($role)){
            header("location: ../signup_secondary_settings.php?error=emptyRole");
            exit();
        }
        else{

            if(!empty($company)){
                function1($company);  
                insertPersonCompany($company, $user, $role);
            }
            else{
                insertPersonCompany($user, $role);
            }

            //u need to login after u finish this input
            session_destroy();

            header("Location: ../../index.php");
            exit(); 
        }

    }