<?php
error_reporting(0);
include "admin_session.php";

?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title>Job Management | StaffingSpot</title>
        <meta content='width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no' name='viewport'>
        <link href="css/bootstrap.min.css" rel="stylesheet" type="text/css" />
        <link href="//cdnjs.cloudflare.com/ajax/libs/font-awesome/4.1.0/css/font-awesome.min.css" rel="stylesheet" type="text/css" />
        <!-- Ionicons -->
        <link href="//code.ionicframework.com/ionicons/1.5.2/css/ionicons.min.css" rel="stylesheet" type="text/css" />
        <!-- Theme style -->
        <link href="css/AdminLTE.css" rel="stylesheet" type="text/css" />
        <link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
        <!--<link rel="stylesheet" href="/resources/demos/style.css">-->
  
        <!--<link href="css/bootstrap-wysihtml5/bootstrap3-wysihtml5.min.css" rel="stylesheet" type="text/css" />-->
<!--        <link href="../scripts/ddl/jquery.flexdatalist.css" rel="stylesheet" type="text/css">
        <link href="../scripts/ddl/jquery.flexdatalist.min.css" rel="stylesheet" type="text/css">-->
      
        <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
        <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
        <!--[if lt IE 9]>
          <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
          <script src="https://oss.maxcdn.com/libs/respond.js/1.3.0/respond.min.js"></script>
        <![endif]-->
        
<link href="../scripts/ddl/jquery.flexdatalist.css" rel="stylesheet" type="text/css">
<link href="../scripts/ddl/jquery.flexdatalist.min.css" rel="stylesheet" type="text/css">

