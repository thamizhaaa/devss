<?php 
_setView(__FILE__);
_setTitle('Ultimate Support Chat');
check_login();

if ($_SESSION['user']['permissions'] == 0){
    refresh('/'.$languageURL);
}

// count presets

$files = scandir(ROOT_PATH.'data/config/presets');
$fileCount = 0;
foreach ($files as $filename) {
    $file = pathinfo($filename);
    if(!is_dir(ROOT_PATH.'data/config/presets/'.$filename)) {
        if(strtolower($file['extension']) == 'json') {
            $fileCount++;
        }
    }
}
if($fileCount == 0){
    $fileCount = '0';
}
else{
    $foundPresets = $fileCount - 1;
    abr('foundPresets', $foundPresets);
}

$defaultString = '{"widgetButtonColor":"#c9c9c9","widgetButtonColorGradient":"","widgetButtonColorIcon":"#000000","widgetBorder":"","file":"","backgroundColor":"#f9f8f8","headerColor":"#ffffff","headerGradient":"","headerTextM1":"MESSAGE 1","headerTextColor":"#000000","initMsgModule_1":"Welcome message","initMsgColor":"#000000","chatBtnMsgBackgroundColor":"","chatBtnMsgBackgroundGradient":"","chatBtnMsg":"START","chatBtnMsgFontColor":"#ffffff","textarea1BackgroundColor":"","textarea1PlaceholderColor":"","textarea1FontColor":"","triggerMethod":"slideup","widgetRadius":"0px","widgetShadow":"true","headerStyle":"color","requireAvatar":"1","userAvatarSet":"set_1","avatar_set_files":["set_1_1.jpg","set_1_10.jpg","set_1_11.jpg","set_1_12.jpg","set_1_2.jpg","set_1_3.jpg","set_1_4.jpg","set_1_5.jpg","set_1_6.jpg","set_1_7.jpg","set_1_8.jpg","set_1_9.jpg"],"avatarRadius":"3px","requireName":"1","requireEmail":"0","backgroundStyle":"color","headerImageType":"none","headerTextM2":"MESSAGE 2","adminAvatarCssContent":"","adminAvatarColor":"","adminAvatarColorText":"","userAvatarCssContent":"","userAvatarColor":"","userAvatarColorText":"","initMsgModule_2":"Welcome message","adminNameColor":"#000000","adminTimeColor":"#606060","adminMessageColor":"#ffffff","adminFontColor":"#000000","adminMessageAudio":"1","userNameColor":"#000000","userTimeColor":"#606060","userMessageColor":"#ffffff","userFontColor":"#000000","textarea2BackgroundColor":"","textarea2PlaceholderColor":"#000000","textarea2FontColor":"#000000","textarea2BtnColor":"","userMessageAudio":"0","themeSelect":"2","adminAvatarSelect":"img","userAvatarSelect":"img","userAvatarSelectChoice":"true","headerTextM3":"MESSAGE 3","textarea3BackgroundColor":"","textarea3PlaceholderColor":"#000000","textarea3FontColor":"#000000","sendMailBtnBackgroundColor":"","sendMailBtnBackgroundGradient":"","sendMailBtn":"Email","sendMailBtnFontColor":"#ffffff"}';

$newJsonString = '';

if(!isset($_GET['p']) || !is_numeric($_GET['p'])){
    $presetString = file_get_contents(ROOT_PATH.'data/config/presets/config.json');
    $preset = json_decode($presetString, true);

    if (isset($preset['selectedPreset']) && $preset['selectedPreset'] != ''){
        $_GET['p'] = $preset['selectedPreset'];
    }
    else{
        $_GET['p'] = 1;
    }
     refresh('/'.$languageURL.'settings?p='.$_GET['p']);	
}

if (file_exists(ROOT_PATH.'data/config/presets/preset_'.$_GET['p'].'.json')){
    $jsonString = file_get_contents(ROOT_PATH.'data/config/presets/preset_'.$_GET['p'].'.json');
    abr('jsonString', $jsonString);
}
else{
    refresh('/'.$languageURL.'settings?p=1');
}

if(isset($_GET['e']) && $_GET['e'] > 3){
	refresh('/'.$languageURL.'settings');
}

$data = json_decode($jsonString, true);

if(isset($_POST['submit_options'])){

    foreach ($_POST as $key=>$d){

        if (strpos($_POST[$key], '\'') !== false) {
            $_POST[$key] = str_replace('\'', '&#39;', $_POST[$key]);
        }
        if (strpos($_POST[$key], '"') !== false) {
            $_POST[$key] = str_replace('"', '&#34;', $_POST[$key]);
        }

        if ($key != 'submit_options' && $key != 'editModule'){
            $data[$key] = preg_replace('!\\r?\\n!', "", $_POST[$key]);
            $newJsonString = json_encode($data);
        }
    }

    file_put_contents(ROOT_PATH.'data/config/presets/preset_'.$_GET['p'].'.json', $newJsonString);
    refresh('/'.$languageURL.'settings?p='.$_GET['p'].'&e='.$_POST['editModule']);
}


if (isset($_POST['publish_preset'])){

    $presetString = file_get_contents(ROOT_PATH.'data/config/presets/config.json');
    $preset = json_decode($presetString, true);

    $preset['selectedPreset'] = $_GET['p'];
    $newJsonString = json_encode($preset);
    file_put_contents(ROOT_PATH.'data/config/presets/config.json', $newJsonString);
    refresh('/'.$languageURL.'settings?p='.$_GET['p'], 'Success!');
}

if (isset($_POST['add_preset'])){
    file_put_contents(ROOT_PATH.'data/config/presets/preset_'.$fileCount.'.json', $defaultString);
    refresh('/'.$languageURL.'settings?p='.$fileCount);
}

if (isset($_POST['restore_preset'])){

    if($_GET['p'] <= 10){
        $presetString = file_get_contents(ROOT_PATH.'data/config/factory_recall/preset_'.$_GET['p'].'.json');
        file_put_contents(ROOT_PATH.'data/config/presets/preset_'.$_GET['p'].'.json', $presetString);
        refresh('/'.$languageURL.'settings?p='.$_GET['p'], 'Success!');
    }
    else{
        file_put_contents(ROOT_PATH.'data/config/presets/preset_'.$_GET['p'].'.json', $defaultString);
        refresh('/'.$languageURL.'settings?p='.$_GET['p'], 'Success!');
    }
}


$_POST = $data;

