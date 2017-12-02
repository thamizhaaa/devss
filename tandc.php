<?php 
error_reporting(0);
include "includes/config.php"; 
require 'includes/facebook.php';
require 'includes/fbconfig.php';
require_once 'google/Google_Client.php';
require_once 'google/contrib/Google_Oauth2Service.php';
session_start();
$ip = $_SERVER['REMOTE_ADDR'];

$ip_query = mysql_query("select * from unique_visitors where visitorsip = '".$ip."'");
$ip_count = mysql_num_rows($ip_query);

if($ip_count==0) {
$ip_insert_query = mysql_query("insert into unique_visitors(visitorsip)values('".$ip."')");	
}
?>
<!DOCTYPE html>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1"/>
<title>StaffingSpot - the spot for your career</title>
<meta name="viewport" content="width=device-width, initial-scale=1">


<link rel="stylesheet" type="text/css" href="styles/styles_basic.css" />
<link rel="stylesheet" type="text/css" href="styles/bootstrap.css"/>
<link rel="stylesheet" href="lib_files/themes-smoothness-jquery-ui.css" />
<link rel="stylesheet" type="text/css" href="styles/style_popup.css"/>
<link rel="stylesheet" href="lib_files/font-awesome-4.0.3-css-font-awesome.min.css" />
  <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
        <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
        <!--[if lt IE 9]>
          <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
          <script src="https://oss.maxcdn.com/libs/respond.js/1.3.0/respond.min.js"></script>
        <![endif]-->
<script type="text/javascript" src="js/css3-mediaqueries.js"></script>
<style type="text/css">
	
	.pac-container:after {  /* Disclaimer: not needed to show 'powered by Google' if also a Google Map is shown */
    background-image: none !important;
    height: 0px;
}
</style>

<script type="text/javascript" src="js/jquery-1.11.2.js"></script>
<script type="text/javascript" src="js/bootstrap.js"></script>
<script type="text/javascript" src="js/bootstrap-dropdown.js"></script>
<script type="text/javascript" src="js/jquery.leanModal.min.js"></script>
<script src="http://maps.googleapis.com/maps/api/js"></script>
<script>
var myCenter=new google.maps.LatLng(51.508742,-0.120850);

function initialize()
{
var mapProp = {
  center:myCenter,
  zoom:5,
  mapTypeId:google.maps.MapTypeId.ROADMAP
  };

var map=new google.maps.Map(document.getElementById("googleMap"),mapProp);

var marker=new google.maps.Marker({
  position:myCenter,
  });

marker.setMap(map);
}

google.maps.event.addDomListener(window, 'load', initialize);
</script>

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
		
		
		$("#modal_trigger").leanModal({top : 200, overlay : 0.6, closeButton: ".modal_close" });

	$(function(){
			$(".user_login").show();
	})
	});
</script>


</head>

<body>

<?php include "includes/header.php"; ?>
<div class="container-fluid white_bg top_space" style="margin-top:2%;">

<div class="col-sm-10">

<div class="panel panel-default">
<?php if($_REQUEST['option'] =='terms') { ?>
<div class="panel-heading"><h3 class="panel-title">Terms & Conditions</h3></div>
<div class="panel-body">
<?php 
$term_query = mysql_query("select * from termsandcondition"); 
$term_array = mysql_fetch_array($term_query);
$terms = $term_array['terms'];
echo $terms;
?>

</div>

<?php } elseif($_REQUEST['option'] =='about') { ?>
<div class="panel-heading"><h3 class="panel-title">About Us</h3></div>
<div class="panel-body">
<?php 
$term_query = mysql_query("select * from about_us"); 
$term_array = mysql_fetch_array($term_query);
$terms = $term_array['about'];
echo $terms;
?>

</div>

<?php } elseif($_REQUEST['option'] =='sitemap') { ?>
<div class="panel-heading"><h3 class="panel-title">Contact Us</h3></div>
<div class="panel-body">
<h4>Contact Us</h4>
<br/>
<address>
  <strong>Staffingspot.com.</strong><br>
  4101, Dublin Blvd Suite F#103<br>
  Dublin CA 94568 USA<br>
  email: sales@staffingspot.com
</address>
<br/>
<br/>
<div id="googleMap" style="width:100%;height:380px;"></div>
</div>

<?php } ?>
</div>
</div>
<div class="col-sm-1"></div>
</div>


</div>
<?php include "includes/login_popup.php"; ?>
<?php include "includes/footer.php"; ?>


</body>
</html>