<link href="css/bootstrap-datetimepicker.css" type="text/css" rel="stylesheet">
        
        
    </head>
    <body class="skin-blue">
        <!-- header logo: style can be found in header.less -->
        <?php include "includes/header.php"; ?>
        
        <div class="wrapper row-offcanvas row-offcanvas-left">
            <!-- Left side column. contains the logo and sidebar -->
            <?php include "includes/side_menu.php"; ?>

            <!-- Right side column. Contains the navbar and content of the page -->
            <aside class="right-side">
                <!-- Content Header (Page header) -->
                <section class="content-header">
                    <h1>
                       Job Management
                        <!--<small>it all starts here</small>-->
                    </h1>
                    <ol class="breadcrumb">
                        <li><a href="admin_home.php"><i class="fa fa-dashboard"></i> Home</a></li><li class="active">Job Management</li>
                    </ol>
                </section>
                
                
        
        <?php

        $viewempid=$_REQUEST['id'];

    if($viewempid)
    {    
//	$fetchedudetailsqry = "select * from postjob WHERE  fld_id=$viewempid";       
	$fetchedudetailsqry = "select tpj.fld_id,tpj.fld_jnumber,tpj.fld_jobtitle,tpj.fld_keyskills,tpj.fld_experience,tpj.fld_description,tpj.fld_job_type,tpj.fld_functional_area,tpj.fld_role,tpj.fld_location,tpj.fld_country,tpj.fld_state,tpj.fld_salary,tpj.fld_expirydate,tpj.fld_postdate,tpj.fld_job_status,ted.fld_employer_name,tpj.fld_industry_type,tpj.fld_delstatus,te.fld_id,te.fld_delstatus from tbl_postjob tpj JOIN tbl_employer_details ted ON (tpj.fld_empid = ted.fld_empid) JOIN tbl_employer te ON (ted.fld_empid = te.fld_id) WHERE (tpj.fld_job_status =1 OR tpj.fld_job_status = 0) AND tpj.fld_delstatus!=2 AND te.fld_delstatus!=2 AND tpj.fld_id=$viewempid"; 
//	echo "select tpj.fld_id,tpj.fld_jnumber,tpj.fld_jobtitle,tpj.fld_keyskills,tpj.fld_experience,tpj.fld_description,tpj.fld_job_type,tpj.fld_functional_area,tpj.fld_role,tpj.fld_location,tpj.fld_country,tpj.fld_state,tpj.fld_salary,tpj.fld_postdate,tpj.fld_job_status,ted.fld_employer_name,ted.fld_indusType,tpj.fld_delstatus,te.fld_id,te.fld_delstatus from tbl_postjob tpj JOIN tbl_employer_details ted ON (tpj.fld_empid = ted.fld_empid) JOIN tbl_employer te ON (ted.fld_empid = te.fld_id) WHERE (tpj.fld_job_status =1 OR tpj.fld_job_status = 0) AND tpj.fld_delstatus!=2 AND te.fld_delstatus!=2 AND tpj.fld_id=$viewempid";
        $fetchedudetailsqrysql = mysql_query($fetchedudetailsqry);	
	$row=mysql_fetch_array($fetchedudetailsqrysql);	
		//$viewempid = $row['fld_id'];             
            $employee = $row['fld_employer_name'];
            $country = $row['fld_country'];
            $state = $row['fld_state'];
            $city = $row['fld_location'];
            $functional_area = $row['fld_functional_area'];
            $role1 = $row['fld_role'];
            $job_type =$row['fld_job_type'];
            $Keyskills = $row['fld_keyskills'];
            $exp = $row['fld_experience'];
            $salary = $row['fld_salary'];
            $skills =$row['fld_keyskills'];
                $timestamp = strtotime($row['fld_postdate']);
                $postdate = date( 'd-m-Y', $timestamp);
                //$expire_date =$row['fld_expirydate'];
                $timestamp1 = strtotime($row['fld_expirydate']);
                $expire_date = date( 'd-m-Y', $timestamp1);
            $description =$row['fld_description'];
            $status = $row['fld_job_status'];                
                $date = $row['fld_postdate'];
            $industry_type = $row['fld_industry_type'];
            $job = $row['fld_jobtitle'];
?>
	<div>
                        
                        <h4 class="modal-title" id="myModalLabel">Edit/Update Job Management Details</h4>
                    </div>
                    <div class="modal-body">     
                        <form role="form" class="form-horizontal post_job" id="post_job">
                       	
                        <div class="col-md-12 col-sm-12 col-xs-12">
                            <div class="form-group">
                               <label class="col-sm-4 control-label">Employer Name <span class="required">*</span></label>
                                <div class="col-sm-6">
                               <input id="employee" name="employee" placeholder="Enter The Employee Name" class="form-control" type="text" value="<?php echo $employee; ?>">
                                </div>
                            </div>
                        </div>
                        <div class="col-md-12 col-sm-12 col-xs-12">
                            <div class="form-group">
                               <label class="col-sm-4 control-label"> Job Title  <span class="required">*</span></label>
                                <div class="col-sm-6">
                               <input id="title" name="title" placeholder="Enter The Job Title" class="form-control" type="text" value="<?php echo $job; ?>">
                                </div>
                            </div>
                        </div>

                        <div class="col-md-12 col-sm-12 col-xs-12">
                            <div class="form-group">
                               <label class="col-sm-4 control-label">Country <span class="required">*</span></label>
                                <div class="col-sm-6">
                               <input type='text'
                                        value='<?php echo $country; ?>'
                                        placeholder='Enter your country name'
                                        class='flexdatalist country_allresults'
                                        data-data='country.json'
                                        data-search-in='country'
                                        data-visible-properties='["country"]'
                                        data-selection-required='true'
                                        data-value-property='country'
                                        data-text-property='{country}'
                                        data-min-length='1'
                                        multiple='multiple'
                                        name='country'>
                               <?php 
                               $country_id=[];
                        $roles=explode(",", $country);
                                        
                                                foreach($roles as $role)
                                                { 
                        
                        $sql="SELECT `fld_id` FROM `tbl_countries` WHERE `fld_name` = '$role'";
                                        $res=mysql_query($sql);
                                            while($rows=mysql_fetch_assoc($res))
                                        {
                                                array_push($country_id, $rows['fld_id']);
                                        }
                                                }
                               
                               
                               ?>
                               <div id="job_country"></div>
                                </div>
                            </div>
                        </div>
                            
                        <div class="col-md-12 col-sm-12 col-xs-12">
                            <div class="form-group">
                               <label class="col-sm-4 control-label">State <span class="required">*</span></label>
                                <div class="col-sm-6">
                               <select id="state" name="state" class="form-control state_allresults" data-placeholder="Select state" multiple="true">
                                <?php 
                                $state_id=[];
                                $state_name=[];
                                $id=  implode(",", $country_id);
                        $sql="SELECT * FROM `tbl_states` WHERE `fld_country_id` in ($id)";
                                        $res=mysql_query($sql);
                                            while($rows=mysql_fetch_assoc($res))
                                {   
                                                array_push($state_id, $rows['fld_id']);
                                                array_push($state_name, $rows['fld_name']);
                                        
                                }
                                                 foreach($state_name as $state_name_list)
                                                {  
                                                
                                $roles=explode(",", $state);
                                        
                                ?>
                                        <option <?php if(in_array($state_name_list, $roles)){echo("selected");} ?>  value="<?php echo $state_name_list;?>" ><?php echo $state_name_list;?></option>

                                    
                                    <?php

                                        }
                                           ?>
                                </select>
                                    <div id="job_state"></div>
                                </div>
                            </div>
                        </div>    

                            <div class="col-md-12 col-sm-12 col-xs-12">
                            <div class="form-group">
                               <label class="col-sm-4 control-label">City <span class="required">*</span></label>
                                <div class="col-sm-6">
                               <select id="city" name="city" class="form-control" data-placeholder="Select city" multiple="true">
                                <?php
                                
                                $city_id=[];
                                $city_name=[];
                                $id=  implode(",", $state_id);
                        $sql="SELECT * FROM `tbl_cities` WHERE `fld_state_id` IN ($id)";
                                        $res=mysql_query($sql);
                                            while($rows=mysql_fetch_assoc($res))
                                {   
                                                array_push($city_id, $rows['fld_id']);
                                                array_push($city_name, $rows['fld_name']);
                                        
                                }
                                                 foreach($city_name as $city_name_list)
                                                {
                                
                                
                                
                                
                                $roles=explode(",", $city);
                                ?>
                                        <option <?php if(in_array($city_name_list, $roles)){echo("selected");} ?>  value="<?php echo $city_name_list;?>" ><?php echo $city_name_list;?></option>


                                    <?php
                                    

                                }  ?>
                                </select>
                                    <div id="job_city"></div>
                                </div>
                            </div>
                            </div>
                            
                            <div class="col-md-12 col-sm-12 col-xs-12">
                            <div class="form-group">
                              <label for="type" class="col-sm-4 control-label">Industry Type</label>
                              <div class="col-sm-6">
                           
                            <select id="type" name="type" class="questions-category form-control" data-placeholder="Select Industry Type">
                                            <option value="">Select Industry Type</option>
                                            <?php 
                                        $sql="select * from `tbl_industry_type` where fld_delstatus=1 OR fld_delstatus=0";
                                        $res=mysql_query($sql);
                                            while($rows=mysql_fetch_assoc($res))
                                        {
                                        ?>
                                            <option  <?php if(trim($industry_type) == trim($rows['fld_industrytype'])){echo("selected");}?>  value="<?php echo $rows['fld_industrytype'];?>" ><?php echo $rows['fld_industrytype'];?></option>
                                            
                                        <?php  }?></select>
                                        <div id="job_type"></div>
                                </div>
                              </div>
                            </div>
                            
                            <div class="col-md-12 col-sm-12 col-xs-12">
                            <div class="form-group">
                               <label class="col-sm-4 control-label">Functional Area <span class="required">*</span></label>
                                <div class="col-sm-6">
                               <select id="area" name="area" class="questions-category form-control" data-placeholder="Select Functional Area">
                                            <option value="">Select Functional Area</option>
                                             <?php 
                                        $sql="select * from `tbl_funtional_area`";
                                        $res=mysql_query($sql);
                                            while($row=mysql_fetch_assoc($res))
                                        {
                                                $roles=explode(",", $functional_area);
                                          foreach($roles as $role)
                                                {
                                        ?>
                                            <option <?php if($role == $row['fld_fuctionalarea']){echo("selected");}?> value="<?php echo $row['fld_fuctionalarea'];?>"><?php echo $row['fld_fuctionalarea'];?></option>
                                            
                                        <?php } }?>
                                        
                                        </select>
                                    <div id="job_area"></div>
                                </div>
                            </div>
                            </div>
                            <div class="col-md-12 col-sm-12 col-xs-12">
                            <div class="form-group">
                               <label class="col-sm-4 control-label">Role <span class="required"> *</span></label>
                                <div class="col-sm-6">
                               <select id="role" name="role" class="questions-category form-control" data-placeholder="Select Role">
                                            <option value="">Select Role</option>
                                            <?php 
                                             $sql="select * from `tbl_role`";
                                        $res=mysql_query($sql);
                                            while($row=mysql_fetch_assoc($res))
                                        {
                                        ?>
                                             <option value="<?php echo $row['fld_role'] ?>" <?php if($role1 == $row['fld_role'])echo 'selected';?>><?php echo $row['fld_role'] ?></option>
                                            
                                        
                                        <?php }?>
                                            
                                        </select>
                                    <div id="job_role"></div>
                                </div>
                            </div>
                            </div>
                            <div class="col-md-12 col-sm-12 col-xs-12">
                            <div class="form-group">
                               <label class="col-sm-4 control-label">Job Type <span class="required"> *</span></label>
                                <div class="col-sm-6">
                               <select id="jobtype" name="jobtype" class="questions-category form-control" data-placeholder="Select Job Type">
                                            <option value="">Select Job Type</option>
                                            <option value="Full Time" <?php if($job_type == "Full Time" )echo 'selected';?> >Full Time</option>
                                            <option value="Part Time" <?php if($job_type == "Part Time" )echo 'selected';?> >Part Time</option>
                                            <option value="Remote" <?php if($job_type == "Remote" )echo 'selected';?> >Remote</option>
                                            <option value="Freelancer" <?php if($job_type == "Freelancer" )echo 'selected';?> >Freelancer</option>
                                        </select>
                                    <div id="job_jobtype"></div>
                                </div>
                            </div>
                            </div>
                            <div class="col-md-12 col-sm-12 col-xs-12">
                    <div class="form-group">
                    <label class="col-sm-4 control-label">Job Experience <span class="required"> *</span></label>                  
                                   
                                        <div class="col-sm-6 Exp">
                                            <div class="form-group">
                                                <label class="nb">Year</label>
                        <?php 
                                        $roles=explode(",", $exp);
                                        ?>
                                                <select  id="exp" name="exp" class="questions-category form-control">
                                                    <option value="">Select year of experience</option>
                                            <option value="fresher"<?php if($roles[0] == "fresher" )echo 'selected';?>>Fresher</option>
                                        <option value="0"<?php if($roles[0] == "0" )echo 'selected';?>>0</option>
                                            <option value="1"<?php if($roles[0] == "1" )echo 'selected';?>>1 </option>
                                            <option value="2"<?php if($roles[0] == "2" )echo 'selected';?>>2 </option>
                                            <option value="3"<?php if($roles[0] == "3" )echo 'selected';?>>3 </option>
                                            <option value="4"<?php if($roles[0] == "4" )echo 'selected';?>>4 </option>
                                            <option value="5"<?php if($roles[0] == "5" )echo 'selected';?>>5 </option>
                                            <option value="6"<?php if($roles[0] == "6" )echo 'selected';?>>6 </option>
                                            <option value="7"<?php if($roles[0] == "7" )echo 'selected';?>>7 </option>
                                            <option value="8"<?php if($roles[0] == "8" )echo 'selected';?>>8 </option>
                                            <option value="9"<?php if($roles[0] == "9" )echo 'selected';?>>9 </option>
                                            <option value="10"<?php if($roles[0] == "10" )echo 'selected';?>>10 </option>
                                            <option value="11"<?php if($roles[0] == "11" )echo 'selected';?>>11 </option>
                                            <option value="12"<?php if($roles[0] == "12" )echo 'selected';?>>12</option>
                                            <option value="13"<?php if($roles[0] == "13" )echo 'selected';?>>13 </option>
                                            <option value="14"<?php if($roles[0] == "14" )echo 'selected';?>>14 </option>
                                            <option value="15"<?php if($roles[0] == "15" )echo 'selected';?>>15</option>
                                            <option value="16"<?php if($roles[0] == "16" )echo 'selected';?>>16 </option>
                                            <option value="17"<?php if($roles[0] == "17" )echo 'selected';?>>17 </option>
                                            <option value="18"<?php if($roles[0] == "18" )echo 'selected';?>>18 </option>
                                            <option value="19"<?php if($roles[0] == "19" )echo 'selected';?>>19 </option>
                                            <option value="20"<?php if($roles[0] == "20" )echo 'selected';?>>20 </option>
                                            <option value="21"<?php if($roles[0] == "21" )echo 'selected';?>>21 </option>
                                            <option value="22"<?php if($roles[0] == "22" )echo 'selected';?>>22 </option>
                                            <option value="23"<?php if($roles[0] == "23" )echo 'selected';?>>23</option>
                                            <option value="24"<?php if($roles[0] == "24" )echo 'selected';?>>24 </option>
                                            <option value="25"<?php if($roles[0] == "25" )echo 'selected';?>>25 </option>
                                            <option value="26"<?php if($roles[0] == "26" )echo 'selected';?>>26 </option>
                                            <option value="27"<?php if($roles[0] == "27" )echo 'selected';?>>27 </option>
                                            <option value="28"<?php if($roles[0] == "28" )echo 'selected';?>>28 </option>
                                            <option value="29"<?php if($roles[0] == "29" )echo 'selected';?>>29 </option>
                                            <option value="30"<?php if($roles[0] == "30" )echo 'selected';?>>30 </option>
                                            <option value="31"<?php if($roles[0] == "31" )echo 'selected';?>>31 </option>
                                            <option value="32"<?php if($roles[0] == "32" )echo 'selected';?>>32 </option>
                                            <option value="33"<?php if($roles[0] == "33" )echo 'selected';?>>33 </option>
                                            <option value="34"<?php if($roles[0] == "34" )echo 'selected';?>>34 </option>
                                            <option value="35"<?php if($roles[0] == "35" )echo 'selected';?>>35 </option>
                                                </select>
                                                <div id="job_exp"></div>
                                            </div>
                                        </div>

                                        <div class="col-sm-3  month"> 
                                            <label class="nb">Month </label>
                                            <select id="exp1" name="exp1" class="questions-category form-control">
                                                <option value="">Select month of experience</option>
                                                <option value="0"<?php if($roles[1] == "0" )echo 'selected';?>>0</option>
                                            <option value="1"<?php if($roles[1] == "1" )echo 'selected';?>>1 </option>
                                            <option value="2"<?php if($roles[1] == "2" )echo 'selected';?>>2 </option>
                                            <option value="3"<?php if($roles[1] == "3" )echo 'selected';?>>3 </option>
                                            <option value="4"<?php if($roles[1] == "4" )echo 'selected';?>>4 </option>
                                            <option value="5"<?php if($roles[1] == "5" )echo 'selected';?>>5 </option>
                                            <option value="6"<?php if($roles[1] == "6" )echo 'selected';?>>6</option>
                                            <option value="7"<?php if($roles[1] == "7" )echo 'selected';?>>7 </option>
                                            <option value="8"<?php if($roles[1] == "8" )echo 'selected';?>>8</option>
                                            <option value="9"<?php if($roles[1] == "9" )echo 'selected';?>>9 </option>
                                            <option value="10"<?php if($roles[1] == "10" )echo 'selected';?>>10 </option>
                                            <option value="11"<?php if($roles[1] == "11" )echo 'selected';?>>11</option>                                          
                                            </select>
                                            <div id="job_exp1"></div>
                                        </div>
                                    </div>
                                    </div>
                               
                            <div class="col-md-12 col-sm-12 col-xs-12">
                                    
                                    <div class="form-group">
                                        <label class="col-sm-4 control-label">Salary <span class="required"> *</span></label>
                                     
                                            <div class="col-sm-3 Exp">
                                                <div class="form-group">
                                                    <label class="nb">Lakhs</label>
                                                    <?php 
                                        $roles=explode(";", $salary);
                                        ?>
                                                    <select id="expyr" name="expyr" class="questions-category form-control">
                                        <option value="">Select expected salary in lakhs</option>
                                            <option value="1"<?php if($roles[0] == "1" )echo 'selected';?>>1 </option>
                                            <option value="2"<?php if($roles[0] == "2" )echo 'selected';?>>2 </option>
                                            <option value="3"<?php if($roles[0] == "3" )echo 'selected';?>>3 </option>
                                            <option value="4"<?php if($roles[0] == "4" )echo 'selected';?>>4 </option>
                                            <option value="5"<?php if($roles[0] == "5" )echo 'selected';?>>5 </option>
                                            <option value="6"<?php if($roles[0] == "6" )echo 'selected';?>>6 </option>
                                            <option value="7"<?php if($roles[0] == "7" )echo 'selected';?>>7 </option>
                                            <option value="8"<?php if($roles[0] == "8" )echo 'selected';?>>8 </option>
                                            <option value="9"<?php if($roles[0] == "9" )echo 'selected';?>>9 </option>
                                            <option value="10"<?php if($roles[0] == "10" )echo 'selected';?>>10 </option>
                                            <option value="11"<?php if($roles[0] == "11" )echo 'selected';?>>11 </option>
                                            <option value="12"<?php if($roles[0] == "12" )echo 'selected';?>>12</option>
                                            <option value="13"<?php if($roles[0] == "13" )echo 'selected';?>>13 </option>
                                            <option value="14"<?php if($roles[0] == "14" )echo 'selected';?>>14 </option>
                                            <option value="15"<?php if($roles[0] == "15" )echo 'selected';?>>15</option>
                                            <option value="16"<?php if($roles[0] == "16" )echo 'selected';?>>16 </option>
                                            <option value="17"<?php if($roles[0] == "17" )echo 'selected';?>>17 </option>
                                            <option value="18"<?php if($roles[0] == "18" )echo 'selected';?>>18 </option>
                                            <option value="19"<?php if($roles[0] == "19" )echo 'selected';?>>19 </option>
                                            <option value="20"<?php if($roles[0] == "20" )echo 'selected';?>>20 </option>
                                            <option value="21"<?php if($roles[0] == "21" )echo 'selected';?>>21 </option>
                                            <option value="22"<?php if($roles[0] == "22" )echo 'selected';?>>22 </option>
                                            <option value="23"<?php if($roles[0] == "23" )echo 'selected';?>>23</option>
                                            <option value="24"<?php if($roles[0] == "24" )echo 'selected';?>>24 </option>
                                            <option value="25"<?php if($roles[0] == "25" )echo 'selected';?>>25 </option>
                                            <option value="26"<?php if($roles[0] == "26" )echo 'selected';?>>26 </option>
                                            <option value="27"<?php if($roles[0] == "27" )echo 'selected';?>>27 </option>
                                            <option value="28"<?php if($roles[0] == "28" )echo 'selected';?>>28 </option>
                                            <option value="29"<?php if($roles[0] == "29" )echo 'selected';?>>29 </option>
                                            <option value="30"<?php if($roles[0] == "30" )echo 'selected';?>>30 </option>
                                            <option value="31"<?php if($roles[0] == "31" )echo 'selected';?>>31 </option>
                                            <option value="32"<?php if($roles[0] == "32" )echo 'selected';?>>32 </option>
                                            <option value="33"<?php if($roles[0] == "33" )echo 'selected';?>>33 </option>
                                            <option value="34"<?php if($roles[0] == "34" )echo 'selected';?>>34 </option>
                                            <option value="35"<?php if($roles[0] == "35" )echo 'selected';?>>35 </option>                                       
                                              
                                                    </select>
                                                    <div id="job_expyr"></div>
                                                </div>
                                            </div>
                                        
                                            <div class="col-sm-3 Expyr1">  
                                                <label class="nb">Thousands </label>
                                                <select id="expyr1" name="expyr1" class="questions-category form-control">
                                                    <option value="">Select expected salary in lakhs</option>
                                                    <option value="0"<?php if($roles[1] == "0" )echo 'selected';?>>0</option>
                                           <option value="10"<?php if($roles[1] == "10" )echo 'selected';?>>10</option>
                                            <option value="20"<?php if($roles[1] == "20" )echo 'selected';?>>20</option>
                                            <option value="30"<?php if($roles[1] == "30" )echo 'selected';?>>30</option>
                                            <option value="40"<?php if($roles[1] == "40" )echo 'selected';?>>40</option>
                                            <option value="50"<?php if($roles[1] == "50" )echo 'selected';?> >50</option>
                                            <option value="60"<?php if($roles[1] == "60" )echo 'selected';?>>60</option>
                                            <option value="70"<?php if($roles[1] == "70" )echo 'selected';?>>70</option>
                                            <option value="80"<?php if($roles[1] == "80" )echo 'selected';?>>80</option>
                                            <option value="90"<?php if($roles[1] == "90" )echo 'selected';?>>90</option>                                           
                                                </select>
                                                <div id="job_expyr1"></div>
                                             </div>
                                        </div>                                        
                                    </div>
                               


                        <div class="col-md-12 col-sm-12 col-xs-12">
                            <div class="form-group">
                                <label class="col-sm-4 control-label">Post Date <span class="required">*</span></label>
                                <div class='col-sm-6 input-group date' id='datetimepicker9'>
<!--				    <input id="start" type='date' class="form-control" name="fromdate" placeholder="Enter the post date" value="<?php echo $postdate; ?>">
                    <span class="input-group-addon" style="background-color:#FFB070;"><span class="glyphicon glyphicon-calendar"></span>
				    </span>-->
                                    <input type='text' class="form-control" placeholder="Enter date of birth" id="start" name="fromdate"  value="<?php echo $postdate; ?>">
                </div>
                            </div>
                </div>
                            
                            <div class="col-md-12 col-sm-12 col-xs-12">
                            <div class="form-group">
                                <label class="col-sm-4 control-label">Expiry Date <span class="required">*</span></label>
                                <div class='col-sm-6 input-group date' id='datetimepicker10'>
<!--				    <input id="expdate" type='date' class="form-control" name="todate"  placeholder="Enter the expiry date"  value="<?php echo date('d-m-Y',$expire_date); ?>">
                    <span class="input-group-addon" style="background-color:#FFB070;"><span class="glyphicon glyphicon-calendar"></span>
				    </span>-->
                                    <input class=" form-control" placeholder="Expiry date" type="text" id="expdate" name="todate" value="<?php echo $expire_date;?>"  />
                </div>
                            </div>
                </div>  
                            
                      
                            <div class="col-md-12 col-sm-12 col-xs-12">
                            <div class="form-group">
                               <label class="col-sm-4 control-label">Key Skills<span class="required">*</span></label>
                                <div class="col-sm-6">
                               <input type="text" id="tags" name="tags" class="form-control" value="<?php echo $skills;?>" data-placeholder="Enter Skills..." data-role="tagsinput">
                               <div id="job_tags"></div>
                                </div>
                            </div>
                            </div>
                            <div class="col-md-12 col-sm-12 col-xs-12">
                            <div class="form-group">
                               <label class="col-sm-4 control-label">Job Description<span class="required">*</span></label>
                                <div class="col-sm-6">
                               <textarea name="details" class="form-control" id="details"><?php echo $description;?></textarea>
                               <div id="job_details"></div>
                                </div>
                            </div>
                            </div>
                            <div class="col-md-12 col-sm-12 col-xs-12">
                            <div class="form-group">
                                <label class="col-sm-4 control-label">Status<span class="required">*</span></label>
                                <div class="col-sm-6">
                                    
                                    <select id="status" name="status" class="form-control">
                                    <option value="1" 
                                    <?php
                                    if (isset($_POST['status']) && $_POST['status']!='' && $_POST['status'] == 1) {
                                        ?> selected="selected"
                                                <?php
                                            } elseif ($status == 1) {
                                                ?> selected="selected"
                                                <?php
                                            }
                                            ?>>Active
                                    </option>
                                    <option value="0" 
                                    <?php
                                    if (isset($_POST['status']) && $_POST['status']!='' && $_POST['status'] == 1) {
                                        ?> selected="selected"
                                                <?php
                                            } elseif ($status == 0) {
                                                ?> selected="selected"
                                                <?php
                                            }
                                            ?>>InActive
                                    </option>
                                </select>
                                </div>
                            </div>
                        </div>
                            <div class="col-md-12">
                                <div class="col-sm-4">&nbsp;</div>
                                <div class="col-sm-8 all-res">
                             <div style="bttn-rite">
                            <input type="submit" class="btn btn-success resume-btn  mob-btn  btn-left ntn-tab" id="updatejobskill" data-id="<?php echo $viewempid ;?>" name="submit" value="Save"/>
            <input type="reset" class="btn btn-warning resume-btn  mob-btn  btn-left" value="Reset" />
            <INPUT class="btn btn-warning resume-btn  mob-btn  btn-left" Type="button" VALUE="Back" onClick="location.href = 'jobs_manage.php'"/>
                        </div>
                                    </div>
                                </div>
                        </form>
                        
                              
                                </div>    
                                </div> 
            <div class="modal-footer">
            
            </div>
        </div>

        <?php         
         }
