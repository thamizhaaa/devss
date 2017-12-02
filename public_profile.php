<?php
include('config.php');
session_start();
$id = $_SESSION['empuser_id'];
$seeker_id = $_GET['seeker_id'];
$decrypted_id = base64_decode($seeker_id);
//echo $decrypted_id;
//echo $seeker_id;
//session_start();
// $name = $_SESSION["empuser_name"];
// $id = $_SESSION['empuser_id'];
//
//$user_email = $_SESSION['user_email']; 
//$user_id = $_SESSION['user_id'];
//print_r ($_SESSION);
//exit;

//$rurl = $_SERVER['REQUEST_URI'];   
//$ppname1 = explode("?", $rurl);
//$ppname = mysql_real_escape_string($ppname1[1]);
$ppnameqry = "select * from tbl_jobseeker_details tj JOIN tbl_jobseeker js on tj.fld_js_id = js.fld_id where tj.fld_js_id = '$decrypted_id'";
// echo $ppnameqry;
$getqry = mysql_query($ppnameqry);
$rows=mysql_fetch_assoc($getqry);
$plinkid = $rows['fld_id'];
//$plinkname = $rows['fld_public_link'];
$plinkusername1 = $rows['fld_name'];
$plinkusername11 = strtolower($plinkusername1);
$plinkusername = ucfirst($plinkusername11);
$plinkjsstatus = $rows['fld_js_status'];
// $ppnamefetchingqry = "select * from tbl_jobseeker where fld_public_link = '$ppname'";
// $ppnamefetchingqry1 = mysql_query($ppnamefetchingqry);
// $rowsppname = mysql_fetch_assoc($ppnamefetchingqry1);

?>
<!DOCTYPE html>
<html lang="en">
<head>
<meta http-equiv="content-type" content="text/html;charset=UTF-8" />
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<meta name="description" content="">
<meta name="author" content="Vinformax">
<title><?php echo $plinkusername; ?>'s  Public Profile | Staffingspot | Job Portal</title>
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

<!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
<!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
<!--[if lt IE 9]>
<script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
<script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
<![endif]-->
</head>

<body>
<div class="page category-page">
<!--        <div id="spinner">
<div class="spinner-img">
<img alt="Staffing Spot - the spot for your career" src="images/loader.svg" />
<h2>Please Wait...</h2>
</div>
</div>-->
<?php
@include("top.php");
?>
<div class="clearfix"></div>

<div class="clearfix"></div>

<section class="job-breadcrumb">
<div class="container">
<div class="row">
<div class="col-md-6 col-sm-7 co-xs-12 text-left">
<h3><?php echo $plinkusername; ?></h3>
</div>
<div class="col-md-6 col-sm-5 co-xs-12 text-right">
<div class="bread">
<ol class="breadcrumb">
<li><a href="javascript:void(0);">Home</a> </li>
<li class="active">Public Profile</li>
</ol>
</div>
</div>
</div>
</div>
</section>

<section class="light-grey">
<div class="container">
<div class="row">
<div class="col-md-12 col-sm-12 col-xs-12 nopadding">
<div class="col-md-4 col-sm-4 col-xs-12 col-md-push-8 col-sm-push-8">
<?PHP
$sql="select * from tbl_jobseeker j join tbl_jobseeker_details jd on(j.fld_id=jd.fld_js_id) where j.fld_id='".$decrypted_id."'";
// echo $sql;
$res=mysql_query($sql);
$rows=mysql_fetch_assoc($res);
//  while($rows=mysql_fetch_assoc($res))
//  {
?>
<div class="row">

<div class="col-md-10 col-xs-12 col-sm-12">
<div class="about-image" style="padding-left:30px;">
<?php
$count=count($rows);
if($count >0)
{
$imgpath = "images/profilepic/";
$profilepath = $rows['fld_profilepic'];
$profimg = $imgpath.$profilepath;

?>
<?php
if(file_exists($profimg) && (preg_match('/\.([^\.]+)$/', $profimg)))
{
?>
<img class="img-responsive" src="<?php echo $profimg;?>" alt="">
<?php
}
else
{
?>
<img class="img-responsive" src="images/nopicture.jpg" alt="">
<?php
}
?>
<?php }
else {

?>

<h4>No image available</h4>
<?php
}?>


