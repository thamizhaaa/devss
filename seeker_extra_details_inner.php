<?php
error_reporting(0);
session_start();
include ("config.php");    
include('common.php');	
$username = $_SESSION["user_name"];
$user_email = $_SESSION['user_email']; 
$user_id = $_SESSION['user_id'];

	$oper = $_REQUEST['op'];
	if($oper == 'addeducational')
	{
	    $educational = $_POST['educational1'];
	    $course = $_POST['specalization1'];
	    $college = $_POST['college1'];
	    $from = $_POST['From1'];
	    $To = $_POST['To1'];
	    $cgpa = $_POST['cgpa1'];
		$educationalqry = "INSERT INTO tbl_educationals_details(fld_educational,fld_course,fld_college,fld_from,fld_to,fld_cgpa,fld_seekerid)VALUES('".$educational."','".$course."','".$college."','".$from."','".$To."','".$cgpa."','".$user_id."')";
	    $addededucationalqry = mysql_query($educationalqry);
	    if($addededucationalqry)
	    {
	    echo "1";	
		}
		else
		{
			echo "2";
		}

	    //echo "INSERT INTO tbl_educationals_details(fld_educational,fld_course,fld_college,fld_from,fld_to,fld_cgpa)VALUES('".$educational."','".$course."','".$college."','".$from."','".$To."','".$cgpa."')";
	}
	if($oper == 'updeducational')
	{
           
		if(isset($_REQUEST['updjobdetid']))
                    
		{
                     //echo "hi";
			$updeducationid = $_REQUEST['updjobdetid'];
		    $educational = $_REQUEST['educational'];
		    $course = $_REQUEST['specalization'];
		    $college = $_REQUEST['college'];
		    $from = $_REQUEST['From'];
		    $To = $_REQUEST['To'];
		    $cgpa = $_REQUEST['cgpa'];
			//$educationalqry = "INSERT INTO tbl_educationals_details(fld_educational,fld_course,fld_college,fld_from,fld_to,fld_cgpa,fld_seekerid)VALUES('".$educational."','".$course."','".$college."','".$from."','".$To."','".$cgpa."','".$user_id."')";
		    //$addededucationalqry = mysql_query($educationalqry);

		    $queryprf = "Update tbl_educationals_details SET fld_educational='$educational',fld_course='$course',fld_college='$college',fld_from='$from',fld_to='$To' ,fld_cgpa='$cgpa' where fld_id =$updeducationid";
			$catiqry1 = mysql_query($queryprf);	


		    if($catiqry1)
		    {
		    	echo "ok";	
			}
			else
			{
				echo "notnot11";
			}
		}

	    //echo "INSERT INTO tbl_educationals_details(fld_educational,fld_course,fld_college,fld_from,fld_to,fld_cgpa)VALUES('".$educational."','".$course."','".$college."','".$from."','".$To."','".$cgpa."')";
	}

	if($oper == 'addproject')
	{
	    $ProjectTitle = $_POST['ProjectTitle'];
	    $ProjectClient = $_POST['ProjectClient'];
	    $ProjectEmpType = $_POST['ProjectEmpType'];
	    $FromProject = $_POST['FromProject'];
	    $ToProject = $_POST['ToProject'];
	    $ProjectCity = $_POST['ProjectCity'];
	    $ProjectSite = $_POST['ProjectSite'];
	    $ProjectRole = $_POST['ProjectRole'];
	    $ProjectTeamSize = $_POST['ProjectTeamSize'];
	    $ProjectSkillUsed = $_POST['ProjectSkillUsed'];
	    $ProjectRoleDescription = $_POST['ProjectRoleDescription'];
	    $ProjectDescription = $_POST['ProjectDescription'];

		$projectqry = "INSERT INTO tbl_project_details(fld_project_title,fld_client,fld_employment_type,fld_from,fld_to,fld_location,fld_site,fld_role,fld_team_size,fld_skill_used,fld_role_description,fld_project_details,fld_seekerid)VALUES('".$ProjectTitle."','".$ProjectClient."','".$ProjectEmpType."','".$FromProject."','".$ToProject."','".$ProjectCity."','".$ProjectSite."','".$ProjectRole."','".$ProjectTeamSize."','".$ProjectSkillUsed."','".$ProjectRoleDescription."','".$ProjectDescription."','".$user_id."')";

	    $addprojectqry = mysql_query($projectqry);
	    
	    if($addprojectqry)
	    {
	    echo "1";	
		}
		else
		{
			echo "2";
		}

	}
	
	if($oper == 'updateproject')
	{
           
		if(isset($_REQUEST['ProjectId']))
                    
		{
		    $ProjectId = $_REQUEST['ProjectId'];
		    $ProjectTitle = $_REQUEST['ProjectTitle'];
		    $ProjectClient = $_REQUEST['ProjectClient'];
		    $ProjectEmpType = $_REQUEST['ProjectEmpType'];
		    $FromProject = $_REQUEST['FromProject'];
		    $ToProject = $_REQUEST['ToProject'];
		    $ProjectCity = $_REQUEST['ProjectCity'];
		    $ProjectSite = $_REQUEST['ProjectSite'];
		    $ProjectRole = $_REQUEST['ProjectRole'];
		    $ProjectTeamSize = $_REQUEST['ProjectTeamSize'];
		    $ProjectSkillUsed = $_REQUEST['ProjectSkillUsed'];
		    $ProjectRoleDescription = $_REQUEST['ProjectRoleDescription'];
		    $ProjectDescription = $_REQUEST['ProjectDescription'];
			
		    $query = "Update tbl_project_details SET fld_project_title='$ProjectTitle',fld_client='$ProjectClient',fld_employment_type='$ProjectEmpType',fld_from='$FromProject',fld_to='$ToProject' ,fld_location='$ProjectCity' ,fld_site='$ProjectSite' , fld_role='$ProjectRole' , fld_team_size='$ProjectTeamSize' , fld_skill_used='$ProjectSkillUsed' , fld_role_description='$ProjectRoleDescription' , fld_project_details='$ProjectDescription' where fld_id =$ProjectId";
		    
		    
			$catiqry1 = mysql_query($query);
			


		    if($catiqry1)
		    {
		    	echo "ok";	
			}
			else
			{
				echo "notnot11";
			}
		}

	}
	if($oper == 'deleteprojectdetails')
	{
                 
		if(isset($_REQUEST['id']))
		{
                    
	            $delprojectid = $_REQUEST['id'];
                    echo sdfd.$delprojectid;

		  $queryprf = "UPDATE `tbl_project_details` SET `fld_status`=2 where fld_id =$delprojectid";
                
	          $catiqry1 = mysql_query($queryprf);	


		         if($catiqry1)
		         {
		    	    echo "ok";	
			}
			else
			{
			    echo "notnot11";
			}
		}

	   
	}
	
	if($oper == 'updatevisibilitystatus')
	{
                    
		    $userid = $user_id;
		    $status = $_REQUEST['statusval'];

		    $queryprf = "Update tbl_jobseeker SET fld_profile_visibility='$status' where fld_id =$userid";
			$catiqry1 = mysql_query($queryprf);	


		    if($catiqry1)
		    {
		    	echo "1";	
			}
			else
			{
			echo "2";
			}
	}	
	
	
	if($oper == 'updatepassword')
	{
                    
		    $userid = $user_id;
		    $currentpass = $_POST['current_pass'];
		    $newpass = $_POST['new_pass'];
		    $confirmpass = $_POST['confirm_pass'];

		    $query = "UPDATE tbl_jobseeker SET fld_password='$confirmpass' WHERE fld_id =$userid";
		    
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
	
	
	if($oper == 'addvisit')
	{
	    $skill = $_POST['skill'];
	    $city = $_POST['city'];
	    $experience = $_POST['experience'];
	    $date = date('Y-m-d H:i:s');
	    
	    $search_query = "SELECT fld_id,fld_seeker_id,fld_keywords,fld_location,fld_experience FROM tbl_job_recent_search WHERE fld_seeker_id='$user_id' and fld_keywords='$skill' and fld_location='$city' and fld_experience='$experience'";
	    $query = mysql_query($search_query);
	    
//	    echo "SELECT fld_id,fld_seeker_id,fld_keywords,fld_location,fld_experience FROM tbl_job_recent_search WHERE fld_seeker_id='$user_id' and fld_keywords='$skill' and fld_location='$city' and fld_experience='$experience' ";
	    
	    
	    $query_count = mysql_num_rows($query);
	    
	    if($query_count==0){
	    
		$projectqry = "INSERT INTO tbl_job_recent_search(fld_seeker_id,fld_keywords,fld_location,fld_experience,fld_created_date)VALUES('".$user_id."','".$skill."','".$city."','".$experience."','".$date."')";
	    
//		echo "INSERT INTO tbl_job_recent_search(fld_seeker_id,fld_keywords,fld_location,fld_experience,fld_created_date)VALUES('".$user_id."','".$skill."','".$city."','".$experience."','".$date."')";
		
	    $addprojectqry = mysql_query($projectqry);
	    
	    if($addprojectqry)
	    {
	    echo "1";	
		}
		else
		{
			echo "2";
		}

	}
	    else{
		echo "1";	
	    }
}
	
	if($oper == 'search')
	{
	    $id = $_POST['id'];
	    $searchqry = mysql_query("SELECT fld_keywords,fld_location,fld_experience FROM tbl_job_recent_search WHERE fld_id='$id' ");
	    
		while($row=mysql_fetch_array($searchqry)){
		    $skill = $row['fld_keywords'];
		    $city = $row['fld_location'];
		    $experience = $row['fld_experience'];
		    
		    $response = array('status'=>"ok",'skill'=>$skill,'city'=>$city,'experience'=>$experience);
		    echo json_encode($response);
	    }	

	}



	if($oper == 'addjobdetails')
	{
	$employer = $_POST['employer1'];
    $jbpostion = $_POST['position1'];    
    $from_month = $_POST['from1_month'];
    $from_year = $_POST['from1_year'];
    $To_month = $_POST['to1_month'];
    $To_year = $_POST['to1_year'];
    $iscurrentlyworkhere = $_POST['current1'];       
    $today = date("Y-m-d H:i:s");
      
        $seek_query = "INSERT INTO tbl_job_experience(fld_employer,fld_position,fld_from_month,fld_from_year,fld_to_month,fld_to_year,fld_current,fld_seekerid,fld_createdon)VALUES('".$employer."','".$jbpostion."','".$from_month."','".$from_year."','".$To_month."','".$To_year."','".$iscurrentlyworkhere."','".$user_id."','".$today."')";
        $seek_query1 = mysql_query($seek_query);

	    if($seek_query1)
	    {
	    echo "1";	
		}
		else
		{
		echo "2";
		}

//	    echo "INSERT INTO tbl_job_experience(fld_employer,fld_position,fld_from_month,fld_from_year,fld_to_month,fld_to_year,fld_current,fld_seekerid)VALUES('".$employer."','".$jbpostion."','".$from_month."','".$from_year."','".$To_month."','".$To_year."','".$iscurrentlyworkhere."','".$user_id."')";
	}


//


	if($oper == 'updjobdetails')
	{
		if(isset($_REQUEST['updjobdetid']))
		{
			$updjobdescid = $_REQUEST['updjobdetid'];
		    $employer = $_POST['employer'];
		    $position = $_POST['position'];
		    $currentlyworking = $_POST['currentlyworking'];
		    $from_month = $_POST['From_month'];
                    $from_year = $_POST['From_year'];
                    $To_month = $_POST['To_month'];
                    $To_year = $_POST['To_year'];	    
                    $today = date("Y-m-d H:i:s");
			//$educationalqry = "INSERT INTO tbl_educationals_details(fld_educational,fld_course,fld_college,fld_from,fld_to,fld_cgpa,fld_seekerid)VALUES('".$educational."','".$course."','".$college."','".$from."','".$To."','".$cgpa."','".$user_id."')";
		    //$addededucationalqry = mysql_query($educationalqry);
		    // var dataString = '&employer='+ employer + '&position='+ position + '&currentlyworking='+ currentlyworking + '&From='+ From + '&To='+ To +  '&updjobdetid='+ id;
		    $queryprf = "Update tbl_job_experience SET fld_employer='$employer',fld_position='$position',fld_current='$currentlyworking',fld_from_month='$from_month',fld_from_year='$from_year',fld_to_month='$To_month',fld_to_year='$To_year' ,fld_seekerid='$user_id', fld_updatedon='$today' where fld_id =$updjobdescid";
			$catiqry1 = mysql_query($queryprf);	


		    if($catiqry1)
		    {
		    	echo "ok";	
			}
			else
			{
				echo "notnot11";
			}
		}

	    //echo "INSERT INTO tbl_educationals_details(fld_educational,fld_course,fld_college,fld_from,fld_to,fld_cgpa)VALUES('".$educational."','".$course."','".$college."','".$from."','".$To."','".$cgpa."')";
	}
        
        
    if($oper == 'addjobskills')
	{
	$employer = $_POST['skill1'];
    $jbpostion = $_POST['percentage1'];    
        
      
        $seek_query = "INSERT INTO tbl_job_skills(fld_skill,fld_percentage,fld_seekerid)VALUES('".$employer."','".$jbpostion."','".$user_id."')";
        $seek_query1 = mysql_query($seek_query);

	    if($seek_query1)
	    {
	    echo "1";	
		}
		else
		{
			echo "2";
		}

	    //echo "INSERT INTO tbl_educationals_details(fld_educational,fld_course,fld_college,fld_from,fld_to,fld_cgpa)VALUES('".$educational."','".$course."','".$college."','".$from."','".$To."','".$cgpa."')";
	}


//


	if($oper == 'updjobdskill')
	{
		if(isset($_REQUEST['updjobdetid']))
		{
	            $updjobdescid = $_REQUEST['updjobdetid'];
		    $employer = $_POST['skill'];
		    $position = $_POST['percentage'];
		    	    
			//$educationalqry = "INSERT INTO tbl_educationals_details(fld_educational,fld_course,fld_college,fld_from,fld_to,fld_cgpa,fld_seekerid)VALUES('".$educational."','".$course."','".$college."','".$from."','".$To."','".$cgpa."','".$user_id."')";
		    //$addededucationalqry = mysql_query($educationalqry);
		    // var dataString = '&employer='+ employer + '&position='+ position + '&currentlyworking='+ currentlyworking + '&From='+ From + '&To='+ To +  '&updjobdetid='+ id;
		  $queryprf = "Update tbl_job_skills SET fld_skill='$employer',fld_percentage='$position',fld_seekerid='$user_id' where fld_id =$updjobdescid";
                  //echo "Update tbl_job_skills SET fld_skill='$employer',fld_percentage='$position',fld_seekerid='$user_id' where fld_id=$updjobdescid1";
	          $catiqry1 = mysql_query($queryprf);	


		         if($catiqry1)
		         {
		    	    echo "ok";	
			}
			else
			{
			    echo "notnot11";
			}
		}

	    //echo "INSERT INTO tbl_educationals_details(fld_educational,fld_course,fld_college,fld_from,fld_to,fld_cgpa)VALUES('".$educational."','".$course."','".$college."','".$from."','".$To."','".$cgpa."')";
	}
        
        
    if($oper == 'addjoblink')
	{
	$employer = $_POST['url1'];
//        $employer12 = $_POST['description1'];
        $employer123 = $_POST['profile1'];
        $today = date("Y-m-d H:i:s");
        $seek_query = "INSERT INTO tbl_social_link(fld_url,fld_description,fld_profile,fld_seekerid,fld_createdon)VALUES('".$employer."','NULL','".$employer123."','".$user_id."','".$today."')";
        $seek_query1 = mysql_query($seek_query);
	    if($seek_query1)
                {
                        echo "1";	
		}
		else
		{
			echo "2";
		}
	}
        
	if($oper == 'updjobdlink')
	{
		if(isset($_REQUEST['updjobdetid']))
		{
                     $updjobdescid = $_REQUEST['updjobdetid'];
	            $profile = $_REQUEST['profile'];
		    $employer = $_POST['url'];
//		    $position = $_POST['description'];
		    	    $today = date("Y-m-d H:i:s");
			//$educationalqry = "INSERT INTO tbl_educationals_details(fld_educational,fld_course,fld_college,fld_from,fld_to,fld_cgpa,fld_seekerid)VALUES('".$educational."','".$course."','".$college."','".$from."','".$To."','".$cgpa."','".$user_id."')";
		    //$addededucationalqry = mysql_query($educationalqry);
		    // var dataString = '&employer='+ employer + '&position='+ position + '&currentlyworking='+ currentlyworking + '&From='+ From + '&To='+ To +  '&updjobdetid='+ id;
		  $queryprf = "Update tbl_social_link SET fld_url='$employer',fld_description='NULL',fld_profile='$profile',fld_seekerid='$user_id',fld_updatedon='$today' where fld_id =$updjobdescid";
                  //echo "Update tbl_job_skills SET fld_skill='$employer',fld_percentage='$position',fld_seekerid='$user_id' where fld_id=$updjobdescid1";
	          $catiqry1 = mysql_query($queryprf);	


		         if($catiqry1)
		         {
		    	    echo "ok";	
			}
			else
			{
			    echo "notnot11";
			}
		}

	    //echo "INSERT INTO tbl_educationals_details(fld_educational,fld_course,fld_college,fld_from,fld_to,fld_cgpa)VALUES('".$educational."','".$course."','".$college."','".$from."','".$To."','".$cgpa."')";
	}
        
        
        
        
        
        
        
        
        	if($oper == 'delexpdetails')
	{
                    
                  //echo 'dfdf'.$_REQUEST['id'];
		if(isset($_REQUEST['id']))
		{
                    
	            $updjobdescid1 = $_REQUEST['id'];
                    //echo sdfd.$updjobdescid1;
//		    $employer = $_POST['skill'];
//		    $position = $_POST['percentage'];
		    	    
			//$educationalqry = "INSERT INTO tbl_educationals_details(fld_educational,fld_course,fld_college,fld_from,fld_to,fld_cgpa,fld_seekerid)VALUES('".$educational."','".$course."','".$college."','".$from."','".$To."','".$cgpa."','".$user_id."')";
		    //$addededucationalqry = mysql_query($educationalqry);
		    // var dataString = '&employer='+ employer + '&position='+ position + '&currentlyworking='+ currentlyworking + '&From='+ From + '&To='+ To +  '&updjobdetid='+ id;
		  $queryprf = "UPDATE `tbl_job_experience` SET `fld_status`=2   where fld_id =$updjobdescid1";
                  echo "UPDATE `tbl_job_experience` SET `fld_status`=2   where fld_id =$updjobdescid1";
	          $catiqry1 = mysql_query($queryprf);	


		         if($catiqry1)
		         {
		    	    echo "ok";	
			}
			else
			{
			    echo "notnot11";
			}
		}

	    //echo "INSERT INTO tbl_educationals_details(fld_educational,fld_course,fld_college,fld_from,fld_to,fld_cgpa)VALUES('".$educational."','".$course."','".$college."','".$from."','".$To."','".$cgpa."')";
	}
        if($oper == 'deledudetails')
	{
                  //echo 'dfdf'.$_REQUEST['id'];
		if(isset($_REQUEST['id']))
		{
                    
	            $updjobdescid1 = $_REQUEST['id'];
                    echo sdfd.$updjobdescid1;
//		    $employer = $_POST['skill'];
//		    $position = $_POST['percentage'];
		    	    
			//$educationalqry = "INSERT INTO tbl_educationals_details(fld_educational,fld_course,fld_college,fld_from,fld_to,fld_cgpa,fld_seekerid)VALUES('".$educational."','".$course."','".$college."','".$from."','".$To."','".$cgpa."','".$user_id."')";
		    //$addededucationalqry = mysql_query($educationalqry);
		    // var dataString = '&employer='+ employer + '&position='+ position + '&currentlyworking='+ currentlyworking + '&From='+ From + '&To='+ To +  '&updjobdetid='+ id;
		  $queryprf = "UPDATE `tbl_educationals_details` SET `fld_status`=2   where fld_id =$updjobdescid1";
                  //echo "Update tbl_job_skills SET fld_skill='$employer',fld_percentage='$position',fld_seekerid='$user_id' where fld_id=$updjobdescid1";
	          $catiqry1 = mysql_query($queryprf);	


		         if($catiqry1)
		         {
		    	    echo "ok";	
			}
			else
			{
			    echo "notnot11";
			}
		}

	    //echo "INSERT INTO tbl_educationals_details(fld_educational,fld_course,fld_college,fld_from,fld_to,fld_cgpa)VALUES('".$educational."','".$course."','".$college."','".$from."','".$To."','".$cgpa."')";
	}
        
        
        if($oper == 'delskill')
	{
                  //echo 'dfdf'.$_REQUEST['id'];
		if(isset($_REQUEST['id']))
		{
                    
	            $updjobdescid1 = $_REQUEST['id'];
                    //echo sdfd.$updjobdescid1;
//		    $employer = $_POST['skill'];
//		    $position = $_POST['percentage'];
		    	    
			//$educationalqry = "INSERT INTO tbl_educationals_details(fld_educational,fld_course,fld_college,fld_from,fld_to,fld_cgpa,fld_seekerid)VALUES('".$educational."','".$course."','".$college."','".$from."','".$To."','".$cgpa."','".$user_id."')";
		    //$addededucationalqry = mysql_query($educationalqry);
		    // var dataString = '&employer='+ employer + '&position='+ position + '&currentlyworking='+ currentlyworking + '&From='+ From + '&To='+ To +  '&updjobdetid='+ id;
		  $queryprf = "UPDATE `tbl_job_skills` SET `fld_status`=2   where fld_id =$updjobdescid1";
                  //echo "Update tbl_job_skills SET fld_skill='$employer',fld_percentage='$position',fld_seekerid='$user_id' where fld_id=$updjobdescid1";
	          $catiqry1 = mysql_query($queryprf);	


		         if($catiqry1)
		         {
		    	    echo "ok";	
			}
			else
			{
			    echo "notnot11";
			}
		}

	    //echo "INSERT INTO tbl_educationals_details(fld_educational,fld_course,fld_college,fld_from,fld_to,fld_cgpa)VALUES('".$educational."','".$course."','".$college."','".$from."','".$To."','".$cgpa."')";
	}
        
        if($oper == 'dellink')
//            echo "hi";
	{
                  
		if(isset($_REQUEST['id']))
		{
                    
	      $updjobdescid1 = $_REQUEST['id'];                    
		  $queryprf = "UPDATE `tbl_social_link` SET `fld_delstatus`=2   where fld_id =$updjobdescid1";
          $catiqry1 = mysql_query($queryprf);	
          if($catiqry1)
		  {
		    echo "ok";	
		  }
		  else
		  {
			echo "notnot11";
		  }
		}

	    //echo "INSERT INTO tbl_educationals_details(fld_educational,fld_course,fld_college,fld_from,fld_to,fld_cgpa)VALUES('".$educational."','".$course."','".$college."','".$from."','".$To."','".$cgpa."')";
	}

//	var dataString = '&applyname='+ applyname + '&applyemailid='+ applyemailid + '&applymessage='+ applymessage + '&jobcodeid='+ jobcodeid + '&applyuserid='+ applyuserid;

if($oper == 'applythisjob')
	{
  
  	$applyname = $_POST['applyname'];
    $applyemailid = $_POST['applyemailid'];
    $applymessage = $_POST['applymessage'];
    $jobcodeid = $_POST['jobcodeid'];
    $applyuserid = $_POST['applyuserid'];	    
    //$userresid = $_POST['userresid'];	
    $jobtitle = $_POST['jobtitle'];
	$email = $_POST['empemailid'];	  
	//$email = "dharshini.e@vinformaxtech.com";
    //$email = "thamizha333@gmail.com";
    $restitle = $_POST['restitle'];	
    $resumeid = $_POST['resumeid'];
    $searchqry = mysql_query("SELECT fld_resume_title,fld_resume FROM tbl_user_resume WHERE fld_id='$resumeid'");
	    
	$row=mysql_fetch_array($searchqry);
    $resumename = $row['fld_resume_title'];
    $resumefilepath = $row['fld_resume'];

    
    $subject = 'Job Notification | staffingspot.com';
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
							  <td height="407" valign="top" class="con"><p><strong>Hi ,</strong></p>
							  	
								<p>'.$applyname.' has applied for the job. please find the details with attachment: </p>								
								

								<p>Email : '.$applyemailid.'</p>
								<p>Job Number : '.$jobcodeid.' </p>
								<p>Job Title: '.$jobtitle.' </p>								     
								<p>Resume title: '.$resumename.' </p>
								<br/>
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
					</table>';

		   
    
	$appliejobqry = "INSERT INTO tbl_applied_job(fld_name,fld_mailid,fld_cover,fld_seeker_id,fld_job_id,fld_resume_id)VALUES('".$applyname."','".$applyemailid."','".$applymessage."','".$applyuserid."','".$jobcodeid."','".$resumeid."')";
	

    $appliejobqry1 = mysql_query($appliejobqry);
   
    mail_template_appliedjob($resumefilepath,$email, $message, $subject);   
       
    if($appliejobqry1)
    {
    echo "ok";	
	}
	else
	{
	    echo "not ok";
	}
	
	}
        

if($oper == 'educational_specalization')
	{ ?>


                            <?php
                            $subeducatqry = "SELECT Distinct fld_id,fld_educourses, fld_educationid FROM tbl_edu_courses where fld_educationid = ".$_REQUEST['edu_id']." AND fld_delstatus=0 Order by fld_educationid ASC";
                            $subeducatqry1 = mysql_query($subeducatqry);
                            ?> 
                            <option value="">Select</option>
                            <?php
                            while($row=mysql_fetch_array($subeducatqry1,MYSQL_ASSOC))
                            {
                                $educourseid = $row['fld_id'];
                                $educoursename = $row['fld_educourses'];                               
                            ?>
                                    <option value="<?php echo $educourseid; ?>"><?php echo $educoursename; ?></option> 
                                
                            <?php   
                            }
                            ?>

<?php 	} 
if($oper == 'update_educational_specalization')
	{ ?>

                            <?php
                            $subeducatqry = "SELECT Distinct fld_id,fld_educourses, fld_educationid FROM tbl_edu_courses where fld_educationid = ".$_REQUEST['update_edu_id']." AND fld_delstatus=0 Order by fld_educationid ASC";
                            $subeducatqry1 = mysql_query($subeducatqry);
                            ?> 
                            <option value="">Select</option>
                            <?php
                            while($row=mysql_fetch_array($subeducatqry1,MYSQL_ASSOC))
                            {
                                $educourseid = $row['fld_id'];
                                $educoursename = $row['fld_educourses'];                               
                            ?>
                                    <option value="<?php echo $educourseid; ?>"><?php echo $educoursename; ?></option> 
                                    
                                
                            <?php   
                            }
                            ?>

<?php 	} ?>