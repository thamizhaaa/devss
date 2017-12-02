<?php
include('config.php');
session_start();
$user_id = $_SESSION['user_id'];
$path = "images/profilepic/";

$valid_formats = array("jpg", "png", "gif", "bmp","jpeg");
if(isset($_POST) and $_SERVER['REQUEST_METHOD'] == "POST")
{
    
$name = $_FILES['photoimg']['name'];


$uploadedfile = $_FILES['photoimg']['tmp_name'];

//echo $name;

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
	if($name)
	{
           
		$filename = stripslashes($_FILES['photoimg']['name']);
		$extension = getExtension($filename);
		$extension = strtolower($extension);
	
		if (($extension != "jpg") && ($extension != "jpeg") && ($extension != "png") && ($extension != "gif"))
		{
			echo "failed";
		}
		else
		{
			$size = $_FILES['photoimg']['size'];
	
				
			if($extension=="jpg" || $extension=="jpeg" )
			{
				$uploadedfile = $_FILES['photoimg']['tmp_name'];
				$src = imagecreatefromjpeg($uploadedfile);
	
			}
			else if($extension=="png")
			{
				$uploadedfile = $_FILES['photoimg']['tmp_name'];
				$src = imagecreatefrompng($uploadedfile);
	
			}
			else
			{
				$src = imagecreatefromgif($uploadedfile);
			}
			
			list($width,$height)=getimagesize($uploadedfile);
			
			if ($width >= 125 && $height >= 125) 
			    {
			    if($size < 200000)
				{
				
			$newwidth=125;
			$newheight=125;			
			$tmp=imagecreatetruecolor($newwidth,$newheight);	
			imagecopyresampled($tmp,$src,0,0,0,0,$newwidth,$newheight,$width,$height);	
			$filename = "images/profilepic/". $_FILES['photoimg']['name'];
			imagejpeg($tmp,$filename,100);
			
//			$newwidth1=350;
//			$newheight1=235;			
//			$tmp1=imagecreatetruecolor($newwidth1,$newheight1);	
//			imagecopyresampled($tmp1,$src,0,0,0,0,$newwidth1,$newheight1,$width,$height);	
//			$filename1 = "images/profilepic/medium/". $_FILES['photoimg']['name'];
//			imagejpeg($tmp1,$filename1,100);
//			
//			$newwidth2=190;
//			$newheight2=140;			
//			$tmp2=imagecreatetruecolor($newwidth2,$newheight2);	
//			imagecopyresampled($tmp2,$src,0,0,0,0,$newwidth2,$newheight2,$width,$height);	
//			$filename2 = "images/profilepic/small/". $_FILES['photoimg']['name'];
//			imagejpeg($tmp2,$filename2,100);
			
			if(imagejpeg($tmp,$filename,100)){	
			    
			    $sql1 = "Select * From tbl_jobseeker_details WHERE fld_js_id ='$user_id'";
			    $sql11 = mysql_query($sql1);
			    $countqry = mysql_num_rows($sql11);
			    if($countqry>=1)
				{

					$sql="UPDATE tbl_jobseeker_details SET fld_profilepic='$name' WHERE fld_js_id ='$user_id'";	
					$sq = mysql_query($sql);
					if($sq){
					    echo "1";
					}
				}
			    else
				{
					$sql1 = "Insert into tbl_jobseeker_details (fld_profilepic,fld_js_id) values ('$name','$user_id')";
					$sql11 = mysql_query($sql1);
					if($sql11){
					    echo "2";
					}
				}
			    
						
			}
				imagedestroy($src);
				imagedestroy($tmp);
//				imagedestroy($tmp1);
//				imagedestroy($tmp2);
				}
				else
				    {
			    echo "failed";
			}
		}
		else
		    {
		    echo "3";
		}
	}
}	    


			}	
?>
