<?php
error_reporting(0);
include "admin_session.php";

//$id = $_REQUEST['activate'];
//echo $id;

$pagin_query = mysql_query("select count(*) as total  from  tbl_employer_details");
$pagin_row = mysql_fetch_array($pagin_query);
$total = $pagin_row['total'];
$dis = 50;
$total_page = ceil($total / $dis);
$page_cur = (isset($_GET['page'])) ? $_GET['page'] : 1;
$k = ($page_cur - 1) * $dis;
?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title>Employer Management | StaffingSpot</title>
        <meta content='width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no' name='viewport'>
        <link href="css/bootstrap.min.css" rel="stylesheet" type="text/css" />
        <link href="//cdnjs.cloudflare.com/ajax/libs/font-awesome/4.1.0/css/font-awesome.min.css" rel="stylesheet" type="text/css" />
        <!-- Ionicons -->
        <link href="//code.ionicframework.com/ionicons/1.5.2/css/ionicons.min.css" rel="stylesheet" type="text/css" />
        <!-- Theme style -->
        <link href="css/AdminLTE.css" rel="stylesheet" type="text/css" />

        <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
        <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
        <!--[if lt IE 9]>
          <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
          <script src="https://oss.maxcdn.com/libs/respond.js/1.3.0/respond.min.js"></script>
        <![endif]-->
        
        <!--<link href="css/styles_basic.css" rel="stylesheet" >-->
    <!--<link href="css/bootstrap.css" rel="stylesheet" >-->
    <!--<link href="css/dataTables.bootstrap.css" rel="stylesheet" >-->
<!--
-->	<script type="text/javascript" src="js/jquery.min.js"></script>
    <script type="text/javascript" src="js/bootstrap.min.js"></script>
        
    </head>
    <body class="skin-blue">
        <!-- header logo: style can be found in header.less -->
        <?php
        include "includes/header.php";
        ?>

        <div class="wrapper row-offcanvas row-offcanvas-left">
            <!-- Left side column. contains the logo and sidebar -->
            <?php
            include "includes/side_menu.php";
            ?>

            <!-- Right side column. Contains the navbar and content of the page -->
            <aside class="right-side">
                <!-- Content Header (Page header) -->
                <section class="content-header">
                    <h1>
                        Employer Management
<!--                        <small>it all starts here</small>-->
                    </h1>
                    <ol class="breadcrumb">
                        <li><a href="admin_home.php"><i class="fa fa-dashboard"></i> Home</a></li><li class="active">Employer Management</li>
                    </ol>
                </section>

                <!-- Main content -->
                <section class="content">

                    <div class="panel panel-default">
                        <div class="panel-heading">
                            <h3 class="panel-title">Employer Management</h3>
                        </div>
                        <div class="panel-body">
                            <div class="table-responsive">
                                <table id="example" class="table table-striped table-bordered" style="text-align:center" width="100%" height="auto"  cellpadding="0" cellspacing="0">
                                    <tr>
                                        <th width="10%">SI NO</th>
                                        <th >EMPLOYER ID</th>
                                        <th>EMPLOYER NAME</th>
