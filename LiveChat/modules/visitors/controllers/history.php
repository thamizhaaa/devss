<?php

_setView(__FILE__);
_setTitle('Ultimate Support Chat');

check_login();

$PDO = PDO_CONNECT();

if (!isset($_GET['request_id'])) {

    $command = "SELECT * FROM `chat_requests` WHERE `end_date` != '0000-00-00 00:00:00'";
    $result = $PDO->prepare($command);
    $result->execute();

    while ($row = $result->fetch(PDO::FETCH_ASSOC)) {

        unset($row['content']);

        if (isset($row['country_name'])) {
            $row['country_name'] = ucfirst(strtolower($row['country_name']));
        }
        if (isset($row['os'])) {
            $row['os'] = str_replace("_", ".", $row['os']);
        }
        if (isset($row['browser'])) {
            $row['browser'] = preg_replace('/\d+/u', '', $row['browser']);
            $row['browser'] = preg_replace('/[^A-Za-z0-9\-]/', '', $row['browser']);
            $row['browser'] = trim($row['browser']);
        }

        $users[] = $row;
    }

    if (isset($users)) {
        foreach ($users as $k => $u) {
            $specific = array('start' => $u['start_date'], 'end' => $u['end_date']);
            $chat_len = getChatDateAndTime('', $specific);
            $users[$k]['chat_length'] = $chat_len['chat_length'];
        }
        abr('users', $users);
    }

} else {

    $command = "SELECT * FROM chats JOIN chat_requests ON chats.request_id = chat_requests.request_id WHERE chats.request_id = :request_id ORDER BY date ASC";
    $result = $PDO->prepare($command);
    $result->bindParam(':request_id', $_GET['request_id']);
    $result->execute();


    if($result->rowCount() == 0) {
        refresh('/'.$languageURL.'visitors/history');
    }

    $data = array();

    while ($row = $result->fetch(PDO::FETCH_ASSOC)) {
        $data['full_array'][] = $row;

        $prefix = 'a';
        if ($row['operator_name'] == '') {
            $row['operator_name'] = 'Support Team';
        }
        $sentBy = $row['operator_name'];
        if ($row['operator_id'] == 0) {
            $prefix = 'u';
            $sentBy = 'Anonymous';
            if ($row['name'] != 'utc_client') {
                $sentBy = $row['name'];
            }
        }

        $date = date_create($row['date']);
        $formated_date =  date_format($date, 'F jS Y, g:ia');

        $data['history'][] = '<div class="' . $prefix . '_reply"><span class="' . $prefix . '_1"></span><span class="' . $prefix . '_2"><b/>' . $sentBy . '</b></span><span class="' . $prefix . '_3">' . $formated_date . '</span><span class="' . $prefix . '_4">' . $row['content'] . '</span></div>';
        $data['operator_id'][] = $row['operator_id'];
    }


    $return = getChatDateAndTime($data);

    $data['chat_date'] = $return['chat_date'];
    $data['chat_length'] = $return['chat_length'];


    if (isset($data['full_array'])) {

        foreach ($data['full_array'] as $k => $d) {
            if ($k == 0) {
                $data['visitors_path'][] = $data['full_array'][$k]['uri'];
            } else {
                if ($data['full_array'][$k]['uri'] != $data['full_array'][$k - 1]['uri']) {
                    $data['visitors_path'][] = $data['full_array'][$k]['uri'];
                }
            }
        }
    }

    abr('data', $data);
}

function getChatDateAndTime($data = '', $specific = '') { // Get chat date and tim//e

    $chatDateArr = array();

    if ($specific == '') {
        foreach ($data['full_array'] as $d) {
            $chatDateArr[] = $d['date'];
        }

        $strStart = $chatDateArr[0];
        $strEnd = end($chatDateArr);
    } else {
        $strStart = $specific['start'];
        $strEnd = $specific['end'];
    }

    $dteStart = new DateTime($strStart);
    $dteEnd = new DateTime($strEnd);

    $dteDiff = $dteStart->diff($dteEnd);

    $lenHourToSec = $dteDiff->h * 60 * 60;
    $lenMinToSec = $dteDiff->i * 60;
    $lenSec = $dteDiff->s;

    $TotalSec = $lenHourToSec + $lenMinToSec + $lenSec;

    if ($lenHourToSec != 0) {
        $chatLength = gmdate("H:i:s", $TotalSec);
    } else {
        $chatLength = gmdate("i:s", $TotalSec);
    }

    $return = array();

    if (isset($chatDateArr) && !empty($chatDateArr)) {
        $dateOnlyArr = explode(' ', $chatDateArr[0]);
        $return['chat_date'] = $dateOnlyArr[0];
    }

    $return['chat_length'] = $chatLength;
    return $return;

}