<?php
session_start();
include('includes/config.php');
$user_check=$_SESSION['login_admin'];
 
 if($user_check != "") {
 
$ses_sql=mysql_query("SELECT fld_id,fld_email,fld_loginid FROM tbl_admin WHERE fld_loginid='$user_check'");
 
$row=mysql_fetch_array($ses_sql);
 
$login_session=$row['fld_loginid'];
$session_email=$row['fld_email'];
$session_id = $row['fld_id'];


}

 
if(!isset($login_session))
{
header("Location: index.php");
}
?>
