<?php error_reporting(0);
include "admin_session.php"; 
$oper = $_REQUEST['op'];

if(isset($_POST['submit'])) {
    
	$title = $_POST['title'];
	$descrip = $_POST['descrip'];
	$status = $_POST['status'];
	

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
	
		if (($extension != "jpg") && ($extension != "jpeg") && ($extension != "png"))
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
			
			$query = mysql_query("insert into tbl_slider(fld_title,fld_description,fld_image,fld_active)values('".$title."','".$descrip."','".$filename."','".$status."')");
	if($query) {
	?>
	<script>
	alert("Saved Successfully");
	window.location ="master_banner.php";
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

    $image_edit = $_FILES["banner_img"]["name"];	
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
	if($image_edit)
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
			
	    $query= mysql_query("Update tbl_slider SET fld_title='$title_edit',fld_image='$filename',fld_description='$descrip_edit',fld_active='$status_edit' where fld_id=$id");
	
			
			imagedestroy($src);
			imagedestroy($tmp);
			
		}
	}	 
	else {
	    
	    $query= mysql_query("Update tbl_slider SET fld_title='$title_edit',fld_description='$descrip_edit',fld_active='$status_edit' where fld_id=$id");
	    
	}
    
   
	if($query){
    ?>
    <script>
        alert("Updated Successfully");
        window.location = "master_banner.php";
    </script>
    <?php
	}
}
?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title>Banner | StaffingSpot</title>
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
			<li class="active">Master Management</li><li class="active">Banner Master</li>
                    </ol>
                </section>

                <!-- Main content -->
                <section class="content">
					
                    
    <?php
