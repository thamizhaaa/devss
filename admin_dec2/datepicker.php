<?php
error_reporting(0);
include "admin_session.php";
?>

<html>
    <head>
        
       <meta charset="UTF-8">
        <title>job | StaffingSpot</title>
        <meta content='width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no' name='viewport'>
        <link href="css/bootstrap.min.css" rel="stylesheet" type="text/css" />
        <!--<link href="//cdnjs.cloudflare.com/ajax/libs/font-awesome/4.1.0/css/font-awesome.min.css" rel="stylesheet" type="text/css" />-->
        <!-- Ionicons -->
        <!--<link href="//code.ionicframework.com/ionicons/1.5.2/css/ionicons.min.css" rel="stylesheet" type="text/css" />-->
        <!-- Theme style -->
        <link href="css/AdminLTE.css" rel="stylesheet" type="text/css" />
        <link href="css/bootstrap-datetimepicker.css" type="text/css" rel="stylesheet"> 
        
    </head>
    
    
    <body  class="skin-blue">
        
      
        <!-- header logo: style can be found in header.less -->
	<?php // include "includes/header.php"; ?>

        <div class="wrapper row-offcanvas row-offcanvas-left">
            <!-- Left side column. contains the logo and sidebar -->
	    <?php include "includes/side_menu.php"; ?>

            <!-- Right side column. Contains the navbar and content of the page -->
            <aside class="right-side">
                <!-- Content Header (Page header) -->
                <section class="content-header">
                    <h1>
                  job Management
<!--                        <small>it all starts here</small>-->
                    </h1>
                    <ol class="breadcrumb">
                        <li><a href="admin_home.php"><i class="fa fa-dashboard"></i> Home</a></li>  
			<li class="active">job Management</li>
                    </ol>
                </section>

                <!-- Main content -->
                <section class="content">  
                   <?php
                    $viewempid=$_REQUEST['id'];
                   $fetchedudetailsqry = "select tpj.fld_id,tpj.fld_jnumber,tpj.fld_jobtitle,tpj.fld_keyskills,tpj.fld_experience,tpj.fld_description,tpj.fld_job_type,tpj.fld_functional_area,tpj.fld_role,tpj.fld_location,tpj.fld_country,tpj.fld_state,tpj.fld_salary,tpj.fld_expirydate,tpj.fld_postdate,tpj.fld_job_status,ted.fld_employer_name,tpj.fld_industry_type,tpj.fld_delstatus,te.fld_id,te.fld_delstatus from tbl_postjob tpj JOIN tbl_employer_details ted ON (tpj.fld_empid = ted.fld_empid) JOIN tbl_employer te ON (ted.fld_empid = te.fld_id) WHERE (tpj.fld_job_status =1 OR tpj.fld_job_status = 0) AND tpj.fld_delstatus!=2 AND te.fld_delstatus!=2 AND tpj.fld_id=$viewempid"; 
	echo "select tpj.fld_id,tpj.fld_jnumber,tpj.fld_jobtitle,tpj.fld_keyskills,tpj.fld_experience,tpj.fld_description,tpj.fld_job_type,tpj.fld_functional_area,tpj.fld_role,tpj.fld_location,tpj.fld_country,tpj.fld_state,tpj.fld_salary,tpj.fld_postdate,tpj.fld_job_status,ted.fld_employer_name,ted.fld_indusType,tpj.fld_delstatus,te.fld_id,te.fld_delstatus from tbl_postjob tpj JOIN tbl_employer_details ted ON (tpj.fld_empid = ted.fld_empid) JOIN tbl_employer te ON (ted.fld_empid = te.fld_id) WHERE (tpj.fld_job_status =1 OR tpj.fld_job_status = 0) AND tpj.fld_delstatus!=2 AND te.fld_delstatus!=2 AND tpj.fld_id=$viewempid";
        $fetchedudetailsqrysql = mysql_query($fetchedudetailsqry);	
	$row=mysql_fetch_array($fetchedudetailsqrysql);	
		//$viewempid = $row['fld_id'];             
		
                $expire_date =$row['fld_expirydate'];
             
                $date = $row['fld_postdate'];
             
                   ?>
                    
                    
                    
                    
                    
        <div class="col-md-12 col-sm-12 col-xs-12">
                            <div class="form-group">
                                <label class="col-sm-4 control-label">From Date <span class="required">*</span></label>
                                <div class='col-sm-6 input-group date' id='datetimepicker9'>
				    <input type='text' class="form-control" name="fromdate" data-date-format="YYYY-MM-DD" placeholder="Start Date *"  readonly="readonly" value="<?php echo $expire_date; ?>">
				    <span class="input-group-addon" style="background-color:#FFB070;"><span class="glyphicon glyphicon-calendar"></span>
				    </span>
				</div>
                            </div>
			    </div>
			    <div class="col-md-12 col-sm-12 col-xs-12">
                            <div class="form-group">
                                <label class="col-sm-4 control-label">To Date <span class="required">*</span></label>
                                <div class='col-sm-6 input-group date' id='datetimepicker10'>
				    <input type='text' class="form-control" name="todate"  placeholder="End Date *" data-date-format="YYYY-MM-DD"  readonly="readonly" value="<?php echo $date; ?>">
				    <span class="input-group-addon" style="background-color:#FFB070;"><span class="glyphicon glyphicon-calendar"></span>
				    </span>
				</div>
                            </div>
			    </div>
                    
                    
                    
                    
                    
                    
                    
                    
                    
                    
                    
                    
                    
                    
                    
                    
                    
                    
                    
                    
                    
                    
                    
                    
                    
                    
                    
                    
                    
                    
                    
        <!--<script src="//ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>-->
	<script type="text/javascript" src="../scripts/validate.min.js"></script>

        <script type="text/javascript" src="js/moment.js"></script>
        <script src="js/bootstrap.min.js" type="text/javascript"></script>
        <!-- AdminLTE App -->
        <script src="js/AdminLTE/app.js" type="text/javascript"></script>
        <!-- AdminLTE for demo purposes -->
        <!--<script src="js/AdminLTE/demo.js" type="text/javascript"></script>-->

        <script type="text/javascript" src="js/bootstrap-datetimepicker.js"></script>
        <script type="text/javascript" src="js/bootstrap.file-input.js"></script>    



<script type="text/javascript">
	    $(function () {

        
		$('#datetimepicker9').datetimepicker({pickTime: false});
		$('#datetimepicker10').datetimepicker({pickTime: false});
		$("#datetimepicker9").on("dp.change", function (e) {
		    $('#datetimepicker10').data("DateTimePicker").setMinDate(e.date);
		});
		$("#datetimepicker10").on("dp.change", function (e) {
		    $('#datetimepicker9').data("DateTimePicker").setMaxDate(e.date);
		});
	    });
            </script>
    </body>
</html>

