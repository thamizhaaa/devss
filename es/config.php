<?php
ini_set('display_errors', 0);
//error_reporting(0);
 
@session_start();
date_default_timezone_set("Asia/Calcutta");
$varAdminFolder = "manage";
$_SESSION['lang'] = 'french';
define("DS", DIRECTORY_SEPARATOR);
 
define("PATH_ROOT", dirname(__FILE__));
 
define("PATH_LIB", PATH_ROOT . DS . "library" . DS);
 
define("PATH_ADMIN", PATH_ROOT . DS . $varAdminFolder . DS);
 
define("PATH_ADMIN_MODULE", PATH_ADMIN . "modules" . DS);
 
define("PATH_CLASS", PATH_ROOT . DS . "classes" . DS);
 
//define("PATH_CUSTOMER",PATH_ROOT.DS.$varUserFolder.DS);
 
//define("PATH_CUSTOMER_MODULE",PATH_CUSTOMER."modules".DS);
 
define("PATH_IMAGES", PATH_ROOT . DS . 'images' . DS);
 
define("PATH_UPLOAD", PATH_ROOT . DS . "uploads" . DS);
 
define("PATH_UPLOAD_USER", PATH_UPLOAD . "user" . DS);
 
define("PATH_UPLOAD_ADMIN", PATH_UPLOAD . "admin" . DS);
 
define("PATH_UPLOAD_TEAM", PATH_UPLOAD . "team" . DS);
 
define("PATH_UPLOAD_TEAM_IMAGE", PATH_UPLOAD . "teamimage" . DS);
 
define("PATH_UPLOAD_BANNER", PATH_UPLOAD . "banner" . DS);
 
define("PATH_UPLOAD_LEAGUE", PATH_UPLOAD . "league" . DS);
 
define("PATH_UPLOAD_SECTION", PATH_UPLOAD . "section" . DS);
 
require_once(PATH_LIB . "class.database.php");
 
if($_SERVER['HTTP_HOST'] == "localhost")
{
                define("URL_ROOT","http://localhost/Vintrax_new/");
                $host = "localhost";
        $user = "root";
        $pass = "";
        $dbs = "staffingspot";
        $_SESSION['host_name'] = $host;
        $_SESSION['user_name'] = $user;
        $_SESSION['pass_name'] = $pass;
        $_SESSION['db_name'] = $dbs;
        $db = new MySqlDb($host, $user, $pass, $dbs);
}
elseif($_SERVER['HTTP_HOST'] == "172.31.1.49")
{
    
                define("URL_ROOT","http://172.31.1.49/Vintrax_new/");
                $host = "localhost";
        $user = "root";
        $pass = "";
        $dbs = "vintrax_website";
        $_SESSION['host_name'] = $host;
        $_SESSION['user_name'] = $user;
        $_SESSION['pass_name'] = $pass;
        $_SESSION['db_name'] = $dbs;
        $db = new MySqlDb($host, $user, $pass, $dbs);
}
elseif($_SERVER['HTTP_HOST'] == "demo.vintrax.com")
{
                define("URL_ROOT","http://demo.vintrax.com/");
                $host = "localhost";
        $user = "root";
        $pass = "KBB5rNIVeutS";
        $dbs = "demo.areevu.com";
        $_SESSION['host_name'] = $host;
        $_SESSION['user_name'] = $user;
        $_SESSION['pass_name'] = $pass;
        $_SESSION['db_name'] = $dbs;
        $db = new MySqlDb($host, $user, $pass, $dbs);
}
elseif($_SERVER['HTTP_HOST'] == "test.vintrax.com")
{
                define("URL_ROOT","http://test.areevu.com/");
                $host = "localhost";
        $user = "root";
        $pass = "KBB5rNIVeutS";
        $dbs = "test.areevu.com";
        $_SESSION['host_name'] = $host;
        $_SESSION['user_name'] = $user;
        $_SESSION['pass_name'] = $pass;
        $_SESSION['db_name'] = $dbs;
        $db = new MySqlDb($host, $user, $pass, $dbs);
}
elseif($_SERVER['HTTP_HOST'] == "vinsparx.areevu.com")
{
                define("URL_ROOT","http://vinsparx.areevu.com/");
                $host = "localhost";
        $user = "root";
        $pass = "KBB5rNIVeutS";
        $dbs = "vinsparx.areevu.com";
        $_SESSION['host_name'] = $host;
        $_SESSION['user_name'] = $user;
        $_SESSION['pass_name'] = $pass;
        $_SESSION['db_name'] = $dbs;
        $db = new MySqlDb($host, $user, $pass, $dbs);
}
elseif($_SERVER['HTTP_HOST'] == "areevu.com")
{
                define("URL_ROOT","http://www.areevu.com/");
                $host = "localhost";
        $user = "root";
        $pass = "KBB5rNIVeutS";
        $dbs = "www.areevu.com";
        $_SESSION['host_name'] = $host;
        $_SESSION['user_name'] = $user;
        $_SESSION['pass_name'] = $pass;
        $_SESSION['db_name'] = $dbs;
        $db = new MySqlDb($host, $user, $pass, $dbs);
}
elseif($_SERVER['HTTP_HOST'] == "219.91.219.202:8085")
{
    
                define("URL_ROOT","http://219.91.219.202:8085/Areevu/");
                $host = "localhost";
        $user = "root";
        $pass = "";
        $dbs = "areevu";
        $_SESSION['host_name'] = $host;
        $_SESSION['user_name'] = $user;
        $_SESSION['pass_name'] = $pass;
        $_SESSION['db_name'] = $dbs;
        $db = new MySqlDb($host, $user, $pass, $dbs);
}
 
