  <div class="col-md-4 col-sm-4 col-xs-12">
                            <div class="profile-nav">
                                <div class="panel">
                                    <ul class="nav nav-pills nav-stacked">
                                          <?php 
                                        $directoryURI = $_SERVER['REQUEST_URI'];
                                        $file = basename($directoryURI); 
                                        $files=strstr($file, '?', true);
                                         //$path = parse_url($directoryURI, PHP_URL_PATH);
                                        // $components = explode('.', $path);
                                        // echo "aaa".$first_part = $components[0];
                                        ?>
                                        <li class="<?php if ($file=="company-dashboard.php") {echo "active"; } else  {echo "noactive";}?>">
                                            <a href="company-dashboard.php"> <i class="fa fa-user"></i> Dashboard</a>
                                        </li>
                                        <li class="<?php if ($file=="company-dashboard-edit-profile.php") {echo "active"; } else  {echo "noactive";}?>">
                                            <a href="company-dashboard-edit-profile.php"> <i class="fa fa-edit"></i> Edit Profile</a>
                                        </li>
                                      <!--<li>
                                            <a href="company-dashboard-resume.php"> <i class="fa fa-file-o"></i>Resume </a>
                                        </li>-->
                                        <li class="<?php if ($file=="postjob.php") {echo "active"; } else  {echo "noactive";}?>">
                                            <a href="postjob.php"> <i class="fa fa-list-ul"></i> Post Job(s)</a>
                                        </li>
                                        <li class="<?php if ($file=="company-dashboard-active-jobs.php" || $files=="company-dashboard-active-jobs.php") {echo "active"; } else {echo "noactive";}?>">
                                            <a href="company-dashboard-active-jobs.php"> <i class="fa  fa-list-ul"></i> Active Job(s)</a>
                                        </li>                                         
                                        <li class="<?php if ($file=="company-dashboard-featured-jobs.php" || $files=="company-dashboard-featured-jobs.php") {echo "active"; } else {echo "noactive";}?>">
                                            <a href="company-dashboard-featured-jobs.php"> <i class="fa  fa-list-alt"></i> Featured Job(s)</a>
                                        </li>
                                        <li class="<?php if ($file=="who_applied.php" || $files=="who_applied.php" || $files=="seekersdetails.php") {echo "active"; } else {echo "noactive";}?>">
                                            <a href="who_applied.php"> <i class="fa  fa-list-alt"></i> Who Applied Job(s)</a>
                                        </li>
                                        <li class="<?php if ($file=="company-dashboard-followers.php" || $files=="company-dashboard-followers.php") {echo "active"; } else {echo "noactive";}?>">
                                            <a href="company-dashboard-followers.php"> <i class="fa  fa-bookmark-o"></i> Follower(s) </a>
                                        </li>
					<li class="<?php if ($file=="emp-change-password.php") {echo "active"; } else {echo "noactive";}?>">
                                            <a href="emp-change-password.php"> <i class="fa  fa-lock"></i> Change Password </a>
                                        </li>
                                        <li class="<?php if ($file=="your-order.php") {echo "active"; } else  {echo "noactive";}?>">
                                            <a href="your-order.php"> <i class="fa  fa-bookmark-o"></i> Your order(s) </a>
                                        </li>
                                        
                                        
                                        
<!--                                        <li class="<?php if ($file=="add_booster_price.php") {echo "active"; } else  {echo "noactive";}?>">
                                            <a href="add_booster_price.php"> <i class="fa fa-user"></i> Booster</a>
                                        </li>-->
                                    </ul>
                                </div>
                            </div>
                        </div>