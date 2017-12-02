<?php
error_reporting(E_ALL ^ E_NOTICE);
error_reporting(0);
@include("config.php");
//@include('generate_json.php');
//$username = $_SESSION["user_name"];
//$user_email = $_SESSION['user_email']; 
//$user_id = $_SESSION['user_id'];
//print_r($_SESSION);
@include("user_sessioncheck.php");
//echo $user_id;
print_r($_SESSION['empuser_id']);

if ($_SESSION['empuser_id'] == "") {
    header('Location: index.php');
}

if(isset($_SESSION["empuser_name"]) && isset($_SESSION["empuser_id"]))
{
$user_name = $_SESSION["empuser_name"] ;
$user_fb_email = $_SESSION["empuser_email"];
$user_id = $_SESSION["empuser_id"];
$user_id = $_SESSION['empuser_id'];
$user_bday = $_SESSION['empuser_bday'];

$birthday = date('d-m-Y', strtotime( $user_bday ));
//echo "a".$birthday = date_format($user_bday,'d-m-Y');

//$profpics = $_SESSION['image'];
//$user_id = $_SESSION["user_id"];
//exit;
}

// if(isset($_SESSION['image']))
// {
//     $profpics321 = $_SESSION['image'];
//     //exit;
// }


 
$facebook=$_SESSION['facebook'];
$userdata=$_SESSION['userdata'];
$logoutUrl=$_SESSION['logout'];

$access_token_title='fb_'.$facebook_appid.'_access_token';
$access_token=$facebook[$access_token_title];


 

if(isset($_POST['submit'])) {	
	$fname = $_POST['fname'];
	//$lname = $_POST['lname'];
	$email = $_POST['email'];
	$state = $_POST['states'];
	$dob = $_POST['dob'];
	$mobile = $_POST['mobile'];	
	if ($fname == "") 
	$err_fname= 'Please enter a valid first name.';	 
	if ($lname == "") 
	$err_lname = 'Please enter a valid last name.';	
	$email = (filter_var($_POST['email'], FILTER_SANITIZE_EMAIL));
  	if (!filter_var($email, FILTER_VALIDATE_EMAIL)) 	
		$err_email = "  Enter valid Email address.";	
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
		
	//$seek_query = mysql_query("INSERT INTO seeker_personal(fid,state,fname,lname,dob,mobile,mailid,status,provider_name)VALUES('".$facebook_id."','".$state."','".$fname."','".$lname."','".$dob."','".$mobile."','".$email."',1,'Facebook')");
	//$seek_query = mysql_query("INSERT INTO tbl_jobseeker(fld_name,fld_email,fld_mobile,fld_js_status,fld_delstatus,fld_provider_name)VALUES('".$fname."','".$email."''".$dob."','".$mobile."',,1,'Facebook')");
	
	
	mysql_query("UPDATE seeker_personal
SET seekerid = CONCAT('SEEK',id) 
ORDER BY id DESC LIMIT 1");

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

  	header("Location:home.php",false);
	ob_end_flush();
	}
}

?>

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