</div>
</div>
<!--  <div class="col-md-10 col-xs-12 col-sm-12">
<div class="resume-social">
<ul class="social-network social-circle onwhite">
<li><a href="<?php echo $rows['fld_url']; ?>" class="icoFacebook" title="Facebook" target="_blank"><i class="fa fa-facebook"></i></a></li>
<li><a href="<?php echo $rows['fld_url']; ?>" class="icoTwitter" title="Twitter" target="_blank"><i class="fa fa-twitter"></i></a></li>
<li><a href="<?php echo $rows['fld_url']; ?>" class="icoGoogle" title="Google +" target="_blank"><i class="fa fa-google-plus"></i></a></li>
<li><a href="<?php echo $rows['fld_url']; ?>" class="icoLinkedin" title="Linkedin +" target="_blank"><i class="fa fa-linkedin"></i></a></li>
</ul>
</div>

</div> -->

<div class="col-md-12 col-xs-12 col-sm-4">
<div class="my-contact">


</div>
</div>
</div>
<?php //}?>     

</div>

<?php 
$sql="select * from tbl_jobseeker j join tbl_jobseeker_details jd on(j.fld_id=jd.fld_js_id) where j.fld_id='".$decrypted_id."'";
//echo $sql;
$res=mysql_query($sql);
$count = mysql_num_rows($res);
if($count > 0){
while($rows=mysql_fetch_assoc($res))
{
?>
<div class="col-md-8 col-sm-8 col-xs-12 col-md-pull-4 col-sm-pull-4">

<div class="resume-box">
<div class="heading-inner">
<p class="title light-grey">Personal Information</p>
</div>
<div class="row">
<div class="col-md-6 col-xs-12 col-sm-12">
<div class="my-contact">
<div class="contact-icon">
<span class="icon-profile-female"></span>
</div>
<div class="contact-info">
<h4>Name: </h4>
<p><?php echo $rows['fld_name']; ?></p>
</div>
</div>
</div>
<div class="col-md-6 col-xs-12 col-sm-12">
<div class="my-contact">
<div class="contact-icon">
<span class=" icon-envelope"></span>
</div>
<div class="contact-info">
<h4>Email: </h4>
<p><a href="mailto:<?php echo $rows['fld_email']; ?>"><?php echo $rows['fld_email']; ?></a></p>
</div>
</div>
</div>
<div class="col-md-6 col-xs-12 col-sm-12">
<div class="my-contact">
<div class="contact-icon">
<span class=" icon-phone"></span>
</div>
<div class="contact-info">
<h4>Phone: </h4>
<p><a href="tel:+9911154849901"><?php echo $rows['fld_mobile']; ?></a></p>
</div>

</div>
</div>
<div class="col-md-6 col-xs-12 col-sm-12">
<div class="my-contact">
<div class="contact-icon">
<span class=" icon-envelope"></span>
</div>
<div class="contact-info">
<h4>Address: </h4>
<p><?php echo $rows['fld_address']; ?></p>
</div>
</div>
</div>
</div>
</div>



<!--                                <p class="about-me"><?php echo $rows['fld_aboutmyself']; ?></p>-->
</div>


<?php } } else {
$sql="select * from tbl_jobseeker where fld_id='".$decrypted_id."' and fld_js_status = 1 and fld_delstatus = 0";
//echo $sql;
$res=mysql_query($sql);
$count = mysql_num_rows($res);
if($count > 0){
while($rows=mysql_fetch_assoc($res))
{ ?>
<div class="col-md-8 col-sm-8 col-xs-12 col-md-pull-4 col-sm-pull-4">

<div class="resume-box">
<div class="heading-inner">
<p class="title light-grey">Personal Information</p>
</div>
<div class="row">
<div class="col-md-6 col-xs-12 col-sm-12">
<div class="my-contact">
<div class="contact-icon">
<span class="icon-profile-female"></span>
</div>
<div class="contact-info">
<h4>Name: </h4>
<p><?php echo $rows['fld_name']; ?></p>
</div>
</div>
</div>
<div class="col-md-6 col-xs-12 col-sm-12">
<div class="my-contact">
<div class="contact-icon">
<span class=" icon-envelope"></span>
</div>
<div class="contact-info">
<h4>Email: </h4>
<p><a href="mailto:<?php echo $rows['fld_email']; ?>"><?php echo $rows['fld_email']; ?></a></p>
</div>
</div>
</div>
<div class="col-md-6 col-xs-12 col-sm-12">
<div class="my-contact">
<div class="contact-icon">
<span class=" icon-phone"></span>
</div>
<div class="contact-info">
<h4>Phone: </h4>
<p><a href="tel:+9911154849901"><?php echo $rows['fld_mobile']; ?></a></p>
</div>

</div>
</div>
<!--                                    <div class="col-md-6 col-xs-12 col-sm-12">
<div class="my-contact">
<div class="contact-icon">
<span class=" icon-envelope"></span>
</div>
<div class="contact-info">
<h4>Address: </h4>
<p><?php echo $rows['fld_address']; ?></p>
</div>
</div>
</div>-->
</div>
</div>



<!--                                <p class="about-me"><?php echo $rows['fld_aboutmyself']; ?></p>-->
</div>
<?php }

} }
?>

