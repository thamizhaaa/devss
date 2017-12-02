<?php
	session_start();	
	@include("config.php");		              
	$username = $_REQUEST['name'];
	$password = $_REQUEST['pwd'];	  
 	$query = "SELECT * FROM tbl_admin where fld_loginid = '$username' and fld_password='$pass'";
	$result = mysql_query($query)or die(mysql_error());
	$num_row = mysql_num_rows($result);
		$row=mysql_fetch_array($result);
		if($num_row >= 1 ) 
		{	
			$_SESSION["user_id"] = $row["fld_id"];
			$_SESSION["user_name"] = $row["fld_name"];
			$_SESSION["user_email"] = $row["fld_email"];			
			
			echo 'true';			
			
		}
		else
		{
			echo 'false';
		}	
		
	//	if(isset($_SESSION["userid"]))
		// {
	//	header("Location:index.php");
	//	 }

?>