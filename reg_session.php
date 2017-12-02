<?php
ob_start();
include('includes/config.php');
session_start();
$user_check=$_SESSION['login_seek'];
 
 if($user_check != "") {
 
$ses_sql=mysql_query("SELECT * FROM seeker_personal WHERE loginid='$user_check'");
 
$row=mysql_fetch_array($ses_sql);
 
$login_session=$row['loginid'];
$session_email=$row['loginid'];
$session_id = $row['id'];
$session_seekid = $row['seekerid'];
$session_fname = $row['fname'];
$session_lname = $row['lname'];
$session_emailid=$row['mailid'];
$session_loginid=$row['loginid'];
$session_pass = $row['pass'];
$session_dob = $row['dob'];
$session_gender = $row['gender'];
$session_state = $row['state'];
$session_country = $row['country'];
$session_zipcode = $row['zipcode'];
$session_mobile = $row['mobile'];
$session_residenceno = $row['residenceno'];
$session_address = $row['address'];
$session_address1 = $row['address1'];

$form1_id = mysql_query("SELECT * FROM seeker_profess WHERE seekerid = '$session_seekid'");
   
    $form1_row = mysql_fetch_array($form1_id);      
	$session_aoi = $form1_row['areaofinterest'];
	$session_skills = $form1_row['keyskills'];
	$session_jobtype = $form1_row['jobtype'];
	$session_salary = $form1_row['esalary'];
	$session_experience = $form1_row['experience'];
	$session_resumetitle = $form1_row['resumetitle'];
}

function matchedJobCount($session_aoi,$session_skills){
	
	$joined_skills = $session_aoi.','.$session_skills ;
	
	$match_query =  mysql_query("SELECT * FROM postjob WHERE keyskills LIKE '%".$joined_skills."%'");
	echo $matched_count = mysql_num_rows($match_query);
	
}

function suggestJobCount($session_aoi,$session_skills){
	
	$joined_skills = $session_aoi.','.$session_skills ;
	
	$match_query =  mysql_query("SELECT * FROM postjob WHERE keyskills NOT LIKE '%".$joined_skills."%'");
	echo $matched_count = mysql_num_rows($match_query);
	
}

 
if(!isset($login_session))
{	
header("Location: index.php",false);
ob_end_flush();
}

?>
