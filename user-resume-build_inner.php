<?php
session_start();
@include ("config.php");
@include ("common.php");
@include("user_sessioncheck.php");
 $date=date('Y-m-d H:i:s');
$username = $_SESSION["user_name"];
$user_email = $_SESSION['user_email']; 
$user_id = $_SESSION['user_id'];

$oper = $_REQUEST['op'];

if($oper =='editeducationaldetails')
{

	$reguesteduid = $_REQUEST['getids'];
	$fetchedudetailsqry = "select edudetails.fld_id, edudetails.fld_college,edudetails.fld_from,edudetails.fld_to, edudetails.fld_cgpa,edu.fld_education,edicourse.fld_educourses from tbl_educationals_details edudetails Join tbl_educations edu on edu.fld_id = edudetails.fld_educational
        Join tbl_edu_courses edicourse on edicourse.fld_id = edudetails.fld_course WHERE edudetails.`fld_status`=0 and edudetails.fld_seekerid = $user_id and edudetails.fld_id=$reguesteduid";
	$fetchedudetailsqrysql = mysql_query($fetchedudetailsqry);	
	$row=mysql_fetch_array($fetchedudetailsqrysql);	
		$jobexpeid = $row['fld_id'];
		$educational = $row['fld_education'];
		$course = $row['fld_educourses'];
		$college = $row['fld_college'];
		$from = $row['fld_from'];
		$to = $row['fld_to'];
		$cgpa = $row['fld_cgpa'];

	echo '<div class="modal-dialog modal-md" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close" onclick="javascript:window.location.reload()"><span aria-hidden="true">&times;</span></button>
                        <h4 class="modal-title" id="myModalLabel">Edit/Update Educational Details</h4>
                    </div>
                    <div class="modal-body">     
                        <form role="form" class="form-horizontal" autocomplete="off">
                        
                            <div class="col-md-12 col-sm-12 col-xs-12 mb nopadding nodis">
                                <div class="col-md-6">
                                    <label for="email" class="control-label">Educational Degree <span class="required">*</span></label>
                                </div>
                                <div class="col-md-6">
                                    <select class="questions-category form-control" id="educational"  aria-hidden="true" data-placeholder="Select Eductional Degree">';

                                    $fetchedusqry = "SELECT distinct fld_id,fld_education FROM tbl_educations where fld_delstatus = 0";
                                    $fetchedusqrysql = mysql_query($fetchedusqry);	

                                    while($recordedu=mysql_fetch_array($fetchedusqrysql)){
                                    $eduidd = $recordedu['fld_id'];
                                    $eduname = $recordedu['fld_education'];

                                    ?>

                                    <option value="<?php echo $eduidd ?>" <?php if  ($eduname == $educational) { echo "selected";} ?>><?php echo $eduname; ?></option>
                                    <?php
                                    }

                                    echo '</select>

                                </div>                                 
                            </div>
                            <div class="col-md-12 col-sm-12 col-xs-12  mb nopadding nodis">
                                <div class="col-md-6">
                                    <label for="email" class="control-label">Specalization <span class="required">*</span></label>
                                </div>
                                <div class="col-md-6">
                                    <select class="questions-category form-control" id="specalization"  data-placeholder="Select Specialization" data-course='; echo $course; ?> <?php echo '>';

                                    $fetchedusqry = "SELECT distinct fld_id,fld_educourses FROM tbl_edu_courses where fld_delstatus = 0";
                                                    $fetchedusqrysql = mysql_query($fetchedusqry);	

                                                    while($recordedu=mysql_fetch_array($fetchedusqrysql)){
                                                            $recordeducoursid = $recordedu['fld_id'];
                                                    $educoursename = $recordedu['fld_educourses'];

                                                    ?>

                                                    <option value="<?php echo $recordeducoursid?>" <?php if  ($educoursename == $course) { echo "selected";} ?>><?php echo $educoursename; ?></option>
                                                    <?php
                                                    }

                                        echo '</select>   
                                </div>
                            </div>
                            <div class="col-md-12 col-sm-12 col-xs-12 mb nopadding">
                                <div class="col-md-6">
                                    <label for="email" class="control-label">College Name <span class="required">*</span></label>
                                </div>
                                <div class="col-md-6">
                                    <input class="form-control" id="college" name="college" placeholder="Please Enter the College Name" required="true" type="text" value="'.$college.'">
                                </div>
                            </div> 

                            <div class="col-md-12 col-sm-12 col-xs-12  mb nopadding">
                                <div class="col-md-6">
                                    <label for="email" class="control-label">From <span class="required">*</span></label>
                                </div>
                                <div class="col-md-6">
                                    <input class="date-ownfrom form-control" type="text" id="From" name="From" value="'.$from.'"/>  
                                </div> 
                            </div>
                        
                            <div class="col-md-12 col-sm-12 col-xs-12  mb nopadding">
                                <div class="col-md-6">
                                    <label for="email" class="control-label">To <span class="required">*</span></label>
                                </div>
                                <div class="col-md-6">
                                    <input class="date-ownto form-control" type="text" id="To" name="To" value="'.$to.'"/>   
                                </div> 
                            </div>
                        
                            <div class="col-md-12 col-sm-12 col-xs-12 nopadding">
                                <div class="col-md-6">
                                    <label for="email" class="control-label">Enter CGPA <span class="required">*</span></label>
                                </div>
                                <div class="col-md-6">
                                    <input class="form-control" id="cgpa" name="cgpa" placeholder="Please Enter the CGPA" required="true" type="text" value="'.$cgpa.'">
                                </div>
                            </div> 
                        
                    </form>                      

                    </div>
                    <div class="modal-footer">
                        <div class="col-md-12 col-sm-12 col-xs-12  mb">
                            <input id="updateeducationaldetails"  type="button" class="btn btn-success" value ="Save Details" onClick="fn_newsedit('.$jobexpeid.')"> 
                        </div>
                    </div>
                    
                </div>
				</div>';
}




