<html lang="en">
<head>
<?php
error_reporting(0);
@include("config.php");
@include("user_sessioncheck.php");
if($empuser_id == "")
{    
header('Location: index.php'); 
}
if ($_REQUEST['skill'] != '' || $_REQUEST['experience'] != '' || $_REQUEST['city'] != '')
{       
$skill12     = $_REQUEST['skill'];   
$experience = $_REQUEST['experience'];
$city12       = $_REQUEST['city'];
$city      = explode(',', $city12);
$skill      = explode(',', $skill12);    
$exp1=$experience-1;
$exp2=$experience+1;
}
?>
<input type="hidden" value="<?php echo $Jobtype; ?>" id="jobtype1">
<input type="hidden" value="<?php echo $experience; ?>" id="exp">
<!DOCTYPE html>
<meta http-equiv="content-type" content="text/html;charset=UTF-8" />  
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<meta name="description" content="">
<meta name="author" content="Vinformax">
<title>Search Resume | Staffing Spot | Job Portal</title>
<link rel="icon" href="images/favicon.ico" type="image/x-icon">
<link rel="stylesheet" href="css/bootstrap.min.css">
<link href="css/select2.min.css" rel="stylesheet">
<link rel="stylesheet" href="css/mega_menu.min.css">
<link rel="stylesheet" href="css/animate.min.css">
<link rel="stylesheet" href="css/owl.carousel.css">
<link rel="stylesheet" href="css/owl.style.css">
<link rel="stylesheet" href="css/style.css">
<link rel="stylesheet" href="css/style1.css">
<link rel="stylesheet" href="css/mobile.css">
<link rel="stylesheet" type="text/css" href="css/font-awesome.min.css">
<!--<link rel="stylesheet" href="css/et-line-fonts.css" type="text/css">
<link href="http://fonts.googleapis.com/css?family=Source+Sans+Pro:400,600,700,900,300" rel="stylesheet" type="text/css">
<link href="https://fonts.googleapis.com/css?family=Open+Sans:400,600,700" rel="stylesheet" type="text/css">
<script src="js/modernizr.js"></script>


<script type="text/javascript" src="js/jquery-3.1.1.min.js"></script>

<!--JAVASCRIPT JS-->  
<!--                        <script type="text/javascript" src="js/jquery-migrate-1.2.1.min.js"></script>

<!-- BOOTSTRAP CORE JS -->
<script type="text/javascript" src="js/bootstrap.min.js"></script>



</head>

<body>
<div class="page category-page">
<div id="spinner">
<div class="spinner-img">
<img alt="Staffing Spot - the spot for your career" src="images/loader.svg" />
<h2>Please Wait...</h2>
</div>
</div>

<?php
@include("top.php");
?>
<div class="clearfix"></div>        
<section class="advance-search light-blue users-bg">
<div class="container">
<div class="row">
<div class="col-md-12 col-sm-12 col-xs-12 nopadding">
<form class="form-inline">


<div class="col-lg-4 col-md-4 col-sm-6 col-xs-12 nopadding bdr-0">
<div class="form-group">


<input type='text' value='<?php if($skill12 != ''){ echo $skill12; } else { echo 'null';} ?>' placeholder='Search By Skills' class='flexdatalist skill_allresults' data-data='skills.json' data-search-in='skill' multiple='multiple' data-selection-required='true' data-value-property='skill' data-text-property='{skill}' data-visible-properties='["skill"]' data-min-length='1' name='skill_allresults'>



</div>
</div>
<div class="col-lg-4 col-md-4 col-sm-6 col-xs-12 nopadding bdr-0">
<div class="form-group">


<input type='text'
value='<?php if($city12 != ''){ echo $city12; } else { echo 'null';}?>'
placeholder='Search By City'
class='flexdatalist city_allresults'
data-data='city.json'
data-search-in='city'
data-visible-properties='["city"]'
data-selection-required='true'
data-value-property='city'
data-text-property='{city}'
data-min-length='1'
multiple='multiple'
name='city_allresults'>

</div>
</div>





<div class="col-lg-2 col-md-2 col-sm-6 col-xs-12 nopadding">
<div class="form-group">

<select class="form-control" id="experience">
<?php


