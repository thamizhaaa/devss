<?php
header('Access-Control-Allow-Origin: *');
header('Access-Control-Allow-Methods: GET, POST');
header("Access-Control-Allow-Headers: X-Requested-With");

include("../data/config/config.php");
$PDO = PDO_CONNECT();

trackPage();

function trackPage(){
    global $PDO;

    $encoded_data = json_decode(base64_decode($_POST['encodedGetVars']));

    if (isset($_POST['jsCookie']) && $_POST['jsCookie'] != '') {
        $command = "UPDATE visitors SET current_url = :current_url, last_online_date = UTC_TIMESTAMP() WHERE cookie_id = :js_cookie LIMIT 1";
        $result = $PDO->prepare($command);
        $result->bindParam(':current_url', $encoded_data->current_url);
        $result->bindParam(':js_cookie', $_POST['jsCookie']);
        $result->execute();

        echo 'tracking updated';
    }

}

die();