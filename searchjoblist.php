<html lang="en">
<head>
<?php
error_reporting(0);
$user_id = $_SESSION['user_id'];
@include("config.php");
if ($_GET['skill'] == 'null' && $_GET['city'] && $_GET['experience'] == 'null') {
	
	//echo $_GET['skill'];
	$city  = $_GET['city'];
	$city1 = explode(',', $city);
	echo 'city'.$city;
	?>
<input type="hidden" value="<?php echo $city;?>" id="city">
<?php
	//echo 'ccctiy'.$city1;
} elseif ($_GET['skill'] && $_GET['city'] == 'null' && $_GET['experience'] == 'null') {
	$skill  = $_GET['skill'];
	$skill1 = explode(',', $skill);
	?>
<input type="hidden" value="<?php echo $skill;?>" id="skill">

<?php
} elseif ($_GET['skill'] == 'null' && $_GET['city'] == 'null' && $_GET['experience']) {
	$experience  = $_GET['experience'];
//    $skill1 = explode(',', $skill);
	?>
<input type="hidden" value="<?php echo $experience;?>" id="experience">

<?php
} else {
	// echo 'Ã§cc'.$city=$_GET['city'];
	$skill  = $_GET['skill'];
	$city   = $_GET['city'];
	$experience   = $_GET['experience'];
	$city1  = explode(',', $city);
	$skill1 = explode(',', $skill);
	?>
<input type="hidden" value="<?php echo $city;?>" id="city">
<input type="hidden" value="<?php echo $skill;?>" id="skill">
<input type="hidden" value="<?php echo $experience;?>" id="experience">

<?php
}
$exp1 = $experience-1;
$exp2 = $experience+1;
?>
<!DOCTYPE html>

	<meta http-equiv="content-type" content="text/html;charset=UTF-8" />  
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<meta name="description" content="">
	<meta name="author" content="vinformax">
	<title>Job List | Staffing Spot | Job Portal</title>
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
	<link rel="stylesheet" href="css/et-line-fonts.css" type="text/css">
	<link href="http://fonts.googleapis.com/css?family=Source+Sans+Pro:400,600,700,900,300" rel="stylesheet" type="text/css">
	<link href="https://fonts.googleapis.com/css?family=Open+Sans:400,600,700" rel="stylesheet" type="text/css">
	<script src="js/modernizr.js"></script>
	
	<script type="text/javascript" src="js/jquery-3.1.1.min.js"></script>                       
	<script type="text/javascript" src="js/bootstrap.min.js"></script>
	
	<script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/1.8.2/jquery.min.js"></script>
	<script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jqueryui/1.8.23/jquery-ui.js"></script>
	<script type="text/javascript" src="slimScroll.min.js"></script>
	<script type="text/javascript">

	$(function(){
	$('#filtersubmenu').slimScroll({
	height: '250px'
	});
	});

	</script>
	</head>

	<body>
	<div class="page category-page">
	<!--  <div id="spinner">
	<div class="spinner-img">
	<img alt="Staffing Spot - the spot for your career" src="images/loader.svg" />
	<h2>Please Wait...</h2>
	</div>
	</div> --> 

<?php
@include("top.php");
?>
		<div class="clearfix"></div>
		
		
		<section class="job-breadcrumb">
		<div class="container">
		<div class="row">
		<div class="col-md-6 col-sm-7 co-xs-12 text-left">
		<h3>Search Job List</h3>
		</div>
		<div class="col-md-6 col-sm-5 co-xs-12 text-right">
		<div class="bread">
		<ol class="breadcrumb">
		<li><a href="company-dashboard.php">Home</a> </li>
		<li class="active">Search Job List</li>
		</ol>
		</div>
		</div>
		</div>
		</div>
		</section>	
	 <section class="bg src-bg">
<div class="col-md-12 col-sm-12">
<div class="search-bar">
<div class="col-md-12 col-sm-12 col-xs-12 nopadding">
<form  target="_blank" method="get" role="form">


		<div class="col-lg-4 col-md-4 col-sm-6 col-xs-12 nopadding bdr-0">
		<div class="form-group">                                  
<input type="text" placeholder='Search By Skills'  multiple='multiple' data-selection-required='true' value='<?php echo $skill; ?>' data-min-length='0' class="skill_allresults" data-value-property='skill' data-text-property='{skill}' data-visible-properties='["skill"]' data-url="skills.json"  data-load-once="true" name="skill_allresults">
</div>
</div>



