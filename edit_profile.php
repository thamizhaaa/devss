<?php error_reporting(0);
include "reg_session.php";
include "employer/includes/function.php";
$classFunc = new myFunctions();
//echo $session_gender;
$genderchk = $session_gender;
?>


<!DOCTYPE html>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Job Portal</title>

<meta name="viewport" content="width=device-width, initial-scale=1">

<link rel="stylesheet" href="styles/styles_basic.css" type="text/css" />
<link rel="stylesheet" href="styles/bootstrap.css" type="text/css" />
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
<script type="text/javascript" src="js/bootstrap-dropdown.js"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>   
<script type="text/javascript" src="js/bootstrap-datepicker.js"></script>
<script type="text/javascript" src="js/myautocomplete.js"></script>

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
   $("#datepicker").datepicker(
    {viewMode: 'years',
     format: 'dd/mm/yyyy'
});

$('#datepicker').on('changeDate', function (ev) {
    //close when viewMode='0' (days)
    if(ev.viewMode === 'days'){
      $('#datepicker').datepicker('hide');
    }
})
}); 
  </script>
  
<script type="text/javascript">
	
	$(document).ready(function(){
	
     $("#myModal").modal({
            show:true,
            keyboard: false,
            backdrop: 'static'        
        });
		$(".passpolicy").click(function(){
		$("#policy").modal('show');
	});
	});
</script>


  
  
<style type="text/css">
  #password {
    /*padding: 10px;*/
   
    margin: 0 0 10px;
}

div.pass-container {
    height: 30px;
	background-color:#C3C;
}

div.pass-bar {
    height: 11px;
    margin-top: 2px;
}
div.pass-hint {
    font-family: arial;
    font-size: 11px;
}

  </style>	
 
</head>

<body>
<?php
if(isset($_POST['submit'])) {
	
	$fname = $_POST['fname'];
	$lname = $_POST['lname'];
	$state = $_POST['location'];
	$address = $_POST['address'];
	$address1 = $_POST['address1'];
	$dob = $_POST['dob'];
	$mobile = $_POST['mobile'];
	$residence = $_POST['residence'];
    $gender = $_POST['gender'];
	$zipcode = $_POST['zipcode'];
	$country = $_POST['country'];
	
	$fname = (filter_var($_POST['fname'], FILTER_VALIDATE_REGEXP, array('options' => array('regexp' => "/^[a-zA-Z. ]+$/")))); 
	if ($fname == "") 
	$err_fname= 'Please enter a valid first name.    ';
	
	$lname = (filter_var($_POST['lname'], FILTER_VALIDATE_REGEXP, array('options' => array('regexp' => "/^[a-zA-Z. ]+$/")))); 
	if ($lname == "") 
	$err_lname = 'Please enter a valid last name.    ';
		
	if($zipcode == "")
	$err_zipcode = "Enter Your zipcode";
	
	
	if(!empty($residence)) {
	 if(!preg_match('/^[0-9]+$/',$residence))
	$err_resistance = "Only Numberic values accepted";
	}
	
	
	if($address=="")
	$err_address = "Enter Your Address";
	
	if($dob == "")
	$err_dob = "Select your date of birth";
	
	if(!empty($mobile)) // phone number is not empty
{
    if(preg_match('/^\d{10}$/',$mobile)) // phone number is valid
    {
      $mobile = '0' . $mobile;

      // your other code here
    }
    else // phone number is not valid
    {
      $err_mobile = 'mobile number invalid !';
    }
}
else // phone number is empty
{
  $err_mobile = 'You must provide a mobile number !';
}
	
	
	$errors .= $err_fname.$err_lname.$err_zipcode.$err_dob.$err_mobile.$err_resistance;
	
	$validation_form1 = "";
	if(isset($errors))
	$validation_form1 .= $errors;
	
	if(!$validation_form1){
		
	
		
	$seek_query = mysql_query("UPDATE seeker_personal SET fname='$fname',lname='$lname',state='$state',address='$address',address1='$address1',dob='$dob',mobile='$mobile',residenceno='$residence',country='$country',gender='$gender',zipcode='$zipcode' WHERE seekerid='$session_seekid'");
	
	
	
?> 
<script>
alert("Profile Updated....!");
window.location = "edit_page.php";
</script>

<?php

	} else {
	}
}
?>
<?php include("includes/header.php"); ?>


<div class="container-fluid white_bg">
<?php include "includes/edit_listmenu.php"; ?>
<div class="col-sm-9"> 
<div class="panel panel-default top_space" style="margin-top:15px;">
  <div class="alert alert-orange">
    <h3 class="panel-title"><strong>Job Seekers Edit Page - Personal</strong></h3>
  </div>
 
<form class="form_top_space" action="" method="post">
  <div class="panel-body"> 
  <!-- Personal details -->
 <div class="alert alert-grey"><h5 class="panel-title">PERSONAL DETAILS</h5></div>
  <!-- First name and last name fields with server side validation-->
  
  <div class="form-group  top_space">
 <label class="col-sm-2 control-label" style="margin-left:3%;">First Name <sup class="err_txt_sup">* </sup></label>
<div class="col-sm-3"><input type="text"  class="form-control" name="fname" placeholder="First Name"  value="<?php echo $session_fname; ?>"/><span class="help-block"><?php echo $err_fname; ?></span></div>

 <label class="col-sm-2 control-label" style="margin-left:3%;">Last Name <sup class="err_txt_sup">* </sup></label>
<div class="col-sm-3"><input type="text"  class="form-control" name="lname" placeholder="Last Name" value="<?php echo $session_lname; ?>"/><span class="help-block"><?php echo $err_lname; ?></span></div>
</div>

  <!-- Email and Loginid fields with server side validation-->
  
  <div class=" clr_both form-group  top_space">
 <label class="col-sm-2 control-label" style="margin-left:3%;">E-Mail ID <sup class="err_txt_sup">* </sup></label>
