
<?php
error_reporting(0);
include ("includes/config.php");

include "admin_session.php";

if(isset($_POST['submit'])) {
    //alert("test");

	$location = $_POST['loc'];
	$country_id = $_POST['country_id'];
	
	
	$e_query = mysql_query("select fld_id from tbl_states where fld_name='$location' and fld_country_id='$country_id'");
	$e_sq=mysql_num_rows($e_query);

	if ($country_id == ""){
	$err_country = "This field is required";
	} 
        if ($location == ""){
	$err_location = "This field is required";
	}else if(!$e_sq=='') {
	$err_location = "$location is already in use.";
	}
	
	
	
	$errors .= $err_country . $err_location;
	
	$validation_form1 = "";
	if(isset($errors))
	$validation_form1 .= $errors;
	
	if(!$validation_form1) {
            
		$indus_query = mysql_query("INSERT INTO tbl_states(fld_name,fld_country_id)VALUES('".$location."','".$country_id."')"); ?>

                ?>
                <?php 
                if($indus_query){
                ?>
                <script>
                    alert("Saved Successfully" );
</script>
    <?php
                }
    ?>
    <?php 
    header('Location:state_test.php',false);		
	}
}	
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
 
 
<style>

.editbox
{
display:none;
}
th 
{
text-align:center;
padding:1%;
}

td 
{
text-align:center;
padding:1%;
}
.editbox
{
font-size:14px;
width:340px;
background-color:#ffffcc;
border:solid 1px #000;
padding:1%;
}
.edit_tr:hover
{
background:url(edit.png) right no-repeat #80C8E5;
cursor:pointer;
}

.err_txt{
   color: red;
}

</style>


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
body {
  margin: 2rem;
}

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
                                 <form class="form_top_space" action="" method="post">

<label class="col-sm-3 control-label" style="margin-left:3%;">Country Name *</label>

<div class="col-sm-6">
<input type='text' value='<?php echo $country; ?>' placeholder='Country name' class='flexdatalist country_allresults' data-data='country.json' data-search-in='country' data-visible-properties='["country"]' data-selection-required='true' data-value-property='country' data-text-property='{country}' data-min-length='0' name='country'>
<input type="hidden" value="" id="country_id" name="country_id" >
<span class="help-block"></span>
<span class="help-block err_txt"><?php echo $err_country; ?></span>
</div>
<label class="col-sm-3 control-label" style="margin-left:3%;">State Name *</label>
<div class="col-sm-6">
<input type="text"  class="form-control" name="loc" placeholder="Enter the name"  value="<?php echo $_POST['loc']; ?>"/>
<span class="help-block-example">Ex : Tamil Nadu  IN</span>
<span class="help-block err_txt"><?php echo $err_location; ?></span>
</div>
<!--
<div class="col-sm-3" style="padding-left:0px;">
<div class="col-sm-6">
<input type="text"  class="form-control" name="short" placeholder="Short code *"  value="<?php echo $_POST['short']; ?>"/>
<span class="help-block"><?php echo $err_short; ?></span>
</div>

</div>-->


<div class="col-sm-12">
<label class="col-sm-3 control-label" style="margin-left:3%;"></label>
<!--<div>-->
<input type="submit" class="btn btn-success" name="submit"  value="Save"/>
<input type="reset" class="btn btn-warning" value="Reset" />
<!--<input class="btn btn-warning" Type="button" VALUE="Back" onClick="location.href='admin_home.php'"></div>-->
</div>
</form>



                            <br/>
                            <br/>
                                
                                
                            <div class="modal add-resume-modal"  role="dialog"  data-keyboard="false" data-backdrop="static" id="sss">
                                
                                
                                
                                
                                
                            </div>
                                
                                
<!--                               <div id="target-content" >loading...</div> -->

                            <table id="example1" class="table table-striped table-bordered" style="text-align:center" width="100%" height="auto"  cellpadding="0" cellspacing="0">
                                 <thead>
                                 <th width="10%">SI NO</th>
                                 <th>STATE</th>
                                 
                                 <th>OPTIONS</th>
                                 <th>DELETE</th>
                                     </thead>
