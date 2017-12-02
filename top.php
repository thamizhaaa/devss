<?php
/*date_default_timezone_set("Asia/Kolkata");
echo date("Y-m-d H:i:s"); */
// error_reporting(E_ALL ^ E_NOTICE);
// error_reporting(0);
session_start();

@include("config.php");	
@include('common.php');
@include("user_sessioncheck.php");

/* Create the error log start */

@include("create_error_log.php");

/* Create the error log start */
//print_r($_SESSION);

if(isset($_SESSION["user_name"]))
{
 $username = $_SESSION["user_name"];
}
if(isset($_SESSION["user_email"]))
{
 $user_email = $_SESSION['user_email']; 
}
if(isset($_SESSION["user_id"]))
{
 $user_id = $_SESSION['user_id'];
}
if(isset($_SESSION["empuser_name"]))
{
 $empusername = $_SESSION["empuser_name"];    
}
if(isset($_SESSION["empuser_email"]))
{
 $empuser_email = $_SESSION['empuser_email']; 
}
if(isset($_SESSION["empuser_id"]))
{
 $empuser_id = $_SESSION['empuser_id'];   
}
//echo $_SESSION["emp_other_details"];

if(isset($_SESSION["emp_other_details"]))
{
    $empotherdetails = $_SESSION["emp_other_details"];
}
    $query = "SELECT * FROM tbl_jobseeker_details where fld_js_id ='$user_id' and fld_delstatus=0";
	$result = mysql_query($query)or die(mysql_error());
	$num_row = mysql_num_rows($result);
        $row = mysql_fetch_array($result);
        if($num_row >= 1 ) 
        {	
               $profilepic = $row["fld_profilepic"];               
               $profpath = 'images/profilepic/';
               $profpics = $profpath.$profilepic;
        }
    $empquery = "SELECT * FROM tbl_employer_details ted join tbl_employer te on(ted.fld_empid = te.fld_id) where ted.fld_empid ='$empuser_id' and te.fld_delstatus!=2";
    $empresult = mysql_query($empquery)or die(mysql_error());
    $empnum_row = mysql_num_rows($empresult);
        $emprow=mysql_fetch_array($empresult);
        if($empnum_row >= 1 ) 
        {   
                $empprofilepic = $emprow["fld_logo"];        
                $empotherdetails1 = $emprow["fld_others_details"];        
        }
$directoryURI = $_SERVER['REQUEST_URI'];
$file = basename($directoryURI); 
$files=strstr($file, '?', true);
?>