?>
    

<script src="//ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
  <!--<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.0/jquery.min.js"></script>-->
  
  <script src="https://code.jquery.com/jquery-1.12.4.js"></script>
  <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
          

<!--<script src="../js/plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.all.min.js" type="text/javascript"></script>-->
<!--<script type = "text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.8.3/jquery.min.js"></script>-->
<!-- shifting across different page -->


<script src="//cdn.ckeditor.com/4.5.5/standard/ckeditor.js"></script>        
<script type="text/javascript" src="../scripts/validate.min.js"></script>


<script src="../scripts/ddl/jquery.flexdatalist.min.js"></script>
<script src="../scripts/ddl/jquery.flexdatalist.js"></script>
<script type="text/javascript" src="../js/jquery.tagsinput.min.js"></script>
        <script type="text/javascript" src="js/moment.js"></script>
        <script src="js/bootstrap.min.js" type="text/javascript"></script>
<!-- AdminLTE App -->
<script src="js/AdminLTE/app.js" type="text/javascript"></script>
        <!-- AdminLTE for demo purposes -->
        <script src="js/AdminLTE/demo.js" type="text/javascript"></script>
        
        <link href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.5.0/css/bootstrap-datepicker.css" rel="stylesheet">        
<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.5.0/js/bootstrap-datepicker.js"></script>
<script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>

