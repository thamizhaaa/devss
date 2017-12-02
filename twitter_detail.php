<?php 
ob_start();
error_reporting(0);
include "includes/config.php"; 
include 'twitteroauth/twconfig.php';
include 'twitteroauth/twitteroauth.php';
include "includes/email_config.php";
session_start();
 
		$tw_id = 	$_SESSION['tw_oauth_id'] ;
        $first_name =    $_SESSION['tw_username'] ;
		$get_query = mysql_query('select * from seeker_personal where fid="'.$tw_id.'"');
		$get_count = mysql_num_rows($get_query);
		if($get_count > 0){ 
		header('Location:home.php');
		} 

if(isset($_POST['submit'])) {
	
	$fname = $_POST['fname'];
	$lname = $_POST['lname'];
	$email = $_POST['email'];
	$state = $_POST['states'];
	$dob = $_POST['dob'];
	$mobile = $_POST['mobile'];
	
	
	if ($fname == "") 
	$err_fname= 'Enter a valid first name.    ';
	 
	if ($lname == "") 
	$err_lname = 'Enter a valid last name.    ';
	
	$email = (filter_var($_POST['email'], FILTER_SANITIZE_EMAIL));
  	if (!filter_var($email, FILTER_VALIDATE_EMAIL)) 	
		$err_email = "  Enter valid Email address.          ";

	
	$e_query = mysql_query("select id from seeker_personal where mailid='$email'");
	$e_sq=mysql_num_rows($e_query);

	if ($email == ""){
		 $errors .= '.';
	}else if(!$e_sq=='') {
	$err_email = "Email is already in use.";
	}
	
	if($state == "")
	$err_state = "Enter your current Location";
	
	if($dob == "")
	$err_dob = "Select your date of birth";
	
	if(empty($mobile)) {
	$mobile = (filter_var($mobile, FILTER_VALIDATE_INT));
	if (!filter_var($mobile, FILTER_VALIDATE_INT)) 
	$err_mobile = "Enter a valid Mobile number.       ";
	}

	$errors .= $err_fname.$err_lname.$err_email.$err_state.$err_dob.$err_mobile;
	
	$validation_form1 = "";
	if(isset($errors))
	$validation_form1 .= $errors;
	
	if(!$validation_form1){
		
	$activation=md5($email.time());
		
	$seek_query = mysql_query("INSERT INTO seeker_personal
	(fid,state,fname,lname,dob,mobile,mailid,status,provider_name)
	VALUES
	('".$tw_id."','".$state."','".$fname."','".$lname."','".$dob."','".$mobile."','".$email."',1,'twitter')");
	
	mysql_query("UPDATE seeker_personal SET seekerid = CONCAT('SEEK',id) ORDER BY id DESC LIMIT 1");
	
	$mail_subject = "Welcome to Staffing Spot";
		
	

		
		$mail_message = "
		<html>
		<head>
		<title>HTML email</title>
		</head>
		<body >
		<table width='100%' cellpadding='0' cellspacing='0' border='0'>
<tr >
<td colspan='2' style='text-align:left'><a href='http://www.staffingspot.in/' target='_blank'><img src='http://www.staffingspot.in/images/logo_sp.png' width='183'  /></a></td>
</tr>
<tr><td colspan='2' align='center'><h2>Welcome to Staffing Spot</h2></td></tr>
<tr >
<td colspan='2'><b>Dear  $fname,</b><br/><br/>
&nbsp;&nbsp;&nbsp;&nbsp; We're so excited to welcome you to Staffingspot and We have registered your credentials.<br/>
<br/>
</td>

</tr>
<tr><td colspan='2'><b>What Next?</b><br/><br/></td></tr>
<tr><td colspan='2'>
<ul>
 <li>Search Thousands of Jobs and find Best Employer</li>
 <li>Apply a Job in a minute</li>
 <li>Post your resume and get even more exposure</li> 
</ul>  
</td></tr>

<tr><td colspan='2'><b>Sincerely,<br/>Staffing Spot</b>
</td></tr>
<br/>

<tr>
<td colspan='2' style='text-align:center'>All rights reserved © 2014 <a href='http://www.staffingspot.in/'>Staffingspot Ltd.</a>  </td>
</tr>
</table>
</body>
</html>";	

/*mail ($email,$mail_subject,$mail_message,$headers);*/
emailFunction($mail_subject,$mail_message,$email);

	
    header('Location:home.php');
	ob_end_flush();
	}
}

?>


<!DOCTYPE html>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>StaffingSpot | Twitter</title>

<link rel="stylesheet" type="text/css" href="styles/styles_basic.css"/>
<link rel="stylesheet" type="text/css" href="styles/bootstrap.css"/>
<link rel="stylesheet" type="text/css" href="styles/datepicker.css">
<link rel="stylesheet" href="//code.jquery.com/ui/1.11.2/themes/smoothness/jquery-ui.css">
<link rel="stylesheet" href="lib_files/font-awesome-4.0.3-css-font-awesome.min.css" />
<link rel="stylesheet" href="styles/datepicker.css" />
   <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
        <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
        <!--[if lt IE 9]>
          <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
          <script src="https://oss.maxcdn.com/libs/respond.js/1.3.0/respond.min.js"></script>
        <![endif]--> 
<script type="text/javascript" src="js/jquery-1.11.2.js"></script>
<script type="text/javascript" src="js/bootstrap.js"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script> 
<script type="text/javascript" src="js/bootstrap-dropdown.js"></script>
<script type="text/javascript" src="js/bootstrap-datepicker.js"></script>
<script type="text/javascript">
  $(document).ready(function() {
	  
   $("#datepicker").datepicker(   
    {viewMode: 'years',
     format: 'dd-mm-yyyy'
});

$('#datepicker').on('changeDate', function (ev) {
    //close when viewMode='0' (days)
    if(ev.viewMode === 'days'){
      $('#datepicker').datepicker('hide');
    }
})
}); 
  </script>
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

</head>
<body>

<?php include "includes/header.php"; ?>
<div class="container-fluid white_bg top_space">
<div class="container">

<div class="row top_space">

<div class="col-sm-2">


</div>
<div class="col-sm-8">
<!--<div class="progress">
   <div class="progress-bar progress-bar-striped active" role="progressbar" aria-valuenow="45" aria-valuemin="0" aria-valuemax="100" style="width: 33%">
    <span class="sr-only">45% Complete</span>
  </div>
  <div class="progress-bar progress-bar-warning progress-bar-striped" style="width: 33%">
    <span class="sr-only">20% Complete (warning)</span>
  </div>
  <div class="progress-bar progress-bar-danger" style="width: 34%">
    <span class="sr-only">10% Complete (danger)</span>
  </div>
</div>-->

</div>
<div class="col-sm-2">


</div>
</div>

<div class="row">

<div class="col-sm-2">


</div>
<div class="col-sm-7 well">
<div class="col-md-12" >
<h3 class="text-center">Welcome to StaffingSpot<br/>
<small>Modify your account and start connecting with us</small>
</h3>
<form action="" method="post" role="form" class="form-group top_space" style="margin-top: 32px">

<div class="form-group">

<label class="col-sm-1 control-label">First Name *</label>
<div class="col-sm-3"><input type="text"  class="form-control" name="fname" placeholder="First Name *"  value="<?php echo $first_name; ?>"/><span class="help-block"><?php echo $err_fname; ?></span></div>

<label class="col-sm-1 control-label" style="margin-left:3%;">Last Name *</label>
<div class="col-sm-3"><input type="text"  class="form-control" name="lname" placeholder="Last Name" value="<?php echo $last_name; ?>"/><span class="help-block"><?php echo $err_lname; ?></span></div>

</div>

<div class="form-group">

<label class="col-sm-1 control-label" >E-Mail *</label>
<div class="col-sm-3"><input type="text"  class="form-control" name="email" placeholder="Email ID *" value="<?php echo $email; ?>"/><span class="help-block"><?php echo $err_email; ?></span></div>


  <label class="col-sm-1 control-label" style="margin-left:3%;">Date of Birth *</label>
  <div class="col-sm-3"><input type="text"  class="form-control" id="datepicker"  name="dob" placeholder="Date of Birth *" value="<?php echo $birthday; ?>" readonly data-date-format="dd-mm-yyyy" /><span class="help-block"><?php echo $err_dob; ?></span></div>

</div>

<div class="form-group">

<label class="col-sm-1 control-label" >Location *</label>
<div class="col-sm-3"><input type="text"  class="form-control" name="states" placeholder="Location *" value="<?php echo $location; ?>"/><span class="help-block"><?php echo $err_state; ?></span></div>

 <label class="col-sm-1 control-label" style="margin-left:3%;">Mobile Number </label>
  <div class="col-sm-3"><input type="text"  class="form-control" name="mobile" placeholder="Mobile Number " value="<?php echo $_POST['mobile']; ?>"/><span class="help-block"><?php echo $err_mobile; ?></span></div>

</div>

<div class="form-group">

<div class="col-sm-11 text-center" style="margin-top:25px;">
<input type="submit" class="btn  btn-warning" style="width:60%;" name="submit"  value="Continue"/>




</div>


</div>

</form>

</div>

</div>
<div class="col-sm-2">


</div>
</div>

</div>



</div>


<?php include "includes/footer.php"; ?>
</body>
</html>
