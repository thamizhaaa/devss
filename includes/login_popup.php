<script type="text/javascript" src="js/custom.js"></script> 
<!-- Job seeker Log In pop up container STARTS -->
<?php ob_start(); ?>
<div class="container">
<div  data-backdrop="static" aria-hidden="true" aria-labelledby="myModalLabel" role="dialog" tabindex="-1" id="seek_modal" class="modal fade">
					<div class="modal-dialog">
						<div class="modal-content">
<div class="modal-header">
<button type="button" class="close col-sm-1" style="margin-top: 1.5%;" data-dismiss="modal">&times;</button>
<h3 class="modal-title">Job Seekers Login </h3>
</div>                              
        <div class="modal-body">
            <form method="post" class="form-horizontal" role="form">
            <!-- Social Login -->
            <h3 class="text-center">Log In or <font class="text-primary">Sign Up</font></h3>
        <div class="col-sm-12 text-center">
                                        
<!-- Face book login starts--> 
            

           <!-- Face book login Ends--> 
           
           
           <!-- Google login starts--> 

           <!-- Twitter  login Ends--> 
           
           <!-- LinkedIn  login starts-->            
   <!-- LinkedIn  login Ends--> 
           
</div>

<div class="col-sm-11 omb_row-sm-offset-3 omb_loginOr">
			<div class="col-sm-11">
				<hr class="omb_hrOr ">
				<span class="omb_spanOr">or</span>
			</div>
		</div>

<!-- Username & Password Login form -->
			<div class="user_login">
    <div class="col-sm-10 col-md-10 col-xs-10 col-lg-10" style="margin-left:2%;">        
	<span id="add_errwrong"></span><div class="alert alert-danger text-center hidden" id="errormsg1" style="clear:both" role="alert"><strong>Invalid Username and Password </strong></div>	
    <span id="add_errinvalid"></span><div class="alert alert-danger text-center hidden" id="errormsg2" style="clear:both" role="alert"><strong>Verify your E-mail and get started using StaffingSpot account </strong></div>			
	</div>
  <div class="form-group form-group-sm">
 
<div class="col-sm-10 col-md-10 col-xs-10 col-lg-10" style="margin-left:2%;">
<span id="alerterrormsg"></span>
<input type="text"  class="form-control" id="uname" name="uname" placeholder="LogIn ID"  value=""/>
<span class="help-block"></span>
<input type="password"  class="form-control" id="pass_word" name="pass_word" placeholder="Password"  value=""/>
<span class="help-block"></span>
</div>

<div class="col-sm-10 col-md-10 col-xs-10 col-lg-10 " style="margin-left:2%;">
<!--<a class="btn btn-warning col-sm-4" id="logsubmit" href="#">Log In</a>-->
<input class="btn btn-warning col-sm-4" id="logsubmit" type="button" value="Log In" />
<input type="reset" class="btn btn-warning col-sm-4" style="margin-left:12px;" name="reset"  value="Reset"/>
<br/>
</div>
 	</div>


				<div class="form-group text-center" style="padding-bottom:1%;">
 <a href="forget_seek.php" class="col-sm-5 text-danger">Forgot password?</a>                
  <span class="col-sm-5">New User <a href="seeker_reg.php" class="text-danger">Register</a></span>                
 </div>
 	
			</div>


                            </form>
                         </div>
                        </div>
                    </div>
		
	</div>
</div>
