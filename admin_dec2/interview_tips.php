<?php error_reporting(0);
include "admin_session.php"; 

if(isset($_POST['submit'])) {

         $title = $_POST['title'];
	 $descrip = $_POST['test'];
         $status = $_POST['status'];
         $delstatus = 1;
	 
	 if($title == "")
	 $err_title = "This field is required";
	 
	 if($descrip == "")
	 $err_descrip = "This field is required";
     


    $error .= $err_title.$err_descrip;
	
	$validation_check = "";
	if(isset($error))
	$validation_check .= $error; 

	if(!$validation_check){
	$query = "insert into tbl_interview_tips(fld_interview_title,fld_interview_description,fld_interview_status,fld_delstatus)values('".$title."','".$descrip."','".$status."',1)";
        $sql_query = mysql_query($query);
       
//        exit;
	}
	if($sql_query) {
	?>
	<script>
	alert("Saved Successfully");
	window.location ="interview_tips.php";
	</script>
<?php
	}
}
?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title>Interview Tips Title| StaffingSpot</title>
        <meta content='width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no' name='viewport'>
        <link href="css/bootstrap.min.css" rel="stylesheet" type="text/css" />
        <link href="//cdnjs.cloudflare.com/ajax/libs/font-awesome/4.1.0/css/font-awesome.min.css" rel="stylesheet" type="text/css" />
        <!-- Ionicons -->
        <link href="//code.ionicframework.com/ionicons/1.5.2/css/ionicons.min.css" rel="stylesheet" type="text/css" />
        <!-- Theme style -->
        <link href="css/AdminLTE.css" rel="stylesheet" type="text/css" />
         <!--<link href="css/bootstrap-wysihtml5/bootstrap3-wysihtml5.min.css" rel="stylesheet" type="text/css" />-->
      

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
                       Front Page Management
<!--                        <small>it all starts here</small>-->
                    </h1>
                    <ol class="breadcrumb">
                        <li><a href="admin_home.php"><i class="fa fa-dashboard"></i> Home</a></li>  
                        <li class="active"> Front Page Management</li><li class="active">Interview Tips</li>
                    </ol>
                </section>

                <!-- Main content -->
                <section class="content">
					
                    <div class="panel panel-default">
<div class="panel-heading"><h3 class="panel-title">Interview Tips</h3></div>
<div class="panel-body">
<form class="form_top_space" action="" method="post" enctype="multipart/form-data" role="form">
    <div class="col-md-12 col-sm-12 col-xs-12">
        <div class="form-group">
            <label class="control-label">Interview Tips Title *</label>
            <input type="text" class="form-control" name="title" placeholder="Enter the title Title">
            <span class="err_txt help-block"><?php echo $err_title; ?></span>
        </div>
    </div>    
    <div class="col-md-12 col-sm-12 col-xs-12">
        <div class="form-group">
            <label class="control-label">Interview tips Description<span class="required">*</span></label>
            <textarea id="test" name="test" class="ckeditor" ></textarea>
            <span class="err_txt help-block"><?php echo $err_descrip; ?></span>
        </div>
    </div>

    

  <div class="col-md-12 col-sm-12 col-xs-12">  
    <div class="form-group">
        <label>Status <span class="required">*</span></label>
            <select  id="status" name="status" class="form-control">
                <option value="1" 
                <?php
                if (isset($_POST['status']) && $_POST['status'] != '' && $_POST['status'] == 1) {
                    ?> selected="selected"
                            <?php
                        }
                        ?>>Active
                </option>
                <option value="0" 
                <?php
                if (isset($_POST['status']) && $_POST['status'] != '' && $_POST['status'] == 1) {
                    ?> selected="selected"
                            <?php
                        }
                        ?>>InActive
                </option>
            </select>

        </div>
</div>
   
    <div class="col-md-12 col-sm-12 col-xs-12">
        <input type="submit" name="submit" class="btn btn-success"  value="Save"/>
        <input type="reset" id="reset" class="btn btn-warning" value="Reset" />
       
    </div>
</form>


<div class="col-md-12" style="margin-top:45px;">
<div class="table-responsive" style="margin-top:45px;"  >
<table  class="table table-striped table-bordered">
   
<th class="text-center info">S NO</th>
<th class="text-center info">INTERVIEW TIPS TITLE</th>
<th class="text-center info">INTERVIEW TIPS DESCRIPTION</th>
<th class="text-center info">STATUS</th>
<th class="text-center info">OPTION</th>

<?php
$pagin_query = mysql_query("select count(*) as total  from tbl_interview_tips where fld_delstatus!=2 ");
                                    $pagin_row = mysql_fetch_array($pagin_query);
                                    $total = $pagin_row['total'];
                                    $dis = 5;
                                    $total_page = ceil($total / $dis);
                                    $page_cur = (isset($_GET['page'])) ? $_GET['page'] : 1;
                                    $k = ($page_cur - 1) * $dis;
?>



