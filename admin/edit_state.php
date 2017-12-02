<?php
include("includes/config.php");
//if($_POST['id'])
//{
//$id=mysql_escape_String($_POST['id']);
//$firstname=mysql_escape_String($_POST['firstname']);
//
//$sql = "update tbl_states set fld_name='$firstname'  where fld_id='$id'";
//mysql_query($sql);
//}
//



if($_POST['state_id'])
{
    $id= $_REQUEST['state_id'];
    $country_name = $_REQUEST['countryname'];
    $state_name = $_REQUEST['statename'];

    $sql = "update tbl_states set fld_name='$state_name',fld_country_id ='$country_name' where fld_id='$id'";
    echo "update tbl_states set fld_name='$state_name' where fld_id='$id'";
    $country_query =  mysql_query($sql);
    
}
?>