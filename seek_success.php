<?php 
error_reporting(0);

include "includes/config.php";

   $id =$_REQUEST['id'];
   
   if($id != "") {
	   
	$form4_id = mysql_query("SELECT * FROM seeker_personal WHERE id = '$id'");
   
    $form4_row = mysql_fetch_array($form4_id);      
	$seekerid = $form4_row['seekerid'];
	$email = $form4_row['mailid'];   
   } else {
?>	   
	<script>
	window.location = "seeker_reg3.php";
	</script>
<?php } ?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Job Portal</title>
<link rel="stylesheet" href="styles/styles_basic.css" type="text/css" />
<link rel="stylesheet" href="themes/default/default.css" type="text/css" media="screen" />
<link rel="stylesheet" href="styles/nivo-slider.css" type="text/css" media="screen" />
<link rel="stylesheet" href="styles/style_banner.css" type="text/css" media="screen" />
<link rel="stylesheet" href="styles/bootstrap.css" type="text/css" />
<link rel="stylesheet" href="//code.jquery.com/ui/1.11.2/themes/smoothness/jquery-ui.css">
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
</head>

<body>
<div class="body_container">
<div class="content_container">
<?php include("includes/header.php"); ?>




<div class="recent_listing">
<div class="inner_cnt_lft_1"><div class="content_inner_1">
<div class="title">Your Registration was Successfull !!!</div>
<h3>Welcome to Stsffingspot, <br/><br/></h3><font style="margin-left:40px;font-size:14px;">Confirmation mail is sent to <?php echo $email; ?>  Click here to  <a href="index.php">Login</a></font>
</div>

</form>
</div>

<div class="inner_cnt_rht"></div>
</div>

</div>

<?php include("includes/footer.php"); ?>
</div>


</div>

<br />
<br />
<br />
</body>
</html>
