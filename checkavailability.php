<?php
@include("config.php");	
@include('common.php');
$email = mysql_real_escape_string(strtolower($_POST["email"]));

$sql = "SELECT fld_email FROM tbl_jobseeker WHERE LOWER(fld_email) = '" . $email . "'";
$result = mysql_query($sql) or die("Could not get email: " . mysql_error());

if(mysql_num_rows($result) > 0) 
{
    echo 0;
}
else 
{
    echo 1;
}
?>