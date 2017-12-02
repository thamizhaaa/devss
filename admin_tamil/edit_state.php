<?php
include("includes/config.php");
if($_POST['id'])
{
$id=mysql_escape_String($_POST['id']);
$firstname=mysql_escape_String($_POST['firstname']);

$sql = "update tbl_states set fld_name='$firstname'  where fld_id='$id'";
mysql_query($sql);
}
?>