<?php
error_reporting(0);
include "admin_session.php";
 
$oper = $_REQUEST['op'];

if(isset($_POST['submit'])) {

	$title = $_POST['title'];
	$descrip = $_POST['descrip'];
	$fromdate = $_POST['fromdate'];
	$todate = $_POST['todate'];
	$status = $_POST['status'];
   
//	$sourcePath = $_FILES['banner_img']['tmp_name'];
////	echo $sourcePath;
//	$targetPath = "banner/" . $_FILES['banner_img']['name'];
//	move_uploaded_file($sourcePath, $targetPath); 
	
	$image = $_FILES["banner_img"]["name"];	
	$uploadedfile = $_FILES['banner_img']['tmp_name'];
	error_reporting(0);
	$change="";	
	define ("MAX_SIZE","400");
	function getExtension($str)
	{
		$i = strrpos($str,".");
		if (!$i) { return ""; }
		$l = strlen($str) - $i;
		$ext = substr($str,$i+1,$l);
		return $ext;
	}	
	$errors=0;	
	if($image)
	{
           
		$filename = stripslashes($_FILES['banner_img']['name']);
		$extension = getExtension($filename);
		$extension = strtolower($extension);
	
		if (($extension != "jpg") && ($extension != "jpeg") && ($extension != "png") && ($extension != "gif"))
		{
			$change='<div class="msgdiv">Unknown Image extension </div> ';
			$errors=1;
		}
		else
		{
			$size=filesize($_FILES['banner_img']['tmp_name']);
	
			if ($size > MAX_SIZE*50000)
			{
				$change='<div class="msgdiv">You have exceeded the size limit!</div> ';
				$errors=1;
			}
	
			if($extension=="jpg" || $extension=="jpeg" )
			{
				$uploadedfile = $_FILES['banner_img']['tmp_name'];
				$src = imagecreatefromjpeg($uploadedfile);
	
			}
			else if($extension=="png")
			{
				$uploadedfile = $_FILES['banner_img']['tmp_name'];
				$src = imagecreatefrompng($uploadedfile);
	
			}
			else
			{
				$src = imagecreatefromgif($uploadedfile);
			}
			
			list($width,$height)=getimagesize($uploadedfile);	
			$newwidth=1903;
			$newheight=630;			
			$tmp=imagecreatetruecolor($newwidth,$newheight);	
			imagecopyresampled($tmp,$src,0,0,0,0,$newwidth,$newheight,$width,$height);	
			$filename = "banner/". $_FILES['banner_img']['name'];
			imagejpeg($tmp,$filename,100);
			
			$query = mysql_query("insert into tbl_slider(fld_title,fld_description,fld_image,fld_fromdate,fld_todate,fld_active)values('".$title."','".$descrip."','".$filename."','".$fromdate."','".$todate."','".$status."')");
	
	if($query) {
?>
<script>
	alert("Scheduled Banner Created Successfully");
	window.location ="scheduled_banner.php";
</script>
<?php
}
			
			
			imagedestroy($src);
			imagedestroy($tmp);
			
		}
	}
	
	
	
}

