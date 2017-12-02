<?php
error_reporting(0);
session_start();
include("config.php");
$user_id = $_SESSION['user_id'];
$oper = $_REQUEST['op'];
$follow = $_REQUEST['flwid'];
$test = $_REQUEST['test'];
$flwid=$_REQUEST['flwid'];

if ($oper == 'follow') {
if (isset($_REQUEST['flwid'])) {
$followid = $_REQUEST['flwid'];
//$sql ="UPDATE tbl_jobseeker SET fld_followers = IF(fld_followers IS NULL, '$followid', CONCAT(fld_followers, ',', '$followid')) WHERE fld_id = $user_id;";
$sql="UPDATE tbl_jobseeker SET fld_followers = IF(fld_followers IS NULL, '$followid', CONCAT(fld_followers, ',', '$followid')) WHERE fld_id = $user_id";

mysql_query($sql);
//echo "UPDATE tbl_jobseeker SET fld_followers = IF(fld_followers IS NULL, '$followid', CONCAT(fld_followers, ',', '$followid')) WHERE fld_id = $user_id";
if (isset($_REQUEST['flwid'])) {
$followid = $_REQUEST['flwid'];
$sql1 = "UPDATE tbl_employer_details SET fld_followers = IF(fld_followers IS NULL, $user_id, CONCAT(fld_followers, ',', $user_id)) WHERE fld_empid = '$followid';";
mysql_query($sql1);
//echo $sql1;
if ($sql1) {
echo "ok";
} else {
echo "notnot11";
}
}
}
}

if ($oper == 'unfollow') {
if (isset($_REQUEST['flwid'])) {
$followid = $_REQUEST['flwid'];
}
$sql1 = "UPDATE tbl_jobseeker SET `fld_followers` = TRIM(BOTH ',' FROM REPLACE(CONCAT(',', `fld_followers`, ','), ',$followid,', ',')) WHERE
FIND_IN_SET('$followid', `fld_followers`) and `fld_id`=$user_id";
$sql3 = "UPDATE tbl_employer_details SET `fld_followers` = TRIM(BOTH ',' FROM REPLACE(CONCAT(',', `fld_followers`, ','), ',$user_id,', ','))
WHERE FIND_IN_SET('$user_id', `fld_followers`) and `fld_empid`='$followid'";
mysql_query($sql3);
mysql_query($sql1);

if ($sql3) {
echo "ok";
} else {
echo "notnot11";
}
}
