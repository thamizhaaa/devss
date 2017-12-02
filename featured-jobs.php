<?php
session_start();
error_reporting(E_ALL ^ E_NOTICE);
@include ("config.php");
@include ("common.php");
@include("user_sessioncheck.php");

$name = $_SESSION["empuser_name"];
$id = $_SESSION['empuser_id'];

$oper = $_REQUEST["op"];

if($oper == "adddetails")
{
        //echo "fghfdghfghf";
        
        $indusType1 = $_REQUEST['indusType'];	
	$company_type1 = $_REQUEST['company_type'];
	$worker1 = $_REQUEST['worker'];
	//$country1 = $_REQUEST['country'];
       
        $company_desc1=$_REQUEST['company_desc'];
         $empid=$_REQUEST['id'];
          $address1=$_REQUEST['address'];          
           //$fphone1=$_REQUEST['phone'];       
       $city1=implode(',',$_REQUEST['city']);
       $state1=implode(',',$_REQUEST['state']);
        $type1=$_REQUEST['type'];
         $country1=$_REQUEST['country'];
        
       
        	
	
      
//	$counter = mysql_query("SELECT COUNT(*) AS id FROM tbl_employer_details where fld_empid=$id");
//	$num = mysql_fetch_array($counter);
//	$count = $num["id"];
//	
//if($count == 0){
	$uploadedfile = $_FILES['img']['tmp_name'];
	$image = $_FILES['img']['name'];
	error_reporting(0);
	$change="";	
	//define ("MAX_SIZE","200");
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
			
//			list($width1,$height1)=getimagesize($uploadedfile);
//			$newwidth1=190;
//			$newheight1=140;			
//			$tmp1=imagecreatetruecolor($newwidth1,$newheight1);	
//			imagecopyresampled($tmp1,$src,0,0,0,0,$newwidth1,$newheight1,$width1,$height1);	
//			$filename1 = "employer/logo/small/". $_FILES['img']['name'];
//			imagejpeg($tmp1,$filename1,100);
			
			
			$sql="INSERT INTO `tbl_employer_details` (`fld_empid`, `fld_employer_name`, `fld_company_type`, `fld_indusType`, `fld_dor`, `fld_city`, `fld_country`, `fld_state`,  `fld_address`,`fld_logo`, `fld_company_desc`, `fld_worker`, `fld_membership_type`) VALUES ('$empid', '$indusType1', '$company_type1', '$type1', CURRENT_TIMESTAMP, '$city1', '$country1', '$state1', '$address1','$filename', '$company_desc1', '$worker1', '')";

  
  
        $catiqry1 = mysql_query($sql);  
	if($catiqry1)
        {
           $sql= "UPDATE `tbl_employer` SET `fld_others_details`=1 where`fld_id`=$empid";           
           $res=  mysql_query($sql);
           if($res)
           {
               echo 'true';
           }
        }
	
			imagedestroy($src);
			imagedestroy($tmp);
//			imagedestroy($tmp1);
			
	}
	
	}
        else
        {
     	echo "invalid";      
        }
        

}
	

	
	
