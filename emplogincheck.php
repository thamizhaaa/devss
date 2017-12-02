<?php
	session_start();	
	@include("config.php");		
	$username = $_REQUEST['name'];
	$password = $_REQUEST['pwd'];	  
 	$query = "SELECT * FROM tbl_employer where fld_email = '$username' and fld_password='$password' and fld_emp_status =1 and fld_delstatus=0 ";
//        echo $query;
	$result = mysql_query($query)or die(mysql_error());
	$num_row = mysql_num_rows($result);
		$row=mysql_fetch_array($result);
            $id = $row['fld_others_details'];
//            echo $id;
            if($num_row >= 1 ) 
            {
               if($id==1)
             {
		
			$_SESSION["empuser_id"] = $row["fld_id"];
			$_SESSION["empuser_name"] = $row["fld_name"];
			$_SESSION["empuser_email"] = $row["fld_email"];
                        $_SESSION["emp_other_details"] = $row["fld_others_details"];
                        
			
			
			$date = date('y-m-d');
			$useralreadyexists = "SELECT * FROM tbl_unique_visitors_emp where fld_created_date=CURDATE() AND fld_userid =".$_SESSION['empuser_id']."";
			
			$result1 = mysql_query($useralreadyexists);
			$num_row1 = mysql_num_rows($result1);	
			if($num_row1==0){
			    
			$visit = mysql_query("INSERT INTO tbl_unique_visitors_emp(fld_userid,fld_visitorsip,fld_created_date)VALUES('".$_SESSION["empuser_id"]."','".$_SERVER['REMOTE_ADDR']."','".$date."')");
			}
			
			echo 'true';			
  			
		}
		
               else if($id==0)
               {
			
			$_SESSION["empuser_id"] = $row["fld_id"];
			$_SESSION["empuser_name"] = $row["fld_name"];
			$_SESSION["empuser_email"] = $row["fld_email"];
                        $_SESSION["emp_other_details"] = $row["fld_others_details"];
			
			
			$date = date('y-m-d');
			$useralreadyexists = "SELECT * FROM tbl_unique_visitors_emp where fld_created_date=CURDATE() AND fld_userid =".$_SESSION['empuser_id']."";
			
			$result1 = mysql_query($useralreadyexists);
			$num_row1 = mysql_num_rows($result1);	
			if($num_row1==0){
			    
			$visit = mysql_query("INSERT INTO tbl_unique_visitors_emp(fld_userid,fld_visitorsip,fld_created_date)VALUES('".$_SESSION["empuser_id"]."','".$_SERVER['REMOTE_ADDR']."','".$date."')");
			}
			
			echo 'nodetail';			
			
		}
		else 
		{
			echo 'false';
		}
    }
                
		
	//	if(isset($_SESSION["userid"]))
		// {
	//	header("Location:index.php");
	//	 }

?>