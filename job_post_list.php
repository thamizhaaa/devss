<html lang="en">
<head>
<?php
error_reporting(0);
@include("config.php");
@include("user_sessioncheck.php"); 
if($user_id == "")
{   
    header('Location: index.php'); 
}
$emp_id = $_REQUEST['emp_id'];

$pagin_query =mysql_query("Select count(*) as total from tbl_postjob where fld_empid = '".$emp_id."' and (fld_job_status =1 or fld_job_status=0) and fld_delstatus = 0");
 
$pagin_row=mysql_fetch_array($pagin_query);
//print_r( $pagin_row);
$total=$pagin_row['total'];
//exit();
$dis=5;
$total_page=ceil($total/$dis);
$page_cur=(isset($_GET['page']))?$_GET['page']:1;
//echo $page_cur;
$k=($page_cur-1)*$dis;
?>
<!DOCTYPE html>

        <meta http-equiv="content-type" content="text/html;charset=UTF-8" />  
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta name="description" content="">
        <meta name="author" content="vinformax">
        <title>Job Post List | Staffing Spot | Job Portal</title>
        <link rel="icon" href="images/favicon.ico" type="image/x-icon">
        <link rel="stylesheet" href="css/bootstrap.min.css">
        <link href="css/select2.min.css" rel="stylesheet">
        <link rel="stylesheet" href="css/mega_menu.min.css">
        <link rel="stylesheet" href="css/animate.min.css">
        <link rel="stylesheet" href="css/owl.carousel.css">
        <link rel="stylesheet" href="css/owl.style.css">
        <link rel="stylesheet" href="css/style.css">
        <link rel="stylesheet" href="css/style1.css">
        <link rel="stylesheet" href="css/mobile.css">
        <link rel="stylesheet" type="text/css" href="css/font-awesome.min.css">
        <link rel="stylesheet" href="css/et-line-fonts.css" type="text/css">
        <link href="http://fonts.googleapis.com/css?family=Source+Sans+Pro:400,600,700,900,300" rel="stylesheet" type="text/css">
        <link href="https://fonts.googleapis.com/css?family=Open+Sans:400,600,700" rel="stylesheet" type="text/css">
        <script src="js/modernizr.js"></script>
    </head>

    <body>
        <div class="page category-page">

<?php
@include("top.php");
?>
           <div class="clearfix"></div>


            <section class="job-breadcrumb">
                <div class="container">
                    <div class="row">
                        <div class="col-md-6 col-sm-7 co-xs-12 text-left">
                            <h3>Job Post List</h3>
                        </div>
                        <div class="col-md-6 col-sm-5 co-xs-12 text-right">
                            <div class="bread">
                                <ol class="breadcrumb">
                                    <li><a href="user-dashboard.php">Dashboard</a> </li>
                                    <li class="active">Job Post List</li>
                                </ol>
                            </div>
                        </div>
                    </div>
                </div>
            </section>


            <section class="categories-list-page light-grey">
                <div class="container">
                    <div class="row">
                        <div class="col-md-12 col-sm-12 col-xs-12 nopadding">

                            <div class="col-md-12 col-sm-12 col-xs-12" >
                                <h4 class="search-result-text">Available Job(s)</h4>
                            </div>
                            <div class="col-md-12 col-sm-12 col-xs-12">

                                <div class="all-jobs-list-box" id="rightpanel">
                                <?php 
                                $post_details = "Select fld_jobtitle,fld_id,fld_empid,fld_industry_type,fld_contact_persion,fld_phone1,fld_delstatus from tbl_postjob where fld_empid = '".$emp_id."' and (fld_job_status =1 or fld_job_status=0) and fld_delstatus = 0 limit ".$k." ,".$dis ;
                                $records = mysql_query($post_details);
                                $cnt = mysql_num_rows($records);
                                //$count=count($records);
                                if($cnt >=0)
                                {                                
                                $projects = array();
                                while ($project = mysql_fetch_assoc($records)) {
                                    $projects[] = $project;
                                }
                                $r = 0;
                                foreach ($projects as $project) {

                                    $r++;
                                ?>
                                <div class="job-box">
                                     <div class="col-md-2 col-sm-2 col-xs-12">

                                 <div class="comp-logo">
                                 <?php

                                 $company_logo="SELECT * FROM `tbl_employer_details` WHERE `fld_empid`= '".$project['fld_empid'] ."' ";
                                 $records = mysql_query($company_logo);
                                 $project1 = mysql_fetch_assoc($records);
                                 $emplogo = $project1['fld_logo'];
                                 if(file_exists($emplogo) && (preg_match('/\.([^\.]+)$/', $emplogo)))
                                 {                                     
                                 ?>
                                 <img src="<?php echo $emplogo; ?>" class="img-responsive">
                                 <?php
                                 }
                                 else
                                 {
                                 ?>                                        
                                 <img src="<?php echo "employer/logo/no-image.jpg";?>" alt="">
                                 <?php
                                 }
                                 ?>
                                 </div>
                                     </div>
                                     <div class="col-md-8 col-sm-7 col-xs-12 jpl">

                                         <div class="job-title-box">                                    
 <p> 
                                        <?php
                                         echo "Organization: ";
                                            echo $project1['fld_employer_name'];
                                        ?> 
                                         </p>
                                            </div>

                                         <div class="job-title-box">                                    
 <p>
                                        <?php
                                         echo "Job Title: ";
                                            echo $project['fld_jobtitle'];
                                        ?> 
                                     </p>
                                            <p>

                                        <?php
                                        echo "Industry Type : ";
                                            echo $project['fld_industry_type'];
                                        ?>  
</p>
                                               </div>
                                            </div>

                                           <!--  <div class="col-md-2 col-sm-2 col-xs-12">
                                              
                                                    <div class="job-type">
                                                        <p class="jt-remote-color">
                                                            <i class="fa fa-user"></i> <?php
                                                                echo $project1['fld_contact_persion'];
                                                            ?>
                                                        </p>
                                                        <p class="jt-remote-color">
                                                            <i class="fa fa-phone" aria-hidden="true"></i> <?php
                                                                echo $project1['fld_phone1'];
                                                            ?>
                                                        </p>
                                                    </div>
                                              
                                            </div> -->
                                            <div class="col-md-2 col-sm-3 col-xs-12">
                                                                                        <!--<button  class="btn btn-primary btn-custom">Apply Now</button>-->

                                                <a href="singlejob.php?jid=<?php
                                                    echo $project['fld_id'];
                                                    ?>"><input type="button" class="btn btn-default btn-search-submit" value="View More"/>
                                                </a>

                                            </div>
                                        </div>
                                        <?php
                                            }
                                            }
                                            else
                                            {
                                            ?>
                                            <h4>There is no jobs available for your search term</h4>
                                            <?php
                                            }
                                        ?>
                                   
                                </div>
