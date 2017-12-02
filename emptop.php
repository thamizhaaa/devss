<section class="company-dashboard">
            <div class="container">
                <div class="row">
                    <div class="col-md-12 col-sm-12 col-xs-12 nopadding">
                        <div class="dashboard-header">
                            <div class="col-lg-6 col-md-8 col-sm-8 col-xs-12">
                                <div class="dashboard-header-logo-box">
                                    <div class="company-logo">
                                    <?php
                                    $sql="select * from tbl_employer_details where fld_empid=$id";                                    
                                    $result=mysql_query($sql);
                                    while($rows= mysql_fetch_assoc($result))
                                    {
                                    $empname = $rows['fld_employer_name'];
                                    $emplogo = $rows['fld_logo'];                                    
                                    if(file_exists($emplogo) && (preg_match('/\.([^\.]+)$/', $emplogo)))
                                    {
                                    ?>
                                    <img src="<?php echo $emplogo; ?>" alt="" class="img-responsive center-block ">
                                    <?php
                                    }
                                    else
                                    {
                                    ?>
                                    <img src="<?php echo "images/nopicture.jpg"; ?>" alt="" class="img-responsive center-block">
                                    <?php
                                    }
                                    ?>
                                    </a>                                                
                                       
                                    </div>
                                    <h3><?php  echo $rows['fld_employer_name']?></h3>
                                    <!--<p><?php//  echo $rows['fld_address']?></p>-->
                                    <?php }?>
                                    <ul class="social-links list-inline">
                                       <!--  <li> <a href="#"><i class="icon-facebook"></i></a></li>
                                        <li> <a href="#"><i class="icon-twitter"></i></a></li>
                                        <li> <a href="#"><i class="icon-googleplus"></i></a></li>
                                        <li> <a href="#"><i class="icon-linkedin"></i></a></li> -->

                                    <?php
//$imgurl = 'http://'.$_SERVER['HTTP_HOST']."/".$emplogo;
// $imgurl = 'http://'.$_SERVER['HTTP_HOST']."/"."images/nopicture.jpg";
// $pinimgpath = urlencode($imgurl);
// $current_page_url = 'http://' . $_SERVER['HTTP_HOST'] . $_SERVER['REQUEST_URI'];
?>

<!-- <li>
<a href="https://www.facebook.com/dialog/share?app_id=1811904162381028&display=popup&href=<?php echo $current_page_url;?>&redirect_uri=<?php echo $current_page_url;?>" target="_blank"><i class="icon-facebook"></i></a>
</li>

<li>
<a target="_blank" href="https://twitter.com/share?url=<?php echo $current_page_url; ?>&media=<?php echo $current_page_url?>/<?php echo $logo;?>&description=<?php echo $empname;?>"><i class="icon-twitter"></i></a>
</li>

