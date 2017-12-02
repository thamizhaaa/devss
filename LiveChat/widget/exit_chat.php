<?php
header('Access-Control-Allow-Origin: *');
header('Access-Control-Allow-Methods: GET, POST');
header("Access-Control-Allow-Headers: X-Requested-With");

date_default_timezone_set('UTC');

include("../data/config/config.php");
$PDO = PDO_CONNECT();

$html = '<terminate><i>User ' . $_POST['username'] . ' has left the chat session.</i></terminate>';

$command = "SELECT * FROM `chats` WHERE request_id = :request_id AND content LIKE '%has left the chat session%'";
$result = $PDO->prepare($command);
$result->bindParam(':request_id', $_POST['request_id']);
$result->execute();

if($result->rowCount() == 0) {

    $command = "INSERT INTO chats VALUES('', '', '', '', :request_id, '$html' , '', UTC_TIMESTAMP() )";
    $result = $PDO->prepare($command);
    $result->bindParam(':request_id', $_POST['request_id']);
    $result->execute();

}

$command = "UPDATE chat_requests SET end_date = UTC_TIMESTAMP(), u_status = '0', a_status = '0', in_chat = '' WHERE request_id = :request_id";

$result = $PDO->prepare($command);
$result->bindParam(':request_id', $_POST['request_id']);
$result->execute();

echo 'chat_terminated';

die();