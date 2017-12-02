<?php
_setView(__FILE__);
_setTitle('Ultimate Support Chat');

check_login();

if ($_SESSION['user']['permissions'] == 0){
    refresh('/'.$languageURL);
}


if (isset($_POST['submit'])){

    require_once ROOT_PATH.'modules/users/models/users.class.php';
    $usersClass = new Users();
    $s = $usersClass->add();

    if($s === true) {
        refresh('/'.$languageURL.'users');
    }else{		
		abr('error', $s);
    }

}