define("URL_CSS",URL_ROOT."css/");
 
define("URL_JS",URL_ROOT."js/");
 
define("URL_IMG",URL_ROOT."img/");
 
define("URL_UPLOADS",URL_ROOT."uploads/");
 
define("URL_ADMIN",URL_ROOT."admin/");
 
define("URL_ADMIN_HOME",URL_ADMIN."index.php");
 
define("URL_ADMIN_CSS",URL_ADMIN."css/");
 
define("URL_ADMIN_JS",URL_ADMIN."js/");
 
define("URL_ADMIN_IMG",URL_ADMIN."img/");
 
define("URL_ADMIN_UPLOADS",URL_ADMIN."uploads/");
 
define("SELF", basename($_SERVER['PHP_SELF']));
 
define("DATE_FORMAT", "d/m/Y");
 
//global variables
 
$_pswd_len = array(
    'min' => 6,
    'max' => 30 //put 0 for unlimited
);
 
//define RegX expressions
define("REGX_MAIL", "/^[_a-z0-9-]+(\.[_a-z0-9-]+)*@[a-z0-9-]+(\.[a-z0-9-]+)*(\.[a-z]{2,3})$/");
 
define("REGX_URL", "/^(http(s)?\:\/\/(?:www\.)?[a-zA-Z0-9]+(?:(?:\-|_)[a-zA-Z0-9]+)*(?:\.[a-zA-Z0-9]+(?:(?:\-|_)[a-zA-Z0-9]+)*)*\.[a-zA-Z]{2,4}(?:\/)?)$/i");
 
define("REGX_PHONE", "/^[0-9\+][0-9\-\(\)\s]+[0-9]$/");
 
define("REGX_PRICE", "/^[0-9\.]+$/");
//$recPg=20; //records per page
 
require_once(PATH_LIB . "functions.php");
 
require_once(PATH_LIB . "validations.php");
 
$alert_err = array();
 
$alert_msg = array();
 
$EmailtypeAry = array(
    '1' => 'Staff Registered Successfully',
    '2' => 'Forgot Password Notification',
    '3' => 'Register User From Front',
    '13' => 'Contact Us User ',
    '14' => 'Contact Us Admin'
);
$statusAry = array(
    '1' => 'Active',
    '0' => 'Inactive'
);
$statusAry1 = array(
    '1' => 'Available',
    '2' => 'Out of Stock'
);
define("ADMIN_TITLE", "Shopungar Admin - Dashboard");
define("CURRENCY_SYMBOL", "&pound;");
define("REGARDS", "Shopungar");
define("CURRENCY_CODE", "GBP");
define("COPY_RIGHT", "Copyright  2014 . Powered By Empower | All rights reserved .");
 
$admin_data = $db->getRow("SELECT * FROM admin_panel WHERE admin_panel_Id=1");
 
