<?php

if (!isset($config)) {
	die("Engine error: Config file is not set correctly.");
}

/* System defines */
$protocol = (!empty($_SERVER['HTTPS']) && $_SERVER['HTTPS'] !== 'off' || $_SERVER['SERVER_PORT'] == 443) ? "https://" : "http://";
$applicationDir = rtrim($_SERVER['PHP_SELF'], "/index.php");
$applicationDir = ltrim($applicationDir, '/');

define("PROTOCOL", $protocol);
define("DOMAIN", $config['domain']);
define("APPLICATION_PATH", DOMAIN.'/'.$applicationDir.'/');
define("ENGINE_PATH", $config['engine_path']);
define("ROOT_PATH", $config['root_path']);
define("CACHE", ENGINE_PATH . "/data/cache/");
define("DATA_SERVER_PATH", $config['data_server_path']);
define("DATA_SERVER", $config['data_server']);
define("TEMPLATE_PATH", ROOT_PATH . "html_layouts/");
define("INSTALLATION_PATH", $applicationDir);

/* php ini sets */
ini_set ( "session.cookie_domain", "." . DOMAIN );
ini_set ( "session.save_path", CACHE . "/session/" );
ini_set ( "session.use_only_cookies", true );
ini_set ( "session.use_trans_sid", false );
ini_set ( "arg_separator.output", "&amp;" );
ini_set ( 'register_globals', "Off" );
ini_set ( 'allow_url_fopen', "Off" );
ini_set ( 'magic_quotes_gpc', "Off" );
ini_set ( 'magic_quotes_runtime', "Off" );
date_default_timezone_set ( "UTC" );

/* To show Errors  */
error_reporting ( E_ALL ); 

$engineConfig = array (
		'supportMail' => '',  //support email
		'default_language' => 'en',
);

###########################################################################

function __autoload($class_name) {
	if (class_exists ( $class_name )) {
		return true;
	}
	
	$file = ENGINE_PATH . "classes/" . $class_name . ".class.php";
	if (file_exists ( $file )) {
		require_once ($file);
	} elseif (isset ( $_GET ['module'] ) && file_exists ( ROOT_PATH . "/modules/" . $_GET ['module'] . "/models/" . $class_name . ".class.php" )) {
		require_once ROOT_PATH . "/modules/" . $_GET ['module'] . "/models/" . $class_name . ".class.php";
	}
	return true;
}

/* smarty assign by ref - shortcut */
function abr($var, $value) {
	global $smarty;
	$smarty->assign_by_ref ( $var, $value );
}

/* Get URL variable */
function get_id($level) {
	global $config;
	
	if($config['use_language']) {
		$level = $level + 1;
	}
	
	if (! isset ( $_GET ['array_url'] [$level] )) {
		return false;
	}
	
	if (strstr ( $_GET ['array_url'] [$level], "." )) {
		$all = explode ( ".", $_GET ['array_url'] [$level] );
	} else {
		$all [0] = $_GET ['array_url'] [$level];
	}
	return $all [0];
}


//Refresh page with or without message
function refresh($url = '', $message = '', $type = 'success') {

	if ($url == '') {
		$_SERVER ['REQUEST_URI'] = str_ireplace ( "//", "/", $_SERVER ['REQUEST_URI'] );
		$url = PROTOCOL . $_SERVER ["SERVER_NAME"] . '' . $_SERVER ['REQUEST_URI'];
	}
	
	if ($message != '') {
		$_SESSION ['temp'] ['message_title'] = $message;
	}
	
	$_SESSION ['temp'] ['message_type'] = $type;
	
	header ( "Location: $url" );
	die ();
}

//Redirect to login
function login_redirect($url, $fromUrl = '', $message='') {
	if ($fromUrl == '')
		$_SESSION ['redirectUrl'] = '/' . @$_GET ['url'];
	else
		$_SESSION ['redirectUrl'] = $fromUrl;
	
	if ($message != '') {
		$_SESSION ['temp'] ['message_title'] = $message;
		$_SESSION ['temp'] ['message_type'] = 'error';
	}
		
	header ( "Location: $url" );
	die ();
}

