<?php
error_reporting(E_ALL ^ E_NOTICE);
error_reporting(E_ERROR);
@include('config.php');
$username = $_SESSION["user_name"];
$user_email = $_SESSION['user_email']; 
$user_id = $_SESSION['user_id'];

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta http-equiv="content-type" content="text/html;charset=UTF-8" />
    <!--[if IE]>
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
<![endif]-->
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="ScriptsBundle">
    <title>Opportunities A Mega Job Board Template</title>
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
                <img alt="Opportunities Preloader" src="images/loader.gif" />
                <h2>Please Wait.....</h2>
            </div>
        </div>

         <?php @include("top.php");?>
    <div class="clearfix"></div>

        <div class="clearfix"></div>
        
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
        <section class="categories">
            <div class="container">
                <div class="row">
                    <div class="col-md-12 col-sm-12 col-xs-12">
                        <div class="col-md-12 col-sm-12 col-xs-12">
                            <div class="Heading-title black">
                                <h1>Top Companies</h1>
                                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor.At vero eos et accusamus et iusto odio dignissimos ducimus qui blanditiis praesentium</p>
                            </div>
                        </div>
                        <div class="col-md-12 col-sm-12 col-xs-12 nopadding">
                            <div id="cats-masonry">

                                   <?php 
                               echo  "äaa".$companylistsql= "SELECT e.fld_id,empd.fld_employer_name,empd.fld_logo,empd.fld_country,empd.fld_city FROM `tbl_employer` e Join tbl_employer_details empd on empd.fld_empid = e.fld_id WHERE e.`fld_emp_status`='1' ORDER BY e.`fld_id` LIMIT 0,9";
                                //echo $companylistsql;
                                $companylists=mysql_query($companylistsql);

                                while($row=mysql_fetch_assoc($companylists)) 
                                {  
                                     $companyid=$row['fld_id'];



                                ?>

                                <div class="col-md-4 col-sm-6 col-xs-12">
                                    <a href="#">
                                        <div class="company-list-box">
                                            <span class="company-list-img">

                                    <img src="images/<?php echo $row['fld_logo'];?>" class="img-responsive" alt="">
                                </span>
                                            <div class="company-list-box-detail">
                                                <h5> <?php  echo $row['fld_employer_name'];?> </h5>
                                                <p><?php echo $row['fld_country']; ?>  - <?php echo $row['fld_city']; ?></p>
                                                <div class="ratings"> <i class="fa fa-star color"></i> <i class="fa fa-star color"></i> <i class="fa fa-star color"></i> <i class="fa fa-star-half-full color"></i> <i class="fa fa-star-o"></i><span class="badge"> 4.5</span> </div>
                                            </div>
                                        </div>
                                    </a>
                                </div>
                               
 <?php }?>

                                <div class="col-md-12 col-sm-12 col-xs-12">
                                    <div class="load-more-btn">
                                        <button class="btn-default"> Load More <i class="fa fa-refresh"></i> </button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        

        <?php @include("bottom.php");?>

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

        <!-- FOR THIS PAGE ONLY -->
        <script src="js/imagesloaded.js"></script>
        <script src="js/isotope.min.js"></script>
        <script type="text/javascript">
            (function($) {
                "use strict";
                $('#cats-masonry').imagesLoaded(function() {
                    $('#cats-masonry').isotope({
                        layoutMode: 'masonry',
                        transitionDuration: '0.3s'
                    });
                });
            })(jQuery);
        </script>

        <!-- CORE JS -->
        <script type="text/javascript" src="js/custom.js"></script>

    </div>
</body>

</html>