if($oper =='editprojectdetails')
{

	$reguesteduid = $_REQUEST['getids'];
	$fetchprojectdetailsqry = "select fld_id,fld_project_title,fld_client,fld_employment_type,fld_from,fld_to,fld_location,fld_site,fld_role,fld_team_size,fld_skill_used,fld_role_description,fld_project_details from tbl_project_details where fld_seekerid = $user_id and fld_id = $reguesteduid ";
	
	$fetchprodetailsqrysql = mysql_query($fetchprojectdetailsqry);	
	$row=mysql_fetch_array($fetchprodetailsqrysql);	
	
		$projectid = $row['fld_id'];
		$ProjectTitle = $row['fld_project_title'];
		$ProjectClient = $row['fld_client'];
		$ProjectEmpType = $row['fld_employment_type'];
		$FromProject = $row['fld_from'];
		$ToProject = $row['fld_to'];
		$ProjectCity = $row['fld_location'];
		$ProjectSite = $row['fld_site'];
		$ProjectRole = $row['fld_role'];
		$ProjectTeamSize = $row['fld_team_size'];
		$ProjectSkillUsed = $row['fld_skill_used'];
		$ProjectRoleDescription = $row['fld_role_description'];
		$ProjectDescription = $row['fld_project_details'];

	echo '<div class="modal-dialog modal-md" role="document">
                                            <div class="modal-content">
                                                
                                                <div class="modal-header">
                                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close" onclick="javascript:window.location.reload()"><span aria-hidden="true">&times;</span></button>
                                                    <h4 class="modal-title" id="myModalLabel">Add Project Details</h4>
                                                </div>
                                                <div class="modal-body">
                                                    <form role="form" class="form-horizontal" autocomplete="off">   
                                                        
                                                        <div class="col-md-12 col-sm-12 col-xs-12 nopadding mb">
                                                            <div class="col-md-6 col-sm-6">
                                                                <label class="control-label">Project Title <span class="required">*</span></label>
                                                            </div>
                                                            <div class="col-md-6 col-sm-6">
                                                                <input id="ProjectTitle" type="text"  placeholder="Enter The Title " class="form-control" value="'.$ProjectTitle.'">
                                                            </div>
                                                        </div>

                                                        <div class="col-md-12 col-sm-12 col-xs-12 nopadding mb">
                                                            <div class="col-md-6 col-sm-6">
                                                                <label class="control-label">client <span class="required">*</span></label>
                                                            </div>
                                                            <div class="col-md-6 col-sm-6">
                                                                <input id="ProjectClient" type="text"  placeholder="Enter The Client"  class="form-control" value="'.$ProjectClient.'">
                                                            </div>
                                                        </div>

                                                        <div class="col-md-12 col-sm-12 col-xs-12 nopadding mb">
                                                            <div class="col-md-6 col-sm-6">
                                                                <label class="control-label">Employment Type <span class="required">*</span></label>
                                                            </div>
                                                            <div class="col-md-6 col-sm-6">
                                                                <input id="ProjectEmpType" type="text"  placeholder="Enter The Employment Type"  class="form-control" value="'.$ProjectEmpType.'">
                                                            </div>
                                                        </div>

                                                        <div class="col-md-12 col-sm-12 col-xs-12 nopadding mb">
                                                            <div class="col-md-6 col-sm-6">
                                                                <label for="FromProject" class="control-label">From <span class="required">*</span></label>
                                                            </div>
                                                            <div class="col-md-6 col-sm-6">
                                                                <input class="date-ownfrom form-control" id="FromProject" name="FromProject" type="text" value="'.$FromProject.'">  
                                                            </div>           
                                                        </div>

                                                        <div class="col-md-12 col-sm-12 col-xs-12 nopadding mb">
                                                            <div class="col-md-6 col-sm-6">
                                                                <label for="ToProject" class="control-label">To <span class="required">*</span></label>
                                                            </div>    
                                                            <div class="col-md-6 col-sm-6">
                                                                <input class="date-ownto form-control" id="ToProject" name="ToProject" type="text" value="'.$ToProject.'">                                                                                     </div> 
                                                        </div>

                                                        <div class="col-md-12 col-sm-12 col-xs-12 nopadding mb">
                                                            <div class="col-md-6 col-sm-6">
                                                                <label class="control-label">Location: <span class="required">*</span></label>
                                                            </div>
                                                            <div class="col-md-6 col-sm-6">
                                                                 <input type="text"
                                                                        value="'.$ProjectCity.'"
                                                                        placeholder="Write your city name"
                                                                        class="flexdatalist city_allresults form-control"
                                                                        data-data="city.json"
                                                                        data-search-in="city"
                                                                        data-visible-properties="["city"]"
                                                                        data-selection-required="true"
                                                                        data-value-property="city"
                                                                        data-text-property="{city}"
                                                                        data-min-length="1"
                                                                        name="txtcity"> 
                                                            </div>
                                                        </div>

                                                        <div class="col-md-12 col-sm-12 col-xs-12 nopadding mb">
                                                            <div class="col-md-6 col-sm-6">
                                                                <label class="control-label">site<span class="required">*</span></label>
                                                            </div>
                                                            <div class="col-md-6 col-sm-6">
                                                                <select class="form-control" name="status" id="ProjectSite" data-site='; echo $ProjectSite; ?> <?php echo '>';
                                                                    ?> 
                                                                    <?php if($ProjectSite=="offsite") { echo '<option selected>offsite</option>'; } else { echo '<option >offsite</option>'; } ?>
                                                                    <?php if($ProjectSite=="onsite") { echo '<option selected>onsite</option>'; } else { echo '<option>onsite</option>'; } ?>
                                                                        <?php
                                                                    echo '</select>
                                                            </div>
                                                        </div>

                                                        <div class="col-md-12 col-sm-12 col-xs-12 nopadding mb">
                                                            <div class="col-md-6 col-sm-6">
                                                                <label class="control-label">Role<span class="required">*</span></label>
                                                            </div>
                                                            <div class="col-md-6 col-sm-6">
                                                                <select id="ProjectRole" class="form-control">';
                                                                      $sql="select distinct fld_id,fld_role from tbl_role ";
                                                                            $res=mysql_query($sql);
                                                                            while($row=mysql_fetch_assoc($res))
                                                                            {
                                                                                 $id = $row['fld_id'];										
                                                                                 $role = $row['fld_role'];
                                                                        ?>
                                                                             <option value='<?php echo $role ?>' <?php if($role==$ProjectRole){ echo("selected"); }?>><?php echo $role;?></option>


                                                                        <?php } echo ' </select>
                                                            </div>
                                                        </div>

                                                        <div class="col-md-12 col-sm-12 col-xs-12 nopadding mb">
                                                            <div class="col-md-6 col-sm-6">
                                                                <label class="control-label">Team size<span class="required">*</span></label>
                                                            </div>
                                                            <div class="col-md-6 col-sm-6">
                                                                <select id="ProjectTeamSize" class="form-control" data-site='; echo $ProjectTeamSize; ?> <?php echo '>';?>
                                                                <?php if($ProjectTeamSize=="1") { echo '<option selected>1</option>'; } else { echo '<option >1</option>'; } ?>
                                                                <?php if($ProjectTeamSize=="2") { echo '<option selected>2</option>'; } else { echo '<option>2</option>'; } ?>
                                                                <?php if($ProjectTeamSize=="3") { echo '<option selected>3</option>'; } else { echo '<option>3</option>'; } ?>
                                                                <?php if($ProjectTeamSize=="4") { echo '<option selected>4</option>'; } else { echo '<option>4</option>'; } ?>
                                                                <?php if($ProjectTeamSize=="5") { echo '<option selected>5</option>'; } else { echo '<option>5</option>'; } ?>
                                                                <?php if($ProjectTeamSize=="6+") { echo '<option selected>6+</option>'; } else { echo '<option>6+</option>'; } ?>
                                                                <?php  echo ' </select>
                                                            </div>
                                                        </div>

                                                        <div class="col-md-12 col-sm-12 col-xs-12 nopadding mb">
                                                            <div class="col-md-6 col-sm-6">
                                                                <label class="control-label">Skill used<span class="required">*</span></label>
                                                            </div>
                                                            <div class="col-md-6 col-sm-6">
                                                                    <input type="text" id="ProjectSkillUsed" name="tags" class="form-control" data-role="tagsinput" value="'.$ProjectSkillUsed.'">
                                                            </div>
                                                        </div>

                                                        <div class="col-md-12 col-sm-12 col-xs-12 nopadding mb">
                                                            <div class="col-md-6 col-sm-6">
                                                                <label class="control-label">Role Description<span class="required">*</span></label>
                                                            </div>
                                                            <div class="col-md-6 col-sm-6">
                                                                <textarea id="ProjectRoleDescription" class="form-control">'.$ProjectRoleDescription.'</textarea>
                                                            </div>
                                                        </div>

                                                        <div class="col-md-12 col-sm-12 col-xs-12 nopadding mb">
                                                            <div class="col-md-6 col-sm-6">
                                                                <label class="control-label">Project Details<span class="required">*</span></label>
                                                            </div>
                                                            <div class="col-md-6 col-sm-6">
                                                                <textarea id="ProjectDescription" class="form-control">'.$ProjectDescription.'</textarea>
                                                            </div>
                                                        </div>

                                                    </form>
                                                </div>
                                                <div class="modal-footer">
                                                    <div class="col-md-12 col-sm-12 col-xs-12 mb">
                                                        <input id="btnupdateprojectdetails" type="button" class="btn btn-success" value ="Save Details" onClick="fn_projectedit('.$projectid.')">  
                                                    </div>
                                                </div>
                                            </div>
                                        </div>';
}

