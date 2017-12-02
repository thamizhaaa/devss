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
$state = $array['state'];
$company = $array['fld_employer_name'];
//$mobile = $array['fld_phone'];
$register1 = date_create($array['fld_dor']);
$register = date_format($register1,"F j, Y");
$member = $array['fld_membership_type'];
$indusType = $array['fld_indusType'];
$city = $array['fld_city'];
        
$no_of_emp = $array['fld_worker'];
$about = $array['fld_company_desc'];
$business_entity = $array['fld_company_type'];


$query_emp = mysql_query("select * from tbl_employer where fld_delstatus='1'  OR fld_delstatus= '0' AND fld_emp_status=1 AND fld_id='".$id."'");
$array_emp = mysql_fetch_array($query_emp);
//print_r($array_emp);
$fname = $array_emp['fld_name'];
$email = $array_emp['fld_email'];
$mobile = $array_emp['fld_mobile'];

$package_ed="SELECT * FROM tbl_package_price tpp join tbl_package_detail pd on tpp.fld_id=pd.fld_package_id where pd.fld_emp_id=$id";
                
//               echo "SELECT * FROM `tbl_package_price` tpp join tbl_package_detail pd on tpp.fld_id=pd.fld_package_id where pd.fld_emp_id=$viewempid";;
		$package_quer = mysql_query($package_ed);
                $package_fet = mysql_fetch_array($package_quer);
                $package_year = $package_fet['fld_year'];
               
                $pprice = $package_fet['fld_price'];
                $package_id = $package_fet['fld_package_id'];
                 $ptotal = $package_fet['fld_total'];
              
?>
<dl class="dl-horizontal">
  <dt>Company Name</dt><dd><?php echo $company; ?></dd>
  <dt>E-mail</dt><dd><?php echo $email; ?></dd>
  <dt>Contact Person</dt><dd><?php echo $fname; ?></dd>
  <dt>Contact Number</dt><dd><?php echo $mobile; ?></dd>
  <!--<dt>Membership Type</dt><dd><?php //echo $member; ?></dd>-->
  <dt>Registered On</dt><dd><?php echo $register; ?></dd>
  <dt>Industry Type</dt><dd><?php echo $indusType; ?></dd>  
  <dt>City</dt><dd><?php echo $city; ?></dd> 
  <dt>No.of Employers</dt><dd><?php echo $no_of_emp; ?></dd> 
  <dt>Company Description</dt><dd><?php echo $about; ?></dd> 
  <dt>Company Type</dt><dd><?php echo $business_entity; ?></dd> 


<dt>Validity</dt><dd><?php echo $package_year; ?></dd> 
<dt>Package_price</dt><dd><?php echo $pprice; ?></dd> 
<dt>Package_Total</dt><dd><?php echo $ptotal; ?></dd>

</dl>
 <div class="modal-footer">
    <button type="button" class="btn btn-warning col-sm-3 pull-right" style="margin-left:10px;" data-dismiss="modal">OK</button>
</div>
<?php } 

