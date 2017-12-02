<?php
error_reporting(0);
include ("includes/config.php");
session_start();
$facebook=$_SESSION['facebook'];
$userdata=$_SESSION['userdata'];
$fbemail = $userdata['email']; 

$usergoogle = $_SESSION['google_data'];
$gooemail = $usergoogle['email'];
if($fbemail == ''){
require 'includes/facebook.php';
require 'includes/fbconfig.php';
}
if($gooemail == ''){
require_once 'google/Google_Client.php';
require_once 'google/contrib/Google_Oauth2Service.php';
}
if($_SESSION['tw_oauth_id'] == "" ) { 
require_once('twitteroauth/twconfig.php');
require_once('twitteroauth/twitteroauth.php');
}
$location = $_REQUEST['location'];
$posted_date=$_REQUEST['posted_date'];
$catagory = $_REQUEST['catagory'];
$jobtype = $_REQUEST['job_type'];	
$query1="SELECT * FROM postjob  WHERE status='1'";
if (($location != ""))
{
$query1  .= "and  location LIKE '%".$location."%' ";
}
if ($posted_date!='')
{
	if  (($location!='')) { $query1 .= ' and '; } else { $query .= ' and '; }
	$query1  .= " NOW( ) - INTERVAL '".$posted_date."' DAY <  `postdate`";
}
if ($catagory!='')
{
	if  (($location!='') || ($posted_date!='')) { $query1 .= ' and '; } else { $query .= ' and '; }
	$query1  .= " employer_name = '".$catagory."'";
}	
if ($jobtype != '')
{
	if  (($location!='') || ($posted_date!='') || ($catagory!='')) { $query1 .= ' and '; } else { $query .= ' and '; }
	$query1  .= " job_type = '".$jobtype."'";
}	
        $pagin_query = mysql_query($query1); 
	$total=mysql_num_rows($pagin_query);
	$dis=10;
	$total_page=ceil($total/$dis);
	$page_cur=(isset($_GET['page']))?$_GET['page']:1;
	$k=($page_cur-1)*$dis;
        
        if(($location != "") || ($catagory != "") || ($posted_date != "")) {
	
$query="SELECT * FROM postjob  WHERE status='1'";


if (($location != ""))
{

$query  .= "AND location LIKE '%".$location."%' ";

}



if ($posted_date!='')
{
	
		if  (($location!='')) { $query .= ' and '; } else { $query .= ' and '; }
	$query  .= " NOW( ) - INTERVAL '".$posted_date."' DAY <  `postdate`";
	
}
if ($catagory!='')
{
		if  (($location!='') || ($posted_date!='')) { $query .= ' and '; } else { $query .= ' and '; }
	$query  .= " employer_name = '".$catagory."'";
	
}	

if ($jobtype != '')
{
		if  (($location!='') || ($posted_date!='') || ($catagory!='')) { $query .= ' and '; } else { $query .= ' and '; }
	$query  .= " job_type = '".$jobtype."'";
	
}	

$query .= "ORDER BY id DESC limit $k,$dis";	
} else {
 $query = "select * from postjob where status='1' ORDER BY id DESC limit $k,$dis";	
	
}



?>
<!DOCTYPE html>
<html >
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>StaffingSpot | Suggestions</title>


<link rel="stylesheet" type="text/css" href="styles/bootstrap.css"/>
<link rel="stylesheet" type="text/css" href="styles/styles_basic.css" />
<link rel="stylesheet" href="lib_files/font-awesome-4.0.3-css-font-awesome.min.css" />
<link rel="stylesheet" href="//code.jquery.com/ui/1.11.2/themes/smoothness/jquery-ui.css">
<!--<link rel="stylesheet" href="//code.jquery.com/ui/1.11.2/themes/smoothness/jquery-ui.css">-->
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
	});
</script>
<script>
$(document).ready(function(e) {

  size_div = $('#location_count div.radio').size();

  x=6;
  $('#location_count div.radio:lt('+x+')').show();
 	$('#loadMore').click(function () {			
		x= (x+3 <= size_div) ? x+3 : size_div;
        $('#location_count div.radio:lt('+x+')').show();	
    });
	$('#showLess').click(function () {		
        x=(x-8<0) ? 6 : x-3;
        $('#location_count div.radio').not(':lt('+x+')').hide();
    });
});

</script>

</head>

<body>

<header>
    
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
    
<?php include "includes/header.php"; ?> 



</header>
<div class="clr_both" style="margin-top:20px;">

</div>



<div class="container-fluid white_bg">

