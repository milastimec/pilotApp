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

    $mailfrom = $_SESSION['mail'];
    //add if the person is not the same send from a different mail to another mail!!!
    $msg = "Hello".$_SESSION['imeOsebe']." ".$_SESSION['priimekOsebe']."!.\n
    You are getting this email to notify you that your license ".$_SESSION['imeDovoljenja']. " will expire soon. \n
    Please resolve this as soon as possible.\n
    Best regards, \n".$_SESSION['imeOsebe'];

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
    $mail->Username   = "mila.stimec@gmail.com";
    $mail->Password   = "Jupit3r2015";

    $mail->IsHTML(true);
    $mail->AddAddress($_SESSION['mail'], $_SESSION['imeOsebe']);

    $mail->SetFrom("mila.stimec@gmail.com", "Mila");
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

    
