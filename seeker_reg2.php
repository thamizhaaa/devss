<?php 
error_reporting(0);

include "includes/config.php";

   $id =$_REQUEST['id'];
   
  if($id != "") {
	   
	$form2_id = mysql_query("SELECT * FROM seeker_personal WHERE id = '$id'");
   
    $form2_row = mysql_fetch_array($form2_id); 
	$ID = $form2_row['id'];
	$seekerid = $form2_row['seekerid'];
	$email = $form2_row['mailid'];
	   
  } else {
	   
?>	   
	<script>
	//window.location = "seeker_reg1.php";
	</script>
<?php   } ?>

<?php
	error_reporting(0);
	
	
	if(isset($_POST['submit'])) {
		
				
		$board = $_POST['board'];
		$specialization = $_POST['specialization'];	
		$university = $_POST['university'];
		$yop = $_POST['yop'];
		$percent = $_POST['percent'];
		
		$board1 = $_POST['board1'];
		$specialization1 = $_POST['specialization1'];	
		$university1 = $_POST['university1'];
		$yop1 = $_POST['yop1'];
		$percent1 = $_POST['percent1'];
		
		$board2 = $_POST['board2'];
		$specialization2 = $_POST['specialization2'];	
		$university2 = $_POST['university2'];
		$yop2 = $_POST['yop2'];
		$percent2 = $_POST['percent2'];
		
		$board3 = $_POST['board3'];
		$specialization3 = $_POST['specialization3'];	
		$university3 = $_POST['university3'];
		$yop3 = $_POST['yop3'];
		$percent3 = $_POST['percent3'];
		
		if(($board != "0")) {
					
					if($board == "0")
					$err_board =  "Select Your Board";
					
					/*if($specialization == "")
					$err_special =  "Specialization is mandatory";*/
					
					/*if($university == "")
					$err_university =  "University is mandatory";*/
				if(empty($specialization)) {
				$err_special = "Enter valid Specialization Name";
				} elseif(!preg_match('/^[ A-Za-z.]*$/', $specialization)) {
			    $err_special = "Enter valid Specialization Name";
				}
				if(empty($university)) {
				$err_university = "Enter valid University Name";
				} elseif(!preg_match('/^[ A-Za-z.,-]*$/', $university)) {
			    $err_university = "Enter valid University Name";	
				}
										
				if($yop == "0")
				$err_yop =  "Select Passout Year";
					
				if(empty($percent)) {
   				$err_percent = "Enter valid percentage";
				} else if(!is_numeric($percent)) {
			    $err_percent = "Enter valid percentage";
				}
					
				if(!empty($specialization1)) {
				if(!preg_match('/^[ A-Za-z.]*$/', $specialization1)) 
			    $err_special1 = "Enter valid Specialization Name";
				}
				if(!empty($university1)) {
				if(!preg_match('/^[ A-Za-z.,-]*$/', $university1)) 
			    $err_university1 = "Enter valid University Name";	
				}
										
				
					
				if(!empty($percent1)) {   				
				if(!is_numeric($percent1)) 
			    $err_percent1 = "Enter valid percentage";
				}
				
				if(!empty($specialization2)) {				
				if(!preg_match('/^[ A-Za-z.]*$/', $specialization2))
			    $err_special2 = "Enter valid Specialization Name";
				}
				
				if(!empty($university2)) {				
				if(!preg_match('/^[ A-Za-z.,-]*$/', $university2)) 
			    $err_university2 = "Enter valid University Name";	
				}
										
			
					
				if(!empty($percent2)) {   				
				if(!is_numeric($percent2)) 
			    $err_percent2 = "Enter valid percentage";
				}
				
				if(!empty($specialization3)) {				
				if(!preg_match('/^[ A-Za-z.]*$/', $specialization3)) 
			    $err_special3 = "Enter valid Specialization Name";
				}
				
				if(!empty($university3)) {				
				if(!preg_match('/^[ A-Za-z.,-]*$/', $university3)) 
			    $err_university3 = "Enter valid University Name";	
				}
										
			
					
				if(!empty($percent3)) {   				
				if(!is_numeric($percent3)) 
			    $err_percent3 = "Enter valid percentage";
				}
					

					$errors .= $err_board.$err_special.$err_university.$err_yop.$err_percent.$err_special1.$err_university1.$err_yop1.$err_percent1.$err_special2.$err_university2.$err_yop2.$err_percent2.$err_special3.$err_university3.$err_yop3.$err_percent3;
					
					$validation_check = "";
					if(isset($errors))
					$validation_check .= $errors;
	
					if(!$validation_check) { 		
						
						mysql_query("INSERT INTO seeker_qualify(seekerid,degree,special,university,yearofpass,percent)VALUES('".$seekerid."','".$board."','".$specialization."','".$university."','".$yop."','".$percent."')");
		
		mysql_query("UPDATE seeker_qualify SET qualifyid = CONCAT('QUALIFY',id) ORDER BY id DESC LIMIT 1");

						mysql_query("INSERT INTO seeker_qualify(seekerid,degree,special,university,yearofpass,percent)VALUES('".$seekerid."','".$board1."','".$specialization1."','".$university1."','".$yop1."','".$percent1."')");
		
		mysql_query("UPDATE seeker_qualify SET qualifyid = CONCAT('QUALIFY',id) ORDER BY id DESC LIMIT 1");

						mysql_query("INSERT INTO seeker_qualify(seekerid,degree,special,university,yearofpass,percent)VALUES('".$seekerid."','".$board2."','".$specialization2."','".$university2."','".$yop2."','".$percent2."')");
		
		mysql_query("UPDATE seeker_qualify SET qualifyid = CONCAT('QUALIFY',id) ORDER BY id DESC LIMIT 1");

						mysql_query("INSERT INTO seeker_qualify(seekerid,degree,special,university,yearofpass,percent)VALUES('".$seekerid."','".$board3."','".$specialization3."','".$university3."','".$yop3."','".$percent3."')");
		
		mysql_query("UPDATE seeker_qualify SET qualifyid = CONCAT('QUALIFY',id) ORDER BY id DESC LIMIT 1");
						
					
		
								
		
?>
<script>
window.location = "seeker_reg3.php?id=<?php echo $ID; ?>";
</script>
<?php			
	
		}
		} else {
			
			$err_invalid = "First Field is mandatory";
			
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

<script type="text/javascript" src="js/jquery-1.11.2.js"></script>
<script type="text/javascript" src="js/bootstrap.js"></script>
<script type="text/javascript" src="js/bootstrap-dropdown.js"></script>
<script type="text/javascript" src="js/jquery.leanModal.min.js"></script>
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
		});
