<?php

//server

define('DB_HOST','localhost');
define('DB_USER','root');
define('DB_PASSWORD','');
define('DB_DATABASE','staffing_jobportal');

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
