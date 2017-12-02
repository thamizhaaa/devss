
<?php
error_reporting(0);
@include ("config.php");
$fldid = $_REQUEST['id'];
$name = $_SESSION["empuser_name"];
$id = $_SESSION['empuser_id'];


@include ("user_sessioncheck.php");

$empuser_id = $_SESSION['empuser_id'];
$date = date('Y-m-d H:i:s');

if ($empuser_id == "")
	{
	header('Location: index.php');
	}



?>


<!DOCTYPE html>
<html lang="en">
    <head>
        <meta http-equiv="content-type" content="text/html;charset=UTF-8" />
        <!--[if IE]>
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <![endif]-->
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta name="description" content="">
        <meta name="author" content="Vinformax">
        <title>Add Booster | Staffingspot | Job Portal</title>
        <link rel="icon" href="favicon.ico" type="image/x-icon">

        <!-- BOOTSTRAPE STYLESHEET CSS FILES -->
        <link rel="stylesheet" href="css/bootstrap.min.css">

        <!-- JQUERY SELECT -->
        <link href="css/select2.min.css" rel="stylesheet" />

        <!-- JQUERY MENU -->
        <link rel="stylesheet" href="css/mega_menu.min.css">

        <!-- ANIMATION -->
        <link rel="stylesheet" href="css/animate.min.css">

        <!-- OWl  CAROUSEL-->
        <link rel="stylesheet" href="css/owl.carousel.css">
        <link rel="stylesheet" href="css/owl.style.css">

        <!-- TEMPLATE CORE CSS -->
        <link rel="stylesheet" href="css/style.css">
        <link rel="stylesheet" href="css/style1.css">
        <link rel="stylesheet" href="css/mobile.css">

        <!-- FONT AWESOME -->
        <link rel="stylesheet" type="text/css" href="css/font-awesome.min.css">
        <link rel="stylesheet" href="css/et-line-fonts.css" type="text/css">

        <!-- Google Fonts -->
        <link href="http://fonts.googleapis.com/css?family=Source+Sans+Pro:400,600,700,900,300" rel="stylesheet" type="text/css">
        <link href="https://fonts.googleapis.com/css?family=Open+Sans:400,600,700" rel="stylesheet" type="text/css">

        <!-- JavaScripts -->
        <script src="js/modernizr.js"></script>



        <!-- JAVASCRIPT JS  -->
        <script type="text/javascript" src="js/jquery-3.1.1.min.js"></script>

        <!-- JAVASCRIPT JS  --> 
        <!--<script type="text/javascript" src="js/jquery-migrate-1.2.1.min.js"></script>-->

        <!-- BOOTSTRAP CORE JS -->
        <script type="text/javascript" src="js/bootstrap.min.js"></script>


    </head>

    <body>
        <div class="page category-page">


            <?php
@include ("top.php");
 ?>
            <div class="clearfix"></div>



            <section class="job-breadcrumb">
                <div class="container">
                    <div class="row">
                        <div class="col-md-6 col-sm-7 co-xs-12 text-left">
                            <h3>Add Booster Price</h3>
                        </div>
                        <div class="col-md-6 col-sm-5 co-xs-12 text-right">
                            <div class="bread">
                                <ol class="breadcrumb">
                                    <li><a href="user-dashboard.php">Dashboard</a> </li>
                                    <li class="active">Add Booster Price</li>
                                </ol>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
             <?php
            @include("emptop.php");
            ?>
            <section class="dashboard-body">
                <div class="container">
                    <div class="row">


                        <div class="col-md-12 col-sm-12 col-xs-12">
                             <?php
                            @include("empleftpanel.php");
                            ?>
                            
                            <div class="col-md-8 col-sm-8 col-xs-12">
                                <div class="heading-inner first-heading">
                                    <p class="title">Add Booster Price</p>
                                </div>
                                <div class="profile-edit row">
                                    <form method="post" id="purchase" name="purchase" enctype="multipart/form-data">
                                        <div class="col-md-12 col-sm-12 col-xs-12">
                                            <div class="form-group">
                                                <label for="Customer Type" class="col-lg-12 col-md-12 col-sm-12 col-xs-12 control-label nopadding">Customer Type<span class="required">*</span></label>
                                                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 nopadding">
                                                    <select class="form-control" id="customer_type" name="customer_type" required tabindex="1"> 
                                                        <option value=''>Select customer</option>
                                                        <?php

                                                        $sql1 = mysql_query("select fld_id,fld_customer_type from tbl_booster where fld_delstatus <> 2 and fld_status =1");
                                                        while ($row1 = mysql_fetch_array($sql1))
                                                        {
                                                        $bid = $row1['fld_id'];
                                                        $eduname = $row1['fld_customer_type'];
                                                        ?>
                                                        <option value="<?php echo $bid; ?>"><?php echo $eduname; ?></option> 
                                                        <?php
                                                        }
                                                        ?>
                                                    </select>   
                                                </div>     
                                            </div>
                                        </div>
                                        
                                        <?php



