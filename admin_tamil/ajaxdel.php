<?php
error_reporting(0);
session_start();
include("includes/config.php");
//$username = $_SESSION["user_name"];
//$user_email = $_SESSION['user_email']; 
//$user_id = $_SESSION['user_id'];

$oper = $_REQUEST['op'];

//echo 'gyg'.$_REQUEST['id'];

//echo "hai";exit;

if ($oper == 'statusemployer') {
//    echo 'dfdf' . $_REQUEST['id'];
    $status = $_REQUEST['status'];
    if (isset($_REQUEST['id'])) {
        
        $updjobdescid1 = $_REQUEST['id'];
//        echo sdfd . $updjobdescid1;
        //            $employer = $_POST['skill'];
        //            $position = $_POST['percentage'];
        
        //$educationalqry = "INSERT INTO tbl_educationals_details(fld_educational,fld_course,fld_college,fld_from,fld_to,fld_cgpa,fld_seekerid)VALUES('".$educational."','".$course."','".$college."','".$from."','".$To."','".$cgpa."','".$user_id."')";
        //$addededucationalqry = mysql_query($educationalqry);
        // var dataString = '&employer='+ employer + '&position='+ position + '&currentlyworking='+ currentlyworking + '&From='+ From + '&To='+ To +  '&updjobdetid='+ id;
        $sql = "UPDATE `tbl_employer` SET `fld_emp_status`=$status  where fld_id='$updjobdescid1'";
        mysql_query($sql);
//        echo $sql;
        
        
        if ($sql) {
            echo "ok";
        } else {
            echo "notnot11";
        }
    }
    
    //echo "INSERT INTO tbl_educationals_details(fld_educational,fld_course,fld_college,fld_from,fld_to,fld_cgpa)VALUES('".$educational."','".$course."','".$college."','".$from."','".$To."','".$cgpa."')";
}


if ($oper == 'deleteemployer') {
//    echo 'demo' . $_REQUEST['id'];
    //$status=$_REQUEST['status'];
    if (isset($_REQUEST['id'])) {
        
        $updjobdescid1 = $_REQUEST['id'];
//        echo sdfd . $updjobdescid1;
        //            $employer = $_POST['skill'];
        //            $position = $_POST['percentage'];
        
        //$educationalqry = "INSERT INTO tbl_educationals_details(fld_educational,fld_course,fld_college,fld_from,fld_to,fld_cgpa,fld_seekerid)VALUES('".$educational."','".$course."','".$college."','".$from."','".$To."','".$cgpa."','".$user_id."')";
        //$addededucationalqry = mysql_query($educationalqry);
        // var dataString = '&employer='+ employer + '&position='+ position + '&currentlyworking='+ currentlyworking + '&From='+ From + '&To='+ To +  '&updjobdetid='+ id;
        $sql = "UPDATE `tbl_employer` SET `fld_delstatus`=2  where fld_id='$updjobdescid1'";
        mysql_query($sql);
//        echo $sql;
        
        
        if ($sql) {
            echo "ok";
        } else {
            echo "notnot11";
        }
    }
    
    //echo "INSERT INTO tbl_educationals_details(fld_educational,fld_course,fld_college,fld_from,fld_to,fld_cgpa)VALUES('".$educational."','".$course."','".$college."','".$from."','".$To."','".$cgpa."')";
}

