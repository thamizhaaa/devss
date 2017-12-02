<?php
session_start();
$facebook_session = $_REQUEST['facebook'];
$twitter_session = $_REQUEST['twitter'];
$google_session = $_REQUEST['google'];
$linkedin_session = $_REQUEST['linkedin'];

if(isset($_SESSION['login_seek'])) {
 
// isset is explained here
 
    unset($_SESSION['login_seek']);
 	header('Location:index.php');

	
} elseif (isset($_REQUEST['logout']) && ($google_session != "")) {
  unset($_SESSION['token']);
  unset($_SESSION['google_data']);
  header('Location:index.php');
  
  
}  elseif (isset($_REQUEST['logout']) && ($facebook_session != "")) {
	session_destroy();
	header('Location:index.php');
	
}  elseif (isset($_REQUEST['logout']) && ($twitter_session != "")) {
			unset($_SESSION['tw_oauth_id']);
            unset($_SESSION['tw_username']);
            unset($_SESSION['tw_screen_name']);
			header('Location:index.php');
			
} elseif (isset($_REQUEST['logout']) && ($linkedin_session != "")) {
 			unset($_SESSION['linkedin_user']);
 			header('Location:index.php');
}
?>

