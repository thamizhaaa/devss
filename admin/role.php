<?php
error_reporting(0);

include "admin_session.php";

if(isset($_POST['submit'])) {

	$jobtype = $_POST['jobtype'];
	
			
	$e_query = mysql_query("select fld_id from tbl_role where fld_role='$jobtype'");
	$e_sq=mysql_num_rows($e_query);

	if ($jobtype == ""){
		 $err_jobtype = "Enter Role";
	}else if(!$e_sq=='') {
	$err_jobtype = "$jobtype is already in use.";

	}
	
	
	$errors .= $err_jobtype;
	
	$validation_form1 = "";
	if(isset($errors))
	$validation_form1 .= $errors;
	
	if(!$validation_form1) {
		
		$indus_query = mysql_query("INSERT INTO  tbl_role(fld_role)VALUES('".$jobtype."')");
	?>
	<script>
	alert("Role added Successfully");
	window.location = "role.php";
	</script>
<?php
	}
}	
?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title>Role | StaffingSpot</title>
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
                        Role Master
                        <small>it all starts here</small>
                    </h1>
                    <ol class="breadcrumb">
                        <li><a href="admin_home.php"><i class="fa fa-dashboard"></i> Home</a></li>                        <li class="active">JobType Master</li>
                    </ol>
                </section>

                <!-- Main content -->
                <section class="content">
					
                    <div class="panel panel-default">
<div class="panel-heading"><h3 class="panel-title">Role Master</h3></div>
<div class="panel-body">
<form class="form_top_space" action="" method="post">

<label class="col-sm-3 control-label" style="margin-left:3%;">Job Type *</label>
<div class="col-sm-3"><input type="text"  class="form-control" name="jobtype" placeholder="Role Type *"  value="<?php echo $_POST['jobtype']; ?>"/><span class="help-block"><?php echo $err_jobtype; ?></span></div>

<div class="col-sm-12">
<label class="col-sm-3 control-label" style="margin-left:3%;"></label>
<div><input type="submit" class="btn btn-warning" name="submit"  value="Save"/>

<INPUT class="btn btn-warning" Type="button" VALUE="Back" onClick="location.href='admin_home.php'"></div>
</div>

</form>


<br/>
<br/>

<div class="col-md-10" style="margin-top:45px;">
<table class="table table-bordered table-responsive" align="center" width="100%" height="30px" border="1px" cellpadding="0" cellspacing="0">
<th width="10%">SI NO</th><th>ROLE TYPE</th><th>DELETE</th>
<?php 

$sql=mysql_query("select * from tbl_role WHERE fld_delstatus=0");
$a = 0;
while($fetch_array = mysql_fetch_array($sql)) {
$a++;

$id = $fetch_array['fld_id'];
//$user_type = $fetch_array['usertype'];
$jobtype1 = $fetch_array['fld_role'];

?>

<tr id="<?php echo $id; ?>" class="edit_tr">

<td class="edit_td"><?php echo $a; ?></td>

<!--<td class="edit_td"><?php echo $user_type; ?></td>-->
<td class="edit_td"><span id="first_<?php echo $id; ?>" class="text"><?php echo $jobtype1; ?></span>
<input type="text" value="<?php echo $jobtype1; ?>" class="editbox" id="first_input_<?php echo $id; ?>" /></td>
<td class="edit_td"><a href="#" id="<?php echo $id; ?>"  class="edit_trr"><i class="fa fa-trash-o"></i></a></td>
</tr>

<?php } ?>

</table>






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
        <script type="text/javascript">
$(document).ready(function()
{
$(function() {
$(".edit_trr").click(function() {
    alert("alert");
	
var id = $(this).attr("id");
var dataString = 'id='+ id;
var parent = $(this).parent().parent();

$.ajax({
type: "POST",
url: "del_role.php",
data: dataString,
cache: false,

success: function()
{
if(id % 2)
{
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
url: "edit_role.php",
data: dataString,
cache: false,
success: function(html)
{
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
</script>
    </body>
</html>