function getRefreshMessage() {
	
	if (isset ( $_SESSION ['temp'] ['message_title'] )) {
		$message['title'] = $_SESSION ['temp'] ['message_title'];
		unset ( $_SESSION ['temp'] ['message_title'] );
		
		if (isset ( $_SESSION ['temp'] ['message_text'] )) {
			$message['text'] = $_SESSION ['temp'] ['message_text'];
			unset ( $_SESSION ['temp'] ['message_text'] );
		}
		else {
			$message['text'] = '';
		}
				
		if (isset ( $_SESSION ['temp'] ['message_type'] )) {
			$message['type'] = $_SESSION ['temp'] ['message_type'];
			unset ( $_SESSION ['temp'] ['message_type'] );
		}
		else {
			$message['type'] = '';
		}
				
		return $message;
	}
	
	return false;
}


function addErrorMessage($title, $msg = "", $type = "notice") {
	global $smarty;

	switch($type) {

		case 'danger':
			$class = 'danger';
			break;
		case 'warning':
			$class = 'warning';
			break;
		case 'error':
			$class = 'error';
			break;
		case 'info':
			$class = 'info';
			break;

		default:
			$class = 'success';
			break;
	}
	if($type != 'error3') {
		$msg = $smarty->get_template_vars ( 'errorMessage' ) . '
			<div class="box box-'.$class.'">'.$title.' '.$msg.'</div>';
	}
	elseif($type == 'error3'){
		$msg = $smarty->get_template_vars ( 'errorMessage' ) . '
			<div class="box-'.$class.'">'.$title.' '.$msg.'</div>';	
	}
	elseif($type == 'success3'){
		$msg = $smarty->get_template_vars ( 'errorMessage' ) . '
			<div class="box-'.$class.'">'.$title.' '.$msg.'</div>';	
	}	
	
	$smarty->assign_by_ref ( "errorMessage", $msg );
	
	return true;
}


function check_login($type = 'user') {
	global $_SESSION, $baseDir;
	
	if (! isset ( $_SESSION [$type] )) {
		refresh ( '/'.$baseDir.'/users/login/' );
	}
	return true;
}

function check_login_bool($type = 'user') {
	global $_SESSION;
	
	if (! isset ( $_SESSION [$type] )) {
		return false;
	}
	return true;
}

function url($url) {
	$url = strip_tags ( $url );
	$url = trim ( $url );
	$url = preg_replace ( '%[.,:\'"/\\\\[\]{}\%\-_!?]%simx', ' ', $url );
		$url = str_ireplace ( " ", "-", $url );
	
		return $url;
	}

	function check_debug() {
		global $config;
	
		if (in_array ( $_SERVER ['REMOTE_ADDR'], $config ['debug_ips'] ) && $config ['debug'] === true) {		
			return true;
		}
		return false;
	}

	function add_debug($val) {
		global $debug;
		$debug .= $val . "<BR /><BR />";
		return true;
	}
	