$sql = mysql_query("select fld_id,fld_customer_type,fld_view_price,fld_download_price,fld_postjob_price from tbl_booster where fld_id= '" . $bid . "' and fld_delstatus <> 2 and fld_status =1");

$row = mysql_fetch_assoc($sql);
?>        
                                        <div class="col-md-12 col-sm-12 col-xs-12">
                                            <div class="form-group">
                                                <label class="col-lg-12 col-md-12 col-sm-12 col-xs-12 control-label nopadding">Resume View  <span class="required">*</span></label>
                                                <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12 nopadding">
                                                    <input name="view" id="num1" type="text" onkeypress="javascript:return isNumber(event)" class="form-control" tabindex="2">
                                                    <input name="view_price" id="view_price" type="hidden" class="form-control" value="<?php
echo $row['fld_view_price'] ?>">
                                                </div>
                                                <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12 nopadding-right">
                                                    <input  id="price1" disabled name="price_view" type="text" placeholder="View Price" class="form-control">
                                                </div>
                                            </div>
                                        </div>

                                        <div class="col-md-12 col-sm-12 col-xs-12">
                                            <div class="form-group">
                                                <label class="col-lg-12 col-md-12 col-sm-12 col-xs-12 control-label nopadding">Resume Download <span class="required">*</span></label>
                                                <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12 nopadding">
                                                    <input name="download" id="num2" onkeypress="javascript:returnisNumber(event)" type="text" class="form-control" tabindex="3">
                                                    <input name="download_price" id="download_price" type="hidden"   class="form-control" value="<?php
echo $row['fld_download_price'] ?>">
                                                </div>
                                                <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12 nopadding-right">
                                                    <input  id="price2" disabled name="price_download" type="text" placeholder="Resume Download Price" class="form-control">
                                                </div>
                                            </div>
                                        </div>

                                        <div class="col-md-12 col-sm-12 col-xs-12">
                                            <div class="form-group">
                                                <label class="col-lg-12 col-md-12 col-sm-12 col-xs-12 control-label nopadding">Post Job <span class="required">*</span></label>
                                                <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12 nopadding">
                                                    <input name="postjob" id="num3" onkeypress="javascript:return isNumber(event)" type="text" class="form-control" tabindex="4">
                                                    <input name="post_price" id="post_price" type="hidden"   class="form-control" value="<?php
echo $row['fld_postjob_price'] ?>">
                                                </div>
                                                <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12 nopadding-right">
                                                    <input  id="price3" disabled name="price_post" placeholder="Postjob Price" type="text" class="form-control">
                                                </div>
                                            </div>
                                        </div>
                                        
                                        <div class="col-md-12 col-sm-12 col-xs-12">
                                            <div class="form-group">
                                                <label class="col-lg-12 col-md-12 col-sm-12 col-xs-12 control-label nopadding">Total Price  <span class="required">*</span></label>
                                                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 nopadding">
                                                    <input id="total" disabled name="price_total" type="text" placeholder="Total Price" class="form-control">
                                                </div>
                                            </div>
                                        </div>



                                        <div class="col-md-12 col-sm-12 col-xs-12  text-right">                                           
                                                <input type="submit" name="save" id="btnaddbooster" class="btn btn-default btn-green" value="Buy Now"/>
                                            </div>                                        
                                    </form>                




                                </div>
                            </div>
                        </div>

                    </div>
                </div>
            </section>

            <?php