<div class="col-lg-4 col-md-4 col-sm-6 col-xs-12 nopadding bdr-0">
<div class="form-group">
<input type='text' placeholder='Search By City' class='city_allresults' data-data='city.json' data-load-once="true" multiple='multiple' data-selection-required='true' value='<?php echo $city; ?>' data-visible-properties='["city"]' data-text-property='{city}' data-value-property='city' data-min-length='0' name='city_allresults'>
</div>
</div>



<div class="col-lg-2 col-md-2 col-sm-6 col-xs-12 nopadding">


<select class="form-control" data-placeholder="Search By Expr" id="search_experience">

<option value=" "<?php  if ($experience == '') { echo "selected"; } ?>> Select </option>
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
<option value="20" <?php  if ($experience == '20') { echo "selected"; } ?>>20</option>
<option value="21" <?php  if ($experience == '21') { echo "selected"; } ?>>21</option>
<option value="22" <?php  if ($experience == '22') { echo "selected"; } ?>>22</option>
<option value="23" <?php  if ($experience == '23') { echo "selected"; } ?>>23</option>
<option value="24" <?php  if ($experience == '24') { echo "selected"; } ?>>24</option>
<option value="25" <?php  if ($experience == '25') { echo "selected"; } ?>>25</option>
<option value="26" <?php  if ($experience == '26') { echo "selected"; } ?>>26</option>
<option value="27" <?php  if ($experience == '27') { echo "selected"; } ?>>27</option>
<option value="28" <?php  if ($experience == '28') { echo "selected"; } ?>>28</option>
<option value="29" <?php  if ($experience == '29') { echo "selected"; } ?>>29</option>
<option value="30" <?php  if ($experience == '30') { echo "selected"; } ?>>30</option>
<option value="31" <?php  if ($experience == '31') { echo "selected"; } ?>>31</option>
<option value="32" <?php  if ($experience == '32') { echo "selected"; } ?>>32</option>
<option value="33" <?php  if ($experience == '33') { echo "selected"; } ?>>33</option>
<option value="34" <?php  if ($experience == '34') { echo "selected"; } ?>>34</option>
<option value="35+" <?php  if ($experience == '35') { echo "selected"; } ?>>35+</option>




<option value="20+" <?php  if ($experience == '20+') { echo "selected"; } ?>>20+</option>
<?php

?>
</select>
<?php
?>

</div>
<div class="col-lg-2 col-md-2 col-sm-6 col-xs-12 nopadding">
<input type="button"  class="btn btn-primary btn-search-submit" id="btn-search" onClick="fn_search()" value="SEARCH">
</div>
</form>
</div>
</div>
</div>
<!--                   </div>-->
</section>
<section class="categories-list-page light-grey">
<div class="container">
<div class="row">

<div class="col-md-12 col-sm-12 col-xs-12 nopadding">

<div class="col-md-4 col-sm-5 col-xs-12">

<form id="form3" name="form3" method="post">
<?php
$queryyyy="select ted.fld_employer_name,ted.fld_indusType,tp.fld_job_type from tbl_employer_details ted join tbl_postjob tp on ted.fld_empid=tp.fld_empid";

$query1        = mysql_query($queryyyy);
$counnt        = mysql_num_fields($query1);

$specheadinng  = array();
$specheadinng1 = array();
$tesst         = array();
$columnnamees  = array();

$i             = 0;
$j             = 0;
while ($propertyy = mysql_fetch_field($query1)) {
if ($i >= 0 && $i < $counnt +3) {
$specheadinng    = $propertyy->name;        
$remove          = array("fld_");
$spec            = str_replace($remove, "", $specheadinng);
$spec1           = strtolower($spec);
$specname        = strtoupper($spec1);                         
$columnnames[$j] = $specheadinng;
$tesst_fld[$j]   = $specname;

$chkfield[$j]    = $spec1;
$j++;
}
$i++;
}


