
<!--With Session management-->
<?php 	
    error_reporting(0);
    session_start();	
    $user_check=$_SESSION['login_seek'];	
    if($user_check != "") {	
    $ses_sql=mysql_query("SELECT id,seekerid,mailid,loginid,fname FROM seeker_personal WHERE loginid='$user_check'"); 
    $row=mysql_fetch_array($ses_sql); 
    $login_session=$row['loginid'];
    $session_email=$row['loginid'];
    $session_id = $row['id'];
    $session_seekid = $row['seekerid'];
    $session_fname = $row['fname'];
    $session_gender = $row['gender'];
?>
<nav class="navbar navbar-default">
  <div class="container-fluid">
  <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
              <span class="sr-only">Toggle navigation</span>
              <span class="icon-bar"></span>
              <span class="icon-bar"></span>
              <span class="icon-bar"></span>
            </button> 
 </div>
  <div class="container-fluid white_bg" style="padding-right:30px;">
   <div style="height: 1px;" aria-expanded="false" id="navbar" class="navbar-collapse collapse">
    <div class="navbar-header">
      <a class="navbar-brand" href="seek_home.php"><img src="images/logo_sp.png"  alt="Logo"  /> </a>  
      <?php /* echo $session_seekid; */?>
    </div>
    <div>
      <ul class="nav navbar-nav pull-right">
       <div id="search">
        <script src="librabry_files_js/1.11.2-jquery-ui.min.js"></script>
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

           
    <form name="myform" action="job_list.php" method="get">
    <!--<a href="javascript: submitform()" class="button-search"></a>-->   
    <input type="text" name="location" id="location" class="main_search "  placeholder="Location" value=""/>
    
    <input type="text" name="kwords" id="kwords" class="main_search" placeholder="Keyskills, Job Title"/>
    <div style="display:none;float:left;" class="input_close"></div>
    </form>
 </div>            
             <!-- <li  ><a href="index.php">Home</a></li>-->
              <li class="active"><a href="seek_home.php">Home</a></li>
              <li ><a  href="#" class="text-warning"><strong><?php echo "Welcome"." ". $session_fname; ?></strong></a></li>
     
  
              <li class="dropdown" id="accountmenu" style="margin:0px;"><a href="" class="dropdown-toggle bg_yellow" data-toggle="dropdown"  style="padding-right:0px;">Options</a>
  			<ul class="dropdown-menu">
                            
                            <li><a href="seek_home.php">My Account</a></li>
                            <li class="divider"></li>
                            <li><a href="account_settings.php">Change Password</a></li>
                            <li class="divider"></li>
                            <li><a href="seek_home.php?view=applied">Applied Jobs</a></li>
                            <li class="divider"></li>
                            <li><a href="edit_page.php?seekid=<?php echo $session_seekid; ?>">Edit Profile</a></li>                            
                            <li class="divider"></li>
							<li><a href="seek_logout.php">Logout</a></li>
   			</ul>                 
 			</li>
      </ul>     
    </div>
    
    </div>
  </div>
</nav>
<!--With Session Management End -->

<!--With Facebook Session management-->
<?php 
	
	} elseif($_SESSION['userdata'] != "" ) {
  	
  	session_start();
		
	$ses_sql=mysql_query("SELECT id,seekerid,mailid,loginid,fname FROM seeker_personal WHERE mailid='".$fbemail."'");
 
	$row=mysql_fetch_array($ses_sql);

	$session_id = $row['id'];
	$session_seekid = $row['seekerid'];
	$session_fname = $row['fname'];
	

  ?>

<nav class="navbar navbar-default">
  <div class="container-fluid">
  <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
              <span class="sr-only">Toggle navigation</span>
              <span class="icon-bar"></span>
              <span class="icon-bar"></span>
              <span class="icon-bar"></span>
            </button> 
 </div>
  <div class="container-fluid white_bg" style="padding-right:30px;">
   <div style="height: 1px;" aria-expanded="false" id="navbar" class="navbar-collapse collapse">
    <div class="navbar-header">
      <a class="navbar-brand" href="home.php"><img src="images/logo_sp.png"  alt="Logo"  /> </a>  
    </div>
    <div>
      <ul class="nav navbar-nav pull-right">
       <!--<div id="search">
    <form name="myform" action="job_list.php" method="get">
    	<a href="javascript: submitform()" class="button-search"></a>
   
    	<input type="text" name="location" class="main_search "  placeholder="Location" value="" />
    	<input type="text" name="kwords" class="main_search" placeholder="Keyskills, Job Title"  />
  
		<div style="display:none;float:left;" class="input_close"></div>


	</form>
 </div>-->            
             <!-- <li  ><a href="index.php">Home</a></li>-->
              <li class="active"><a href="home.php">Home</a></li>
              <li ><a  href="#" class="text-warning"><strong>
			   <?php if($session_fname == '') { echo "Welcome"." ".$userdata['first_name']; } else { echo "Welcome"." ".$session_fname;}?>
			  </strong></a></li>
     
  
              <li class="dropdown" id="accountmenu" style="margin:0px;"><a href="" class="dropdown-toggle bg_yellow" data-toggle="dropdown"  style="padding-right:0px;">Options</a>
  			<ul class="dropdown-menu">
                            
                            <li><a href="#">My Account</a></li>
                            <li class="divider"></li>                            
                            <li><a data-toggle="modal" data-target="#AppliedJob" href="seek_home.php#AppliedJob">Applied Jobs</a></li>
                            <li class="divider"></li>
							<li><a href="seek_logout.php?logout&facebook=facebook">Logout</a></li>
   			</ul>                 
 			</li>
      </ul>     
    </div>
    
    </div>
  </div>
</nav>
<!--With Facebook Session Management End -->

<!--With Google Session Management Starts -->

<?php } elseif($_SESSION['google_data'] != "" ) { 
	$userdata = $_SESSION['google_data'];
	session_start();
		
	$ses_sql=mysql_query("SELECT id,seekerid,mailid,loginid,fname FROM seeker_personal WHERE mailid='".$userdata['email']."'");
 
	$row=mysql_fetch_array($ses_sql);

	$session_id = $row['id'];
	$session_seekid = $row['seekerid'];
	$session_fname = $row['fname'];



?>
<nav class="navbar navbar-default">
  <div class="container-fluid">
  <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
              <span class="sr-only">Toggle navigation</span>
              <span class="icon-bar"></span>
              <span class="icon-bar"></span>
              <span class="icon-bar"></span>
            </button> 
 </div>
  <div class="container-fluid white_bg" style="padding-right:30px;">
   <div style="height: 1px;" aria-expanded="false" id="navbar" class="navbar-collapse collapse">
    <div class="navbar-header">
      <a class="navbar-brand" href="home.php"><img src="images/logo_sp.png"  alt="Logo"  /> </a>  
    </div>
    <div>
      <ul class="nav navbar-nav pull-right">
       <!--<div id="search">
    <form name="myform" action="job_list.php" method="get">
    <a href="javascript: submitform()" class="button-search"></a>
   
    <input type="text" name="location" class="main_search "  placeholder="Location" value="" />
    <input type="text" name="kwords" class="main_search" placeholder="Keyskills, Job Title"  />
   
	
    
<div style="display:none;float:left;" class="input_close"></div>


</form>
 </div>-->            
             <!-- <li  ><a href="index.php">Home</a></li>-->
              <li class="active"><a href="home.php">Home</a></li>
              <li ><a  href="#" class="text-warning"><strong>
			  <?php if($session_fname == '') { echo "Welcome"." ".$userdata['name']; } else { echo "Welcome"." ".$session_fname;}?>
              </strong></a></li>
     
  
              <li class="dropdown" id="accountmenu" style="margin:0px;"><a href="" class="dropdown-toggle bg_yellow" data-toggle="dropdown"  style="padding-right:0px;">Options</a>
  			<ul class="dropdown-menu">
                            
                             <li><a href="#">My Account</a></li>
                            <li class="divider"></li>                            
                            <li><a data-toggle="modal" data-target="#AppliedJob" href="seek_home.php#AppliedJob">Applied Jobs</a></li>
                            <li class="divider"></li>
							<li><a href="seek_logout.php?logout&google=google">Logout</a></li>
   			</ul>                 
 			</li>
      </ul>     
    </div>
    
    </div>
  </div>
</nav>
<!--With Twitter Session Management End -->


<?php } elseif($_SESSION['tw_oauth_id'] != "" ) { 

	session_start();
	
	$ses_sql=mysql_query("SELECT id,seekerid,mailid,fname FROM seeker_personal WHERE fid ='".$_SESSION['tw_oauth_id']."'");
 
	$row=mysql_fetch_array($ses_sql);

	$session_id = $row['id'];
	$session_seekid = $row['seekerid'];
	$session_fname = $row['fname'];



?>
<nav class="navbar navbar-default">
  <div class="container-fluid">
  <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
              <span class="sr-only">Toggle navigation</span>
              <span class="icon-bar"></span>
              <span class="icon-bar"></span>
              <span class="icon-bar"></span>
            </button> 
 </div>
  <div class="container-fluid white_bg" style="padding-right:30px;">
   <div style="height: 1px;" aria-expanded="false" id="navbar" class="navbar-collapse collapse">
    <div class="navbar-header">
      <a class="navbar-brand" href="home.php"><img src="images/logo_sp.png"  alt="Logo"  /> </a>  
    </div>
    <div>
      <ul class="nav navbar-nav pull-right">
       <!--<div id="search">
    <form name="myform" action="job_list.php" method="get">
    <a href="javascript: submitform()" class="button-search"></a>
   
    <input type="text" name="location" class="main_search "  placeholder="Location" value="" />
    <input type="text" name="kwords" class="main_search" placeholder="Keyskills, Job Title"  />
   
	
    
<div style="display:none;float:left;" class="input_close"></div>


</form>
 </div>-->            
             <!-- <li  ><a href="index.php">Home</a></li>-->
              <li class="active"><a href="home.php">Home</a></li>
              <li ><a  href="#" class="text-warning"><strong>
			  <?php
			  if($session_fname == '') { echo "Welcome"." ".$_SESSION['tw_username']; } else { echo "Welcome"." ".$session_fname;}?>
			   </strong></a></li>
     
  
              <li class="dropdown" id="accountmenu" style="margin:0px;"><a href="" class="dropdown-toggle bg_yellow" data-toggle="dropdown"  style="padding-right:0px;">Options</a>
  			<ul class="dropdown-menu">
                            
                             <li><a href="#">My Account</a></li>
                            <li class="divider"></li>                            
                            <li><a data-toggle="modal" data-target="#AppliedJob" href="seek_home.php#AppliedJob">Applied Jobs</a></li>
                            <li class="divider"></li>
							<li><a href="seek_logout.php?logout&twitter=twitter">Logout</a></li>
   			</ul>                 
 			</li>
      </ul>     
    </div>
    
    </div>
  </div>
</nav>
<!--With Twitter Session Management End -->

<!--With LinkedIn Session Management Starts -->

<?php } elseif(!empty($_SESSION["linkedin_user"])) { 
	session_start();
	$user = $_SESSION["linkedin_user"];	
	$user_id = $user->id;
		
		$ses_sql=mysql_query("SELECT id,seekerid,mailid,fname FROM seeker_personal WHERE fid ='".$user_id."'");
 
	$row=mysql_fetch_array($ses_sql);

	$session_id = $row['id'];
	$session_seekid = $row['seekerid'];
	$session_fname = $row['fname'];
	$session_email = $row['mailid'];
		
		
?>

	
	
<nav class="navbar navbar-default">
  <div class="container-fluid">
  <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
              <span class="sr-only">Toggle navigation</span>
              <span class="icon-bar"></span>
              <span class="icon-bar"></span>
              <span class="icon-bar"></span>
            </button> 
 </div>
  <div class="container-fluid white_bg" style="padding-right:30px;">
   <div style="height: 1px;" aria-expanded="false" id="navbar" class="navbar-collapse collapse">
    <div class="navbar-header">
      <a class="navbar-brand" href="home.php"><img src="images/logo_sp.png"  alt="Logo"  /> </a>  
    </div>
    <div>
      <ul class="nav navbar-nav pull-right">
       <!--<div id="search">
    <form name="myform" action="job_list.php" method="get">
    <a href="javascript: submitform()" class="button-search"></a>
   
    <input type="text" name="location" class="main_search "  placeholder="Location" value="" />
    <input type="text" name="kwords" class="main_search" placeholder="Keyskills, Job Title"  />
   
	
    
<div style="display:none;float:left;" class="input_close"></div>


</form>
 </div>-->            
             <!-- <li  ><a href="index.php">Home</a></li>-->
              <li class="active"><a href="home.php">Home</a></li>
              <li ><a  href="#" class="text-warning"><strong><?php if($session_fname == '') { echo "Welcome"." ".$user->firstName; } else { echo "Welcome"." ".$session_fname;} ?> </strong></a></li>
     
  
              <li class="dropdown" id="accountmenu" style="margin:0px;"><a href="" class="dropdown-toggle bg_yellow" data-toggle="dropdown"  style="padding-right:0px;">Options</a>
  			<ul class="dropdown-menu">
                            
                             <li><a href="#">My Account</a></li>
                            <li class="divider"></li>                            
                            <li><a data-toggle="modal" data-target="#AppliedJob" href="seek_home.php#AppliedJob">Applied Jobs</a></li>
                            <li class="divider"></li>
							<li><a href="seek_logout.php?logout&linkedin=linkedin">Logout</a></li>
   			</ul>                 
 			</li>
      </ul>     
    </div>
    
    </div>
  </div>
</nav>


<!--With LinkedIn Session Management Ends -->


<!--Without Session management-->

<?php } else { ?>

<nav class="navbar navbar-default">
  <div class="container-fluid">
 <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
              <span class="sr-only">Toggle navigation</span>
              <span class="icon-bar"></span>
              <span class="icon-bar"></span>
              <span class="icon-bar"></span>
            </button>
 </div>
  <div class="container-fluid white_bg" style="padding-right:30px;">
  <div style="height: 1px;" aria-expanded="false" id="navbar" class="navbar-collapse collapse">
    <div class="navbar-header">
      <a class="navbar-brand" href="index.php"><img src="images/logo_sp.png"  alt="Logo"  /> </a>  
    </div>
    <div>
      <ul class="nav navbar-nav pull-right">
      <div id="search">
    <form name="myform" action="job_list.php" method="get">
    <a href="javascript: submitform()" class="button-search"></a>
   
    <input type="text" name="location" id="location" class="main_search "  placeholder="Location" value="" />
    <input type="text" name="kwords" id="kwords" class="main_search" placeholder="Keyskills, Job Title"  />
    
   
	
    
<div style="display:none;float:left;" class="input_close"></div>


</form>
</div>
             <li class="active"><a href="index.php">Home</a></li>
              <!--<li class=""><a href="company_list.php">Companies</a></li>-->
             
       

<!--<li style="margin:0px;"><a href="#">Jobs</a> </li>-->

<li  class="dropdown" id="accountmenu"><a href="#" data-toggle="dropdown" class="bg_yellow dropdown-toggle" style="padding-right:0px;">Job Seeker</a>
                     <ul class="dropdown-menu">
                            <li><a href="seeker_reg.php">Register</a></li>
                             <li class="divider"></li>
                            <li><a href="#seek_modal" data-toggle="modal" >Login</a></li>

                        </ul>
  
 </li>
  
  <li class="dropdown" id="accountmenu" style="margin:0px;"><a href="" class="dropdown-toggle bg_yellow" data-toggle="dropdown"  style="padding-right:0px;">Employer</a>
   <ul class="dropdown-menu">
                            <li><a href="employer/employer_reg.php">Register</a></li>
                             <li><a href="employer/login_emp.php" onClick="window.open('employer/login_emp.php',' ','scrollbars=yes' ,'width=auto, height=auto');" class="">Login</a></li>

                            <li class="divider"></li>
                            <li><a href="employer/login_emp.php?emp=employer">Post Job</a></li>
							<li><a href="employer/login_emp.php?emp=myjob">My Jobs</a></li>
                        </ul>                        
  </li>
      </ul>     
    </div>
    </div>
  </div>
</nav>

<?php } ?>

<!--Without Session management End-->