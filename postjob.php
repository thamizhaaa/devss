<?php
include('config.php');
@include("user_sessioncheck.php");
if($empuser_id == "")
{    
    header('Location: index.php'); 
}

$name = $_SESSION["empuser_name"];
$id = $_SESSION['empuser_id'];


$edit_id=$_GET['jobcode']; 
                        $sql="select * from `tbl_postjob` where `fld_id`=$edit_id";
                        $res=mysql_query($sql);
                        while($row=mysql_fetch_assoc($res)){
                            $editid=$row['fld_id'];
                            $title=$row['fld_jobtitle'];
                            $country=$row['fld_country'];
                            $state=$row['fld_state'];
                            $city=$row['fld_location'];
                            $industry_type=$row['fld_industry_type'];
                            $functional_area=$row['fld_functional_area'];
                            $role1=$row['fld_role'];
                            $job_type=$row['fld_job_type'];
                            $exp=$row['fld_experience'];
                            $salary=$row['fld_salary'];
                            $expire_date=$row['fld_expirydate'];
                            $skills=$row['fld_keyskills'];
                            $description=$row['fld_description'];
                        }
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
<!DOCTYPE html>
<html lang="en">
<head>
    <meta http-equiv="content-type" content="text/html;charset=UTF-8" />   
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="vinforma">
    <title>Post Job | Employer | Staffingspot | Job Portal</title>
    <link rel="icon" href="images/favicon.ico" type="image/x-icon">

    <!-- BOOTSTRAPE STYLESHEET CSS FILES -->
    <link rel="stylesheet" href="css/bootstrap.min.css">

    <!-- JQUERY SELECT -->
    <link href="css/select2.min.css" rel="stylesheet" />

    <!-- JQUERY MENU -->
    <link rel="stylesheet" href="css/mega_menu.min.css">

    <!-- ANIMATION -->
    <link rel="stylesheet" href="css/animate.min.css">

    <!-- OWl  CAROUSEL-->
    <link rel="stylesheet" href="css/owl.carousel.css">
    <link rel="stylesheet" href="css/owl.style.css">

    <!-- TOASTER CSS -->
    <link rel="stylesheet" href="css/toastr.min.css">
    <link rel="stylesheet" href="css/jquery.tagsinput.min.css">
    <!-- TEMPLATE CORE CSS -->
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="css/style1.css">
    <link rel="stylesheet" href="css/mobile.css">

    <!-- FONT AWESOME -->
    <link rel="stylesheet" type="text/css" href="css/font-awesome.min.css">
    <link rel="stylesheet" href="css/et-line-fonts.css" type="text/css">

    <!-- Google Fonts -->
    <link href="http://fonts.googleapis.com/css?family=Source+Sans+Pro:400,600,700,900,300" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:400,600,700" rel="stylesheet" type="text/css">
    
    <!-- JavaScripts -->
    <script src="js/modernizr.js"></script>
    
    
    
        <!-- JAVASCRIPT JS  -->
        <script type="text/javascript" src="js/jquery-3.1.1.min.js"></script>
    

        <!-- BOOTSTRAP CORE JS -->
        <script type="text/javascript" src="js/bootstrap.min.js"></script>


<script src="//cdn.ckeditor.com/4.5.5/standard/ckeditor.js"></script>
    

</head>

