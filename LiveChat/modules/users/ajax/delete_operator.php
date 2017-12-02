<?php

error_reporting(E_ALL);
require_once '../../../config.php';
require_once $configArr['engine_path'] . "/initEngine.php";

if ($_POST['user_id'] == 1){
    echo 'You may not delete the main admin account';
    die();
}
else{
    require_once $configArr['root_path'].'modules/users/models/users.class.php';
    $usersClass = new Users();
    $s = $usersClass->delete($_POST['user_id']);
    if ($s === true){
        echo 'true';
    }
}

die();