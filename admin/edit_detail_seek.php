<?php
error_reporting(0);
include "admin_session.php";

?>

<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title>Job Seeker  Management | StaffingSpot</title>
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
        
        <link href="../scripts/ddl/jquery.flexdatalist.css" rel="stylesheet" type="text/css">
        <link href="../scripts/ddl/jquery.552.min.css" rel="stylesheet" type="text/css">
	<link href="../scripts/ddl/jquery.flexdatalist.min.css" rel="stylesheet" type="text/css">
        
        <link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
  <!--<link rel="stylesheet" href="/resources/demos/style.css">-->
  <!--<script src="https://code.jquery.com/jquery-1.12.4.js"></script>-->
  <!--<script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>-->
        
        
        
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
                       Job Seeker  Management
                        <!--<small>it all starts here</small>-->
                    </h1>
                    <ol class="breadcrumb">
                        <li><a href="admin_home.php"><i class="fa fa-dashboard"></i> Home</a></li><li class="active">Job Seeker Management</li>
                    </ol>
                </section>
                
                
        
        <?php
//        $test=$_REQUEST['getids'];
//        echo $test;
$viewempid = $_REQUEST['id'];

if ($viewempid) {
    $seeker_detail = "Select fld_id,fld_name, fld_email,fld_js_status from tbl_jobseeker where fld_delstatus=0 and fld_id = $viewempid and (fld_js_status=1 OR fld_js_status=0)";

                $seeker_detail1 = mysql_query($seeker_detail);
                while($rowss=mysql_fetch_array($seeker_detail1,MYSQL_ASSOC))
                {
                    $seekid = $rowss['fld_id'];
                    $name = $rowss['fld_name'];
                    $mail = $rowss['fld_email'];
                    $status = $rowss['fld_js_status'];
                }
//    $fetchedudetailsqry    = "select * from tbl_seeker_personal WHERE  fld_id=$viewempid";
//    $fetchedudetailsqry    = "select * from tbl_jobseeker tj JOIN tbl_jobseeker_details tjd ON (tj.fld_id = tjd.fld_js_id) WHERE tj.fld_id=$viewempid";
    $fetchedudetailsqry    = "select tj.fld_id,tj.fld_name,tj.fld_js_status,tj.fld_email,tjd.fld_js_id,tjd.fld_profilepic,tjd.fld_city,tjd.fld_experience_year,tjd.fld_experience_month,tjd.fld_dob,tjd.fld_mobile as phone,tjd.fld_keyword,tjd.fld_aboutmyself,tjd.fld_address as address from tbl_jobseeker tj JOIN tbl_jobseeker_details tjd ON (tj.fld_id = tjd.fld_js_id) WHERE tj.fld_id=$viewempid AND (tj.`fld_js_status`=1 OR tj.`fld_js_status`=0) AND tj.fld_delstatus!=2 AND tjd.fld_delstatus!=2";
//    echo $fetchedudetailsqry;
    $fetchedudetailsqrysql = mysql_query($fetchedudetailsqry);
    $row                   = mysql_fetch_array($fetchedudetailsqrysql);
    //$seekid                = $row['fld_id'];
//    $name                  = $row['fld_name'];
    $profilpic  = $row['fld_profilepic'];
//    $mail    = $row['fld_email'];
    $address = $row['address'];
    $contact = $row['phone'];
    $city = $row['fld_city'];
    $year = $row['fld_experience_year'];
    $month = $row['fld_experience_month'];
    $dob = $row['fld_dob'];
    $tag = $row['fld_keyword'];
    $aboutmyself = $row['fld_aboutmyself'];
    //$status = $row['fld_js_status'];
    
?>
   <div>
                        
                        <h4 class="modal-title" id="myModalLabel">Edit/Update Job Seeker Details</h4>
                    </div>
                    <div class="modal-body">     
                        <form role="form" class="form-horizontal edit_profile" id="form">
                           
                            <div class="col-md-12 col-sm-12 col-xs-12">
                            <div class="form-group">
                                <label class="col-sm-4 control-label">Seeker Id  </label>
                                <div class="col-sm-6">
                                    <input id="employee_id" name="seekerid" placeholder="Enter the Seeker id" class="form-control" type="text" value="<?php echo 'SEEKER-'.$seekid; ?>" disabled="true">
                                </div>
                            </div>
                        </div>
                            
                        <div class="col-md-12 col-sm-12 col-xs-12">
                            <div class="form-group">
                               <label class="col-sm-4 control-label">Seeker Name  <span class="required">*</span></label>
                                <div class="col-sm-6">
                               <input id="seeker" name="seeker" placeholder="Enter the Seeker Name" class="form-control" type="text" value="<?php
    echo $name;
?>">
                                </div>
                            </div>
                        </div>

                        <div class="col-md-12 col-sm-12 col-xs-12">
                            <div class="form-group">
                               <label class="col-sm-4 control-label">Email<span class="required">*</span></label>
                                <div class="col-sm-6">
                               <input id="mail" name="mail" placeholder="Enter the valid mail-id" class="form-control" disabled="true"
				      type="email" value="<?php
    echo $mail;
?>">
                                </div>
                            </div>
                        </div>
                        <div class="col-md-12 col-sm-12 col-xs-12">
                            <div class="form-group">
                               <label class="col-sm-4 control-label">Date Of Birth<span class="required">*</span></label>
                                <div class="col-sm-6">
                                    <input type="text" class="form-control" value="<?php echo $dob; ?>" id="txtdob" name="txtdob" placeholder="MM/DD/YYYY">
                               
                                </div>
                            </div>
                        </div>
                            <div class="col-md-12 col-sm-12 col-xs-12">
                                <div class="form-group">
                                   <label class="col-sm-4 control-label">Phone  <span class="required">*</span></label>
                                   <div class="col-sm-6">
                                   <input id="mobile" name="mobile" onkeypress="javascript:return isNumber(event)" placeholder="Enter The Contact Number" class="form-control" type="text" value="<?php
    echo $contact;
    ?>">
                                    </div>
                                </div>
                            </div>
                        <div class="col-md-12 col-sm-12 col-xs-12">
                            <div class="form-group">
                               <label class="col-sm-4 control-label">City<span class="required">*</span></label>
                                <div class="col-sm-6">
                                    <input type='text'
                                        value='<?php echo $city; ?>'
                                        placeholder='Enter the city name'
                                        class='flexdatalist city_allresults form-control'
                                        data-data='city.json'
                                        data-search-in='city'
                                        data-visible-properties='["city"]'
                                        data-selection-required='true'
                                        data-value-property='city'
                                        data-text-property='{city}'
                                        data-min-length='1'
                                        name='txtcity'>
                               <div id="edit_txtcity"></div>
                                </div>
                            </div>
                        </div>
                            <div class="col-md-12 col-sm-12 col-xs-12 ">
                            <div class="form-group">
                            <label class="col-sm-4 control-label">Job Experience <span class="required"> *</span></label>      
                            <div class="col-sm-3">
                            <select class="form-control" id="txtyear" name="txtyear" placeholder="Enter the experience">    
                            <option value="">Year</option>
                            <option value="fresher" <?php if ($year == 'fresher') {
                            echo "selected";
                            } ?> >Fresher</option> 
                            <option value="0" <?php if ($year == '0') {
                            echo "selected";
                            } ?> >0</option> 
                            <option value="1" <?php if ($year == 1) {
                            echo "selected";
                            } ?>>1</option> 
                            <option value="2" <?php if ($year == 2) {
                            echo "selected";
                            } ?>>2</option> 
                            <option value="3" <?php if ($year == 3) {
                            echo "selected";
                            } ?>>3</option> 
                            <option value="4" <?php if ($year == 4) {
                            echo "selected";
                            } ?>>4</option> 
                            <option value="5" <?php if ($year == 5) {
                            echo "selected";
                            } ?>>5</option> 
                            <option value="6" <?php if ($year == 6) {
                            echo "selected";
                            } ?>>6</option> 
                            <option value="7" <?php if ($year == 7) {
                            echo "selected";
                            } ?>>7</option> 
                            <option value="8" <?php if ($year == 8) {
                            echo "selected";
                            } ?>>8</option> 
                            <option value="9" <?php if ($year == 9) {
                            echo "selected";
                            } ?>>9</option> 
                            <option value="10" <?php if ($year == 10) {
                            echo "selected";
                            } ?>>10</option> 
                            <option value="11" <?php if ($year == 11) {
                            echo "selected";
                            } ?>>11</option> 
                            <option value="12" <?php if ($year == 12) {
                            echo "selected";
                            } ?>>12</option> 
                            <option value="13" <?php if ($year == 13) {
                            echo "selected";
                            } ?>>13</option> 
                            <option value="14" <?php if ($year == 14) {
                            echo "selected";
                            } ?>>14</option> 
                            <option value="15" <?php if ($year == 15) {
                            echo "selected";
                            } ?>>15</option> 
                            <option value="16" <?php if ($year == 16) {
                            echo "selected";
                            } ?>>16</option> 
                            <option value="17" <?php if ($year == 17) {
                            echo "selected";
                            } ?>>17</option> 
                            <option value="18" <?php if ($year == 18) {
                            echo "selected";
                            } ?>>18</option> 
                            <option value="19" <?php if ($year == 19) {
                            echo "selected";
                            } ?>>19</option> 
                            <option value="20+" <?php if ($year == '20+') {
                            echo "selected";
                            } ?>>20+</option> 
                            </select>   
                                <div id="job_txtyear"></div>
                                </div>
                            <div class="col-sm-3 month">
                            <select class="form-control" id="txtmonth" name="txtmonth">                           
                            <option value="">Month</option>
                            <option value="0" <?php if ($month == '0') {
                            echo "selected";
                            } ?>>0</option> 
                            <option value="1" <?php if ($month == 1) {
                            echo "selected";
                            } ?>>1</option> 
                            <option value="2" <?php if ($month == 2) {
                            echo "selected";
                            } ?>>2</option> 
                            <option value="3" <?php if ($month == 3) {
                            echo "selected";
                            } ?>>3</option> 
                            <option value="4" <?php if ($month == 4) {
                            echo "selected";
                            } ?>>4</option> 
                            <option value="5" <?php if ($month == 5) {
                            echo "selected";
                            } ?>>5</option> 
                            <option value="6" <?php if ($month == 6) {
                            echo "selected";
                            } ?>>6</option> 
                            <option value="7" <?php if ($month == 7) {
                            echo "selected";
                            } ?>>7</option> 
                            <option value="8" <?php if ($month == 8) {
                            echo "selected";
                            } ?>>8</option> 
                            <option value="9" <?php if ($month == 9) {
                            echo "selected";
                            } ?>>9</option> 
                            <option value="10" <?php if ($month == 10) {
                            echo "selected";
                            } ?>>10</option> 
                            <option value="11" <?php if ($month == 11) {
                            echo "selected";
                            } ?>>11</option> 
                            <option value="12" <?php if ($month == 12) {
                            echo "selected";
                            } ?>>12</option>
                            </select>
                                <div id="job_txtmonth"></div>
                            </div>
                            </div>
                            </div>
                            <div class="col-md-12 col-sm-12 col-xs-12">
                            <div class="form-group">
                               <label class="col-sm-4 control-label">Keywords<span class="required">*</span></label>
                                <div class="col-sm-6">
                                    <input type="text" class="form-control" id="tags" name="tags"  value="<?php echo $tag;?>" data-role="tagsinput" placeholder="Enter the keyword">
                               <div id="edit_tags"></div>
                                </div>
                            </div>
                            </div>
                            <div class="col-md-12 col-sm-12 col-xs-12">
                                <div class="form-group">
                                   <label class="col-sm-4 control-label">Address<span class="required">*</span></label>
                                    <div class="col-sm-6">
<!--                                   <textarea id="address" rows="5" cols="5" placeholder="Enter The Address" class="ckeditor" type="text" ><?php
        echo $address;
    ?></textarea>-->
                                        <textarea cols="6" rows="8" placeholder="Enter the address" class="form-control" id="address" name="address"><?php echo $address; ?></textarea>
                                        <div id="edit_address"></div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-12 col-sm-12 col-xs-12">
                                <div class="form-group">
                                   <label class="col-sm-4 control-label">About Yourself<span class="required">*</span></label>
                                    <div class="col-sm-6">
                                        <textarea cols="6" rows="8"  class="form-control" id="txtaboutmyself" name="txtaboutmyself"><?php echo $aboutmyself; ?></textarea>
                                   <div id="edit_txtaboutmyself"></div>
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
                                            } elseif ($status == 1) {
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
                                            } elseif ($status == 0) {
                                                ?> selected="selected"
                                                <?php
                                            }
                                            ?>>InActive
                                    </option>
                                </select>
                                </div>
                            </div>
                        </div>
                            <div class="col-md-12">
                                <div class="col-sm-4">&nbsp;</div>
                                <div class="col-sm-8 all-res">
                            <div class="bttn-rite">
                                <!--<input id="updateseeker"  type="button" class="btn btn-success" value ="Save" onClick="fn_emp(<?php  echo $seekid; ?>)">-->
                                <input type="submit" class="btn btn-success resume-btn  mob-btn btn-left" id="updateseeker" data-id="<?php echo $seekid ;?>" value="Save"/>
                                <input type="reset" id ="btn" class="btn btn-warning resume-btn  mob-btn  btn-left" value="Reset" />
                                <input class="btn btn-warning resume-btn mob-btn  btn-left" Type="button" VALUE="Back" onClick="location.href = 'seek_manage.php'">   
                            </div>
                        </form>
                        
                                </div>    
                                </div>                         
