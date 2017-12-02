<?php
_setView(__FILE__);
_setTitle('Ultimate Support Chat');

check_login();

if ($_SESSION['user']['permissions'] == 0 && $_GET['user_id'] != $_SESSION['user']['user_id']){
    refresh('/'.$languageURL);
}

require_once ROOT_PATH.'modules/users/models/users.class.php';
$usersClass = new Users();
$data = $usersClass->get($_GET['user_id']);

if (isset($_POST['submit'])){

    require_once ROOT_PATH.'modules/users/models/users.class.php';
    $usersClass = new Users();
    $s = $usersClass->edit($data[0], $_GET['user_id']);

    if($s === true) {
        refresh('/'.$languageURL.'users');

    }else{
        $message = '<ul>';
        foreach ($s as $e) {
            $message .= '<li>' . $e . '</li>';
        }
        $message .= '</ul>';
        addErrorMessage($message, '', 'danger');
    }
}
else{
    if (!empty($data)){
        $_POST = $data[0];
    }
    else{
        refresh('/'.$languageURL);
    }
}
