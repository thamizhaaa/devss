<?php error_reporting(0);
include "admin_session.php"; 
$oper = $_REQUEST['op'];

if(isset($_POST['submit'])) {
    
	$title = $_POST['title'];
	$status = $_POST['status'];
	
	$e_query = mysql_query("select fld_id from tbl_social_type where fld_social_type='$title'");
	$e_sq = mysql_num_rows($e_query);
//	$image = $_POST['icon_img'];
	
//	$sourcePath = $_FILES['icon_img']['tmp_name'];
//	$targetPath = "social_icons/" . $_FILES['icon_img']['name'];
//	move_uploaded_file($sourcePath, $targetPath); 
	$image = $_FILES["icon_img"]["name"];	
	$uploadedfile = $_FILES['icon_img']['tmp_name'];
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
           
		$filename = stripslashes($_FILES['icon_img']['name']);
		$extension = getExtension($filename);
		$extension = strtolower($extension);
	
		if (($extension != "jpg") && ($extension != "jpeg") && ($extension != "png") && ($extension != "gif"))
		{
			$change='<div class="msgdiv">Unknown Image extension </div> ';
			$errors=1;
		}
		else
		{
			$size=filesize($_FILES['icon_img']['tmp_name']);
	
			if ($size > MAX_SIZE*50000)
			{
				$change='<div class="msgdiv">You have exceeded the size limit!</div> ';
				$errors=1;
			}
	
			if($extension=="jpg" || $extension=="jpeg" )
			{
				$uploadedfile = $_FILES['icon_img']['tmp_name'];
				$src = imagecreatefromjpeg($uploadedfile);
	
			}
			else if($extension=="png")
			{
				$uploadedfile = $_FILES['icon_img']['tmp_name'];
				$src = imagecreatefrompng($uploadedfile);
	
			}
			else
			{
				$src = imagecreatefromgif($uploadedfile);
			}
			
			list($width,$height)=getimagesize($uploadedfile);	
			$newwidth=16;
			$newheight=16;			
			$tmp=imagecreatetruecolor($newwidth,$newheight);	
			imagecopyresampled($tmp,$src,0,0,0,0,$newwidth,$newheight,$width,$height);	
			$filename = "social_icons/". $_FILES['icon_img']['name'];
			imagejpeg($tmp,$filename,100);
			
			$query = mysql_query("insert into tbl_social_type(fld_social_type,fld_social_icon,fld_social_status)values('".$title."','".$filename."','".$status."')");
	if($query) {
	?>
<script>
	alert("Saved Successfully");
//	alert("Social Type Added Successfully");
	window.location ="social_type.php";
</script>
<?php
	}	
			
			imagedestroy($src);
			imagedestroy($tmp);
			
		}
	}
	
}

