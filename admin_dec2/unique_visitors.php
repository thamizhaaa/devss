<?php

error_reporting(0);
include "admin_session.php";
?>
<!DOCTYPE html>
<html>
<head>
 
         <meta charset="UTF-8">
        <title>Unique Visitor | StaffingSpot</title>
        <meta content='width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no' name='viewport'>
        <link href="css/bootstrap.min.css" rel="stylesheet" type="text/css" />
        <link href="//cdnjs.cloudflare.com/ajax/libs/font-awesome/4.1.0/css/font-awesome.min.css" rel="stylesheet" type="text/css" />
        <!-- Ionicons -->
        <link href="//code.ionicframework.com/ionicons/1.5.2/css/ionicons.min.css" rel="stylesheet" type="text/css" />
        <!-- Theme style -->
        <link href="css/AdminLTE.css" rel="stylesheet" type="text/css" />
    
    
    
 <link href="//maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css">
 <link href="css/bootstrap-table.min.css" rel="stylesheet" type="text/css" />
 <link href="https://cdn.datatables.net/1.10.9/css/jquery.dataTables.min.css">



<!--       <script src="//ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
        <script src="js/bootstrap.min.js" type="text/javascript"></script>
         AdminLTE App 
        <script src="js/AdminLTE/app.js" type="text/javascript"></script>
         AdminLTE for demo purposes 
        <script src="js/AdminLTE/demo.js" type="text/javascript"></script>-->




</head>
<body class="skin-blue">
    
          <?php include "includes/header.php"; ?>
<style>
    
      table,th
            {
                text-align:center;
            }
/*body {
  margin: 2rem;
}*/

.paginate_button {
  border-radius: 0 !important;
}

</style>
   <div class="wrapper row-offcanvas row-offcanvas-left">
            <!-- Left side column. contains the logo and sidebar -->
            <?php include "includes/side_menu.php"; ?>

            <!-- Right side column. Contains the navbar and content of the page -->
            <aside class="right-side">
                <!-- Content Header (Page header) -->
                <section class="content-header">
                    <h1>
                        Unique Visitor
                        <!--<small>it all starts here</small>-->
                    </h1>
                    <ol class="breadcrumb">
                        <li><a href="admin_home.php"><i class="fa fa-dashboard"></i> Home</a></li><li class="active"> Unique Visitor</li>
                    </ol>
                </section>

                <!-- Main content -->
                <section class="content">

                    <div class="panel panel-default">
                        <div class="panel-heading">
                            <h3 class="panel-title"> Unique Visitor Employer Detail</h3>
                        </div>
                        <div class="panel-body">
                            <div class="table-responsive">
<!--                               <div id="target-content" >loading...</div> -->

<table id="example1" class="table table-striped table-bordered" style="text-align:center" width="100%" height="auto"  cellpadding="0" cellspacing="0">
                                 <thead>
                                    <th width="10%">SI NO</th><th>EMPLOYER NAME</th><th>VISITORS IP</th><th>CREATED DATE</th>
                                     </thead>
<tbody>
<?php
//  order by fld_id limit $k,$dis

  //echo $k.'robert'.$dis;

