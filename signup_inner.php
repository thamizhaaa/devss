<?php
	@include("config.php");	
	@include('common.php');	
	$name = $_REQUEST['signupname'];
	$email = $_REQUEST['signupemail'];
	$mobile = $_REQUEST['signupmobile'];	  
	$password = $_REQUEST['signuppswd'];	
	$activation=md5($email.time());
	
        $root_url  =  "http://".$_SERVER['HTTP_HOST'];
        $root_url .= preg_replace('@/+$@', '', dirname($_SERVER['SCRIPT_NAME'])).'/';
	
        $content_email = mysql_query("select * from tbl_email_content where fld_processfor = 'seek_reg'");
        $rows=mysql_fetch_assoc($content_email);
        
	$chkuser = selectsinglevalue("SELECT count(*) as retv FROM tbl_jobseeker WHERE fld_email='$email' and fld_js_status=1");
	$chkuser1 = selectsinglevalue("SELECT count(*) as retv FROM tbl_jobseeker WHERE fld_email='$email' and fld_js_status=0");
	if($chkuser == 0 && $chkuser1 == 0)
		{
		$insertdata = "INSERT INTO tbl_jobseeker(fld_name,fld_email,fld_mobile,fld_password,fld_activation_code)
		VALUES	
		('$name','$email','$mobile','$password','$activation')";


			$insertdata = "INSERT INTO tbl_jobseeker(fld_name,fld_email,fld_mobile,fld_password,fld_activation_code,fld_registered_date)
		VALUES	
		('$name','$email','$mobile','$password','$activation', CURRENT_TIMESTAMP)";
                
		                
		$result=mysql_query($insertdata);
		echo 'Valid';
		//$acti_mail_check = activation_email($admin_data['activation_mail'], $logo, $user_name, $activation_link, trim($_POST['email']));
		$to = base64_encode($email);
		$activation = base64_encode($activation);
		//$to = $email;
//                if($_SERVER['HTTP_HOST'] == "localhost")
//                {
//                   $link = "http://localhost/staffingspot/index.php?username=$to&activation=$activation";
//                 }
//                 elseif($_SERVER['HTTP_HOST'] == "172.31.1.15")
//                  {
//                    $link = "http://localhost/staffingspot/index.php?username=$to&activation=$activation";
//                          }
//                else
//                {
//                   $link = "http://staffing.thamizhselvan.info/index.php?username=$to&activation=$activation";
//                 }
//                 
                if($_SERVER['HTTP_HOST'] == "localhost")
                {
//                   $link = "http://localhost/grand_final/index.php?username=$to&activation=$activation";
                   $link = $root_url."index.php?username=$to&activation=$activation";
                }
                elseif($_SERVER['HTTP_HOST'] == "172.31.1.48")
                {
//                    $link = "http://172.31.1.48/grand_final/index.php?username=$to&activation=$activation";
                    $link = $root_url."index.php?username=$to&activation=$activation";
                }                                           
                elseif($_SERVER['HTTP_HOST'] == "172.31.1.54")
                {
//                    $link = "http://172.31.1.54/grand_final/index.php?username=$to&activation=$activation";
                    $link = $root_url."index.php?username=$to&activation=$activation";
                }                                           
                elseif($_SERVER['HTTP_HOST'] == "http://dev.staffingspot.com/")
                {
//                   $link = "http://dev.staffingspot.com/index.php?username=$to&activation=$activation";
                   $link = $root_url."index.php?username=$to&activation=$activation";
                }

                elseif($_SERVER['HTTP_HOST'] == "dev.vinformaxsystems.in")
                {
//                   $link = "http://dev.vinformaxsystems.in/staffingspot/index.php?username=$to&activation=$activation";
                   $link = $root_url."index.php?username=$to&activation=$activation";
                }
                elseif($_SERVER['HTTP_HOST'] == "test.vinformaxsystems.in")
                {
//                   $link = "http://test.vinformaxsystems.in/staffingspot/index.php?username=$to&activation=$activation";
                   $link = $root_url."index.php?username=$to&activation=$activation";
                }
                 
                 $query = mysql_query("select * from  tbl_email_content where `fld_processfor`='seek_reg'");
                        $query_details = mysql_fetch_array($query);
                 
                 
                // company logo
                $logo = 'images/logo.png';
                 
                // Signup mail 
                $content = signup_email($query_details['fld_content'], $logo, $query_details['fld_footer'] , $query_details['fld_header'],  $name, $email, $link);
              
							  	
								
//		$subject = 'Register Notification | staffingspot.com';
//		$message = '<table border="0" cellpadding="0" cellspacing="0" class="allborder">
//					  <tr>
//						<td valign="top" bgcolor="#FFFFFF">
//						  <table width="100%" border="0" cellspacing="0" cellpadding="0">
//							<tr>
//							  <td bgcolor="#FFFFFF"><img src="http://dev.staffingspot.com/images/logo.png" alt="staffingspot Email Header"></td>
//							</tr>
//						  </table>  
//						  <table width="100%" height="407" border="0"  cellpadding="0" cellspacing="0">
//							<tr>
//							  <td height="407" valign="top" class="con"><p><strong>Dear  '.$email.',</strong></p>
//							  	
//								<p>Thank you for your registration at staffingspot.com</p>
//								
//								<p>For any information related to registration,kindly mail to support@staffingspot.com</p>
//								
//								<br/>
//								
//								<p>Click this link to activate your account</p> <a href="'.$link.'">Click Here</a>							
//								
//								</td>
//							</tr>
//						  </table>
//						  <table width="100%" border="0" cellspacing="0" cellpadding="0">
//							<tr>
//							  <td height="27" class="con" ><p>Regards, <br />
//							staffingspot Team, <br />							
//							chennai-600024. <br />
//							<a href="mailto:support@staffingspot.com">support@staffingspot.com</a></td>
//							</tr>
//						  </table>						  
//						</td>
//					  </tr>
//					</table>';              
//                $fromemail = "iam@thamizhselvan.info";
//		$headers = "From: staffingspot.com <".$fromemail.">\r\n".
//								"Reply-To:".$fromemail."\r\n" .
//								   "X-Mailer: PHP/" . phpversion();
//		$headers .= 'MIME-Version: 1.0' . "\r\n";
//		$headers .= 'Content-type: text/html; charset=iso-8859-1' . "\r\n";		
//                
//                
//       				mail_template_or($email, $message, $subject);
								
                } else if($chkuser !=0) {
                    echo 'Invalid';
                }
                else if($chkuser1 != 0){
                    echo 'Inactive';
                }
?>