if (isset($_POST['save'])) {
    
    $id = $_REQUEST['socialtype_id'];
    
    
    $title_edit = $_POST['title'];
    $status_edit = $_POST['status'];
//    $image = $_POST['icon_img'];
	
    
    
    
    $image = $_FILES["icon_img"]["name"];	
    $uploadedfile = $_FILES['icon_img']['tmp_name'];
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
           
		$filename = stripslashes($_FILES['icon_img']['name']);
		$extension = getExtension($filename);
		$extension = strtolower($extension);
	
		if (($extension != "jpg") && ($extension != "jpeg") && ($extension != "png") && ($extension != "gif"))
		{
			$change='<div class="msgdiv">Unknown Image extension </div> ';
			$errors=1;
		}
		else
		{
			$size=filesize($_FILES['icon_img']['tmp_name']);
	
			if ($size > MAX_SIZE*50000)
			{
				$change='<div class="msgdiv">You have exceeded the size limit!</div> ';
				$errors=1;
			}
	
			if($extension=="jpg" || $extension=="jpeg" )
			{
				$uploadedfile = $_FILES['icon_img']['tmp_name'];
				$src = imagecreatefromjpeg($uploadedfile);
	
			}
			else if($extension=="png")
			{
				$uploadedfile = $_FILES['icon_img']['tmp_name'];
				$src = imagecreatefrompng($uploadedfile);
	
			}
			else
			{
				$src = imagecreatefromgif($uploadedfile);
			}
			
			list($width,$height)=getimagesize($uploadedfile);	
			$newwidth=16;
			$newheight=16;			
			$tmp=imagecreatetruecolor($newwidth,$newheight);	
			imagecopyresampled($tmp,$src,0,0,0,0,$newwidth,$newheight,$width,$height);	
			$filename = "social_icons/". $_FILES['icon_img']['name'];
			imagejpeg($tmp,$filename,100);
			
	    $query= mysql_query("Update tbl_social_type SET fld_social_type='$title_edit',fld_social_icon='$filename',fld_social_status='$status_edit' where fld_social_id=$id");
	
			
			imagedestroy($src);
			imagedestroy($tmp);
			
		}
	} else {
	    
	    $query= mysql_query("Update tbl_social_type SET fld_social_type='$title_edit',fld_social_status='$status_edit' where fld_social_id=$id");
	    
	}	 
	if($query){
    ?>
    <script>
	alert("Updated Successfully");
//        alert("Social Type Updated Successfully");
        window.location = "social_type.php";</script>
    <?php
	}
}
?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title>Social Type|  StaffingSpot</title>
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
	<style>
	    .error{
		color:red
	    }
	</style>
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
                        <!--<small>it all starts here</small>-->
                    </h1>
                    <ol class="breadcrumb">
                        <li><a href="admin_home.php"><i class="fa fa-dashboard"></i> Home</a></li> 
			<li class="active">Master Management</li><li class="active">Social Type</li>
                    </ol>
                </section>

                <!-- Main content -->
                <section class="content">
					
                    
    <?php