<div class="col-lg-12" style="margin-top:10px;">
<div class="col-md-2" style="margin-top:10px;">
<div class="panel panel-default">
<div class="panel-heading"><h3 class="panel-title">Job Posted in</h3></div>
<div class="panel-body">
<?php 

                $pd_query = mysql_query("SELECT COUNT(postdate) AS pd FROM postjob WHERE NOW( ) - INTERVAL 24 
HOUR <  `postdate`");
		$pd_array = mysql_fetch_array($pd_query);
		$pd_count = $pd_array['pd'];
		
		/*$pd_query1 = mysql_query("SELECT COUNT(postdate) AS pd FROM postjob WHERE NOW( ) - INTERVAL 5 
DAY <  `postdate`");
		$pd_array1 = mysql_fetch_array($pd_query1);
		$pd_count1 = $pd_array1['pd'];*/
		
		$pd_query2 = mysql_query("SELECT COUNT(postdate) AS pd FROM postjob WHERE NOW( ) - INTERVAL 7 
DAY <  `postdate`");
		$pd_array2 = mysql_fetch_array($pd_query2);
		$pd_count2 = $pd_array2['pd'];
		
		$pd_query3 = mysql_query("SELECT COUNT(postdate) AS pd FROM postjob WHERE NOW( ) - INTERVAL 30 
DAY <  `postdate`");
		$pd_array3 = mysql_fetch_array($pd_query3);
		$pd_count3 = $pd_array3['pd'];
		
		$pd_query4 = mysql_query("SELECT COUNT(postdate) AS pd FROM postjob WHERE NOW( ) - INTERVAL 60 
DAY <  `postdate` ");
		$pd_array4 = mysql_fetch_array($pd_query4);
		$pd_count4 = $pd_array4['pd'];
		
		$pd_query5 = mysql_query("SELECT COUNT(postdate) AS pd FROM postjob WHERE NOW( ) - INTERVAL 1000 
DAY <  `postdate` ");
		$pd_array5 = mysql_fetch_array($pd_query5);
		$pd_count5 = $pd_array5['pd'];


 ?>

  <div class="radio">
          <label><input  type="radio" name="posted_date" onclick="window.location='suggest_joblist.php?posted_date=1'" value="1" <?php  if($posted_date == "1") echo 'checked="checked"'?>>< 24hrs&nbsp;(<?php echo  $pd_count; ?>)</label>
        </div>
        <div class="radio">
          <label><input type="radio" name="posted_date" onclick="window.location='suggest_joblist.php?posted_date=7'" value="7"<?php  if($posted_date == "7") echo 'checked="checked"'?>>7 Days&nbsp;(<?php echo $pd_count2; ?>)</label>
        </div>
        <div class="radio">
          <label><input type="radio" name="posted_date" onclick="window.location='suggest_joblist.php?posted_date=30'" value="30" <?php  if($posted_date == "30") echo 'checked="checked"'?>>30 Days&nbsp;(<?php echo $pd_count3; ?>)</label>
        </div>
        <div class="radio">
          <label><input type="radio" name="posted_date" onclick="window.location='suggest_joblist.php?posted_date=60'" value="60" <?php  if($posted_date == "60") echo 'checked="checked"'?>>60 Days&nbsp;(<?php echo $pd_count4; ?>)</label>
        </div>
         <div class="radio">
          <label><input type="radio" name="posted_date" onclick="window.location='suggest_joblist.php?posted_date=1000'" value="1000" <?php  if($posted_date == "1000") echo 'checked="checked"'?> > Above 60 Days&nbsp;(<?php echo $pd_count5; ?>)</label>
        </div>
         </div>
         </div>

<div class="panel panel-default">
<div class="panel-heading"><h3 class="panel-title">Job Location</h3></div>
<div class="panel-body" id="location_count" style="padding-bottom:5px;">
<?php

 $filter_loc_query = mysql_query("SELECT DISTINCT location FROM postjob");

      while($filter_loc_array = mysql_fetch_array($filter_loc_query)) {
	  		$filter_loc = $filter_loc_array['location'];
					
					$fil_query = mysql_query("SELECT COUNT(location) as total FROM postjob WHERE location='$filter_loc'");
					
					while($fil_array =mysql_fetch_array($fil_query)){
						
						$fil_count = $fil_array['total'];	  
	   ?>
 <div class="radio" >
        <label><input type="radio" id="oran" name="radio_location" onclick="window.location='suggest_joblist.php?location=<?php echo $filter_loc; ?>'"  value="<?php echo $filter_loc; ?>" <?php if($location == $filter_loc) echo 'checked="checked"' ?> /><?php echo $filter_loc." "."(".$fil_count.")"; ?></label>
        </div>
      <?php } } ?>  
     <div class="padleft padright">
     <a href="#" class="pull-left btn-link" id="showLess">Show Less</a>
     <a href="#" class="pull-right btn-link" id="loadMore">Load More</a>
     </div> 
     </div></div>   
     <div class="panel panel-default">
        <div class="panel-heading"><h3 class="panel-title">Company Name</h3></div>
             <div class="panel-body">
        <?php
	 $filter_cat_query = mysql_query("SELECT DISTINCT employer_name FROM postjob");	
		while($filter_cat_array=mysql_fetch_array($filter_cat_query)){
			$filter_cat = $filter_cat_array['employer_name'];
			
			$cat_query =mysql_query("SELECT COUNT(employer_name) as total FROM postjob WHERE employer_name='$filter_cat'");				
	
				while($cat_array = mysql_fetch_array($cat_query)){
					$cat_count = $cat_array['total'];
					?>
                    <div class="checkbox">
          <label >
			  <input  type="checkbox" onclick="window.location='suggest_joblist.php?catagory=<?php echo $filter_cat; ?>&location=<?php echo $location; ?>'" value="<?php echo $filter_cat; ?>" <?php if($catagory == $filter_cat) echo 'checked="checked"' ?>  /><?php echo $filter_cat." "."(".$cat_count.")" ?></label>
              </div>                   
					<?php	} }	?>
 

</div>
</div>

<div class="panel panel-default">
        <div class="panel-heading"><h3 class="panel-title">Job Type</h3></div>
             <div class="panel-body">
        <?php
	 $filter_type_query = mysql_query("SELECT DISTINCT job_type FROM postjob");	
		while($filter_type_array=mysql_fetch_array($filter_type_query)){
			$filter_type = $filter_type_array['job_type'];
			
			$type_query =mysql_query("SELECT COUNT(job_type) as total FROM postjob WHERE job_type='$filter_type'");				
	
				while($type_array = mysql_fetch_array($type_query)){
					$type_count = $type_array['total'];
					?>
                    <div class="radio">
          <label >
			  <input type="radio" onclick="window.location='suggest_joblist.php?catagory=<?php echo $catagory; ?>&location=<?php echo $location; ?>&job_type=<?php echo $filter_type; ?>'" value="<?php echo $filter_type; ?>" <?php if($jobtype == $filter_type) echo 'checked="checked"' ?>  /><?php echo $filter_type." "."(".$type_count.")" ?></label>
              </div>                   
					<?php	} }	?>
 

</div>
</div>
</div>
<?php  $seek_show = mysql_query($query);
		
	$seek_count = mysql_num_rows($seek_show);
	
	 if($seek_count > 0)  { ?>
<div class="col-md-7 top_space" >
<?php 
$count_query = mysql_query("select *  from postjob ORDER BY id DESC limit $k,$dis"); 
$count = mysql_num_rows($count_query);
?>
<div class="panel panel-default">
<div class="panel-heading"><h2 class="panel-title">Suggested Jobs for you</h2></div>
<div class="panel-body">

<ul class="joblist">
<?php

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
<a href="company_detail.php?empid=<?php echo $empid; ?>"><font style="font-size:15px;"><?php echo $empname;?></font></a>
<h5><span class="glyphicon glyphicon-map-marker" aria-hidden="true" style="margin-right:5px"></span><?php echo $location1;?></h5>

<!--<h4 class="clr_both"><small><?php echo substr($desc,0,500)."..."; ?></small></h4>-->
<h5 class="clr_both">Last Update : <small><?php echo $today; ?></small></h5>

</li>
<?php } } else {
	?>
    <div class="col-md-8 top_space UploadSuccess">
<div class="alert alert-danger" role="alert">
 <p class="text-center">No result Found...</p>
 <p class="text-center"><a href="suggest_joblist.php" class="alert-link">Click Here To View Recent Jobs</a></p>
</div>	
	</div>
	 
	 <?php } ?>
</ul>

<?php if($seek_count > 0) {  ?>
<ul class="pagination" style="font-weight:bolder;">
<?php if($page_cur>1) { ?>

<li class="disabled" ><a href="suggest_joblist.php?location=<?php echo $location; ?>&posted_date=<?php echo $posted_date ?>&catagory=<?php echo $catagory; ?>&page=<?php echo ($page_cur-1);?>">Prev</a></li>
<?php } else { ?>
<li class="active"><a>Prev</a></li>
<?php } for($i=1;$i<$total_page;$i++) {
	
		if($page_cur==$i)
		{ ?>
        <li class="active"><a><?php echo $i; ?></a></li>
  
  <?php } else { ?>
  <li class="disabled" ><a href="suggest_joblist.php?location=<?php echo $location; ?>&posted_date=<?php echo $posted_date ?>&catagory=<?php echo $catagory; ?>&page=<?php echo $i; ?>"><?php echo $i; ?></a></li>
  
  <?php } }
	if($page_cur<$total_page) {?>
    
    <li class="disabled" ><a href="suggest_joblist.php?location=<?php echo $location; ?>&posted_date=<?php echo $posted_date ?>&catagory=<?php echo $catagory; ?>&page=<?php echo ($page_cur+1); ?>">Next >></a></li>
    <?php } else { ?>
		
		<li class="active" ><a>Next >></a></li>
		<?php }  ?>
		 
  
</ul>
<?php }  ?>



<?php echo $invalid;  ?>
</div>
</div>
</div>

</div>


</div>
<?php include 'includes/view_appliedjob.php'; ?>
<?php include "includes/login_popup.php"; ?>
<?php include("includes/footer.php"); ?>


</body>
</html>
