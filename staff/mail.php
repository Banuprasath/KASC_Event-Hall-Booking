<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require 'phpmailer/src/Exception.php';
require 'phpmailer/src/PHPMailer.php';
require 'phpmailer/src/SMTP.php';


$mail=new PHPMailer(true);
$mail->isSMTP();                                            //Send using SMTP
$mail->SMTPOptions = array(
    'ssl' => array(
        'verify_peer' => false,
        'verify_peer_name' => false,
        'allow_self_signed' => true
    )
);
    $mail->Host       = 'smtp.gmail.com';                     //Set the SMTP server to send through
    $mail->SMTPAuth   = true;                                   //Enable SMTP authentication
    $mail->Username   = 'banuprasath.dev@gmail.com';                     //SMTP username
    $mail->Password   = 'wlgemaxenwcrhsjq';                               //SMTP password
    $mail->SMTPSecure = 'ssl';            //Enable implicit TLS encryption
    $mail->Port       =  465;  
    
    $mail->setFrom('banuprasath.dev@gmail.com', 'Mailer');
    $mail->addAddress('banuprasath0339@gmail.com', 'Joe User');  
    $mail->isHTML(true);                                  //Set email format to HTML
    $mail->Subject = 'Here is the subject';
    $mail->Body='Hello test';

    $mail->send();
    echo "<script>alert('Sent Succesfully');</script>";
?>