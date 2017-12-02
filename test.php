<?php 

include "includes/email_config.php";
$emailing = new emailFunction();

$mail_to = 'harish@shalominfotech.com';
$mail_sub = 'testmail smtp';
$activation = 'hihihi';
$mail_message = "
		<html>
		<head>
		<title>HTML email</title>
		</head>
		<body >
		<table width='100%' cellpadding='0' cellspacing='0' border='0'>
<tr >
<td colspan='2' style='text-align:left'><a href='http://www.staffingspot.in/' target='_blank'><img src='http://www.staffingspot.in/images/logo_sp.png' width='183'  /></a></td>
</tr>
<tr><td colspan='2' align='center'><h2>Welcome to Staffing Spot</h2></td></tr>
<tr >
<td colspan='2'><b>Dear  $fname_id,</b><br/><br/>
&nbsp;&nbsp;&nbsp;&nbsp; We have registered your credentials. Please click on the following link to activate your account<br/>
<br/>
</td>

</tr>
<tr><td colspan='2'><a href='http://staffingspot.in/activation.php?code=$activation' target='_blank'>http://staffingspot.in/activation/$activation</a> your personalized Account<br/><br/></td></tr>
<tr><td colspan='2'><b>What Next?</b><br/><br/></td></tr>
<tr><td colspan='2'>
<ul>
 <li>Search Thousands of Jobs and find Best Employer</li>
 <li>Apply a Job in a minute</li>
 <li>Post your resume and get even more exposure</li> 
</ul>  
</td></tr>

<tr><td colspan='2'><b>Sincerely,<br/>Staffing Spot</b>
</td></tr>
<br/>

<tr>
<td colspan='2' style='text-align:center'>All rights reserved © 2014 <a href='http://www.staffingspot.in/'>Staffingspot Ltd.</a>  </td>
</tr>
</table>
</body>
</html>";	
$emailing->emailing($mail_sub,$mail_message,$mail_to);
/*$emailing->emailFunction($mail_sub,$mail_message,$mail_to);*/


?>