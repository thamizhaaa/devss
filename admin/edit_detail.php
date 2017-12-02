<?php
error_reporting(0);
include "admin_session.php";
//print_r($_REQUEST['id']);
?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title>Employer Management | StaffingSpot</title>
        <meta content='width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no' name='viewport'>
        <link href="css/bootstrap.min.css" rel="stylesheet" type="text/css" />
        <link href="//cdnjs.cloudflare.com/ajax/libs/font-awesome/4.1.0/css/font-awesome.min.css" rel="stylesheet" type="text/css" />
        <!-- Ionicons -->
        <link href="//code.ionicframework.com/ionicons/1.5.2/css/ionicons.min.css" rel="stylesheet" type="text/css" />
        <!-- Theme style -->
        <link href="css/AdminLTE.css" rel="stylesheet" type="text/css" />
        <link href="css/bootstrap-wysihtml5/bootstrap3-wysihtml5.min.css" rel="stylesheet" type="text/css" />
        <link href="../scripts/ddl/jquery.flexdatalist.css" rel="stylesheet" type="text/css">
        <link href="../scripts/ddl/jquery.flexdatalist.min.css" rel="stylesheet" type="text/css">
      
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
                       Employer Management
                        <!--<small>It all starts here</small>-->
                    </h1>
                    <ol class="breadcrumb">
                        <li><a href="admin_home.php"><i class="fa fa-dashboard"></i> Home</a></li><li class="active">Employer Management</li>
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
        $query = mysql_query("select * from tbl_employer_details where fld_id='".$viewempid."'");
        $array = mysql_fetch_array($query);
        $company = $array['fld_employer_name'];
        $emp_id = $array['fld_id'];
        $mobile = $array['fld_phone'];
        $register1 = date_create($array['fld_dor']);
        $register = date_format($register1,"F j, Y");
        $member = $array['fld_membership_type'];
        $industry = $array['fld_indusType'];
        $address = $array['fld_address'];
        
        
        $country = $array['fld_country'];
        $state = $array['fld_state'];
        $city = $array['fld_city'];
        $no_of_emp = $array['fld_worker'];
        $about = $array['fld_company_desc'];
        $business_entity = $array['fld_company_type'];
       
        $fetchedudetailsqry = mysql_query("select * from tbl_employer WHERE  fld_id='".$viewempid."'");
        $fetcheddetail = mysql_fetch_array($fetchedudetailsqry);
        $email = $fetcheddetail['fld_email'];
        $name = $fetcheddetail['fld_name'];
        $employee = $fetcheddetail['fld_employee_name'];
        $contact = $fetcheddetail['fld_mobile'];
        $empid = $fetcheddetail['fld_id'];
        $empstatus = $fetcheddetail['fld_emp_status'];
 
        $package_edit = "SELECT * FROM `tbl_package_price` WHERE `fld_emp_id` =$viewempid";

        $package_query = mysql_query($package_edit);
        $package_fetch = mysql_fetch_array($package_query);
        $package_id = $package_fetch['fld_pname'];
       
       
        $package_ed="SELECT * FROM tbl_package_price tpp join tbl_package_detail pd on tpp.fld_id=pd.fld_package_id where pd.fld_emp_id=$viewempid";

         $package_quer = mysql_query($package_ed);
         $package_fet = mysql_fetch_array($package_quer);
         $package_year = $package_fet['fld_year'];
         $package_name = $package_fet['fld_package_name'];
         $pprice = $package_fet['fld_pprice'];
         $package_id = $package_fet['fld_package_id'];
               
   
