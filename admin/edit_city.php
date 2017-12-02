<?php
include("includes/config.php");

//if($_POST['id'])
//{
//$id=mysql_escape_String($_POST['id']);
//$firstname=mysql_escape_String($_POST['firstname']);
//
//$sql = "update tbl_cities_old set fld_name='$firstname'  where fld_id='$id'";
//mysql_query($sql);
//}
if($_POST['city_id'])
{

    $id= $_REQUEST['city_id'];
    $state_id = $_REQUEST['state_id'];
    $city_name = $_REQUEST['cityname']; 
    
    $country_name = $_REQUEST['countryname']; 
//    echo $state_name;
//    exit;
  
    $sql = "update tbl_cities set fld_name='$city_name',fld_state_id = '$state_id' where fld_id = '$id'";
//    echo "update tbl_cities tcc join tbl_states ts on tcc.fld_state_id = ts.fld_id join tbl_countries tc on tc.fld_id= ts.fld_country_id set tcc.fld_name='$city_name',ts.fld_name = '$state_name',tc.fld_name = '$country_name' where tcc.fld_id = '$id'";
////    $sql = "update tbl_cities set fld_name='$city_name',fld_state_id = '$state_name' where fld_id='$id'";
    //echo "update tbl_cities set fld_name='$city_name',fld_state_id = '$state_id' where fld_id = '$id'";
    //echo 
    $city_query =  mysql_query($sql);

   
}
?>