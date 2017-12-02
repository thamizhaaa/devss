<?php
 error_reporting(0);
 include "reg_session.php";


		
	 $passwordvalue=$_POST['cur_pwd'];
     $password=$_POST['password'];
     $confirm_pwd=$_POST['confirm_pwd'];   
	 if(($passwordvalue != '') && ($password != '') && ($confirm_pwd != ''))
      {
	 
	  $select=mysql_query("select * from seeker_personal where mailid = '$session_emailid'"); 
      $fetch=mysql_fetch_array($select);
      $data_pwd=$fetch['pass'];

	  
	  
		  $insert=mysql_query("update seeker_personal set pass='$confirm_pwd' where mailid='$session_emailid'"); 
       $login1 .="* password changed";
	   
	  }

?>

