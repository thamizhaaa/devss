<?php
error_reporting(0);
session_start();	
$empuser_id = $_SESSION["empuser_id"];
$user_id = $_SESSION["user_id"];
//echo $empuser_id.'emp';
//echo $user_id.'user';

include "admin_session.php";

$totalemployer_query = mysql_query("select * from tbl_employer te join tbl_employer_details ted on (te.fld_id = ted.fld_empid) WHERE te.fld_delstatus!=2");
$totalemployer_count = mysql_num_rows($totalemployer_query);

$totaljobseeker_query = mysql_query("select * from tbl_postjob tpj JOIN tbl_employer_details ted ON (tpj.fld_empid = ted.fld_empid) JOIN tbl_employer te on (ted.fld_empid = te.fld_id) WHERE (tpj.fld_job_status =1 OR tpj.fld_job_status = 0) AND te.fld_delstatus!=2 and tpj.fld_delstatus!=2");
$totaljobseeker_count = mysql_num_rows($totaljobseeker_query);

$totaljob_query = mysql_query("SELECT * FROM `tbl_jobseeker` WHERE (`fld_js_status`=1 OR `fld_js_status`=0) AND fld_delstatus=0 ");
$totaljob_count = mysql_num_rows($totaljob_query);

$totalvisitor_query_emp = mysql_query("select * from tbl_unique_visitors_emp");
$totalvisitor_query_user = mysql_query("select * from tbl_unique_visitors_user");
$totalvisitor_count_emp = mysql_num_rows($totalvisitor_query_emp);
$totalvisitor_count_user = mysql_num_rows($totalvisitor_query_user);
$toatal_visitor  = $totalvisitor_count_emp+$totalvisitor_count_user;



?>

