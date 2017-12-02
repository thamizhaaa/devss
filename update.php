<?php
session_start();
error_reporting(0);
//error_reporting(E_ALL ^ E_NOTICE);
@include ("config.php");
include ("common.php");
$oper = $_REQUEST["op"];

$name = $_SESSION["empuser_name"];
$id = $_SESSION['empuser_id'];
$user_id = $_SESSION['user_id'];

$jobalertmail = base64_decode($_GET['jobalertmail']);

if($oper == 'updatepassword')
  {
                    
        $empid = $id;
        $currentpass = $_POST['current_pass'];
        $newpass = $_POST['new_pass'];
        $confirmpass = $_POST['confirm_pass'];

        $query = "UPDATE tbl_employer SET fld_password='$confirmpass' WHERE fld_id =$empid";
        
      $catiqry1 = mysql_query($query);  


        if($catiqry1)
        {
          echo "1"; 
      }
      else
      {
      echo "2";
      }
  } 



if($oper == "infoupdate")
{ 
        
        //echo $indusType1;
	$indusType1 = mysql_real_escape_string($_REQUEST['indusType']); 
	$company_type1 = mysql_real_escape_string($_REQUEST['company_type']);
	$worker1 = mysql_real_escape_string($_REQUEST['worker']);
	$phone1 = mysql_real_escape_string($_REQUEST['phone']);
	$address = mysql_real_escape_string($_REQUEST['address']);
//	$image1 = $_REQUEST['image'];
	
        $company_desc1 = mysql_real_escape_string($_REQUEST['company_desc']);
        $id1=$_REQUEST['id'];
       
        $city1=implode(',',$_REQUEST['city']);
        $state1=implode(',',$_REQUEST['state']);
        $country1=mysql_real_escape_string($_REQUEST['country']);
        $type=mysql_real_escape_string($_REQUEST['type']);
       
//	$counter = mysql_query("SELECT COUNT(*) AS id FROM tbl_employer_details where fld_empid=$id");
//	$num = mysql_fetch_array($counter);
//	$count = $num["id"];  
	
//if($count >= 1){
    
	$uploadedfile = $_FILES['img']['tmp_name'];
	$image = $_FILES['img']['name'];
	error_reporting(0);
	$change="";	
	define ("MAX_SIZE","200");
	function getExtension($str)
	{
		$i = strrpos($str,".");
		if (!$i) { return ""; }
		$l = strlen($str) - $i;
		$ext = substr($str,$i+1,$l);
		return $ext;
	}	
	$errors=0;	
	if($image!='')
	{
           
		$filename = stripslashes($_FILES['img']['name']);
		$extension = getExtension($filename);
		$extension = strtolower($extension);
	
		if (($extension != "jpg") && ($extension != "jpeg") && ($extension != "png") && ($extension != "gif"))
		{
			$change='<div class="msgdiv">Unknown Image extension </div> ';
			$errors=1;
		}
		else
		{
			$size=filesize($_FILES['img']['tmp_name']);
	
			
	
			if($extension=="jpg" || $extension=="jpeg" )
			{
				$uploadedfile = $_FILES['img']['tmp_name'];
				$src = imagecreatefromjpeg($uploadedfile);
	
			}
			else if($extension=="png")
			{
				$uploadedfile = $_FILES['img']['tmp_name'];
				$src = imagecreatefrompng($uploadedfile);
	
			}
			else
			{
				$src = imagecreatefromgif($uploadedfile);
			}
			
			list($width,$height)=getimagesize($uploadedfile);	
			$newwidth=190;
			$newheight=190;			
			$tmp=imagecreatetruecolor($newwidth,$newheight);	
			imagecopyresampled($tmp,$src,0,0,0,0,$newwidth,$newheight,$width,$height);	
			$filename = "employer/logo/". $_FILES['img']['name'];
			imagejpeg($tmp,$filename,100);
			
			
$sql="UPDATE tbl_employer_details SET fld_employer_name='$indusType1', fld_company_type='$company_type1', fld_worker='$worker1',fld_indusType='$type',fld_company_desc='$company_desc1',fld_logo='$filename',fld_city='$city1',fld_country='$country1',fld_state='$state1',fld_address='$address' WHERE fld_empid='$id'";

  $sql_mob="UPDATE tbl_employer SET fld_mobile='$phone1' WHERE fld_id='$id'";
        $catiqry1 = mysql_query($sql);        
        $catiqry_mob = mysql_query($sql_mob); 
	
			imagedestroy($src);
			imagedestroy($tmp);
			
		}
	}
//} 
 else {
      $sql="UPDATE tbl_employer_details SET fld_employer_name='$indusType1', fld_company_type='$company_type1', fld_worker='$worker1',fld_indusType='$type',fld_company_desc='$company_desc1',fld_city='$city1',fld_country='$country1',fld_state='$state1',fld_address='$address' WHERE fld_empid='$id'";
      
        $sql_mob="UPDATE tbl_employer SET fld_mobile='$phone1' WHERE fld_id='$id'";
        $catiqry_mob = mysql_query($sql_mob);     
      $catiqry1 = mysql_query($sql);    
  
  
      }
}


