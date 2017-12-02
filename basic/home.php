<?php
require 'lib/db.php';
require 'lib/facebook.php';
require 'lib/fbconfig.php';
session_start();
$facebook=$_SESSION['facebook'];
$userdata=$_SESSION['userdata'];
$logoutUrl=$_SESSION['logout'];
//Facebook Access Token
$access_token_title='fb_'.$facebook_appid.'_access_token';
$access_token=$facebook[$access_token_title];
if(!empty($userdata))
{
$facebook_id=$userdata['id'];
$name=$userdata['name'];
$first_name=$userdata['first_name'];
$last_name=$userdata['last_name'];
$email=$userdata['email'];
$gender=$userdata['gender'];
$birthday1=date_create($userdata['birthday']);
$birthday = date_format($birthday1,'Y-m-d');
echo $location=mysql_real_escape_string($userdata['location']);
echo $hometown=mysql_real_escape_string($userdata['hometown']);
$bio=mysql_real_escape_string($userdata['bio']);
$relationship=$userdata['relationship_status'];
$timezone=$userdata['timezone'];
mysql_query("INSERT INTO `users` (`facebook_id`, `name`, `email`, `gender`, `birthday`, `location`, `hometown`, `bio`, `relationship`, `timezone`, `access_token`) 
VALUES('$facebook_id','$name','$email','$gender','$birthday','$location','$hometown','$bio','$relationship','$timezone','$access_token')");

// Update or Post Facebook wall. 
include('status_update.php'); 

?>

<a href="seek_logout.php">Logout</a>
<?php 

}
else
{
header("Location: fblogin.php");
}
?>