<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title>StaffingSpot | Admin</title>
        <meta content='width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no' name='viewport'>
        
    <meta http-equiv="content-type" content="text/html; charset=UTF-8"/>

        <link href="css/bootstrap.min.css" rel="stylesheet" type="text/css" />
        
        <link href="//cdnjs.cloudflare.com/ajax/libs/font-awesome/4.1.0/css/font-awesome.min.css" rel="stylesheet" type="text/css" />
        <!-- Ionicons -->
        <link href="//code.ionicframework.com/ionicons/1.5.2/css/ionicons.min.css" rel="stylesheet" type="text/css" />
        <!-- Morris chart -->
        <link href="css/morris/morris.css" rel="stylesheet" type="text/css" />
        <!-- jvectormap -->
        <link href="css/jvectormap/jquery-jvectormap-1.2.2.css" rel="stylesheet" type="text/css" />
        <!-- Date Picker -->
        <link href="css/datepicker/datepicker3.css" rel="stylesheet" type="text/css" />
        <!-- Daterange picker -->
        <link href="css/daterangepicker/daterangepicker-bs3.css" rel="stylesheet" type="text/css" />
        <!-- bootstrap wysihtml5 - text editor -->
        <link href="css/bootstrap-wysihtml5/bootstrap3-wysihtml5.min.css" rel="stylesheet" type="text/css" />
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

            <!-- Right side column. Contains the navbar and content of the page -->
            <aside class="right-side">
                <!-- Content Header (Page header) -->
                <section class="content-header">
                    <h1>
                        Dashboard
                        <!--<small>Control panel</small>-->
                    </h1>
                    <ol class="breadcrumb">
                        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
                        <li class="active">Dashboard</li>
                    </ol>
                </section>

                <!-- Main content -->
                <section class="content">

                    <!-- Small boxes (Stat box) -->
                    <div class="row">
                        <div class="col-lg-3 col-xs-6">
                            <!-- small box -->
                            <div class="small-box bg-aqua">
                                <div class="inner">
                                    <h3>
                                        <?php echo $totalemployer_count; ?>
                                    </h3>
                                    <p>
                                        Employers
                                    </p>
                                </div>
                                <div class="icon">
                                    <i class="ion ion-person"></i>
                                </div>
                                <a href="emp_manage.php" class="small-box-footer">
                                    More info <i class="fa fa-arrow-circle-right"></i>
                                </a>
                            </div>
                        </div><!-- ./col -->
                        <div class="col-lg-3 col-xs-6">
                            <!-- small box -->
                            <div class="small-box bg-green">
                                <div class="inner">
                                    <h3>
                                        <?php echo $totaljobseeker_count; ?>
                                    </h3>
                                    <p>
                                        Total Jobs
                                    </p>
                                </div>
                                <div class="icon">
                                    <i class="ion ion-stats-bars"></i>
                                </div>
                                <a href="jobs_manage.php" class="small-box-footer">
                                    More info <i class="fa fa-arrow-circle-right"></i>
                                </a>
                            </div>
                        </div><!-- ./col -->
                        <div class="col-lg-3 col-xs-6">
                            <!-- small box -->
                            <div class="small-box bg-yellow">
                                <div class="inner">
                                    <h3>
                                        <?php echo $totaljob_count; ?>
                                    </h3>
                                    <p>
                                        Job Seekers
                                    </p>
                                </div>
                                <div class="icon">
                                    <i class="ion ion-person-add"></i>
                                </div>
                                <a href="seek_manage.php" class="small-box-footer">
                                    More info <i class="fa fa-arrow-circle-right"></i>
                                </a>
                            </div>
                        </div><!-- ./col -->
                        <div class="col-lg-3 col-xs-6">
                            <!-- small box -->
                            <div class="small-box bg-red">
                                <div class="inner">
                                    <h3>
                                        <?php echo $toatal_visitor; ?>
                                    </h3>
                                    <p>
                                        Unique Visitors(Employer and Seeker)
                                    </p>
                                </div>
                                <div class="icon">
                                    <i class="ion ion-pie-graph"></i>
                                </div>
                                <a href="unique_visitors.php" class="small-box-footer">
                                    More info <i class="fa fa-arrow-circle-right"></i>
                                </a>
                            </div>
                        </div><!-- ./col -->
                    </div><!-- /.row -->

                    <!-- Main row -->
                    <div class="row">
                        <!-- Left col -->
                        <section class="col-lg-6 connectedSortable">                            


                            <!-- Custom tabs (Charts with tabs)-->
<!--                           <div class="nav-tabs-custom">
                                 Tabs within a box 
                                <ul class="nav nav-tabs pull-right">
                                    <li class="active"><a href="#revenue-chart" data-toggle="tab">Area</a></li>
                                    <li><a href="#sales-chart" data-toggle="tab">Donut</a></li>
                                    <li class="pull-left header"><i class="fa fa-inbox"></i> Sales</li>
                                </ul>
                                <div class="tab-content no-padding">
                                     Morris chart - Sales 
                                    <div class="chart tab-pane active" id="revenue-chart" style="position: relative; height: 300px;"></div>
                                    <div class="chart tab-pane" id="sales-chart" style="position: relative; height: 300px;"></div>
                                </div>
                            </div>  /.nav-tabs-custom -->

                            <!-- Chat box -->
                            <!-- /.box (chat box) -->                                                        

                            <!-- TO DO List -->
                            <!-- /.box -->
			    <!-- Calendar -->
                           
