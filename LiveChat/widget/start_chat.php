<?php
header('Access-Control-Allow-Origin: *');
header('Access-Control-Allow-Methods: GET, POST');
header("Access-Control-Allow-Headers: X-Requested-With");

include("../data/config/config.php");
$PDO = PDO_CONNECT();

$encoded_data = json_decode(base64_decode($_POST['encodedGetVars']));

if ($_POST['username'] == ''){
    $_POST['username'] = 'usc_client';
}

$_POST['username'] = strip_tags($_POST['username']);
$_POST['username'] = stripslashes(htmlspecialchars($_POST['username'], ENT_QUOTES, 'utf-8'));


$_POST['useremail'] = strip_tags($_POST['useremail']);
$_POST['useremail'] = stripslashes(htmlspecialchars($_POST['useremail'], ENT_QUOTES, 'utf-8'));

$avatarArr = explode('/', $_POST['avatar']);
$avatar = '';
if ($avatarArr[0] != 'null') {
    $avatar = $avatarArr[count($avatarArr) - 2] . '/' . end(array_values($avatarArr));
}


$command = "INSERT INTO chat_requests VALUES('', :user_id, :username, :email, :avatar, :cookie_id, :os, :browser, :browser_lang, :mobile, :screen_size, :ip, :country_name, :country_code, :longitude, :latitude, UTC_TIMESTAMP(), '', '', '', '', '' )";
$result = $PDO->prepare($command);
$result->bindParam(':user_id', $_POST['user_id']);
$result->bindParam(':username', $_POST['username']);
$result->bindParam(':email', $_POST['useremail']);
$result->bindParam(':avatar', $avatar);
$result->bindParam(':cookie_id', $_POST['jsCookie']);
$result->bindParam(':os', $encoded_data->os);
$result->bindParam(':browser', $encoded_data->browser);
$result->bindParam(':browser_lang', $encoded_data->lang);
$result->bindParam(':mobile', $encoded_data->mobile);
$result->bindParam(':screen_size', $encoded_data->screen_size);
$result->bindParam(':ip', $encoded_data->ip_address);
$result->bindParam(':country_name', $_POST['country_name']);
$result->bindParam(':country_code', $_POST['country_code']);
$result->bindParam(':longitude', $_POST['longitude']);
$result->bindParam(':latitude', $_POST['latitude']);

$result->execute();
$id = $PDO->lastInsertId();

if ($id != ''){
    $output = array('request_id' => $id, 'user_name' => $_POST['username']);
    echo json_encode($output);
}
else{
    $output = array('request_id'=> '0', 'user_name'=>'0');
    echo json_encode($output);
}

die();
