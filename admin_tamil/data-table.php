<?php 
//include ("includes/config.php");
?>
<html>
    <head>
         <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.0/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>   
<script src="js/data-table.js"></script>
<link rel="stylesheet" type="text/css" href="css/data-table.css">
<link rel="stylesheet" type="text/css" href="//cdn.datatables.net/1.10.13/css/jquery.dataTables.min.css">
<link rel="stylesheet" type="text/css" href="//cdn.datatables.net/1.10.13/js/jquery.dataTables.min.js">
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
                       Unique's Visitor 
                       
                    </h1>
                    <ol class="breadcrumb">
                        <li><a href="admin_home.php"><i class="fa fa-dashboard"></i> Home</a></li><li class="active">Unique Visitor</li>
                    </ol>
                </section>
    </head>
    

<table id="myTable" class="display" cellspacing="0" width="100%">
        <thead>
            <tr>
                <th>SNo</th>
                <th>Visitoship</th>
                 <th>Date</th>
                
            </tr>
       
          </thead>
        <tbody>
            <?php

$sql   = mysql_query("select * from tbl_unique_visitors  order by fld_id");
$count = mysql_num_rows($sql);
$a     = 0;
while ($fetch_array = mysql_fetch_array($sql)) {
    $a++;
    
    $id             = $fetch_array['fld_id'];
    $visitor      = $fetch_array['fld_visitorsip'];
    $date = $fetch_array['fld_created_date'];
    
?>
            <tr>
                <td><?php echo $id ?> </td>
                <td><?php echo $visitor ?> </td>
                <td><?php echo $date ?> </td>
               
            </tr>
            
            <?php } ?>
       
        </tbody>

</table>

<script>
$(document).ready(function(){
    $('#myTable').DataTable();
});
</script>
    </body>
</html>