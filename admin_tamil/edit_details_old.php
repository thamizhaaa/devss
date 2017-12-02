<?php
error_reporting(0);
include "admin_session.php";
//print_r($_REQUEST['id']);
?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title>Employee's Management | StaffingSpot</title>
        <meta content='width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no' name='viewport'>
        <link href="css/bootstrap.min.css" rel="stylesheet" type="text/css" />
        <link href="//cdnjs.cloudflare.com/ajax/libs/font-awesome/4.1.0/css/font-awesome.min.css" rel="stylesheet" type="text/css" />
        <!-- Ionicons -->
        <link href="//code.ionicframework.com/ionicons/1.5.2/css/ionicons.min.css" rel="stylesheet" type="text/css" />
        <!-- Theme style -->
        <link href="css/AdminLTE.css" rel="stylesheet" type="text/css" />
        <link href="css/bootstrap-wysihtml5/bootstrap3-wysihtml5.min.css" rel="stylesheet" type="text/css" />
      
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
                       Employee's Management
                        <small>It all starts here</small>
                    </h1>
                    <ol class="breadcrumb">
                        <li><a href="admin_home.php"><i class="fa fa-dashboard"></i> Home</a></li><li class="active">Job's Management</li>
                    </ol>
                </section>
        <style>
        .err_txt{
            color: red;
        }
        </style>    
     
        
        
        <?php

    $viewempid=$_REQUEST['id'];
    if($viewempid)
    {    
        $query = mysql_query("select * from tbl_employer_details where (fld_delstatus='1'  OR fld_delstatus= '0') AND fld_id='".$viewempid."'");
        $array = mysql_fetch_array($query);
        $state = $array['state'];
        $company = $array['fld_employer_name'];
        $mobile = $array['fld_phone'];
        $register1 = date_create($array['fld_dor']);
        $register = date_format($register1,"F j, Y");
        $member = $array['fld_membership_type'];
        $industry = $array['fld_indusType'];
        $address = $array['fld_address'];
        $city = $array['fld_city'];
        
        $country = $array['fld_country'];
        $no_of_emp = $array['fld_worker'];
        $about = $array['fld_company_desc'];
        $business_entity = $array['fld_company_type'];
        //print_r($city);exit;
        
	$fetchedudetailsqry = "select * from tbl_employer WHERE  fld_id= '".$array['fld_empid']."'";      
//        echo "select * from tbl_employer WHERE  fld_id= '".$array['fld_empid']."";
	$fetchedudetailsqrysql = mysql_query($fetchedudetailsqry);	
	$row=mysql_fetch_array($fetchedudetailsqrysql);	
		$empid = $row['fld_id'];                
		$name = $row['fld_name'];
		$employee = $row['fld_employee_name'];
                $mail = $row['fld_email'];
//                echo $mail;
                $contact = $row['fld_mobile'];
         //package edit       
//        $package_edit = "Select * from tbl_package_detail fld_emp_id = '".$viewempid."' ";  
        
         //   print_r($company);exit;     
        $package_edit = "SELECT * FROM `tbl_package_price` WHERE `fld_emp_id` =$viewempid";
//        echo "SELECT * FROM `tbl_package_detail` WHERE `fld_emp_id` =$viewempid";
        $package_query = mysql_query($package_edit);
        $package_fetch = mysql_fetch_array($package_query);
        $package_id = $package_fetch['fld_pname'];
       
       
               $package_ed="SELECT * FROM tbl_package_price tpp join tbl_package_detail pd on tpp.fld_id=pd.fld_package_id where pd.fld_emp_id=$viewempid";
                
//               echo "SELECT * FROM `tbl_package_price` tpp join tbl_package_detail pd on tpp.fld_id=pd.fld_package_id where pd.fld_emp_id=$viewempid";;
		$package_quer = mysql_query($package_ed);
                $package_fet = mysql_fetch_array($package_quer);
                $package_year = $package_fet['fld_year'];
                $package_name = $package_fet['fld_package_name'];
                $pprice = $package_fet['fld_pprice'];
                $package_id = $package_fet['fld_package_id'];
               
                
//                if ($company == "") {
//                $err_employee = "Valid Name is required.";
//	}
                
               
?>
                
                        <?php
                        $sql="select * from tbl_package_detail where fld_emp_id =$viewempid";
//                        echo "select * from tbl_package_detail where fld_emp_id =$viewempid";
                        $res=mysql_query($sql);
                        $rows=mysql_fetch_assoc($res)
                        ?>
                                
                                <div class="plan-price">
                                    <input type="hidden" id="package_id" value="<?php echo $rows['fld_package_id']; ?>">
                                </div>
                                
                
                
                
                
                
                    <div>
                        
                        <h4 class="modal-title" id="myModalLabel">Edit/Update Employer Details</h4>
                    </div>
                    <div class="modal-body">     
                        <form  class="form-horizontal" method="POST" id="form_edit" name="form_edit" >
                       	
                        <div class="col-md-12 col-sm-12 col-xs-12">
                            <div class="form-group">
                               <label class="col-sm-4 control-label">Employee  <span class="required">*</span></label>
                                <div class="col-sm-6">
                               <input id="employee" name="employee" placeholder="Enter The Employee Name" class="form-control" type="text" value="<?php echo $company; ?>">
                                <span class="err_txt help-block" id="err" style="display:none;">Please Provide your Company name </span></div>

                                
                                </div>
                            </div>
                            
                       

                        <div class="col-md-12 col-sm-12 col-xs-12">
                            <div class="form-group">
                               <label class="col-sm-4 control-label">Email<span class="required">*</span></label>
                                <div class="col-sm-6">
                               <input type="email" id="mail"  placeholder="Enter The Valid mail-id" class="form-control"  value="<?php echo $mail; ?>">
                               <span class="err_txt help-block" id="err_mail" style="display:none;"> Please enter valid email</span>
                               <!--<span class="err_txt help-block" id="err_in" style="display:none;"> Invalid email</span>-->
                                </div>
                            </div>
                        
                            

                            <div class="col-md-12 col-sm-12 col-xs-12">
                                <div class="form-group">
                                   <label class="col-sm-4 control-label">Address<span class="required">*</span></label>
                                    <div class="col-sm-6">
                                   <textarea id="address" rows="5" cols="5" placeholder="Enter The Address" class="form-control" type="text" ><?php echo $address; ?></textarea>
                                   <span class="err_txt help-block" id="err2" style="display:none;">Enter the Address</span></div>
                                    </div>
                            </div>
                           
                            
                            <div class="col-md-12 col-sm-12 col-xs-12">
                                <div class="form-group">
                                   <label class="col-sm-4 control-label">Contact No  <span class="required">*</span></label>
                                    <div class="col-sm-6">
                                   <input id="mobile" placeholder="Enter The Contact Number" class="form-control" type="text" value="<?php echo $contact; ?>">
                                   <span class="err_txt help-block" id="err3" style="display:none;">Enter the contact number</span></div>
                                    </div>
                                </div>
                              
                            <div class="col-md-12 col-sm-12 col-xs-12">
                                <div class="form-group">
                                   <label class="col-sm-4 control-label">No.Of Employees <span class="required">*</span></label>
                                    <div class="col-sm-6">
                                   <input id="empnum" placeholder="Enter The No.Of Employees" class="form-control" type="text" value="<?php echo $no_of_emp; ?>">
                                   <span class="err_txt help-block" id="err4" style="display:none;">No.Of Employees Must</span></div>
                                    </div>
                                </div>
                           
                            
                            <div class="col-md-12 col-sm-12 col-xs-12">
                                <div class="form-group">
                                   <label class="col-sm-4 control-label">Industry Type <span class="required">*</span></label>
<!--                                   <span class="err_txt help-block" id="err5" style="display:none;">please fill Industry Type</span></div>-->
                                    <div class="col-sm-6">
                                   <select class="questions-category form-control" id="industry" tabindex="-1">                                
                            <?php
                                $fetchedusqry = "SELECT  fld_industrytype FROM tbl_industry_type ";
                                $fetchedusqrysql = mysql_query($fetchedusqry);	
                                while($recordedu=mysql_fetch_assoc($fetchedusqrysql)){            
                                $industype = $recordedu['fld_industrytype'];
                            ?>
                                <option value="<?php echo $industype?>" <?php if  ($industype == $industry) { echo "selected";} ?>><?php echo $industype; ?></option>
                            <?php
                            }
                            ?>
                            </select>  
                                    </div>
                                </div>
                             </div>
                            
                            
                             
                            <?php// $cities=explode(",", $city);
//                                                print_r($cities);exit;?>
                            
                             <div class="col-md-12 col-sm-12 col-xs-12">
                                <div class="form-group">
                                   <label class="col-sm-4 control-label">Location <span class="required">*</span></label>
<!--                                    <span class="err_txt help-block" id="err6" style="display:none;">Please fill Location</span></div>-->
                                    <div class="col-sm-6">
                                        <select id="city" name="city" class="questions-category form-control" data-placeholder="Select Your City(s)" multiple="multiple">
                                                 <?php 

                                             $sql="select fld_name from tbl_cities_old WHERE fld_status=0";
     //                                        echo "select fld_name from tbl_cities_old WHERE fld_status=0 ";
                                             $res=mysql_query($sql);
                                                 while($rows=mysql_fetch_assoc($res))
                                                 {
                                                     $cities=explode(",", $city);

                                                     foreach($cities as $citi)
                                                     {
                                                  ?>
                                                     <option  
                                                     <?php if($citi == $rows['fld_name']){echo("selected");}}?>  
                                                         value="<?php echo $rows['fld_name'];?>" >
                                                             <?php echo $rows['fld_name'];?>
                                                     </option>

                                                     <?php }?>
                                        </select>
                                        <div id="edit_city"></div>
                                    </div>
                                </div>
                             </div>
                            
                            <div class="col-md-12 col-sm-12 col-xs-12">
                                <div class="form-group">
                                    <label class="col-sm-4 control-label">About Company<span class="required">*</span></label>
                                    <span class="err_txt help-block" id="err7" style="display:none;">About your company</span>
                                    <div class="col-sm-6">
                                        <textarea id="about" placeholder="Enter The Contact Number" class="form-control" type="text" value="<?php echo $about; ?>" style="width: 100%; height: 125px; font-size: 14px; line-height: 18px; border: 1px solid #dddddd; padding: 10px;"><?php echo $about; ?></textarea>
                                        <span class="help-block"><?php //echo $about; ?></span>
                                    </div>
                                </div>
                            </div>
                            
   

                              
                            <div class="col-md-12 col-sm-12 col-xs-12">
                                <h4 class="modal-title" id="myModalLabel">Edit/Update Package Details</h4>
                            </div>
                           
                            <div class="col-md-12 col-sm-12 col-xs-12">
                                <div class="form-group packagetype">
                                   <label class="col-sm-4 control-label">Package Name</label>
                                   <!--<span class="err_txt help-block" id="err8" style="display:none;">Select package</span></div>-->
                                    <div class="col-sm-6">
                                        <select class="questions-category form-control" id="package" name="package" tabindex="-1">  
                                            
                                            <?php

                                                $packageqry = "SELECT fld_pname,fld_pprice FROM tbl_package_price";
                                                $fetchsql = mysql_query($packageqry);	
                                                while($row=mysql_fetch_assoc($fetchsql)){            
                                                $packname = $row['fld_pname'];
                                                $packprice = $row['fld_pprice'];
                                            ?>
                                                <option value="<?php echo $packprice?>" <?php if ($packname == $package_name){ echo "selected";} ?>><?php echo $packname; ?></option>
                                            <?php
                                            }
                                            ?>
                                        </select>  
                                    </div>
                                </div>
                             </div>
                 
                
                
                
                             <div class="col-md-12 col-sm-12 col-xs-12">
                            <div class="form-group">
                               <label class="col-sm-4 control-label">Validity <span class="required">*</span></label>
                               <!--<span class="err_txt help-block" id="err9" style="display:none;">Enter the year</span></div>-->
                                <div class="col-sm-6">
                              <select  id="dare_price" name="dare_price" >
                                  <option value="0">Select Year</option>
                                  <?php
                                 $test = array(1,2,3,4,5); 
                                  //print_r($test);
                               $packageqry = "SELECT * FROM tbl_package_detail where fld_emp_id =$viewempid ";

                                $fetchsql = mysql_query($packageqry);	
                                $row=mysql_fetch_assoc($fetchsql);            
                                $packyear = $row['fld_year'];

                                ?>
                               <?php   foreach($test as $test_value){?>
                                               <option  
                                                     <?php if($test_value == $packyear){echo("selected");}?>  
                                                         value="<?php echo $test_value;?>" >
                                                             <?php echo $test_value." year";?>
                                                     </option>
                               <?php   }?>
                                                  

                                                    
                                        </select>
                                </div>
                            </div>
                        </div>
                             
                        <div class="col-md-12 col-sm-12 col-xs-12">
                            <div class="form-group">
                               <label class="col-sm-4 control-label">Currency Type <span class="required">*</span></label>
                               <!--<span class="err_txt help-block" id="err10" style="display:none;">Enter the Currency</span></div>-->
                                <div class="col-sm-6">
                                    <select  id="currency_type" name="currency_type" >
                                  <option value="0">Select Currency</option>

                                  <?php
                                  
                                 $test_currency = array(1=>'Dollar',2=>'Indian'); 
                                 print_r($test_currency);
                                $currencyqry = "SELECT * FROM tbl_package_detail where fld_emp_id =$viewempid ";
                                $fetchsql = mysql_query($currencyqry);	
                                $row = mysql_fetch_assoc($fetchsql);            
                                $currency = $row['fld_currency_type'];
                                
                                ?>
                               <?php   foreach($test_currency as  $key => $value){?>
                                               <option  
                                                     <?php if($key == $currency){echo("selected");}?>  
                                                         value="<?php echo $key;?>" >
                                                             <?php 
                                                             echo $value;?>
                                                     </option>
                               <?php   }?>
                                                         
                                        </select>
                                </div>
                            </div>
                        </div>
                          

                            <?php 
                           $total_price="SELECT * FROM tbl_package_price tpp join tbl_package_detail pd on tpp.fld_id=pd.fld_package_id where pd.fld_emp_id=$viewempid";
//                           echo $total_price;
                           $price_fetch = mysql_query($total_price);
                           $rows=mysql_fetch_assoc($price_fetch);
                           //  echo $rows['fld_price'];
                           ?>  
                            
                         
                        <div class="col-md-12 col-sm-12 col-xs-12">
                            <div class="form-group">
                                <label class="col-sm-4 control-label">Package Price<span class="required">*</span></label>
                                <div class="col-sm-6 total_price">
                                    
                                    <input  id="total_price_amount" value="<?php echo $rows['fld_total']; ?>"/> 
                                </div>
                            </div>
                        </div>
                             
                        <div class="modal-footer">
                            <input id="updatejobskill"  type="button" name="submit" class="btn btn-success"  value ="Save Details">     
                            <!--<input id="updatejobskill" type="button" name="submit" value ="Save Details" >--> 
                            <input class="btn btn-warning" Type="button" VALUE="Back" onClick="location.href = 'emp_manage.php'">
                       </div> 
                    </form>
                </div>     
                  </aside>
            </div>
                


                    <?php         
                     }
                    ?>
      
        
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.0/jquery.min.js"></script>
     <script type="text/javascript" src="scripts/validate.min.js"></script>  
      <script src="//cdn.ckeditor.com/4.4.3/standard/ckeditor.js"></script>
         <script src="js/plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.all.min.js" type="text/javascript"></script>
     
     
  <script>  
