<?php
error_reporting(0);
include "admin_session.php";
//print_r($_REQUEST['id']);
?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title>interview Tips Management | StaffingSpot</title>
        <meta content='width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no' name='viewport'>
        <link href="css/bootstrap.min.css" rel="stylesheet" type="text/css" />
        <link href="//cdnjs.cloudflare.com/ajax/libs/font-awesome/4.1.0/css/font-awesome.min.css" rel="stylesheet" type="text/css" />
        <!-- Ionicons -->
        <link href="//code.ionicframework.com/ionicons/1.5.2/css/ionicons.min.css" rel="stylesheet" type="text/css" />
        <!-- Theme style -->
        <link href="css/AdminLTE.css" rel="stylesheet" type="text/css" />
        <!--<link href="css/bootstrap-wysihtml5/bootstrap3-wysihtml5.min.css" rel="stylesheet" type="text/css" />-->
        <!--<link href="css/bootstrap-wysihtml5/bootstrap3-wysihtml5.min.css" rel="stylesheet" type="text/css" />-->
        <link href="../scripts/ddl/jquery.flexdatalist.css" rel="stylesheet" type="text/css">
<link href="../scripts/ddl/jquery.flexdatalist.min.css" rel="stylesheet" type="text/css">
      
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
            
            <aside class="right-side">
                <!-- Content Header (Page header) -->
                <section class="content-header">
                    <h1>
                       Interview Tips
                        <!--<small>It all starts here</small>-->
                    </h1>
                    <ol class="breadcrumb">
                        <li><a href="admin_home.php"><i class="fa fa-dashboard"></i> Home</a></li><li class="active">Front Page Management</li><li class="active">Interview  Tips</li>
                    </ol>
                </section>
        <style>
        .err_txt{
            color: red;
        }
        </style>    
     
        
        
  

                        <?php
                        $interview_id = $_REQUEST['interview_id'];
//                        echo $resumeid;
                        $sql="select * from tbl_interview_tips where  fld_id=$interview_id";
//                        echo "select * from tbl_resume_tips where  fld_id=$resumeid";
                        $res=mysql_query($sql);
                       while($rows=mysql_fetch_assoc($res))
                       {
                        $interview_title = $rows['fld_interview_title'];
                        $interview_desc = $rows['fld_interview_description'];
                        $interview_status = $rows['fld_interview_status'];
//                        echo $resume_title;
                       }?>
                              
                    
                <div class="col-md-12 col-sm-12 col-xs-12">     
                        <form  class="form-horizontal" method="POST" id="form_edit" name="form_edit" >
                       	
                        <div class="col-md-12 col-sm-12 col-xs-12">
                            <h4 class="modal-title" id="myModalLabel">Edit/Update Interview Tips  Details</h4>
                            <hr>
                        </div>
                            
                        <div class="col-md-12 col-sm-12 col-xs-12">
                            <div class="form-group">
                                <label class="col-sm-4 control-label">Interview tips title <span class="required">*</span></label>
                                <div class="col-sm-6">
                                    <input id="title" name="title" placeholder="Enter The Title" class="form-control" type="text" value="<?php echo $interview_title; ?>">
                                    <span class="err_txt help-block" id="err" style="display:none;">This field is required</span>
                                </div>
                            </div>
                        </div>
                            
                        <div class="col-md-12 col-sm-12 col-xs-12">
                            <div class="form-group">
                                    <label class="col-sm-4 control-label">Interview tips Description<span class="required">*</span></label>
                                    <div class="col-sm-6">
					<textarea id="test" name="test" class="ckeditor" >
                                    <?php echo $interview_desc; ?></textarea>
                                    <span class="err_txt help-block" id="err2" style="display:none;">This field is required</span>
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
                                            } elseif ($interview_status == 1) {
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
                                            } elseif ($interview_status == 0) {
                                                ?> selected="selected"
                                                <?php
                                            }
                                            ?>>InActive
                                    </option>
                                </select>
                                </div>
                            </div>
                        </div>
			</form>
                
                </div>
                      
              <div class="col-md-12 col-sm-12 col-xs-12">
                        <div class="modal-footer">
                            <input id="updateinterview"  type="button" name="submit" class="btn btn-success resume-btn mob-btn btn-left"  value ="Save">  
                            <input type="reset" class="btn btn-warning resume-btn mob-btn btn-left" value="Reset" />
                            <INPUT class="btn btn-warning resume-btn mob-btn btn-left" Type="button" VALUE="Back" onClick="location.href = 'interview_tips.php'"/>
                            <!--<input class="btn btn-warning" Type="button" VALUE="Back" onClick="location.href ='interview_tips.php'">-->
                       </div> 
                   
                </div>
        
                </div>  
         </form>
            </aside>
        </div>
                

                    <?php         
                     //}
                    ?>
      
        
        
        
         <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.0/jquery.min.js"></script>
<script type="text/javascript" src="scripts/validate.min.js"></script>  
 <script src="//cdn.ckeditor.com/4.4.3/standard/ckeditor.js"></script>
<script src="../js/plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.all.min.js" type="text/javascript"></script>
<script type = "text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.8.3/jquery.min.js"></script>
<script src="../scripts/ddl/jquery.flexdatalist.min.js"></script>
<script src="../scripts/ddl/jquery.flexdatalist.js"></script>
<!-- shifting across different page -->
<script src="js/bootstrap.min.js" type="text/javascript"></script>
<!-- AdminLTE App -->
<script src="js/AdminLTE/app.js" type="text/javascript"></script> 
        
  <script src="//cdn.ckeditor.com/4.5.5/standard/ckeditor.js"></script>      
	<script>
    $("#reset").click(function() {
//	$(this).closest('form_edit').find("input[type=text], textarea").val('');
        
	CKEDITOR.instances['test'].setData('');
    
	$('input[type=text]').val('');  
	$('input[type=select]').val('');
});
   </script>
   <script>
//        $("#form").trigger('reset');
    function clearText() {
        // set text box reference
        var tb = document.getElementById('form_edit');
        // clear text box
        tb.value = '';
    }

    </script>
<script>
$(document).ready(function () {
//          $(function () {       
    $('#updateinterview').click(function()
    { 
                
                var title = $("#title").val();
	var desc = CKEDITOR.instances['test'].getData();
	
	
	var interview_id = '<?php echo $interview_id; ?> ';
	
	var status = $("#status").val();
		
                if(title == "" )
                {
                $('#err').show();
                $('#err').fadeOut(3000);
                }
                
                else if(desc == "" )
                {
                $('#err2').show();
                 $('#err2').fadeOut(3000);
                }
         else {
	     
            var dataString = '&title='+ title + '&desc='+ desc + '&status='+status+'&interview_id='+interview_id;
            $.ajax({
                    type: "POST",
                    url: "ajaxdel.php?op=interview",
                    data: dataString,
                    cache: false,
                    success: function(result){
                     alert('Updated Successfully');
                     window.location.href = "interview_tips.php";
                    }
                    });
         }         
                
                });
//                });
                });
                
</script>
<script>
                
    $(document).ready(function () {

	$('input[type=file]').bootstrapFileInput();
	$('.file-inputs').bootstrapFileInput();

            });
        </script>
    <script>
$(document).ready(function() {
    setTimeout('$(".err_txt").fadeOut()',3500);
  });
</script>
               

