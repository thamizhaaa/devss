<?php

$baseDir = rtrim($_SERVER['PHP_SELF'], "/index.php");
$baseDir = ltrim($baseDir, '/');

if( !isset( $_SERVER['HTTP_X_REQUESTED_WITH'] ) || ( $_SERVER['HTTP_X_REQUESTED_WITH'] != 'XMLHttpRequest' ) ) { // Ajax support for engine
	if(!file_exists(getcwd().'/data/config/config.php')) {
		header('Location: '.$protocol.$domain.$_SERVER['REQUEST_URI'].'/install/install.php');
		die();
	}
}

include_once 'data/config/config.php';

// ENGINE CONFIG

$config = array ('engine_path' => $configArr['engine_path'], 

//Debug Setup	
'debug' => false,  
'debug_ips' => array (''), 

//Site Setup
'root_path' => $configArr['root_path'], 
'domain' => $configArr['domain'], 
'site_title' => '',  
'use_language' => false,
'default_language' => 'en',
'langs' => array('en'),
);
	
//Data Server Configuration
$config['data_server_path'] = $config['root_path'].'data/';
$protocol = (!empty($_SERVER['HTTPS']) && $_SERVER['HTTPS'] !== 'off' || $_SERVER['SERVER_PORT'] == 443) ? "https://" : "http://";

if(substr($_SERVER['SERVER_NAME'], 0, 4) == 'www.') {
	$config['data_server'] = $protocol.'www.'.$config['domain'].$baseDir.'/data/';
}
else {
	$config['data_server'] = $protocol.$config['domain'].'/'.$baseDir.'/data/';
}

if (!isset($config)) {
	die("Engine error: Config file is not set correctly.");
}
