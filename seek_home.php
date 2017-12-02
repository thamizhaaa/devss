<?php
 error_reporting(0);
 include "reg_session.php";
 $req_action = $_REQUEST['view'];
 $jshomeid = $session_seekid;
 $genderchk = $session_gender;

 ?>
<!DOCTYPE html>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Welcome To Staffingspot</title>
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="icon" href="images/favicon.png" />

<link rel="stylesheet" type="text/css" href="styles/bootstrap.css"/>
<link href="styles/styles_basic.css" rel="stylesheet" type="text/css" />
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.4.0/css/font-awesome.min.css">
<link rel="stylesheet" href="lib_files/themes-smoothness-jquery-ui.css" />
<style>
.ui-autocomplete {
	 max-height:160px;
     background:#FFF;
	 overflow:hidden;
	 overflow-y:auto;	
	 width:100px;
	 position:relative;
	 z-index:9999999;	
}
.ui-state-hover, .ui-widget-content .ui-state-hover, .ui-widget-header .ui-state-hover, .ui-state-focus, .ui-widget-content .ui-state-focus, .ui-widget-header .ui-state-focus {
    padding: 5px 5px;
    margin: 5px 5px;
    border-radius: 0;
	background:#F68220;
	color:#FFF;	
}

.ui-menu-item {
	padding: 5px 5px;
    margin: 5px 5px;	
}

.ui-menu-item:hover {
	background:#F68220;
	color:#FFF; 	
}

.ui-front {
    z-index: 999999;
}

</style>
  <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
        <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
        <!--[if lt IE 9]>
          <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
          <script src="https://oss.maxcdn.com/libs/respond.js/1.3.0/respond.min.js"></script>
        <![endif]-->
<script type="text/javascript" src="js/jquery-1.10.2.min.js"></script>
<script type="text/javascript" src="js/bootstrap.js"></script>
<script type="text/javascript" src="js/bootstrap-dropdown.js"></script>
<script type="text/javascript" src="js/jquery-scrolltofixed.js"></script>

<script type="text/javascript" >
$(document).ready(function() {
  $('#nav-bar').scrollToFixed();
});
</script>

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
	
    var div_size = $('#view-all-div .search-list').size();
	$('#view-all-div .search-list:gt(4)').hide();
	$('#view-all').on('click',function(){
	if(div_size > 5) {
	$('#view-all-div .search-list:lt('+div_size+')').fadeIn('slow');	
	}
	});
});

</script>
</head>

