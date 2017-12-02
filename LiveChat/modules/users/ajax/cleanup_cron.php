<?php
date_default_timezone_set('UTC');
error_reporting(E_ALL);
include("../../../data/config/config.php");
$PDO = PDO_CONNECT();

$allUsers = array();
$with_request_id_users = array();
$return = array();

$command = "SELECT DISTINCT ch.request_id, us.name FROM chats as ch, chat_requests as us WHERE ch.request_id = us.request_id AND DATE_ADD(ch.date, INTERVAL 10 MINUTE) < UTC_TIMESTAMP() AND ch.request_id NOT IN (SELECT request_id FROM chats WHERE content LIKE '%has left the chat session%') AND us.ip_address NOT IN (SELECT DISTINCT ip_address FROM visitors where user_id IN (SELECT user_id FROM visitors_banned)) ORDER BY ch.date DESC";
$result = $PDO->prepare($command);
$result->execute();


while ($row = $result->fetch(PDO::FETCH_ASSOC)) {
    $foundRequests[] = $row;
}

if (isset($foundRequests) && $foundRequests != '') {

    foreach ($foundRequests as $row) {

        $html = '<terminate><i>User ' . $row['name'] . ' has left the chat session.</i></terminate>';
        $command = "INSERT INTO chats VALUES('', '', '', '', :request_id, '$html' , '', UTC_TIMESTAMP() )";

        $result = $PDO->prepare($command);
        $result->bindParam(':request_id', $row['request_id']);
        $result->execute();

        $command = "UPDATE chat_requests SET end_date = UTC_TIMESTAMP(), u_status = '0', a_status = '0', in_chat = '' WHERE request_id = :request_id";

        $result = $PDO->prepare($command);
        $result->bindParam(':request_id', $row['request_id']);
        $result->execute();
    }
}

echo 'cron run successfully';

die();