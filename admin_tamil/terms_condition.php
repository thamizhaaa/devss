<?php
error_reporting(0);

include "admin_session.php";

if(isset($_POST['submit'])) {

	$tandc = $_POST['tandc'];
        $date = date('Y-m-d');
	if ($tandc == "")
	$err_tandc = "Enter Terms and Conditions";
	$errors .= $err_tandc;
	
	$validation_check = "";
	if(isset($errors))
	$validation_check .= $errors;
	
	if(!$validation_check) {
		
		$indus_query ="INSERT INTO `tbl_termsandcondition`( `fld_terms`,`fld_created_date`) VALUES ('$tandc','$date')";
                //echo $indus_query;
                $sql_query = mysql_query($indus_query);
                if($sql_query)
                {
	?>
	<script>
	alert("Terms & condition added Successfully");
	window.location = "terms_condition.php";
	</script>
<?php	
	}
        }
}

?>
     
<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title>AdminLTE | Terms & Conditions</title>
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
                        Front Page Management
                        <!--<small>it all starts here</small>-->
                    </h1>
                    <ol class="breadcrumb">
                        <li><a href="admin_home.php"><i class="fa fa-dashboard"></i> Home</a></li><li class="active">Front Page Management</li><li class="active">Terms & Condition</li>
                    </ol>
                </section>

                <!-- Main content -->
                <section class="content">
					
                    <div class="panel panel-default">
<div class="panel-heading"><h3 class="panel-title">Terms & Conditions</h3></div>
<div class="panel-body">
<form class="form_top_space" action="" method="post">

<label class="col-sm-3 control-label" style="margin-left:3%;">Terms & Conditions *</label>
<div class="col-sm-8">
<textarea id="editor1" name="tandc"  placeholder="Terms & Conditions" ><?php echo $_POST['tandc']; ?></textarea>
<span class="help-block"><?php echo $err_tandc; ?></span>
</div>

<div class="col-sm-12">
<label class="col-sm-3 control-label" style="margin-left:3%;"></label>
<div><input type="submit" class="btn btn-warning" name="submit"  value="Save"/>
<input type="reset" class="btn btn-warning" value="Reset" />
<!--<input class="btn btn-warning" Type="button" VALUE="Back" onClick="location.href='admin_home.php'"></div>-->
</div>
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
        
         <script src="//cdn.ckeditor.com/4.4.3/standard/ckeditor.js"></script>
         
          <script type="text/javascript">
            $(function() {
                // Replace the <textarea id="editor1"> with a CKEditor
                // instance, using default configuration.
                CKEDITOR.replace('editor1');
                //bootstrap WYSIHTML5 - text editor
                
            });
        </script>

        <!-- AdminLTE for demo purposes -->
        <script src="js/AdminLTE/demo.js" type="text/javascript"></script>
          
		
    </body>
</html>
