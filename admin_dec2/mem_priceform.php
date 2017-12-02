<?php
error_reporting(0);
include "admin_session.php";
$oper = $_REQUEST['op'];
if (isset($_POST['submit'])) {

    $pname = $_POST['pname'];
    $ctype = $_POST['ctype'];
    $pprice = $_POST['pprice'];
    $pdesc = $_POST['pdesc'];
    $terms_cond = $_POST['terms_cond'];
    $vperiod = $_POST['vperiod'];
    $order_disp = $_POST['order_disp'];
    $resume_down = $_POST['resume_down'];
    $no_posting = $_POST['no_posting'];
    $no_users = $_POST['no_users'];


    $query = mysql_query("INSERT INTO tbl_package_price(fld_pname,fld_pprice,fld_currency_type,fld_p_des,fld_terms_cond,fld_val_period,fld_order_dis,fld_resume_download,fld_no_posting,fld_no_users)VALUES('" . $pname . "','" . $pprice . "','" . $ctype . "','" . $pdesc . "','" . $terms_cond . "','" . $vperiod . "','" . $order_disp . "','" . $resume_down . "','" . $no_posting . "','" . $no_users . "')");
    ?>
    <script>
        alert("Saved Successfully");
        window.location = "mem_priceform.php";
    </script>
    <?php
}

