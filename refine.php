<?php
session_start();
error_reporting(0);
include("config.php");
if ($_REQUEST['skill'] == 'null' && $_REQUEST['city'] && $_REQUEST['experience'] == 'null') {
    $city = $_GET['city'];
    $city1 = explode(',', $city);
} elseif ($_REQUEST['skill'] && $_REQUEST['city'] == 'null' && $_REQUEST['experience'] == 'null') {
    $skill = $_GET['skill'];
    $skill1 = explode(',', $skill);
} elseif ($_REQUEST['skill'] == 'null' && $_REQUEST['city'] == 'null' && $_REQUEST['experience']) {
    $experience = $_GET['experience'];
} else {
    $skill = $_REQUEST['skill'];
    $city = $_REQUEST['city'];
    $experience = $_REQUEST['experience'];
    $city1 = explode(',', $city);
    $skill1 = explode(',', $skill);
}
$page_cur = $_REQUEST['page_cur'];
$exp1 = $experience-1;
$exp2 = $experience+1;
if (isset($_POST['formData'])) {
    $frmresults = $_POST['formData'];
    $splittedstringg = explode("&", $frmresults);
    $splittedstringg11 = str_replace('+', ' ', $frmresults);
    $splittedstringg113 = str_replace('%20', ' ', $splittedstringg11);
    $splittedstringg112 = str_replace('%2F', '/', $splittedstringg113);
    $splittedstringg111 = str_replace('', ' & ', $splittedstringg112);
    $connt = count($splittedstringg);
    if ($connt != 1) {
        $first = str_replace("=", " in ('", $splittedstringg111);
        $second = str_replace(",", "','", $first);
        $third = str_replace("&", "') and ", $second);
        $final = $third . "')";
    } else {
        $first = str_replace("=", " in ('", $splittedstringg111);
        $second = str_replace(",", "','", $first);
        $final = $second . "')";
    }
    $final;
}
?>
<div class="col-md-12 top_space nopadding" >
    <?php
    if ($frmresults == "") {
        ?>  
        <div class="all-jobs-list-box" id="rightpanel">
            <?php
            foreach ($city1 as $city11) {
                $cities .= $city11;
                $records1 .= "tp.fld_location like '%$city11%' OR ";
            }
            $records1 = substr($records1, 0, -3);

            foreach ($skill1 as $skill11) {
                $skills .=$skill11;
            //$records11 .= "tp.fld_keyskills like '%$skill11%' OR ";
            $records11 .= "tp.fld_keyskills = '$skill11' OR tp.fld_keyskills like '$skill11,%' OR tp.fld_keyskills like '%,$skill11,%' OR tp.fld_keyskills like '%,$skill11' OR ";
            }
            $records11 = substr($records11, 0, -3);
            $records1 = '(' .$records1 .')';
            $records11 = '(' .$records11.')';
            if ($cities != '' && $skills == '') {
                $pagin_query = "select count(*) as total from tbl_employer_details ed join tbl_postjob tp on (ed.fld_empid=tp.fld_empid) join tbl_employer e on (e.fld_id=ed.fld_empid) WHERE tp.`fld_expirydate` >= CURDATE() AND tp.fld_job_status=1 AND tp.fld_delstatus=0 AND $records1";
            }
            if ($skills != '' && $cities == '') {
                $pagin_query = "select count(*) as total from tbl_employer_details ed join tbl_postjob tp on (ed.fld_empid=tp.fld_empid) join tbl_employer e on (e.fld_id=ed.fld_empid) WHERE tp.`fld_expirydate` >= CURDATE() AND tp.fld_job_status=1 AND tp.fld_delstatus=0 AND $records11";
            }
            if ($cities != '' && $skills != '') {
                $pagin_query = "select count(*) as total from tbl_employer_details ed join tbl_postjob tp on (ed.fld_empid=tp.fld_empid) join tbl_employer e on (e.fld_id=ed.fld_empid) WHERE tp.`fld_expirydate` >= CURDATE() AND tp.fld_job_status=1 AND tp.fld_delstatus=0 AND ($records1 OR $records11)";
            }

            if ($cities == '' && $skills == ''){
                $pagin_query = "select count(*) as total from tbl_employer_details ed join tbl_postjob tp on (ed.fld_empid=tp.fld_empid) join tbl_employer e on (e.fld_id=ed.fld_empid) WHERE tp.`fld_expirydate` >= CURDATE() AND tp.fld_job_status=1 AND tp.fld_delstatus=0";
            }
            if($experience !== ''){
            $exp = " AND tp.fld_experience IN ($exp1,$experience,$exp2) AND e.fld_emp_status=1 AND e.fld_delstatus=0 And ed.fld_delstatus =0";                 
             } else {
            $exp = " AND e.fld_emp_status=1 AND e.fld_delstatus=0 And ed.fld_delstatus =0";
            }
            $pagin_query = $pagin_query . $exp;
            $pagin_query11 = mysql_query($pagin_query);
            $pagin_row = mysql_fetch_array($pagin_query11);
            $total = $pagin_row['total'];
            $dis = 5;
            $total_page = ceil($total / $dis);
            $k = ($page_cur - 1) * $dis;
            if ($cities != '' && $skills == '') {
                $sql = "select *,tp.fld_id from tbl_employer_details ed join tbl_postjob tp on (ed.fld_empid=tp.fld_empid) join tbl_employer e on (e.fld_id=ed.fld_empid) WHERE tp.`fld_expirydate` >= CURDATE() AND tp.fld_job_status=1 AND tp.fld_delstatus=0 AND $records1";
            }
            if ($skills != '' && $cities == '') {
                $sql = "select *,tp.fld_id from tbl_employer_details ed join tbl_postjob tp on (ed.fld_empid=tp.fld_empid) join tbl_employer e on (e.fld_id=ed.fld_empid) WHERE tp.`fld_expirydate` >= CURDATE() AND tp.fld_job_status=1 AND tp.fld_delstatus=0 AND $records11";
            }

            if ($cities == '' && $skills == ''){
                $sql = "select *,tp.fld_id from tbl_employer_details ed join tbl_postjob tp on (ed.fld_empid=tp.fld_empid) join tbl_employer e on (e.fld_id=ed.fld_empid) WHERE tp.`fld_expirydate` >= CURDATE() AND tp.fld_job_status=1 AND tp.fld_delstatus=0";
            }

            if ($cities != '' && $skills != '') {
                $sql = "select *,tp.fld_id from tbl_employer_details ed join tbl_postjob tp on (ed.fld_empid=tp.fld_empid) join tbl_employer e on (e.fld_id=ed.fld_empid) WHERE tp.`fld_expirydate` >= CURDATE() AND tp.fld_job_status=1 AND tp.fld_delstatus=0 AND $records1 AND $records11";
            }

            if ($cities != '') {
                $sql = "select *,tp.fld_id from tbl_employer_details ed join tbl_postjob tp on (ed.fld_empid=tp.fld_empid) join tbl_employer e on (e.fld_id=ed.fld_empid) WHERE tp.`fld_expirydate` >= CURDATE() AND tp.fld_job_status=1 AND tp.fld_delstatus=0 AND ($records1 OR $records11)";
            }

             if($experience !== ''){
            $exp = " AND tp.fld_experience IN ($exp1,$experience,$exp2) AND e.fld_emp_status=1 AND e.fld_delstatus=0 And ed.fld_delstatus =0";                 
             } else {
            $exp = " AND e.fld_emp_status=1 AND e.fld_delstatus=0 And ed.fld_delstatus =0";
            }
            $sql111 = $sql . $exp . " limit $k ,$dis";
//            echo $sql111;
            $records = mysql_query($sql111);
            $rowCount = mysql_num_rows($records);
            ?>        
            <?php
            $projects = array();
            while ($project = mysql_fetch_assoc($records)) {
                $projects[] = $project;
            }
            $r = 0;
            if($rowCount>0){
            foreach ($projects as $project) {
                $r++;
                ?>
                <div class="job-box">
                    <div class="col-lg-2 col-md-2 col-sm-12 col-xs-12">

                        <div class="comp-logo">                        
                            <?php                            
                            $test = $project['fld_logo'];
                            $emplogo = $test;
                            
                            ?>           
                    <?php
                    if(file_exists($emplogo) && (preg_match('/\.([^\.]+)$/', $emplogo)))
                    {
                    ?>
                    <img src="<?php echo $emplogo; ?>" class="img-responsive111" alt="<?php echo $project['fld_employer_name'];?>">
                    <?php
                     }
                     else
                     {
                     ?>
                       <img src="images/nopicture.jpg" alt="" class="img-responsive">
                     <?php
                     }
                     ?>
                           
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-4 col-sm-6 col-xs-12">

                        <div class="job-title-box">                                    
                            <?php
                            echo $project['fld_employer_name']." - "; 
                            echo $project['fld_jobtitle'];
                            ?> <br><br>
                             - &nbsp; <?php echo $project['fld_location']; ?>
                            
                        </div>
                    </div>

                    <div class="col-lg-4 col-md-4 col-sm-6 col-xs-12">
                       
                            <div class="job-type">
				<p class="jt-remote-color">
				    <i class="fa fa-briefcase"></i> <?php
				    echo $project['fld_job_type'];
                                ?>
				</p>
                                
                                <p class="jt-remote-color">
				    <i class="fa fa-calendar" aria-hidden="true"></i>
				    <?php
				    $exper = explode(",", $project['fld_experience']);
				    
                    $year = $exper[0];
                    $month = $exper[1];

                    if($year == "fresher" && $month == "NULL"){
                    echo "Fresher";


                    }

                    if($year > '1' && $year!='fresher') {
                    echo $year . " Years ";
                    } if($year == '1' && $year!='fresher') {
                    echo $year . " Year ";
                    }
                    if ($month > '1' && $month!='NULL') {
                    echo " " . $month . " Months ";;
                    } if($month == '1' && $month!='NULL') {
                    echo $month . " Month ";
                    }
 


				    ?>
				</p>
                            </div>
                      
                    </div>
                    <br/>
                    <div class="col-lg-2 col-md-2 col-sm-12 col-xs-12 nopadding">
                        <a href="singlejob.php?jid=<?php
                        echo $project['fld_id'];
                        ?>"><input type="button" class="btn btn-default btn-search-submit" value="View More"/></a>

                    </div>
                    
                    


                </div>
                <?php
    } } else {
                            echo '<center><h3>No Job(s) Available</h3></center>';
                        }
            ?>

        </div>
    <?php if($total >5){ ?>
                                <ul class="pagination" style="font-weight:bolder;">

                    <?php if ($page_cur > 1) { ?>

                    <li class="disabled" ><a href="searchjoblist.php?action=joblist&city=<?php echo $city; ?>&skill=<?php echo $skill; ?>&experience=<?php echo $experience; ?>&page=<?php echo ($page_cur - 1); ?>">Prev</a></li>
    <?php } else { ?>
                    <li class="active"><a>Prev</a></li>
    <?php
    } for ($i = 1; $i <= $total_page; $i++) {

        if ($page_cur == $i) {
            ?>
                        <li class="active"><a><?php echo $i; ?></a></li>

        <?php } else { ?>
                        <li class="disabled" ><a href="searchjoblist.php?action=joblist&city=<?php echo $city; ?>&skill=<?php echo $skill; ?>&experience=<?php echo $experience; ?>&page=<?php echo $i; ?>"><?php echo $i; ?></a></li>

                    <?php }
                }
                if ($page_cur < $total_page) {
                    ?>

                    <li class="disabled" ><a href="searchjoblist.php?action=joblist&city=<?php echo $city; ?>&skill=<?php echo $skill; ?>&experience=<?php echo $experience; ?>&page=<?php echo ($page_cur + 1); ?>">Next >></a></li>
                <?php } else { ?>

                    <li class="active" ><a>Next >></a></li>
    <?php } ?>


            </ul>
                                <?php } ?>


        <?php
    } else {
        ?>  
        <div class="load_content" id="load_more_ctnt">

            <?php
            /* ?><h4><center><?php echo $Caprprodsubminicatname1; ?></center></h4><?php */
            ?>
            <?php
            
            foreach ($city1 as $city11) {
                $cities .= $city11;
                $records1 .= "tp.fld_location like '%$city11%' OR ";
            }
            $records1 = substr($records1, 0, -3);

            foreach ($skill1 as $skill11) {
                $skills .= $skill11;
              //$records11 .= "tp.fld_keyskills like '%$skill11%' OR ";
            $records11 .= "tp.fld_keyskills = '$skill11' OR tp.fld_keyskills like '$skill11,%' OR tp.fld_keyskills like '%,$skill11,%' OR tp.fld_keyskills like '%,$skill11' OR ";
            }
            $records11 = substr($records11, 0, -3);

            $records1 = '(' .$records1 . ')';
            $records11 = '(' .$records11. ')';
            
            if ($cities != '' && $skills == '') {

                $select_query = "select count(*) as total from tbl_employer_details ted join tbl_postjob tp on (ted.fld_empid=tp.fld_empid) join tbl_employer e on (e.fld_id=ted.fld_empid) where tp.`fld_expirydate` >= CURDATE() AND tp.fld_job_status=1 AND tp.fld_delstatus=0 AND $records1";

            }
            if ($skills != '' && $cities == '') {

                $select_query = "select count(*) as total from tbl_employer_details ted join tbl_postjob tp on (ted.fld_empid=tp.fld_empid) join tbl_employer e on (e.fld_id=ted.fld_empid) where tp.`fld_expirydate` >= CURDATE() AND tp.fld_job_status=1 AND tp.fld_delstatus=0 AND $records11";
            }
            if ($cities != '' && $skills != '') {
                $select_query = "select count(*) as total from tbl_employer_details ted join tbl_postjob tp on (ted.fld_empid=tp.fld_empid) join tbl_employer e on (e.fld_id=ted.fld_empid) where tp.`fld_expirydate` >= CURDATE() AND tp.fld_job_status=1 AND tp.fld_delstatus=0 AND ($records1 OR $records11)";

            } if ($cities == '' && $skills == ''){
                $select_query = "select count(*) as total from tbl_employer_details ted join tbl_postjob tp on (ted.fld_empid=tp.fld_empid) join tbl_employer e on (e.fld_id=ted.fld_empid) where tp.`fld_expirydate` >= CURDATE() AND tp.fld_job_status=1 AND tp.fld_delstatus=0 AND e.fld_emp_status=1 AND e.fld_delstatus=0  And ted.fld_delstatus =0";
            }
            if($experience != ''){
            $exp = " AND tp.fld_experience IN ($exp1,$experience,$exp2) AND e.fld_emp_status=1 AND e.fld_delstatus=0 And ted.fld_delstatus =0";
            }else {
                $exp = " AND e.fld_emp_status=1 AND e.fld_delstatus=0 And ted.fld_delstatus =0";
            }            
            $select_query = $select_query . $exp;
            $orderby_query = " ORDER BY tp.fld_id";
            $load_query = $select_query . " AND ".$final ." ". $orderby_query;
            $load_query11 = mysql_query($load_query);
            $load_row = mysql_fetch_array($load_query11);            
            $total = $load_row['total'];
            $dis = 5;
            $total_page = ceil($total / $dis);
            $page_cur = (isset($_GET['page'])) ? $_GET['page'] : 1;            
            $k = ($page_cur - 1) * $dis;
            if ($cities != '' && $skills == '') {
                $select1 = "select * from tbl_employer_details ted join tbl_postjob tp on (ted.fld_empid=tp.fld_empid) join tbl_employer e on (e.fld_id=ted.fld_empid) where tp.`fld_expirydate` >= CURDATE() AND tp.fld_job_status=1 AND tp.fld_delstatus=0 AND $records1";
            }
            if ($skills != '' && $cities == '') {
                $select1 = "select * from tbl_employer_details ted join tbl_postjob tp on (ted.fld_empid=tp.fld_empid) join tbl_employer e on (e.fld_id=ted.fld_empid) where tp.`fld_expirydate` >= CURDATE() AND tp.fld_job_status=1 AND tp.fld_delstatus=0 AND $records11";
            }
            if ($cities != '' && $skills != '') {
                $select1 = "select * from tbl_employer_details ted join tbl_postjob tp on (ted.fld_empid=tp.fld_empid) join tbl_employer e on (e.fld_id=ted.fld_empid) where tp.`fld_expirydate` >= CURDATE() AND tp.fld_job_status=1 AND tp.fld_delstatus=0 AND ($records1 OR $records11)";
            }
            if ($cities == '' && $skills == ''){
                $select1 = "select * from tbl_employer_details ted join tbl_postjob tp on (ted.fld_empid=tp.fld_empid) join tbl_employer e on (e.fld_id=ted.fld_empid) where tp.`fld_expirydate` >= CURDATE() AND tp.fld_job_status=1 AND tp.fld_delstatus=0 AND e.fld_emp_status=1 AND e.fld_delstatus=0 And ted.fld_delstatus =0";
            }
            if($experience != ''){
                $exp = " AND tp.fld_experience IN ($exp1,$experience,$exp2) AND e.fld_emp_status=1 AND e.fld_delstatus=0 And ted.fld_delstatus =0";
            }else {
                $exp = " AND e.fld_emp_status=1 AND e.fld_delstatus=0 And ted.fld_delstatus =0";
            }
            $orderby = " ORDER BY tp.fld_id Limit $k,$dis";
            
            $refineprodcuts = $select1 . $exp . " AND ".$final. " " . $orderby;
            
//            echo $refineprodcuts;
            $refineprodcuts11 = mysql_query($refineprodcuts);
            $rowCount = mysql_num_rows($refineprodcuts11);
            ?>

            <div class="panel-body nopadding">
                <ul class="joblist nopadding loadmore">
                    <div class="loadmore_searchby">
                        <?php
                        if($rowCount > 0){
                        while($seek_result = mysql_fetch_array($refineprodcuts11)) {
                            $companyid = $seek_result['fld_id'];
                            $jobtitle = $seek_result['fld_jobtitle'];
                            $name = $seek_result['fld_industype'];
                            $location1 = $seek_result['fld_location'];
                            $pdate = $seek_result['fld_postdate'];
                            $empid = $seek_result['fld_empid'];
                            $empname = $seek_result['fld_employer_name'];
                            $postdate = date_create($seek_result['fld_postdate']);
                            $test = $seek_result['fld_logo'];
                            $today = date_format($postdate, "F j, Y");
                            ?>

                            <div class="job-box">
                                <div class="col-lg-2 col-md-2 col-sm-12 col-xs-12">

                                    <div class="comp-logo">
                                        <?php                                        
                                        if(file_exists($test) && (preg_match('/\.([^\.]+)$/', $test)))
                                        {
                                        ?>                                        
                                        <img src="<?php echo $test; ?>" class="img-responsive" alt="<?php echo $test; ?>">
                                        <?php
                                        }
                                        else
                                        {
                                        ?>
                                        <img src="images/nopicture.jpg" alt="" class="img-responsive">
                                        <?php
                                        }
                                        ?>
                                            
                                    </div>
                                </div>
                                <div class="col-lg-4 col-md-4 col-sm-6 col-xs-12">

                                <div class="job-title-box">                                    
                                <?php

                                echo $seek_result['fld_employer_name']." - "; 
                                echo $seek_result['fld_jobtitle'];
                                ?> <br><br>
                                - &nbsp; <?php echo $seek_result['fld_location']; ?>
                                </div>
                                  
                                </div>

                                <div class="col-lg-4 col-md-4 col-sm-6 col-xs-12">
                               
                                        <div class="job-type">
                                            <p class="jt-remote-color">
                                                <i class="fa fa-briefcase" aria-hidden="true"></i>
                                                <?php echo $seek_result['fld_job_type'];?>
                                            </p>
                                            <p class="jt-remote-color">
                                                <i class="fa fa-calendar" aria-hidden="true"></i>
                                                <?php 
                                                    $exper = explode(",", $seek_result['fld_experience']);
                                                                                                        $year = $exper[0];
                                                    $month = $exper[1];
 
                                                    if($year == "fresher" && $month == "NULL"){
                                                        echo "Fresher";
                                                    }
 
                                                     if($year > '1' && $year!='fresher') {
                                                        echo $year . " Years ";
                                                      } if($year == '1' && $year!='fresher') {
                                                        echo $year . " Year ";
                                                      }
 
                                                     if ($month > '1' && $month!='NULL') {
                                                        echo " " . $month . " Months ";;
                                                     } if($month == '1' && $month!='NULL') {
                                                        echo $month . " Month ";
                                                      }
                                                      
                                                ?>
                                            </p>
                                        </div>
                                  
                                </div>
    <div class="col-lg-2 col-md-2 col-sm-12 col-xs-12 nopadding">
        <a href="singlejob.php?jid=<?php echo $seek_result['fld_id']; ?>"><input type="button" class="btn btn-default btn-search-submit" value="View More"/></a>
    </div>
                            </div>
                            <?php
                        } } else {
                            echo '<center><h3>No Job(s) Available</h3></center>';
                        }
                        ?>
                    </div>

                </ul>

            </div>

                                     <?php if($total >5){ ?>
                                <ul class="pagination" style="font-weight:bolder;">
 
                    <?php if ($page_cur > 1) { ?>
 
                    <li class="disabled" ><a href="searchjoblist.php?action=joblist&city=<?php echo $city; ?>&skill=<?php echo $skill; ?>&experience=<?php echo $experience; ?>&page=<?php echo ($page_cur - 1); ?>">Prev</a></li>
    <?php } else { ?>
                    <li class="active"><a>Prev</a></li>
    <?php
    } for ($i = 1; $i <= $total_page; $i++) {
 
        if ($page_cur == $i) {
            ?>
                        <li class="active"><a><?php echo $i; ?></a></li>
 
        <?php } else { ?>
                        <li class="disabled" ><a href="searchjoblist.php?action=joblist&city=<?php echo $city; ?>&skill=<?php echo $skill; ?>&experience=<?php echo $experience; ?>&page=<?php echo $i; ?>"><?php echo $i; ?></a></li>
 
                    <?php }
                }
                if ($page_cur < $total_page) {
                    ?>
 
                    <li class="disabled" ><a href="searchjoblist.php?action=joblist&city=<?php echo $city; ?>&skill=<?php echo $skill; ?>&experience=<?php echo $experience; ?>&page=<?php echo ($page_cur + 1); ?>">Next >></a></li>
                <?php } else { ?>
 
                    <li class="active" ><a>Next >></a></li>


            <?php
        }
        ?>
    
</ul>
            <?php
        }
        ?>
    
</div>

</div>
            <?php
        }
        ?>
    </div>