<tbody>
<?php
//  order by fld_id limit $k,$dis

  //echo $k.'robert'.$dis;

                                    $sql = mysql_query("select * from tbl_states WHERE fld_status= 0");
                                    $count = mysql_num_rows($sql);
                                    $a = $k+1;
                                    while ($fetch_array = mysql_fetch_array($sql)) {
                                        

                                        $id = $fetch_array['fld_id'];
                                        $location = $fetch_array['fld_name'];
                                        
                                        //echo $array_category;
                                        
                                        
                                        //$array_atatus = $fetch_array['fld_status'];
                                        ?>

                                        <tr id="<?php echo $id; ?>" >

                                            <td ><?php echo $a; ?></td>
                                            <td ><?php echo $location; ?></td>
                                            
                                            <td><a id="edit" class="editjobskill editstate" data-id="<?php echo $id; ?>" href="javascript:void(0);">Edit </a></td>
                                            <td><a  class="delete_state" data-id="<?php echo $id; ?>" href="javascript:void(0);">Delete </a></td>
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
                
                
      
                
                   <!-- /.content --> 

            </aside><!-- /.right-side -->
        </div><!-- ./wrapper -->

<script src="//ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>

<script src="//cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
<script src="//maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>
<script src="https://cdn.datatables.net/1.10.9/js/jquery.dataTables.min.js"></script>

<script src="../scripts/ddl/jquery.flexdatalist.min.js"></script>
<script src="../scripts/ddl/jquery.flexdatalist.js"></script>
<!-- shifting across different page -->
<script src="js/bootstrap.min.js" type="text/javascript"></script>
<!-- AdminLTE App -->
<script src="js/AdminLTE/app.js" type="text/javascript"></script>

 <link href="../scripts/ddl/jquery.flexdatalist.css" rel="stylesheet" type="text/css">
<link href="../scripts/ddl/jquery.flexdatalist.min.css" rel="stylesheet" type="text/css">
<script src="../scripts/ddl/jquery.flexdatalist.min.js"></script>
<script src="../scripts/ddl/jquery.flexdatalist.js"></script>

<script>
 $('.country_allresults').flexdatalist({
     minLength: 0,
     valueProperty: '*',
     selectionRequired: true, 
     textProperty: '{country}',
     searchIn: 'country',
     data: 'country.json'
});
</script>


<script>

$(document).ready(function() {
    $('#example').DataTable();
    
} );
$(document).ready(function() {
     $('#example1').DataTable();
    
});

</script>

<script type="text/javascript">
    
   $(document).ready(function () {
$(document).on("click", ".editstate", function () {
    var stateid = $(this).data('id');
//    alert(stateid);     
    //$('#sss').modal('show');
    $.ajax({
        type: "POST",
        url: "ajaxdel.php?op=editstate",
        data: "getstateid=" + stateid,
        success: function (data)
        {

            // alert(data);
            $("#sss").html(data);
            $('#sss').modal('show');
        }
    });
});
});
            
            $(document).ready(function() {
        setTimeout('$(".err_txt").fadeOut()',3500);
      });
        </script>
       <script>
            $(document).ready(function() {
      $(document).on("click", ".delete_state", function () {
//           alert('123');
            var id = $(this).data("id");
//            alert(id);
            var dataString = 'id=' + id;
//            alert(dataString);
            var parent = $(this).parent().parent();
if (confirm('Are you sure, you want to delete.?')) {
                $.ajax({
                                    type: "POST",
                                    url: "delete_state.php",
                                    data: dataString,
                                    cache: false,
//                                    beforeSend: function () {
//                                        $('.modal-backdrop').removeClass('hidden');
//                                        $('.modal-backdrop').addClass('show');
//                                    },
                                    success: function ()
                                    {
                                     alert("Deleted Successfully");
				    
                                        $('.modal-backdrop').removeClass('show');
                                        $('.modal-backdrop').addClass('hidden');
                                        if (id % 2)
                                        {
                                            parent.fadeOut('slow', function () {
                                                $(this).remove();
                                            });
                                        } else
                                        {
                                            parent.slideUp('slow', function () {
                                                $(this).remove();
                                            });
                                        }
                                    }
//
                                });
                            }
//                            return false;
//			    }
           
           });
      
      });
      
      
      
      
      
      
      
      
      
      
      
      $(document).ready(function() {
        setTimeout('$(".err_txt").fadeOut()',3500);
      });

      
      $('.country_allresults').change(function () {
                    var value = $(this).val();
                    // alert(value);
                    var items = [];
//                    $.each(array,function(i){
                              $.getJSON('country.json',function(data){
                        var data_length = Object.keys(data).length;
                                for(var j=0; j < data_length ; j++){
                                    if (data[j].country == value) {
                                      items.push(data[j].id);
                            }
                          }
                        var country_id = items.join(",");
                        // alert(country_id);
                        $('#country_id').val(country_id);
//                    $.ajax({
//                        type: "POST",
//                        url: "featured-jobs.php?op=addstate",
//                        data: ({state_name: state_name}),
//                        success: function (data) {
//                            $("#state").html(data);
//                        }
//                    });
                    });
//                             });
                });
           </script>
        
<!--        <script>
                $(document).ready(function ()
                {
      
                      $(document).on("click", ".delete_country", function () {

                            var id = $(this).attr("id");
                            alert(id);
                            var dataString = 'id=' + id;
                            var parent = $(this).parent().parent();
//                            if (confirm('Are sure, You want to delete?')) {
			
			 	
                                $.ajax({
                                    type: "POST",
                                    url: "delete_country.php",
                                    data: dataString,
                                    cache: false,
                                    beforeSend: function () {
                                        $('.modal-backdrop').removeClass('hidden');
                                        $('.modal-backdrop').addClass('show');
                                    },
                                    success: function ()
                                    {
                                     
				    
                                        $('.modal-backdrop').removeClass('show');
                                        $('.modal-backdrop').addClass('hidden');
                                        if (id % 2)
                                        {
                                            parent.fadeOut('slow', function () {
                                                $(this).remove();
                                            });
                                        } else
                                        {
                                            parent.slideUp('slow', function () {
                                                $(this).remove();
                                            });
                                        }
                                    }

                                });

                            return false;
			    }

                    });
                });

            </script>-->
        

</body>
</html>
<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

