<?php
header('Access-Control-Allow-Origin: *');
header('Access-Control-Allow-Methods: GET, POST');
header("Access-Control-Allow-Headers: X-Requested-With");

date_default_timezone_set('UTC');

include("../data/config/config.php");
$PDO = PDO_CONNECT();

if (isset($_POST['request_id']) && $_POST['request_id'] != '' && $_POST['status'] != '') {
    $command = "UPDATE chat_requests SET u_status = :typing_status WHERE request_id = :request_id";
    $result = $PDO->prepare($command);
    $result->bindParam(':request_id', $_POST['request_id']);
    $result->bindParam(':typing_status', $_POST['status']);
    $result->execute();
}

if (isset($_POST['username']) && $_POST['username'] != '') {

    $encoded_data = json_decode(base64_decode($_POST['encodedGetVars']));

    $_POST['message'] = strip_tags($_POST['message']);
    $text = stripslashes(htmlspecialchars($_POST['message'], ENT_QUOTES, "utf-8"));

    $request_id = stripslashes(htmlspecialchars($_POST['request_id'], ENT_QUOTES, "utf-8"));
    $uri = stripslashes(htmlspecialchars($encoded_data->current_url, ENT_QUOTES, "utf-8"));

    $html = $text;

    $command = "INSERT INTO chats VALUES('', '0', '', '', '$request_id', '$html', '$uri', UTC_TIMESTAMP() )";
    $result = $PDO->prepare($command);
    $result->execute();
    echo 'posted';
}