if($oper == "addinfo")
{
  
	$title = mysql_real_escape_string($_REQUEST['title']);	
       //$area = $_REQUEST['area'];
        $role = mysql_real_escape_string($_REQUEST['role']);
        $exp = mysql_real_escape_string($_REQUEST['exp']);
        $expyr1 = mysql_real_escape_string($_REQUEST['expyr1']);
         $exp1 = mysql_real_escape_string($_REQUEST['exp1']);
        $expyr = mysql_real_escape_string($_REQUEST['expyr']);
        $expiry_date = mysql_real_escape_string($_REQUEST['exp_date']);
        $jobtype = mysql_real_escape_string($_REQUEST['jobtype']);
        $tags = mysql_real_escape_string($_REQUEST['tags']);
        $ckeditor= mysql_real_escape_string($_REQUEST['ckeditor']);
        $area=mysql_real_escape_string($_REQUEST['area']);  
//        $city=implode(',',$_REQUEST['city']);
        $country=$_REQUEST['country'];
         $state=implode(',',$_REQUEST['state']);
        $city=implode(',',$_REQUEST['city']);
         $type=mysql_real_escape_string($_REQUEST['type']);
     
      $experience=$exp.','.$exp1;
        $sal=$expyr.';'.$expyr1;
      $querytext=" INSERT INTO `tbl_postjob` (`fld_id`, `fld_jobcode`, `fld_jnumber`, `fld_empid`, `fld_jobtitle`, `fld_keyskills`, `fld_experience`, `fld_description`, `fld_job_type`, `fld_industry_type`, `fld_functional_area`, `fld_role`,  `fld_postdate`,`fld_expirydate`, `fld_location`, `fld_country`, `fld_state`, `fld_gender`, `fld_requirement`, `fld_categories`, `fld_salary`, `fld_r_travel`, `fld_jlength`, `fld_contact_persion`, `fld_address`, `fld_address1`, `fld_xtras1`, `fld_createdon`, `fld_updatedon`, `fld_job_status`, `fld_delstatus`) VALUES (NULL, '', '', '$id', '$title', '$tags', '$experience', '$ckeditor', '$jobtype', '$type', '$area', '$role',  CURRENT_TIMESTAMP,'$expiry_date' , '$city', '$country', '$state',  '', '', '', '$sal', '', '', '', '',  '1', '', CURRENT_TIMESTAMP, CURRENT_TIMESTAMP,'1', '0')";
//      echo $querytext;

//$reduce = mysql_query("UPDATE tbl_package_detail SET fld_resume = (fld_resume - 1) WHERE fld_emp_id =$id");//Count the resume Download Emp login ORDERS

 $sql1 = "select fld_post from tbl_package_detail where fld_emp_id=$id";
$res = mysql_query($sql1);
$rw = mysql_fetch_assoc($res);     
 if($rw['fld_post']>0){     
$reduce1 = mysql_query("UPDATE tbl_package_detail SET fld_post = (fld_post - 1) WHERE fld_emp_id =$id");
 }else{
 $reduce1 = mysql_query("UPDATE tbl_booster_count SET postjob_used = (postjob_used - 1) WHERE emp_id =$id");
 }


//echo "UPDATE tbl_package_detail SET fld_resume = (fld_resume - 1) WHERE fld_emp_id =$id";

		$catiqry1 = mysql_query($querytext);
               if($querytext)
               {
                   echo "true";
               }
 
 }     





if($oper == "infoedit")
	{	
		$invest_infoeditid = $_REQUEST['editid'];
		$querytext="SELECT * FROM postjob where status=1 and id = $invest_infoeditid";	
                echo $querytext;
		$investinfo123 = mysql_query($querytext);
		while($investinfo=mysql_fetch_array($investinfo123,MYSQL_ASSOC))
		{
		$_SESSION['infoid'] =  $infoid = mysql_real_escape_string($investinfo['id']);
		$_SESSION['infodet'] = $infodet = mysql_real_escape_string($investinfo['jobtitle']);
		$_SESSION['img'] = $infourl = mysql_real_escape_string($investinfo['industry']);
		$_SESSION['infoquarter'] = $infodate1 = mysql_real_escape_string($investinfo['job_type']);
        $_SESSION['year'] = $infodate = mysql_real_escape_string($investinfo['expirydate']);
		}
             // echo   $_SESSION['infodet'];
             //   echo  $_SESSION['img'];
             //    echo  $_SESSION['infoquarter'];
             //   echo $_SESSION['year'];

	}
	


	



        