<body>
    <div class="page category-page">
        <div id="spinner">
            <div class="spinner-img">
                <img alt="" src="images/loader.svg" />
                <h2>Please Wait...</h2>
            </div>
        </div>

        <?php @include("top.php");?>
        <div class="clearfix"></div>
        <section class="job-breadcrumb">
            <div class="container">
                <div class="row">
                    <div class="col-md-6 col-sm-7 co-xs-12 text-left">
                        <h3>Post Your Jobs</h3>
                    </div>
                    <div class="col-md-6 col-sm-5 co-xs-12 text-right">
                        <div class="bread">
                            <ol class="breadcrumb">
                                <li><a href="company-dashboard.php">Dashboard</a>
                                </li>
                               
                                <li class="active">Post Jobs</li>
                            </ol>
                        </div>
                    </div>
                </div>
            </div>
        </section>
     
        <?php @include("emptop.php");?>
        
        <section class="dashboard-body">
            <div class="container">
                <div class="row">
                    <div class="col-md-12 col-sm-12 col-xs-12">
                      <?php 
                      @include("empleftpanel.php");
                      ?>
                        <div class="col-md-8 col-sm-8 col-xs-12" id="postjobtab">
                            <div class="Heading-title-left black small-heading">
                            <?php if($edit_id == ''){ ?>
                                <h3>Post A New job</h3>
                            <?php } else { ?>
                            <h3>Edit Posted Job</h3>
                            <?php } ?>
                            </div>
                        <div class="post-job2-panel">
                            <form class="row" id="post_job" enctype="multipart/formdata" method="post" action="">
                                <div class="col-md-12 col-sm-12 col-xs-12">
                                    <div class="form-group">
                                        <label>Job Title <span class="required">*</span></label>
                                        <input type="text" placeholder="Job Title" id="title" name="title" class="form-control mh" value="<?php echo $title; ?>">
                                    </div>
                                </div>
                                <div class="col-md-12 col-sm-12 col-xs-12">
                                <div class="form-group" id="ctry-edt">
                                    <label>Country <span class="required">*</span></label>
                                    <input type='text'
                                        value='<?php echo $country; ?>'
                                        placeholder='Select Country'
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

                                    <div id="job_country"></div>
                                    </div>
                                </div>
                                <div class="col-md-12 col-sm-12 col-xs-12">
                                    <div class="form-group">
                                    <label>State <span class="required">*</span></label>
                                    <!--<span class="state">-->
                                        <select id="state" name="state" class="questions-category form-control state_allresults" data-placeholder="Select state" multiple="true">
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
                                <div class="col-md-12 col-sm-12 col-xs-12">
                                    <div class="form-group">
                                <label>City <span class="required">*</span></label>
                                    <select id="city" name="city" class="questions-category form-control" data-placeholder="Select city" multiple="true">
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
                              
                                <div class="col-md-12 col-sm-12 col-xs-12">
                                    <div class="form-group">
                                        <label>Industry Type <span class="required">*</span></label>
                                        
                                       
                                        <select id="type" name="type" class="questions-category form-control" data-placeholder="Select Industry Type">
                                            <option value="">Select Industry Type</option>
                                            <?php 
                                        $sql="select * from `tbl_industry_type` where fld_delstatus=1 OR fld_delstatus=0";
                                        $res=mysql_query($sql);
                                            while($rows=mysql_fetch_assoc($res))
                                        {
                                                $roles=explode(",", $industry_type);
                                                foreach($roles as $role)
                                                {
                                        ?>
                                            <option  <?php if($role == $rows['fld_industrytype']){echo("selected");}?>  value="<?php echo $rows['fld_industrytype'];?>" ><?php echo $rows['fld_industrytype'];?></option>
                                            
                                        <?php } }?></select>
                                        <div id="job_type"></div>
                                    </div>
                                </div>
                                <div class="col-md-12 col-sm-12 col-xs-12">
                                    <div class="form-group">
                                        <label>Functional Area <span class="required">*</span></label>
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
                                        
                                        </select><div id="job_area"></div>
                                        
                                    </div>
                                </div>
                                 <div class="col-md-6 col-sm-6 col-xs-12">
                                    <div class="form-group">
                                        <label>Role <span class="required"> *</span></label>
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
                                            
                                        </select><div id="job_role"></div>
                                        
                                    </div>
                                </div>
                                <div class="col-md-6 col-sm-6 col-xs-12">
                                    <div class="form-group">
                                        <label>Job Type <span class="required"> *</span></label>
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
                                <div class="col-md-12 col-sm-12 col-xs-12">
                    <div class="form-group">
                    <label>Job Experience <span class="required"> *</span></label>                  
                                    <div class="row">
                                        <div class="col-md-6 col-sm-6 col-xs-6 Exp">
                                            <div class="form-group">
                                                <label class="nb">Year</label>
                        <?php 
                                        $roles=explode(",", $exp);
                                        ?>
                                                <select  id="exp" name="exp" class="questions-category form-control" data-placeholder="Select Year">
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
                                            <option value="35"<?php if($roles[0] == "35" )echo 'selected';?>>35+ </option>
                                                </select>
                                                <div id="job_exp"></div>
                                            </div>
                                        </div>

                                        <div class="col-md-6 col-sm-6 col-xs-6 month"> 
                                            <label class="nb">Month </label>
                                            <select id="exp1" name="exp1" class="questions-category form-control" data-placeholder="Select Month">
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
                                </div>
                                
                                
                                <div class="col-md-12 col-sm-12 col-xs-12">
                                    
                                    <div class="form-group">
                                        <label>Salary <span class="required"> *</span></label>
                                        <div class="row">
                                            <div class="col-md-6 col-sm-6 col-xs-6 Exp">
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
                                        
                                            <div class="col-md-6 col-sm-6 col-xs-6 Expyr1">  
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
                                </div>
                               
                                <div class="col-md-12 col-sm-12 col-xs-12">
                                    <div class="form-group">
                                        <label>Expiry Date <span class="required"> *</span></label>
                                            <input class=" form-control exp_date mh" placeholder="Expiry date" type="text" id="datepicker" name="exp_date" value="<?php echo $expire_date;?>"  />
                                    </div>
                                </div>
                                <div class="col-md-12 col-sm-12 col-xs-12">
                                    <div class="form-group">
                                        <label>Key Skills <span class="required"> *</span></label>
                                        <input type="text" id="tags" name="tags" class="form-control" value="<?php echo $skills;?>" data-placeholder="Enter Skills..." data-role="tagsinput">
                                        <div id="job_tags"></div>
                                    </div>
                                </div>
                                <div class="col-md-12 col-sm-12 col-xs-12">
                                    <div class="form-group">
                                        <label>Job Description <span class="required"> *</span></label>
                                        <textarea name="details" class="ckeditor" id="Job_details"><?php echo $description;?></textarea>
                                        <div id="job_details"></div>
                                    </div>
                                </div>
                                <div class="col-md-12 col-sm-12 col-xs-12">    
                                    <?php if($edit_id == ''){ ?>
                                    <input type="submit" class="btn btn-default pull-right" id="postjob" data-id="<?php echo $editid ;?>" name="submit" value="Post Job"/>
                                    <?php } else { ?>
                                    <input type="submit" class="btn btn-default pull-right" id="postjob" data-id="<?php echo $editid ;?>" name="submit" value="Update Job"/>
                                    <?php } ?>
                                </div>
                            </form>
                        </div>
                    </div>      

                    <!-- Edit job Tab Start-->

