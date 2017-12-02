<?php
error_reporting(0);
ob_start();
include ("includes/config.php");

session_start();
	
	/* @include("social_headers.php");*/
$kw = $_REQUEST['kwords'];
$location = $_REQUEST['location'];
$locate = $_REQUEST['locate'];
$posted_date=$_REQUEST['posted_date'];
$catagory = $_REQUEST['catagory'];
$job_type = $_REQUEST['jobtype'];

if(($kw == '') && ($location == '')) {
header('Location: suggest_joblist.php',false);
ob_end_flush();
}

$query1="SELECT * FROM postjob  WHERE ";

if (($kw!='') && ($location == ""))
{

$query1  .= " CONCAT(`keyskills`, ' ', `jobtitle`)  LIKE '%".$kw."%'";
}

if (($kw!='') && ($location != ""))
{

$query1  .= " CONCAT(`keyskills`, ' ', `jobtitle`)  LIKE '%".$kw."%' AND location LIKE '%".$location."%'";
}

if (($location!='') && ($kw == ""))
{

	$query1  .= " location LIKE '%".$location."%'";
}

if ($locate!='')
{
		if (($kw!='')||($location!='')){ 	$query1 .= ' and ' ;	}
$query1  .= " location = '".$locate."'";
}


if ($posted_date!='')
{
		if  (($kw!='')||($locate!='')||($location!='')) { $query1 .= ' and '; }
	$query1  .= " NOW( ) - INTERVAL '".$posted_date."' DAY <  `postdate`";
}
if ($catagory!='')
{
		if  (($kw!='')||($location!='') || ($posted_date!='')) { $query1 .= ' and '; }
	$query1  .= " employer_name = '".$catagory."'";
}
if ($job_type!='')
{
		if  (($kw!='')||($location!='') || ($posted_date!='') || ($catagory!='')) { $query1 .= ' and '; }
	$query1  .= " job_type = '".$job_type."'";
}



$pagin_query = mysql_query($query1);

	$total=mysql_num_rows($pagin_query);
	$dis=10;
	$total_page=ceil($total/$dis);
	$page_cur=(isset($_GET['page']))?$_GET['page']:1;
	$k=($page_cur-1)*$dis;


$query="SELECT * FROM postjob  WHERE ";

if (($kw!='') && ($location == ""))
{

$query  .= " CONCAT(`keyskills`, ' ', `jobtitle`)  LIKE '%".$kw."%'";
}

if (($kw!='') && ($location != ""))
{

$query  .= " CONCAT(`keyskills`, ' ', `jobtitle`)  LIKE '%".$kw."%' AND location LIKE '%".$location."%'";
}

if (($location!='') && ($kw == ""))
{

	$query  .= " location LIKE '%".$location."%'";
}

if ($locate!='')
{
		if (($kw!='')||($location!='')){ 	$query .= ' and ' ;	}
$query  .= " location = '".$locate."'";
}


if ($posted_date!='')
{
		if  (($kw!='')||($locate!='')||($location!='')) { $query .= ' and '; }
	$query  .= " NOW( ) - INTERVAL '".$posted_date."' DAY <  `postdate`";
}
if ($catagory!='')
{
		if  (($kw!='')||($location!='') || ($posted_date!='')) { $query .= ' and '; }
	$query  .= " employer_name = '".$catagory."'";
}
if ($job_type!='')
{
		if  (($kw!='')||($location!='') || ($posted_date!='') || ($catagory!='')) { $query .= ' and '; }
	$query  .= " job_type = '".$job_type."'";
}

$query .= "ORDER BY id DESC limit $k,$dis";	

$pagin_query = mysql_query($query);



?>
<!DOCTYPE html>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Job Search | StaffingSpot</title>

<link rel="stylesheet" type="text/css" href="styles/bootstrap.css"/>
<link href="styles/styles_basic.css" rel="stylesheet" type="text/css" />
<link rel="stylesheet" href="lib_files/font-awesome-4.0.3-css-font-awesome.min.css" />
<link rel="stylesheet" href="//code.jquery.com/ui/1.11.2/themes/smoothness/jquery-ui.css">
  <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
        <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
        <!--[if lt IE 9]>
          <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
          <script src="https://oss.maxcdn.com/libs/respond.js/1.3.0/respond.min.js"></script>
        <![endif]-->

