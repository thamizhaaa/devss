<?php
error_reporting(E_ALL ^ E_NOTICE);
error_reporting(E_ERROR);
@include('config.php');
$username = $_SESSION["user_name"];
$user_email = $_SESSION['user_email']; 
$user_id = $_SESSION['user_id'];
$empusername = $_SESSION["empuser_name"];
$empuser_email = $_SESSION['empuser_email']; 
$empuser_id = $_SESSION['empuser_id'];
$getmail_empsignup = base64_decode($_GET['empusername']);
$getmail_signup = base64_decode($_GET['username']);
$getactivation_code = base64_decode($_GET['activation']);
?>
<?php
if(isset($getmail_empsignup) && isset($getactivation_code))
{
    
$uname_active = $getmail_empsignup; 
$code_active = $getactivation_code;     

$code=mysql_query("SELECT fld_id FROM tbl_employer  WHERE fld_activation_code='$code_active' and fld_emp_status =0");
//echo "SELECT fld_id FROM tbl_jobseeker WHERE fld_activation_code='$code_active' and fld_js_status =0";

if(mysql_num_rows($code) > 0)
{

$count=mysql_query("SELECT fld_id FROM tbl_employer WHERE fld_activation_code='$code_active' and fld_emp_status='0'");

if(mysql_num_rows($count) == 1)
{
mysql_query("UPDATE tbl_employer SET fld_emp_status='1' WHERE fld_activation_code='$code_active'");

echo '<div class="col-md-12 col-sm-12 text-center" id="fade-acunt" style="margin-top: 35px;z-index: 999;"> <span class="activationsuccess" style="text-align:center; background-color:#a2d246;font-size: 24px;padding: 10px 20px;">Your account is Activated</span> </div>'
. ' ';


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

echo '<div class="text-center col-md-12 col-sm-12" id="fade-acunt" style="margin-top: 35px;z-index: 999;"> <span class="activationsuccess" style="text-align:center; background-color:#a2d246;font-size: 24px;padding: 10px 20px;">Your account is Activated</span> </div>'
. ' ';

//echo "Your account is activated"; 

}   

}
}
?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <meta http-equiv="content-type" content="text/html;charset=UTF-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta name="description" content="">
        <meta name="author" content="vinformax">
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

        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
        <link href="jquery.flexdatalist.css" rel="stylesheet" type="text/css">
        <link href="jquery.flexdatalist.min.css" rel="stylesheet" type="text/css">
        <script src="jquery.flexdatalist.min.js"></script>
        <script src="jquery.flexdatalist.js"></script>

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
    <section class="main-section parallex">
	<div id="jssor_1" style="position:relative;margin:0 auto;top:0px;left:0px;width:1300px;height:500px;overflow:hidden;visibility:hidden;">
        <!-- Loading Screen -->
        <div data-u="loading" class="jssorl-009-spin" style="position:absolute;top:0px;left:0px;width:100%;height:100%;text-align:center;">
            <img style="margin-top:-19px;position:relative;top:50%;width:38px;height:38px;" src="img/spin.svg" />
        </div>
        <div data-u="slides" style="cursor:default;position:relative;top:0px;left:0px;width:1300px;height:500px;overflow:hidden;">
	    <?php 
	    $query = mysql_query("SELECT * FROM `tbl_slider` WHERE ((CURDATE() between `fld_fromdate` and `fld_todate`) or (fld_fromdate is NULL and fld_todate is NULL)) and fld_delstatus!=2 and fld_active!=2");	    
	    
	    while($row=mysql_fetch_array($query)){
	    ?>
            <div>
                <img data-u="image" src="admin/<?php echo $row['fld_image']; ?>" alt="" />
            </div>
	    <?php } ?>
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
                <div class="search-form-contaner">
                    <h1 class="search-main-title"> One million success stories. Start yours today </h1>
                    <div class="search-bar">
                        <div class="col-md-12 col-sm-12 col-xs-12 nopadding">
                        <form  target="_blank" method="get" role="form">			    
                            <div class="col-lg-4 col-md-4 col-sm-6 col-xs-12 nopadding">
				            <div class="form-group">				                  
                            <input type="text" placeholder='Search By Skills'  multiple='multiple' data-selection-required='true' data-value-property='*' data-min-length='0' class="skill_allresults" data-url="skills.json"  data-load-once="true" name="language">
				            </div>
                            </div>
			    <div class="col-lg-4 col-md-4 col-sm-6 col-xs-12 nopadding">
				<div class="form-group">
				    <input type='text' placeholder='Search By City' class='flexdatalist city_allresults' data-data='city.json' data-search-in='city' multiple='multiple' data-selection-required='true' data-value-property='*' data-min-length='0' id='relative' name='city_allresults'>
				</div>
			    </div>

			    <div class="col-lg-2 col-md-2 col-sm-6 col-xs-12 nopadding">
				<div class="form-group">
                                    <!--<label>Job Experience</label>-->
                                    <!--<select class="questions-category form-control" data-placeholder="Search By Experience..." id="experience" style="height: 23px;">-->
                                <select class="questions-category form-control" data-placeholder="Search By Expr." id="experience">
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
                                    <option value="35">35</option>
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
                                            <div class="job-title-box"> <a href="javascript:void(0);">
						    <div class="job-title"><?php echo $project['fld_jobtitle']; ?>
						    </div>
						</a> 
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
<a  class="btn btn-primary btn-custom" href="singlejob.php?jid=<?php echo $project['fld_id'];  ?> ">Apply Now</a></button>
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
    alert("select atleast one");            
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
        });
    </script>
    
    <script>
        $(function() {
            $(".job-loc").html(function(i, val) {
                return val.replace(/,/g, ", ");
            });
        });
    </script>

<!--
    <script>
$(document).ready(function() {
alert('test');
var mainbrandskills = [         
<?php
$sdata="SELECT distinct fld_skillset from tbl_skills where fld_delstatus = 0";
$results = mysql_query($sdata);
while($sqry = mysql_fetch_array($results, MYSQL_ASSOC))
{
$name = $sqry['fld_skillset'];
$name1 = explode(",", $name);
foreach($name1 as $aaa)        
{
//$aaa;
$colon = "\"";
$comma = ",";
echo $colon.$aaa.$colon.$comma;
}

}
?>
];
$("#searchbykeywords").autocomplete({
source: mainbrandskills
            });
        });
    </script>
<script>
$(document).ready(function() {
//alert('tfddfest');
var mainbrandlocations = [         
<?php
//  $data="select distinct c.fld_name from tbl_states s INNER JOIN tbl_cities c ON s.fld_id=c.fld_id INNER JOIN tbl_countries cr ON cr.fld_id = c.fld_id";
//$data="select distinct CONCAT(c.fld_name,'\n', cr.fld_name,'\n', s.fld_name) as name  from tbl_states s INNER JOIN tbl_cities c ON s.fld_id=c.fld_id INNER JOIN tbl_countries cr ON cr.fld_id = c.fld_id";
$sdata="select distinct fld_location from tbl_skills";
$results = mysql_query($sdata);
while($sqry = mysql_fetch_array($results, MYSQL_ASSOC))
{
$name = $sqry['fld_location'];

$name1 = explode(",", $name);
foreach($name1 as $aaa)        
{
//$aaa;
$colon = "\"";
$comma = ",";
echo $colon.$aaa.$colon.$comma;
}
    
}
?>
];
$("#joblocation").autocomplete({
source: mainbrandlocations
});    
});
</script>    
-->

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