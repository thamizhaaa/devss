<?php
error_reporting(E_ALL ^ E_NOTICE);
error_reporting(0);
session_start();
include("config.php");

@include('common.php');
@include("user_sessioncheck.php");

//$username = $_SESSION["user_name"];
//$user_email = $_SESSION['user_email']; 
$user_id = $_SESSION['user_id'];
//
//$empusername = $_SESSION["empuser_name"];
//$empuser_email = $_SESSION['empuser_email']; 
$empuser_id = $_SESSION['empuser_id'];
$action = $_REQUEST['action'];
switch ($action) {
    case "facebookseeker": {

            //echo $fbid = $_POST['id'];
//           echo  $user_name = $_POST['name'];
//           echo $user_id = $_POST['email'];
//           echo $link = $_POST['link'];

       $fbid = $_REQUEST['id'];
       $fbname = $_REQUEST['name'];
       $fbemail = $_REQUEST['email'];
       $fbbirthday = $_REQUEST['birthday'];
       //echo 'select * from  `tbl_jobseeker` where fld_email="'.$fbemail.'" and fld_js_status=1 and fld_delstatus = 0';       
       $query = 'select fld_id from `tbl_jobseeker` where fld_email="'.$fbemail.'" and fld_js_status=1 and fld_delstatus = 0';
       $result = mysql_query($query);
       $rowvalues = mysql_fetch_assoc($result);
       //print_r($rowvalues);
       $useriddd = $rowvalues['fld_id'];
       $num_row = mysql_num_rows($result);             

	if($num_row > 0) {
                     //   $_SESSION["user_id"] = $row["fld_id"];
			$_SESSION["login_fb_name"] = $fbname;
			$_SESSION["login_fb_email"] = $fbemail;			
      $_SESSION["login_fb_login_id"] = $useriddd;
      $_SESSION['user_id'] = $useriddd;
      $_SESSION['user_bday'] = $fbbirthday;
      //$fbbirthday
			
//		header("Location:index.php?fbmailid='".$fbemail."'");
	} else {
        
          
 //data: "action=facebook&id=" + response.id + "&name=" + response.name + "&birthday=" + response.birthday + "&email=" + response.email + "&first_name=" + response.first_name + "&gender=" + response.gender + "&last_name=" + response.last_name + "&link=" + response.link + "&locale=" + response.locale + "&timezone=" + response.timezone + "&updated_time=" + response.updated_time + "&verified=" + response.verified,
 //
 //

//INSERT INTO `tbl_jobseeker`(`fld_id`, `fld_name`, `fld_email`, `fld_mobile`, `fld_password`, `fld_activation_code`, `fld_followers`, `fld_js_status`, `fld_delstatus`) VALUES ([value-1],[value-2],[value-3],[value-4],[value-5],[value-6],[value-7],[value-8],[value-9])
            $sql = "insert into tbl_jobseeker (`fld_name`,`fld_email`, `fld_password`,`fld_mobile`,`fld_js_status`) values ('$fbname','$fbemail','','','1')";
           // echo "insert into tbl_jobseeker (`fld_name`,`fld_email`, `fld_password`,`fld_mobile`,`fld_js_status`) values ('$fbname','$fbemail','','','1')";;exit;
            $result = mysql_query($sql);

            $query = 'select fld_id from `tbl_jobseeker` where fld_email="'.$fbemail.'" and fld_js_status=1 and fld_delstatus = 0';
            $result = mysql_query($query);
            $rowvalues = mysql_fetch_assoc($result);
            //print_r($rowvalues);
            $useriddd = $rowvalues['fld_id'];
            $num_row = mysql_num_rows($result); 
                	
     //echo "Login Success";
            
            $_SESSION['login_fb_email'] = $fbemail;
            $_SESSION["login_fb_name"] = $fbname;
            $_SESSION["login_fb_login_id"] = $useriddd;
            $_SESSION['user_id'] = $useriddd;
            $_SESSION['user_bday'] = $fbbirthday;

//                if ($result) {
//                    $last_insert_id = mysql_insert_id($result);
//                    $_SESSION['login_user'] = $user_name;
//                    $_SESSION['login_fb_email'] = $fbemail;
//                    $_SESSION['login_id'] = $last_insert_id;
//                    $_SESSION['error_msg'] = "Login Success";
//                    //echo "Login Success";
//                }
        }
                break;
            
        }
    case "facebookemp": {
       $fbid = $_REQUEST['id'];
       $fbname = $_REQUEST['name'];
       $fbemail = $_REQUEST['email'];
       $fbbirthday = $_REQUEST['birthday'];
       //echo 'select * from  `tbl_jobseeker` where fld_email="'.$fbemail.'" and fld_js_status=1 and fld_delstatus = 0';       
       $query = 'select fld_id from `tbl_employer` where fld_email="'.$fbemail.'" and fld_emp_status=1 and fld_delstatus = 0';
       $result = mysql_query($query);
       $rowvalues = mysql_fetch_assoc($result);
       //print_r($rowvalues);
       $useriddd = $rowvalues['fld_id'];
       $num_row = mysql_num_rows($result);             

  if($num_row > 0) {
                     //   $_SESSION["user_id"] = $row["fld_id"];
      $_SESSION["empuser_name"] = $fbname;
      $_SESSION["empuser_email"] = $fbemail;     
      $_SESSION["empuser_id"] = $useriddd;
      $_SESSION['empuser_id'] = $useriddd;
      $_SESSION['empuser_bday'] = $fbbirthday;
      //$fbbirthday
      
//    header("Location:index.php?fbmailid='".$fbemail."'");
  } else {
        
          
 //data: "action=facebook&id=" + response.id + "&name=" + response.name + "&birthday=" + response.birthday + "&email=" + response.email + "&first_name=" + response.first_name + "&gender=" + response.gender + "&last_name=" + response.last_name + "&link=" + response.link + "&locale=" + response.locale + "&timezone=" + response.timezone + "&updated_time=" + response.updated_time + "&verified=" + response.verified,
 //
 //

//INSERT INTO `tbl_jobseeker`(`fld_id`, `fld_name`, `fld_email`, `fld_mobile`, `fld_password`, `fld_activation_code`, `fld_followers`, `fld_js_status`, `fld_delstatus`) VALUES ([value-1],[value-2],[value-3],[value-4],[value-5],[value-6],[value-7],[value-8],[value-9])
            $sql = "insert into tbl_employer (`fld_name`,`fld_email`, `fld_password`,`fld_mobile`,`fld_emp_status`) values ('$fbname','$fbemail','','','1')";
           // echo "insert into tbl_jobseeker (`fld_name`,`fld_email`, `fld_password`,`fld_mobile`,`fld_js_status`) values ('$fbname','$fbemail','','','1')";;exit;
            $result = mysql_query($sql);

            $query = 'select fld_id from `tbl_employer` where fld_email="'.$fbemail.'" and fld_emp_status=1 and fld_delstatus = 0';
            $result = mysql_query($query);
            $rowvalues = mysql_fetch_assoc($result);
            //print_r($rowvalues);
            $useriddd = $rowvalues['fld_id'];
            $num_row = mysql_num_rows($result); 
                  
     //echo "Login Success";
            
            $_SESSION["empuser_name"] = $fbname;
            $_SESSION["empuser_email"] = $fbemail;     
            $_SESSION["empuser_id"] = $useriddd;
            $_SESSION['empuser_id'] = $useriddd;
            $_SESSION['empuser_bday'] = $fbbirthday;

//                if ($result) {
//                    $last_insert_id = mysql_insert_id($result);
//                    $_SESSION['login_user'] = $user_name;
//                    $_SESSION['login_fb_email'] = $fbemail;
//                    $_SESSION['login_id'] = $last_insert_id;
//                    $_SESSION['error_msg'] = "Login Success";
//                    //echo "Login Success";
//                }
        }
                break;
    }

    case "facebook_picture": {
           $_SESSION['image'] = $_REQUEST['image'];
            break;
        }
}

?>