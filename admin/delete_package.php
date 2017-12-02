<?php 
include "admin_session.php";
include("includes/config.php");
$i = $_REQUEST['id'];
//echo 'fdfd'.$i;
 $sql = mysql_query("SELECT pp.fld_pname FROM tbl_package_detail pd JOIN tbl_package_price pp ON pp.fld_id = pd.fld_package_id JOIN tbl_employer e ON e.fld_id= pd.fld_emp_id WHERE pp.fld_id=$i");
   $check = mysql_num_rows($sql);
 // echo "SELECT pp.fld_pname FROM tbl_package_detail pd JOIN tbl_package_price pp ON pp.fld_id = pd.fld_package_id JOIN tbl_employer e ON e.fld_id= pd.fld_emp_id WHERE pp.fld_id=$i";
 // echo $check;
if($check==0)
    {
$sql = "UPDATE `tbl_package_price` SET `fld_delstatus`=2  where fld_id='".$i."'";
mysql_query( $sql);
//echo $sql;
echo "1";
}
 else {
            echo "notnot11";
        }

 
		
            

	?>

