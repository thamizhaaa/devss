<?php

require_once '../../../config.php';
require_once $configArr['engine_path'] . "/initEngine.php";

if (isset ($_POST ['username']) && trim($_POST['username']) != '' && isset ($_POST['password']) && trim($_POST['password']) != '' ) {

    require_once $configArr['root_path'].'modules/users/models/users.class.php';
    $usersClass = new Users();

    $s = $usersClass->login();
    if($s === true) {
        echo '1';
    }
}

die ();