$sql123 = " SELECT distinct fld_experience_year FROM `tbl_jobseeker_details` ORDER BY fld_experience_year  ASC ";
$res    = mysql_query($sql123);
?>
<!--<option value=""> Select </option>-->
<option value=""<?php  if ($experience == '') { echo "selected"; } ?>> Select </option>
<!--<option value="Fresher" <?php  //if ($experience == 'Fresher') { echo "selected"; } ?>>Fresher</option>--> 
<option value="0" <?php  if ($experience == '0') { echo "selected"; } ?>>0</option> 
<option value="1" <?php  if ($experience == 1) { echo "selected"; } ?>>1</option> 
<option value="2" <?php  if ($experience == 2) { echo "selected"; } ?>>2</option> 
<option value="3" <?php  if ($experience == 3) { echo "selected"; } ?>>3</option> 
<option value="4" <?php  if ($experience == 4) { echo "selected"; } ?>>4</option> 
<option value="5" <?php  if ($experience == 5) { echo "selected"; } ?>>5</option> 
<option value="6" <?php  if ($experience == 6) { echo "selected"; } ?>>6</option> 
<option value="7" <?php  if ($experience == 7) { echo "selected"; } ?>>7</option> 
<option value="8" <?php  if ($experience == 8) { echo "selected"; } ?>>8</option> 
<option value="9" <?php  if ($experience == 9) { echo "selected"; } ?>>9</option> 
<option value="10" <?php  if ($experience == 10) { echo "selected"; } ?>>10</option> 
<option value="11" <?php  if ($experience == 11) { echo "selected"; } ?>>11</option> 
<option value="12" <?php  if ($experience == 12) { echo "selected"; } ?>>12</option> 
<option value="13" <?php  if ($experience == 13) { echo "selected"; } ?>>13</option> 
<option value="14" <?php  if ($experience == 14) { echo "selected"; } ?>>14</option> 
<option value="15" <?php  if ($experience == 15) { echo "selected"; } ?>>15</option> 
<option value="16" <?php  if ($experience == 16) { echo "selected"; } ?>>16</option> 
<option value="17" <?php  if ($experience == 17) { echo "selected"; } ?>>17</option> 
<option value="18" <?php  if ($experience == 18) { echo "selected"; } ?>>18</option> 
<option value="19" <?php  if ($experience == 19) { echo "selected"; } ?>>19</option> 
<option value="20" <?php  if ($experience == 20) { echo "selected"; } ?>>20</option>
<option value="21" <?php  if ($experience == 21) { echo "selected"; } ?>>21</option>
<option value="22" <?php  if ($experience == 22) { echo "selected"; } ?>>22</option>
<option value="23" <?php  if ($experience == 23) { echo "selected"; } ?>>23</option>
<option value="24" <?php  if ($experience == 24) { echo "selected"; } ?>>24</option>
<option value="25" <?php  if ($experience == 25) { echo "selected"; } ?>>25</option>
<option value="26" <?php  if ($experience == 26) { echo "selected"; } ?>>26</option>
<option value="27" <?php  if ($experience == 27) { echo "selected"; } ?>>27</option>
<option value="28" <?php  if ($experience == 28) { echo "selected"; } ?>>28</option>
<option value="29" <?php  if ($experience == 29) { echo "selected"; } ?>>29</option>
<option value="30" <?php  if ($experience == 30) { echo "selected"; } ?>>30</option>
<option value="31" <?php  if ($experience == 31) { echo "selected"; } ?>>31</option>
<option value="32" <?php  if ($experience == 32) { echo "selected"; } ?>>32</option>
<option value="33" <?php  if ($experience == 33) { echo "selected"; } ?>>33</option>
<option value="34" <?php  if ($experience == 34) { echo "selected"; } ?>>34</option>
<option value="35+" <?php  if ($experience == '35+') { echo "selected"; } ?>>35+</option>
</select>
</div>
</div>




<div class="col-lg-2 col-md-2 col-sm-6 col-xs-12 nopadding">

<div class="form-group form-action">

<input type="button"  class="btn btn-primary btn-search-submit" id="btn-search" onClick="fn_search()" value="SEARCH RESUME">                                                              </div>
</div>
</form>
</div>
</div>
</section>