<div class="col-sm-3"><input type="text"  class="form-control" name="email" placeholder="Email ID *" readonly value="<?php echo $session_emailid; ?>"/><span class="help-block"><?php echo $err_email; ?></span></div>

 <label class="col-sm-2 control-label" style="margin-left:3%;">Login Id <sup class="err_txt_sup">* </sup></label>
<div class="col-sm-3"><input type="text"  class="form-control" name="loginid" placeholder="Login ID *" readonly value="<?php echo $session_loginid; ?>" /><span class="help-block"><?php echo $err_loginid; ?></span></div>
</div>

  <!-- Password and Confirm Password fields with server side validation-->
  
  

  <!-- Date of birth fields with server side validation and bootstrap date picker plugin-->
  
  <div class="clr_both form-group">
  <label class="col-sm-2 control-label" style="margin-left:3%;">Date of Birth <sup class="err_txt_sup">* </sup></label>
  <div class="col-sm-3"><input type="text"  class="form-control span2" id="datepicker"  name="dob" placeholder="Date of Birth *" value="<?php echo $session_dob; ?>" readonly data-date-format="mm/dd/yy" /><span class="help-block"><?php echo $err_dob; ?></span></div>

<label class="col-sm-2 control-label" style="margin-left:3%;">Gender </label>
  <div class="col-sm-3">
  
    <label><input type="radio" name="gender" value="Male"<?php echo ($genderchk=='Male')?'checked':'' ?>>&nbsp;Male</label>&nbsp;&nbsp;
    <label><input type="radio" name="gender" value="Female"<?php echo ($genderchk=='Female')?'checked':'' ?>>&nbsp;Female</label>
    
    
    
  </div>

  <div class="alert alert-grey clr_both"><h5 class="panel-title">CONTACT DETAILS</h5></div>
  
  <!-- Address 1 and Address 2 fields with server side validation-->
  
  <div class="clr_both form-group"> 
  <label class="col-sm-2 control-label" style="margin-left:3%;">Address 1 <sup class="err_txt_sup">* </sup></label>
  <div class="col-sm-3"><textarea name="address" placeholder="Address" rows="2" cols="15" class="form-control"><?php echo $session_address; ?></textarea><span class="help-block"><?php echo $err_address; ?></span></div>
  <label class="col-sm-2 control-label" style="margin-left:3%;">Address 2 </label>
  <div class="col-sm-3"><textarea name="address1" placeholder="Address 2" rows="2" cols="15" class="form-control"><?php echo $session_address1; ?></textarea><span class="help-block"><?php echo $err_address1; ?></span></div>
  </div>
  
  <!--City/state and mobile no fields with server side validation-->
  
  <div class="clr_both form-group"> 
  
  	<label class="col-sm-2 control-label" style="margin-left:3%;">Country * </label>
    
	<div class="col-sm-3"><select class="form-control" name="country" >
	<option value="<?php echo $session_country ?>"><?php $classFunc->countryName($session_country);?></option>
    <option>--------------</option>
    <?php $classFunc->country_list();?>
	</select><span class="help-block"></span>
    </div> 
    
  
  <label class="col-sm-2 control-label" style="margin-left:3%;">Zipcode <sup class="err_txt_sup">*</sup></label>
  <div class="col-sm-3">
   <input type="text" class="form-control" name="zipcode" id="drop_1" placeholder="Zipcode *" value="<?php echo $session_zipcode; ?>" autocomplete="off">
    
    <span class="form-control-feedback" id="loader-image"><img class="hidden img-loader" src="LoaderIcon.gif"></span>
  
  	<span class="help-block ac_results" style="margin-top:0px;">
  	<ul class="list-unstyled displaycity" id="search_suggestion_holder">
            
  	</ul>
  	</span>
    <span class="help-block"><?php echo $err_zipcode; ?></span>
  </div>
  
 
    
    </div>
   
    <div class="clr_both form-group" style="margin-top: 4%">     
    
    <label class="col-sm-2 control-label" style="margin-left:3%;">City / State *</label>
  	<div class="col-sm-3"> 
   <input type="text" class="form-control" name="location" id="drop_2" placeholder="City/state *" value="<?php echo $session_state; ?>">
    <span class="help-block"><?php echo $err_location; ?></span>
   
  </div>
    
   <label class="col-sm-2 control-label" style="margin-left:3%;">Mobile Number <sup class="err_txt_sup">* </sup></label>
    <div class="col-sm-3"><input type="text"  class="form-control" name="mobile" placeholder="Mobile Number *" value="<?php echo $session_mobile; ?>"/><span class="help-block"><?php echo $err_mobile; ?></span>
  </div>
  
  </div>
  
   <!--Resisdence number and recapcha fields with server side validation--><!--Submit and reset buttons-->
  
  <div class="clr_both form-group"> 
   <label class="col-sm-2 control-label" style="margin-left:3%;">Residence Number</label>
   <div class="col-sm-3"><input type="text"  class="form-control" name="residence" placeholder="Residence Number" value="<?php echo $session_residenceno; ?>"/><span class="help-block"><?php echo $err_resistance; ?></span><br/>
   <input type="submit" class="btn  btn-warning" name="submit"  value="Update"/>

<input type="reset" class="btn  btn-warning" name="reset" style="margin-left:8px;"  value="Reset"/></div>
    
   <div class="col-sm-5" style="margin-left:3%;">
        
      
    </div>
    
    
    
  
  </div>
  
  <!--Password policy modal pop up-->
  
  
  
  
  
</div>
</div>
</form>


</div>

</div>

</div>


<?php include("includes/footer.php"); ?>

</body>
</html>