$(document).ready(function () {
    
    //var name = $("#id").attr("name");
    
    
    
                    var year = $("#dare_price").val();
                    var currency = $("#currency_type").val();
                    var price = $("#price").val();
                    var pack = $("#package").val();
                    
                    if(currency=='1'){
                    var dollar = (year * price * 1);
                     $(".total_price").html('<input id="total_price_amount"  value=' +dollar+' />');
                    }
                     $('#package').change(function(){
                    var year = $("#dare_price").val();
                    var currency = $("#currency_type").val();
//                    var pack = $("#package").val();
//                    alert (pack);
//                    if(pack != '' ){
//                        $(".total_price").html('<input id="total_price_amount" value='+pack+' />');
//                    }
                   
                    
                    var year = $("#dare_price").val();
                    var currency = $("#currency_type").val();
                    var pack1 = $("#total_price_amount").val();
                    if(currency=='0' || year == '0'){
                        var test = '0';
                        //alert(test);
                          $("#total_price_amount").val(test);
                    }else{
                         $(".total_price").html('<input id="total_price_amount" value='+pack1+' />');
                    }   
                    
                    
                    
                    
                    });
                    
                    
        $('#currency_type,#dare_price').change(function(){
                    var year = $("#dare_price").val();
                    var currency = $("#currency_type").val();
//                    var price = $("#price").val();
                    var pack = $("#package").val();
                    if(currency=='2'){
                    var indian = (year * pack * 65);
//                    alert (indian);
                    $(".total_price").html('<input id="total_price_amount"  value=' +indian+' />');
                    }
                    else if(currency=='1') {
                    var dollar = (year * pack * 1);
                    $(".total_price").html('<input id="total_price_amount"  value=' +dollar+' />');
                    }
//                    else{
//                        var test = '0';
//                       $(".total_price").html('<input id="total_price_amount"  value=' +test+' />');
//                        }
                });
                });
                