@include ("bottom.php");
 ?>


            <a href="#" class="scrollup"><i class="fa fa-chevron-up"></i></a>


            <!-- JQUERY SELECT -->
            <script type="text/javascript" src="js/select2.min.js"></script>

            <!-- MEGA MENU -->
            <script type="text/javascript" src="js/mega_menu.min.js"></script>



            <!-- JQUERY COUNTERUP -->
            <script type="text/javascript" src="js/counterup.js"></script>

            <!-- JQUERY WAYPOINT -->
            <script type="text/javascript" src="js/waypoints.min.js"></script>

            <!-- JQUERY REVEAL -->
            <script type="text/javascript" src="js/footer-reveal.min.js"></script>

            <!-- Owl Carousel -->
            <script type="text/javascript" src="js/owl-carousel.js"></script>

            <!-- CORE JS -->
            <script type="text/javascript" src="js/custom.js"></script>

            <script type="text/javascript" src="http://code.jquery.com/ui/1.10.3/jquery-ui.js"></script>


            <script type="text/javascript" src="scripts/jquery.form.js"></script>
                <script src="https://code.jquery.com/jquery-1.9.1.min.js"></script>
            <script>


                                                        // WRITE THE VALIDATION SCRIPT IN THE HEAD TAG.

                                                        function isNumber(evt) {
                                                            var iKeyCode = (evt.which) ? evt.which : evt.keyCode
                                                            if (iKeyCode != 46 && iKeyCode > 31 && (iKeyCode < 48 || iKeyCode > 57))
                                                                return false;

                                                            return true;
                                                        }

            </script>




            <script>            

            $( document ).ready(function() {
            disabled();
            });
                    $("#customer_type").change(function () {		
                      enabled();
                     var customer_type = $("#customer_type").val();		          
                     
                     if(customer_type == "")
                     {
                        disabled();
                     }


                      $("#purchase").ajaxForm({
                            type: "POST",
                            url: "booster_purchase.php?op=selecttype",
                            data: "&customer_type=" + customer_type,
                            // data : {shadename: shadename , fabrictype: fabrictype, melangecode: melangecode, shadedetails: shadedetails},

                            dataType: 'json',
                            success: function (data)
                            {
//                                alert(data);
                                var view = data.customerDetails['fld_view_price'];
                                var post = data.customerDetails['fld_postjob_price'];
                                var download = data.customerDetails['fld_download_price'];
                                $('#view_price').val(view);
                                $('#post_price').val(post);
                                $('#download_price').val(download);

                            }
                        }).submit();
                        
                                $('#total').val('');
                                $('#num1').val('');
                                $('#num2').val('');
                                $('#num3').val('');
                                $('#price1').val('');
                                $('#price2').val('');
                                $('#price3').val('');
			      
                    });



                    $("#num1").keyup(function () {
                          var num1val = $("#num1").val();
                      
                        var customer_type = $("#customer_type").val();
                      
                        var view_value = $('#view_price').val();                       
                     

                        if (customer_type != '' && num1val != ""){
                            var view = parseInt($(this).val()) * view_value;
                            $('#price1').val(view);
                        } else { 
                          
                             $('#price1').val('');
                             $('#total').val('');
                            document.getElementById("customer_type").focus();
                        }
    
                                     
                               
                        calculateTotalprice();
                       
                    });
                    $("#num2").keyup(function () {
                        var num2val = $("#num2").val();
                        var customer_type = $("#customer_type").val();
                        var down_value = $('#download_price').val();
                        if (customer_type != '' && num2val != ""){
                            var download = parseInt($(this).val()) * down_value;
                            $('#price2').val(download);
                        } else {
                             $('#price2').val('');
                             $('#total').val('');
                            document.getElementById("customer_type").focus();
                        }
                        calculateTotalprice();

                    });
                     
                    
                    $("#num3").keyup(function () {
                        var num3val = $("#num3").val();
                        var customer_type = $("#customer_type").val();
                        var post_value = $('#post_price').val();
                        if (customer_type != '' && num3val != ""){
                            var post = parseInt($(this).val()) * post_value;

                            $('#price3').val(post);
        } else {
                             $('#price3').val('');
                             $('#total').val('');
                            document.getElementById("customer_type").focus();
                        }
                        calculateTotalprice();
                    
                    });

 

               

                function calculateTotalprice() {
		    
                    var view = parseInt($("#price1").val()) || 0;
                    var resume = parseInt($("#price2").val()) || 0;
                    var post = parseInt($("#price3").val()) || 0;

                    // alert(price1 + price2 + post1);

                    var total123 = view + resume + post;
                    $('#total').val(total123);
                     document.getElementById("btnaddbooster").disabled =false;
                if(total123==''){
                    $('#total').val('');
                    
                    document.getElementById("btnaddbooster").disabled =true;
                }
                }
           
function disabled() {
   
		document.getElementById("num1").disabled = true;
		document.getElementById("num2").disabled = true;
		document.getElementById("num3").disabled = true;
		document.getElementById("price1").disabled = true;
		document.getElementById("price2").disabled = true;
		document.getElementById("price3").disabled = true;
                document.getElementById("btnaddbooster").disabled = true;
                document.getElementById("total").disabled = true;
    
    }

function enabled() {
  // alert("fdfdg");
		document.getElementById("num1").disabled =false;
		document.getElementById("num2").disabled = false;
		document.getElementById("num3").disabled = false;
		document.getElementById("price1").disabled = true;
		document.getElementById("price2").disabled = true;
		document.getElementById("price3").disabled = true;
		document.getElementById("total").disabled = true;
    }
    
    
  
    
        
    
    
    
    
    
            </script>
<script>
//$(document).ready(function(e) {

    $("#btnaddbooster").click(function() {          	        	
        //alert("ygy");                            
        var customer_type = $("#customer_type").val();	
        // alert(customer_type);   
        var view_price = $("#num1").val();
        var download_price = $("#num2").val();	
        var post_price = $("#num3").val();
	
       if(view_price=='' && download_price=='' && post_price==''){
	    swal(
		    '',
		    'select atleast one!',
		    'warning'
		    		    );
	}else{
    		$.ajax({		
				type:"POST",
				url: "booster_purchase.php?op=addnewbooster",
                                //data:{"customer_type":customer_type,"price1":price1,"price2":price2,"price3":price3}
			data: "customer_type="+customer_type+"&view="+view_price+"&resume="+download_price+"&postjob="+post_price,	
				// data : {shadename: shadename , fabrictype: fabrictype, melangecode: melangecode, shadedetails: shadedetails},
                                 datatype : 'html',				
				success: function(data)
				{	
					  swal(
						'',
						'Booster Created Successfully!',
						'success'
					)	
                                $('.swal2-confirm').click(function(){
                                      window.location = "your-order.php";
                                  });
					
				}		
		});
			  		
	}
	});

        
//});
</script> 


        </div>
    </body>
</html>
