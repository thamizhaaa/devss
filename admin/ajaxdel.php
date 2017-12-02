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
        $query_price = "Update tbl_package_price SET fld_currency_type='$currency' where fld_id =$pck_id";
        $cati_price = mysql_query($query_price);
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

if ($oper == 'manage') {
    //echo "hai";
   
    $id = mysql_real_escape_string($_REQUEST['updateid']);
	$title = mysql_real_escape_string($_REQUEST['title']);	
	$area = $_REQUEST['area'];
	$role = mysql_real_escape_string($_REQUEST['role']);
	$exp = mysql_real_escape_string($_REQUEST['exp']);
	$expyr1 = mysql_real_escape_string($_REQUEST['expyr1']);
	$exp1 = mysql_real_escape_string($_REQUEST['exp1']);
	$expyr = mysql_real_escape_string($_REQUEST['expyr']);
	
	
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

        $start_date = mysql_real_escape_string($_REQUEST['start']);
        $timestamp = strtotime($start_date);
    $post_date = date('Y-m-d H:i:s', $timestamp);
    
    $expiry = mysql_real_escape_string($_REQUEST['exp_date']);
    $timestamp = strtotime($expiry);
    $expiry_date = date('Y-m-d', $timestamp);

	$sql=" UPDATE `tbl_postjob` SET `fld_jobtitle` = '$title', `fld_keyskills` = '$tags', `fld_description` = '$ckeditor', `fld_job_type` = '$jobtype', `fld_industry_type` = '$type', `fld_functional_area` = '$area',`fld_postdate` = '$post_date', `fld_expirydate` = '$expiry_date', `fld_role` = '$role', `fld_location` = '$city', `fld_salary` = '$sal', fld_experience = '$experience', fld_country='$country', fld_job_status = '$status' WHERE `fld_id` ='$id'";
            echo $sql;
	$catiqry1 = mysql_query($sql);
//        if ($catiqry1) {
//            echo 1;
//        } else {
//            echo 0;
//        }
        
        
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
        
//    }
    
    //echo "INSERT INTO tbl_educationals_details(fld_educational,fld_course,fld_college,fld_from,fld_to,fld_cgpa)VALUES('".$educational."','".$course."','".$college."','".$from."','".$To."','".$cgpa."')";
}

//$seekid = $_REQUEST['seekid'];

//echo 'gyg'.$_REQUEST['manageid'];

if ($oper == 'seeker') {
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
        
        
        $query = "SELECT * FROM tbl_jobseeker_details where fld_js_id =$seekid and fld_delstatus =0";
	$result = mysql_query($query)or die(mysql_error());
	$num_row = mysql_num_rows($result);
		$row=mysql_fetch_array($result);
		if($num_row >= 1) 	
    {
        
        
        $query_seeker = "Update tbl_jobseeker tj JOIN tbl_jobseeker_details tjd ON (tj.fld_id = tjd.fld_js_id) SET tj.fld_name='$seeker',tjd.fld_address='$address',tjd.fld_mobile='$mobile', tj.fld_email='$mail',tjd.fld_dob='$dob',tjd.fld_keyword='$tags',tjd.fld_aboutmyself='$aboutmyself',tjd.fld_city='$city',tjd.fld_experience_year='$year',tjd.fld_experience_month='$month',tj.fld_js_status='$status' where tj.fld_id ='$seekid' AND (tj.`fld_js_status`=1 OR tj.`fld_js_status`=0) AND tj.fld_delstatus!=2 AND tjd.fld_delstatus!=2" ;
        $cati_seeker = mysql_query($query_seeker);
        } else {
        $queryprf11 = "UPDATE `tbl_jobseeker` SET `fld_name`='$seeker',`fld_email`='$mail',`fld_js_status`='$status' WHERE `fld_id`='$seekid'";
        $catiqry11 = mysql_query($queryprf11);	
        $queryprf = "insert into tbl_jobseeker_details (fld_js_id,fld_dob,fld_mobile,fld_keyword,fld_address,fld_aboutmyself,fld_city,fld_experience_year,fld_experience_month) values ('$seekid','$dob','$mobile','$tags','$address','$aboutmyself','$city','$year','$month')";
	$catiqry1 = mysql_query($queryprf);	
        
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
     //$_REQUEST['country_id'];
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

$sql = "update tbl_currency_type set fld_currency_name='$firstname'  where fld_id='$id'";
//$sql = "update tbl_countries set name='$firstname'  where id='$id'";
mysql_query($sql);
}
}

