<?php
error_reporting(0);
session_start();

	@include("config.php");	
	@include('common.php');	
	
	$oper = $_REQUEST['op'];
        
        //$root_url  =  "http://".$_SERVER['HTTP_HOST'];
       // $root_url .= preg_replace('@/+$@', '', dirname($_SERVER['SCRIPT_NAME'])).'/';
        
	$content_email = mysql_query("select * from tbl_email_content where  fld_processfor = 'seek_forget_password'");
        $rows=mysql_fetch_assoc($content_email);
	
	
if($oper == 'forgotpasswordemail'){
    
	$email = $_REQUEST['emailfp'];
	
	$chkuser = selectsinglevalue("SELECT count(*) as retv FROM tbl_jobseeker WHERE fld_email='$email' ");
	$forgot_query = mysql_query("SELECT * FROM tbl_jobseeker WHERE fld_email='$email' ");
        $rows = mysql_fetch_assoc($forgot_query);
        $name = $rows['fld_name'];
	
        if($chkuser == 1)
		{
			
//		$to = base64_encode($email);
                $to = md5($email.time());
		
		if($_SERVER['HTTP_HOST'] == "localhost")
                {
//                   $link = "http://localhost/staffingspot/forgot_password_user.php?email=$to";
                    $link = "http://localhost/staffingspot/forgot_password_user.php?email=$to";
                }
        if($_SERVER['HTTP_HOST'] == "172.31.1.53")
                {
//                   $link = "http://172.31.1.53/staffingspot/forgot_password_user.php?email=$to";
                    $link = "http://172.31.1.53/staffingspot/forgot_password_user.php?email=$to";
                }
		if($_SERVER['HTTP_HOST'] == "172.31.1.54")
                {
//                   $link = "http://172.31.1.54/staffingspot/forgot_password_user.php?email=$to";
                    $link = "http://172.31.1.54/staffingspot/forgot_password_user.php?email=$to";
                }
		if($_SERVER['HTTP_HOST'] == "172.31.1.48")
                {
//                   $link = "http://172.31.1.48/staffingspot/forgot_password_user.php?email=$to";
                    $link = "http://172.31.1.48/staffingspot/forgot_password_user.php?email=$to";
                }

        if($_SERVER['HTTP_HOST'] == "dev.vinformaxsystems.in")
        {
//                   $link = "http://172.31.1.48/staffingspot/forgot_password_user.php?email=$to";
            $link = "http://dev.vinformaxsystems.in/staffingspot/forgot_password_user.php?email=$to";
        }

        if($_SERVER['HTTP_HOST'] == "test.vinformaxsystems.in")
        {
//                   $link = "http://172.31.1.48/staffingspot/forgot_password_user.php?email=$to";
            $link = "http://test.vinformaxsystems.in/staffingspot/forgot_password_user.php?email=$to";
        }
		 
                
                
                
        $query = mysql_query("select * from  tbl_email_content where `fld_processfor`='seek_forget_password'");
        $query_details = mysql_fetch_array($query);
                

        // company logo
        $logo = 'images/logo.png';

        // Signup mail 
//        $content = signup_email($query_details['fld_content'], $logo, 'Renu' , $email);
        $content = signup_email($query_details['fld_content'], $logo, $query_details['fld_footer'] , $query_details['fld_header'],$name, $email, $link);

                
                
                
                
//		$subject = ''.$rows['fld_header'].'';
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
//							  	<p>'.$rows['fld_content'].'</p>
//								
//								
//								<br/>
//								
//								
//								</td>
//							</tr>
//						  </table>
//						  <table width="100%" border="0" cellspacing="0" cellpadding="0">
//							<p>'.$rows['fld_footer'].'</p>
//						  </table>						  
//						</td>
//					  </tr>
//					</table>';              
//                
//                
//       				mail_template_or($email, $message, $subject);			
				
		
		echo 'Valid';

                } else if($chkuser !=1) {
                    echo 'Invalid';
                }
}


if($oper == 'forgotpassword')
	{
    
	            $pass = $_REQUEST['pass'];
	            $cpass = $_REQUEST['cpass'];
	            $emailfp = $_REQUEST['mail'];
                    

		  $query = "UPDATE `tbl_jobseeker` SET `fld_password`='$cpass' where fld_email ='$emailfp' ";
                
		  
		  
		  
	          $queryfp = mysql_query($query);	


		         if($queryfp && $emailfp)
		        {
		    	    echo "ok";	
			}
			else
			{
			    echo "not ok";
			}
	   
	}
	
	
	
