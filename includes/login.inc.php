<?php
    if(isset($_POST["login-submit"])){
        require 'db_handler.inc.php';

        $mailUser= $_POST['mail'];
        $pwd= $_POST['pwd'];

        if(empty($mailUser) || empty($pwd)){
            header("Location: ../index.php?error=emptyfield");
            exit();
        }
        else{
            $sql = "select * from oseba where mail=?;";
            $stmt = mysqli_stmt_init($conn);

            if(!mysqli_stmt_prepare($stmt, $sql)){
                header("Location: ../index.php?error=sqlerror");
                exit();
            }
            else{

                mysqli_stmt_bind_param($stmt, "s", $mailUser);
                mysqli_stmt_execute($stmt);
                $result = mysqli_stmt_get_result($stmt);

                if($row = mysqli_fetch_assoc($result)){
                    $pwdCheck = password_verify($pwd, $row['pwd']);
                    if($pwdCheck == false){
                        header("Location: ../index.php?error=wrongpassword");
                        exit();
                    }
                    else if($pwdCheck == true){
                        session_start(['cookie_lifetime' => 86400,]);
                        $_SESSION['user']= $row['osebaID'];
                        $_SESSION['mail']= $row['mail'];
                        $_SESSION['imeOsebe'] = $row['ime'];
                        $_SESSION['priimekOsebe']= $row['priimek'];
                        $_SESSION['admin'] = $row['admin'];

                        header("Location: ../indexuser.php");
                        exit();

                    }
                    else{
                        header("Location: ../index.php?error=wrongpassword");
                        exit();
                    }

                }
                else{
                    header("Location: ../index.php?error=nouser");
                exit();
                }
            }
        }

    }
    else{
        header("Location: ../index.php");
        exit();
    }