<!--                            </div>
                        </div>

                            
                         </form>-->
                           
                                  

                    </div>
            <div class="modal-footer">
 
            
            </div>
        </div>

        <?php
}
?>
       <script src="//ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
  <!-- shifting across different page -->      
<script src="https://code.jquery.com/jquery-1.12.4.js"></script>
<script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>

<script type="text/javascript" src="../scripts/validate.min.js"></script>

<script src="//cdn.ckeditor.com/4.4.3/standard/ckeditor.js"></script>


<script src="../scripts/ddl/jquery.flexdatalist.min.js"></script>
<script src="../scripts/ddl/jquery.flexdatalist.js"></script>

<script src="//cdn.ckeditor.com/4.5.5/standard/ckeditor.js"></script> 
<script type="text/javascript" src="../scripts/validate.min.js"></script>

<script src="js/bootstrap.min.js" type="text/javascript"></script>
<!-- AdminLTE App -->
<script src="js/AdminLTE/app.js" type="text/javascript"></script> 

<link href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.5.0/css/bootstrap-datepicker.css" rel="stylesheet">        
<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.5.0/js/bootstrap-datepicker.js"></script>
<script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
<script type="text/javascript" src="../js/jquery.tagsinput.min.js"></script>

 <script>
    $("#reset").click(function() {
    $(this).closest('form').find("input[type=text], textarea").val("");
    $(this).closest('form').find("input[type=text], select").val("");
    $(this).closest('form').find("input[type=email], textarea").val("");

});
   </script>
       <script>
           $('#tags').tagsInput({
                width: 'auto'
            });
           
       $(function() {
                CKEDITOR.replace('address');
                CKEDITOR.replace('txtaboutmyself');
            });
           
    function clearText() {
        // set text box reference
        var tb = document.getElementById('form');
        // clear text box
        tb.value = '';
        $('#tags_tagsinput').tagsInput('removeAll');
        CKEDITOR.instances['address'].setData('');
        CKEDITOR.instances['txtaboutmyself'].setData('');
    }
    
    $("#txtdob").keypress(function(event) {event.preventDefault();});
        $('#txtdob').datepicker({
        autoclose: true,
        minViewMode: 3,
        format: 'dd/mm/yyyy'
        });

 $('#mobile').bind("cut copy paste",function(e) {
          e.preventDefault();
      });
      $(document).ready(function() {
    setTimeout('$(".error").fadeOut()',500);
  });
    </script>
       <script>
           $('.city_allresults').flexdatalist({
            minLength: 1,
            valueProperty: '*',
            selectionRequired: true, 
            textProperty: '{city}',
            searchIn: 'city',
            data: 'city.json'
            });