if ($oper == 'socialtype_edit') {
    
    $socialtype_id_edit = $_REQUEST['socialtype_id'];
    $view = mysql_query("select * from tbl_social_type where fld_social_id=$socialtype_id_edit");
    $rows = mysql_fetch_array($view);    
    $socialtype_name_edit = $rows['fld_social_type'];
    $socialtype_status_edit = $rows['fld_social_status'];
    $image_edit = $rows['fld_social_icon'];
    
    ?>

<div class="panel panel-default">
<div class="panel-heading"><h3 class="panel-title">Edit Social Type</h3></div>
<div class="panel-body">
			<div class="col-md-6 col-sm-12 col-xs-12">     
                        <form id="form" class="form-horizontal" method="POST" name="form_socialtype" enctype="multipart/form-data" role="form">
			   
                            
                        <div class="col-md-12 col-sm-12 col-xs-12">
                            <div class="form-group">
                                <label >Social Type<span class="required">*</span></label>
                                <div >
                                    <input id="title" name="title" placeholder="Enter the type" class="form-control" type="text" value="<?php echo $socialtype_name_edit; ?>">
                                </div>
                            </div>
                        </div>
                        <div class="col-md-12 col-sm-12 col-xs-12">
                            <div class="form-group">
                                <label>Upload Icon <span class="required">*</span></label>
                                <div class="edit_filediv">
                                    <input type="file" id='file_edit'  class="btn-brose"  data-filename-placement="inside"  onchange="edit_preview_image(this);" name="icon_img" accept="image/jpg,image/png,image/jpeg,image/JPEG,image/PNG,image/JPG">&nbsp;&nbsp;&nbsp;&nbsp;
                                    <font color="#FF0000">Only JPG,PNG,JPEG format allowed ( Please give valid dimensions above 200 * 200 )</font>
                                    <span id="edit_err_msg" style="color: red;"></span>
                                </div>
				    <br/><br/><br/>
				    <div id="img_banner_img"></div>
				    <div class ="edit_preview" >
					<img id="edit_imgdivpreview" src="<?php echo $image_edit; ?>" style="width:250px;height:200px!important;"><br/><br/>
					<input name="old_image" value="<?php echo $image_edit; ?>" hidden/>
				    </div> 
                            </div>
                        </div>  
                        
                        
			<div class="col-md-12 col-sm-12 col-xs-12">
                            <div class="form-group">
                                <label >Status<span class="required">*</span></label>
                                <div >
                                    
                                    <select id="status" name="status" class="form-control">
                                    <option value="1" 
                                    <?php
                                    if (isset($_POST['status']) && $_POST['status']!='' && $_POST['status'] == 1) {
                                        ?> selected="selected"
                                                <?php
                                            } elseif ($socialtype_status_edit == 1) {
                                                ?> selected="selected"
                                                <?php
                                            }
                                            ?>>Active
                                    </option>
                                    <option value="0" 
                                    <?php
                                    if (isset($_POST['status']) && $_POST['status']!='' && $_POST['status'] == 1) {
                                        ?> selected="selected"
                                                <?php
                                            } elseif ($socialtype_status_edit == 0) {
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
                        <div class="form-group">
                            <input type="submit" name="save" class="btn btn-success resume-btn mob-btn mob-btn-1" value="Save"/>
                            <input type="button" onclick="clearText_edit()"class="btn btn-warning resume-btn mob-btn mob-btn-1" id="reset_edit" value="Reset" />
                            <input type="button" onClick="location.href='social_type.php'" class="btn btn-warning resume-btn mob-btn mob-btn-1" value="Back" />
                        </div>
                   
			    </div>
			    </form>
                </div>
</div>
			</div>
<?php } else { ?>  
<div class="panel panel-default">
<div class="panel-heading"><h3 class="panel-title">Social Type</h3></div>
<div class="panel-body">
<form id="reset_form" class="form_top_space  col-lg-6 col-md-8 col-sm-12 col-xs-12 " method="POST" name="form_socialtype" enctype="multipart/form-data" role="form">
    <div class="form-group">
	<label >Social Type<span class="required">*</span></label>
	<input type="text" class="form-control" name="title" placeholder="Enter the type">
    </div>
    <div class="form-group">
	<label>Upload Icon Image <span class="required">*</span></label>
	<div class="filediv">
		<input type="file" id='file' class="btn-brose" data-filename-placement="inside" onchange="preview_image(this);" name="icon_img" accept="image/jpg,image/png,image/jpeg,image/JPEG,image/PNG,image/JPG">&nbsp;&nbsp;&nbsp;&nbsp;
		<font color="#FF0000">Only JPG,PNG,JPEG format allowed  ( Please give valid dimensions above 200 * 200 )</font>
		<span id="err_msg" style="color: red;"></span>
	</div>
		<div id="img_icon_img"></div>
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
                <option value="0" 
                <?php
                if (isset($_POST['status']) && $_POST['status'] != '' && $_POST['status'] == 0) {
                    ?> selected="selected"
                            <?php
                        }
                        ?>>InActive
                </option>
            </select>

        </div>
    
    
    
    <input type="submit" name="submit" class="btn btn-success resume-btn mob-btn mob-btn-1" value="Save"/>
    <input type="button" onclick="clearText()" id="reset" class="btn btn-warning resume-btn mob-btn mob-btn-1" value="Reset" />
    <!--<input type="button" onClick="location.href='admin_home.php'" class="btn btn-warning" value="Back" />-->
</form>
<?php } ?>


<?php if(!($oper == 'socialtype_edit')) { ?>
<div class="col-md-12 fullscreen-width">
<div class="table-responsive" >
<table class="table table-bordered table-hover ">
<th class="text-center info">SI NO</th>
<th class="text-center info">SOCIAL TYPE</th>
<th class="text-center info">SOCIAL ICON</th>
<th class="text-center info">STATUS</th>
<th class="text-center info" colspan="2">OPTION</th>
<?php
$pagin_query =mysql_query("select count(*) as total from tbl_social_type where fld_delstatus!=2");
	$pagin_row=mysql_fetch_array($pagin_query);
	$total=$pagin_row['total'];
	$dis=3;
	$total_page=ceil($total/$dis);
	$page_cur=(isset($_GET['page']))?$_GET['page']:1;
	$k=($page_cur-1)*$dis;
	
$social_query = mysql_query("select * from tbl_social_type where fld_delstatus!=2 limit $k,$dis");
$a=$k+1;
while($social_fetch = mysql_fetch_array($social_query)) {
	$socialtype_id = $social_fetch['fld_social_id'];
	$socialtype_name = $social_fetch['fld_social_type'];
	$socialtype_status = $social_fetch['fld_social_status'];
	 $icon_image = $social_fetch['fld_social_icon'];
//	$socialtype_id = $image_fetch['fld_delstatus'];

?>
<tr class="text-center">
<td><?php echo $a; ?></td>
<td><?php echo $socialtype_name; ?></td>
<td><img src="<?php echo $icon_image; ?>" width="30px" height="30px" /></td>
<td>
<?php
if ($socialtype_status == 1) {
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
<td>
    <a href="social_type.php?op=socialtype_edit&socialtype_id=<?php echo $socialtype_id; ?>" attr="<?php echo $socialtype_id;?>" class="edit_tdedit"><i class="btn btn-warning resume-btn mob-btn mob-btn-1">EDIT</i></a>
    
<!--<a href="#" id='<?php echo $socialtype_id;?>' class="del_types"><i class="btn btn-danger">DELETE</i></a>-->
</td>
					    <td>
    <a href="#" id='<?php echo $socialtype_id;?>' class="del_types"><i class="btn btn-warning resume-btn mob-btn mob-btn-1">DELETE</i></a>
</td></tr>
<?php
$a++;
} ?>

</table>
    <?php if($total > 3) { ?>
<nav>
  <ul class="pager">
  <?php if($page_cur>1) { ?>
    <li class="previous"><a href="social_type.php?page=<?php echo ($page_cur-1);?>"><span aria-hidden="true">&larr;</span>Prev</a></li>
    <?php } else { ?>
    <li class="previous"><a>Prev</a></li>
    <?php } 
	if($page_cur<$total_page) {?>

    <li class="next"><a href="social_type.php?page=<?php echo ($page_cur+1); ?>">Next<span aria-hidden="true">&rarr;</span></a></li>
     <?php } else { ?>
		
		<li class="next" ><a>Next</a></li>
		<?php } ?>
		 
  </ul>
</nav>
<?php } ?>
</div>

</div>
<?php } ?>
</div>
</div>
                    
                   

                </section><!-- /.content -->
            </aside><!-- /.right-side -->
        </div><!-- ./wrapper -->

	<script type="text/javascript "src="//ajax.googleapis.com/ajax/libs/jquery/1.8.0/jquery.min.js"></script>
	<script type="text/javascript" src="../scripts/validate.min.js"></script>
	
        <script src="js/bootstrap.min.js" type="text/javascript"></script>
        <!-- AdminLTE App -->
        <script src="js/AdminLTE/app.js" type="text/javascript"></script>
        <!-- AdminLTE for demo purposes -->
        <script src="js/AdminLTE/demo.js" type="text/javascript"></script>
	
        
<script type="text/javascript" src="js/bootstrap.file-input.js"></script>
    <script>	
    $("#reset").click(function() {
    $(this).closest('form').find("input[type=text], textarea").val("");
    
    $(this).closest('form').find("input[type=text], select").val("");
    var $el = $('#file');
        $el.wrap('<form>').closest('form').get(0).reset();
        $el.unwrap();
        $("#imgdivpreview").attr("src","");
       // $('.preview').addclass('none');
        $("#imgdivpreview").css("display", "none");
    
    
    
});
   </script>
   <script>
//        $("#form").trigger('reset');
    function clearText() {
        // set text box reference
        var tb = document.getElementById('form');
        // clear text box
        tb.value = '';
    }
    
   </script>
   

    <script>	
	$(document).ready(function() {
//		
////	$('input[type=file]').bootstrapFileInput();
////	$('.file-inputs').bootstrapFileInput();
//	
//	});
$("#reset_edit").click(function() {
	$(this).closest('form').find("input[type=text], textarea").val("");
	
	$(this).closest('form').find("input[type=text], select").val("");
        
        $(this).closest('form').find("input[name=old_image]").val("");
        var $el = $('#file_edit');
        $el.wrap('<form>').closest('form').get(0).reset();
        $el.unwrap();
        $("#edit_imgdivpreview").attr("src","");
       // $('.preview').addclass('none');
        $("#edit_imgdivpreview").css("display", "none");
	
});
   </script>
   <script>

    function clearText_edit() {
        
        var tb = document.getElementById('form');
        
        tb.value = '';
    }
        
    </script>
	<script>
	$(function () {
            $(".del_types").click(function () {

            var id = $(this).attr("id");
            var dataString = '&id=' + id;
            if (confirm('Are you sure, You want to delete.?')) {
            $.ajax({
            type: "POST",
                    url: "delete_category.php?op=delete_social",
                    data: dataString,
                    cache: false,
                    success: function (data)
                    {
			alert('Deleted Successfully');
                    window.location="social_type.php";
                    }

            });
            }
            return false;
            });
            });
            
	
	
	$("form[name='form_socialtype']").validate({
                rules: {
                    title: {
                        required: true
                    },
		    icon_img: {
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
		    }
                },
                messages: {
                    
                },
		errorElement: "label", // can be 'label'
		errorPlacement: function (error, element) {
		    var elementName = $(element).attr('name');
		    if (elementName == 'icon_img') {
			$('#img_' + elementName).after(error);
		    } else {
			element.after(error);
		    }
		},
//                submitHandler: function (form) {
//                    if (confirm("Are you sure, do you want to submit?")) {
//                        form.submit();
//                    } else {
//                        return false;
//                    }
//                }
            });
	
	function preview_image(input) {
            if (input.files && input.files[0]) {
            var reader = new FileReader();
            var imge = new Image();
            reader.onload = function (e) {
            imge.src = e.target.result;
            imge.onload = function () {
		if(this.width >= '200' && this.height >= '200'){
		    $('.preview').css({'display': 'block'});
		    $('#imgdivpreview').attr('src', e.target.result);
	    }else{
		    $('.preview').css({'display': 'none'});
		    $('.filediv').html('<input type="file" data-filename-placement="inside" onchange="preview_image(this);" name="icon_img"><span id="err_msg" style="color: red;"></span>');
		    var msg = "Please give vaild dimensions above(200 * 200)";
		    $('#err_msg').text(msg);
			$('#err_msg').fadeOut(3000);
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
		if(this.width >= '200' && this.height >= '200'){
		    $('.edit_preview').css({'display': 'block'});
		    $('#edit_imgdivpreview').attr('src', e.target.result);
	    }else{
		    $('.edit_preview').css({'display': 'none'});
		    $('.edit_filediv').html('<input type="file" data-filename-placement="inside" onchange="edit_preview_image(this);" name="icon_img"><span id="edit_err_msg" style="color: red;"></span>');
		    var msg = "Please give vaild dimensions above(200 * 200)";
		    $('#edit_err_msg').text(msg);
			//$('#edit_err_msg').text(msg);
			$('#edit_err_msg').fadeOut(3000);

	    }
		}
	    }
           }
         reader.readAsDataURL(input.files[0]);
        }
	
	</script>
        
<!--        <script>
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
    </body>-->
</html>
