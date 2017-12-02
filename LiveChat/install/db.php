<?php

include("../data/config/config.php");

$PDO = PDO_CONNECT();

$command = "ALTER DATABASE `" . $_SESSION['db_name'] . "` DEFAULT CHARACTER SET utf8 COLLATE utf8_unicode_ci";
$result = $PDO->prepare($command);
$result->execute();

$command = "CREATE TABLE IF NOT EXISTS `chats` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `operator_id` int(11) NOT NULL,
  `operator_name` varchar(256) NOT NULL,
  `operator_avatar` varchar(256) NOT NULL,
  `request_id` int(11) NOT NULL,
  `content` text CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `uri` text CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `date` datetime NOT NULL,
  PRIMARY KEY (`id`),
  KEY `user_id` (`request_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;";
$result = $PDO->prepare($command);
$result->execute();

$command = "CREATE TABLE IF NOT EXISTS `chat_requests` (
  `request_id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) NOT NULL,
  `name` varchar(55) NOT NULL,
  `email` varchar(256) NOT NULL,
  `avatar` varchar(100) NOT NULL,
  `cookie_id` varchar(50) NOT NULL,
  `os` varchar(15) NOT NULL,
  `browser` varchar(30) NOT NULL,
  `browser_lang` varchar(10) NOT NULL,
  `mobile` int(11) NOT NULL,
  `screen_size` varchar(15) NOT NULL,
  `ip_address` varchar(55) NOT NULL,
  `country_name` varchar(25) NOT NULL,
  `country_code` varchar(5) NOT NULL,
  `longitude` float NOT NULL,
  `latitude` float NOT NULL,
  `start_date` datetime NOT NULL,
  `end_date` datetime DEFAULT NULL,
  `a_status` int(1) NOT NULL,
  `u_status` int(1) NOT NULL,
  `transfer_request` varchar(10) NOT NULL,
  `in_chat` int(1) NOT NULL,
  PRIMARY KEY (`request_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;";
$result = $PDO->prepare($command);
$result->execute();


$command = "CREATE TABLE IF NOT EXISTS `prepared_messages` (
`id` INT(11) NOT NULL AUTO_INCREMENT,
  `message` TEXT COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `id` (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=3 ;";
$result = $PDO->prepare($command);
$result->execute();


$command = "INSERT INTO `prepared_messages` (`id`, `message`) VALUES
(1, 'Hi, how can we help you?'),
(2, 'You can find more information on our website');";
$result = $PDO->prepare($command);
$result->execute();

$command = "CREATE TABLE IF NOT EXISTS `users` (
`user_id` INT(11) NOT NULL AUTO_INCREMENT,
  `username` VARCHAR(50) NOT NULL,
  `password` VARCHAR(64) NOT NULL,
  `email` VARCHAR(256) NOT NULL,
  `firstname` VARCHAR(100) NOT NULL,
  `lastname` VARCHAR(100) NOT NULL,
  `avatar` VARCHAR(256) NOT NULL,
  `last_login_datetime` DATE NOT NULL,
  `ip_address` VARCHAR(256) NOT NULL,
  `remember_key` VARCHAR(256) NOT NULL,
  `active_session` VARCHAR(256) NOT NULL,
  `date_added` DATE NOT NULL,
  `permissions` INT(1) NOT NULL DEFAULT '0',
  `status` VARCHAR(10) NOT NULL,
  PRIMARY KEY (`user_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;";
$result = $PDO->prepare($command);
$result->execute();


$command = "INSERT INTO `users` (`user_id`, `username`, `password`, `email`, `firstname`, `lastname`, `avatar`, `last_login_datetime`, `ip_address`, `remember_key`, `active_session`, `date_added`, `permissions`, `status`) VALUES
(1, :admin_name, :admin_password, :admin_email, '', '', '', '', '', '', '', '', 1, '');";
$result = $PDO->prepare($command);
$adminPassword = md5(md5($_SESSION['admin_password']));
$result->bindParam(':admin_name', $_SESSION['admin_name']);
$result->bindParam(':admin_password', $adminPassword);
$result->bindParam(':admin_email', $_SESSION['admin_email']);
$result->execute();

$command = "CREATE TABLE IF NOT EXISTS `visitors` (
  `user_id` int(11) NOT NULL AUTO_INCREMENT,
  `cookie_id` varchar(50) NOT NULL,
  `name` varchar(55) NOT NULL,
  `os` varchar(15) NOT NULL,
  `browser` varchar(30) NOT NULL,
  `browser_lang` varchar(10) NOT NULL,
  `mobile` int(11) NOT NULL,
  `screen_size` varchar(15) NOT NULL,
  `ip_address` varchar(55) NOT NULL,
  `country_name` varchar(25) NOT NULL,
  `country_code` varchar(5) NOT NULL,
  `longitude` float NOT NULL,
  `latitude` float NOT NULL,
  `first_visit_date` datetime NOT NULL,
  `last_online_date` datetime DEFAULT NULL,
  `current_url` text NOT NULL,
  `status` int(11) NOT NULL,
  PRIMARY KEY (`user_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;";
$result = $PDO->prepare($command);
$result->execute();


$command = "CREATE TABLE IF NOT EXISTS `visitors_banned` (
`id` INT(11) NOT NULL AUTO_INCREMENT,
  `user_id` INT(11) NOT NULL,
  `date` DATETIME NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `user_id_2` (`user_id`),
  KEY `user_id` (`user_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;";
$result = $PDO->prepare($command);
$result->execute();


// CREATE ENGINE FOLDERS

$path = $configArr['root_path'] . 'engine/data/cache';
if (!file_exists($path)) {
    $mask = umask(0);
    mkdir($path, 0777);
    umask($mask);
}

$path = $configArr['root_path'] . 'engine/data/cache/session';
if (!file_exists($path)) {
    $mask = umask(0);
    mkdir($path, 0777);
    umask($mask);
}

$path = $configArr['root_path'] . 'engine/data/cache/templates_cache';
if (!file_exists($path)) {
    $mask = umask(0);
    mkdir($path, 0777);
    umask($mask);
}

$path = $configArr['root_path'] . 'engine/data/logs';
if (!file_exists($path)) {
    $mask = umask(0);
    mkdir($path, 0777);
    umask($mask);
}

// CREATE USER FOLDERS

$path = $configArr['root_path'] . 'data/config/uploads';
if (!file_exists($path)) {
    $mask = umask(0);
    mkdir($path, 0777);
    umask($mask);
}


$path = $configArr['root_path'] . 'data/config/uploads/audio';
if (!file_exists($path)) {
    $mask = umask(0);
    mkdir($path, 0777);
    umask($mask);
}

$path = $configArr['root_path'] . 'data/config/uploads/avatars';
if (!file_exists($path)) {
    $mask = umask(0);
    mkdir($path, 0777);
    umask($mask);
}

$path = $configArr['root_path'] . 'data/config/uploads/backgrounds';
if (!file_exists($path)) {
    $mask = umask(0);
    mkdir($path, 0777);
    umask($mask);
}

$path = $configArr['root_path'] . 'data/config/uploads/headers';
if (!file_exists($path)) {
    $mask = umask(0);
    mkdir($path, 0777);
    umask($mask);
}

$path = $configArr['root_path'] . 'data/config/uploads/logos';
if (!file_exists($path)) {
    $mask = umask(0);
    mkdir($path, 0777);
    umask($mask);
}

$path = $configArr['root_path'] . 'data/config/presets';
if (!file_exists($path)) {
    $mask = umask(0);
    mkdir($path, 0777);
    umask($mask);
}

// preset config files

$path = $configArr['root_path'] . 'data/config/presets/config.json';
$fp = fopen($path, 'w');
fwrite($fp, '');
fclose($fp);
chmod($path, 0777);

$json_config = file_get_contents($configArr['root_path'] . 'data/config/factory_recall/config.json');
file_put_contents($configArr['root_path'] . 'data/config/presets/config.json', $json_config);

for ($p = 1; $p <= 10; $p++) {
    $path = $configArr['root_path'] . 'data/config/presets/preset_' . $p . '.json';
    $fp = fopen($path, 'w');
    fwrite($fp, '');
    fclose($fp);
    chmod($path, 0777);
    $json_content = file_get_contents($configArr['root_path'] . 'data/config/factory_recall/preset_' . $p . '.json');
    file_put_contents($configArr['root_path'] . 'data/config/presets/preset_' . $p . '.json', $json_content);
}
