<?php 
	
	ob_start();
	include "includes/config.php";
	include "includes/email_config.php";
	$jobcode = $_REQUEST['jobcode'];
	$seek = $_REQUEST['seekid'];
	
	
	if(($seek != "") && ($jobcode != "")){
	
	$app_query = mysql_query("SELECT * FROM seeker_personal WHERE id = '".$seek."'");
	
	$app_result = mysql_fetch_array($app_query);	
	$app_seek = $app_result['seekerid'];
	$app_seekfname = $app_result['fname']." ".$app_result['lname'];
	
	$app_query1 = mysql_query("SELECT * FROM postjob WHERE id = '".$jobcode."'");
		
	$app_result1 = mysql_fetch_array($app_query1);
	$app_jobcode = $app_result1['jobcode'];
	$app_empid = $app_result1['empid'];
	$app_jobtitle = $app_result1['jobtitle'];
		
	
	$verify_query = mysql_query("SELECT id FROM seeker_appliedjob WHERE seekerid = '".$app_seek."' AND jobcode = '".$app_jobcode."'");

	$verify_result = mysql_num_rows($verify_query);

	
	
	if($verify_result == 0) {
				
		$mail_query = mysql_query("SELECT * FROM employer WHERE empid = '".$app_empid."'");
		$mail_row = mysql_fetch_array($mail_query);
		
		$mail_tomail = $mail_row['email'];
		$mail_companyname = $mail_row['employerName'];
		$mail_subject = "Applied for jobs";
		
		/*$headers = "MIME-Version: 1.0" . "\r\n";
		$headers .= "Content-type:text/html;charset=\"iso-8859-1\"\n";
		$headers .= "X-Priority: 1 (Highest)\n";
        $headers .= "X-MSMail-Priority: High\n";
        $headers .= "Importance: High\n";*/
		
		$mail_message = "
		<html>
		<head>
		<title>HTML email</title>
		</head>
		<body >
		<table width='100%' cellpadding='0' cellspacing='0' border='0'>
<tr>
<td style='text-align:left'><a href='http://staffingspot.in/'><img src='http://staffingspot.in/images/logo_sp.png' width='183'/></a></td>
</tr>

<tr >
<td><font>Dear  $mail_companyname,<br/><br/>
&nbsp;&nbsp;&nbsp;&nbsp;The Candidate Mr/Ms/Mrs. $app_seekfname applied for the posting $app_jobtitle ($app_jobcode) in your consult. To view full Profile of the candidate click <a href='#'>Here</a><br/><br/>
 Sincerely,<br/>
 Staffingspot Ltd.
</font></td>
</tr><br/><br/><br/><br/>
<tr>
<td style='text-align:center'>All rights reserved © 2014 <a href='http://staffingspot.in/'>Staffingspot Ltd.</a>  </td>
</tr>
</table>
</body>
</html>";	
	
	$app_query3 = mysql_query("INSERT INTO seeker_appliedjob (seekerid,jobcode,empid)VALUES('".$app_seek."','".$app_jobcode."','".$app_empid."')");
		
		/*$retval = mail($mail_tomail,$mail_subject,$mail_message,$headers);*/
		$retval = emailFunction($mail_subject,$mail_message,$mail_tomail);
		
		if($retval != '') {
		header("Location:seek_home.php",false);	
		ob_end_flush();
		
/*?>
	<script>
	alert("Job applied successfully");
	window.location = "seek_home.php";
	</script>
    
<?php*/
	
		} else {
?>			
	<script>
	alert("Error in Sending Mail");
	window.location = "job_details_seek.php?id=<?php echo $app_jobcode ; ?>";
	</script>
<?php		
		}
	} else {
		
?>		
	<script>
	alert("Already Applied for this Post ");
	window.location = "job_details_seek.php?id=<?php echo $app_jobcode ; ?>";
	</script>
   		
<?php
	}
	} else {
	?> 	
	<script>
	alert("Job Applied failed");
	window.location = "job_details_seek.php?id=<?php echo $app_jobcode ; ?>";
	</script>

<?php 	
	} ?>