?>
                
                        <?php
                        $sql="select * from tbl_package_detail where fld_emp_id =$viewempid";

                        $res=mysql_query($sql);
                        $rows=mysql_fetch_assoc($res)
                        ?>
                                
                                <div class="plan-price">
                                    <input type="hidden" id="package_id" value="<?php echo $rows['fld_package_id']; ?>">
                                </div>
                                
                    
                <div class="col-md-12 col-sm-12 col-xs-12">     
                        <form  class="form-horizontal" method="POST" id="form" name="form_edit" >
                       	
                        <div class="col-md-12 col-sm-12 col-xs-12">
                            <h4 class="modal-title" id="myModalLabel">Edit/Update Employer Management Details</h4>
                            <hr>
                        </div>
                            
                            <div class="col-md-12 col-sm-12 col-xs-12">
                            <div class="form-group">
                                <label class="col-sm-4 control-label" disabled="true">Employer Id  </label>
                                <div class="col-sm-6">
                                    <input id="employee_id" name="employeeid" placeholder="Enter The Employee id" class="form-control" type="text" value="<?php echo 'EMP-'.$emp_id; ?>" disabled="true">
                                </div>
                            </div>
                        </div>
                            
                        <div class="col-md-12 col-sm-12 col-xs-12">
                            <div class="form-group">
                                <label class="col-sm-4 control-label">Employer Name  <span class="required">*</span></label>
                                <div class="col-sm-6">
                                    <input id="employee" name="employee" placeholder="Enter The Employee Name" class="form-control" type="text" value="<?php echo $company; ?>">
                                    <span class="err_txt help-block" class="errr" id="err" style="display:none;">This field is required</span>
                                </div>
                            </div>
                        </div>
                            
                            
                        <div class="col-md-12 col-sm-12 col-xs-12">
                            <div class="form-group">
                                <label class="col-sm-4 control-label">Email<span class="required">*</span></label>
                                <div class="col-sm-6">
                                    <input type="email" id="mail"  placeholder="Enter The Valid mail-id" class="form-control"  value="<?php echo $email; ?>" disabled="true">
                                    <span class="err_txt help-block" id="err_mail" style="display:none;"> This field is required</span>
                                    <!--<span class="err_txt help-block" id="err_in" style="display:none;"> Invalid email</span>-->
                                </div>
                            </div>
                        </div>
                            
                        <div class="col-md-12 col-sm-12 col-xs-12">
                            <div class="form-group">
                                <label class="col-sm-4 control-label">Address<span class="required">*</span></label>
                                <div class="col-sm-6">
                                    <textarea id="address" rows="5" cols="5" placeholder="Enter The Address" class="form-control" type="text" ><?php echo $address; ?></textarea>
                                    <span class="err_txt help-block" id="err2" style="display:none;">This field is required</span>
                                </div>
                            </div>
                        </div>
                           
                        <div class="col-md-12 col-sm-12 col-xs-12">
                            <div class="form-group">
                                <label class="col-sm-4 control-label">Contact No  <span class="required">*</span></label>
                                <div class="col-sm-6">
                                   <input id="mobile" onkeypress="javascript:return isNumber(event)" placeholder="Enter The Contact Number" class="form-control" type="number" value="<?php echo $contact; ?>">
                                   <span class="err_txt help-block" id="err3" style="display:none;">This field is required</span>
                                </div>
                            </div>
                        </div>
                              
                        <div class="col-md-12 col-sm-12 col-xs-12">
                            <div class="form-group">
                                <label class="col-sm-4 control-label">No.Of Employees <span class="required">*</span></label>
                                <div class="col-sm-6">
                                    <input id="empnum" onkeypress="javascript:return isNumber(event)" placeholder="Enter The No.Of Employees" class="form-control" type="text" value="<?php echo $no_of_emp; ?>">
                                    <span class="err_txt help-block" id="err4" style="display:none;">This field is required</span>
                                </div>
                            </div>
                        </div>
                           
                        <div class="col-md-12 col-sm-12 col-xs-12">
                            <div class="form-group">
                               <label class="col-sm-4 control-label">Industry Type <span class="required">*</span></label>
