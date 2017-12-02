<?php
error_reporting(E_ALL);
date_default_timezone_set('UTC');

require_once '../../../config.php';

$imageFiles = array();
if (is_dir($config['data_server_path'] . 'config/themes/img/' . $_POST['type'])) {

    $files = scandir($config['data_server_path'] . 'config/themes/img/' . $_POST['type']);
    $fileCount = 0;
    foreach ($files as $filename) {
        $file = pathinfo($filename);

        if (!is_dir($config['data_server_path'] . 'config/themes/img/' . $_POST['type'] . '/' . $filename)) {
            if (strtolower($file['extension']) == 'jpg' || strtolower($file['extension']) == 'png') {
                $imageFiles[] = 'data/'.'config/themes/img/' . $_POST['type'] . '/' .$file['basename'];
            }
        }
    }
}

## GET USER UPLOADS ##

if (is_dir($config['data_server_path'] . 'config/uploads/' . $_POST['type'])) {

    $files = scandir($config['data_server_path'] . 'config/uploads/' . $_POST['type']);
    $fileCount = 0;
    foreach ($files as $filename) {
        $file = pathinfo($filename);

        if (!is_dir($config['data_server_path'] . 'config/uploads' . $_POST['type'] . '/' . $filename)) {
            if (strtolower($file['extension']) == 'jpg' || strtolower($file['extension']) == 'png') {
                $imageFiles[] = 'data/'.'config/uploads/'.$_POST['type'].'/'.$file['basename'];
            }
        }
    }
}


if ($imageFiles != ''){
    echo json_encode($imageFiles);
}

die();