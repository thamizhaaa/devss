<?php
	error_reporting(0);
    include "admin_session.php";
    
    
    
    
    
    
    
    
    
$pagin_query_user = mysql_query("select count(*) as total_user  from  tbl_unique_visitors_user"); //select count(*) as total  from tbl_unique_visitors_emp 
$pagin_row_user = mysql_fetch_array($pagin_query_user);
$total_user = $pagin_row_user['total_user'];
$dis_user = 10;
$total_page_user = ceil($total_user / $dis_user);
$page_cur_user = (isset($_GET['page_user'])) ? $_GET['page_user'] : 1;
$k_user = ($page_cur_user - 1) * $dis_user;

    
    
    ?>
<!--<table id="example" class="table table-striped table-bordered" style="text-align:center" width="100%" height="auto"  cellpadding="0" cellspacing="0">
                                    <th width="10%">SI NO</th><th >JOB CODE</th><th>EMPLOYER NAME</th><th>JOB TITLE</th><th>POST DATE</th><th>STATUS</th><th>DELETE</th><th>ACTION</th>
                                    <th width="10%">SI NO</th><th>EMPLOYER ID</th><th>VISITORS IP</th><th>CREATED DATE</th>

<?php
//  order by fld_id limit $k,$dis

  echo $k.'robert'.$dis;

                                    $sql = mysql_query("select distinct(fld_userid),fld_visitorsip,fld_created_date from tbl_unique_visitors_emp order by fld_id limit $k,$dis");
                                    $count = mysql_num_rows($sql);
                                    $a = $k+1;
                                    while ($fetch_array = mysql_fetch_array($sql)) {
                                        

                                        $id = $fetch_array['fld_id'];
                                        $user_type = $fetch_array['fld_userid'];
                                        $array_category = $fetch_array['fld_visitorsip'];
                                        //echo $array_category;
                                        $array_dor = $fetch_array['fld_created_date'];
                                        
                                        //$array_atatus = $fetch_array['fld_status'];
                                        ?>

                                        <tr id="<?php echo $id; ?>" >

                                            <td ><?php echo $a; ?></td>
                                            <td ><?php echo $user_type; ?></td>
                                            <td ><?php echo $array_category; ?></td>
                                            <td ><?php echo $array_dor; ?></td>
                                        </tr> 

                                    <?php 
                                    $a++;
                                    } ?>
  </table>-->

 <div id="pagination_user" >
<table id="example" class="table table-striped table-bordered" style="text-align:center" width="100%" height="auto"  cellpadding="0" cellspacing="0">
                                   
                                    <th width="10%">SI NO</th><th>EMPLOYER ID</th><th>VISITORS IP</th><th>CREATED DATE</th>

<?php
//  order by fld_id limit $k,$dis

  //echo $k.'robert'.$dis;

                                    $sql_user = mysql_query("select distinct(fld_userid),fld_visitorsip,fld_created_date from tbl_unique_visitors_user order by fld_id limit $k_user,$dis_user");
                                    $count = mysql_num_rows($sql_user);
                                    $a = $k_user+1;
                                    while ($fetch_array = mysql_fetch_array($sql_user)) {
                                        

                                        $id = $fetch_array['fld_id'];
                                        $user_type = $fetch_array['fld_userid'];
                                        $array_category = $fetch_array['fld_visitorsip'];
                                        //echo $array_category;
                                        $array_dor = $fetch_array['fld_created_date'];
                                        
                                        //$array_atatus = $fetch_array['fld_status'];
                                        ?>

                                        <tr id="<?php echo $id; ?>" >

                                            <td ><?php echo $a; ?></td>
                                            <td ><?php echo $user_type; ?></td>
                                            <td ><?php echo $array_category; ?></td>
                                            <td ><?php echo $array_dor; ?></td>
                                        </tr> 

                                    <?php 
                                    $a++;
                                    } ?>
  </table>
 </div>
