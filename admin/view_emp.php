<?php
error_reporting(0);
include "admin_session.php";
$oper = $_REQUEST['op'];
 ?>

<?php if($oper == 'emp_details'){ ?>
<div class="modal-header">
    <h4 class="modal-title">Employer Details</h4>
</div>
<?php 
$id = $_REQUEST['id'];

$query = mysql_query("select * from tbl_employer_details where (fld_delstatus='1'  OR fld_delstatus= '0') AND fld_id='".$id."'");
$array = mysql_fetch_array($query);
$state = $array['fld_state'];
$empid = $array['fld_id'];
$company = $array['fld_employer_name'];
//$mobile = $array['fld_phone'];
$register1 = date_create($array['fld_dor']);
$register = date_format($register1,"F j, Y");
$member = $array['fld_membership_type'];
$indusType = $array['fld_indusType'];
$city = $array['fld_city'];
$country = $array['fld_country'];
$no_of_emp = $array['fld_worker'];
$about = $array['fld_company_desc'];
$business_entity = $array['fld_company_type'];
$address = $array['fld_address'];


$query_emp = mysql_query("select * from tbl_employer where fld_delstatus='1'  OR fld_delstatus= '0' AND (fld_emp_status=1 or fld_emp_status=0) AND fld_id='".$id."'");
$array_emp = mysql_fetch_array($query_emp);
//print_r($array_emp);
$fname = $array_emp['fld_name'];
$email = $array_emp['fld_email'];
$mobile = $array_emp['fld_mobile'];
$status = $array_emp['fld_emp_status'];
$package_ed="SELECT * FROM tbl_package_price tpp join tbl_package_detail pd on tpp.fld_id=pd.fld_package_id where pd.fld_emp_id=$id";
                
//               echo "SELECT * FROM `tbl_package_price` tpp join tbl_package_detail pd on tpp.fld_id=pd.fld_package_id where pd.fld_emp_id=$viewempid";;
		$package_quer = mysql_query($package_ed);
		$package_count = mysql_num_rows($package_ed);
                $package_fet = mysql_fetch_array($package_quer);
                $package_year = $package_fet['fld_year'];
               $package_name = $package_fet['fld_pname'];
                $pprice = $package_fet['fld_price'];
                $package_id = $package_fet['fld_package_id'];
                 $ptotal = $package_fet['fld_total'];
              
?>
<dl class="dl-horizontal">
  <dt>Employer ID</dt><dd><?php echo 'EMP-'.$empid; ?></dd>
  <dt>Employer Name</dt><dd><?php echo $company; ?></dd>
  <dt>E-mail</dt><dd><?php echo $email; ?></dd>
  <dt>Address</dt><dd><p><?php echo $address; ?></p></dd>
  <dt>Contact Number</dt><dd><?php echo $mobile; ?></dd>
  <dt>No.of Employees</dt><dd><?php echo $no_of_emp; ?></dd>
  <dt>Industry Type</dt><dd><?php echo $indusType; ?></dd>  
  <dt>Country</dt><dd><?php echo $country; ?></dd>
  <dt>State</dt><dd><?php echo $state; ?></dd>
  <dt>City</dt><dd><?php echo $city; ?></dd> 
  <dt>Registered On</dt><dd><?php echo $register; ?></dd>
  <dt>Company Type</dt><dd><?php echo $business_entity; ?></dd> 
  <dt>Company Description</dt><dd><?php echo $about; ?></dd> 
  <dt>Status</dt><dd><?php echo (($status) ? 'Active' : 'Inactive'); ?></dd> 


<div class="modal-header">
    <h4 class="modal-title">Package Details</h4>
</div>
  <?php if($package_count > 0){ ?>
<dt>Package Name</dt><dd><?php echo $package_name; ?></dd> 
<dt>Package price</dt><dd><?php echo $pprice; ?></dd> 
<dt>Validity</dt><dd><?php echo $package_year; ?></dd> 
<dt>Package Total</dt><dd><?php echo $ptotal; ?></dd>
  <?php } else {  echo "<center><h3>No Data Available</h3></center>"; } ?>
</dl>
 <div class="modal-footer">
    <button type="button" class="btn btn-warning col-sm-3 pull-right" style="margin-left:10px;" data-dismiss="modal">OK</button>
</div>
<?php } 

