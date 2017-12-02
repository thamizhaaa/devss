<?php

header('Access-Control-Allow-Origin: *');
header('Access-Control-Allow-Methods: GET, POST');
header("Access-Control-Allow-Headers: X-Requested-With");


include("../data/config/config.php");
$PDO = PDO_CONNECT();

$encoded_data = json_decode(base64_decode($_POST['encodedGetVars']));

$command = "SELECT * FROM visitors WHERE ip_address = :ip_address  AND cookie_id = :cookie_id AND status = '9' LIMIT 1";
$result = $PDO->prepare($command);
$result->bindParam(':ip_address', $encoded_data->ip_address);
$result->bindParam(':cookie_id', $_POST['jsCookie']);
$result->execute();

while ($row = $result->fetch(PDO::FETCH_ASSOC)) {
    $user = $row;
}

if (isset($user) && !empty($user)){
    print_r($user);
}


die();