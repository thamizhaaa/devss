<?php
error_reporting(0);
include "admin_session.php";

$date = date('Y-m-d H:i:s');
$oper = $_REQUEST['op'];
if (isset($_POST['submit'])) {
    
    $image = $_FILES["file"]["name"];
    $tandc = $_POST['desc'];
    
        $sekersel = "Select * from tbl_aboutus where fld_status = 1";
        $sekersel_query = mysql_query($sekersel);
        $countresume = mysql_num_rows($sekersel_query);
	
           
//                    $sourcePath = $_FILES['file']['tmp_name']; // Storing source path of the file in a variable
//                    $targetPath = "aboutus_image/" . $_FILES['file']['name']; // Target path where file is to be stored
//                    move_uploaded_file($sourcePath, $targetPath); // Moving Uploaded file
		    
	$uploadedfile = $_FILES['file']['tmp_name'];
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
           
		$filename = stripslashes($_FILES['file']['name']);
		$extension = getExtension($filename);
		$extension = strtolower($extension);
	
		if (($extension != "jpg") && ($extension != "jpeg") && ($extension != "png") && ($extension != "gif"))
		{
			$change='<div class="msgdiv">Unknown Image extension </div> ';
			$errors=1;
		}
		else
		{
			$size=filesize($_FILES['file']['tmp_name']);
	
			if ($size > MAX_SIZE*50000)
			{
				$change='<div class="msgdiv">You have exceeded the size limit!</div> ';
				$errors=1;
			}
	
			if($extension=="jpg" || $extension=="jpeg" )
			{
				$uploadedfile = $_FILES['file']['tmp_name'];
				$src = imagecreatefromjpeg($uploadedfile);
	
			}
			else if($extension=="png")
			{
				$uploadedfile = $_FILES['file']['tmp_name'];
				$src = imagecreatefrompng($uploadedfile);
	
			}
			else
			{
				$src = imagecreatefromgif($uploadedfile);
			}
			
			list($width,$height)=getimagesize($uploadedfile);	
			$newwidth=680;
			$newheight=460;			
			$tmp=imagecreatetruecolor($newwidth,$newheight);	
			imagecopyresampled($tmp,$src,0,0,0,0,$newwidth,$newheight,$width,$height);	
			$filename = "aboutus_image/". $_FILES['file']['name'];
			imagejpeg($tmp,$filename,100);
			imagedestroy($src);
			imagedestroy($tmp);
			
		}
	}	    
	
        if ($countresume < 1) {

            $indus_query = mysql_query("insert into tbl_aboutus(fld_aboutus_image,fld_about_full_desc,fld_created_date,fld_status,fld_delstatus)values('" . $image . "','" . $tandc . "','" . $date . "','1','0')");
        } else {
           
            $indus_query = mysql_query("insert into tbl_aboutus(fld_aboutus_image,fld_about_full_desc,fld_created_date,fld_status,fld_delstatus)values('" . $image . "','" . $tandc . "','" . $date . "','0','0')");
        }
        ?>
                <script>
                    alert("Saved Successfully");
                    window.location = "about_us.php";
		</script>
        <?php
    
}