<style type="text/css">    
@import url(http://fonts.googleapis.com/css?family=Abel);
*{
 font-family:Palatino Linotype;
}
</style>

<div class="overlaymodal" style="display: none"></div>
<style type="text/css">    
    .overlaymodal {
    position: fixed;
    left: 0px;
    top: 0px;
    width: 100%;
    height: 100%;
    z-index: 9999;
    background: url('images/loader.svg') 50% 50% no-repeat rgba(249,249,249,0.5);
}
.swal2-cancel {
        margin-left: 2%;
}
</style>


    <div class="header-top-white">
        <div class="container">
            <div class="row">
                <nav id="menu-1" class="mega-menu fa-change-black" data-color=""> 
                    <section class="menu-list-items container"> 
                        <div class="col-md-12 col-sm-12 col-xs-12 nopadding">
                            <ul class="menu-logo">
                                <li>                        
                                    <?php
                                    if($empuser_id!="")
                                    {
                                    ?>                       
                                    <center>
                                    <a href="index.php">                             
                                        <img src="images/logo.png" alt="logo" class="img-responsive">                           
                                    </a>
                                    </center>
                                    <?php
                                    }
                                    else
                                    {
                                    ?>
                                    <center>
                                    <a href="index.php">                                                      
                                        <img src="images/logo.png" alt="logo" class="img-responsive">                             
                                    </a>
                                    </center>
                                    <?php
                                    }
                                    ?>
                                    <div class="menu-mobile-collapse-trigger"><span></span></div>
                                </li>
                            </ul>
                            <ul class="menu-links pull-right" style="display: none; max-height: 400px; overflow: auto;">                   

                        <?php
                        if($empuser_id=="")
                        {
                        ?>

                            <li><a href="javascript:void(0);">Jobs <i class="fa fa-angle-down fa-indicator"></i></a> 
                    <div class="grid-col-3 drop-down"> 
                        <div class="grid-row">                                                  
                                <ul class="jobs-services">
				    <li class="<?php if ($file=="jobs_location.php") {echo "active"; } else  {echo "noactive";}?>"> 
					<a href="jobs_location.php"> <i class="fa fa-angle-right"></i> Jobs by Location</a>
				    </li>
				    <li class="<?php if ($file=="all-categories.php") {echo "active"; } else  {echo "noactive";}?>"> 
					<a href="all-categories.php"> <i class="fa fa-angle-right"></i> Jobs by Categories</a>
				    </li>
				   
				    <li class="<?php if ($file=="all_skills.php") {echo "active"; } else  {echo "noactive";}?>"> 
					<a href="all_skills.php"> <i class="fa fa-angle-right"></i> Jobs by Skills</a>
				    </li>
				    <li class="<?php if ($file=="all_companies.php") {echo "active"; } else  {echo "noactive";}?>"> 
					<a href="all_companies.php"> <i class="fa fa-angle-right"></i> Jobs by Company</a>
				    </li>
                                                             
                                </ul>
                        </div>
                    </div>
                </li>




                      <!--   <li><a href="javascript:void(0);"> Jobs <i class="fa fa-angle-down fa-indicator"></i></a> 
                        <div class="grid-col-12 drop-down"> 
                        <div class="grid-row"> 
                            <div class="grid-col-4">                              
                                <ul>
                                    <li><a href="javascript:void(0);"> <i class="fa fa-angle-right"></i> Walkin Jobs</a></li>
                                    <li><a href="jobs_location.php"> <i class="fa fa-angle-right"></i> Jobs by Location</a></li>
                                    <li><a href="javascript:void(0);"> <i class="fa fa-angle-right"></i>Jobs by Skills</a></li>
                                    <li><a href="javascript:void(0);"> <i class="fa fa-angle-right"></i> Jobs by Company</a></li>
                                    <li><a href="all-categories.php"> <i class="fa fa-angle-right"></i> Jobs by Categories</a></li>
                                    <li><a href="javascript:void(0);"> <i class="fa fa-angle-right"></i> Advanced Search</a></li>
                                    <!--<li><a href="javascript:void(0);"> <i class="fa fa-angle-right"></i> Part Time Jobs <label class="label label-info">New</label></a></li>
                                </ul>
                            </div>
                            <div class="grid-col-4">
                                <h4>Popular Jobs</h4>
                                <ul>
                                    <li><a href="javascript:void(0);"> <i class="fa fa-angle-right"></i> IT Jobs</a></li>
                                    <li><a href="javascript:void(0);"> <i class="fa fa-angle-right"></i> BPO Jobs</a></li>
                                    <li><a href="javascript:void(0);"> <i class="fa fa-angle-right"></i> Government Jobs</a></li>
                                    <li><a href="javascript:void(0);"> <i class="fa fa-angle-right"></i>Banking Jobs</a></li>
                                   
                                </ul>
                            </div>
                            
                             <div class="grid-col-4">   
                                  <br/>
                                  <br/>
                                <ul>
                                   
                                    <li><a href="javascript:void(0);"> <i class="fa fa-angle-right"></i> HR Jobs</a></li>
                                    <li><a href="javascript:void(0);"> <i class="fa fa-angle-right"></i> Gulf Jobs </a></li>
                                    <li><a href="javascript:void(0);"> <i class="fa fa-angle-right"></i> Freelancers</a></li>
                                    <li><a href="javascript:void(0);"> <i class="fa fa-angle-right"></i> Build Resume  <label class="label label-info">New</label></a></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </li> -->



<!--                <li><a href="javascript:void(0);">Companies <i class="fa fa-angle-down fa-indicator"></i></a> 
                    <div class="grid-col-3 drop-down"> 
                        <div class="grid-row">                                                  
                                <ul>
                                    <li><a href="javascript:void(0);"> <i class="fa fa-angle-right"></i> Browse Companies</a></li>
                                    <li><a href="javascript:void(0);"> <i class="fa fa-angle-right"></i> Company Details</a></li>                                  
                                </ul>
                        </div>
                    </div>
                </li>-->

                

                <li><a href="javascript:void(0);">Services <i class="fa fa-angle-down fa-indicator"></i></a> 
                    <div class="grid-col-3 drop-down"> 
                        <div class="grid-row">                                                  
                                <ul class="jobs-services">
<!--                                <li><a href="javascript:void(0);"> <i class="fa fa-angle-right"></i> E-Courses</a></li>
                                    <li><a href="javascript:void(0);"> <i class="fa fa-angle-right"></i> Career Advice</a></li>
                                    <li><a href="javascript:void(0);"> <i class="fa fa-angle-right"></i> Interview Preparation</a></li>-->
                                    <li class="<?php if ($file=="interview_tips.php") {echo "active"; } else  {echo "noactive";}?>"> 
					<a href="interview_tips.php"> <i class="fa fa-angle-right"></i> Interview Tips</a>
				    </li>
                                    <li class="<?php if ($file=="resume_tips.php") {echo "active"; } else  {echo "noactive";}?>"> 
					<a href="resume_tips.php"> <i class="fa fa-angle-right"></i> Resume Tips</a>
				    </li>
                                                                       
                                </ul>
                        </div>
                    </div>
                </li>

                    <?php
                    }
                    ?>         
                    <?php
                    if($empuser_id=="" && $user_id=="")
                    {
                    ?>
                       <!-- <li class="no-bg login-btn-no-bg"><a href="#" class="login-header-btn" data-toggle="modal" data-target="#myModal1"><i class="fa fa-sign-in"></i>Freelancer</a></li>   -->
                    <?php
                    }
                    ?>

                        <?php
                        if($empuser_id!="")
                        {
                            if($empotherdetails == 1 || $empotherdetails1 == 1)
                            {

                        ?>                

                        
        <li class="no-bg login-btn-no-bg"><a href="searchresume.php" class="login-header-btn"><i class="fa fa-cloud" aria-hidden="true"></i>Search Resume</a></li> 
                        <li class="no-bg login-btn-no-bg"><a href="postjob.php" class="login-header-btn"><i class="fa fa-cloud" aria-hidden="true"></i></i>Post Job</a></li>              
                        <?php
                            }
                            else if($empotherdetails == 0 && $empotherdetails1 == 0)
                            {
                        ?>
                        <li class="no-bg login-btn-no-bg"><a href="add_emp_details.php" class="login-header-btn"><i class="fa fa-cloud" aria-hidden="true"></i>Employer Details</a></li> 
                        <?php
                            }
                            ?>

                       <li class="profile-pic hoverTrigger">                   
                                <?php
                                 if(file_exists($empprofilepic) && (preg_match('/\.([^\.]+)$/', $empprofilepic)))
                                 {
//                                    echo $empprofilepic;
                                 ?>
                        <a href="javascript:void(0)"> 
			    <img src="<?php echo $empprofilepic; ?>" alt="user-img" class="img-circle" width="36" height="36">
			    <span><?php echo $empusername;?> </span>
			    <i class="fa fa-angle-down fa-indicator"></i> 
			    <div class="mobileTriggerButton"></div>
			</a>
                                <?php
                                 }
                                else
                                {
                                ?>                        
                        <a href="javascript:void(0)"> 
			    <img src="images/nopicture.jpg" alt="user-img" class="img-circle" width="36">
			    <span><?php echo $empusername;?> </span>
			    <i class="fa fa-angle-down fa-indicator"></i>
			    <div class="mobileTriggerButton"></div>
			</a>
                                <?php
                                }
                            
                                ?>
                                <ul class="drop-down-multilevel left-side effect-fade" style="transition: all 400ms ease 0s;">
                                    <?php
                                    if(($empotherdetails == 1) || ($empotherdetails1 == 1))
                                    {
                                    ?>
				    <li class="<?php if ($file=="company-dashboard.php") {echo "active"; } else  {echo "noactive";}?>">
                                            <a href="company-dashboard.php"><i class="fa fa-user"></i> My Profile</a>
				    </li>
				    <li class="<?php if ($file=="emp-change-password.php") {echo "active"; } else  {echo "noactive";}?>">
                                            <a href="emp-change-password.php"><i class="fa fa-lock"></i>Change Password</a>
				    </li>
				    
                                    <?php
                                    }
                                    ?>
                                    <!-- <li><a href="#"><i class="fa fa-mail-forward"></i> Inbox</a></li>
                                    <li><a href="#"><i class="fa fa-gear"></i> Account Setting</a></li> -->
                                    <li><a href="logout.php"><i class="fa fa-power-off"></i> Logout</a></li>
                                </ul>
                            </li>






                            <?php
                        }                  
                         elseif($user_id!="")
                         {

                        ?>                
                       <li class="profile-pic hoverTrigger">                   
                                <?php
                                 if(file_exists($profpics) && (preg_match('/\.([^\.]+)$/', $profpics)))
                                 {
                                 ?>
                           <a href="javascript:void(0)"> <img src="<?php echo $profpics; ?>" alt="user-img" class="img-circle" width="36" height="36"><span><?php echo $username;?> </span><i class="fa fa-angle-down fa-indicator"></i> <div class="mobileTriggerButton"></div></a>
                                <?php
                                 }
                                else
                                {
                                ?>                        
                        <a href="javascript:void(0)"> <img src="images/nopicture.jpg" alt="user-img" class="img-circle" width="36"><span><?php echo $username;?> </span><i class="fa fa-angle-down fa-indicator"></i> <div class="mobileTriggerButton"></div></a>
                                <?php
                                }
                                ?>
                                <ul class="drop-down-multilevel left-side effect-fade" style="transition: all 400ms ease 0s;">
				    <li class="<?php if ($file=="user-dashboard.php") {echo "active"; } else  {echo "noactive";}?>">
                                            <a href="user-dashboard.php"><i class="fa fa-user"></i>My Profile</a>
				    </li>
				    <li class="<?php if ($file=="user-change-password.php") {echo "active"; } else  {echo "noactive";}?>">
                                            <a href="user-change-password.php"><i class="fa fa-lock"></i>Change Password</a>
				    </li>
                            <li><a href="logout.php"><i class="fa fa-power-off"></i> Logout</a></li>
                                </ul>
                            </li>

                            <?php
                        }
                            else
                               {                    
                            ?>    
                             <li class="no-bg login-btn-no-bg"><a href="#" class="login-header-btn"data-toggle="modal" data-target="#myModal1"><i class="fa fa-sign-in" ></i>Employer</a></li>

                           <li class="no-bg login-btn-no-bg"><a href="#" class="login-header-btn" data-toggle="modal" data-target="#myModal"><i class="fa fa-sign-in"></i> Log in</a></li>
                            <?php
                               }
                               ?>

                        </ul>
                        </div>
                    </section>
                </nav>
            </div></div>
            </div>
            
<!--Employer-->
<div class="modal fade" id="myModal1" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel"aria-hidden="true" data-backdrop="static" data-keyboard="false">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" id="mod_close" data-dismiss="modal" aria-hidden="true">&times;</button>
		<p class="modal-logo">
                    <img src="images/logo.png" alt="Staffingspot Logo"/>
                </p>
                <h4 class="modal-title" id="myModalLabel">Employer Login/Registration - <a href="javascript:void(0);">Staffingspot</a></h4>
            </div>
            <div class="modal-body">
                <div class="row">
                    <div class="col-md-10" style="border-right: 1px dotted #C2C2C2;">
                        <!-- Nav tabs -->
                        <ul class="nav nav-tabs">
                            <li class="active"><a href="#login1" data-toggle="tab">Login</a></li>
                            <li><a href="#signup1" data-toggle="tab">Registration</a></li>
			    <li><a href="#empforgotpassword" data-toggle="tab">Forgot Password</a></li>
                        </ul>
                        <!-- Tab panes -->
			<div class="tab-content">
                            <div class="tab-pane active" id="login1"> 
           
                                <div class="err" id="add_err_emplogin"></div>
				<form role="form" class="form-horizontal loginform" id="loginform" autocomplete="off">
                                    <div class="form-group">
                                        <label for="email" class="col-sm-2 col-md-2 control-label">Email</label>
                                        <div class="col-sm-10 col-md-10">
                                            <input type="email" class="form-control" id="emptxtloginemail" name="emptxtloginemail" placeholder="Please Enter Your Email" required="true" onkeyup="ValidateEmailID_emplogin(this);"/>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label for="exampleInputPassword1" class="col-sm-2 col-md-2 control-label">Password</label>
                                        <div class="col-sm-10 col-md-10">
                                            <input type="password" class="form-control" id="emptxtloginpswd" name="emptxtloginpswd" placeholder="Please Enter Your Password" required="true" onkeyup="ValidatePassword_emplogin(this);"/>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <div class="col-md-offset-2 col-sm-offset-2 col-sm-10 col-md-10">
                                            <button type="submit" id="submit_btn1" class="btn btn-primary btn-sm">Login</button>
                                             <input type="reset" id="resetemploginpopup" class="btn btn-primary btn-sm" value="Reset">
<!--                                        <a href="javascript:;">Forgot your password?</a>-->
                                        </div>
                                    </div>
                                </form>
                            </div>
							
                            
                            
                            
                            
                            
                            <div id="signup_results"></div>
                            <div class="tab-pane" id="signup1">  

                                <div class="err" id="Success"></div>
<br/>			  
                                <form role="form" class=" form-horizontal signupform" id="signform" name="signform" autocomplete="off">
                                    <div class="form-group">
                                        <label for="email" class="col-sm-2 col-md-2 control-label">Name</label>                                                                              
                                        <div class="col-md-10 col-sm-10">
                                            <input type="text" class="form-control" placeholder="Name" id="emptxtsignupname" name="emptxtsignupname" required="true" onkeyup="ValidateName(this)"/>
                                        </div>                                    
                                    </div>
                                    <div class="form-group">
                                        <label for="email" class="col-sm-2 col-md-2 control-label">Email</label>
                                        <div class="col-sm-10 col-md-10">
                                            <input type="email" class="form-control" placeholder="Email" id="emptxtsignupemail" name="emptxtsignupemail" required="true" onkeyup="ValidateEmailID_empsignup(this);"/>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label for="mobile" class="col-sm-2 col-md-2 control-label">Mobile</label>
                                        <div class="col-sm-10 col-md-10">
                                            <!--<input type="text" class="form-control" placeholder="Mobile" onkeypress="return isNumberKey(event)" maxlength="10" id="emptxtsignupmobile" name="emptxtsignupmobile" required="true"/>-->
                                            <input type="text" class="form-control" placeholder="Mobile" onkeyup="ValidateNumber_emp(this)" onkeypress="return isNumberKey(event)" maxlength="10" id="emptxtsignupmobile" name="emptxtsignupmobile" required="true"/>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label for="password" class="col-sm-2 col-md-2 control-label">Password</label>
                                        <div class="col-sm-10 col-md-10">
                                            <input type="password" class="form-control" id="emptxtsignuppswd" name="emptxtsignuppswd" required="true" placeholder="Password" onkeyup="ValidatePassword_empsignup(this);"/>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <div class="col-md-offset-2 col-md-10 col-sm-offset-2 col-sm-10">                                     
                                            <button type="submit" id="signup_btn1" class="btn btn-primary btn-sm loginbtn">Sign up</button>
                                            <input type="reset" id="resetempregpopup" class="btn btn-primary btn-sm" value="Reset">
                                        <!-- <button type="button" class="btn btn-default btn-sm">
                                            Cancel</button> -->
                                        </div>
                                    </div>
                                </form>
                            </div>
			    <div class="tab-pane" id="empforgotpassword"> 
            
				<div class="err" id="add_err"></div>
<br/>								
				<form role="form" class="form-horizontal empforgotpasswordform" id="empforgotpasswordform" autocomplete="off">
				    <div class="form-group">
					<label for="email" class="col-sm-2 control-label">
					    Email</label>
					<div class="col-sm-10">
					    <input type="email" class="form-control" id="email_fp_emp" name="email_fp" placeholder="Please Enter Your Email" required="true" onkeyup="ValidateEmail_empforgot(this);" />
                        </div>
                    </div>
                                
				    <div class="row">
					<div class="col-sm-2">
                </div>
					<div class="col-sm-10">
					    <button type="submit" id="emp_submit_butn" class="btn btn-primary btn-sm">Send</button>
                        <input type="reset" id="resetempforgotpopup" class="btn btn-primary btn-sm" value="Reset">

    <!--                                        <a href="javascript:;">Forgot your password?</a>-->
            </div>
        </div>
                                </form>
    </div>


                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<?php 
//complted ?>
<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel"
    aria-hidden="true" data-backdrop="static" data-keyboard="false">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" id="mod_close_log" data-dismiss="modal" aria-hidden="true">&times;</button>
                    <p class="modal-logo">
                        <img src="images/logo.png" alt="Staffingspot Logo"/>
                    </p>
                    <h4 class="modal-title" id="myModalLabel">Login/Registration - <a href="javascript:void(0);">Staffingspot</a></h4>
                </div>
                <div class="modal-body">
                    <div class="row">
                        <div class="col-md-10 col-sm-10" style="border-right: 1px dotted #C2C2C2;padding-right: 30px;">
                            <!-- Nav tabs -->
                            <ul class="nav nav-tabs">
                                <li class="active"><a href="#login" data-toggle="tab">Login</a></li>
                                <li><a href="#signup" data-toggle="tab">Registration</a></li>
                            <li><a href="#forgotpassword" data-toggle="tab">Forgot Password</a></li>
                            </ul>
                            <!-- Tab panes -->
                            <div class="tab-content">
                                <div class="tab-pane active" id="login"> 
             
								<div class="err" id="login_err"></div>
                                <br/>
							
                                    <form role="form" class="form-horizontal loginform" id="loginform" autocomplete="off">
                                        <div class="form-group">
                                            <label for="email" class="col-md-2 col-sm-2 control-label">Email</label>
                                            <div class="col-md-10 col-sm-10">
                                                <input type="email" class="form-control" id="txtloginemail" name="txtloginemail" placeholder="Please Enter Your Email" required="true" onkeyup="ValidateEmailID_login(this);"/>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label for="exampleInputPassword1" class="col-sm-2 control-label">Password</label>
                                            <div class="col-sm-10 col-md-10">
                                                <input type="password" class="form-control" id="txtloginpswd" name="txtloginpswd" placeholder="Please Enter Your Password" required="true" onkeyup="ValidatePassword_login(this);"/>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <div class="col-md-offset-2 col-md-10 col-sm-offset-2 col-sm-10">
                                                <button type="submit" id="submit_btn" class="btn btn-primary btn-sm">Login</button>
                                                <input type="reset" id="resetjsloginpopup" class="btn btn-primary btn-sm" value="Reset">
                                            </div>
                                        </div>
                                    </form>
                                </div>
                                <div id="signup_results"></div>
                                <div class="tab-pane" id="signup">  

                                <div class="err" id="Success_seeker"></div>
<br/>			  
                                    <form role="form" class=" form-horizontal signupform" id="signform" name="signform" autocomplete="off">
                                        <div class="form-group">
                                            <label for="email" class="col-sm-2 col-md-2 control-label">Name</label>                                                                              
                                            <div class="col-md-10 col-sm-10">
                                                <input type="text" class="form-control" placeholder="Name" id="txtsignupname" name="txtsignupname" required="true" onkeyup="ValidateName(this)" />
                                            </div>                                    
                                        </div>
                                        <div class="form-group">
                                            <label for="email" class="col-sm-2 col-md-2 control-label">Email</label>
                                            <div class="col-sm-10 col-md-10">
                                                <input type="email" class="form-control" placeholder="Email" id="txtsignupemail" name="txtsignupemail" required="true" onkeyup="ValidateEmailID_signup(this);"/>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label for="mobile" class="col-sm-2 col-md-2 control-label">Mobile</label>
                                            <div class="col-sm-10 col-md-10">
                                                <input type="text" class="form-control" placeholder="Mobile" onkeyup="ValidateNumber(this)" onkeypress="return isNumberKey(event)" maxlength="10" id="txtsignupmobile" name="txtsignupmobile" required="true"/>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label for="password" class="col-sm-2 col-md-2 control-label">Password</label>
                                            <div class="col-sm-10 col-md-10">
                                                <input type="password" class="form-control" id="txtsignuppswd" name="txtsignuppswd" required="true" placeholder="Password" onkeyup="ValidatePassword_signup(this);"/>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <div class="col-md-offset-2 col-md-10 col-sm-offset-2 col-sm-10">                                     
                                                <button type="submit" id="signup_btn" class="btn btn-primary btn-sm loginbtn">Sign up</button>
                                                <input type="reset" id="resetjsregpopup" class="btn btn-primary btn-sm" value="Reset"/>
                                            </div>
                                        </div>
                                    </form>
                                </div>

			    <div class="tab-pane" id="forgotpassword"> 
             
				<div class="err_user" id="add_err_user"></div>
<br/>								
				<form role="form" class="form-horizontal forgotpasswordform" id="forgotpasswordform" autocomplete="off">
				    <div class="form-group">
					<label for="email" class="col-sm-2 control-label">
					    Email</label>
					<div class="col-sm-10">
					    <input type="email" class="form-control" id="email_fp" name="email_fp" placeholder="Please Enter Your Email" required="true" onkeyup="ValidateEmail_forgot(this);"/>
                            </div>
                        </div>
                                
				    <div class="row">
					<div class="col-sm-2">
                    </div>
					<div class="col-sm-10">
					    <button type="submit" id="submit_butn" class="btn btn-primary btn-sm">Send</button>
                        <input type="reset" id="resetjsforgotpopup" class="btn btn-primary btn-sm" value="Reset">
    <!--                                        <a href="javascript:;">Forgot your password?</a>-->
                </div>
            </div>
                                </form>
			    </div>
			    
    </div>
<!--                        <div id="OR" class="hidden-xs">
                            OR</div>-->
                    </div>

                </div>
            </div>
        </div>
    </div>
</div>
        </div>
    </div>
</div>

<div class="modal fade" id="register_success" data-toggle="register_success" data-backdrop="static" data-keyboard="false">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close thank" data-dismiss="modal" aria-hidden="true">&times;</button>
        <center><h4 class="modal-title">Staffingspot | Job Portal</h4></center>
      </div>
      <div class="modal-body">
        <p>Thanks for your Registration</p>
        <p>An email should have been  sent to your registered mail id. Read the instruction to complete your Registration</p>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default thank" data-dismiss="modal">Close</button>        
      </div>
    </div>
  </div>
</div>

<div class="modal fade" id="forgot_pwd" data-toggle="forgot_pwd" data-backdrop="static" data-keyboard="false">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close thank" data-dismiss="modal" aria-hidden="true">&times;</button>
        <center><h4 class="modal-title">Staffingspot | Job Portal</h4></center>
      </div>
      <div class="modal-body">
        <!--<p>Thanks for your Registration</p>-->
        <p>An email should have been sent to your mail id. Read the instruction to complete your Process.</p>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default thank" data-dismiss="modal">Close</button>        
      </div>
    </div>
  </div>
</div>

	</div>
	</div>
    </div>
	
	<style>
	.nav-tabs {
    margin-bottom: 15px;
}
.sign-with {
    margin-top: 25px;
    padding: 20px;
}
div#OR {
    height: 30px;
    width: 30px;
    border: 1px solid #C2C2C2;
    border-radius: 50%;
    font-weight: bold;
    line-height: 28px;
    text-align: center;
    font-size: 12px;
    float: right;
    position: absolute;
    right: -16px;
    top: 40%;
    z-index: 1;
    background: #DFDFDF;
}
#tick{display:none}
#cross{display:none}
	</style>
	
	
