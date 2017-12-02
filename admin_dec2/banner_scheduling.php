<?php 
include "includes/config.php";

$now = date("Y-m-d");	

$query  = "select * from admin_slider where fromdate != '0000-00-00'";
$res    = mysql_query($query);
while($array = mysql_fetch_array($res)){

$id = $array['id'];
$active = $array['active'];
$fromdate = $array['fromdate'];
$todate = $array['todate'];

if($fromdate == $now) {
		
		mysql_query("update admin_slider set active ='1' where fromdate = '".$now."'");
}

if($todate < $now) {
  
    	mysql_query("update admin_slider set active ='0' where id='".$id."'");
} 
}
?>