<?php
include "admin_session.php";

 $id = $_REQUEST['imgid'];
 $active = $_REQUEST['active'];

if($id !="") {
	
	if(($id !="") && ($active =="0")){
	
	$query = mysql_query("UPDATE admin_slider SET active = 1 WHERE id='".$id."'");
	
	if($query) {
	?>	
	<script>
	alert("Activated Successfully");
	window.location="scheduled_banner.php";
	</script>
    	
<?php
	}
	} elseif(($id !="") && ($active =="1")) {

		$query = mysql_query("UPDATE admin_slider SET active = 0 WHERE id='".$id."'");
	
	if($query) {
	?>	
    
   	<script>
	alert("Deactivated Successfully");
	window.location="scheduled_banner.php";
	</script>

<?php		
	}


	}
	
} else {
?>	
<script>
alert("Error in Activating Banner Image");
window.location ="master_banner.php";
</script>
<?php
}


?>