//                                    $sql = mysql_query("select distinct(fld_userid),fld_visitorsip,fld_created_date from tbl_unique_visitors_emp");
                                    $sql = mysql_query("select ve.fld_userid,ve.fld_visitorsip,ve.fld_created_date,te.fld_employer_name from tbl_unique_visitors_emp ve JOIN tbl_employer_details te ON (ve.fld_userid=te.fld_empid)");
                                    $count = mysql_num_rows($sql);
                                    $a = 1;
                                    while ($fetch_array = mysql_fetch_array($sql)) {
                                        

                                        $id = $fetch_array['fld_id'];
                                        $user_type = $fetch_array['fld_userid'];
                                        $name = $fetch_array['fld_employer_name'];
                                        $array_category = $fetch_array['fld_visitorsip'];
                                        //echo $array_category;
                                        $array_dor = $fetch_array['fld_created_date'];
                                        
                                        //$array_atatus = $fetch_array['fld_status'];
                                        ?>

                                        <tr id="<?php echo $id; ?>" >

                                            <td ><?php echo $a; ?></td>
                                            <td ><?php echo $name; ?></td>
                                            <td ><?php echo $array_category; ?></td>
                                            <td ><?php echo $array_dor; ?></td>
                                        </tr> 

                                    <?php 
                                    $a++;
                                    } ?>
                                        </tbody>
  </table>


                              
                            </div>
 
                          

                            <div id="myModal" class="modal fade">
                                <div class="modal-dialog">
                                    <div class="modal-content">
                                        <!-- Content will be loaded here from "remote.php" file -->
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                </section><!-- /.content -->
                
                
      
                
                   <section class="content">

                    <div class="panel panel-default">
                        <div class="panel-heading">
                            <h3 class="panel-title"> Unique Visitor Seeker Detail</h3>
                        </div>
                        <div class="panel-body">
                            <div class="table-responsive">
<!--                               <div id="target-content" >loading...</div> -->

                            
  <table id="example" class="table table-striped table-bordered" width="100%" cellspacing="0">
        <thead>
            <tr>
                <th width="10%">SI NO</th><th>SEEKER NAME</th><th>VISITORS IP</th><th>CREATED DATE</th>
            </tr>
        </thead>
        
        <tbody>
            <?php

//                                    $sql_user = mysql_query("select distinct(fld_userid),fld_visitorsip,fld_created_date from tbl_unique_visitors_user ");
                                    $sql_user = mysql_query("select vu.fld_userid,vu.fld_visitorsip,vu.fld_created_date,tj.fld_name from tbl_unique_visitors_user vu JOIN tbl_jobseeker tj ON (vu.fld_userid=tj.fld_id)");
                                    $count = mysql_num_rows($sql_user);
                                    $a = 1;
                                    while ($fetch_array = mysql_fetch_array($sql_user)) {
                                        

                                        $id = $fetch_array['fld_id'];
                                        $user_type = $fetch_array['fld_userid'];
                                        $name = $fetch_array['fld_name'];
                                        $array_category = $fetch_array['fld_visitorsip'];
                                        //echo $array_category;
                                        $array_dor = $fetch_array['fld_created_date'];
                                        
                                        //$array_atatus = $fetch_array['fld_status'];
                                        ?>

                                        <tr id="<?php echo $id; ?>" >

                                            <td ><?php echo $a; ?></td>
                                            <td ><?php echo $name; ?></td>
                                            <td ><?php echo $array_category; ?></td>
                                            <td ><?php echo $array_dor; ?></td>
                                        </tr> 

                                    <?php 
                                    $a++;
                                    } ?>
            
            
            
           
             </tbody>
    </table>
                            
                                 </div>
                            
                            

                            <div id="myModal" class="modal fade">
                                <div class="modal-dialog">
                                    <div class="modal-content">
                                        <!-- Content will be loaded here from "remote.php" file -->
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                </section><!-- /.content --> 

            </aside><!-- /.right-side -->
        </div><!-- ./wrapper -->



<script src="//cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
<script src="//maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>
<script src="https://cdn.datatables.net/1.10.9/js/jquery.dataTables.min.js"></script>

<script src="../scripts/ddl/jquery.flexdatalist.min.js"></script>
<script src="../scripts/ddl/jquery.flexdatalist.js"></script>
<!-- shifting across different page -->
<script src="js/bootstrap.min.js" type="text/javascript"></script>
<!-- AdminLTE App -->
<script src="js/AdminLTE/app.js" type="text/javascript"></script>
<script>

$(document).ready(function() {
    $('#example').DataTable();
    
} );
$(document).ready(function() {
     $('#example1').DataTable();
    
} );

</script>

</body>
</html>
