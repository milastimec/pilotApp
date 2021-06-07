<?php
if(!isset($_SESSION)){
    session_start();
}
    
    require 'db_handler.inc.php';

    use PHPMailer\PHPMailer\PHPMailer;
    use PHPMailer\PHPMailer\Exception;
    require 'C:/xampp/htdocs/pilotapp/includes/PHPMailer-master/PHPMailer-master/src/Exception.php';
    require 'C:/xampp/htdocs/pilotapp/includes/PHPMailer-master/PHPMailer-master/src/PHPMailer.php';
    require 'C:/xampp/htdocs/pilotapp/includes/PHPMailer-master/PHPMailer-master/src/SMTP.php';

if(isset($_POST['action']) && $_POST['action'] == "emailme"){
    //function to get name and license
    $person = array();
    $person = name($_POST['userid']);
    $licenseN= license($_POST['licenseid']);

    $msg = "Hello ".$person[0]." ".$person[1]."!.\n
    You are getting this email to notify you that your license ".$licenseN. " will expire soon. \n
    Please resolve this as soon as possible.\n
    Best regards, \n PilotApp Team";

    $msg = wordwrap($msg,70);
    $subject= "Your License will expire soon";

    $mail = new PHPMailer;
    $mail->IsSMTP();
    $mail->Mailer = "smtp";


    $mail->SMTPDebug  = 0;  
    $mail->SMTPAuth   = TRUE;
    $mail->SMTPSecure = "tls";
    $mail->Port       = 587;
    $mail->Host       = "smtp.gmail.com";
    $mail->Username   = "pilotapp.userservice@gmail.com";
    $mail->Password   = "igre1234";

    $mail->IsHTML(true);
    $mail->AddAddress($person[2], $person[0]);

    $mail->SetFrom("pilotapp.userservice@gmail.com", "Admin");
    $mail->Subject = $subject;
    $content = $msg;
    $mail->MsgHTML($content); 

    if (!$mail->send()) {
        echo "Mailer Error: " . $mail->ErrorInfo;
    } else {
        echo "Message sent!";
    } 
   header("location: indexuser.php");
}

function name($user){
    require 'db_handler.inc.php';

    $sql= "select ime, priimek, mail from oseba where osebaID = '".$user."';";

    $stmt = mysqli_prepare($conn, $sql) or die();
    mysqli_stmt_execute($stmt);
    mysqli_stmt_bind_result($stmt, $ime, $priimek, $mail);

    while($stmt->fetch()){
        $row=array($ime, $priimek, $mail);
        return $row;
    }
}

function license($id){
    require 'db_handler.inc.php';

    $sql= "select naziv from dovoljenje where dovoljenjeID= '".$id."';";

    $stmt = mysqli_prepare($conn, $sql) or die();
    mysqli_stmt_execute($stmt);
    mysqli_stmt_bind_result($stmt, $license);

    while($stmt->fetch()){
        return $license;
    }
}

    