if($oper =='editjobdetails')
{

	$reguesteduid = $_REQUEST['getids'];
	$fetchedudetailsqry = "select fld_id, fld_employer,fld_position,fld_from_month, fld_from_year,fld_to_month,fld_to_year,fld_current from tbl_job_experience WHERE `fld_status`=0 and fld_seekerid = $user_id and fld_id=$reguesteduid";
	$fetchedudetailsqrysql = mysql_query($fetchedudetailsqry);	
	$row=mysql_fetch_array($fetchedudetailsqrysql);	
		$jobexpeid = $row['fld_id'];
		$employer = $row['fld_employer'];
		$position = $row['fld_position'];
		$iscurrentlyhere = $row['fld_current'];
		$from_month = $row['fld_from_month'];
		$to_month = $row['fld_to_month'];		
		$from_year = $row['fld_from_year'];
		$to_year = $row['fld_to_year'];		

	echo '<div class="modal-dialog modal-md" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close" onclick="javascript:window.location.reload()"><span aria-hidden="true">&times;</span></button>
                        <h4 class="modal-title" id="myModalLabel">Edit/Update Job Experience</h4>
                    </div>
                    <div class="modal-body">     
                        <form role="form" class="form-horizontal" autocomplete="off">
                       	
                        <div class="col-md-12 col-sm-12 col-xs-12 mb">
                            <div class="col-md-6 col-sm-6">
                                <label class="control-label">Employer Name <span class="required">*</span></label>
                            </div>
                            <div class="col-md-6 col-sm-6">
                               <input id="Employer" placeholder="Enter The Employer Name" class="form-control" type="text" value="'.$employer.'">
                            </div>
                        </div>

                        <div class="col-md-12 col-sm-12 col-xs-12 mb">
                            <div class="col-md-6 col-sm-6">
                                <label class="control-label">Job Position<span class="required">*</span></label>
                            </div>
                            <div class="col-md-6 col-sm-6">
                                <input id="Position" placeholder="Enter The Position" class="form-control" type="text" value="'.$position.'">
                            </div>
                        </div>

                        <div class="col-md-12 col-sm-12 col-xs-12 mb">
                            <div class="col-md-6 col-sm-6">
                                <label for="email" class="control-label">From <span class="required">*</span></label>
                            </div>
                            <div class="col-md-6 col-sm-6">
                                <input class="date-ownfrom form-control" type="text" id="Fromjob" name="Fromjob" value="'.$from_month.'/'.$from_year.'"/>  
                            </div> 
                        </div>';
                        
                                    if($to_year!='' && $to_month!='')
                                    {
                                    ?>
                                        <div class="col-md-12 col-sm-12 col-xs-12 mb date_to" style="display: block;" >
                            <div class="col-md-6 col-sm-6">
                                <label for="email" class="control-label">To <span class="required">*</span></label>
                            </div>
                            <div class="col-md-6 col-sm-6">
                                                <input class="date-ownto form-control" type="text" id="Tojob" name="Tojob" value="<?php echo $to_month; ?>/<?php echo $to_year; ?>"/>
                            </div> 
                        </div>
                                        <?php
                                    }
                                    else
                                    {
                                        ?>
                                    <div class="col-md-12 col-sm-12 col-xs-12 mb date_to" style="display: none;">
                                        <div class="col-md-6 col-sm-6">
                                            <label for="email" class="control-label">To <span class="required">*</span></label>
                                        </div>
                                        <div class="col-md-6 col-sm-6">
                                            <input class="date-ownto form-control" type="text" id="Tojob" name="Tojob" value=""/>
                                        </div> 
                                    </div>
                                    <?php
                                } 

//                                echo '
//                        
//                        <div class="col-md-12 col-sm-12 col-xs-12 mb date_to">
//                            <div class="col-md-6 col-sm-6">
//                                <label for="email" class="control-label">To</label>
//                            </div>
//                            <div class="col-md-6 col-sm-6">
//                                <input class="date-ownto form-control" type="text" id="Tojob" name="Tojob" value="'.$to_month.'/'.$to_year.'"/>
//                            </div> 
//                        </div>
//
                        echo '<div class="col-md--6 col-sm-12 col-xs-12 lbl">';
                                    
                                    if($iscurrentlyhere==1)
                                    {
                                    ?>
                                        <label class="control-label" style="cursor: pointer;">Currently Working Here<input id="currentlyworking" name="currentlyworking" class="form-control" type="checkbox" checked value="1" onchange="current_working(this)"></label>
                                        <?php
                                    }
                                    else
                                    {
                                        ?>
                                    <label class="control-label" style="cursor: pointer;">Currently Working Here <input id="currentlyworking" name="currentlyworking" class="form-control" type="checkbox" value="0" onchange="current_working(this)"></label>
                                    <?php
                                }

                                echo '
                        </div>
                    </form>                      

                </div>
                    
                <div class="modal-footer">
                    <div class="col-md-12 col-sm-12 col-xs-12 mb">
                        <input id="updatejobdetails"  type="button" class="btn btn-success" value ="Save Details" onClick="fn_jobdetailsedit('.$jobexpeid.')"> 
                    </div>
                </div>
                    
            </div>
        </div>';
}