if (isset($_POST['save'])) {
    //print_r($_FILES);exit;
//    $image_edit = $_FILES["file"]["name"];
    $image_edit = $_FILES["file"]["name"];
    $tandc_edit = $_POST['desc'];
    $id = $_REQUEST['id'];
        
	$uploadedfile = $_FILES['file']['tmp_name'];
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
           
		$filename = stripslashes($_FILES['file']['name']);
		$extension = getExtension($filename);
		$extension = strtolower($extension);
	
		if (($extension != "jpg") && ($extension != "jpeg") && ($extension != "png") && ($extension != "gif"))
		{
			$change='<div class="msgdiv">Unknown Image extension </div> ';
			$errors=1;
		}
		else
		{
			$size=filesize($_FILES['file']['tmp_name']);
	
			if ($size > MAX_SIZE*50000)
			{
				$change='<div class="msgdiv">You have exceeded the size limit!</div> ';
				$errors=1;
			}
	
			if($extension=="jpg" || $extension=="jpeg" )
			{
				$uploadedfile = $_FILES['file']['tmp_name'];
				$src = imagecreatefromjpeg($uploadedfile);
	
			}
			else if($extension=="png")
			{
				$uploadedfile = $_FILES['file']['tmp_name'];
				$src = imagecreatefrompng($uploadedfile);
	
			}
			else
			{
				$src = imagecreatefromgif($uploadedfile);
			}
			
			list($width,$height)=getimagesize($uploadedfile);	
			$newwidth=680;
			$newheight=460;			
			$tmp=imagecreatetruecolor($newwidth,$newheight);	
			imagecopyresampled($tmp,$src,0,0,0,0,$newwidth,$newheight,$width,$height);	
			$filename = "aboutus_image/". $_FILES['file']['name'];
			imagejpeg($tmp,$filename,100);
			imagedestroy($src);
			imagedestroy($tmp);
			
		}
	}	    
              
       if($image_edit!='')  {  
    $query_emp_details = mysql_query("Update tbl_aboutus SET fld_aboutus_image='$image_edit', fld_about_full_desc='$tandc_edit',fld_modified_date = CURRENT_TIMESTAMP where fld_id=$id");
       }else{
    $query_emp_details = mysql_query("Update tbl_aboutus SET fld_about_full_desc='$tandc_edit',fld_modified_date = CURRENT_TIMESTAMP where fld_id=$id");
       }

    ?>
    <script>
        alert("Updated Successfully");
        window.location = "about_us.php";</script>
    <?php
}
?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title>About Us |Staffing Spot</title>
        <meta content='width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no' name='viewport'>
        <link href="css/bootstrap.min.css" rel="stylesheet" type="text/css" />
        <link href="//cdnjs.cloudflare.com/ajax/libs/font-awesome/4.1.0/css/font-awesome.min.css" rel="stylesheet" type="text/css" />
        <!-- Ionicons -->
        <link href="//code.ionicframework.com/ionicons/1.5.2/css/ionicons.min.css" rel="stylesheet" type="text/css" />
        <!-- Theme style -->
        <link href="css/AdminLTE.css" rel="stylesheet" type="text/css" />
	<style>
	    .error{
		color:red
	    }
            
	</style>


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
                         Front Page Management
                        <!--<small>it all starts here</small>-->
                    </h1>
                    <ol class="breadcrumb">
                        <li><a href="admin_home.php"><i class="fa fa-dashboard"></i> Home</a></li><li class="active">Front Page Management</li><li class="active">About Us</li>
                    </ol>
                </section>

                <!-- Main content -->
                <section class="content">

                    <div class="panel panel-default">
                        <div class="panel-heading"><h3 class="panel-title">About Us</h3></div>
                        <div class="panel-body">
<?php
if ($oper == 'edit') {
    $id = $_REQUEST['id'];
    $view = mysql_query("SELECT * from tbl_aboutus where fld_id=$id");
    $rows = mysql_fetch_array($view);
    $image = $rows['fld_aboutus_image'];
    $description = $rows['fld_about_full_desc'];
    ?>
                                <form class="form_top_space" action="" name="form_about" method="post" id="form" enctype="multipart/form-data" >

                                    <label class="col-sm-3 control-label" style="margin-left:3%;">Upload Image *</label>
                                    <div class="col-sm-8">
					<span class="filediv_edit">
                                        <input type="file" data-filename-placement="inside" id="file1" onchange="preview_edit_image(this);" name="file">&nbsp;&nbsp;&nbsp;&nbsp;
                                        <span id="lblError1" style="color: red;"></span>
					</span>
					<div id="img_file"></div>
                                        <div class ="preview_edit">
                                            <img id="imgdivpreview_edit" src="aboutus_image/<?php echo $image; ?>"  style="width:250px;height:200px!important;"><br/><br/>
					    <input name="old_image" value="<?php echo $image; ?>" hidden/>
                                        </div>

                                    </div>

                                    <label class="col-sm-3 control-label" style="margin-left:3%;">Description *</label>
                                    <div class="col-sm-8">
                                        <textarea id="editor1" name="desc" value="<?php echo $description; ?>" placeholder="Terms & Conditions *" ><?php echo $description; ?></textarea>
                                        <span class="help-block"><?php echo $err_tandc; ?></span>
					<div id="cke_desc"></div>
                                    </div>
                                    

                                    <div class="col-sm-12">
                                        <label class="col-sm-3 control-label" style="margin-left:3%;"></label>
                                        <div><input type="submit" class="btn btn-success" id="btnUpload1" name="save"  value="Save"/>
                                            <input type="reset" class="btn btn-warning" id="reset" value="Reset" />
                                            <input class="btn btn-warning" Type="button" VALUE="Back" onClick="location.href = 'about_us.php'"></div>
                                    </div>
                                </form>
    <?php
} else {
    ?>
                                <form id="form" class="form_top_space" name="form_about" action="" method="post" enctype="multipart/form-data" >
                                    <label class="col-sm-3 control-label" style="margin-left:3%;">Upload Image *</label>
                                    <div class="col-sm-8">
					<span class="filediv">
                                        <input type="file" data-filename-placement="inside" id="file1" onchange="preview_image(this);" name="file">&nbsp;&nbsp;&nbsp;&nbsp;
                                        <span id="lblError" style="color: red;"></span>
					</span>
					<div id="img_file"></div>
                                        <div class ="preview" style="display:none">
                                            <img id="imgdivpreview" src="" style="width:250px;height:200px!important;"><br/><br/>
                                        </div> 
                                    </div>



                                    <label class="col-sm-3 control-label" style="margin-left:3%;">Description *</label>
                                    <div class="col-sm-8">
                                        <textarea id="editor1" name="desc" value="<?php echo $description; ?>" placeholder="Terms & Conditions *" ><?php echo $_POST['desc']; ?></textarea>
                                        <span class="help-block"><?php echo $err_tandc; ?></span>
					<div id="cke_desc"></div>
                                    </div>

                                     
                                    <div class="col-sm-12">
                                        <label class="col-sm-3 control-label" style="margin-left:3%;"></label>

                                        <div>
                                            <input type="submit" class="btn btn-success" id="btnUpload" name="submit"  value="Save"/>
                                            <input type="reset" class="btn btn-warning" id="reset" value="Reset" />
                                            <!--<input class="btn btn-warning" Type="button" VALUE="Back" onClick="location.href = 'admin_home.php'"></div>-->
                                    </div>
                                    </div>
                                </form>
    <?php }