<?php if($_REQUEST['action'] == 'resumelistlist'){ ?>

<section class="categories-list-page light-grey">
<div class="container">
<div class="row">
<div class="col-md-12 col-sm-12 col-xs-12 nopadding">

<div class="col-md-12col-sm-12 col-xs-12">
<!--<h4 class="search-result-text">Showing 10 of 60 available job(s)</h4>-->
</div>
<div class="col-md-8 col-sm-12 col-xs-12">

<div class="all-jobs-list-box" id="rightpanel12">

<?php

foreach ($city as $city1) {
$cities .= $city1;
$recordss .= "tj.fld_city like '%$city1%'"." OR "; 
}
$records = substr($recordss, 0, -3);

foreach ($skill as $skill1) {
$skills .= $skill1;

$records_skills .= "tj.fld_keyword = '$skill1' OR tj.fld_keyword like '%,$skill1,%' OR tj.fld_keyword like '$skill1,%' OR tj.fld_keyword like '%,$skill1' OR "; 
}
$records1 = substr($records_skills, 0, -3);

$records = '(' .$records . ')';
$records1 = '(' .$records1. ')';

if($experience!= ''){
$records11 = "AND tj.fld_experience_year in ($exp1,$experience,$exp2)";
}else{
$records11='';
}
//$records11 = substr($records0, 0, -3);

//$records111 = '(' .$reco. ')';		
//echo $records111;		 


if($skills != '' && $cities == ''){
$pagin_query = "select COUNT(*) as total from tbl_jobseeker_details tj JOIN tbl_jobseeker js on tj.fld_js_id = js.fld_id WHERE $records1 AND";
//    echo $pagin_query;
}
else if($skills == '' && $cities != ''){
$pagin_query = "select COUNT(*) as total from tbl_jobseeker_details tj JOIN tbl_jobseeker js on tj.fld_js_id = js.fld_id WHERE $records AND";
//echo "$pagin_query";    
}    
else if($skills != '' && $cities != ''){
$pagin_query = "select COUNT(*) as total from tbl_jobseeker_details tj JOIN tbl_jobseeker js on tj.fld_js_id = js.fld_id WHERE $records1 AND $records AND";
//echo "$pagin_query";    
}else{
$pagin_query = "select COUNT(*) as total from tbl_jobseeker_details tj JOIN tbl_jobseeker js on tj.fld_js_id = js.fld_id where ";
}  


if($experience != ''){
$pagin_query1 =" js.fld_js_status=1 AND js.fld_profile_visibility=1 $records11";
//    echo 'scsdhf'."$pagin_query1";
}else{
$pagin_query1 = " js.fld_js_status=1 AND js.fld_profile_visibility=1";
}


if($skills!='' || $cities!='' || $experience!=''){
$pagination = $pagin_query . $pagin_query1 ;
}

//echo '<br>'.$pagination.'<br>';

$pagination1 = mysql_query($pagination);
$pagin_row = mysql_fetch_array($pagination1);
$total = $pagin_row['total'];
$dis  = 2;
$total_page = ceil($total / $dis);
$page_cur = (isset($_GET['page'])) ? $_GET['page'] : 1;
$k = ($page_cur - 1) * $dis;

$orderby = " Limit $k,$dis";



if($skills != '' && $cities == ''){
$sql_query = "select * from tbl_jobseeker_details tj JOIN tbl_jobseeker js on tj.fld_js_id = js.fld_id where $records1 AND";
//    echo $sql_query;
}
else if($skills == '' && $cities != ''){
$sql_query = "select * from tbl_jobseeker_details tj JOIN tbl_jobseeker js on tj.fld_js_id = js.fld_id where $records AND";
//echo "$sql_query";    
}
else if($skills != '' && $cities != ''){
$sql_query = "select * from tbl_jobseeker_details tj JOIN tbl_jobseeker js on tj.fld_js_id = js.fld_id where $records AND $records1 AND";
//echo "$sql_query";    
}else{
$sql_query = "select * from tbl_jobseeker_details tj JOIN tbl_jobseeker js on tj.fld_js_id = js.fld_id where ";
}


if($experience != ''){
$query = " js.fld_js_status=1 AND js.fld_profile_visibility=1 $records11 $orderby";
//    echo "$query";
}else{
$query = " js.fld_js_status=1 AND js.fld_profile_visibility=1 $orderby";
}

if($skills!='' || $cities!='' || $experience!=''){
$select_query = $sql_query . $query;
}

//echo $select_query;
$rcrds = mysql_query($select_query);
$cnt = mysql_num_rows($rcrds);
//print_r($cnt);
$count=count($cnt);
if($cnt > 0)
{

?>        

<?php

$projects = array();
while ($project = mysql_fetch_assoc($rcrds)) {
$projects[] = $project;
}
$r = 0;
foreach ($projects as $project) {

$r++;
?>



<div class="job-box">
<div class="col-md-3 col-sm-3 col-xs-12">

<div class="comp-logo">

<?php    
$imgpath = "images/profilepic/";
$userprofileimg1 = $project['fld_profilepic'];
$userprofileimg = $imgpath.$userprofileimg1;   
?>
<?php
if(file_exists($userprofileimg) && (preg_match('/\.([^\.]+)$/', $userprofileimg)))
{                                   
?>
<img src="<?php echo $userprofileimg; ?>" class="img-responsive" alt="Staffing Spot">
<?php
}
else
{
?>
<img src="images/nopicture.jpg" alt="logo" class="img-responsive">  
<?php
}
?>
</div>
</div>
<div class="col-md-6 col-sm-6 col-xs-12 nopadding">

<div class="job-title-box">                                    
<?php echo "Name : ". $project['fld_name'];?> <br>
<br>
<?php echo "Mobile : ". $project['fld_mobile'];?> <br>
<br>
<br>

</div>
<h4>
<?php echo "Skills : ".$project['fld_keyword']; ?></h4>
</div>

<div class="col-md-2 col-sm-2 col-xs-12">                                                
<div class="job-type jt-remote-color">
<?php
echo $project['fld_resumetitle'];
?>
<br/>
<i class="fa fa-user" aria-hidden="true"></i>
<?php
$exper       = explode(",", $project['fld_experience_year']);
$firstexper  = $exper[0];
$secondexper = $exper[1];

if ($secondexper == '1') {
$yearname = "Year";
} else {
$yearname = "Years";
}

echo $firstexper . "-" . $secondexper . " " . $yearname;
?>

</div>

<!-- </a> -->
</div>
<div class="col-md-2 col-sm-2 col-xs-12 nopadding">
<?php
$encrypted_id = base64_encode($project['fld_js_id']);

?>
<a href="public_profile.php?seeker_id=<?=$encrypted_id?><?php
echo $project['fld_public_link'];
?>"><input type="button" class="btn btn-default btn-search-submit" value="VIEW"/></a>

</div>


</div>
<?php } ?>




<?php


if($total > $dis){ ?>                          

<ul class="pagination" style="font-weight:bolder;">

<?php
if ($page_cur > 1) {
?>

<li class="disabled" ><a href="searchresume.php?action=resumelistlist&skill=<?php echo $skill12 ?>&experience=<?php echo $experience ?>&city=<?php echo $city12 ?>&page=<?php
echo ($page_cur - 1);
?>">Prev</a></li>
<?php
} else {
?>
<li class="active"><a>Prev</a></li>
<?php
}
for ($i = 1; $i <= $total_page; $i++) {

if ($page_cur == $i) {
?>
<li class="active"><a><?php
echo $i;
?></a></li>

<?php
} else {
?>
<li class="disabled" ><a href="searchresume.php?action=resumelistlist&skill=<?php echo $skill12 ?>&experience=<?php echo $experience ?>&city=<?php echo $city12 ?>&page=<?php
echo $i;
?>"><?php
echo $i;
?></a></li>

<?php
}
}
if ($page_cur < $total_page) {
?>

<li class="disabled" ><a href="searchresume.php?action=resumelistlist&skill=<?php echo $skill12 ?>&experience=<?php echo $experience ?>&city=<?php echo $city12 ?>&page=<?php
echo ($page_cur + 1);
?>">Next >></a></li>
<?php
} else {
?>
<li class="active" ><a>Next >></a></li>
<?php
}
?>


</ul>
<?php } ?>                
</div>
</div>



<div class="col-md-4 col-sm-12 col-xs-12">
<aside>


<!--jobs by industry type-->


<!--                                    <div class="widget">
<div class="widget-heading"><span class="title">Hot Categories By Industry Type</span></div>
<ul class="categories-module">
<?php
$skills = "SELECT distinct fld_industrytype FROM `tbl_industry_type` WHERE `fld_delstatus`!=2 ORDER BY `fld_industrytype` Limit 5 ";
$skill_query = mysql_query($skills);
while ($row = mysql_fetch_array($skill_query)) {
$industype = $row['fld_industrytype'];
?>
<li> <a href="users.php?skill=<?php echo base64_encode($industype) ?>"> <?php echo $industype; ?> <span>(1021)</span> </a> </li>  
<?php } ?>
</ul>
<center><a href="#" style="color:red" data-toggle="modal" data-target="#myModalindustry" id="Modalindustry">Show More</a></center>
</div>-->


<!--jobs by skills-->   


<div class="widget">
<div class="widget-heading"><span class="title">Hot Categories By Skills</span></div>



<?php


$array_skills = [];
$sql_skills = mysql_query("SELECT tjd.fld_keyword from tbl_jobseeker_details tjd JOIN tbl_jobseeker tj ON tjd.fld_js_id = tj.fld_id WHERE tj.fld_js_status=1 AND tj.fld_delstatus=0 AND tj.fld_profile_visibility=1 Order by RAND()");
while ($row2 = mysql_fetch_assoc($sql_skills)) {
$id[] = $row2['fld_id'];
$skills12 = explode(',', $row2['fld_keyword']);

foreach ($skills12 as $skills1) {
array_push($array_skills, $skills1);
}
}
$skills = array_unique($array_skills);
$skills = array_slice($skills, -8);
$total_count = count($skills);

//print_r($skills);
$skillcount = 0;

?>
<ul class="categories-module">
<?php if ($total_count > 0) { 
    
    
foreach ($skills as $skills_list) {

$query = mysql_query("select count(*) as count from tbl_jobseeker_details tjd JOIN tbl_jobseeker tj ON tjd.fld_js_id = tj.fld_id where (tjd.fld_keyword = '$skills_list' OR tjd.fld_keyword like '$skills_list,%' OR tjd.fld_keyword like '%,$skills_list,%' OR tjd.fld_keyword like '%,$skills_list') AND tj.fld_js_status=1 AND tj.fld_delstatus=0 AND tj.fld_profile_visibility=1");
while ($roww = mysql_fetch_assoc($query)) {
$count = $roww['count'];
}    
    ?>
<li> <a href="users.php?skill=<?php echo base64_encode($skills_list) ?>"> <?php echo $skills_list; ?> <span>(<?php echo $count; ?>)</span> </a> </li>  
<?php
}
} else { echo '<center><h3>No Data Available</h3></center>'; } 
?>
</ul>
<!--<center><a href="#" style="color:red" data-toggle="modal" data-target="#myModalindustry" id="Modalindustry">Show More</a></center>-->
</div>



<!--jobs by location--> 


<div class="widget">
<div class="widget-heading"><span class="title">Hot Categories By Location</span></div>
<ul class="categories-module">
<?php
$emp = mysql_query("SELECT DISTINCT  tjd.fld_city from tbl_jobseeker_details tjd JOIN tbl_jobseeker tj ON tjd.fld_js_id = tj.fld_id WHERE tj.fld_js_status=1 AND tj.fld_delstatus=0 AND tj.fld_profile_visibility=1  Order by RAND() LIMIT 8");
while ($rows3 = mysql_fetch_array($emp)) {
$cityname = $rows3['fld_city'];
$count = mysql_query("SELECT count(*) as count from tbl_jobseeker_details tjd JOIN tbl_jobseeker tj ON tjd.fld_js_id = tj.fld_id WHERE tjd.fld_city = '$cityname' AND tj.fld_profile_visibility=1 AND tj.fld_js_status=1 AND tj.fld_delstatus=0");
$city_count = mysql_fetch_array($count);
?>
<li> <a href="users.php?city=<?php echo base64_encode($cityname) ?>"> <?php echo $cityname; ?> <span>(<?php echo $city_count['count']; ?>)</span> </a> </li>  
<?php
}
?>
</ul>
</div>


</aside>
</div>




<?php     

}
else {
?>
<h3><center> 
<?php echo 'No Data Available'; } ?></center></h3>


</div>
</div>
</div>
</section>

<?php } else { ?>     

<section class="categories-list-page light-grey">
<div class="container">
<div class="row">
<div class="col-md-12 col-sm-12 col-xs-12 nopadding">

<div class="col-md-8 col-sm-12 col-xs-12">

<?php 
$keyword = mysql_query("SELECT `fld_empid`,`fld_keyskills` FROM `tbl_postjob` WHERE `fld_empid`=$empuser_id");
while($row=mysql_fetch_assoc($keyword)){
$key = $row['fld_keyskills'].'<br>';
$value = explode(',',$row['fld_keyskills']);  
$countskills = count($value);
foreach ($value as $key => $value321) {

if($countskills > 1)
{
$where .= "fld_keyword LIKE '%$value321%'"." OR ";    
}
else
{
$where .= "fld_keyword LIKE '%$value321%'"." OR ";        
}
}
}
$skillvals = substr($where, 0, -3);
$test_id = array();
$keyskills = mysql_query("select fld_js_id,fld_keyword from tbl_jobseeker_details where $skillvals");
while($rows=mysql_fetch_assoc($keyskills)){
$test_id[] = $rows['fld_js_id'];
}
$implode = implode(',', $test_id);





$sql = "SELECT tjd.fld_id,tjd.fld_js_id,tjd.fld_profilepic,tjd.fld_city,tjd.fld_keyword,tjd.fld_aboutmyself,tjd.fld_delstatus,tj.fld_id as seeker_id,tj.fld_name,tj.fld_js_status,tj.fld_delstatus from tbl_jobseeker_details tjd JOIN tbl_jobseeker tj ON tjd.fld_js_id = tj.fld_id WHERE tjd.fld_js_id in ($implode) AND tj.fld_js_status=1 AND tj.fld_delstatus=0 AND tj.fld_profile_visibility=1 LIMIT 0,5";


$records = mysql_query($sql) or die("Query fail: " . mysqli_error());
$cnt = mysql_num_rows($records);
if($cnt >0)
{
while ($project =  mysql_fetch_assoc($records))
{
$skillsname = explode(',', $project['fld_keyword']) ;

?>      
<div class="profile-content">
<div class="card">
<div class="firstinfo">
<div class="col-md-3 col-sm-3">
<?php
$userimages1 = 'images/profilepic/'.$project['fld_profilepic'];
$userimages = $userimages1;
if(file_exists($userimages) && (preg_match('/\.([^\.]+)$/', $userimages)))
{
?>

<img src="<?php echo $userimages; ?>" alt="<?php echo $project['fld_name']; ?>" class="img-circle img-responsive" />
<?php
}
else
{
?>
<img src="<?php echo "images/nopicture.jpg" ?>" class="img-circle img-responsive" alt="<?php echo $project['fld_name']; ?>">
<?php
}
?>
	</div>
	<div class="profileinfo col-md-9 col-sm-9 nopadding">
<h1> <a href="#"><?php echo $project['fld_name']; ?></a></h1>
<?php 
$sql_cur = "SELECT `fld_current` FROM `tbl_job_experience` WHERE `fld_seekerid`='".$project['seeker_id']."' AND `fld_status`=0 AND`fld_delstatus`=0";
$record_cur = mysql_query($sql_cur) or die("Query fail: " . mysqli_error());
$projects_cur = mysql_fetch_array($record_cur);
if($projects_cur['fld_current'] == 1){
$sql = "SELECT * FROM `tbl_job_experience` WHERE `fld_seekerid`='".$project['seeker_id']."' AND `fld_status`=0 AND`fld_delstatus`=0";
} else {
$sql = "SELECT * FROM `tbl_job_experience` WHERE `fld_seekerid`='".$project['seeker_id']."' AND `fld_status`=0 AND`fld_delstatus`=0 ORDER BY fld_to_month DESC, fld_to_year DESC Limit 1";
}
$record = mysql_query($sql) or die("Query fail: " . mysqli_error());
$projects = mysql_fetch_array($record);
?>
<h3><?php echo $projects['fld_position']; ?></h3>
<p class="bio"><?php 
// $userdesc = $project['fld_aboutmyself'];
// $msgTrimmed = mb_substr($userdesc,0,170);
// $lastSpace = strrpos($msgTrimmed, '.', 0);
// $aaa = mb_substr($msgTrimmed,0,$lastSpace);
// $userdescription = (strlen($userdesc) > 170) ? $aaa.'...' : $userdesc;
// echo $userdescription;
?></p>
<div class="profile-skills">
<?php foreach($skillsname as $skill_list){ ?>
<span> <?php echo $skill_list  ?> </span>
<?php } ?>
</div>
<div class="hire-btn">
<?php $encrypted_id = base64_encode($project['seeker_id']); ?>
<a href="public_profile.php?seeker_id=<?php echo $encrypted_id;  ?>" class="btn btn-default" > <i class="fa fa-location-arrow"></i> View</a>
</div>
</div>
</div>
</div>
</div>
<?php } ?>
</div>






<div class="col-md-4 col-sm-12 col-xs-12">
<aside>


<!--jobs by industry type-->


<!--                                    <div class="widget">
<div class="widget-heading"><span class="title">Hot Categories By Industry Type</span></div>
<ul class="categories-module">
<?php
$skills = "SELECT distinct fld_industrytype FROM `tbl_industry_type` WHERE `fld_delstatus`!=2 ORDER BY `fld_industrytype` Limit 5 ";
$skill_query = mysql_query($skills);
while ($row = mysql_fetch_array($skill_query)) {
$industype = $row['fld_industrytype'];
?>
<li> <a href="users.php?skill=<?php echo base64_encode($industype) ?>"> <?php echo $industype; ?> <span>(1021)</span> </a> </li>  
<?php } ?>
</ul>
<center><a href="#" style="color:red" data-toggle="modal" data-target="#myModalindustry" id="Modalindustry">Show More</a></center>
</div>-->


<!--jobs by skills-->   


<div class="widget">
<div class="widget-heading"><span class="title">Hot Categories By Skills</span></div>

<?php
$array_skills = [];
//echo "ram1"."SELECT tjd.fld_keyword from tbl_jobseeker_details tjd JOIN tbl_jobseeker tj ON tjd.fld_js_id = tj.fld_id WHERE tj.fld_js_status=1 AND tj.fld_delstatus=0 AND tj.fld_profile_visibility=1";
$sql_skills = mysql_query("SELECT tjd.fld_keyword from tbl_jobseeker_details tjd JOIN tbl_jobseeker tj ON tjd.fld_js_id = tj.fld_id WHERE tj.fld_js_status=1 AND tj.fld_delstatus=0 AND tj.fld_profile_visibility=1 Order by RAND()");
while ($row2 = mysql_fetch_assoc($sql_skills)) {
$id[] = $row2['fld_id'];
$skills12 = explode(',', $row2['fld_keyword']);

foreach ($skills12 as $skills1) {
array_push($array_skills, $skills1);
}
}
$skills = array_unique($array_skills);
$skills = array_slice($skills, -8);
$total_count = count($skills);

$skillcount = 0;
?>
<ul class="categories-module">
<?php if ($total_count > 0) { 
    foreach ($skills as $skills_list) {
        
        $query = mysql_query("select count(*) as count from tbl_jobseeker_details tjd JOIN tbl_jobseeker tj ON tjd.fld_js_id = tj.fld_id where (tjd.fld_keyword = '$skills_list' OR tjd.fld_keyword like '$skills_list,%' OR tjd.fld_keyword like '%,$skills_list,%' OR tjd.fld_keyword like '%,$skills_list') AND tj.fld_js_status=1 AND tj.fld_delstatus=0 AND tj.fld_profile_visibility=1");

//echo "ram"."select count(*) as count from tbl_jobseeker_details tjd JOIN tbl_jobseeker tj ON tjd.fld_js_id = tj.fld_id where (tjd.fld_keyword = '$skills_list' OR tjd.fld_keyword like '$skills_list,%' OR tjd.fld_keyword like '%,$skills_list,%' OR tjd.fld_keyword like '%,$skills_list') AND tj.fld_js_status=1 AND tj.fld_delstatus=0 AND tj.fld_profile_visibility=1";

while ($roww = mysql_fetch_assoc($query)) {
$count = $roww['count'];
}
        
        
        ?>
<li> <a href="users.php?skill=<?php echo base64_encode($skills_list) ?>"> <?php echo $skills_list; ?> <span>(<?php echo $count; ?>)</span> </a> </li>  
<?php
    } } else { echo '<center><h3>No Data Available</h3></center>'; }
?>
</ul>
<!--<center><a href="#" style="color:red" data-toggle="modal" data-target="#myModalindustry" id="Modalindustry">Show More</a></center>-->
</div>



<!--jobs by location--> 


<div class="widget">
<div class="widget-heading"><span class="title">Hot Categories By Location</span></div>
<ul class="categories-module">
<?php
$emp = mysql_query("SELECT DISTINCT  tjd.fld_city from tbl_jobseeker_details tjd JOIN tbl_jobseeker tj ON tjd.fld_js_id = tj.fld_id WHERE tj.fld_js_status=1 AND tj.fld_delstatus=0 AND tj.fld_profile_visibility=1  Order by RAND() LIMIT 8");
while ($rows3 = mysql_fetch_array($emp)) {
$cityname = $rows3['fld_city'];
$count = mysql_query("SELECT count(*) as count from tbl_jobseeker_details tjd JOIN tbl_jobseeker tj ON tjd.fld_js_id = tj.fld_id WHERE tjd.fld_city = '$cityname' AND tj.fld_profile_visibility=1 AND tj.fld_js_status=1 AND tj.fld_delstatus=0");
$city_count = mysql_fetch_array($count);
?>
<li> <a href="users.php?city=<?php echo base64_encode($cityname) ?>"><?php echo $cityname; ?> <span>(<?php echo $city_count['count']; ?>)</span> </a> </li>  
<?php
}
?>
</ul>
</div>



</aside>
</div>

<?php     

}
else {
?>
<h3><center> 
<?php echo 'No Data Available'; } ?></center></h3>
</div>



</div>
</div>
</section>



<?php } ?>           