if($oper =='editjobskill')
{

	$reguesteduid = $_REQUEST['getids'];
	$fetchedudetailsqry = "select fld_id, fld_profile,fld_description,fld_url from tbl_social_link WHERE `fld_delstatus`=0 and fld_seekerid = $user_id and fld_id=$reguesteduid";
	$fetchedudetailsqrysql = mysql_query($fetchedudetailsqry);	
	$row=mysql_fetch_array($fetchedudetailsqrysql);	
		$jobexpeid = $row['fld_id'];
		$profile = $row['fld_profile'];
		$description = $row['fld_description'];
		$url = $row['fld_url'];
			

	echo '<div class="modal-dialog modal-md" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close" onclick="javascript:window.location.reload()"><span aria-hidden="true">&times;</span></button>
                        <h4 class="modal-title" id="myModalLabel">Edit/Update Social Link</h4>
                    </div>
                    <div class="modal-body">     
                        <form role="form" class="form-horizontal" autocomplete="off">
                            <div class="col-md-12 col-sm-12 col-xs-12 nopadding mb">
                                <div class="col-md-6 col-sm-6">
                                    <label class="control-label">Skills  <span class="required">*</span></label>
                                </div>
                                <div class="col-md-6 col-sm-6">
                                    <input id="profile" type="text"  placeholder="Enter The Profile"  class="form-control" value="'.$profile.'">
                                </div>
                            </div>

                            <div class="col-md-12 col-sm-12 col-xs-12 nopadding mb">
                                <div class="col-md-6 col-sm-6">
                                    <label class="control-label">Skill Percentage<span class="required">*</span></label>
                                </div>
                                <div class="col-md-6 col-sm-6">
                                    <input id="url" type="text"  placeholder="Enter The URL"  class="form-control" value="'.$url.'">
                                </div>
                            </div>
			   <div class="col-md-12 col-sm-12 col-xs-12 nopadding mb">
                            <div class="col-md-6 col-sm-6">
                               <label class="control-label">Description<span class="required">*</span></label>
			       </div>
                                <div class="col-md-6 col-sm-6">
    
                                    <textarea rows="5" cols="5" id="description" class="form-control">'.$description.'</textarea>
                                </div>
                           </div>
                        </form>                      
                    </div>
                    
                    <div class="modal-footer">
                        <div class="col-md-12 col-sm-12 col-xs-12">
                            <input id="updatejobskill"  type="button" class="btn btn-success" value ="Save Details" onClick="fn_jobskill('.$jobexpeid.')"> 
                        </div>
                    </div>
                    
                </div>
            </div>';
}
if($oper =='editlink')
{

	$reguesteduid = $_REQUEST['getids'];
	$fetchedudetailsqry = "select fld_id, fld_profile,fld_description,fld_url from tbl_social_link WHERE `fld_delstatus`=0 and fld_seekerid = $user_id and fld_id=$reguesteduid";
	$fetchedudetailsqrysql = mysql_query($fetchedudetailsqry);	
	$row=mysql_fetch_array($fetchedudetailsqrysql);	
		$jobexpeid = $row['fld_id'];
                
		$profile = $row['fld_profile'];
		$description = $row['fld_description'];
        $url = $row['fld_url'];              
	    echo '<div class="modal-dialog modal-md" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close" onclick="javascript:window.location.reload()"><span aria-hidden="true">&times;</span></button>
                        <h4 class="modal-title" id="myModalLabel">Edit/Update Link Set</h4>
                    </div>
                    <div class="modal-body">     
                        <form role="form" class="form-horizontal" autocomplete="off">
                       	
                        <div class="col-md-12 col-sm-12 col-xs-12">
                            <div class="form-group">
                               <label class="col-sm-4 control-label">Profile  <span class="required">*</span></label>
                                <div class="col-sm-6">
                               <input type="text" placeholder="Select Social Type" class="dropdown-toggle form-control profile" id="dropdownMenu1" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true" placeholder="select social type" value="'.$profile.'">
  <ul class="dropdown-menu">';
                                                                        $social="select * from `tbl_social_type` where fld_social_status!=2";
                                                                        $social_link=mysql_query($social);
                                                                            while($row=mysql_fetch_assoc($social_link))
                                                                        { 
     echo '<li>
          <p  style="cursor:pointer"> <img src="admin/'.$row['fld_social_icon'].'" />'.$row['fld_social_type'] .'</p>

    </li>';
     } 
 echo ' </ul>

                                </div>
                            </div>
                        </div>

                        <div class="col-md-12 col-sm-12 col-xs-12">
                            <div class="form-group">
                               <label class="col-sm-4 control-label">URL<span class="required">*</span></label>
                                <div class="col-sm-6">
                               <input id="url" placeholder="Enter The URL" class="form-control" type="text" value="'.$url.'">
                                </div>
                            </div>
                            </div>
                            

                                                      
                    </form>
                    </div>
            <div class="modal-footer">
            <input id="updatejobskill"  type="button" class="btn btn-success" value ="Save Details" onClick="fn_joblink('.$jobexpeid.')"> 
            </div>                    
                </div>
				</div>';
}