<script type="text/javascript" src="js/jquery-1.10.2.min.js"></script>
<script type="text/javascript" src="js/bootstrap.js"></script>
<script type="text/javascript" src="js/custom.js"></script>
<script type="text/javascript" src="js/bootstrap-dropdown.js"></script>

<script>
	
	$(document).ready(function() {
		
		$( ".button-search" ).hover(function() {
			$("#search input").addClass('hover_search');
			$("#search input").removeClass('main_search');
			$(".input_close").css('display', 'block');
		});
		
		$( ".input_close" ).click(function() {
			$("#search input").addClass('main_search');
			$("#search input").removeClass('hover_search');
			$(".input_close").css('display', 'none');
		});

	
	$('.carousel').carousel();
	});
</script>
<script src="lib_files/ajax-libs-jqueryui-1.11.2-jquery-ui.min.js"></script>
<script>
function submitform()
{
    document.myform.submit();
}
	$(document).ready(function() {		
		$( ".button-search" ).hover(function() {
			$("#search input").addClass('hover_search');
			$("#search input").removeClass('main_search');
			$(".input_close").css('display', 'block');
		});		
		$( ".input_close" ).click(function() {
			$("#search input").addClass('main_search');
			$("#search input").removeClass('hover_search');
			$(".input_close").css('display', 'none');
		});
	});
</script>
<script type="text/javascript">
$(document).ready(function() {
$('#kwords').autocomplete({
		      	source: function( request, response ) {
		      		$.ajax({
		      			url : 'search.php',
		      			dataType: "json",
						data: {
						   name_startsWith: request.term,
						   type: 'country'
						   
						},
						 success: function( data ) {
							 response( $.map( data, function( item ) {
								return {
									label: item,
									value: item
								}
							}));
						}
		      		});
		      	},
		      	autoFocus: true,
		      	minLength: 0,				  	
		      });			  
			  });
</script>
<script type="text/javascript">
$(document).ready(function() {
$('#location').autocomplete({
		      	source: function( request, response ) {
		      		$.ajax({
		      			url : 'search.php',
		      			dataType: "json",
						data: {
						   name_With: request.term,
						   type: 'zipcode'
						   
						},
						 success: function( data ) {
							 response( $.map( data, function( item ) {
								return {
									label: item,
									value: item
								}
							}));
						}
		      		});
		      	},
		      	autoFocus: true,
		      	minLength: 0,
				    	
		      });			  
			  });
</script>

</head>

<body>


<?php include "includes/header.php"; 

if($session_seekid != "") {
	
	if(($kw != '') || ($location != '')) {
	
			$recent_query = mysql_query("select * from job_recent_search where keywords='".$kw."' and location='".$location."' and seekerid ='".$session_seekid."'");
		$recent_count = mysql_num_rows($recent_query);
		
		
			if($recent_count == 0){
			
				mysql_query("insert into job_recent_search(seekerid,keywords,location)values('".$session_seekid."','".$kw."','".$location."')");	
					
		} elseif($recent_count > 0) {
			
			 mysql_query("update job_recent_search set keywords='".$kw."', location='".$location."' where seekerid='".$session_seekid."' order by created_date desc limit 1");

		
		}
	}
}

?> 




<div class="container-fluid white_bg">

<div class="col-md-12" style="margin-top:10px;">
<div class="col-md-2" style="margin-top:10px;">

<!-- Refine Search title Panel -->

