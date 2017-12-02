<?php
session_start();
include_once("includes/config.php");
include_once("LinkedIn/linkedin_config.php");
include_once("LinkedIn/http.php");
include_once("LinkedIn/oauth_client.php");

//db class instance
$db = new DB;

if (isset($_GET["oauth_problem"]) && $_GET["oauth_problem"] <> "") {
  // in case if user cancel the login. redirect back to home page.
  $_SESSION["err_msg"] = $_GET["oauth_problem"];
  header("location:index.php");
  exit;
}

$client = new oauth_client_class;

$client->debug = false;
$client->debug_http = true;
$client->redirect_uri = $callbackURL;

$client->client_id = $linkedinApiKey;
$application_line = __LINE__;
$client->client_secret = $linkedinApiSecret;

if (strlen($client->client_id) == 0 || strlen($client->client_secret) == 0)
  die('Please go to LinkedIn Apps page https://www.linkedin.com/secure/developer?newapp= , '.
			'create an application, and in the line '.$application_line.
			' set the client_id to Consumer key and client_secret with Consumer secret. '.
			'The Callback URL must be '.$client->redirect_uri).' Make sure you enable the '.
			'necessary permissions to execute the API calls your application needs.';

/* API permissions
 */
$client->scope = $linkedinScope;
if (($success = $client->Initialize())) {
  if (($success = $client->Process())) {
    if (strlen($client->authorization_error)) {
      $client->error = $client->authorization_error;
      $success = false;
    } elseif (strlen($client->access_token)) {
      $success = $client->CallAPI(
					'http://api.linkedin.com/v1/people/~:(id,email-address,first-name,last-name,location,picture-url,public-profile-url,formatted-name)', 
					'GET', array(
						'format'=>'json'
					), array('FailOnAccessError'=>true), $user);
    }
  }
  $success = $client->Finalize($success);
}
if ($client->exit) exit;
if ($success) {
	
	$_SESSION['linkedin_user'] = $user;
	$lid = $user->id;
	$emailAddress = $user->emailAddress;
	$query = mysql_query('select * from seeker_personal where fid="'.$lid.'" and mailid="'.$emailAddress.'"');
	$count = mysql_num_rows($query);
	if($count > 0) {
	?>
    <script>
	window.location='home.php';
	</script>
    <?php	
		
	} else {
	?>
    <script>
	window.location='linkedin_detail.php';
	</script>
    <?php
	
	}
} else {
 	 $_SESSION["err_msg"] = $client->error;
}
header("location:index.php");
exit;
?>

