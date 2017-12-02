<?php
include('config.php');

//print_r($_SESSION);
@include("user_sessioncheck.php"); 
//echo $empuser_id;
if ($empuser_id == "") {
    header('Location: index.php'); 
}


$name = $_SESSION["empuser_name"];
$id = $_SESSION['empuser_id'];
//echo "SELECT count(*) as total FROM `tbl_postjob` WHERE `empid`='$id' and `fld_status`=1";
$pagin_query = mysql_query("SELECT count(*) as total FROM `tbl_postjob` WHERE `fld_empid`='$id' and `fld_expirydate` >= DATE(NOW()) and `fld_status`=1");
//echo $pagin_query;

$pagin_row = mysql_fetch_array($pagin_query);
//print_r( $pagin_row);
$total = $pagin_row['total'];
//echo $total;
//exit();
$dis = 3;
$total_page = ceil($total / $dis);
//print_r($total_page);
$page_cur = (isset($_GET['page'])) ? $_GET['page'] : 1;
//echo $page_cur;
$k = ($page_cur - 1) * $dis;
?><!DOCTYPE html>
<html lang="en">


<!-- Mirrored from templates.Staffing Spot.com/opportunities-v3/demo/company-dashboard-featured-jobs.php by HTTrack Website Copier/3.x [XR&CO'2014], Tue, 07 Mar 2017 01:58:03 GMT -->
<head>
    <meta http-equiv="content-type" content="text/html;charset=UTF-8" />
    <!--[if IE]>
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
<![endif]-->
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="Vinformax">
    <title>Staffingspot | Applied Jobs</title>
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

      <?php @include("top.php"); ?>
        <div class="clearfix"></div>

        

        <section class="job-breadcrumb">
            <div class="container">
                <div class="row">
                    <div class="col-md-6 col-sm-7 co-xs-12 text-left">
                            <h3>Applied Jobs</h3>
                    </div>
                    <div class="col-md-6 col-sm-5 co-xs-12 text-right">
                        <div class="bread">
                            <ol class="breadcrumb">
                                <li><a href="company-dashboard.php">Dashboard</a>
                                </li>
                                
                                <li class="active">Who Applied Jobs</li>
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
                                
                            <?php @include("empleftpanel.php"); ?>       
                        <div class="col-md-8 col-sm-8 col-xs-12" id="active">
                            <div class="heading-inner first-heading">
                                <p class="title">Applied Jobs</p>
                            </div>
                          
                            <div class="all-jobs-list-box2">
                                    <?php
                                    $sql = "select * from `tbl_postjob` where fld_empid='$id' and `fld_expirydate` >= DATE(NOW()) and fld_job_status=1 limit $k,$dis";
                                                                    
//                                 echo $sql;
                                    $res = mysql_query($sql);
                                                 $totalvisitor_count = mysql_num_rows($res);
                                                //echo $totalvisitor_count;
                                    if ($totalvisitor_count > 0) {
                                        while ($rows = mysql_fetch_assoc($res)) {
                                                  ?>
                                <div class="job-box job-box-2 expire-box ribbon-content">
                                    <div class="job-title-box col-md-12">

                                                    <div class="job-title">
                                                        <?php echo $rows['fld_jobtitle']; ?>
                                                    </div>
                                                    <div class="comp-name">
                                                        <?php echo $rows['fld_industry_type']; ?>
                                                    </div>
                                                    <div class="job-type jt-full-time-color col-md-12 col-sm-12 nopadding mt">
                                                        <i class="fa fa-clock-o"></i> <?php echo $rows['fld_job_type']; ?>
                                                    </div>
                                        </div>
                                    <div class="expire-job-box col-md-12">
                                        <div class="expire-date col-md-12 col-sm-12 col-xs-12 nopadding mt">This job will Expire on  <strong><?php echo $rows['fld_expirydate']; ?></strong></div>
                                        <div class=" col-md-12 col-sm-12 col-xs-12 text-right mt nopadding">

                                            <a href="javascript:void(0)" class="btn btn-default"  id='btndelete' name='btndelete'onClick="fn_applied('<?php echo $rows['fld_id']; ?>')"> View Applied Seekers</a> 

                                        </div>
                                        </div>
                                              
                                    
                                </div> 
    <?php } ?>
                               
    <?php
    $pagin_query = mysql_query("SELECT count(*) as total FROM `tbl_postjob` WHERE `fld_empid`='$id' and `fld_expirydate` >= DATE(NOW()) and `fld_status`=1");
                                //echo  $total;
    if ($total > 3) {
        ?>
                           <ul class="pagination" style="font-weight:bolder;">

                                            <?php if ($page_cur > 1) { ?>

                                                    <li class="disabled" ><a href="who_applied.php?page=<?php echo ($page_cur - 1); ?>">Prev</a></li>
<?php } else { ?>
<li class="active"><a>Prev</a></li>
                                                <?php
                                                } for ($i = 1; $i <= $total_page; $i++) {

                                                    if ($page_cur == $i) {
                                                        ?>
        <li class="active"><a><?php echo $i; ?></a></li>

  <?php } else { ?>
        <li class="disabled" ><a href="who_applied.php?page=<?php echo $i; ?>"><?php echo $i; ?></a></li>

            <?php }
        }
        if ($page_cur < $total_page) {
            ?>

                                                    <li class="disabled" ><a href="who_applied.php?page=<?php echo ($page_cur + 1); ?>">Next >></a></li>
    <?php } else { ?>

        <li class="active" ><a>Next >></a></li>
        <?php } ?>
                                            <?php } ?>
 

</ul>
                                    <?php } else {
                                ?>
                                <div class="col-md-12 col-sm-12 nopadding" style="font-size: 28px;">
                                    <center><h3><?php echo "No Data Available"; ?></h3></center>
                                    
                                </div>
                                    <?php } ?>

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
        <script type="text/javascript">
                                                $(document).on('click', '.status_checks', function () {
    
    
//        var current_element = $(this);
//        var url = "ajaxdel.php?op=status";
   
        $.ajax({
        type: "POST",
        url: "featured-jobs.php?op=job_status",
                                                        data: {id: re, status: status},
                                                        success: function (data)
          {   
              //alert(data);
               location.reload();
            
            
          }
        });
      }      
    });
</script>

        <script type="text/javascript" language="javascript">
        
       

function fn_applied(delid)
{
 //alert(delid);
                    window.location.href = "seekersdetails.php?action=resumelistlist&id=" + delid;
}


</script>


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


<!-- Mirrored from templates.Staffing Spot.com/opportunities-v3/demo/company-dashboard-featured-jobs.php by HTTrack Website Copier/3.x [XR&CO'2014], Tue, 07 Mar 2017 01:58:03 GMT -->
</html>