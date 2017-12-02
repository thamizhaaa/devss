<?php
include("config.php"); //include config file
error_reporting(0);
session_start();
$name = $_SESSION["empuser_name"];
$id = $_SESSION['empuser_id'];
//sanitize post value
if(isset($_POST["page"])){
    $page_number = filter_var($_POST["page"], FILTER_SANITIZE_NUMBER_INT, FILTER_FLAG_STRIP_HIGH);
    if(!is_numeric($page_number)){die('Invalid page number!');} //incase of invalid page number
}else{
    $page_number = 1;
}
$position = (($page_number-1) * $item_per_page);
//get current starting point of records
?>
<div class="all-jobs-list-box2">
                                 <?php 
                                $sql="select * from `tbl_postjob` where fld_empid='$id' and fld_status=1 Order by fld_id DESC LIMIT $position, $item_per_page" ;
                                                                      
 
                                                $res=mysql_query($sql);
                                                while($rows=mysql_fetch_assoc($res))
                                                {
                                               
$timestamp = strtotime($rows['fld_postdate']);
$postdate = date( 'd-m-Y', $timestamp);
                                                  ?>
                                <div class="job-box job-box-2 expire-box ribbon-content">
                                    <div class="job-title-box">
                                       
                                        <a href="#">
                                            <div class="job-title"><?php echo $rows['fld_jobtitle'];?></div>
                                        </a>
                                        <a href="#"><span class="comp-name"><?php echo $rows['fld_industry_type'];?></span></a>
                                        <a href="#" class="job-type jt-full-time-color">
                                            <i class="fa fa-clock-o"></i> <?php echo $rows['fld_job_type'];?>
                                        </a>
                                    </div>
                                    <div class="expire-job-box">
                                        <span class="expire-date">Post Date : <strong><?php  echo $postdate ;?></strong></span>
                                        <span class="pull-right">
                                   		<a href="postjob_edit.php?jobcode=<?php  echo $rows['fld_id'];?>" class="btn btn-default" id='btnedit' > Edit job</a>
                                    	<a href="#" class="btn btn-danger"  id='btndelete' name='btndelete'onClick="fn_delete('<?php  echo $rows['fld_id'];?>')"> Delete job</a> 
                                       
                                      <i data-id="<?php
    echo $rows['fld_id'];
?>" attr="<?php
   echo $rows['fld_id'];
?>" class="status_checks btn  
  <?php
    echo ($rows['fld_job_status']) ? 'btn-danger' : 'btn-success';
?>" style="border-radius:0px; padding: 10px 18px; "><?php
    echo ($rows['fld_job_status']) ? 'Deactive' : 'Active';
?>
                                      </i></span>
                                          
                                  
                                    </div>
                                              
                                    
                                </div> 
                                <?php }?>
                       

                        </div>