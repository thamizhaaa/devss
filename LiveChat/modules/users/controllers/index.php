<?php
_setView(__FILE__);
_setTitle('Ultimate Support Chat');

check_login();


if ($_SESSION['user']['permissions'] == 0){
    refresh('/'.$languageURL);
}


require_once ROOT_PATH.'modules/users/models/users.class.php';
$usersClass = new Users();
$users = $usersClass->getAll();

abr('users', $users);
$time = time();
$time_expired = $time - 60;
abr('time_expired', $time_expired);
