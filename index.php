<?php
error_reporting(E_ALL ^ E_NOTICE);
error_reporting(E_ERROR);
@include('config.php');
?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta http-equiv="content-type" content="text/html;charset=UTF-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta name="description" content="">
        <meta name="author" content="vinformax">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
        <title>Staffingspot Job Portal</title>
        <link rel="icon" href="favicon.ico" type="image/x-icon">
        <link rel="stylesheet" href="css/bootstrap.min.css">
        <link href="css/select2.min.css" rel="stylesheet" />
        <link rel="stylesheet" href="css/mega_menu.min.css">
        <link rel="stylesheet" href="css/animate.min.css">
        <link rel="stylesheet" href="css/owl.carousel.css">
        <link rel="stylesheet" href="css/owl.style.css">
        <link rel="stylesheet" href="css/style.css">
        <link rel="stylesheet" href="css/style1.css">
        <link rel="stylesheet" href="css/mobile.css">
        <link rel="stylesheet" type="text/css" href="css/font-awesome.min.css">
        <link rel="stylesheet" href="css/et-line-fonts.css" type="text/css">
        <link href="http://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,900" rel="stylesheet" type="text/css">
        <link href="https://fonts.googleapis.com/css?family=Open+Sans:400,600,700" rel="stylesheet" type="text/css">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/chosen/1.4.2/chosen.css">
        <script src="js/modernizr.js"></script>

<!--        <link href="jquery.flexdatalist.css" rel="stylesheet" type="text/css">
        <link href="jquery.flexdatalist.min.css" rel="stylesheet" type="text/css">
        <script src="jquery.flexdatalist.min.js"></script>
        <script src="jquery.flexdatalist.js"></script>-->
<?php 

$username = $_SESSION["user_name"];
$user_email = $_SESSION['user_email']; 
$user_id = $_SESSION['user_id'];
$empusername = $_SESSION["empuser_name"];
$empuser_email = $_SESSION['empuser_email']; 
$empuser_id = $_SESSION['empuser_id'];

//$getmail_empsignup = base64_decode($_GET['username']);
$getmail_jobalert = base64_decode($_GET['alert_username']);

$getmail_signup = base64_decode($_GET['username']);

$getmail_signup_emp = base64_decode($_GET['empusername']);
$getactivation_code = base64_decode($_GET['activation']);
?>
<?php

if(isset($getmail_jobalert) && isset($getactivation_code))
{
$uname_active = $getmail_jobalert; 
$code_active = $getactivation_code;     

$code=mysql_query("SELECT fld_jobalert_id FROM tbl_jobalert WHERE fld_activation_code='$code_active' and fld_status_active =0");

if(mysql_num_rows($code) > 0)
{

$count=mysql_query("SELECT fld_jobalert_id FROM tbl_jobalert WHERE fld_activation_code='$code_active' and fld_status_active='0'");

if(mysql_num_rows($count) == 1)
{
mysql_query("UPDATE tbl_jobalert SET fld_status_active='1' WHERE fld_activation_code='$code_active'");
?>
<script type='text/javascript'>
    $(window).on('load',function(){
        $('#jobalert_activate_success').modal('show');
    });
</script>
<?php
}   

}
}




if(isset($getmail_signup_emp) && isset($getactivation_code))
{
    //echo "siodhihuih";
$uname_active = $getmail_signup_emp; 
$code_active = $getactivation_code;     

$code=mysql_query("SELECT fld_id FROM tbl_employer WHERE fld_activation_code='$code_active' and fld_emp_status =0");
//echo "SELECT fld_id FROM tbl_jobseeker WHERE fld_activation_code='$code_active' and fld_js_status =0";

if(mysql_num_rows($code) > 0)
{

$count=mysql_query("SELECT fld_id FROM tbl_employer WHERE fld_activation_code='$code_active' and fld_emp_status='0'");

if(mysql_num_rows($count) == 1)
{
mysql_query("UPDATE tbl_employer SET fld_emp_status='1' WHERE fld_activation_code='$code_active'");
?>
<script type='text/javascript'>
    $(window).on('load',function(){
        $('#activate_success').modal('show');
    });
</script>
<?php
}   

}
}
if(isset($getmail_signup) && isset($getactivation_code))
{
    //echo "siodhihuih";
$uname_active = $getmail_signup; 
$code_active = $getactivation_code;     

$code=mysql_query("SELECT fld_id FROM tbl_jobseeker WHERE fld_activation_code='$code_active' and fld_js_status =0");
//echo "SELECT fld_id FROM tbl_jobseeker WHERE fld_activation_code='$code_active' and fld_js_status =0";

if(mysql_num_rows($code) > 0)
{

$count=mysql_query("SELECT fld_id FROM tbl_jobseeker WHERE fld_activation_code='$code_active' and fld_js_status='0'");

if(mysql_num_rows($count) == 1)
{
mysql_query("UPDATE tbl_jobseeker SET fld_js_status='1' WHERE fld_activation_code='$code_active'");
?>
<script type='text/javascript'>
    $(window).on('load',function(){
        $('#activate_success').modal('show');
    });

</script>
<?php }   

}   
}
?>

	
	
	
        <!--<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>-->
