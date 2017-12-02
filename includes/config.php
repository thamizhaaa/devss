<?php
error_reporting(0);

//amazon
/*
define('DB_HOST','localhost');
define('DB_USER','empowerspot');
define('DB_PASSWORD','spota1b2c3');
define('DB_DATABASE','staffing_jobportal');
*/
//echo $_SERVER['HTTP_HOST'];
if($_SERVER['HTTP_HOST'] == "localhost")
{
    define("URL_ROOT","http://localhost/staffingspot");
    define('DB_HOST','localhost');
    define('DB_USER','root');
    define('DB_PASSWORD','');
    define('DB_DATABASE','staffing_jobportal');
}
elseif($_SERVER['HTTP_HOST'] == "staffingspot.localhost")
{
    define("URL_ROOT","http://staffingspot.localhost/");
    define('DB_HOST','localhost');
    define('DB_USER','root');
    define('DB_PASSWORD','');
    define('DB_DATABASE','staffing_jobportal');
}
                
elseif($_SERVER['HTTP_HOST'] == "staffingspot.localhost.com")
{
    define("URL_ROOT","http://staffingspot.localhost.com/");
    define('DB_HOST','localhost');
    define('DB_USER','root');
    define('DB_PASSWORD','');
    define('DB_DATABASE','staffing_jobportal');
}                

elseif($_SERVER['HTTP_HOST'] == "172.31.1.32")
{    
    define("URL_ROOT","http://172.31.1.32/staffingspot/");
    define('DB_HOST','localhost');
    define('DB_USER','root');
    define('DB_PASSWORD','');
    define('DB_DATABASE','staffing_jobportal');
}

elseif($_SERVER['HTTP_HOST'] == "172.31.1.13")
{    
    define("URL_ROOT","http://172.31.1.13/staffingspot.localhost/");
    define('DB_HOST','localhost');
    define('DB_USER','root');
    define('DB_PASSWORD','');
    define('DB_DATABASE','staffing_jobportal');
}


/*
define('DB_HOST','localhost');
define('DB_USER','root');
define('DB_PASSWORD','');
define('DB_DATABASE','staffing_jobportal');
*/

//server
//define('DB_HOST','localhost');
//define('DB_USER','staffing_jobuser');
//define('DB_PASSWORD','cJB!$eI~8Nto');
//define('DB_DATABASE','staffing_jobportal');
//Localhost
//define('DB_HOST','localhost');
//define('DB_USER','root');
//define('DB_PASSWORD','');
//define('DB_DATABASE','jobportal');

$link=mysql_connect(DB_HOST,DB_USER,DB_PASSWORD);
if(!$link)
{
	die('Failed to connect to server:'.mysql_error());
}
//echo "Coonected Successfully";
$db=mysql_select_db(DB_DATABASE);
if(!$db)
{
	die("unable to select database");
}
 ?>