<li>
<a href="https://pinterest.com/pin/create/link/?url=<?php echo $current_page_url;?>&media=<?php echo $pinimgpath; ?>&description=<?php echo urlencode($empname);?>" target="_blank"><i class="icon-linkedin"></i></a>
</li> -->



                                    </ul>
                                </div>
                            </div>
                            <div class="col-lg-3 col-md-4 col-sm-4 col-xs-12">
                                <?php
                
        $sql = mysql_query("SELECT * FROM tbl_postjob WHERE fld_empid='$id' AND fld_job_status=1 ");
        $count_sql = mysql_num_rows($sql);
                if($count_sql>0){
                                $todayydate = date('Y-m-d H:i:s', strtotime('-5 days'));                                
                                $sql1="SELECT tbj.fld_id,tbj.fld_keyskills FROM `tbl_postjob` tbj join tbl_employer_details ted on(tbj.fld_empid=ted.fld_empid) WHERE tbj.fld_job_status='1' and tbj.fld_delstatus='0' and tbj.fld_empid=$id and fld_postdate >= '$todayydate' group by tbj.fld_id ";  
				
//				echo "SELECT tbj.fld_id,tbj.fld_keyskills FROM `tbl_postjob` tbj join tbl_employer_details ted on(tbj.fld_empid=ted.fld_empid) WHERE tbj.fld_status='1' and tbj.fld_delstatus='0' and tbj.fld_empid=$id and fld_postdate >= '$todayydate' group by tbj.fld_id "; 
				
				
                                    $result1=mysql_query($sql1);
                                    while($row=mysql_fetch_assoc($result1)) 
                                   {
                                        $array_key11=explode(",",$row['fld_keyskills']); 
                    foreach($array_key11 as $array_key112){
                        $keyskills[]=$array_key112;
                    }
                   }
                   $keyskills1 = array_unique($keyskills);
//		   print_r($keyskills1);
                    $sum=0;
                                          foreach ($keyskills1 as $array_key)
                                          {
                                               $array_key1 = trim($array_key);
                           $sq=mysql_query("SELECT * FROM tbl_jobseeker_details join tbl_jobseeker on(tbl_jobseeker_details.fld_js_id=tbl_jobseeker.fld_id) WHERE (tbl_jobseeker_details.fld_keyword = '$array_key1' OR tbl_jobseeker_details.fld_keyword like '%,$array_key1,%' OR tbl_jobseeker_details.fld_keyword like '$array_key1,%' OR tbl_jobseeker_details.fld_keyword like '%,$array_key1') and tbl_jobseeker.fld_profile_visibility=1 and tbl_jobseeker.fld_js_status=1");
			   
                           $num_rows=mysql_num_rows($sq);
                           $count = count($num_rows); 
                           if($count>0){
                           while($roww = mysql_fetch_array($sq)){
                           $sum1[]= $roww['fld_id'];
                           $keyword[] = $array_key1;
                           }
                           }
                      }   
//                    print_r($sum1);
                   }
                
                else{
                    $sum=0;
                }
                
                
                
                $array_sum = array_unique($sum1);
                $sum = count($array_sum);
                $array_skillls = array_unique($keyword);
                $keywords = implode(',',$array_skillls);
                
                                       $sql="select count(*) as id from `tbl_postjob` where fld_empid='$id' and fld_job_status=1 and `fld_expirydate` >= CURDATE() and fld_delstatus!=2";
                                       $result=mysql_query($sql);
                                       $row=mysql_fetch_assoc($result);


                    $sql_followers="select ted.fld_followers from tbl_employer_details ted join tbl_employer te on (ted.fld_empid=te.fld_id) where ted.fld_empid='$id' and te.fld_emp_status=1";
		    
                        $result1=mysql_query($sql_followers);
			while($res=mysql_fetch_array($result1)){
			if($res['fld_followers']!=NULL){
			$followers = explode(',',$res['fld_followers']);
                       }
                       }
                                       $follow_count = count($followers);
                                       
                                        ?>
                                       
                                <div class="rad-info-box">
                                    <i class="icon icon-presentation"></i>
                                    <span class="title-dashboard">Jobs Posted</span>
                                    <?php
                                    //print_r($row['id']);
                                    if($row['id'] == 0)
                                    {
                                    ?>
                                   <span class="value"><span><?php echo $row['id']; ?></span></span>
                                    <?php
                                    }
                                    else
                                    {
                                    ?>
                                    <a href="company-dashboard-active-jobs.php"><span class="value"><span><?php echo $row['id']; ?></span></span></a>
                                    <?php
                                    }
                                    ?>
                                </div>
                            </div>
                             <?php 
                            // echo "select '*' from postjob where keyskills='".$row['keyskills']."'";
//                             $sql12="SELECT * FROM `seeker_profess`  WHERE `keyskills` in(select '*' from postjob where keyskills='".$row['keyskills']."' ) ";
//                             echo "SELECT count(*) FROM `seeker_profess`  WHERE `keyskills` in(select 'keyskills' from postjob where keyskills='".$row['keyskills']."' ) ";
//                                       $result1=mysql_query($sql12);
//                                   while($row12=mysql_fetch_assoc($result12)) 
//                                        {
//                                      $key=$row12['keyskills'];
//                                        echo $key;
//                                      }
//                                    
                             ?>
                          

                            <div class="col-lg-3 col-md-4 col-sm-4 col-xs-12">
                                <div class="rad-info-box">
                                    <i class="icon icon-documents"></i>
                                    <span class="title-dashboard">New resume</span>

                                    <?php                                   
                                    if($sum == 0)
                                    {
                                    ?>
                                    <span class="value"><?php echo $sum;?></span>
                                    <?php
                                    }
                                    else
                                    {
                                    ?>
                                    <a href="searchresume.php?action=resumelistlist&skill=<?php echo $keywords; ?>"><span class="value"><?php echo $sum;?></span></a>
                                    <?php
                                    }
                                    ?>

                                    
                </div>
                            </div>  

                                    <div class="col-lg-3 col-md-4 col-sm-4 col-xs-12">
                                    <div class="rad-info-box">
                                    <i class="icon icon-profile-male"></i>
                                    <span class="title-dashboard">Followers</span>
                                    <?php                                   
                                    if($follow_count == 0)
                                    {
                                    ?>
                                    <span class="value"><span><?php echo $follow_count; ?></span></span>
                                    <?php
                                    }
                                    else
                                    {
                                    ?>
                                    <a href="company-dashboard-followers.php"><span class="value"><span><?php echo $follow_count; ?></span></span></a>
                                    <?php
                                    }
                                    ?>



                                    
                                </div> </div>  


                          
                        </div>
                    </div>
                </div>
            </div>
        </section>