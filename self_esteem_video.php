<?php
error_reporting(0);
error_reporting(E_ALL ^ E_NOTICE);
@include("config.php");
//print_r($_SESSION);
@include("user_sessioncheck.php"); 
$user_id = $_SESSION['user_id'];
 $date=date('Y-m-d H:i:s');
if($user_id == "")
{    
    header('Location: index.php'); 
}
//$username = $_SESSION["user_name"];
//$user_email = $_SESSION['user_email']; 
//$user_id = $_SESSION['user_id'];
?>
<!DOCTYPE html>
<html lang="en">
<head>
<meta http-equiv="content-type" content="text/html;charset=UTF-8" />
<!--[if IE]>
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<![endif]-->
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<meta name="description" content="">
<meta name="author" content="ScriptsBundle">
<title>Self Esteem Video | Staffingspot | Job Portal</title>
<link rel="icon" href="favicon.ico" type="image/x-icon">

<!-- BOOTSTRAPE STYLESHEET CSS FILES -->
<link rel="stylesheet" href="css/bootstrap.min.css">

<!-- JQUERY SELECT -->
<link href="css/select2.min.css" rel="stylesheet" />

<!-- JQUERY MENU -->
<link rel="stylesheet" href="css/mega_menu.min.css">

<!-- ANIMATION -->
<link rel="stylesheet" href="css/animate.min.css">

<!-- OWl  CAROUSEL-->
<link rel="stylesheet" href="css/owl.carousel.css">
<link rel="stylesheet" href="css/owl.style.css">

<!-- TEMPLATE CORE CSS -->
<link rel="stylesheet" href="css/style.css">
<link rel="stylesheet" href="css/style1.css">
<link rel="stylesheet" href="css/mobile.css">

<!-- FONT AWESOME -->
<link rel="stylesheet" type="text/css" href="css/font-awesome.min.css">
<link rel="stylesheet" href="css/et-line-fonts.css" type="text/css">

<!-- Google Fonts -->
<link href="http://fonts.googleapis.com/css?family=Source+Sans+Pro:400,600,700,900,300" rel="stylesheet" type="text/css">
<link href="https://fonts.googleapis.com/css?family=Open+Sans:400,600,700" rel="stylesheet" type="text/css">

<!-- JavaScripts -->
<script src="js/modernizr.js"></script>



<!-- JAVASCRIPT JS  -->
<script type="text/javascript" src="js/jquery-3.1.1.min.js"></script>

<!-- JAVASCRIPT JS  --> 
<!--<script type="text/javascript" src="js/jquery-migrate-1.2.1.min.js"></script>-->

<!-- BOOTSTRAP CORE JS -->
<script type="text/javascript" src="js/bootstrap.min.js"></script>



<!--<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js">
</script>-->


<script>
$(document).ready(function(){
$("#button1").click(function(){
var id123 =$("#id1").val();
//alert(id123);
});
});
</script>

<style>
    video::-internal-media-controls-download-button {
        display:none;
    }
    video::-webkit-media-controls-enclosure {
        overflow:hidden;
    }
    video::-webkit-media-controls-panel {
        width: calc(100% + 30px); /* Adjust as needed */
    }
   
    
</style>







<!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
<!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
<!--[if lt IE 9]>
<script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
<script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
<![endif]-->
</head>

<body>
<div class="page category-page">
<div id="spinner">
<div class="spinner-img">
<img alt="Staffing Spot - the spot for your career" src="images/loader.svg" />
<h2>Please Wait...</h2>
</div>
</div>

<?php @include("top.php"); ?>
<div class="clearfix"></div>

