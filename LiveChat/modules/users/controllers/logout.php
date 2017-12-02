<?php 
_setView(__FILE__);
_setTitle('Ultimate Support Chat');

check_login();

if (isset($_POST['logout'])){

    require_once ROOT_PATH.'modules/users/models/users.class.php';
    $usersClass = new Users();

    $s = $usersClass->logout();
    if($s === true) {
        refresh('/'.$languageURL);

    }else{
        addErrorMessage($s, '', 'error');
    }
}
