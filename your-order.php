<?php
include('config.php');
@include("user_sessioncheck.php"); 
//echo $empuser_id;
if($empuser_id == "")
{    
    header('Location: index.php'); 
}
session_start();
$fldid = $_REQUEST['id'];
$name = $_SESSION["empuser_name"];
$id = $_SESSION['empuser_id'];
?>
<html lang="en">    
    <head>
        <meta http-equiv="content-type" content="text/html;charset=UTF-8" />
        <!--[if IE]>
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <![endif]-->
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta name="description" content="">
        <meta name="author" content="vinformax">
        <title>Orders | Employer | Staffing Spot </title>
        <link rel="icon" href="images/favicon.ico" type="image/x-icon">

        <!-- BOOTSTRAPE STYLESHEET CSS FILES -->
        <link rel="stylesheet" href="css/bootstrap.min.css">

        <!-- JQUERY SELECT -->
        <link href="css/select2.min.css" rel="stylesheet" />

        <!-- JQUERY MENU -->
        <link rel="stylesheet" href="css/mega_menu.min.css">
        <link rel="stylesheet" href="css/circle.css">
        <!-- ANIMATION -->
        <link rel="stylesheet" href="css/animate.min.css">

        <!-- OWl  CAROUSEL-->
        <link rel="stylesheet" href="css/owl.carousel.css">
        <link rel="stylesheet" href="css/owl.style.css">

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

        <!-- Custom CSS -->
        <link rel="stylesheet" href="css/custom.css">
        
    </head>

    <body>
        <div class="page category-page">
            <div id="spinner">
                <div class="spinner-img">
                    <img alt="Staffing Spot - the spot for your career" src="images/loader.svg" />
                    <h2>Please Wait...</h2>
                </div>
            </div>

            <?php
            @include("top.php");
            ?>
            <div class="clearfix"></div>



            <section class="job-breadcrumb">
                <div class="container">
                    <div class="row">
                        <div class="col-md-6 col-sm-7 co-xs-12 text-left">
                            <h3>Active Jobs</h3>
                        </div>
                        <div class="col-md-6 col-sm-5 co-xs-12 text-right">
                            <div class="bread">
                                <ol class="breadcrumb">
                                    <li><a href="company-dashboard.php">Dashboard</a>
                                    </li>

                                    <li class="active">Orders</li>
                                </ol>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
            <?php
            @include("emptop.php");
            ?>
            <section class="dashboard-body">
                <div class="container">
                    <div class="row">

                        <div class="col-md-12 col-sm-12 col-xs-12 nopadding">
                            <?php
                            @include("empleftpanel.php");
                            ?>

                            <div class="col-md-8 col-sm-8 col-xs-12" id="active">
                                <div class="heading-inner first-heading">
                                    <p class="title">Your Orders</p>
                                </div>

                            <div class="col-md-12 col-sm-12 col-xs-12 all-jobs-list-box2">
                                <?php
                                $sql1 = "select fld_package_id from tbl_package_detail where fld_emp_id=$id";
                                $res1 = mysql_query($sql1);
                                   $rows1 = mysql_fetch_assoc($res1);
                                   $ss=$rows1['fld_package_id'];
