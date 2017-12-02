<?php
error_reporting(0);
include "admin_session.php";

?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title>Job Management | StaffingSpot</title>
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
                       Job Management
                        <small>it all starts here</small>
                    </h1>
                    <ol class="breadcrumb">
                        <li><a href="admin_home.php"><i class="fa fa-dashboard"></i> Home</a></li><li class="active">Job's Management</li>
                    </ol>
                </section>
                
                
        
        <?php
//        $test=$_REQUEST['getids'];
//        echo $test;
$viewempid = $_REQUEST['id'];

// echo 'demo'.$oper;

if ($viewempid) {
//    $fetchedudetailsqry    = "select * from tbl_seeker_personal WHERE  fld_id=$viewempid";
    $fetchedudetailsqry    = "select tj.fld_id,tj.fld_name,tj.fld_email,tj.fld_mobile,tjd.fld_profilepic,tjd.fld_address,tjd.fld_dob,tjd.fld_gender from tbl_jobseeker tj JOIN tbl_jobseeker_details tjd ON (tj.fld_id = tjd.fld_js_id) WHERE tj.fld_id=$viewempid AND (tj.`fld_js_status`=1 OR tj.`fld_js_status`=0) AND tj.fld_delstatus=0 AND tjd.fld_delstatus=0";
    echo $fetchedudetailsqry;
    $fetchedudetailsqrysql = mysql_query($fetchedudetailsqry);
    $row                   = mysql_fetch_array($fetchedudetailsqrysql);
    $seekid                = $row['fld_id'];
    $name                  = $row['fld_fname'];
    $seeker  = $row['fld_employee_name'];
    $mail    = $row['fld_email'];
    $address = $row['fld_address'];
    $contact = $row['fld_mobileno'];
    //$industry = $row['fld_indusType'];
    
    echo 'gygh' . $industry;
    
?>
   <div>
                        
                        <h4 class="modal-title" id="myModalLabel">Edit/Update Seeker Details</h4>
                    </div>
                    <div class="modal-body">     
                        <form role="form" class="form-horizontal" autocomplete="off">
                           
                        <div class="col-md-12 col-sm-12 col-xs-12">
                            <div class="form-group">
                               <label class="col-sm-4 control-label">Seeker  <span class="required">*</span></label>
                                <div class="col-sm-6">
                               <input id="employee" placeholder="Enter The Seeker Name" class="form-control" type="text" value="<?php
    echo $name;
?>">
                                </div>
                            </div>
                        </div>

                        <div class="col-md-12 col-sm-12 col-xs-12">
                            <div class="form-group">
                               <label class="col-sm-4 control-label">Email<span class="required">*</span></label>
                                <div class="col-sm-6">
                               <input id="mail" placeholder="Enter The Valid mail-id" class="form-control" type="text" value="<?php
    echo $mail;
?>">
                                </div>
                            </div>
                        </div>
                            

                            <div class="col-md-12 col-sm-12 col-xs-12">
                            <div class="form-group">
                               <label class="col-sm-4 control-label">Address<span class="required">*</span></label>
                                <div class="col-sm-6">
                               <textarea id="address" rows="5" cols="5" placeholder="Enter The Address" class="form-control" type="text" ><?php
    echo $address;
?></textarea>
                                </div>
                            </div>
                            </div>
                            
                            <div class="col-md-12 col-sm-12 col-xs-12">
                                                      <div class="form-group">
                                                         <label class="col-sm-4 control-label">Contact No  <span class="required">*</span></label>
                                                          <div class="col-sm-6">
                                                         <input id="mobile" placeholder="Enter The Contact Number" class="form-control" type="text" value="<?php
    echo $contact;
?>">
                                                          </div>
                                                      </div>
                                                  </div>
<!--                              <label for="email" class="col-sm-4 control-label">Industry Type</label>
                              <div class="col-sm-6">
                           
                            <select class="questions-category form-control" id="industry" tabindex="-1">                                
                            <?php
    $fetchedusqry    = "SELECT  fld_industrytype FROM tbl_industry_type WHERE fld_delstatus!=2";
    $fetchedusqrysql = mysql_query($fetchedusqry);
    while ($recordedu = mysql_fetch_assoc($fetchedusqrysql)) {
        $industype = $recordedu['fld_industrytype'];
?>
                               <option value="<?php
        echo $industype;
?>" <?php
        if ($industype == $industry) {
            echo "selected";
        }
?>><?php
        echo $industype;
?></option>
                            <?php
    }
?>
                           </select>  
                                </div>    -->
                                  
                               
                                </div>    
                                </div>                         
                            </div>
                        </div>

                            
                         </form>
                           
                                     

                    </div>
            <div class="modal-footer">
            <input id="updatejobskill"  type="button" class="btn btn-success" value ="Save Details" onClick="fn_emp(<?php
    echo $empid;
?>)">               
            </div>
        </div>

        <?php
}
?>
 <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.0/jquery.min.js"></script>
                  
  <script>
function fn_emp(id)
{   
alert(id);
var employee = $("#employee").val();
var mail = $("#mail").val();
var address = $("#address").val();
var mobile = $("#mobile").val();
var industry = $("#industry").val();
alert(employee);
alert(mail);
alert(address);
alert(mobile);
alert(industry);
var dataString = '&employee='+ employee + '&mail='+ mail + '&empid='+ id + '&address='+ address + '&mobile='+ mobile + '&industry='+ industry;
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
    alert(result);
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
                