<?php// } ?>
<?php
$sql="select * from tbl_jobseeker j join tbl_educationals_details ed on(j.fld_id=ed.fld_seekerid) join tbl_educations e on(e.fld_id=ed.fld_educational)  JOIN tbl_edu_courses tc ON ( tc.fld_id = ed.fld_course )  where j.fld_id='".$decrypted_id."' and ed.fld_status=0 order by ed.fld_to desc";
//  echo $sql;
$res=mysql_query($sql);
$count = mysql_num_rows($res);
if($count > 0){
?>
<div class="col-md-12 col-sm-12 col-xs-12">

<div class="resume-box">
<div class="heading-inner">
<p class="title light-grey">Educational Information</p>

</div>

<?php  while($rows=mysql_fetch_assoc($res))
{ ?>
<div class="row education-box">
<div class="col-md-4 col-xs-12 col-sm-12">
<div class="resume-icon">
<span class="icon-clipboard"></span>
</div>
<div class="insti-name">
<!--<h4><?php echo $rows['fld_education'].' '. $rows['fld_course']; ?></h4>-->
<h4><?php echo $rows['fld_college']; ?></h4>
<span><?php echo $rows['fld_from'].' -'. $rows['fld_to']; ?></span>
</div>
</div>
<div class="col-xs-12 col-md-8 col-sm-12">
<div class="degree-info">
<!--<h4><?php echo $rows['fld_college']; ?></h4>-->
<h4><?php echo $rows['fld_education']; ?></h4>
<p><?php echo $rows['fld_educourses']; ?> </p>
</div>
</div>
</div>
<?php }?>
</div>
</div>
<?php } ?>

<?php
$sql="select * from tbl_jobseeker_details tj JOIN tbl_jobseeker js on tj.fld_js_id = js.fld_id JOIN tbl_job_experience tje on tj.fld_js_id = tje.fld_seekerid where tj.fld_js_id='".$decrypted_id."' and tje.fld_status=0 order by tj.fld_js_id desc ";
//echo $sql;
$res=mysql_query($sql);
$count = mysql_num_rows($res);
if($count > 0){
?>                  
<div class="col-md-12 col-sm-12 col-xs-12">
<div class="resume-box">
<div class="heading-inner">
<p class="title light-grey">Work Experience</p>
</div>
<?php while($rows=mysql_fetch_assoc($res))
{   ?>

<div class="row education-box">
<div class="col-md-4 col-xs-12 col-sm-4">
<div class="resume-icon">
<span class="icon-clipboard"></span>
</div>
<div class="insti-name">
<h4>Year : <?php if( $rows['fld_to_year'] != ''){
echo $rows['fld_to_year'] - $rows['fld_from_year'];   
} else {
echo date('Y') - $rows['fld_from_year'];   
} ?></h4>
<span><?php if($rows['fld_to_year'] == ''){ echo $rows['fld_from_year'].' - Working'; } else { echo $rows['fld_from_year'].' -'. $rows['fld_to_year']; } ?></span>

</div>
</div>
<div class="col-xs-12 col-md-8 col-sm-8">
<div class="degree-info">
<h4>Position : <?php echo $rows['fld_position']; ?></h4>
<!--                                            <p>Lesed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in repreh. Excepteur sint occaecat cupidatat non proident. </p>-->
</div>
</div>
</div>

<?php }?>   
</div>
</div>
<?php } ?>

