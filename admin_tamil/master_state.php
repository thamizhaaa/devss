

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
	$err_country = "Select country name";
	} 
        if ($location == ""){
	$err_location = "Enter state name";
	}else if(!$e_sq=='') {
	$err_location = "$location is already in use.";
	}
	
	
	
	$errors .= $err_country . $err_location;
	
	$validation_form1 = "";
	if(isset($errors))
	$validation_form1 .= $errors;
	
	if(!$validation_form1) {
		$indus_query = mysql_query("INSERT INTO tbl_states(fld_name,fld_country_id)VALUES('".$location."','".$country_id."')"); ?>

                <script>
//alert("<?php // echo $location." "."State Created Successfully" ?>");
//window.location = "master_state.php";
//window.location = "admin_home.php";
</script>
	<?php header('Location:master_state.php',false);		
	}
}	
?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title>AdminLTE | Dashboard</title>
        <meta content='width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no' name='viewport'>
        <link href="css/bootstrap.min.css" rel="stylesheet" type="text/css" />
        <link href="//cdnjs.cloudflare.com/ajax/libs/font-awesome/4.1.0/css/font-awesome.min.css" rel="stylesheet" type="text/css" />
        <!-- Ionicons -->
        <link href="//code.ionicframework.com/ionicons/1.5.2/css/ionicons.min.css" rel="stylesheet" type="text/css" />
        <!-- Theme style -->
        <link href="css/AdminLTE.css" rel="stylesheet" type="text/css" />
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
                         Location Management
<!--                        <small>it all starts here</small>-->
                    </h1>
                    <ol class="breadcrumb">
                        <li><a href="admin_home.php"><i class="fa fa-dashboard"></i> Home</a></li><li class="active">Location Management</li><li class="active">State Master</li>
                    </ol>
                </section>

                <!-- Main content -->
                <section class="content">
					
                    <div class="panel panel-default">
<div class="panel-heading"><h3 class="panel-title">State Master</h3></div>
<div class="panel-body">
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
<input type="text"  class="form-control" name="loc" placeholder="State Name *"  value="<?php echo $_POST['loc']; ?>"/>
<span class="help-block">Ex : Tamil Nadu  IN</span>
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
<input type="submit" class="btn btn-warning" name="submit"  value="Save"/>
<input type="reset" class="btn btn-warning" value="Reset" />
<!--<input class="btn btn-warning" Type="button" VALUE="Back" onClick="location.href='admin_home.php'"></div>-->
</div>
</form>


<br/>
<br/>

<div class="col-md-10" style="margin-top:45px;">
<table class="table table-bordered table-responsive" align="center" width="100%" height="30px" border="1px" cellpadding="0" cellspacing="0">
<th width="10%">SI NO</th><th>State</th><th>DELETE</th>
<?php 
$pagin_query =mysql_query("select count(*) as total  from  tbl_states");
	$pagin_row=mysql_fetch_array($pagin_query);
	$total=$pagin_row['total'];
	$dis=50;
	$total_page=ceil($total/$dis);
	$page_cur=(isset($_GET['page']))?$_GET['page']:1;
	$k=($page_cur-1)*$dis;



$sql=mysql_query("select * from tbl_states WHERE fld_status=0 order by fld_id limit $k,$dis");
$a = $k+1;
while($fetch_array = mysql_fetch_array($sql)) {

$id = $fetch_array['fld_id'];
//echo $id;
$location = $fetch_array['fld_name'];
//$shortloc = $fetch_array['fld_sortname'];

?>

<tr id="<?php echo $id; ?>" class="edit_tr">

<td class="edit_td"><?php echo $a; ?></td>

<td class="edit_td"><span id="first_<?php echo $id; ?>" class="text"><?php echo $location; ?></span>
<input type="text" value="<?php echo $location; ?>" class="editbox" id="first_input_<?php echo $id; ?>" /></td>
<!--<td><span><?php //echo $shortloc; ?></span></td>-->
<td class="fld_id"><a href="#" id="<?php echo $id; ?>"  class="edit_trr"><i class="fa fa-trash-o"></i></a></td>
</tr>

<?php 
$a++;
} ?>

</table>

<?php if($total > 50) { ?>
<nav>
  <ul class="pager">
  <?php if($page_cur>1) { ?>
    <li class="previous"><a href="master_state.php?page=<?php echo ($page_cur-1);?>"><span aria-hidden="true">&larr;</span>Prev</a></li>
    <?php } else { ?>
    <li class="previous"><a>Prev</a></li>
    <?php } 
	if($page_cur<$total_page) {?>

    <li class="next"><a href="master_state.php?page=<?php echo ($page_cur+1); ?>">Next<span aria-hidden="true">&rarr;</span></a></li>
     <?php } else { ?>
		
		<li class="next" ><a>Next</a></li>
		<?php } ?>
		 
  </ul>
</nav>
<?php } ?>


</div>
</div>
</div>
                    
                    





                </section><!-- /.content -->
            </aside><!-- /.right-side -->
        </div><!-- ./wrapper -->

        <script src="//ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
        <script src="js/bootstrap.min.js" type="text/javascript"></script>
        <!-- AdminLTE App -->
        <script src="js/AdminLTE/app.js" type="text/javascript"></script>
        <!-- AdminLTE for demo purposes -->
        <script src="js/AdminLTE/demo.js" type="text/javascript"></script>
        
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
        
        
         <script type="text/javascript">
$(document).ready(function()
{
$(function() {
$(".edit_trr").click(function() {
	
var id = $(this).attr("id");
var dataString = 'id='+ id;
var parent = $(this).parent().parent();

$.ajax({
type: "POST",
url: "delete_state.php",
data: dataString,
cache: false,

success: function()
{
if(id % 2)
{
    alert('State Deleted Successfully');
parent.fadeOut('slow', function() {$(this).remove();});
}
else
{
parent.slideUp('slow', function() {$(this).remove();});
}
}
});

return false;
});
});
});
</script>
		<script type="text/javascript">
$(document).ready(function()
{
$(".edit_tr").click(function()
{
var ID=$(this).attr('id');
$("#first_"+ID).hide();
$("#first_input_"+ID).show();
}).change(function()
{
var ID=$(this).attr('id');
var first=$("#first_input_"+ID).val();
var dataString = 'id='+ ID +'&firstname='+first ;
$("#first_"+ID).html('<img src="load.gif" />'); // Loading image

if(first.length>0)
{

$.ajax({
type: "POST",
url: "edit_state.php",
data: dataString,
cache: false,
success: function(html)
{
    alert('State Updated Successfully');
$("#first_"+ID).html(first);

}
});
}
else
{
alert('Enter something.');
}

});

// Edit input box click action
$(".editbox").mouseup(function() 
{
return false
});

// Outside click action
$(document).mouseup(function()
{
$(".editbox").hide();
$(".text").show();
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
    </body>
</html>
