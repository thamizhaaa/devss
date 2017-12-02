<?php
error_reporting(E_ALL ^ E_NOTICE);
error_reporting(E_ERROR);
@include('config.php');
@include("user_sessioncheck.php");
//@include('generate_json.php');
//print_r($_POST);
//print_r($_SESSION);
//echo $_SERVER['HTTP_HOST'];
$username = $_SESSION["user_name"];

$user_email = $_SESSION['user_email']; 
$user_id = $_SESSION['user_id'];
$empusername = $_SESSION["empuser_name"];
$empuser_email = $_SESSION['empuser_email']; 
$empuser_id = $_SESSION['empuser_id'];
//echo $_REQUEST['username'];
//echo $_REQUEST['activation'];
//echo $user_id;
//echo $empuser_id;
?>





<div class="brand-logo-area clients-bg">
       <div class="clients-list">
       <?php
       echo "aaaaa".$clientqry = "SELECT distinct emp.logo,emp.employerName FROM `employer` emp";
       $clientqry1 = mysql_query($clientqry);    
       while ($clientfetchqry1 =  mysql_fetch_assoc($clientqry1)) 
       {
           $empname = $clientfetchqry1['employerName'];
           $emplogo = $clientfetchqry1['logo'];
           $logopath = "employer/";
           $emplogoimage = $logopath.$emplogo;
       ?>  
           <?php
           if(file_exists($emplogoimage) && (preg_match('/\.([^\.]+)$/', $emplogoimage)))
           {
            ?>
              <div class="client-logo"><a href="javascript:void(0);" title="<?php echo $empname; ?>"><img src="<?php echo $emplogoimage;?>" class="img-responsive" alt="<?php echo $empname; ?>" title="<?php echo $empname;?>"/></a> </div>            
           <?php
           }
       }
       ?>

       </div>
   </div>

   <div class="fixed-footer">
           <footer class="footer">
               <div class="container">
                   <div class="row">
                       <div class="col-sm-12 col-md-6 col-sm-6 col-xs-8 mb">
                           <div class="footer_block">
                               <a href="index.php" class="f_logo"><img src="images/logo.png" class="img-responsive" alt="logo"></a>
                                <?php
       $abtshordesc = "SELECT distinct fld_about_full_desc FROM `tbl_aboutus` where fld_status=1 and fld_delstatus=1";
       $abtshordesc1 = mysql_query($abtshordesc);    
       $abtshordesc111 =  mysql_fetch_assoc($abtshordesc1);
      
          $abtshordescription = $abtshordesc111['fld_about_full_desc'];
         $abtshordescriptions = (strlen($abtshordescription) > 250) ? substr($abtshordescription,0,258).'......' : $abtshordescription;
         $string = strip_tags($string);


       ?>  
                               <p><?php echo $abtshordescriptions; ?></p>
                               <div class="btn btn-default"><a href="aboutus.php" style="color:#fff">Read More</a>
                               </div>
                           </div>
                       
                     <!--   <div class="col-sm-6 col-md-6 col-xs-12">
                           <div class="footer_block">
                               <h4>Find us on Facebook</h4>
                               
                           </div>
                           
                           <div class="fb-page" data-href="https://www.facebook.com/vinformax/" data-tabs="timeline" data-width="700" data-height="250" data-small-header="false" data-adapt-container-width="true" data-hide-cover="false" data-show-facepile="true"><blockquote cite="https://www.facebook.com/vinformax/" class="fb-xfbml-parse-ignore"><a href="https://www.facebook.com/vinformax/">Vinformax</a></blockquote></div>
                       </div> -->
                       
                       </div>
                     <?php if ($user_id != '') { ?>
                       
                      <div class="col-sm-6 col-md-3 col-sm-6 col-xs-4 mb">
                           <div class="footer_block">
                               <h4>Job Seeker</h4>
                               <ul class="footer-links">
                                  <!-- <li><a href="index.php">Search Jobs</a></li>  -->
                                   <li>
                                       <a href="jobalert.php">Create Job Alerts</a>
                                   </li>
                                   <li>
                                       <a href="esteem_video.php">Profile Esteem Video</a>
                                   </li>                                    
                               </ul>
                           </div>
                       </div>
                     <div class="col-sm-6 col-md-3 hidden-xs mb">
                           <div class="footer_block">
                               <h4>Find us on Facebook</h4>
                           </div>
                           <div class="fb-page" data-href="https://www.facebook.com/vinformax/" data-tabs="timeline" data-width="700" data-height="100" data-small-header="false" data-adapt-container-width="true" data-hide-cover="false" data-show-facepile="true"><blockquote cite="https://www.facebook.com/vinformax/" class="fb-xfbml-parse-ignore"><a href="https://www.facebook.com/vinformax/">Vinformax</a></blockquote></div>
                       </div>
                         
                     <?php } else if($empuser_id != '' ){ ?> 
                       
                       <?php
                       if(($empotherdetails == 1) || ($empotherdetails1 == 1))
                       {
                           ?>
                     <div class="col-sm-6 col-md-3 col-sm-6 col-xs-4 mb">
                           <div class="footer_block">
                               <h4>Employers</h4>
                               <ul class="footer-links">
                                    <li>
                                       <a href="postjob.php">Post Jobs</a>
                                   </li> 
                                   <li>
                                       <a href="package.php">Choose Package</a>
                                   </li>
<!--                                   <li>
                                       <a href="#">Privacy</a>
                                   </li>                                    -->
                                  
                               </ul>
                           </div>
                       </div>

                         <div class="col-sm-6 col-md-3  hidden-xs mb">
                           <div class="footer_block">
                               <h4>Find us on Facebook</h4>
                           </div>
                           <div class="fb-page" data-href="https://www.facebook.com/vinformax/" data-tabs="timeline" data-width="700" data-height="100" data-small-header="false" data-adapt-container-width="true" data-hide-cover="false" data-show-facepile="true"><blockquote cite="https://www.facebook.com/vinformax/" class="fb-xfbml-parse-ignore"><a href="https://www.facebook.com/vinformax/">Vinformax</a></blockquote></div>
                       </div>
                       <?php
                       }
                       else
                       {
                       ?>
                        <div class="col-sm-6 col-md-6  hidden-xs mb">
                           <div class="footer_block">
                               <h4>Find us on Facebook</h4>
                           </div>
                           <div class="fb-page" data-href="https://www.facebook.com/vinformax/" data-tabs="timeline" data-width="700" data-height="180" data-small-header="false" data-adapt-container-width="true" data-hide-cover="false" data-show-facepile="true"><blockquote cite="https://www.facebook.com/vinformax/" class="fb-xfbml-parse-ignore"><a href="https://www.facebook.com/vinformax/">Vinformax</a></blockquote></div>
                       </div>
                      <?php
                       }
                       ?>
                         
                     <?php } else { ?>
                       
                      <div class="col-sm-3 col-md-3 col-sm-6 col-xs-4 mb">
                           <div class="footer_block">
                               <h4>Job Seeker</h4>
                               <ul class="footer-links">
                                      <!-- <li><a href="index.php">Search Jobs</a></li>  -->
                                   <li>
                                       <a href="jobalert.php">Create Job Alerts</a>
                                   </li>
                                   <li>
                                       <a href="esteem_video.php">Profile Esteem Video</a>
                                   </li>                                    
                                  
                               </ul>
                           </div>
                       </div>

                         <div class="col-sm-3 col-md-3 col-sm-6 col-xs-4 mb">
                           <div class="footer_block">
                               <h4>Employers</h4>
                               <ul class="footer-links">
                                    <li>
                                        <a href="#" data-toggle="modal" data-target="#myModal1">Post Jobs</a>
                                   </li> 
                                   <li>
                                       <a href="package.php">Choose Package</a>
                                   </li>
<!--                                   <li>
                                       <a href="#">Privacy</a>
                                   </li>                                    -->
                               
                               </ul>
                           </div>
                       </div>

                  <?php } ?>
                  
                   </div>
               </div>
           </footer>
           <section class="footer-bottom-section">
               <div class="container">
                   <div class="row">
                       <div class="col-md-12 col-sm-12 col-xs-12">
                           <div class="footer-bottom">
                               <div class="container">
                                   <div class="row">
                                       <div class="col-md-12 col-sm-12 col-xs-12">
                                           <p>Copyright ©<?php echo date("Y");?> - Vinformax - All rights Reserved.</p>
                                           <p>Reproduction of content from staffingspot without permission is strictly prohibited. </p>
                                       </div>
                                     
                                   </div>
                               </div>
                           </div>
                       </div>
                   </div>
               </div>
           </section>
       </div>

   
   <a href="#" class="scrollup"><i class="fa fa-chevron-up"></i></a>
