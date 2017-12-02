<?php
date_default_timezone_set('UTC');
error_reporting(E_ALL);
include("../../../data/config/config.php");
$PDO = PDO_CONNECT();

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
$command = "SELECT * FROM chats JOIN chat_requests ON chats.request_id = chat_requests.request_id WHERE chats.request_id = :request_id ORDER BY date ASC";

$result = $PDO->prepare($command);
$result->bindParam(':request_id', $request_id);
$result->execute();


while ($row = $result->fetch(PDO::FETCH_ASSOC)) {
    $prefix = 'a';

    if ($row['operator_name'] == ''){
        $row['operator_name'] = 'Support Team';
    }
    $sentBy = $row['operator_name'];
    if ($row['operator_id'] == 0){
        $prefix = 'u';
        $sentBy = 'Anonymous';
        if ($row['name'] != 'utc_client'){
            $sentBy  = $row['name'];
        }

    }

    $relativeDate = relative_date($row['date']);
    if (strpos($row['content'], '</transfer>') !== false) {
        $output['rows'][] = '<div class="'.$prefix.'_reply"><span style="float: left; margin-top: 40px; width: 100%;">'.$row['content'].'</span></div>';
    }
    else{
        $output['rows'][] = '<div class="'.$prefix.'_reply"><span class="'.$prefix.'_1"></span><span class="'.$prefix.'_2"><b>'.$sentBy.'</b></span><span class="'.$prefix.'_3">'.$relativeDate.'</span><span class="'.$prefix.'_4">'.$row['content'].'</span></div>';
    }

    $output['operator_id'][] = $row['operator_id'];
    $output['user_typing'] = $row['u_status'];
}

echo json_encode($output);

die();
