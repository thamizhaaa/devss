<?php
error_reporting(E_ALL ^ E_NOTICE);
error_reporting(E_ERROR);
include("includes/config.php");

$oper = $_REQUEST['op'];
if($_POST['id'])
{
$id=$_POST['id'];
$id = mysql_escape_String($id);
$sql = "UPDATE `master_category` SET `fld_status`=2  where id='$id'";
mysql_query( $sql);
}

if($oper =='statusemployer')
{
$id=$_REQUEST['id'];
$id = mysql_escape_String($id);
$sql = "UPDATE `tbl_aboutus` SET `fld_delstatus`=2  where fld_id='$id'";
mysql_query( $sql);
//header('Location: about_us.php');
}

if($oper =='activeimagelist')
{

$id=$_REQUEST['id'];
$sql = "UPDATE `tbl_aboutus` SET `fld_status`=0, fld_modified_date = CURRENT_TIMESTAMP where fld_status=1";
$query = mysql_query($sql);
$sql1 = "UPDATE `tbl_aboutus` SET `fld_status`=1, fld_modified_date = CURRENT_TIMESTAMP where fld_status=0 and fld_id ='$id'";
$query = mysql_query($sql1);  

}

if($oper=='bannerdel')
{

$bannerid=$_REQUEST['id'];
$sql = "UPDATE tbl_slider SET fld_delstatus=2 where fld_id ='$bannerid'";
$query = mysql_query($sql);  

}

if($oper=='scheduled_banner')
{

$sbannerid=$_REQUEST['id'];
$sql = "UPDATE tbl_slider SET fld_delstatus=2 where fld_id ='$sbannerid'";
$query = mysql_query($sql);  

}

if($oper=='del_industype')
{
$id=$_REQUEST['id'];
$fristna=$_REQUEST['firstname'];
$id = mysql_escape_String($id);


   $sql = mysql_query("select DISTINCT(pj.fld_industry_type) from tbl_employer e JOIN tbl_postjob pj ON pj.fld_empid=e.fld_id JOIN tbl_employer_details ed ON ed.fld_empid = pj.fld_empid WHERE ed.fld_indusType= '$fristna' OR pj.fld_industry_type='$fristna'");
   $check = mysql_num_rows($sql);

if($check==0)
    {
$sql = "UPDATE `tbl_industry_type` SET `fld_delstatus`=2  where fld_id='$id'";
mysql_query( $sql);
echo "1";
}
 else {
            echo "notnot11";
        }
}
if($oper=='delete_social')
{
$id=$_REQUEST['id'];
$id = mysql_escape_String($id);
$sql = "UPDATE `tbl_social_type` SET `fld_delstatus`=2  where fld_social_id='$id'";
mysql_query( $sql);
}
?>  