if ($oper == 'statusjob') {
//    echo 'dfdf' . $_REQUEST['id'];
    $status = $_REQUEST['status'];
    if (isset($_REQUEST['id'])) {
        
        $updjobdescid1 = $_REQUEST['id'];
//        echo sdfd . $updjobdescid1;
        //            $employer = $_POST['skill'];
        //            $position = $_POST['percentage'];
        
        //$educationalqry = "INSERT INTO tbl_educationals_details(fld_educational,fld_course,fld_college,fld_from,fld_to,fld_cgpa,fld_seekerid)VALUES('".$educational."','".$course."','".$college."','".$from."','".$To."','".$cgpa."','".$user_id."')";
        //$addededucationalqry = mysql_query($educationalqry);
        // var dataString = '&employer='+ employer + '&position='+ position + '&currentlyworking='+ currentlyworking + '&From='+ From + '&To='+ To +  '&updjobdetid='+ id;
        $sql = "UPDATE `tbl_postjob` SET `fld_job_status`=$status  where fld_id='$updjobdescid1'";
        mysql_query($sql);
        
        
        if ($sql) {
            echo "ok";
        } else {
            echo "notnot11";
        }
    }
    
    //echo "INSERT INTO tbl_educationals_details(fld_educational,fld_course,fld_college,fld_from,fld_to,fld_cgpa)VALUES('".$educational."','".$course."','".$college."','".$from."','".$To."','".$cgpa."')";
}


if ($oper == 'deletejob') {
//    echo 'demo' . $_REQUEST['id'];
    //$status=$_REQUEST['status'];
    if (isset($_REQUEST['id'])) {
        
        $updjobdescid1 = $_REQUEST['id'];
//        echo sdfd . $updjobdescid1;
        //            $employer = $_POST['skill'];
        //            $position = $_POST['percentage'];
        
        //$educationalqry = "INSERT INTO tbl_educationals_details(fld_educational,fld_course,fld_college,fld_from,fld_to,fld_cgpa,fld_seekerid)VALUES('".$educational."','".$course."','".$college."','".$from."','".$To."','".$cgpa."','".$user_id."')";
        //$addededucationalqry = mysql_query($educationalqry);
        // var dataString = '&employer='+ employer + '&position='+ position + '&currentlyworking='+ currentlyworking + '&From='+ From + '&To='+ To +  '&updjobdetid='+ id;
        $sql = "UPDATE `tbl_postjob` SET `fld_delstatus`=2  where fld_id='$updjobdescid1'";
        mysql_query($sql);
//        echo $sql;
        
        
        if ($sql) {
            echo "ok";
        } else {
            echo "notnot11";
        }
    }
    
    //echo "INSERT INTO tbl_educationals_details(fld_educational,fld_course,fld_college,fld_from,fld_to,fld_cgpa)VALUES('".$educational."','".$course."','".$college."','".$from."','".$To."','".$cgpa."')";
}


