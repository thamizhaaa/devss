<?php
error_reporting(0);
@include("config.php");
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta http-equiv="content-type" content="text/html;charset=UTF-8" />    
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="Vinformax">
    <title>Interview Tips | Staffing Spot | Job Portal</title>
    <link rel="icon" href="images/favicon.ico" type="image/x-icon">

    <!-- BOOTSTRAPE STYLESHEET CSS FILES -->
    <link rel="stylesheet" href="css/bootstrap.min.css">

    <!-- JQUERY MENU -->
    <link rel="stylesheet" href="css/mega_menu.min.css">

    <!-- ANIMATION -->
    <link rel="stylesheet" href="css/animate.min.css">

    <!-- OWl  CAROUSEL-->
    <link rel="stylesheet" href="css/owl.carousel.css">
    <link rel="stylesheet" href="css/owl.style.css">

    <!-- TEMPLATE CORE CSS -->
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="css/style1.css">
    <link rel="stylesheet" href="css/mobile.css">

    <!-- FOR THIS PAGE ONLY -->
    <link href="css/select2.min.css" rel="stylesheet" />
    <link rel="stylesheet" href="css/jquery.tagsinput.min.css">

    <!-- FONT AWESOME -->
    <link rel="stylesheet" type="text/css" href="css/font-awesome.min.css">
    <link rel="stylesheet" href="css/et-line-fonts.css" type="text/css">

    <!-- Google Fonts -->
    <link href="http://fonts.googleapis.com/css?family=Source+Sans+Pro:400,600,700,900,300" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:400,600,700" rel="stylesheet" type="text/css">
	
    <!-- JavaScripts -->
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
                        <h3>Interview Tips</h3>
                    </div>
                    <div class="col-md-6 col-sm-5 co-xs-12 text-right">
                        <div class="bread">
                            <ol class="breadcrumb">
                                <li><a href="index.php">Home</a> </li>
                                <li class="active">Interview Tips</li>
                            </ol>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <section class="faqs">
            <div class="container">
                <div class="row">
                    <div class="col-md-12 col-sm-12 col-xs-12 nopadding">
                        <?php 
                                $interview_query = mysql_query("select * from tbl_interview_tips where fld_delstatus = 1 order by fld_id DESC");
                                $count = mysql_num_rows($interview_query);
                                if($count > 0){
                                ?>
                        <div class="col-md-12 col-sm-12 col-xs-12">
                            <div class="Heading-title black">
                                <h1>Interview Tips</h1>
                                <p></p>
                            </div>
                        </div>
                        <div class="col-md-12 col-sm-12 col-xs-12">
                            <div class="panel-group drop-accordion" id="accordion" role="tablist" aria-multiselectable="true">
                                <?php
                                $a=0;
                                while($interview_fetch = mysql_fetch_array($interview_query)) {
                                $id = $interview_fetch['fld_id'];
                                $title = $interview_fetch['fld_interview_title'];
                                $descrip = $interview_fetch['fld_interview_description'];
                                $status = $interview_fetch['fld_interview_status'];
                                $description = (strlen($descrip) > 250) ? substr($descrip,0,250).'...' : $descrip;
                                $a++;
                                
                                ?>
                                 <?php if($a == 1){?>
                                
                                <div class="panel panel-default">
                                    <div class="panel-heading tab-collapsed" role="tab" id="heading<?php echo $id; ?>">
                                        <h4 class="panel-title"> <a class="collapse-controle" data-toggle="collapse" data-parent="#accordion" href="#collapse<?php echo $id; ?>" aria-expanded="true" aria-controls="collapse<?php echo $id; ?>"> <?php echo $a.')'.ucwords($title); ?><span class="expand-icon-wrap"><i class="fa expand-icon"></i></span> </a> </h4>
                                    </div>
                                    <div id="collapse<?php echo $id; ?>" class="panel-collapse collapse in" role="tabpanel" aria-labelledby="heading<?php echo $id; ?>" aria-expanded="true">
                                        <div class="panel-body">
                                               <p> <?php echo $description; ?></p>
                                               <?php if(strlen($descrip)> 250){ ?>
                                               <a class="pull-right rdm" href="interview_tip_details.php?id=<?php echo $id;  ?> ">Read More...</a>
                                               <?php } ?>
                                        </div>
                                    </div>
                                </div>
                                
                                <?php } else{?>
                                <div class="panel panel-default">
                                    <div class="panel-heading" role="tab" id="heading<?php echo $id; ?>">
                                        <h4 class="panel-title"> <a class="collapse-controle collapsed" data-toggle="collapse" data-parent="#accordion" href="#collapse<?php echo $id; ?>" aria-expanded="false" aria-controls="collapse<?php echo $id; ?>"> <?php echo $a.')'.ucwords($title); ?> <span class="expand-icon-wrap"><i class="fa expand-icon"></i></span> </a> </h4>
                                    </div>
                                    <div id="collapse<?php echo $id; ?>" class="panel-collapse collapse" role="tabpanel" aria-labelledby="heading<?php echo $id; ?>" aria-expanded="false">
                                        <div class="panel-body">
                                               <p> <?php echo $description; ?></p>
                                               <?php if(strlen($descrip)> 250){ ?>
                                               <a class="pull-right rdm" href="interview_tip_details.php?id=<?php echo $id;  ?> ">Read More...</a>
                                               <?php } ?>
                                        </div>
                                    </div>
                                </div>
                                
                                <?php
                                }
                                }
                                } else {echo "<center><h2>No Data Available</h2></center>";} 
                                ?>
                                
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <?php @include("bottom.php");?>

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

        <!-- CORE JS -->
        <script type="text/javascript" src="js/custom.js"></script>
    </div>
</body>
</html>