<!--<link rel="stylesheet" type="text/css" href="css/jquery.datetimepicker.css"/>

<script src="js/jquery.datetimepicker.js"></script>-->
  <!--<script type="text/javascript" src="js/bootstrap-datetimepicker.js"></script>-->


 <script>
    $("#reset").click(function() {
    $(this).closest('form').find("input[type=text], textarea").val("");
    $(this).closest('form').find("input[type=text], select").val("");

})
   </script>
   <script>
       $(function() {
                CKEDITOR.replace('details');
            });
    function clearText() {
        // set text box reference
        var tb = document.getElementById('form');
        // clear text box
        tb.value = '';
        $('.country_allresults').val('');
        $('#state').empty();
        $('#city').empty();
        $('#tags_tagsinput').tagsInput('removeAll');
        CKEDITOR.instances['details'].setData('');
    }
        
        
        $("#start, #expdate").keypress(function(event) {event.preventDefault();});
        $('#start').datepicker({
        autoclose: true,
        minViewMode: 3,
        format: 'dd-mm-yyyy'
        });
//        $('#start').datetimepicker();
        var startDate = new Date();
 $('#expdate').datepicker({
                        autoclose: true,
                        minViewMode: 3,
                        format: 'dd-mm-yyyy'
                    }).datepicker('setStartDate', startDate);
        
    </script>




        <script type="text/javascript">
            $('#tags').tagsInput({
                width: 'auto'
            });
        </script>