?>

                            <br/>
                            <br/>
			    <?php
			    if (!($oper == 'edit')) {
			    ?>
                            <div class="col-md-10" style="margin-top:45px;">
                                <div class="table-responsive">
                                    <table class="table table-striped table-bordered">
                                        <tr class="danger"><th class="text-center">ID</th><th class="text-center">IMAGE</th><th class="text-center">DESCRIPTION</th><th class="text-center">STATUS</th><th class="text-center" colspan="2">Options</th></tr>
                                        <?php
                                        $price_query = mysql_query("select * from tbl_aboutus where fld_delstatus!=2 ");
					$a=0;
                                        while ($price_array = mysql_fetch_array($price_query)) {
                                            $id = $price_array['fld_id'];
                                            $desc = $price_array['fld_about_full_desc'];
                                            $array_status = $price_array['fld_status'];
                                            $profpic = $price_array['fld_aboutus_image'];
					    $a++;
                                            ?>
                                            <tr align="center"><td><?php echo $a; ?></td><td>

                                                    <div class ="preview_edit">
                                                        <img id="imgdivpreview_edit" src="aboutus_image/<?php echo $profpic; ?>" width="250px" height="50px"><br/><br/>

                                                    </div> 
                                                </td>
                                                <td class="detail" ><?php echo $desc; ?></td>
                                                <td>    <?php
                            if ($array_status == "1") {
                                ?><button class="btn btn-success pull-right" id="<?php echo $id; ?>" value="<?php echo $id; ?>" disabled>Activated</button>

        <?php
    } else {
        ?>
                                                        <button class="btn btn-danger  activevideo pull-right" value="<?php echo $id; ?>" >InActive</button>
                                                <?php }
                                            ?>
                                                    </td>
                                                    <td><a href="about_us.php?op=edit&id=<?php echo $id; ?>" attr="<?php echo $id; ?>"><i class="btn btn-info">Edit</i></a>
						</td>
						<td>
                                               <a href="#" id='<?php echo $id;?>' class="del_aboutus"><i class="btn btn-danger">Delete</i></a>
						</td></tr>
                                            <?php }
                                        ?>
                                    </table>

                                </div>

                            </div>
			    <?php } ?>
                        </div>
                    </div>







                </section><!-- /.content -->
            </aside><!-- /.right-side -->
        </div><!-- ./wrapper -->
        <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
        <script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.8.3/jquery.min.js"></script>
	<script type="text/javascript" src="../scripts/validate.min.js"></script>
                <!--<script src="//ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>-->
        <script src="js/bootstrap.min.js" type="text/javascript"></script>
        <!-- AdminLTE App -->
        <script src="js/AdminLTE/app.js" type="text/javascript"></script>

        <script src="//cdn.ckeditor.com/4.4.3/standard/ckeditor.js"></script>




        <!-- AdminLTE for demo purposes -->
	<script type="text/javascript" src="scripts/jquery.form.js"></script>
        <script src="js/AdminLTE/demo.js" type="text/javascript"></script>
        <script type="text/javascript" src="http://code.jquery.com/ui/1.10.3/jquery-ui.js"></script>


        
        <script>
            
             $("#reset").click(function() {
    $(this).closest('form').find("input[type=text], textarea").val("");
    $(this).closest('form').find("input[type=text], select").val("");
    $(this).closest('form').find("input[type=email], textarea").val("");
    $('.preview_edit').remove();
     $('.preview').remove();
    for (instance in CKEDITOR.instances){
        CKEDITOR.instances[instance].setData(" ");
    }
})
            
	    $(function () {
            CKEDITOR.replace('editor1');
            });
	    
            $(function () {
            $(".activevideo").click(function () {

            // alert('hi');

            var id = $(this).attr("value");
            var dataString = 'id=' + id;
            // alert(dataString);


            if (confirm('Are sure, You want to active this record..?')) {
            $.ajax({
            type: "POST",
                    url: "delete_category.php?op=activeimagelist",
                    data: dataString,
                    cache: false,
                    success: function (data)
                    {
		    
                    location.reload();
                    // $("#resumelist").load(window.location + " #resumelist");

                    }

            });
            }
            return false;
            });
            });
	    
	    
            $(function () {
            $(".del_aboutus").click(function () {

            var id = $(this).attr("id");
            var dataString = 'id=' + id;
            if (confirm('Are sure, You want to delete this record.?')) {
            $.ajax({
            type: "POST",
                    url: "delete_category.php?op=statusemployer",
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
            

$("form[name='form_about']").validate({
    ignore: [],
                rules: {
                    desc: {
                        required: function (textarea) {
			CKEDITOR.instances[textarea.id].updateElement(); // update textarea
			var editorcontent = textarea.value.replace(/<[^>]*>/gi, ''); // strip tags
			return editorcontent.length === 0;
		    }
                    },
		    file: {
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
			accept: "png|jpg|gif|jpeg"
		    },
                    status: {
                        required: true
                    }
                },
                messages: {
                   
                },
		errorElement: "label", // can be 'label'
		errorPlacement: function (error, element) {
		    var elementName = $(element).attr('name');
		    if (elementName == 'file') {
			$('#img_' + elementName).after(error);
		    } else if (elementName == 'desc') {
			$('#cke_' + elementName).after(error);
		    } else {
			element.after(error);
		    }
		},
//                submitHandler: function (form) {
//                    if (confirm("Are you sure, do you want to create?")) {
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
		var width = this.width;
		var height = this.height;
		 if (width >= '680' && height >= '460') {
		    $('.preview').css({'display': 'block'});
		    $('#imgdivpreview').attr('src', e.target.result);
		}
		else {
		    $('.preview').css({'display': 'none'});
		    $('.filediv').html('<input type="file" data-filename-placement="inside" id="file" onchange="preview_image(this);" name="file"><span class="file-custom"><span id="lblError" style="color: red;"></span>');
		    var msg = "Please give vaild dimensions above(680 * 460)";
//                    alert("Please give vaild dimensions above(680 * 460)");
		    $('#lblError').text(msg);
		    $("#lblError").fadeOut(3500);
		}
	    }
           }
         reader.readAsDataURL(input.files[0]);
        }
    }
    function preview_edit_image(input) {

            if (input.files && input.files[0]) {
            var reader = new FileReader();
            var imge_edit = new Image();
            reader.onload = function (e) {
            imge_edit.src = e.target.result;
            imge_edit.onload = function () {
		var width = this.width;
		var height = this.height;
		if (width >= '680' && height >= '460') {
		    $('.preview_edit').css({'display': 'block'});
		    $('#imgdivpreview_edit').attr('src', e.target.result);
		}else
		{
		    $('.preview_edit').css({'display': 'none'});
		    $('.filediv_edit').html('<input type="file" data-filename-placement="inside" id="file1" onchange="preview_edit_image(this);" name="file"><span id="lblError1" style="color: red;"></span>');
		    var msg = "Please give vaild dimensions above(680 * 460)";
                    //alert("Please give vaild dimensions above(680 * 460)");
		    $('#lblError1').text(msg);
//		    $("#lblError1").fadeOut(3500);
            }
	}
            }
            reader.readAsDataURL(input.files[0]);
            }
            }
        </script>



    </body>
</html>
