<?php
include('includes/SMTPconfig.php');
include('includes/SMTPClass.php');


$to = 'harish@shalominfotech.com';
$from = 'mani@shalominfotech.com';
$subject = 'SMTP Testing';
$body = 'Test';
$SMTPMail = new SMTPClient ($SmtpServer, $SmtpPort, $SmtpUser, $SmtpPass, $from, $to, $subject, $body);
$SMTPChat = $SMTPMail->SendMail();

?>