</script>
</head>

<body>

<?php include("includes/header.php"); ?>




<div class="container-fluid white_bg">

<div class="panel panel-default">

<div class="panel-heading"><h3 class="panel-title">Job Seekers Registration - Qualification</h3></div>
<div class="panel-body" >

 
  <div class="form-group">
 
  <img src="images/seeker_reg_3.jpg" class="img-responsive" />
  </div>


<form class="form_top_space" action="" method="post" enctype="multipart/form-data" role="form">

<div class="form-group top_space">
<b><div class="col-sm-2">Board *</div>
<div class="col-sm-2">Specialization *</div>
<div class="col-sm-2">University Name *</div>
<div class="col-sm-2">Year of Passing *</div>
<div class="col-sm-2">Percentage *</div></b>
</div>
<br />
<br />

<div class="form-group clr_both">
<div class="col-sm-2"><select name="board" class="form-control">
<option value="0" selected="selected">Select</option>
<option value="10th" <?php if($_POST['board']=='10th'){?> 
                 selected="selected" <?php } ?>>10th Board</option>
<option value="HSC" <?php if($_POST['board']=='HSC'){?> 
                 selected="selected" <?php } ?>>HSC</option>
<option value="Bachelor" <?php if($_POST['board']=='Bachelor'){?> 
                 selected="selected" <?php } ?> >Bachelor</option>
<option value="Master" <?php if($_POST['board']=='Master'){?> 
                 selected="selected" <?php } ?>>Master</option></select>
                 
                 <div class="help-block err_txt"><?php echo $err_board; ?><?php echo $err_invalid; ?></div>
                 </div>
<div class="col-sm-2"><input type="text"  name="specialization" placeholder="Specialization *" value="<?php echo $_POST['specialization']; ?>" class="form-control">                 <div class="help-block err_txt"><?php echo $err_special; ?></div></div>
<div class="col-sm-2"><input type="text" class="form-control" name="university" placeholder="University Name *" value="<?php echo $_POST['university']; ?>">                 <div class="help-block err_txt"><?php echo $err_university; ?></div></div>
<div class="col-sm-1"><select name="yop" class="form-control">
<option value="0">Year</option>
               
<?php 

$years = range(date("Y"), date("Y", strtotime("now - 23 years"))); 
foreach($years as $year){
	?> 
    <option value="<?php echo $year ?>"><?php echo $year;?></option> 
    <?php
} 
?> 
</select>
  <div class="help-block err_txt"><?php echo $err_yop; ?></div>
</div>


<div class="col-sm-2"><input type="text"  name="percent" class="form-control" placeholder="Percentage *" value="<?php echo $_POST['percent']; ?>">
<div class="help-block err_txt"><?php echo $err_percent; ?></div></div>
</div>