for ($f = 0; $f < $counnt; $f++) {
if ($tesst_fld[$f] == 'JOB_TYPE') {
echo '<h4>BROWSE BY JOB TYPE</h4>';
} 
else if ($tesst_fld[$f] == 'EMPLOYER_NAME') {
echo '<h4>BROWSE BY COMPANY NAME</h4>';
} 

else if ($tesst_fld[$f] == 'INDUSTYPE'){
echo '<h4>BROWSE BY INDUSTRY TYPE</h4>';
}



  echo '<div class="panel-group" id="accordion"  style="height: 135px;border: 1px solid #F1F1F1; overflow-y: scroll;">
<div class="panel panel-info" >
<div id="specs">                            
<ul class="filtersubmenu" id="filtersubmenu" >';

$testing  = "refine";
$refarray = $testing . $f;
$refarray = array();


if($columnnames[$f] =="fld_indusType")
{
$querry1  = "SELECT distinct fld_industrytype FROM `tbl_industry_type` WHERE `fld_delstatus`!=2 ORDER BY `fld_industrytype` ";
}
elseif($columnnames[$f] =="fld_job_type")
{
$querry1  = "SELECT distinct fld_jobtype FROM `tbl_jobtype` ORDER BY `fld_jobtype` ASC";
}


else
{
$querry1  = "select distinct $columnnames[$f] from tbl_employer_details ted join tbl_postjob tp on ted.fld_empid=tp.fld_empid order by ted.fld_employer_name ASC";
}

$querry = mysql_query($querry1);

$p = 0;
while ($row = mysql_fetch_array($querry)) {


$refarray[$p] = $row[$columnnames[$f]];


$fld_industry_type=base64_decode($_GET['industype']);

$employer_name=  base64_decode($_GET['employer_name']);

$splfilters = $fld_industry_type;
$test[] = $fld_industry_type;
if($columnnames[$f] == "fld_employer_name")
{        
if($refarray[$p] != ""){
if ($refarray[$p]== $employer_name) {
echo '<li class="li_level3">
<a><label class="label_check_level3">
<input class="input_check_level3" type="checkbox" id="chkids" name="' . $columnnames[$f] . '" value="' . $refarray[$p] . '" checked="checked"/>' . $refarray[$p] . '</label></a>
</li>';
} else {
echo '<li class="li_level3"><a><label class="label_check_level3"><input class="input_check_level3" type="checkbox" id="chkids" name="' . $columnnames[$f] . '" value="' . $refarray[$p] . '"/>' . $refarray[$p] . '</label></a></li>';
}
}
}
elseif ($columnnames[$f] == "fld_indusType")
{


?>
<li class="li_level3" >
<a><label class="label_check_level3">
<input class="input_check_level3" type="checkbox" <?php if (trim($row['fld_industrytype']) == trim($splfilters)) { echo 'checked="checked"'; } ?>  id="chkids'.$p.'" name="fld_industry_type" value="<?=$row['fld_industrytype'];?>"   /> <?=$row['fld_industrytype'];?> </label></a>
</li>
<?php          



}


elseif ($columnnames[$f] == "fld_job_type")
{
if (in_array($refarray[$p], $splfilters)) {                    
echo '<li class="li_level3">
<a><label class="label_check_level3">
<input class="input_check_level3" type="checkbox" id="chkids" name="' . "fld_job_type" . '" value="' . $row['fld_jobtype'] . '" checked="checked"/>' . $row['fld_jobtype'] . '</label></a>
</li>';
}
else
{
echo '<li class="li_level3">
<a><label class="label_check_level3">
<input class="input_check_level3" type="checkbox" id="chkids" name="' . "fld_job_type" . '" value="' . $row['fld_jobtype'] . '"/>' . $row['fld_jobtype'] . '</label></a>
</li>';
}
}



$p++;
}

echo '</ul>';                                 






echo '</div>
</div>      
</div>';
}

?>



</form>


<div class="modal fade" id="myModacity" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel"aria-hidden="true" data-backdrop="static" data-keyboard="false">
<div class="modal-dialog modal-lg">
<div class="modal-content">
<div class="modal-header">
<button type="button" id="buttoncity_id" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>       
<h4 class="modal-title" id="myModalLabel">Cities</h4>
</div>
<div class="modal-body" style="overflow-x: hidden;overflow-y: scroll;height:650px;">


<h3>Select City</h3>
<?php


$querrycity  = "SELECT distinct fld_name FROM `tbl_cities` ORDER BY `fld_name`  Limit 1000";