<style>
        /* jssor slider loading skin spin css */
        .jssorl-009-spin img {
            animation-name: jssorl-009-spin;
            animation-duration: 1.6s;
            animation-iteration-count: infinite;
            animation-timing-function: linear;
        }

        @keyframes jssorl-009-spin {
            from {
                transform: rotate(0deg);
            }

            to {
                transform: rotate(360deg);
            }
        }


        .jssorb032 {position:absolute;}
        .jssorb032 .i {position:absolute;cursor:pointer;}
        .jssorb032 .i .b {fill:#fff;fill-opacity:0.7;stroke:#000;stroke-width:1200;stroke-miterlimit:10;stroke-opacity:0.25;}
        .jssorb032 .i:hover .b {fill:#000;fill-opacity:.6;stroke:#fff;stroke-opacity:.35;}
        .jssorb032 .iav .b {fill:#000;fill-opacity:1;stroke:#fff;stroke-opacity:.35;}
        .jssorb032 .i.idn {opacity:.3;}

        .jssora051 {display:block;position:absolute;cursor:pointer;}
        .jssora051 .a {fill:none;stroke:#fff;stroke-width:360;stroke-miterlimit:10;}
        .jssora051:hover {opacity:.8;}
        .jssora051.jssora051dn {opacity:.5;}
        .jssora051.jssora051ds {opacity:.3;pointer-events:none;}
        
        
        #experience{
                height: 50px;
        }
    </style>
    </head>

    <body>
        <div class="page">
            <div id="spinner">
                <div class="spinner-img">
                    <img alt="" src="images/loader.svg" />
                    <h2>Please Wait...</h2>
                </div>
            </div>
            <?php   
            @include("top.php");
            ?>
            <div class="clearfix"></div>
	    
	    <div id="activate_success" data-backdrop="static" data-keyboard="false" class="modal fade">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
        <center><h4 class="modal-title">Staffingspot | Job Portal</h4></center>
      </div>
      <div class="modal-body">
        <p>Thanks for your Registration</p>
        <p>Your Account Has Been Successfully Activated.Now You Can Login.</p>
      </div>
      <div class="modal-footer">
        <input type="reset" class="btn btn-default" value='Close' data-dismiss="modal" onClick="document.location.href='index.php'">   	
        <!--<input type="reset" class="btn btn-default" value='Close' data-dismiss="modal" onClick="return confirm_reset();">-->   	
      </div>
    </div>
  </div>
</div>   

     <div id="jobalert_activate_success" data-backdrop="static" data-keyboard="false" class="modal fade">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
        <center><h4 class="modal-title">Staffingspot | Job Portal</h4></center>
      </div>
      <div class="modal-body">
        <p>Thanks for subscribing the Job Alert</p>
        <p>You will receive job alert according to your skills.</p>
      </div>
      <div class="modal-footer">
        <input type="reset" class="btn btn-default" value='Close' data-dismiss="modal" onClick="document.location.href='index.php'">    
        <!--<input type="reset" class="btn btn-default" value='Close' data-dismiss="modal" onClick="return confirm_reset();">-->    
      </div>
    </div>
  </div>
</div>   

	    
	    <?php if ($empuser_id != '') { ?>
                    <section class="main-section parallex">
	<div id="jssor_1" style="position:relative;margin:0 auto;top:0px;left:0px;width:1300px;height:500px;overflow:hidden;visibility:hidden;">
        <!-- Loading Screen -->
        <div data-u="loading" class="jssorl-009-spin" style="position:absolute;top:0px;left:0px;width:100%;height:100%;text-align:center;">
            <img style="margin-top:-19px;position:relative;top:50%;width:38px;height:38px;" src="img/spin.svg" />
        </div>
        <div data-u="slides" style="cursor:default;position:relative;top:0px;left:0px;width:1300px;height:500px;overflow:hidden;">
	    <?php 
	    $query = mysql_query("SELECT * FROM `tbl_slider` WHERE ((CURDATE() between `fld_fromdate` and `fld_todate`) or (fld_fromdate is NULL and fld_todate is NULL)) and fld_delstatus!=2 and fld_active=1");	    
	    $count = mysql_num_rows($query);
	    if($count>0){
	    while($row=mysql_fetch_array($query)){
	    ?>
            <div>
                <img data-u="image" src="admin/<?php echo $row['fld_image']; ?>" alt="" />
            </div>
	    <?php }
	    } else {
	    ?>
            <div>
                <img data-u="image" src="admin/banner/career1.jpg" alt="" />
            </div>
	    <?php }
	    ?>
            <a data-u="any" href="https://www.jssor.com" style="display:none">bootstrap carousel</a>
        </div>
        <!-- Bullet Navigator -->
        <div data-u="navigator" class="jssorb032" style="position:absolute;bottom:12px;right:12px;" data-autocenter="1" data-scale="0.5" data-scale-bottom="0.75">
            <div data-u="prototype" class="i" style="width:16px;height:16px;">
                <svg viewbox="0 0 16000 16000" style="position:absolute;top:0;left:0;width:100%;height:100%;">
                    <circle class="b" cx="8000" cy="8000" r="5800"></circle>
                </svg>
            </div>
        </div>
        <!-- Arrow Navigator -->
<!--        <div data-u="arrowleft" class="jssora051" style="width:65px;height:65px;top:0px;left:25px;z-index: 9;" data-autocenter="2" data-scale="0.75" data-scale-left="0.75">
            <svg viewbox="0 0 16000 16000" style="position:absolute;top:0;left:0;width:100%;height:100%;">
                <polyline class="a" points="11040,1920 4960,8000 11040,14080 "></polyline>
            </svg>
        </div>
        <div data-u="arrowright" class="jssora051" style="width:65px;height:65px;top:0px;right:25px;z-index: 9;" data-autocenter="2" data-scale="0.75" data-scale-right="0.75">
            <svg viewbox="0 0 16000 16000" style="position:absolute;top:0;left:0;width:100%;height:100%;">
                <polyline class="a" points="4960,1920 11040,8000 4960,14080 "></polyline>
            </svg>
        </div>-->
    </div>
	
        <div class="container-fluid">
            <div class="row">
                <div class="search-form-contaner" id="searchjobform">
                    <h1 class="search-main-title"> One million success stories. Start yours today </h1>
                    <div class="search-bar">
                        <div class="col-md-12 col-sm-12 col-xs-12 nopadding">
                        <form  target="_blank" method="get" role="form">			    
                            <div class="col-lg-4 col-md-4 col-sm-6 col-xs-12 nopadding bdr-0">
    				            <div class="form-group">				                  
                                    <input type="text" placeholder='Search By Skills'  multiple='multiple' data-selection-required='true' data-value-property='*' data-min-length='0' class="skill_allresults" data-url="skills.json"  data-load-once="true" name="language">
    				            </div>
                            </div>
			    <div class="col-lg-4 col-md-4 col-sm-6 col-xs-12 nopadding bdr-0">
    				<div class="form-group">
    				    <input type='text' placeholder='Search By City' class='flexdatalist city_allresults' data-data='city.json' data-search-in='city' multiple='multiple' data-selection-required='true' data-value-property='*' data-min-length='0' id='relative' name='city_allresults'>
    				</div>
			    </div>

			    <div class="col-lg-2 col-md-2 col-sm-6 col-xs-12 nopadding">
				<div class="form-group">
                                    <!--<label>Job Experience</label>-->
                                    <!--<select class="questions-category form-control" data-placeholder="Search By Experience..." id="experience" style="height: 23px;">-->
                                <select class="form-control" data-placeholder="Search By Expr." id="experience">
                                    <?php 
//                                        $sql123 = " SELECT distinct fld_experience_year FROM `tbl_jobseeker_details` ORDER BY fld_experience_year  ASC ";
//                                        $res    = mysql_query($sql123);
                                    ?>
                                        <option value=" "> Search By Expr. </option><?php 
//while ($rows = mysql_fetch_assoc($res)) {
    
?>
                                    <option value="0">0</option>
                                    <option value="1">1</option>
                                    <option value="2">2</option>
                                    <option value="3">3</option>
                                    <option value="4">4</option>
                                    <option value="5">5</option>
                                    <option value="6">6</option>
                                    <option value="7">7</option>
                                    <option value="8">8</option>
                                    <option value="9">9</option>
                                    <option value="10">10</option>
                                    <option value="11">11</option>
                                    <option value="12">12</option>
                                    <option value="13">13</option>
                                    <option value="14">14</option>
                                    <option value="15">15</option>
                                    <option value="16">16</option>
                                    <option value="17">17</option>
                                    <option value="18">18</option>
                                    <option value="19">19</option>
                                    <option value="20">20</option>
                                    <option value="21">21</option>
                                    <option value="22">22</option>
                                    <option value="23">23</option>
                                    <option value="24">24</option>
                                    <option value="25">25</option>
                                    <option value="26">26</option>
                                    <option value="27">27</option>
                                    <option value="28">28</option>
                                    <option value="29">29</option>
                                    <option value="30">30</option>
                                    <option value="31">31</option>
                                    <option value="32">32</option>
                                    <option value="33">33</option>
                                    <option value="34">34</option>
                                    <option value="35+">35+</option>
                                    <?php
//}
                                    ?>
                                </select>
                                <?php
                                ?>
                            </div>
			</div>
			    
				<div class="col-lg-2 col-md-2 col-sm-6 col-xs-12 nopadding">
				    <div class="form-group form-action">
					<input type="button"  class="btn btn-primary btn-search-submit" id="btn-search" onClick="fn_search_user()" value="SEARCH">                        
				    </div>
				</div>
			    </form>
		        </div>
		    </div>
		</div>
	    </div>
	</div>
    </section>      

    <section class="cat-tabs cat-tab-index-2">
        <div class="container">
            <div class="row" style="margin-right: 0">
                <div class="col-md-12 col-sm-12 col-xs-12">
                    <div class="col-md-12 col-sm-12 col-xs-12">
                        <div class="cat-title">Packages</div>
                    </div>
                    <div class="clearfix"></div>
                    <div class="clearfix"></div>
                    <div class="col-md-12 col-sm-12 col-xs-12 login-cat-index2" style="margin-top:3%">
                        <div class="container">
                            <div class="row">
                                <div class="col-md-12 col-sm-12 col-xs-12">
                                    <?php
                                    $sql="SELECT DISTINCT tbl_package_price.fld_id,tbl_package_price.fld_currency_type , tbl_package_price.fld_pname , tbl_package_price.fld_pprice , tbl_package_price.fld_no_posting , tbl_package_price.fld_resume_download , tbl_package_price.fld_no_posting ,tbl_currency_type.fld_symbol FROM tbl_package_price INNER JOIN tbl_currency_type ON (tbl_package_price.fld_currency_type=tbl_currency_type.fld_currency_name) WHERE fld_delstatus!=2 ORDER BY tbl_package_price.fld_pname";
                                    $res=mysql_query($sql);
                                    while($rows=mysql_fetch_assoc($res))
                                    {
                                    ?>
                                    <div class="col-md-3 col-sm-6 col-xs-12">
                                        <div class="single-price text-center">
                                            <div class="price-header">
                                                <p class="plan-title"><?php echo $rows['fld_pname']; ?></p>
                                            </div>
                                            <div class="plan-price">
						<h4><span><?php echo $rows['fld_symbol']; ?> </span><br/>
                                                <?php echo $rows['fld_pprice']; ?></h4>
                                            </div>
                                            <div class="price-features">
                                                <p><strong><?php echo $rows['fld_no_posting']; ?>+</strong> Job Posting</p>
                                                <p><strong><?php echo $rows['fld_resume_download']; ?>+</strong> Monthly Resume</p>
                                                <p><strong>Unlimited</strong> Search</p>
                                            </div>
                                            <div class="price-features">
                                                <p><strong><?php echo $rows['fld_no_posting']; ?>-</strong>Views</p>
                                            </div>
                                            <div class="col-md-12">
                                                <?php              
                                                if($empuser_id=="")
                                                {
                                                ?>
                                                <a href="#" class="btn btn-default" data-toggle="modal" id="view" name="view" data-target="#myModal1">View</a>
                                                <?php
                                                }
                                                else
                                                { 
                                                ?>
                                                <!--<a href="payment_detail.php" class="btn btn-default" data-toggle="modal" >view</a>-->
                                                <a href="payment_detail.php?id=<?php echo $rows['fld_id']; ?>&empid=<?php echo $id; ?>"><input type="button" class="btn btn-default btn-search-submit" id="AddButton" value="VIEW"/></a>
                                                <?php
                                                }
                                                  ?>


                                              </div>
                                        </div>
                                    </div>

                                <?php
                                } ?>         
                                            </div>
                                    </div>
                                </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
            
            
             <?php
//                                    $pagin_query = "SELECT count(*) as total FROM `tbl_postjob` tp join `tbl_employer` ted  on(tp.fld_empid=ted.fld_id) WHERE tp.fld_expirydate >= CURDATE() AND tp.fld_status = 1 AND tp.fld_job_status =0 AND tp.fld_delstatus = 0 AND ted.`fld_emp_status` = 1";
                                    $pagin_query = "SELECT count(*) as total from tbl_jobseeker_details tjd JOIN tbl_jobseeker tj ON tjd.fld_js_id = tj.fld_id WHERE tjd.fld_delstatus = 0 AND tj.fld_js_status=1 AND tj.fld_delstatus=0 AND tj.fld_profile_visibility=1";

                                    $pagin_query11 = mysql_query($pagin_query);
                                    $pagin_row = mysql_fetch_array($pagin_query11);
                                    $total = $pagin_row['total'];
                                    //echo $total;
                                    $dis = 20;
                                    $total_page = ceil($total / $dis);

                                    $page_cur = (isset($_GET['page'])) ? $_GET['page'] : 1;
                                    $k = ($page_cur - 1) * $dis;



//                                    $emp = mysql_query("SELECT * FROM `tbl_postjob` tp join `tbl_employer` ted  on(tp.fld_empid=ted.fld_id) WHERE tp.fld_expirydate >= CURDATE() AND tp.fld_status = 1 AND tp.fld_job_status =0 AND tp.fld_delstatus = 0 AND ted.`fld_emp_status` = 1 limit $k ,$dis");
                                    $emp = mysql_query("SELECT tjd.fld_city from tbl_jobseeker_details tjd JOIN tbl_jobseeker tj ON tjd.fld_js_id = tj.fld_id WHERE tjd.fld_delstatus = 0 AND tj.fld_js_status=1 AND tj.fld_delstatus=0 AND tj.fld_profile_visibility=1 ORDER BY tj.fld_id LIMIT $k,$dis");
                                    $state = [];
                                    $city = [];
                                    while ($rows3 = mysql_fetch_array($emp)) {
                                            $cityname=$rows3['fld_city'];
                                          $sql_state = "SELECT ts.fld_name as state FROM `tbl_cities` tc JOIN tbl_states ts ON tc.fld_state_id = ts.fld_id WHERE tc.`fld_name` = '$cityname' AND tc.fld_status =0 AND ts.fld_status=0";
                                          $res_state = mysql_query($sql_state);
                                        while ($row_state = mysql_fetch_array($res_state)) {
                                            $state1 = explode(',', $row_state['state']);
                                        }
                                        
                                        foreach ($state1 as $state12) {
                                            array_push($state, $state12);
                                        }
                                        $city1 = explode(',', $rows3['fld_city']);
                                        
                                        foreach ($city1 as $city12) {
                                            array_push($city, $city12);
                                        }
                                    }
                                    $state = array_unique($state);
                                    $city = array_unique($city);
                                    
                                    
                                    if(!empty($state) && !empty($city)){
                                        ?>
            
            
            
            
<section class="categories cand-loc">
                <div class="container">
                    <div class="row">
                        <div class="col-md-12 col-sm-12 col-xs-12">
<!--                            <div class="col-md-12 col-sm-12 col-xs-12">
                        <div class="cat-title">Candidate By Location</div>
                    </div>-->

                            <div class="col-md-12 col-sm-12 col-xs-12">
                                <div class="Heading-title black">
                                    <h1>Candidate By Location</h1>
                                </div>
                            </div>
                            <div class="col-md-12 col-sm-12 col-xs-12 nopadding">
                                <div id="cats-masonry">
                                   
                                    <?php
                                    $state_id = [];
                                    foreach ($state as $statename) {
                                        $sql1 = "SELECT `fld_name`,fld_id FROM `tbl_states` WHERE fld_name = '$statename'";
                                        
                                        $res1 = mysql_query($sql1);
                                        while ($row12 = mysql_fetch_array($res1)) {
                                            $state_id = $row12['fld_id'];
                                            $state = $row12['fld_name'];
                                            ?>
                                            <div class="col-md-3 col-sm-6 col-xs-12">

                                            <div class="category-box">

                                                <div class="category-heading"> 

                                                        <a href="#"> <?php echo $state; ?></a><br>

                                                    </div>
                                         
                                                    <ul class="">
        <?php
        $sql = "SELECT `fld_name`,fld_id,fld_state_id FROM `tbl_cities` WHERE fld_state_id = '$state_id'";
        $res = mysql_query($sql);
        while ($row = mysql_fetch_array($res)) {
            $city_id = $row['fld_id'];
            $city123 = $row['fld_name'];
            foreach ($city as $cityname) {
               $count = mysql_query("SELECT count(*) as count from tbl_jobseeker_details tjd JOIN tbl_jobseeker tj ON tjd.fld_js_id = tj.fld_id WHERE tjd.fld_city = '$cityname' AND tjd.fld_delstatus = 0 AND tj.fld_js_status=1 AND tj.fld_delstatus=0 AND tj.fld_profile_visibility=1");
//                $count = mysql_query("SELECT distinct count(tp.`fld_location`) as count,tp.`fld_location` FROM `tbl_postjob` tp join `tbl_employer` ted  on(tp.fld_empid=ted.fld_id) WHERE tp.fld_expirydate >= CURDATE() and ted.`fld_emp_status` = 1 and FIND_IN_SET('" . $cityname . "',fld_location)");
                $city_count = mysql_fetch_array($count);

                if ($city123 == $cityname) {
                                            ?>                                              

                                                        <li><a href="users.php?city=<?php echo base64_encode($city123) ?>"> <?php echo $city123; ?><span><?php echo $city_count['count']; ?></span> </a></li>
                                                                    <?php
                                    } 
                                                            }
                                                        }
                                                        ?>
                                                    </ul>

                                                </div>

                                            </div>
                                                    <?php }
                                                } ?>








                                    <div class="col-md-12 col-sm-12 col-xs-12">
<?php if ($total > 20) { ?>
                                            <ul class="pagination" style="font-weight:bolder;">

    <?php if ($page_cur > 1) { ?>

                                                    <li class="disabled" ><a href="jobs_location.php?page=<?php echo ($page_cur - 1); ?>">Prev</a></li>
                                            <?php } else { ?>
                                                    <li class="active"><a>Prev</a></li>
                                                    <?php
    } for ($i = 1; $i <= $total_page; $i++) {

        if ($page_cur == $i) {
            ?>
                                                        <li class="active"><a><?php echo $i; ?></a></li>
                                                         
                                                    <?php } else { ?>
                                                        <li class="" ><a href="jobs_location.php?page=<?php echo $i; ?>"><?php echo $i; ?></a></li>

                                                    <?php
                                                    }
                                                }
                                                if ($page_cur < $total_page) {
                                                            ?>
                                                  
                                                    <li class="disabled" ><a href="jobs_location.php?page=<?php echo ($page_cur + 1); ?>">Next >></a></li>
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
            
                                    <?php } ?>
<?php 
$array_skills = [];
$sql_skills = mysql_query("SELECT tjd.fld_keyword from tbl_jobseeker_details tjd JOIN tbl_jobseeker tj ON tjd.fld_js_id = tj.fld_id WHERE tj.fld_js_status=1 AND tj.fld_delstatus=0 AND tjd.fld_keyword!='' AND tj.fld_profile_visibility=1");
while($row=mysql_fetch_assoc($sql_skills)){
    $id[] = $row['fld_id'];
    $skills12 = explode(',', $row['fld_keyword']);

    foreach ($skills12 as $skills1) {
        array_push($array_skills, $skills1);
    }
}
$skills =array_unique($array_skills);
//$array_skills123 = [];
//foreach ($skills as $skills1234) {
//        array_push($array_skills123, $skills1234);
//    }
//print_r($array_skills123);
//$total = count($skills);
//if($total > 20){
    $dis = 20;
//}else {
//    $dis =$total;
//}

$total_page = ceil($total / $dis);

$page_cur = (isset($_GET['page'])) ? $_GET['page'] : 1;
$k = ($page_cur - 1) * $dis;
$j = $page_cur * $dis;
//echo $total_page;

if(!empty($skills)){

?>
        <section class="categories">
            <div class="container">
                <div class="row">
                    <div class="col-md-12 col-sm-12 col-xs-12">

                        <div class="col-md-12 col-sm-12 col-xs-12">
                            <div class="Heading-title black">
                                <h1>Candidate By Skills</h1>
                            </div>
                        </div>
                        <div class="col-md-12 col-sm-12 col-xs-12 nopadding">
                            <div id="cats-masonry">
				<?php 
                                
				foreach($skills as $skills_list){
//                                    for($i = $k; $i < $j;$i++){
//				    $query = mysql_query("select count(*) as count from tbl_jobseeker_details where (fld_keyword = '$skills_list' OR fld_keyword like '$skills_list,%' OR fld_keyword like '%,$skills_list,%' OR fld_keyword like '%,$skills_list')");
				    $query = mysql_query("select count(*) as count from tbl_jobseeker_details tjd JOIN tbl_jobseeker tj ON tjd.fld_js_id = tj.fld_id where (tjd.fld_keyword = '$skills_list' OR tjd.fld_keyword like '$skills_list,%' OR tjd.fld_keyword like '%,$skills_list,%' OR tjd.fld_keyword like '%,$skills_list') AND tj.fld_js_status=1 AND tj.fld_delstatus=0 AND tj.fld_profile_visibility=1");
				    while($roww=mysql_fetch_assoc($query)){
					$count = $roww['count'];
				    }
				    ?>
                                <div class="col-md-4 col-sm-6 col-xs-12">
                                    <div class="category-box">
                                        <ul class="">
                                            <li><a href="users.php?skill=<?php echo base64_encode($skills_list) ?>" ><?php echo $skills_list ?><span>(<?php echo $count; ?>)</span> </a></li>
                                        </ul>
                                    </div>
                                </div>
                                <?php }// } ?>
                               
                                <div class="col-md-12 col-sm-12 col-xs-12">
                                    <?php if ($total > 20) { ?>
                                            <ul class="pagination" style="font-weight:bolder;">

    <?php if ($page_cur > 1) { ?>

                                                <li class="disabled" ><a href="all_skills.php?page=<?php echo ($page_cur - 1); ?>">Prev</a></li>
                                            <?php } else { ?>
                                                    <li class="active"><a>Prev</a></li>
        <?php
    } for ($i = 1; $i <= $total_page; $i++) {

        if ($page_cur == $i) {
            ?>
                                                        <li class="active"><a><?php echo $i; ?></a></li>

                                                    <?php } else { ?>
                                                        <li class="" ><a href="all_skills.php?page=<?php echo $i; ?>"><?php echo $i; ?></a></li>

                                                    <?php
                                                    }
                                                }
                                                if ($page_cur < $total_page) {
                                                    ?>

                                                    <li class="disabled" ><a href="all_skills.php?page=<?php echo ($page_cur + 1); ?>">Next >></a></li>
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
            


            <?php } } else { ?> 
	    
	    
	    
	    
    <section class="main-section parallex">
	<div id="jssor_1" style="position:relative;margin:0 auto;top:0px;left:0px;width:1300px;height:500px;overflow:hidden;visibility:hidden;">
        <!-- Loading Screen -->
        <div data-u="loading" class="jssorl-009-spin" style="position:absolute;top:0px;left:0px;width:100%;height:100%;text-align:center;">
            <img style="margin-top:-19px;position:relative;top:50%;width:38px;height:38px;" src="img/spin.svg" />
        </div>
        <div data-u="slides" style="cursor:default;position:relative;top:0px;left:0px;width:1300px;height:500px;overflow:hidden;">
	    <?php 
	    $query = mysql_query("SELECT * FROM `tbl_slider` WHERE ((CURDATE() between `fld_fromdate` and `fld_todate`) or (fld_fromdate is NULL and fld_todate is NULL)) and fld_delstatus!=2 and fld_active!=2");	  	    
	    $count = mysql_num_rows($query);
	    if($count>0){
	    while($row=mysql_fetch_array($query)){
	    ?>
            <div>
                <img data-u="image" src="admin/<?php echo $row['fld_image']; ?>" alt="" />
            </div>
	    <?php }
	    } else {
	    ?>
	    <div>
                <img data-u="image" src="admin/banner/career1.jpg" alt="" />
            </div>
	    <?php }
	    ?>
            <a data-u="any" href="https://www.jssor.com" style="display:none">bootstrap carousel</a>
        </div>
        <!-- Bullet Navigator -->
<!--        <div data-u="navigator" class="jssorb032" style="position:absolute;bottom:12px;right:12px;" data-autocenter="1" data-scale="0.5" data-scale-bottom="0.75">
            <div data-u="prototype" class="i" style="width:16px;height:16px;">
                <svg viewbox="0 0 16000 16000" style="position:absolute;top:0;left:0;width:100%;height:100%;">
                    <circle class="b" cx="8000" cy="8000" r="5800"></circle>
                </svg>
            </div>
        </div>-->
        <!-- Arrow Navigator -->
<!--        <div data-u="arrowleft" class="jssora051" style="width:65px;height:65px;top:0px;left:25px;z-index: 9;" data-autocenter="2" data-scale="0.75" data-scale-left="0.75">
            <svg viewbox="0 0 16000 16000" style="position:absolute;top:0;left:0;width:100%;height:100%;">
                <polyline class="a" points="11040,1920 4960,8000 11040,14080 "></polyline>
            </svg>
        </div>
        <div data-u="arrowright" class="jssora051" style="width:65px;height:65px;top:0px;right:25px;z-index: 9;" data-autocenter="2" data-scale="0.75" data-scale-right="0.75">
            <svg viewbox="0 0 16000 16000" style="position:absolute;top:0;left:0;width:100%;height:100%;">
                <polyline class="a" points="4960,1920 11040,8000 4960,14080 "></polyline>
            </svg>
        </div>-->
    </div>
	
        <div class="container-fluid">
            <div class="row">
                <div class="search-form-contaner" id="searchjobform">
                    <h1 class="search-main-title"> One million success stories. Start yours today </h1>
                    <div class="search-bar">
                        <div class="col-md-12 col-sm-12 col-xs-12 nopadding">
                        <form  target="_blank" method="get" role="form">			    
                            <div class="col-lg-4 col-md-4 col-sm-6 col-xs-12 nopadding bdr-0">
    				            <div class="form-group">				                  
                                <input type="text" placeholder='Search By Skills'  multiple='multiple' data-selection-required='true' data-value-property='*' data-min-length='0' class="skill_allresults" data-url="skills.json"  data-load-once="true" name="language">
    				            </div>
                            </div>
			    <div class="col-lg-4 col-md-4 col-sm-6 col-xs-12 nopadding bdr-0">
    				<div class="form-group">
    				    <input type='text' placeholder='Search By City' class='flexdatalist city_allresults' data-data='city.json' data-search-in='city' multiple='multiple' data-selection-required='true' data-value-property='*' data-min-length='0' id='relative' name='city_allresults'>
    				</div>
			    </div>

			    <div class="col-lg-2 col-md-2 col-sm-6 col-xs-12 nopadding">
				<div class="form-group">
                                    <!--<label>Job Experience</label>-->
                                    <!--<select class="questions-category form-control" data-placeholder="Search By Experience..." id="experience" style="height: 23px;">-->
                                <select class="form-control" data-placeholder="Search By Expr." id="experience">
                                    <?php 
//                                        $sql123 = " SELECT distinct fld_experience_year FROM `tbl_jobseeker_details` ORDER BY fld_experience_year  ASC ";
//                                        $res    = mysql_query($sql123);
                                    ?>
                                        <option value=" "> Search By Expr. </option><?php 
//while ($rows = mysql_fetch_assoc($res)) {
    
?>
                                    <option value="0">0</option>
                                    <option value="1">1</option>
                                    <option value="2">2</option>
                                    <option value="3">3</option>
                                    <option value="4">4</option>
                                    <option value="5">5</option>
                                    <option value="6">6</option>
                                    <option value="7">7</option>
                                    <option value="8">8</option>
                                    <option value="9">9</option>
                                    <option value="10">10</option>
                                    <option value="11">11</option>
                                    <option value="12">12</option>
                                    <option value="13">13</option>
                                    <option value="14">14</option>
                                    <option value="15">15</option>
                                    <option value="16">16</option>
                                    <option value="17">17</option>
                                    <option value="18">18</option>
                                    <option value="19">19</option>
                                    <option value="20">20</option>
                                    <option value="21">21</option>
                                    <option value="22">22</option>
                                    <option value="23">23</option>
                                    <option value="24">24</option>
                                    <option value="25">25</option>
                                    <option value="26">26</option>
                                    <option value="27">27</option>
                                    <option value="28">28</option>
                                    <option value="29">29</option>
                                    <option value="30">30</option>
                                    <option value="31">31</option>
                                    <option value="32">32</option>
                                    <option value="33">33</option>
                                    <option value="34">34</option>
                                    <option value="35">35+</option>
                                    <?php
//}
                                    ?>
                                </select>
                                <?php
                                ?>
                            </div>
			</div>
			    
				<div class="col-lg-2 col-md-2 col-sm-6 col-xs-12 nopadding">
				    <div class="form-group form-action">
					<input type="button"  class="btn btn-primary btn-search-submit" id="btn-search" onClick="fn_search()" value="SEARCH">                        
				    </div>
				</div>
			    </form>
		        </div>
		    </div>
		</div>
	    </div>
	</div>
    </section>      

    <section class="cat-tabs cat-tab-index-2">
        <div class="container">
            <div class="row">
                <div class="col-md-12 col-sm-12 col-xs-12">
                    <div class="col-md-12 col-sm-12 col-xs-12">
                        <div class="cat-title">Browse Jobs</div>
                    </div>
                    <div class="col-md-12 col-sm-12 col-xs-12">
                        <div class="panel panel-primary">
                            <div class="panel-heading"> 
                                <!-- Tabs -->
                                <ul class="nav panel-tabs">
                                    <li class="col-md-4 col-md-offset-1"><a><span class="hidden-xs hidden-sm">By Job Title</span></a> </li>
                                    <li class="col-md-3"><a><span class="hidden-xs hidden-sm">By City</span></a> </li>
                                    <li class="col-md-3"><a><span class="hidden-xs hidden-sm">By Industry</span></a> </li>
                                </ul>
                            </div>
                        </div>
                        <div class="panel-body">
                            <div class="tab-content">
                                <div class="tab-pane active animated fadeInLeft" id="tab3">
                                    <div class="col-md-12 col-sm-12 col-xs-12 nopadding">                                       

                                        <?php
$fetchqrynew = "select distinct e.fld_logo,e.fld_employer_name,pj.fld_id,pj.fld_job_type,pj.fld_location,pj.fld_jobtitle,e.fld_empid from tbl_employer_details e INNER JOIN tbl_postjob pj ON e.fld_empid=pj.fld_empid JOIN tbl_employer emp on emp.fld_id = e.fld_empid where emp.fld_emp_status = 1 and pj.fld_expirydate >= DATE(NOW()) ORDER BY pj.fld_id DESC LIMIT 5";
//$fetchqrynew = "select distinct e.fld_logo,e.fld_employer_name,pj.fld_id,pj.fld_job_type,pj.fld_location,pj.fld_jobtitle,e.fld_empid from tbl_employer_details e INNER JOIN tbl_postjob pj ON e.fld_empid=pj.fld_empid JOIN tbl_employer emp on emp.fld_id = e.fld_empid where emp.fld_emp_status = 1 ORDER BY pj.fld_id DESC LIMIT 5";

                                        //echo $fetchqrynew;
                                          //ORDER BY Rand(pj.fld_id) LIMIT 5";

                                        $records = mysql_query($fetchqrynew) or die("Query fail: " . mysqli_error());
                                        $projects = array();
                                        while ($project =  mysql_fetch_assoc($records))
                                        {
                                        $projects[] = $project;
                                        }
                                        foreach($projects as $project)
                                        {
                                        ?>
                                        <div class="job-box">
                                            <div class="col-md-1 col-sm-1 col-xs-12 nopadding">
                                                <div class="comp-logo">
                                                <?php
                                                $empimages1 = $project['fld_logo'];
                                                $empimages = $empimages1;
                                                if(file_exists($empimages) && (preg_match('/\.([^\.]+)$/', $empimages)))
                                                {
                                                ?>
                                                <img src="<?php echo $empimages; ?>" class="img-responsive" alt="<?php echo $project['fld_employer_name']; ?>">
                                                <?php
                                                }
                                                else
                                                {
                                                ?>
                                                <img src="<?php echo "images/nopicture.jpg" ?>" class="img-responsive" alt="<?php echo $project['fld_employer_name']; ?>">
                                                <?php
                                                }
                                                ?>
                                                </div>
                                            </div>
                                     <div class="col-md-4 col-sm-3 col-xs-12">
                                            <div class="job-title-box">
                                            <!--  <a href="javascript:void(0);"> -->
						                    <div class="job-title"><?php echo $project['fld_jobtitle']; ?></div>
						                    <!-- </a>  -->
                                                    <a href="javascript:void(0);"><span class="comp-name"><?php echo $project['fld_city']; ?> </span></a>
                                            </div>
                                    </div>
				    <div class="col-md-3 col-sm-3 col-xs-6">
					<div class="job-location job-loc"> 
					    <i class="fa fa-location-arrow"></i><?php echo $project['fld_location']; ?> 
					</div>
				    </div>
				    <div class="col-md-2 col-sm-3 col-xs-6">
					<div class="job-type jt-full-time-color"> 
					    <i class="fa fa-clock-o"></i><?php echo $project['fld_job_type']; ?>  
					</div>
				    </div>
                                            <div class="col-md-2 col-sm-2 col-xs-12">
<a  class="btn btn-primary btn-custom" href="singlejob.php?jid=<?php echo $project['fld_id'];  ?> ">View More</a></button>
                                            </div>
                                        </div>
                                        <?php }
                                        ?>



                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

<?php }  ?>


    <?php 
    @include("bottom.php");
    ?>
    <!-- JAVASCRIPT JS  --> 
    <!--<script type="text/javascript "src="//ajax.googleapis.com/ajax/libs/jquery/1.8.0/jquery.min.js"></script>-->

    <script src="http://malsup.github.com/jquery.form.js"></script>        

    <script src="http://code.jquery.com/ui/1.9.2/jquery-ui.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/chosen/1.4.2/chosen.jquery.js"></script>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<!--<script src="scripts/jquery.min.js"></script>-->
<link href="scripts/ddl/jquery.flexdatalist.css" rel="stylesheet" type="text/css">
<link href="scripts/ddl/jquery.flexdatalist.min.css" rel="stylesheet" type="text/css">
<script src="scripts/ddl/jquery.flexdatalist.min.js"></script>
<script src="scripts/ddl/jquery.flexdatalist.js"></script>


    <script>
 $('.city_allresults').flexdatalist({
    // limitOfValues: 3,
     minLength: 0,
     valueProperty: '*',
     selectionRequired: true, 
     textProperty: '{city}',
     searchIn: 'city',
     data: 'city.json'
});
 $('.skill_allresults').flexdatalist({
    // limitOfValues: 3,
     minLength: 0,
     valueProperty: '*',
     selectionRequired: true, 
     textProperty: '{skill}',
     searchIn: 'skill',
     data: 'skills.json'
});

</script>

<script>
    function fn_search()
    {
var city_name=[];
var skill_name=[];

var test_city = $(".city_allresults").val();
//alert(test);
if(test_city != ''){
data = JSON.parse(test_city);
var data_length = Object.keys(data).length;
for (var i = 0; i < data_length; i++) {
    if (data[i] != '') {
//      console.log('city:',data[i].city);
      city_name.push(data[i].city);
      
    }
  }
}
var test_skill = $(".skill_allresults").val();
if(test_skill != ''){
data = JSON.parse(test_skill);
var data_length = Object.keys(data).length;
for (var i = 0; i < data_length; i++) {
    if (data[i] != '') {
      skill_name.push(data[i].skill);
    }
  }
}
var city1 = city_name.join(",");
//console.log('city_names:',city1);
//var city1 = $("#city").val();

//var skill1 = $("#skill").val();
var skill1 = skill_name.join(",");
var experience1 = $("#experience").val();
var city = $.trim(city1);
var skill = $.trim(skill1);
var experience = $.trim(experience1);
    var user_id = '<?php echo $user_id; ?>';
    if((city == '' && skill == '' && experience == '')||(city == 'null' && skill == 'null' && experience == 'null')){
    swal(
        '',
        'Select any one!',
        'warning'
        )        
    }                
    else if(user_id)
    {				
        $.ajax({
                                    type: "POST",
                                    url: "seeker_extra_details_inner.php?op=addvisit",
                                    data: '&city=' + city + '&skill=' + skill + '&experience=' + experience,
                                    cache: false,
                                    success: function (response) {
                                        response = $.trim(response);

                                        if (response == 1)
                                        {
    window.location.href="searchjoblist.php?action=joblist&city="+city+"&skill="+skill+"&experience="+experience;
    }
    }
                                });
    }else{
        window.location.href="searchjoblist.php?action=joblist&city="+city+"&skill="+skill+"&experience="+experience;    
    }
    }
    </script>   

    <script>
    jQuery(document).ready(function(){
    //alert("fghfghgh");
    //disable_search_threshold: 10,
    jQuery(".chosen").chosen();   
    $(".chosen-select").chosen({disable_search_threshold: 10});
    });    
    </script>  


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


    <script>
        function fn_search_user()
    {
        var Base64={_keyStr:"ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz0123456789+/=",encode:function(e){var t="";var n,r,i,s,o,u,a;var f=0;e=Base64._utf8_encode(e);while(f<e.length){n=e.charCodeAt(f++);r=e.charCodeAt(f++);i=e.charCodeAt(f++);s=n>>2;o=(n&3)<<4|r>>4;u=(r&15)<<2|i>>6;a=i&63;if(isNaN(r)){u=a=64}else if(isNaN(i)){a=64}t=t+this._keyStr.charAt(s)+this._keyStr.charAt(o)+this._keyStr.charAt(u)+this._keyStr.charAt(a)}return t},decode:function(e){var t="";var n,r,i;var s,o,u,a;var f=0;e=e.replace(/[^A-Za-z0-9\+\/\=]/g,"");while(f<e.length){s=this._keyStr.indexOf(e.charAt(f++));o=this._keyStr.indexOf(e.charAt(f++));u=this._keyStr.indexOf(e.charAt(f++));a=this._keyStr.indexOf(e.charAt(f++));n=s<<2|o>>4;r=(o&15)<<4|u>>2;i=(u&3)<<6|a;t=t+String.fromCharCode(n);if(u!=64){t=t+String.fromCharCode(r)}if(a!=64){t=t+String.fromCharCode(i)}}t=Base64._utf8_decode(t);return t},_utf8_encode:function(e){e=e.replace(/\r\n/g,"\n");var t="";for(var n=0;n<e.length;n++){var r=e.charCodeAt(n);if(r<128){t+=String.fromCharCode(r)}else if(r>127&&r<2048){t+=String.fromCharCode(r>>6|192);t+=String.fromCharCode(r&63|128)}else{t+=String.fromCharCode(r>>12|224);t+=String.fromCharCode(r>>6&63|128);t+=String.fromCharCode(r&63|128)}}return t},_utf8_decode:function(e){var t="";var n=0;var r=c1=c2=0;while(n<e.length){r=e.charCodeAt(n);if(r<128){t+=String.fromCharCode(r);n++}else if(r>191&&r<224){c2=e.charCodeAt(n+1);t+=String.fromCharCode((r&31)<<6|c2&63);n+=2}else{c2=e.charCodeAt(n+1);c3=e.charCodeAt(n+2);t+=String.fromCharCode((r&15)<<12|(c2&63)<<6|c3&63);n+=3}}return t}}
var city_name=[];
var skill_name=[];

var test_city = $(".city_allresults").val();
//alert(test);
if(test_city != ''){
data = JSON.parse(test_city);
var data_length = Object.keys(data).length;
for (var i = 0; i < data_length; i++) {
    if (data[i] != '') {
//      console.log('city:',data[i].city);
      city_name.push(data[i].city);
      
    }
  }
}
var test_skill = $(".skill_allresults").val();
if(test_skill != ''){
data = JSON.parse(test_skill);
var data_length = Object.keys(data).length;
for (var i = 0; i < data_length; i++) {
    if (data[i] != '') {
      skill_name.push(data[i].skill);
    }
  }
}
var city1 = city_name.join(",");
//console.log('city_names:',city1);
//var city1 = $("#city").val();

//var skill1 = $("#skill").val();
var skill1 = skill_name.join(",");
var experience1 = $("#experience").val();
var city11 = $.trim(city1);
var city = Base64.encode(city11);
var skill11 = $.trim(skill1);
var skill = Base64.encode(skill11);
var areacode1 = $(".areacode_allresults").val();
var experience11 = $.trim(experience1);
var experience = Base64.encode(experience11);
var areacodee11 = $.trim(areacode1);
var areacodee = Base64.encode(areacodee11);

    var user_id = '<?php echo $user_id; ?>';
    if((city == '' && skill == '' && experience == '')||(city == 'null' && skill == 'null' && experience == 'null')){
    swal(
        '',
        'Select any one!',
        'warning'
        )        
    }                
    else if(user_id)
    {				
        $.ajax({
                                    type: "POST",
                                    url: "seeker_extra_details_inner.php?op=addvisit",
                                    data: '&city=' + city + '&skill=' + skill + '&experience=' + experience,
                                    cache: false,
                                    success: function (response) {
                                        response = $.trim(response);

                                        if (response == 1)
                                        {
    window.location.href="users.php?city="+city+"&skill="+skill+"&experience="+experience;
    }
    }
                                });
    }else{
        window.location.href="users.php?city="+city+"&skill="+skill+"&experience="+experience;    
    }
    }
        
        </script>
    



    <script>
    $(document).ready(function(e){
    $('.search-panel .dropdown-menu').find('a').click(function(e) {
    e.preventDefault();
    var param = $(this).attr("href").replace("#","");
    var concept = $(this).text();
    $('.search-panel span#search_concept').text(concept);
    $('.input-group #search_param').val(param);
    });
//    $(window).scroll(function() {
//    var scrollTop = $(window).scrollTop();
//    if (scrollTop > 100) {
//    $(".mega-menu").addClass("navbar-fixed-top");
//
//    } else if (scrollTop < 100) {
//    $(".mega-menu").removeClass("navbar-fixed-top");
//    }
//    });

//} else if (scrollTop < 300) {
//$(".mega-menu").removeClass("navbar-fixed-top");
//}
//});

    // setInterval("my_function();",5000);
    // function my_function(){
    //   $('#latestjobs').load(location.href + ' #latestjobs');
    // }
    });
    </script>

    <script>
        $(document).ready(function(){
            $("#fade-acunt").fadeToggle(5000);
        });
    </script>

    <script>
//	$(".city_allresults, .skill_allresults").on('focus', function(){
        $(document).click(function(){
            var skill = $("input.skill_allresults.flexdatalist-set").val();
            var city = $("input.city_allresults.flexdatalist-set").val();
            
            if(skill == ''){$("input.skill_allresults").attr('placeholder', "Search By Skills");}
            if(skill != ''){$("input.skill_allresults").attr('placeholder', "");}
            if(city == ''){$("input.city_allresults").attr('placeholder', "Search By City");}
            if(city != ''){$("input.city_allresults").attr('placeholder', "");}
            var job = false;
        var home = true;
        });
    </script>
    
    <script>
        $(function() {
            $(".job-loc").html(function(i, val) {
                return val.replace(/,/g, ", ");
            });
        });
    </script>


</div>
	<script src="js/jssor.slider-26.2.0.min.js" type="text/javascript"></script>
			<script type="text/javascript">
        jssor_1_slider_init = function() {

            var jssor_1_SlideoTransitions = [
              [{b:-1,d:1,o:-0.7}],
              [{b:900,d:2000,x:-379,e:{x:7}}],
              [{b:900,d:2000,x:-379,e:{x:7}}],
              [{b:-1,d:1,o:-1,sX:2,sY:2},{b:0,d:900,x:-171,y:-341,o:1,sX:-2,sY:-2,e:{x:3,y:3,sX:3,sY:3}},{b:900,d:1600,x:-283,o:-1,e:{x:16}}]
            ];

            var jssor_1_options = {
              $AutoPlay: 1,
              $SlideDuration: 800,
              $SlideEasing: $Jease$.$OutQuint,
              $CaptionSliderOptions: {
                $Class: $JssorCaptionSlideo$,
                $Transitions: jssor_1_SlideoTransitions
              },
              $ArrowNavigatorOptions: {
                $Class: $JssorArrowNavigator$
              },
              $BulletNavigatorOptions: {
                $Class: $JssorBulletNavigator$
              }
            };

            var jssor_1_slider = new $JssorSlider$("jssor_1", jssor_1_options);

            /*#region responsive code begin*/

            var MAX_WIDTH = 3000;

            function ScaleSlider() {
                var containerElement = jssor_1_slider.$Elmt.parentNode;
                var containerWidth = containerElement.clientWidth;

                if (containerWidth) {

                    var expectedWidth = Math.min(MAX_WIDTH || containerWidth, containerWidth);

                    jssor_1_slider.$ScaleWidth(expectedWidth);
                }
                else {
                    window.setTimeout(ScaleSlider, 30);
                }
            }

            ScaleSlider();

            $Jssor$.$AddEvent(window, "load", ScaleSlider);
            $Jssor$.$AddEvent(window, "resize", ScaleSlider);
            $Jssor$.$AddEvent(window, "orientationchange", ScaleSlider);
            /*#endregion responsive code end*/
        };
    </script>
			
			
	<script type="text/javascript">jssor_1_slider_init();</script>
</body>
</html>