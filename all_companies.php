<?php
include('config.php');

//print_r($_SESSION);
@include("user_sessioncheck.php"); 
?><!DOCTYPE html>
<html lang="en">

<head>
    <meta http-equiv="content-type" content="text/html;charset=UTF-8" />
    <!--[if IE]>
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <![endif]-->
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="ScriptsBundle">
    <title>Staffing Spot | Jobs By Company</title>
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
</head>

<body>

    <div class="page category-page">
<!--    <div id="spinner">
        <div class="spinner-img">
            <img alt="Staffing Spot - the spot for your career" src="images/loader.svg" />
            <h2>Please Wait...</h2>
        </div>
    </div> -->
            

            <?php @include("top.php"); ?>
<div class="clearfix"></div>


    <section class="job-breadcrumb">
        <div class="container">
            <div class="col-md-6 col-sm-7 co-xs-12">
                <h3>Jobs By Companies</h3>
            </div>
            <div class="col-md-6 col-sm-5 co-xs-12 text-right">
                <div class="bread">
                    <ol class="breadcrumb">
                        <li><a href="index.php">Home</a> </li>
                        <li class="active">Jobs By Companies</li>
                    </ol>
                </div>
            </div>
        </div>
    </section>




<?php 
$array_name = [];
$sql_name = mysql_query("SELECT * FROM `tbl_postjob` tp join tbl_employer_details ted on (tp.fld_empid=ted.fld_empid) join `tbl_employer` te  on(ted.fld_empid=te.fld_id) WHERE tp.fld_expirydate >= CURDATE() AND tp.fld_job_status =1 AND tp.fld_delstatus = 0 AND te.`fld_emp_status` = 1  order by ted.fld_employer_name ASC");
while($row=mysql_fetch_assoc($sql_name)){
    
    $name12 = explode(',', $row['fld_employer_name']);

    foreach ($name12 as $name1) {
        array_push($array_name, $name1);
    }
}
$empname =array_unique($array_name);
//$empname123 = [];
//foreach ($empname as $empname1234) {
//        array_push($empname123, $empname1234);
//    }
//$total = count($empname);
//if($total > 20){
    $dis = 20;
//}else {
//    $dis =$total;
//}
$total_page = ceil($total / $dis);

$page_cur = (isset($_GET['page'])) ? $_GET['page'] : 1;
$k = ($page_cur - 1) * $dis;
$j = $page_cur * $dis;
if(!empty($empname)){
?>
        <section class="categories">
            <div class="container">
                <div class="row">
                    <div class="col-md-12 col-sm-12 col-xs-12">

                        <div class="col-md-12 col-sm-12 col-xs-12">
                            <div class="Heading-title black">
                                <h1>Jobs By Companies</h1>
                            </div>
                        </div>
                        <div class="col-md-12 col-sm-12 col-xs-12 nopadding">
                            <div id="cats-masonry">
				<?php 
				foreach($empname as $empname_list){
//                                    for($i = $k; $i < $j;$i++){
				    $query = mysql_query("select count(*) as count from tbl_postjob pj join tbl_employer_details ted on(pj.fld_empid=ted.fld_empid) join tbl_employer te on (ted.fld_empid=te.fld_id) where ted.fld_employer_name like '%$empname_list%' and pj.fld_expirydate >= CURDATE() AND pj.fld_job_status =1 AND pj.fld_delstatus = 0 AND te.`fld_emp_status` = 1");
				    while($roww=mysql_fetch_assoc($query)){
					$count = $roww['count'];
                                        $empname_list_name =(strlen($empname_list) > 20) ? substr($empname_list,0,20).'...' : $empname_list;
				    }
				    ?>
                                <div class="col-md-4 col-sm-6 col-xs-12">
                                    <div class="category-box">
                                        <ul class="">
                                            <li><a href="searchjoblist.php?action=joblist&employer_name=<?php echo base64_encode($empname_list); ?>" title="<?php echo $empname_list; ?>"><?php echo $empname_list_name; ?><span>(<?php echo $count; ?>)</span> </a></li>
                                        </ul>
                                    </div>
                                </div>
<?php } } else {echo "<center><h2>No Data Available</h2></center>";} ?>
                               
                                <div class="col-md-12 col-sm-12 col-xs-12">
                                    <?php if ($total > 20) { ?>
                                            <ul class="pagination" style="font-weight:bolder;">

    <?php if ($page_cur > 1) { ?>

                                                <li class="disabled" ><a href="all_companies.php?page=<?php echo ($page_cur - 1); ?>">Prev</a></li>
                                            <?php } else { ?>
                                                    <li class="active"><a>Prev</a></li>
        <?php
    } for ($i = 1; $i <= $total_page; $i++) {

        if ($page_cur == $i) {
            ?>
                                                        <li class="active"><a><?php echo $i; ?></a></li>

                                                    <?php } else { ?>
                                                        <li class="" ><a href="all_companies.php?page=<?php echo $i; ?>"><?php echo $i; ?></a></li>

                                                    <?php
                                                    }
                                                }
                                                if ($page_cur < $total_page) {
                                                    ?>

                                                    <li class="disabled" ><a href="all_companies.php?page=<?php echo ($page_cur + 1); ?>">Next >></a></li>
                                                <?php } else { ?>

                                                    <li class="active" ><a>Next >></a></li>
                                                <?php } ?>


                                            </ul>
                                        <?php } ?>

                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>


            <link rel="stylesheet" href="https://ajax.googleapis.com/ajax/libs/jqueryui/1.11.4/themes/smoothness/jquery-ui.css">
            <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
            <script src="https://ajax.googleapis.com/ajax/libs/jqueryui/1.11.4/jquery-ui.min.js"></script>

<?php
@include("bottom.php");
?>

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
            <script type="text/javascript">
                (function ($) {
                    "use strict";
                    $('#cats-masonry').imagesLoaded(function () {
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


<!-- Mirrored from templates.Vinformax.com/opportunities-v3/demo/all-categories.php by HTTrack Website Copier/3.x [XR&CO'2014], Tue, 07 Mar 2017 01:56:56 GMT -->
</html>