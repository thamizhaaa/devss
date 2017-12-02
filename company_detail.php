<?php
error_reporting(0);
include ("includes/config.php");
session_start();
	
	
	/* @include("social_headers.php");*/

$i=$_REQUEST['empid'];
?>
<!DOCTYPE html>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Job Portal</title>
<meta name="viewport" content="width=device-width, initial-scale=1">



<link rel="stylesheet" type="text/css" href="styles/bootstrap.css"/>
<link href="styles/styles_basic.css" rel="stylesheet" type="text/css" />
<link rel="stylesheet" type="text/css" href="styles/star-rating.css"/>
<link rel="stylesheet" href="lib_files/font-awesome-4.0.3-css-font-awesome.min.css" />
<!--<link rel="stylesheet" href="//code.jquery.com/ui/1.11.2/themes/smoothness/jquery-ui.css">-->
 <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
        <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
        <!--[if lt IE 9]>
          <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
          <script src="https://oss.maxcdn.com/libs/respond.js/1.3.0/respond.min.js"></script>
        <![endif]-->
<script type="text/javascript" src="js/jquery-1.11.2.js"></script>
<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js"></script>
<script type="text/javascript" src="js/star-rating.js"></script>
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
  
  </head>

<body>


<?php  include("includes/header.php"); ?>
<div class="container-fluid white_bg">
<?php 

	$seek_details = mysql_query("SELECT * FROM employer WHERE empid ='".$i."'");
    $seek_row = mysql_fetch_array($seek_details);
   
   if (!$seek_details) 
		{
		die("Error: Data not found..");
		}
		$emp_name = $seek_row['employerName'];
		$indus_type = $seek_row['indusType'];
		$com_desc = $seek_row['company_desc'];
		$url = $seek_row['url'];
		$city = $seek_row['state'];
		$worker = $seek_row['worker'];	
		$logo = $seek_row['logo'];	
		?>
<div class="col-md-12" style="margin-top:40px">
<div class="col-md-8 top_space position"  >
<div class="head-block">
<div class="col-md-8 pull-left" >
<font style="font-size:25px;"><b><?php echo $emp_name; ?></b></font>
<h4><b><?php echo $city; ?></b></h4>
<h5><a href="#">Recommend This Company</a></h5>
<form method="post" action="" >
<input class="form-control"  id="input-21f" value="3" type="number" min=0 max=5 step=0.1 data-size="xs" >
</form>
<script>
    jQuery(function ($) {
        $("#input-21f").rating({
            starCaptions: function(val) {
                if (val < 3) {
                    return val;
                } else {
                    return 'high';
                }
            },
            starCaptionClasses: function(val) {
                if (val < 3) {
                    return 'label label-danger';
                } else {
                    return 'label label-success';
                }
            },
            hoverOnClear: false
        });
        
        $('#rating-input').rating({
              min: 0,
              max: 5,
              step: 1,
              size: 'lg'
           });
           
        $('#btn-rating-input').on('click', function() {
            var $a = self.$element.closest('.star-rating');
            var chk = !$a.hasClass('rating-disabled');
            $('#rating-input').rating('refresh', {showClear:!chk, disabled:chk});
        });
        
        
        $('.btn-danger').on('click', function() {
            $("#kartik").rating('destroy');
        });
        
        $('.btn-success').on('click', function() {
            $("#kartik").rating('create');
        });
        
        $('#rating-input').on('rating.change', function() {
            alert($('#rating-input').val());
        });
        
        
        $('.rb-rating').rating({'showCaption':true, 'stars':'3', 'min':'0', 'max':'3', 'step':'1', 'size':'xs', 'starCaptions': {0:'status:nix', 1:'status:wackelt', 2:'status:geht', 3:'status:laeuft'}});
    });
</script>
</div>
<div class="col-md-3 pull-right" ><img width="140px" height="100px" class="pull-right" src="<?php echo 'employer/'.$logo; ?>"  /></div>
</div>
<div class="content-block clr_both">
<h3><b>Company Details</b></h3>
<dl class="pull-left">
<dt>Industry Type</dt>
<dd><?php echo $indus_type; ?></dd>
<dt>No of Workers</dt>
<dd><?php echo $worker; ?></dd>
<dt>Websites</dt>
<dd><a href="<?php echo $url; ?>"><?php echo $url; ?></a></dd>

</dl>
</div>
<div class="content-block clr_both">
<h3><b>Company Description</b></h3>
<p><?php echo $com_desc; ?></p>
</div>

</div>
<div class="col-md-3 pull-right">
<div class="apply alt-block">
</div>
<div class="alt-block">
<h4 class="inner-alt-block">JobSeekers</h4>
<div class="inner-alt-block">
<a class="btnapp btn-pc btn-mini btn-save-alert js-save-alert" style="text-decoration:none;" href="#">Post Your Resume</a>
<p class="top_space">Already Registered ?<a href="">Login</a></p>
</div>
</div>
<div class="alt-block">
<h4 class="inner-alt-block">Keep it:</h4>
<ul class="inner-alt-block" style="list-style:none">
<li ><a class="print-icon">Print this page</a></li>
</ul>
</div>
<div class="alt-block">
<h4 class="inner-alt-block">Share it:</h4>
<ul class="share inner-alt-block" style="list-style:none" >
<li ><a class="email" href="#">Send by Mail</a></li>
<li ><a class="linked" href="#">Share on LinkedIn</a></li>
<li ><a class="twitter" href="#">Share on Twitter</a></li>
<li ><a class="facebook" href="#">Share on Facebook</a></li>
</ul>
</div>
</div>

</div>

<div class="col-sm-8  top_space">
<h2 style="padding:0 0 10px 0px; margin-bottom:15px;border-bottom:1px solid #5E5F61"><small>Similar Job's Posted By <?php echo $emp_name; ?></small></h2>
<?php
	$emp_query = mysql_query("select * from postjob where empid='".$i."'");
	$emp_count = mysql_num_rows($emp_query);
 ?>
<ul class="joblist">
<?php
if($emp_count > 0) {
while($emp_array = mysql_fetch_array($emp_query))
 { 
 		$id = $emp_array['jobcode'];
		$name = $emp_array['jobtitle'];
		$location=$emp_array['location'];
		$pdate=$emp_array['postdate'];
		$desc = $emp_array['description'];
		$exp=$emp_array['experience'];
		$empid=$emp_array['empid'];
		$empname=$emp_array['employer_name'];
		$postdate = date_create($emp_array['postdate']);
		$today = date_format($postdate,"F j, Y");               


	
		
 ?>
<li> <a href="job_details_seek.php?id=<?php echo $id; ?>"> 
<h3 style="color:#006699"><?php echo $name;?></h3> </a>
<a href="company_detail.php?empid=<?php echo $empid; ?>"><h4><?php echo $empname;?></h4></a>
<h5><span class="glyphicon glyphicon-map-marker" aria-hidden="true" style="margin-right:5px"></span><?php echo $location;?></h5>

<h4 class="clr_both"><small><?php echo substr($desc,0,100)."..."; ?></small></h4>
<h5 class="clr_both">Last Update : <small><?php echo $today; ?></small></h5>

</li>
<?php  } } else {
echo "No Jobs Yet Posted ";	
}?>
</ul>
</div>
</div>


<?php include 'includes/view_appliedjob.php'; ?>
<?php include("includes/footer.php"); ?>
<?php include "includes/login_popup.php"; ?>


<br />
<br />
<br />
</body>
</html>
