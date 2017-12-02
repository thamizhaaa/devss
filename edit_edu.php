<?php
include("config.php");

//if(isset($_POST['submit'])) {
    
    
    $educational = $_POST['educational1'];
    $course = $_POST['specalization1'];
    $college = $_POST['college1'];
    $from = $_POST['From1'];
    $To = $_POST['To1'];
    $cgpa = $_POST['cgpa1'];
    echo $educational;
    echo $course;
    echo $college;
    echo $from;
    echo $To;
    echo $cgpa;
    //exit;
     
       
      
        $seek_query = mysql_query("UPDATE `tbl_educationals_details` SET `fld_educational`='".$educational."',`fld_course`='".$course."',`fld_college`='".$college."',`fld_from`='".$from."',`fld_to`='".$To."',`fld_cgpa`='".$cgpa."' WHERE `fld_id`=1");
      
        echo "UPDATE `tbl_educationals_details` SET `fld_educational`='".$educational."',`fld_course`='".$course."',`fld_college`'".$college."',`fld_from'".$from."'`,`fld_to`'".$To."',`fld_cgpa'".$cgpa."' WHERE `fld_id`=4";
       // UPDATE `tbl_educationals_details` SET `fld_educational`='ECE',`fld_course`='BE',`fld_college`='KSR',`fld_from`='2017' WHERE `fld_id`=4
//}
//header("Location: http://localhost/staffingspotnew/user-resume-build.php"); /* Redirect browser */
//exit();
//}
    ?>    