<!--<div class="panel panel-warning" style="margin-bottom:0px;">
<div class="panel-heading"><h3 class="panel-title">Refine Your Search</h3></div>
</div>-->
<!-- Refine Job posted  Panel -->
<div class="panel panel-default">
<div class="panel-heading"><h3 class="panel-title">Job Posted in</h3></div>
<div class="panel-body">
<?php
if(($kw != "") && ($location != "")){
	   $pd_query = mysql_query("SELECT COUNT(postdate) AS pd FROM postjob WHERE NOW( ) - INTERVAL 24 
HOUR <  `postdate` AND CONCAT(`keyskills`, ' ', `jobtitle`) LIKE '%".$kw."%' AND location LIKE '%".$location."%'");
		$pd_array = mysql_fetch_array($pd_query);
		$pd_count = $pd_array['pd'];
		
		/*$pd_query1 = mysql_query("SELECT COUNT(postdate) AS pd FROM postjob WHERE NOW( ) - INTERVAL 5 
DAY <  `postdate` AND CONCAT(`keyskills`, ' ', `jobtitle`) LIKE '%".$kw."%' AND location LIKE '%".$location."%'");
		$pd_array1 = mysql_fetch_array($pd_query1);
		$pd_count1 = $pd_array1['pd'];*/
		
		$pd_query2 = mysql_query("SELECT COUNT(postdate) AS pd FROM postjob WHERE NOW( ) - INTERVAL 7 
DAY <  `postdate` AND CONCAT(`keyskills`, ' ', `jobtitle`) LIKE '%".$kw."%' AND location LIKE '%".$location."%'");
		$pd_array2 = mysql_fetch_array($pd_query2);
		$pd_count2 = $pd_array2['pd'];
		
		$pd_query3 = mysql_query("SELECT COUNT(postdate) AS pd FROM postjob WHERE NOW( ) - INTERVAL 30 
DAY <  `postdate` AND CONCAT(`keyskills`, ' ', `jobtitle`) LIKE '%".$kw."%' AND location LIKE '%".$location."%'");
		$pd_array3 = mysql_fetch_array($pd_query3);
		$pd_count3 = $pd_array3['pd'];
		
		$pd_query4 = mysql_query("SELECT COUNT(postdate) AS pd FROM postjob WHERE NOW( ) - INTERVAL 60 
DAY <  `postdate` AND CONCAT(`keyskills`, ' ', `jobtitle`) LIKE '%".$kw."%' AND location LIKE '%".$location."%'");
		$pd_array4 = mysql_fetch_array($pd_query4);
		$pd_count4 = $pd_array4['pd'];
		
		$pd_query5 = mysql_query("SELECT COUNT(postdate) AS pd FROM postjob WHERE NOW( ) - INTERVAL 1000 
DAY <  `postdate` AND CONCAT(`keyskills`, ' ', `jobtitle`) LIKE '%".$kw."%'");
		$pd_array5 = mysql_fetch_array($pd_query5);
		$pd_count5 = $pd_array5['pd'];

	} elseif(($kw != "") && ($location == "")) {
		 $pd_query = mysql_query("SELECT COUNT(postdate) AS pd FROM postjob WHERE NOW( ) - INTERVAL 24 
HOUR <  `postdate` AND CONCAT(`keyskills`, ' ', `jobtitle`) LIKE '%".$kw."%' ");
		$pd_array = mysql_fetch_array($pd_query);
		$pd_count = $pd_array['pd'];
		
		/*$pd_query1 = mysql_query("SELECT COUNT(postdate) AS pd FROM postjob WHERE NOW( ) - INTERVAL 5 
DAY <  `postdate` AND CONCAT(`keyskills`, ' ', `jobtitle`) LIKE '%".$kw."%'");
		$pd_array1 = mysql_fetch_array($pd_query1);
		$pd_count1 = $pd_array1['pd'];*/
		
		$pd_query2 = mysql_query("SELECT COUNT(postdate) AS pd FROM postjob WHERE NOW( ) - INTERVAL 7 
DAY <  `postdate` AND CONCAT(`keyskills`, ' ', `jobtitle`) LIKE '%".$kw."%'");
		$pd_array2 = mysql_fetch_array($pd_query2);
		$pd_count2 = $pd_array2['pd'];
		
		$pd_query3 = mysql_query("SELECT COUNT(postdate) AS pd FROM postjob WHERE NOW( ) - INTERVAL 30 
DAY <  `postdate` AND CONCAT(`keyskills`, ' ', `jobtitle`) LIKE '%".$kw."%'");
		$pd_array3 = mysql_fetch_array($pd_query3);
		$pd_count3 = $pd_array3['pd'];
		
		$pd_query4 = mysql_query("SELECT COUNT(postdate) AS pd FROM postjob WHERE NOW( ) - INTERVAL 60 
DAY <  `postdate` AND CONCAT(`keyskills`, ' ', `jobtitle`) LIKE '%".$kw."%'");
		$pd_array4 = mysql_fetch_array($pd_query4);
		$pd_count4 = $pd_array4['pd'];
		
		$pd_query5 = mysql_query("SELECT COUNT(postdate) AS pd FROM postjob WHERE NOW( ) - INTERVAL 1000 
DAY <  `postdate` AND CONCAT(`keyskills`, ' ', `jobtitle`) LIKE '%".$kw."%'");
		$pd_array5 = mysql_fetch_array($pd_query5);
		$pd_count5 = $pd_array5['pd'];

	} elseif(($kw == "") && ($location != "")){
 $pd_query = mysql_query("SELECT COUNT(postdate) AS pd FROM postjob WHERE NOW( ) - INTERVAL 24 
HOUR <  `postdate` AND location LIKE '%".$location."%'");
		$pd_array = mysql_fetch_array($pd_query);
		$pd_count = $pd_array['pd'];
		
		/*$pd_query1 = mysql_query("SELECT COUNT(postdate) AS pd FROM postjob WHERE NOW( ) - INTERVAL 5 
DAY <  `postdate` AND location LIKE '%".$location."%'");
		$pd_array1 = mysql_fetch_array($pd_query1);
		$pd_count1 = $pd_array1['pd'];*/
		
		$pd_query2 = mysql_query("SELECT COUNT(postdate) AS pd FROM postjob WHERE NOW( ) - INTERVAL 7 
DAY <  `postdate` AND location LIKE '%".$location."%'");
		$pd_array2 = mysql_fetch_array($pd_query2);
		$pd_count2 = $pd_array2['pd'];
		
		$pd_query3 = mysql_query("SELECT COUNT(postdate) AS pd FROM postjob WHERE NOW( ) - INTERVAL 30 
DAY <  `postdate` AND location LIKE '%".$location."%'");
		$pd_array3 = mysql_fetch_array($pd_query3);
		$pd_count3 = $pd_array3['pd'];
		
		$pd_query4 = mysql_query("SELECT COUNT(postdate) AS pd FROM postjob WHERE NOW( ) - INTERVAL 60 
DAY <  `postdate` AND location LIKE '%".$location."%'");
		$pd_array4 = mysql_fetch_array($pd_query4);
		$pd_count4 = $pd_array4['pd'];
		
		$pd_query5 = mysql_query("SELECT COUNT(postdate) AS pd FROM postjob WHERE NOW( ) - INTERVAL 1000 
DAY <  `postdate` AND location LIKE '%".$location."%'");
		$pd_array5 = mysql_fetch_array($pd_query5);
		$pd_count5 = $pd_array5['pd'];
	}
 ?>

  <div class="radio">
          <label><input  type="radio" name="posted_date" onclick="window.location='job_list.php?kwords=<?php  echo $kw;?>&locate=<?php echo $filter_loc; ?>&location=<?php echo $location; ?>&posted_date=1'" value="1" <?php  if($posted_date == "1") echo 'checked="checked"'?>>< 24hrs&nbsp;(<?php echo  $pd_count; ?>)</label>
        </div>
        
        <div class="radio">
          <label><input type="radio" name="posted_date" onclick="window.location='job_list.php?kwords=<?php  echo $kw;?>&locate=<?php echo $filter_loc; ?>&location=<?php echo $location; ?>&posted_date=7'" value="7"<?php  if($posted_date == "7") echo 'checked="checked"'?>>7 Days&nbsp;(<?php echo $pd_count2; ?>)</label>
        </div>
        <div class="radio">
          <label><input type="radio" name="posted_date" onclick="window.location='job_list.php?kwords=<?php  echo $kw;?>&locate=<?php echo $filter_loc; ?>&location=<?php echo $location; ?>&posted_date=30'" value="30" <?php  if($posted_date == "30") echo 'checked="checked"'?>>30 Days&nbsp;(<?php echo $pd_count3; ?>)</label>
        </div>
        <div class="radio">
          <label><input type="radio" name="posted_date" onclick="window.location='job_list.php?kwords=<?php  echo $kw;?>&locate=<?php echo $filter_loc; ?>&location=<?php echo $location; ?>&posted_date=60'" value="60" <?php  if($posted_date == "60") echo 'checked="checked"'?>>60 Days&nbsp;(<?php echo $pd_count4; ?>)</label>
        </div>
         <div class="radio">
          <label><input type="radio" name="posted_date" onclick="window.location='job_list.php?kwords=<?php  echo $kw;?>&locate=<?php echo $filter_loc; ?>&location=<?php echo $location; ?>&posted_date=1000'" value="60" <?php  if($posted_date == "1000") echo 'checked="checked"'?>> Above 60 Days&nbsp;(<?php echo $pd_count5; ?>)</label>
        </div>
         </div>
</div>

<!-- Refine Job Location Panel -->

<div class="panel panel-default">
<div class="panel-heading"><h3 class="panel-title">Job Location</h3></div>
<div class="panel-body">

<?php
if($kw != "") {
 $filter_loc_query = mysql_query("SELECT DISTINCT location FROM postjob WHERE CONCAT(`keyskills`, ' ', `jobtitle`) LIKE '%".$kw."%'");
} elseif($location != ""){
	 $filter_loc_query = mysql_query("SELECT DISTINCT location FROM postjob WHERE location LIKE '%".$location."%'");
	}
      while($filter_loc_array = mysql_fetch_array($filter_loc_query)) {
	  		$filter_loc = $filter_loc_array['location'];
					
					$fil_query = mysql_query("SELECT COUNT(location) as total FROM postjob WHERE location='$filter_loc' AND CONCAT(`keyskills`, ' ', `jobtitle`) LIKE '%".$kw."%'");
					$a=1;
					while($fil_array =mysql_fetch_array($fil_query)){
						$a++;
						$fil_count = $fil_array['total'];	  
	   ?>
 <div class="checkbox">
          <label><input type="checkbox" name="radio_location" onclick="window.location='job_list.php?kwords=<?php  echo $kw;?>&location=<?php echo $filter_loc; ?>'"  value="<?php echo $filter_loc; ?>" <?php if($location == $filter_loc) echo 'checked="checked"' ?> /><?php echo $filter_loc." "."(".$fil_count.")"; ?></label>
        </div>
      <?php } } ?>  
      
     </div></div>   
 
<!-- Refine Company Name Panel -->
     
<div class="panel panel-default">
     <div class="panel-heading"><h3 class="panel-title">Company Name</h3></div>
     <div class="panel-body">
        <?php
	 $filter_cat_query = mysql_query("SELECT DISTINCT employer_name FROM postjob WHERE CONCAT(`keyskills`, ' ', `jobtitle`) LIKE '%".$kw."%' AND location LIKE '%".$location."%'");	
		while($filter_cat_array=mysql_fetch_array($filter_cat_query)){
			$filter_cat = $filter_cat_array['employer_name'];
			
			$cat_query =mysql_query("SELECT COUNT(employer_name) as total FROM postjob WHERE employer_name='$filter_cat' AND CONCAT(`keyskills`, ' ', `jobtitle`) LIKE '%".$kw."%' AND location LIKE '%".$location."%'");				
	
				while($cat_array = mysql_fetch_array($cat_query)){
					$cat_count = $cat_array['total'];
					?>
                    <div class="checkbox">
          <label>
			  <input type="checkbox" onclick="window.location='job_list.php?kwords=<?php  echo $kw;?>&location=<?php echo $location; ?>&catagory=<?php echo $filter_cat; ?>'" value="<?php echo $filter_cat; ?>" <?php if($catagory == $filter_cat) echo 'checked="checked"' ?>  /><?php echo $filter_cat." "."(".$cat_count.")" ?></label>
              </div>                   
					<?php	} }	?>
 

</div>
</div>

<!-- Refine Job Type Panel -->

<div class="panel panel-default">
<div class="panel-heading"><h3 class="panel-title">Job Type</h3></div>
<div class="panel-body">
<?php
if(($kw != "") && ($location == "")) {
 $filter_type_query = mysql_query("SELECT DISTINCT job_type FROM postjob WHERE CONCAT(`keyskills`, ' ', `jobtitle`) LIKE '%".$kw."%'");
} elseif(($kw != "") && ($location != "")){
	 $filter_type_query = mysql_query("SELECT DISTINCT job_type FROM postjob WHERE CONCAT(`keyskills`, ' ', `jobtitle`) LIKE '%".$kw."%' AND location LIKE '%".$location."%'");
	} elseif(($kw == "") && ($location != "")){
	 $filter_type_query = mysql_query("SELECT DISTINCT job_type FROM postjob WHERE location LIKE '%".$location."%'");
	} 
      while($filter_type_array = mysql_fetch_array($filter_type_query)) {
	  		$filter_type = $filter_type_array['job_type'];
					
					$type_query = mysql_query("SELECT COUNT(job_type) as total FROM postjob WHERE job_type='$filter_type' AND CONCAT(`keyskills`, ' ', `jobtitle`) LIKE '%".$kw."%'");
					$a=1;
					while($type_array =mysql_fetch_array($type_query)){
						$a++;
						$type_count = $type_array['total'];	  
	   ?>
 <div class="radio">
          <label><input type="radio" name="radio_location" onclick="window.location='job_list.php?kwords=<?php  echo $kw;?>&location=<?php echo $location; ?>&jobtype=<?php echo $filter_type; ?>'"  value="<?php echo $filter_type; ?>" <?php if($job_type == $filter_type) echo 'checked="checked"' ?> /><?php echo $filter_type." "."(".$type_count.")"; ?></label>
        </div>
      <?php } } ?>

</div>
</div>


</div>

<div class="col-md-7" style="margin-top:10px">
<div class="panel1 panel-default1">
<div class="panel-heading1"><h3 class="panel-title">Job Listing</h3></div>
<div class="panel-body">

<?php if($locate == "") { ?>

<ul class="joblist">
<?php 
  //-query  the database table
$seek_show = mysql_query($query);
		
	$seek_count = mysql_num_rows($seek_show);
	
	 if($seek_count > 0)
 {
 while($seek_result = mysql_fetch_array($seek_show))
 { 
 		$id = $seek_result['jobcode'];
		$name = $seek_result['jobtitle'];
		$location1=$seek_result['location'];
		$pdate=$seek_result['postdate'];
		$desc = $seek_result['description'];
		$exp=$seek_result['experience'];
		$empid=$seek_result['empid'];
		$empname=$seek_result['employer_name'];
		$postdate = date_create($seek_result['postdate']);
		$today = date_format($postdate,"F j, Y");               


	
		
 ?>
<li> <a href="job_details_seek.php?id=<?php echo $id; ?>"> 
<h4 style="color:#006699"><?php echo $name;?></h4> </a>
<a href="company_detail.php?empid=<?php echo $empid; ?>"><h4><?php echo $empname;?></h4></a>
<h5><span class="glyphicon glyphicon-map-marker" aria-hidden="true" style="margin-right:5px"></span><?php echo $location1;?></h5>
<h5 class="clr_both">Last Update : <small><?php echo $today; ?></small></h5>

</li>

<?php } } else { 
?>

<style>
.panel-heading1 {
	display:none;
}

.panel-default1 {
	border:none;	
}
.panel1 {
	box-shadow:none;	
}



</style>


<div class="col-md-10 top_space UploadSuccess">
<div class="alert alert-danger" role="alert">
 <p class="text-center">No result Found...</p>
 <p class="text-center"><a href="suggest_joblist.php" class="alert-link">Click Here To View Recent Jobs</a></p>
</div>	
	</div>

<?php
 } ?>
</ul>

<?php } elseif(($kw!="") && ($locate!="")) { ?>

<ul class="joblist">
<?php


  
  //-query  the database table
$seek_show = mysql_query($query);
		
	$seek_count = mysql_num_rows($seek_show);
	
	 if($seek_count > 0)
 {
 while($seek_result = mysql_fetch_array($seek_show))
 { 
  		$id = $seek_result['jobcode'];
		$name = $seek_result['jobtitle'];
		$location1=$seek_result['location'];
		$pdate=$seek_result['postdate'];
		$desc = $seek_result['description'];
		$exp=$seek_result['experience'];
		$empid=$seek_result['empid'];
		$empname=$seek_result['employer_name'];
		$postdate = date_create($seek_result['postdate']);
		$today = date_format($postdate,"F j, Y");               


	
		
 ?>
<li> <a href="job_details_seek.php?id=<?php echo $id; ?>"> 
<h4 style="color:#006699"><?php echo $name;?></h4> </a>
<a href="company_detail.php?empid=<?php echo $empid; ?>"><h4><?php echo $empname;?></h4></a>
<h5><span class="glyphicon glyphicon-map-marker" aria-hidden="true" style="margin-right:5px"></span><?php echo $location1;?></h5>
<h5 class="clr_both">Last Update : <small><?php echo $today; ?></small></h5>

</li>

<?php } 


} else {  ?>


 <style>
.panel-heading1 {
	display:none;
}

.panel-default1 {
	border:none;	
}
.panel1 {
	box-shadow:none;	
}



</style>


<div class="col-md-10 top_space UploadSuccess">
<div class="alert alert-danger" role="alert">
 <p class="text-center">No result Found...</p>
 <p class="text-center"><a href="suggest_joblist.php" class="alert-link">Click Here To View Recent Jobs</a></p>
</div>	
	</div>


<?php 
}
}  ?>
</ul>

<?php if($seek_count > 0) {  ?>
<ul class="pagination" style="font-weight:bolder;">
<?php if($page_cur>1) { ?>

<li class="disabled" ><a href="job_list.php?kwords=<?php echo $kw; ?>&location=<?php echo $location; ?>&posted_date=<?php echo $posted_date ?>&catagory=<?php echo $catagory; ?>&jobtype=<?php echo $job_type; ?>&page=<?php echo ($page_cur-1);?>">Prev</a></li>
<?php } else { ?>
<li class="active"><a>Prev</a></li>
<?php } for($i=1;$i<$total_page;$i++) {
	
		if($page_cur==$i)
		{ ?>
        <li class="active"><a><?php echo $i; ?></a></li>
  
  <?php } else { ?>
  <li class="disabled" ><a href="job_list.php?kwords=<?php echo $kw; ?>&location=<?php echo $location; ?>&posted_date=<?php echo $posted_date ?>&catagory=<?php echo $catagory; ?>&jobtype=<?php echo $job_type; ?>&page=<?php echo $i; ?>"><?php echo $i; ?></a></li>
  
  <?php } }
	if($page_cur<$total_page) {?>
    
    <li class="disabled" ><a href="job_list.php?kwords=<?php echo $kw; ?>&location=<?php echo $location; ?>&posted_date=<?php echo $posted_date ?>&catagory=<?php echo $catagory; ?>&jobtype=<?php echo $job_type; ?>&page=<?php echo ($page_cur+1); ?>">Next >></a></li>
    <?php } else { ?>
		
		<li class="active" ><a>Next >></a></li>
		<?php }  ?>
		 
  
</ul>
<?php }  ?>


<?php echo $invalid;  ?>
</div>
</div>
</div>

<div class="col-sm-2 top_space">

<div id="carousel" class="carousel slide carousel-fade" data-ride="carousel">
 
  <!-- Carousel items -->
  <div class="carousel-inner">
    <div class="active item"><a href="#"><img src="ad banner images/vertical-ad.jpg" class="img-responsive"></a></div>
    <div class="item"><a href="#"><img src="ad banner images/vertical-ad5.jpg" class="img-responsive"></a></div>
    <div class="item"><a href="#"><img src="ad banner images/vertical-ad3.jpg" class="img-responsive"></a></div>
    <div class="item"><a href="#"><img src="ad banner images/vertical-ad2.jpg" class="img-responsive"></a></div>
    <div class="item"><a href="#"><img src="ad banner images/vertical-ad4.jpg" class="img-responsive"></a></div>
  </div>
  <!-- Carousel nav -->
</div>
</div>
</div>








</div>
<?php include 'includes/view_appliedjob.php'; ?>
<?php include "includes/login_popup.php"; ?>
<?php include("includes/footer.php"); ?>




</body>
</html>
