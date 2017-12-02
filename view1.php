<?php
error_reporting(0);
include ("config.php");    
    $educational = $_POST['educational1'];
    $course = $_POST['specalization1'];
    $college = $_POST['college1'];
    $from = $_POST['From1'];
    $To = $_POST['To1'];
    $cgpa = $_POST['cgpa1'];
    $seek_query = mysql_query("INSERT INTO tbl_educationals_details(fld_educational,fld_course,fld_college,fld_from,fld_to,fld_cgpa)VALUES('".$educational."','".$course."','".$college."','".$from."','".$To."','".$cgpa."')");
    //echo "INSERT INTO tbl_educationals_details(fld_educational,fld_course,fld_college,fld_from,fld_to,fld_cgpa)VALUES('".$educational."','".$course."','".$college."','".$from."','".$To."','".$cgpa."')";
