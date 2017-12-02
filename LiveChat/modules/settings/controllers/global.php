<?php 
_setView(__FILE__);
_setTitle('Ultimate Support Chat');
check_login();

if ($_SESSION['user']['permissions'] == 0){
    refresh('/'.$languageURL);
}

$dataConfig = file_get_contents(ROOT_PATH.'data/config/presets/config.json');
$data = json_decode($dataConfig, true);

if(isset($_POST['submit'])){

    if(!isset($_POST['allow_chat_invite'])){
        $_POST['allow_chat_invite'] = 'false';
    }
    if(!isset($_POST['hide_admin'])){
        $_POST['hide_admin'] = 'false';
    }
    if(!isset($_POST['offline_hide'])){
        $_POST['offline_hide'] = 'false';
    }

    if(!isset($_POST['admin_incoming_chat_request_audio'])){
        $_POST['admin_incoming_chat_request_audio'] = 'false';
    }
    if(!isset($_POST['admin_desktop_notifications'])){
        $_POST['admin_desktop_notifications'] = 'false';
    }

    $newJsonString = '';
    foreach ($_POST as $key=>$d){
            if ($key != 'submit'){
                $data[$key] = $_POST[$key];
                $newJsonString = json_encode($data);
            }
    }

    foreach ($data as $key=>$d){
        $_SESSION['global_settings'][$key] = $data[$key];
    }

    file_put_contents(ROOT_PATH.'data/config/presets/config.json', $newJsonString);
    refresh('/'.$languageURL.'settings/global', 'Your settings were saved.');
}

$_POST = $data;