<script src="http://code.jquery.com/jquery-latest.min.js"></script> 
<script type="text/javascript">
    
//      $("#myModal").on("hidden", function() {
//          alert('hi');
//    $('#loginform').trigger("reset");
//        $('#signform').trigger("reset");
//        $('#empforgotpasswordform').trigger("reset");
//  });
    
    $('#mod_close').on('click', function () {
        $('#loginform').trigger("reset");
        $('#signform').trigger("reset");
        $('#empforgotpasswordform').trigger("reset");
    });
    $('#mod_close_log').on('click', function () {
        $('.loginform').trigger("reset");
        $('.signupform').trigger("reset");
        $('#forgotpasswordform').trigger("reset");
    });
    
    $('.thank').on('click', function () {
        $('.loginform').trigger("reset");
        $('.signupform').trigger("reset");
        $('#forgotpasswordform').trigger("reset");
    });
//$(document).ready(function() {
//    if($('.modal').hasClass('in')) {
//    alert($('.modal .in').attr('id')); //ID of the opened modal
//} else {
//    alert("No pop-up opened");
//    $('#loginform').trigger("reset");
//        $('#signform').trigger("reset");
//        $('#empforgotpasswordform').trigger("reset");
//}
//});
//  $("#myModal").on("hidden", function() {
//      alert('hi');
//  });
$(document).ready(function() {
    $("#submit_btn").click(function() {        
	    var proceed = true;         	
		$("#login input[required=true],#login select[required=true]").each(function(){
			$(this).css('border-color',''); 
			if(!$.trim($(this).val()))
                        {
                            $(this).css('border-color','red');
                            proceed = false;
			}			
                            var email_reg = /^([\w-\.]+@([\w-]+\.)+[\w-]{2,4})?$/; 
                            if($(this).attr("type")=="email" && !email_reg.test($.trim($(this).val()))){
                            $(this).css('border-color','red');
                            proceed = false;
			}	
		});
       if(proceed)
	   {		   
		   username=$("#txtloginemail").val();
		   password=$("#txtloginpswd").val();		   	
		   $.ajax({
		   type: "POST",
		   url: "logincheck.php",
		   data: "name="+username+"&pwd="+password,
		   success: function(data){    		  
		   var reslogin = $.trim(data);		   
                    if(reslogin == "true")
                    {
                    $("#login_err").css('display', 'inline', 'important');
                    $("#login_err").html("<center><img src='images/icons/tick.png'/> Login Success</center>");
//                    $(location).attr('href', 'user-dashboard.php');
		    location.reload();
                    $(".overlaymodal").hide(); 
                    }						
                    if(reslogin == "false")
                    {

                    $("#login_err").css('display', 'inline', 'important');
                    $("#login_err").html("<center><img src='images/icons/cross.png' alt='Staffingspot Invalid Username or Password Image' title='Staffingspot Invalid Username or Password Image' /> Invalid Username or Password </center>");
                    $(".overlaymodal").hide();  
                    $("#login_err").fadeOut(3000);                      
                    }
		   },
                       
                   beforeSend:function()
                   {                   
                    $(".overlaymodal").show();                        
                   }
//		   beforeSend:function()
//		   {
//			$("#login_err").css('display', 'inline', 'important');
//            $("#login_err").html("<center><img src='images/icons/ajax-loader.gif' alt='Staffingspot Loading' title='Staffingspot Loading' /> Loading ...</center>");
//                        
//		   }
		  });
		return false;
	   }        
    });
});
 
