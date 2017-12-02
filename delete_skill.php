<?php
include("config.php");
if($_REQUEST['id'])
{
$id=$_REQUEST['id'];
echo $id;
$id = mysql_escape_String($id);

$sql = "UPDATE `tbl_job_skills` SET `fld_status`=2  where fld_id='$id'";
echo $sql;
mysql_query( $sql);
}
?>