<div class="form-group  clr_both top_space">
<div class="col-sm-2"><select name="board1" class="form-control">
<option value="0" selected="selected">Select</option>
<option value="HSC" <?php if($_POST['board1']=='HSC'){?> 
                 selected="selected" <?php } ?>>HSC</option>
<option value="Bachelor" <?php if($_POST['board1']=='Bachelor'){?> 
                 selected="selected" <?php } ?> >Bachelor</option>
<option value="Master" <?php if($_POST['board1']=='Master'){?> 
                 selected="selected" <?php } ?>>Master</option></select></div>
<div class="col-sm-2"><input type="text" class="form-control" name="specialization1" placeholder="Specialization *" value="<?php echo $_POST['specialization1']; ?>"><div class="help-block err_txt"><?php echo $err_special1; ?></div></div>
<div class="col-sm-2"><input type="text" class="form-control" name="university1" placeholder="University Name *" value="<?php echo $_POST['university1']; ?>">
<div class="help-block err_txt"><?php echo $err_university1; ?></div>

</div>
<div class="col-sm-1"><select name="yop1" class="form-control">
<option value="0">Year</option>
<?php 
$years1 = range(date("Y"), date("Y", strtotime("now - 23 years"))); 
foreach($years1 as $yop1){
	?> 
    <option value="<?php echo $yop1 ?>"><?php echo $yop1;?></option> 
    <?php
} 
?> 
</select>
<div class="help-block err_txt"><?php echo $err_yop1; ?></div>
</div>
<div class="col-sm-2"><input type="text" class="form-control" name="percent1" placeholder="Percentage *" value="<?php echo $_POST['percent1']; ?>"><div class="help-block err_txt"><?php echo $err_percent1; ?></div></div>
</div>

<div class="form-group">
<div class="col-sm-2"><select name="board2" class="form-control">
<option value="0" selected="selected">Select</option>
<option value="bachelor">Bachelor</option>
<option value="master">Master</option></select></div>
<div class="col-sm-2"><input type="text" class="form-control"  name="specialization2" placeholder="Specialization *" value="<?php echo $_POST['specialization2']; ?>"><div class="help-block err_txt"><?php echo $err_special2; ?></div></div>
<div class="col-sm-2"><input type="text" class="form-control" name="university2" placeholder="University Name *" value="<?php echo $_POST['university2']; ?>"><div class="help-block err_txt"><?php echo $err_university2; ?></div></div>
<div class="col-sm-1"><select name="yop2" class="form-control">
<option value="0">Year</option>
<?php 
$years2 = range(date("Y"), date("Y", strtotime("now - 23 years"))); 
foreach($years2 as $yop2){
	?> 
    <option value="<?php echo $yop2 ?>"><?php echo $yop2;?></option> 
    <?php
} 
?> 
</select><div class="help-block err_txt"></div></div>
<div class="col-sm-2"><input type="text" class="form-control" name="percent2" placeholder="Percentage *" value="<?php echo $_POST['percent2']; ?>"><div class="help-block err_txt"><?php echo $err_percent2; ?></div></div>
</div>

<div class="form-group">
<div class="col-sm-2"><select name="board3" class="form-control">
<option value="0" selected="selected">Select</option>
<option value="master">Master</option></select></div>
<div class="col-sm-2"><input type="text" class="form-control" name="specialization3" placeholder="Specialization *" value="<?php echo $_POST['specialization3']; ?>"><div class="help-block err_txt"><?php echo $err_special3; ?></div></div>
<div class="col-sm-2"><input type="text" class="form-control" name="university3" placeholder="University Name *" value="<?php echo $_POST['university3']; ?>"><div class="help-block err_txt"><?php echo $err_university3; ?></div></div>
<div class="col-sm-1"><select name="yop3" class="form-control">
<option value="0">Year</option>
<?php 
$years3 = range(date("Y"), date("Y", strtotime("now  - 23 years"))); 
foreach($years3 as $yop3){
	?> 
    <option value="<?php echo $yop3 ?>"><?php echo $yop3;?></option> 
    <?php
} 
?> 
</select></div>
<div class="col-sm-2"><input type="text" class="form-control" name="percent3" placeholder="Percentage *" value="<?php echo $_POST['percent3']; ?>"><div class="help-block err_txt"><?php echo $err_percent3; ?></div></div>
</div>


<div class="form-group clr_both top_space" >
<label class="col-sm-1 control-label"></label>
<div class="col-sm-6" >
<input class="btn btn-warning" type="submit" name="submit" value="Next Step"/>
<a href="seeker_reg3.php?id=<?php echo $ID; ?>" style="margin-left:3%" class="btn btn-warning"><strong>Skip & Continue</strong></a>

</div>
</div>


</form>

</div>
</div>

</div>
<?php include("includes/footer.php"); ?>
<?php include "includes/login_popup.php"; ?>


</body>
</html>
