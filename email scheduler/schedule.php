#!/usr/local/bin/php

<?php
include('PHPMailer_5.2.4/class.phpmailer.php');

$mail = new PHPMailer();

$mail->IsSMTP();

    $mail->SMPTAuth = true;
    $mail->SMTPSecure = 'ssl';
    $mail->Host = "smtp.gmail.com";
    $mail->Mailer = "smtp";
    $mail->SMTPAuth   = true;                  // enable SMTP authentication
    $mail->Port = 465;
    $mail->Username="maplematt";
    $mail->Password="Ripley0409L818rrp!";
    $mail->From ="maplematt@googlemail.com";
    $mail->FromName = 'maplematt@googlemail.com';
    $mail->AddAddress('matthew.boyle1@ge.com', 'matthew.boyle1@ge.com');
    $mail->AddAddress('maplematt@googlemail.com', 'maplematt@googlemail.com');



    $mail->WordWrap = 50; // set word wrap
    $mail->Priority = 1;

    //The following lines below can be changed. Should be fairly self explanatory.
    $mail->Subject = 'This is a test e-mail';

   $mail->Body =  'test';
   $mail->IsHTML(true); /* <== call IsHTML() after $mail->Body has been set. */

if(!$mail->Send()) {

echo "Mailer Error: " . $mail->ErrorInfo;

} else {

echo "Message sent!";

}
?>
