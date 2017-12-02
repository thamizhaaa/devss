<?php

include "includes/config.php";			
$q=$_REQUEST['searchword'];
 $country = $_REQUEST['country'];

 $my_data=mysql_real_escape_string($q);
 
 if($country == 'IN') {
	 
 $result=mysql_query("SELECT DISTINCT CONCAT(city,' (',state,')') as cities,zip as zipcode FROM in_city WHERE zip LIKE '%".$my_data."%' limit 25"); 		
 
 }elseif($country == 'US'){
 
 $result=mysql_query("SELECT DISTINCT CONCAT(city,' (',state,')') as cities,zip as zipcode FROM city WHERE zip LIKE '%".$my_data."%' limit 25		
 "); 
	 
 } else {

 $result=mysql_query("SELECT DISTINCT CONCAT(city,' (',state,')') as cities,zip as zipcode FROM city WHERE zip LIKE '%".$my_data."%' 
 UNION ALL 
 SELECT DISTINCT CONCAT(city,' (',state,')') as cities,zip as zipcode FROM in_city WHERE zip LIKE '%".$my_data."%' limit 25		
 "); 
 }
	$count = mysql_num_rows($result);

 if($count > 0)
 {	
 $array = array();
  while($row=mysql_fetch_assoc($result))
  {
  $array[] = $row;
 
  }
   echo json_encode($array);
 } else {
	 echo "No results were found";
 }
			?>
	
	
   


