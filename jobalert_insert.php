<?php
session_start();
@include ("config.php");
@include('common.php');

$root_url  =  "http://".$_SERVER['HTTP_HOST'];
$root_url .= preg_replace('@/+$@', '', dirname($_SERVER['SCRIPT_NAME'])).'/';
$seekerid = $_REQUEST['seekerid'];                        
$skills = $_POST['skill'];
$locations = $_POST['locations'];
$industries = $_REQUEST['industry'];
$categories = $_REQUEST['category'];
$roles = $_POST['role'];
$experience = $_POST['experience'];
$salary = $_POST['salary'];
$alert = $_POST['alert'];
$email = $_POST['email'];
$date = date('y-m-d');
$status = 0;

$encoded_email =base64_encode($email);
$activation=md5($email.time());
        
        $jobalert_query = mysql_query("SELECT * FROM tbl_jobseeker WHERE fld_email='$email' and fld_js_status=1");
        $rows = mysql_fetch_assoc($jobalert_query);
        $name = $rows['fld_name'];  
               

//$alertquery = "INSERT INTO tbl_jobalert(job_seeker_id,fld_skill,fld_location,fld_experience,fld_salary,fld_industry,fld_category,fld_role,fld_alert,fld_email,fld_jobalert_date,fld_status_active) values ('$seekerid','$skills','$locations','$experience','$salary','$industries','$categories','$roles','$alert','$email','$date','$status')";
        $alertquery = "INSERT INTO tbl_jobalert(job_seeker_id,fld_skill,fld_location,fld_experience,fld_salary,fld_industry,fld_category,fld_role,fld_alert,fld_email,fld_activation_code,fld_jobalert_date,fld_status_active) values ('$seekerid','$skills','$locations','$experience','$salary','$industries','$categories','$roles','$alert','$email','$activation','$date','$status')";
$alertresult = mysql_query($alertquery);
                $activation = base64_encode($activation);
		        $to = md5($email.time());
                if($_SERVER['HTTP_HOST'] == "localhost")
                {
                   $link = "http://localhost/staffingspot/index.php?username=$to&activation=$activation";
                }
                elseif($_SERVER['HTTP_HOST'] == "172.31.1.53")
                {
                    $link = "http://172.31.1.53/staffingspot/index.php?username=$to&activation=$activation";
                }
                elseif($_SERVER['HTTP_HOST'] == "172.31.1.48")
                {
                    $link = "http://172.31.1.48/staffingspot/index.php?username=$to&activation=$activation";
                }
                   elseif($_SERVER['HTTP_HOST'] == "172.31.1.55")
                {
                    $link = "http://172.31.1.55/staffingspot/index.php?username=$to&activation=$activation";
                }
                   elseif($_SERVER['HTTP_HOST'] == "172.31.1.54")
                {
                    $link = "http://172.31.1.54/staffingspot/index.php?username=$to&activation=$activation";
                }                         
                elseif($_SERVER['HTTP_HOST'] == "http://dev.staffingspot.com/")
                {
                   $link = "http://dev.staffingspot.com/index.php?username=$to&activation=$activation";
                }

                elseif($_SERVER['HTTP_HOST'] == "dev.vinformaxsystems.in")
                {
                   $link = "http://dev.vinformaxsystems.in/staffingspot/index.php?username=$to&activation=$activation";
                }
                elseif($_SERVER['HTTP_HOST'] == "test.vinformaxsystems.in")
                {
                   $link = "http://test.vinformaxsystems.in/staffingspot/index.php?username=$to&activation=$activation";
                }               
                 
                $query = mysql_query("select * from  tbl_email_content where `fld_processfor`='job_alert'");
                $query_details = mysql_fetch_array($query);
                
                $logo = 'images/logo.png';
        
        
                $content = jobalert_mail($query_details['fld_content'], $logo, $query_details['fld_footer'] , $query_details['fld_header'],  $name, $email, $link);


        
                        
?>
           