if($oper == 'editstate')
	{ 
    
    $state_name = explode(",", $_REQUEST['country_id']);
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
                
                
                
if($oper =='editlink')
{

    
	$reguesteduid = $_REQUEST['getids'];
	$fetchedudetailsqry = "select * from tbl_countries where fld_id=$reguesteduid";
	$fetchedudetailsqrysql = mysql_query($fetchedudetailsqry);	
	$row=mysql_fetch_array($fetchedudetailsqrysql);	
		$id = $row['fld_id'];
		$name = $row['fld_name'];
		$description = $row['fld_sortname'];
                
                
             
	    echo '<div class="modal-dialog modal-md" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                        <h4 class="modal-title" id="myModalLabel">Edit/Update Country Details</h4>
                    </div>
                    <div class="modal-body">     
                        <form role="form" class="form-horizontal" autocomplete="off">
                       	
                        <div class="col-md-12 col-sm-12 col-xs-12">
                            <div class="form-group">
                               <label class="col-sm-6">Country Name  <span class="required"></span></label>
                                <div class="col-sm-6">
                               <input id="countryname" placeholder="Enter The country name" class="form-control" type="text" value="'.$name.'">
                                   <span class="err_txt help-block" id="err3" style="display:none;">This field is required</span> 
                                </div>
                            </div>
                        </div>

                        <div class="col-md-12 col-sm-12 col-xs-12">
                            <div class="form-group">
                               <label class="col-sm-6">Short Code<span class="required"></span></label>
                                <div class="col-sm-6">
                               <input id="code" placeholder="Enter The country code" class="form-control" type="text" value="'.$description.'">
                                   <span class="err_txt help-block" id="err4" style="display:none;">This field is required</span> 
                                </div>
                            </div>
                            </div>
                            

                                                  
                    </form>
                    </div>
            <div class="modal-footer">
            <input id="edit_country_val" type="button" class="btn btn-success" value ="Save" > 
            </div>                    
                </div>
				</div>';
}

?>
                                                        


<script>
    
       $(document).ready(function() {
        setTimeout('$(".err_txt").fadeOut()',500);
      });
</script>
                                                    
                                                    
<script>
   $('#edit_country_val').click(function(){  
    
    var country = $("#countryname").val();
                       if(country == "" ){
                           $('#err3').show();
                           $('#err3').fadeOut(3000);
                }
    
   var code = $("#code").val();
                       if(code == "" ){
                           $('#err4').show();
                           $('#err4').fadeOut(3000);
                }
    
    
    if(country != '' && code !='' ){ 
    
    
//function fn_country(id)
//{
//alert(id);
var countryname = $("#countryname").val();
var code = $("#code").val();
var id = '<?php echo $reguesteduid; ?> '; 

// var ckeditor_description = CKEDITOR.instances['description'].getData();
//var description = $(ckeditor_description).text();
var dataString = '&countryname='+ countryname + '&code='+ code+'&country_id='+id;
//alert(dataString);

$.ajax({
type: "POST",
url: "edit_country.php",
data: dataString,
cache: false,
success: function(result){
    var result1=$.trim(result);
    
       
    alert("Updated Successfully");

    location.reload();
   //alert(result);

}
});

return false;


//}
    }
    });
    

</script>
