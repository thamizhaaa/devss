<?php 

                $refineprodcuts_pic = "Select js.fld_name,jsd.fld_profilepic from tbl_jobseeker js join tbl_jobseeker_details jsd on jsd.fld_js_id = js.fld_id                  
                    where js.fld_delstatus=0 and jsd.fld_js_id = $user_id and js.fld_js_status=1 ";
                
                $refineprodcuts_pic1 = mysql_query($refineprodcuts_pic);
                while($rowpic=mysql_fetch_array($refineprodcuts_pic1,MYSQL_ASSOC))
                {
                    
                    $profpic = $rowpic['fld_profilepic'];
                    $profilepicpath = 'images/profilepic/';
                    $profileimagepic = $profilepicpath.$profpic;
                    $name= $rowpic['fld_name'];
                }
                ?>

<section class="dashboard parallex">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-12 col-sm-12 col-xs-12 dashboard-header">
                        <div class="col-md-5 col-sm-4 col-xs-12">
                            <div class="user-avatar">
                                <?php
                                //echo "gdfgdfg".$profileimagepic;
				//echo "hello";
                                     if(file_exists($profileimagepic) && (preg_match('/\.([^\.]+)$/', $profileimagepic)))
                                 {
                                 ?>
                                    <img src="<?php echo $profileimagepic;?>" alt="" class="img-responsive center-block ">                                   
                                <?php
                                }
                                else
                                {
                                ?>
                                <img src="images/nopicture.jpg" alt="" class="img-responsive center-block">
                                <?php
                                }
                                ?>
                                <h3><?php echo $name; ?></h3>
                            </div>
                        </div>
                        <div class="col-md-3 col-sm-4 col-xs-12">
                             <div class="rad-info-box rad-txt-success">
                                 <i class="icon icon-presentation"></i>
                                 <span class="title-dashboard">Followings</span>
                                         <?php
                                         $followings = "select fld_followers from tbl_jobseeker where `fld_id`=$user_id";

                                          //print_r($abc);
                                           $res=mysql_query($followings);
                                           while($row=mysql_fetch_assoc($res))
                                           {

                                          // echo $row['count(fld_following)'];


                                            if(empty($row['fld_followers']))
                                              {
                                              $array['fld_followers'] = $following_count;
                                              }
                                              else
                                              {
                                                  $following_count = explode(',',$row['fld_followers']);    
                                              } 
                                           } if(empty($following_count)){ ?>
                                     <span class="value"><span><?php print_r(count($following_count)); ?></span></span>
                                           <?php } else { ?>
                                     <a href="user-followed-companies.php"><span class="value"><span><?php print_r(count($following_count)); ?></span></span></a>
                                           <?php } ?>                                           
                             </div>
                         </div>
                         <div class="col-md-3 col-md-offset-pull-1 col-sm-4 col-xs-12">
                             <div class="rad-info-box rad-txt-success">
                                 <i class="icon icon-aperture"></i>
                                 <span class="title-dashboard">Jobs Applied</span>
                                 <span class="value">
                                     <span>
                                         <?php

                                        $jobapplied = "SELECT count(`fld_seeker_id`) as total FROM `tbl_applied_job` where`fld_seeker_id`=$user_id and fld_delstatus = 0";
                                        //echo "cc".$jobapplied;
                                        $res1=mysql_query($jobapplied);
                                        
                                        while($row1=mysql_fetch_assoc($res1))
                                        {
                                             $appliedjob = $row1['total'];
                                           //  print_r(count($following_count));
                                           //$jobapplied_count = explode(',',$following_count['count(fld_seeker_id)']);
                                         // echo $row['count(fld_following)'];
                                         //echo  $following_count ;      
                                         } 
                                         if($appliedjob == 0){
                                         ?>
                                         <span class="value"><span><?php echo "0";?></span></span>
                                         <?php } else { ?>
                                         <a href="user-job-applied.php"><span class="value"><span><?php print_r(count($appliedjob)); ?></span></span></a>
                                         <?php } ?>
                                     </span>
                                 </span>
                             </div>
                         </div>
                     </div>
                </div>
            </div>
        </section>