$querrycity1 = mysql_query($querrycity);   
?>
<ul id="cityid">  
<li> 
<?php
$c=0;
while ($rowcity = mysql_fetch_array($querrycity1)) {
$cityname = ltrim($rowcity['fld_name'], "'");
?>

<input type="checkbox" name="citychk" value="<?php echo $cityname; ?>" id="chkidscity<?php echo $c; ?>">
<label for="<?php echo $cityname; ?>" class="checkboxLabel"><?php echo $cityname; ?></label>
<br>
<?php
$c++;}

?>                         
</li>
</ul>
</div>
</div>
</div>
</div>



<script type="text/javascript">

var valuescheck = [];
var values2check = [];
var citycheck = [];
var city2check = [];   

</script>

<script type="text/javascript">

//('input[name="checkBoxName"]:checked')

var $elems = $('.modal-body input[name="fld_industry_type"]').not(':first');
for(i = 0; i < $elems.length; i+=7) {
$set = $elems.slice(i, i+7);
$set.add($set.nextUntil('input')) .wrapAll('<div class="col"/>');
}

var $elems = $('.modal-body input[name="citychk"]').not(':first');
for(i = 0; i < $elems.length; i+=7) {
$set = $elems.slice(i, i+7);
$set.add($set.nextUntil('input')) .wrapAll('<div class="colcity"/>');
}


</script>
<style type="text/css">

.col { width: 40%; margin-right: 2%; float: left;}


.colcity { width: 25%; margin-right: 2%; float: left;}


</style>

</form>
</div>

<div class="col-md-8 col-sm-7 col-xs-12" >
<h4 class="search-result-text">Available job(s)</h4>
</div>

<div class="col-md-8 col-sm-7 col-xs-12">

<div class="all-jobs-list-box" id="rightpanel">
<?php
foreach ($city1 as $city11) {
$records1 .= "tp.fld_location like '%$city11%' OR ";
}
$records1 = substr($records1, 0, -3);

foreach ($skill1 as $skill11) {
$records11 .= "tp.fld_keyskills like '%$skill11%' OR ";
//$records11 = substr($records11, 0, -3);
}
$records11 = substr($records11, 0, -3);

$records1 = '(' .$records1 . ')';
$records11 = '(' .$records11. ')';

//$sql111 = substr($sql, 0, -3);

if ($city1 != '' && $skill1 == '') {
$pagin_query = "select count(*) as total from tbl_employer_details ed join tbl_postjob tp on (ed.fld_empid=tp.fld_empid) join tbl_employer e on (e.fld_id=ed.fld_empid) WHERE $records1";
//        $pagin_query1 = substr($pagin_query, 0, -3);
}
if ($skill1 != '' && $city1 == '') {
$pagin_query = "select count(*) as total from tbl_employer_details ed join tbl_postjob tp on (ed.fld_empid=tp.fld_empid) join tbl_employer e on (e.fld_id=ed.fld_empid) WHERE $records11";
//        $pagin_query1 = substr($pagin_query, 0, -3);
}
if ($city1 != '' && $skill1 != '') {
$pagin_query = "select count(*) as total from tbl_employer_details ed join tbl_postjob tp on (ed.fld_empid=tp.fld_empid) join tbl_employer e on (e.fld_id=ed.fld_empid) WHERE $records1 AND $records11";
//        $pagin_query1 = substr($pagin_query, 0, -3);
}

//    $exp = " AND SUBSTRING_INDEX(tp.fld_experience,',',1) IN ($exp1,$experience,$exp2) AND e.fld_emp_status=1 AND e.fld_delstatus=0 AND tp.fld_status=1 AND tp.fld_job_status=0 And ed.fld_delstatus =0";


if($experience !== ''){


$exp = " AND SUBSTRING_INDEX(tp.fld_experience,',',1) IN ($exp1,$experience,$exp2) AND tp.fld_expirydate >= CURDATE() AND e.fld_emp_status=1 AND e.fld_delstatus=0 AND tp.fld_job_status=1 AND tp.fld_delstatus=0 And ed.fld_delstatus =0";

} else {


$exp = " AND tp.fld_expirydate >= CURDATE() AND e.fld_emp_status=1 AND e.fld_delstatus=0 AND tp.fld_job_status=1 AND tp.fld_delstatus=0 And ed.fld_delstatus =0";
}


