<?php
error_reporting(0);
include "admin_session.php";
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
                        <small>it all starts here</small>
                    </h1>
                    <ol class="breadcrumb">
                        <li><a href="admin_home.php"><i class="fa fa-dashboard"></i> Home</a></li><li class="active">Job's Management</li>
                    </ol>
                </section>
                
                
        
        <?php

        $viewempid=$_REQUEST['id'];
    if($viewempid)
    {    
        $query = mysql_query("select * from tbl_employer_details where (fld_delstatus='1'  OR fld_delstatus= '0') AND fld_id='".$viewempid."'");
        $array = mysql_fetch_array($query);
        $state = $array['state'];
        $company = $array['fld_employer_name'];
        //$mobile = $array['fld_phone'];
        $register1 = date_create($array['fld_dor']);
        $register = date_format($register1,"F j, Y");
        $member = $array['fld_membership_type'];
        $industry = $array['fld_indusType'];
        $address = $array['fld_address'];
        
        
	$fetchedudetailsqry = "select * from tbl_employer WHERE  fld_id= '".$array['fld_empid']."'";       
	$fetchedudetailsqrysql = mysql_query($fetchedudetailsqry);	
	$row=mysql_fetch_array($fetchedudetailsqrysql);	
		$empid = $row['fld_id'];                
		$name = $row['fld_name'];
		$employee = $row['fld_employee_name'];
                $mail = $row['fld_email'];
                
                $contact = $row['fld_mobile'];
                
			
?>
                    <div>
                        
                        <h4 class="modal-title" id="myModalLabel">Edit/Update Employeer Details</h4>
                    </div>
                    <div class="modal-body">     
                        <form role="form" class="form-horizontal" autocomplete="off">
                       	
                        <div class="col-md-12 col-sm-12 col-xs-12">
                            <div class="form-group">
                               <label class="col-sm-4 control-label">Employee  <span class="required">*</span></label>
                                <div class="col-sm-6">
                               <input id="employee" placeholder="Enter The Employee Name" class="form-control" type="text" value="<?php echo $company; ?>">
                                </div>
                            </div>
                        </div>

                        <div class="col-md-12 col-sm-12 col-xs-12">
                            <div class="form-group">
                               <label class="col-sm-4 control-label">Email<span class="required">*</span></label>
                                <div class="col-sm-6">
                               <input id="mail" placeholder="Enter The Valid mail-id" class="form-control" type="text" value="<?php echo $mail; ?>">
                                </div>
                            </div>
                        </div>
                            

                            <div class="col-md-12 col-sm-12 col-xs-12">
                            <div class="form-group">
                               <label class="col-sm-4 control-label">Address<span class="required">*</span></label>
                                <div class="col-sm-6">
                               <textarea id="address" rows="5" cols="5" placeholder="Enter The Address" class="form-control" type="text" ><?php echo $address; ?></textarea>
                                </div>
                            </div>
                            </div>
                            
                            <div class="col-md-12 col-sm-12 col-xs-12">
                                                      <div class="form-group">
                                                         <label class="col-sm-4 control-label">Contact No  <span class="required">*</span></label>
                                                          <div class="col-sm-6">
                                                         <input id="mobile" placeholder="Enter The Contact Number" class="form-control" type="text" value="<?php echo $contact; ?>">
                                                          </div>
                                                      </div>
                                                  </div>
                              <label for="email" class="col-sm-4 control-label">Industry Type</label>
                              <div class="col-sm-6">
                           
                            <select class="questions-category form-control" id="industry" tabindex="-1">                                
                            <?php
                                $fetchedusqry = "SELECT  fld_industrytype FROM tbl_industry_type WHERE fld_delstatus!=2";
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
            <div class="modal-footer">
            <input id="updatejobskill"  type="button" class="btn btn-success" value ="Save Details" onClick="fn_emp('<?php echo $viewempid; ?>' , '<?php echo $empid; ?>' )">     
            <INPUT class="btn btn-warning" Type="button" VALUE="Back" onClick="location.href = 'emp_manage.php'">
            </div>
        <?php         
         }
?>
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.0/jquery.min.js"></script>
                  
  <script>
function fn_emp(id ,empid)
{   
//alert(id);
var employee = $("#employee").val();
var mail = $("#mail").val();
var address = $("#address").val();
var mobile = $("#mobile").val();
var industry = $("#industry").val();
//alert(employee);
//alert(mail);
//alert(address);
//alert(mobile);
//alert(industry);
var dataString = '&employee='+ employee + '&mail='+ mail + '&empid='+ empid + '&address='+ address + '&mobile='+ mobile + '&industry='+ industry+ '&id='+ id;
if(employee==''|| mail==''|| address==''|| mobile==''|| industry=='')
{
alert("Please Fill All Fields");
}
else
{
$.ajax({
type: "POST",
url: "ajaxdel.php?op=emp",
data: dataString,
cache: false,
success: function(result){
//	alert(result);
if(result=='ok')
{    
 window.location.href = "emp_manage.php";
}
}
});
}
return false;


}

</script>              