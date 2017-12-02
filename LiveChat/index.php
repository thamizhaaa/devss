<?php

$protocol = (!empty($_SERVER['HTTPS']) && $_SERVER['HTTPS'] !== 'off' || $_SERVER['SERVER_PORT'] == 443) ? "https://" : "http://";
$domain = $_SERVER['HTTP_HOST'];

if(!file_exists(getcwd().'/data/config/config.php')) {
	header('Location: '.$protocol.$domain.$_SERVER['REQUEST_URI'].'install/install.php');
	die();
}
require_once 'config.php';
include_once $config ['engine_path'] . "/initEngine.php";
