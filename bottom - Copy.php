<div class="fixed-footer">
            <footer class="footer">
                <div class="container">
                    <div class="row">
                        <div class="col-sm-6 col-md-3 col-xs-12">
                            <div class="footer_block">
                                <a href="index.php" class="f_logo"><img src="images/logo.png" class="img-responsive" alt="logo"></a>
                                 <?php
        $abtshordesc = "SELECT distinct abt.fld_about_short_desc FROM `tbl_aboutus` abt";
        $abtshordesc1 = mysql_query($abtshordesc);    
        $abtshordesc111 =  mysql_fetch_assoc($abtshordesc1);
       
            $abtshordescription = $abtshordesc111['fld_about_short_desc'];
          $abtshordescriptions = (strlen($abtshordescription) > 190) ? substr($abtshordescription,0,190).'...' : $abtshordescription;
        ?>  
                                <p><?php echo $abtshordescriptions; ?><a href="aboutus.php"><span class="blink_me" style="color:red">Read More..</span></a></p>
                                <div class="social-bar">
                                    <ul>
                                        <li>
                                            <a class="fa fa-twitter" href="#"></a>
                                        </li>
                                        <li>
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
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-6 col-md-2 col-xs-12">
                            <div class="footer_block">
                                <h4>Hot Links</h4>
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
                        <div class="col-sm-6 col-md-4 col-xs-12">
                            <div class="footer_block dark_gry">
                                <h4>Recent Blogs</h4>
                                <ul class="recentpost">
                                    <li>
                                        <span><a class="plus" href="#"><img src="images/footer/1.png" alt="" /><i>+</i></a></span>
                                        <p><a href="#">Fusce gravida tortor felis, ac dictum risus sagittis</a></p>
                                        <h3>Sep 15, 2016</h3>
                                    </li>
                                    <li>
                                        <span><a class="plus" href="#"><img src="images/footer/2.png" alt="" /><i>+</i></a></span>
                                        <p><a href="#">Fusce gravida tortor felis, ac dictum risus sagittis</a></p>
                                        <h3>Fab 10, 2016</h3>
                                    </li>
                                    <li>
                                        <span><a class="plus" href="#"><img src="images/footer/2.png" alt="" /><i>+</i></a></span>
                                        <p><a href="#">Fusce gravida tortor felis, ac dictum risus sagittis</a></p>
                                        <h3>Fab 10, 2016</h3>
                                    </li>

                                </ul>
                            </div>
                        </div>
                        <div class="col-sm-6 col-md-3 col-xs-12">
                            <div class="footer_block">
                                <h4>Contact Information</h4>
                                <ul class="personal-info">
                                    <li><i class="fa fa-map-marker"></i> 3rd Floor,Link Arcade Model Town, BBL, USA.</li>
                                    <li><i class="fa fa-envelope"></i> Support@domain.com</li>
                                    <li><i class="fa fa-phone"></i> (0092)+ 124 45 78 678 </li>
                                    <li><i class="fa fa-clock-o"></i> Mon - Sun: 8:00 - 16:00</li>
                                </ul>
                            </div>
                        </div>

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
                                            <p>Copyright ©<?php echo date("Y");?> - Staffing Spot - All rights Reserved. Made By <a href="http://vinformax.com" target="_blank"> Vinformax </a></p>
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
<script type="text/javascript" src="http://127.0.0.1:8080/staffingspotnew/Chat/livechat/php/app.php?widget-init.js"></script>

 <script>
(function blink() { 
  $('.blink_me').fadeOut(500).fadeIn(500, blink); 
})();
    </script>