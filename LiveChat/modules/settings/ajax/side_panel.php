<?php
error_reporting(E_ALL);
date_default_timezone_set('UTC');

include("../../../data/config/config.php");
$PDO = PDO_CONNECT();

$time = time()-30;

$command = "SELECT user_id, username, avatar FROM users  WHERE status > $time ORDER BY date_added";
$result = $PDO->prepare($command);
$result->execute();

$users = array();
while ($d = $result->fetch(PDO::FETCH_ASSOC)) {
    $users[$d['user_id']] = $d;
}

$command = "SELECT * FROM prepared_messages";
$result = $PDO->prepare($command);
$result->execute();

$messages = array();
while ($d = $result->fetch(PDO::FETCH_ASSOC)) {
    $messages[] = $d;
}

$return = array();

$return['operators_online'] = $users;
$return['prepared_messages'] = $messages;

echo json_encode($return);


die();