<?php
@include ("config.php");
$packagename = $_POST['packagename'];
$sql="select fld_id from tbl_package_price where fld_pname='$packagename'";
                        $res=mysql_query($sql);
                        $rows=mysql_fetch_assoc($res);
$packageid = $rows['fld_id'];
$packageresume = $_POST['packageresume'];
$packagepost = $_POST['packagepost'];
$packageview = $_POST['packageview'];
$year = $_POST['year'];
$price = $_POST['price'];
$total = $_POST['total'];
$empid = $_REQUEST['sessionempid'];
if(($price>0) && ($year>0))
{
//$alertquery = "INSERT INTO tbl_jobalert(user_name,user_email,phone_number,subject,msg) VALUES ('$user_name','$user_email','$phone_number','$subject','$message')";
$alertquery = "insert into tbl_package_detail(fld_package_id,fld_emp_id,fld_no_of_views,fld_resume,fld_post,fld_year,fld_price,fld_total) values ('$packageid','$empid','$packageview','$packageresume','$packagepost','$year','$price','$total')";

	$alertresult = mysql_query($alertquery);
//echo $alertresult;
        echo "true";
}
else
    {
    echo "false";
    }
		
				
?>