<!DOCTYPE html>
<html lang="en">
    <head>
	<meta http-equiv="content-type" content="text/html;charset=UTF-8" />    
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<meta name="description" content="">
	<meta name="author" content="staffingspot job portal">
	<title>Job Seeker Edit Profile | Staffingspot | Job Portal</title>
	<link rel="icon" href="favicon.ico" type="image/x-icon">

	<!-- BOOTSTRAPE STYLESHEET CSS FILES -->
	<link rel="stylesheet" href="css/bootstrap.min.css">

	<!-- JQUERY SELECT -->
	<link href="css/select2.min.css" rel="stylesheet" />

	<!-- JQUERY MENU -->
	<link rel="stylesheet" href="css/mega_menu.min.css">

	<!-- ANIMATION -->
	<link rel="stylesheet" href="css/animate.min.css">

	<!-- OWl  CAROUSEL-->
	<link rel="stylesheet" href="css/owl.carousel.css">
	<link rel="stylesheet" href="css/owl.style.css">

	<!-- TEMPLATE CORE CSS -->
	<link rel="stylesheet" href="css/style.css">
	<link rel="stylesheet" href="css/jquery.tagsinput.min.css">

	<!-- FONT AWESOME -->
	<link rel="stylesheet" type="text/css" href="css/font-awesome.min.css">
	<link rel="stylesheet" href="css/et-line-fonts.css" type="text/css">

	<!-- Google Fonts -->
	<link href="http://fonts.googleapis.com/css?family=Source+Sans+Pro:400,600,700,900,300" rel="stylesheet" type="text/css">
	<link href="https://fonts.googleapis.com/css?family=Open+Sans:400,600,700" rel="stylesheet" type="text/css">

        <!-- JAVASCRIPT JS  -->
        <script type="text/javascript" src="js/jquery-3.1.1.min.js"></script>


        <!-- JAVASCRIPT JS  --> 
        <!--<script type="text/javascript" src="js/jquery-migrate-1.2.1.min.js"></script>-->

        <!-- BOOTSTRAP CORE JS -->
        <script type="text/javascript" src="js/bootstrap.min.js"></script>



    </head>

    <body>
	<div class="page category-page">
	    <div id="spinner">
		<div class="spinner-img">
		    <img alt="Opportunities Preloader" src="images/loader.gif" />
		    <h2>Please Wait.....</h2>
		</div>
	    </div>

<?php @include("top.php"); ?>

	    <div class="clearfix"></div>


	    <section class="job-breadcrumb">
		<div class="container">
		    <div class="row">
			<div class="col-md-6 col-sm-7 co-xs-12 text-left">
			    <h3>Edit profile</h3>
			</div>
			<div class="col-md-6 col-sm-5 co-xs-12 text-right">
			    <div class="bread">
				<ol class="breadcrumb">
				    <li><a href="user-dashboard.php">Dashboard</a> </li>
				    <li class="active">edit profile</li>
				</ol>
			    </div>
			</div>
		    </div>
		</div>
	    </section>
	    <section class="dashboard-body">
		<div class="container">
		    <div class="row">
			<div class="col-md-12 col-sm-12 col-xs-12">
			    <div class="col-sm-12 well">
<div class="col-md-12" >
<h3 class="text-center">Welcome to StaffingSpot<br/>
<small>Modify your account and start connecting with us</small>
</h3>
<form method="post" role="form" class="form-group top_space" style="margin-top: 32px">

<div class="form-group">

<label class="col-sm-3 control-label">First Name *</label>
<div class="col-sm-3"><input type="text"  class="form-control" name="fname" placeholder="First Name *"  value="<?php echo $user_name; ?>"/>
	<span class="help-block"><?php echo $err_fname; ?></span></div>

<!-- <label class="col-sm-3 control-label">Last Name *</label>
<div class="col-sm-3"><input type="text"  class="form-control" name="lname" placeholder="Last Name" value="<?php echo $username; ?>"/>
	<span class="help-block"><?php echo $err_lname; ?></span></div> -->

</div>

<div class="form-group">

<label class="col-sm-3 control-label" >E-Mail *</label>
<div class="col-sm-3"><input type="text"  class="form-control" name="email" placeholder="Email ID *" value="<?php echo $user_fb_email; ?>" readonly/><span class="help-block"><?php echo $err_email; ?></span></div>


  <label class="col-sm-3 control-label">Date of Birth *</label>
  <div class="col-sm-3">
  	<input type="text"  class="form-control" id="datepicker"  name="dob" placeholder="Date of Birth *" value="<?php echo $birthday; ?>" readonly data-date-format="dd-mm-yyyy" /><span class="help-block"><?php echo $err_dob; ?></span></div>

</div>

<div class="form-group">

