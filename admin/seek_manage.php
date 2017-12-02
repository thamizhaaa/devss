<?php
error_reporting(0);
include "admin_session.php";

//$pagin_query = mysql_query("select count(*) as total  from  tbl_jobseeker");
$pagin_query = mysql_query("SELECT count(*) as total FROM `tbl_jobseeker` WHERE (`fld_js_status`=1 OR `fld_js_status`=0) AND fld_delstatus=0");
$pagin_row = mysql_fetch_array($pagin_query);
$total = $pagin_row['total'];
$dis =10;
$total_page = ceil($total / $dis);
$page_cur = (isset($_GET['page'])) ? $_GET['page'] : 1;
$k = ($page_cur - 1) * $dis;
?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title>Job Seeker Management | StaffingSpot</title>
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
    </head>
    <body class="skin-blue">
        <!-- header logo: style can be found in header.less -->
        <?php include "includes/header.php"; ?>

        <div class="wrapper row-offcanvas row-offcanvas-left">
            <!-- Left side column. contains the logo and sidebar -->
            <?php include "includes/side_menu.php"; ?>

            <!-- Right side column. Contains the navbar and content of the page -->
            <aside class="right-side">
                <!-- Content Header (Page header) -->
                <section class="content-header">
                    <h1>
                        Job Seeker Management
                        <!--<small>it all starts here</small>-->
                    </h1>
                    <ol class="breadcrumb">
                        <li><a href="admin_home.php"><i class="fa fa-dashboard"></i> Home</a></li><li class="active">Job Seeker Management</li>
                    </ol>
                </section>

                <!-- Main content -->
                <section class="content">
                    <div class="modal-backdrop hidden" style="opacity:0.2" >
                        <img src="img/ajax-loader1.gif" width="100" height="100" id="img_<?php echo $id; ?>" style="position:absolute;top:50%;left:50%;z-index:999999;" >			
                    </div>
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            <h3 class="panel-title">Job Seeker Management</h3>
                        </div>
                        <div class="panel-body">
                            <div class="table-responsive table-auto">
                                <table class="table table-bordered table-hover " style="text-align:center" align="center" width="100%" height="auto" border="1px" cellpadding="0" cellspacing="0">
                                    <th width="10%">SI NO</th><th>SEEKER ID</th><th>SEEKER NAME</th><th>EMAIL ID</th><th>DATE OF REGISTRATION</th><th>STATUS</th><th>DELETE</th><th>ACTION</th>
                                    <?php
