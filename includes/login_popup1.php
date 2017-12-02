
	
<!-- Employer Log In pop up container STARTS -->
<div class="container">
	

<div id="emp_modal" class="popupContainer" style="display:none;">
		<header class="popupHeader">
			<span class="header_title">Employer Login</span>
			<span class="modal_close"><i class="fa fa-times"></i></span>
		</header>
		
		<section class="popupBody">
			<!-- Social Login -->
			
			<!-- Username & Password Login form -->
			<div class="employer_login">
				<form method="post" action="employer/login_emp.php" role="form" >

  <div class="form-group  top_space form-group-sm">
 
<div class="col-sm-12">
<input type="text"  class="form-control" name="uname" placeholder="LogIn ID"  value=""/><span class="help-block"></span>
<input type="password"  class="form-control" name="pass_word" placeholder="Password"  value=""/><span class="help-block"></span>
</div>

<div class="col-sm-12">
<input type="submit" class="frm_btn btn col-sm-4" name="submit"  value="Log In"/>

<input type="reset" class="frm_btn btn col-sm-4" name="reset"  value="Reset"/>
</div>
</div>
</form>
<div class="col-sm-12 top_space">
				<a href="employer/forget_emp.php" class="col-sm-5">Forgot password?</a>
                <span class="col-sm-5">New User <a href="employer/employer_reg.php" >Register</a></span>  
                </div>
			</div>

			
		</section>
	</div>
</div>
<!-- Employer Log In pop up container ENDS -->