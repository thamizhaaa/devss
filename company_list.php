<?php
include "includes/config.php";
$i = $_REQUEST['letter'];
if($i != "") {
	$query = mysql_query("select * from employer where employerName like '".$i."%'");
} else {
	$query = mysql_query("select * from employer");
}
 ?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Staffing Spot | Companies</title>
<link href="styles/styles_basic.css" rel="stylesheet" type="text/css" />
<link rel="stylesheet" href="themes/default/default.css" type="text/css" media="screen" />
<link rel="stylesheet" type="text/css" href="styles/bootstrap.css"/>
<link rel="stylesheet" type="text/css" href="styles/style_popup.css"/>
 <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
        <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
        <!--[if lt IE 9]>
          <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
          <script src="https://oss.maxcdn.com/libs/respond.js/1.3.0/respond.min.js"></script>
        <![endif]-->
<script type="text/javascript" src="js/bootstrap.js"></script>
<script type="text/javascript" src="js/jquery-1.10.2.min.js"></script>
<script type="text/javascript" src="js/bootstrap-dropdown.js"></script>
<script type="text/javascript" src="js/jquery.leanModal.min.js"></script>

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
	
		$("#modal_trigger").leanModal({top : 200, overlay : 0.6, closeButton: ".modal_close" });

	$(function(){
			$(".user_login").show();
	})

	$("#modal_trigger_emp").leanModal({top : 200, overlay : 0.6, closeButton: ".modal_close" });

	$(function(){
			$(".employer_login").show();
	})
	});
</script>


</head>

<body>
<?php include "includes/header.php"; ?> 
<div class="container-fluid white_bg top_space">
<div class="col-md-11">

<?php
$letter = range("A","Z");
?>
<div class="col-md-11">
<ul class="pagination">
<?php
 $nex = ord($i);
 if(($nex >= 65) && ($nex <= 90)) {		 
 $ne = $nex - 1;
 $next = chr($ne) ;
 ?>
<li><a href="company_list.php?letter=<?php echo $next; ?>">&lt;&lt;</a></li>
<?php } else { ?>
<li class="disabled"><a href="#">&lt;&lt;</a></li>
<?php
}
foreach($letter as $letters) {
?>
<li <?php if($i == $letters) { ?>
class="active" <?php } else { ?>
<?php } ?>
 ><a href="company_list.php?letter=<?php echo $letters; ?>"><?php echo $letters; ?></a></li>
<?php	
}
 if(($nex >= 65) && ($nex <= 90)) {
$pre = $nex + 1;
$prev = chr($pre) ;
?>
<li><a href="company_list.php?letter=<?php echo $prev; ?>">&gt;&gt;</a></li>
<?php } else { ?>
<li class="disabled"><a href="#">&gt;&gt;</a></li>
<?php } ?>
</ul>
<ul class="joblist">
<?php 
$count = mysql_num_rows($query);
if($count > 0) {
while($array = mysql_fetch_array($query)){ 
$empid= $array['empid'];
$emp_name = $array['employerName'];
?>
<li><a href="company_detail.php?empid=<?php echo $empid; ?>"><?php echo $emp_name; ?></a></li>

<?php } } else { echo "No Companies Found"; } ?>
</ul>


</div>



</div>
</div>

<?php include "includes/login_popup.php"; ?>
<?php include "includes/login_popup1.php"; ?>
<?php include("includes/footer.php"); ?>
</body>
</html>