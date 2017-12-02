<?php
date_default_timezone_set('UTC');
error_reporting(E_ALL);
include("../../../data/config/config.php");
$PDO = PDO_CONNECT();

if (isset($_POST['action']) && $_POST['action'] == 'checkUsername'){

    $command = "SELECT * FROM `users` WHERE `username` = :username";
    $result = $PDO->prepare($command);
    $result->bindParam(':username', $_POST['username']);
    $result->execute();

    if($result->rowCount() == 0) {
        echo true;
    }
    else{
        echo false;
    }
}


if (isset($_POST['action']) && $_POST['action'] == 'checkEmail'){

    $command = "SELECT * FROM `users` WHERE `email` = :email";
    $result = $PDO->prepare($command);
    $result->bindParam(':email', $_POST['email']);
    $result->execute();

    if($result->rowCount() == 0) {
        echo true;
    }
    else{
        echo false;
    }

}

die();