if($oper == "updatejob")
{	           
	// data : {title: title, city: city , type: type, area: area, role: role, exp1: exp1,exp: exp, expyr: expyr, expyr1: expyr1, tags: tags, jobtype: jobtype, updateid: updateid, ckeditor: ckeditor},

	//data : {title: title, city: city , type: type, area: area, role: role, exp1: exp1,exp: exp, expyr: expyr, expyr1: expyr1, tags: tags, jobtype: jobtype, updateid: updateid, ckeditor: ckeditor},

   
	$id = mysql_real_escape_string($_REQUEST['updateid']);
	$title = mysql_real_escape_string($_REQUEST['title']);	
	$area = $_REQUEST['area'];
	$role = mysql_real_escape_string($_REQUEST['role']);
	$exp = mysql_real_escape_string($_REQUEST['exp']);
	$expyr1 = mysql_real_escape_string($_REQUEST['expyr1']);
	$exp1 = mysql_real_escape_string($_REQUEST['exp1']);
	$expyr = mysql_real_escape_string($_REQUEST['expyr']);
	$expiry_date = mysql_real_escape_string($_REQUEST['exp_date']);
	$jobtype = mysql_real_escape_string($_REQUEST['jobtype']);

	$tags = mysql_real_escape_string($_REQUEST['tags']);

	$ckeditor = mysql_real_escape_string($_REQUEST['ckeditordesc']);


	//$ckeditor = mysql_real_escape_string($_REQUEST['ckeditor']);
	//$ckeditor =  $_REQUEST['ckeditor'];

//	$city=implode(',',$_REQUEST['city']);
	$city=implode(',',$_REQUEST['city']);
	$country=$_REQUEST['country'];
	$state=implode(',',$_REQUEST['state']);
	$type=mysql_real_escape_string($_REQUEST['type']);
	$area=mysql_real_escape_string($_REQUEST['area']);
	$experience=$exp.','.$exp1;
	$sal=$expyr.';'.$expyr1;

	$sql=" UPDATE `tbl_postjob` SET `fld_jobtitle` = '$title', `fld_keyskills` = '$tags', `fld_description` = '$ckeditor', `fld_job_type` = '$jobtype', `fld_industry_type` = '$type', `fld_functional_area` = '$area',`fld_expirydate` = '$expiry_date', `fld_role` = '$role', `fld_location` = '$city', `fld_salary` = '$sal', fld_experience = '$experience', fld_country='$country', fld_state = '$state' WHERE `tbl_postjob`.`fld_id` ='$id'";
       //echo $sql;
	$catiqry1 = mysql_query($sql);
        
 
}
 if($oper == "job_status")
{	
            
   
	$id = mysql_real_escape_string($_REQUEST['id']);
        $status=mysql_real_escape_string($_REQUEST['status']);
	
   
	$sql=" UPDATE `tbl_postjob` SET `fld_job_status` = '$status' WHERE `tbl_postjob`.`fld_id` ='$id'";
//       echo $sql;
	$catiqry1 = mysql_query($sql);
        
 


}
if($oper == "infodelete")
{	
	$deleteid = $_REQUEST['deleteid'];
	//echo $deleteid;
//	$sql="UPDATE tbl_postjob SET fld_status='2',fld_job_status='2' WHERE fld_id='$deleteid' and fld_status='1'";
	$sql="UPDATE tbl_postjob SET fld_delstatus='2' WHERE fld_id='$deleteid'";
       // echo $sql;
	$result=mysql_query($sql);	

    
	
	}
	
if($oper == 'addstate')
	{ 
    
    $state_name = explode(",", $_REQUEST['state_name']);
    foreach ($state_name as $state_name_list)
                {   
                    $subeducatqry = "SELECT Distinct fld_name FROM tbl_states where fld_country_id = ".$state_name_list." ";
                    $subeducatqry1 = mysql_query($subeducatqry);
                    while($row=mysql_fetch_array($subeducatqry1))
                    {
	
    
?>
                                
                                <option  value="<?php echo $row['fld_name'];?>" ><?php echo $row['fld_name'];?></option>
                                   
        
                            <?php  
                             } 
                             } 
                } 
        if($oper == 'addcities')
	{ 
        $city_name = explode(",", $_REQUEST['city_name']);
        foreach ($city_name as $city_name_list)
                {   
                    $subeducatqry = "SELECT Distinct fld_name FROM tbl_cities where fld_state_id = ".$city_name_list." ";
                    $subeducatqry1 = mysql_query($subeducatqry);
                    while($row=mysql_fetch_array($subeducatqry1))
                    {
                ?>
                    <option  value="<?php echo $row['fld_name'];?>" ><?php echo $row['fld_name'];?></option><?php

                    } 
                    } 
                }   
            
            
            
            if($oper == 'emp_addstate')
	{ 
    
    $state_name = explode(",", $_REQUEST['state_name']);
    foreach ($state_name as $state_name_list)
                {   
    
?>
                                
                                <option  value="<?php echo $state_name_list;?>" ><?php echo $state_name_list;?></option>
                                   
        
                            <?php  
            } 
        } 
        if($oper == 'emp_addcities')
	{ 
        $city_name = explode(",", $_REQUEST['city_name']);
        
        foreach ($city_name as $city_name_list)
                {   
                    $subeducatqry = "SELECT Distinct fld_name FROM tbl_cities where fld_state_id = ".$city_name_list." ";
                    $subeducatqry1 = mysql_query($subeducatqry);
                    while($row=mysql_fetch_array($subeducatqry1))
                    {
    ?>
                    <option  value="<?php echo $row['fld_name'];?>" ><?php echo $row['fld_name'];?></option><?php

                    } 
                }   
            } 
            
            
    ?>
