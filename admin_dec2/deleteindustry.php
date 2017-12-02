<?php
include("includes/config.php");
if($_POST['id'])
{
$id=$_POST['id'];
$id = mysql_escape_String($id);
$sql = "UPDATE `tbl_industry_type` SET `fld_delstatus`=2  where fld_id='$id'";
mysql_query( $sql);
}
?>