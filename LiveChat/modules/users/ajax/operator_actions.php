<?php

require_once '../../../config.php';
require_once $configArr['engine_path'] . "/initEngine.php";

$PDO = PDO_CONNECT();

if (isset($_SESSION['user']['user_id']) && $_SESSION['user']['user_id'] != '') {

    if (isset($_POST['currentRequestID']) && $_POST['currentRequestID'] != '') {
        $command = "UPDATE chat_requests SET a_status = :typing_status, in_chat = '1' WHERE request_id = :request_id";
        $result = $PDO->prepare($command);
        $result->bindParam(':request_id', $_POST['currentRequestID']);
        $result->bindParam(':typing_status', $_POST['status']);
        $result->execute();
    }

    if (isset($_POST['operatorMsg']) && $_POST['operatorMsg'] != '') {

        if (!isset($_SESSION['answered_request_id'][$_POST['currentRequestID']])) { // request is answered. update db with operator info
            $command = "UPDATE chat_requests SET a_status = :typing_status, in_chat = '1' WHERE request_id = :request_id";
            $result = $PDO->prepare($command);
            $result->bindParam(':request_id', $_POST['currentRequestID']);
            $result->bindParam(':typing_status', $_POST['status']);
            $result->execute();
            $_SESSION['answered_request_id'][$_POST['currentRequestID']] = ''; // ensures query runs one time only
        }

        $text = stripslashes(htmlspecialchars($_POST['operatorMsg'], ENT_QUOTES, "utf-8"));
        $request_id = stripslashes(htmlspecialchars($_POST['currentRequestID'], ENT_QUOTES, "utf-8"));

        $command = "INSERT INTO chats VALUES('', :operator_id, :operator_name, :operator_avatar, :request_id, :content, '', UTC_TIMESTAMP())";
        $result = $PDO->prepare($command);
        $result->bindParam(':operator_id', $_SESSION['user']['user_id']);
        $result->bindParam(':operator_name', $_SESSION['user']['username']);
        $result->bindParam(':operator_avatar', $_SESSION['user']['avatar']);
        $result->bindParam(':request_id', $request_id);
        $result->bindParam(':content', $text);
        $result->execute();
        echo 'posted';
        die();
    }


    if (isset($_POST['ban_user'])) {

        $user_id = stripslashes(htmlspecialchars($_POST['currentRequestID'], ENT_QUOTES, "utf-8"));
        $command = "INSERT INTO visitors_banned VALUES('', '$user_id', UTC_TIMESTAMP())";
        $result = $PDO->prepare($command);
        $result->execute();
    }

    if (isset($_POST['status_on'])) {

        $command = "UPDATE admin_ready SET STATUS = 1 WHERE admin_id = '$admin_id'";
        $result = $PDO->prepare($command);
        $result->execute();
    }

    if (isset($_POST['status_off'])) {
        $command = "UPDATE admin_ready SET STATUS = 0 WHERE admin_id = '$admin_id'";
        $result = $PDO->prepare($command);
        $result->execute();
    }

    if (isset($_POST['request_id']) && isset($_POST['transfer']) && $_POST['transfer'] == 'request') {
        $command = "UPDATE chat_requests SET transfer_request = :from_to WHERE request_id = :request_id LIMIT 1";
        $result = $PDO->prepare($command);
        $result->bindParam(':from_to', $_POST['from_to']);
        $result->bindParam(':request_id', $_POST['request_id']);
        $result->execute();
        $count = $result->rowCount();
        if ($count == 1) {
            echo 'transfer request sent';
        } else {
            echo 'transfer chat request error';
        }
    }

    if (isset($_POST['request_id']) && isset($_POST['transfer']) && $_POST['transfer'] == 'true') {

        $text = '<transfer><i>Operator   ' . $_SESSION['user']['username'] . ' has joined the chat.</i></transfer>';
        $command = "INSERT INTO chats VALUES('', :operator_id, :operator_name, :operator_avatar, :request_id, :content, '', UTC_TIMESTAMP())";
        $result = $PDO->prepare($command);
        $result->bindParam(':operator_id', $_SESSION['user']['user_id']);
        $result->bindParam(':operator_name', $_SESSION['user']['username']);
        $result->bindParam(':operator_avatar', $_SESSION['user']['username']);
        $result->bindParam(':request_id', $_POST['request_id']);
        $result->bindParam(':content', $text);
        $result->execute();
        $count = $result->rowCount();
        if ($count == 1) {
            $command = "UPDATE chat_requests SET transfer_request = '' WHERE request_id = :request_id LIMIT 1";
            $result = $PDO->prepare($command);
            $result->bindParam(':request_id', $_POST['request_id']);
            $result->execute();
            $success = $result->rowCount();
            if ($success == 1) {
                echo 'success';
            } else {
                echo 'transfer accept error';
            }
        } else {
            echo 'transfer accept error';
        };
    }
    if (isset($_POST['invite_user']) && $_POST['invite_user'] == 'true' && isset($_POST['user_id']) & $_POST['user_id'] != '') {

        $user_id = stripslashes(htmlspecialchars($_POST['user_id'], ENT_QUOTES, "utf-8"));
        $command = "UPDATE visitors SET status = '9' WHERE user_id = :user_id LIMIT 1";
        $result = $PDO->prepare($command);
        $result->bindParam(':user_id', $user_id);
        $result->execute();
        $count = $result->rowCount();
        if ($count == 1) {
            echo 'invite sent';
        }
    }
    if (isset($_POST['terminate_chat']) && $_POST['terminate_chat'] == 'true' && isset($_POST['request_id']) & $_POST['request_id'] != '') {
        $html = '<terminate><i>Operator ' . $_SESSION['user']['username'] . ' has left the chat session.</i></terminate>';
        // check if chat was not already terminated by cron
        $command = "SELECT * FROM `chats` WHERE request_id = :request_id AND content LIKE '%has left the chat session%'";
        $result = $PDO->prepare($command);
        $result->bindParam(':request_id', $_POST['request_id']);
        $result->execute();
        if ($result->rowCount() == 0) {
            $command = "INSERT INTO chats VALUES('', :operator_id, '', '', :request_id, '$html' , '', UTC_TIMESTAMP() )";
            $result = $PDO->prepare($command);
            $result->bindParam(':operator_id', $_SESSION['user']['user_id']);
            $result->bindParam(':request_id', $_POST['request_id']);
            $result->execute();
        }
        $command = "UPDATE chat_requests SET end_date = UTC_TIMESTAMP(), u_status = '0', a_status = '0', in_chat = '' WHERE request_id = :request_id";
        $result = $PDO->prepare($command);
        $result->bindParam(':request_id', $_POST['request_id']);
        $result->execute();
        echo 'terminated';
        exit;
    }

}

die();