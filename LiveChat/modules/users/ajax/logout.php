<?php


require_once '../../../config.php';
require_once $configArr['engine_path'] . "/initEngine.php";

    require_once $configArr['root_path'].'modules/users/models/users.class.php';
    $usersClass = new Users();

    $usersClass->logout();

die();

