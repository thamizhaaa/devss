<?php
 ob_start();
 include "includes/config.php";

 $seekid = $_REQUEST['seekid'];
 $id = $_REQUEST['jobcode'];
 
 if(($seekid != "") && ($id != "")) {
	header("Location:applied_confirm.php?seekid=$seekid&jobcode=$id",false);
	ob_end_flush();

 } else {
?>
	<script>
	alert("Log In or Register before you apply");
	window.location = "index.php?id=<?php echo $id; ?>";
	</script>
    
<?php 
 }
 ?>