<!--                            <div class="box box-solid bg-green-gradient">
                                <div class="box-header">
                                    <i class="fa fa-calendar"></i>
                                    <h3 class="box-title">Calendar</h3>
                                     tools box 
                                    <div class="pull-right box-tools">
                                         button with a dropdown 
                                        <div class="btn-group">
                                            <button class="btn btn-success btn-sm dropdown-toggle" data-toggle="dropdown"><i class="fa fa-bars"></i></button>
                                            <ul class="dropdown-menu pull-right" role="menu">
                                                <li><a href="#">Add new event</a></li>
                                                <li><a href="#">Clear events</a></li>
                                                <li class="divider"></li>
                                                <li><a href="#">View calendar</a></li>
                                            </ul>
                                        </div>
                                        <button class="btn btn-success btn-sm" data-widget="collapse"><i class="fa fa-minus"></i></button>
                                        <button class="btn btn-success btn-sm" data-widget="remove"><i class="fa fa-times"></i></button>                                        
                                    </div> /. tools 
                                </div> /.box-header 
                                <div class="box-body no-padding">
                                    The calendar 
                                    <div id="calendar" style="width: 100%"></div>
                                </div> /.box-body   
                                <div class="box-footer text-black">
                                    <div class="row">
                                        <div class="col-sm-6">
                                             Progress bars 
                                            <div class="clearfix">
                                                <span class="pull-left">Task #1</span>
                                                <small class="pull-right">90%</small>
                                            </div>
                                            <div class="progress xs">
                                                <div class="progress-bar progress-bar-green" style="width: 90%;"></div>
                                            </div>

                                            <div class="clearfix">
                                                <span class="pull-left">Task #2</span>
                                                <small class="pull-right">70%</small>
                                            </div>
                                            <div class="progress xs">
                                                <div class="progress-bar progress-bar-green" style="width: 70%;"></div>
                                            </div>
                                        </div> /.col 
                                        <div class="col-sm-6">
                                            <div class="clearfix">
                                                <span class="pull-left">Task #3</span>
                                                <small class="pull-right">60%</small>
                                            </div>
                                            <div class="progress xs">
                                                <div class="progress-bar progress-bar-green" style="width: 60%;"></div>
                                            </div>

                                            <div class="clearfix">
                                                <span class="pull-left">Task #4</span>
                                                <small class="pull-right">40%</small>
                                            </div>
                                            <div class="progress xs">
                                                <div class="progress-bar progress-bar-green" style="width: 40%;"></div>
                                            </div>
                                        </div> /.col 
                                    </div> /.row                                                                         
                                </div>
                            </div>-->
                          
							
                        </section><!-- /.Left col -->
                        <!-- right col (We are only adding the ID to make the widgets sortable)-->
                        <section class="col-lg-6 connectedSortable"> 

                            <!-- Map box -->
<!--                            <div class="box box-solid bg-light-blue-gradient">
                                <div class="box-header">
                                     tools box 
                                    <div class="pull-right box-tools">
                                        <button class="btn btn-primary btn-sm daterange pull-right" data-toggle="tooltip" title="Date range"><i class="fa fa-calendar"></i></button>
                                        <button class="btn btn-primary btn-sm pull-right" data-widget='collapse' data-toggle="tooltip" title="Collapse" style="margin-right: 5px;"><i class="fa fa-minus"></i></button>
                                    </div> /. tools 

                                    <i class="fa fa-map-marker"></i>
                                    <h3 class="box-title">
                                        Visitors
                                    </h3>
                                </div>
                                <div class="box-body">
                                    <div id="world-map" style="height: 250px;">
                                        
                                        
                                        
                                        
                                        <circle data-index="21" fill="#00a65a" stroke="#111" fill-opacity="1" stroke-width="1" stroke-opacity="1" r="5" class="jvectormap-marker jvectormap-element" cy="189.692" cx="477.081"></circle>
                                    </div>
                                        
                                </div> /.box-body
                                
                                  <div class="box-footer no-border">
                                    <div class="row">
                                        
                                        
                                         Map 
                                        <div class="col-xs-6 text-center" style="border-right: 1px solid #f4f4f4">
                                            <div id="sparkline-1"></div>
                                            
                                            <div class="knob-label">Visitors</div>
                                        <?php 
                                                $sql = "select distinct * from tbl_unique_visitors limit 0,5";
                                                $row = mysql_query($sql);
                                                $count =  mysql_num_rows($row);
                                                echo $count;
                                                                
                                                ?>
                 
                                        
                                        
                                        </div> ./col  
                                        
                                        
                                         Employer and Seeker online condition 
                                        <div class="col-xs-6 text-center" style="border-right: 1px solid #f4f4f4">
                                        <div id="sparkline-2"></div>

                                        <div class="knob-label">Online</div>
                                        
                                           
                                      
                                        <?php
                                       
                                        if($user_id!=''){
                                        
                                        $online = "select * from tbl_jobseeker where fld_seeker_online='1' and fld_js_status =1 and fld_delstatus=0";
                                        
                                        $onlineqry = mysql_query($online);
                                        $countonline =  mysql_num_rows($onlineqry);
                                    
                                        echo $countonline;
                                        }
                                        
                                        
                                        else if($empuser_id){
                                           $online = "select * from tbl_employer where fld_employer_online='1' and fld_emp_status =1 and fld_delstatus=0";
                                           
                                        $onlineqry = mysql_query($online);
                                        $countonline =  mysql_num_rows($onlineqry);
                                        echo $countonline;
                                        }
                                        ?>
                                        
                                        </div> ./col 
                                        
                                        
                                        <div class="col-xs-4 text-center">
                                            <div id="sparkline-3"></div>
                                            <div class="knob-label">Exists</div>
                                        </div> ./col 
                                    </div> /.row 
                                </div>
                            </div>-->
                            <!-- /.box -->

                            <!-- solid sales graph -->
