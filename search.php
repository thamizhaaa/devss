<?php

include "includes/config.php";
if($_GET['type'] == 'country'){
	$result = mysql_query("SELECT id,jobtitle,keyskills FROM postjob WHERE CONCAT(`jobtitle`,' ',`keyskills`) LIKE '%".strtoupper($_GET['name_startsWith'])."%' ORDER BY id LIMIT 3");	
	$data = array();
	while ($row = mysql_fetch_array($result)) {
		array_push($data, $row['jobtitle']);	
	}	
	echo json_encode($data);
	
} elseif($_GET['type'] == 'zipcode'){
	$result = mysql_query("SELECT DISTINCT CONCAT(`city`,' (',`state`,') ',`country`) as tot FROM city WHERE CONCAT(`zip`, ' ', `city`) LIKE '%".strtoupper($_GET['name_With'])."%' ORDER BY city");	
	$data = array();
	while ($row = mysql_fetch_array($result)) {
		array_push($data, $row['tot']);	
	}	
	echo json_encode($data);
}


?>