<div class="search">
<div class="container-fluid">
<div class="row">
<div class="col-md-12 col-sm-12 col-xs-12 nopadding">
<div class="input-group">
<div class="input-group-btn search-panel">
<button type="button" class="btn btn-default dropdown-toggle" data-toggle="dropdown">
<span id="search_concept">Filter By</span> <span class="caret"></span>
</button>
<ul class="dropdown-menu" role="menu">
<li><a href="#">By Company</a></li>
<li><a href="#">By Function</a></li>
<li><a href="#">By City </a></li>
<li><a href="#">By Salary </a></li>
<li><a href="#">By Industry</a></li>
</ul>
</div>
<input type="hidden" name="search_param" value="all" id="search_param">
<input type="text" class="form-control search-field" name="x" placeholder="Search term...">
<span class="input-group-btn">
<button class="btn btn-default" type="button"><span class="fa fa-search"></span></button>
</span>
</div>
</div>
</div>
</div>
</div>

<section class="job-breadcrumb">
    <div class="container">
        <div class="row">
            <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="col-md-6 col-sm-7 co-xs-12 text-left">
                    <h3>Esteem Profile Video</h3>
                </div>
                <div class="col-md-6 col-sm-5 co-xs-12 text-right">
                    <div class="bread">
                        <ol class="breadcrumb">
                            <li><a href="user-dashboard.php">Dashboard</a> </li>
                            <li class="active">Esteem Profile Video</li>
                        </ol>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<?php @include("usertop.php"); ?>
<section class="dashboard-body">
<div class="container">
<div class="row">
<div class="col-md-12 col-sm-12 col-xs-12">
<?php @include("userprofleftpanel.php");?>
<div class="col-md-8 col-sm-8 col-xs-12" id="resumelist">
   
<div class="col-md-12 col-sm-12 heading-inner first-heading nopadding">
<p class="title">Esteem Profile Video</p>
<a href="javascript:void(0)"><span class="pull-right add-button btn-default" data-toggle="modal" data-target=".add-resume-modal"> Add New Video</span></a>
</div>
<div class="col-md-12 col-sm-12 resume-list nopadding">
<div class="table-responsive">

      <?php
    
$records1 = "select * from tbl_esteem_video  WHERE `fld_del_status`= 0 and fld_status in (0,1) and fld_emp_id = $user_id";

$records = mysql_query($records1) or die("Query fail: " . mysql_error());
 $totalvisitor_count = mysql_num_rows($records);
                                                //echo $totalvisitor_count;
                                                 if($totalvisitor_count >0)
                                { 
                                                     ?>
<table class="table  table-striped">
    <thead class="thead-inverse">

  
        <tr>
            <th>S.No</th>
            <th>Title</th>
            <th>Video</th>
        </tr>
</thead>
<?php

$projects = array();
while ($project =  mysql_fetch_assoc($records))
{
$projects[] = $project;
}
$i = 0;
foreach($projects as $project111)
{
//        header("Content-type: image/jpg");
//  echo $row['logo'];
?>

<?php 
$i=$i+1;
$sql11="SELECT * FROM `tbl_esteem_video` WHERE fld_status in (0,1)";
$sql = mysql_query($sql11);//echo $sql;
$count = mysql_num_rows($sql);
//echo $count;

$id = $project111['fld_id'];
//echo $id;
$status111 = $project111['fld_status'];
//echo "status".$status111;

?>

<tbody>
<tr>
<th scope="row"><?php echo  $i; ?></th>
<td>
<h5><?php echo $project111['fld_esteem_video_title']; ?></h5></td>
<td>
    <video src="<?php echo $project111['fld_esteem_video']; ?>" class="img-responsive" controls></video>
    <a class="edit_trr" id="<?php echo $id; ?>" href="#"><img src="icons/delete.png"></a>
    <?php
if($status111 == "0"){
?>
    
    <a href="javascript:void(0);" class="btn-togg activevideo pull-right" id="<?php echo $id; ?>" value="<?php echo $id; ?>">
        <label class="switch">
            <input type="checkbox" alt="Active/Deactive Toggle Button" title="Active/Deactive Toggle Button" >
            <span class="slider round" alt="Active/Deactive Toggle Button" title="Active/Deactive Toggle Button"></span>
        </label>
    </a>
    
    
    
    
    <!--<a class="btn-togg activevideo pull-right" id="<?php echo $id; ?>" value="<?php echo $id; ?>"><i class="fa fa-toggle-off"></i></a>-->
    <?php
} else {
?>
    
    <a href="javascript:void(0);" class="btn-togg pull-right" id="btndeactiveresume" value="<?php echo $id; ?>" >
        <label class="switch">
            <input type="checkbox" alt="Active/Deactive Toggle Button" title="Active/Deactive Toggle Button" checked="checked" disabled>
            <span class="slider round" alt="Active/Deactive Toggle Button" title="Active/Deactive Toggle Button"></span>
        </label>
    </a>
    
    
    
    
    <!--<a class="btn-togg pull-right" id="btndeactiveresume" value="<?php echo $id; ?>" disabled><i class="fa fa-toggle-on"></i></a>-->
<?php } ?>
</td>


</tr>
</tbody>
<?php
}
?>
</table>
   <?php }  else {
                                ?>
                                <div class="col-md-12 col-sm-12 nopadding">
                                	<!--<h4>No Video Available</h4>-->
					<center><h3>No Data Available</h3></center>
                                    <?php /*echo "No Resume Available"; */?>
                                    
                                </div>
                                <?php }?>
