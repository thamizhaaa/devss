<?php
error_reporting(0);
include ("includes/config.php");
session_start();
	
	
	/* @include("social_headers.php");*/

$i=$_REQUEST['id'];
?>
<!DOCTYPE html >
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Job Portal</title>
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" type="text/css" href="styles/bootstrap.css"/>
<link href="styles/styles_basic.css" rel="stylesheet" type="text/css" />
<link rel="stylesheet" href="lib_files/font-awesome-4.0.3-css-font-awesome.min.css" />
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
  
 
  </head>

<body>


<?php  include("includes/header.php"); ?>
<div class="container white_bg">
<?php 
$test="SELECT * FROM postjob WHERE jobcode  = '".$i."'";

	$seek_details = mysql_query($test);
    $seek_row = mysql_fetch_array($seek_details);
   
   if (!$seek_details) 
		{
		die("Error: Data not found..");
		}
		$jid = $seek_row['id']; 
		$id = $seek_row['jobcode'];
		$name = $seek_row['jobtitle'];
		$pdate1=date_create($seek_row['postdate']);
		$pdate = date_format($pdate1,'jS F Y');
		$edate=$seek_row['expirydate'];
		$exp1=$seek_row['experience'];
		$explode = explode(';',$exp1);
		$exp = $explode[0].' - '.$explode[1];  
		$empid = $seek_row['empid'];
		$location = $seek_row['location'];
		$desc = $seek_row['description'];
		$emp_name = $seek_row['employer_name'];
		$vacancy = $seek_row['nvacancy'];
		$requirement = $seek_row['requirement'];		
		$salary1 = $seek_row['salary'];
		$explode1 = explode(';',$salary1);
		$salary = $explode1[0]. ' - ' .$explode1[1];
		
	$emp_query = mysql_query("select * from employer where empid='".$empid."'");
	$emp_array = mysql_fetch_array($emp_query);
	$com_desc = $emp_array['company_desc'];
		
		?>
<div class="col-md-12" style="margin-top:40px">
<div class="col-md-8 top_space position"  >
<div class="head-block">
<div class="col-md-11 pull-left" >
<font style="font-size:21px;line-height:20px;"><b><?php echo $name; ?></b></font>
<h4><b><?php echo $location; ?></b></h4>
<h5><a href="company_detail.php?empid=<?php echo $empid; ?>"><?php echo $emp_name; ?></a></h5>
</div>

</div>
<div class="content-block">
<h3><b>Job Description</b></h3>
<p><?php echo $desc; ?></p>
</div>
<div class="content-block clr_both">
<h3><b>Company Profile</b></h3>
<p><?php echo $com_desc; ?></p>
</div>
<div class="content-block clr_both">
<h3><b>Additional Information</b></h3>
<dl class="pull-left">
<dt>Posted Date</dt>
<dd><?php echo $pdate; ?></dd>
<dt>Vacancies</dt>
<dd><?php echo $vacancy; ?></dd>
<dt>Location</dt>
<dd><?php echo $location; ?></dd>

</dl>
<dl class="pull-left">
<dt>Experience</dt>
<dd>
<?php
if(($explode[0] == 0) && ($explode[1] == 0)) {
 echo  'Not Available';
 } else {
 echo $exp; 	 
  } ?>
 </dd>
<dt>Salary Range</dt>
<dd><?php 
if(($explode1[0] == 0) && ($explode1[1] == 0)) {
 echo  'Not Available';
 } else {
echo '<strong>$</strong> &nbsp; '.$salary; 

 }?></dd>
</dl>
</div>
<div class="col-md-6 content-block pull-left">
<a class="btnapp btnapp-apply btnapp-primary btnapp-big" style="text-decoration:none" href="#" onclick="if (confirm('Are you sure to apply for this Post?')) 
  window.location='app_sessionchk.php?seekid=<?php echo $session_id; ?>&jobcode=<?php echo $jid; ?>'; 
   ">Apply For This Post</a>
</div>
</div>
<div class="col-md-3 pull-right">
<div class="apply alt-block">
<div class="inner-alt-block">
<a href="#" class="minhide btnapp btnapp-apply btnapp-primary btnapp-big" style="text-decoration:none" onclick="if (confirm('Are you sure to apply for this Post?')) 
  window.location='app_sessionchk.php?seekid=<?php echo $session_id; ?>&jobcode=<?php echo $jid; ?>'; 
   ">Apply</a>
</div>
<div class="alt-block">
<h4 class="inner-alt-block">Add to my alerts:</h4>
<div class="inner-alt-block">
<p>Want to receive similar jobs by email?</p>
<a class="btnapp btn-pc btn-mini btn-save-alert js-save-alert" href="#">Alert Me</a>
</div>
</div>
<div class="alt-block">
<h4 class="inner-alt-block">Keep it:</h4>
<ul class="inner-alt-block" style="list-style:none">
    <li><a class="print-icon" href="javascript:window.print()" target="_blank">Print this page</a></li>
</ul>
</div>   
<div class="alt-block">
<h4 class="inner-alt-block">Share it:</h4>
<ul class="share inner-alt-block" style="list-style:none" >
<li><a class="email" href="#">Send by Mail</a></li>
<li><a class="linked" href="#">Share on LinkedIn</a></li>
<li><a class="twitter" href="#">Share on Twitter</a></li>
<li>
    <a class="facebook" href="http://www.facebook.com/sharer.php?s=100&p[url]=http://staffingspot.localhost/job_details_seek.php?id=JOB<?php echo mysql_escape_string($jid);?>">Share on Facebook</a>
    
    
    <!--<a class="facebook" href="#">Share on Facebook</a>-->

</li>
</ul>
</div>
</div>

</div>
</div>
</div>
</div>

<?php 

include("includes/login_popup.php"); 

?>
<?php include("includes/footer.php"); ?>






<br />
<br />
<br />
</body>
</html>
