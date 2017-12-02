<?php 
error_reporting(0);

include "includes/config.php";

   $id =$_REQUEST['id'];
   
   if($id != "") {
	   
	$form1_id = mysql_query("SELECT * FROM seeker_personal WHERE id = '$id'");
   
    $form1_row = mysql_fetch_array($form1_id);      
	$seekerid = $form1_row['seekerid'];
	$email = $form1_row['mailid'];   
   } else {
?>	   
	<script>
  window.location = "seeker_reg.php";
	</script>
<?php  } ?>

<?php 
	if(isset($_POST['submit'])) {
		
		$seekid = $_POST['seekid'];
		$aoi = $_POST['aoi'];		
		$skills = $_POST['skills'];
		$jobtype = $_POST['jobtype'];
		$salary = $_POST['salary'];
		$experience = $_POST['ex_year'];
		$resumetitle = $_POST['resumetitle'];

		
		if( !preg_match("/^[a-zA-Z -]+$/", $aoi))
			$err_aoi = "Only Alphabet Allowed";
			
		if($skills=="")
		$err_skills = "Key Skills required..";
		
		if($jobtype=="0")
		$err_jobtype = "Select your Job Type";
		
		if( !preg_match('/^[0-9]+$/',$salary))
		$err_salary = "Use only Numbers";
		
		if($experience=="0")
		$err_experience = "Select your Experience";
			
				
		$allowedExts = array("pdf", "doc", "docx");
$temp = explode(".", $_FILES["resume"]["name"]);
$extension = end($temp);

if ((($_FILES["resume"]["type"] == "application/msword")
|| ($_FILES["resume"]["type"] == "application/pdf")
|| ($_FILES["resume"]["type"] == "application/vnd.openxmlformats-officedocument.wordprocessingml.document"))
&& ($_FILES["resume"]["size"] < 2000000)
&& in_array($extension, $allowedExts)) {
  if ($_FILES["resume"]["error"] > 0) {
    echo "Return Code: ".$_FILES["resume"]["error"] . "<br>";
  } else {
	 move_uploaded_file($_FILES["resume"]["tmp_name"],
      "resume/" .$seekerid. $_FILES["resume"]["name"]);
      $upload_resume =  "resume/" .$seekerid. $_FILES["resume"]["name"];
  }
} else {
  $err_upload =  "Invalid file";
  
}
  
  		$errors .= $err_aoi.$err_skills.$err_jobtype.$err_salary.$err_experience.$err_upload;
		
		$validation_check = "";
		if(isset($errors))		
		$validation_check .= $errors;
		
		if(!$validation_check){
		
  
		$seek_query1 = mysql_query("INSERT INTO seeker_profess(seekerid,areaofinterest,keyskills,jobtype,esalary,experience,resumetitle,resumepath)VALUES('".$seekid."','".$aoi."','".$skills."','".$jobtype."','".$salary."','".$experience."','".$resumetitle."','".$upload_resume."')");
?>

	<script>
	window.location = "seeker_reg2.php?id=<?php echo $id; ?>";
	</script>
<?php		
		
	} else {
		
		$validation_message = $validation_check;
	}
	}
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Job Portal</title>
<link rel="stylesheet" href="styles/styles_basic.css" type="text/css" />
<link rel="stylesheet" href="styles/bootstrap.css" type="text/css" />
<link rel="stylesheet" href="styles/style_popup.css" type="text/css" />
<link rel="stylesheet" href="//code.jquery.com/ui/1.11.2/themes/smoothness/jquery-ui.css">
  <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
        <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
        <!--[if lt IE 9]>
          <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
          <script src="https://oss.maxcdn.com/libs/respond.js/1.3.0/respond.min.js"></script>
        <![endif]-->    
<script type="text/javascript" src="js/bootstrap.js"></script>
<script type="text/javascript" src="js/jquery-1.10.2.min.js"></script>
<script type="text/javascript" src="js/bootstrap-dropdown.js"></script>
<script type="text/javascript" src="js/jquery.leanModal.min.js"></script>
<script type="text/javascript" src="js/bootstrap.file-input.js"></script>
<script>
	
	$(document).ready(function() {
		
		$( ".button-search" ).hover(function() {
			$("#search input").addClass('hover_search');
			$("#search input").removeClass('main_search');
			$(".input_close").css('display', 'block');
		});
		
		$( ".input_close" ).click(function() {
			$("#search input").addClass('main_search');
			$("#search input").removeClass('hover_search');
			$(".input_close").css('display', 'none');
		});
	$("#modal_trigger").leanModal({top : 200, overlay : 0.6, closeButton: ".modal_close" });

	$(function(){
			$(".user_login").show();
	})

	$("#modal_trigger_emp").leanModal({top : 200, overlay : 0.6, closeButton: ".modal_close" });

	$(function(){
			$(".employer_login").show();
	})
	$('input[type=file]').bootstrapFileInput();
	$('.file-inputs').bootstrapFileInput();
		});
</script>
</head>

<body>
<?php include("includes/header.php"); ?>

<div class="container-fluid white_bg top_space">
<div class="panel panel-default">

<div class="alert alert-orange"><h3 class="panel-title"><strong>Job Seekers Registration - Professional</strong></h3></div>
 <div class="panel-body"  style="padding-top: 0px;"> 
  <div class="form-group">
 
  <img src="images/seeker_reg_2.jpg" class="img-responsive" />
  </div>

