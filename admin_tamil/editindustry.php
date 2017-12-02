<?php
include("includes/config.php");
if($_POST['id'])
{
$id=mysql_escape_String($_POST['id']);
$firstname=mysql_escape_String($_POST['firstname']);

//$sql = "update tbl_industry_type set fld_industrytype='$firstname'  ,modified_date = NOW() where fld_id='$id'";
$sql = "update tbl_industry_type set fld_industrytype='$firstname' where fld_id='$id'";
mysql_query($sql);
}
?>