<!--                            <div class="box box-solid bg-teal-gradient">
                                <div class="box-header">
                                    <i class="fa fa-th"></i>
                                    <h3 class="box-title">Visitor's Graph</h3>
                                    <div class="box-tools pull-right">
                                        <button class="btn bg-teal btn-sm" data-widget="collapse"><i class="fa fa-minus"></i></button>
                                        <button class="btn bg-teal btn-sm" data-widget="remove"><i class="fa fa-times"></i></button>
                                    </div>
                                </div>
                                <div class="box-body border-radius-none">
                                    <div class="chart" id="line-chart" style="height: 250px;"></div>                                    
                                </div> /.box-body 
                                <div class="box-footer no-border">
                                    <div class="row">
                                        <div class="col-xs-4 text-center" style="border-right: 1px solid #f4f4f4">
                                            <input type="text" class="knob" data-readonly="true" value="20" data-width="60" data-height="60" data-fgColor="#39CCCC"/>
                                            <div class="knob-label">Mail-Orders</div>
                                        </div> ./col 
                                        <div class="col-xs-4 text-center" style="border-right: 1px solid #f4f4f4">
                                            <input type="text" class="knob" data-readonly="true" value="50" data-width="60" data-height="60" data-fgColor="#39CCCC"/>
                                            <div class="knob-label">Online</div>
                                        </div> ./col 
                                        <div class="col-xs-4 text-center">
                                            <input type="text" class="knob" data-readonly="true" value="30" data-width="60" data-height="60" data-fgColor="#39CCCC"/>
                                            <div class="knob-label">In-Store</div>
                                        </div> ./col 
                                    </div> /.row 
                                </div> /.box-footer 
                            </div> /.box   -->
                           
                            <!-- /.box -->                            

                        </section><!-- right col -->
                                       
                    </div><!-- /.row (main row) -->
				
                </section><!-- /.content -->

            </aside>
            <!-- /.right-side -->
           
        </div>
        
		<!-- ./wrapper -->
        
        <!-- add new calendar event modal -->


        <script src="js/jquery.min.js"></script>
        <script src="js/bootstrap.min.js" type="text/javascript"></script>
        <script src="js/jquery-ui.min.js" type="text/javascript"></script>
       
        <!-- Morris.js charts -->
        <script src="js/raphael-min.js"></script>
        <script src="js/plugins/morris/morris.min.js" type="text/javascript"></script>
        <!-- Sparkline -->
        <script src="js/plugins/sparkline/jquery.sparkline.min.js" type="text/javascript"></script>
        <!-- jvectormap -->
        <script src="js/plugins/jvectormap/jquery-jvectormap-1.2.2.min.js" type="text/javascript"></script>
        <script src="js/plugins/jvectormap/jquery-jvectormap-world-mill-en.js" type="text/javascript"></script>
        <!-- jQuery Knob Chart -->
        <script src="js/plugins/jqueryKnob/jquery.knob.js" type="text/javascript"></script>
        <!-- daterangepicker -->
        <script src="js/plugins/daterangepicker/daterangepicker.js" type="text/javascript"></script>
        <!-- datepicker -->
        <script src="js/plugins/datepicker/bootstrap-datepicker.js" type="text/javascript"></script>
        <!-- Bootstrap WYSIHTML5 -->
        <script src="js/plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.all.min.js" type="text/javascript"></script>
        <!-- iCheck -->
        <script src="js/plugins/iCheck/icheck.min.js" type="text/javascript"></script>

        <!-- AdminLTE App -->
        <script src="js/AdminLTE/app.js" type="text/javascript"></script>
        

        <!-- AdminLTE dashboard demo (This is only for demo purposes)