</script>   
<script>
  
  $("#package").change(function(){
    $("#dare_price")[0].selectedIndex = 0;
    $("#currency_type")[0].selectedIndex = 0;
//    var test = '0';
//    $('#total_price_amount').val(test);
  });
  
  
</script>
<!--<script>
$(document).ready(function() {
$('#updatejobskill').click(function(){



});
 });
</script>-->

<script type = "text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.8.3/jquery.min.js"></script>

<script>
    $('#updatejobskill').click(function(){
        
        function ValidateEmail(email) {
        var expr = /^([\w-\.]+)@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.)|(([\w-]+\.)+))([a-zA-Z]{2,4}|[0-9]{1,3})(\]?)$/;
        return expr.test(email);
            };
            if (!ValidateEmail($("#mail").val())) {
            $('#err_mail').show();
        }



//$('#mail').on('keypress', function() {
//    var re = /([A-Z0-9a-z_-][^@])+?@[^$#<>?]+?\.[\w]{2,4}/.test(this.value);
//    if(!re) {
//        $('#err_mail').show();
//    } else {
//        $('#err_mail').hide();
//    }
//})
        
            var employee = $("#employee").val();
            
                        if(employee == "" ){
                            $('#err').show();
                                    }
                               else{$('#err').hide();}     
                          
        
                        var address = $("#address").val();
                               if(address == "" ){
                                   $('#err2').show();

                        }else{$('#err2').hide();}

                       var mobile = $("#mobile").val();
                               if(mobile == "" ){
                                   $('#err3').show();

                        }else{$('#err3').hide();}
                        

                       var about = $("#about").val();
                               if(about == "" ){
                                   $('#err7').show();

                        }else{$('#err7').hide();}
                       
                    var empnum = $("#empnum").val();
                               if(empnum == "" ){
                                   $('#err4').show();

                        }
                        
    
    if(employee!='' && address!='' && (ValidateEmail($("#mail").val()))!='' && mobile!='' && about!='' && empnum!='' ){
    
       var id = '<?php echo $viewempid; ?> '; 
       var empid = '<?php echo $empid; ?>';
       
//        function fn_emp(id ,empid)
//      {    
        var employee = $("#employee").val();
        var mail = $("#mail").val();
        var address = $("#address").val();
        var mobile = $("#mobile").val();
        var industry = $("#industry").val();
        var about = $("#about").val();
        var empnum = $("#empnum").val();
        var location = $("#city").val();
        var year = $("#dare_price").val();
        var price = $("#package").val();
        var total = $("#total_price_amount").val();
        var currency_type = $("#currency_type").val();
        
   var dataString = '&employee='+ employee + '&mail='+ mail + '&address='+ address + '&mobile='+ mobile + '&id='+ id + '&empid='+ empid + 
                         '&industry='+ industry + '&about='+about+'&empnum='+empnum+'&location='+location+'&price='+ price+ '&year='+ year+
                         '&total='+ total+'&currency_type='+currency_type ;
//        alert (dataString);
       
        
        
//        if(employee==''|| mail==''|| address==''|| mobile==''|| industry=='')
//        {
//        alert("Please Fill All Fields");
//        }
//        else
//        {
        $.ajax({
        type: "POST",
        url: "ajaxdel.php?op=emp",
        data: dataString,
        cache: false,
        success: function(result){
               //alert(result);
            alert('Updated Successfully');
         window.location.href = "emp_manage.php";

        }
        });
        //}
        return false;
//        }
            
            
            } 
//             }
//             });
//        });
//            
       
    });  
        
      </script>  
                <script>
		$("#about").wysihtml5();
		</script>
    <script>
$(document).ready(function() {
    setTimeout('$(".err_txt").fadeOut()',3500);
  });
</script>
               