</script>

<script language="javascript">

        function ValidateNumber_emp(emptxtloginmob) {

            var filter = /^(?:[0-9]\d*|\d)$/;

            if (emptxtloginmob.value == "") {

                emptxtloginmob.style.border = "";

                return true;

            }

            else if (filter.test(emptxtloginmob.value)) {

                emptxtloginmob.style.border = "";

                return true;

            }

            else {

                emptxtloginmob.style.borderColor = "red";
                $('#emptxtsignupmobile').focus();   
                return false;

            }

        }
        function ValidateNumber(txtloginmob) {

            var filter = /^(?:[0-9]\d*|\d)$/;

            if (txtloginmob.value == "") {

                txtloginmob.style.border = "";

                return true;

            }

            else if (filter.test(txtloginmob.value)) {

                txtloginmob.style.border = "";

                return true;

            }

            else {

                txtloginmob.style.borderColor = "red";
                $('#txtsignupmobile').focus();   
                return false;

            }

        }
        
        function ValidateName_emp(emptxtloginname) {

//             var filter = /^[a-zA-Z\s]*$/;

            if (emptxtloginname.value == "") {

                emptxtloginname.style.border = "";

                return true;

            }

            else if (emptxtloginname.value) {

                emptxtloginname.style.border = "";

                return true;

            }

            else {

                emptxtloginname.style.borderColor = "red";
                $('#emptxtsignupname').focus();   
                return false;

            }

        }
        
        function ValidateName(txtloginname) {

//            var filter = /^[a-zA-Z\s]*$/;

            if (txtloginname.value == "") {

                txtloginname.style.border = "";

                return true;

            }

            else if (txtloginname.value) {

                txtloginname.style.border = "";

                return true;

            }

            else {

                txtloginname.style.borderColor = "red";
                $('#txtsignupname').focus();   
                return false;
            }
        }


 function isNumberKey(evt)
      {
         var charCode = (evt.which) ? evt.which : event.keyCode
         if (charCode > 31 && (charCode < 48 || charCode > 57))
            return false;

         return true;
      }


        function ValidateEmailID_emplogin(emptxtloginemail) {

            var filter = /^([\w-\.]+)@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.)|(([\w-]+\.)+))([a-zA-Z]{2,4}|[0-9]{1,3})(\]?)$/;

            if (emptxtloginemail.value == "") {

                emptxtloginemail.style.border = "";

                return true;

            }

            else if (filter.test(emptxtloginemail.value)) {

                emptxtloginemail.style.border = "";

                return true;

            }

            else {

                emptxtloginemail.style.borderColor = "red";
                $('#emptxtloginemail').focus();   
                return false;

            }

        }
         function ValidateEmailID_empsignup(emptxtsignupemail) {

            var filter = /^([\w-\.]+)@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.)|(([\w-]+\.)+))([a-zA-Z]{2,4}|[0-9]{1,3})(\]?)$/;

            if (emptxtsignupemail.value == "") {

                emptxtsignupemail.style.border = "";

                return true;

            }

            else if (filter.test(emptxtsignupemail.value)) {

                emptxtsignupemail.style.border = "";

                return true;

            }

            else {

                emptxtsignupemail.style.borderColor = "red";
                $('#emptxtsignupemail').focus();   
                return false;

            }

        }
         function ValidateEmail_empforgot(forgotemail) {

            var filter = /^([\w-\.]+)@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.)|(([\w-]+\.)+))([a-zA-Z]{2,4}|[0-9]{1,3})(\]?)$/;

            if (forgotemail.value == "") {

                forgotemail.style.border = "";

                return true;

            }

            else if (filter.test(forgotemail.value)) {

                forgotemail.style.border = "";

                return true;

            }

            else {

                forgotemail.style.borderColor = "red";
                $('#email_fp_emp').focus();   
                return false;

            }

        }
        
         function ValidatePassword_emplogin(emptxtloginpwd) {

            if (emptxtloginpwd.value == "") {

                emptxtloginpwd.style.border = "";

                return true;

            }

            else if (emptxtloginpwd.value) {

                emptxtloginpwd.style.border = "";

                return true;

            }

            else {

                emptxtloginpwd.style.borderColor = "red";
                $('#emptxtloginpswd').focus();   
                return false;

            }

        }
        function ValidatePassword_empsignup(emptxtsignuppwd) {

            if (emptxtsignuppwd.value == "") {

                emptxtsignuppwd.style.border = "";

                return true;

            }

            else if (emptxtsignuppwd.value) {

                emptxtsignuppwd.style.border = "";

                return true;

            }

            else {

                emptxtsignuppwd.style.borderColor = "red";
                $('#emptxtsignuppswd').focus();   
                return false;

            }

        }
        
        
        function ValidateEmailID_login(txtloginemail) {

            var filter = /^([\w-\.]+)@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.)|(([\w-]+\.)+))([a-zA-Z]{2,4}|[0-9]{1,3})(\]?)$/;

            if (txtloginemail.value == "") {

                txtloginemail.style.border = "";

                return true;

            }

            else if (filter.test(txtloginemail.value)) {

                txtloginemail.style.border = "";

                return true;

            }

            else {

                txtloginemail.style.borderColor = "red";
                $('#txtloginemail').focus();   
                return false;

            }

        }
        
        function ValidateEmailID_signup(txtsignupemail) {

            var filter = /^([\w-\.]+)@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.)|(([\w-]+\.)+))([a-zA-Z]{2,4}|[0-9]{1,3})(\]?)$/;

            if (txtsignupemail.value == "") {

                txtsignupemail.style.border = "";

                return true;

            }

            else if (filter.test(txtsignupemail.value)) {

                txtsignupemail.style.border = "";

                return true;

            }

            else {

                txtsignupemail.style.borderColor = "red";
                $('#txtsignupemail').focus();   
                return false;

            }

        }
        
        
        function ValidatePassword_login(txtloginpwd) {

            if (txtloginpwd.value == "") {

                txtloginpwd.style.border = "";

                return true;

            }

            else if (txtloginpwd.value) {

                txtloginpwd.style.border = "";

                return true;

            }

            else {

                txtloginpwd.style.borderColor = "red";
                $('#txtloginpswd').focus();   
                return false;

            }

        }
        function ValidatePassword_signup(txtsignuppwd) {

            if (txtsignuppwd.value == "") {

                txtsignuppwd.style.border = "";

                return true;

            }

            else if (txtsignuppwd.value) {

                txtsignuppwd.style.border = "";

                return true;

            }

            else {

                txtsignuppwd.style.borderColor = "red";
                $('#txtsignuppswd').focus();   
                return false;

            }

        }
        
        function ValidateEmail_forgot(forgotemail) {

            var filter = /^([\w-\.]+)@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.)|(([\w-]+\.)+))([a-zA-Z]{2,4}|[0-9]{1,3})(\]?)$/;

            if (forgotemail.value == "") {

                forgotemail.style.border = "";

                return true;

            }

            else if (filter.test(forgotemail.value)) {

                forgotemail.style.border = "";

                return true;

            }

            else {

                forgotemail.style.borderColor = "red";
                $('#email_fp').focus();   
                return false;

            }

        }
        
        

    </script>


