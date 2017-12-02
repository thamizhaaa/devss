<?php
_setView(__FILE__);
_setTitle('Ultimate Support Chat');


$presetString = file_get_contents(ROOT_PATH.'data/config/presets/config.json');
$preset = json_decode($presetString, true);
$jsonString = file_get_contents(ROOT_PATH.'data/config/presets/preset_'.$preset['selectedPreset'].'.json');

abr('preset_json', $jsonString);

check_login();