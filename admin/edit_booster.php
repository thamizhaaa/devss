<?php
error_reporting(0);
include "admin_session.php";
$i = $_REQUEST['id'];

if ($i != "") {
    
    $edit_query = mysql_query("select * from tbl_booster where fld_id='" . $i . "'");
    $edit_array = mysql_fetch_array($edit_query);
    $type = $edit_array['fld_customer_type'];
    $edit_view = $edit_array['fld_view_price'];
    $edit_resume = $edit_array['fld_download_price'];
    $edit_postjob = $edit_array['fld_postjob_price'];
    $edit_status = $edit_array['fld_status'];

}

 
    if (isset($_POST['submit'])) {


    $customer_type = $_POST['customer_type'];
    $resume_price = $_POST['resume_price'];
    $view_price = $_POST['view_price'];
    $postjob_price = $_POST['postjob_price'];
    $status = $_POST['status'];

    if ($customer_type == '') {
    
        $err_customer_type = "This field is required.";
    } else if ($e_sq == 1) {
        ?>

        <?php
        $err_customer_type = "$type is already in use.";
    }

    if ($resume_price=='' && $view_price=='' && $postjob_price==''){
        $err_price_view = 'Fill atleast one';
    }

   
    $error .= $err_customer_type . $err_price_view;

    $validation_check = "";

    if (isset($error))
        $validation_check.=$error;
    
    
    
    if (!$validation_check) {
    

    $query = mysql_query("update tbl_booster set fld_customer_type='" . $customer_type . "',fld_view_price='" . $view_price . "',fld_download_price='" . $resume_price . "',fld_postjob_price='" . $postjob_price . "',fld_status='".$status."' where fld_id='" . $i . "'");

    
    ?>
    <script>
        alert("Updated Successfully");
        window.location = "booster.php";
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
                        Pricing Management

                    </h1>
                    <ol class="breadcrumb">
                       <li><a href="admin_home.php"><i class="fa fa-dashboard"></i> Home</a></li> <li class="active">Pricing Management</li> <li class="active">Booster </li>
                    </ol>
                </section>

                <!-- Main content -->
                <section class="content">

                    <div class="panel panel-default">
                        <div class="panel-heading "><h3 class="panel-title">Edit Booster</h3></div>
                        <div class="panel-body">
                            <form action="" method="post" class="col-md-12 col-sm-12 col-xs-12" enctype="multipart/form-data">
                                <div class="col-md-12 col-sm-12 col-xs-12">

                                    <div class="form-group">
                                        <label for="Customer Type" class="col-sm-12 control-label">Booster</label>
                                        <div class="col-sm-12">
                                            <input name="customer_type" id="customer_type" type="text"  class="form-control" value="<?php echo $type; ?>" placeholder="Enter your Booster Type">   
                                        <span class="err_txt help-block"><?php echo $err_customer_type ; ?></span>
                                        </div>                                 
                                    </div>

                                </div>
                               
                                <div class="col-md-12 col-sm-12 col-xs-12">
                                    <div class="form-group">

                                        <label class="col-sm-12 control-label">View Price *</label>
                                        <div class="col-sm-12">
                                            <input type="text" onkeypress="javascript:return isNumber(event)" id="price1" class="form-control" name="view_price" placeholder="View Price  *" value="<?php echo $edit_view; ?>" />
                                            <!--<span class="err_txt help-block"><?php echo $err_view; ?></span>-->
                                        </div>
                                    </div>
                                </div>
                                
                                <div class="col-md-12 col-sm-12 col-xs-12">
                                    <div class="form-group">
                                
                                        <label class="col-sm-12 control-label">Resume Price *</label>
                                        <div class="col-sm-12"><input type="text" class="form-control" name="resume_price"  placeholder="Resume Price *" value="<?php echo $edit_resume; ?>"/>
					    <!--<span class="err_txt help-block"><?php echo $err_resume; ?></span>-->
					</div>


                                    </div>
                                </div>
                                
                                <div class="col-md-12 col-sm-12 col-xs-12">
                                    <div class="form-group">

                                        <label class="col-sm-12 control-label">PostJob Price *</label>
                                        <div class="col-sm-12"><input type="text" name="postjob_price" class="form-control" placeholder="PostJob Price  *" value="<?php echo $edit_postjob; ?>"/>
					    <span class="err_txt help-block"><?php echo $err_price_view; ?></span>
					</div>

                                    </div>
                                </div>
				
				<div class="col-md-12 col-sm-12 col-xs-12">
                                    <div class="form-group">
                                        <label for="Booster Status" class="col-sm-12 control-label">Booster Status:<span class="required"> *</span></label>
                                        <div class="col-sm-12">
                                            <select id="status" name="status" class="form-control">
						<option value="1" 
						<?php
						if (isset($_POST['status']) && $_POST['status']!='' && $_POST['status'] == 1) {
						    ?> selected="selected"
							    <?php
							} elseif ($edit_status == 1) {
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
							} elseif ($edit_status == 0) {
							    ?> selected="selected"
							    <?php
							}
							?>>InActive
						</option>
					    </select>
					</div> 
                                    </div>
                                </div>

                       
                        
                            <div class="col-sm-12">
                                <div class="form-group">
                            
                                    <div class="col-sm-12">
                                        <br />
                                        <input type="submit" class="btn btn-success mob-btn resume-btn mob-btn-1" name="submit"  value="Save"/>

                                        <a class="btn btn-warning mob-btn resume-btn mob-btn-1" style="text-decoration:none;" href="booster.php">Back</a>
                                </div>
                            </div>
                        </div>

                        </form>


                        <br/>
                        <br/>

                        
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
<!--        <script>
        $(document).ready(function () {
            setTimeout('$(".err_txt").fadeOut()', 3500);
        });
        </script>-->
        
        <script>
           
        $(document).ready(function () {
            // setTimeout('$(".err_txt").fadeOut()', 3500); // Changed this option since, after fadeout all fields collapsed together -Rakesh 
             
            /* rakesh */ 
            // setTimeout('$(".err_txt").css("visibility", "hidden")', 3500);
            setTimeout('$(".err_txt").html("")', 3500);
            /* rakesh */
        });
	
	function isNumber(evt) {
    var iKeyCode = (evt.which) ? evt.which : evt.keyCode
    if (iKeyCode != 46 && iKeyCode > 31 && (iKeyCode < 48 || iKeyCode > 57))
        return false;

    return true;
}
$('#price1,#price2,#price3').bind("cut copy paste",function(e) {
	      e.preventDefault();
	  }); 
        </script>
    </body>
</html>