if (isset($_POST['save'])) {
    
    $id = $_REQUEST['banner_id'];
    
    
    $title_edit = $_POST['title'];
    $descrip_edit = $_POST['descrip'];
    $status_edit = $_POST['status'];
    $fromdate = $_POST['fromdate'];
    $todate = $_POST['todate'];
	
	$image = $_FILES["banner_img"]["name"];	
	$uploadedfile = $_FILES['banner_img']['tmp_name'];
	error_reporting(0);
	$change="";	
	define ("MAX_SIZE","400");
	function getExtension($str)
	{
		$i = strrpos($str,".");
		if (!$i) { return ""; }
		$l = strlen($str) - $i;
		$ext = substr($str,$i+1,$l);
		return $ext;
	}	
	$errors=0;	
	if($image)
	{
           
		$filename = stripslashes($_FILES['banner_img']['name']);
		$extension = getExtension($filename);
		$extension = strtolower($extension);
	
		if (($extension != "jpg") && ($extension != "jpeg") && ($extension != "png") && ($extension != "gif"))
		{
			$change='<div class="msgdiv">Unknown Image extension </div> ';
			$errors=1;
		}
		else
		{
			$size=filesize($_FILES['banner_img']['tmp_name']);
	
			if ($size > MAX_SIZE*50000)
			{
				$change='<div class="msgdiv">You have exceeded the size limit!</div> ';
				$errors=1;
			}
	
			if($extension=="jpg" || $extension=="jpeg" )
			{
				$uploadedfile = $_FILES['banner_img']['tmp_name'];
				$src = imagecreatefromjpeg($uploadedfile);
	
			}
			else if($extension=="png")
			{
				$uploadedfile = $_FILES['banner_img']['tmp_name'];
				$src = imagecreatefrompng($uploadedfile);
	
			}
			else
			{
				$src = imagecreatefromgif($uploadedfile);
			}
			
			list($width,$height)=getimagesize($uploadedfile);	
			$newwidth=1903;
			$newheight=630;			
			$tmp=imagecreatetruecolor($newwidth,$newheight);	
			imagecopyresampled($tmp,$src,0,0,0,0,$newwidth,$newheight,$width,$height);	
			$filename = "banner/". $_FILES['banner_img']['name'];
			imagejpeg($tmp,$filename,100);
			
			$query= mysql_query("Update tbl_slider SET fld_title='$title_edit',fld_image='$filename',fld_description='$descrip_edit',fld_active='$status_edit',fld_fromdate='$fromdate',fld_todate='$todate' where fld_id=$id");
			
			
			imagedestroy($src);
			imagedestroy($tmp);
			
		}
	}	 
	else {
	    
			$query= mysql_query("Update tbl_slider SET fld_title='$title_edit',fld_description='$descrip_edit',fld_active='$status_edit',fld_fromdate='$fromdate',fld_todate='$todate' where fld_id=$id");
	    
	}
    
   
	if($query){
    ?>
    <script>
        alert("Banner Updated Successfully");
        window.location = "scheduled_banner.php";</script>
    <?php
	}
}
    
    
?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title>Scheduled Banner | StaffingSpot</title>
        <meta content='width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no' name='viewport'>
        <link href="css/bootstrap.min.css" rel="stylesheet" type="text/css" />
        <link href="//cdnjs.cloudflare.com/ajax/libs/font-awesome/4.1.0/css/font-awesome.min.css" rel="stylesheet" type="text/css" />
        <!-- Ionicons -->
        <link href="//code.ionicframework.com/ionicons/1.5.2/css/ionicons.min.css" rel="stylesheet" type="text/css" />
        <!-- Theme style -->
        <link href="css/AdminLTE.css" rel="stylesheet" type="text/css" />
        <link href="css/bootstrap-datetimepicker.css" type="text/css" rel="stylesheet">
        <style>
	    .error{
		color:red
	    }
	    .editbox
	    {
		display:none;
	    }
	    th 
	    {
		text-align:center;
		padding:1%;
	    }

	    td 
	    {
		text-align:center;
		padding:1%;
	    }
	    .editbox
	    {
		font-size:14px;
		width:340px;
		background-color:#ffffcc;
		border:solid 1px #000;
		padding:1%;
	    }
	    .edit_tr:hover
	    {
		background:url(edit.png) right no-repeat #80C8E5;
		cursor:pointer;
	    }
	</style>


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
                        Master Management
<!--                        <small>it all starts here</small>-->
                    </h1>
                    <ol class="breadcrumb">
                        <li><a href="admin_home.php"><i class="fa fa-dashboard"></i> Home</a></li>  
			<li class="active">Master Management</li><li class="active">Scheduled Banner Master</li>
                    </ol>
                </section>

                <!-- Main content -->
                <section class="content">

                    
			    
			   <?php