<?php 
$imgurl = 'http://'.$_SERVER['HTTP_HOST']."/"."images/nopicture.jpg";
$pinimgpath = urlencode($imgurl);
$pagetitle = "Staffing Spot-Job Portal";

$current_page_url = 'http://' . $_SERVER['HTTP_HOST'] . $_SERVER['REQUEST_URI'];
?>





                    </div>
                </div>
            </div>
        </section>

       <?php @include("bottom.php");?>

    
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

        <!-- TOASTER JS -->
        <script type="text/javascript" src="js/toastr.min.js"></script>

        <!-- CORE JS -->
        <script type="text/javascript" src="js/custom.js"></script>

        
        <!-- DATEPICKER -->
            <link href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.5.0/css/bootstrap-datepicker.css" rel="stylesheet">        
            <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.5.0/js/bootstrap-datepicker.js"></script>
            <script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>

         <script type="text/javascript" src="js/jquery.tagsinput.min.js"></script>
        <script type="text/javascript">
            $('#tags').tagsInput({
                width: 'auto'
            });
        </script>
       
        <link href="scripts/ddl/jquery.flexdatalist.css" rel="stylesheet" type="text/css">
<link href="scripts/ddl/jquery.flexdatalist.min.css" rel="stylesheet" type="text/css">
<script src="scripts/ddl/jquery.flexdatalist.min.js"></script>
<script src="scripts/ddl/jquery.flexdatalist.js"></script>


<script>
$("#datepicker").keypress(function(event) {event.preventDefault();});
 $('.country_allresults').flexdatalist({
     minLength: 1,
     valueProperty: '*',
     selectionRequired: true, 
     textProperty: '{country}',
     searchIn: 'country',
     data: 'country.json'
});
</script>
       
       <?php
       if($sum==0)
       {
            $resumedetails =  "You Job skills haven't find New Resumes";
       }
       elseif ($sum==1) {
           
           $resumedetails =  "You Job skills got $sum New Resume";
       }
       else
       {
        $resumedetails =  "You Job skills got $sum New Resumes";
       }
       ?>

        <script type="text/javascript">
            toastr.options = {
                "closeButton": true,
                "positionClass": "toast-bottom-left",
                "showMethod": "fadeIn",
                "hideMethod": "fadeOut"
            }
            toastr["success"]("<?php echo  $resumedetails; ?>", "Hello <?php echo $empname; ?>", {
                timeOut: 9000
            })
        </script>
<script src="//cdn.ckeditor.com/4.5.5/standard/ckeditor.js"></script>        
<script type="text/javascript" src="scripts/validate.min.js"></script>
<script>
var startDate = new Date();
 $('#datepicker').datepicker({
                        autoclose: true,
                        minViewMode: 3,
                        format: 'yyyy-mm-dd'
                    }).datepicker('setStartDate', startDate);

