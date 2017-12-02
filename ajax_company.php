<?php
include('config.php');
$action = $_REQUEST['action'];
switch ($action) {
    case "load_more": {
    ?>
            <div id="cats-masonry">
            <?php
            if(isset($_POST["id"]) && !empty($_POST["id"])){
            //count all rows except already displayed
            $queryAll = "SELECT * FROM employer WHERE id > ".$_POST['id']." ORDER BY id";
            $row1 = mysql_query($queryAll);
            $allRows = mysql_num_rows($row1);//46

            $showLimit = 9;

            //get rows query
            $query = "SELECT * FROM employer WHERE id > ".$_POST['id']." ORDER BY id LIMIT ".$showLimit;
            $query1=mysql_query($query);
            //number of rows
            $rowCount = mysql_num_rows($query1);

                if($rowCount > 0){ 
                    while($row = mysql_fetch_assoc($query1)){ 
                        $company_id = $row["id"]; ?>

                        <div class="col-md-4 col-sm-6 col-xs-12 editStyle">
                            <a href="#">
                                <div class="company-list-box" style="width:100%; float:left; min-height:160px;">
                                    <div class="company-list-img" style="width:25%; float:left;">
                                        <img src="images/<?php echo $row['logo'];?>" class="img-responsive" alt="">
                                    </div>  
                                    <div class="company-list-box-detail" style="width:75%; float:left;">
                                        <h5 style="color:#FF8D24; min-height: 60px;"> <?php  echo $row['employerName'];?> </h5>
                                        <p style="min-height:70px;"><?php echo mb_strimwidth(strip_tags($row['address']), 0, 66, "..."); ?></p>
                                    </div>    
                                    <div class="ratings" style="width:100%; float:left; color:#FF8D24;">
                                        <i class="fa fa-star color"></i> 
                                        <i class="fa fa-star color"></i> 
                                        <i class="fa fa-star color"></i> 
                                        <i class="fa fa-star-half-full color"></i> 
                                        <i class="fa fa-star-o"></i>
                                        <span class="badge" style="float:right; background-color:#FF8D24;"> 4.5</span> 
                                    </div>
                                </div>
                            </a>
                        </div>  
                <?php } ?>
                <?php if($allRows > $showLimit){ ?>
                        <div class="col-md-12 col-sm-12 col-xs-12">
                            <div class="load-more-btn load_more_main" id="show_more_main<?php echo $company_id; ?>">
                                <button id="<?php echo $company_id; ?>" class="btn-default load_more"> Load More <i class="fa fa-refresh"></i> </button>
                            </div>
                        </div>
                <?php } ?>  
            <?php 
                } 
            }
            ?>
            </div>
            <?php
            break;
    }
    case "company_search":{
        $title=$_POST["title"];
        $title = addslashes($title);
        $title = htmlspecialchars($title);
        $title = stripslashes($title);

         $result=mysql_query("SELECT * FROM employer where employerName like '%$title%' and `status`='1'");
         $found=mysql_num_rows($result);

         if($found>0){
            while($row=mysql_fetch_array($result)){
                ?>
                <div class="col-md-4 col-sm-6 col-xs-12 editStyle">
                    <a href="#">
                        <div class="company-list-box" style="width:100%; float:left; min-height:160px;">
                            <div class="company-list-img" style="width:25%; float:left;">
                                <img src="images/<?php echo $row['logo'];?>" class="img-responsive" alt="">
                            </div>  
                            <div class="company-list-box-detail" style="width:75%; float:left;">
                                <h5 style="color:#FF8D24; min-height: 60px;"> <?php  echo $row['employerName'];?> </h5>
                                <p style="min-height:70px;"><?php echo mb_strimwidth(strip_tags($row['address']), 0, 66, "..."); ?></p>
                            </div>    
                            <div class="ratings" style="width:100%; float:left; color:#FF8D24;">
                                <i class="fa fa-star color"></i> 
                                <i class="fa fa-star color"></i> 
                                <i class="fa fa-star color"></i> 
                                <i class="fa fa-star-half-full color"></i> 
                                <i class="fa fa-star-o"></i>
                                <span class="badge" style="float:right; background-color:#FF8D24;"> 4.5</span> 
                            </div>
                        </div>
                    </a>
                </div>

        <?php
            }   
         }else{?>

        <div class="col-md-4 col-sm-6 col-xs-12 editStyle" style="text-align: center; ">
                No Company Found
            </div>   
        <?php } 
        break;
    } case "load_more_search_company": { ?> 
<div class="loadmore_searchby">
            <?php
            
            
            
            
            
            if(isset($_POST["id"]) && !empty($_POST["id"])){
                $final = $_POST['searchby'];
                
                
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
                $exp1 = $experience-1;
                $exp2 = $experience+1;
                
                foreach ($city1 as $city11) {
                $records1 .= "tp.fld_location like '%$city11%' OR ";
            }
            $records1 = substr($records1, 0, -3);

            foreach ($skill1 as $skill11) {
                $records11 .= "tp.fld_keyskills like '%$skill11%' OR ";
            }
            $records11 = substr($records11, 0, -3);
            $records1 = '(' .$records1 . ')';
            $records11 = '(' .$records11. ')';

            if ($city1 != '' && $skill1 == '') {
                $queryAll1 = "select * from tbl_employer_details ted join tbl_postjob tp on (ted.fld_empid=tp.fld_empid) join tbl_employer e on (e.fld_id=ted.fld_empid) where " .$final ." AND tp.fld_id > ".$_POST['id']." AND $records1";
            }
            if ($skill1 != '' && $city1 == '') {
                $queryAll1 = "select * from tbl_employer_details ted join tbl_postjob tp on (ted.fld_empid=tp.fld_empid) join tbl_employer e on (e.fld_id=ted.fld_empid) where " .$final ." AND tp.fld_id > ".$_POST['id']." AND $records11";
            }
            if ($city1 != '' && $skill1 != '') {
                $queryAll1 = "select * from tbl_employer_details ted join tbl_postjob tp on (ted.fld_empid=tp.fld_empid) join tbl_employer e on (e.fld_id=ted.fld_empid) where " .$final ." AND tp.fld_id > ".$_POST['id']." AND $records1 AND $records11";
            }
            $exp = " AND SUBSTRING_INDEX(tp.fld_experience,',',1) IN ($exp1,$experience,$exp2) AND e.fld_emp_status=1 AND e.fld_delstatus=0 AND tp.fld_status=1 AND tp.fld_job_status=0 And ted.fld_delstatus =0";
            $queryAll1 = $queryAll1 . $exp;
            $row1 = mysql_query($queryAll1);
            $allRows = mysql_num_rows($row1);
            
            $showLimit = 5;
            
            
            if ($city1 != '' && $skill1 == '') {
                $select1 = "select * from tbl_employer_details ted join tbl_postjob tp on (ted.fld_empid=tp.fld_empid) join tbl_employer e on (e.fld_id=ted.fld_empid) where $final AND $records1";
            }
            if ($skill1 != '' && $city1 == '') {
                $select1 = "select * from tbl_employer_details ted join tbl_postjob tp on (ted.fld_empid=tp.fld_empid) join tbl_employer e on (e.fld_id=ted.fld_empid) where $final AND $records11";
            }

            if ($city1 != '' && $skill1 != '') {
                $select1 = "select * from tbl_employer_details ted join tbl_postjob tp on (ted.fld_empid=tp.fld_empid) join tbl_employer e on (e.fld_id=ted.fld_empid) where $final AND $records1 AND $records11";
            }
            
            
            $exp = " AND SUBSTRING_INDEX(tp.fld_experience,',',1) IN ($exp1,$experience,$exp2) AND e.fld_emp_status=1 AND e.fld_delstatus=0 AND tp.fld_status=1 AND tp.fld_job_status=0 And ted.fld_delstatus =0";
            $id = " AND tp.fld_id > ".$_POST['id'];
            $orderby = " ORDER BY tp.fld_id Limit $showLimit";
            $refineprodcuts = $select1 .$exp. " " .$id . $orderby;
            $refineprodcuts11 = mysql_query($refineprodcuts);
            
            
            while ($seek_result = mysql_fetch_array($refineprodcuts11)) {
                $companyid = $seek_result['fld_id'];
                $jobtitle = $seek_result['fld_jobtitle'];
                $name = $seek_result['fld_industype'];
                $location1 = $seek_result['fld_location'];
                $pdate = $seek_result['fld_postdate'];
                $empid = $seek_result['fld_empid'];
                $empname = $seek_result['fld_employer_name'];
                $postdate = date_create($seek_result['fld_postdate']);
                $today = date_format($postdate, "F j, Y");
             ?>
            
                        <div class="job-box" >
                            <div class="col-md-2 col-sm-2 col-xs-12 hidden-xs hidden-sm">
                                <div class="comp-logo">   
                                    <?php
                                    $test = $seek_result['fld_logo'];
                                    ?>
                                    <img src="<?php echo $test; ?>" class="img-responsive" alt="<?php echo $empname; ?>">

                                </div>
                            </div>
                            <div class="col-md-4 col-sm-4 col-xs-12 nopadding">

                                <div class="job-title-box">                                    
                                    <?php
                                    echo $jobtitle;
                                    ?> <br><br>
                                    - &nbsp; <?php
                                    echo $location1;
                                    ?>
                                </div>
                            </div>

                            <div class="col-md-4 col-sm-4 col-xs-6">
                                <a href="#">
                                    <div class="job-type jt-remote-color">
                                        <i class="fa fa-clock-o"></i> <?php
                                    echo $seek_result['fld_job_type'];
                                    ?>
                                        <br/>
                                        <i class="fa fa-user" aria-hidden="true"></i>
                                    <?php
                                    $exper = explode(",", $seek_result['fld_experience']);
                                    $firstexper = $exper[0];
                                    $secondexper = $exper[1];

                                    if ($secondexper == '1') {
                                        $yearname = "Year";
                                    } else {
                                        $yearname = "Years";
                                    }

                                    echo $firstexper . "-" . $secondexper . " " . $yearname;
                                    ?>

                                    </div>
                                </a>
                            </div>
                            <div class="col-md-2 col-sm-2 col-xs-12 nopadding">
                                <a href="singlejob.php?jid=<?php
                                        echo $seek_result['fld_id'];
                                        ?>"><input type="button" class="btn btn-default btn-search-submit" value="Apply Now"/></a>

                            </div>
                        </div>  
                <?php } ?>
</div>
                <?php if($allRows > $showLimit){ ?>
                        <div class="col-md-12 col-sm-12 col-xs-12">
                            <div class="load-more-btn load_more_main" id="load_more_main<?php echo $companyid; ?>">
                                <button id="<?php echo $companyid; ?>" data-searchby="<?php echo $final; ?>" data-city="<?php echo $city; ?>" data-skill="<?php echo $skill; ?>" data-experience="<?php echo $experience; ?>" class="btn-default load_more"> Load More <i class="fa fa-refresh"></i> </button>
                            </div>
                        </div>
                <?php } ?>  
            <?php 
                } 
            
            ?>
        
        
    <?php } break; } ?>