//                                    $sql = mysql_query("select * from tbl_seeker_personal WHERE (fld_status='1' OR fld_status= '0') order by fld_id limit $k,$dis");
                                    $sql = mysql_query("SELECT * FROM `tbl_jobseeker` WHERE (`fld_js_status`=1 OR `fld_js_status`=0) AND fld_delstatus=0 order by fld_id limit $k,$dis");
                                    $a = $k+1;
                                    $count=  mysql_num_rows($sql);
                                    if($count > 0){
                                    while ($fetch_array = mysql_fetch_array($sql)) {
                                        

                                        $id = $fetch_array['fld_id'];
//                                        $user_type = $fetch_array['fld_seekerid'];
                                        $array_name = $fetch_array['fld_name'];
                                        $array_mailid = $fetch_array['fld_email'];
                                        //$array_reg = $fetch_array['fld_registered_date'];
                                        $array_status = $fetch_array['fld_js_status'];
                                        $timestamp = strtotime($fetch_array['fld_registered_date']);
                                        $array_reg = date('d-m-Y H:i:s', $timestamp);
                                        ?>

                                        <tr id="<?php echo $id; ?>" >

                                            <td ><?php echo $a; ?></td>
                                            <td ><?php echo 'SEEKER-'.$id; ?></td>
                                            <td ><?php echo $array_name; ?> </td>
                                            <td><?php echo $array_mailid; ?></td>
                                            <td ><?php echo $array_reg; ?></td>
                                            <td><i data="<?php echo $fetch_array['fld_id']; ?>"  attr="<?php echo $id; ?>"  class="status_checks btn
    <?php echo ($array_status) ?
            'btn-success' : 'btn-danger'
    ?>"><?php echo ($array_status) ? 'Active' : 'Inactive' ?>
                                                </i></td>

                                            <td class="edit_td"><a href="#" id="<?php echo $id; ?>" attr="<?php echo $id; ?>"  class="edit_trr"><i class="btn btn-danger">DELETE</i></a></td>
                                            <td class="edit_td">
                                                <a href="edit_detail_seek.php?id=<?php echo $id; ?>" id="<?php echo $id; ?>"   attr="<?php echo $id; ?>" class="edit_tdedit"><i class="btn btn-info seek-btn">EDIT</i></a>
                                                <a data-toggle="modal" data-target="#myModal" class="view_seeker_details" data-id="<?php echo $id; ?>" href=""><i class="btn btn-info seek-btn">VIEW</i></a>
                                            </td>
                                            <!--<td class="edit_tdedit"><a href="view_detail_seek.php?id=<?php echo $id; ?>" id="<?php echo $id; ?>"   attr="<?php echo $id; ?>" class="edit_tdedit"><i class="btn btn-info">VIEW</i></a></td>-->
                                        </tr>


                                    <?php $a++;
                                } } else {
                                        echo "<center><h3>No Data Available</h3></center>";
                                    } ?>

                                </table>
                            </div>
                            <?php if ($total > $dis) { ?>
                                <ul class="pagination" style="font-weight:bolder;">

                                    <?php if ($page_cur > 1) { ?>

                                        <li class="disabled" ><a href="seek_manage.php?page=<?php echo ($page_cur - 1); ?>">Prev</a></li>
                                    <?php } else { ?>
                                        <li class="active"><a>Prev</a></li>
                                    <?php
                                    } for ($i = 1; $i <= $total_page; $i++) {

                                        if ($page_cur == $i) {
                                            ?>
                                            <li class="active"><a><?php echo $i; ?></a></li>

                                        <?php } else { ?>
                                            <li class="disabled" ><a href="seek_manage.php?page=<?php echo $i; ?>"><?php echo $i; ?></a></li>

                                        <?php }
                                    }
                                    if ($page_cur < $total_page) {
                                        ?>

                                        <li class="disabled" ><a href="seek_manage.php?page=<?php echo ($page_cur + 1); ?>">Next >></a></li>
                                    <?php } else { ?>

                                        <li class="active" ><a>Next >></a></li>
    <?php } ?>


                                </ul>
<?php } ?>
                            <div id="myModal" class="modal fade">
                                <div class="modal-dialog">
                                    <div class="modal-content">
                                        <!-- Content will be loaded here from "remote.php" file -->
                                    </div>
                                </div>
                            </div>
                        </div>
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

        <script type="text/javascript">
            $(document).on('click', '.status_checks', function () {
                var re = $(this).attr('attr');
                //alert(re);

                var status = ($(this).hasClass("btn-success")) ? '0' : '1';
                var msg = (status == '0') ? 'Deactivate' : 'Activate';
                //var re=$(this).attr('attr');
                //alert(re);
                if (confirm("Are you sure to " + msg)) {
//        var current_element = $(this);
//        var url = "ajaxdel.php?op=status";

                    $.ajax({
                        type: "POST",
                        url: "ajaxdel.php?op=statusseeker",
                        data: {id: re, status: status},
                        success: function ()
                        {
                            //alert(data);
                            alert('Updated Successfully');
                            location.reload();

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
//                        alert(id);
                        var dataString = 'id=' + id;
                        var parent = $(this).parent().parent();
                        if (confirm('Are you sure,you want to delete?')) {
                            $.ajax({
                                type: "POST",
                                url: "ajaxdel.php?op=deleteseeker",
                                data: dataString,
                                cache: false,
                                beforeSend: function () {
                                    $('.modal-backdrop').removeClass('hidden');
                                    $('.modal-backdrop').addClass('show');
                                },
                                success: function ()
                                {
                                    //alert(data);
//                                    location.reload();
                                    $('.modal-backdrop').removeClass('show');
                                    $('.modal-backdrop').addClass('hidden');
                                    if (id % 2)
                                    {
                                        alert('Deleted Successfully');
                                        parent.fadeOut('slow', function () {
                                            $(this).remove();
                                        });
                                    } else
                                    {
                                        alert('Deleted Successfully');
                                        parent.slideUp('slow', function () {
                                            $(this).remove();
                                        });
                                    }
                                    window.location="seek_manage.php";
                                }

                            });
                        }
                        return false;
                    });
                });
            });
            
            $('.view_seeker_details').click(function(){
                var id= $(this).data('id');
                $.ajax({
                    type: "POST",
                    url: "view_emp.php?op=seeker_details",
                    data: {id: id},
                    success: function (data)
                    {
                        $('.modal-content').html(data);
            //                            location.reload();
                    }
                });
            });


        </script>


    </body>
</html>
