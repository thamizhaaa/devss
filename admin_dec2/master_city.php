<?php
error_reporting(0);
include ("includes/config.php");

include "admin_session.php";

if(isset($_POST['submit'])) {
    //alert("test");

	$location = $_POST['loc'];
        $country = $_POST['country'];
        $state = $_POST['state'];
	$state_id = $_POST['state_id'];
	
	
	$e_query = mysql_query("select fld_id from tbl_cities where fld_name='$location' and fld_state_id='$state_id'");
	$e_sq=mysql_num_rows($e_query);

	if ($location == ""){
	$err_location = "This field is required";
	}else if(!$e_sq=='') {
	$err_location = "$location is already in use.";
	}
        if ($country == ""){
	$err_country = "This field is required";
	}
        if ($state == ""){
	$err_state = "This field is required";
	}
	
	$errors .= $err_country . $err_state . $err_location ;
	$validation_form1 = "";
	if(isset($errors))
	$validation_form1 .= $errors;
	
	if(!$validation_form1) {
		
		$indus_query = mysql_query("INSERT INTO tbl_cities(fld_name,fld_state_id )VALUES('".$location."','".$state_id."')");
              //alert($indus_query);
		?><script>
                    alert("Saved Successfully" );
</script><?php
		header('Location:master_city.php',false);	
	}
}	
?>
<!DOCTYPE html>
<html>
<head>
 
         <meta charset="UTF-8">
        <title>City Master| StaffingSpot</title>
        <meta content='width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no' name='viewport'>
        <link href="css/bootstrap.min.css" rel="stylesheet" type="text/css" />
        <link href="//cdnjs.cloudflare.com/ajax/libs/font-awesome/4.1.0/css/font-awesome.min.css" rel="stylesheet" type="text/css" />
        <!-- Ionicons -->
        <link href="//code.ionicframework.com/ionicons/1.5.2/css/ionicons.min.css" rel="stylesheet" type="text/css" />
        <!-- Theme style -->
        <link href="css/AdminLTE.css" rel="stylesheet" type="text/css" />
    
    
<!--    
 <link href="//maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css">
 <link href="css/bootstrap-table.min.css" rel="stylesheet" type="text/css" />
 <link href="https://cdn.datatables.net/1.10.9/css/jquery.dataTables.min.css">-->
 
 
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


</head>
<body class="skin-blue">
    
          <?php include "includes/header.php"; ?>
