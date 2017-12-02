<?php
@include ("config.php");
$pagin_query =mysql_query("select count(*) as total  from  employer");
$pagin_row=mysql_fetch_array($pagin_query);
$total=$pagin_row['total'];
$dis=8;
$total_page=ceil($total/$dis);
$page_cur=(isset($_GET['page']))?$_GET['page']:1;
$k=($page_cur-1)*$dis;
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta http-equiv="content-type" content="text/html;charset=UTF-8" />   
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="ScriptsBundle">
    <title>Job List | Staffing Spot | Job Portal</title>
    <link rel="icon" href="favicon.ico" type="image/x-icon">
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link href="css/select2.min.css" rel="stylesheet">
    <link rel="stylesheet" href="css/mega_menu.min.css">
    <link rel="stylesheet" href="css/animate.min.css">
    <link rel="stylesheet" href="css/owl.carousel.css">
    <link rel="stylesheet" href="css/owl.style.css">
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" type="text/css" href="css/font-awesome.min.css">
    <link rel="stylesheet" href="css/et-line-fonts.css" type="text/css">
    <link href="http://fonts.googleapis.com/css?family=Source+Sans+Pro:400,600,700,900,300" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:400,600,700" rel="stylesheet" type="text/css">
    <script src="js/modernizr.js"></script>
</head>

<body>
    <div class="page category-page">
         <div id="spinner">
            <div class="spinner-img">
                <img alt="Opportunities Preloader" src="images/loader.gif" />
                <h2>Please Wait.....</h2>
            </div>
        </div>

         <?php @include("top.php");?>
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
                            <div class="search-form-contaner">
                                <form class="form-inline">
                                    <div class="col-md-7 col-sm-7 col-xs-12 nopadding">
                                        <div class="form-group">
                                            
                                            <input type="text" class="form-control" name="keyword" placeholder="Search Keyword" value="">
                                            <i class="icon-magnifying-glass"></i>
                                        </div>
                                    </div>
                                    <div class="col-md-3 col-sm-3 col-xs-12 nopadding">
                                        <div class="form-group">
                                            <select class="select-category form-control">
                                                <option label="Select Option"></option>
                                                <option value="0">Customer Service</option>
                                                <option value="1">Designer</option>
                                                <option value="2">Developer</option>
                                                <option value="3">Finance</option>
                                                <option value="4">Human Resource</option>
                                                <option value="5">Information Technology</option>
                                                <option value="6">Marketing</option>
                                                <option value="7">Others</option>
                                                <option value="8">Sales</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-md-2 col-sm-2 col-xs-12 nopadding">
                                        <div class="form-group form-action">
                                            <button type="button" class="btn btn-default btn-search-submit">Search <i class="fa fa-angle-right"></i> </button>
                                        </div>
                                    </div>
                                </form>
                            </div>
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
                            $records1 = "SELECT distinct pj.fld_jobcode,pj.fld_jobtitle,pj.fld_keyskills,pj.fld_experience,pj.fld_nvacancy,emp.employerName,emp.logo,emp.country,emp.state,pj.fld_job_type,pj.fld_id FROM `employer` emp INNER JOIN postjob pj on pj.fld_empid = emp.empid LIMIT $k,$dis";
                            $records = mysql_query($records1);     
                            ?>        
                            <?php 
                            $projects = array();
                            while ($project =  mysql_fetch_assoc($records))
                            {
                                $projects[] = $project;
                            }
                            foreach($projects as $project)
                            {
                            ?>
                            <div class="job-box">
                                    <div class="col-md-2 col-sm-2 col-xs-12 hidden-xs hidden-sm">
                                        
                                        <div class="comp-logo">
<!--                                            <a href="#"> <img src="images/company/1.png" class="img-responsive" alt="scriptsbundle"></a>-->
                                             <?php //echo  $project['logo'];
                                               $test= "employer/".$project['logo'];
                                               //echo $test;
                                             ?>
<!--                                            <img src="employer/logo/28939811473416622HJA2PZ.jpg" class="img-responsive" alt="scriptsbundle">-->
                                           
                                            <img src="<?=$test;?>" class="img-responsive" alt="scriptsbundle">
                                        </div>
                                    </div>
                                    <div class="col-md-6 col-sm-6 col-xs-12 nopadding">
        
                                        <div class="job-title-box">                                     
                                        <?php echo $project['employerName']; ?> <br><br>
                                        <?php echo $project['country']; ?>  &nbsp; - &nbsp; <?php echo $project['state']; ?>
                                        </div>
                                    </div>

                                    <div class="col-md-2 col-sm-3 col-xs-6">
                                        <a href="#">
                                            <div class="job-type jt-remote-color">
                                                <i class="fa fa-clock-o"></i> <?php echo $project['fld_job_type']; ?>
                                                <br/>
                                                <i class="fa fa-user" aria-hidden="true"></i>
                                                <?php 
                                                $exper = explode(";", $project['fld_experience']);
                                                $firstexper = $exper[0];
                                                $secondexper = $exper[1];

                                                if($secondexper=='1')
                                                {
                                                    $yearname = "Year";
                                                }
                                                else
                                                {
                                                    $yearname = "Years";   
                                                }

                                                echo $firstexper."-".$secondexper." ".$yearname;

                                                ?>
                                                
                                            </div>
                                        </a>
                                    </div>
                                    <div class="col-md-2 col-sm-2 col-xs-12 nopadding">
<!--                                        <button  class="btn btn-primary btn-custom">Apply Now</button>-->
                                       
                                    <a href="singlejob.php?jid=<?php echo $project['fld_id'];?>"><input type="button" class="btn btn-default btn-search-submit" value="Apply Now"/></a>

                                    </div>
                                </div>
                                <?php
    }