if($oper =='addnewresume')
{   
$resumetitle = $_REQUEST['resumetitle'];
$allowedExts = array("pdf", "doc", "docx");
$temp = explode(".", $_FILES["resumefile"]["name"]);
$extension = end($temp);
if(in_array($extension, $allowedExts))
{
if ($_FILES["resumefile"]["error"] > 0) {
echo "Return Code: ".$_FILES["resumefile"]["error"] . "<br>";
} else {
move_uploaded_file($_FILES["resumefile"]["tmp_name"],
"resume/" .$_FILES["resumefile"]["name"]);
$upload_resume =  "resume/" .$_FILES["resumefile"]["name"];
}
$sekersel = "Select * from tbl_user_resume where fld_seekerid = '$user_id'";
$sekersel_query = mysql_query($sekersel);  
$countresume = mysql_num_rows($sekersel_query);
if($countresume >=1)
{
    $sekerins = "INSERT INTO tbl_user_resume(fld_resume,fld_resume_title,fld_seekerid)VALUES('".$upload_resume."','".$resumetitle."','".$user_id."')";
    $seek_query = mysql_query($sekerins);        
}
else
{
    $sekerins = "INSERT INTO tbl_user_resume(fld_resume,fld_resume_title,fld_seekerid,fld_actviestatus)VALUES('".$upload_resume."','".$resumetitle."','".$user_id."','1')";
    $seek_query = mysql_query($sekerins);              
}
}
//else { ?>
<!--  <script>
	alert("Invalide file type");
	</script>-->
        <?php
//}
}

if($oper =='activeresumelist')
{

$id=$_REQUEST['id'];
$sql = "UPDATE tbl_user_resume SET fld_actviestatus =0 where fld_delstatus=0 and fld_seekerid ='$user_id'";
$query = mysql_query($sql);
$sql1 = "UPDATE tbl_user_resume SET fld_actviestatus =1 where fld_id =$id and fld_delstatus=0 and fld_seekerid ='$user_id'";
$query = mysql_query($sql1);  

}

