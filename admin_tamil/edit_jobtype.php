<?php
include("includes/config.php");
if($_POST['id'])
{
$id=mysql_escape_String($_POST['id']);
$firstname=mysql_escape_String($_POST['firstname']);

$sql = "update master_jobtype set jobtype='$firstname'  ,modified_date = NOW() where id='$id'";
mysql_query($sql);
}
?>