if ($oper == 'scheduledbanner_edit') {
    
    $id = $_REQUEST['banner_id'];
    $query = mysql_query("select * from tbl_slider where fld_id='$id'");
    $rows = mysql_fetch_array($query);
    $banner_title = $rows['fld_title'];
    $image = $rows['fld_image'];
    $description = $rows['fld_description'];
    $status = $rows['fld_active'];
    $fromdate = $rows['fld_fromdate'];
    $todate = $rows['fld_todate'];
    ?>
    <div class="panel panel-default">
<div class="panel-heading"><h3 class="panel-title">Edit Scheduled Banner Master</h3></div>
<div class="panel-body">
			<div class="col-md-12 col-sm-12 col-xs-12">     
                        <form  class="form-horizontal" id ="form" method="POST" name="form_scheduled_banner" enctype="multipart/form-data" role="form">
			   
                            
                        <div class="col-md-12 col-sm-12 col-xs-12">
                            <div class="form-group">
                                <label class="col-sm-4 control-label">Scheduled Banner title <span class="required">*</span></label>
                                <div class="col-sm-6">
                                    <input id="title" name="title" placeholder="Enter The Title" class="form-control" type="text" value="<?php echo $banner_title; ?>">
                                </div>
                            </div>
                        </div>
                            
                        <div class="col-md-12 col-sm-12 col-xs-12">
                            <div class="form-group">
                                    <label class="col-sm-4 control-label">Scheduled Banner Description <span class="required">*</span></label>
                                    <div class="col-sm-6">
                                    <textarea id="desc"  name='descrip' class="form-control" placeholder="Enter The description" style="width: 100%; height: 125px; font-size: 14px; line-height: 18px; border: 1px solid #dddddd; padding: 10px;"><?php echo $description; ?></textarea>
                                    </div>
                                    </div>
                            </div>
			    
			    <div class="col-md-12 col-sm-12 col-xs-12">
                            <div class="form-group">
                                <label class="col-sm-4 control-label">From Date <span class="required">*</span></label>
                                <div class='col-sm-6 input-group date' id='datetimepicker9'>
				    <input type='text' class="form-control" name="fromdate" data-date-format="YYYY-MM-DD" placeholder="Start Date *"  readonly="readonly" value="<?php echo $fromdate; ?>">
				    <span class="input-group-addon" style="background-color:#FFB070;"><span class="glyphicon glyphicon-calendar"></span>
				    </span>
				</div>
                            </div>
			    </div>
			    <div class="col-md-12 col-sm-12 col-xs-12">
                            <div class="form-group">
                                <label class="col-sm-4 control-label">To Date <span class="required">*</span></label>
                                <div class='col-sm-6 input-group date' id='datetimepicker10'>
				    <input type='text' class="form-control" name="todate"  placeholder="End Date *" data-date-format="YYYY-MM-DD"  readonly="readonly" value="<?php echo $todate; ?>">
				    <span class="input-group-addon" style="background-color:#FFB070;"><span class="glyphicon glyphicon-calendar"></span>
				    </span>
				</div>
                            </div>
			    </div>
			    
			    
			    
                        <div class="col-md-12 col-sm-12 col-xs-12">
                            <div class="form-group">
                                    <label class="col-sm-4 control-label">Upload Scheduled Banner <span class="required">*</span></label>
				    <div class="edit_filediv col-sm-6">
					    <input type="file" data-filename-placement="inside" onchange="edit_preview_image(this);" name="banner_img">&nbsp;&nbsp;&nbsp;&nbsp;
					    <font color="#FF0000">Only JPG,PNG,JPEG format allowed</font>
					    <span id="edit_err_msg" style="color: red;"></span>
				    </div>
				    <br/><br/><br/>
				    <div id="img_banner_img"></div>
				    <div class ="edit_preview col-md-6" style="margin-left:33.3%">
					<img id="edit_imgdivpreview" src="<?php echo $image; ?>" style="width:250px;height:200px!important;"><br/><br/>
					<input name="old_image" value="<?php echo $image; ?>" hidden/>
				    </div> 
                            </div>
                        </div>
                        
			    
			    
			<div class="col-md-12 col-sm-12 col-xs-12">
                            <div class="form-group">
                                <label class="col-sm-4 control-label">Scheduled Banner Status<span class="required">*</span></label>
                                <div class="col-sm-6">
                                    
                                    <select id="status" name="status" class="form-control">
                                    <option value="1" 
                                    <?php
                                    if (isset($_POST['status']) && $_POST['status']!='' && $_POST['status'] == 1) {
                                        ?> selected="selected"
                                                <?php
                                            } elseif ($status == 1) {
                                                ?> selected="selected"
                                                <?php
                                            }
                                            ?>>Active
                                    </option>
                                    <option value="2" 
                                    <?php
                                    if (isset($_POST['status']) && $_POST['status']!='' && $_POST['status'] == 1) {
                                        ?> selected="selected"
                                                <?php
                                            } elseif ($status == 2) {
                                                ?> selected="selected"
                                                <?php
                                            }
                                            ?>>InActive
                                    </option>
                                </select>
                                </div>
                            </div>
                        </div>
			
			    <div class="col-md-12 col-sm-12 col-xs-12">
                        <div class="modal-footer">
                            <input type="submit" name="save" class="btn btn-success" value="Save"/>
                            <input type="reset" class="btn btn-warning" id="reset_edit" value="Reset" />
                            <input class="btn btn-warning" Type="button" VALUE="Back" onClick="location.href = 'scheduled_banner.php'">
                            <!--<input type="button" onClick="location.href='scheduled_banner.php'" class="btn btn-warning" value="Back" />-->
                       </div> 
                   
			    </div>
			    </form>
                </div>
</div>
			</div>
<?php } else {    ?>
			   <div class="panel panel-default">
			<div class="panel-heading"><h3 class="panel-title">Scheduled Banner Master</h3></div>
			<div class="panel-body">
			    
			    <form class="form_top_space" id="reset_form" action="" method="post" name="form_scheduled_banner" enctype="multipart/form-data" role="form">
				<div class="form-group">
				    <label >Image Title *</label>
				    <input type="text" class="form-control" name="title" placeholder="Image Title">
				    <!--<span class="help-block"><?php //echo $err_title;   ?></span>-->
				</div>
				<div class="form-group">
				    <label >Image Description *</label>
				    <textarea name="descrip" class="form-control"></textarea>
				<!--    <span class="help-block"><?php //echo $err_descrip;   ?></span>-->
				</div>
				<div class="form-group" >
				    <div class='col-md-6' style="margin-left: -15px">
					<div class="form-group">
					    <div class='input-group date' id='datetimepicker9'>
						<input type='text' class="form-control" name="fromdate" data-date-format="YYYY-MM-DD" placeholder="Start Date *"  readonly="readonly" />
						<span class="input-group-addon" style="background-color:#FFB070;"><span class="glyphicon glyphicon-calendar"></span>
						</span>
					    </div>
			    <!--                <span class="help-block"><?php //echo $err_fromdate;   ?></span>-->
					</div>
				    </div>
				    <div class='col-md-6'>
					<div class="form-group">
					    <div class='input-group date' id='datetimepicker10'>
						<input type='text' class="form-control" name="todate"  placeholder="End Date *" data-date-format="YYYY-MM-DD"  readonly="readonly"/>
						<span class="input-group-addon" style="background-color:#FFB070;"><span class="glyphicon glyphicon-calendar"></span>
						</span>
					    </div>
			    <!--                <span class="help-block"><?php // echo $err_todate;   ?></span>-->
					</div>
				    </div>

				</div>
<!--				<div class="form-group">
				    <label >Upload Banner</label>
				    <input type="file" data-filename-placement="inside" name="banner_img">&nbsp;&nbsp;&nbsp;&nbsp;
				    <font color="#FF0000">Only JPG,PNG,JPEG,GIF format allowed</font>
				    <span class="help-block"><?php // echo $err_upload;   ?></span>
				</div>-->
				<div class="form-group">
				<label >Upload Banner</label>
				<span class="filediv">
					<input type="file" data-filename-placement="inside" onchange="preview_image(this);" name="banner_img">&nbsp;&nbsp;&nbsp;&nbsp;
					<font color="#FF0000">Only JPG,PNG,JPEG format allowed</font>
					<span id="err_msg" style="color: red;"></span>
				</span>
					<div id="img_banner_img"></div>
				    <div class ="preview" style="display:none">
					<img id="imgdivpreview" src="" style="width:250px;height:200px!important;"><br/><br/>
				    </div> 
				</div>
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
                <option value="2" 
                <?php
                if (isset($_POST['status']) && $_POST['status'] != '' && $_POST['status'] == 2) {
                    ?> selected="selected"
                            <?php
                        }
                        ?>>InActive
                </option>
            </select>

        </div>
				
				
				<input type="submit" name="submit" class="btn btn-warning"  value="Save"/>
                                <input type="reset" id="btn_front" class="btn btn-warning" value="Reset" />
                                <!--<INPUT class="btn btn-warning" Type="button" VALUE="Back" onClick="location.href = 'scheduled_banner.php'">-->
				<!--<input type="button" onClick="location.href = 'admin_home.php'" class="btn btn-warning" value="Back" />-->
			    </form>
<?php } ?>

			    <br/>
			    <br/>
 <?php