<!--                                        <th colspan="1">
                                            EMPLOYER STATUS
                                        </th>-->
                                        <th>STATUS</th>
                                        <th>DELETE</th>
                                        <th>ACTION</th>
                                    </tr>

                                    <!--<tr>-->
                                        <!--<th width="10%" colspan="3"></th>-->
                                        <!--<th class="info text-center"><i>Date Expiry Status</i></th>-->
                                        <!--<th class="info text-center"><i>Password Status</i></th>-->
                                        <!--<th colspan="2"></th>-->
                                    <!--</tr>-->
                                    <?php
                                    $sql = mysql_query("select * from tbl_employer te join tbl_employer_details ted on (te.fld_id = ted.fld_empid) WHERE te.fld_delstatus!=2 order by ted.fld_id limit $k,$dis");
                                    //echo "select * from tbl_employer_details WHERE (fld_delstatus='1'  OR fld_delstatus= '0') order by fld_id limit $k,$dis";
                                    $count = mysql_num_rows($sql);
                                    $a = 0;
                                    while ($fetch_array = mysql_fetch_array($sql)) {
                                        $a++;

                                        $id = $fetch_array['fld_id'];
                                        $user_type = $fetch_array['fld_empid'];
                                        $array_category = $fetch_array['fld_employer_name'];
                                        $array_dor = $fetch_array['fld_dor'];
                                        $array_atatus = $fetch_array['fld_delstatus'];
                                        $pass_lock = $fetch_array['fld_pass_time'];
                                        ?>

                                        <tr id="<?php
                                    echo $id;
                                    ?>" >

                                            <td ><?php echo $a;?></td>
                                    
                                    
                                           
                                            <td><?php echo 'EMP-'.$user_type; ?></td>
                                            
                                            
                                            <td ><?php
                                                    echo $array_category;
                                                    ?></td>
                                                <?php
                                                $status_query = mysql_query("select * from tbl_employer where fld_id='" . $user_type . "'");
                                                $expiry_count = mysql_num_rows($expiry_query);
                                                $emp_status = mysql_fetch_array($status_query);
                                                if ($expiry_count > 0) {
                                                    ?>
                                                <!--<td ><font class="text-info">Account Expired</font></td>-->

                                                <?php
                                            } else {
                                                ?>
                                                <!--<td ><font class="text-info">Active</font></td>-->
                                                <?php
                                            }
//                                            if (($pass_lock > 3) && ($array_atatus == 0)) {
                                                ?>

                                                <!--<td ><font class="text-info">Account Locked</font></td>-->
        <?php
//    } else {
        ?>
                                                <!--<td ><font class="text-info">Active</font></td>-->
                                                <?php // }?>
                                            <td><i data-id="<?php echo $emp_status['fld_id'];?>" attr="<?php echo $id; ?>" class="status_checks btn
                                                   <?php
                                                   echo ($emp_status['fld_emp_status']) ? 'btn-success' : 'btn-danger';
                                                   ?>"><?php
                                                   echo ($emp_status['fld_emp_status']) ? 'Active' : 'Inactive';
                                                   ?>
                                                </i></td>

                                            <td class="edit_td"><a href="#" id="<?php
                                               echo $emp_status['fld_id'];
                                               ?>"   attr="<?php
                                               echo $id;
                                                   ?>" class="edit_trr"><i class="btn btn-danger">DELETE</i></a></td>
                                            <td class="edit_tdedit">
                                                <a href="edit_detail.php?id=<?php echo $id; ?>" id="<?php echo $id; ?>"   attr="<?php echo $id;?>" class="edit_tdedit"><i class="btn btn-info">EDIT</i></a>
                                            <a data-toggle="modal" data-target="#myModal" class="view_details" data-id="<?php echo $id; ?>" href=""><i class="btn btn-info">VIEW</i></a>
                                            </td>
                                        </tr>

                                            <?php
                                            }
                                            ?>

                                </table>
                            </div>
