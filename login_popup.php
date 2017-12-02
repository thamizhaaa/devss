<!-- Job seeker Log In pop up container STARTS -->
<div class="container">


<div id="seek_modal" class="popupContainer" style="display:none;">
		<header class="popupHeader">
			<span class="header_title">Job Seekers Login</span>
			<span class="modal_close"><i class="fa fa-times"></i></span>
		</header>
		
		<section class="popupBody">
			<!-- Social Login -->
			<h3 class="text-center">Log In or <font class="text-primary">Sign Up</font></h3>
            
            <div class="col-sm-12 form-group top_space">
           <!-- Face book login starts--> 
            
<div class="col-sm-2" style="padding-left:0px;">
<?php 
$facebook->setAccessToken($initMe["accessToken"]);
$user = $facebook->getUser();
if ($user)
 {
 try {
 $userdata = $facebook->api('/me?fields=id,email,birthday,location,hometown,first_name,last_name'); 
 } catch (FacebookApiException $e) {

$user = null;
 }
$_SESSION['facebook']= $_SESSION;
$_SESSION['userdata'] = $userdata;
$_SESSION['logout'] =  $logoutUrl;
$email = $userdata['email'];

$query = mysql_query("select * from seeker_personal where mailid = '".$email."'");
$array = mysql_num_rows($query);
if($array == 0) {	
 header("Location: facebook_detail.php");
?>
<?php
} else {
?>
<script>
window.location='<?php echo $_SERVER['REQUEST_URI']; ?>';
</script>
<?php
}

} else {

$loginUrl = $facebook->getLoginUrl(array( 'scope' => 'email,user_birthday,user_location,user_hometown'));
    									  /*'redirect_uri'  => 'http://staffingspot.in/facebook_detail.php',*/
 ?>
<a class="btn btn-social-icon btn-facebook" href="<?php echo $loginUrl ; ?>"  aria-label="Left Align"><i class="fa fa-facebook" aria-hidden="true"></i></a> 
<?php } ?>
</div>
           <!-- Face book login Ends--> 
           
           
           <!-- Google login starts--> 
<div class="col-sm-2">
<?php

$client = new Google_Client();
$client->setApplicationName("Google UserInfo PHP Starter Application");
 
$oauth2 = new Google_Oauth2Service($client);

if (isset($_GET['code'])) {
	
  $client->authenticate($_GET['code']);
  $_SESSION['token'] = $client->getAccessToken();
  $redirect = 'http://' . $_SERVER['HTTP_HOST'] . $_SERVER['PHP_SELF'];
  ?>
  <script>
   window.location='<?php echo filter_var($redirect, FILTER_SANITIZE_URL); ?>';
   </script>
  
  <?php
  return;
}
 
if (isset($_SESSION['token'])) {
 $client->setAccessToken($_SESSION['token']);
}
 
if (isset($_REQUEST['logout'])) {
  unset($_SESSION['token']);
  unset($_SESSION['google_data']);
  $client->revokeToken();
}
 
if ($client->getAccessToken()) {
  $user = $oauth2->userinfo->get();
   $_SESSION['google_data'] = $user;
   ?>
   <script>
   window.location='google_detail.php';
   </script>
   <?php
  $_SESSION['token'] = $client->getAccessToken();
	
	
} else {
  $authUrl = $client->createAuthUrl();
}
 
if(isset($personMarkup)): 
print $personMarkup; //Print user Information 
endif;
 
if(isset($authUrl)) {
?>	
<a class="btn btn-social-icon btn-google-plus" href="<?php echo $authUrl ;?>"  aria-label="Left Align"><i class="fa fa-google-plus" aria-hidden="true"></i></a>
<?php
  } else {
?>	  <a class="btn btn-danger login logout" href="?logout" style="margin-left:20px;" aria-label="Left Align"><span class="fa fa-google-plus" aria-hidden="true"></span>&nbsp;&nbsp;&nbsp;<b>Logout</b></a>
 
   <?php
  }
 ?>
<!---->

</div>
           <!-- Google login Ends--> 
           
           <!-- Twitter  login starts--> 
<div class="col-sm-2">
<?php 
	
$twitteroauth = new TwitterOAuth(YOUR_CONSUMER_KEY, YOUR_CONSUMER_SECRET);
// Requesting authentication tokens, the parameter is the URL we will be redirected to
$request_token = $twitteroauth->getRequestToken('http://staffingspot.localhost.com/getTwitterData.php');

// Saving them into the session

$_SESSION['oauth_token'] = $request_token['oauth_token'];
$_SESSION['oauth_token_secret'] = $request_token['oauth_token_secret'];

// If everything goes well..
if ($twitteroauth->http_code == 200) {
    // Let's generate the URL and redirect
    $url = $twitteroauth->getAuthorizeURL($request_token['oauth_token']);
    
} else {
    // It's a bad idea to kill the script, but we've got to know when there's an error.
    die('Something wrong happened.');
}
	
?>
<a class="btn btn-social-icon btn-twitter" href="<?php echo $url; ?>"  aria-label="Left Align"><i class="fa fa-twitter" aria-hidden="true"></i></a>
</div>
           <!-- Twitter  login Ends--> 
           
           <!-- LinkedIn  login starts-->            
<div class="col-sm-2">
<?php 

?>
<a class="btn btn-social-icon btn-linkedin" href="linkedin_process.php" aria-label="Left Align"><i class="fa fa-linkedin" aria-hidden="true"></i></a>
</div>
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
            
				<form method="post"  role="form"  action="login_seek.php">

  <div class="form-group  top_space form-group-sm">
 
<div class="col-sm-12">
<input type="text"  class="form-control" name="uname" placeholder="LogIn ID"  value=""/>
<span class="help-block"></span>
<input type="password"  class="form-control" name="pass_word" placeholder="Password"  value=""/>
<span class="help-block"></span>
</div>

<div class="col-sm-12">
<input type="submit" class="btn btn-warning col-sm-4" name="submit"  value="Log In"/>
<input type="reset" class="btn btn-warning col-sm-4" style="margin-left:12px;" name="reset"  value="Reset"/>
<br/>
</div>
 	</div>
</form>

				<div class="col-sm-12 top_space" style="padding-left:0px;">
 <a href="forget_seek.php" class="col-sm-5 text-danger">Forgot password?</a>                
  <span class="col-sm-5">New User <a href="seeker_reg.php" class="text-danger">Register</a></span>                
 </div>
 	
			</div>			
		</section>
	</div>
</div>