<?php $interview_query = mysql_query("select * from tbl_interview_tips where fld_delstatus!=2 order by fld_id limit $k,$dis"); 
//echo "select * from admin_slider where fromdate ='0000-00-00";
$a=$k+1;
while($interview_fetch = mysql_fetch_array($interview_query)) {
$view_id = $interview_fetch['fld_id'];
$view_title = $interview_fetch['fld_interview_title'];
$view_descrip = $interview_fetch['fld_interview_description'];
$view_status = $interview_fetch['fld_interview_status'];

//$view_image = "http://localhost/staffingspot/admin/".$resume_fetch['image'];
//$view_active = $resume_fetch['active'];


?>
<tr class="text-center">
<td><?php echo $a; ?></td>
<td><?php echo $view_title; ?></td>
<td class="detail"><?php echo $view_descrip; ?></td>
<!--<td><img src="<?php //echo $view_image; ?>" width="50px" height="50px" /></td>-->
<td class="  ">
<?php
if ($view_status == 1) {
    ?>
   Active

    <?php
} else {
    ?> 
    InActive

    <?php
}
?>
</td>
<td class="edit_tdedit">
<a href="edit_interview_tips.php?interview_id=<?php echo $view_id; ?>" attr="<?php echo $view_id;?>" class="edit_tdedit"><i class="btn btn-info">Edit</i></a>

<a data-toggle="modal" data-target="#myModal" class="view_details_interview" data-id="<?php echo $view_id;?>" href=""><i class="btn btn-info">View</i></a>

<a href="#" id='<?php echo $view_id;?>' class="edit_trr_interview"><i class="btn btn-danger">Delete</i></a>
 <!--<a href="#" id="<?php echo $id;?>" attr="<?php echo $id; ?>" class="edit_trr"><i class="btn btn-danger">DELETE</i></a>-->
</td>
<?php $a++;
}?>

</table>
</div>

       <?php if ($total > $dis) { ?>
<nav>
                                <ul  class="pager">

                                    <?php if ($page_cur > 1) { ?>

                                    <li class="previous"><a class="empl" id="emppage1" href="interview_tips.php?page=<?php echo ($page_cur - 1); ?>"><span aria-hidden="true">&larr;</span>Prev</a></li>
                                    <?php } else { ?>
                                        <li class="active"><a class="pull-left">Prev</a></li>
                                    <?php
                                    } 
//                             
                                    if ($page_cur < $total_page) {
                                        ?>

                                        <li class="next"><a class="empr" id="emppage2" href="interview_tips.php?page=<?php echo ($page_cur + 1); ?>">Next<span aria-hidden="true">&rarr;</span></a></li>
                                    <?php } else { ?>

                                        <li class="active" ><a class="pull-right">Next</a></li>
    <?php } ?>


                                </ul>
    </nav>
<?php } ?>
    
    
    
</div>
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

        <script src="//ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
        <script src="js/bootstrap.min.js" type="text/javascript"></script>
        <!-- AdminLTE App -->
        <script src="js/AdminLTE/app.js" type="text/javascript"></script>
        <!-- AdminLTE for demo purposes -->
        <script src="js/AdminLTE/demo.js" type="text/javascript"></script>

	<script src="js/plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.all.min.js" type="text/javascript"></script>
	<script type="text/javascript" src="js/bootstrap.file-input.js"></script>
	
	<script src="//cdn.ckeditor.com/4.5.5/standard/ckeditor.js"></script>      
<script>
    $("#reset").click(function() {
	$(this).closest('form').find("input[type=text], textarea").val('');
	$(this).closest('form').find("input[type=text], select").val('');
	CKEDITOR.instances['test'].setData('');
});
</script>
<script>
            $(document).ready(function() {
        $('.view_details_interview').click(function(){
                var id = $(this).data('id'); 
//                alert (id);
                $.ajax({
                        type: "POST",
                        url: "view_emp.php?op=interview_details",
                        data: {id: id},
                        
                        success: function (data)
                        {
//                             alert (data);
                            $('.modal-content').html(data);
//                            location.reload();
                        }
                    });
            });
            });
        
        
</script>
        <!-- Script for delete -->
        
        <script type="text/javascript">
           
            $(document).ready(function ()
            {
                $(function () {
                    $(".edit_trr_interview").click(function () {
                        //alert("del");

                        var id = $(this).attr("id");
//                        alert (id);
                        var dataString = 'id=' + id;
//                         alert (id);
                        var parent = $(this).parent().parent();
                        if (confirm('Are you sure,you want to Delete?')) {
                            $.ajax({
                                type: "POST",
                                url: "ajaxdel.php?op=deleteinterview",
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
                                }

                            });
                        }
                        return false;
                    });
                });
            });
            
           

        </script>
        <script>

    $(document).ready(function () {

	$('input[type=file]').bootstrapFileInput();
	$('.file-inputs').bootstrapFileInput();

    });
	</script>
         <style>
        .err_txt{
            color: red;
        }
        </style>  
        <script>
$(document).ready(function() {
    setTimeout('$(".err_txt").fadeOut()',2500);
  });
</script>
    </body>
</html>
