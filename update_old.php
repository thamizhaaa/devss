<?php
session_start();
error_reporting(E_ALL ^ E_NOTICE);
@include ("config.php");
$oper = $_REQUEST["op"];
if($oper == "infoupdate")
{	
        
        //echo $indusType1;
	$indusType1 = $_REQUEST['indusType'];	
	$company_type1 = $_REQUEST['company_type'];
	$worker1 = $_REQUEST['worker'];
	$phone1 = $_REQUEST['phone'];
        $city1 = $_REQUEST['city'];
        $company_desc1=$_REQUEST['company_desc'];
        foreach($city1 as $city2)
        {
            echo $city2;
            
       
       
        
        	
	$image =$_FILES["img"]["name"];
	$uploadedfile = $_FILES['img']['tmp_name'];
	//error_reporting(0);
	$change="";	
	define ("MAX_SIZE","400");
	function getExtension($str)
	{
		$i = strrpos($str,".");
		if (!$i) { return ""; }
		$l = strlen($str) - $i;
		$ext = substr($str,$i+1,$l);
		return $ext;
	}	
	$errors=0;	
	if($image)
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
	
			if ($size > MAX_SIZE*50000)
			{
				$change='<div class="msgdiv">You have exceeded the size limit!</div> ';
				$errors=1;
			}
	
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
	
			echo $scr;
			list($width,$height)=getimagesize($uploadedfile);
	
			$newwidth=161;
			$newheight=126;
			//$newheight=($height/$width)*$newwidth;
			$tmp=imagecreatetruecolor($newwidth,$newheight);
	
			//$newwidth1=25;
			//$newheight1=($height/$width)*$newwidth1;
			//$tmp1=imagecreatetruecolor($newwidth1,$newheight1);
	
			imagecopyresampled($tmp,$src,0,0,0,0,$newwidth,$newheight,$width,$height);
	
			//imagecopyresampled($tmp1,$src,0,0,0,0,$newwidth1,$newheight1,$width,$height);
	
			$filename = "logo/". $_FILES['img']['name'];
	
			//$filename1 = "/small/". $_FILES['fupload']['name'];
	
			imagejpeg($tmp,$filename,100);
	
			//imagejpeg($tmp1,$filename1,100);
	
			imagedestroy($src);
			imagedestroy($tmp);
			//imagedestroy($tmp1);
		}
	}
	
       
      
	$counter = mysql_query("SELECT COUNT(*) AS id FROM employer where id=1");
	$num = mysql_fetch_array($counter);
	$count = $num["id"];	
        echo $indusType1; 
       echo $company_type1;
	if($count >= 1)
	{
            if(isset($_FILES["img"]["name"]))
	{
           
	$sql="UPDATE employer SET employerName='$indusType1', company_type='$company_type1', worker='$worker1',phone='$phone1',company_desc='$company_desc1',logo='$filename',city='$city2' WHERE id=1";
        $catiqry1 = mysql_query($sql);        
	echo "UPDATE employer SET indusType='$indusType1', company_type='$company_type1', worker='$worker1',phone='$phone1',company_desc='$company_desc1',logo='$filename',city='$city2' WHERE id=1";
	}
 else {
     $sql="UPDATE employer SET employerName='$indusType1', company_type='$company_type1', worker='$worker1',phone='$phone1',company_desc='$company_desc1',city='$city2' WHERE id=1";
        $catiqry1 = mysql_query($sql);    
     
 }
        }
//	
	
}
}



	
?>