<?php @include("bottom.php");?>

<link href="scripts/ddl/jquery.flexdatalist.css" rel="stylesheet" type="text/css">
<link href="scripts/ddl/jquery.flexdatalist.min.css" rel="stylesheet" type="text/css">
<script src="scripts/ddl/jquery.flexdatalist.min.js"></script>



<script>
$('.city_allresults').flexdatalist({
minLength: 1,
valueProperty: '*',
selectionRequired: true, 
textProperty: '{city}',
searchIn: 'city',
data: 'city.json'
});
$('.skill_allresults').flexdatalist({
minLength: 1,
valueProperty: '*',
selectionRequired: true, 
textProperty: '{skill}',
searchIn: 'skill',
data: 'skills.json'
});

</script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<script>
//    $(".relative-flexdatalist").on('click', function(){
//  $(".advance-search .flexdatalist-multiple").siblings().hasClass('value', function(){
//      alert("sdegsd");
//  });
//    });
</script>

<script type="text/javascript">
function fn_search()
{        
//                var skill = $("#skill").val(); 
//                 var city = $("#city").val(); 

var city1 = $(".city_allresults").val();
var skill1 = $(".skill_allresults").val();
var experience1 = $("#experience").val();
var city = $.trim(city1);
var skill = $.trim(skill1);
var experience = $.trim(experience1);

//                alert(skill);
//                alert(city);
//                alert(experience);

//                
if((city == '' && skill == '' && experience == '')||(city == 'null' && skill == 'null' && experience == 'null')){
swal(
'',
'Select any one!',
'warning'
)           
} else{
//                
window.location.href="searchresume.php?action=resumelistlist&skill="+skill+"&experience="+experience+"&city="+city;
}

}