</div>
</div>
     

</div>
</div>
</div>
</div>
</section>      


<div class="modal add-resume-modal vid" tabindex="-1" role="dialog" aria-labelledby="" data-keyboard="false" data-backdrop="static">
    <div class="modal-dialog modal-md" role="document">
        <div class="modal-content">
            <form method="post" id="resumeform" name="resumeform" enctype="multipart/form-data">
                <div class="modal-header">
                    <button type="button" id="form_close" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                    <h4 class="modal-title" id="myModalLabel">Add New Video</h4>
                </div>
                <div class="modal-body">
                    <div class="form-group">
                        <input type="text" class="form-control" name="resumetitle" id="resumetitle" placeholder="Enter the Video Title">
                    </div>

                    <div class="form-group">
                        <input type="text" class="form-control image-preview-filename" disabled="disabled" id="previewid" name="previewid">                            
                    </div>

                    <span class="input-group-btn">
                    <button type="button" class="btn btn-default image-preview-clear" id="btndefaulttt" style="display:none;">
                            <span class="glyphicon glyphicon-remove"></span> Clear
                        </button>
                        &nbsp;
                        &nbsp;
                        &nbsp;
                        <div class="btn btn-default image-preview-input" id="btndefaulttt">
                            <span class="glyphicon glyphicon-folder-open"></span>
                            <span class="image-preview-input-title">Browse</span>
                            <input name="resumefile" data-filename-placement="inside" class="form-control" type="file" id="resumefile" accept="video/mp4"/>
                        </div>
                    </span>
                    <div id="edit_file"></div>
                    <p>Accept mp4 format and video size below 8MB only</p>
                </div>
                <div class="modal-footer">
                    <input type="button" name="btnaddresume" id="btnaddresume" class="btn btn-success" value="Save Video"/>
                </div>
            </form>
        </div>
    </div>
</div>

<?php @include("bottom.php"); ?>
<a href="#" class="scrollup"><i class="fa fa-chevron-up"></i></a>


<!-- JQUERY SELECT -->
<script type="text/javascript" src="js/select2.min.js"></script>

<!-- MEGA MENU -->
<script type="text/javascript" src="js/mega_menu.min.js"></script>



<!-- JQUERY COUNTERUP -->
<script type="text/javascript" src="js/counterup.js"></script>

<!-- JQUERY WAYPOINT -->
<script type="text/javascript" src="js/waypoints.min.js"></script>

<!-- JQUERY REVEAL -->
<script type="text/javascript" src="js/footer-reveal.min.js"></script>

<!-- Owl Carousel -->
<script type="text/javascript" src="js/owl-carousel.js"></script>