<?php
$sql="select * from tbl_jobseeker_details tj JOIN tbl_jobseeker js on tj.fld_js_id = js.fld_id  where tj.fld_js_id='".$decrypted_id."' ";
//echo $sql;
$res=mysql_query($sql);
$count = mysql_num_rows($res);
if($count > 0){
?>
<div class="col-md-12 col-sm-12 col-xs-12">
<div class="heading-inner">
<p class="title light-grey">Skills</p>
</div>

<div class="row">
<?php      while($rows=mysql_fetch_assoc($res))
{?>
<div class="col-md-6 col-sm-6 col-xs-12" >

<div class="insti-name" >
<h4><li style="margin-left: 15px;"><?php echo $rows['fld_keyword']; ?></li></h4>

</div>


</div>



</div>

</div>


<div class="col-md-12 col-sm-12 col-xs-12">
<div class="heading-inner">
<p class="title light-grey">About Myself</p>
</div>

<div class="row">

<div class="col-md-12 col-sm-12 col-xs-12" >

<div class="insti-name" >
<h4><?php echo $rows['fld_aboutmyself']; ?></h4>

</div>


</div>



</div>

</div>

<?php }?>

<?php } ?>
<?php
$records1 = "select * from tbl_user_resume  WHERE `fld_delstatus`= 0 and fld_actviestatus in (1) and fld_seekerid = $decrypted_id";
//echo $records1;

$records = mysql_query($records1) or die("Query fail: " . mysql_error());
$count = mysql_num_rows($records);
if($count > 0){
$projects = array();
while ($project =  mysql_fetch_assoc($records))
{
$projects[] = $project;
}
?>

<div class="col-md-6 col-sm-6 col-xs-12 prs-follow" id="followers">

<ul class="list-group list-group-dividered list-group-full">
<li class="list-group-item">


<div class="media">

<div class="media-body">


<!--                                                      <a class="btn btn-primary" id="view" data-toggle="modal" data-target="#myModal111"  >View</a>-->
<?php          
$i = 0;
foreach($projects as $project111)
{
//        header("Content-type: image/jpg");
//  echo $ro
?> 
<a class="btn btn-default" id="view" data-toggle="modal" data-target="#myModal111">View</a>
<a class="btn btn-default" id="download" href="<?php echo $project111['fld_resume']; ?>" download>Download</a>
<?php }
?>               

<!--                                                    <div><a class="name" href="javascript:void(0)"><?php echo $row['fld_name'] ;?></a></div>
<small><?php echo $row['fld_email'] ;?></small>-->
</div>
</div>
</li>
</ul>


</div>
<?php } ?>



<?php $sql="select * from `tbl_jobseeker_details` tjd  join `tbl_jobseeker` tj on (tjd.fld_js_id=tj.fld_id) where tjd.fld_js_id =$decrypted_id ";
//echo $sql;
$res=mysql_query($sql);
while($row=mysql_fetch_assoc($res)){
//echo $row['fld_js_id'];
$test123[]= $row['fld_js_id'];

//echo implode(',',$test123);


}   


?>
<?php for($i=0;$i<=count($test123);$i++){   
//echo $test123[$i];  
//echo  'myModal111'. $test123[$i];
?>

<div class="modal fade apply-job-modal" id="myModal111" data-backdrop="static">


<div class="modal-dialog" role="document">

<div class="modal-content">
<div class="modal-body contact-form-container">
<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true"><i class="fa fa-close"></i></span></button>
<div class="job-modal">
<h2>Public Profile</h2> </div>
<?php $sql="select * from tbl_user_resume  WHERE `fld_delstatus`= 0 and fld_actviestatus in (1) and fld_seekerid =$test123[$i] ";
//echo $sql;
$res=mysql_query($sql);
while($rows=mysql_fetch_assoc($res)){?>
<?php //echo $rows['fld_resume']; ?>
<!--<embed src="<?php echo $rows['fld_resume']; ?>" width="500px" height="500px" type="application/pdf">-->
<embed src="<?php echo $rows['fld_resume']; ?>#toolbar=0" width="500px" height="500px" type="application/pdf">

<?php } ?>
</div>
</div>
</div>

</div>

<?php }?>





</div>
</div>
</div>
</section>
<?php //} ?>

<?php @include("bottom.php");?>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>

<script type="text/javascript">
$(document).ready(function() {
$('#view').click(function(){
$.ajax({
type: "POST",
url: "update.php?op=view",

success: function(response){ 
$(".overlaymodal").hide();                     
},
beforeSend:function()
{
$(".overlaymodal").show();                     
}  
});                                  
});
});    
</script>

<script>
$(function (){     
$('#download').click(function(){           
$.ajax({
type: "POST",
url: "update.php?op=download",                
success: function(response){ 
$(".overlaymodal").hide();   
location.reload();                  
},
beforeSend:function()
{
$(".overlaymodal").show();                        
}  
});           

});
});
</script>        
<script>
$(document).bind("keyup keydown", function(e){
if(e.ctrlKey && e.keyCode == 80){
return false;
}
});
</script>


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