if ($oper == 'job_details') { 

?>

<div class="modal-header">
    <h4 class="modal-title">Job Details</h4>
</div>
<?php 
$id = $_REQUEST['id'];
//$fetchedudetailsqry = "select * from postjob WHERE  fld_id=$id";       
$fetchedudetailsqry = "select tpj.fld_id,tpj.fld_jnumber,tpj.fld_jobtitle,tpj.fld_postdate,tpj.fld_contact_persion,tpj.fld_address,tpj.fld_phone1,tpj.fld_status,ted.fld_employer_name,ted.fld_indusType,ted.fld_delstatus from tbl_postjob tpj JOIN tbl_employer_details ted ON (tpj.fld_empid = ted.fld_empid) WHERE (tpj.fld_status =1 OR tpj.fld_status = 0) AND (ted.fld_delstatus=1 OR ted.fld_delstatus=0) AND tpj.fld_id=$id";       
$fetchedudetailsqrysql = mysql_query($fetchedudetailsqry);	
$row=mysql_fetch_array($fetchedudetailsqrysql);	
$viewempid = $row['fld_id'];                
$name = $row['fld_fname'];              
$employee = $row['fld_employer_name'];
$date = $row['fld_postdate'];
$address = $row['fld_address'];
$contact = $row['fld_phone1'];
$industry = $row['fld_indusType'];
$job = $row['fld_jobtitle'];
$person = $row['fld_contact_persion'];
?>
<dl class="dl-horizontal">
  <dt>Company Name</dt><dd><?php echo $employee; ?></dd>
  <dt>Job Title</dt><dd><?php echo $job; ?></dd>
  <dt>Contact Person</dt><dd><?php echo $person; ?></dd>
  <dt>Contact Number</dt><dd><?php echo $contact; ?></dd>
  <dt>Post Date</dt><dd><?php echo $date; ?></dd>
  <dt>Industry Type</dt><dd><?php echo $industry; ?></dd>  
</dl>
 <div class="modal-footer">
    <button type="button" class="btn btn-warning col-sm-3 pull-right" style="margin-left:10px;" data-dismiss="modal">OK</button>
</div>




<?php } 

if ($oper == 'seeker_details') { ?>


<div class="modal-header">
    <h4 class="modal-title">Job Details</h4>
</div>
<?php 
$id = $_REQUEST['id'];

//    $fetchedudetailsqry    = "select * from tbl_seeker_personal WHERE  fld_id=$id";
    $fetchedudetailsqry    = "select tj.fld_id,tj.fld_name,tj.fld_email,tj.fld_mobile,tjd.fld_profilepic,tjd.fld_address,tjd.fld_dob,tjd.fld_gender from tbl_jobseeker tj JOIN tbl_jobseeker_details tjd ON (tj.fld_id = tjd.fld_js_id) WHERE tj.fld_id=$id AND (tj.`fld_js_status`=1 OR tj.`fld_js_status`=0) AND tj.fld_delstatus=0 AND tjd.fld_delstatus=0";
    $fetchedudetailsqrysql = mysql_query($fetchedudetailsqry);
    $row                   = mysql_fetch_array($fetchedudetailsqrysql);
    $seekid                = $row['fld_id'];
    $name                  = $row['fld_name'];
    $pic               = $row['fld_profilepic'];
    $mail    = $row['fld_email'];
    $dob    = $row['fld_dob'];
    $gender    = $row['fld_gender'];
    $address = $row['fld_address'];
    $contact = $row['fld_mobile'];
?>
<dl class="dl-horizontal"> 
   
  <dt></dt><dd><img src="images/profilepic/<?php echo $pic; ?>" alt="" class="img-responsive center-block "></dd>
  <dt>Seeker Name</dt><dd><?php echo $name; ?></dd>
  <dt>Email</dt><dd><?php echo $mail; ?></dd>
  <dt>Date Of Birth</dt><dd><?php echo $dob; ?></dd>
  <!--<dt>Gender</dt><dd><?php echo $gender; ?></dd>-->
  <dt>Address</dt><dd><?php echo $address; ?></dd>
  <dt>Contact Number</dt><dd><?php echo $contact; ?></dd>
<!--  <dt>Post Date</dt><dd><?php echo $date; ?></dd>
  <dt>Industry Type</dt><dd><?php echo $industry; ?></dd>  -->
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
    <h4 class="modal-title">Job Details</h4>
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
      
  

?>
<dl class="dl-horizontal">
 
  <dt>Resume Tips Title</dt><dd><?php echo $title; ?></dd>
  <dt>Resume Tips Description</dt><dd><?php echo $desc; ?></dd>

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
    <h4 class="modal-title">Job Details</h4>
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
      
  

?>
<dl class="dl-horizontal">
 
  <dt>Resume Tips Title</dt><dd><?php echo $title; ?></dd>
  <dt>Resume Tips Description</dt><dd><?php echo $desc; ?></dd>

</dl>
 <div class="modal-footer">
    <button type="button" class="btn btn-warning col-sm-3 pull-right" style="margin-left:10px;" data-dismiss="modal">OK</button>
</div>
<?php } ?>