if($oper == 'forgotpasswordemailemp'){
    
	$email = $_REQUEST['emailfpemp'];
	
	$chkuseremp = selectsinglevalue("SELECT count(*) as retv FROM tbl_employer WHERE fld_email='$email' ");
        $forgot_query_emp = mysql_query("SELECT * FROM tbl_employer WHERE fld_email='$email' ");
        $rows = mysql_fetch_assoc($forgot_query_emp);
        $name = $rows['fld_name'];
	
	if($chkuseremp == 1)
		{
			
//		$to = base64_encode($email);
            $to = md5($email.time());
		
		if($_SERVER['HTTP_HOST'] == "localhost")
                {
//                   $link = "http://localhost/staffingspot/forgot_password_emp.php?email=$to";
                    $link = "http://localhost/staffingspot/forgot_password_emp.php?email=$to";
                }
                if($_SERVER['HTTP_HOST'] == "172.31.1.53")
                {
//                   $link = "http://172.31.1.53/staffingspot/forgot_password_emp.php?email=$to";
                    $link = "http://localhost/staffingspot/forgot_password_user.php?email=$to";
                }
		if($_SERVER['HTTP_HOST'] == "172.31.1.54")
                {
//                   $link = "http://172.31.1.54/staffingspot/forgot_password_emp.php?email=$to";
                    $link = "http://localhost/staffingspot/forgot_password_user.php?email=$to";
                }
		if($_SERVER['HTTP_HOST'] == "172.31.1.48")
                {
//                   $link = "http://172.31.1.48/staffingspot/forgot_password_emp.php?email=$to";
                    $link = "http://localhost/staffingspot/forgot_password_user.php?email=$to";
                }

         if($_SERVER['HTTP_HOST'] == "http://dev.staffingspot.com/")
            {
//                   $link = "http://dev.staffingspot.com/index.php?username=$to&activation=$activation";
              		 $link = "http://localhost/staffingspot/index.php?username=$to&activation=$activation";
            }

        if($_SERVER['HTTP_HOST'] == "dev.vinformaxsystems.in")
            {
//                   $link = "http://dev.vinformaxsystems.in/staffingspot/index.php?username=$to&activation=$activation";
               		$link = "http://localhost/staffingspot/index.php?username=$to&activation=$activation";
            }
        if($_SERVER['HTTP_HOST'] == "test.vinformaxsystems.in")
            {
//                   $link = "http://test.vinformaxsystems.in/staffingspot/index.php?username=$to&activation=$activation";
               		$link = "http://localhost/staffingspot/index.php?username=$to&activation=$activation";
            }



                
                 $query = mysql_query("select * from  tbl_email_content where `fld_processfor`='emp_forget_password'");
        $query_details = mysql_fetch_array($query);
                

        // company logo
        $logo = 'images/logo.png';

        // Signup mail 
//        $content = signup_email($query_details['fld_content'], $logo, 'Renu' , $email);
        $content = signup_email($query_details['fld_content'], $logo, $query_details['fld_footer'] , $query_details['fld_header'],$name,  $email, $link);
                
                
                
		
//		$subject = 'Forgot Password Notification | staffingspot.com';
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
//								<p>Click this link to reset your password</p> <a href="'.$link.'">Click Here</a>
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
//                
//                
//       				mail_template_or($email, $message, $subject);			
				
		
		echo 'Valid';

                } else if($chkuseremp !=1) {
                    echo 'Invalid';
                }
}	
	
	
	
	
if($oper == 'forgotpasswordemp')
	{
    
	            $emp_pass = $_REQUEST['emppass'];
	            $emp_cpass = $_REQUEST['empcpass'];
	            $emailfp_emp = $_REQUEST['empmail'];
                    

		  $query_emp = "UPDATE `tbl_employer` SET `fld_password`='$emp_cpass' where fld_email ='$emailfp_emp' ";
                
//		  echo $query_emp;
		  
		  
	          $queryfp_emp = mysql_query($query_emp);	


		         if($queryfp_emp && $emailfp_emp)
		        {
		    	    echo "ok";	
			}
			else
			{
			    echo "not ok";
			}
	   
	}
	
	

	
	
?>