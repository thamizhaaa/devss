<?php
include("includes/config.php");
if($_POST['id'])
{
$id=$_POST['id'];
$id = mysql_escape_String($id);
$sql = "delete from seeker_personal where id='$id'";
mysql_query( $sql);
}
?>