if($oper =='addnewvideo')
{   
//data: "resumetitle="+resumetitle+"&resumefile="+resumefile,
$resumetitle = $_REQUEST['resumetitle'];
$date=date('Y-m-d H:i:s');
$allowedExts = array("mp4");
$temp = explode(".", $_FILES["resumefile"]["name"]);
$extension = end($temp);

//print_r($_FILES["file"]["type"]);
//print_r($extension);
//print_r($allowedExts);
if(($_FILES["resumefile"]["type"] == "video/mp4") && in_array($extension, $allowedExts))
{
if ($_FILES["resumefile"]["error"] > 0) {
echo "Return Code: ".$_FILES["resumefile"]["error"] . "<br>";
} else {
move_uploaded_file($_FILES["resumefile"]["tmp_name"],
"video/" .$_FILES["resumefile"]["name"]);
$upload_resume =  "video/" .$_FILES["resumefile"]["name"];
}
//}       

$sekersel = "Select * from tbl_esteem_video where fld_emp_id = '$user_id'";
$sekersel_query = mysql_query($sekersel);  
$countresume = mysql_num_rows($sekersel_query);
if($countresume >=1)
{
    $sekerins = "INSERT INTO tbl_esteem_video(fld_esteem_video,fld_esteem_video_title,fld_emp_id,fld_video_createdon)VALUES('".$upload_resume."','".$resumetitle."','".$user_id."','".$date."')";
    $seek_query = mysql_query($sekerins);  
    header('Location: self_esteem_video.php');
}
else
{
    $sekerins = "INSERT INTO tbl_esteem_video(fld_esteem_video,fld_esteem_video_title,fld_emp_id,fld_status,fld_video_createdon)VALUES('".$upload_resume."','".$resumetitle."','".$user_id."','1','".$date."')";
    $seek_query = mysql_query($sekerins);  
     header('Location: self_esteem_video.php');
}
} 
//else { ?>
<!--  <script>
	alert("Accept mp4 video only");
	//location.reload();
	</script>-->
        <?php
//}
}
?>

<?php

if($oper =='activevideolist')
{

$id=$_REQUEST['id'];
$sql = "UPDATE tbl_esteem_video SET fld_status =0, fld_video_updatedon = CURRENT_TIMESTAMP where fld_del_status=0 and fld_emp_id ='$user_id'";
$query = mysql_query($sql);
$sql1 = "UPDATE tbl_esteem_video SET fld_status =1, fld_video_updatedon = CURRENT_TIMESTAMP where fld_id =$id and fld_del_status=0 and fld_emp_id ='$user_id'";
$query = mysql_query($sql1);  

}
?>
        <!-- DATEPICKER -->
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
        
            <!--<script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>-->
        <link href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.5.0/css/bootstrap-datepicker.css" rel="stylesheet">        
        <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.5.0/js/bootstrap-datepicker.js"></script>
                            
            <!--<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>-->            
            <!--<script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>-->
        

            <!-- JQUERY SELECT -->
            <script type="text/javascript" src="js/select2.min.js"></script>

            <!-- MEGA MENU -->
            <script type="text/javascript" src="js/mega_menu.min.js"></script>



            <!-- JQUERY COUNTERUP -->
            <script type="text/javascript" src="js/counterup.js"></script>

            <!-- JQUERY WAYPOINT -->
            <script type="text/javascript" src="js/waypoints.min.js"></script>

            <!-- JQUERY REVEAL -->
            <script type="text/javascript" src="js/footer-reveal.min.js"></script>
            
            <!-- Owl Carousel -->
            <script type="text/javascript" src="js/owl-carousel.js"></script>

            <!--<script src="../../../cdn.ckeditor.com/4.5.10/standard/ckeditor.js"></script>
            <script type="text/javascript">
            CKEDITOR.replace('ckeditor.php');
                        CKEDITOR.replace('ckeditor-experience.php');
            </script>-->
            
            <script src="//cdn.ckeditor.com/4.5.5/standard/ckeditor.js"></script>
            <!-- CORE JS -->
            <script type="text/javascript" src="js/custom.js"></script>
            
            
            <link rel="stylesheet" href="css/jquery.tagsinput.min.css">
            
            <script type="text/javascript" src="js/jquery.tagsinput.min.js"></script>
    <script type="text/javascript">
            $('#ProjectSkillUsed').tagsInput({
                width: 'auto'
            });
        </script>
            
            <script>
    $('.dropdown-menu li p').click(function() {
      //var test = $('.dropdown-menu li a').val();
       var img = $('.dropdown-menu li img').attr('src');
       $('#icon').attr("src", img);

         var text = $(this).html();
         var array = text.split(">");
//         alert(array[0]+'>');

//         $('.caret').html(array[0]+'>');
         $('#dropdownMenu1').val(array[1]);
       //alert(text);
        });
</script>
            
            
            <link href="scripts/ddl/jquery.flexdatalist.css" rel="stylesheet" type="text/css">
<link href="scripts/ddl/jquery.flexdatalist.min.css" rel="stylesheet" type="text/css">
<script src="scripts/ddl/jquery.flexdatalist.min.js"></script>
<script src="scripts/ddl/jquery.flexdatalist.js"></script>


<script>
 $('.city_allresults').flexdatalist({
     minLength: 1,
     valueProperty: '*',
     selectionRequired: true, 
     textProperty: '{city}',
     searchIn: 'city',
     data: 'city.json'
});

</script>
            
            
            
            
            <script src="js/script.js"></script>
            <script type="text/javascript" src="scripts/jquery.form.js"></script>


<script>
function fn_jobdetailsedit(id)
{
//alert(id);
//alert("editid");   
var employer = $("#Employer").val();
var position = $("#Position").val();
var currentlyworking = $("#currentlyworking").val();
var From = $("#Fromjob").val();
var To = $("#Tojob").val();
var form_month = From.trim().substring(0, 2);
var to_month = To.trim().substring(0, 2);
var form_year = From.trim().substring(3);
var to_year = To.trim().substring(3);
var dataString = '&employer='+ employer + '&position='+ position + '&currentlyworking='+ currentlyworking + '&From_month='+ form_month + '&To_month='+ to_month + '&From_year='+ form_year + '&To_year='+ to_year +  '&updjobdetid='+ id;

if(employer==''|| position==''||From=='')
{
swal(
'',
'Please Fill All Fields!',
'warning'
)
}
else
{
$.ajax({
type: "POST",
url: "seeker_extra_details_inner.php?op=updjobdetails",
data: dataString,
cache: false,
success: function(result){
    var result1=$.trim(result);
    
   //alert(result);
if(result1=='ok')
{    
    swal(
            '',
            'Updated Successfully!',
            'success'
    )
$('.swal2-confirm').click(function(){
    location.reload();
});
$('.overlaymodal').hide();
//$(location).attr('href', 'user-job-applied.php');
}
},
beforeSend:function()
{
 $(".overlaymodal").show();                        
}
});
}
return false;

}
</script>




