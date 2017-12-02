<?php
error_reporting(E_ALL ^ E_NOTICE);
error_reporting(0);
session_start();
@include ("config.php");
@include ("common.php");
@include("user_sessioncheck.php");

$username = $_SESSION["user_name"];
$user_email = $_SESSION['user_email']; 

//echo "aaaa".$profuserid = $_REQUEST['useridds'];
$name=mysql_real_escape_string($_REQUEST['name']);
$dob=mysql_real_escape_string($_REQUEST['dob']);
$email=mysql_real_escape_string($_REQUEST['email']);
$phone=mysql_real_escape_string($_REQUEST['phone']);
$city=mysql_real_escape_string($_REQUEST['city']);
$year=mysql_real_escape_string($_REQUEST['year']);
$month=mysql_real_escape_string($_REQUEST['month']);
$tags=strtolower($_REQUEST['tags']);
$address=mysql_real_escape_string($_REQUEST['address']);
$aboutmyself=mysql_real_escape_string($_REQUEST['aboutmyself']);
//echo $tags;
$query = "SELECT * FROM tbl_jobseeker_details where fld_js_id =$user_id and fld_delstatus =0";
	$result = mysql_query($query)or die(mysql_error());
	$num_row = mysql_num_rows($result);
		$row=mysql_fetch_array($result);
		if($num_row >= 1) 	
{
$queryprf = "Update tbl_jobseeker_details SET fld_dob='$dob',fld_mobile=$phone,fld_keyword='$tags',fld_address='$address',fld_aboutmyself='$aboutmyself',fld_city='$city',fld_experience_year='$year',fld_experience_month='$month' where fld_js_id =$user_id";
$query_name = "UPDATE `tbl_jobseeker` SET `fld_name`='$name' WHERE fld_id =$user_id AND `fld_js_status`=1 AND `fld_delstatus`=0";
$catiqry1 = mysql_query($queryprf);										
$catiqry_name = mysql_query($query_name);	
}
else
{
	$queryprf = "insert into tbl_jobseeker_details (fld_js_id,fld_dob,fld_mobile,fld_keyword,fld_address,fld_aboutmyself,fld_city,fld_experience_year,fld_experience_month) values ('$user_id','$dob','$phone','$tags','$address','$aboutmyself','$city','$year','$month')";
	$catiqry1 = mysql_query($queryprf);										
}
?>