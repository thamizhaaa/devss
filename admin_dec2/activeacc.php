<?php
include "includes/config.php";

$id = $_REQUEST['empid'];

if($id !="") {
	
	$query = mysql_query("UPDATE employer SET status = 1 WHERE empid='".$id."'");
	
	if($query) {
	?>	
	<script>
	alert("Activated Successfully");
	window.location="emp_manage.php";
	</script>
    	
<?php
	}
	
} else {
?>	
<script>
alert("Error in Activating Account");
window.location ="emp_manage.php";
</script>
<?php
}


?>