<script>
    
    $('#educational').change(function(){  
              var update_edu_id=$(this).val();
//              var specalization = $('#specalization').data('course');
              var dataString = '&update_edu_id='+ update_edu_id;
              $.ajax ({
                    type:"POST",
                    url: "seeker_extra_details_inner.php?op=update_educational_specalization",
                    data: dataString,
                    success: function(data) {
                        $("#specalization").html(data);
                    }
                });
            });
    
    
    
    
    
function fn_newsedit(id)
{
//alert(id);
//alert("editid");   
var educational = $("#educational").val();
var specalization = $("#specalization").val();
var cgpa = $("#cgpa").val();
var From = $("#From").val();
var To = $("#To").val();
var college = $("#college").val();

var dataString = '&educational='+ educational + '&specalization='+ specalization + '&cgpa='+ cgpa + '&From='+ From + '&To='+ To + '&college='+ college +   '&updjobdetid='+ id;

if(educational==''|| specalization==''||From==''||To==''||college==''||cgpa=='')
{
swal(
'',
'Please Fill All Fields!',
'warning'
)
}
else
{
$.ajax({
type: "POST",
url: "seeker_extra_details_inner.php?op=updeducational",
data: dataString,
cache: false,
success: function(result){
    var result1=$.trim(result);
    
   //alert(result);
if(result1=='ok')
{    
    swal(
            '',
            'Updated Successfully!',
            'success'
    )
$('.swal2-confirm').click(function(){
    location.reload();
});
$('.overlaymodal').hide();
//$(location).attr('href', 'user-job-applied.php');
}
},
beforeSend:function()
{
 $(".overlaymodal").show();                        
}
});
}
return false;


}

</script>


<script>
function fn_jobskill(id)
{
//alert(id);
//alert("editid");   
var profile = $("#profile").val();
var url = $("#url").val();
var description = $("#description").val();
//alert(skill);
var dataString = '&url='+ url + '&description='+ description + '&profile='+ profile + '&updjobdetid='+ id;
if(url==''|| description=='' || profile == '')
{
swal(
'',
'Please Fill All Fields!',
'warning'
)
}
else
{
$.ajax({
type: "POST",
url: "seeker_extra_details_inner.php?op=updjobdlink",
data: dataString,
cache: false,
success: function(result){
    var result1=$.trim(result);
    
   //alert(result);
if(result1=='ok')
{    
    swal(
            '',
            'Updated Successfully!',
            'success'
    )
$('.swal2-confirm').click(function(){
    location.reload();
});
$('.overlaymodal').hide();
//$(location).attr('href', 'user-job-applied.php');
}
},
beforeSend:function()
{
 $(".overlaymodal").show();                        
}
});
}
return false;


}

</script>
<script>
function fn_joblink(id)
{
//alert(id);
var profile = $(".profile").val();
var url = $("#url").val();
//var description = $("#description").val();
// var ckeditor_description = CKEDITOR.instances['description'].getData();
//var description = $(ckeditor_description).text();
var dataString = '&profile='+ profile + '&url='+ url + '&updjobdetid='+ id;
if(profile==''|| url=='')
{
swal(
'',
'Please Fill All Fields!',
'warning'
)
}
else
{
$.ajax({
type: "POST",
url: "seeker_extra_details_inner.php?op=updjobdlink",
data: dataString,
cache: false,
success: function(result){
    var result1=$.trim(result);
    
   //alert(result);
if(result1=='ok')
{    
    swal(
            '',
            'Updated Successfully!',
            'success'
    )
$('.swal2-confirm').click(function(){
    location.reload();
});
$('.overlaymodal').hide();
//$(location).attr('href', 'user-job-applied.php');
}
},
beforeSend:function()
{
 $(".overlaymodal").show();                        
}
});
}
return false;


}