<!-- CORE JS -->
<script type="text/javascript" src="js/custom.js"></script>
<!-- <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css"> -->
<!--<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>-->
<!--<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>-->
<!--<script src="//code.jquery.com/jquery-1.11.3.min.js"></script>-->
<!--<script src="//ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>-->
<!--<script src="js/bootstrap.min.js" type="text/javascript"></script>-->
<!-- AdminLTE App -->
<!--<script src="js/AdminLTE/app.js" type="text/javascript"></script>-->
<!-- AdminLTE for demo purposes -->
<!--<script src="js/AdminLTE/demo.js" type="text/javascript"></script>-->
<script type="text/javascript" src="http://code.jquery.com/ui/1.10.3/jquery-ui.js"></script>


<script type="text/javascript" src="scripts/jquery.form.js"></script>

<script type="text/javascript">
    
    
     $('#form_close').on('click', function () {
        $('#resumeform').trigger("reset");
    });
    
//$(document).ready(function()
//{

//$(function() {
$(".edit_trr").click(function() {
var id = $(this).attr("id");
var dataString = 'id='+ id;
var parent = $(this).parent().parent();
//	if(confirm('Are sure, You want to delete?')) {
swal({
			    title: 'Are you sure?',
			    text: "You want to delete this file!",
			    type: 'warning',
			    showCancelButton: true,
			    confirmButtonColor: '#3085d6',
			    cancelButtonColor: '#d33',
			    confirmButtonText: 'Yes, delete it!',
			    cancelButtonText: 'No, cancel!',
			    confirmButtonClass: 'btn btn-success',
			    cancelButtonClass: 'btn btn-danger',
			    buttonsStyling: false
			  }).then(function () {
$.ajax({
type: "POST",
url: "delete_seeker.php?op=delete_video",
data: dataString,
cache: false,
beforeSend: function(){
$('.modal-backdrop').removeClass('hidden');	
$('.modal-backdrop').addClass('show');	
},
success: function()
{ 
	swal(
						'',
						'Profile Video Has Been Deleted Successfully!',
						'success'
					)
                                $('.swal2-confirm').click(function(){
                                      location.reload();
                                  });

//$("#resumelist").load(window.location + " #resumelist");
$('.modal-backdrop').removeClass('show');	
$('.modal-backdrop').addClass('hidden');	
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
//	}
return false;
    }, function (dismiss) {
			    // dismiss can be 'cancel', 'overlay',
			    // 'close', and 'timer'
			    if (dismiss === 'cancel') {
			      swal(
				'Cancelled',
				'',
				'error'
			      )
				$('.swal2-confirm').click(function(){
                                      location.reload();
                                  });
}
			})
});
//});


//$(function() {
$(".activevideo").click(function() {            
var id = $(this).attr("value");
var dataString = 'id='+ id;  
//alert(dataString);
swal({
			    title: 'Are you sure?',
			    text: "You want to activate this video!",
			    type: 'warning',
			    showCancelButton: true,
			    confirmButtonColor: '#3085d6',
			    cancelButtonColor: '#d33',
			    confirmButtonText: 'Yes, Activate it!',
			    cancelButtonText: 'No, cancel!',
			    confirmButtonClass: 'btn btn-success',
			    cancelButtonClass: 'btn btn-danger',
			    buttonsStyling: false
			  }).then(function () {
//    if(confirm('Are sure, You want to active this Video..?')) {
		$.ajax({
		type: "POST",
		url: "user-resume-build_inner.php?op=activevideolist",
		data: dataString,
		cache: false,
		beforeSend: function(){
		$("#btnactiveresume").css('display', 'inline', 'important');
		$("#btnactiveresume").html("<center><img src='ajax.gif'/> Loading...</center>")
		},
		success: function(data)
		{
		    swal(
						'',
						'Profile Video Activated Successfully!',
						'success'
					)
		$('.swal2-confirm').click(function(){
                                      location.reload();
                                  });
		//$("#resumelist").load(window.location + " #resumelist");
		}

		});
//}
return false;
    }, function (dismiss) {
			    // dismiss can be 'cancel', 'overlay',
			    // 'close', and 'timer'
			    if (dismiss === 'cancel') {
			      swal(
				'Cancelled',
				'',
				'error'
			      )
				$('.swal2-confirm').click(function(){
                                      location.reload();
                                  });
}
			})
});
//});



//$(function() {
$("#btninactiveresume").click(function() {            
var id = $(this).attr("value");        
var dataString = 'id='+ id;        
 if(confirm('Are sure, You want to deactive this Video..?')) {
$.ajax({
type: "POST",
url: "activeresume.php",
data: dataString,
cache: false,
beforeSend: function(){
$("#btnactiveresume").css('display', 'inline', 'important');
$("#btnactiveresume").html("<center><img src='ajax.gif'/> Loading...</center>")
},
success: function()
{
location.reload();
//$("#resumelist").load(window.location + " #resumelist");
}

});
}
return false;
});
//});
//});
</script>


<script>
//$(document).ready(function(e) {
	
        $("#btnaddresume").click(function() {          	        	
        //alert("ygy");                            
        var resumetitle = $("#resumetitle").val();	
        //alert(resumetitle);	
		var resumefile = $("#resumefile").val();	
		
		if(resumetitle == ""){		
		//alert("fdgfdgfd");
		$('#resumetitle').css('border-color', 'red');
		$('#resumefile').css('border-color', '');		
		//$("#shadeserror").html("Please Provide the Shade Name!");
		$("#resumetitle").focus();
		return false;
		}
		else if(resumefile == ""){	
		$('#resumetitle').css('border-color', '');				
		$('#resumefile').css('border-color', 'red');		
		$("#previewid").focus();
		$('#previewid').css('border-color', 'red');		
		$("#resumefile").focus();
		//alert("Please Choose Your Resume!!!");		
		return false;
		}
		else
		{
			$('#resumetitle').css('border-color', '');		
			$('#resumefile').css('border-color', '');
		//alert("hii");
			$("#resumeform").ajaxForm({		
				type:"POST",
				url: "user-resume-build_inner.php?op=addnewvideo",
				data: "resumetitle="+resumetitle+"&resumefile="+resumefile,	
				// data : {shadename: shadename , fabrictype: fabrictype, melangecode: melangecode, shadedetails: shadedetails},
                                 datatype : 'html',				
				success: function(data)
				{	
//					alert(data);
                                        swal(
                                                '',
                                                'Uploaded Successfully!',
                                                'success'
                                        )
					$('.swal2-confirm').click(function(){
                                      location.reload();
                                  });
                                  $(".overlaymodal").hide(); 
				},
                                beforeSend:function()
                                {
                                 $(".overlaymodal").show();                        
                                }
		}).submit();
			  		
		}
	});
//});   

$("#resumefile").change(function () {
       if ($(this).val() !== "") {
        var file = $('#resumefile')[0].files[0];
        var max_size = '8388608';
        var reader = new FileReader();
        var _URL = window.URL || window.webkitURL;
        reader.readAsDataURL(file);
        reader.onload = function(_file) {
            var extension = file.name.replace(/^.*\./, '');
            var size = file.size;
            if(extension != 'mp4'){
            $("#edit_file").css({
                'color': 'red',
                'font-size': '16px',
                'font-weight': '600',
                'text-transform': 'capitalize'
});
        var msg = "Please provide valid file";
         $('#edit_file').text(msg);
         $("#edit_file").fadeOut(3000);
         $("#previewid").val('');
         $("#resumefile").val('');
        return false;
            } 
           else if(size > max_size){
            $("#edit_file").css({
                'color': 'red',
                'font-size': '16px',
                'font-weight': '600',
                'text-transform': 'capitalize'
});
        var msg = "Please provide file size less than 8Mb";
         $('#edit_file').text(msg);
         $("#edit_file").fadeOut(3000);
         $("#previewid").val('');
         $("#resumefile").val('');
        return false;
        
        }else{
                return true;

            }  
          } 
       }
    });




</script> 



</div>
</body>
</html>