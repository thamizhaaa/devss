<?php
error_reporting(0);
include "admin_session.php";

if (isset($_POST['submit'])) {

    $customer_type = $_POST['customer_type'];
    $price_view = $_POST['price_view'];
    $price_download = $_POST['price_download'];
    $price_post = $_POST['price_post'];
    $status = $_POST['status'];



    $e_query = mysql_query("select fld_id from tbl_booster where fld_customer_type='$customer_type' and fld_delstatus!=2");
    $e_sq = mysql_num_rows($e_query);
    if ($customer_type == '') {
        
        $err_customer_type = "This field is required";
    } else if ($e_sq > 0) {
        ?>

        <?php
        $err_customer_type = "$customer_type is already in use.";
    }


    if ($price_view=='' && $price_download=='' && $price_post==''){
        $err_price_view = 'Fill atleast one';
    }

    $error .= $err_customer_type . $err_price_view;

    $validation_check = "";

    if (isset($error))
        $validation_check.=$error;

    

    if (!$validation_check) {

        $query = mysql_query("INSERT INTO tbl_booster(fld_customer_type,fld_view_price,fld_download_price,fld_postjob_price,fld_status)VALUES('" . $customer_type . "','" . $price_view . "','" . $price_download . "','" . $price_post . "','".$status."')");
        ?>
        <script>
            alert("Saved Successfully");
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
        <title>Booster Management | StaffingSpot</title>
        <meta content='width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no' name='viewport'>
        <link href="css/bootstrap.min.css" rel="stylesheet" type="text/css" />
        <link href="//cdnjs.cloudflare.com/ajax/libs/font-awesome/4.1.0/css/font-awesome.min.css" rel="stylesheet" type="text/css" />
        <!-- Ionicons -->
        <link href="//code.ionicframework.com/ionicons/1.5.2/css/ionicons.min.css" rel="stylesheet" type="text/css" />
        <!-- Theme style -->
        <link href="css/AdminLTE.css" rel="stylesheet" type="text/css" />


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
                        <div class="panel-heading"><h3 class="panel-title">Booster </h3></div>
                        <div class="panel-body">
      
                            <form method="post" action="" name='booster' enctype="multipart/form-data">
                                <div class="col-md-12 col-sm-12 col-xs-12">
                                    <div class="form-group">
                                        <label for="Customer Type" class="col-sm-5 control-label">Booster Type : <span class="required"> *</span></label>
                                        <div class="col-sm-4">
                                            <input name="customer_type"  id="customer_type" type="text" class="form-control" placeholder="Enter your Booster Type" >
                                            <span class="err_txt help-block"><?php echo $err_customer_type ; ?></span>
                                        </div>  
                                    </div>
                                </div>
                                &nbsp;
                                <div class="col-md-12 col-sm-12 col-xs-12">
                                    <div class="form-group">
                                        <label class="col-sm-5 control-label">Resume View : </label>
                                        <div class="col-sm-2">
                                            <input name="view" id="num1" type="text" value="1" disabled="" class="form-control">
                                            <input name="view_price" required id="view_price" type="hidden" class="form-control" >
                                            
                                        </div>
                                        <div class="col-sm-3">
                                            <input onkeypress="javascript:return isNumber(event)" id="price1" name="price_view" type="text" class="form-control">
                                        </div>
                                    </div>
                                </div>

                                <div class="col-md-12 col-sm-12 col-xs-12">
                                    <div class="form-group">
                                        <label class="col-sm-5 control-label">Resume Download : </label>
                                        <div class="col-sm-2">
                                            <input name="download" id="num2" value="1" disabled="" class="form-control">
                                            <input name="download_price" required id="download_price" type="hidden"   class="form-control">
                                        </div>
                                        <div class="col-sm-3">
                                            <input onkeypress="javascript:return isNumber(event)" id="price2" name="price_download" type="text" class="form-control">
                                        </div>
                                    </div>
                                </div>

                                <div class="col-md-12 col-sm-12 col-xs-12">
                                    <div class="form-group">
                                        <label class="col-sm-5 control-label">Post Job : </label>
                                        <div class="col-sm-2">
                                            <input name="job" id="num3" value="1" disabled="" class="form-control">
                                            <input name="post_price" required id="post_price" type="hidden"   class="form-control">
                                        </div>
                                        <div class="col-sm-3">
                                            <input onkeypress="javascript:return isNumber(event)" id="price3" name="price_post" type="text" class="form-control">
                                            <span class="err_txt help-block"><?php echo $err_price_view;?></span>
                                        </div>
                                    </div>
                                </div>
				
                                &nbsp;

				<div class="col-md-12 col-sm-12 col-xs-12" style="margin-top:1%">
                                    <div class="form-group">
                                        <label for="Booster Status" class="col-sm-5 control-label">Booster Status:<span class="required"> *</span></label>
                                        <div class="col-sm-4">
                                            <select id="status" name="status" class="form-control">
						<option value="1" 
						<?php
						if (isset($_POST['status']) && $_POST['status']!='' && $_POST['status'] == 1) {
						    ?> selected="selected"
							    <?php
							} 
							?>>Active
						</option>
						<option value="0" 
						<?php
						if (isset($_POST['status']) && $_POST['status']!='' && $_POST['status'] == 0) {
						    ?> selected="selected"
							    <?php
							} 
							?>>InActive
						</option>
					    </select>
                                            
                                        </div> 
                                    </div>
                                </div>
				
                                

                                <br/>
                                <br/>

                                <label class="col-sm-2 control-label clr_both" style="margin-left:13%;"></label>
                                <div class="col-sm-4">
                                    <input type="submit" class="btn btn-success" name="submit"  value="Save"/>
                                    <input type="reset" class="btn btn-warning" name="reset"  value="Reset"/>
<!--                                    <a class="btn btn-warning" style="text-decoration:none;" href="admin_home.php">Back</a>-->
                                </div>
                            </form>     


                            <br/>
                            <br/>

                            <div class="col-md-10" style="margin-top:45px;">
                                <div class="table-responsive">
                                    <table class="table table-striped table-bordered">
                                        <tr class="danger"><th class="text-center">ID</th><th class="text-center">BOOSTER TYPE</th><th class="text-center">VIEW PRICE</th><th class="text-center">RESUME PRICE</th><th class="text-center">POSTJOB PRICE</th><th class="text-center">STATUS</th><th class="text-center" colspan="2">OPTIONS</th></tr>
<?php

$pagin_query =mysql_query("select count(*) as total from tbl_booster where fld_delstatus!=2");
$pagin_row=mysql_fetch_array($pagin_query);
$total=$pagin_row['total'];
$dis=10;
$total_page=ceil($total/$dis);
$page_cur=(isset($_GET['page']))?$_GET['page']:1;
$k=($page_cur-1)*$dis;


  $a = $k+1;
$price_query = mysql_query("select * from tbl_booster where fld_delstatus!=2 limit $k,$dis");
while ($price_array = mysql_fetch_array($price_query)) {
  
    $id = $price_array['fld_id'];
    $name = $price_array['fld_customer_type'];
    $price = $price_array['fld_view_price'];
    $valdity = $price_array['fld_download_price'];
    $resume = $price_array['fld_postjob_price'];
    $status = $price_array['fld_status'];
    ?>
                                            <tr align="center">
						<td><?php echo $a; ?></td>
						<td><?php echo $name; ?></td>
						<td><?php echo $price; ?></td>
						<td><?php echo $valdity; ?></td>
						<td><?php echo $resume; ?></td>
						<td><?php 
						if($status==1){
						    echo 'Active';
						}else{
						    echo 'Inactive';
						}
						
						?></td>
						<td><a href="edit_booster.php?id=<?php echo $id; ?>">Edit</a></td>
						<td>
						    <a href="#" onclick="if (confirm('Are sure,you want to delete?'))
                                                        window.location = 'delete_booster.php?id=<?php echo $id; ?>';">Delete</a>
						</td>
					    </tr>
                                                <?php 
						$a++;
						} ?>
                                    </table>
<?php if ($total > $dis) { ?>
                                    <nav>
                                        <ul class="pager">
                                            <?php if ($page_cur > 1) { ?>
                                                <li class="previous"><a href="booster.php?page=<?php echo ($page_cur - 1); ?>"><span aria-hidden="true">&larr;</span>Prev</a></li>
                                            <?php } else { ?>
                                                <li class="previous"><a>Prev</a></li>
					    <?php
					    }
                                            if ($page_cur < $total_page) {
                                                ?>

                                                <li class="next"><a href="booster.php?page=<?php echo ($page_cur + 1); ?>">Next<span aria-hidden="true">&rarr;</span></a></li>
                                            <?php } else { ?>

                                                <li class="next" ><a>Next</a></li>
                                                <?php } ?>

                                        </ul>
                                    </nav>
                                <?php } ?>
				    
				    
                                </div>






                            </div>
                        </div>
                    </div>

                </section><!-- /.content -->
            </aside><!-- /.right-side -->
        </div><!-- ./wrapper -->
    <script type="text/javascript" src="../scripts/validate.min.js"></script>
        <script src="//ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
        <script src="js/bootstrap.min.js" type="text/javascript"></script>
        <!-- AdminLTE App -->
        <script src="js/AdminLTE/app.js" type="text/javascript"></script>
        <!-- AdminLTE for demo purposes -->
        <script src="js/AdminLTE/demo.js" type="text/javascript"></script>
        <script>
           
        $(document).ready(function () {
            setTimeout('$(".err_txt").fadeOut()', 3500);
        });
        </script>
        <script>


// WRITE THE VALIDATION SCRIPT IN THE HEAD TAG.

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
