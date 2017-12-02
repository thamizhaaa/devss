<?php 
include "admin_session.php";

$i = $_REQUEST['package_id'];
if($i != "") {
 
        $query = mysql_query("delete from tbl_package_price where fld_id= '".$i."'");	
		
		if($query) {
		?>		
	<script>
	alert("Package Deleted");
	window.location ='mem_priceform.php';
	</script>
            
   <?php 
		}
	?>
<?php     
} else {
?>
<script>
	alert("Error in deleting package");
	window.location ='mem_priceform.php';

</script>
<?php 
}
?>