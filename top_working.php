<?php
/*date_default_timezone_set("Asia/Kolkata");
echo date("Y-m-d H:i:s"); */
@include("config.php");	
@include('common.php');
@include("user_sessioncheck.php");
error_reporting(E_ALL ^ E_NOTICE);
error_reporting(0);
session_start();
$username = $_SESSION["user_name"];
$user_email = $_SESSION['user_email']; 
$user_id = $_SESSION['user_id'];

$empusername = $_SESSION["empuser_name"];
$empuser_email = $_SESSION['empuser_email']; 
$empuser_id = $_SESSION['empuser_id'];


    $query = "SELECT * FROM tbl_jobseeker_details where fld_js_id ='$user_id' and fld_delstatus=0";
	$result = mysql_query($query)or die(mysql_error());
	$num_row = mysql_num_rows($result);
        $row=mysql_fetch_array($result);
        if($num_row >= 1 ) 
        {	
                $profilepic = $row["fld_profilepic"];
                $profpath = 'images/profilepic/';
                $profpics = $profpath.$profilepic;
        }

    $empquery = "SELECT * FROM tbl_employer_details where fld_empid ='$empuser_id' and fld_delstatus=0";
    $empresult = mysql_query($empquery)or die(mysql_error());
    $empnum_row = mysql_num_rows($empresult);
        $emprow=mysql_fetch_array($empresult);
        if($empnum_row >= 1 ) 
        {   
                $empprofilepic = $emprow["fld_logo"];        
        }

