<?php
ob_start();
error_reporting(0);
include 'includes/config.php';
session_start();

$facebook=$_SESSION['facebook'];
$userdata=$_SESSION['userdata'];
$fbemail = $userdata['email']; 
$usergoogle = $_SESSION['google_data'];
$gooemail = $usergoogle['email'];
if($session_id == ""){
header("Location:index.php",false);	
ob_end_flush();
}

?>

<!DOCTYPE html>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Job Portal | Applied Jobs</title>

<link rel="stylesheet" href="styles/styles_basic.css" type="text/css" />
<link rel="stylesheet" href="styles/bootstrap.css" type="text/css" />
<link rel="stylesheet" href="lib_files/font-awesome-4.0.3-css-font-awesome.min.css" />
  <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
        <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
        <!--[if lt IE 9]>
          <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
          <script src="https://oss.maxcdn.com/libs/respond.js/1.3.0/respond.min.js"></script>
        <![endif]-->

<script type="text/javascript" src="js/jquery-1.11.2.js"></script>
<script type="text/javascript" src="js/bootstrap.js"></script>
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


<?php include "includes/header.php"; ?> 


<div class="container-fluid top_space white_bg">
<div class="row">

<div class="col-md-2" style="margin-top:10px;">
<form role="form">
<div class="title">Job Posted in</div>
  <select name="sel" class="form-control" id="sel1" style="margin-top:10px;">
    <option>--Select--</option>
    <option >1 week</option>
    <option >2 week</option>
    <option >3 week</option>
    <option >4 week</option>
    <option >5 week</option>
  </select>
<div class="clr_both">
<div class="title">Job Categories </div>
 <div class="radio">
          <label><input type="radio" name="optradio">All Category</label>
        </div>
        <div class="radio">
          <label><input type="radio" name="optradio">Administration </label>
        </div>
        <div class="radio disabled">
          <label><input type="radio" name="optradio" >Analytical </label>
        </div>
       
         <div class="radio">
          <label><input type="radio" name="optradio">Architecture </label>
        </div>
        <div class="radio disabled">
          <label><input type="radio" name="optradio" >Documentation</label>
        </div>
          <div class="radio">
          <label><input type="radio" name="optradio">Financial</label>
        </div>
        <div class="radio disabled">
          <label><input type="radio" name="optradio" >Network</label>
        </div>
      <div class="pull-right"><a href="#" >Find Now</a></div>
     </div>
        
        <div class="title" style="margin-bottom:15px;">    States</div>
        
     
    
  <input type="checkbox" />&nbsp;Alaska <br />

  <input type="checkbox" />&nbsp;Arizona <br />
  <input type="checkbox" />&nbsp;Arkansas <br />
  <input type="checkbox" />&nbsp;California <br />
  <input type="checkbox" />&nbsp;Connecticut <br />
  <input type="checkbox" />&nbsp;District of Columbia <br />
  <input type="checkbox" />&nbsp;Florida <br />
  <input type="checkbox" />&nbsp;Georgia <br />
  <input type="checkbox" />&nbsp;Illinois <br />
  <input type="checkbox" />&nbsp;Indiana <br />
 <div class="pull-right"><a href="#" >Find Now</a></div>
</form>

</div>
<div class="col-md-9" style="margin-top:10px;">
<div class="box">
<div class="box-heading">Applied Jobs</div>
<div class="box-content">
<ul class="joblist">
<?php
	
	$show_query = mysql_query("SELECT jobcode,applieddate FROM seeker_appliedjob WHERE seekerid = '$session_seekid'");
		
		$show_row = mysql_num_rows($show_query);
		
		if($show_row > 0) {
  		
				while($show_array = mysql_fetch_array($show_query)){
					
					$check_jobcode = $show_array['jobcode'];
					$check_date = $show_array['applieddate'];
					
						$get_query = mysql_query("SELECT * FROM postjob WHERE jobcode ='$check_jobcode'");
						
							while($get_array = mysql_fetch_array($get_query)){
								
									$get_empname = $get_array['employer_name'];
									$get_jobtitle = $get_array['jobtitle'];
									$get_location = $get_array['location'];
									$get_description = $get_array['description'];
							?>
                            
                            
                            <li> <a href="#"> 
									<h3 style="color:#006699"><?php echo $get_jobtitle;?></h3> </a>
<a href="company_detail.php?empid=<?php echo $empid; ?>"><h4><?php echo $get_empname;?></h4></a>
<h5><span class="glyphicon glyphicon-map-marker" aria-hidden="true" style="margin-right:5px"></span><?php echo $get_location;?></h5>

<h4 class="clr_both"><small><?php echo substr($get_description,0,100)."..."; ?></small></h4>

</li>								
								
						<?php
							}
				}
				


		} else {
				
				echo "No Jobs where applied";
				
		}
  ?>
</ul>
</div>
</div>
</div>
</div>







</div>


<?php include("includes/footer.php"); ?>


</body>
</html>