<!--                                   <span class="err_txt help-block" id="err5" style="display:none;">please fill Industry Type</span></div>-->
                                <div class="col-sm-6">
                                    <select class="questions-category form-control" id="industry" tabindex="-1">                                
                                        <option value="">Select Industry Type</option>
                                        <?php
                                            $fetchedusqry = "SELECT  fld_industrytype FROM tbl_industry_type WHERE fld_delstatus!=2 ";
                                            $fetchedusqrysql = mysql_query($fetchedusqry);	
                                            while($recordedu=mysql_fetch_assoc($fetchedusqrysql)){            
                                            $industype = $recordedu['fld_industrytype'];
                                        ?>
                                        <option value="<?php echo $industype?>" <?php
					if  ($industype == $industry) { echo "selected";} ?>><?php echo $industype; ?></option>
                                        <?php
                                        }
                                        ?>
                                    </select>  
                                    <span class="err_txt help-block" id="err5" style="display:none;">This field is required</span>
                                </div>
                            </div>
                        </div>
                            
                            
                        <div class="col-md-12 col-sm-12 col-xs-12">
                            <div class="form-group">
                                <label class="col-sm-4 control-label">Country <span class="required">*</span></label>
                                <div class="col-sm-6">
                                    <?php
                                    $country_id=[];
                                    $roles=explode(",", $country);

                                                            foreach($roles as $role)
                                                            { 

                                    $sql="SELECT `fld_id` FROM `tbl_countries` WHERE `fld_name` = '$role'";
                                                    $res=mysql_query($sql);
                                                        while($rows=mysql_fetch_assoc($res))
                                                    {
                                                            array_push($country_id, $rows['fld_id']);
                                                    }
                                                            }
                                    
                                    
                                    ?>
                                    
                                    <input type='text'
                                        value='<?php echo $country; ?>'
                                        placeholder='Enter your country name'
                                        class='flexdatalist country_allresults'
                                        data-data='country.json'
                                        data-search-in='country'
                                        data-visible-properties='["country"]'
                                        data-selection-required='true'
                                        data-value-property='country'
                                        data-text-property='{country}'
                                        data-min-length='1'
                                        multiple='multiple'
                                        name='country'>

                                    <span class="err_txt help-block" id="err6" style="display:none;">This field is required</span>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-12 col-sm-12 col-xs-12">
                            <div class="form-group">
                                <label class="col-sm-4 control-label">State <span class="required">*</span></label>
                                <div class="col-sm-6">
                                        <select id="state" name="state" class="questions-category form-control state_allresults" data-placeholder="Select state" multiple="true">
                                <?php 
                                $state_id=[];
                                $state_name=[];
                                $cid=  implode(",", $country_id);
                        $sql="SELECT * FROM `tbl_states` WHERE `fld_country_id` in ($cid)";
                                        $res=mysql_query($sql);
                                            while($rows=mysql_fetch_assoc($res))
                                {   
                                                array_push($state_id, $rows['fld_id']);
                                                array_push($state_name, $rows['fld_name']);
                                        
                                }
                                
                                                 foreach($state_name as $state_name_list)
                                                {  
                                                
                                $roles=explode(",", $state);
                                ?>
                                

                                        <option <?php if(in_array($state_name_list, $roles)){echo("selected");} ?>  value="<?php echo $state_name_list;?>" ><?php echo $state_name_list;?></option>

                                    
                                    <?php

                                        }
                                           ?>
                                </select>
                                    <span class="err_txt help-block" id="err7" style="display:none;">This field is required</span>                                    
                                </div>
                            </div>
                        </div>
                        <div class="col-md-12 col-sm-12 col-xs-12">
                            <div class="form-group">
                                <label class="col-sm-4 control-label">City <span class="required">*</span></label>
                                <div class="col-sm-6">
                                        <select id="city" name="city" class="questions-category form-control" data-placeholder="Select city" multiple="true">
                                <?php
                                
                                $city_id=[];
                                $city_name=[];
                                $sid=  implode(",", $state_id);
                        $sql="SELECT * FROM `tbl_cities` WHERE `fld_state_id` IN ($sid)";
                                        $res=mysql_query($sql);
                                            while($rows=mysql_fetch_assoc($res))
                                {   
                                                array_push($city_id, $rows['fld_id']);
                                                array_push($city_name, $rows['fld_name']);
                                        
                                }
                                                 foreach($city_name as $city_name_list)
                                                {
                                
                                
                                
                                
                                $roles=explode(",", $city);

//                                foreach($roles as $role)
//                                {  
                                ?>
                                <!--<option selected value="<?php echo $role;?>" ><?php echo $role;?></option>-->
                                        <option <?php if(in_array($city_name_list, $roles)){echo("selected");} ?>  value="<?php echo $city_name_list;?>" ><?php echo $city_name_list;?></option>


                                    <?php
                                    

                                }  ?>
                                </select>
                                <span class="err_txt help-block" id="err8" style="display:none;">This field is required</span>
                                </div>
                            </div>
                        </div>
                            
                              
                        <div class="col-md-12 col-sm-12 col-xs-12">
                            <div class="form-group">
                                <label class="col-sm-4 control-label">About Company<span class="required">*</span></label>
                                <div class="col-sm-6">
                                    <textarea id="about" placeholder="Enter The Contact Number" class="form-control" type="text" value="<?php echo $about; ?>" style="width: 100%; height: 125px; font-size: 14px; line-height: 18px; border: 1px solid #dddddd; padding: 10px;"><?php echo $about; ?></textarea>
                                    <span class="err_txt help-block" id="err9" style="display:none;">This field is required</span>
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
                                            } elseif ($empstatus == 1) {
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
                                            } elseif ($empstatus == 0) {
                                                ?> selected="selected"
                                                <?php
                                            }
                                            ?>>InActive
                                    </option>
                                </select>
                                </div>
                            </div>
                        </div>
                            
                        <div class="col-md-12 col-sm-12 col-xs-12">
                            <h4 class="modal-title" id="myModalLabel">Edit/Update Package Details</h4>
                            <hr>
                        </div>
                         <?php

