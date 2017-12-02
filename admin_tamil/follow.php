<?php
error_reporting(0);
session_start();
include("includes/config.php");
//$username = $_SESSION["user_name"];
//$user_email = $_SESSION['user_email']; 
//$user_id = $_SESSION['user_id'];

$oper = $_REQUEST['op'];

//echo 'gyg'.$_REQUEST['id'];



if ($oper == 'statusemployer') {
    echo 'dfdf' . $_REQUEST['id'];
    $status = $_REQUEST['status'];
    if (isset($_REQUEST['id'])) {
        
        $updjobdescid1 = $_REQUEST['id'];
        echo sdfd . $updjobdescid1;
        //            $employer = $_POST['skill'];
        //            $position = $_POST['percentage'];
        
        //$educationalqry = "INSERT INTO tbl_educationals_details(fld_educational,fld_course,fld_college,fld_from,fld_to,fld_cgpa,fld_seekerid)VALUES('".$educational."','".$course."','".$college."','".$from."','".$To."','".$cgpa."','".$user_id."')";
        //$addededucationalqry = mysql_query($educationalqry);
        // var dataString = '&employer='+ employer + '&position='+ position + '&currentlyworking='+ currentlyworking + '&From='+ From + '&To='+ To +  '&updjobdetid='+ id;
        $sql = "UPDATE `tbl_employer` SET `fld_status`=$status  where fld_id='$updjobdescid1'";
        mysql_query($sql);
        echo $sql;
        
        
        if ($sql) {
            echo "ok";
        } else {
            echo "notnot11";
        }
    }
    
    //echo "INSERT INTO tbl_educationals_details(fld_educational,fld_course,fld_college,fld_from,fld_to,fld_cgpa)VALUES('".$educational."','".$course."','".$college."','".$from."','".$To."','".$cgpa."')";
}