if ($oper == 'statusseeker') {
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
        $sql = "UPDATE `tbl_jobseeker` SET `fld_js_status`=$status  where fld_id='$updjobdescid1'";
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


if ($oper == 'deleteseeker') {
//    echo 'demo' . $_REQUEST['id'];
    //$status=$_REQUEST['status'];
    if (isset($_REQUEST['id'])) {
        
        $updjobdescid1 = $_REQUEST['id'];
//        echo sdfd . $updjobdescid1;
        //            $employer = $_POST['skill'];
        //            $position = $_POST['percentage'];
        
        //$educationalqry = "INSERT INTO tbl_educationals_details(fld_educational,fld_course,fld_college,fld_from,fld_to,fld_cgpa,fld_seekerid)VALUES('".$educational."','".$course."','".$college."','".$from."','".$To."','".$cgpa."','".$user_id."')";
        //$addededucationalqry = mysql_query($educationalqry);
        // var dataString = '&employer='+ employer + '&position='+ position + '&currentlyworking='+ currentlyworking + '&From='+ From + '&To='+ To +  '&updjobdetid='+ id;
        $sql = "UPDATE `tbl_jobseeker` SET `fld_delstatus`=2  where fld_id='$updjobdescid1'";
        $sql1 = "UPDATE `tbl_jobseeker_details` SET `fld_delstatus`=2  where fld_js_id='$updjobdescid1'";
        mysql_query($sql);
        mysql_query($sql1);
//        echo $sql;
        
        
        if ($sql && $sql1) {
            echo "ok";
        } else {
            echo "notnot11";
        }
    }
    
    //echo "INSERT INTO tbl_educationals_details(fld_educational,fld_course,fld_college,fld_from,fld_to,fld_cgpa)VALUES('".$educational."','".$course."','".$college."','".$from."','".$To."','".$cgpa."')";
}


$viewempid = $_REQUEST['empid'];

//echo 'gyg'.$_REQUEST['empid'];

if ($oper == 'emp') {
    //echo "hai";
    if (isset($_REQUEST['id'])) {
        $id = $_REQUEST['id'];
        $empid = $_REQUEST['empid'];
        $employee     = $_REQUEST['employee'];
        $address      = $_POST['address'];
        $mail         = $_POST['mail'];
        $mobile       = $_POST['mobile'];
        $industry     = $_POST['industry'];
        $about        = $_POST['about'];  
        $empnum       = $_POST['empnum'];
        $country = $_REQUEST['country'];
        $state = $_REQUEST['state'];
        $city = $_REQUEST['city'];
        $employer_id = $_REQUEST['employee_id'];
        $emp_status = $_REQUEST['emp_status'];
       
        $year = $_POST['year'];
        $price = $_POST['price'];
        $total = $_POST['total'];
        $currency = $_POST['currency_type'];
        $pck_id = $_POST['pck_id'];
        
        
        $query_emp_details = mysql_query("Update tbl_employer_details SET "
                . "fld_employer_name='$employee',fld_address='$address',fld_indusType='$industry',fld_company_desc='$about',fld_worker='$empnum',fld_city='$city',fld_country='$country',fld_state='$state' where fld_id=$id");
               
//        echo "Update tbl_employer_details SET fld_employer_name='$employee',fld_address='$address',fld_indusType='$industry',fld_company_desc='$about',fld_worker='$empnum',fld_city='$city',fld_country='$country',fld_state='$state' where fld_id =$id";
//        $cati_emp_details = mysql_query($query_emp_details);
        
        
        //tbl_package_price tpp join tbl_package_detail pd on tpp.fld_id=pd.fld_package_id
        $packagequery = "Update tbl_package_detail SET fld_package_id='$pck_id',fld_year='$year',fld_price='$price',fld_total='$total' where fld_emp_id =$empid";
//        echo "Update tbl_package_detail SET fld_package_id='$pck_id', fld_year='$year',fld_price='$price',fld_total='$total' where fld_emp_id =$empid";
//         
        $package_detail = mysql_query($packagequery);
//        
//        
//        
        $query_emp = "Update tbl_employer SET fld_email='$mail',fld_mobile='$mobile',fld_emp_status='$emp_status' where fld_id =$empid";
        $cati_emp = mysql_query($query_emp);
       
//        if ($cati_emp_details && $cati_emp) {
//        if ( $packagequery) {
//            echo "ok";
//        } else {
//            echo "notnot11";
//        }
    //}
    
    //echo "INSERT INTO tbl_educationals_details(fld_educational,fld_course,fld_college,fld_from,fld_to,fld_cgpa)VALUES('".$educational."','".$course."','".$college."','".$from."','".$To."','".$cgpa."')";
}else{ ?>
    <script>
        alert('Failed to Update');
        </script>
        <?php
}

}




$viewempid = $_REQUEST['manageid'];

//echo 'gyg'.$_REQUEST['manageid'];

if ($oper == manage) {
    //echo "hai";
   
    $id = mysql_real_escape_string($_REQUEST['updateid']);
	$title = mysql_real_escape_string($_REQUEST['title']);	
	$area = $_REQUEST['area'];
	$role = mysql_real_escape_string($_REQUEST['role']);
	$exp = mysql_real_escape_string($_REQUEST['exp']);
	$expyr1 = mysql_real_escape_string($_REQUEST['expyr1']);
	$exp1 = mysql_real_escape_string($_REQUEST['exp1']);
	$expyr = mysql_real_escape_string($_REQUEST['expyr']);
	$start_date = mysql_real_escape_string($_REQUEST['start']);
    $expiry_date = mysql_real_escape_string($_REQUEST['exp_date']);
	$jobtype = mysql_real_escape_string($_REQUEST['jobtype']);

	$tags = mysql_real_escape_string($_REQUEST['tags']);

	$ckeditor = mysql_real_escape_string($_REQUEST['ckeditordesc']);


	//$ckeditor = mysql_real_escape_string($_REQUEST['ckeditor']);
	//$ckeditor =  $_REQUEST['ckeditor'];

//	$city=implode(',',$_REQUEST['city']);
	$city=implode(',',$_REQUEST['city']);
	$country=$_REQUEST['country'];
	$status=$_REQUEST['status'];
	$state=implode(',',$_REQUEST['state']);
	$type=mysql_real_escape_string($_REQUEST['type']);
	$area=mysql_real_escape_string($_REQUEST['area']);
	$experience=$exp.','.$exp1;
	$sal=$expyr.';'.$expyr1;

	$sql=" UPDATE `tbl_postjob` SET `fld_jobtitle` = '$title', `fld_keyskills` = '$tags', `fld_description` = '$ckeditor', `fld_job_type` = '$jobtype', `fld_industry_type` = '$type', `fld_functional_area` = '$area',`fld_postdate` = '$start_date', `fld_expirydate` = '$expiry_date', `fld_role` = '$role', `fld_location` = '$city', `fld_salary` = '$sal', fld_experience = '$experience', fld_country='$country', fld_job_status = '$state' WHERE `fld_id` ='$id'";
//       echo $sql;
	$catiqry1 = mysql_query($sql);
//    if (isset($_REQUEST['manageid'])) {
//        $updjobdescid = $_REQUEST['manageid'];
//        $employee     = $_REQUEST['employee'];
//        $contact      = $_REQUEST['contact'];
//        $person       = $_REQUEST['person'];
//        //$mobile = $_REQUEST['mobile'];
//        $industry     = $_REQUEST['industry'];
//        $address      = $_REQUEST['address'];
//        $date         = $_REQUEST['date'];
//        $job         = $_REQUEST['job'];
//        
//        
//        //$educationalqry = "INSERT INTO tbl_educationals_details(fld_educational,fld_course,fld_college,fld_from,fld_to,fld_cgpa,fld_seekerid)VALUES('".$educational."','".$course."','".$college."','".$from."','".$To."','".$cgpa."','".$user_id."')";
//        //$addededucationalqry = mysql_query($educationalqry);
//        // var dataString = '&employer='+ employer + '&position='+ position + '&currentlyworking='+ currentlyworking + '&From='+ From + '&To='+ To +  '&updjobdetid='+ id;
////        $query_job = "Update tbl_postjob SET fld_address='$address',fld_contact_persion='$person',fld_phone1='$contact',fld_industry_type='$industry', fld_postdate='$date',fld_jobtitle='$job' where fld_id =$updjobdescid";
//        $query_job = "Update tbl_postjob tpj JOIN tbl_employer_details ted ON (tpj.fld_empid = ted.fld_empid) SET ted.fld_employer_name='$employee',tpj.fld_address='$address',tpj.fld_contact_persion='$person',tpj.fld_phone1='$contact',tpj.fld_industry_type='$industry', tpj.fld_postdate='$date',tpj.fld_jobtitle='$job' where tpj.fld_id =$updjobdescid";
//        //echo "Update postjob SET fld_employer_name='$employee',fld_address='$address',fld_contact_persion='$person',fld_phone1='$contact',fld_industry_type='$industry', fld_postdate='$date' where fld_id =$updjobdescid";
//        $cati_job = mysql_query($query_job);
//        
//        
        if ($catiqry1) {
            echo 1;
        } else {
            echo 0;
        }
//    }
    
    //echo "INSERT INTO tbl_educationals_details(fld_educational,fld_course,fld_college,fld_from,fld_to,fld_cgpa)VALUES('".$educational."','".$course."','".$college."','".$from."','".$To."','".$cgpa."')";
}

//$seekid = $_REQUEST['seekid'];

//echo 'gyg'.$_REQUEST['manageid'];

if ($oper == seeker) {
    //echo "hai";
    if (isset($_REQUEST['seekid'])) {
        $seekid = $_REQUEST['seekid'];
        $seeker     = $_REQUEST['seeker'];
        $mobile      = $_REQUEST['mobile'];
        $address      = $_REQUEST['address'];
        $mail        = $_REQUEST['mail'];
        $status        = $_REQUEST['status'];
        $dob=mysql_real_escape_string($_REQUEST['dob']);
        $city=mysql_real_escape_string($_REQUEST['city']);
        $year=mysql_real_escape_string($_REQUEST['year']);
        $month=mysql_real_escape_string($_REQUEST['month']);
        $tags=strtolower($_REQUEST['tags']);
        $aboutmyself=mysql_real_escape_string($_REQUEST['aboutmyself']);
        
        $query_seeker = "Update tbl_jobseeker tj JOIN tbl_jobseeker_details tjd ON (tj.fld_id = tjd.fld_js_id) SET tj.fld_name='$seeker',tjd.fld_address='$address',tjd.fld_mobile='$mobile', tj.fld_email='$mail',tjd.fld_dob='$dob',tjd.fld_keyword='$tags',tjd.fld_aboutmyself='$aboutmyself',tjd.fld_city='$city',tjd.fld_experience_year='$year',tjd.fld_experience_month='$month',tj.fld_js_status='$status' where tj.fld_id =$seekid AND (tj.`fld_js_status`=1 OR tj.`fld_js_status`=0) AND tj.fld_delstatus!=2 AND tjd.fld_delstatus!=2" ;
//        echo $query_seeker;
//        echo "Update tbl_jobseeker tj JOIN tbl_jobseeker_details tjd ON (tj.fld_id = tjd.fld_js_id) SET tj.fld_name='$seeker',tjd.fld_address='$address',tjd.fld_mobile='$mobile', tj.fld_email='$mail',tjd.fld_dob='$dob',tjd.fld_keyword='$tags',tjd.fld_aboutmyself='$aboutmyself',tjd.fld_city='$city',tjd.fld_experience_year='$year',tjd.fld_experience_month='$month',tjd.fld_js_status='$status' where tj.fld_id =$seekid AND (tj.`fld_js_status`=1 OR tj.`fld_js_status`=0) AND tj.fld_delstatus!=2 AND tjd.fld_delstatus!=2";
        $cati_seeker = mysql_query($query_seeker);
        
        
        if ($cati_seeker) {
            echo "ok";
        } else {
            echo "notnot11";
        }
    }
    
    //echo "INSERT INTO tbl_educationals_details(fld_educational,fld_course,fld_college,fld_from,fld_to,fld_cgpa)VALUES('".$educational."','".$course."','".$college."','".$from."','".$To."','".$cgpa."')";
}
if($oper == 'resume')
{
  if(isset($_REQUEST['resume_id'])){
      $res_id = $_REQUEST['resume_id'];
      $title = $_REQUEST['title'];
      $descrip = $_REQUEST['desc'];
      $status = $_REQUEST['status'];
        // echo "update tbl_resume_tips SET fld_resume_title='$title',fld_resume_description='$descrip',fld_resume_status='$status' where fld_id=$res_id";

         $query = "update tbl_resume_tips SET fld_resume_title='$title',fld_resume_description='$descrip',fld_resume_status='$status' where fld_id=$res_id";
        // echo "update tbl_resume_tips SET fld_resume_title='$title',fld_resume_description='$descrip',fld_resume_status='$status' where fld_id=$res_id";
         $query_fetch = mysql_query($query);


  
  }  
    
    
}



if($oper == 'deleteresume')
{
    if(isset($_REQUEST['id'])){
    $res_id = $_REQUEST['id'];

        $sql = "UPDATE tbl_resume_tips SET `fld_delstatus`=2  where fld_id='$res_id'";
        mysql_query($sql);
        echo "UPDATE tbl_resume_tips SET `fld_delstatus`=2  where fld_id='$res_id'";
        
    }
    
    
    
}
if($oper == 'interview')
{
  if(isset($_REQUEST['interview_id'])){
      $res_id = $_REQUEST['interview_id'];
      $title = $_REQUEST['title'];
      $descrip = $_REQUEST['desc'];
      $status = $_REQUEST['status'];
        // echo "update tbl_resume_tips SET fld_resume_title='$title',fld_resume_description='$descrip',fld_resume_status='$status' where fld_id=$res_id";

         $query = "update tbl_interview_tips SET fld_interview_title='$title',fld_interview_description='$descrip',fld_interview_status='$status' where fld_id=$res_id";
         echo "update tbl_interview_tips SET fld_interview_title='$title',fld_interview_description='$descrip',fld_interview_status='$status' where fld_id=$res_id";
         $query_fetch = mysql_query($query);


  
  }  
    
    
}

if ($oper == 'deleteinterview') {
    if (isset($_REQUEST['id'])) {
        $updjobdescid1 = $_REQUEST['id'];
        $sql = "UPDATE `tbl_interview_tips` SET `fld_delstatus`=2  where fld_id='$updjobdescid1'";
        mysql_query($sql);
        if ($sql) {
            echo "ok";
        } else {
            echo "notnot11";
        }
    }
}


if($oper == 'addstate')
	{ 
    
    $country_id = explode(",", $_REQUEST['country_id']);
    ?>
        <option value=''>State Name</option>
        <?php
    foreach ($country_id as $country_id_list)
                {   
                    $subeducatqry = "SELECT Distinct fld_name FROM tbl_states where fld_country_id = ".$country_id_list." ";
                    $subeducatqry1 = mysql_query($subeducatqry);
                    while($row=mysql_fetch_array($subeducatqry1))
                    {
	
    
?>
                                
                                <option  value="<?php echo $row['fld_name'];?>" ><?php echo $row['fld_name'];?></option>
                                   
        
                            <?php  
                             } 
                             } 
                } 
                
                
  if ($oper == 'currency_del') {
    if($_POST['id'])
{
$id=$_POST['id'];
$id = mysql_escape_String($id);
$sql = "UPDATE `tbl_currency_type` SET `fld_currency_delstatus`=2  where fld_id='$id'";
mysql_query( $sql);
}
}              
 

if ($oper == 'currency_edit') {
   if($_POST['id'])
{
$id=mysql_escape_String($_POST['id']);
$firstname=mysql_escape_String($_POST['firstname']);

$sql = "update tbl_countries set fld_currency_name='$firstname'  where fld_id='$id'";
//$sql = "update tbl_countries set name='$firstname'  where id='$id'";
mysql_query($sql);
}
}

if($oper == 'addstate')
	{ 
    
    $state_name = explode(",", $_REQUEST['state_name']);
    foreach ($state_name as $state_name_list)
                {   
                    $subeducatqry = "SELECT Distinct fld_name FROM tbl_states where fld_country_id = ".$state_name_list." ";
                    $subeducatqry1 = mysql_query($subeducatqry);
                    while($row=mysql_fetch_array($subeducatqry1))
                    {
	
    
?>
                                
                                <option  value="<?php echo $row['fld_name'];?>" ><?php echo $row['fld_name'];?></option>
                                   
        
                            <?php  
                             } 
                             } 
                }
                
                if($oper == 'addcities')
	{ 
        $city_name = explode(",", $_REQUEST['city_name']);
        foreach ($city_name as $city_name_list)
                {   
                    $subeducatqry = "SELECT Distinct fld_name FROM tbl_cities where fld_state_id = ".$city_name_list." ";
                    $subeducatqry1 = mysql_query($subeducatqry);
                    while($row=mysql_fetch_array($subeducatqry1))
                    {
                ?>
                    <option  value="<?php echo $row['fld_name'];?>" ><?php echo $row['fld_name'];?></option><?php

                    } 
                    } 
                }