if ($oper == 'job_details') { 

?>

<div class="modal-header">
    <h4 class="modal-title">Job Management Details</h4>
</div>
<?php 
$id = $_REQUEST['id']; 
$fetchedudetailsqry = "select tpj.fld_id,tpj.fld_jnumber,tpj.fld_jobtitle,tpj.fld_keyskills,tpj.fld_experience,tpj.fld_description,tpj.fld_job_type,tpj.fld_functional_area,tpj.fld_role,tpj.fld_location,tpj.fld_country,tpj.fld_state,tpj.fld_salary,tpj.fld_postdate,tpj.fld_expirydate,tpj.fld_address,tpj.fld_job_status,ted.fld_employer_name,ted.fld_indusType,ted.fld_delstatus from tbl_postjob tpj JOIN tbl_employer_details ted ON (tpj.fld_empid = ted.fld_empid) WHERE (tpj.fld_job_status =1 OR tpj.fld_job_status = 0) AND tpj.fld_id=$id";  
$fetchedudetailsqrysql = mysql_query($fetchedudetailsqry);	
$row=mysql_fetch_array($fetchedudetailsqrysql);	
$viewempid = $row['fld_id'];                
$title = $row['fld_jobtitle'];              
$employee = $row['fld_employer_name'];
$postdate = $row['fld_postdate'];
$expirydate = $row['fld_expirydate'];
$address = $row['fld_address'];
$skills = $row['fld_keyskills'];
$industry = $row['fld_indusType'];
$exp = $row['fld_experience'];
$description = $row['fld_description'];
$type = $row['fld_job_type'];
$function = $row['fld_functional_area'];
$role = $row['fld_role'];
$city = $row['fld_location'];
$country = $row['fld_country'];
$state = $row['fld_state'];
$salary = $row['fld_salary'];
$status = $row['fld_job_status'];
?>
<dl class="dl-horizontal">
  <dt>Employer Name</dt><dd><?php echo $employee; ?></dd>
  <dt>Job Title</dt><dd><?php echo $title; ?></dd>
  <dt>Country</dt><dd><?php echo $country; ?></dd>
  <dt>State</dt><dd><?php echo $state; ?></dd>
  <dt>City</dt><dd><?php echo $city; ?></dd>
  <dt>Industry Type</dt><dd><?php echo $industry; ?></dd>  
  <dt>Functional Area</dt><dd><?php echo $function; ?></dd>  
  <dt>Role</dt><dd><?php echo $role; ?></dd>  
  <dt>Job Type</dt><dd><?php echo $type; ?></dd>    
  <dt>Job Experience</dt><dd><?php 
  $experiencenew = explode(",", $exp);
$year = $experiencenew[0];
$month = $experiencenew[1];

if($year == "fresher" && $month == "NULL"){
                    echo "Fresher";
                    }
                    if($year > '1' && $year!='fresher') {
                    echo $year . " Years ";
                    } if($year == '1' && $year!='fresher') {
                    echo $year . " Year ";
                    }
                    if ($month > '1' && $month!='NULL') {
                    echo " " . $month . " Months ";;
                    } if($month == '1' && $month!='NULL') {
                    echo $month . " Month ";
                    }              
  ?></dd>    
  <dt>Salary</dt><dd><?php
$salarynew = explode(";", $salary);
$salaryl = $salarynew[0];
$salaryt = $salarynew[1];

if(($salaryl == "" || $salaryl == '0') && ($salaryt == "" || $salaryt == '0')){
echo "Disclosure";
}

if ($salaryl == "" || $salaryl == '0') {
echo "";
} if($salaryl > '1') {
echo $salaryl . " Lakhs ";
} if($salaryl == '1') {
echo $salaryl . " Lakh ";
}
if ($salaryt == "" || $salaryt == '0') {
echo " ";
} else if ($salaryt > '0') {
echo " " . $salaryt . " Thousand ";;
}
?></dd>  
  <dt>Post Date</dt><dd><?php echo $postdate; ?></dd>
  <dt>Expired Date</dt><dd><?php echo $expirydate; ?></dd>
  <dt>Key Skills</dt><dd><?php echo $skills; ?></dd>
  <dt>Job Description</dt><dd><?php echo $description; ?></dd>
  <dt>Status</dt><dd><?php echo (($status) ? 'Active' : 'Inactive'); ?></dd>
</dl>
 <div class="modal-footer">
    <button type="button" class="btn btn-warning col-sm-3 pull-right" style="margin-left:10px;" data-dismiss="modal">OK</button>
</div>




<?php } 

