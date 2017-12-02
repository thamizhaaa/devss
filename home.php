<?php 
error_reporting(0);
ob_start();
session_start();
include "includes/config.php"; 
require 'includes/facebook.php';
require 'includes/fbconfig.php';
$ip = $_SERVER['REMOTE_ADDR'];


$redirect_pages = $_REQUEST['page'];


$ip_query = mysql_query("select * from unique_visitors where visitorsip = '".$ip."'");
$ip_count = mysql_num_rows($ip_query);

if($ip_count==0) {
$ip_insert_query = mysql_query("insert into unique_visitors(visitorsip)values('".$ip."')");	
}

if($redirect_pages != ''){
header("Location:$redirect_pages",false);	
ob_end_flush();
}
?>
<!DOCTYPE html>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1"/>
<title>Job Portal</title>
<meta name="viewport" content="width=device-width, initial-scale=1">



<link rel="stylesheet" href="themes/default/default.css" type="text/css" media="screen" />
<link rel="stylesheet" href="styles/nivo-slider.css" type="text/css" media="screen" />
<link rel="stylesheet" href="styles/style_banner.css" type="text/css" media="screen" />
<link rel="stylesheet" type="text/css" href="styles/bootstrap.css"/>
<link rel="stylesheet" type="text/css" href="styles/styles_basic.css" />
<link rel="stylesheet" href="lib_files/themes-smoothness-jquery-ui.css" />
<link rel="stylesheet" href="lib_files/font-awesome-4.0.3-css-font-awesome.min.css" />
  <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
        <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
        <!--[if lt IE 9]>
          <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
          <script src="https://oss.maxcdn.com/libs/respond.js/1.3.0/respond.min.js"></script>
        <![endif]-->
<script type="text/javascript" src="js/css3-mediaqueries.js"></script>

<style>
.ui-autocomplete {
	 max-height:160px;
     background:#FFF;
	 overflow:hidden;
	 overflow-y:auto;	
	 width:100px;
	
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

</style>
<style type="text/css">
	
	.pac-container:after {  /* Disclaimer: not needed to show 'powered by Google' if also a Google Map is shown */
    background-image: none !important;
    height: 0px;
}
</style>

<script type="text/javascript" src="js/jquery-1.11.2.js"></script>
<script type="text/javascript" src="js/bootstrap.js"></script>
<script type="text/javascript" src="js/bootstrap-dropdown.js"></script>
<script src="lib_files/ajax-libs-jqueryui-1.11.2-jquery-ui.min.js"></script>
<!-- <script src="http://maps.google.com/maps/api/js?sensor=false&libraries=places&types=(cities)&language=en-AU"></script>

       <script type="text/javascript">
               function initialize() {
                       var input = document.getElementById('searchTextField');
                       var autocomplete = new google.maps.places.Autocomplete(input);
               }
               google.maps.event.addDomListener(window, 'load', initialize);
       </script>-->
      
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
<?php
session_start();
$facebook=$_SESSION['facebook'];
$userdata=$_SESSION['userdata'];
$fbemail = $userdata['email']; 

$usergoogle = $_SESSION['google_data'];
$gooemail = $usergoogle['email'];

$linkedin_user = $_SESSION["linkedin_user"];	
$linkedin_email = $linkedin_user->emailAddress;

if(($fbemail == "")&&($gooemail =="") && ($linkedin_email =="") && ($_SESSION['tw_oauth_id'] == "")) {
header('location:index.php');	
	
}

?>
<?php 
include "includes/header.php";
include 'includes/view_appliedjob.php';
 ?>
<div class="container-fluid no_pad_space white_bg"  >

<div id="wrapper">
  <div class="slider-wrapper theme-default">
  
  <div class="searchBox">
 <h2>the spot for your career</h2>
  <form action="job_list.php" target="_blank" method="get" onSubmit="window.location.reload()" role="form">
  <div class="row">

<div class="form-group">
<div class="col-sm-4 top_space" style="margin-right:2px;" >

<input type="text" name="kwords" id="kwords" autocomplete="off"  class=" form-control"  placeholder="Skills, Keywords"  />
</div>

<div class="col-sm-3 top_space" style="margin-right:2px;" >
<input type="text" autocomplete="off" placeholder="Location" name="location" id="location" class="form-control" />
</div>
<div class="col-sm-3 top_space">
<input class="sub_btn" name="submit" type="submit" value=""/></div>


</div>

</div>
</form>
</div>
<div id="slider" class="nivoSlider">  
  <?php 
  $query  = "select * from admin_slider where active='1' or active='2' order by id desc";
  $res    = mysql_query($query);
  
   while($row=mysql_fetch_array($res))
    {
	$now = date("Y-m-d H:i:s");	
	$image = "admin/".$row['image'];	
	$active = $row['active'];
	$fromdate = $row['fromdate'];
	$todate = $row['todate'];
	if(($active == "1") || ($active == "2")) {
?>
    
  <img src="<?php echo $image; ?>" data-thumb = "<?php echo $image; ?>"  alt="" /> 

   <?php } }?>
      </div>
      
    <div id="htmlcaption" class="nivo-html-caption"> <strong>This</strong> is an example of a <em>HTML</em> caption with <a href="#">a link</a>. </div>
  </div>
</div>



</div>


<?php include "includes/footer.php"; 
?>


<script type="text/javascript" src="js/jquery.nivo.slider.js"></script> 

<script type="text/javascript">
    $(window).load(function() {
       $('#slider').nivoSlider({
				effect:'fade'
			});
    });
    </script>
<?php 
 
?>

</body>
</html>