// if((!isset($_GET['code'])) || (!isset($_GET['user_id'])))
//            {
//   include_once "googleplus-source/google-plus-access.php";
//}
 
 
if ((isset($_SESSION['User_Profile_Email'])) || (isset($_SESSION['User_Profile_Id']))) {
    if (isset($_SESSION['facebook'])) {
 
 
        $users = $db->getRow("SELECT * FROM user_profile_facebook WHERE id='" . $_SESSION['User_Profile_Id'] . "' and  User_Profile_Facebook_Email='" . $_SESSION['User_Profile_Email'] . "' and is_status=1 and is_deleted=1 ");
 
 
        if (count($users['id']) == 0) {
            session_destroy();
            redirect("index.php");
        } else {
            if (count($users['id']) != 0) {
 
 
                $users['User_Profile_Name'] = $users['name'];
                $users['User_Profile_Email'] = $_SESSION['User_Profile_Email'];
                $users['User_Profile_Id'] = $_SESSION['User_Profile_Id'];
            }
        }
    } elseif (isset($_SESSION['twitter'])) {
 
 
 
        $aryCheckUsername = $db->getRow("SELECT * FROM user_profile_twitter WHERE name ='" . $_SESSION['User_Profile_Name'] . "'");
 
 
 
 
        if (count($aryCheckUsername) > 0) {
 
            $_SESSION['User_Profile_Name'] = $aryCheckUsername['name'];
            $_SESSION['User_Profile_Id'] = $aryCheckUsername['id'];
            $_SESSION['twitter_details'] = $aryCheckUsername['name'] . "_" . $aryCheckUsername['id'];
        } else {
 
 
 
            $aryData1 = array(
                'id' => $_SESSION['User_Profile_Id'],
                'name' => $_SESSION['User_Profile_Name'],
                'img' => $_SESSION['image'],
                'location' => $_SESSION['location'],
                'content_data' => $_SESSION['twitter'],
                'is_status' => 1,
                'is_deleted' => 1
            );
 
 
            $flgIn = $db->insertAry("user_profile_twitter", $aryData1);
        }
 
 
        $users = $db->getRow("SELECT * FROM user_profile_twitter WHERE id='" . $_SESSION['User_Profile_Id'] . "' and is_status=1 and is_deleted=1 ");
 
        if (count($users['id']) == 0) {
            session_destroy();
            redirect("index.php");
        } else {
            if (count($users['id']) != 0) {
                $users['User_Profile_Name'] = $_SESSION['User_Profile_Name'];
                $users['User_Profile_Image'] = $_SESSION['image'];
                $users['User_Profile_Id'] = $_SESSION['User_Profile_Id'];
            }
        }
    } elseif (isset($_SESSION['linkedin'])) {
 
        $_SESSION['User_Profile_Id'] = $_SESSION['user_id'];
        $_SESSION['User_Profile_Email'] = $_SESSION['email'];
        $_SESSION['User_Profile_Name'] = $_SESSION['first_name'] . " " . $_SESSION['last_name'];
//$_SESSION['image']=$_SESSION['pic_url'];
 
        $aryCheckUsername = $db->getRow("SELECT * FROM user_profile_linkedin WHERE email ='" . $_SESSION['User_Profile_Email'] . "'and id='" . $_SESSION['User_Profile_Id'] . "'");
        if (count($aryCheckUsername) > 0) {
            
        } else {
 
            $aryData1 = array(
                'id' => $_SESSION['User_Profile_Id'],
                'name' => $_SESSION['User_Profile_Name'],
                'img' => $_SESSION['image'],
                'email' => $_SESSION['User_Profile_Email'],
                'is_status' => 1,
                'is_deleted' => 1
            );
 
 
            $flgIn = $db->insertAry("user_profile_linkedin", $aryData1);
        }
 
 
        $users = $db->getRow("SELECT * FROM user_profile_linkedin WHERE email ='" . $_SESSION['User_Profile_Email'] . "'and id='" . $_SESSION['User_Profile_Id'] . "' and is_status=1 and is_deleted=1 ");
 
        if (count($users['id']) == 0) {
            session_destroy();
            redirect("index.php");
        } else {
            if (count($users['id']) != 0) {
                $users['User_Profile_Name'] = $_SESSION['User_Profile_Name'];
                $users['User_Profile_Image'] = $_SESSION['image'];
                $users['User_Profile_Id'] = $_SESSION['User_Profile_Id'];
                $users['User_Profile_Email'] = $_SESSION['User_Profile_Email'];
            }
        }
    } elseif (isset($_SESSION['google'])) {
 
 
 
        $aryCheckEmail = $db->getRows("SELECT User_Profile_Google_Email FROM user_profile_gmail WHERE User_Profile_Google_Email ='" . $_SESSION['User_Profile_Email'] . "'");
 
        $user = explode("@gmail.com", $_SESSION['User_Profile_Email']);
        $_SESSION['User_Profile_Name'] = $user[0];
 
        if (count($aryCheckEmail) == 0) {
 
 
            $aryData1 = array(
                'id' => $_SESSION['User_Profile_Id'],
                'username' => $user[0],
                'display_name' => $_SESSION['User_Profile_Name'],
                'User_Profile_Google_Email' => $_SESSION['User_Profile_Email'],
                'gender' => $_SESSION['gender'],
                'is_status' => 1,
                'is_deleted' => 1
            );
            $flgIn = $db->insertAry("user_profile_gmail", $aryData1);
 
 
 
            if (count($aryActivate_invite) > 0) {
                $arynewData1 = array(
                    'is_registered' => 1,
                    'date_updated' => date('Y-m-d H:i:s')
                );
                $flgUp = $db->updateAry("invite_users", $arynewData1, "where invite_id=" . $_GET['invite'] . "");
            }
 
 
 
            $subject = "Areevu-The Knowledge Portal: account confirmation\r\n";
            $headers = 'MIME-Version: 1.0' . "\r\n";
            $headers .= 'Content-type: text/html; charset=iso-8859-1' . "\r\n";
            $headers .= 'From: Areevu Administrator<admin@areevu.com> ' . '' . "\r\n";
            $body = "<p> Hi , </p>";
            $body .= "<p>Congratulations your account in 'Areevu-The Knowledge Portal'
                has been created.<p>";
 
            $body .= "<p>In most mail programs, this should appear as a blue link
                which you can just click on. If that doesn't work,
                then cut and paste the address into the address
                line at the top of your web browser window.
                </p><p>
                If you require any help, please contact our administrator <a href='mailto:admin@areevu.com'>admin@areevu.com </a>,
                </p>";
            $body .= "<p><p>";
            $body .= "<p>Thanks & Regard<p>";
            $body .= "<p>Areevu team<p>";
 
            $to = $_SESSION['User_Profile_Email'];
            $check = mail_template_or($to, $body, $subject);
 
            //header("Location: dashboard.php");
        }
 
 
        $users = $db->getRow("SELECT * FROM user_profile_gmail WHERE id='" . $_SESSION['User_Profile_Id'] . "' and  username='" . $_SESSION['User_Profile_Name'] . "' and User_Profile_Google_Email='" . $_SESSION['User_Profile_Email'] . "' and is_status=1 and is_deleted=1 ");
 
 
 
        if (count($users['id']) == 0) {
            session_destroy();
            redirect("index.php");
        } else {
            if (count($users['id']) != 0) {
 
 
                $users['User_Profile_Name'] = $_SESSION['User_Profile_Name'];
                //$users['User_Profile_Image']=$_SESSION['image'];
                $users['User_Profile_Id'] = $_SESSION['User_Profile_Id'];
            }
        }
    } else {
        $users = $db->getRow("SELECT * FROM user_profile WHERE User_Profile_Email='" . trim($_SESSION['User_Profile_Email']) . "' and User_Profile_Status=1 and Is_Deleted=1 and Is_Activated=1");
 
        if (count($users['User_Profile_Id']) == 0) {
            session_destroy();
            redirect("index.php");
        } else {
        //print_r($_SESSION);
            if (isset($users_facebook['id']) && count($users_facebook['id']) != 0) {
                
                $users['User_Profile_Name'] = $users['name'];
                $users['User_Profile_Email'] = $_SESSION['User_Profile_Email'];
                $users['User_Profile_Id'] = $_SESSION['User_Profile_Id'];
            }
        }
    }
}
 
//get array previous index value.
function get_prev($array, $key) {
    $currentKey = key($array);
    while ($currentKey !== null && $currentKey != $key) {
        next($array);
        $currentKey = key($array);
    }
    return prev($array);
}
 
//get array next index value.
function get_next($array, $key) {
    $currentKey = key($array);
    while ($currentKey !== null && $currentKey != $key) {
        next($array);
        $currentKey = key($array);
    }
    return next($array);
}
 
//check array end value.
function check_end($array, $key) {
    $endindex = end($array); // move the internal pointer to the end of the array
    $endindexKey = key($array);
    if ($key == $endindexKey)
        return TRUE;
    else
        return FALSE;
} 
 
 
$topic = explode("/", $_SERVER['PHP_SELF']);
 
if(isset($_SESSION['Module']))
{$module_id=implode(",",$_SESSION['Module']);
//echo $module_id;
$modules=$db->getRows("Select module_name,module_page,module_icon from modules where id IN(".$module_id.")");
}
?>
