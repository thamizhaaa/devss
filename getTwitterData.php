<?php
ob_start();
require("twitteroauth/twitteroauth.php");
require 'twitteroauth/twconfig.php';

session_start();

if (!empty($_GET['oauth_verifier']) && !empty($_SESSION['oauth_token']) && !empty($_SESSION['oauth_token_secret'])) {
    // We've got everything we need
    $twitteroauth = new TwitterOAuth(YOUR_CONSUMER_KEY, YOUR_CONSUMER_SECRET, $_SESSION['oauth_token'], $_SESSION['oauth_token_secret']);
// Let's request the access token
    $access_token = $twitteroauth->getAccessToken($_GET['oauth_verifier']);
// Save it in a session var
    $_SESSION['access_token'] = $access_token;
// Let's get the user's info
    $user_info = $twitteroauth->get('account/verify_credentials');
// Print user's info
    echo '<pre>';
   // print_r($user_info);
    echo '</pre><br/>';
    if (isset($user_info->errors)) {
		
        // Something's wrong, go back to square 1  
       ?>
<script>
/*alert('Oops! Login Failed, Something went wrong');*/
window.location='index.php';
</script>
        <?php
    } else {
		session_start();
	   $twitter_otoken=$_SESSION['oauth_token'];
	   $twitter_otoken_secret=$_SESSION['oauth_token_secret'];
	
        $uid = $user_info->id;
        $username = $user_info->name;
		$screen_name = $user_info->screen_name;
        $get_query = mysql_query('select * from seeker_personal where fid="'.$uid.'"');
		$get_count = mysql_num_rows($get_query);
		if($get_count > 0){ 
		
		header("Location:home.php",false);
		ob_end_flush();
		/*?>
        <script>
		window.location='home.php';
		</script>
        <?php*/
		} else {
			
			$_SESSION['tw_oauth_id'] = $uid;
            $_SESSION['tw_username'] = $username;
            $_SESSION['tw_screen_name'] = $screen_name;
			header("Location:twitter_detail.php",false);
			ob_end_flush();
			/*?>
			<script>
			window.location='twitter_detail.php';
			</script>
			<?php */
			}
            
			
			
       
    }
} else {
    // Something's missing, go back to square 1
    ?>
<script>
/*alert('Oops! Login Failed, Something went wrong');*/
window.location='index.php';
</script>
        <?php
}
?>