<?php
if ($total > $dis) {
    ?>
                                <ul class="pagination" style="font-weight:bolder;">

                                <?php
                                if ($page_cur > 1) {
                                    ?>

                                        <li class="disabled" ><a href="emp_manage.php?page=<?php
                                        echo ($page_cur - 1);
                                        ?>">Prev</a></li>
                                            <?php
                                        } else {
                                            ?>
                                        <li class="active"><a>Prev</a></li>
                                            <?php
                                        }
                                        for ($i = 1; $i <= $total_page; $i++) {

                                            if ($page_cur == $i) {
                                                ?>
                                            <li class="active"><a><?php
                                            echo $i;
                                            ?></a></li>

                                                    <?php
                                                } else {
                                                    ?>
                                            <li class="disabled" ><a href="emp_manage.php?page=<?php
                                            echo $i;
                                            ?>"><?php
                                echo $i;
                                            ?></a></li>

                                                                         <?php
                                                }
                                            }
                                            if ($page_cur < $total_page) {
                                                ?>

                                        <li class="disabled" ><a href="emp_manage.php?page=<?php
                                        echo ($page_cur + 1);
                                        ?>">Next >></a></li>
                                            <?php
                                        } else {
                                            ?>

                                        <li class="active" ><a>Next >></a></li>
                                            <?php
                                        }
                                        ?>


                                </ul>
    <?php
}
?>
                            <div id="myModal" class="modal fade">
                                <div class="modal-dialog">
                                    <div class="modal-content">
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                </section><!-- /.content -->
            </aside><!-- /.right-side -->
        </div><!-- ./wrapper -->
        
        <!-- AdminLTE App -->
        <script src="js/AdminLTE/app.js" type="text/javascript"></script>
        <!-- AdminLTE for demo purposes -->
        <script src="js/AdminLTE/demo.js" type="text/javascript"></script>
        
        <script type="text/javascript">
            $(document).on('click', '.status_checks', function () {
//                var re = $(this).attr('attr');
                var re = $(this).attr('data-id');

                var status = ($(this).hasClass("btn-success")) ? '0' : '1';
                var msg = (status == '0') ? 'Deactivate' : 'Activate';
                //var re=$(this).attr('attr');
                //alert(re);
                if (confirm("Are you sure to " + msg)) {
        //        var current_element = $(this);
        //        var url = "ajaxdel.php?op=status";

                    $.ajax({
                        type: "POST",
                        url: "ajaxdel.php?op=statusemployer",
                        data: {id: re, status: status},
                        success: function (data)
                        {
//                            alert(data);
                            if(data == 'ok'){
                                location.reload();
                            }
                            

                        }
                    });
                }
            });
        </script>


        <!--Delete Script 
            Added by Abbishek-->


        <script type="text/javascript">
            $(document).ready(function ()
            {
                $(function () {
                    $(".edit_trr").click(function () {
                        //alert("del");

                        var id = $(this).attr("id");
                        var dataString = 'id=' + id;
                        var parent = $(this).parent().parent();
                        if (confirm('Are You Sure To Delete?')) {
                            $.ajax({
                                type: "POST",
                                url: "ajaxdel.php?op=deleteemployer",
                                data: dataString,
                                cache: false,
                                beforeSend: function () {
                                    $('.modal-backdrop').removeClass('hidden');
                                    $('.modal-backdrop').addClass('show');
                                },
                                success: function ()
                                {
                                    //alert(data);
                                    //location.reload();

                                    $(".table-responsive").load(window.location + ".table-responsive");
                                    $('.modal-backdrop').removeClass('show');
                                    $('.modal-backdrop').addClass('hidden');
                                    if (id % 2)
                                    {
                                        alert('Employee Deleted Successfully');
                                        parent.fadeOut('slow', function () {
                                            $(this).remove();
                                        });
                                    } else
                                    {
                                        alert('Employee Deleted Successfully');
                                        parent.slideUp('slow', function () {
                                            $(this).remove();
                                        });
                                    }
                                }

                            });
                        }
                        return false;
                    });
                });
            });
            
            
            
            $('.view_details').click(function(){
                var id = $(this).data('id'); 
                $.ajax({
                        type: "POST",
                        url: "view_emp.php?op=emp_details",
                        data: {id: id},
                        success: function (data)
                        {
                            $('.modal-content').html(data);
//                            location.reload();
                        }
                    });
            });
            

        </script>
<!--        <script>
//         $(document).ready(function(){
               
            $(document).on("click", ".edit_tdedit", function () {
                 //alert("first");
            var myBookId = $(this).attr('attr');
            alert(myBookId);     
            //$('#sss').modal('show');
            $.ajax({
                type:"POST",
                url:"view_detail.php?op=view",
                data: "getids="+myBookId,                                    
                    success: function()
                    {  
                                  
                        alert(data);
//                        $("#sss").html(data);
//                        $('#sss').modal('show');                                                              
                    }
                 });     
            });
//            });

        </script>-->
    </body>
</html>