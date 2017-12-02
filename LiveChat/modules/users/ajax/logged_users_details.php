<?php

require_once '../../../config.php';
require_once $configArr['engine_path'] . "/initEngine.php";

$PDO = PDO_CONNECT();

$trackedUsers = array();
$allUsers = array();
$with_request_id_users = array();
$return = array();

$command = "SELECT DISTINCT ch.request_id, us.name FROM chats AS ch, chat_requests AS us WHERE ch.request_id = us.request_id AND DATE_ADD(ch.date, INTERVAL 15 MINUTE) > UTC_TIMESTAMP() AND ch.request_id NOT IN (SELECT request_id FROM chats WHERE content LIKE '%has left the chat session%') AND us.ip_address NOT IN (SELECT DISTINCT ip_address FROM visitors WHERE user_id IN (SELECT user_id FROM visitors_banned)) ORDER BY ch.date ASC";
$result = $PDO->prepare($command);
$result->execute();


while ($row = $result->fetch(PDO::FETCH_ASSOC)) {


    $request_id = $row['request_id'];
    $command2 = "SELECT * FROM chats as ch, chat_requests as us WHERE ch.request_id = '$request_id' AND ch.request_id = us.request_id AND ch.request_id NOT IN (SELECT user_id FROM visitors_banned) ORDER BY ch.id DESC LIMIT 1";

    $result2 = $PDO->prepare($command2);
    $result2->execute();

    while ($row2 = $result2->fetch(PDO::FETCH_ASSOC)) {

        unset($row2['content']);

        if (isset($row2['country_name'])) {
            $row2['country_name'] = ucfirst(strtolower($row2['country_name']));
        }
        if (isset($row2['os'])) {
            $row2['os'] = str_replace("_", ".", $row2['os']);
        }
        if (isset($row2['browser'])) {
            $row2['browser'] = preg_replace('/\d+/u', '', $row2['browser']);
            $row2['browser'] = preg_replace('/[^A-Za-z0-9\-]/', '', $row2['browser']);
            $row2['browser'] = trim($row2['browser']);
        }

        $allUsers[] = $row2;
        $with_request_id_users[$row2['request_id']][] = $row2;

        $excludedVisitors[] = "`user_id` != '".$row2['user_id']."'";


    }
}

if ($_POST['track_users'] == 'all'){

    $whereQuery = '';
    if (isset($excludedVisitors) && !empty($excludedVisitors) && $excludedVisitors != ''){
        $whereQuery =  " AND ( ".implode(" OR ", $excludedVisitors).")";
    }

    $command = "SELECT * FROM visitors WHERE DATE_ADD(last_online_date, INTERVAL 2 MINUTE) > UTC_TIMESTAMP() $whereQuery";

    $result = $PDO->prepare($command);
    $result->execute();

    while ($row = $result->fetch(PDO::FETCH_ASSOC)) {
        $trackedUsers[] = $row;
    }
    if (!empty($trackedUsers) && $trackedUsers != '') {
        $i = 0;
        foreach ($trackedUsers as $user){
            $trackedUsers[$i]['relative_date'] = relative_date($user['last_online_date']);
            $i++;
        }
        $return['tracked_users'] = $trackedUsers;
    }
    else{
        $return['tracked_users'] = '';
    }
}


if (isset($allUsers)) {

    $i = 0;
    foreach ($allUsers as $user){
        $allUsers[$i]['relative_date'] = relative_date($user['start_date']);
        $i++;
    }

    $return['all_users'] = $allUsers;
    if (isset($_POST['request_id']) && $_POST['request_id'] != '') {

        if (isset($with_request_id_users[$_POST['request_id']]) && $with_request_id_users[$_POST['request_id']] != '') {
            $return['active_request_results'] = $with_request_id_users[$_POST['request_id']];
        }
    }
    echo json_encode($return);
} else {
    echo '0';
}

## SESSION HEART BEAT

$expireAfter = 1; // in minutes

if(isset($_SESSION['user']['last_action'])){

    $secondsInactive = time() - $_SESSION['user']['last_action'];
    $expireAfterSeconds = $expireAfter * 30;
    if ($secondsInactive >= $expireAfterSeconds) {
        stamp_heartbeat();
    }
}



function stamp_heartbeat(){
    global $PDO;

    $_SESSION['user']['status'] = time();

    $command="UPDATE `users` SET `status` = '".sql_quote($_SESSION['user']['status'])."' WHERE `user_id` = '".intval($_SESSION['user']['user_id'])."' LIMIT 1";

    $result = $PDO->prepare($command);
    $result->execute();

    $_SESSION['user']['last_action'] = time();

    // echo 'heart beat updated';
}


function relative_date($timestamp, $days = false, $format = "M j, Y") {

    if (!is_numeric($timestamp)) {
        // It's not a time stamp, so try to convert it...
        $timestamp = strtotime($timestamp);
    }

    if (!is_numeric($timestamp)) {
        // If its still not numeric, the format is not valid
        return false;
    }

    // Calculate the difference in seconds
    $difference = time() - $timestamp;

    // Check if we only want to calculate based on the day
    if ($days && $difference < (60*60*24)) {
        return "Today";
    }
    if ($difference < 3) {
        return "Just now";
    }
    if ($difference < 60) {
        //  return $difference . " seconds ago";
        return "A few seconds ago";
    }
    if ($difference < (60*2)) {
        return "1 minute ago";
    }
    if ($difference < (60*60)) {
        return intval($difference / 60) . " minutes ago";
    }
    if ($difference < (60*60*2)) {
        return "1 hour ago";
    }
    if ($difference < (60*60*24)) {
        return intval($difference / (60*60)) . " hours ago";
    }
    if ($difference < (60*60*24*2)) {
        return "1 day ago";
    }
    if ($difference < (60*60*24*7)) {
        return intval($difference / (60*60*24)) . " days ago";
    }
    if ($difference < (60*60*24*7*2)) {
        return "1 week ago";
    }
    if ($difference < (60*60*24*7*(52/12))) {
        return intval($difference / (60*60*24*7)) . " weeks ago";
    }
    if ($difference < (60*60*24*7*(52/12)*2)) {
        return "1 month ago";
    }
    if ($difference < (60*60*24*364)) {
        return intval($difference / (60*60*24*7*(52/12))) . " months ago";
    }

    // More than a year ago, just return the formatted date
    return @date($format, $timestamp);

}

die();