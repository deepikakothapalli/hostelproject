<?php

//session_start();
// Import PHPMailer classes into the global namespace
// These must be at the top of your script, not inside a function
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

//Load composer's autoloader
require 'autoload.php';

$mail = new PHPMailer(true);                              // Passing `true` enables exceptions
try {
    //Server settings
    $mail->SMTPDebug = 2;                                 // Enable verbose debug output
    $mail->isSMTP();                                      // Set mailer to use SMTP
    $mail->Host = 'smtp.gmail.com';//smtp2.example.com';  // Specify main and backup SMTP servers
    $mail->SMTPAuth = true;                               // Enable SMTP authentication
    $mail->Username = 'vishnuouting@gmail.com';                 // SMTP username
    $mail->Password = 'vishnu123';                           // SMTP password
    $mail->SMTPSecure = 'ssl';                            // Enable TLS encryption, `ssl` also accepted
    $mail->Port = 587;                                    // TCP port to connect to

    //Recipients
    $mail->setFrom('vishnuouting@gmail.com', 'Outing request');
    //$mail->addAddress('joe@example.net', 'Joe User');     // Add a recipient
    $mail->addAddress('15pa1a0583@vishnu.edu.in','Vishnu');
    //echo $_SESSION['emailid'];
   // $mail->addAddress("15pa1a05b9@vishnu.edu.in","Niharika");              // Name is optional
   // $mail->addReplyTo('info@example.com', 'Information');
    //$mail->addCC('cc@example.com');
    //$mail->addBCC('bcc@example.com');

    //Attachments
    //$mail->addAttachment('/var/tmp/file.tar.gz');         // Add attachments
    //$mail->addAttachment('/Downloads/cube_fire_dark_light_alloy_36536_1366x768.jpg', 'new.jpg');    // Optional name
    //$mail->AddEmbeddedImage('logo.jpg', 'logoimg', 'logo.jpg'); 
    //Content
    $mail->isHTML(true);                                  // Set email format to HTML
    $mail->Subject = 'Vishnu Outing Management System';
    $mail->Body    = '<b>'.$_SESSION['id'].'has requested for outing</b>';
    $mail->AltBody = 'This is the body in plain text for non-HTML mail clients';

    $mail->send();
    echo 'Message has been sent';
} catch (Exception $e) {
    echo 'Message could not be sent.';
    //echo 'Mailer Error: ' . $mail->ErrorInfo;
}
//header("loaction:placerequest.php");
?>