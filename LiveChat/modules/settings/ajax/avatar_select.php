<?php
error_reporting(E_ALL);
date_default_timezone_set('UTC');

require_once '../../../config.php';

if(is_dir($config['data_server_path'] .'config/themes/img/avatars/'. $_POST['setName'])) {

    $avatarFiles = array();
    $files = scandir($config['data_server_path'] .'config/themes/img/avatars/'. $_POST['setName']);
    $fileCount = 0;
    foreach ($files as $filename) {
        $file = pathinfo($filename);

        if(!is_dir($config['data_server_path'] .'config/themes/img/avatars/'. $_POST['setName'].'/'.$filename)) {
            if(strtolower($file['extension']) == 'jpg' || strtolower($file['extension']) == 'png') {
                $avatarFiles[] = $file['basename'];
            }
        }
    }

    echo json_encode($avatarFiles);

    $jsonString = file_get_contents($config['data_server_path'].'config/presets/preset_'.$_POST['selectedPreset'].'.json');
    $data = json_decode($jsonString, true);

    $data['userAvatarSet'] = $_POST['setName'];
    $data['avatar_set_files'] = $avatarFiles;
    $newJsonString = json_encode($data);
    file_put_contents($config['data_server_path'].'config/presets/preset_'.$_POST['selectedPreset'].'.json', $newJsonString);
}

die();