if (isset($_POST['save'])) {

    $pid = $_REQUEST['package_id'];
    $pname_edit = $_POST['pname'];
    $ctype_edit = $_POST['ctype'];
    $pprice_edit = $_POST['pprice'];
    $vperiod_edit = $_POST['vperiod'];
    $resume_down_edit = $_POST['resume_down'];
    $no_posting_edit = $_POST['no_posting'];
    $pdesc_edit = $_POST['pdesc'];
    $terms_cond_edit = $_POST['terms_cond'];
    $order_disp_edit = $_POST['order_disp'];

    $query = mysql_query("update tbl_package_price set fld_pname='" . $pname_edit . "',fld_currency_type='" . $ctype_edit . "',fld_pprice='" . $pprice_edit . "',fld_val_period='" . $vperiod_edit . "',fld_resume_download='" . $resume_down_edit . "',fld_no_posting='" . $no_posting_edit . "',fld_p_des='" . $pdesc_edit . "',fld_terms_cond='" . $terms_cond_edit . "',fld_order_dis='" . $order_disp_edit . "' where fld_id='" . $pid . "'");
    ?>
    <script>
        alert("Updated Successfully");
        window.location = "mem_priceform.php";
    </script>
    <?php
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

<!--        <style>
    .err_txt{
	color: red;
    }
</style>-->
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
			Pricing Management
<!--                        <small>it all starts here</small>-->
                    </h1>
                    <ol class="breadcrumb">
                        <li><a href="admin_home.php"><i class="fa fa-dashboard"></i> Home</a></li><li class="active">Pricing Management</li><li class="active">Package</li>
                    </ol>
                </section>

                <!-- Main content -->
                <section class="content">
		    <?php
		    if ($oper == 'edit_price') {

			$pid = $_REQUEST['package_id'];
			$price_query_edit = mysql_query("select * from tbl_package_price where fld_id=$pid");
			
			$rows = mysql_fetch_array($price_query_edit);
			$edit_pname = $rows['fld_pname'];
			$edit_pprice = $rows['fld_pprice'];
			$edit_ctype = $rows['fld_currency_type'];
			$edit_vperiod = $rows['fld_val_period'];
			$edit_resume_down = $rows['fld_resume_download'];
			$edit_no_posting = $rows['fld_no_posting'];
			$edit_no_users = $rows['fld_no_users'];
			$edit_desc = $rows['fld_p_des'];
			$edit_terms_cond = $rows['fld_terms_cond'];
			$edit_order = $rows['fld_order_dis'];
			?>

    		    <div class="panel panel-default">
    			<div class="panel-heading">
    			    <h3 class="panel-title">Edit Package </h3></div>
    			<div class="panel-body">
    			    <div class="col-md-12 col-sm-12 col-xs-12">     
    				<form class="form-horizontal" id="form" name="mempriceform" action="" method="post" enctype="multipart/form-data">

    				    <div class="form-group clr_both">
    					<label class="col-sm-2 control-label" >Package Name *</label>
    					<div class="col-sm-3"><input type="text" class="form-control" name="pname" placeholder="Enter the name" value="<?php echo $edit_pname; ?>"/>

    					</div>
    					<label class="col-sm-2 control-label" >Currency Type *</label>
    					<div class="col-sm-3">
    					    <select id="currtype" class="questions-category form-control" name="ctype">
    						<option value="">Select Currency Type</option>
						    <?php
						    $social = "select distinct(fld_currency_name) from `tbl_currency_type` where fld_currency_delstatus!=2 order by fld_currency_name";
						    $social_link = mysql_query($social);
						    while ($row = mysql_fetch_assoc($social_link)) {
							?>
							<option value="<?php echo $row['fld_currency_name'] ?>" <?php if ($row['fld_currency_name'] == $edit_ctype) {
						    echo "selected";
						} ?>><?php echo $row['fld_currency_name'] ?></option>
						    <?php } ?>
    					    </select>
    					</div>


    				    </div>



    				    <div class="form-group clr_both">
    					<label class="col-sm-2 control-label" >Package Price *</label>
    					<div class="col-sm-3"><input type="text" class="form-control" name="pprice" id="num"  placeholder="Enter the price" value="<?php echo $edit_pprice; ?>"/>
					</div>
					
					<label class="col-sm-2 control-label">Validity Period *</label>
    					<div class="col-sm-3"><input type="text" name="vperiod" id="num1" class="form-control" placeholder="Enter the validity period" value="<?php echo $edit_vperiod; ?>"/>

    					</div>
				    </div>
					
				<div class="form-group clr_both">	
					    <label class="col-sm-2 control-label">Package Description *</label>
    				    <div class="col-sm-8">
					<textarea name="pdesc" id="pdesc" class="ckeditor">	
					<?php echo $edit_desc; ?>
					</textarea>
					<div id="ck_pdesc"></div>
    				    </div>
					    
    				</div>
				    
				    <div class="form-group clr_both">

    				    <label class="col-sm-2 control-label">Terms & Conditions *</label>
    				    <div class="col-sm-8">
					<textarea name="terms_cond" id="terms_cond" class="ckeditor" >
					    <?php echo $edit_terms_cond; ?>
					</textarea>
					<div id="ck_terms_cond"></div>
    				    </div>
    					

				    </div>
				    <div class="form-group clr_both">   
    				    <label class="col-sm-2 control-label">Order of Display *</label>
    				    <div class="col-sm-3"><input type="text" class="form-control" name="order_disp" id="num2" placeholder="Enter the order" value="<?php echo $edit_order; ?>"/>
    				    </div>
    				</div>
				    
				    <div class="form-group clr_both">

    				    <label class="col-md-1 control-label"><h4 class="text-danger" >Restriction On </h4></label>	
    				</div>
				    
				    <div class="form-group clr_both">
    				    <label class="col-sm-2 control-label" >Resume Downloaded *</label>
    				    <div class="col-sm-3"><input type="text" class="form-control" name="resume_down" id="num3" placeholder="Enter the resume downloaded" value="<?php echo $edit_resume_down; ?>" />
    				    </div>
    				</div>

    				<div class="form-group clr_both">
    				    <label class="col-sm-2 control-label" >No of Posting *</label>
    				    <div class="col-sm-3"><input type="text" class="form-control" name="no_posting" id="num4" placeholder="Enter the posting" value="<?php echo $edit_no_posting; ?>" />

    				    </div>
    				</div>

    				<div class="form-group clr_both">
    				    <label class="col-sm-2 control-label" >No of Users *</label>

    				    <div class="col-sm-3">
    					<input type="text" class="form-control" name="no_users" id="num5" placeholder="Enter the no of users" value="<?php echo $edit_no_users; ?>" />
    				    </div>
    				</div>
				  
				
				  
    				    <div class="form-group clr_both">
    					<label class="col-sm-2 control-label clr_both" style="margin-left:3%;"></label>
    					<div class="col-sm-4">
    					    <input type="submit" class="btn btn-success" id="save" name="save"  value="Save"/>
    					    <!--<input type="reset" id="reset" class="btn btn-warning" name="reset"  value="Reset"/>-->
    					    <input type="button" onclick="clearText()"  class="btn btn-warning" id="reset" value="Reset" />
    					    <input type="button" onClick="location.href = 'mem_priceform.php'" class="btn btn-warning" value="Back" />
    					    <!--<a class="btn btn-warning" style="text-decoration:none;" href="mem_priceform.php">Back</a>-->
    					</div>
    				    </div>

    				</form>
    			    </div>
    			</div>
    		    </div>
		    <?php } else { ?>  					
                        <div class="panel panel-default">
    			<div class="panel-heading"><h3 class="panel-title">Package </h3></div>
    			<div class="panel-body">
    			    <form class="form-horizontal" id="form" name="mempriceform" action="" method="post" enctype="multipart/form-data">

    				<div class="form-group clr_both">
    				    <label class="col-sm-2 control-label" >Package Name *</label>
    				    <div class="col-sm-3"><input type="text" class="form-control" name="pname" placeholder="Enter the name" value="<?php echo $_POST['pname']; ?>"/>

    				    </div>

    				    <label class="col-sm-2 control-label" >Currency Type *</label>
    				    <div class="col-sm-3">
    					<select id="currtype" class="questions-category form-control" name="ctype">
    					    <option value="">Select Currency Type</option>
						<?php
						$social = "select distinct(fld_currency_name) from `tbl_currency_type` where fld_currency_delstatus!=2 order by fld_currency_name";
						$social_link = mysql_query($social);
						while ($row = mysql_fetch_assoc($social_link)) {
						    ?>
						    <option value="<?php echo $row['fld_currency_name'] ?>"><?php echo $row['fld_currency_name'] ?></option>

						<?php } ?>
    					</select>
    				    </div>
    				</div>

    				<div class="form-group clr_both">

    				    <label class="col-sm-2 control-label" >Package Price *</label>
    				    <div class="col-sm-3"><input type="text" class="form-control" name="pprice" id="num" placeholder="Enter the price" value="<?php echo $_POST['pprice']; ?>"/>
    				    </div>
				    
				    <label class="col-sm-2 control-label" >Validity Period *</label>
    				    <div class="col-sm-3"><input type="text" name="vperiod" class="form-control" id="num1" placeholder="Enter the validity period" value="<?php echo $_POST['vperiod']; ?>"/>
    				    </div>

    				</div>
				

				<div class="form-group clr_both">
    				    <label class="col-sm-2 control-label" >Package Description *</label>
				    <div class="col-sm-8"><textarea name="pdesc" id="pdesc" class="ckeditor" ></textarea>
					 <div id="ck_pdesc"></div>
    				    </div>
				   
    				</div>

    				<div class="form-group clr_both">

    				    <label class="col-sm-2 control-label" >Terms & Conditions *</label>
    				    <div class="col-sm-8"><textarea name="terms_cond" id="terms_cond" class="ckeditor"></textarea>
					<div id="ck_terms_cond"></div>
    				    </div>
				</div>

    				    

    				<div class="form-group clr_both">   
    				    <label class="col-sm-2 control-label">Order of Display *</label>
    				    <div class="col-sm-3"><input type="text" class="form-control" name="order_disp" id="num2" placeholder="Enter the order" value="<?php echo $_POST['order_disp']; ?>"/>
    				    </div>
    				</div>


    				<div class="form-group clr_both">

    				    <label class="col-md-1 control-label"><h4 class="text-danger" >Restriction On </h4></label>	
    				</div>
    				<div class="form-group clr_both">
    				    <label class="col-sm-2 control-label" >Resume Downloaded *</label>
    				    <div class="col-sm-3"><input type="text" class="form-control" id="num3" name="resume_down" placeholder="Enter the resume downloaded" value="<?php echo $_POST['resume_down']; ?>" />
    				    </div>
    				</div>

    				<div class="form-group clr_both">
    				    <label class="col-sm-2 control-label">No of Posting *</label>
    				    <div class="col-sm-3"><input type="text" class="form-control" id="num4" name="no_posting" placeholder="Enter the posting" value="<?php echo $_POST['no_posting']; ?>" />

    				    </div>
    				</div>

    				<div class="form-group clr_both">
    				    <label class="col-sm-2 control-label">No of Users *</label>

    				    <div class="col-sm-3">
    					<input type="text" class="form-control" name="no_users" id="num5" placeholder="Enter the no of users" value="<?php echo $_POST['no_users']; ?>" />
    				    </div>
    				</div>

    				<label class="col-sm-2 control-label clr_both"></label>
    				<div class="col-sm-4">
    				    <input type="submit" class="btn btn-warning" name="submit"  value="Save"/>
    				    <input type="reset" id="reset" class="btn btn-warning" name="reset"  value="Reset"/>
    				    <!--<a class="btn btn-warning" style="text-decoration:none;" href="admin_home.php">Back</a>-->
    				</div>
    			    </form>
			    <?php } ?>			
			    <br/>
			    <br/>
			    <?php if (!($oper == 'edit_price')) {
				?>
    			    <div class="col-md-10" style="margin-top:45px;">
    				<div class="table-responsive">
    				    <table class="table table-striped table-bordered">
    					<tr>   <th width="10%">SI NO</th>
    					    <th class="text-center">PACKAGE NAME</th>
    					    <th class="text-center">PACKAGE PRICE</th>
    					    <th class="text-center">VALIDITY PERIOD</th>
    					    <th class="text-center">RESUME DOWNLOADED</th>
    					    <th class="text-center">NO.OF POSTING</th>
    					    <th class="text-center" colspan="2">OPTIONS</th>
    					</tr>
					    <?php
					    $pagin_query = mysql_query("select count(*) as total from tbl_package_price where fld_delstatus!=2");
					    $pagin_row = mysql_fetch_array($pagin_query);
					    $total = $pagin_row['total'];
					    $dis = 5;
					    $total_page = ceil($total / $dis);
					    $page_cur = (isset($_GET['page'])) ? $_GET['page'] : 1;
					    $k = ($page_cur - 1) * $dis;
					    ?>
					    <?php
					    $price_query = mysql_query("select * from tbl_package_price WHERE fld_delstatus!=2 order by fld_id limit $k,$dis");
					    $a = $k + 1;
					    while ($price_array = mysql_fetch_array($price_query)) {
						$id = $price_array['fld_id'];
						$name = $price_array['fld_pname'];
						$price = $price_array['fld_pprice'];
						$valdity = $price_array['fld_val_period'];
						$resume = $price_array['fld_resume_download'];
						$posting = $price_array['fld_no_posting'];
						?>
						<tr align="center">
						    <td class="edit_td"><?php echo $a; ?></td>

						    <td><?php echo $name; ?></td>

						    <td><?php echo $price; ?></td>
						    <td><?php echo $valdity; ?></td>
						    <td><?php echo $resume; ?></td>
						    <td><?php echo $posting; ?></td>
						    <td><a href="mem_priceform.php?op=edit_price&package_id=<?php echo $id; ?>">Edit</a></td>

						    <td class="edit_td"><a href="#" id="<?php echo $id; ?>" package_id=<?php echo $id; ?>  class="edit_trr">Delete</a></td>
				    <!--                <td><a href="#" onclick="if (confirm('Are you sure to delete this package?')) 
				      window.location='delete_package.php?package_id=<?php //echo $id;  ?>';">Delete</a></td>-->
						</tr>
						<?php $a++;
					    } ?>
    				    </table>



    <?php if ($total > $dis) { ?>
	                                    <nav>
	                                        <ul class="pager">
						    <?php if ($page_cur > 1) { ?>
	    					    <li class="previous"><a href="mem_priceform.php?page=<?php echo ($page_cur - 1); ?>"><span aria-hidden="true">&larr;</span>Prev</a></li>
						    <?php } else { ?>
	    					    <li class="previous"><a>Prev</a></li>
							<?php
						    }
						    if ($page_cur < $total_page) {
							?>

	    					    <li class="next"><a href="mem_priceform.php?page=<?php echo ($page_cur + 1); ?>">Next<span aria-hidden="true">&rarr;</span></a></li>
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

        <script src="//ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
        <script src="js/bootstrap.min.js" type="text/javascript"></script>
        <!-- AdminLTE App -->
        <script src="js/AdminLTE/app.js" type="text/javascript"></script>
        <!-- AdminLTE for demo purposes -->
        <script src="js/AdminLTE/demo.js" type="text/javascript"></script>

<!--	 <script src="http://ajax.microsoft.com/ajax/jquery.validate/1.6/jquery.validate.min.js"></script>-->

	<script type="text/javascript" src="../scripts/validate.min.js"></script>
<script src="//cdn.ckeditor.com/4.5.5/standard/ckeditor.js"></script>   

<script>
$("#reset").click(function () {
$(this).closest('form').find("input[type=text], textarea").val("");
$(this).closest('form').find("input[type=email], textarea").val("");
$(this).closest('form').find("input[type=text], select").val("");
CKEDITOR.instances['pdesc'].setData("");
CKEDITOR.instances['terms_cond'].setData("");
});
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
	    $(document).ready(function () {

//                
		$("#reset").click(function () {
		    var validator1 = $("#form").validate();
		    validator1.resetForm();
		    $("#form")[0].reset();
		});



		$('input[type=file]').bootstrapFileInput();
		$('.file-inputs').bootstrapFileInput();

	    });


	    $("form[name='mempriceform']").validate({
		ignore: [],
		rules: {
		    pname: {
			required: true
		    },
		    ctype: {
			required: true
		    },
		    pprice: {
			required: true
		    },
		    pdesc: {
			required: function (textarea) {
                                CKEDITOR.instances[textarea.id].updateElement(); // update textarea
                                var editorcontent = textarea.value.replace(/<[^>]*>/gi, ''); // strip tags
                                return editorcontent.length === 0;
                        }
		    },
		    terms_cond: {
			required: function (textarea) {
                                CKEDITOR.instances[textarea.id].updateElement(); // update textarea
                                var editorcontent = textarea.value.replace(/<[^>]*>/gi, ''); // strip tags
                                return editorcontent.length === 0;
                        }
		    },
		    vperiod: {
			required: true
		    },
		    order_disp: {
			required: true
		    },
		    resume_down: {
			required: true
		    },
		    no_posting: {
			required: true
		    },
		    no_users: {
			required: true
		    }

		},
		messages: {
		    
		},
		errorElement: "label", // can be 'label'
		errorPlacement: function (error, element) {
		    var elementName = $(element).attr('name');
		    if (elementName == 'pdesc') {
			$('#ck_' + elementName).after(error);
		    }else if (elementName == 'terms_cond') {
			$('#ck_' + elementName).after(error);
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

	    $("#num,#num1,#num2,#num3,#num4,#num5").keypress(function (e) {
		//if the letter is not digit then display error and don't type anything
		if (e.which != 8 && e.which != 0 && (e.which < 48 || e.which > 57)) {
		    e.preventDefault();
		    return false;
		}
	});	
	    $('#num,#num1,#num2,#num3,#num4,#num5').bind("cut copy paste",function(e) {
	      e.preventDefault();
	  }); 

	$('#num1').keypress(function(e){ 
	   if (this.value.length == 0 && e.which == 48 ){
	      return false;
	   }
	});
		
	    
	</script>  
	<script>

	    $(".edit_trr").click(function () {

		var id = $(this).attr("id");
		//  var first =$("#first_input_" + id).val();
		//    alert(id);

		var dataString = 'id=' + id;
		var parent = $(this).parent().parent();
		if (confirm('Are you sure, you want to delete.?')) {
		    $.ajax({
			type: "POST",
			url: "delete_package.php",
			data: dataString,
			cache: false,
			success: function (data)
			{
			    // alert(data);
			    var responsevaal = $.trim(data);

			    if (responsevaal == 1)
			    {

				alert('Deleted Successfully');
				parent.fadeOut('slow', function () {
				    $(this).remove();
				});
				window.location.href = "mem_priceform.php";
			    } else
			    {
				alert('Sorry it is selected by some employer or seeker');
			    }
			}
		    });
		}
		return false;
	    });

	    $('#num').bind("cut copy paste", function (e) {
		e.preventDefault();
	    });
        </script>

    </body>
</html>
