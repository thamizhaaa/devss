<?php error_reporting(0);
include "includes/config.php";
include "includes/form_config.php";
include "includes/recaptchalib.php";

if(isset($_POST['submit'])) {
	
	$fname = $_POST['fname'];
	$lname = $_POST['lname'];
	$email = $_POST['email'];
	$loginid = $_POST['loginid'];
	$pass = $_POST['pass'];
	$cpass = $_POST['cpass'];
	$state = $_POST['location'];
	$city = $_POST['city'];
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
	
	$email = (filter_var($_POST['email'], FILTER_SANITIZE_EMAIL));
  	if (!filter_var($email, FILTER_VALIDATE_EMAIL)) 	
		$err_email = "  Enter valid Email address.          ";

	
	$e_query = mysql_query("select id from seeker_personal where mailid='$email'");
	$e_sq=mysql_num_rows($e_query);

	if ($email == ""){
		 $errors .= '.';
	}else if(!$e_sq=='') {
	$err_email = "$email is already in use.";

	}
	
	$login_query = mysql_query("select id from seeker_personal where loginid='$loginid'");
	
	$login_sq = mysql_num_rows($login_query);
	
		if ( !preg_match('/^[A-Za-z][A-Za-z0-9]{5,31}$/', $loginid) ) {
		$err_loginid = "Mininum 5 lettes with alphanumeric";
		
		} elseif(!$login_sq=='') {
		$err_loginid = "$loginid is already in use";
					
		}
	
		
		if($pass == "") {
			$err_pass = "    Enter Password.    "; 
			
			
		} elseif(!preg_match('/^(?=.*?[A-Z])(?=(.*[a-z]){1,})(?=(.*[\d]){1,})(?=(.*[!@#$^&*~]){1,})(?!.*\s).{8,15}$/',$pass)) {
			$err_pass = "8-15 character with AlphaNumeric and !@#$^&*~ ";
			
				
		} elseif($cpass == ""){
			$err_cpass = "    Enter Confirm Password.    "; 
			
			
		} elseif($pass == $cpass) {
			
			$pass_confirm = $pass;	
			
		} else {
			
			$err_pass = "   Password does not match.  ";	 
				
		}
		
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
	if(empty($_POST['agree']))
	$err_agree = "You must agree to our Terms & Conditions";
	
	
	$resp = recaptcha_check_answer ($privatekey, $_SERVER["REMOTE_ADDR"], $_POST["recaptcha_challenge_field"], $_POST["recaptcha_response_field"]); 
	
	if (!$resp->is_valid) 
	$err_captcha = "The reCAPTCHA wasn't entered correctly.  ";
	
	
	$errors .= $err_fname.$err_lname.$err_email.$err_loginid.$err_pass.$err_cpass.$err_zipcode.$err_dob.$err_mobile.$err_captcha.$err_resistance.$err_agree.$err_address;
	
	$validation_form1 = "";
	if(isset($errors))
	$validation_form1 .= $errors;
	
	if(!$validation_form1){
		
	$activation=md5($email.time());
		
	$seek_query = mysql_query("INSERT INTO seeker_personal(loginid,pass,state,country,zipcode,fname,lname,address,address1,dob,gender,mobile,residenceno,mailid,activation)VALUES('".$loginid."','".$pass."','".$state."','".$country."','".$zipcode."','".$fname."','".$lname."','".$address."','".$address1."','".$dob."','".$gender."','".$mobile."','".$residence."','".$email."','".$activation."')");
	
	mysql_query("UPDATE seeker_personal
SET seekerid = CONCAT('SEEK',id) 
ORDER BY id DESC LIMIT 1");

	$pass_id = mysql_query("SELECT id,fname,lname,mailid FROM seeker_personal order by id desc limit 1");
	
	$row = mysql_fetch_array($pass_id);
	$id = $row['id'];
	$fname_id = $row['fname']." ".$row['lname'];
	
	
	
	
	
	
?> 
<div id="myModal" class="modal fade" data-backdrop="static" >
  <div class="modal-dialog" style="margin-top:20%">
    <div class="modal-content">
      <div class="modal-header">
        <h4 class="modal-title"><img src="images/favicon.png" />&nbsp;&nbsp;Congratulation's <?php echo $fname_id; ?></h4>
      </div>
      <div class="modal-body">
        <p class="lead">“Activation email has been sent to your email ID. Please activate your account by following the process sent to your email ID"</p>
      </div>
      <div class="modal-footer">
      <a href="index.php" class="btn btn-warning col-sm-3 pull-right" style="margin-left:10px;">Back to home page</a>
      <a href="seeker_reg1.php?id=<?php echo $id; ?>" class="btn btn-warning col-sm-3 pull-right" style="margin-left:10px;">Next Step to Proceed</a>
      </div>
    </div><!-- /.modal-content -->
  </div><!-- /.modal-dialog -->
</div>

<?php	
 		$mail_subject = "Activation - Staffing Spot";
		
		$headers = "MIME-Version: 1.0" . "\r\n";
		$headers .= "Content-Type: text/html; charset=\"iso-8859-1\"\n";
        $headers .= "X-Priority: 1 (Highest)\n";
        $headers .= "X-MSMail-Priority: High\n";
        $headers .= "Importance: High\n";

		
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
<td colspan='2'><b>Dear  $fname_id,</b><br/><br/>
&nbsp;&nbsp;&nbsp;&nbsp; We have registered your credentials. Please click on the following link to activate your account<br/>
<br/>
</td>

</tr>
<tr><td colspan='2'><a href='http://staffingspot.in/activation.php?code=$activation' target='_blank'>http://staffingspot.in/activation/$activation</a> your personalized Account<br/><br/></td></tr>
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

mail ($email,$mail_subject,$mail_message,$headers);


	} else {
	}
}
session_destroy();
?>
<!DOCTYPE html>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>StaffingSpot | Registration</title>

<meta name="viewport" content="width=device-width, initial-scale=1">

<link rel="stylesheet" href="styles/styles_basic.css" type="text/css" />
<link rel="stylesheet" href="themes/default/default.css" type="text/css" media="screen" />
<link rel="stylesheet" href="styles/bootstrap.css" type="text/css" />
<link rel="stylesheet" href="styles/style_popup.css" type="text/css" />
<link rel="stylesheet" href="//code.jquery.com/ui/1.11.2/themes/smoothness/jquery-ui.css">
<link rel="stylesheet" href="styles/default.css" type="text/css">
<link rel="stylesheet" type="text/css" href="styles/bootstrapValidator.css"/>
<link rel="stylesheet" href="lib_files/font-awesome-4.0.3-css-font-awesome.min.css" />
<link rel="stylesheet" href="styles/datepicker.css" />
<link rel="stylesheet" href="styles/responsive_recaptcha.css" type="text/css" />

<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>   
<script type="text/javascript" src="js/jquery-1.10.2.min.js"></script>
<script type="text/javascript" src="js/bootstrap.js"></script>
<script type="text/javascript" src="js/bootstrap-dropdown.js"></script>
<script type="text/javascript" src="js/jquery.leanModal.min.js"></script>
<script type="text/javascript" src="js/bootstrap-datepicker.js"></script>
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

	$("#modal_trigger_emp").leanModal({top : 200, overlay : 0.6, closeButton: ".modal_close" });
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

<script type="text/javascript">
$(document).ready(function() {
	$('#wait_1').hide();
	$('#drop_1').change(function(){
	  $('#wait_1').show();
	  $('#result_1').hide();
      $.get("employer/zipcode.php", {
		func: "drop_1",
		drop_var: $('#drop_1').val()
      }, function(response){
        $('#result_1').fadeOut();
        setTimeout("finishAjax('result_1', '"+escape(response)+"')", 400);
      });
    	return false;
	});
});

function finishAjax(id, response) {
  $('#wait_1').hide();
  $('#'+id).html(unescape(response));
  $('#'+id).fadeIn();
}
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
<?php include("includes/header.php"); ?>


<div class="container-fluid white_bg">
<div class="container"> 
<div class="panel panel-default top_space" style="margin-top:15px;">
  <div class="alert alert-orange">
    <h3 class="panel-title"><strong>Job Seekers Registration Page - Personal</strong></h3>
  </div>
  <script type="text/javascript">
	var RecaptchaOptions = {
    theme : 'custom',
    custom_theme_widget: 'responsive_recaptcha'
 };
 </script>
<form class="form_top_space" action="" method="post" enctype="multipart/form-data">
  <div class="panel-body"  style="padding-top: 0px;"> 
  <div class="form-group">
 
  <img src="images/seeker_reg_1.jpg" class="img-responsive" />
  </div>
  
  <!-- Personal details -->
 <div class="alert alert-grey"><h5 class="panel-title">PERSONAL DETAILS</h5></div>
  <!-- First name and last name fields with server side validation-->
  
  <div class="form-group  top_space">
 <label class="col-sm-2 control-label" style="margin-left:3%;">First Name <sup class="err_txt_sup">*</sup></label>
<div class="col-sm-3"><input type="text"  class="form-control" name="fname" placeholder="First Name"  value="<?php echo $_POST['fname']; ?>"/><span class="help-block"><?php echo $err_fname; ?></span></div>

 <label class="col-sm-2 control-label" style="margin-left:3%;">Last Name <sup class="err_txt_sup">*</sup></label>
<div class="col-sm-3"><input type="text"  class="form-control" name="lname" placeholder="Last Name" value="<?php echo $_POST['lname']; ?>"/><span class="help-block"><?php echo $err_lname; ?></span></div>
</div>

  <!-- Email and Loginid fields with server side validation-->
  
  <div class=" clr_both form-group  top_space">
 <label class="col-sm-2 control-label" style="margin-left:3%;">E-Mail ID <sup class="err_txt_sup">*</sup></label>
<div class="col-sm-3"><input type="text"  class="form-control" name="email" placeholder="Email ID *" value="<?php echo $_POST['email']; ?>"/><span class="help-block"><?php echo $err_email; ?></span></div>

 <label class="col-sm-2 control-label" style="margin-left:3%;">Login Id <sup class="err_txt_sup">*</sup></label>
<div class="col-sm-3"><input type="text"  class="form-control" name="loginid" placeholder="Login ID *" value="<?php echo $_POST['loginid']; ?>" /><span class="help-block"><?php echo $err_loginid; ?></span></div>
</div>

  <!-- Password and Confirm Password fields with server side validation-->
  
  <div class=" clr_both form-group top_space ">
 <label class="col-sm-2 control-label" style="margin-left:3%;">Password <sup class="err_txt_sup">*</sup><br/><a href="#" class="btn btn-link passpolicy" style=" padding:0px; margin:0px;  font-size:10px;">( Password - Policy )</a></label>
<div class="col-sm-3"><input type="password" data-toggle="tooltip" title="Password Must Contains 8-15 character with AlphaNumeric and !@#$^&*~" class="form-control" name="pass" id="password" placeholder="Password *" /><span class="help-block"><?php echo $err_pass; ?></span></div>

 <label class="col-sm-2 control-label" style="margin-left:3%;">Confirm Password <sup class="err_txt_sup">*</sup></label>
<div class="col-sm-3"><input type="password" class="form-control" placeholder="Confirm Password" name="cpass"  /><span class="help-block"><?php echo $err_cpass ?></span></div>
</div>

  <!-- Date of birth fields with server side validation and bootstrap date picker plugin-->
  
  <div class="clr_both form-group">
  <label class="col-sm-2 control-label" style="margin-left:3%;">Date of Birth <sup class="err_txt_sup">*</sup></label>
  <div class="col-sm-3"><input type="text"  class="form-control span2" id="datepicker"  name="dob" placeholder="Date of Birth *" value="<?php echo $_POST['dob']; ?>" readonly data-date-format="mm/dd/yy" /><span class="help-block"><?php echo $err_dob; ?></span></div>

<label class="col-sm-2 control-label" style="margin-left:3%;">Gender </label>
  <div class="col-sm-3">
  <label><input type="radio" name="gender" value="Male" >&nbsp;Male</label>&nbsp;&nbsp;
  <label><input type="radio" name="gender" value="Female" >&nbsp;Female</label>
  </div>

  <div class="alert alert-grey clr_both"><h5 class="panel-title">CONTACT DETAILS</h5></div>
  
  <!-- Address 1 and Address 2 fields with server side validation-->
  
  <div class="clr_both form-group"> 
  <label class="col-sm-2 control-label" style="margin-left:3%;">Address 1 <sup class="err_txt_sup">*</sup></label>
  <div class="col-sm-3"><textarea name="address" placeholder="Address" rows="2" cols="15" class="form-control"><?php echo $_POST['address']; ?></textarea><span class="help-block"><?php echo $err_address; ?></span></div>
  <label class="col-sm-2 control-label" style="margin-left:3%;">Address 2 </label>
  <div class="col-sm-3"><textarea name="address1" placeholder="Address 2" rows="2" cols="15" class="form-control"><?php echo $_POST['address1']; ?></textarea><span class="help-block"><?php echo $err_address1; ?></span></div>
  </div>
  
  <!--City/state and mobile no fields with server side validation-->
  
  <div class="clr_both form-group"> 
  <label class="col-sm-2 control-label" style="margin-left:3%;">Zipcode <sup class="err_txt_sup">*</sup></label>
  <div class="col-sm-3">
  <input type="text" class="form-control" name="zipcode" id="drop_1" placeholder="Zipcode *">
  <span class="help-block"><?php echo $err_zipcode ; ?></span>
  </div>
  
  <label class="col-sm-2 control-label" style="margin-left:3%;">City / State <sup class="err_txt_sup">*</sup></label>
  <div class="col-sm-3"> 
   <span id="wait_1" style="display: none;">
    <img alt="Please Wait...="ajax-loader.gif"/>
    </span>
    <span id="result_1" style="display: none;"></span>
    </div>
    
    </div>
   
    <div class="clr_both form-group" style="margin-top: 4%">     
    <label class="col-sm-2 control-label" style="margin-left:3%;">Country <sup class="err_txt_sup">*</sup> 
    </label>
	<div class="col-sm-3"><select class="form-control" name="country" >
	<option value="US">US</option>
	</select><span class="help-block"></span>
    </div> 
    
   <label class="col-sm-2 control-label" style="margin-left:3%;">Mobile Number <sup class="err_txt_sup">*</sup></label>
    <div class="col-sm-3"><input type="text"  class="form-control" name="mobile" placeholder="Mobile Number *" value="<?php echo $_POST['mobile']; ?>"/><span class="help-block"><?php echo $err_mobile; ?></span>
  </div>
  
  </div>
  
   <!--Resisdence number and recapcha fields with server side validation--><!--Submit and reset buttons-->
  
  <div class="clr_both form-group"> 
   <label class="col-sm-2 control-label" style="margin-left:3%;">Residence Number </label>
   <div class="col-sm-3"><input type="text"  class="form-control" name="residence" placeholder="Residence Number" value="<?php echo $_POST['residence']; ?>"/><span class="help-block"><?php echo $err_resistance; ?></span><br/><label>
      <input type="checkbox" name="agree">&nbsp;&nbsp;&nbsp;I agree to the <a href="#" class="btn btn-link " style="padding:0px;margin:0px;text-decoration:none;">&nbsp;&nbsp; Terms & Conditions</a><span class="help-block"><?php echo $err_agree; ?></span>
    </label><br/><br/><input type="submit" class="btn btn-warning" name="submit"  value="Register"/>

<input type="reset" class="btn btn-warning" name="reset" style="margin-left:8px;"  value="Reset"/></div>
    
   <div class="col-sm-5" style="margin-left:3%;">
    <div id="responsive_recaptcha" style="display:none">

       <div id="recaptcha_image"></div>
       <div class="recaptcha_only_if_incorrect_sol" style="color:red">Incorrect please try again</div>
		
      <label class="solution">
        <span class="recaptcha_only_if_image">Type the text:</span>
        <span class="recaptcha_only_if_audio">Enter the numbers you hear:</span>

        <input type="text" id="recaptcha_response_field" name="recaptcha_response_field" />
      </label>
      
      <div class="options">
        <a href="javascript:Recaptcha.reload()" id="icon-reload">Get another CAPTCHA</a>
        <a class="recaptcha_only_if_image" href="javascript:Recaptcha.switch_type('audio')" id="icon-audio">Get an audio CAPTCHA</a>
        <a class="recaptcha_only_if_audio" href="javascript:Recaptcha.switch_type('image')" id="icon-image">Get an image CAPTCHA</a>
        <a href="javascript:Recaptcha.showhelp()" id="icon-help">Help</a>
      </div>
      
    </div>
    <script type="text/javascript"
    src="http://www.google.com/recaptcha/api/challenge?k=6LeP3v8SAAAAAPx7nvTlosvKvTFO-lB5XZEMUvzn">
 </script>
    <noscript>
   <iframe src="http://www.google.com/recaptcha/api/noscript?k=6LeP3v8SAAAAAPx7nvTlosvKvTFO-lB5XZEMUvzn"
        height="300" width="500" frameborder="0"></iframe><br>
   <textarea name="recaptcha_challenge_field" rows="3" cols="40">
   </textarea>
   <input type="hidden" name="recaptcha_response_field"
        value="manual_challenge">
 </noscript>
    <span class="help-block"><?php echo $err_captcha; ?></span></div>
  
  </div>
  
  <!--Password policy modal pop up-->
  
  <div id="policy" class="modal fade">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title">Password - Policy</h4>
                </div>
                <div class="modal-body">
                    <p><strong>Your password should have:</strong></p>
                    <ul>
                    <li>At least 8 characters and not more than 15 characters</li>
                    </ul>
                    <p><strong>Your password must include:</strong></p>
                     <ul>
                    <li>At least one upper case character (A-Z)</li>
					<li>At least one lower case character (a-z)</li>
                    <li>At least one number (0-9)</li>
                    <li>At least one special character out of these (!,@,#,$,^,&,*,~)</li>	
                    </ul>
                    <p><strong>It should not contain single quotes ( ' ), double quotes ( " ) or space characters</strong></p>
                    
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default col-sm-3 pull-right" style="margin-left:10px;" data-dismiss="modal">Close</button>
                    
                </div>
            </div>
        </div>
    </div>
  
  
  
</div>
</div>
</form>


</div>

</div>

</div>


    <script type="text/javascript" src="js/pwstrength.js"></script>
    <script type="text/javascript">
	
        jQuery(document).ready(function () {
            "use strict";
            var options = { ui: { bootstrap2: true } },
                $password = $('#password').pwstrength(options),
                common_words = ["password", "3141592", "yeah"];

            $password.pwstrength("addRule", "commonWords", function (options, word, score) {
                var result = false;
                $.each(common_words, function (i, item) {
                    var re = new RegExp(item, "gi");
                    if (word.match(re)) {
                        result = score;
                    }
                });
                return result;
            }, -100, true);
        });
    </script>
    <?php include("includes/footer.php"); ?>
<?php include "includes/login_popup.php"; ?>


</body>
</html>