if ($oper == 'seeker_details') { ?>


<div class="modal-header">
    <h4 class="modal-title">Job Seeker Details</h4>
</div>
<?php 
$id = $_REQUEST['id'];

$seeker_detail = "Select fld_name, fld_email from tbl_jobseeker where fld_delstatus=0 and fld_id = $id and (fld_js_status=1 OR fld_js_status=0)";

                $seeker_detail1 = mysql_query($seeker_detail);
                while($rowss=mysql_fetch_array($seeker_detail1,MYSQL_ASSOC))
                {
                    $seekid = $rowss['fld_id'];
                    $name = $rowss['fld_name'];
                    $mail = $rowss['fld_email'];
                }
    $fetchedudetailsqry    = "select tj.fld_id,tj.fld_name,tj.fld_email,tj.fld_mobile,tjd.fld_profilepic,tjd.fld_address,tjd.fld_dob,tjd.fld_city,tjd.fld_experience_year,tjd.fld_experience_month,tjd.fld_aboutmyself,tjd.fld_keyword,tj.fld_js_status from tbl_jobseeker tj JOIN tbl_jobseeker_details tjd ON (tj.fld_id = tjd.fld_js_id) WHERE tj.fld_id=$id AND (tj.`fld_js_status`=1 OR tj.`fld_js_status`=0) AND tj.fld_delstatus=0 AND tjd.fld_delstatus=0";
    $fetchedudetailsqrysql = mysql_query($fetchedudetailsqry);
    $row                   = mysql_fetch_array($fetchedudetailsqrysql);
    $pic               = $row['fld_profilepic'];
    $dob    = $row['fld_dob'];
    $city   = $row['fld_city'];
    $address = $row['fld_address'];
    $contact = $row['fld_mobile'];
    $year = $row['fld_experience_year'];
    $month = $row['fld_experience_month'];
    $about = $row['fld_aboutmyself'];
    $skills = $row['fld_keyword'];
    $status = $row['fld_js_status'];
?>
<dl class="dl-horizontal"> 
   
  <!--<dt></dt><dd><img src="images/profilepic/<?php echo $pic; ?>" alt="" class="img-responsive center-block "></dd>-->
   <dt>Seeker Id</dt><dd><?php echo 'SEEKER-'.$seekid; ?></dd> 
  <dt>Seeker Name</dt><dd><?php echo $name; ?></dd>
  <dt>Email Id</dt><dd><?php echo $mail; ?></dd>
  <dt>Date Of Birth</dt><dd><?php echo $dob; ?></dd>
  <dt>Contact Number</dt><dd><?php echo $contact; ?></dd>
  <dt>City</dt><dd><?php echo $city; ?></dd>
  <dt>Experience</dt><dd><?php if($year == "fresher" && $month == "NULL"){
                    echo "Fresher";
                    }
                    if($year > '1' && $year!='fresher') {
                    echo $year . " Years ";
                    } if($year == '1' && $year!='fresher') {
                    echo $year . " Year ";
                    }
                    if ($month > '1' && $month!='NULL') {
                    echo " " . $month . " Months ";;
                    } if($month == '1' && $month!='NULL') {
                    echo $month . " Month ";
                    } ?></dd>
  <dt>Keywords</dt><dd><?php echo $skills; ?></dd>  
  <dt>Address</dt><dd><?php echo $address; ?></dd>
  <dt>About Yourself</dt><dd><?php echo $about; ?></dd>
  <dt>Status</dt><dd><?php echo (($status) ? 'Active' : 'Inactive'); ?></dd>
</dl>
 <div class="modal-footer">
    <button type="button" class="btn btn-warning col-sm-3 pull-right" style="margin-left:10px;" data-dismiss="modal">OK</button>
</div>


<?php } ?>

    
    <?php
if($oper == 'resume_details')
{
    ?>
<div class="modal-header">
    <h4 class="modal-title">Resume Tips Details</h4>
</div>
<?php
    
      $id = $_REQUEST['id'];
//      echo $id;
      $query = "select * from tbl_resume_tips where fld_id=$id";
//      echo "select * from tbl_resume_tips where fld_id=$id";
      $fetchquery = mysql_query($query);
      $array = mysql_fetch_array($fetchquery);
      $title = $array['fld_resume_title'];
      $desc = $array['fld_resume_description'];
      $status = $array['fld_resume_status'];
      
  
?>
<dl class="dl-horizontal">
 
  <dt>Resume Tips Title</dt><dd><?php echo $title; ?></dd>
  <dt>Resume Tips Description</dt><dd><?php echo $desc; ?></dd>
  <dt>Status</dt><dd><?php if ($status == 1) {
    ?>
   Active

    <?php
} else {
    ?> 
    InActive

    <?php
}
//echo $status;?></dd>

</dl>
 <div class="modal-footer">
    <button type="button" class="btn btn-warning col-sm-3 pull-right" style="margin-left:10px;" data-dismiss="modal">OK</button>
</div>
<?php } ?>

<?php
if($oper == 'interview_details')
{
    ?>
<div class="modal-header">
    <h4 class="modal-title">Interview Tips Details</h4>
</div>
<?php
    
      $id = $_REQUEST['id'];
//      echo $id;
      $query = "select * from tbl_interview_tips where fld_id=$id";
//      echo "select * from tbl_resume_tips where fld_id=$id";
      $fetchquery = mysql_query($query);
      $array = mysql_fetch_array($fetchquery);
      $title = $array['fld_interview_title'];
      $desc = $array['fld_interview_description'];
      $status = $array['fld_interview_status'];
      //echo $status;
      
  

?>
<dl class="dl-horizontal">
 
  <dt>Interview Tips Title</dt><dd><?php echo $title; ?></dd>
  <dt>Interview Tips Description</dt><dd><?php echo $desc; ?></dd>
<dt>Status</dt><dd><?php if ($status == 1) {
    ?>
   Active

    <?php
} else {
    ?> 
    InActive

    <?php
}
//echo $status;?></dd>
</dl>
 <div class="modal-footer">
    <button type="button" class="btn btn-warning col-sm-3 pull-right" style="margin-left:10px;" data-dismiss="modal">OK</button>
</div>
<?php } ?>