?>
<!--                                <div class="job-box">
                                    <div class="col-md-2 col-sm-2 col-xs-12  hidden-xs hidden-sm">
                                        <div class="comp-logo">
                                            <a href="#"> <img src="images/company/5.png" class="img-responsive" alt="scriptsbundle"></a>
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
                                            <a href="#"> <img src="images/company/3.png" class="img-responsive" alt="scriptsbundle"></a>
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
                                            <a href="#"> <img src="images/company/4.png" class="img-responsive" alt="scriptsbundle"></a>
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
                                            <a href="#"> <img src="images/company/1.png" class="img-responsive" alt="scriptsbundle"></a>
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
                                            <a href="#"> <img src="images/company/5.png" class="img-responsive" alt="scriptsbundle"></a>
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
                                            <a href="#"> <img src="images/company/3.png" class="img-responsive" alt="scriptsbundle"></a>
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
                                            <a href="#"> <img src="images/company/4.png" class="img-responsive" alt="scriptsbundle"></a>
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
                                            <a href="#"> <img src="images/company/3.png" class="img-responsive" alt="scriptsbundle"></a>
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
                                            <a href="#"> <img src="images/company/4.png" class="img-responsive" alt="scriptsbundle"></a>
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
                                            <a href="#"> <img src="images/company/1.png" class="img-responsive" alt="scriptsbundle"></a>
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
                                            <a href="#"> <img src="images/company/5.png" class="img-responsive" alt="scriptsbundle"></a>
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
                                <?php if($total > $dis) { ?>
                                <div class="pagination-box clearfix">
                                    <ul class="pagination" style="font-weight:bolder;">
                                    <?php if($page_cur>1) { ?>

<li class="disabled" ><a href="joblist.php?page=<?php echo ($page_cur-1);?>">Prev</a></li>
<?php } else { ?>
<li class="active"><a>Prev</a></li>
<?php } for($i=1;$i<$total_page;$i++) {
	
		if($page_cur==$i)
		{ ?>
        <li class="active"><a><?php echo $i; ?></a></li>
  
  <?php } else { ?>
  <li class="disabled" ><a href="joblist.php?page=<?php echo $i; ?>"><?php echo $i; ?></a></li>
  
  <?php } }
	if($page_cur<$total_page) {?>
    
    <li class="disabled" ><a href="joblist.php?page=<?php echo ($page_cur+1); ?>">Next >></a></li>
    <?php } else { ?>
		
		<li class="active" ><a>Next >></a></li>
		<?php } ?>
		 
  
</ul>
<?php } ?>
                             

                                </div>
                            </div>
                        </div>
                        <div class="col-md-4 col-sm-12 col-xs-12">
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
                        </div>
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
                                            <p>Copyright ©2016 - Opportunities A Mega Job Board Template - All rights Reserved. Made By <a href="http://themeforest.net/user/scriptsbundle"> ScriptsBundle </a></p>
                                            <p>Reproduction of material from scriptsBundle without permission is strictly prohibited. </p>
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

</html>