$pagin_query = $pagin_query . $exp;

$pagin_query11 = mysql_query($pagin_query);
$pagin_row = mysql_fetch_array($pagin_query11);
$total = $pagin_row['total'];
$dis = 5;
$total_page = ceil($total / $dis);

$page_cur = (isset($_GET['page'])) ? $_GET['page'] : 1;
$k = ($page_cur - 1) * $dis;




if ($city1 != '' && $skill1 == '') {
$sql = "select * from tbl_employer_details ed join tbl_postjob tp on (ed.fld_empid=tp.fld_empid) join tbl_employer e on (e.fld_id=ed.fld_empid) WHERE $records1";

//    $sql111 = substr($sql, 0, -3);
// $count=count($sql111);
//echo "1st".$sql = substr_replace($sql1, "", -1);
}
if ($skill1 != '' && $city1 == '') {
$sql    = "select * from tbl_employer_details ed join tbl_postjob tp on (ed.fld_empid=tp.fld_empid) join tbl_employer e on (e.fld_id=ed.fld_empid) WHERE $records11";
//    $sql111 = substr($sql, 0, -3);
}

if ($city1 != '' && $skill1 != '') {
$sql    = "select * from tbl_employer_details ed join tbl_postjob tp on (ed.fld_empid=tp.fld_empid) join tbl_employer e on (e.fld_id=ed.fld_empid) WHERE $records1 AND $records11";
//    $sql111 = substr($sql, 0, -3);
// $count=count($sql111);
}

// $sql = "select * from tbl_employer_details ed join tbl_postjob tp  on ed.fld_empid=tp.fld_empid WHERE $records1";
//echo "final".$sql = rtrim($sql, 'OR');                          
//$sql111 = substr($sql, 0, -3);

//$exp = " AND SUBSTRING_INDEX(tp.fld_experience,',',1) IN ($exp1,$experience,$exp2) AND e.fld_emp_status=1 AND e.fld_delstatus=0 AND tp.fld_status=1 AND tp.fld_job_status=0 And ed.fld_delstatus =0";

if($experience !== ''){


$exp = " AND SUBSTRING_INDEX(tp.fld_experience,',',1) IN ($exp1,$experience,$exp2) AND tp.fld_expirydate >= CURDATE() AND e.fld_emp_status=1 AND e.fld_delstatus=0 AND tp.fld_job_status=1 AND tp.fld_delstatus=0 And ed.fld_delstatus =0";

} else {


$exp = " AND tp.fld_expirydate >= CURDATE() AND e.fld_emp_status=1 AND e.fld_delstatus=0 AND tp.fld_job_status=1 AND tp.fld_delstatus=0 And ed.fld_delstatus =0";
}




$sql111 = $sql . $exp . " limit $k ,$dis";
//$sql111 = $sql111 . " limit $k ,$dis";

$records = mysql_query($sql111);

$cnt = mysql_num_rows($records);
//$count=count($records);
if($cnt >=0)
{

?>        


<?php
$projects = array();
while ($project = mysql_fetch_assoc($records)) {
$projects[] = $project;
}
$r = 0;
foreach ($projects as $project) {
$r++;
?>
<!--                                       <div class="job-box">
<div class="col-md-2 col-sm-2 col-xs-12 hidden-xs hidden-sm">

<div class="comp-logo">
<?php

//$test = $project['fld_logo'];
echo $emplogo = $project['fld_logo'];                                        

if(file_exists($emplogo) && (preg_match('/\.([^\.]+)$/', $emplogo)))
{                                     
?>
<img src="<?php echo $emplogo; ?>" class="img-responsive">
<?php
}
else
{
?>                                        
<img src="<?php echo "images/nopicture.jpg";?>" alt="">
<?php
}
?>
</div>
</div>
<div class="col-md-4 col-sm-4 col-xs-12 nopadding">

<div class="job-title-box">                                    
<?php
echo $project['fld_employer_name'];
?> 
<?php
echo $project['fld_country'];
?>   <?php
echo $project['fld_state'];
?>
</div>
</div>

<div class="col-md-4 col-sm-4 col-xs-6">
<a href="#">
<div class="job-type jt-remote-color">
<i class="fa fa-clock-o"></i> <?php
echo $project['fld_indusType'];
?>
<br/>
<i class="fa fa-user" aria-hidden="true"></i>
<?php
$exper       = explode(",", $project['fld_experience']);
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
</a>
</div>
<div class="col-md-2 col-sm-2 col-xs-12 nopadding">
<button  class="btn btn-primary btn-custom">Apply Now</button>

<a href="singlejob.php?jid=<?php
echo $project['fld_id'];
?>"><input type="button" class="btn btn-default btn-search-submit" value="Apply Now"/></a>

</div>
</div>-->
<?php
}
}
else
{
?>
<h4>There is no jobs available for your search term</h4>
<?php
}
?>