if($oper == 'view')
      {
echo "0".$sql1 = "select fld_no_of_views,fld_resume from tbl_package_detail where fld_emp_id=$id";
$res = mysql_query($sql1);
$rw = mysql_fetch_assoc($res);
  
    if($rw['fld_no_of_views']>0)
    {
    echo "1".$update_view= "UPDATE tbl_package_detail SET fld_no_of_views = (fld_no_of_views - 1) WHERE fld_emp_id =$id";
    $update_v = mysql_query($update_view);  
    }
 else
    { 
      echo "2".$update_view= "UPDATE tbl_booster_count SET view_used = (view_used - 1) WHERE emp_id =$id";
      $update_v = mysql_query($update_view);    
    }
}

  
  if($oper == 'download')
      {
echo "a".$sql1 = "select fld_no_of_views,fld_resume from tbl_package_detail where fld_emp_id=$id";
$res = mysql_query($sql1);
$rw = mysql_fetch_assoc($res);
if($rw['fld_resume']>0){
    echo "b";
$update_download= mysql_query("UPDATE tbl_package_detail SET fld_resume = (fld_resume - 1) WHERE fld_emp_id =$id");
$update_d = mysql_query($update_download);  
        } else {
            echo "c";
 $update_download= mysql_query("UPDATE tbl_booster_count SET resume_download_used = (resume_download_used - 1) WHERE emp_id =$id");
$update_d = mysql_query($update_download);  
      }
        }
  
  
  
?>
<?php 
    if(isset($jobalertmail))
        {
  
        $email_active = $jobalertmail;   
        //echo $email_active;
  
        $code=mysql_query("SELECT fld_jobalert_id,job_seeker_id,fld_skill FROM tbl_jobalert WHERE fld_email='$email_active' and fld_status_active=0");
       // echo mysql_num_rows($code);
        //echo "SELECT fld_jobalert_id,job_seeker_id,fld_skill FROM tbl_jobalert WHERE fld_email='$email_active' and fld_status_active=0";
       //echo  mysql_num_rows($code);
        if(mysql_num_rows($code) > 0)
        {
  
        $count=mysql_query("SELECT fld_jobalert_id,job_seeker_id,fld_skill FROM tbl_jobalert WHERE fld_email='$email_active' and fld_status_active=0");
  
        if(mysql_num_rows($code) == 1)
        {
        mysql_query("UPDATE tbl_jobalert SET fld_status_active='1' WHERE fld_email='$email_active'");
  
  
  
  
      $skills = "SELECT `fld_skill` FROM `tbl_jobalert` WHERE fld_email='$email_active' and `job_seeker_id` ='.$user_id.' and fld_status_active = 1";
     $skills1 = mysql_query($skills);
       $num = mysql_fetch_array($skills1);
          // $skillvals = $num['fld_skill'];
      $ex = explode(',',$num['fld_skill']);
       
                $countskills = count($ex);
      
                 foreach ($ex as $key => $value321) {
                    if($countskills > 1)
  {
                    $skillvals1 .= "fld_keyskills LIKE '%$value321%'"." OR ";
                    $skillvals = substr($skillvals1, 0, -3);
           
                    }else{
                         $skillvals .= "fld_keyskills LIKE '%$value321%'"; 
  }
                }
     
$alertjob = mysql_query("select fld_id,fld_jobtitle,fld_keyskills,fld_postdate from tbl_postjob where ($skillvals) and fld_postdate <= DATE_ADD(CURDATE(), INTERVAL -10 DAY) ORDER BY `fld_postdate` DESC
LIMIT 5");
//echo $alertjob;
                        $subject = 'Job Alert Notification | staffingspot.com';
                        $body .= "<table class='TFtable' border='1' style='width':150%>"; //starts the table tag
                        $body .= "<tr><td><b>Title</b></td><td><b>Post date</b></td><td><b>Keyskills</b></td></tr>"; //sets headings
                        while($row=mysql_fetch_assoc($alertjob)){ //loops for each result
                        $body .= "<tr><td>".$title= $row['fld_jobtitle']."</td><td>".$date = $row['fld_postdate']."</td><td>".$keyskils = $row['fld_keyskills']. "</td>";
 }
                        $body .= "</table>"; 
                        $message = '<table border="0" cellpadding="0" cellspacing="0" class="allborder">
        
  

                        <tr>
                        <td valign="top" bgcolor="#FFFFFF">
                          <table width="100%" border="0" cellspacing="0" cellpadding="0">
                                <tr>
                                  <td bgcolor="#FFFFFF"><img src="images/logo.png" alt="staffingspot Email Header"></td>
                                </tr>
                          </table>  
                              
                          <table width="100%" height="407" border="0"  cellpadding="0" cellspacing="0">
                                <tr>
                                  <td height="407" valign="top" class="con"><p><strong>Dear: '.$email_active.',</strong></p>
                                        <p>Users created the jobs alert posted by  : '.$e_sq.'</p>
                                        <p>Email : '.$email_active.'</p>
                                        <p>Job Alert : '.$alert.'</p>
                                        <br/>
                                        
                                      
                                  </td>
                                  <td>
                                     '.$body.'
                                  </td>
                                 </tr>
                          </table>
                          
                          
                                                      
                          <table width="100%" border="0" cellspacing="0" cellpadding="0">
                                <tr>
                                  <td height="27" class="con" ><p>Regards, <br />
                                Staffingspot Team, <br />             
                                chennai-600024. <br />
                                <a href="mailto:support@staffingspot.com">support@staffingspot.com</a></td>
                                </tr>
                          </table>             
                        </td>
                        </tr>
                        <tr>
                        </tr>
                      </table>';

       

    mail_template_or($email_active, $message, $subject); 
                ?>
                        <script>
            alert("<?php echo "Job alert created successfully" ?>");
            window.location = "index.php";
                    
            </script>
        <?php 
}
}

        }


  
?>