<script type="text/javascript">
$(document).ready(function() {
    $("#submit_btn1").click(function() {        
	    var proceed = true;
            // alert("hii1");
        //simple validation at client's end
        //loop through each field and we simply change border color to red for invalid fields		
		$("#login1 input[required=true],#login1 select[required=true]").each(function(){
			$(this).css('border-color',''); 
			if(!$.trim($(this).val())){ //if this field is empty 
				$(this).css('border-color','red'); //change border color to red   
				proceed = false; //set do not proceed flag
			}
			//check invalid email
			var email_reg = /^([\w-\.]+@([\w-]+\.)+[\w-]{2,4})?$/; 
			if($(this).attr("type")=="email" && !email_reg.test($.trim($(this).val()))){
				$(this).css('border-color','red'); //change border color to red   
				proceed = false; //set do not proceed flag				
			}	
		});
       if(proceed)
	   {		   
		  var  username=$("#emptxtloginemail").val();
		  var  password=$("#emptxtloginpswd").val();		   	
		   $.ajax({
		   type: "POST",
		   url: "emplogincheck.php",
		   data: "name="+username+"&pwd="+password,
		   success: function(html){    		   
		   var reslogin = $.trim(html);		     
			if (reslogin == 'true')
			{                                       
            $("#add_err_emplogin").css('line-height', '3');
            $("#add_err_emplogin").css('display', 'inline', 'important');                        
			$("#add_err_emplogin").html("<center><img src='images/icons/tick.png'/> Login Success</center>");
//            $(location).attr('href', 'company-dashboard.php');	
			location.reload();
            $(".overlaymodal").hide(); 	
			}
            else if (reslogin == 'nodetail')
			{ 
            $("#add_err_emplogin").css('line-height', '3');
            $("#add_err_emplogin").css('display', 'inline', 'important');
			$("#add_err_emplogin").html("<center><img src='images/icons/tick.png'/> Login Success</center>");
			$(location).attr('href', 'add_emp_details.php');
            $(".overlaymodal").hide(); 
			}
			else{			
            $("#add_err_emplogin").css('line-height', '3');
			$("#add_err_emplogin").css('display', 'inline', 'important');
			$("#add_err_emplogin").html("<center><img src='images/icons/cross.png' alt='Staffingspot Invalid Username or Password Image' title='Staffingspot Invalid Username or Password Image' /> Invalid Username or Password </center>");
            $(".overlaymodal").hide(); 
            $("#add_err_emplogin").fadeOut(3000);       
			}
		   },
            beforeSend:function()
               {                   
                $(".overlaymodal").show();                        
               }

		  });
		return false;
	   }        
    });
});
</script>