//                    $(document).ready(function () {
    
                $("#post_job").validate({
                    ignore: [],
                    rules: {
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
                        exp_date: {
                            required: true
                        },
                        tags:{
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
                    // messages: {
                    //     title: {
                    //         required: "Please provide job title"
                    // },
                    //     country: {
                    //         required: "Please select a country"
                    //     },
                    //     state: {
                    //         required: "Please select a state"
                    //     },
                    //     city: {
                    //         required: "Please select a city"
                    //     },
                    //     type: {
                    //         required: "Please select industry type"
                    //     },
                    //     area: {
                    //         required: "Please select a functional area "
                    //     },
                    //     role: {
                    //         required: "Please select a Role"
                    //     },
                    //     exp: {
                    //         required: "Please select year of experience"
                    //     },
                    //     exp1: {
                    //         required: "Please select month of experience"
                    //     },
                    //     expyr: {
                    //         required: "Please select expected salary in year"
                    //     },
                    //     expyr1: {
                    //         required: "Please expected salary in month"
                    //     },
                    //     jobtype: {
                    //         required: "Please provider a Job Type"
                    //     },
                    //     exp_date: {
                    //         required: "Please provide an expiry date"
                    //     },
                    //     tags:{
                    //         required: "Please provide keyskills"
                    //     },
                    //     details: {
                            
                    //         required:"Please provide job details"
                    //     }
                    // },


                     messages: {
                        title: {
                            required: "This Field is Required"
                    },
                        country: {
                            required: "This Field is Required"
                        },
                        state: {
                            required: "This Field is Required"
                        },
                        city: {
                            required: "This Field is Required"
                        },
                        type: {
                            required: "This Field is Required"
                        },
                        area: {
                            required: "This Field is Required"
                        },
                        role: {
                            required: "This Field is Required"
                        },
                        exp: {
                            required: "This Field is Required"
                        },
                        exp1: {
                            required: "This Field is Required"
                        },
                        expyr: {
                            required: "This Field is Required"
                        },
                        expyr1: {
                            required: "This Field is Required"
                        },
                        jobtype: {
                            required: "This Field is Required"
                        },
                        exp_date: {
                            required: "This Field is Required"
                        },
                        tags:{
                            required: "This Field is Required"
                        },
                        details: {
                            
                            required:"This Field is Required"
                        }
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
            swal({
                title: 'Are you sure?',
                text: "You want to update!",
                type: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Yes, Update it!',
                cancelButtonText: 'No, cancel!',
                confirmButtonClass: 'btn btn-success',
                cancelButtonClass: 'btn btn-danger',
                buttonsStyling: false
              }).then(function () {
            var country = $(".country_allresults").val();
            var title = $("#title").val();
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
                        var Job_details = CKEDITOR.instances['Job_details'].getData();
            var jobtype = $("#jobtype").val();
                        //var Job_details = $(ckeditor).text();
            var tags=$("#tags").val();
                        var exp_date=$(".exp_date").val();
                        var updateid=$("#postjob").data('id');
                        
                        if(updateid == ''){
                                $.ajax({
                           type: "POST",
                           url: "featured-jobs.php?op=addinfo",
                                    data : {title: title, country: country, state: state, city: city , type: type, area: area, role: role, exp1: exp1,exp: exp, expyr: expyr, expyr1: expyr1, tags: tags, jobtype: jobtype, ckeditor: Job_details, exp_date: exp_date},
                           success: function(data){ 
                               var data1=$.trim(data);
                               if(data1=='true')
                               {
                   swal(
                        '',
                        'Details has been Inserted Successfully!',
                        'success'
                    )
                                $('.swal2-confirm').click(function(){
                                      $(location).attr('href', 'company-dashboard-featured-jobs.php');
                                  });
                                
                               }
                                                               
                                    }
                                
                                  });
                           
                        } else {
                            $.ajax({
                            type: "POST",
                            url: "featured-jobs.php?op=updatejob",
                            data : {title: title, country: country, state: state, city: city , type: type, area: area, role: role, exp1: exp1,exp: exp, expyr: expyr, expyr1: expyr1, tags: tags, jobtype: jobtype, updateid: updateid, ckeditordesc: Job_details, exp_date: exp_date},
                            success: function(data){  
                swal(
                        '',
                        'Details has been Updated Successfully!',
                        'success'
                    )  
                                $('.swal2-confirm').click(function(){
                                      window.history.back();
                                  });
                            
                            }
                            });
                            
                        }
                                    return true;
                    }, function (dismiss) {
                // dismiss can be 'cancel', 'overlay',
                // 'close', and 'timer'
                if (dismiss === 'cancel') {
                  swal(
                'Cancelled',
                '',
                'error'
                  )
                $('.swal2-confirm').click(function(){
                                      location.reload();
                                  });
                }
            })
                                
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
                        url: "featured-jobs.php?op=addstate",
                        data: ({state_name: state_name}),
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
                                    url: "featured-jobs.php?op=addcities",
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
        


    </div>
</body>
</html>