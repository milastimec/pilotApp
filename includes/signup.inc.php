<?php
    session_start();

    if(isset($_POST['signup-submit'])){
        
        require 'db_handler.inc.php';

        $mail = $_POST['mail'];
        $name = $_POST['name'];
        $surname = $_POST['surname'];
        $password = $_POST['pwd'];
        $passRepeat = $_POST['pwd-repeat'];


        //error handlers

        if(empty($mail) || empty($name) || empty($surname) || empty($password) || empty($passRepeat)){
            header("location: ../signup.php?error=emptyfields&mail=".$mail."name=".$name."surname".$surname);
            exit();
        }
        elseif (!filter_var($mail, FILTER_VALIDATE_EMAIL)){
            header("location: ../signup.php?error=invalidemail&name=".$name."surname".$surname);
            exit(); 
        }
        elseif (!preg_match("/^[a-zA-Z]*$/", $name) && !preg_match("/^[a-zA-Z]*$/", $surname)){
            header("location: ../signup.php?error=invalidname&mail=".$mail);
            exit(); 
        }
        elseif ($password !== $passRepeat){
            header("location: ../signup.php?error=passerror&mail=".$mail."name=".$name."surname".$surname);
            exit();
        }
        else{
            $sql = "select mail from oseba where mail = ?";
            $stmt = mysqli_stmt_init($conn);

            if(!mysqli_stmt_prepare($stmt, $sql)){
                header("location: ../signup.php?error=mysqlerror");
                exit(); 
            }
            else{
                mysqli_stmt_bind_param($stmt, "s", $mail);
                mysqli_stmt_execute($stmt);
                mysqli_stmt_store_result($stmt);

                $resultCheck = mysqli_stmt_num_rows($stmt);
                if($resultCheck > 0){
                    header("location: ../signup.php?error=emailtaken");
                    exit();

                }
                else{
                    $sql= "insert into oseba (ime, priimek, mail, pwd) values (?, ?, ?, ?)";
                    $stmt = mysqli_stmt_init($conn);

                    if(!mysqli_stmt_prepare($stmt, $sql)){
                        header("location: ../signup.php?error=".mysqli_stmt_error($stmt));
                        exit(); 
                    }
                    else{

                        $hashpwd= password_hash($password, PASSWORD_DEFAULT);


                        mysqli_stmt_bind_param($stmt, "ssss", $name, $surname, $mail, $hashpwd);
                        mysqli_stmt_execute($stmt);
                        
                        $sql1= "select osebaID from oseba where mail = ?";
                        $stmt = mysqli_stmt_init($conn);
                        $stmt->prepare($sql1);
                        $stmt->bind_param('s', $mail);
                        $stmt->execute();
                        $stmt->bind_result($id);
                        while($stmt->fetch()){
                            $_SESSION['newuser']=$id;
                        }
                        

                        header("Location: ../newsignup_settings/signup_secondary_settings.php");
                        exit(); 
                    }

                }
            }
        }

        mysqli_stmt_close($stmt);
        mysqli_close($conn);

    }

    else{
        header("location: ../signup.php");
        exit();
    }