<div class="brand-logo-area clients-bg">
        <div class="clients-list">
        <?php
        $clientqry = "SELECT distinct emp.logo,emp.employerName FROM `employer` emp";
        $clientqry1 = mysql_query($clientqry);    
        while ($clientfetchqry1 =  mysql_fetch_assoc($clientqry1)) 
        {
            $empname = $clientfetchqry1['employerName'];
            $emplogo = $clientfetchqry1['logo'];
            $logopath = "employer/";
            $emplogoimage = $logopath.$emplogo;
        ?>  
            <?php
            if(file_exists($emplogoimage))
            {
             ?>
               <div class="client-logo" style="width:160px;height:160px;"><a href="javascript:void(0);" title="<?php echo $empname; ?>"><img src="<?php echo $emplogoimage;?>" class="img-responsive" alt="<?php echo $empname; ?>" title="<?php echo $empname;?>"/></a> </div>            
            <?php
            }
        }
        ?>

        </div>
    </div>

    <div class="fixed-footer">
            <footer class="footer" style="height:335px">
                <div class="container">
                    <div class="row">
                        <div class="col-sm-6 col-md-6 col-xs-12">
                            <div class="footer_block">
                                <a href="index.php" class="f_logo"><img src="images/logo.png" class="img-responsive" alt="logo"></a>
                                 <?php
        $abtshordesc = "SELECT distinct abt.fld_about_short_desc FROM `tbl_aboutus` abt";
        $abtshordesc1 = mysql_query($abtshordesc);    
        $abtshordesc111 =  mysql_fetch_assoc($abtshordesc1);
       
            $abtshordescription = $abtshordesc111['fld_about_short_desc'];
          $abtshordescriptions = (strlen($abtshordescription) > 250) ? substr($abtshordescription,0,258) : $abtshordescription;
        ?>  
                                <p><?php echo $abtshordescriptions; ?></p>
                                <div class="social-bar">
                                    <ul>
<!--                                        <li>
                                            <a class="fa fa-twitter" href="#"></a>
                                        </li>-->
<!--                                        <li>
                                            <a class="fa fa-pinterest" href="#"></a>
                                        </li>
                                        <li>
                                            <a class="fa fa-facebook" href="#"></a>
                                        </li>
                                        <li>
                                            <a class="fa fa-behance" href="#"></a>
                                        </li>
                                        <li>
                                            <a class="fa fa-instagram" href="#"></a>
                                        </li>
                                        <li>
                                            <a class="fa fa-linkedin" href="#"></a>
                                        </li>-->
                                    </ul>
                                </div>
                            </div>
                        </div>
                        
                        <div class="col-sm-6 col-md-6 col-xs-12">
                            <div class="footer_block">
                                <h4>Find us on Facebook</h4>
                                
                            </div>
                            
                            <div class="fb-page" data-href="https://www.facebook.com/vinformax/" data-tabs="timeline" data-width="700" data-height="250" data-small-header="false" data-adapt-container-width="true" data-hide-cover="false" data-show-facepile="true"><blockquote cite="https://www.facebook.com/vinformax/" class="fb-xfbml-parse-ignore"><a href="https://www.facebook.com/vinformax/">Vinformax</a></blockquote></div>
                        </div>
                        
                        
                        
<!--                        <div class="col-sm-6 col-md-3 col-xs-12">
                            <div class="footer_block">
                                <h4>Hot Links</h4>
                                <ul class="footer-links">
                                     <li>
                                        <a href="#">About us</a>
                                    </li> 
                                    <li>
                                        <a href="#">Term & Conditions</a>
                                    </li>
                                    <li>
                                        <a href="#">Privacy</a>
                                    </li>                                    
                                    <li>
                                        <a href="#">Careers with Us</a>
                                    </li>
                                    <li>
                                       <a href="#">Contact us</a>
                                    </li>
                                     <li>
                                       <a href="#">FAQ's</a>
                                    </li>
                                </ul>
                            </div>
                        </div>-->
<!--                        <div class="col-sm-6 col-md-3 col-xs-12">
                            <div class="footer_block dark_gry">
                                <h4>Jobseekers</h4>
                            <ul class="footer-links">
                                    <li>
                                        <a href="#">Upload Resume</a>
                                    </li>
                                    <li>
                                        <a href="#">Search Jobs</a>
                                    </li>
                                    <li>
                                        <a href="#">Blogs</a>
                                    </li>

                                    <li>
                                        <a href="#">Job Alerts</a>
                                    </li><li>
                                        <a href="#">Interview Questions</a>
                                    </li>                                    
                                </ul>
                            </div>
                        </div>-->
                       <!--  <div class="col-sm-6 col-md-2 col-xs-12">
                            <div class="footer_block">
                                <h4>Contact Information</h4>
                               <ul class="personal-info">
                                    <li><i class="fa fa-map-marker"></i> 3rd Floor,Link Arcade Model Town, BBL, USA.</li>
                                    <li><i class="fa fa-envelope"></i> Support@domain.com</li>
                                    <li><i class="fa fa-phone"></i> (0092)+ 124 45 78 678 </li>
                                    <li><i class="fa fa-clock-o"></i> Mon - Sun: 8:00 - 16:00</li>
                                </ul>

                                <ul class="footer-links">
                                    <li>
                                        <a href="#">Home</a>
                                    </li>
                                    <li>
                                        <a href="#">Jobs</a>
                                    </li>
                                    <li>
                                        <a href="#">About Us</a>
                                    </li>

                                    <li>
                                        <a href="#">Privacy</a>
                                    </li><li>
                                        <a href="#">Contact Us</a>
                                    </li>
                                    <li>
                                        <a href="#">Term & Conditions</a>
                                    </li>
                                </ul>

                            </div>
                        </div>
 -->
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
                                            <p>Copyright ©<?php echo date("Y");?> - Vinformax - All rights Reserved. Made By <a href="http://vinformax.com" target="_blank"> Vinformax </a></p>
                                            <p>Reproduction of content from staffingspot without permission is strictly prohibited. </p>
                                        </div>
                                      <!--   <div class="col-md-12 col-sm-12 col-xs-12 hidden-xs hidden-sm">
                                            <ul class="footer-menu">
                                                <li>
                                                    <a href="#">Jobs in australia</a>
                                                </li>
                                                <li>
                                                    <a href="#">Jobs in malaysia</a>
                                                </li>
                                                <li>
                                                    <a href="#">Jobs in england</a>
                                                </li>
                                                <li>
                                                    <a href="#">Jobs in saudi arabia</a>
                                                </li>
                                                <li>
                                                    <a href="#">Jobs in south africa</a>
                                                </li>
                                                <li>
                                                    <a href="#">Jobs in saudi Pakistan</a>
                                                </li>
                                            </ul>
                                        </div> -->
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