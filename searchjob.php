<?php
include ("config.php");


//$pagin_query =mysql_query("select count(*) as total  from  employer");
//	$pagin_row=mysql_fetch_array($pagin_query);
//	$total=$pagin_row['total'];
//	$dis=8;
//	$total_page=ceil($total/$dis);
//	$page_cur=(isset($_GET['page']))?$_GET['page']:1;
//	$k=($page_cur-1)*$dis;
//

	
$kw = $_REQUEST['searchtext'];
$location = $_REQUEST['jobsearch'];

?>



<!DOCTYPE html>
<html lang="en">


<!-- Mirrored from templates.Staffing Spot.com/opportunities-v3/demo/job-category1.php by HTTrack Website Copier/3.x [XR&CO'2014], Tue, 07 Mar 2017 01:56:39 GMT -->
<head>
    <meta http-equiv="content-type" content="text/html;charset=UTF-8" />
    <!--[if IE]>
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
<![endif]-->
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="Vinformax">
    <title>Staffing Spot</title>
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

    <!-- TEMPLATE CORE CSS -->
    <link rel="stylesheet" href="css/style.css">

    <!-- FONT AWESOME -->
    <link rel="stylesheet" type="text/css" href="css/font-awesome.min.css">
    <link rel="stylesheet" href="css/et-line-fonts.css" type="text/css">

    <!-- Google Fonts -->
    <link href="http://fonts.googleapis.com/css?family=Source+Sans+Pro:400,600,700,900,300" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:400,600,700" rel="stylesheet" type="text/css">
	
    <!-- JavaScripts -->
    <script src="js/modernizr.js"></script>
	
    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
        <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
<![endif]-->
    
</head>

<body>
    <div class="page category-page">
        <div id="spinner">
            <div class="spinner-img">
                <img alt="Staffing Spot - the spot for your career" src="images/loader.svg" />
                <h2>Please Wait...</h2>
            </div>
        </div>

            <nav id="menu-1" class="mega-menu fa-change-black" data-color=""> 
        <section class="menu-list-items container"> 
            <ul class="menu-logo">
                <li> <a href="index.php"> <img src="images/logo.png" alt="logo" class="img-responsive"> </a> </li>
            </ul>
            <ul class="menu-links pull-right">
                <li> <a href="javascript:void(0)"> Home <i class="fa fa-angle-down fa-indicator"></i></a>
                    <ul class="drop-down-multilevel">
                        <li><a href="javascript:void(0)">Home Style  <label class="label label-info">New</label> <i class="fa fa-angle-right fa-indicator"></i> </a> 
                        	<ul class="drop-down-multilevel">
                                <li><a href="index.php"><i class="fa fa-angle-right"></i> Home Default</a></li>
                                <li><a href="index2.php"><i class="fa fa-angle-right"></i> Home Text Rotator</a></li>
                                <li><a href="index3.php"><i class="fa fa-angle-right"></i> Home Transparent</a></li>
                                <li><a href="index4.php"><i class="fa fa-angle-right"></i> Home With Slider</a></li>
                                <li><a href="index5.php"><i class="fa fa-angle-right"></i> Home 5 (Static Sections)</a></li>
                                <li><a href="index6.php"><i class="fa fa-angle-right"></i> Home Advance Search</a></li>
                                <li><a href="index7.php"><i class="fa fa-angle-right"></i> Home Map <label class="label label-info">New</label></a></li>
                                <li><a href="index8.php"><i class="fa fa-angle-right"></i> Home Search Header <label class="label label-info">New</label></a></li>
                            </ul>
                        </li>
                        <li><a href="javascript:void(0)">Headers <i class="fa fa-angle-right fa-indicator"></i> </a> 
                        	<ul class="drop-down-multilevel">
                                <li><a href="index7.php"> <i class="fa fa-forumbee"></i> Fixed Menu </a></li>
                                <li><a href="index.php"> <i class="fa fa-hotel"></i> Fixed Search </a></li>
                            </ul>
                        </li>
                        <li><a href="javascript:void(0)">Breadcrumb <i class="fa fa-angle-right fa-indicator"></i> </a> 
                        	<ul class="drop-down-multilevel">
                                <li><a href="aboutus.php"> <i class="fa fa-forumbee"></i> Breadcrumb style 1</a></li>
                                <li><a href="breadcrumb-2.php"> <i class="fa fa-hotel"></i> Breadcrumb style 2</a></li>
                                <li><a href="breadcrumb-3.php"> <i class="fa fa-automobile"></i> Breadcrumb style 3</a></li>
                                <li><a href="breadcrumb-4.php"> <i class="fa fa-automobile"></i> Breadcrumb style 4</a></li>
                                <li><a href="breadcrumb-5.php"> <i class="fa fa-automobile"></i> Breadcrumb style 5</a></li>
                                <li><a href="breadcrumb-6.php"> <i class="fa fa-automobile"></i> Breadcrumb style 6</a></li>
                            </ul>
                        </li>
                        <li><a href="javascript:void(0)">Footer <i class="fa fa-angle-right fa-indicator"></i> </a> 
                        	<ul class="drop-down-multilevel">
                                
                                <li><a href="footer-normal.php"> <i class="fa fa-hotel"></i> Footer Normal</a></li>
                                <li><a href="footer-small.php"> <i class="fa fa-automobile"></i> Footer Small</a></li>
                            </ul>
                        </li>
                    </ul>
                </li>
                <li><a href="javascript:void(0)"> Pages <i class="fa fa-angle-down fa-indicator"></i></a> 
                    
                    <ul class="drop-down-multilevel">
                    	<li><a href="users.php">Freelancers</a></li>
                        <li><a href="javascript:void(0)">Job Detail Pages <label class="label label-info">New</label> <i class="fa fa-angle-right fa-indicator"></i> </a> 
                                <ul class="drop-down-multilevel left-side">
                                    <li><a href="single-job.php"> <i class="fa fa-forumbee"></i> Single Job Style 1</a></li>
                                    <li><a href="single-job2.php"> <i class="fa fa-hotel"></i> Single Job Style 2</a></li>
                                    <li><a href="single-job3.php"> <i class="fa fa-automobile"></i> Single Job Style 3 <label class="label label-info">New</label> </a></li>
                                </ul>
                            </li>
                        <li><a href="javascript:void(0)">About Us <i class="fa fa-angle-right fa-indicator"></i> </a> 
                            <ul class="drop-down-multilevel left-side">
                                <li><a href="aboutus.php"> <i class="fa fa-forumbee"></i> About Us 1</a></li>
                                <li><a href="aboutus2.php"> <i class="fa fa-hotel"></i> About Us 2</a></li>
                                <li><a href="aboutus3.php"> <i class="fa fa-automobile"></i> About Us 3</a></li>
                            </ul>
                        </li>
                        <li><a href="javascript:void(0)">Contact Us <i class="fa fa-angle-right fa-indicator"></i> </a> 
                            <ul class="drop-down-multilevel left-side">
                                <li><a href="contactus.php"> <i class="fa fa-forumbee"></i> Contact Us 1</a></li>
                                <li><a href="contactus2.php"> <i class="fa fa-hotel"></i> Contact Us 2</a></li>
                                <li><a href="contactus3.php"> <i class="fa fa-automobile"></i> Contact Us 3</a></li>
                                <li><a href="contactus4.php"> <i class="fa fa-bookmark"></i> Contact Us 4</a></li>
                                <li><a href="contactus5.php"> <i class="fa fa-bell"></i> Contact Us 5</a></li>
                            </ul>
                        </li>
                        <li><a href="javascript:void(0)">Login pages <i class="fa fa-angle-right fa-indicator"></i> </a> 
                            <ul class="drop-down-multilevel left-side">
                                <li><a href="login.php"> <i class="fa fa-forumbee"></i> Login Style 1</a></li>
                                <li><a href="login-2.php"> <i class="fa fa-hotel"></i> Login Style 2</a></li>
                                <li><a href="login-3.php"> <i class="fa fa-automobile"></i> Login Style 3</a></li>
                                <li><a href="login-4.php"> <i class="fa fa-bookmark"></i> Login Style 4</a></li>
                                <li><a href="login-5.php"> <i class="fa fa-bell"></i> Login Style 5</a></li>
                            </ul>
                        </li>
                        <li><a href="javascript:void(0)">Registration pages <i class="fa fa-angle-right fa-indicator"></i> </a> 
                            <ul class="drop-down-multilevel left-side">
                                <li><a href="register.php"> <i class="fa fa-forumbee"></i> Register Style 1</a></li>
                                <li><a href="register-2.php"> <i class="fa fa-hotel"></i> Register Style 2</a></li>
                                <li><a href="register-3.php"> <i class="fa fa-automobile"></i> Register Style 3</a></li>
                                <li><a href="register-4.php"> <i class="fa fa-bookmark"></i> Register Style 4</a></li>
                                <li><a href="register-5.php"> <i class="fa fa-bell"></i> Register Style 5</a></li>
                            </ul>
                        </li>
                        <li><a href="javascript:void(0)">Coming Soon Pages <i class="fa fa-angle-right fa-indicator"></i> </a> 
                            <ul class="drop-down-multilevel left-side">
                                <li><a href="comingsoon.php"> <i class="fa fa-forumbee"></i> Coming Soon 1</a></li>
                                <li><a href="comingsoon2.php"> <i class="fa fa-hotel"></i> Coming Soon 2</a></li>
                                <li><a href="comingsoon3.php"> <i class="fa fa-automobile"></i> Coming Soon 3</a></li>
                                <li><a href="comingsoon4.php"> <i class="fa fa-bookmark"></i> Coming Soon 4</a></li>
                                <li><a href="comingsoon5.php"> <i class="fa fa-bell"></i> Coming Soon 5</a></li>
                            </ul>
                        </li>
                        <li><a href="javascript:void(0)">Error 404 Pages<i class="fa fa-angle-right fa-indicator"></i> </a> 
                            <ul class="drop-down-multilevel left-side">
                                <li><a href="404.php"> <i class="fa fa-forumbee"></i> 404 Style 1</a></li>
                                <li><a href="404-2.php"> <i class="fa fa-hotel"></i> 404 Style 2</a></li>
                                <li><a href="404-3.php"> <i class="fa fa-automobile"></i> 404 Style 3</a></li>
                                <li><a href="404-4.php"> <i class="fa fa-bookmark"></i> 404 Style 4</a></li>
                            </ul>
                        </li>
                    </ul>
                </li>
                <li><a href="javascript:void(0)">Mega Menu <i class="fa fa-angle-down fa-indicator"></i></a> 
                    <div class="grid-col-12 drop-down"> 
                        <div class="grid-row"> 
                            <div class="grid-col-2">
                                <h4>Company Pages</h4>
                                <ul>
                                    <li><a href="company-dashboard.php"> <i class="fa fa-angle-right"></i> Dashboard</a></li>
                                    <li><a href="company-dashboard-edit-profile.php"> <i class="fa fa-angle-right"></i> Edit Profile</a></li>
                                    <li><a href="company-dashboard-active-jobs.php"> <i class="fa fa-angle-right"></i> Active Jobs</a></li>
                                    <li><a href="company-dashboard-followers.php"> <i class="fa fa-angle-right"></i> Followers</a></li>
                                    <li><a href="company-dashboard-resume.php"> <i class="fa fa-angle-right"></i> Job Resume</a></li>
                                    <li><a href="elements.php"> <i class="fa fa-angle-right"></i> UI Elements <label class="label label-info">New</label></a></li>
                                </ul>
                            </div>
                            <div class="grid-col-2">
                                <h4>User Pages</h4>
                                <ul>
                                    <li><a href="user-dashboard.php"> <i class="fa fa-angle-right"></i> User Dashboard</a></li>
                                    <li><a href="user-edit-profile.php"> <i class="fa fa-angle-right"></i> User Edit Profile</a></li>
                                    <li><a href="user-followed-companies.php"> <i class="fa fa-angle-right"></i> Followed Companies</a></li>
                                    <li><a href="user-job-applied.php"> <i class="fa fa-angle-right"></i> Job Applied</a></li>
                                    <li><a href="user-resume.php"> <i class="fa fa-angle-right"></i> Use Resume</a></li>
                                    <li><a href="users.php"> <i class="fa fa-angle-right"></i> All Users </a></li>
                                    <li><a href="user-resume-build.php"> <i class="fa fa-angle-right"></i> Build Resume  <label class="label label-info">New</label></a></li>
                                </ul>
                            </div>
                            <div class="grid-col-2">
                                <h4>Blog Pages</h4>
                                <ul>
                                    <li><a href="blog1.php"> <i class="fa fa-angle-right"></i> Grid Right sidebar</a></li>
                                    <li><a href="blog2.php"> <i class="fa fa-angle-right"></i> Blog No Sidebar</a></li>
                                    <li><a href="blog3.php"> <i class="fa fa-angle-right"></i> Blog Listing</a></li>
                                    <li><a href="blog4.php"> <i class="fa fa-angle-right"></i> Left Sidebar</a></li>
                                    <li><a href="blog5.php"> <i class="fa fa-angle-right"></i> Grid Right sidebar </a></li>
                                    <li><a href="blog-single.php"> <i class="fa fa-angle-right"></i> Single Blog 1</a></li>
                                    <li><a href="blog-single2.php"> <i class="fa fa-angle-right"></i> Single Blog 2</a></li>
                                </ul>
                            </div>
                            <div class="grid-col-2">
                                <h4>Job pages</h4>
                                <ul>
                                    <li><a href="job-category1.php"> <i class="fa fa-angle-right"></i> Job Listing 1</a></li>
                                    <li><a href="job-category2.php"> <i class="fa fa-angle-right"></i> Job Listing 2</a></li>
                                    <li><a href="post-job.php"> <i class="fa fa-angle-right"></i> Job Post 1</a></li>
                                    <li><a href="post-job2.php"> <i class="fa fa-angle-right"></i> Job Post 2</a></li>
                                    <li><a href="post-job3.php"> <i class="fa fa-angle-right"></i> Job Post 3 </a></li>
                                    <li><a href="post-job-wizard.php"> <i class="fa fa-angle-right"></i> Job Post Wizard</a></li>
                                </ul>
                            </div>
                            <div class="grid-col-2">
                                <h4>Resume Pages</h4>
                                <ul>
                                    <li><a href="resume.php"> <i class="fa fa-angle-right"></i> Resume Style 1</a></li>
                                    <li><a href="resume2.php"> <i class="fa fa-angle-right"></i> Resume Style 2</a></li>
                                    <li><a href="resume3.php"> <i class="fa fa-angle-right"></i> Resume Style 3</a></li>
                                    <li><a href="resume4.php"> <i class="fa fa-angle-right"></i> Resume Style 4</a></li>
                                    <li><a href="resume5.php"> <i class="fa fa-angle-right"></i> Resume Style 5 </a></li>
                                    <li><a href="resume6.php"> <i class="fa fa-angle-right"></i> Resume Style 6</a></li>
                                    <li><a href="resume7.php"> <i class="fa fa-angle-right"></i> Resume Style 7 <label class="label label-info">New</label></a></li>
                                </ul>
                            </div>
                            <div class="grid-col-2">
                                <h4>Other pages</h4>
                                <ul>
                                    <li><a href="single-job.php"> <i class="fa fa-angle-right"></i> Single Job 1</a></li>
                                    <li><a href="single-job2.php"> <i class="fa fa-angle-right"></i> Single job 2</a></li>
                                        <li><a href="single-job3.php"> <i class="fa fa-angle-right"></i> Single job 3 <label class="label label-info">New</label></a></li>
                                    <li><a href="pricing.php"> <i class="fa fa-angle-right"></i> Pricing Tables</a></li>
                                    <li><a href="faq.php"> <i class="fa fa-angle-right"></i> FAQ's</a></li>
                                    <li><a href="all-categories.php"> <i class="fa fa-angle-right"></i> All Categories</a></li>
                                    <li><a href="all-company.php"> <i class="fa fa-angle-right"></i> All Companies</a></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </li>
                <li class="no-bg"><a href="#" class="p-job"><i class="fa fa-plus-square"></i> Post a Job</a></li>
                <li class="no-bg login-btn-no-bg"><a href="#" class="login-header-btn"><i class="fa fa-sign-in"></i> Log in</a></li>
            </ul>
        </section>
    </nav>
    <div class="clearfix"></div>


        <div class="search">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-12 col-sm-12 col-xs-12 nopadding">
                        <div class="input-group">
                            <div class="input-group-btn search-panel">
                                <button type="button" class="btn btn-default dropdown-toggle" data-toggle="dropdown">
                                    <span id="search_concept">Filter By</span> <span class="caret"></span>
                                </button>
                                <ul class="dropdown-menu" role="menu">
                                    <li><a href="#">By Company</a></li>
                                    <li><a href="#">By Function</a></li>
                                    <li><a href="#">By City </a></li>
                                    <li><a href="#">By Salary </a></li>
                                    <li><a href="#">By Industry</a></li>
                                </ul>
                            </div>
                            <input type="hidden" name="search_param" value="all" id="search_param">
                            <input type="text" class="form-control search-field" name="x" placeholder="Search term...">
                            <span class="input-group-btn">
                        <button class="btn btn-default" type="button"><span class="fa fa-search"></span></button>
                            </span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <section class="breadcrumb-search parallex">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-12 col-sm-12 col-xs-12 nopadding">
                        <div class="col-md-8 col-sm-12 col-md-offset-2 col-xs-12 nopadding">
                            
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <section class="categories-list-page light-grey">
            <div class="container">
                <div class="row">
                    <div class="col-md-12 col-sm-12 col-xs-12 nopadding">
                        <div class="col-md-8 col-sm-12 col-xs-12">
                            <h4 class="search-result-text">Showing 10 of 60 available job(s)</h4>
                        </div>
                        <div class="col-md-8 col-sm-12 col-xs-12">
                            <div class="all-jobs-list-box">
                                                                 <?php
//                                                                 echo $k;
                                                                 //echo "select * from employer LIMIT $k,$dis" ;
     //$projects = array();
     // fetch data from the database
     $records = mysql_query("
SELECT * FROM tbl_skills WHERE (fld_skillset LIKE '%$kw%' OR fld_location LIKE '%$location%');
") or die("Query fail: " . mysqli_error());
//     $path=mysql_fetch_assoc($records) or die("Could not fetch array : " .mysqli_error($conn));
     
?>
                                
                                            <?php 
                                            //echo "sd";

    $projects = array();
    while ($project =  mysql_fetch_assoc($records))
    {
        $projects[] = $project;
    }
    foreach($projects as $project)
    {
//        header("Content-type: image/jpg");
//  echo $row['logo'];
?>
                                
                                <div class="job-box">
                                    <div class="col-md-2 col-sm-2 col-xs-12 hidden-xs hidden-sm">
                                        
                                        <div class="comp-logo">
<!--                                            <a href="#"> <img src="images/company/1.png" class="img-responsive" alt="Staffing Spot"></a>-->
                                             <?php //echo  $project['logo'];
                                               $test= "employer/".$project['fld_logo'];
                                               //echo $test;
                                             ?>
<!--                                            <img src="employer/logo/28939811473416622HJA2PZ.jpg" class="img-responsive" alt="Staffing Spot">-->
                                           
                                            <img src="<?=$test;?>" class="img-responsive" alt="Staffing Spot">
                                        </div>
                                    </div>
                                    <div class="col-md-6 col-sm-6 col-xs-12 nopadding">
        
                                        <div class="job-title-box">
                                           
                                
    
       
        <?php echo $project['fld_employer_name']; ?> <br><br>
        <?php echo $project['fld_location']; ?>
        
   

                                        </div>
                                    </div>

                                    <div class="col-md-2 col-sm-3 col-xs-6">
                                        <a href="#">
                                            <div class="job-type jt-remote-color">
                                                <i class="fa fa-clock-o"></i> <?php echo $project['fld_job_type']; ?>
                                            </div>
                                        </a>
                                    </div>
                                    <div class="col-md-2 col-sm-2 col-xs-12 nopadding">
<!--                                        <button  class="btn btn-primary btn-custom">Apply Now</button>-->
                                       
<button  class="btn btn-primary btn-custom"> <a href="single-job3.php?id=<?php echo $project['id'];  ?> ">Apply Now</a></button>
                                           

                                    </div>
                                </div>
                                <?php
    }
?>
<!--                                <div class="job-box">
                                    <div class="col-md-2 col-sm-2 col-xs-12  hidden-xs hidden-sm">
                                        <div class="comp-logo">
                                            <a href="#"> <img src="images/company/5.png" class="img-responsive" alt="Staffing Spot"></a>
                                        </div>
                                    </div>
                                    <div class="col-md-6 col-sm-6 col-xs-12 nopadding">
                                        <div class="job-title-box">
                                            <a href="#">
                                                <div class="job-title"> Technical Documentation Specialist</div>
                                            </a>
                                            <a href="#"><span class="comp-name">conversi Pvt. Ltd.New York city United States</span></a>
                                        </div>
                                    </div>

                                    <div class="col-md-2 col-sm-3 col-xs-6">
                                        <a href="#">
                                            <div class="job-type jt-full-time-color"><i class="fa fa-clock-o"></i> Full time</div>
                                        </a>
                                    </div>
                                    <div class="col-md-2 col-sm-2 col-xs-12 nopadding">
                                        <button class="btn btn-primary btn-custom">Apply Now</button>
                                    </div>
                                </div>-->
<!--                                <div class="job-box">
                                    <div class="col-md-2 col-sm-2 col-xs-12  hidden-xs hidden-sm">
                                        <div class="comp-logo">
                                            <a href="#"> <img src="images/company/3.png" class="img-responsive" alt="Staffing Spot"></a>
                                        </div>
                                    </div>
                                    <div class="col-md-6 col-sm-6 col-xs-12 nopadding">
                                        <div class="job-title-box">
                                            <a href="#">
                                                <div class="job-title"> Assistant Engineer (IT/Networks)</div>
                                            </a>
                                            <a href="#"><span class="comp-name">conversi Pvt. Ltd. Singapure Malaysia</span></a>
                                        </div>
                                    </div>
                                    <div class="col-md-2 col-sm-3 col-xs-6">
                                        <a href="#">
                                            <div class="job-type jt-intern-color"><i class="fa fa-clock-o"></i> Internship</div>
                                        </a>
                                    </div>
                                    <div class="col-md-2 col-sm-2 col-xs-12 nopadding">
                                        <button class="btn btn-primary btn-custom">Apply Now</button>
                                    </div>
                                </div>-->
<!--                                <div class="job-box">
                                    <div class="col-md-2 col-sm-2 col-xs-12  hidden-xs hidden-sm">
                                        <div class="comp-logo">
                                            <a href="#"> <img src="images/company/4.png" class="img-responsive" alt="Staffing Spot"></a>
                                        </div>
                                    </div>
                                    <div class="col-md-6 col-sm-6 col-xs-12 nopadding">
                                        <div class="job-title-box">
                                            <a href="#">
                                                <div class="job-title"> Technical Network Director</div>
                                            </a>
                                            <a href="#"><span class="comp-name">conversi Pvt. Ltd. melbourne city Australia</span></a>
                                        </div>
                                    </div>
                                    <div class="col-md-2 col-sm-3 col-xs-6">
                                        <a href="#">
                                            <div class="job-type jt-part-time-color"><i class="fa fa-clock-o"></i> Part Time</div>
                                        </a>
                                    </div>
                                    <div class="col-md-2 col-sm-2 col-xs-12 nopadding">
                                        <button class="btn btn-primary btn-custom">Apply Now</button>
                                    </div>
                                </div>-->
<!--                                <div class="job-box">
                                    <div class="col-md-2 col-sm-2 col-xs-12 hidden-xs hidden-sm">
                                        <div class="comp-logo">
                                            <a href="#"> <img src="images/company/1.png" class="img-responsive" alt="Staffing Spot"></a>
                                        </div>
                                    </div>
                                    <div class="col-md-6 col-sm-6 col-xs-12 nopadding">
                                        <div class="job-title-box">
                                            <a href="#">
                                                <div class="job-title"> Looking for Bootstrap designer</div>
                                            </a>
                                            <a href="#"><span class="comp-name">conversi Pvt. Ltd. Lahore Pakistan</span></a>
                                        </div>
                                    </div>

                                    <div class="col-md-2 col-sm-3 col-xs-6">
                                        <a href="#">
                                            <div class="job-type jt-remote-color"><i class="fa fa-clock-o"></i> Remote</div>
                                        </a>
                                    </div>
                                    <div class="col-md-2 col-sm-2 col-xs-12 nopadding">
                                        <button class="btn btn-primary btn-custom">Apply Now</button>
                                    </div>
                                </div>-->
<!--                                <div class="job-box">
                                    <div class="col-md-2 col-sm-2 col-xs-12  hidden-xs hidden-sm">
                                        <div class="comp-logo">
                                            <a href="#"> <img src="images/company/5.png" class="img-responsive" alt="Staffing Spot"></a>
                                        </div>
                                    </div>
                                    <div class="col-md-6 col-sm-6 col-xs-12 nopadding">
                                        <div class="job-title-box">
                                            <a href="#">
                                                <div class="job-title"> Technical Documentation Specialist</div>
                                            </a>
                                            <a href="#"><span class="comp-name">conversi Pvt. Ltd.New York city United States</span></a>
                                        </div>
                                    </div>

                                    <div class="col-md-2 col-sm-3 col-xs-6">
                                        <a href="#">
                                            <div class="job-type jt-full-time-color"><i class="fa fa-clock-o"></i> Full time</div>
                                        </a>
                                    </div>
                                    <div class="col-md-2 col-sm-2 col-xs-12 nopadding">
                                        <button class="btn btn-primary btn-custom">Apply Now</button>
                                    </div>
                                </div>-->
<!--                                <div class="job-box">
                                    <div class="col-md-2 col-sm-2 col-xs-12  hidden-xs hidden-sm">
                                        <div class="comp-logo">
                                            <a href="#"> <img src="images/company/3.png" class="img-responsive" alt="Staffing Spot"></a>
                                        </div>
                                    </div>
                                    <div class="col-md-6 col-sm-6 col-xs-12 nopadding">
                                        <div class="job-title-box">
                                            <a href="#">
                                                <div class="job-title"> Assistant Engineer (IT/Networks)</div>
                                            </a>
                                            <a href="#"><span class="comp-name">conversi Pvt. Ltd. Singapure Malaysia</span></a>
                                        </div>
                                    </div>
                                    <div class="col-md-2 col-sm-3 col-xs-6">
                                        <a href="#">
                                            <div class="job-type jt-intern-color"><i class="fa fa-clock-o"></i> Internship</div>
                                        </a>
                                    </div>
                                    <div class="col-md-2 col-sm-2 col-xs-12 nopadding">
                                        <button class="btn btn-primary btn-custom">Apply Now</button>
                                    </div>
                                </div>-->
<!--                                <div class="job-box">
                                    <div class="col-md-2 col-sm-2 col-xs-12  hidden-xs hidden-sm">
                                        <div class="comp-logo">
                                            <a href="#"> <img src="images/company/4.png" class="img-responsive" alt="Staffing Spot"></a>
                                        </div>
                                    </div>
                                    <div class="col-md-6 col-sm-6 col-xs-12 nopadding">
                                        <div class="job-title-box">
                                            <a href="#">
                                                <div class="job-title"> Technical Network Director</div>
                                            </a>
                                            <a href="#"><span class="comp-name">conversi Pvt. Ltd. melbourne city Australia</span></a>
                                        </div>
                                    </div>
                                    <div class="col-md-2 col-sm-3 col-xs-6">
                                        <a href="#">
                                            <div class="job-type jt-part-time-color"><i class="fa fa-clock-o"></i> Part Time</div>
                                        </a>
                                    </div>
                                    <div class="col-md-2 col-sm-2 col-xs-12 nopadding">
                                        <button class="btn btn-primary btn-custom">Apply Now</button>
                                    </div>
                                </div>-->
<!--                                <div class="job-box">
                                    <div class="col-md-2 col-sm-2 col-xs-12  hidden-xs hidden-sm">
                                        <div class="comp-logo">
                                            <a href="#"> <img src="images/company/3.png" class="img-responsive" alt="Staffing Spot"></a>
                                        </div>
                                    </div>
                                    <div class="col-md-6 col-sm-6 col-xs-12 nopadding">
                                        <div class="job-title-box">
                                            <a href="#">
                                                <div class="job-title"> Assistant Engineer (IT/Networks)</div>
                                            </a>
                                            <a href="#"><span class="comp-name">conversi Pvt. Ltd. Singapure Malaysia</span></a>
                                        </div>
                                    </div>
                                    <div class="col-md-2 col-sm-3 col-xs-6">
                                        <a href="#">
                                            <div class="job-type jt-intern-color"><i class="fa fa-clock-o"></i> Internship</div>
                                        </a>
                                    </div>
                                    <div class="col-md-2 col-sm-2 col-xs-12 nopadding">
                                        <button class="btn btn-primary btn-custom">Apply Now</button>
                                    </div>
                                </div>-->
<!--                                <div class="job-box">
                                    <div class="col-md-2 col-sm-2 col-xs-12  hidden-xs hidden-sm">
                                        <div class="comp-logo">
                                            <a href="#"> <img src="images/company/4.png" class="img-responsive" alt="Staffing Spot"></a>
                                        </div>
                                    </div>
                                    <div class="col-md-6 col-sm-6 col-xs-12 nopadding">
                                        <div class="job-title-box">
                                            <a href="#">
                                                <div class="job-title"> Technical Network Director</div>
                                            </a>
                                            <a href="#"><span class="comp-name">conversi Pvt. Ltd. melbourne city Australia</span></a>
                                        </div>
                                    </div>
                                    <div class="col-md-2 col-sm-3 col-xs-6">
                                        <a href="#">
                                            <div class="job-type jt-part-time-color"><i class="fa fa-clock-o"></i> Part Time</div>
                                        </a>
                                    </div>
                                    <div class="col-md-2 col-sm-2 col-xs-12 nopadding">
                                        <button class="btn btn-primary btn-custom">Apply Now</button>
                                    </div>
                                </div>-->
<!--                                <div class="job-box">
                                    <div class="col-md-2 col-sm-2 col-xs-12 hidden-xs hidden-sm">
                                        <div class="comp-logo">
                                            <a href="#"> <img src="images/company/1.png" class="img-responsive" alt="Staffing Spot"></a>
                                        </div>
                                    </div>
                                    <div class="col-md-6 col-sm-6 col-xs-12 nopadding">
                                        <div class="job-title-box">
                                            <a href="#">
                                                <div class="job-title"> Looking for Bootstrap designer</div>
                                            </a>
                                            <a href="#"><span class="comp-name">conversi Pvt. Ltd. Lahore Pakistan</span></a>
                                        </div>
                                    </div>

                                    <div class="col-md-2 col-sm-3 col-xs-6">
                                        <a href="#">
                                            <div class="job-type jt-remote-color"><i class="fa fa-clock-o"></i> Remote</div>
                                        </a>
                                    </div>
                                    <div class="col-md-2 col-sm-2 col-xs-12 nopadding">
                                        <button class="btn btn-primary btn-custom">Apply Now</button>
                                    </div>
                                </div>-->
<!--                                <div class="job-box">
                                    <div class="col-md-2 col-sm-2 col-xs-12  hidden-xs hidden-sm">
                                        <div class="comp-logo">
                                            <a href="#"> <img src="images/company/5.png" class="img-responsive" alt="Staffing Spot"></a>
                                        </div>
                                    </div>
                                    <div class="col-md-6 col-sm-6 col-xs-12 nopadding">
                                        <div class="job-title-box">
                                            <a href="#">
                                                <div class="job-title"> Technical Documentation Specialist</div>
                                            </a>
                                            <a href="#"><span class="comp-name">conversi Pvt. Ltd.New York city United States</span></a>
                                        </div>
                                    </div>

                                    <div class="col-md-2 col-sm-3 col-xs-6">
                                        <a href="#">
                                            <div class="job-type jt-full-time-color"><i class="fa fa-clock-o"></i> Full time</div>
                                        </a>
                                    </div>
                                    <div class="col-md-2 col-sm-2 col-xs-12 nopadding">
                                        <button class="btn btn-primary btn-custom">Apply Now</button>
                                    </div>
                                </div>-->
                            </div>
                            <div class="col-md-12 col-sm-12 col-xs-12 nopadding">
                                <?php //if($total > $dis) { ?>
<!--                                <div class="pagination-box clearfix">
                                    <ul class="pagination" style="font-weight:bolder;">
                                    <?php if($page_cur>1) { ?>

<li class="disabled" ><a href="job-category1.php?page=<?php echo ($page_cur-1);?>">Prev</a></li>
<?php } else { ?>
<li class="active"><a>Prev</a></li>
<?php } for($i=1;$i<$total_page;$i++) {
	
		if($page_cur==$i)
		{ ?>
        <li class="active"><a><?php echo $i; ?></a></li>
  
  <?php } else { ?>
  <li class="disabled" ><a href="job-category1.php?page=<?php echo $i; ?>"><?php echo $i; ?></a></li>
  
  <?php } }
	if($page_cur<$total_page) {?>
    
    <li class="disabled" ><a href="job-category1.php?page=<?php echo ($page_cur+1); ?>">Next >></a></li>
    <?php } else { ?>
		
		<li class="active" ><a>Next >></a></li>
		<?php } ?>
		 
  
</ul>
<?php //} ?>
                             

                                </div>-->
                            </div>
                        </div>
<!--                        <div class="col-md-4 col-sm-12 col-xs-12">
                            <aside>
                                <div class="widget">
                                    <div class="widget-heading"><span class="title">Hot Categories</span></div>
                                    <ul class="categories-module">
                                        <li> <a href="#"> Computer and IT <span>(1021)</span> </a> </li>
                                        <li> <a href="#"> Construction / Facilities <span>(54)</span> </a> </li>
                                        <li> <a href="#"> Telecommunications<span>(13)</span> </a> </li>
                                        <li> <a href="#"> Real Estate<span>(23)</span> </a> </li>
                                        <li> <a href="#"> Healthcare <span>(42)</span> </a> </li>
                                    </ul>
                                </div>
                                <div class="widget">
                                    <div class="widget-heading"><span class="title">Hot Jobs</span></div>
                                    <ul class="related-post">
                                        <li>
                                            <a href="#">Assistant Manager Procurement </a>
                                            <span><i class="fa fa-map-marker"></i>Managgo, WC </span>
                                            <span><i class="fa fa-calendar"></i>March 22, 2015 - Apr 07, 2016 </span>
                                        </li>
                                        <li>
                                            <a href="#">Marketing Professionals Required</a>
                                            <span><i class="fa fa-map-marker"></i>Homelando, New Vage </span>
                                            <span><i class="fa fa-calendar"></i>Sep 01, 2015 - Aug 09, 2016</span>
                                        </li>
                                        <li>
                                            <a href="#">Mobile App Programmers </a>
                                            <span><i class="fa fa-map-marker"></i>Homelando, New Vage </span>
                                            <span><i class="fa fa-calendar"></i>Feb 01, 2015 - March 09, 2016 </span>
                                        </li>
                                        <li>
                                            <a href="#">General Compliance Officer</a>
                                            <span><i class="fa fa-map-marker"></i>Arlington, VA </span>
                                            <span><i class="fa fa-calendar"></i>Jun 01, 2015 - Feb 09, 2016</span>
                                        </li>
                                        <li>
                                            <a href="#">Call Centre Manager</a>
                                            <span><i class="fa fa-map-marker"></i>Managgo, WC  </span>
                                            <span><i class="fa fa-calendar"></i>Feb 01, 2015 - March 09, 2016</span>
                                        </li>
                                        <li>
                                            <a href="#">Assistant Manager Audit</a>
                                            <span><i class="fa fa-map-marker"></i>Heling, WC </span>
                                            <span><i class="fa fa-calendar"></i>Aug 01, 2015 - Sep 09, 2016 </span>
                                        </li>
                                        <li>
                                            <a href="#">Telesales Agent (UK Dialing)</a>
                                            <span><i class="fa fa-map-marker"></i>Somro, New </span>
                                            <span><i class="fa fa-calendar"></i>Sep 01, 2015 - Nov 09, 2016</span>
                                        </li>
                                        <li>
                                            <a href="#">Assistant Brand Manager</a>
                                            <span><i class="fa fa-map-marker"></i>Heritage, VA </span>
                                            <span><i class="fa fa-calendar"></i>Dec 01, 2015 - May 09, 2016</span>
                                        </li>
                                    </ul>
                                </div>

                            </aside>
                        </div>-->


                            <form id="form3" name="form3" method="post">
                             <?php
										$queryyyy = "select * from tbl_skills"; 
										$query1 = mysql_query($queryyyy);
                                                                                
										$counnt = mysql_num_fields($query1);
                                                                                
										$specheadinng=array();  
										$specheadinng1=array();  
										$tesst =array();
										$columnnamees = array();
										//$specname=array();
										$i=0;
										$j=0;
										while($propertyy = mysql_fetch_field($query1))
											{
											if($i>5 && $i<$counnt+3)
												{
													$specheadinng = $propertyy->name;
													$remove = array("fld_");
													$spec = str_replace($remove, "", $specheadinng);
													$spec1 = strtolower($spec);
													$specname = strtoupper($spec1);
													//echo $specname;									
													$columnnames[$j] = $specheadinng;													
													$tesst_fld[$j]=$specname;
                                                    $chkfield[$j]  = $spec1;
													$j++;														
												}
											$i++;
											}
										
											
											//$refarray[0];
											
                                        for($f=0;$f<$counnt-4;$f++)
    										{		
    										if($tesst_fld[$f] == 'JOB_TYPE')
											{
    										echo '<h4 style="margin-left: 15%;">BROWSE BY JOB TYPE</h4>';
											}
											else if($tesst_fld[$f] == 'EMPLOYER_NAME')
											{
    										echo '<h4 style="margin-left: 7%;">BROWSE BY COMPANY NAME</h4>';
											}
											else
											{
											echo '<h4 style="margin-left: 15%;">BROWSE BY '.$tesst_fld[$f].'</h4>';
											}
											
											
    										echo '<div class="panel-group" id="accordion">
    												<div class="panel panel-info">
    													<div id="specs">							
    														<ul class="filtersubmenu">';
											 		  
												$testing = "refine";
												$refarray = $testing.$f;
												$refarray = array();
												$querry1 = "select distinct $columnnames[$f] from postjob"; 
												$querry = mysql_query($querry1);
												$p=0;
												while($row = mysql_fetch_array($querry))
												{
												$refarray[$p] = $row[$columnnames[$f]];
                        
                if($refarray[$p] !="")
                {
                        if(in_array($refarray[$p],$splfilters))
                        {
                            echo '<li class="li_level3">
							<a><label class="label_check_level3">
							<input class="input_check_level3" type="checkbox" id="chkids" name="'.$columnnames[$f].'" value="'.$refarray[$p].'" checked="checked"/>'.$refarray[$p].'</label></a>
							</li>';    
                        }
                        else
                        {
                            echo '<li class="li_level3"><a><label class="label_check_level3"><input class="input_check_level3" type="checkbox" id="chkids" name="'.$columnnames[$f].'" value="'.$refarray[$p].'"/>'.$refarray[$p].'</label></a></li>';
                        }
                }
													$p++;				
												}												
										
    														echo '</ul>							
    													</div>
    												</div> 	  
    											  </div>';										
    										}
                                    ?>
                                    </form>


                    </div>
                </div>
            </div>
        </section>

        <div class="brand-logo-area clients-bg">
            <div class="clients-list">
                <div class="client-logo">
                    <a href="#"><img src="images/clients/client_1.png" class="img-responsive" alt="Brand Image" /></a>
                </div>
                <div class="client-logo">
                    <a href="#"><img src="images/clients/client_2.png" class="img-responsive" alt="Brand Image" /></a>
                </div>
                <div class="client-logo">
                    <a href="#"><img src="images/clients/client_3.png" class="img-responsive" alt="Brand Image" /></a>
                </div>
                <div class="client-logo">
                    <a href="#"><img src="images/clients/client_4.png" class="img-responsive" alt="Brand Image" /></a>
                </div>
                <div class="client-logo">
                    <a href="#"><img src="images/clients/client_1.png" class="img-responsive" alt="Brand Image" /></a>
                </div>
                <div class="client-logo">
                    <a href="#"><img src="images/clients/client_2.png" class="img-responsive" alt="Brand Image" /></a>
                </div>
                <div class="client-logo">
                    <a href="#"><img src="images/clients/client_3.png" class="img-responsive" alt="Brand Image" /></a>
                </div>
                <div class="client-logo">
                    <a href="#"><img src="images/clients/client_4.png" class="img-responsive" alt="Brand Image" /></a>
                </div>
            </div>
        </div>

        <div class="fixed-footer">
            <footer class="footer">
                <div class="container">
                    <div class="row">
                        <div class="col-sm-6 col-md-3 col-xs-12">
                            <div class="footer_block">
                                <a href="index.php" class="f_logo"><img src="images/logo.png" class="img-responsive" alt="logo"></a>
                                <p>Aoluptas sit aspernatur aut odit aut fugit, sed elits quias horisa hinoe magni  magni dolores eos qui ratione volust luptatem sequised .</p>
                                <div class="social-bar">
                                    <ul>
                                        <li>
                                            <a class="fa fa-twitter" href="#"></a>
                                        </li>
                                        <li>
                                            <a class="fa fa-pinterest" href="#"></a>
                                        </li>
                                        <li>
                                            <a class="fa fa-facebook" href="#"></a>
                                        </li>
                                        <li>
                                            <a class="fa fa-behance" href="#"></a>
                                        </li>
                                        <li>
                                            <a class="fa fa-instagram" href="#"></a>
                                        </li>
                                        <li>
                                            <a class="fa fa-linkedin" href="#"></a>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-6 col-md-2 col-xs-12">
                            <div class="footer_block">
                                <h4>Hot Links</h4>
                                <ul class="footer-links">
                                    <li>
                                        <a href="#">Home</a>
                                    </li>
                                    <li>
                                        <a href="#">Jobs</a>
                                    </li>
                                    <li>
                                        <a href="#">About Us</a>
                                    </li>

                                    <li>
                                        <a href="#">Privacy</a>
                                    </li>
                                    <li>
                                        <a href="#">Contact Us</a>
                                    </li>
                                    <li>
                                        <a href="#">Term & Conditions</a>
                                    </li>
                                </ul>
                            </div>
                        </div>
                        <div class="col-sm-6 col-md-4 col-xs-12">
                            <div class="footer_block dark_gry">
                                <h4>Recent Posts</h4>
                                <ul class="recentpost">
                                    <li>
                                        <span><a class="plus" href="#"><img src="images/footer/1.png" alt="" /><i>+</i></a></span>
                                        <p><a href="#">Fusce gravida tortor felis, ac dictum risus sagittis</a></p>
                                        <h3>Sep 15, 2016</h3>
                                    </li>
                                    <li>
                                        <span><a class="plus" href="#"><img src="images/footer/2.png" alt="" /><i>+</i></a></span>
                                        <p><a href="#">Fusce gravida tortor felis, ac dictum risus sagittis</a></p>
                                        <h3>Fab 10, 2016</h3>
                                    </li>
                                    <li>
                                        <span><a class="plus" href="#"><img src="images/footer/2.png" alt="" /><i>+</i></a></span>
                                        <p><a href="#">Fusce gravida tortor felis, ac dictum risus sagittis</a></p>
                                        <h3>Fab 10, 2016</h3>
                                    </li>

                                </ul>
                            </div>
                        </div>
                        <div class="col-sm-6 col-md-3 col-xs-12">
                            <div class="footer_block">
                                <h4>Contact Information</h4>
                                <ul class="personal-info">
                                    <li><i class="fa fa-map-marker"></i> 3rd Floor,Link Arcade Model Town, BBL, USA.</li>
                                    <li><i class="fa fa-envelope"></i> Support@domain.com</li>
                                    <li><i class="fa fa-phone"></i> (0092)+ 124 45 78 678 </li>
                                    <li><i class="fa fa-clock-o"></i> Mon - Sun: 8:00 - 16:00</li>
                                </ul>
                            </div>
                        </div>

                    </div>
                </div>
            </footer>
            <section class="footer-bottom-section">
                <div class="container">
                    <div class="row">
                        <div class="col-md-12 col-sm-12 col-xs-12">
                            <div class="footer-bottom">
                                <div class="container">
                                    <div class="row">
                                        <div class="col-md-12 col-sm-12 col-xs-12">
                                            <p>Copyright �2016 - Staffing Spot - All rights Reserved. Made By <a href="http://themeforest.net/user/Staffing Spot"> Vinformax </a></p>
                                            <p>Reproduction of material from Vinformax without permission is strictly prohibited. </p>
                                        </div>
                                        <div class="col-md-12 col-sm-12 col-xs-12 hidden-xs hidden-sm">
                                            <ul class="footer-menu">
                                                <li>
                                                    <a href="#">Jobs in australia</a>
                                                </li>
                                                <li>
                                                    <a href="#">Jobs in malaysia</a>
                                                </li>
                                                <li>
                                                    <a href="#">Jobs in england</a>
                                                </li>
                                                <li>
                                                    <a href="#">Jobs in saudi arabia</a>
                                                </li>
                                                <li>
                                                    <a href="#">Jobs in south africa</a>
                                                </li>
                                                <li>
                                                    <a href="#">Jobs in saudi Pakistan</a>
                                                </li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
        </div>
        <a href="#" class="scrollup"><i class="fa fa-chevron-up"></i></a>

          
        <script type="text/javascript" src="js/jquery-3.1.1.min.js"></script>
    
    <!-- JAVASCRIPT JS   
-->    <script type="text/javascript" src="js/jquery-migrate-1.2.1.min.js"></script><!--

        <!-- BOOTSTRAP CORE JS -->
        <script type="text/javascript" src="js/bootstrap.min.js"></script>

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

        <!-- CORE JS -->
        <script type="text/javascript" src="js/custom.js"></script>

    </div>
</body>


<!-- Mirrored from templates.Staffing Spot.com/opportunities-v3/demo/job-category1.php by HTTrack Website Copier/3.x [XR&CO'2014], Tue, 07 Mar 2017 01:56:39 GMT -->
</html>