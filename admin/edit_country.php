<?php
include("includes/config.php");
//if($_POST['id'])
//{
//$id=mysql_escape_String($_POST['id']);
//$firstname=mysql_escape_String($_POST['countryname']);
//
//$sql = "update tbl_countries set fld_name='$firstname'  where fld_id='$id'";
////$sql = "update tbl_countries set name='$firstname'  where id='$id'";
//mysql_query($sql);
//}

if($_POST['country_id'])
{
$id= $_REQUEST['country_id'];
$country_name = $_REQUEST['countryname'];
$country_code = $_REQUEST['code'];
$sql = "update tbl_countries set fld_name='$country_name',fld_sortname='$country_code'  where fld_id='$id'";
$country_query =  mysql_query($sql);


//echo "update tbl_countries set fld_name='$country_name',fld_sortname='$country_code'  where fld_id='$id'";
}
?>