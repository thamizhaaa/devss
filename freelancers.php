<?php
?><!DOCTYPE html>
<html lang="en">
<head>
    <meta http-equiv="content-type" content="text/html;charset=UTF-8" />    
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="">
    <title>Freelancers | Staffingspot | Job Portal</title>
    <link rel="icon" href="favicon.ico" type="image/x-icon">

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

          <?php @include("top.php"); ?>
    <div class="clearfix"></div>

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
                        	<div class="profile-content">
                                <div class="card">
                                    <div class="firstinfo">
                                    	<img src="images/users/11.jpg" alt="" class="img-circle img-responsive" />
                                        <div class="profileinfo">
                                            <h1> <a href="#"> Muhammad Jawad </a></h1>
                                            <h3>CEO Ninja</h3>
                                            <p class="bio">Lived all my life on the top of mount Fuji, learning the way to be a Ninja Dev.</p>
                                            <div class="profile-skills">
                                            	<span> wordpress </span> <span> css3 </span> <span> javascript </span> <span> php </span> <span> laravel </span> <span> woocommerce </span>
                                            </div>
                                            <div class="hire-btn">
                                            	<a href="#" class="btn-default" > <i class="fa fa-location-arrow"></i> Hire Me</a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="profile-content">
                                <div class="card">
                                    <div class="firstinfo">
                                    	<img src="images/users/12.jpg" alt="" class="img-circle img-responsive" />
                                        <div class="profileinfo">
                                            <h1> <a href="#"> Arslan Tariq </a></h1>
                                            <h3>Designer and Developer</h3>
                                            <p class="bio">Lived all my life on the top of mount Fuji, learning the way to be a Ninja Dev.</p>
                                            <div class="profile-skills">
                                            	<span> photoshop </span> <span> coral draw </span> <span> javascript </span> <span> htm5 </span> <span> css3 </span> 
                                            </div>
                                            <div class="hire-btn">
                                            	<a href="#" class="btn-default" > <i class="fa fa-location-arrow"></i> Hire Me</a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="profile-content">
                                <div class="card">
                                    <div class="firstinfo">
                                    	<img src="images/users/13.jpg" alt="" class="img-circle img-responsive" />
                                        <div class="profileinfo">
                                            <h1> <a href="#"> Humayun Sarfraz </a></h1>
                                            <h3>PHP Ninja</h3>
                                            <p class="bio">Lived all my life on the top of mount Fuji, learning the way to be a Ninja Dev.</p>
                                            <div class="profile-skills">
                                            	<span> wordpress </span> <span> plugin </span> <span> javascript </span> <span> php </span> <span> laravel </span> 
                                            </div>
                                            <div class="hire-btn">
                                            	<a href="#" class="btn-default" > <i class="fa fa-location-arrow"></i> Hire Me</a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="profile-content">
                                <div class="card">
                                    <div class="firstinfo">
                                    	<img src="images/users/12.jpg" alt="" class="img-circle img-responsive" />
                                        <div class="profileinfo">
                                            <h1> <a href="#"> Muhammad Umair </a></h1>
                                            <h3>Laravel Ninja</h3>
                                            <p class="bio">Lived all my life on the top of mount Fuji, learning the way to be a Ninja Dev.</p>
                                            <div class="profile-skills">
                                            	<span> laravel </span> <span> css </span> <span> javascript </span> <span> php </span> <span> wordpress </span> 
                                            </div>
                                            <div class="hire-btn">
                                            	<a href="#" class="btn-default" > <i class="fa fa-location-arrow"></i> Hire Me</a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="profile-content">
                                <div class="card">
                                    <div class="firstinfo">
                                    	<img src="images/users/14.jpg" alt="" class="img-circle img-responsive" />
                                        <div class="profileinfo">
                                            <h1> <a href="#"> Emily Copper </a></h1>
                                            <h3>Laravel Ninja</h3>
                                            <p class="bio">Lived all my life on the top of mount Fuji, learning the way to be a Ninja Dev.</p>
                                            <div class="profile-skills">
                                            	<span> html5 </span> <span> css3 </span> <span> javascript </span> <span> php </span> <span> laravel </span> 
                                            </div>
                                            <div class="hire-btn">
                                            	<a href="#" class="btn-default" > <i class="fa fa-location-arrow"></i> Hire Me</a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        	<div class="profile-content">
                                <div class="card">
                                    <div class="firstinfo">
                                    	<img src="images/users/11.jpg" alt="" class="img-circle img-responsive" />
                                        <div class="profileinfo">
                                            <h1> <a href="#"> Muhammad Jawad </a></h1>
                                            <h3>CEO Ninja</h3>
                                            <p class="bio">Lived all my life on the top of mount Fuji, learning the way to be a Ninja Dev.</p>
                                            <div class="profile-skills">
                                            	<span> wordpress </span> <span> css3 </span> <span> javascript </span> <span> php </span> <span> laravel </span> <span> woocommerce </span>
                                            </div>
                                            <div class="hire-btn">
                                            	<a href="#" class="btn-default" > <i class="fa fa-location-arrow"></i> Hire Me</a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="profile-content">
                                <div class="card">
                                    <div class="firstinfo">
                                    	<img src="images/users/12.jpg" alt="" class="img-circle img-responsive" />
                                        <div class="profileinfo">
                                            <h1> <a href="#"> Arslan Tariq </a></h1>
                                            <h3>Designer and Developer</h3>
                                            <p class="bio">Lived all my life on the top of mount Fuji, learning the way to be a Ninja Dev.</p>
                                            <div class="profile-skills">
                                            	<span> photoshop </span> <span> coral draw </span> <span> javascript </span> <span> htm5 </span> <span> css3 </span> 
                                            </div>
                                            <div class="hire-btn">
                                            	<a href="#" class="btn-default" > <i class="fa fa-location-arrow"></i> Hire Me</a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="profile-content">
                                <div class="card">
                                    <div class="firstinfo">
                                    	<img src="images/users/13.jpg" alt="" class="img-circle img-responsive" />
                                        <div class="profileinfo">
                                            <h1> <a href="#"> Humayun Sarfraz </a></h1>
                                            <h3>PHP Ninja</h3>
                                            <p class="bio">Lived all my life on the top of mount Fuji, learning the way to be a Ninja Dev.</p>
                                            <div class="profile-skills">
                                            	<span> wordpress </span> <span> plugin </span> <span> javascript </span> <span> php </span> <span> laravel </span> 
                                            </div>
                                            <div class="hire-btn">
                                            	<a href="#" class="btn-default" > <i class="fa fa-location-arrow"></i> Hire Me</a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="profile-content">
                                <div class="card">
                                    <div class="firstinfo">
                                    	<img src="images/users/12.jpg" alt="" class="img-circle img-responsive" />
                                        <div class="profileinfo">
                                            <h1> <a href="#"> Muhammad Umair </a></h1>
                                            <h3>Laravel Ninja</h3>
                                            <p class="bio">Lived all my life on the top of mount Fuji, learning the way to be a Ninja Dev.</p>
                                            <div class="profile-skills">
                                            	<span> laravel </span> <span> css </span> <span> javascript </span> <span> php </span> <span> wordpress </span> 
                                            </div>
                                            <div class="hire-btn">
                                            	<a href="#" class="btn-default" > <i class="fa fa-location-arrow"></i> Hire Me</a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="profile-content">
                                <div class="card">
                                    <div class="firstinfo">
                                    	<img src="images/users/14.jpg" alt="" class="img-circle img-responsive" />
                                        <div class="profileinfo">
                                            <h1> <a href="#"> Emily Copper </a></h1>
                                            <h3>Laravel Ninja</h3>
                                            <p class="bio">Lived all my life on the top of mount Fuji, learning the way to be a Ninja Dev.</p>
                                            <div class="profile-skills">
                                            	<span> html5 </span> <span> css3 </span> <span> javascript </span> <span> php </span> <span> laravel </span> 
                                            </div>
                                            <div class="hire-btn">
                                            	<a href="#" class="btn-default" > <i class="fa fa-location-arrow"></i> Hire Me</a>
                                            </div>
                                        </div>
                                    </div>
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
                                    <div class="widget-heading"><span class="title">Latest Articles</span></div>
                                    <ul class="related-post">
                                        <li>
                                            <a href="#">Assistant Manager Procurement </a>
                                            <span><i class="fa fa-map-marker"></i>Managgo, WC </span>
                                            <span><i class="fa fa-calendar"></i>March 22, 2015 </span>
                                        </li>
                                        <li>
                                            <a href="#">Marketing Professionals Required</a>
                                            <span><i class="fa fa-map-marker"></i>Homelando, New Vage </span>
                                            <span><i class="fa fa-calendar"></i>Sep 01, 2015</span>
                                        </li>
                                        <li>
                                            <a href="#">Mobile App Programmers </a>
                                            <span><i class="fa fa-map-marker"></i>Homelando, New Vage </span>
                                            <span><i class="fa fa-calendar"></i> - March 09, 2016 </span>
                                        </li>
                                        <li>
                                            <a href="#">General Compliance Officer</a>
                                            <span><i class="fa fa-map-marker"></i>Arlington, VA </span>
                                            <span><i class="fa fa-calendar"></i>Feb 09, 2016</span>
                                        </li>
                                        <li>
                                            <a href="#">Call Centre Manager</a>
                                            <span><i class="fa fa-map-marker"></i>Managgo, WC  </span>
                                            <span><i class="fa fa-calendar"></i> March 09, 2016</span>
                                        </li>
                                        <li>
                                            <a href="#">Assistant Manager Audit</a>
                                            <span><i class="fa fa-map-marker"></i>Heling, WC </span>
                                            <span><i class="fa fa-calendar"></i>Aug 01, 2015 - </span>
                                        </li>
                                        <li>
                                            <a href="#">Telesales Agent (UK Dialing)</a>
                                            <span><i class="fa fa-map-marker"></i>Somro, New </span>
                                            <span><i class="fa fa-calendar"></i>Sep 01, 2015</span>
                                        </li>
                                        <li>
                                            <a href="#">Assistant Brand Manager</a>
                                            <span><i class="fa fa-map-marker"></i>Heritage, VA </span>
                                            <span><i class="fa fa-calendar"></i>May 09, 2016</span>
                                        </li>
                                    </ul>
                                </div>

                            </aside>
                        </div>
                    </div>
                </div>
            </div>
        </section>

    <?php @include("bottom.php"); ?>
        <a href="#" class="scrollup"><i class="fa fa-chevron-up"></i></a>

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

        <!-- CORE JS -->
        <script type="text/javascript" src="js/custom.js"></script>

        <script type="text/javascript">
            (function($) {
                "use strict";
                $('#posts-masonry').imagesLoaded(function() {
                    $('#posts-masonry').isotope({
                        layoutMode: 'masonry',
                        transitionDuration: '0.3s'
                    });
                });
            })(jQuery);
        </script>

    </div>
</body>

</html>