<!--                                                            <div class="col-md-12 col-sm-12 col-xs-12 nopadding">
<?php
if ($total > $dis) {
?>
                                                                   <div class="pagination-box clearfix">
                                                                        <ul class="pagination" style="font-weight:bolder;">
    <?php
    if ($page_cur > 1) {
?>
                                       
                                        <li class="disabled" ><a href="joblist.php?page=<?php
        echo ($page_cur - 1);
?>">Prev</a></li>
    <?php
    } else {
?>
                                       <li class="active"><a>Prev</a></li>
    <?php
    }
    for ($i = 1; $i < $total_page; $i++) {
        
        if ($page_cur == $i) {
?>
                                                   <li class="active"><a><?php
            echo $i;
?></a></li>
                                              
        <?php
        } else {
?>
                                             <li class="disabled" ><a href="joblist.php?page=<?php
            echo $i;
?>"><?php
            echo $i;
?></a></li>
                                              
        <?php
        }
    }
    if ($page_cur < $total_page) {
?>
                                           
                                            <li class="disabled" ><a href="joblist.php?page=<?php
        echo ($page_cur + 1);
?>">Next >></a></li>
    <?php
    } else {
?>
                                                       
                                                        <li class="active" ><a>Next >></a></li>
    <?php
    }
?>
                                                   
                                      
                                    </ul>
<?php
}
?>
                                                           
                                
                                                                </div>
                                                            </div>-->


                                                            <?php if($total > $dis){ ?>
                             <ul class="pagination" style="font-weight:bolder;">

                             <ul class="pagination">
 
                                <?php if($page_cur>1) { ?>

                                <li class="disabled" ><a href="job_post_list.php?emp_id=<?php echo $emp_id; ?>&page=<?php echo ($page_cur-1);?>">Prev</a></li>
                                <?php } else { ?>
                                <li class="active"><a>Prev</a></li>
                                <?php } for($i=1;$i<=$total_page;$i++) {

                                  if($page_cur==$i)
                                  { ?>
                                        <li class="active"><a><?php echo $i; ?></a></li>

                                  <?php } else { ?>
                                  <li class="disabled" ><a href="job_post_list.php?emp_id=<?php echo $emp_id; ?>&page=<?php echo $i; ?>"><?php echo $i; ?></a></li>

                                  <?php } }
                                 if($page_cur<$total_page) {?>

                                    <li class="disabled" ><a href="job_post_list.php?emp_id=<?php echo $emp_id; ?>&page=<?php echo ($page_cur+1); ?>">Next >></a></li>
                                    <?php } else { ?>

                                  <li class="active" ><a>Next >></a></li>
                                  <?php } ?>


                                </ul>

                                                            <?php } ?>


                            </div>



                            <div>
                            </div>
                        </div>
                        </section>

                        <?php @include("bottom.php");?>


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