if ($oper == 'banner_edit') {
    
    $id = $_REQUEST['banner_id'];
    $view = mysql_query("SELECT * from tbl_slider where fld_id=$id");
    $rows = mysql_fetch_array($view);
    $banner_title = $rows['fld_title'];
    $image = $rows['fld_image'];
    $description = $rows['fld_description'];
    $status = $rows['fld_active'];
    ?>

<div class="panel panel-default">
<div class="panel-heading"><h3 class="panel-title">Edit Banner Master</h3></div>
<div class="panel-body">
			<div class="col-md-12 col-sm-12 col-xs-12">     
                        <form  class="form-horizontal" method="POST" id="form" name="form_banner" enctype="multipart/form-data" role="form">
			   
                            
                        <div class="col-md-12 col-sm-12 col-xs-12">
                            <div class="form-group">
                                <label class="col-sm-4 control-label">Banner Title <span class="required">*</span></label>
                                <div class="col-sm-6">
                                    <input id="title" name="title" placeholder="Enter The Title" class="form-control" type="text" value="<?php echo $banner_title; ?>">
                                </div>
                            </div>
                        </div>
                         
                        <div class="col-md-12 col-sm-12 col-xs-12">
                            <div class="form-group">
                                    <label class="col-sm-4 control-label">Banner Description <span class="required">*</span></label>
                                    <div class="col-sm-6">
                                    <textarea id="descrip" name='descrip' class="ckeditor"><?php echo $description; ?></textarea>
				    <div id="ck_descrip"></div>
                                    </div>
			    </div>
			</div>
                        <div class="col-md-12 col-sm-12 col-xs-12">
                            <div class="form-group">
                                    <label class="col-sm-4 control-label">Upload Image<span class="required">*</span></label>
				    <div class="edit_filediv col-sm-6">
					    <input type="file" data-filename-placement="inside" onchange="edit_preview_image(this);" name="banner_img" accept="image/jpg,image/png,image/jpeg,image/JPEG,image/PNG,image/JPG">&nbsp;&nbsp;&nbsp;&nbsp;
                                            <font color="#FF0000">Only JPG,PNG,JPEG format allowed  ( Please give valid dimensions above 1910 * 630 )<br></font>
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
                                <label class="col-sm-4 control-label">Status<span class="required">*</span></label>
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
                                    <option value="0" 
                                    <?php
                                    if (isset($_POST['status']) && $_POST['status']!='' && $_POST['status'] == 1) {
                                        ?> selected="selected"
                                                <?php
                                            } elseif ($status == 0) {
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
                            
                            <!--<input type="reset" id="reset_edit" class="btn btn-warning" value="Reset" />-->
                            <input type="button" onclick="clearText()" class="btn btn-warning" id="reset" value="Reset" />
                            <!--<input type="reset" value="New" id="btnReset">-->
                            
                            <INPUT class="btn btn-warning" Type="button" VALUE="Back" onClick="location.href = 'master_banner.php'">
                        
                       </div> 
                   
			    </div>
			    </form>
                </div>
</div>
			</div>
<?php } else { ?>  
<div class="panel panel-default">
<div class="panel-heading"><h3 class="panel-title">Banner Master</h3></div>
<div class="panel-body">
<form class="form_top_space" id="reset_form" method="POST" name="form_banner" enctype="multipart/form-data" role="form">
    <div class="form-group">
	<label >Banner Title <span class="required">*</span></label>
	<input type="text" class="form-control" name="title" placeholder="Enter the  Title">
    </div>
    <div class="form-group">
	<label >Banner Description <span class="required">*</span></label>
	<textarea name="descrip" class="ckeditor" id="descrip"></textarea>
	<div id="ck_descrip"></div>
    </div>
    
    <div class="form-group">
	<label >Upload Image<span class="required">*</span></label>
	<span class="filediv">
		<input type="file" data-filename-placement="inside" onchange="preview_image(this);" name="banner_img" accept="image/jpg,image/png,image/jpeg,image/JPEG,image/PNG,image/JPG">&nbsp;&nbsp;&nbsp;&nbsp;
                <font color="#FF0000">Only JPG,PNG,JPEG format allowed  ( Please give valid dimensions above 1910 * 630 )<br></font>
		<span id="err_msg"></span>
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
    
    
    
    <input type="submit" name="submit" class="btn btn-success" value="Save"/>
  <input type="reset" class="btn btn-warning" id="btn_front" value="Reset" />
    <!--<input class="btn btn-warning" type="reset" id="reset1" value="Reset" />-->
    
</form>
<?php } ?>

<br/>
<br/>
<?php if(!($oper == 'banner_edit')) { ?>
<div class="col-md-10" style="margin-top:45px;">
<div class="table-responsive">
<table class="table table-striped table-bordered">
<th class="text-center">SI NO</th>
<th class="text-center" style="width:15%">BANNER TITLE</th>
<th class="text-center">BANNER DESCRIPTION</th>
<th class="text-center" style="width:10%">IMAGE</th>
<th class="text-center">STATUS</th>
<th class="text-center" colspan="2">OPTION</th>
<?php
$pagin_query =mysql_query("select count(*) as total from tbl_slider where fld_fromdate is NULL and fld_todate is NULL and fld_delstatus!=2");
	$pagin_row=mysql_fetch_array($pagin_query);
	$total=$pagin_row['total'];
	$dis=5;
	$total_page=ceil($total/$dis);
	$page_cur=(isset($_GET['page']))?$_GET['page']:1;
	$k=($page_cur-1)*$dis;




$image_query = mysql_query("select * from tbl_slider where fld_fromdate is NULL and fld_todate is NULL and fld_delstatus!=2 limit $k,$dis"); 
$a=$k+1;
while($image_fetch = mysql_fetch_array($image_query)) {
	$banner_id = $image_fetch['fld_id'];
	$banner_title = $image_fetch['fld_title'];
	$banner_descrip = $image_fetch['fld_description'];
	$banner_image = $image_fetch['fld_image'];
	$banner_status = $image_fetch['fld_active'];
	$banner_delete = $image_fetch['fld_delstatus'];


?>
<tr class="text-center">
<td><?php echo $a; ?></td>
<td><?php echo $banner_title; ?></td>
<td><?php echo $banner_descrip; ?></td>
<td><img src="<?php echo $banner_image; ?>" width="50px" height="50px" /></td>
<td>
<?php
if ($banner_status == 1) {
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
<a href="master_banner.php?op=banner_edit&banner_id=<?php echo $banner_id; ?>" attr="<?php echo $banner_id;?>" class="edit_tdedit"><i class="btn btn-info">Edit</i></a>
</td>
<td>
<a href="#" id='<?php echo $banner_id;?>' class="del_banner"><i class="btn btn-danger">Delete</i></a>

</td></tr>
<?php
$a++;
} ?>

</table>
     <?php if($total > $dis) { ?>
<nav>
  <ul class="pager">
  <?php if($page_cur>1) { ?>
    <li class="previous"><a href="master_banner.php?page=<?php echo ($page_cur-1);?>"><span aria-hidden="true">&larr;</span>Prev</a></li>
    <?php } else { ?>
    <li class="previous"><a>Prev</a></li>
    <?php } 
	if($page_cur<$total_page) {?>

    <li class="next"><a href="master_banner.php?page=<?php echo ($page_cur+1); ?>">Next<span aria-hidden="true">&rarr;</span></a></li>
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
        <script src="//cdn.ckeditor.com/4.5.5/standard/ckeditor.js"></script>      
        <script>
    $("#reset").click(function() {
	$(this).closest('form').find("input[type=text], textarea").val("");
	$(this).closest('form').find("input[type=email], textarea").val("");
	$(this).closest('form').find("input[type=text], select").val("");
	CKEDITOR.instances['descrip'].setData("");
})
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
		
	$('input[type=file]').bootstrapFileInput();
	$('.file-inputs').bootstrapFileInput();
	 
        
	});
        
	
	$(function () {
            $(".del_banner").click(function () {

            var id = $(this).attr("id");
            var dataString = 'id=' + id;
            if (confirm('Are you sure, you want to delete.?')) {
            $.ajax({
            type: "POST",
                    url: "delete_category.php?op=bannerdel",
                    data: dataString,
                    cache: false,
                    success: function (data)
                    {
			alert('Deleted Successfully');
			window.location="master_banner.php";
                    }

            });
            }
            return false;
            });
            });
            
	
	
	$("form[name='form_banner']").validate({
	    ignore: [],
                rules: {
                    title: {
                        required: true
                    },
                    descrip: {
                        required: function (textarea) {
                                CKEDITOR.instances[textarea.id].updateElement(); // update textarea
                                var editorcontent = textarea.value.replace(/<[^>]*>/gi, ''); // strip tags
                                return editorcontent.length === 0;
                        }
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
		    }
                },
                messages: {
                },
		errorElement: "label", // can be 'label'
		errorPlacement: function (error, element) {
		    var elementName = $(element).attr('name');
		    console.log('name:',elementName);
		    if (elementName == 'banner_img') {
			$('#img_' + elementName).after(error);
		    }else if (elementName == 'descrip') {
			$('#ck_' + elementName).after(error);
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
		if(this.width >= '1910' && this.height >= '630'){
		    $('.preview').css({'display': 'block'});
		    $('#imgdivpreview').attr('src', e.target.result);
	    }else{
		    $('.preview').css({'display': 'none'});
		    $('.filediv').html('<input type="file" data-filename-placement="inside" onchange="preview_image(this);" name="banner_img" accept="image/jpg,image/png,image/jpeg,image/JPEG,image/PNG,image/JPG"><span id="err_msg" style="color: red;"></span>');
		    var msg = "Please give valid dimensions above(1910*630)";
		    $('#err_msg').text(msg);
                    $('#err_msg').fadeOut(1000);
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
		    $('.edit_filediv').html('<input type="file" data-filename-placement="inside" onchange="edit_preview_image(this);" name="banner_img" accept="image/jpg,image/png,image/jpeg,image/JPEG,image/PNG,image/JPG"><span id="edit_err_msg" style="color: red;"></span>');
		    var msg = "Please give valid dimensions above(1910*6300)";
		    $('#edit_err_msg').text(msg);
                    $('#edit_err_msg').fadeOut(1000);
	    }
		}
	    }
           }
         reader.readAsDataURL(input.files[0]);
        }
        
//       $(document).ready(function() {
//        setTimeout('$(".edit_err_msg").fadeOut()',300);
//      });
      
	</script>
       
             <script>
  $(document).ready(function(){  
    $("#reset_edit").click(function () {
                  var validator1 = $( "#form" ).validate();
                  validator1.resetForm();
                 $("#form")[0].reset();
            });
            
            
            $("#btn_front").click(function () {
                  var validator1 = $( "#reset_form" ).validate();
                  validator1.resetForm();
                 $("#reset_form")[0].reset();
            });
	});  
      

            </script>

    </body>
</html>