<script>
//     $(function () {
//
//        
//		$('#datetimepicker9').datetimepicker({pickTime: false});
//		$('#datetimepicker10').datetimepicker({pickTime: false});
//		$("#datetimepicker9").on("dp.change", function (e) {
//		    $('#datetimepicker10').data("DateTimePicker").setMinDate(e.date);
//		});
//		$("#datetimepicker10").on("dp.change", function (e) {
//		    $('#datetimepicker9').data("DateTimePicker").setMaxDate(e.date);
//		});
//	    });
//$("#datepicker").keypress(function(event) {event.preventDefault();});
 $('.country_allresults').flexdatalist({
     minLength: 1,
     valueProperty: '*',
     selectionRequired: true, 
     textProperty: '{country}',
     searchIn: 'country',
     data: 'country.json'
});

</script>
  
  <script>
function isNumber(evt) {
    var iKeyCode = (evt.which) ? evt.which : evt.keyCode
    if (iKeyCode != 46 && iKeyCode > 31 && (iKeyCode < 48 || iKeyCode > 57))
        return false;
    return true;
}

            </script>
                  
  <script>
      
      $("#form").validate({
                    ignore: [],
                    rules: {
                        employee:{
                            required: true
                        },
                        title: {
                            required: true
                        },
                        country: {
                            required: true
                        },
                        state: {
                            required: true
                        },
                        city: {
                            required: true
                        },
                        type: {
                            required: true
                        },
                        area: {
                            required: true
                        },
                        role: {
                            required: true
                        },
                        exp: {
                            required: true
                        },
                        exp1: {
                        required: {
                            depends: function(){
                                    var year = $('#exp').val();
                                    if(year == 'fresher'){
                                        return false;
                                    } else{
                                        return true;
                                    }
                        },
                                
                            },
                            month: true
                        },
                        expyr: {
                            required: true
                        },
                        expyr1: {
                            required: true
                        },
                        jobtype: {
                            required: true
                        },
                        tags:{
                            required: true
                        },
                        fromdate:{
                            required: true
                        },
                        todate: {
                            required: true
                        },
                        status:{
                            required: true
                        },
                        details: {
                            
                            required: function(textarea) {
                                CKEDITOR.instances[textarea.id].updateElement(); // update textarea
                                var editorcontent = textarea.value.replace(/<[^>]*>/gi, ''); // strip tags
                                return editorcontent.length === 0;
                              }
                        }
                    },

                     messages: {
                        
                    },      
                    errorElement: "label", // can be 'label'
                    errorPlacement: function (error, element) {
                        var elementName = $(element).attr('name');
                        if (elementName == 'city') {
                            $('#job_' + elementName).after(error);
                        } else if (elementName == 'state') {
                            $('#job_' + elementName).after(error);
                        } else if (elementName == 'country') {
                            $('#job_' + elementName).after(error);
                        } else if (elementName == 'type') {
                            $('#job_' + elementName).after(error);
                        } else if (elementName == 'area') {
                            $('#job_' + elementName).after(error);
                        } else if (elementName == 'tags') {
                            $('#job_' + elementName).after(error);
                        } else if (elementName == 'details') {
                            $('#job_' + elementName).after(error);
                        } else if (elementName == 'role') {
                            $('#job_' + elementName).after(error);
                        } else if (elementName == 'exp') {
                            $('#job_' + elementName).after(error);
                        } else if (elementName == 'exp1') {
                            $('#job_' + elementName).after(error);
                        } else if (elementName == 'expyr') {
                            $('#job_' + elementName).after(error);
                        } else if (elementName == 'expyr1') {
                            $('#job_' + elementName).after(error);
                        } else if (elementName == 'jobtype') {
                            $('#job_' + elementName).after(error);
                        } else {
                            element.after(error);
                        }
                    },
                    submitHandler: function (form) {
            //if (confirm("Are you sure, do you want to create?")) {
            var country = $(".country_allresults").val();
            var title = $("#title").val();
            var employee = $("#employee").val();
            var state = $("#state").val();
            var city = $("#city").val();
            var type = $("#type").val();
            var area = $("#area").val();
            var role = $("#role").val();
            var exp = $("#exp").val();
            var exp1 = $("#exp1").val();
            if(exp1==''){
                exp1 = 'NULL';
            }
//            alert(exp1);
            var expyr = $("#expyr").val();
            var expyr1 = $("#expyr1").val();
            var Job_details = CKEDITOR.instances['details'].getData();
            var jobtype = $("#jobtype").val();
//            var Job_details = $(ckeditor).text();
            var tags=$("#tags").val();
            var start=$("#start").val();           
           
            var exp_date=$("#expdate").val();
            var status = $('#status').val();
            var updateid = $('#updatejobskill').data('id');
                                $.ajax({
                                    type: "POST",
                                    url: "ajaxdel.php?op=manage",
                                    data : {title: title, country: country, state: state, city: city , type: type, area: area, role: role, exp1: exp1,exp: exp, expyr: expyr, expyr1: expyr1, tags: tags, jobtype: jobtype, updateid: updateid, ckeditordesc: Job_details, start: start, exp_date: exp_date, status: status},
                                    cache: false,
                                    success: function(result){
//                                    if(result == 1)
//                                    {    
                                        alert('Updated Successfully');
                                     window.location.href = "jobs_manage.php";
//                                    }
                                    }
                                    });
//                                    form.submit();
                                    return true;
                    //} 
                                
                                
                                }
                         });
      