// WRITE THE VALIDATION SCRIPT IN THE HEAD TAG.

function isNumber(evt) {
    var iKeyCode = (evt.which) ? evt.which : evt.keyCode
    if (iKeyCode != 46 && iKeyCode > 31 && (iKeyCode < 48 || iKeyCode > 57))
        return false;

    return true;
}

            </script>   
        
            
            
  <script>
      $("#form").validate({
            ignore: [],
            rules: {
            seeker: {
            required: true
            },
            tags: {
            required: true
            },
            txtdob: {
            required: true
            },
            mail: {
            required: true,
            email: true
            },
            mobile: {
            required: true,
            minlength: 10,
            maxlength: 10,
            number: true
            },
            txtcity: {
            required: true
            },
            txtyear: {
            required: true
            },
            txtmonth: {
            required: {
            depends: function () {
            var year = $('#txtyear').val();
            if (year == 'fresher') {
            return false;
            } else {
            return true;
            }
            },
            },
            month: true
            },                       
            address: {
            required: function (textarea) {
            CKEDITOR.instances[textarea.id].updateElement(); // update textarea
            var editorcontent = textarea.value.replace(/<[^>]*>/gi, ''); // strip tags
            return editorcontent.length === 0;
            }
            },
            txtaboutmyself: {
            required: function (textarea) {
            CKEDITOR.instances[textarea.id].updateElement(); // update textarea
            var editorcontent = textarea.value.replace(/<[^>]*>/gi, ''); // strip tags
            return editorcontent.length === 0;
            }
            }
            },
                messages: {
                
            },
            errorElement: "label", // can be 'label'
            errorPlacement: function (error, element) {
            var elementName = $(element).attr('name');
            console.log('name:',elementName);
            if (elementName == 'txtcity') {
            $('#edit_' + elementName).after(error);
            } else if (elementName == 'tags') {
            $('#edit_' + elementName).after(error);
            } else if (elementName == 'address') {
            $('#edit_' + elementName).after(error);
            } else if (elementName == 'txtaboutmyself') {
            $('#edit_' + elementName).after(error);
            } else {
                //setTimeout('$(".error").fadeOut(),3000');
            element.after(error);
            
//            setTimeout('$(".error").fadeOut(),3000');
            }
            
            },
            //setTimeout('$(".error").fadeOut(),3000');
            
                    submitHandler: function (form) {
//            if (confirm("Are you sure, do you want to create?")) {
                var id= $('#updateseeker').data('id');
            var seeker = $("#seeker").val();
            var mail = $("#mail").val();
            var address = $("#address").val();
            var mobile = $("#mobile").val();
            var dob = $("#txtdob").val();
            var city = $(".city_allresults").val();
            var year = $("#txtyear").val();		
            var month = $("#txtmonth").val();
            if(year == 'fresher'){
            month = 'NULL';
            }
            var address = CKEDITOR.instances['address'].getData();
//            var address = $(ckeditor_address).text();
            var aboutmyself = CKEDITOR.instances['txtaboutmyself'].getData();
//            var aboutmyself = $(ckeditor_aboutmyself).text();
            var tags = $("#tags").val();
            var status = $('#status').val();
            var dataString = '&seeker='+ seeker + '&mail='+ mail + '&seekid='+ id + '&address='+ address + '&mobile='+ mobile + "&aboutmyself=" + aboutmyself + "&city=" + city + "&year=" + year + "&month=" + month +"&tags="+tags+ "&dob=" + dob + "&status="+status;
                                $.ajax({
                                    type: "POST",
                                    url: "ajaxdel.php?op=seeker",
                                    data: dataString,
                                    cache: false,
                                    success: function(result){
//                                    if(result=='ok')
//                                    {    
                                        alert('Updated Successfully');
                                     window.location.href = "seek_manage.php";
//                                    }
                                    
                                    }
                                    });
//                                    form.submit();
                                    return true;
//                    } else {
//                        return false;
//                    }
                                
                                }
                         });
</script>  
 <script>
        $(document).ready(function(){
$("#btn").click(function(){
/* Single line Reset function executes on click of Reset Button */
$("#form")[0].reset();
});});

 $(document).ready(function(){
$("#btn_front").click(function(){
/* Single line Reset function executes on click of Reset Button */
$("#reset_form")[0].reset();
});});


            </script>
            <script>
                
                    var val=$('#txtyear').val();
                    if(val == 'fresher'){
                        var val_month = $('#txtmonth :selected').val();
                        $('.month').hide();
                    } else {
                        $('.month').show();
                    }
                

                $('#txtyear').change(function(){
                    var val=$(this).val();
                    if(val == 'fresher'){
                        $('.month').hide();
                        var val_month = $('#txtmonth').val('');
                    } else {
                        $('.month').show();
                    }
                });
            $.validator.addMethod("month", function(val, element) {
                var val_year = $('#txtyear :selected').val(); 
                    if(val == 0 && val_year == 0) { 
                       return false 
                    }else{
                        return true
                    }
                }, "Year and month cannot be zero");

            </script>
                