</section><!-- /.content -->
</aside><!-- /.right-side -->
</div><!-- ./wrapper -->

<script src="//ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
<script src="js/bootstrap.min.js" type="text/javascript"></script>
<!-- AdminLTE App -->
<script src="js/AdminLTE/app.js" type="text/javascript"></script>
<!-- AdminLTE for demo purposes -->
<script src="js/AdminLTE/demo.js" type="text/javascript"></script>
</div>

<script>
    (function (window) {

        'use strict';

        var progressElem, statusElem;
        var supportsProgress;
        var loadedImageCount, imageCount;

        window.onload = function () {
            var demo = document.querySelector('#demo');
            var container = demo.querySelector('#linking');
            statusElem = demo.querySelector('#status');
            progressElem = demo.querySelector('progress');

            supportsProgress = progressElem &&
// IE does not support progress
                    progressElem.toString().indexOf('Unknown') === -1;

            demo.querySelector('#add').onclick = function () {
// add new images
                var fragment = getItemsFragment();
                container.insertBefore(fragment, container.firstChild);
// use ImagesLoaded
                var imgLoad = imagesLoaded(container);
                imgLoad.on('progress', onProgress);
                imgLoad.on('always', onAlways);
// reset progress counter
                imageCount = imgLoad.images.length;
                resetProgress();
                updateProgress(0);
            };

// reset container
            document.querySelector('#reset').onclick = function () {
                empty(container);
            };
        };

// ----- set text helper ----- //

        var docElem = document.documentElement;
        var textSetter = docElem.textContent !== undefined ? 'textContent' : 'innerText';

        function setText(elem, value) {
            elem[ textSetter ] = value;
        }

        function empty(elem) {
            while (elem.firstChild) {
                elem.removeChild(elem.firstChild);
            }
        }

// -----  ----- //

// return doc fragment with
        function getItemsFragment() {
            var fragment = document.createDocumentFragment();
            for (var i = 0; i < 7; i++) {
                var item = getImageItem();
                fragment.appendChild(item);
            }
            return fragment;
        }

// return an <li> with a <img> in it
        function getImageItem() {
            var item = document.createElement('li');
            item.className = 'is-loading';
            var img = document.createElement('img');
            var size = Math.random() * 3 + 1;
            var width = Math.random() * 110 + 100;
            width = Math.round(width * size);
            var height = Math.round(140 * size);
            var rando = Math.ceil(Math.random() * 1000);
// 10% chance of broken image src
// random parameter to prevent cached images
            img.src = rando < 100 ? '//foo/broken-' + rando + '.jpg' :
// use lorempixel for great random images
                    '//lorempixel.com/' + width + '/' + height + '/' + '?' + rando;
            item.appendChild(img);
            return item;
        }

// -----  ----- //

        function resetProgress() {
            statusElem.style.opacity = 1;
            loadedImageCount = 0;
            if (supportsProgress) {
                progressElem.setAttribute('max', imageCount);
            }
        }

        function updateProgress(value) {
            if (supportsProgress) {
                progressElem.setAttribute('value', value);
            } else {
// if you don't support progress elem
                setText(statusElem, value + ' / ' + imageCount);
            }
        }

// triggered after each item is loaded
        function onProgress(imgLoad, image) {
// change class if the image is loaded or broken
            image.img.parentNode.className = image.isLoaded ? '' : 'is-broken';
// update progress element
            loadedImageCount++;
            updateProgress(loadedImageCount);
        }

// hide status when done
        function onAlways() {
            statusElem.style.opacity = 0;
        }

    })(window);
</script>