-->        
        <script src="js/AdminLTE/dashboard.js" type="text/javascript"></script>
        <!-- AdminLTE for demo purposes -->
        <script src="js/AdminLTE/demo.js" type="text/javascript"></script>
         <?php include "customjquery.php"; ?>
        </body>
    
        <script>
                                    
            $( document ).ready(function() {
                //alert('robert');
                $('#world-map').vectorMap({
             map              : 'world_mill_en',
             normalizeFunction: 'polynomial',
             hoverOpacity     : 0.7,
             hoverColor       : false,
             backgroundColor  : 'transparent',
             regionStyle      : {
               initial      : {
                  fill            : 'rgba(210, 214, 222, 1)',
                 'fill-opacity'  : 1,
                  stroke          : 'none',
                 'stroke-width'  : 0,
                 'stroke-opacity': 1
               },
               hover        : {
                 'fill-opacity': 0.7,
                  cursor        : 'pointer'
               },
               selected     : {
                 fill: 'yellow'
               },
               selectedHover: {}
             },
             markerStyle      : {
               initial: {
                 fill  : '#00a65a',
                 stroke: '#111'
               }
             },
             markers   : [
               
                <?php 
                $sql = mysql_query("select distinct * from tbl_unique_visitors limit 0,5");
                while($row=mysql_fetch_array($sql))
                {          
                $testing =unserialize(file_get_contents('http://www.geoplugin.net/php.gp?ip='.$row['fld_visitorsip']));
                $city = $testing['geoplugin_city'];
                $latitude = $testing['geoplugin_latitude'];
                $longitude = $testing['geoplugin_longitude'];
                $value = $latitude. $longitude;
                echo "{ latLng: [$latitude, $longitude], name: '$city' },";
                }                
                ?>
                 

            ]
            
           }); 

                 });                       

                                
 

 </script>
 <script>
      $( document ).ready(function() {
          
     var myvalues = [0,<?php echo $count;?>];
    
    $('#sparkline-1').sparkline(myvalues, {
        type: 'line',
        lineColor: '#92c1dc',
        fillColor: "#ebf4f9",
        height: '50',
        width: '80'
    });
    myvalues = [0,<?php echo $countonline;?>];
    $('#sparkline-2').sparkline(myvalues, {
        type: 'line',
        lineColor: '#92c1dc',
        fillColor: "#ebf4f9",
        height: '50',
        width: '80'
    });
//    myvalues = [0,3];
//    $('#sparkline-3').sparkline(myvalues, {
//        type: 'line',
//        lineColor: '#92c1dc',
//        fillColor: "#ebf4f9",
//        height: '50',
//        width: '80'
//    });    
     });   
     
     
     </script>
     
</html>
