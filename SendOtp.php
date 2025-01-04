<?php
//send OTP
session_start();

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;	
$Email="shabir8918@gmail.com";
///////////////////////////OTP generaion///////////////////////
$seconds = date('s');
$s = (int)$seconds;
$s = $s + 10;    // will not make whole result zero during multiplication
$m = $s * 13043; //this will give us the result at the end which will not be greater than 6 didits
$g = rand(10000, 99999); //5 digit random code generator
$otp = $m + $g;
$_SESSION['OTP'] = $otp;
$_SESSION['time'] =  $_SERVER["REQUEST_TIME"];  // generate the timestamp when otp is forwarded to user email/mobile.

    //send otps to user mail
       $subject = "Registration OTP from kashmir Govt polytechnic";
       $message = "Greetings!!! Your OTP  is ".$otp." Do not share this OTP with anyone. This is a system generated mail please do not reply.";   
       //Load composer's autoloader
       require 'vendor/autoload.php';
      $mail = new PHPMailer(true);                            
       try {
            $mail->SMTPDebug = 0;
            $mail->SMTPAuth = true; 
           // $mail->SMTPAuth = false;//SMTP authentication should be false
            $mail->SMTPSecure = 'none';// Security type should be none  
            $mail->Host = 'localhost';// SMTP host name should be localhost
            $mail->Port = 25; 
           
$mail->Username = 'studentfeedbacksystem2023@gmail.com';
$mail->Password = 'system@123';  
            $mail->setFrom('studentfeedbacksystem2023@gmail.com', 'test email');     //Set who the message is to be sent from 
            $mail->addReplyTo('studentfeedbacksystem2023@gmail.com', 'test email');  //Set an alternative reply-to address
            $mail->addAddress($Email);  // Add a recipient
            $mail->WordWrap = 50;                                 // Set word wrap to 50 characters
            $mail->isHTML(true);                                  // Set email format to HTML
            $mail->Subject = $subject;
            $mail->Body= $message;
            if(!$mail->send()) 
            {
            echo 'Mailer Error: ' . $mail->ErrorInfo;
            echo 'Email Has not Sent';           
            }
            
       }  
	 catch (Exception $e)
	 {
	   $_SESSION['result'] = 'Message could not be sent. Mailer Error: '.$mail->ErrorInfo;
	   $_SESSION['status'] = 'error';
     }
$_SESSION['otp_success'] = "OTP send successfully";
echo "mail sent";
exit();
?>