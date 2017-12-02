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
         
	$content_email = mysql_query("select * from tbl_email_content where fld_processfor = 'emp_reg'");
        $rows=mysql_fetch_assoc($content_email);
        
	//echo $activation;
	$chkuser = selectsinglevalue("SELECT count(*) as retv FROM tbl_employer WHERE fld_email='$email' and fld_emp_status=1");
	$chkuser1 = selectsinglevalue("SELECT count(*) as retv FROM tbl_employer WHERE fld_email='$email' and fld_emp_status=0");
        //echo 'aaa'.$chkuser;
	if($chkuser ==0 && $chkuser1 ==0)
		{
		$insertdata = "INSERT INTO tbl_employer(fld_name,fld_email,fld_mobile,fld_password,fld_activation_code)
		VALUES	
		('$name','$email','$mobile','$password','$activation')";		
		$result=mysql_query($insertdata);
		echo 'Valid';		
//		$to = base64_encode($email);
		$activation = base64_encode($activation);
                $to = md5($email.time());
		//$username=$to;	
		//$link = "http://staffing.thamizhselvan.info/index.php?username=$to&activation=$activation";
                 if($_SERVER['HTTP_HOST'] == "localhost")
                {
//                   $link = "http://localhost/staffingspot/index.php?empusername=$to&activation=$activation";
                     $link = $root_url."index.php?empusername=$to&activation=$activation";
                }
                elseif($_SERVER['HTTP_HOST'] == "172.31.1.53")
                {
//                    $link = "http://172.31.1.53/staffingspot/index.php?empusername=$to&activation=$activation";
                    $link = $root_url."index.php?empusername=$to&activation=$activation";
                }
                elseif($_SERVER['HTTP_HOST'] == "172.31.1.29")
                {
//                    $link = "http://172.31.1.29/staffingspot/index.php?empusername=$to&activation=$activation";
                    $link = $root_url."index.php?empusername=$to&activation=$activation";
                }

                 elseif($_SERVER['HTTP_HOST'] == "172.31.1.55")
                {
//                    $link = "http://172.31.1.55/staffingspot/index.php?empusername=$to&activation=$activation";
                     $link = $root_url."index.php?empusername=$to&activation=$activation";
                }

                 elseif($_SERVER['HTTP_HOST'] == "172.31.1.15")
                {
//                    $link = "http://172.31.1.15/staffingspot/index.php?empusername=$to&activation=$activation";
                     $link = $root_url."index.php?empusername=$to&activation=$activation";
                }

                 elseif($_SERVER['HTTP_HOST'] == "http://staffing.thamizhselvan.info/")
                {
//                   $link = "http://staffing.thamizhselvan.info/index.php?empusername=$to&activation=$activation";
                     $link = $root_url."index.php?empusername=$to&activation=$activation";
                }
                
                elseif($_SERVER['HTTP_HOST'] == "http://dev.staffingspot.com/")
                {
//                   $link = "http://dev.staffingspot.com/index.php?empusername=$to&activation=$activation";
                    $link = $root_url."index.php?empusername=$to&activation=$activation";
                }

                 elseif($_SERVER['HTTP_HOST'] == "dev.vinformaxsystems.in")
                {
//                   $link = "http://dev.vinformaxsystems.in/staffingspot/index.php?empusername=$to&activation=$activation";
                     $link = $root_url."index.php?empusername=$to&activation=$activation";
                }

                 elseif($_SERVER['HTTP_HOST'] == "test.vinformaxsystems.in")
                {
//                   $link = "http://test.vinformaxsystems.in/staffingspot/index.php?empusername=$to&activation=$activation";
                     $link = $root_url."index.php?empusername=$to&activation=$activation";
                }
                 
                $query = mysql_query("select * from  tbl_email_content where `fld_processfor`='emp_reg'");
                        $query_details = mysql_fetch_array($query);
                

        // company logo
        $logo = 'images/logo.png';

        // Signup mail 
//        $content = signup_email($query_details['fld_content'], $logo, 'Renu' , $email);
        $content = signup_email($query_details['fld_content'], $logo, $query_details['fld_footer'] , $query_details['fld_header'],  $name, $email, $link);

                
                
                
                
                
                
                //$link = "http://localhost/staffingspot/index.php?empusername=$to&activation=$activation";
//		$subject = ''.$rows['fld_header'].'';
//
//		$message = '<table border="0" cellpadding="0" cellspacing="0" class="allborder">
//					  <tr>
//						<td valign="top" bgcolor="#FFFFFF">
//						  <table width="100%" border="0" cellspacing="0" cellpadding="0">
//							<tr>
//							  <td bgcolor="#FFFFFF"><img src="images/logo.png" alt="staffingspot Email Header"></td>
//							</tr>
//						  </table>  
//						  <table width="100%" height="407" border="0"  cellpadding="0" cellspacing="0">
//							<tr>
//							  <p>Dear :'.$email.',<p>
//                                                                <p>'.$rows['fld_content'].'</p>
//								<br/>					
//								
//								</td>
//							</tr>
//						  </table>
//						  <table width="100%" border="0" cellspacing="0" cellpadding="0">
//							<tr>
//							  <p>'.$rows['fld_footer'].'</p>
//						  </table>						 
//						</td>
//					  </tr>
//					</table>';
//
//		$fromemail = "iam@thamizhselvan.info";
//		$headers = "From: staffingspot.com <".$fromemail.">\r\n".
//                "Reply-To:".$fromemail."\r\n" .
//                "X-Mailer: PHP/" . phpversion();
//		$headers .= 'MIME-Version: 1.0' . "\r\n";
//		$headers .= 'Content-type: text/html; charset=iso-8859-1' . "\r\n";		
//                mail_template_or($email, $message, $subject);			
		}	
		else if($chkuser !=0)
		{
			echo 'Invalid';
		} else if($chkuser1 !=0)
		{
			echo 'Inactive';
		}	
?>