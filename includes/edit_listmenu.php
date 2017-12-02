<div class="col-sm-2 top_space">
<div class="panel panel-default">
<div class="panel-heading">Edit Profile</div>
  <div class="panel-body">
  <ul class="nav">
  			<?php  $check_query = mysql_query("SELECT * FROM seeker_personal WHERE seekerid = '$session_seekid' "); 
			$count_check = mysql_num_rows($check_query);?>
  <li class="flt_left clr_both"><a href="edit_profile.php?seekid=<?php echo $session_seekid; ?>"><?php if($count_check > 0) { ?>   
  <span class="glyphicon glyphicon-ok"></span>
  <?php
  } else { 
  ?>
    <span class="glyphicon glyphicon-remove"></span>
  <?php
  } ?>&nbsp; Personal</a>
  </li>
    <li class="flt_left clr_both divider"></li>
    
    <?php  $check_query = mysql_query("SELECT * FROM  seeker_profess WHERE seekerid = '$session_seekid' "); 
			$count_check = mysql_num_rows($check_query);?>
            
  <li class="flt_left clr_both"><a href="edit_profile1.php?seekid=<?php echo $session_seekid; ?>"><?php if($count_check > 0) { ?>   
  <span class="glyphicon glyphicon-ok"></span>
  <?php
  } else { 
  ?>
    <span class="glyphicon glyphicon-remove"></span>
  <?php
  } ?> &nbsp;Professional
  </a></li>
  
      <li class="flt_left clr_both divider"></li>
      <?php  $check_query = mysql_query("SELECT * FROM  seeker_qualify WHERE seekerid = '$session_seekid' "); 
			$count_check = mysql_num_rows($check_query);?>
  <li class="flt_left clr_both"><a href="edit_profile2.php?seekid=<?php echo $session_seekid; ?>"><?php if($count_check > 0) { ?>   
  <span class="glyphicon glyphicon-ok"></span>
  <?php
  } else { 
  ?>
    <span class="glyphicon glyphicon-remove"></span>
  <?php
  } ?> &nbsp;Qualification </a></li>
      <li class="flt_left clr_both divider"></li>
      <?php  $check_query = mysql_query("SELECT * FROM   seeker_experience WHERE seekerid = '$session_seekid' "); 
			$count_check = mysql_num_rows($check_query);?>
  <li class="flt_left clr_both"><a href="edit_profile3.php?seekid=<?php echo $session_seekid; ?>"><?php if($count_check > 0) { ?>   
  <span class="glyphicon glyphicon-ok"></span>
  <?php
  } else { 
  ?>
    <span class="glyphicon glyphicon-remove"></span>
  <?php
  } ?> &nbsp;Experience</a></li>


  </ul>
</div>  
</div>
</div>