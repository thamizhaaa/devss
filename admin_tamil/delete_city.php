<?php
include("includes/config.php");
if($_POST['id'])
{
$id=$_POST['id'];
$id = mysql_escape_String($id);
$sql = "UPDATE `tbl_cities` SET `fld_status`=2  where fld_id='$id'";
mysql_query( $sql);
}
?>