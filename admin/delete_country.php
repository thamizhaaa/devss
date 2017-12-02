<?php
include("includes/config.php");
//if($_POST['id'])
//{
//$id=$_POST['id'];
//$id = mysql_escape_String($id);
////$sql = "UPDATE `tbl_countries` SET `fld_status`=2  where fld_id='$id'";
//$sql = "UPDATE `tbl_countries` SET `fld_status`=2  where fld_id='$id'";
//mysql_query( $sql);
//}
//
//



if($_POST['id'])
{
$id=$_POST['id'];
$id = mysql_escape_String($id);
$fristna=$_REQUEST['firstname'];



 $sql = mysql_query("select pj.fld_country,ed.fld_country from tbl_employer e JOIN tbl_postjob pj ON pj.fld_empid=e.fld_id JOIN tbl_employer_details ed ON ed.fld_empid = pj.fld_empid WHERE ed.fld_country= '$fristna' OR pj.fld_country='$fristna'");
   $check = mysql_num_rows($sql);
 // echo "select pj.fld_country,ed.fld_country from tbl_employer e JOIN tbl_postjob pj ON pj.fld_empid=e.fld_id JOIN tbl_employer_details ed ON ed.fld_empid = pj.fld_empid WHERE ed.fld_country= '$fristna' OR pj.fld_country='$fristna'";
  
if($check==0)
    {
//$sql = "UPDATE `tbl_countries` SET `fld_status`=2  where fld_id='$id'";
$sql = "UPDATE `tbl_countries` SET `fld_status`=2  where fld_id='$id'";
mysql_query( $sql);
echo "1";
}
     else {
            echo "notnot11";
        }
}
?>