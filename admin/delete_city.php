<?php
include("includes/config.php");
if($_POST['id'])
{
$id=$_POST['id'];
$id = mysql_escape_String($id);
$fristna=$_REQUEST['firstname'];

 $sql = mysql_query("select ed.fld_city from tbl_employer e JOIN tbl_postjob pj ON pj.fld_empid=e.fld_id JOIN tbl_employer_details ed ON ed.fld_empid = pj.fld_empid WHERE ed.fld_city= '$fristna'");
   $check = mysql_num_rows($sql);
 // echo "select DISTINCT(pj.fld_industry_type) from tbl_employer e JOIN tbl_postjob pj ON pj.fld_empid=e.fld_id JOIN tbl_employer_details ed ON ed.fld_empid = pj.fld_empid WHERE ed.fld_indusType= '$fristna' AND pj.fld_industry_type='$fristna'";
  
if($check==0)
    {
$sql = "UPDATE `tbl_cities` SET `fld_status`=2  where fld_id='$id'";
mysql_query( $sql);
echo "1";
}
     else {
            echo "notnot11";
        }
}

?>