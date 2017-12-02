<?php
include("includes/config.php");
if($_POST['id'])
{
$id=$_POST['id'];
$id = mysql_escape_String($id);
$sql = "UPDATE `master_jobtype` SET `fld_status`=2  where id='$id'";
mysql_query( $sql);
}
?>