<!--Email Avalability Checking start-->
<script>
$(document).ready(function(){
$('#txtsignupemail').keyup(username_check);
});
	
function username_check(){	
var username = $('#txtsignupemail').val();
if(username == "" || username.length < 6){
$('#tick').hide();
}else{

jQuery.ajax({
   type: "POST",
   url: "checkavailability.php",
   data: 'email='+ username,
   cache: false,
   success: function(response){
if(response == 0){
	$('#txtsignupemail').css('border', '1px red solid');	
	$('#tick').hide();
	$('#cross').fadeIn();	
	$('#txtsignupemail').focus();
    $(".overlaymodal").hide(); 
	return false;
	}else{
	$('#txtsignupemail').css('border', '1px green solid');
	$('#cross').hide();
	$('#tick').fadeIn();
    $(".overlaymodal").hide(); 
	     }
}
});
}
}
</script>
<script>
$(document).ready(function(){
$('#emptxtsignupemail').keyup(username_check);
});
	
function username_check(){	
var username = $('#emptxtsignupemail').val();
if(username == "" || username.length < 6){
$('#tick').hide();
}else{

jQuery.ajax({
   type: "POST",
   url: "empcheckavailability.php",
   data: 'email='+ username,
   cache: false,
   success: function(response){
if(response == 0){
	$('#emptxtsignupemail').css('border', '1px red solid');	
	$('#tick').hide();
	$('#cross').fadeIn();	
	$('#emptxtsignupemail').focus();
    $(".overlaymodal").hide(); 
	return false;
	}else{
	$('#emptxtsignupemail').css('border', '1px green solid');
	$('#cross').hide();
	$('#tick').fadeIn();
    $(".overlaymodal").hide(); 
	     }
}
});
}
}
</script>
<!--Email Avalability Checking end-->