if (!($oper == 'scheduledbanner_edit')) { ?>
			    <div class="col-md-10" style="margin-top:45px;">
				<div class="table-responsive">
					<table class="table table-striped table-bordered">
					<th class="text-center">SI NO</th>
					<th class="text-center" style="width:15%">TITLE</th>
					<th class="text-center">DESCRIPTION</th>
					<th class="text-center" style="width:10%">IMAGE</th>
					<th class="text-center">STATUS</th>
					<th class="text-center" colspan="2">OPTION</th>
					<?php
					$image_query = mysql_query("select * from tbl_slider where fld_fromdate is NOT NULL and fld_delstatus!=2");
					$a = 0;
					while ($image_fetch = mysql_fetch_array($image_query)) {
					    $view_id = $image_fetch['fld_id'];
					    $view_title = $image_fetch['fld_title'];
					    $view_descrip = $image_fetch['fld_description'];
					    $view_image = $image_fetch['fld_image'];
					    $view_active = $image_fetch['fld_active'];
					    $banner_delete = $image_fetch['fld_delstatus'];

					    $a++;
					    ?>
    					<tr class="text-center">
    					    <td><?php echo $a; ?></td>
    					    <td><?php echo $view_title; ?></td>
    					    <td><?php echo $view_descrip; ?></td>
    					    <td><img src="<?php echo $view_image; ?>" width="50px" height="50px" /></td>
    					    <td>
						    <?php
if ($view_active == 2) {
    ?>
   InActive

    <?php
} else {
    ?> 
    Active

    <?php
}
?>
    					    </td>
    					    <td>
<a href="scheduled_banner.php?op=scheduledbanner_edit&banner_id=<?php echo $view_id; ?>" attr="<?php echo $view_id;?>" class="edit_tdedit"><i class="btn btn-warning">EDIT</i></a>
					    </td>
					    <td>
    <a href="#" id='<?php echo $view_id;?>' class="del_sbanner"><i class="btn btn-warning">DELETE</i></a>
</td></tr>
<?php
} ?>

				    </table>
				</div>






			    </div>
<?php } ?>
			</div>
		    </div>


                </section><!-- /.content -->
            </aside><!-- /.right-side -->
        </div><!-- ./wrapper -->

        <script src="//ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
	<script type="text/javascript" src="../scripts/validate.min.js"></script>

        <script type="text/javascript" src="js/moment.js"></script>
        <script src="js/bootstrap.min.js" type="text/javascript"></script>
        <!-- AdminLTE App -->
        <script src="js/AdminLTE/app.js" type="text/javascript"></script>
        <!-- AdminLTE for demo purposes -->
        <script src="js/AdminLTE/demo.js" type="text/javascript"></script>

        <script type="text/javascript" src="js/bootstrap-datetimepicker.js"></script>
        <script type="text/javascript" src="js/bootstrap.file-input.js"></script>
	<script>
				    $(document).ready(function () {

					$('input[type=file]').bootstrapFileInput();
					$('.file-inputs').bootstrapFileInput();

				    });
	</script>
	<script type="text/javascript">
	    $(function () {

        
		$('#datetimepicker9').datetimepicker({pickTime: false});
		$('#datetimepicker10').datetimepicker({pickTime: false});
		$("#datetimepicker9").on("dp.change", function (e) {
		    $('#datetimepicker10').data("DateTimePicker").setMinDate(e.date);
		});
		$("#datetimepicker10").on("dp.change", function (e) {
		    $('#datetimepicker9').data("DateTimePicker").setMaxDate(e.date);
		});
	    });


	$(function () {
            $(".del_sbanner").click(function () {

            var id = $(this).attr("id");
            var dataString = 'id=' + id;
	    
            if (confirm('Are sure, You want to delete this record..?')) {
            $.ajax({
            type: "POST",
                    url: "delete_category.php?op=scheduled_banner",
                    data: dataString,
                    cache: false,
                    success: function (data)
                    {
			alert('Deleted Successfully');
                    location.reload();
                    }

            });
            }
            return false;
            });
            });




	    $("form[name='form_scheduled_banner']").validate({
		rules: {
		    title: {
			required: true
		    },
		    descrip: {
			required: true
		    },
		    banner_img: {
			required: {
			    depends: function () {
				var oldBlogImages = $('input[name="old_image"]').val();
				if (oldBlogImages != '' && typeof oldBlogImages !== 'undefined') {
				    return false;
				} else {
				    return true;
				}
			    }
			},
			accept: "png|jpg|jpeg"
		    },
		
		fromdate: {
			required: true
		    },
		todate: {
			required: true
		    }
		},
		messages: {
		    title: {
			required: "Banner title is mandatory"
		    },
		    descrip: {
			required: "Banner Description is mandatory"
		    },
		    fromdate: {
			required: "From Date is mandatory"
		    },
		    todate: {
			required: "To Date is mandatory"
		    }
		},
		errorElement: "label", // can be 'label'
		errorPlacement: function (error, element) {
		    var elementName = $(element).attr('name');
		    if (elementName == 'banner_img') {
			$('#img_' + elementName).after(error);
		    } else {
			element.after(error);
		    }
		},
		submitHandler: function (form) {
		    if (confirm("Are you sure, do you want to submit?")) {
			form.submit();
		    } else {
			return false;
		    }
		}
	    });

