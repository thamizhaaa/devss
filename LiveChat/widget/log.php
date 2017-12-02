<?php
header('Access-Control-Allow-Origin: *');
header('Access-Control-Allow-Methods: GET, POST');
header("Access-Control-Allow-Headers: X-Requested-With");

date_default_timezone_set('UTC');

include("../data/config/config.php");
$PDO = PDO_CONNECT();

$encoded_data = json_decode(base64_decode($_POST['encodedGetVars']));

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

$request_id = $_POST['request_id'];

$command = "SELECT chats.*, chat_requests.*, users.username, users.avatar FROM chats LEFT OUTER JOIN chat_requests ON chats.request_id = chat_requests.request_id LEFT OUTER JOIN users ON chats.operator_id = users.user_id WHERE chats.request_id = :request_id ORDER BY date ASC";
$result = $PDO->prepare($command);
$result->bindParam(':request_id', $request_id);
$result->execute();

while ($row = $result->fetch(PDO::FETCH_ASSOC)) {
    $prefix = 'a';

    if ($row['username'] == ''){
        $row['username'] = 'Support Team';
    }

    $sentBy = $row['username'];
    if ($row['operator_id'] == 0){
        $prefix = 'u';
        $sentBy = '';
        if ($row['name'] != 'usc_client'){
            $sentBy  = $row['name'];
        }
    }

    $relativeDate = relative_date($row['date']);
    if (strpos($row['content'], '</transfer>') !== false) {
        $output['rows'][] = '<div><span style="float: left; margin-top: 20px; margin-bottom:40px; width: 100%;">'.$row['content'].'</span></div>';
    }
    else {
        $output['rows'][] = '<div class="' . $prefix . '_reply">' .
            '<span class="' . $prefix . '_1"></span>' .
            '<span class="' . $prefix . '_avatar_border"></span>' .
            '<span class="' . $prefix . '_content_wrap">' .
            '<span class="' . $prefix . '_2">' . $sentBy . '</span>' .
            '<span class="' . $prefix . '_3">' . $relativeDate . '</span>' .
            '<span class="' . $prefix . '_4">' . $row['content'] . '</span>' .
            '</span>' .
            '</div>';
    }
    $output['operator_id'][] = $row['operator_id'];
    $output['operator_name'] = $row['username'];
    $output['user_name'] = $row['name'];
    $output['operator_typing'] = $row['a_status'];
    if ($row['avatar'] !== NULL) {
        $output['operator_avatar'][] = $row['avatar'];
    }
    $userInfo = $row;
}

echo json_encode($output);


if (isset($encoded_data->current_url)){
    if ($userInfo['uri'] != $encoded_data->current_url) {
        updateViewingPage($userInfo);
    }
}

function updateViewingPage($userInfo){
    global $PDO, $encoded_data;

    $command = "UPDATE chats SET uri = :uri WHERE id = :id";
    $result = $PDO->prepare($command);
    $result->bindParam(':id', $userInfo['id']);
    $result->bindParam(':uri', $encoded_data->current_url);
    $result->execute();
}

die();