<!--<script type="text/javascript" src="http://127.0.0.1:8080/staffingspotnew/Chat/livechat/php/app.php?widget-init.js"></script>-->

<script>
(function blink() { 
 $('.blink_me').fadeOut(500).fadeIn(500, blink); 
})();
   </script>
   
   <div id="fb-root"></div>
<script>(function(d, s, id) {
 var js, fjs = d.getElementsByTagName(s)[0];
 if (d.getElementById(id)) return;
 js = d.createElement(s); js.id = id;
 js.src = "//connect.facebook.net/en_GB/sdk.js#xfbml=1&version=v2.9";
 fjs.parentNode.insertBefore(js, fjs);
}(document, 'script', 'facebook-jssdk'));</script>
<script>
    $(document).ready(function(){
        
//      Orientation Refresh  
        if (window.DeviceOrientationEvent) {
            window.addEventListener('orientationchange', function() { window.location.href = window.location.href }, false);
        }
        
//      Dropdown responsive  
        $.browser.chrome = /chrom(e|ium)/.test(navigator.userAgent.toLowerCase()); 
        if($.browser.chrome){
          var width = $(window).width();

        $(".select2-selection").click(function(){
            if(width > 700){
            var offsetValue = $(".select2 span.select2-selection[aria-expanded='true']").offset().top;
            var height = $(".select2 span.select2-selection[aria-expanded='true']").height();
            var tot = offsetValue + height;

            var left = ((($(".select2 span.select2-selection[aria-expanded='true']").width()+ $(".select2 span.select2-selection[aria-expanded='true']").outerWidth())+ 19) + $(".select2 span.select2-selection[aria-expanded='true']").scrollLeft() + "px");
            $("span.select2-container.select2-container--open.drop").css({'top':tot,'width':'255px !important','left':left});
            }

        });
        }
        
    });
</script>