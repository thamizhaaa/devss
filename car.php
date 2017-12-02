<?php

include("includes/config.php");

$auto_query = mysql_query("select * from employer where status ='1'");
while($auto_array = mysql_fetch_array($auto_query)){

     $empid = $auto_array['empid'];
	 $emailid = $auto_array['email'];
	 $employer = $auto_array['employerName'];



	 $query = mysql_query("SELECT DATEDIFF(now(),`lastlogindate`) as dat,email,employerName from employer where `empid`='".$empid."'");
	
	 while($array = mysql_fetch_array($query)) {
		
		 	$day = $array['dat']. "<br/>"; 
			$employer_name = $array['employerName'];
			$email = $auto_array['email'];
			if($day > 30) {
				
		$mail_subject = "Reminder: Your Account Is Inactive";
		
		$headers = "MIME-Version: 1.0" . "\r\n";
		$headers .= "Content-Type: text/html; charset=\"iso-8859-1\"\n";
        $headers .= "X-Priority: 1 (Highest)\n";
        $headers .= "X-MSMail-Priority: High\n";
        $headers .= "Importance: High\n";

		
		$mail_message = "
		<html>
		<head>
		<title>HTML email</title>
		</head>
		<body >
		<table width='100%' cellpadding='0' cellspacing='0' border='0'>
<tr >
<td colspan='2' style='text-align:left'><a href='http://staffingspot.in' target='_blank'><img src='http://staffingspot.in/images/logo_sp.png' /></a></td>
</tr>
<tr><td colspan='2' align='center'><h2>Activate Your Account</h2></td></tr>
<tr >
<td colspan='2'><b>Dear  $employer_name,</b><br/><br/>
&nbsp;&nbsp;&nbsp;&nbsp;  we strongly recommend you to activate your Staffing Spot account to post jobs ,recuirt candidate for relevant postings  <br/>
<br/>
</td>

</tr>
<tr><td colspan='2'>You can use this information to <a href='http://staffingspot.yobiclouds.com/new/employer/login_emp.php' target='_blank'>log into</a> your personalized Account<br/><br/></td></tr>
<tr><td colspan='2'><b>What Next?</b><br/><br/></td></tr>
<tr><td colspan='2'>
<ul>
 <li>Search Thousands of resumes and find quality candidates</li>
 <li>Post a Job in a minute</li>
 <li>Advertise your job postings and get even more exposure</li> 
</ul>  
</td></tr>

<tr><td colspan='2'><b>Sincerely,<br/>Staffing Spot</b>
</td></tr>
<br/>

<tr>
<td colspan='2' style='text-align:center'>All rights reserved © 2014 <a href='http://staffingspot.in'>Staffingspot Ltd.</a>  </td>
</tr>
</table>
</body>
</html>";	

mail ($email,$mail_subject,$mail_message,$headers);
				
			}
	
	
} }


?>