<script>
$(document).ready(function() {
    $("#signup_btn").click(function() {       
	    var proceed = true;		
        //simple validation at client's end
        //loop through each field and we simply change border color to red for invalid fields		
		$("#signup input[required=true],#signup checkbox[required=true]").each(function(){					
			$(this).css('border-color',''); 
			if(!$.trim($(this).val())){ //if this field is empty 
				$(this).css('border-color','red'); //change border color to red   
				proceed = false; //set do not proceed flag
			}
			//check invalid email
			var email_reg = /^([\w-\.]+@([\w-]+\.)+[\w-]{2,4})?$/; 
			if($(this).attr("type")=="email" && !email_reg.test($.trim($(this).val()))){
				$(this).css('border-color','red'); //change border color to red   
				proceed = false; //set do not proceed flag				
			}	
		});
       if(proceed)
	   {		   
		   signupname=$("#txtsignupname").val();
		   signupemail=$("#txtsignupemail").val();
		   signupmobile=$("#txtsignupmobile").val();
		   signuppswd=$("#txtsignuppswd").val();
		   
		  $.ajax({
		    type: "POST",
		    url: "signup_inner.php",
			data: "signupemail="+signupemail+"&signupmobile="+signupmobile+"&signuppswd="+signuppswd+"&signupname="+signupname,
		    success: function(response){ 
//			alert(response);
            var htmlsuccess = $.trim(response);
            //alert(htmlsuccess);
			if(htmlsuccess=='Valid'){
                         
             $("#add_err").css('display', 'inline', 'important');
			 $("#add_err").html("<center><img src='images/icons/tick.png'/> Login Success</center>");
             $('#resetempregpopup').click();
			 $("#Success_seeker").html("Thanks For Registering With.Please Check your Mail and Activate");			
			 $('#myModal').modal('hide');
			 $("#signform").trigger( "reset" );
			 $("#Success_seeker").css('display', 'inline', 'important');
			 $("#Success_seeker").html("");
			 $('#register_success').modal('show');
             $("#signform").trigger("reset");
			 $(".overlaymodal").hide(); 
			}

            if(htmlsuccess=='Invalid'){
                $("#Success_seeker").hide();
             //$("#Success").html("Thanks For Registering With Build99.Please Check your Mail and Activate");
            $("#txtsignupemail").val("");
            $("#txtsignupemail").css('border-color','red');
            $("#txtsignupemail").attr("placeholder", "Email ID Already Exists");
            $("#Success_seeker").html("");
            $(".overlaymodal").hide(); 
             //location.reload();
            }
            if(htmlsuccess=='Inactive'){
                $("#Success_seeker").hide();
             //$("#Success").html("Thanks For Registering With Build99.Please Check your Mail and Activate");
            $("#txtsignupemail").val("");
            $("#txtsignupemail").css('border-color','red');
            $("#txtsignupemail").attr("placeholder", "Please Activate Your Email ID");
            $("#Success_seeker").html("");
            $(".overlaymodal").hide(); 
             //location.reload();
            }

		   },
//		   beforeSend:function()
//		   {
//			$("#Success_seeker").css('display', 'inline', 'important');
//                        $("#Success_seeker").html("<center><img src='images/icons/ajax-loader.gif' alt='Staffingspot Loading' title='Staffingspot Loading' /> Loading ...</center>");			
//		   }
                
                 beforeSend:function()
                   {
                   // $(".loader").fadeOut("slow");
                    $(".overlaymodal").show();                        
                   }

		  });
		   	 
		   return false;
	   }
        
    });
    
   
});
</script>
<script>
$(document).ready(function() {
    $("#signup_btn1").click(function() {       
	    var proceed = true;	
           // alert("hii");
        //simple validation at client's end
        //loop through each field and we simply change border color to red for invalid fields		
		$("#signup1 input[required=true],#signup1 checkbox[required=true]").each(function(){					
			$(this).css('border-color',''); 
			if(!$.trim($(this).val())){ //if this field is empty 
				$(this).css('border-color','#ed1c24'); //change border color to red   
				proceed = false; //set do not proceed flag
			}
			//check invalid email
			var email_reg = /^([\w-\.]+)@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.)|(([\w-]+\.)+))([a-zA-Z]{2,4}|[0-9]{1,3})(\]?)$/; 
			if($(this).attr("type")=="email" && !email_reg.test($.trim($(this).val()))){
				$(this).css('border-color','#ed1c24'); //change border color to red   
				proceed = false; //set do not proceed flag				
			}	
		});
       if(proceed)
	   {		   
		   signupname=$("#emptxtsignupname").val();
		   signupemail=$("#emptxtsignupemail").val();
		   signupmobile=$("#emptxtsignupmobile").val();
		   signuppswd=$("#emptxtsignuppswd").val();	
		   
//		   alert(signupemail);
		   
		      $.ajax({
                    type: "POST",
                    url: "empsignup_inner.php",
                    data: "signupemail="+signupemail+"&signupmobile="+signupmobile+"&signuppswd="+signuppswd+"&signupname="+signupname,
		    success: function(html){ 
		//alert(html);
                var html1 = $.trim(html);
			if(html1=='Valid'){     
                            //alert("jjkhjh");
             $('#resetempregpopup').click();                  
             $("#Success").html("Thanks For Registering.Please Check your Mail and Activate");			 
			 $('#myModal1').modal('hide');
			 $("#signform").trigger( "reset" );
			 $("#Success").css('display', 'inline', 'important');
			 $("#Success").html("");
              $(".overlaymodal").hide();
			 $('#register_success').modal('show');			 
             $("#signform").trigger("reset");
			 $(".overlaymodal").hide(); 
			} 
                        if(html1=='Invalid'){
                            $("#Success").hide();
                        //$("#Success").html("Thanks For Registering With Build99.Please Check your Mail and Activate");
                       $("#emptxtsignupemail").val("");
                       $("#emptxtsignupemail").css('border-color','red');
                       $("#emptxtsignupemail").attr("placeholder", "Email ID Already Exists");
                        $(".overlaymodal").hide();
                       $("#Success").html("");
                       $(".overlaymodal").hide(); 
                        //location.reload();
                       }
                       if(html1=='Inactive'){
                           $("#Success").hide();
                            //$("#Success").html("Thanks For Registering With Build99.Please Check your Mail and Activate");
                           $("#emptxtsignupemail").val("");
                           $("#emptxtsignupemail").css('border-color','red');
                           $("#emptxtsignupemail").attr("placeholder", "Please Activate Your Email ID");
                            $(".overlaymodal").hide();
                           $("#Success").html("");
                           $(".overlaymodal").hide();                             
                           }
		   },

                   beforeSend:function()
                   {                   
                    $(".overlaymodal").show();                        
                   }
		  });
		   	 
		   return false;
	   }
        
    });
    
   
});
</script>

 <script>
    	$(document).ready(function(e){
			$('.search-panel .dropdown-menu').find('a').click(function(e) {
				e.preventDefault();
				var param = $(this).attr("href").replace("#","");
				var concept = $(this).text();
				$('.search-panel span#search_concept').text(concept);
				$('.input-group #search_param').val(param);
			});			

            $('#resetempregpopup').click(function(){
                $('#signform')[0].reset();
                $('#loginform')[0].reset();
                
            });


		});

    </script>

    <script>
    
        $(window).scroll(function() {

            var scrollTop = $(window).scrollTop();
            if (scrollTop > 300) {
                $(".mega-menu").addClass("navbar-fixed-top");
    
            } else if (scrollTop < 300) {
                $(".mega-menu").removeClass("navbar-fixed-top");
            }
    
        });

    </script> 
    
    <script>
