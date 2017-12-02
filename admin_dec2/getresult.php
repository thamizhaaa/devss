<?php
	error_reporting(0);
    include "admin_session.php";?>


<table id="example" class="table table-striped table-bordered" style="text-align:center" width="100%" height="auto"  cellpadding="0" cellspacing="0">
<!--                                    <th width="10%">SI NO</th><th >JOB CODE</th><th>EMPLOYER NAME</th><th>JOB TITLE</th><th>POST DATE</th><th>STATUS</th><th>DELETE</th><th>ACTION</th>-->
                                    <th width="10%">SI NO</th><th>SEEKER ID</th><th>VISITORS IP</th><th>CREATED DATE</th>
                                    <?php
                                       $pagin_query_user = mysql_query("select count(*) as total_user  from tbl_unique_visitors_user");
                                        $pagin_row_user = mysql_fetch_array($pagin_query_user);
                                        $total_user = $pagin_row_user['total_user'];
                                        $dis_user = 5;
                                        $total_page_user = ceil($total_user / $dis_user);
                                        $page_cur_user = (isset($_GET['page_user'])) ? $_GET['page_user'] : 1;
                                        $k_user = ($page_cur_user - 1) * $dis_user;
 
                                        

                                    $sql_user = mysql_query("select distinct(fld_userid),fld_visitorsip,fld_created_date from tbl_unique_visitors_user order by fld_id limit $k_user,$dis_user");
                                    $count_user = mysql_num_rows($sql_user);
                                    $a_user= $k_user+1;
                                    while ($fetch_array_user = mysql_fetch_array($sql_user)) {
                                        

                                        $id = $fetch_array_user['fld_id'];
                                        $user_id = $fetch_array_user['fld_userid'];
                                        $user_visitor = $fetch_array_user['fld_visitorsip'];
                                        //echo $array_category;
                                        $user_date = $fetch_array_user['fld_created_date'];
                                        
                                        //$array_atatus = $fetch_array['fld_status'];
                                        ?>

                                        <tr id_user="<?php echo $id; ?>" >

                                            <td ><?php echo $a_user; ?></td>
                                            <td ><?php echo $user_id; ?></td>
                                            <td ><?php echo $user_visitor; ?></td>
                                            <td ><?php echo $user_date; ?></td>
                                            
                                        

                                    <?php 
                                    $a_user++;
                                    } ?>
                                </table>