</div>

</div>



<div>
</div>
</div>
</div>
</div>
</section>

<?php @include("bottom.php");?>

<script src="http://malsup.github.com/jquery.form.js"></script>        

<script src="http://code.jquery.com/ui/1.9.2/jquery-ui.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/chosen/1.4.2/chosen.jquery.js"></script>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>


<link href="scripts/ddl/jquery.flexdatalist.css" rel="stylesheet" type="text/css">
<link href="scripts/ddl/jquery.flexdatalist.min.css" rel="stylesheet" type="text/css">
<script src="scripts/ddl/jquery.flexdatalist.min.js"></script>
<script src="scripts/ddl/jquery.flexdatalist.js"></script>

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


<script>
$('.city_allresults').flexdatalist({    
// limitOfValues: 3,
minLength: 1,
valueProperty: '*',
selectionRequired: true, 
textProperty: '{city}',
searchIn: 'city',
data: 'city.json'
});
$('.skill_allresults').flexdatalist({
// limitOfValues: 3,
minLength: 1,
valueProperty: '*',
selectionRequired: true, 
textProperty: '{skill}',
searchIn: 'skill',
data: 'skills.json'
});

</script>

<script type="text/javascript">

$(document).ready(function(){
//                              var ckbox = $('.chkids');
//                             $('.input_check_level3').on('click',function () {
//                             if (ckbox.is(':checked')) {
//                                 showValues();
//                             } else {
//                                 alert('You Un-Checked it');
//                             }
// });



var value = $("input[type='checkbox']:checked").val();
//alert(value);
if(value != ''){
showValues();
}
});

//                            $(document).ready(function () {
$(document).on('click','.load_more',function(){             
//                    alert("gfhfghg");
var ID = $(this).attr('id');
var searchby = $(this).data('searchby');
var city = $(this).data('city');
var skill = $(this).data('skill');
var experience = $(this).data('experience');
//                                    alert(city);
//                                    alert(skill);
$('.load_more').hide();
//                    $('.loding').show();
$.ajax({
type:'POST',
url:'ajax_company.php',
data:'action=load_more_search_company&id='+ID+'&searchby='+searchby+'&city='+city+'&skill='+skill+'&experience='+experience,
success:function(data){
//                            alert(data);
$('#load_more_main'+ID).remove();
$('.loadmore').append(data)
}
}); 
});
function compress(data)
{
data = data.replace(/([^&=]+=)([^&]*)(.*?)&\1([^&]*)/g, "$1$2,$4$3");
return /([^&=]+=).*?&\1/.test(data) ? compress(data) : data;

}

//                                function hasValue(elem) {
//                                return $(elem).filter(function() { return $(this).val(); }).length > 0;
//                                }

//            var test = <?php //echo $_GET['industype']; ?>    
//            alert(test+'robert');

function showValues()
{
//                                    alert($("#form3").serialize());
var str = compress($("#form3").serialize());

//alert(str);
var city = $("#city").val();                
var skill = $("#skill").val();
var experience = $("#experience").val();
//  alert(experience);

//                                if ($.inArray(str, str) != -1)
//                                {
//                                  alert("found");
//                                }

//                                      alert(str);
if (str != '')
{
//                                        $('.pagination').hide();
$.ajax({
type: "POST",
url: "refine.php",
data: {
"formData": str , city: city, skill: skill, experience: experience
},
datatype: 'data',
success: function (data)
{
//alert(data);
$('#rightpanel').html(data);

}
});

}
else
{

var city = $("#city").val();                
var skill = $("#skill").val(); 
var experience = $("#experience").val(); 

var k = <?php echo $k; ?>;
var dis = <?php echo $dis; ?>;
var page_cur = <?php echo $page_cur; ?>;
//                                      alert (dis);
//                                        if((search_city == '' && search_skill == '')||(search_city == 'null' && search_skill == 'null')){
//                                            $('.pagination').hide(); 
//                                            } else {
//                                        $('.pagination').show();
//                                    }
$.ajax({
type: "POST",
url: "refine.php",
data : {city: city , skill: skill, experience: experience, k: k, dis: dis, page_cur: page_cur},
//                                            data : {city: city , skill: skill, experience: experience},
datatype: 'data',
success: function (data)
{
//alert(data);
$('#rightpanel').html(data);
}
});


}

}
$("input[type='checkbox']").on("click", showValues);
showValues();

