<?php error_reporting(0);
include "admin_session.php"; 

if(isset($_POST['submit'])) {
	
	$subject = $_POST['header'];
	$content = $_POST['contents'];
	$footer = $_POST['footers'];
	
	if($subject == "")
	$err_subject = "This field is required";
	
	if($content == "")
	$err_content = "This field is required";
	
	if($footer == "")
	$err_footer = "This field is required";
	
	$error .= $err_subject.$err_content.$err_footer;
	
	$validation = "";
	if(isset($error))
	$validation .= $error;
	
	if(!$validation) {
	  
//	  $query = mysql_query("insert into email_content(header,content,footer,processfor)values('".$subject."','".$content."','".$footer."','emp_reg')");	
          $query = mysql_query("UPDATE `tbl_email_content` SET `fld_header`='".$subject."',`fld_content`='".$content."',`fld_footer`='".$footer."',`fld_modified_date`='". date('Y/m/d H:i:s')."' WHERE `fld_processfor`='emp_forget_password'");
		?><script>
            alert("Updated Successfully");
            window.location = "forget_empcontent.php";
        </script><?php
	
	}
	
}


?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title>Email Content | StaffingSpot</title>
        <meta content='width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no' name='viewport'>
        <link href="css/bootstrap.min.css" rel="stylesheet" type="text/css" />
        <link href="//cdnjs.cloudflare.com/ajax/libs/font-awesome/4.1.0/css/font-awesome.min.css" rel="stylesheet" type="text/css" />
        <!-- Ionicons -->
        <link href="//code.ionicframework.com/ionicons/1.5.2/css/ionicons.min.css" rel="stylesheet" type="text/css" />
        <!-- Theme style -->
        <link href="css/AdminLTE.css" rel="stylesheet" type="text/css" />
        
        <link href="css/bootstrap-wysihtml5/bootstrap3-wysihtml5.min.css" rel="stylesheet" type="text/css" />
        <style>
		.help-block {
		color:#F00;	
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
                        Email Content Management
<!--                        <small>it all starts here</small>-->
                    </h1>
                    <ol class="breadcrumb">
                        <li><a href="admin_home.php"><i class="fa fa-dashboard"></i> Home</a></li>                        
                        <li class="active">Email Content Management</li>
                        <li class="active">Employer Forgot Password  Content Master</li>
                    </ol>
                </section>

                <!-- Main content -->
                <section class="content">
					
                    <?php 
                        $query = mysql_query("select * from  tbl_email_content where fld_id=7");
                        $query_details = mysql_fetch_array($query);
                        $header = $query_details['fld_header'];
                        $content = $query_details['fld_content'];
                        $footer = $query_details['fld_footer'];
                        
                        ?>		
                    <div class="panel panel-default" id="post-close-updates-form form">
<div class="panel-heading"><h3 class="panel-title">Employer Forgot Password Content Master</h3></div>
<div class="panel-body">
<form class="form_top_space" id="form" action="" method="post" enctype="multipart/form-data" role="form">
<div class="form-group">
    <label >Header *</label>
    <input name="header" class="form-control" type="text" placeholder="Enter the mail subject" value="<?php echo $header; ?>" >
    <span class="help-block"><?php echo $err_subject; ?></span>
  </div>
<div class="form-group"  >
    <label >Email Content *</label>
    <textarea type="text" id="editor2" name="contents" class="form-control" placeholder="E-Mail Body Content for job seeker registration" style="width: 100%; height: 125px; font-size: 14px; line-height: 18px; border: 1px solid #dddddd; padding: 10px;"><?php echo $content; ?></textarea>
    <span class="help-block"><?php echo $err_content; ?></span>
  </div>
<!--  <div class="form-group">
    <label >User Name : XXXXXXXXXXXXXXX</label><br>
    <label >Password : XXXXXXXXXXXXXXX</label>
  </div>-->
<div class="form-group">
    <label >Footer *</label>
    <textarea type="text" id="editor3" name="footers" class="form-control" value="<?php echo $footer; ?>" placeholder="Your's Faithfully,xxxxxxx" style="width: 100%; height: 125px; font-size: 14px; line-height: 18px; border: 1px solid #dddddd; padding: 10px;"></textarea>
    <span class="help-block"><?php echo $err_footer; ?></span>
  </div>
<input type="submit" name="submit" class="btn btn-success"  value="Save"/>
<input type="reset" name='reset'  class="btn btn-warning" id="reset" value="Reset" />
<!--<input type="reset" id="reset" class="btn btn-warning" value="Reset" />-->
</form>


<br/>
<br/>

<div class="col-md-10" style="margin-top:45px;">


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
        <script src="//cdn.ckeditor.com/4.4.3/standard/ckeditor.js"></script>
        
        
        
<script>
CKEDITOR.replace( 'contents' );
CKEDITOR.replace( 'footers' );
</script>
        
 
<script type="text/javascript">
$(document).ready(function() {
setTimeout('$(".help-block").fadeOut()',1000);
});
</script>
<!--<script>
    $("#reset").live('click',function(){
     $(this).parents('form').find('input[type="text"]').val('');
});

</script>-->
<script>
//    $("#reset").click(function() {
//        //CKEDITOR.replace( '#editor3' );
//     var te = $('#editor3').val();
//     alert(te);
//
//
//)};

$( "#reset" ).click(function() {
   $editors.each(function() { 
//            var editorID = $(this).attr("id"); 
            var te = $('#editor3').val(); 
            var instance = CKEDITOR.instances[te]; 
            if (instance) { CKEDITOR.remove(instance); } 
  }
});
   </script>
<script>

//    function clearText() {
//        // set text box reference
//        var tb = document.getElementById('form');
//        // clear text box
//        tb.value = '';
//       
//        $("#post-close-updates-form form")[0].reset();
//        for (instance in CKEDITOR.instances){
//        CKEDITOR.instances[instance].clearText();
//        }
//    }
        
    </script>

 <!--<script src="js/plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.all.min.js" type="text/javascript"></script>-->
 <!--<script>
    $("#editor2").wysihtml5();
    $("#editor3").wysihtml5();
    </script>-->
    </body>
</html>
