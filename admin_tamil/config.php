<?php

//amazon
/*
define('DB_HOST','localhost');
define('DB_USER','empowerspot');
define('DB_PASSWORD','spota1b2c3');
define('DB_DATABASE','staffing_jobportal');
*/

define('DB_HOST','localhost');
define('DB_USER','root');
define('DB_PASSWORD','');
define('DB_DATABASE','staffing_nov');

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



$mysql_hostname = "localhost";
$mysql_user = "root";
$mysql_password = "";
$mysql_database = "staffing_nov";
$prefix = "";
$bd = mysql_connect($mysql_hostname, $mysql_user, $mysql_password) or die("Could not connect database");
mysql_select_db($mysql_database, $bd) or die("Could not select database");
//Cities
$result_city=mysql_query("SELECT distinct fld_name,fld_state_id FROM tbl_cities WHERE fld_status!=2");
$i=0;
while($row=mysql_fetch_array($result_city)) { 
$response_city[$i]['city']= $row['fld_name'];
$response_city[$i]['state_id']= $row['fld_state_id'];
$i=$i+1;
} 
$json_string_city = json_encode($response_city);
$file_city = 'city.json';
file_put_contents($file_city, $json_string_city);

//States
$result_state=mysql_query("SELECT distinct fld_id,fld_name,fld_country_id FROM tbl_states WHERE fld_status!=2");
$i=0;
while($row=mysql_fetch_array($result_state)) { 
$response_state[$i]['id']= $row['fld_id'];
$response_state[$i]['state']= $row['fld_name'];
$response_state[$i]['country_id']= $row['fld_country_id'];
$i=$i+1;
} 
$json_string_state = json_encode($response_state);
$file_state = 'state.json';
file_put_contents($file_state, $json_string_state);


//Country
$result_country=mysql_query("SELECT distinct fld_id,fld_name FROM tbl_countries WHERE fld_status!=2");
$i=0;
while($row=mysql_fetch_array($result_country)) { 
$response_country[$i]['id']= $row['fld_id'];
$response_country[$i]['country']= $row['fld_name'];
$i=$i+1;
} 
$json_string_country = json_encode($response_country);
$file_country = 'country.json';
file_put_contents($file_country, $json_string_country);




?>
