<?php
	session_start();	
	@include("config.php");		
	$username = $_REQUEST['name'];
	$password = $_REQUEST['pwd'];	  
 	$query = "SELECT * FROM tbl_jobseeker where fld_email = '$username' and fld_password='$password' and fld_js_status =1 and fld_delstatus=0";
	$result = mysql_query($query)or die(mysql_error());
	$num_row = mysql_num_rows($result);
		$row=mysql_fetch_array($result);
//                print_r($row);exit;
		if($num_row >= 1 ) 
		{	
			$_SESSION["user_id"] = $row["fld_id"];
			$_SESSION["user_name"] = $row["fld_name"];
			$_SESSION["user_email"] = $row["fld_email"];			
			
			
			
			$date = date('y-m-d');
			$useralreadyexists = "SELECT fld_userid,fld_created_date FROM tbl_unique_visitors_user where fld_created_date=CURDATE() AND fld_userid=".$_SESSION['user_id']." ";
			
			$result1 = mysql_query($useralreadyexists);			
			
			$num_row1 = mysql_num_rows($result1);	
			
			if($num_row1==0){			    
			$visit = mysql_query("INSERT INTO tbl_unique_visitors_user(fld_userid,fld_visitorsip,fld_created_date)VALUES('".$_SESSION["user_id"]."','".$_SERVER['REMOTE_ADDR']."','".$date."')");
		}
			
			echo 'true';	
		}
		else
		{
			echo 'false';
		}	
		
?>