<?phperror_reporting(E_ALL ^ E_NOTICE);error_reporting(0);@include ("config.php");//print_r($_SESSION);@include("user_sessioncheck.php"); //echo $user_id;if($user_id == ""){        header('Location: index.php'); }$username = $_SESSION["user_name"];$user_email = $_SESSION['user_email']; $user_id = $_SESSION['user_id'];//$check=$_SESSION["seekeruser_id"];$pagin_query = mysql_query("select count(*) as total from tbl_job_recent_search where fld_seeker_id='$user_id'");$pagin_row = mysql_fetch_array($pagin_query);$total = $pagin_row['total'];//echo $total;$dis  = 5;$total_page = ceil($total / $dis);//echo 'total'.$total_page;$page_cur = (isset($_GET['page'])) ? $_GET['page'] : 1;$k = ($page_cur - 1) * $dis;                        if(isset($_GET["page"])){    $page_number = filter_var($_GET["page"], FILTER_SANITIZE_NUMBER_INT, FILTER_FLAG_STRIP_HIGH);    if(!is_numeric($page_number)){die('Invalid page number!');} //incase of invalid page number}else{    $page_number = 1;}$position = (($page_number-1) * $dis);                             ?><!DOCTYPE html><html lang="en"><head><meta http-equiv="content-type" content="text/html;charset=UTF-8" /><!--[if IE]><meta http-equiv="X-UA-Compatible" content="IE=edge"><![endif]--><meta name="viewport" content="width=device-width, initial-scale=1.0"><meta name="description" content=""><meta name="author" content="staffingspot"><title>Followed Companies | Staffingspot | Job Portal</title><link rel="icon" href="images/favicon.ico" type="image/x-icon"><!-- BOOTSTRAPE STYLESHEET CSS FILES --><link rel="stylesheet" href="css/bootstrap.min.css"><!-- JQUERY SELECT --><link href="css/select2.min.css" rel="stylesheet" /><!-- JQUERY MENU --><link rel="stylesheet" href="css/mega_menu.min.css"><!-- ANIMATION --><link rel="stylesheet" href="css/animate.min.css"><!-- OWl  CAROUSEL--><link rel="stylesheet" href="css/owl.carousel.css"><link rel="stylesheet" href="css/owl.style.css"><!-- TEMPLATE CORE CSS --><link rel="stylesheet" href="css/style.css"><link rel="stylesheet" href="css/style1.css"><link rel="stylesheet" href="css/mobile.css"><!-- FONT AWESOME --><link rel="stylesheet" type="text/css" href="css/font-awesome.min.css"><link rel="stylesheet" href="css/et-line-fonts.css" type="text/css"><!-- Google Fonts --><link href="http://fonts.googleapis.com/css?family=Source+Sans+Pro:400,600,700,900,300" rel="stylesheet" type="text/css"><link href="https://fonts.googleapis.com/css?family=Open+Sans:400,600,700" rel="stylesheet" type="text/css"><!-- JavaScripts --><script src="js/modernizr.js"></script><!-- JAVASCRIPT JS  --><script type="text/javascript" src="js/jquery-3.1.1.min.js"></script><!-- JAVASCRIPT JS  --> <!--<script type="text/javascript" src="js/jquery-migrate-1.2.1.min.js"></script>--><!-- BOOTSTRAP CORE JS --><script type="text/javascript" src="js/bootstrap.min.js"></script><!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries --><!-- WARNING: Respond.js doesn't work if you view the page via file:// --><!--[if lt IE 9]><script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script><script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script><![endif]--></head><body><div class="page category-page"> <div id="spinner"><div class="spinner-img"><img alt="Staffing Spot - the spot for your career" src="images/loader.svg" /><h2>Please Wait...</h2></div></div><?php @include("top.php");?><div class="clearfix"></div><section class="job-breadcrumb">    <div class="container">        <div class="row">            <div class="col-md-12 col-sm-12 col-xs-12">                <div class="col-md-6 col-sm-7 co-xs-12 text-left">                    <h3>Search History</h3>                </div>                <div class="col-md-6 col-sm-5 co-xs-12 text-right">                    <div class="bread">                        <ol class="breadcrumb">                            <li><a href="user-dashboard.php">Dashboard</a> </li>                            <li class="active">Search History</li>                        </ol>                    </div>                </div>            </div>        </div>    </div></section><?php include("usertop.php"); ?><section class="dashboard-body">    <div class="container">        <div class="row">            <div class="col-md-12 col-sm-12 col-xs-12">                <?php @include("userprofleftpanel.php");?>                <div class="col-md-8 col-sm-8 col-xs-12">                    <div class="heading-inner first-heading">                        <p class="title">Search History</p>                    </div>                    <div class="col-md-12 col-sm-12 col-xs-12 nopadding">                        <div class="company-list">                            <div class="table-responsive">                                                                       <?php				                                                $records = mysql_query("select fld_id,fld_keywords,fld_location,fld_experience,fld_created_date from tbl_job_recent_search where fld_seeker_id='$user_id' LIMIT $k,$dis") or die("Query fail: " . mysql_error());$totalvisitor_count = mysql_num_rows($records);						                                            if ($totalvisitor_count > 0) {                                                    ?><table class="table  table-striped">                                    <thead class="thead-inverse">                                        <tr>                                            <th>S.No</th>                                            <th>Skills</th>                                            <th>Location</th>                                            <th>Experience</th>                                            <th>Date</th>                                        </tr>                                        </thead>                                    <tbody>                                    <?php      $i=$position+1;                                    while ($project = mysql_fetch_assoc($records)) {                                      ?>							                                    <tr onclick="fn_search(<?php echo $project['fld_id']; ?>)" style="cursor:pointer">    <td><h5><?php echo $i; ?></h5></td>                                        <td><h5><?php 					if($project['fld_keywords']!=''){										    echo $project['fld_keywords'];					}else{ ?>						<p style="float:center"><?php  echo '-';?></p>					<?php }?></h5></td>    <td><h5><?php    if($project['fld_location']!=''){	//echo substr($project['fld_location'],0,-1);        echo $project['fld_location'];    }else{ ?>						<p style="float:center"><?php  echo '-';?></p>					<?php }?></h5></td>                                        <td><h5><?php					if($project['fld_experience']!=''){					    echo $project['fld_experience'];					}else{ ?>						<p style="text-:center"><?php  echo '-';?></p>					<?php }?></h5></td>                                        <td><h5><?php echo $project['fld_created_date']; ?></h5></td>                                    </tr>					                                                                    <?php $i++; }						    ?>							                                                                                       </tbody>                                </table>                                                                <?php                                 }else {                                    ?>                                <div class="col-md-12 col-sm-12 nopadding" style="font-size: 28px;">                                    <center><h3>No Data Available</h3></center>                                </div>                                <?php } ?>                            </div>                        </div>                    </div>                </div>    <div class="pagination">                <?php if($total > $dis){ ?>                                                                    <ul class="pagination" style="font-weight:bolder;">        <?php        if ($page_cur > 1) {        ?>        <li class="disabled" ><a href="user-history.php?page=<?php            echo ($page_cur - 1);        ?>">Prev</a></li>        <?php        } else {        ?>        <li class="active"><a>Prev</a></li>        <?php        }        for ($i = 1; $i <= $total_page; $i++) {            if ($page_cur == $i) {        ?>               <li class="active"><a><?php                echo $i;        ?></a></li>          <?php            } else {        ?>         <li class="disabled" ><a href="user-history.php?page=<?php                echo $i;        ?>"><?php                echo $i;        ?></a></li>          <?php            }        }        if ($page_cur < $total_page) {        ?>          <li class="disabled" ><a href="user-history.php?page=<?php            echo ($page_cur + 1);        ?>">Next >></a></li>            <?php        } else {        ?>                <li class="active" ><a>Next >></a></li>                <?php        }        ?>        </ul>                <?php } ?>                                    </div>        </div>    </div></section><?php @include("bottom.php");?><a href="#" class="scrollup"><i class="fa fa-chevron-up"></i></a><!-- JQUERY SELECT --><script type="text/javascript" src="js/select2.min.js"></script><!-- MEGA MENU --><script type="text/javascript" src="js/mega_menu.min.js"></script><!-- JQUERY COUNTERUP --><script type="text/javascript" src="js/counterup.js"></script><!-- JQUERY WAYPOINT --><script type="text/javascript" src="js/waypoints.min.js"></script><!-- JQUERY REVEAL --><script type="text/javascript" src="js/footer-reveal.min.js"></script><!-- Owl Carousel --><script type="text/javascript" src="js/owl-carousel.js"></script><!-- CORE JS --><script type="text/javascript" src="js/custom.js"></script><script type="text/javascript" src="scripts/jquery.form.js"></script><script>function fn_search(id){//   alert(id);			    $.ajax({                                type: "POST",                                url: "seeker_extra_details_inner.php?op=search",                                data: '&id=' + id ,				dataType: "json",                                success: function (response) {                                    if (response.status == "ok")                                    {					var city = response.city;					var skill = response.skill;					var experience = response.experience;                                        window.location.href="searchjoblist.php?action=joblist&city="+city+"&skill="+skill+"&experience="+experience;                                      }                                }                            });                     }</script>  </div></body></html>