?>
 <div class="header-top-white">
        <div class="container">
            <div class="row">
                <nav id="menu-1" class="mega-menu fa-change-black" data-color=""> 
            <section class="menu-list-items container"> 
                <ul class="menu-logo">
                    <li>                        
                        <?php
                        if($empuser_id!="")
                        {
                        ?>
                        <a href="javascript:void(0);">                            
                        <img src="images/logo.png" alt="logo" class="img-responsive">                        
                        </a>
                        <?php
                        }
                        else
                        {
                        ?>
                        <a href="index.php">                            
                        <img src="images/logo.png" alt="logo" class="img-responsive">                        
                        </a>
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
                <li><a href="javascript:void(0);"> Jobs <i class="fa fa-angle-down fa-indicator"></i></a> 
                    <div class="grid-col-12 drop-down"> 
                        <div class="grid-row"> 
                            <div class="grid-col-4">                              
                                <ul>
                                    <li><a href="javascript:void(0);"> <i class="fa fa-angle-right"></i> Walkin Jobs</a></li>
                                    <li><a href="javascript:void(0);"> <i class="fa fa-angle-right"></i> Jobs by Location</a></li>
                                    <li><a href="javascript:void(0);"> <i class="fa fa-angle-right"></i>Jobs by Skills</a></li>
                                    <li><a href="javascript:void(0);"> <i class="fa fa-angle-right"></i> Jobs by Company</a></li>
                                    <li><a href="javascript:void(0);"> <i class="fa fa-angle-right"></i> Advanced Search</a></li>
                                    <li><a href="javascript:void(0);"> <i class="fa fa-angle-right"></i> Part Time Jobs <label class="label label-info">New</label></a></li>
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
<!--                                     <li><a href="users.php"> <i class="fa fa-angle-right"></i> Freelancers</a></li>-->
                                    <li><a href="javascript:void(0);"> <i class="fa fa-angle-right"></i> Build Resume  <label class="label label-info">New</label></a></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </li>

                <li><a href="javascript:void(0);">Companies <i class="fa fa-angle-down fa-indicator"></i></a> 
                    <div class="grid-col-2 drop-down"> 
                        <div class="grid-row">                                                  
                                <ul>
                                    <li><a href="javascript:void(0);"> <i class="fa fa-angle-right"></i> Browse Companies</a></li>
                                    <li><a href="javascript:void(0);"> <i class="fa fa-angle-right"></i> Company Details</a></li>                                  
                                </ul>
                        </div>
                    </div>
                </li>
                
                <li><a href="javascript:void(0);">Services <i class="fa fa-angle-down fa-indicator"></i></a> 
                    <div class="grid-col-3 drop-down"> 
                        <div class="grid-row">                                                  
                                <ul>
                                    <li><a href="javascript:void(0);"> <i class="fa fa-angle-right"></i> E-Courses</a></li>
                                    <li><a href="javascript:void(0);"> <i class="fa fa-angle-right"></i> Career Advice</a></li>
                                    <li><a href="javascript:void(0);"> <i class="fa fa-angle-right"></i> Interview Preparation</a></li>
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
                ?>                
                <li><a href="searchresume.php">Saerch Resume</a> 
<!--                    <div class="grid-col-2 drop-down"> 
                        <div class="grid-row">                                                  
                                <ul>
                                    <li><a href="company-dashboard.php"> <i class="fa fa-angle-right"></i>Search by Skills</a></li>
                                    <li><a href="company-dashboard-edit-profile.php"> <i class="fa fa-angle-right"></i> Search by Location</a></li>
                                </ul>
                        </div>
                    </div>-->
                </li>  

                <li class="no-bg login-btn-no-bg"><a href="postjob.php" class="login-header-btn"><i class="fa fa-cloud" aria-hidden="true"></i></i>Post Job</a></li>              
            

               <li class="profile-pic hoverTrigger">                   
                        <?php
                         if(file_exists($empprofilepic))
                         {
                            //echo $empprofilepic;
                         ?>
                        <a href="javascript:void(0)"> <img src="<?php echo $empprofilepic; ?>" alt="user-img" class="img-circle" width="36"><span class="hidden-xs hidden-sm"><?php echo $username;?> </span><i class="fa fa-angle-down fa-indicator"></i> <div class="mobileTriggerButton"></div></a>
                        <?php
                         }
                        else
                        {
                        ?>                        
                        <a href="javascript:void(0)"> <img src="images/nopicture.jpg" alt="user-img" class="img-circle" width="36"><span class="hidden-xs hidden-sm"><?php echo $username;?> </span><i class="fa fa-angle-down fa-indicator"></i> <div class="mobileTriggerButton"></div></a>
                        <?php
                        }
                        ?>
                        <ul class="drop-down-multilevel left-side effect-fade" style="transition: all 400ms ease 0s;">
                            <li><a href="company-dashboard.php"><i class="fa fa-user"></i> My Profile</a></li>
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
                         if(file_exists($profpics))
                         {
                         ?>
                        <a href="javascript:void(0)"> <img src="<?php echo $profpics; ?>" alt="user-img" class="img-circle" width="36"><span class="hidden-xs hidden-sm"><?php echo $username;?> </span><i class="fa fa-angle-down fa-indicator"></i> <div class="mobileTriggerButton"></div></a>
                        <?php
                         }
                        else
                        {
                        ?>                        
                        <a href="javascript:void(0)"> <img src="images/nopicture.jpg" alt="user-img" class="img-circle" width="36"><span class="hidden-xs hidden-sm"><?php echo $username;?> </span><i class="fa fa-angle-down fa-indicator"></i> <div class="mobileTriggerButton"></div></a>
                        <?php
                        }
                        ?>
                        <ul class="drop-down-multilevel left-side effect-fade" style="transition: all 400ms ease 0s;">
                            <li><a href="user-edit-profile.php"><i class="fa fa-user"></i> My Profile</a></li>
                          <!--   <li><a href="#"><i class="fa fa-mail-forward"></i> Inbox</a></li>
                            <li><a href="#"><i class="fa fa-gear"></i> Account Setting</a></li> -->
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
            </section>
        </nav>        
     
            </div>
        </div>
    </div>


<div class="modal fade" id="myModal1" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel"aria-hidden="true" data-backdrop="static" data-keyboard="false">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
					<p align="center"><img src="images/logo.png" alt="Staffingspot Logo"/></p>
                <h4 class="modal-title" id="myModalLabel">
                    Employer Login/Registration - <a href="javascript:void(0);">Staffingspot</a></h4>
            </div>
            <div class="modal-body">
                <div class="row">
                    <div class="col-md-8" style="border-right: 1px dotted #C2C2C2;padding-right: 30px;">
                        <!-- Nav tabs -->
                        <ul class="nav nav-tabs">
                            <li class="active"><a href="#login1" data-toggle="tab">Login</a></li>
                            <li><a href="#signup1" data-toggle="tab">Registration</a></li>
                        </ul>
                        <!-- Tab panes -->
                        <div class="tab-content">
                            <div class="tab-pane active" id="login1"> 
<br/>              
								<div class="err" id="add_err_emplogin"></div>
<br/>								
								  <form role="form" class="form-horizontal loginform" id="loginform" autocomplete="off">
                                <div class="form-group">
                                    <label for="email" class="col-sm-2 control-label">
                                        Email</label>
                                    <div class="col-sm-10">
                                        <input type="email" class="form-control" id="emptxtloginemail" name="emptxtloginemail" placeholder="Please Enter Your Email" required="true" />
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputPassword1" class="col-sm-2 control-label">
                                        Password</label>
                                    <div class="col-sm-10">
                                        <input type="password" class="form-control" id="emptxtloginpswd" name="emptxtloginpswd" placeholder="Please Enter Your Password" required="true" />
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-sm-2">
                                    </div>
                                    <div class="col-sm-10">
                                        <button type="submit" id="submit_btn1" class="btn btn-primary btn-sm">Login</button>
                                        <a href="javascript:;">Forgot your password?</a>
                                    </div>
                                </div>
                                </form>
                            </div>
							 <div id="signup_results"></div>
                            <div class="tab-pane" id="signup1">  
 <br/>
              <div class="err" id="Success"></div>
<br/>			  
					 <form role="form" class=" form-horizontal signupform" id="signform" name="signform" autocomplete="off">
                                <div class="form-group">
                                    <label for="email" class="col-sm-2 control-label">
                                        Name</label>                                                                              
                                            <div class="col-md-10">
                                                <input type="text" class="form-control" placeholder="Name" id="emptxtsignupname" name="emptxtsignupname" required="true" />
                                            </div>                                    
                                </div>
                                <div class="form-group">
                                    <label for="email" class="col-sm-2 control-label">
                                        Email</label>
                                    <div class="col-sm-10">
                                        <input type="email" class="form-control" placeholder="Email" id="emptxtsignupemail" name="emptxtsignupemail" required="true" />
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="mobile" class="col-sm-2 control-label">
                                        Mobile</label>
                                    <div class="col-sm-10">
                                        <input type="text" class="form-control" placeholder="Mobile" id="emptxtsignupmobile" name="emptxtsignupmobile" required="true"/>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="password" class="col-sm-2 control-label">
                                        Password</label>
                                    <div class="col-sm-10">
                                        <input type="password" class="form-control" id="emptxtsignuppswd" name="emptxtsignuppswd" required="true" placeholder="Password" />
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-sm-2">
                                    </div>
                                    <div class="col-sm-10">                                     
											
											 <button type="submit" id="signup_btn1" class="btn btn-primary btn-sm loginbtn">Sign up</button>
                                        <button type="button" class="btn btn-default btn-sm">
                                            Cancel</button>
                                    </div>
                                </div>
                                </form>
                            </div>
                        </div>
                        <div id="OR" class="hidden-xs">
                            OR</div>
                    </div>
                    <div class="col-md-4">
                        <div class="row text-center sign-with">
                            <div class="col-md-12">
                                <h3>
                                    Sign in with</h3>
                            </div>
                            <div class="col-md-12">
                                <div class="btn-group btn-group-justified">
                                   <ul class="social-network social-circle onwhite">
                                    <li>
                                    <a href="#" class="icoFacebook" title="Facebook"><i class="fa fa-facebook" id="sclicons"></i></a>
                                    </li>                                    
                                    <li><a href="#" class="icoGoogle" title="Google +"><i class="fa fa-google-plus"id="sclicons"></i></a></li>
                                    <li><a href="#" class="icoLinkedin" title="Linkedin +"><i class="fa fa-linkedin" id="sclicons"></i></a></li>
                                </ul>
                                </div>
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
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">
                    &times;</button>
					<p align="center"><img src="images/logo.png" alt="Staffingspot Logo"/></p>
                <h4 class="modal-title" id="myModalLabel">
                    Login/Registration - <a href="javascript:void(0);">Staffingspot</a></h4>
            </div>
            <div class="modal-body">
                <div class="row">
                    <div class="col-md-8" style="border-right: 1px dotted #C2C2C2;padding-right: 30px;">
                        <!-- Nav tabs -->
                        <ul class="nav nav-tabs">
                            <li class="active"><a href="#login" data-toggle="tab">Login</a></li>
                            <li><a href="#signup" data-toggle="tab">Registration</a></li>
                        </ul>
                        <!-- Tab panes -->
                        <div class="tab-content">
                            <div class="tab-pane active" id="login"> 
<br/>              
								<div class="err" id="add_err"></div>
<br/>								
								  <form role="form" class="form-horizontal loginform" id="loginform" autocomplete="off">
                                <div class="form-group">
                                    <label for="email" class="col-sm-2 control-label">
                                        Email</label>
                                    <div class="col-sm-10">
                                        <input type="email" class="form-control" id="txtloginemail" name="txtloginemail" placeholder="Please Enter Your Email" required="true" />
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputPassword1" class="col-sm-2 control-label">
                                        Password</label>
                                    <div class="col-sm-10">
                                        <input type="password" class="form-control" id="txtloginpswd" name="txtloginpswd" placeholder="Please Enter Your Password" required="true" />
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-sm-2">
                                    </div>
                                    <div class="col-sm-10">
                                        <button type="submit" id="submit_btn" class="btn btn-primary btn-sm">
                                            Login</button>
                                        <a href="javascript:;">Forgot your password?</a>
                                    </div>
                                </div>
                                </form>
                            </div>
							 <div id="signup_results"></div>
                            <div class="tab-pane" id="signup">  
 <br/>
              <div class="err" id="Success"></div>
<br/>			  
					 <form role="form" class=" form-horizontal signupform" id="signform" name="signform" autocomplete="off">
                                <div class="form-group">
                                    <label for="email" class="col-sm-2 control-label">
                                        Name</label>                                                                              
                                            <div class="col-md-10">
                                                <input type="text" class="form-control" placeholder="Name" id="txtsignupname" name="txtsignupname" required="true" />
                                            </div>                                    
                                </div>
                                <div class="form-group">
                                    <label for="email" class="col-sm-2 control-label">
                                        Email</label>
                                    <div class="col-sm-10">
                                        <input type="email" class="form-control" placeholder="Email" id="txtsignupemail" name="txtsignupemail" required="true" />
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="mobile" class="col-sm-2 control-label">
                                        Mobile</label>
                                    <div class="col-sm-10">
                                        <input type="text" class="form-control" placeholder="Mobile" id="txtsignupmobile" name="txtsignupmobile" required="true"/>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="password" class="col-sm-2 control-label">
                                        Password</label>
                                    <div class="col-sm-10">
                                        <input type="password" class="form-control" id="txtsignuppswd" name="txtsignuppswd" required="true" placeholder="Password" />
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-sm-2">
                                    </div>
                                    <div class="col-sm-10">                                     
											
											 <button type="submit" id="signup_btn" class="btn btn-primary btn-sm loginbtn">Sign up</button>
                                             <input type="reset" id="resetloginpopup" class="btn btn-primary btn-sm" value="Reset"/>

                                        <!-- <button type="button" class="btn btn-default btn-sm">Cancel</button> -->
                                    </div>
                                </div>
                                </form>
                            </div>
                        </div>
                        <div id="OR" class="hidden-xs">
                            OR</div>
                    </div>
                    <div class="col-md-4">
                        <div class="row text-center sign-with">
                            <div class="col-md-12">
                                <h3>
                                    Sign in with</h3>
                            </div>
                            <div class="col-md-12">
                                <div class="btn-group btn-group-justified">
                                   <ul class="social-network social-circle onwhite">
                                    <li>
                                        

 <a href="#" class="icoFacebook" title="Facebook" href="<?php echo $loginUrl ; ?>"><i class="fa fa-facebook" id="sclicons"></i></a>

                                       

                                    </li>                                    
                                    <li><a href="#" class="icoGoogle" title="Google +"><i class="fa fa-google-plus"id="sclicons"></i></a></li>
                                    <li><a href="#" class="icoLinkedin" title="Linkedin +"><i class="fa fa-linkedin" id="sclicons"></i></a></li>
                                </ul>
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
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
        <center><h4 class="modal-title">Staffingspot | Job Portal</h4></center>
      </div>
      <div class="modal-body">
        <p>Thanks for your Registration</p>
        <p>An activation code is sent to your registered mailid. Please Activate your Account</p>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>        
      </div>
    </div>
  </div>
</div>



	<script>
	$('#myModal1').modal('show');
        $('#myModal').modal('show');
	</script>
        <script>
	
	</script>
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
$(document).ready(function() {
    $("#submit_btn").click(function() {        
	    var proceed = true;
           // alert("hii");
        //simple validation at client's end
        //loop through each field and we simply change border color to red for invalid fields		
		$("#login input[required=true],#login select[required=true]").each(function(){
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
		   username=$("#txtloginemail").val();
		   password=$("#txtloginpswd").val();		   	
		   $.ajax({
		   type: "POST",
		   url: "logincheck.php",
		   data: "name="+username+"&pwd="+password,
		   success: function(data){    
		   //alert(html);
		   var reslogin = $.trim(data);
		    //alert(reslogin);
			if(reslogin == "true")
			{
            //location.reload();			
			$(location).attr('href', 'user-dashboard.php');
			}			
			
			if(reslogin == "false")
            {
			 //alert("false");
			 $("#add_err").css('display', 'inline', 'important');
			 $("#add_err").html("<center><img src='images/icons/cross.png' alt='Staffingspot Invalid Username or Password Image' title='Staffingspot Invalid Username or Password Image' /> Invalid Username or Password </center>");
			}
		   },
		   beforeSend:function()
		   {
			$("#add_err").css('display', 'inline', 'important');
			$("#add_err").html("<center><img src='images/ajax.gif' title='Staffingspot Ajax Loading' alt='Staffingspot Ajax Loading Icon' /> Loading...</center>")
		   }
		  });
		return false;
	   }        
    });
});
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
		   username=$("#emptxtloginemail").val();
		   password=$("#emptxtloginpswd").val();		   	
		   $.ajax({
		   type: "POST",
		   url: "emplogincheck.php",
		   data: "name="+username+"&pwd="+password,
		   success: function(html){    
		   //alert(html);
		   var reslogin = $.trim(html);
		   //alert(reslogin);
			if (reslogin == 'true')
			{                           
            $(location).attr('href', 'company-dashboard.php');			
			}
            else if (reslogin == 'nodetail')
			{              
			$(location).attr('href', 'add_emp_details.php');
			}
			else{
			//alert("false");
			 $("#add_err_emplogin").css('display', 'inline', 'important');
			 $("#add_err_emplogin").html("<center><img src='images/icons/cross.png' alt='Staffingspot Invalid Username or Password Image' title='Staffingspot Invalid Username or Password Image' /> Invalid Username or Password </center>");
			}
		   },
		   beforeSend:function()
		   {
			$("#add_err_emplogin").css('display', 'inline', 'important');
			$("#add_err_emplogin").html("<center><img src='images/ajax.gif' title='Staffingspot Ajax Loading' alt='Staffingspot Ajax Loading Icon' /> Loading...</center>")
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
	return false;
	}else{
	$('#txtsignupemail').css('border', '1px green solid');
	$('#cross').hide();
	$('#tick').fadeIn();
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
	return false;
	}else{
	$('#emptxtsignupemail').css('border', '1px green solid');
	$('#cross').hide();
	$('#tick').fadeIn();
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
			//alert(html);
            var htmlsuccess = $.trim(response);
			if(htmlsuccess=='Valid'){
            $('#resetloginpopup').click();
			 //$("#Success").html("Thanks For Registering With Build99.Please Check your Mail and Activate");
			
			 $('#myModal').modal('hide');
			 $("#signform").trigger( "reset" );
			 $("#Success").css('display', 'inline', 'important');
			 $("#Success").html("");
			 $('#register_success').modal('show');			 
			 //location.reload();
			}

            if(htmlsuccess=='Invalid'){
             //$("#Success").html("Thanks For Registering With Build99.Please Check your Mail and Activate");
            $("#txtsignupemail").val("");
            $("#txtsignupemail").css('border-color','red');
            $("#txtsignupemail").attr("placeholder", "Email ID Already Exists");
             //location.reload();
            }

		   },
		   beforeSend:function()
		   {
			$("#Success").css('display', 'inline', 'important');
            $("#Success").html("<center> Loading...</center>");
			//$("#Success").html("<center><img src='ajax.gif' /> Loading...</center>")
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
		   signupname=$("#emptxtsignupname").val();
		   signupemail=$("#emptxtsignupemail").val();
		   signupmobile=$("#emptxtsignupmobile").val();
		   signuppswd=$("#emptxtsignuppswd").val();	
		   
		      $.ajax({
		   type: "POST",
		   url: "empsignup_inner.php",
			data: "signupemail="+signupemail+"&signupmobile="+signupmobile+"&signuppswd="+signuppswd+"&signupname="+signupname,
		    success: function(html){ 
			//alert(html);
			if(html=='Valid'){          
             $('#resetloginpopup').click();                  
             $("#Success").html("Thanks For Registering With Build99.Please Check your Mail and Activate");			 
			 $('#myModal1').modal('hide');
			 $("#signform").trigger( "reset" );
			 $("#Success").css('display', 'inline', 'important');
			 $("#Success").html("");
			 $('#register_success').modal('show');			 
			 //location.reload();
			}			
		   },
		   beforeSend:function()
		   {
			$("#Success").css('display', 'inline', 'important');
            $("#Success").html("<center> Loading...</center>");
			//$("#Success").html("<center><img src='ajax.gif' /> Loading...</center>")
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

            $('#resetloginpopup').click(function(){
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