</script>  

<script>
    $(document).click(function(){
        var skill = $("input.skill_allresults.flexdatalist-set").val();
        var city = $("input.city_allresults.flexdatalist-set").val();
        
        if(skill == ''){$("input.skill_allresults").attr('placeholder', "Search By Skills");}
        if(skill != ''){$("input.skill_allresults").attr('placeholder', "");}
        if(city == ''){$("input.city_allresults").attr('placeholder', "Search By City");}
        if(city != ''){$("input.city_allresults").attr('placeholder', "");}
    });
</script>





<!-- JQUERY SELECT -->
<script type="text/javascript" src="js/select2.min.js"></script>
<!-- MEGA MENU -->
<script type="text/javascript" src="js/mega_menu.min.js"></script>



<!-- JQUERY COUNTERUP -->
<script type="text/javascript" src="js/counterup.js"></script>

<!-- JQUERY WAYPOINT -->
<script type="text/javascript" src="js/waypoints.min.js"></script>

<!-- JQUERY REVEAL -->
<script type="text/javascript" src="js/footer-reveal.min.js"></script>

<!-- Owl Carousel -->
<script type="text/javascript" src="js/owl-carousel.js"></script>

<!-- CORE JS -->
<script type="text/javascript" src="js/custom.js"></script>

</div>
</body>

</html> 