<?php
include("config.php");
if($_POST['id'])
{
$id=$_POST['id'];
echo $id;
$id = mysql_escape_String($id);

$sql = "UPDATE `tbl_job_experience` SET `fld_status`=2  where fld_id='$id'";
echo $sql;
mysql_query( $sql);
}
?>