//                                    $sql = "select * from tbl_package_price where fld_id=$ss";
                                    $sql = "SELECT tbl_package_price.fld_id,tbl_package_price.fld_currency_type , tbl_package_price.fld_pname , tbl_package_price.fld_pprice , tbl_package_price.fld_no_posting , tbl_package_price.fld_resume_download , tbl_package_price.fld_no_posting ,tbl_currency_type.fld_symbol FROM tbl_package_price INNER JOIN tbl_currency_type ON (tbl_package_price.fld_currency_type=tbl_currency_type.fld_currency_name) WHERE tbl_package_price.fld_id=$ss";
				    
                                      $res = mysql_query($sql);
                                      $count = mysql_num_rows($res);
                                if ($count > 0) {
                                    while ($row1 = mysql_fetch_assoc($res)) {
                                        ?>   
                                                                         
                                                                    <div class="single-price text-center" >
                                                                       
                                                                        
                                                                        
                                                                        <div class="price-header">
                                                                            
                                                                            <p class="plan-title"><?php echo $row1['fld_pname']; ?></p>
                                                                        </div>
                                                                        
                                                                        <div class="plan-price">
                                                                            <h4><span><?php echo $row1['fld_symbol']; ?></span><br/><?php echo $row1['fld_pprice']; ?></h4>
                                                                            
                                                                        </div>
                                                                        
                                                                        <div class="price-features col-md-12">
                                                                          
                                                                            <div class="col-md-4 col-sm-4">
                                                                                <p class="title-nos"><div class="red_round"><?php echo $row1['fld_no_posting']; ?></div></p>
                                                                                <p>Job Posting</p>
                                                                            </div>
                                                                            
                                                                          
                                                                           <div class="col-md-4 col-sm-4">
                                                                                <p class="title-nos"><div class="red_round"><?php echo $row1['fld_resume_download']; ?></div></p>
                                                                                <p>Downloaded Resume</p>
                                                                            </div>
                                                                            <div class="col-md-4 col-sm-4">
                                                                                <p class="title-nos"><div class="red_round"><?php echo $row1['fld_no_posting']; ?></div></p>
                                                                            <p>Views</p>
                                                                            </div>
                                                                            
<!--                                                                            <div class="col-md-3 col-sm-3">
                                                                                <p class="title-nos"><div class="red_round"><?php echo $row1['fld_pprice']; ?></div></p>
                                                                                <p>package price</p>
                                                                            </div>-->
                                                                            </div>
                                                                        
                                                                       
                                                                           
                                                                    </div>
                                                                                       
                                                               
                                    <?php }
                                } else { ?>
                                                                    
                                                                    
                                                                    
                                                                    <div class="col-md-12" style="font-size: 28px; font-color:white;">
									<center><h3><?php echo "No Data Available.</br> If you want to purchase the package "; ?></h3></center>
                                                                        
                                                                         <div class="col-md-12 col-sm-12 col-xs-12">
                                                                     <a href="package.php"> <button class="btn btn-default pull-right">Click here</button></a>
                                                                         </div>
                                                                    </div>
                                <?php } ?>
                                                                
                                
                                                        </div>
                                <div class="col-md-12 col-sm-12 col-xs-12 all-jobs-list-box2">
                                    <?php
                                    $sql = "select * from tbl_booster_count where emp_id=$id";
                                    $res = mysql_query($sql);
                                    $count = mysql_num_rows($res);
                                    if ($count > 0) {
                                        while ($rows = mysql_fetch_assoc($res)) {
                                            ?>   

                                            
                                                 <div class="heading-inner first-heading">
                                                     <p class="title">Purchased Booster Details</p></div>
                                                     
                                                     
                                                     
                                                <div class="single-price text-center" >
                                                 <div class="price-header">
                                                        <p class="plan-title"><?php
                                                        $type = $rows['booster_customer_id'];
                                                        $pck = mysql_query("select customer_type from tbl_booster where id='".$type."' ");
                                                         $pck1 = mysql_fetch_assoc($pck);
                                                        echo $pck1['customer_type'];
                                                        ?></p>
                                                    </div>



                                                    <div class="price-features col-md-12">
                                                        <?php //if ($rows['postjob_added'] >= 1) { ?>
                                                            <div class="col-md-4 col-sm-4">
                                                                <p class="title-nos"><div class="red_round"><?php echo $rows['postjob_added']; ?></div></p>
                                                                <p>Job Posting</p>
                                                            </div>
                                                        <?php// } ?>

                                                        <?php //if ($rows['resume_download_added'] >= 1) { ?>
                                                            <div class="col-md-4 col-sm-4">
                                                                <p class="title-nos"><div class="red_round"><?php echo $rows['resume_download_added']; ?></div></p>
                                                                <p>Downloaded Resume</p>
                                                            </div>  
                                                        <?php //} ?>
                                                        <?php //if ($rows['view_added'] >= 1) { ?>
                                                            <div class="col-md-4 col-sm-4">
                                                                <p class="title-nos"><div class="red_round"><?php echo $rows['view_added']; ?></div></p>
                                                                <p>Views</p>
                                                            </div>
                                                        <?php// } ?>

                                                    </div>



                                                </div>

                                           
                                        <?php }
                                    }  ?>



                                </div>
                                <div class="all-jobs-list-box2">
                                     <?php
                                $sql1 = "select fld_package_id from tbl_package_detail where fld_emp_id=$id";
                                $res1 = mysql_query($sql1);
                                   $rows1 = mysql_fetch_assoc($res1);
                                   $ss=$rows1['fld_package_id'];
                                    $sql = "select * from tbl_package_price where fld_id=$ss";
                                      $res = mysql_query($sql);
                                      $count = mysql_num_rows($res);
                                if ($count > 0) {
                                    ?>
                                    
                                    <div class="col-md-12 col-sm-12 col-xs-12">
                                        <div class="heading-inner first-heading">
                                            <p class="title">Total Package Count Details</p></div>
                                        <div class="single-price p20 tpcd">
                                            <div class="clearfix">
                                                <?php
                                                
                                              //used package values
                                                $sql123 = mysql_query("select fld_no_of_views,fld_resume,fld_post from tbl_package_detail where fld_emp_id=$id");
                                                $used_pck = mysql_fetch_assoc($sql123);
                                              
                                                //added package values  
                                                 $package = mysql_query("select * from tbl_package_price where fld_id=$ss");
                                                 $pack = mysql_fetch_assoc($package);
                                              
                                                 //used booster count
                                                 $sqll = mysql_query("select sum(view_used) as total1,sum(resume_download_used) as resume1,sum(postjob_used) as post1 from tbl_booster_count where emp_id=$id");
                                                $used_bstr = mysql_fetch_assoc($sqll);  
                                                 $ttl_pst = $used_bstr['post1'] + $used_pck['fld_post'];
                                                 $ttl_res = $used_bstr['resume1'] + $used_pck['fld_resume'];
                                                 $ttl_ttal = $used_bstr['total1'] + $used_pck['fld_no_of_views'];
                                             //echo $ttl_pst;
                                           
                                           //added booster count
                                                $sql2 = "select sum(view_added) as total,sum(resume_download_added) as resume,sum(postjob_added) as post from tbl_booster_count where emp_id=$id";
                                                $res2 = mysql_query($sql2);
                                                $rows = mysql_fetch_assoc($res2);
                                                
                                                      if ($rows['post'] >= 1 || $pack['fld_no_posting']) { 
                                                          $post = $rows['post'] + $pack['fld_no_posting'];
                                                         // echo $post;
                                                          ?>
                                                        <div class="c<?php echo ($post / $post)*100;?> p<?php echo ceil((($ttl_pst)/ $post) * 100) ;?> lh-30">
                                                            <span>
                                                                <?php 
                                                                echo $ttl_pst; ?></span>
                                                            <div class="slice">
                                                                <div class="bar"></div>
                                                                <div class="fill"></div>
                                                            </div>
                                                            <p class="text-center ctd-name">PostJob</p>
                                                        </div>
                                                  <?php } if ($rows['resume'] >= 1 || $pack['fld_resume_download']>=1)
                                                      { 
                                                       $resume = $rows['resume'] + $pack['fld_resume_download'];
                                                       ?>
                                                           <div class="c<?php echo ($resume / $resume)*100;?> p<?php echo ceil((($ttl_res)/ $resume) * 100) ;?> lh-30">
                                                            <span><?php 
                                                            echo $ttl_res; ?></span>
                                                            <div class="slice">
                                                                <div class="bar"></div>
                                                                <div class="fill"></div>
                                                            </div>
                                                            <p class="text-center ctd-name">Resume</p>
                                                        </div>
                                                 <?php }   if ($rows['total'] >= 1 || $pack['fld_no_posting']>=1) {
                                                       $view = $rows['total'] + $pack['fld_no_posting'];?>
                                                        <div class="c<?php echo ($view / $view)*100;?> p<?php echo ceil((($ttl_ttal)/ $view) * 100) ;?> lh-30">
                                                            <span><?php 
                                                             echo $ttl_ttal; ?></span>
                                                            <div class="slice">
                                                                <div class="bar"></div>
                                                                <div class="fill"></div>
                                                               
                                                            </div> 
                                                            <p class="text-center ctd-name">View</p>
                                                        </div>
                                                            <?php }   ?>

                                            </div>
                                        </div>
                                    </div>
                                    
                                    <div>
                                        
                                        <div class="col-md-12 col-sm-12 col-xs-12">                                            
                                            <a href="add_booster_price.php"> <button class="btn btn-default pull-right bust">Add Booster</button></a>
                                        </div>
                                        
                                    </div>
                                    
                                    <?php
                                }
                                else
                                {
                                ?>
                                    
                                   
                                <?php
                                }
                                ?>
                                    
                                    
                                </div>
                            </div>

                        </div>
                    </div>
            </section>


            <?php
            @include("bottom.php");
            ?>



            <a href="#" class="scrollup"><i class="fa fa-chevron-up"></i></a>



            <!-- AdminLTE for demo purposes -->


            <script src="//code.jquery.com/jquery-1.10.2.min.js"></script>





            <!-- JAVASCRIPT JS  -->
            <script type="text/javascript" src="js/jquery-3.1.1.min.js"></script>

            <!-- JAVASCRIPT JS  --> 
            <script type="text/javascript" src="js/jquery-migrate-1.2.1.min.js"></script>

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