###################################################  ENGINE SECURITY    ######################################################

	function removeXSS($val) {
		$val = preg_replace ( '/([\x00-\x08][\x0b-\x0c][\x0e-\x20])/', '', $val );
		$search = 'abcdefghijklmnopqrstuvwxyz';
		$search .= 'ABCDEFGHIJKLMNOPQRSTUVWXYZ';
		$search .= '1234567890!@#$%^&*()';
		$search .= '~`";:?+/={}[]-_|\'\\';
		for($i = 0; $i < strlen ( $search ); $i ++) {
			$val = preg_replace ( '/(&#[x|X]0{0,8}' . dechex ( ord ( $search [$i] ) ) . ';?)/i', $search [$i], $val ); // with a ;
			$val = preg_replace ( '/(&#0{0,8}' . ord ( $search [$i] ) . ';?)/', $search [$i], $val ); // with a ;
		}
		$ra1 = Array (
		
			'javascript', 
			'vbscript', 
			'expression', 
			'applet', 
			'meta', 
			'xml', 
			'blink', 
			//'link', 
			'style', 
			'script', 
			'embed', 
			'object', 
			'iframe', 
			'frame', 
			'frameset', 
			'ilayer', 
			'layer', 
			'bgsound', 
			'title', 
			'base' 
		);
		$ra2 = Array (
		
			'onabort', 
			'onactivate', 
			'onafterprint', 
			'onafterupdate', 
			'onbeforeactivate', 
			'onbeforecopy', 
			'onbeforecut', 
			'onbeforedeactivate', 
			'onbeforeeditfocus', 
			'onbeforepaste', 
			'onbeforeprint', 
			'onbeforeunload', 
			'onbeforeupdate', 
			'onblur', 
			'onbounce', 
			'oncellchange', 
			'onchange', 
			'onclick', 
			'oncontextmenu', 
			'oncontrolselect', 
			'oncopy', 
			'oncut', 
			'ondataavailable', 
			'ondatasetchanged', 
			'ondatasetcomplete', 
			'ondblclick', 
			'ondeactivate', 
			'ondrag', 
			'ondragend', 
			'ondragenter', 
			'ondragleave', 
			'ondragover', 
			'ondragstart', 
			'ondrop', 
			'onerror', 
			'onerrorupdate', 
			'onfilterchange', 
			'onfinish', 
			'onfocus', 
			'onfocusin', 
			'onfocusout', 
			'onhelp', 
			'onkeydown', 
			'onkeypress', 
			'onkeyup', 
			'onlayoutcomplete', 
			'onload', 
			'onlosecapture', 
			'onmousedown', 
			'onmouseenter', 
			'onmouseleave', 
			'onmousemove', 
			'onmouseout', 
			'onmouseover', 
			'onmouseup', 
			'onmousewheel', 
			'onmove', 
			'onmoveend', 
			'onmovestart', 
			'onpaste', 
			'onpropertychange', 
			'onreadystatechange', 
			'onreset', 
			'onresize', 
			'onresizeend', 
			'onresizestart', 
			'onrowenter', 
			'onrowexit', 
			'onrowsdelete', 
			'onrowsinserted', 
			'onscroll', 
			'onselect', 
			'onselectionchange', 
			'onselectstart', 
			'onstart', 
			'onstop', 
			'onsubmit', 
			'onunload' 
		);
		$ra = array_merge ( $ra1, $ra2 );
	
		$found = true; // keep replacing as long as the previous round replaced something
		while ( $found == true ) {
			$val_before = $val;
			for($i = 0; $i < sizeof ( $ra ); $i ++) {
				$pattern = '/';
				for($j = 0; $j < strlen ( $ra [$i] ); $j ++) {
					if ($j > 0) {
						$pattern .= '(';
						$pattern .= '(&#[x|X]0{0,8}([9][a][b]);?)?';
						$pattern .= '|(&#0{0,8}([9][10][13]);?)?';
						$pattern .= ')?';
					}
					$pattern .= $ra [$i] [$j];
				}
				$pattern .= '/i';
				$replacement = substr ( $ra [$i], 0, 2 ) . '<x>' . substr ( $ra [$i], 2 ); // add in <> to nerf the tag
				$val = preg_replace ( $pattern, $replacement, $val ); // filter out the hex tags
				if ($val_before == $val) {
					// no replacements were made, so exit the loop
					$found = false;
				}
			}
		}
		
		$val = removeXSS_Validate($val);

		return $val;
	}

	function removeJavaScript($Str_Input){
		@settype($Str_Input, 'string');

	      $_Ary_TagsList= array('jav&#x0A;ascript:', 'jav&#x0D;ascript:', 'jav&#x09;ascript:', '<!-',
		  	'div',
			'<div>',
			'</div>',
			'script',
			'onactivate',
			'onafterprint',
			'onafterupdate',
			'onbeforeactivate',
			'onbeforecopy',
			'onbeforecut',
			'onbeforedeactivate',
			'onbeforeeditfocus',
			'onbeforepaste',
			'onbeforeprint',
			'onbeforeunload',
			'onbeforeupdate',
			'onblur',
			'onbounce',
			'oncellchange',
			'onchange',
			'onclick',
			'oncontextmenu',
			'oncontrolselect',
			'oncopy',
			'oncut',
			'ondataavailable',
			'ondatasetchanged',
			'ondatasetcomplete',
			'ondblclick',
			'ondeactivate',
			'ondrag',
			'ondragend',
			'ondragenter',
			'ondragleave',
			'ondragover',
			'ondragstart',
			'ondrop',
			'onerror',
			'onerrorupdate',
			'onfilterchange',
			'onfinish',
			'onfocus',
			'onfocusin',
			'onfocusout',
			'onhelp',
			'onkeydown',
			'onkeypress',
			'onkeyup',
			'onlayoutcomplete',
			'onload',
			'onlosecapture',
			'onmousedown',
			'onmouseenter',
			'onmouseleave',
			'onmousemove',
			'onmouseout',
			'onmouseover',
			'onmouseup',
			'onmousewheel',
			'onmove',
			'onmoveend',
			'onmovestart',
			'onpaste',
			'onpropertychange',
			'onreadystatechange',
			'onreset',
			'onresize',
			'onresizeend',
			'onresizestart',
			'onrowenter',
			'onrowexit',
			'onrowsdelete',
			'onrowsinserted',
			'onscroll',
			'onselect',
			'onselectionchange',
			'onselectstart',
			'onstart',
			'onstop',
			'onsubmit',
			'onunload' , '\u003C');

	      $Str_Input= @str_replace($_Ary_TagsList, '', $Str_Input);

	      $Str_Input= @str_replace('

	      ', '', $Str_Input);

	    return $Str_Input;
	}

	function removeXSS_Validate($Str_Input){
		@settype($Str_Input, 'string');
	      $Str_Input= @strip_tags($Str_Input);

	      $_Ary_TagsList= array('jav&#x0A;ascript:', 'jav&#x0D;ascript:', 'jav&#x09;ascript:', '<!-', '<', '>', '%3C', '&lt', '&lt;', '&LT', '&LT;', '&#60', '&#060', '&#0060', '&#00060', '&#000060', '&#0000060', '&#60;', '&#060;', '&#0060;', '&#00060;', '&#000060;', '&#0000060;', '&#x3c', '&#x03c', '&#x003c', '&#x0003c', '&#x00003c', '&#x000003c', '&#x3c;', '&#x03c;', '&#x003c;', '&#x0003c;', '&#x00003c;', '&#x000003c;', '&#X3c', '&#X03c', '&#X003c', '&#X0003c', '&#X00003c', '&#X000003c', '&#X3c;', '&#X03c;', '&#X003c;', '&#X0003c;', '&#X00003c;', '&#X000003c;', '&#x3C', '&#x03C', '&#x003C', '&#x0003C', '&#x00003C', '&#x000003C', '&#x3C;', '&#x03C;', '&#x003C;', '&#x0003C;', '&#x00003C;', '&#x000003C;', '&#X3C', '&#X03C', '&#X003C', '&#X0003C', '&#X00003C', '&#X000003C', '&#X3C;', '&#X03C;', '&#X003C;', '&#X0003C;', '&#X00003C;', '&#X000003C;', '\x3c', '\x3C', '\u003c', '\u003C', chr(60), chr(62));

	      $Str_Input= @str_replace($_Ary_TagsList, '', $Str_Input);

	      $Str_Input= @str_replace('

	      ', '', $Str_Input);

	    return $Str_Input;
	}

	function urlsafe_b64encode($string) {
		$data = base64_encode ( $string );
		$data = str_replace ( array ('+', '/', '='), array ('-', '_', ''), $data );
		return $data;
	}

	function urlsafe_b64decode($string) {

		$data = str_replace ( array ('-', '_'), array ('+', '/'), $string );
		$mod4 = strlen ( $data ) % 4;
		if ($mod4) {
			$data .= substr ( '====', $mod4 );
		}
		$data = base64_decode ( $data );
		return $data;
	}
	function strip_html_tags($text) {
		$text = preg_replace ( array (
		
			// Remove invisible content
			'@<head[^>]*?>.*?</head>@siu', 
			'@<style[^>]*?>.*?</style>@siu', 
			'@<script[^>]*?.*?</script>@siu', 
			'@<object[^>]*?.*?</object>@siu', 
			'@<embed[^>]*?.*?</embed>@siu', 
			'@<applet[^>]*?.*?</applet>@siu', 
			'@<noframes[^>]*?.*?</noframes>@siu', 
			'@<noscript[^>]*?.*?</noscript>@siu', 
			'@<noembed[^>]*?.*?</noembed>@siu',
			'@<div[^>]*?>.*?</div>@siu',  
			// Add line breaks before and after blocks
			'@</?((address)|(blockquote)|(center)|(del)|(marquee)|(map))@iu', 
			'@</?((div)|(ins)|(isindex)|(pre))@iu', 
			'@</?((dir)|(dl)|(dt)|(dd)|(menu))@iu', 
			'@</?((form)|(button)|(fieldset)|(legend)|(input))@iu', 
			'@</?((label)|(select)|(optgroup)|(option)|(textarea))@iu', 
			'@</?((frameset)|(frame)|(iframe))@iu' 
		), array (
		
			' ', 
			' ', 
			' ', 
			' ', 
			' ', 
			' ', 
			' ', 
			' ', 
			' ', 
			"\n\$0", 
			"\n\$0", 
			"\n\$0", 
			"\n\$0", 
			"\n\$0", 
			"\n\$0", 
			"\n\$0", 
			"\n\$0" 
		), $text );
		return $text;
	}

	function sql_quote($value, $filter="secureAll") {

	$value = str_replace('<x>', '', $value);
		if ($filter=="secureAll"){
		$value = removeXSS($value);	
	}
	else{
		$value = removeJavaScript($value);
	}
	
		if (isset($toStrip)) {
			$value = strip_html_tags ( $value );
		}
		if (get_magic_quotes_gpc ()) {
			$value = stripslashes ( $value );
		}
		$value = addslashes ( $value );
		return $value;
	}

	/* check users (Agent) is bot? */
	function isBot() {
	
		$botlist = array (
		
			"Teoma", 
			"diri", 
			"alexa", 
			"froogle", 
			"Gigabot", 
			"inktomi", 
			"looksmart", 
			"URL_Spider_SQL", 
			"Firefly", 
			"NationalDirectory", 
			"Ask Jeeves", 
			"TECNOSEEK", 
			"InfoSeek", 
			"WebFindBot", 
			"girafabot", 
			"crawler", 
			"www.galaxy.com", 
			"Googlebot", 
			"Scooter", 
			"Slurp", 
			"msnbot", 
			"appie", 
			"FAST", 
			"WebBug", 
			"Spade", 
			"ZyBorg", 
			"rabaz", 
			"Baiduspider", 
			"Feedfetcher-Google", 
			"TechnoratiSnoop", 
			"Rankivabot", 
			"Mediapartners-Google", 
			"Sogou web spider", 
			"WebAlta Crawler" 
		);
	
		foreach ( $botlist as $bot ) {
			if (ereg ( $bot, $_SERVER ['HTTP_USER_AGENT'] )) {
				return true;
			}
		}
	
		return false;
	}


	######################  CRSF PROTECTION ##################################



	function check_CSRF( $key, $submited_post, $throwException=false, $timespan=null, $multiple=false, $doOriginCheck=false){

	    if ( !isset( $_SESSION[ 'csrf_' . $key ] ) ){			
	        if($throwException) {
	            throw new Exception( 'Missing CSRF session token.' );
			}	
	        else{
	            return false;
			}	
	    }    
	    if ( !isset( $submited_post[ $key ] ) ){
	        if($throwException) {
	            throw new Exception( 'Missing CSRF form token.' );
			}	
	        else {
	            return false;
			}	
		}	
 
	    $hash = $_SESSION[ 'csrf_' . $key ];   // Get valid token from session
	
		if(!$multiple) { // Free up session token for one-time CSRF token usage.
			$_SESSION[ 'csrf_' . $key ] = null;
		}	
	
	    // Origin checks
	    if( $doOriginCheck === true && sha1( $_SERVER['REMOTE_ADDR'] . $_SERVER['HTTP_USER_AGENT'] ) != substr( base64_decode( $hash ), 10, 40 ) ) {
	        if($throwException) {
	            throw new Exception( 'Form origin does not match token origin.' );
			}	
	        else {
	            return false;
			}	
	    }
	     
	    if ( $submited_post[ $key ] != $hash ) {    // Check if session token matches form token
	        if($throwException) {
	            throw new Exception( 'Invalid CSRF token.' );
			}	
	        else {
	            return false;
			}	
		}	
 
	    if ( $timespan != null && is_int( $timespan ) && intval( substr( base64_decode( $hash ), 0, 10 ) ) + $timespan < time() ){    // Check for token expiration
	        if($throwException){
	            throw new Exception( 'CSRF token has expired.' );
			}	
	        else{
	            return false;
			}
		}
		return true;
	}

	function initiate_csrf_token(){
		$token = generate_CSRF_token( 'csrf_token' );
		return $token;
	}

	function generate_CSRF_token( $key, $doOriginCheck = false) {
			
		$extra = '';
		if ($doOriginCheck === TRUE ){
			$extra = sha1( $_SERVER['REMOTE_ADDR'] . $_SERVER['HTTP_USER_AGENT'] );
		}
	    // token generation (basically base64_encode any random complex string, time() is used for token expiration) 
	    $token = base64_encode( time() . $extra . randomString( 32 ) );
	   $_SESSION[ 'csrf_' . $key ] = $token;   // store the one-time token in session

	    return $token;
	}

	function randomString( $length ) {
	    $seed = 'ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijqlmnopqrtsuvwxyz0123456789';
	    $max = strlen( $seed ) - 1;

	    $string = '';
	    for ( $i = 0; $i < $length; ++$i ) {
	        $string .= $seed{intval( mt_rand( 0.0, $max ) )};
		}	
	    return $string;
	}


################################################################## END ENGINE SECURITY ################################################################################

	function _setView($path) {
		_setTemplate($path);
		return true;
	}


	function _setTemplate($path, $prefix = "") {
		global $_templateFile;

		$dir = dirname ( $path );
		$file = basename ( $path, '.php' ) . '.html'; //file name template.tmpl
		$num = strlen ( ROOT_PATH );
	
		$template_file = substr ( $dir, $num ) . '/' . $prefix . $file;
	
		$template_file = ROOT_PATH . str_ireplace ( "controllers", "views", $template_file );
	
		if (! file_exists ( $template_file )) {
			die ( "template not exist! function: " . __FUNCTION__ . " file: " . $template_file );
		}
	
$_templateFile = $template_file;
	
abr ( 'content_template', $template_file );
	
return true;
}

function _setTitle($title) {
abr ( 'title', $title );
}

function _setLayout($layout) {
global $_layoutFile;
	
$_layoutFile = $layout;
	
return true;
}
###########################################

if (! isset ( $engineConfig ) || ! is_array ( $engineConfig )) {
	die ( "Engine error: engine config file not set!" );
}


/* DEBUG */

if (check_debug ()) {
	$execute = new execute();
	$execute->start(1);
	$debug = '<B>Debug container:</B><BR />';	
}


/* CACHE */
require_once ROOT_PATH.'engine/classes/cache.class.php';
$cache = new cache ( );
$cache->cacheDir = CACHE;
global $cache;

/* SESSION */
require_once ROOT_PATH.'engine/classes/session.class.php';
$session = new Session();

$_layoutFile = 'index'; //Default layout is /html_layouts/index.html
$_templateFile = ''; //This is the file which insert into layout file

########### SMARTY ##########

define ( 'SMARTY_DIR', ENGINE_PATH . "classes/Smarty/" );

include_once (SMARTY_DIR . "Smarty.class.php");
$smarty = new Smarty ( );
$smarty->compile_dir = CACHE . "/templates_cache/";
$smarty->compile_check = true;
$smarty->debugging = false;

abr ( 'domain', DOMAIN );
abr ( 'protocol', PROTOCOL );
abr ( 'application_path', APPLICATION_PATH );
abr ( "root_path", ROOT_PATH );
abr ( "data_server", $config ['data_server'] );

global $smarty;

########### SMARTY ##########

if ($message = getRefreshMessage ()) {
	addErrorMessage ( $message['title'], $message['text'], $message['type'] );
}
if (! defined ( 'LIMIT' )) {
	define ( 'LIMIT', 10, true );
}
if (isset ( $_GET ['p'] ) && is_numeric ( $_GET ['p'] ) && $_GET ['p'] > 1) {
	define ( 'PAGE', intval ( $_GET ['p'] ) );
	define ( 'START', (PAGE - 1) * LIMIT );
} else {
	define ( 'PAGE', 1 );
	define ( 'START', 0 );
}

if (isset ( $_GET ['url'] )) {
	$_GET ['array_url'] = explode ( "/", $_GET ['url'] );
	
	if (! isset ( $_GET ['array_url'] [0] ) || strlen ( $_GET ['array_url'] [0] ) != 2) {
		$_moduleOffset = 0;
		$_controllerOffset = 1;
	} else {
		$_GET ['language'] = $_GET ['array_url'] [0];
		$_moduleOffset = 1;
		$_controllerOffset = 2;
	}
#####################################################################

		
		
	#### URL PARSING ##
		
	$parts_1 = explode('?', DOMAIN.$_SERVER['REQUEST_URI']);
	$parts_2 = explode('&', $parts_1[0]);
	$url = $parts_2[0];

	$request  = str_replace(APPLICATION_PATH, "", $url);		
	$params = explode("/", $request);
	$params = array_filter($params);
	$params = array_values($params );
	
	//Allowed modules
	$safe_pages = array(APPLICATION_PATH, "users", "visitors", "settings", '404');
	if (isset($params[0])){
		if(in_array($params[0], $safe_pages)) {			
			$_GET ['array_url'] = $params;
		} 
		else{
				$languageURL = $baseDir.'/';
				refresh('/'.$languageURL);
		}
	}	
	
	//Check if module is set, OR set the default module /modules/index/	
	if (isset ( $_GET ['array_url'] [$_moduleOffset] )) {
						
		if ($_GET ['array_url'] [$_moduleOffset] != "") {
			$_GET ['module'] = $_GET ['array_url'] [$_moduleOffset];			
		} else {
			$_GET ['module'] = "index";
		}
			
	}
	
	//Check if controller is set, OR set the default controller to index
	if (isset ( $_GET ['array_url'] [$_controllerOffset] )) {
		if ($_GET ['array_url'] [$_controllerOffset] != "") {
			$_GET ['controller'] = $_GET ['array_url'] [$_controllerOffset];	
		} else {
			$_GET ['controller'] = 'index';
		}
	}	
}

//Pre-check module and controller
if (! isset ( $_GET ['module'] )) {
	$_GET ['module'] = 'index';
}
if (! isset ( $_GET ['controller'] )) {
	$_GET ['controller'] = 'index';
}

//Clear module and controller input from hacks
if (isset ( $_GET ['module'] )) {
	if (! (preg_match ( "/[a-z_0-9.\/-]*/i", $_GET ['module'] ) && ! preg_match ( "/\\.\\./", $_GET ['module'] ))) {
		die ( "Invalid request for MODULE" );
	}
}
if (isset ( $_GET ['controller'] )) {
	if (! (preg_match ( "/[a-z_ а-я0-9.\/-]*/iu", $_GET ['controller'] ) && ! preg_match ( "/\\.\\./", $_GET ['controller'] ))) {
		die ( "Invalid request for CONTROLLER" );
	}
}

$languageURL = $baseDir.'/';	
abr("languageURL", $languageURL);

if( !isset( $_SERVER['HTTP_X_REQUESTED_WITH'] ) || ( $_SERVER['HTTP_X_REQUESTED_WITH'] != 'XMLHttpRequest' ) ) { // Ajax support for engine

	if (isset ( $_GET ['module'] ) && isset ( $_GET ['controller'] )) {
	
		define ( "inc", ROOT_PATH . '/modules/' . $_GET ['module'] . '/controllers/' . $_GET ['controller'] . '.php' );
	
		if (file_exists ( inc )) {
			include_once (inc);
		} else {		
			//load index.php
			define ( "inc2", ROOT_PATH . '/modules/' . $_GET ['module'] . '/controllers/index.php' );
			if (file_exists ( inc2 )) {
				include_once (inc2);
			} else {
				refresh('/'.$languageURL.'404/');
			}
		}
	} else {
		$_GET ['module'] = 'index';
		include_once (ROOT_PATH . "/modules/index/controllers/index.php");
	}



	if($_templateFile == '') {
		$_templateFile = ROOT_PATH.'modules/index/views/index.html';
		abr ( 'content_template', $_templateFile );		
	}

	if ($_templateFile != '') {	
		restore_error_handler ();
		flush ();

		$smarty->display ( TEMPLATE_PATH . $_layoutFile . ".html" );
	} 

} // END Ajax Support

if (isset ( $PDO )) {
	$PDO = null;
}