function preview_image(input) {
            if (input.files && input.files[0]) {
            var reader = new FileReader();
            var imge = new Image();
            reader.onload = function (e) {
            imge.src = e.target.result;
            imge.onload = function () {
		if(this.width >= '1910' && this.height >= '630'){
		    $('.preview').css({'display': 'block'});
		    $('#imgdivpreview').attr('src', e.target.result);
	    }else{
		    $('.preview').css({'display': 'none'});
		    $('.filediv').html('<input type="file" data-filename-placement="inside" onchange="preview_image(this);" name="banner_img"><span id="err_msg" style="color: red;"></span>');
		    var msg = "Please give vaild dimensions above(1910 * 630)";
                    alert("Please give vaild dimensions above(1910*630)");
		    $('#err_msg').text(msg);
		    $("#err_msg").fadeOut(5000);
	    }
		}
	    }
           }
         reader.readAsDataURL(input.files[0]);
        }
function edit_preview_image(input) {
            if (input.files && input.files[0]) {
            var reader = new FileReader();
            var imge = new Image();
            reader.onload = function (e) {
            imge.src = e.target.result;
            imge.onload = function () {
		if(this.width >= '1910' && this.height >= '630'){
		    $('.edit_preview').css({'display': 'block'});
		    $('#edit_imgdivpreview').attr('src', e.target.result);
	    }else{
		    $('.edit_preview').css({'display': 'none'});
		    $('.edit_filediv').html('<input type="file" data-filename-placement="inside" onchange="edit_preview_image(this);" name="banner_img"><span id="edit_err_msg" style="color: red;"></span>');
		    var msg = "Please give vaild dimensions above(1910 * 630)";
                    alert("Please give vaild dimensions above(1910*630)");
		    $('#edit_err_msg').text(msg);
	    }
		}
	    }
           }
         reader.readAsDataURL(input.files[0]);
        }
	</script>
        <script>
  $(document).ready(function(){  
    $("#reset_edit").click(function () {
                  var validator1 = $( "#form" ).validate();
                  validator1.resetForm();
                 $("#form")[0].reset();
            });
           
        
        $("#btn_front").click(function () {
                  var validator1 = $("#reset_form").validate();
                  validator1.resetForm();
                 $("#reset_form")[0].reset();
            });
	});
	 
      

            </script>
    </body>
</html>