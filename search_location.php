
<?php

include "includes/config.php";

if($_POST) 
{
$q=$_POST['search'];
$sql_res = mysql_query("SELECT DISTINCT CONCAT(`city`,' (',`state`,') ',`country`) as tot FROM city WHERE CONCAT(`zip`, ' ', `city`) LIKE '%$q%' ORDER BY city");	

while($row = mysql_fetch_array($sql_res)){
	
$location = $row['tot'];

$b_location='<strong>'.$q.'</strong>';

$final_location = str_ireplace($q, $b_location, $location);

?>
<div class="show_search1" align="left">

<span class="name1">
<?php echo $final_location; ?>
</span>
</div>
<?php	
}	
}
?>