$(document).ready(function() {
    $("#submit_butn").click(function() {    
	 var proceed = true;
//		    alert("forgot password");
		    $("#forgotpassword input[required=true],#forgotpassword select[required=true]").each(function(){
			$(this).css('border-color',''); 
			if(!$.trim($(this).val())){ //if this field is empty 
				$(this).css('border-color','red'); //change border color to red   
				proceed = false; //set do not proceed flag
			}
			//check invalid email
			var email_fp = /^([\w-\.]+@([\w-]+\.)+[\w-]{2,4})?$/; 
			if($(this).attr("type")=="email" && !email_fp.test($.trim($(this).val()))){
				$(this).css('border-color','red'); //change border color to red   
				proceed = false; //set do not proceed flag				
			}	
            });
		
		
		if(proceed)
	   {	
	       

	       var email = $("#email_fp").val();
		   $.ajax({
		   type: "POST",
		   url: "email_forgot_password.php?op=forgotpasswordemail",
		   data: "emailfp="+email,
		   success: function(html){    
		  //alert(data);
		   var forgtpass = $.trim(html);
		   
			if(forgtpass == "Valid")
			{
//			    alert("true");
			//$("#add_err_user").css('display', 'inline', 'important');
			//$("#add_err_user").html("<center>An email has been sent to your mail id.</center>");
            //$(".overlaymodal").hide(); 

            $('#myModal').modal('hide');
            $('#forgot_pwd').modal('show');
            $(".overlaymodal").hide(); 
			//$(location).attr('href', 'index.php');
        }
        
			if(forgtpass == "Invalid")
			{
//			 alert("false");
			 $("#add_err_user").css('display', 'inline', 'important');
			 $("#add_err_user").html("<center><img src='images/icons/cross.png' alt='Staffingspot Invalid Email' title='Staffingspot Invalid Email ' /> Invalid Email</center>");
             $(".overlaymodal").hide(); 
             $("#add_err_user").fadeOut(3000);
            }
		   },
//		   beforeSend:function()
//		   {
//			$("#add_err_user").css('display', 'inline', 'important');
//            $("#add_err_user").html("<center><img src='images/icons/ajax-loader.gif' alt='Staffingspot Loading' title='Staffingspot Loading' /> Loading ...</center>");
//
//		   }

 beforeSend:function()
                   {
                   // $(".loader").fadeOut("slow");
                    $(".overlaymodal").show();                        
                   }
		  });
		return false;
	       
	       
	       
	   }
    });
   
});
    </script>
<script>
$(document).ready(function() {
    $("#emp_submit_butn").click(function() {    
	 var proceed = true;
//		    alert("forgot password");
		    $("#empforgotpassword input[required=true],#empforgotpassword select[required=true]").each(function(){
			$(this).css('border-color',''); 
			if(!$.trim($(this).val())){ //if this field is empty 
				$(this).css('border-color','red'); //change border color to red   
				proceed = false; //set do not proceed flag
			}
			//check invalid email
			var email = /^([\w-\.]+@([\w-]+\.)+[\w-]{2,4})?$/; 
			if($(this).attr("type")=="email" && !email.test($.trim($(this).val()))){
				$(this).css('border-color','red'); //change border color to red   
				proceed = false; //set do not proceed flag				
			}	
		});
		
		
		if(proceed)
	   {		       

	       email =$("#email_fp_emp").val();
		   $.ajax({
		   type: "POST",
		   url: "email_forgot_password.php?op=forgotpasswordemailemp",
		   data: "emailfpemp="+email,
		   success: function(html){    
		  
		   var forgtpass = $.trim(html);
		   
			if(forgtpass == "Valid")
			{
			// $("#add_err").css('display', 'inline', 'important');
			// $("#add_err").html("<center>An email has been sent to your mail id.</center>");
            //$(".overlaymodal").hide(); 

            $('#myModal1').modal('hide');
            $('#forgot_pwd').modal('show');
            $(".overlaymodal").hide(); 

			}			
			
			if(forgtpass == "Invalid")
			{
			 $("#add_err").css('display', 'inline', 'important');
			 $("#add_err").html("<center><img src='images/icons/cross.png' alt='Staffingspot Invalid Email' title='Staffingspot Invalid Email ' /> Invalid Email</center>");
             $(".overlaymodal").hide(); 
             $("#add_err").fadeOut(3000);
			}
		   },

            beforeSend:function()
               {
               // $(".loader").fadeOut("slow");
                $(".overlaymodal").show();                        
               }
		  });
		return false;             	       
	   }			
    });
    
   
});
</script>
<!--start of sweetalert--> 

<script src="https://cdnjs.cloudflare.com/ajax/libs/limonte-sweetalert2/6.10.1/sweetalert2.all.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/limonte-sweetalert2/6.10.1/sweetalert2.common.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/limonte-sweetalert2/6.10.1/sweetalert2.common.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/limonte-sweetalert2/6.10.1/sweetalert2.common.min.js.map"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/limonte-sweetalert2/6.10.1/sweetalert2.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/limonte-sweetalert2/6.10.1/sweetalert2.min.js"></script>
<link href="https://cdnjs.cloudflare.com/ajax/libs/limonte-sweetalert2/6.10.1/sweetalert2.css" rel="stylesheet" type="text/css">
<link href="https://cdnjs.cloudflare.com/ajax/libs/limonte-sweetalert2/6.10.1/sweetalert2.min.css" rel="stylesheet" type="text/css">

<script type="text/javascript">
//$(document).ready(function () {
//    //Disable cut copy paste
//    $('body').bind('cut copy', function (e) {
//        e.preventDefault();
//    });
//   
//    //Disable mouse right click
//    $("body").on("contextmenu",function(e){
//        return false;
//    });
//});
$('#emptxtsignupmobile,#txtsignupmobile').bind("cut copy paste",function(e) {
          e.preventDefault();
      });
</script>