<label class="col-sm-3 control-label" >Location *</label>
<div class="col-sm-3"><input type="text"  class="form-control" name="states" placeholder="Location *" value="<?php echo $location; ?>"/><span class="help-block"><?php echo $err_state; ?></span></div>

 <label class="col-sm-3 control-label">Mobile Number </label>
  <div class="col-sm-3"><input type="text"  class="form-control" name="mobile" placeholder="Mobile Number " value="<?php echo $_POST['mobile']; ?>"/><span class="help-block"><?php echo $err_mobile; ?></span></div>

</div>

<div class="form-group">

<div class="col-sm-4 text-center" style="float:right">

<br/>
<input type="submit" class="btn btn-danger pull-right" name="submit"  value="Continue"/>
</div>


</div>

</form>

</div>

</div>
			</div>
		    </div>
		</div>
	    </section>


            <!-- DATEPICKER -->
	    <link rel="stylesheet" href="https://ajax.googleapis.com/ajax/libs/jqueryui/1.11.4/themes/smoothness/jquery-ui.css">
            <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
            <script src="https://ajax.googleapis.com/ajax/libs/jqueryui/1.11.4/jquery-ui.min.js"></script>

<?php @include("bottom.php"); ?>

            <!-- JQUERY SELECT -->
            <script type="text/javascript" src="js/select2.min.js"></script>

            <!-- MEGA MENU -->
            <script type="text/javascript" src="js/mega_menu.min.js"></script>

            <!-- JQUERY COUNTERUP -->
            <script type="text/javascript" src="js/counterup.js"></script>

            <!-- JQUERY WAYPOINT -->
            <script type="text/javascript" src="js/waypoints.min.js"></script>

            <!-- JQUERY REVEAL -->
            <script type="text/javascript" src="js/footer-reveal.min.js"></script>

            <!-- Owl Carousel -->
            <script type="text/javascript" src="js/owl-carousel.js"></script>

            <!-- CORE JS -->
            <script type="text/javascript" src="js/custom.js"></script>

        </div>
	<script type="text/javascript">
	    $('#tags').tagsInput({
		width: 'auto'
	    });
        </script>

        <script type="text/javascript" src="scripts/validate.min.js"></script>

        <script type="text/javascript" src="scripts/jquery.form.js"></script>
        <script>
	$(document).ready(function () {
	    $("#txtdob").datepicker({
		maxDate: 'today'
	    });
	});
        </script>   

        <script>
	    $(document).ready(function () {

		$("#edit_profile").validate({
		    rules: {
			txtname: {
			    required: true
			},
			txtdob: {
			    required: true
			},
			txtemail: {
			    required: true,
			    email: true
			},
			txtphone: {
			    required: true,
			    minlength: 10,
			    maxlength: 10,
			    number: true
			},
			countries_allresults: {
			    required: true
			},
			state_allresults: {
			    required: true
			},
			city_allresults: {
			    required: true
			},
			txtyear: {
			    required: true
			},
			txtmonth: {
			    required: true
			},
			tag: {
			    required: true
			},
			txtaddress: {
			    required: true
			},
			txtaboutmyself: {
			    required: true
			}
		    },
		    messages: {
			txtname: {
			    required: "Please provide username"
			},
			txtdob: {
			    required: "Please provide your dob"
			},
			txtemail: "Please provide a valid email address",
			txtphone: {
			    required: "Please provide your mobile number",
			    minlength: "Please specify a valid mobile number",
			    maxlength: "Please specify a valid mobile number",
			    number: "Please specify a valid mobile number"
			},
			countries_allresults: {
			    required: "Please provide your current country",
			},
			state_allresults: {
			    required: "Please provide your current state",
			},
			city_allresults: {
			    required: "Please provide your current city",
			},
			txtyear: {
			    required: "Please provide your year of experience",
			},
			txtmonth: {
			    required: "Please provide your month of experience",
			},
			tag: {
			    required: "Please provide your skills",
			},
			txtaddress: {
			    required: "Please provide your address"
			},
			txtaboutmyself: {
			    required: "Please give info about yourself in atleast one or two words"
			}
		    },
		    submitHandler: function (form) {
			if (confirm("Are you sure, do you want to update?")) {
			    var name = $("#txtname").val();
			    var dob = $("#txtdob").val();
			    var email = $("#txtemail").val();
			    var phone = $("#txtphone").val();
//			    var city = $("#city").val();
//			    var country = $("#country").val();
//			    var state = $("#state").val();
			    var year = $("#txtyear").val();
			    var month = $("#txtmonth").val();
			    var address = $("#txtaddress").val();
			    var aboutmyself = $("#txtaboutmyself").val();
			    var tags = $("#tags").val();
			    
			    
			     var jsonp = $(".countries_allresults").val();
//				var country = '';
				
				var json = jQuery.parseJSON(jsonp);
			    alert( json.name );
				
//				var obj = $.parseJSON(jsonp);
//				$.each(obj, function() {
//				    country += this['name'] ;
//				});
//			     var jsonp = $(".city_allresults").val();
//				var city = '';
//				var obj = $.parseJSON(jsonp);
//				$.each(obj, function() {
//				    city += this['name'];
//				});
//			     var jsonp = $(".state_allresults").val();
//				var state = '';
//				var obj = $.parseJSON(jsonp);
//				$.each(obj, function() {
//				    state += this['name'];
//				});
				
			    alert(country);
			    alert(state);
			    alert(city);
			    
			    
			    $.ajax({
				type: "POST",
				url: "user_profile_inner.php?name=" + name + "&dob=" + dob + "&email=" + email + "&phone=" + phone + "&address=" + address + "&aboutmyself=" + aboutmyself + "&city=" + city + "&year=" + year + "&month=" + month + "&tags=" + tags + "&country=" + country + "&state=" + state ,
				data:
					{
					    //"formData" : Data,				
					},
				datatype: 'html',
				success: function (data)
				{
				    alert("Profile Details are Updated Successfully");
				    location.reload();
				}
			    });

			    return true;
			} else {
			    return false;
			}
		    }
		});
	    });

	    $(function () {
		$('#txtcity').keydown(function (e) {
		    if (e.shiftKey || e.ctrlKey || e.altKey) {
			e.preventDefault();
		    } else {
			var key = e.keyCode;
			if (!((key == 8) || (key == 32) || (key == 46) || (key >= 35 && key <= 40) || (key >= 65 && key <= 90))) {
			    e.preventDefault();
			}
		    }
		});

		//called when key is pressed in textbox
		$("#txtphone").keypress(function (e) {
		    //if the letter is not digit then display error and don't type anything
		    if (e.which != 8 && e.which != 0 && (e.which < 48 || e.which > 57)) {
			e.preventDefault();
			return false;
		    }
		});
	    });

	</script>
	<link href="scripts/ddl/jquery.flexdatalist.css" rel="stylesheet" type="text/css">
	<link href="scripts/ddl/jquery.flexdatalist.min.css" rel="stylesheet" type="text/css">
	<script src="scripts/ddl/jquery.flexdatalist.min.js"></script>
	<script src="scripts/ddl/jquery.flexdatalist.js"></script>


	
	<script>
		    $('.flexdatalist').flexdatalist({
			minLength: 0,
			valueProperty: '*',
			selectionRequired: true,
			searchIn: 'name',
			data: 'countries.json'
		    });
	</script>
	<script>
		    $('.flexdatalist').flexdatalist({
			minLength: 0,
			valueProperty: '*',
			selectionRequired: true,
			searchIn: 'name',
			data: 'state.json'
		    });
	</script>
	<script>
		    $('.flexdatalist').flexdatalist({
			minLength: 0,
			valueProperty: '*',
			selectionRequired: true,
			searchIn: 'name',
			data: 'city.json'
		    });
	</script>
	
    </body>
</html>