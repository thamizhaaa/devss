<?php
error_reporting(0);
include "admin_session.php";
//print_r($_SESSION['login_admin']);exit;
if (isset($_POST['submit'])) {

    $customer_type = $_POST['customer_type'];
//    print_r($customer_type);exit;
    $price_view = $_POST['price_view'];
    $price_download = $_POST['price_download'];
    $price_post = $_POST['price_post'];



    $e_query = mysql_query("select id from tbl_booster where customer_type='$customer_type'");
//    echo "select id from tbl_booster where customer_type='$customer_type'";
    $e_sq = mysql_num_rows($e_query);
    //print_r($e_sq);
    if ($customer_type == '') {
        
        $err_customer_type = "Valid Booster Name is required.";
    } else if ($e_sq == 1) {
        ?>

        <?php
        $err_customer_type = "$customer_type is already in use.";
    }


    if (!is_numeric($price_view))
        $err_price_view = 'only numeric';


    $error .= $err_customer_type . $err_price_view;

    $validation_check = "";

    if (isset($error))
        $validation_check.=$error;


    if (!$validation_check) {




        $query = mysql_query("INSERT INTO tbl_booster(customer_type,view_price,download_price,postjob_price,status)VALUES('" . $customer_type . "','" . $price_view . "','" . $price_download . "','" . $price_post . "','1')");
        ?>
        <script>
            alert("<?php echo $customer_type . " " . "Customer Type created Successfully" ?>");
            window.location = "booster.php";
        //window.location = "admin_home.php";
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
                                        <label for="Customer Type" class="col-sm-5 control-label">Booster Type:<span class="required">*</span></label>
                                        <div class="col-sm-4">
                                            <input name="customer_type"  id="customer_type" type="text"  class="form-control" placeholder="Enter your Booster Type" >
                                            <span class="err_txt help-block"><?php echo $err_customer_type ; ?></span>
                                        </div>  
                                        
                                        
 
                                    </div>
                                </div>
                                &nbsp;
                                <div class="col-md-12 col-sm-12 col-xs-12">
                                    <div class="form-group">
                                        <label class="col-sm-5 control-label">Resume View : <span class="required">*</span></label>
                                        <div class="col-sm-2">
                                            <input name="view" id="num1" type="text" value="1" disabled="" class="form-control">
                                            <input name="view_price" required id="view_price" type="hidden" class="form-control" >
                                            
                                        </div>
                                        <div class="col-sm-3">
                                            <input onkeypress="javascript:return isNumber(event)" id="price1" name="price_view" type="text" class="form-control">
                                            <span class="err_txt help-block"><?php echo $err_price_view;?></span>
                                        </div>
                                    </div>
                                </div>

                                <div class="col-md-12 col-sm-12 col-xs-12">
                                    <div class="form-group">
                                        <label class="col-sm-5 control-label">Resume Download : <span class="required">*</span></label>
                                        <div class="col-sm-2">
                                            <input name="download" id="num2"  value="1" disabled="" class="form-control">
                                            <input name="download_price" required id="download_price" type="hidden"   class="form-control">
                                        </div>
                                        <div class="col-sm-3">
                                            <input onkeypress="javascript:return isNumber(event)" id="price2" name="price_download" type="text" class="form-control">
                                            <span class="err_txt help-block"><?php echo $err_price_view;?></span>
                                        </div>
                                    </div>
                                </div>

                                <div class="col-md-12 col-sm-12 col-xs-12">
                                    <div class="form-group">
                                        <label class="col-sm-5 control-label">Post Job : <span class="required">*</span></label>
                                        <div class="col-sm-2">
                                            <input name="job" id="num3"   value="1" disabled="" class="form-control">
                                            <input name="post_price" required id="post_price" type="hidden"   class="form-control">
                                        </div>
                                        <div class="col-sm-3">
                                            <input onkeypress="javascript:return isNumber(event)" id="price3" name="price_post" type="text" class="form-control">
                                            <span class="err_txt help-block"><?php echo $err_price_view;?></span>
                                        </div>
                                    </div>
                                </div>
                                &nbsp;

                                <br/>
                                <br/>

                                <label class="col-sm-2 control-label clr_both" style="margin-left:13%;"></label>
                                <div class="col-sm-4">
                                    <input type="submit" class="btn btn-warning" name="submit"  value="Save"/>
                                    <input type="reset" class="btn btn-warning" name="reset"  value="Reset"/>
<!--                                    <a class="btn btn-warning" style="text-decoration:none;" href="admin_home.php">Back</a>-->
                                </div>
                            </form>     


                            <br/>
                            <br/>

                            <div class="col-md-10" style="margin-top:45px;">
                                <div class="table-responsive">
                                    <table class="table table-striped table-bordered table-hover">
                                        <tr class="danger"><th class="text-center">ID</th><th class="text-center">Customer Type</th><th class="text-center">View Price</th><th class="text-center">Resume Price</th><th class="text-center">PostJob Price</th><th class="text-center" colspan="2">Options</th></tr>
<?php
$price_query = mysql_query("select * from tbl_booster");
while ($price_array = mysql_fetch_array($price_query)) {
    $id = $price_array['id'];
    $name = $price_array['customer_type'];
    $price = $price_array['view_price'];
    $valdity = $price_array['download_price'];
    $resume = $price_array['postjob_price'];
    ?>
                                            <tr align="center"><td><?php echo $id; ?></td><td><?php echo $name; ?></td><td><?php echo $price; ?></td><td><?php echo $valdity; ?></td><td><?php echo $resume; ?></td><td><a href="edit_booster.php?id=<?php echo $id; ?>">Edit</a></td><td><a href="#" onclick="if (confirm('Are you sure to delete this package?'))
                                                        window.location = 'delete_booster.php?id=<?php echo $id; ?>';">Delete</a></td></tr>
                                                <?php } ?>
                                    </table>

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

            </script>


    </body>
</html>