//                            });
function fn_search()
{
//                                var city1 = $("#search_city").val();  
//                                var skill1 = $("#search_skill").val();

var user_id = '<?php echo $user_id; ?>';
//                                var test_city = $(".city_allresults").val();
var city1 = $(".city_allresults").val();
//                                var test_skill = $(".skill_allresults").val();
var skill1 = $(".skill_allresults").val();
//                                if(test_city != ''){
//                                data = JSON.parse(test_city);
//                                var data_length = Object.keys(data).length;
//                                for (var i = 0; i < data_length; i++) {
//                                    if (data[i] != '') {
//                                //      console.log('city:',data[i].city);
//                                      city_name.push(data[i].city);
//
//                                    }
//                                  }
//                                }
//                                
//                                if(test_skill != ''){
//                                data = JSON.parse(test_skill);
//                                var data_length = Object.keys(data).length;
//                                for (var i = 0; i < data_length; i++) {
//                                    if (data[i] != '') {
//                                      skill_name.push(data[i].skill);
//                                    }
//                                  }
//                                }
//                                var city1 = city_name.join(",");
//                                var skill1 = skill_name.join(",");

var experience1 = $("#search_experience").val();
var city = $.trim(city1);
var skill = $.trim(skill1);
var experience = $.trim(experience1);
if(city == null)
{
var city = "";
}
if(skill == null)
{
var skill = "";
}
if(experience == null)
{
var experience = "";
}
if((city == '' && skill == '' && experience == '')||(city == 'null' && skill == 'null' && experience == 'null')){
swal(
'',
'Select any one!',
'warning'
)            
} 
else if(user_id)
{               
$.ajax({
type: "POST",
url: "seeker_extra_details_inner.php?op=addvisit",
data: '&city=' + city + '&skill=' + skill + '&experience=' + experience,
cache: false,
success: function (response) {
response = $.trim(response);

if (response == 1)
{
window.location.href="searchjoblist.php?action=joblist&city="+city+"&skill="+skill+"&experience="+experience;
}
}
});
}

else
{				                            
window.location.href="searchjoblist.php?action=joblist&city="+city+"&skill="+skill+"&experience="+experience;
}
}


//                            function fn_search()
//                            {
//
////alert("hai");
//			   
//                            var skill = $("#search_skill").val();
////			    var skill1 = $.trim(skill);
//                            var exp = $("#search_experience").val();
//			    var experience = $.trim(exp);
//			    var lang = $("#search_city").val();
//			   // var lang1 = $.trim(lang);
//			    
//			    var user_id = '<?php echo $user_id; ?>';
//			    
//			    
// 
//			    
//			    if(((skill == null) && (lang == null) && (exp == 'null')) ||((skill == '') && (lang == '') && (exp == ''))) {
//				alert("select atleast one");
//			    } else if (user_id)
//                            {
//
//				$.ajax({
//				    type: "POST",
//				    url: "seeker_extra_details_inner.php?op=addvisit",
//				    data: '&city=' + lang + '&skill=' + skill + '&experience=' + experience,
//				    cache: false,
//				    success: function (response) {
//					response = $.trim(response);
//					if (response == 1)
//                            {
//					    window.location.href = "searchjoblist.php?action=joblist&city=" + lang + "&skill=" + skill + "&experience=" + experience;
//                            }
//                            }
//				});
//			    } else {
//				window.location.href = "searchjoblist.php?action=joblist&city=" + lang + "&skill=" + skill + "&experience=" + experience;
//                            }                
//
//
//			    
//                            }




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