<?phpinclude('config.php');//print_r($_SESSION);@include("user_sessioncheck.php"); //echo $empuser_id;if($empuser_id == ""){        header('Location: index.php'); }$name = $_SESSION["empuser_name"];$id = $_SESSION['empuser_id'];?><!DOCTYPE html><html lang="en">    <head>    <meta http-equiv="content-type" content="text/html;charset=UTF-8" />    <!--[if IE]>    <meta http-equiv="X-UA-Compatible" content="IE=edge"><![endif]-->    <meta name="viewport" content="width=device-width, initial-scale=1.0">    <meta name="description" content="">    <meta name="author" content="Vinformax">    <title>Staffingspot | Followers</title>    <link rel="icon" href="images/favicon.ico" type="image/x-icon">    <!-- BOOTSTRAPE STYLESHEET CSS FILES -->    <link rel="stylesheet" href="css/bootstrap.min.css">    <!-- JQUERY SELECT -->    <link href="css/select2.min.css" rel="stylesheet" />	    <!-- JQUERY MENU -->    <link rel="stylesheet" href="css/mega_menu.min.css">    <!-- ANIMATION -->    <link rel="stylesheet" href="css/animate.min.css">    <!-- OWl  CAROUSEL-->    <link rel="stylesheet" href="css/owl.carousel.css">    <link rel="stylesheet" href="css/owl.style.css">    <!-- TEMPLATE CORE CSS -->    <link rel="stylesheet" href="css/style.css">    <link rel="stylesheet" href="css/style1.css">    <link rel="stylesheet" href="css/mobile.css">    <!-- FONT AWESOME -->    <link rel="stylesheet" type="text/css" href="css/font-awesome.min.css">    <link rel="stylesheet" href="css/et-line-fonts.css" type="text/css">    <!-- Google Fonts -->    <link href="http://fonts.googleapis.com/css?family=Source+Sans+Pro:400,600,700,900,300" rel="stylesheet" type="text/css">    <link href="https://fonts.googleapis.com/css?family=Open+Sans:400,600,700" rel="stylesheet" type="text/css">	    <!-- JavaScripts -->    <script src="js/modernizr.js"></script>	    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->    <!--[if lt IE 9]>        <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>        <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script><![endif]--></head><body>    <div class="page category-page">        <div id="spinner">            <div class="spinner-img">                <img alt="Staffing Spot - the spot for your career" src="images/loader.svg" />                <h2>Please Wait...</h2>            </div>        </div><?php                       @include("top.php");                    ?>        <div class="clearfix"></div>             <section class="job-breadcrumb">            <div class="container">                <div class="row">                    <div class="col-md-6 col-sm-7 co-xs-12 text-left">                        <h3>Company Followers</h3>                    </div>                    <div class="col-md-6 col-sm-5 co-xs-12 text-right">                        <div class="bread">                            <ol class="breadcrumb">                                <li><a href="company-dashboard.php">Dashboard</a>                                </li>                                                               <li class="active">Followers</li>                            </ol>                        </div>                    </div>                </div>            </div>        </section>	<?php        @include("emptop.php");        ?>        <section class="dashboard-body">            <div class="container">                <div class="row">                    <div class="col-md-12 col-sm-12 col-xs-12 nopadding">			 <?php @include("empleftpanel.php");?>                                                                               <div class="col-md-8 col-sm-8 col-xs-12">                            <div class="heading-inner first-heading">                                <p class="title">Followers Details</p>                            </div>                                                  <div class="follower-section">                                <?php                                                                 $followersids = "Select fld_followers from tbl_employer_details where fld_empid = '$id'";//                                echo "Select fld_followers from tbl_jobseeker where fld_id = '$id'";                                $followersids1 = mysql_query($followersids);                                $followiddds =  mysql_fetch_assoc($followersids1);                                $str="'";                                $fids = $followiddds['fld_followers'];//                                echo $fids;                                 $test=explode(',',$fids);//                                print_r($test);                                foreach($test as $testvalue){                                     $test1 .=  $str.$testvalue.$str.',';                                }                                //echo $test1;                                 $fids123= rtrim($test1,',');                                                                //$test= explode(",",$row['fld_followers']);                                //$sql="select * from `tbl_jobseeker` js where js.fld_followers in()";                                $test1 = array();                                $sql="select * from `tbl_jobseeker_details` tjd  join `tbl_jobseeker` tj on (tjd.fld_js_id=tj.fld_id) where tj.fld_id IN ($fids123) and tjd.fld_js_id IN ($fids123)";                            //echo $sql;                                   $res=mysql_query($sql);                                   $contt = mysql_num_rows($res);                                   //                                   echo $contt;                                   if($contt > 0)                                    {                                                                      while($row=mysql_fetch_assoc($res)){ ?>                            <?php //   $test= explode(",",$row['fld_followers']);//                           echo "<pre>";//                           print_r($test);//                           echo "</pre>";//                           echo $id;//                           print_r($test1);                                   //                           if (in_array($id, $test)) //                                   {                            ?>                                <div class="col-md-12 col-sm-12 col-xs-12" id="followers">                                    <ul class="list-group list-group-dividered list-group-full">                                        <li class="list-group-item">                                            <div class="media">                                                <div class="media-left">                                                        <?php							$image_exists = $row['fld_profilepic'];							$logo = 'images/profilepic/'.$image_exists;          							$encrypted_id = base64_encode($row['fld_js_id']);?>                                                        <a class="avatar" href="public_profile.php?seeker_id=<?=$encrypted_id?>">							  <?php //							  echo $image_exists;							  if(file_exists($logo) && (preg_match('/\.([^\.]+)$/', $logo)))							      {							      ?>                                                        <img src="images/profilepic/<?php echo $image_exists; ?>" class="img-responsive" alt="">							  <?php							  } 							  else							      { ?>							<img src="<?php echo "images/nopicture.jpg"; ?>" class="img-responsive" alt="">							  <?php 							      } ?>                                                        <i></i>                                                    </a>                                                </div>                                                <div class="media-body">                                                    <div class="col-md-12 col-sm-12 col-xs-12">                                                        <div class="name">                                                            <div>                                                                 <a class="name" href="public_profile.php?seeker_id=<?=$encrypted_id?>">                                                                 <?php echo $row['fld_name'] ;?>                                                                 </a>                                                             </div>                                                            <small> <?php echo $row['fld_email']; ?> </small>                                                        </div>                                                    </div>                                                </div>                                            </div>                                        </li>                                    </ul>                                </div>                                   <?php                                   }                                   } else {//                                       echo "aaabbbi";                                       ?>                                   <div class="col-md-12 col-sm-12 nopadding" style="font-size: 28px;">                                    <!--<div class="" id="followers">-->                                        <center><h3><?php echo "No Data Available"; ?></h3></center>                                    <!--</div>-->                                   </div>                                   <?php } ?>                                                                                                                               </div>                                                                </div>                            </div>                        </div>                    </div>                        </section>       <?php@include("bottom.php");?>        <a href="#" class="scrollup"><i class="fa fa-chevron-up"></i></a>        <!-- JAVASCRIPT JS  -->        <script type="text/javascript" src="js/jquery-3.1.1.min.js"></script>        <!-- JAVASCRIPT JS  -->     <script type="text/javascript" src="js/jquery-migrate-1.2.1.min.js"></script>        <!-- BOOTSTRAP CORE JS -->        <script type="text/javascript" src="js/bootstrap.min.js"></script>        <!-- JQUERY SELECT -->        <script type="text/javascript" src="js/select2.min.js"></script>                <!-- MEGA MENU -->        <script type="text/javascript" src="js/mega_menu.min.js"></script>                 <!-- JQUERY COUNTERUP -->        <script type="text/javascript" src="js/counterup.js"></script>        <!-- JQUERY WAYPOINT -->        <script type="text/javascript" src="js/waypoints.min.js"></script>        <!-- JQUERY REVEAL -->        <script type="text/javascript" src="js/footer-reveal.min.js"></script>        <!-- Owl Carousel -->        <script type="text/javascript" src="js/owl-carousel.js"></script>        <!-- CORE JS -->        <script type="text/javascript" src="js/custom.js"></script>    </div></body></html>