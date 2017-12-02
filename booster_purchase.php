<?php
session_start();
@include ("config.php");
@include ("common.php");


$empuser_id = $_SESSION['empuser_id'];
$date=date('Y-m-d H:i:s');
$oper = $_REQUEST['op'];
$type = $_REQUEST['customer_type'];

if($oper =='selecttype')
{
$sql = mysql_query("select fld_id,fld_customer_type,fld_view_price,fld_download_price,fld_postjob_price from tbl_booster where fld_id= '".$type."' and fld_status=1 and fld_delstatus!=2");


$price = mysql_num_rows($sql);  
$returnValue = mysql_fetch_array($sql);
echo json_encode(array("customerDetails" =>$returnValue));

}
if($oper =='addnewbooster')
{  
     $customer_type = $_REQUEST['customer_type'];
        $view = $_REQUEST['view'];
	$down = $_REQUEST['resume'];
	$post_job = $_REQUEST['postjob'];
	$query = "INSERT INTO tbl_booster_count(emp_id,booster_customer_id,resume_download_used,postjob_used,view_used,resume_download_added,postjob_added,view_added,booster_createdon)VALUES('" . $empuser_id . "','" . $customer_type . "','" . $down . "','" . $post_job . "','" . $view . "','" . $down . "','" . $post_job . "','" . $view . "','" . $date . "')";
	 $seek_query = mysql_query($query);
        
//echo $query;
unset($_REQUEST);
} 


?>