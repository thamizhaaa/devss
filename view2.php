<?php

error_reporting(0);
include ("config.php");


//if(isset($_POST['submit'])) {
    
    //echo "hi";
    $educational = $_POST['employee1'];
    $course = $_POST['position1'];
    
    $from = $_POST['from1'];
    $To = $_POST['to1'];
    $cgpa = $_POST['current1'];
//    echo $educational;
//    //echo $course;
//    echo $course;
//    echo $from;
//    echo $To;
//    echo $cgpa;
    //exit;
     
       
      
        $seek_query = mysql_query("INSERT INTO tbl_job_experience(fld_employee,fld_position,fld_from,fld_to,fld_current)VALUES('".$educational."','".$course."','".$from."','".$To."','".$cgpa."')");
        //echo "INSERT INTO tbl_job_experience(fld_employee,fld_position,fld_from,fld_to,fld_current)VALUES('".$educational."','".$course."','".$from."','".$To."','".$course."')";//exit;
//}
//header("Location: http://localhost/staffingspotnew/user-resume-build.php"); /* Redirect browser */
//exit();
?>