<form class="form_top_space" action="" method="post" enctype="multipart/form-data" role="form">
  <div class="clr_both form-group">

<div class="col-sm-3 hidden"><input type="hidden" class="form-control"  name="seekid" value="<?php echo $seekerid; ?>" readonly /><span class="err_txt"></span></div>

<label class="col-sm-1 control-label" style="margin-left:3%;">Area Of Interest *</label>
<div class="col-sm-3"><input class="form-control" type="text" placeholder="Area of Interest" name="aoi" value="<?php echo $_POST['aoi']; ?>" /><span class="err_txt"><?php echo $err_aoi; ?></span></div>
</div>

 <div class=" clr_both form-group ">
 <label class="col-sm-1 control-label" style="margin-left:3%;">Key Skills *</label>
<div class="col-sm-3"><textarea name="skills" class="form-control"   placeholder="Key Skills" ></textarea><span class="err_txt"><?php echo $err_skills; ?></span></div>

<label class="col-sm-1 control-label" style="margin-left:3%;">Job Type *</label>
<div class="col-sm-3"><select name="jobtype" class="form-control" >
<option value="0" selected="selected">Choose Job Type</option>
<?php 
$jobtype_query = mysql_query("SELECT * FROM master_jobtype");
while($jobtype_array = mysql_fetch_array($jobtype_query)){
$array_jobtype = $jobtype_array['jobtype'];
 ?>
<option value="<?php echo $array_jobtype; ?>"><?php echo $array_jobtype; ?></option>
<?php } ?>
</select><span class="err_txt"><?php echo $err_jobtype; ?></span></div>
</div>
  <div class=" clr_both form-group ">
<label class="col-sm-1 control-label" style="margin-left:3%;">Expected Salary *</label>
<div class="col-sm-3"><input  type="text" class="form-control"  placeholder="Expected Salary PA *" name="salary" value="<?php echo $_POST['salary'] ?>" /><h5 style="float:left;margin:0px;font-weight:normal;padding:5px">Per Annum</h5><span class="err_txt"><?php echo $err_salary; ?></span></div>

<label class="col-sm-1 control-label" style="margin-left:3%;">Experience *</label>
<div class="col-sm-3"><select name="ex_year" class="form-control" >
<option value="0" selected="selected">Select</option>
<option value="1"<?php if($_POST['ex_year']=='1'){?> 
                 selected="selected" <?php } ?>>1 Year</option>
<option value="2"<?php if($_POST['ex_year']=='2'){?> 
                 selected="selected" <?php } ?>>2 Year</option>
<option value="3"<?php if($_POST['ex_year']=='3'){?> 
                 selected="selected" <?php } ?>>3 Year</option>
<option value="4"<?php if($_POST['ex_year']=='4'){?> 
                 selected="selected" <?php } ?>>4 Year</option>
<option value="5"<?php if($_POST['ex_year']=='5'){?> 
                 selected="selected" <?php } ?>>5 Year</option>
<option value="6"<?php if($_POST['ex_year']=='6'){?> 
                 selected="selected" <?php } ?>>6 Year</option>
<option value="7"<?php if($_POST['ex_year']=='7'){?> 
                 selected="selected" <?php } ?>>7 Year</option>
<option value="8"<?php if($_POST['ex_year']=='8'){?> 
                 selected="selected" <?php } ?>>8 Year</option>
<option value="9"<?php if($_POST['ex_year']=='9'){?> 
                 selected="selected" <?php } ?>>9 Year</option>
<option value="10"<?php if($_POST['ex_year']=='10'){?> 
                 selected="selected" <?php } ?>>10 Year</option>
<option value="11"<?php if($_POST['ex_year']=='11'){?> 
                 selected="selected" <?php } ?>>11 Year</option>
<option value="12"<?php if($_POST['ex_year']=='12'){?> 
                 selected="selected" <?php } ?>>12 Year</option></select><span class="err_txt"><?php echo $err_experience; ?></span></div>
</div>

  <div class=" clr_both form-group ">
<label class="col-sm-1 control-label" style="margin-left:3%;">Resume Title</label>
<div class="col-sm-3"><input type="text" class="form-control"  placeholder="Resume Title" name="resumetitle" value="<?php echo $_POST['resumetitle'] ?>" /><span class="err_txt"></span></div>

<label class="col-sm-1 control-label" style="margin-left:3%;">Upload Resume *</label>
<div class="col-sm-3"><input name="resume" data-filename-placement="inside" class="form-control"  type="file"  id="resume" size="50" /><span class="err_txt"><?php echo $err_upload; ?></span><br/><div style="color:#F00;margin-top:3px;">* .doc .docx .pdf only allowed (max 2 mb)</div></div>
</div>
  <div class=" clr_both form-group">
<label class="col-sm-1 control-label" style="margin-left:3%;"></label>
<div class="col-sm-3"><input type="submit" class="btn btn-lg btn-warning" name="submit"  value="Next Step"/>

<input type="reset" class="btn btn-lg btn-warning" name="reset"  value="Reset"/></div>
</div>
</form>
</div>	
</div>
</div>

<?php include("includes/login_popup.php"); ?>
<?php include "includes/login_popup1.php"; ?>
<?php include("includes/footer.php"); ?>

</body>
</html>
