<?php
header('Access-Control-Allow-Origin: *');
header('Access-Control-Allow-Methods: GET, POST');
header("Access-Control-Allow-Headers: X-Requested-With");

date_default_timezone_set('UTC');

include("../data/config/config.php");
$PDO = PDO_CONNECT();

$command = "SELECT `email` FROM `users` WHERE `user_id` = '1'";
$result = $PDO->prepare($command);
$result->execute();

$return = array();
while ($d = $result->fetch(PDO::FETCH_ASSOC)) {
	$admin_email = $d['email'];
}

$_POST['contact_message'] = wordwrap($_POST['contact_message'], 70);

$to = $admin_email;
$subject = "Message from Ultimate Support Chat";
$message =  $_POST['contact_message'];
$headers = 'From: '.$_POST['contact_email']."\r\n" .'Reply-To: '.$_POST['contact_email']."\r\n".'X-Mailer: PHP/'.phpversion();

mail($to, $subject, $message, $headers);

die();