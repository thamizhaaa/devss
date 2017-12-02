<?php 
error_reporting(0);

include "reg_session.php";

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
		$rand = rand(0,999999);
		if ((($_FILES["resume"]["type"] == "application/msword")
		|| ($_FILES["resume"]["type"] == "application/pdf")
		|| ($_FILES["resume"]["type"] == "application/vnd.openxmlformats-officedocument.wordprocessingml.document"))
		&& ($_FILES["resume"]["size"] < 2000000)
		&& in_array($extension, $allowedExts)) {
		  if ($_FILES["resume"]["error"] > 0) {
			echo "Return Code: " . $_FILES["resume"]["error"] . "<br>";
		  } else {
			 move_uploaded_file($_FILES["resume"]["tmp_name"],
			  "resume/" .$rand. $_FILES["resume"]["name"]);
			$upload_resume =  "resume/" .$rand. $_FILES["resume"]["name"];
		  }
		} else {
		  $err_upload =  "Invalid file";
		}
  		$errors .= $err_aoi.$err_skills.$err_jobtype.$err_salary.$err_experience;
		
		$validation_check = "";
		if(isset($errors))		
		$validation_check .= $errors;
		
		if(!$validation_check){
			
                    $login_query = mysql_query("select seekerid from seeker_profess where seekerid='$session_seekid'");	
                    $login_sq = mysql_num_rows($login_query);
                    if(!$login_sq=='')
                    {
			if($upload_resume != "") {
		
		$seek_query1=mysql_query("UPDATE seeker_profess SET areaofinterest='$aoi',keyskills='$skills',jobtype='$jobtype',esalary = $salary ,experience=$experience ,resumetitle='$resumetitle' ,resumepath='$upload_resume' ,modified_date = NOW() WHERE seekerid='$session_seekid'");
		} else {
		$seek_query1=mysql_query("UPDATE seeker_profess SET areaofinterest='$aoi',keyskills='$skills', jobtype='$jobtype', esalary = $salary ,experience=$experience ,resumetitle='$resumetitle' ,modified_date = NOW() WHERE seekerid='$session_seekid'");				
		}
                }
                else
                {
		$seek_query1 = mysql_query("INSERT INTO seeker_profess(seekerid,areaofinterest,keyskills,jobtype,esalary,experience,resumetitle,resumepath)VALUES('".$session_seekid."','".$aoi."','".$skills."','".$jobtype."','".$salary."','".$experience."','".$resumetitle."','".$upload_resume."')");
                }
?>

	<script>
	window.location = "edit_page.php";
	</script>
<?php		
		
	} else {
		
		$validation_message = $validation_check;
	}
	}
?>
<!DOCTYPE html>
<html >
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Job Portal</title>

<link rel="stylesheet" href="styles/styles_basic.css" type="text/css" />
<link rel="stylesheet" href="styles/bootstrap.css" type="text/css" />


    
<script type="text/javascript" src="js/jquery-1.11.2.js"></script>
<script type="text/javascript" src="js/bootstrap.js"></script>
<script type="text/javascript" src="js/bootstrap-dropdown.js"></script>
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
		$('input[type=file]').bootstrapFileInput();
		$('.file-inputs').bootstrapFileInput();
		
		});
</script>

</head>

<body>

<?php include("includes/header.php"); ?>
<div class="container-fluid white_bg">

<?php include "includes/edit_listmenu.php"; ?>

<div class="col-sm-9" style="margin-top:10px;">
<div class="panel panel-default">
<div class="panel-heading">Edit Job Seekers - Professional</div>
<div class="panel-body">

<form class="form_top_space" action="" method="post" enctype="multipart/form-data" role="form">
  <div class=" clr_both form-group ">
<label class="col-sm-2 control-label" style="margin-left:3%;">Area of Interest <sup class="err_txt_sup">*</sup></label>
<div class="col-sm-3"><input class="form-control" type="text" placeholder="Area of Interest" name="aoi" value="<?php echo $session_aoi ?>" /><span class="help-block"><?php echo $err_aoi; ?></span></div>
<label class="col-sm-1 control-label" style="margin-left:3%;">Job Type <sup class="err_txt_sup">*</sup></label>
<div class="col-sm-3"><select name="jobtype" class="form-control" >
<option value="<?php echo $session_jobtype; ?>" selected="selected"><?php echo $session_jobtype; ?></option>
<option>---------------------------</option>
<?php 
$jobtype_query = mysql_query("SELECT * FROM master_jobtype");
while($jobtype_array = mysql_fetch_array($jobtype_query)){
$array_jobtype = $jobtype_array['jobtype'];
 ?>
<option value="<?php echo $array_jobtype; ?>"><?php echo $array_jobtype; ?></option>
<?php } ?>
</select><span class="help-block"><?php echo $err_jobtype; ?></span></div>


</div>

 <div class=" clr_both form-group ">
 <label class="col-sm-2 control-label" style="margin-left:3%;">Key Skills <sup class="err_txt_sup">*</sup></label>
<div class="col-sm-3"><textarea name="skills" class="form-control"   placeholder="Key Skills" ><?php echo $session_skills; ?></textarea><span class="help-block"><?php echo $err_skills; ?></span></div>
<label class="col-sm-1 control-label" style="margin-left:3%;">Experience <sup class="err_txt_sup">*</sup></label>
<div class="col-sm-3"><select name="ex_year" class="form-control" >

<option value="<?php echo $session_experience; ?>"><?php echo $session_experience; ?></option>
<option>--------------------</option>
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
                 selected="selected" <?php } ?>>12 Year</option></select><span class="help-block"><?php echo $err_experience; ?></span></div>

</div>
  <div class=" clr_both form-group ">
<label class="col-sm-2 control-label" style="margin-left:3%;">Expected Salary <sup class="err_txt_sup">*</sup></label>
<div class="col-sm-3">

<input  type="text" class="form-control"  placeholder="Expected Salary PA *" name="salary" value="<?php echo $session_salary; ?>" />
<span class="help-block"><?php echo $err_salary; ?></span></div>
<label class="col-sm-1 control-label" style="margin-left:3%;">Resume Title</label>
<div class="col-sm-3"><input type="text" class="form-control"  placeholder="Resume Title" name="resumetitle" value="<?php echo $session_resumetitle; ?>" /><span class="help-block"></span></div>

</div>

  <div class=" clr_both form-group ">

<label class="col-sm-2 control-label" style="margin-left:3%;">Upload Resume</label>
<div class="col-sm-3"><input name="resume" data-filename-placement="inside" class="form-control"  type="file"  id="resume" size="50" /><span class="help-block"><?php echo $err_upload; ?></span><br/><div style="color:#F00;margin-top:3px;">* .doc .docx .pdf only allowed (max 2 mb)</div></div>
</div>
  <div class=" clr_both form-group ">
<label class="col-sm-3 control-label" style="margin-left:3%;"></label>
<div class="col-sm-5"><input type="submit" class="btn btn-warning" name="submit"  value="Update Profile"/>

<input type="button" class="btn  btn-warning" onClick="window.location.href='seek_home.php'"  value="Back"/></div>
</div>
</form>
</div>
</div>


</div>

</div>

<?php include("includes/footer.php"); ?>

</body>
</html>