//                                            $packageqry = "SELECT fld_id,fld_pname,fld_pprice FROM tbl_package_price";
    $packageqry = "SELECT tbl_package_detail.fld_pck_id,tbl_package_detail.fld_package_id,tbl_package_detail.fld_total,tbl_package_detail.fld_year,tbl_package_detail.fld_emp_id,tbl_package_price.fld_id,tbl_package_price.fld_pname,tbl_package_price.fld_pprice,tbl_package_price.fld_currency_type FROM tbl_package_detail INNER JOIN tbl_package_price ON (tbl_package_detail.fld_package_id=tbl_package_price.fld_id) WHERE tbl_package_detail.fld_emp_id =$viewempid ";
    
			    $fetchsql = mysql_query($packageqry);	
                                            while($row=mysql_fetch_assoc($fetchsql)){ 
						$origpackname = $row['fld_pname'];
						$origpackprice = $row['fld_pprice'];
						$origpackid = $row['fld_pck_id'];
						$origyear = $row['fld_year'];
						$origcurrtype = $row['fld_currency_type'];
						$origtotal = $row['fld_total'];
					    }           
                                            
			 
			 ?>
		    <div class="col-md-12 col-sm-12 col-xs-12">
			<div class="form-group packagetype">
                                <label class="col-sm-4 control-label">Package Name</label>
                                   <!--<span class="err_txt help-block" id="err8" style="display:none;">Select package</span></div>-->
			    <div class="col-sm-6">
				<select class="questions-category form-control" id="package" name="package" tabindex="-1">  
				    <?php 
					$packageqry_pname = "SELECT fld_id,fld_pname,fld_pprice FROM tbl_package_price where fld_delstatus!=2";
					$fetchsql_name = mysql_query($packageqry_pname);
					while($row_name=mysql_fetch_assoc($fetchsql_name)){  
						$packname = $row_name['fld_pname'];
						$packprice = $row_name['fld_pprice'];
						$packid = $row_name['fld_id'];
				    ?>
				    <option id="<?php echo $packid;?>" value="<?php echo $packprice;?>" <?php if ($packname == $origpackname)
					{ echo "selected";} ?>>
					    <?php echo $packname; ?>
				    </option>
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
                                    <select  id="dare_price" name="dare_price" class="form-control">
                                        <option value="0">Select Year</option>
                                        <?php
                                       $test = array(1,2,3,4,5); 

                                      ?>
                                     <?php   foreach($test as $test_value){
					 ?>
						    <option  
                                                           <?php if($test_value == $origyear){echo("selected");}?>  
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
                                    <select  id="currency_type" name="currency_type" class="form-control" >
                                        <option value="0">Select Currency</option>

					    <?php                                               
                                              $currencyqry = "SELECT fld_id,fld_currency_name FROM tbl_currency_type where fld_currency_delstatus!=2";
                                              $fetchsql_curr = mysql_query($currencyqry);	
                                              while($row_curr = mysql_fetch_assoc($fetchsql_curr)){    
						  
//						$currency = $row_curr['fld_currency_name'];
					    ?>
					    <option <?php if($origcurrtype == $row_curr['fld_currency_name']){echo("selected");}?>  value="<?php echo $row_curr['fld_currency_name'];?>" >
						<?php 
						echo $row_curr['fld_currency_name'];?>
					    </option>
                                             <?php   
					      }
					     ?>
                                                         
                                    </select>
                                </div>
                            </div>
                        </div>
                          

                         
                        <div class="col-md-12 col-sm-12 col-xs-12">
                            
                                <label class="col-sm-4 control-label ">Package Price<span class="required">*</span></label>
                                <div class="col-sm-6 total_price ">                                    
                                    <input  id="total_price_amount" class="form-control" value="<?php echo $origtotal; ?>" disabled="true" onclick="function isNumber()"> 
                                </div>
                            </div>
                        
                        
                        <div class="col-md-12 col-sm-12 col-xs-12 col-md-offset-4">
                            <div class="bttn-rite">
                                <div class="form-group">
                                <input id="updatejobskill"  type="button" name="submit" class="btn btn-success resume-btn  mob-btn btn-left"  value ="Save"> 
                                <input type="reset" id="reset" class="btn btn-warning resume-btn  mob-btn  btn-left" value="Reset" />
                                <input class="btn btn-warning resume-btn  mob-btn  btn-left" Type="button" VALUE="Back" onClick="location.href = 'emp_manage.php'">
                                </div>
                            </div> 
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
<script src="../js/plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.all.min.js" type="text/javascript"></script>
<script type = "text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.8.3/jquery.min.js"></script>
<script src="../scripts/ddl/jquery.flexdatalist.min.js"></script>
<script src="../scripts/ddl/jquery.flexdatalist.js"></script>
<!-- shifting across different page -->
<script src="js/bootstrap.min.js" type="text/javascript"></script>
<!-- AdminLTE App -->
<script src="js/AdminLTE/app.js" type="text/javascript"></script>
        
<script>


// WRITE THE VALIDATION SCRIPT IN THE HEAD TAG.

function isNumber(evt) {
    var iKeyCode = (evt.which) ? evt.which : evt.keyCode
    if (iKeyCode != 46 && iKeyCode > 31 && (iKeyCode < 48 || iKeyCode > 57))
        return false;

    return true;
}



$('#mobile,#empnum').bind("cut copy paste",function(e) {
          e.preventDefault();
      });

            </script>
     
  <script>  
$(document).ready(function () {
                    var pck_id = '';
    
                    var year = $("#dare_price").val();
                    var currency = $("#currency_type").val();
                    var price = $("#price").val();
                    var pack = $("#package").val();
                    
                    if(currency=='1'){
                    var dollar = (year * price * 1);
                     $(".total_price").html('<input id="total_price_amount"  value=' +dollar+' disabled="true">');
                    }
                     $('#package').change(function(){
                            var year = $("#dare_price").val();
                            var currency = $("#currency_type").val();
                           
                           
                            var pack1 = $("#total_price_amount").val();
                            if(currency=='0' || year == '0'){
                                var test = '0';
                                //alert(test);
                                  $("#total_price_amount").val(test);
                            }else{
                                 $(".total_price").html('<input id="total_price_amount" value='+pack1+' disabled="true">');
                            }   
                    
                 });
//               alert(pck_id);
                    
                    
                    $('#currency_type,#dare_price').change(function(){
                                var year = $("#dare_price").val();
                                var currency = $("#currency_type").val();

                                var pack = $("#package").val();
                                if(currency=='Indian Rupee'){
                                var indian = (year * pack * 65);

                                $(".total_price").html('<input id="total_price_amount"  value=' +indian+' disabled="true">');
                                }
                                else if(currency=='US Dollar') {
                                var dollar = (year * pack * 1);
                                $(".total_price").html('<input id="total_price_amount"  value=' +dollar+' disabled="true">');
                                }

                            });
                            
                            $('#package').change(function(){
                            
                             pck_id = $(this).children(":selected").attr("id");
                             
                             });
                //alert(pck_id);
$('#updatejobskill').click(function(){
        function ValidateEmail(email) {
        var expr = /^([\w-\.]+)@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.)|(([\w-]+\.)+))([a-zA-Z]{2,4}|[0-9]{1,3})(\]?)$/;
        return expr.test(email);
            };
            if (!ValidateEmail($("#mail").val())) {
            $('#err_mail').show();
            $('#err_mail').fadeOut(3000);
            }
//            else{$('#err_mail').hide();}
           
                var employee = $("#employee").val();

                if(employee == "" )
                {
                $('#err').show();
                $('#err').fadeOut(3000);
                
                }


                var address = CKEDITOR.instances['address'].getData();
                       if(address == "" ){
                           $('#err2').show();
                           $('#err2').fadeOut(3000);
                }
                else{$('#err2').hide();}

                var mobile = $("#mobile").val();
                       if(mobile == "" ){
                           $('#err3').show();
                           $('#err3').fadeOut(3000);
                }
//                else{$('#err3').hide();}


                var about = CKEDITOR.instances['about'].getData();
                       if(about == "" ){
                           $('#err9').show();
                           $('#err9').fadeOut(3000);
                }
//                else{$('#err9').hide();}

                var empnum = $("#empnum").val();
                       if(empnum == "" ){
                           $('#err4').show();
                           $('#err4').fadeOut(3000);

                }
//                else{$('#err4').hide();}
                
                var err_industry = $("#industry").val();
                       if(err_industry == "" ){
                           $('#err5').show();
                           $('#err5').fadeOut(3000);

                }
//                else{$('#err5').hide();}
                
                var err_country = $("#empnum").val();
                       if(err_country == "" ){
                           $('#err6').show();
                           $('#err6').fadeOut(3000);

                }else{$('#err6').hide();}
                var err_state = $("#empnum").val();
                       if(err_state == "" ){
                           $('#err7').show();
                           $('#err7').fadeOut(3000);

                }
//                else{$('#err7').hide();}
                var err_city = $("#empnum").val();
                       if(err_city == "" ){
                           $('#err8').show();
                           $('#err8').fadeOut(3000);

                }
//                else{$('#err8').hide();}

    
    if(employee!='' && address!='' && (ValidateEmail($("#mail").val()))!='' && mobile!='' && about!='' && empnum!='' && err_industry !='' && err_country !='' && err_state !='' && err_city !=''){
    
       
//       var city_name=[];//json city
//
//       var city1 = $(".city_allresults").val();
//                
//        var location = $.trim(city1);
        
        var country = $(".country_allresults").val();
        var state = $("#state").val();
        var city = $("#city").val();
       
        var id = '<?php echo $viewempid; ?> '; 
        var empid = '<?php echo $empid; ?>';
        var employee = $("#employee").val();
        var mail = $("#mail").val();
        
        
        var address = CKEDITOR.instances['address'].getData();
//	var address = $(ckeditor).text();
        
        
//        var address = $("#address").val();
        var mobile = $("#mobile").val();
        var industry = $("#industry").val();
//        var about = $("#about").val();
        var about = CKEDITOR.instances['about'].getData();
//	var about = $(ckeditor_about).text();



        var empnum = $("#empnum").val();
        var emp_status = $("#status").val();
        
        var year = $("#dare_price").val();
        var price = $("#package").val();

        var total = $("#total_price_amount").val();
        var currency_type = $("#currency_type").val();
        var employee_id= $("#employee_id").val();
        var pck_id = $("#package").children(":selected").attr("id");

       
   var dataString = '&employee='+ employee + '&mail='+ mail + '&address='+ address + '&mobile='+ mobile + '&id='+ id + '&empid='+ empid + 
                    '&industry='+ industry + '&about='+about+'&empnum='+empnum+'&country='+country+'&state='+state+'&city='+city+'&price='+ price+ '&year='+ year+
                    '&total='+ total+'&currency_type='+currency_type +'&pck_id='+pck_id+'&employee_id='+employee_id+'&emp_status='+emp_status;

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
      
        return false;

            }
       
    });
    });
    
    
    $('.country_allresults').change(function () {
//                alert('hi');
                    var value = $(this).val();
                    var items = [];
//                    alert(value);
                    var id=[];
                    var array = value.split(",");
//                    var array = value;
                    $.each(array,function(i){
                              $.getJSON('country.json',function(data){
                        var data_length = Object.keys(data).length;
                                for(var j=0; j < data_length ; j++){
                                    if (data[j].country == array[i]) {
                                      items.push(data[j].id);
                            }
                          }

                        var state_name = items.join(",");
                         //console.log('state_name:',state_name);
                    
                    $.ajax({
                        type: "POST",
                        url: "ajaxdel.php?op=addstate",
                        data: ({country_id: state_name}),
                        success: function (data) {
//                            alert(data);
                            $("#state").html(data);
                        }
                    });
                    });
                             });
                });
                
                $('.state_allresults').change(function () {
                    var value = $(this).val();
                    var items = [];
                    var city = [];
                          var array = value;
                          $.each(array,function(i){
                              $.getJSON('state.json',function(data){
                                var data_length = Object.keys(data).length;
                                for(var j=0; j < data_length ; j++){
                                    if (data[j].state == array[i]) {
                                      items.push(data[j].id);
                                    }
                                }
                        var cities_name = items.join(",");
                                $.ajax({
                                    type: "POST",
                                    url: "ajaxdel.php?op=addcities",
                                    data: ({city_name: cities_name}),
                                    success: function (data) {
                                        $("#city").html(data);
                                    }
                                });
                        });
                    });
                });
    
                
</script>   
<script>
  
  $("#package").change(function(){
    $("#dare_price")[0].selectedIndex = 0;
    $("#currency_type")[0].selectedIndex = 0;

  });
  
  
</script>


 <script>
 $('.country_allresults').flexdatalist({
     minLength: 1,
     valueProperty: '*',
     selectionRequired: true, 
     textProperty: '{country}',
     searchIn: 'country',
     data: 'country.json'
});
</script>
<script>
$("#about").wysihtml5();
</script>
<script>
$(document).ready(function() {
    setTimeout('$(".err_txt").fadeOut()',3000);
  });
</script>

               