<style>
    
      table,th
            {
                text-align:center;
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
                       Location Management
                        <!--<small>it all starts here</small>-->
                    </h1>
                    <ol class="breadcrumb">
                        <li><a href="admin_home.php"><i class="fa fa-dashboard"></i> Home</a></li><li class="active">  Location Management</li><li class="active"> City Master</li>
                    </ol>
                </section>

                <!-- Main content -->
                <section class="content">

                    <div class="panel panel-default">
                        <div class="panel-heading">
                            <h3 class="panel-title"> City Master</h3>
                        </div>
                        
               
      
                        
                        <div class="panel-body">
                            <div class="table-responsive">
                               <form class="form_top_space col-md-6 col-xs-12 col-sm-12 no-padding" action="" method="post">

    <div class="col-sm-12">
        <label>Country Name *</label>

        
        <input type='text' value='<?php echo $country; ?>' placeholder='Country name' class='contry flexdatalist country_allresults form-control' data-data='country.json' data-search-in='country' data-visible-properties='["country"]' data-selection-required='true' data-value-property='country' data-text-property='{country}' data-min-length='0' name='country'>
        <input type="hidden" value="" id="country_id" name="country_id" >
        <span class="help-block"></span>
        <span class="help-block err_txt"><?php echo $err_country; ?></span>
    </div>

    <div class="col-sm-12">
        <label>State Name *</label>
        

        <select id="state" name="state" class="questions-category form-control state_allresults contry" data-placeholder="Select state">

        <option value=''>State Name</option>

        </select>
        <input type="hidden" value="" id="state_id" name="state_id" >

        <span class="help-block"></span>
        <span class="help-block err_txt"><?php echo $err_state; ?></span>
    </div>
    
    <div class="col-sm-12">
        <label>City Name *</label>

        
        <input type="text"  class="form-control contry" name="loc" placeholder="City Name *"  value="<?php echo $_POST['loc']; ?>"/>
        <span class="help-block">Ex : Chennai IN</span>
        <span class="help-block err_txt"><?php echo $err_location; ?></span>
    </div>

        <div class="col-sm-3" >
        <!--<div class="col-sm-6">
        <input type="text"  class="form-control" name="short" placeholder="Short code *"  value="<?php echo $_POST['short']; ?>"/>
        <span class="help-block"><?php echo $err_short; ?></span>
        </div>-->

        </div>


        <div class="col-sm-12">


        <input type="submit" class="btn btn-success resume-btn mob-btn mob-btn-1" name="submit"  value="Save"/>
        <input type="reset" class="btn btn-warning resume-btn mob-btn mob-btn-1" value="Reset" />
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
                                 
                                 <th>COUNTRY</th>
                                 <th>STATE</th>
                                 <th>CITY</th>
                                 
                                 <th>OPTIONS</th>
                                
                                 
                                     </thead>
<tbody>
<?php
                                    $sql = mysql_query("select ts.fld_id as state_id,
                                    tc.fld_id as country_id,
                                    tcc.fld_id as city_id,
                                    tcc.fld_name as city_name,
                                    tc.fld_name as country_name,
                                    ts.fld_name as state_name 
                                    from tbl_cities tcc 
                                    join tbl_states ts on tcc.fld_state_id=ts.fld_id 
                                    join tbl_countries tc on tc.fld_id= ts.fld_country_id where tcc.fld_status !=2 order by tcc.fld_name ASC");
                                    
                                  
                                    while ($fetch_array = mysql_fetch_array($sql)) {
                                        

                                        $id = $fetch_array['fld_id'];
                                        $country = $fetch_array['country_name'];
                                        $state = $fetch_array['state_name'];
                                        $location = $fetch_array['city_name'];
                                        
                                        //echo $array_category;
                                        
                                        
                                        //$array_atatus = $fetch_array['fld_status'];
                                        ?>

                                        <tr>

                                            <td ><?php echo $a; ?></td>
                                            <td ><?php echo $country; ?></td>
                                            <td ><?php echo $state; ?></td>
                                            
                                            <td ><?php echo $location; ?></td>
                                            
                                            <td><a class="editjobskill editcity" data-id="<?php echo $id; ?>" href="javascript:void(0);">Edit </a>
                                                <input  value="<?php echo $location; ?>" class="editbox" id="first_input_<?php echo $id; ?>" />
                                           | <a class="delete_city" data-id="<?php echo $id; ?>" href="javascript:void(0);">Delete </a></td>
                                             </tr> 
                                             
                                             

                                    <?php                                    
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

<!-- shifting across different page -->
<script src="js/bootstrap.min.js" type="text/javascript"></script>
<!-- AdminLTE App -->
<script src="js/AdminLTE/app.js" type="text/javascript"></script>

<link href="../scripts/ddl/jquery.flexdatalist.css" rel="stylesheet" type="text/css">
<link href="../scripts/ddl/jquery.flexdatalist.min.css" rel="stylesheet" type="text/css">
<script src="../scripts/ddl/jquery.flexdatalist.min.js"></script>
<script src="../scripts/ddl/jquery.flexdatalist.js"></script>

<!--<script>

$(document).ready(function() {
   $('.editcity').click(function(){
       
       alert("123");
});
});
</script>-->

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
    $('#example').val();
    
} );
$(document).ready(function() {
     $('#example1').DataTable();
    
});

</script>

<script type="text/javascript">
    
   $(document).ready(function () {
$(document).on("click", ".editcity", function () {
    var cityid = $(this).data('id');
//    alert(cityid);     
    //$('#sss').modal('show');
    $.ajax({
        type: "POST",
        url: "city_edit.php?op=editcity",
        data: "getcityid=" + cityid,
        success: function (data)
        {

//             alert(data);
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
      $(document).on("click", ".delete_city", function () {
//           alert('123');
            var id = $(this).data("id");
            var first =$("#first_input_" + id).val();
            alert(first);
             var dataString = 'id=' + id+'&firstname=' + first;
            var parent = $(this).parent().parent();
if (confirm('Are you sure, you want to delete.?')) {
                $.ajax({
                                    type: "POST",
                                    url: "delete_city.php",
                                    data: dataString,
                                    cache: false,
//                                    beforeSend: function () {
//                                        $('.modal-backdrop').removeClass('hidden');
//                                        $('.modal-backdrop').addClass('show');
//                                    },
                                    success: function (data)
                                                      {
                                                           var responsevaal = $.trim(data);

                                                           if(responsevaal == 1)
                                              {

                                                              alert('Deleted Successfully');
                                                              parent.fadeOut('slow', function () {
                                                                  $(this).remove();
                                                              });
                                                         location.reload();
                                                     }
                                                     else
                                                     {
                                                         alert('Sorry it is selected by some employer or seeker');
                                                     }
                                                      }





//                                    success: function ()
//                                    {
//                                     alert("Deleted Successfully");
//				    
//                                        $('.modal-backdrop').removeClass('show');
//                                        $('.modal-backdrop').addClass('hidden');
//                                        if (id % 2)
//                                        {
//                                            parent.fadeOut('slow', function () {
//                                                $(this).remove();
//                                            });
//                                        } else
//                                        {
//                                            parent.slideUp('slow', function () {
//                                                $(this).remove();
//                                            });
//                                        }
//                                    }
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
                    var items = [];
                              $.getJSON('country.json',function(data){
                        var data_length = Object.keys(data).length;
                                for(var j=0; j < data_length ; j++){
                                    if (data[j].country == value) {
                                      items.push(data[j].id);
                            }
                          }
                        var country_id = items.join(",");
                        //$('#country_id').val(country_id);
                        //alert(country_id);
                    $.ajax({
                        type: "POST",
                        url: "ajaxdel.php?op=addstate",
                        data: ({country_id: country_id}),
                        success: function (data){
                            //alert(data);
                            $("#state").html(data);
                            
                        }
                    });
                    });
                });
                
                
                $('.state_allresults').change(function () {
                    var value = $(this).val();
                    var items = [];
                              $.getJSON('state.json',function(data){
                        var data_length = Object.keys(data).length;
                                for(var j=0; j < data_length ; j++){
                                    if (data[j].state == value) {
                                      items.push(data[j].id);
                            }
                          }
                        var state_id = items.join(",");
                        // alert(state_id);
                        $('#state_id').val(state_id);

                    });
                });
           </script>
        
        

</body>
</html>


