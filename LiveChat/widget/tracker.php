<?php
header('Access-Control-Allow-Origin: *');
header('Access-Control-Allow-Methods: GET, POST');
header("Access-Control-Allow-Headers: X-Requested-With");

include("../data/config/config.php");
$PDO = PDO_CONNECT();

$encoded_data = json_decode(base64_decode($_POST['encodedGetVars']));

$command = "SELECT * FROM visitors WHERE ip_address = :ip_address  AND cookie_id = :cookie_id ORDER BY first_visit_date ASC LIMIT 1";
$result = $PDO->prepare($command);
$result->bindParam(':ip_address', $encoded_data->ip_address);
$result->bindParam(':cookie_id', $_POST['jsCookie']);
$result->execute();

while ($row = $result->fetch(PDO::FETCH_ASSOC)) {
    $user = $row;
}

if (!isset($user)){
    $country = countryByIP();
    $id = addUser($country);
}
else{

    if (isset($_POST['jsCookie']) && $_POST['jsCookie'] != '') {
        $command = "UPDATE visitors SET current_url = :current_url, last_online_date = UTC_TIMESTAMP() WHERE cookie_id = :js_cookie LIMIT 1";
        $result = $PDO->prepare($command);
        $result->bindParam(':current_url', $encoded_data->current_url);
        $result->bindParam(':js_cookie', $_POST['jsCookie']);
        $result->execute();
        $output = array('user_id'=> $user['user_id'], 'country_name'=>$user['country_name'], 'country_code'=>$user['country_code'], 'longitude'=> $user['longitude'],'latitude'=>$user['latitude']);
        echo json_encode($output);
    }
}

function countryByIP(){
    global $encoded_data;


    $jsonData = file_get_contents("http://www.geoplugin.net/json.gp?ip=".  $encoded_data->ip_address);
    $country = json_decode($jsonData,true);

    $country['country_name'] = $country['geoplugin_countryName'];
    $country['country_code'] = $country['geoplugin_countryCode'];
    $country['longitude'] = $country['geoplugin_longitude'];
    $country['latitude'] = $country['geoplugin_latitude'];

    return $country;
}

function randomizeIP(){
    $randIP = "".mt_rand(0,255).".".mt_rand(0,255).".".mt_rand(0,255).".".mt_rand(0,255);
    $jsonData = file_get_contents("http://www.geoplugin.net/json.gp?ip=".$randIP);
    $country = json_decode($jsonData,true);

    return $country;
}

function addUser($country){
    global $PDO, $encoded_data;

    $status = 1;

    $command = "INSERT INTO visitors VALUES('', :cookie_id, '', :os, :browser, :browser_lang, :mobile, :screen_size, :ip_address, :country_name, :country_code, :longitude, :latitude, UTC_TIMESTAMP(), UTC_TIMESTAMP(), :current_url, :status )";
    $result = $PDO->prepare($command);
    $result->bindParam(':cookie_id', $_POST['jsCookie']);
    $result->bindParam(':os', $encoded_data->os);
    $result->bindParam(':browser', $encoded_data->browser);
    $result->bindParam(':browser_lang', $encoded_data->lang);
    $result->bindParam(':mobile', $encoded_data->mobile);
    $result->bindParam(':screen_size', $encoded_data->screen_size);
    $result->bindParam(':ip_address', $encoded_data->ip_address);
    $result->bindParam(':country_name', $country['country_name']);
    $result->bindParam(':country_code', $country['country_code']);
    $result->bindParam(':longitude', $country['longitude']);
    $result->bindParam(':latitude', $country['latitude']);
    $result->bindParam(':current_url', $encoded_data->current_url);
    $result->bindParam(':status', $status);
    $result->execute();
    $id = $PDO->lastInsertId();

    if (isset($_POST['track_page']) && $_POST['track_page'] == 'true'){
        return $id;
    }else{
        $output = array('user_id'=> $id, 'country_name'=>$country['country_name'], 'country_code'=>$country['country_code'], 'longitude'=> $country['longitude'],'latitude'=>$country['latitude']);
        echo json_encode($output);
        die();
    }
}

die();