</script>
<script>
  function fn_projectedit(id)
{    
//    alert(id);
			var ProjectTitle = $("#ProjectTitle").val();
                        var ProjectClient = $("#ProjectClient").val();
                        var ProjectEmpType = $("#ProjectEmpType").val();
			var FromProject = $("#FromProject").val();
                        var ToProject = $("#ToProject").val();
//                        var ProjectCity = $("#ProjectCity").val();
                        var ProjectCity = $(".city_allresults").val();
                        var ProjectSite = $("#ProjectSite").val();
                        var ProjectRole = $("#ProjectRole").val();
                        var ProjectTeamSize = $("#ProjectTeamSize").val();
                        var ProjectSkillUsed = $("#ProjectSkillUsed").val();
                        var ProjectRoleDescription = $("#ProjectRoleDescription").val();
                        var ProjectDescription = $("#ProjectDescription").val();
                        
                        
//                        var ckeditor_RoleDescription = CKEDITOR.instances['ProjectRoleDescription'].getData();
//                        var ProjectRoleDescription = $(ckeditor_RoleDescription).text();
//                        var ckeditor_Description = CKEDITOR.instances['ProjectDescription'].getData();
//                        var ProjectDescription = $(ckeditor_Description).text();
                        
                        
			var dataString ='&ProjectId=' + id + '&ProjectTitle=' + ProjectTitle + '&ProjectClient=' + ProjectClient + '&ProjectEmpType=' + ProjectEmpType + '&FromProject=' + FromProject + '&ToProject=' + ToProject + '&ProjectCity=' + ProjectCity + '&ProjectSite=' + ProjectSite + '&ProjectRole=' + ProjectRole + '&ProjectTeamSize=' + ProjectTeamSize + '&ProjectSkillUsed=' + ProjectSkillUsed + '&ProjectRoleDescription=' + ProjectRoleDescription + '&ProjectDescription=' + ProjectDescription;
			
                        if (ProjectTitle == '' || ProjectClient == '' || ProjectEmpType == '' || FromProject == '' || ToProject == '' || ProjectCity == '' || ProjectSite == '' ||ProjectRole == '' || ProjectTeamSize == '' || ProjectSkillUsed == '' || ProjectRoleDescription == '' || ProjectDescription == '' )
                        {
                            swal(
                                '',
                                'Please Fill All Fields!',
                                'warning'
                                )
                        } else
                        {
                            $.ajax({
                                type: "POST",
                                url: "seeker_extra_details_inner.php?op=updateproject",
                                data: dataString,
                                cache: false,
                                success: function (response) {
                                    response = $.trim(response);
                                    if (response == 'ok')
                                    {
                                        swal(
                                                '',
                                                'Updated Successfully!',
                                                'success'
                                        )
                                        $('.swal2-confirm').click(function(){
                                            location.reload();
                                        });
                                        $('.overlaymodal').hide();
                                    }
                                },
                                beforeSend:function()
                                {
                                 $(".overlaymodal").show();                        
                                }
                            });
                        }
			return false;
}
 </script>
<!--<script>
function fn_joblink(id)
{
alert(id);
//alert("editid");   
//var profile = $("#profile").val();
//var url = $("#url").val();
//var description = $("#description").val();
//alert(profile);
//var dataString = '&profile='+ profile + '&url='+ url + '&description='+ description  '&updjobdetid='+ id ;
//if(profile==''||url==''|| description=='')
//{
//alert("Please Fill All Fields");
//}
//else
//{
//$.ajax({
//type: "POST",
//url: "seeker_extra_details_inner.php?op=updjobdlink",
//data: dataString,
//cache: false,
//success: function(result){
//	alert(result);
//if(result=='ok')
//{    
//location.reload();
//}
//}
//});
//}
//return false;
//
//
//}

</script>-->

<script type="text/javascript">
    
    
    
//      $(document).ready(function () {
            var startDate = new Date();
            var fechaFin = new Date();
            var FromEndDate = new Date();
            var ToEndDate = new Date();
            $('#Fromjob').datepicker({
                
                autoclose: true,
                minViewMode: 1,
                format: 'mm/yyyy'
            }).on('changeDate', function(selected){
                    startDate = new Date(selected.date.valueOf());
                    startDate.setDate(startDate.getDate(new Date(selected.date.valueOf())));
                    $('#Tojob').datepicker('setStartDate', startDate);
                }); 

            $('#Tojob').datepicker({
                autoclose: true,
                minViewMode: 1,
                format: 'mm/yyyy'
            }).on('changeDate', function(selected){
                    FromEndDate = new Date(selected.date.valueOf());
                    FromEndDate.setDate(FromEndDate.getDate(new Date(selected.date.valueOf())));
                    $('#Fromjob').datepicker('setEndDate', FromEndDate);
                });
                
                $('#From').datepicker({
                autoclose: true,
                minViewMode: 2,
                format: 'yyyy'
            }).on('changeDate', function(selected){
                    startDate = new Date(selected.date.valueOf());
                    startDate.setDate(startDate.getDate(new Date(selected.date.valueOf())));
                    $('#To').datepicker('setStartDate', startDate);
                }); 

            $('#To').datepicker({
                autoclose: true,
                minViewMode: 2,
                format: 'yyyy'
            }).on('changeDate', function(selected){
                    FromEndDate = new Date(selected.date.valueOf());
                    FromEndDate.setDate(FromEndDate.getDate(new Date(selected.date.valueOf())));
                    $('#From').datepicker('setEndDate', FromEndDate);
                });
	    
                $('#FromProject').datepicker({
                    autoclose: true,
                    minViewMode: 2,
                    format: 'yyyy'
            }).on('changeDate', function(selected){
                    startDate = new Date(selected.date.valueOf());
                    startDate.setDate(startDate.getDate(new Date(selected.date.valueOf())));
                    $('#ToProject').datepicker('setStartDate', startDate);
                    });

                $('#ToProject').datepicker({
                        autoclose: true,
                        minViewMode: 2,
                        format: 'yyyy'
            }).on('changeDate', function(selected){
                    FromEndDate = new Date(selected.date.valueOf());
                    FromEndDate.setDate(FromEndDate.getDate(new Date(selected.date.valueOf())));
                    $('#FromProject').datepicker('setEndDate', FromEndDate);
                    });
//            });
            $("#From, #To, #FromProject, #ToProject, #Fromjob, #Tojob").keydown(false);
            
  </script>


<script type="text/javascript">
    
    $(document).ready(function(){
       var curent_id=$('#currentlyworking').val();
       if(curent_id == 1){
           $('#Tojob').val('');
       $('.to').css({'display' : 'none'});
       }
       
    });
    
        $('#college, #Position').keydown(function (e) {
                var key = e.keyCode;
                if (!((key == 8) || (key == 32) || (key == 46) || (key >= 35 && key <= 40) || (key >= 65 && key <= 90))) {
                    e.preventDefault();
                    return false;
                }
        });
      $("#cgpa, #percentage").keypress(function (e) {
         var regex = new RegExp("^[0-9.%]+$");           
            var key = String.fromCharCode(event.charCode == event.which ? event.which : event.charCode);          
            if (!regex.test(key)) {                
                event.preventDefault();
                return false;
            }
       });

  </script>



