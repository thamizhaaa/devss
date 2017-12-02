<?php 
error_reporting(0);
include "admin_session.php";
$i = $_REQUEST['id'];

if($i != ""){
 $edit_query = mysql_query("select * from tbl_package_price where fld_id='".$i."'");
 $edit_array = mysql_fetch_array($edit_query);
	
	$edit_pname = $edit_array['fld_pname'];
	$edit_pprice = $edit_array['fld_pprice'];
	$edit_vperiod = $edit_array['fld_val_period'];
	$edit_resume_down = $edit_array['fld_resume_download'];
	$edit_no_posting = $edit_array['fld_no_posting'];
 
 	
}

if(isset($_POST['submit'])) {
	
	$pname = $_POST['pname'];
	$pprice = $_POST['pprice'];
	$pdesc = $_POST['pdesc'];
	$terms_cond = $_POST['terms_cond'];
	$vperiod = $_POST['vperiod'];
	$order_disp = $_POST['order_disp'];
	$resume_down = $_POST['resume_down'];
	$no_posting = $_POST['no_posting'];
	$no_users = $_POST['no_users'];
	
	
	if ($pname == "") 
	$err_pname = "Valid Package Name is required.        ";
	
	if(!empty($pprice)){
		
		if(preg_match('/^-?(?:\d+|\d*\.\d+)$/', $pprice)) {
				
				$pprice = $pprice;
				
		} else {	
			$err_ppprice = 'Only Numeric values allowed';
		}
	} else {
			$err_ppprice = 'Provide Package Price';		
	}
	
		
		if(!is_numeric($vperiod))
		$err_vperiod = 'Only Numeric values';
		
		

		if(!is_numeric($resume_down))
		$err_resume_down = 'Only Numeric values';
		
		if(!is_numeric($no_posting))
		$err_no_posting = 'Only Numeric values';

		
	
	
	$error .= $err_pname.$err_ppprice.$err_vperiod.$err_resume_down.$err_no_posting;
	
	$validation_check = "";
	
	if(isset($error)) 
	$validation_check.=$error; 
	
	
	if (!$validation_check) {
	
	
	
  /*$query =	mysql_query("INSERT INTO package_price(pname,pprice,p_des,terms_cond,val_period,order_dis,resume_download,no_posting,no_users)VALUES('".$pname."','".$pprice."','".$pdesc."','".$terms_cond."','".$vperiod."','".$order_disp."','".$resume_down."','".$no_posting."','".$no_users."')");*/
  $query =	mysql_query("update tbl_package_price set fld_pname='".$pname."',fld_pprice='".$pprice."',fld_val_period='".$vperiod."',fld_resume_download='".$resume_down."',fld_no_posting='".$no_posting."' where fld_id='".$i."'");
?>
<script>
alert("<?php echo $pname." "."Package Updated Successfully" ?>");
window.location = "mem_priceform.php";
</script>
<?php  
  		
	}
}
 ?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title>Price Management | StaffingSpot</title>
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
            .err_txt{
                color: red;
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
                        Package Pricing Management
                        <small>it all starts here</small>
                    </h1>
                    <ol class="breadcrumb">
                        <li><a href="admin_home.php"><i class="fa fa-dashboard"></i> Home</a></li>                        <li class="active">Package Pricing</li>
                    </ol>
                </section>

                <!-- Main content -->
                <section class="content">
					
                    <div class="panel panel-default">
<div class="panel-heading "><h3 class="panel-title">Package Pricing Management</h3></div>
<div class="panel-body">
<form class="form-horizontal" action="" method="post" enctype="multipart/form-data">

 <div class="form-group clr_both">
 <label class="col-sm-2 control-label" style="margin-left:3%;">Package Name *</label>
<div class="col-sm-3"><input type="text" class="form-control" name="pname" placeholder="Package Name *" value="<?php echo $edit_pname; ?>"/><span class="err_txt help-block"><?php echo $err_pname ; ?>
</span></div>

 <label class="col-sm-2 control-label" style="margin-left:3%;">Package Price *</label>
<div class="col-sm-3"><input type="text" class="form-control" name="pprice"  placeholder="Package Price *" value="<?php echo $edit_pprice; ?>"/><span class="err_txt"><?php echo $err_ppprice ; ?></span></div>
</div>

 

 <div class="form-group clr_both">
 <label class="col-sm-2 control-label" style="margin-left:3%;">Validity Period *</label>
<div class="col-sm-3"><input type="text" name="vperiod" class="form-control" placeholder="Validity Period *" value="<?php echo $edit_vperiod; ?>"/><span class="err_txt"><?php echo $err_vperiod; ?></span></div>
<label class="col-sm-2 control-label" style="margin-left:3%;">Resume Downloaded *</label>
<div class="col-sm-3"><input type="text" class="form-control" name="resume_down" placeholder="Resume Downloaded  *" value="<?php echo $edit_resume_down; ?>" /><span class="err_txt"><?php echo $err_resume_down; ?></span></div>
</div>

 <div class="form-group clr_both">
  <label class="col-sm-2 control-label" style="margin-left:3%;">No of Posting *</label>
<div class="col-sm-3"><input type="text" class="form-control" name="no_posting" placeholder="No of Posting  *" value="<?php echo $edit_no_posting; ?>" /><span class="err_txt"><?php echo $err_no_posting; ?></span>
</div>

</div>
<div class="form-group clr_both">
<label class="col-sm-2 control-label clr_both" style="margin-left:3%;"></label>
<div class="col-sm-4">
<input type="submit" class="btn btn-warning" name="submit"  value="Update Package"/>
<input type="reset" class="btn btn-warning" name="reset"  value="Reset"/>
<a class="btn btn-warning" style="text-decoration:none;" href="mem_priceform.php">Back</a>
</div>
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
        <!-- AdminLTE for demo purposes -->
        <script src="js/AdminLTE/demo.js" type="text/javascript"></script>
        <script>
            $(document).ready(function() {
                setTimeout('$(".err_txt").fadeOut()',3500);
              });
            </script>
    </body>
</html>