$('.country_allresults').change(function () {
                    var value = $(this).val();
                    var items = [];
                    var id=[];
                    var array = value.split(",");
                    $.each(array,function(i){
                              $.getJSON('country.json',function(data){
                        var data_length = Object.keys(data).length;
                                for(var j=0; j < data_length ; j++){
                                    if (data[j].country == array[i]) {
                                      items.push(data[j].id);
                            }
                          }
                        var state_name = items.join(",");
                    
                    $.ajax({
                        type: "POST",
                        url: "ajaxdel.php?op=addstate",
                        data: ({country_id: state_name}),
                        success: function (data) {
                            $("#state").html(data);
                        }
                    });
                    });
                             });
                });
                
                $('.state_allresults').change(function () {
                    var value = $(this).val();
                    var items = [];
                    var city = [];
                          var array = value;
                          $.each(array,function(i){
                              $.getJSON('state.json',function(data){
                                var data_length = Object.keys(data).length;
                                for(var j=0; j < data_length ; j++){
                                    if (data[j].state == array[i]) {
                                      items.push(data[j].id);
                                    }
                                }
                        var cities_name = items.join(",");
                                $.ajax({
                                    type: "POST",
                                    url: "ajaxdel.php?op=addcities",
                                    data: ({city_name: cities_name}),
                                    success: function (data) {
                                        $("#city").html(data);
                                    }
                                });
                        });
                    });
                });


</script>     
<script>

            $(document).click(function(){
                var country = $("input.country_allresults").val();

                if(country == ''){$("input.country_allresults").attr('placeholder', "Select Country");}
                if(country != ''){$("input.country_allresults").attr('placeholder', "");}
            });
        </script>
        
        <script>
                var updateid=$("#postjob").data('id');
                if( updateid != ''){
                    var val=$('#exp').val();
                    if(val == 'fresher'){
                        var val_month = $('#exp1 :selected').val();
                        $('.month').hide();
                    } else {
                        $('.month').show();
                    }
                }

                $('#exp').change(function(){
                    var val=$(this).val();
                    if(val == 'fresher'){
                        $('.month').hide();
                        var val_month = $('#exp1').val('');
                    } else {
                        $('.month').show();
                    }
                });
            $.validator.addMethod("month", function(val, element) {
                var val_year = $('#exp :selected').val(); 
                    if(val == 0 && val_year == 0) { 
                       return false 
                    }else{
                        return true
                    }
                }, "Year and month cannot be zero");

            </script>
                    
                