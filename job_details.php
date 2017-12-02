<?php
error_reporting(0);
include ("reg_session.php");
 $i=$_REQUEST['id'];
 $seek_reqid = $_REQUEST['seekerid'];
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml"><head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Job Portal</title>
<meta name="viewport" content="width=device-width, initial-scale=1">

<link rel="stylesheet" href="styles/styles_basic.css" type="text/css" />
<link rel="stylesheet" href="themes/default/default.css" type="text/css" media="screen" />
<link rel="stylesheet" href="styles/nivo-slider.css" type="text/css" media="screen" />
<link rel="stylesheet" href="styles/style_banner.css" type="text/css" media="screen" />
<link rel="stylesheet" href="styles/bootstrap.css" type="text/css" />
<link rel="stylesheet" href="styles/style_popup.css" type="text/css" />
<!--<link rel="stylesheet" href="//code.jquery.com/ui/1.11.2/themes/smoothness/jquery-ui.css">-->
<link rel="stylesheet" href="styles/default.css" type="text/css">
    
<script type="text/javascript" src="js/bootstrap.js"></script>
<script type="text/javascript" src="js/jquery-1.10.2.min.js"></script>
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
  
  <script type="text/javascript" src="js/zebra_datepicker.src.js"></script>




  <script>
  $(document).ready(function() {

    $('#datepicker').Zebra_DatePicker({
  view: 'years'
});
}); 
  </script>
</head>

<body>


<?php  include("includes/header.php"); ?>



<div class="container-fluid white_bg">
<div class="col-sm-3"></div>

<div class="col-sm-6" >
<div class="title" style="margin-bottom:15px;">Job  Detail Page</div>
<?php 



$test="SELECT * FROM postjob WHERE id  = '".$i."'";

	$seek_details = mysql_query($test);
    $seek_row = mysql_fetch_array($seek_details);
   
   if (!$seek_details) 
		{
		die("Error: Data not found..");
		}
		$jid = $seek_row['id']; 
		$id = $seek_row['jobcode'];
		$name = $seek_row['jobtitle'];
		$pdate=$seek_row['postdate'];
		$edate=$seek_row['expirydate'];
		$exp=$seek_row['experience'];
		$location = $seek_row['location'];
		$desc = $seek_row['description'];
		
		$result_q = mysql_query("SELECT * FROM seeker_personal WHERE seekerid = '".$seek_reqid."'");

$row_req = mysql_fetch_array($result_q);
	
	if(!$row_req) {
		die("Error: Data not found..");
	}
	
	$seek_reg = $row_req['seekerid'];	
 	$seek_sid = $row_req['id'];
		
		
		?>
         
<div class="job_desc"><p class="job_title"><?php echo "<b>Job Title : </b>"."  ".$name; ?><font class="flt_right"></font></p></div>
<div class="job_desc"><font class="job_title"><?php echo "<b>Post Date : </b>"."  ".$pdate; ?></font><p></p></div>
<div class="job_desc"><font class="job_title"><?php echo " <b>Expiry Date : </b>"."  ".$edate; ?></font><p></p></div>
<div class="job_desc"><font class="job_title"><?php echo "<b>Description : </b>"."  ".$desc; ?></font><p></p></div>
<div class="job_desc"><font class="job_title"><?php echo "<b>Experience : </b>"."  ".$exp. " Years"; ?></font><p></p></div>
<div class="job_desc"><font class="job_title"><?php echo "<b>Location : </b>"."  ".$location; ?></font><p></p></div>

<div class="job_desc"><font class="job_title"><a class="frm_btn" style="text-decoration:none;" href="#" onclick="if (confirm('Are you sure to apply for this Post?')) 
  window.location='applied_confirm.php?seekid=<?php echo $seek_sid; ?>&jobcode=<?php echo $jid; ?>'; 
   ">Apply For This Post</a><a class="frm_btn" style="text-decoration:none;width:60px;text-align:center" href="seek_home.php">Back</a></font><p></p></div>


</div>
<div class="col-sm-3"></div>
</div>




<div class="container-fluid">
<?php include("includes/footer.php"); ?>
</div>




</body>
</html>
