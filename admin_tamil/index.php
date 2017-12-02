<?php 
include("includes/config.php"); 
error_reporting(0);
session_start();
ob_start();

if(isset($_POST['submit']))
{
    //echo "test";exit;
//	 $usertype = $_REQUEST['user_type'];
	 $username = $_REQUEST['uname'];
	 $password = $_REQUEST['pass_word'];
	 //$ip = $_SERVER['REMOTE_ADDR'];
	 //echo $usertype;exit;
	 if($usertype != "0") {
	   
	if($username=="")
	$error .="Enter your User Name.";
	
	if($password=="")
	$error .="Enter Your Password";	

	$validation_check="";	
	if(isset($error))	
	$validation_check .= $error;
	

	if (!$validation_check){
            
        $sql = "SELECT fld_id FROM tbl_admin WHERE fld_loginid ='$username' and fld_pass ='$password'";
	//echo $sql;
	 $result = mysql_query($sql);
	
	 $row = mysql_fetch_array($result);
	 

           $count=mysql_num_rows($result);
           //echo 'gfgf'.$count;exit;
		if($count==1) 
		{

			 $_SESSION['login_admin']=$username;
                         $logadminqry = "INSERT INTO tbl_admin_lastlogin (fld_last_login_date,fld_usertype)VALUES(NOW(),'Administrator')";
                         $login_query = mysql_query($logadminqry);
                         echo $login_query;
                         echo "<script type='text/javascript'>window.location = alert(".$_SESSION['login_admin'].")</script>";
                        if($login_query)
                        {
                       
                            header("Location: admin_home.php"); /* Redirect browser */
			
                        }
                         //echo $username;exit;
//			mysql_query($logadminqry);
//                        echo "<script type='text/javascript'>window.location = alert(".$_SESSION['login_admin'].")</script>";
                        if($count==1)
                        {
                           // echo 'dfdf'.$username;exit;
                            
                           header("Location:admin_home.php"); /* Redirect browser */
                            //header("Refresh:0; url=edit_location.php");
                            

                        }
			?>
                       
			
			
	<?php	}
//		elseif($count==0) 
//		{	
//		mysql_query("INSERT INTO tbl_admin_failedlogin(fld_usertype,fld_ip)VALUES('".$usertype."','".$ip."')");	
//		$invalid =  "Invalid Username and Password *";
//		}	
	}
		else
		{	
		$validation_message = $validation_check;
		}

		//} else {
		
		//$err_usertype = "Select User Type";
		
	}

}

?>
<!DOCTYPE html>
<html class="bg-black">
    <head>
        <meta charset="UTF-8">
        <title>Administrator | Log in</title>
        <meta content='width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no' name='viewport'>
        <link href="css/bootstrap.min.css" rel="stylesheet" type="text/css" />
        <link href="//cdnjs.cloudflare.com/ajax/libs/font-awesome/4.1.0/css/font-awesome.min.css" rel="stylesheet" type="text/css" />
        <!-- Theme style -->
        <link href="css/AdminLTE.css" rel="stylesheet" type="text/css" />

        <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
        <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
        <!--[if lt IE 9]>
          <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
          <script src="https://oss.maxcdn.com/libs/respond.js/1.3.0/respond.min.js"></script>
        <![endif]-->
    </head>
    <body class="bg-black">

        <div class="form-box" id="login-box">
            <div class="header" style="text-align:left"><img src="img/favicon.png">  Administrator Login</div>
            <form action="" method="post">
            
                <div class="body bg-gray">
<!--                <div class="form-group">
				<select class="form-control" name="user_type">              
                <option value="0" <?php //if($_POST['fld_user_type']=='0'){ ?> 
                 selected="selected" <?php //} ?>> Choose User Type</option>
<option value="Administrator"<?php // if($_POST['fld_user_type']=='Administrator'){?> 
                 selected="selected" <?php// } ?>>Administrator</option>
<option value="supervisor"<?php // if($_POST['fld_user_type']=='supervisor'){?> 
                 selected="selected" <?php //} ?>>supervisor</option>
<option value="Users" <?php // if($_POST['fld_user_type']=='Users'){?> 
                 selected="selected" <?php //} ?>>Users</option>
</select><span class="help-block"></span>
                </select>
                    </div>-->
                    <div class="form-group">
                        <input type="text" name="uname" class="form-control" placeholder="User ID"/>
                    </div>
                    <div class="form-group">
                        <input type="password" name="pass_word" class="form-control" placeholder="Password"/>
                    </div>          
                   
                </div>
                <div class="footer">    
                 <font  class="help-block" style="text-align:center"><b><?php echo $invalid.$validation_message; ?></b></font>                 
                <input type="submit" class="btn bg-lg btn-warning" name="submit" value="Sign me in">
  		<input type="reset" class="btn bg-lg btn-warning" name="reset" value="Reset">                   
                    
                    <!--<p><a href="#">I forgot my password</a></p>-->                    
                    
                </div>
            </form>

            
        </div>

        <script src="//ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
        <script src="js/bootstrap.min.js" type="text/javascript"></script>
        

    </body>
</html>