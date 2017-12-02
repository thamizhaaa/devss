<?php

include "config.php";			
$q=$_POST['searchword'];
 $country = $_POST['country'];

 $my_data=mysql_real_escape_string($q);
 
 if($country == 'IN') {
	 
 $result=mysql_query("SELECT DISTINCT CONCAT(city,' (',state,')') as tot,zip FROM in_city WHERE zip LIKE '%".$my_data."%' limit 25"); 		
 
 }elseif($country == 'US'){
 
 $result=mysql_query("SELECT DISTINCT CONCAT(city,' (',state,')') as tot,zip FROM city WHERE zip LIKE '%".$my_data."%' limit 25		
 "); 
	 
 } else {

 $result=mysql_query("SELECT DISTINCT CONCAT(city,' (',state,')') as tot,zip FROM city WHERE zip LIKE '%".$my_data."%' 
 UNION ALL 
 SELECT DISTINCT CONCAT(city,' (',state,')') as tot,zip FROM in_city WHERE zip LIKE '%".$my_data."%' limit 25		
 "); 
 }
 
 
	$count = mysql_num_rows($result);

 if($count > 0)
 {
	
  while($row=mysql_fetch_array($result))
  {
   ?>
   <li zipattr='<?php echo $row['zip']; ?>'><?php echo $row['tot']; ?></li>
   <?php
  }
 } else {
	?>
  <li><?php echo 'No result Found'; ?></li>  
    <?php 
 }
			?>
	
	
   