<body>
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
$('#kwords321').autocomplete({
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
$('#location321').autocomplete({
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
    
<?php 
@include("includes/header.php");
?>

<div id="nav-bar">
 <div class="well-search-container container-fluid padleft padright">

 <div class="col-sm-9 col-xs-offset-2">
<form action="job_list.php" target="_blank" method="get" onSubmit="window.location.reload()">
 

<div class="form-group">
<div class="col-sm-4" style="margin-right:40px;position:relative;" >

<input type="text" name="kwords321" autocomplete="off" class="search form-control" id="kwords321" placeholder="Skills, Keywords"  />
<div id="search_result" style="background-color:#FFF;float:left;clear:both;margin-left:15px;width:97%"></div></div>

<div class="col-sm-3" style="margin-right:30px;position:relative;" >
<input id="location321" type="text" autocomplete="off" placeholder="Location" name="location321" class="search1 form-control" />
<div id="search_result1" style="background-color:#FFF;float:left;clear:both;margin-left:15px;width:97%"></div></div>
<div class="col-sm-3 ">
<input class="sub_btn" name="submit" type="submit" value="" /></div>
</div>


</form>
</div>

</div>
</div>

<hr />
<div class="container white_bg" style="margin-top:10px;" >
<?php
include('includes/seek_sidemenu.php'); 
$job_seeker_name = $session_fname;

?>

<div class="col-md-6" style="margin-top:10px;">

<div class="jspersonprofile">
<h2><?php echo $job_seeker_name; ?></h2>
<div class="divider"></div>
<div class="table-responsive">
<table class="table">
    
    
<tr><td><span>Email</span></td><td class="jsdet-td"><?php echo $session_emailid; ?></td></tr>
<tr><td><span>Contact no</span></td><td class="jsdet-td"><?php echo $session_mobile; ?></td></tr>

<?php
    $seekerexpr3 = mysql_query("SELECT * FROM seeker_experience WHERE seekerid = '$jshomeid' Order by fromdate DESC");   
    $seekerexpres3 = mysql_fetch_array($seekerexpr3); 
    $ID3 = $seekerexpres3['id'];
    $companyname = $seekerexpres3['companyname'];
    $designation = $seekerexpres3['designation'];
?>

<?php
    $seekerexpr3 = mysql_query("SELECT * FROM seeker_profess WHERE seekerid = '$jshomeid'");   
    $seekerexpres3 = mysql_fetch_array($seekerexpr3); 
    $ID3 = $seekerexpres3['id'];
    $experience = $seekerexpres3['experience'];
    $resumepath = $seekerexpres3['resumepath'];
?>

<tr><td><span>Company</span></td><td class="jsdet-td"><?php echo $companyname; ?></td></tr>
<tr><td><span>Designation</span></td><td class="jsdet-td"><?php echo $designation; ?></td></tr>
<tr><td><span>Experience</span></td><td class="jsdet-td"><?php echo $experience;?>
        <?php
        if($experience<=1)
        {
            echo "Year";        
        }
        else
        {
        echo "Years";        
        }
        ?>
        </td></tr>
<tr><td><span>Resume</span></td><td class="jsdet-td"><a href="<?php echo $resumepath; ?>" download>Download Resume</a></td></tr>
<tr><td><span>Date of birth</span></td>
<td class="jsdet-td">
<?php 

echo $session_dob;
 ?>
</td></tr>
<tr><td><span>Gender</span></td><td class="jsdet-td"><?php echo $genderchk; ?></td></tr>
<tr><td><span>Skills</span></td><td class="jsdet-td"><?php echo $session_aoi; ?></td></tr>

</table>
</div>
</div>
<?php if($req_action =='applied') { ?>
<div class="search_content">
<h2>Applied Job List</h2>
<div class="oran-divider"></div>
<?php 
$show_query = mysql_query("SELECT jobcode,applieddate FROM seeker_appliedjob WHERE seekerid = '$session_seekid'");
		
		$show_row = mysql_num_rows($show_query);
		
		if($show_row > 0) {
  		
				while($show_array = mysql_fetch_array($show_query)){
					
					$check_jobcode = $show_array['jobcode'];
					$check_date1 = date_create($show_array['applieddate']);
					$check_date = date_format($check_date1,'d-M-y');
					
						$get_query = mysql_query("SELECT * FROM postjob WHERE jobcode ='$check_jobcode'");
						
							while($get_array = mysql_fetch_array($get_query)){
								
									$get_empname = $get_array['employer_name'];
									$get_jobtitle = $get_array['jobtitle'];
									$get_location = $get_array['location'];
									$get_description = $get_array['description'];
							?>
                            


<div class="col-sm-12 padleft padright search-list" style="border-bottom:1px #CCCCCC dashed;padding-bottom:1%;">
<div class="col-sm-8 padleft padright">
<div class="col-sm-12 padleft padright">
<a class="job-title" target="_blank" href="job_details_seek.php?id=<?php echo $check_jobcode; ?>" style="margin-left:22px;">
<?php echo $get_jobtitle;?>
</a>
</div>
<div class="col-sm-12 padleft padright" style="margin-top:1.5%;">
<a class="job-company" href="company_detail.php?empid=<?php echo $empid; ?>"><?php echo $get_empname;?></a>
</div>
</div>
<div class="col-sm-4 padleft padright">
<div class="col-sm-12 padleft padright">

</div>
<div class="col-sm-12 padleft padright" style="margin-top:1%;">
<span class="job-posted">Applied date:<?php echo $check_date; ?></span>
</div>
</div>
<div class="col-sm-12 padleft padright" style="margin-top:1%;">
<span class="job-loc" style="margin-left:22px;"><i class="fa fa-map-marker"></i>&nbsp;&nbsp;<?php echo $get_location; ?></span>
</div>
<div class="col-sm-12 padleft padright" style="margin-top:1%;">
<span class="job-desc pull-left"><?php $strip_desc =  strip_tags($get_description); echo $sub_desc = substr($strip_desc,0,200) ; ?></span>
</div>
</div>




                            <?php		
									
							} 
				}
				?>			
                
			<?php	} else { ?>
			<div class="alert alert-danger" role="alert">
  				<a href="#" class="alert-link text-center"><i class="fa fa-exclamation-triangle"></i>&nbsp;No applied jobs</a>
			</div>		
				
			<?php	}  ?>
							
</div>
<?php } elseif($req_action =='matched') { ?>
<div class="search_content">
<h2>Latest Jobs Matching Your Profile</h2>
<div class="oran-divider"></div>

<?php
 $joined_skills = $session_aoi.','.$session_skills ;
 $job_show = mysql_query("SELECT * FROM postjob WHERE keyskills LIKE '%".$joined_skills."%' ORDER BY id DESC");
		
	$job_count = mysql_num_rows($job_show);
	 if($job_count > 0)
 	{
?>
<a class="bulk-apply" href="#">Apply to all Selected Jobs</a>
<div id="view-all-div">

<?php
 while($seek_result = mysql_fetch_array($job_show))
 { 
 		$jid = $seek_result['id']; 
 		$id = $seek_result['jobcode'];
		$name = $seek_result['jobtitle'];
		$location=$seek_result['location'];
		$pdate=$seek_result['postdate'];
		$desc = $seek_result['description'];
		$exp=$seek_result['experience'];
		$empid=$seek_result['empid'];
		$empname=$seek_result['employer_name'];
		$postdate = date_create($seek_result['postdate']);
		$today = date_format($postdate,"F j, Y");               
		$exp1=$seek_result['experience'];
		$explode = explode(';',$exp1);
		$exp = $explode[0].' to '.$explode[1];  	
		$salary1 = $seek_result['salary'];
		$explode1 = explode(';',$salary1);
		$salary = $explode1[0]. ' - ' .$explode1[1];

	
		
 ?>
<div class="col-sm-12 padleft padright search-list">
<div class="col-sm-8 padleft padright">
<div class="col-sm-12 padleft padright">
<input type="checkbox" value="" name="">&nbsp;&nbsp;
<a class="job-title" target="_blank" href="job_details_seek.php?id=<?php echo $id; ?>">
<?php echo $name;?>
</a>
</div>
<div class="col-sm-12 padleft padright" style="margin-top:1.5%;">
<a class="job-company" href="company_detail.php?empid=<?php echo $empid; ?>"><?php echo $empname;?></a>
</div>
</div>
<div class="col-sm-4 padleft padright">
<div class="col-sm-12 padleft padright">
<a href="#" onclick="if (confirm('Are you sure to apply for this Post?')) 
  window.location='app_sessionchk.php?seekid=<?php echo $session_id; ?>&jobcode=<?php echo $jid; ?>'; 
   " class="btn btn-warning pull-right">Apply</a>
</div>
<div class="col-sm-12 padleft padright" style="margin-top:1%;">
<span class="job-posted">Posted date:<?php echo $today; ?></span>
</div>
</div>
<div class="col-sm-12 padleft padright" style="margin-top:1%;">
<span class="job-exp"><i class="fa fa-briefcase"></i>&nbsp;&nbsp;<?php echo $exp; ?></span>
<span class="job-loc"><i class="fa fa-map-marker"></i>&nbsp;&nbsp;<?php echo $location; ?></span>
</div>
<div class="col-sm-12 padleft padright" style="margin-top:1%;">
<span class="job-desc pull-left"><?php $strip_desc =  strip_tags($desc); echo $sub_desc = substr($strip_desc,0,200) ; ?></span>
</div>
</div>
<?php } ?>
<div class="col-sm-12 padleft padright">
<a  id="view-all" class="btn btn-link pull-right">View All</a>
</div>
</div>
<?php
} else { 
?>

		<div class="alert alert-danger" role="alert">
  				<a href="#" class="alert-link text-center"><i class="fa fa-exclamation-triangle"></i>&nbsp;No Matched Jobs </a>
		</div>
	
<?php } ?>
</div>
<?php } elseif($req_action =='suggest') { ?>
<div class="search_content">
<h2>Latest Jobs Suggestion For Your Profile</h2>
<div class="oran-divider"></div>

<?php
 $joined_skills = $session_aoi.','.$session_skills ;
 $job_show = mysql_query("SELECT * FROM postjob WHERE keyskills NOT LIKE '%".$joined_skills."%' ORDER BY id DESC");
		
	$job_count = mysql_num_rows($job_show);
	 if($job_count > 0)
 	{
?>
<a class="bulk-apply" href="#">Apply to all Selected Jobs</a>
<div id="view-all-div">

<?php
 while($seek_result = mysql_fetch_array($job_show))
 { 
 		$jid = $seek_result['id']; 
 		$id = $seek_result['jobcode'];
		$name = $seek_result['jobtitle'];
		$location=$seek_result['location'];
		$pdate=$seek_result['postdate'];
		$desc = $seek_result['description'];
		$exp=$seek_result['experience'];
		$empid=$seek_result['empid'];
		$empname=$seek_result['employer_name'];
		$postdate = date_create($seek_result['postdate']);
		$today = date_format($postdate,"F j, Y");               
		$exp1=$seek_result['experience'];
		$explode = explode(';',$exp1);
		$exp = $explode[0].' to '.$explode[1];  	
		$salary1 = $seek_result['salary'];
		$explode1 = explode(';',$salary1);
		$salary = $explode1[0]. ' - ' .$explode1[1];

	
		
 ?>
<div class="col-sm-12 padleft padright search-list">
<div class="col-sm-8 padleft padright">
<div class="col-sm-12 padleft padright">
<input type="checkbox" value="" name="">&nbsp;&nbsp;
<a class="job-title" target="_blank" href="job_details_seek.php?id=<?php echo $id; ?>">
<?php echo $name;?>
</a>
</div>
<div class="col-sm-12 padleft padright" style="margin-top:1.5%;">
<a class="job-company" href="company_detail.php?empid=<?php echo $empid; ?>"><?php echo $empname;?></a>
</div>
</div>
<div class="col-sm-4 padleft padright">
<div class="col-sm-12 padleft padright">
<a href="#" onclick="if (confirm('Are you sure to apply for this Post?')) 
  window.location='app_sessionchk.php?seekid=<?php echo $session_id; ?>&jobcode=<?php echo $jid; ?>'; 
   " class="btn btn-warning pull-right">Apply</a>
</div>
<div class="col-sm-12 padleft padright" style="margin-top:1%;">
<span class="job-posted">Posted date:<?php echo $today; ?></span>
</div>
</div>
<div class="col-sm-12 padleft padright" style="margin-top:1%;">
<span class="job-exp"><i class="fa fa-briefcase"></i>&nbsp;&nbsp;<?php echo $exp; ?></span>
<span class="job-loc"><i class="fa fa-map-marker"></i>&nbsp;&nbsp;<?php echo $location; ?></span>
</div>
<div class="col-sm-12 padleft padright" style="margin-top:1%;">
<span class="job-desc pull-left"><?php $strip_desc =  strip_tags($desc); echo $sub_desc = substr($strip_desc,0,200) ; ?></span>
</div>
</div>
<?php } ?>
<div class="col-sm-12 padleft padright">
<a  id="view-all" class="btn btn-link pull-right">View All</a>
</div>
</div>
<?php
} else { 
?>

		<div class="alert alert-danger" role="alert">
  				<a href="#" class="alert-link text-center"><i class="fa fa-exclamation-triangle"></i>&nbsp;No Matched Jobs </a>
		</div>
	
<?php } ?>
</div>
<?php } else { ?>
<div class="search_content">
<h2>Latest Jobs Matching Your Profile</h2>
<div class="oran-divider"></div>
<a class="bulk-apply" href="#">Apply to all Selected Jobs</a>
<div id="view-all-div">
<?php $job_show = mysql_query("SELECT * FROM postjob ORDER BY id DESC");
		
	$job_count = mysql_num_rows($job_show);
	 if($job_count > 0)
 {
 while($seek_result = mysql_fetch_array($job_show))
 { 
 		$jid = $seek_result['id']; 
 		$id = $seek_result['jobcode'];
		$name = $seek_result['jobtitle'];
		$location=$seek_result['location'];
		$pdate=$seek_result['postdate'];
		$desc = $seek_result['description'];
		$exp=$seek_result['experience'];
		$empid=$seek_result['empid'];
		$empname=$seek_result['employer_name'];
		$postdate = date_create($seek_result['postdate']);
		$today = date_format($postdate,"F j, Y");               
		$exp1=$seek_result['experience'];
		$explode = explode(';',$exp1);
		$exp = $explode[0].' to '.$explode[1];  	
		$salary1 = $seek_result['salary'];
		$explode1 = explode(';',$salary1);
		$salary = $explode1[0]. ' - ' .$explode1[1];

	
		
 ?>
<div class="col-sm-12 padleft padright search-list">
<div class="col-sm-8 padleft padright">
<div class="col-sm-12 padleft padright">
<input type="checkbox" value="" name="">&nbsp;&nbsp;
<a class="job-title" target="_blank" href="job_details_seek.php?id=<?php echo $id; ?>">
<?php echo $name;?>
</a>
</div>
<div class="col-sm-12 padleft padright" style="margin-top:1.5%;">
<a class="job-company" href="company_detail.php?empid=<?php echo $empid; ?>"><?php echo $empname;?></a>
</div>
</div>
<div class="col-sm-4 padleft padright">
<div class="col-sm-12 padleft padright">
<a href="#" onclick="if (confirm('Are you sure to apply for this Post?')) 
  window.location='app_sessionchk.php?seekid=<?php echo $session_id; ?>&jobcode=<?php echo $jid; ?>'; 
   " class="btn btn-warning pull-right">Apply</a>
</div>
<div class="col-sm-12 padleft padright" style="margin-top:1%;">
<span class="job-posted">Posted date:<?php echo $today; ?></span>
</div>
</div>
<div class="col-sm-12 padleft padright" style="margin-top:1%;">
<span class="job-exp"><i class="fa fa-briefcase"></i>&nbsp;&nbsp;<?php echo $exp; ?></span>
<span class="job-loc"><i class="fa fa-map-marker"></i>&nbsp;&nbsp;<?php echo $location; ?></span>
</div>
<div class="col-sm-12 padleft padright" style="margin-top:1%;">
<span class="job-desc pull-left"><?php $strip_desc =  strip_tags(htmlspecialchars($desc)); echo $sub_desc = substr(htmlspecialchars($strip_desc,0,200)) ; ?></span>
</div>
</div>
<?php } ?>
<div class="col-sm-12 padleft padright">
<a  id="view-all" class="btn btn-link pull-right">View All</a>
</div>
</div>
<?php
} else { echo "NO record Found "; } ?>
</div>
<?php } ?>

</div>	




<?php
 $recent_query = mysql_query("select distinct keywords,location,created_date from job_recent_search where seekerid='".$session_seekid."' order by created_date desc limit 5");
 $recent_count = mysql_num_rows($recent_query);
 if($recent_count > 0){
 
?>
<div class="col-sm-3" style="margin-top:10px;">
<div class="panel panel-default">
<div class="panel-heading"><h3 class="panel-title">Recent Search</h3></div>
<div class="panel-body">
<ul class="emp_account">

 
<?php
while($recent_array = mysql_fetch_array($recent_query)) {
  $recent_keywords = $recent_array['keywords'];
  $recent_location = $recent_array['location'];
  $recent_created1 = date_create($recent_array['created_date']);
  $recent_created = date_format($recent_created1, 'F j, Y');
  ?>
<li>
<span class="glyphicon glyphicon-search" aria-hidden="true" style="margin-right:5px"></span> <a style="text-transform:capitalize" href="job_list.php?kwords=<?php echo $recent_keywords; ?>&location=<?php echo $recent_location; ?>"><?php echo $recent_keywords; ?>, <?php echo $recent_location; ?></a>
<span class="muted pull-right"><small><?php echo $recent_created; ?></small></span>

</li>
  
<?php  
} }
 ?>
</ul>

</div>

</div>
</div>
</div>

	




<?php include("includes/footer.php"); ?>



</body>
</html>
