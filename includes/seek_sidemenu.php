<?php 
session_start();
$seerkersidds = $session_seekid;
?>

<div class="col-md-2 jsleftnav">
	<ul class="list-unstyled">
    
		<li><a href="seek_home.php">Home</a></li>
        
		<!--<li class="headingwitharrow">
			<i class="fa fa-chevron-down pull-right"></i>
			<a href="#">Inbox </a>
				<ul style="background: transparent none repeat scroll 0% 0%; display: block;">
					<li>
					<a href="#">Job Alerts</a>
					</li>
					<li>
					<a href="#">Recruiter Mails</a>
					</li>
				</ul>
		</li>-->
        
		<li><a href="seek_home.php?view=matched">Mached Jobs <span class="badge pull-right"><?php matchedJobCount($session_aoi,$session_skills) ;?></span></a></li>
        <li><a href="seek_home.php?view=suggest">Other Suggested Jobs  <span class="badge pull-right"><?php suggestJobCount($session_aoi,$session_skills) ;?></span></a></li>
        <li><a href="#">Who Viewed My Profile <span class="badge pull-right">109</span></a></li>
        <li><a href="seek_home.php?view=applied">Applied Jobs </a></li>
        
        <li class="headingwitharrow">
			<i class="fa fa-chevron-down pull-right"></i>
			<a href="javascript:void(0);">My Profile </a>
				<ul style="background: transparent none repeat scroll 0% 0%; display: block;">
                
					<li><a href="edit_profile.php?seekid=<?php echo $seerkersidds;?>">Personal Details</a></li>
					<li><a href="edit_profile3.php?seekid=<?php echo $seerkersidds;?>">Work Exp.</a></li>
                    <li><a href="edit_profile2.php?seekid=<?php echo $seerkersidds;?>">Education</a></li>
                    <li><a href="edit_profile1.php?seekid=<?php echo $seerkersidds;?>">Skills</a></li>
                    <li><a href="#">Resumes</a></li>	
				</ul>
		</li>
        
        <li><a href="#">My Job Alert <span class="label label-danger pull-right">New</span></a></li>
        <li><a href="#">Desired Job Details</a></li>
        <li><a href="account_settings.php">Account Settings</a></li>

</ul>
</div>