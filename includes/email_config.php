<?php 
include "config.php"; 
include "class.phpmailer.php";
include "class.smtp.php";

function emailFunction($subject,$body,$to){
$mail = new PHPMailer();
$mail->IsSMTP(); 
$mail->SMTPDebug = 1; 
$mail->SMTPAuth = true; 
$mail->SMTPSecure = 'ssl'; 
$mail->Host = "mail.bharatclouds.com";
$mail->Port = 465; // or 587
$mail->IsHTML(true);
$mail->Username = "info@bharatclouds.com";
$mail->Password = "Info#123";
$mail->AddReplyTo("no-reply@staffingspot.in", "no-reply");
$mail->SetFrom("info@staffingspot.in", "Staffingspot"); 
$mail->Subject = $subject;
$mail->Body = $body;
$mail->AddAddress($to);
/*$mail->AddCC("radhakrishnan@shalominfotech.com");*/
$mail->Send();
 return 'send';

/* if(!$mail->Send()){
	 
    echo "Mailer Error: " . $mail->ErrorInfo;
}
else{
		 
    echo "SMTP Mail Message has been sent";
}*/
}
?>