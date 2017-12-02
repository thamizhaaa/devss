<?php 


error_reporting(0);

include "reg_session.php";

        $array1 = array();		
        $ins_query = mysql_query("SELECT qualifyid FROM seeker_qualify WHERE seekerid='$session_seekid'");
        while($arr_query = mysql_fetch_assoc($ins_query)){		
        $array1[] = $arr_query;
        }
		
	$qualify1 = $array1[0]['qualifyid'];
	$qualify2 = $array1[1]['qualifyid']; 
	$qualify3 = $array1[2]['qualifyid']; 
	$qualify4 = $array1[3]['qualifyid'];

   $id =$_REQUEST['seekid'];
   
  if($id != "") {
	   
	$form2_id = mysql_query("SELECT * FROM seeker_qualify WHERE seekerid = '$id'");
   
    $form2_row = mysql_fetch_array($form2_id); 
	$ID = $form2_row['id'];
	$seekerid = $form2_row['seekerid']; 
	   
  } else {
	   
?>	   
	<script>
	//window.location = "seeker_reg1.php";
	</script>
<?php   } ?>

<?php
	
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
		
		if(($board != "0") || ($board1 == "0") || ($board2 == "0") || ($board3 == "0")) {
					
					if($board == "0")
					$err_board =  "Select Your Board";
					
					if($specialization == "")
					$err_special =  "Specialization is mandatory";
					
					if($university == "")
					$err_university =  "University is mandatory";
					
					if($yop == "0")
					$err_yop =  "Select Passout Year";
					
					if(!preg_match('/^[-+]?([0-9]*\.[0-9]+|[0-9]+)$/',$percent))
					$err_percent = "Education Percentage Must";
					
			/*if(($board != "0") && ($board1 != "0") && ($board2 == "0") && ($board3 == "0")) 
					
					if($board1 == "0")
					$err_board1 =  "Select Your Board";
					
					if($specialization1 == "")
					$err_special1 =  "Specialization is mandatory";
					
					if($university1 == "")
					$err_university1 =  "University is mandatory";
					
					if($yop1 == "0")
					$err_yop1 =  "Select Passout Year";
					
					if(!preg_match('/^[-+]?([0-9]*\.[0-9]+|[0-9]+)$/',$percent1))
					$err_percent1 = "Education Percentage Must";*/
					

							
					$errors .= $err_board.$err_special.$err_university.$err_yop.$err_percent;
					
					
					
					$validation_check = "";
					if(isset($errors))
					$validation_check .= $errors;
					
					
	
					if(!$validation_check) {
						 		
						$myquery = mysql_query("SELECT * FROM seeker_qualify WHERE seekerid ='$session_seekid'");					
						$myqueryrow = mysql_num_rows($myquery);
						
						if($myqueryrow > 0) {
							
							mysql_query("UPDATE seeker_qualify SET degree='$board' ,special='$specialization', university='$university', yearofpass='$yop' ,percent='$percent' ,modified_date=NOW() WHERE qualifyid='$qualify1'");
							mysql_query("UPDATE seeker_qualify SET degree='$board1' ,special='$specialization1', university='$university1', yearofpass='$yop1' ,percent='$percent1' ,modified_date=NOW() WHERE qualifyid='$qualify2'");
							mysql_query("UPDATE seeker_qualify SET degree='$board2' ,special='$specialization2', university='$university2', yearofpass='$yop2' ,percent='$percent2' ,modified_date=NOW() WHERE qualifyid='$qualify3'");
							mysql_query("UPDATE seeker_qualify SET degree='$board3' ,special='$specialization3', university='$university3', yearofpass='$yop3' ,percent='$percent3' ,modified_date=NOW() WHERE qualifyid='$qualify4'");
														
						} else {
//echo "INSERT INTO seeker_qualify(seekerid,degree,special,university,yearofpass,percent)VALUES('".$session_seekid."','".$board."','".$specialization."','".$university."','".$yop."','".$percent."')";
mysql_query("INSERT INTO seeker_qualify(seekerid,degree,special,university,yearofpass,percent)VALUES('".$session_seekid."','".$board."','".$specialization."','".$university."','".$yop."','".$percent."')");

mysql_query("UPDATE seeker_qualify SET qualifyid = CONCAT('QUALIFY',id) ORDER BY id DESC LIMIT 1");

mysql_query("INSERT INTO seeker_qualify(seekerid,degree,special,university,yearofpass,percent)VALUES('".$session_seekid."','".$board1."','".$specialization1."','".$university1."','".$yop1."','".$percent1."')");

mysql_query("UPDATE seeker_qualify SET qualifyid = CONCAT('QUALIFY',id) ORDER BY id DESC LIMIT 1");

mysql_query("INSERT INTO seeker_qualify(seekerid,degree,special,university,yearofpass,percent)VALUES('".$session_seekid."','".$board2."','".$specialization2."','".$university2."','".$yop2."','".$percent2."')");

mysql_query("UPDATE seeker_qualify SET qualifyid = CONCAT('QUALIFY',id) ORDER BY id DESC LIMIT 1");

mysql_query("INSERT INTO seeker_qualify(seekerid,degree,special,university,yearofpass,percent)VALUES('".$session_seekid."','".$board3."','".$specialization3."','".$university3."','".$yop3."','".$percent3."')");

mysql_query("UPDATE seeker_qualify SET qualifyid = CONCAT('QUALIFY',id) ORDER BY id DESC LIMIT 1");

}						
?>
<script>
window.location = "edit_page.php";
</script>
<?php			
	
		}
		} else {
			
			$err_invalid = "First Field is mandatory";
			
	} 
	}
 ?>
<!DOCTYPE html>
<html>
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
<script type="text/javascript" src="js/jquery-1.10.2.min.js"></script>        
<script type="text/javascript" src="js/bootstrap.js"></script>
<script type="text/javascript" src="js/bootstrap-dropdown.js"></script>

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
		});
</script>
  <script type="text/javascript" src="js/zebra_datepicker.src.js"></script>

  <script>
  $(document).ready(function() {
    $('#datepicker').Zebra_DatePicker({
  view: 'years'
});
}); 
  </script>
</head>

<body>
<div class="container-fluid white_bg">
<?php include("includes/header.php"); ?>




<div class="row">
<?php include "includes/edit_listmenu.php"; ?>

<div class="col-sm-9" style="margin-top:10px;">
<div class="panel panel-default">
<div class="panel-heading"><h3 class="panel-title">Edit Profile - Qualification</h3></div>
<div class="panel-body">
<form class="" action="" method="post" enctype="multipart/form-data" role="form">

<div class="form-group">
<b><div class="col-sm-2">Board *</div>
<div class="col-sm-2">Specialization *</div>
<div class="col-sm-2">University Name *</div>
<div class="col-sm-2">Year of Passing *</div>
<div class="col-sm-2">Percentage *</div></b>
</div>
<br />
<br />

<?php
$seekeriddss = mysql_query("SELECT * FROM seeker_qualify WHERE seekerid = '$session_seekid'");
$seekeriddss123 = mysql_fetch_array($seekeriddss); 
$sidd = $seekeriddss123['id'];
$qualifyid = $seekeriddss123['qualifyid']; 
$degree = $seekeriddss123['degree'];
$special = $seekeriddss123['special']; 
$university = $seekeriddss123['university'];
$yearofpass = $seekeriddss123['yearofpass']; 
$percent= $seekeriddss123['percent'];
?>
<div class="form-group clr_both">
<div class="col-sm-2"><select name="board" class="form-control">
<option value="0" selected="selected">Select</option>
<option value="10th" <?php if($degree=='10th'){?> 
                 selected="selected" <?php } ?>>10th Board</option>
<option value="HSC" <?php if($degree=='HSC'){?> 
                 selected="selected" <?php } ?>>HSC</option>
<option value="Bachelor" <?php if($degree=='Bachelor'){?> 
                 selected="selected" <?php } ?> >Bachelor</option>
<option value="Master" <?php if($degree=='Master'){?> 
                 selected="selected" <?php } ?>>Master</option></select>
                 
                 <div class="help-block err_txt"><?php echo $err_board; ?><?php echo $err_invalid; ?></div>
                 </div>
<div class="col-sm-2"><input type="text"  name="specialization" placeholder="Specialization *" value="<?php echo $special; ?>" class="form-control">                 <div class="help-block err_txt"><?php echo $err_special; ?></div></div>
<div class="col-sm-2"><input type="text" class="form-control" name="university" placeholder="University Name *" value="<?php echo $university; ?>">                 <div class="help-block err_txt"><?php echo $err_university; ?></div></div>
<div class="col-sm-1"><select name="yop" class="form-control">
<option value="0">Select Year</option>
               
<?php 

$years = range(date("Y"), date("Y", strtotime("now - 23 years"))); 
foreach($years as $year){
	?> 
    <option value="<?php echo $year ?>" <?php if($yearofpass==$year){echo "selected=selected";}?>><?php echo $year;?></option> 
    <?php
} 
?> 
</select>
  <div class="help-block err_txt"><?php echo $err_yop; ?></div>
</div>


<div class="col-sm-2"><input type="text"  name="percent" class="form-control" placeholder="Percentage *" value="<?php echo $percent; ?>">
<div class="help-block err_txt"><?php echo $err_percent; ?></div></div>
</div>


<?php

    $test = $qualifyid;    
    $newstring = str_replace("QUALIFY", "", $test);
    //print $newstring;
    $test1 = $newstring + 1;
    $newstring11 = str_replace("$test", "QUALIFY$test1", $test);

//echo "SELECT * FROM seeker_qualify WHERE seekerid = '$session_seekid' and qualifyid=$newstring11";
$seekeriddssq1 = mysql_query("SELECT * FROM seeker_qualify WHERE seekerid = '$session_seekid' and qualifyid='$newstring11'");
$seekeriddssq123 = mysql_fetch_array($seekeriddssq1); 
$sidd = $seekeriddssq123['id'];
$qualifyid1 = $seekeriddssq123['qualifyid']; 
$degree1 = $seekeriddssq123['degree'];
$special1 = $seekeriddssq123['special']; 
$university1 = $seekeriddssq123['university'];
$yearofpass1 = $seekeriddssq123['yearofpass']; 
$percent1= $seekeriddssq123['percent'];
?>



<div class="form-group  clr_both top_space">
<div class="col-sm-2"><select name="board1" class="form-control">
<option value="0" selected="selected">Select</option>
<option value="HSC" <?php if($degree1=='HSC'){?> 
                 selected="selected" <?php } ?>>HSC</option>
<option value="Bachelor" <?php if($degree1=='Bachelor'){?> 
                 selected="selected" <?php } ?> >Bachelor</option>
<option value="Master" <?php if($degree1=='Master'){?> 
                 selected="selected" <?php } ?>>Master</option></select><?php echo $err_board1; ?></div>
<div class="col-sm-2"><input type="text" class="form-control" name="specialization1" placeholder="Specialization *" value="<?php echo $special1; ?>"><?php echo $err_special1; ?></div>
<div class="col-sm-2"><input type="text" class="form-control" name="university1" placeholder="University Name *" value="<?php echo $university1; ?>">
<div class="help-block err_txt"><?php echo $err_university1; ?></div>

</div>
<div class="col-sm-1"><select name="yop1" class="form-control">
<option value="0">Select Year</option>
<?php 
$years1 = range(date("Y"), date("Y", strtotime("now - 23 years"))); 
foreach($years1 as $yop1){
	?> 
    <option value="<?php echo $yop1 ?>" <?php if($yearofpass1==$yop1){echo "selected=selected";}?>><?php echo $yop1;?></option> 
    <?php
} 
?> 
</select>
<div class="help-block err_txt"><?php echo $err_yop1; ?></div>
</div>
<div class="col-sm-2"><input type="text" class="form-control" name="percent1" placeholder="Percentage *" value="<?php echo $percent1; ?>"><div class="help-block err_txt"><?php echo $err_percent1; ?></div></div>
</div>

<?php
    $test = $qualifyid;    
    $newstring = str_replace("QUALIFY", "", $test);
    //print $newstring;
    $test1 = $newstring + 2;
    $newstring11 = str_replace("$test", "QUALIFY$test1", $test);

//echo "SELECT * FROM seeker_qualify WHERE seekerid = '$session_seekid' and qualifyid=$newstring11";
$seekeriddssq2 = mysql_query("SELECT * FROM seeker_qualify WHERE seekerid = '$session_seekid' and qualifyid='$newstring11'");
$seekeriddssq234 = mysql_fetch_array($seekeriddssq2); 
$sidd = $seekeriddssq234['id'];
$qualifyid2 = $seekeriddssq234['qualifyid']; 
$degree2 = $seekeriddssq234['degree'];
$special2 = $seekeriddssq234['special']; 
$university2 = $seekeriddssq234['university'];
$yearofpass2 = $seekeriddssq234['yearofpass']; 
$percent2 = $seekeriddssq234['percent'];
?>

<div class="form-group  clr_both top_space">
<div class="col-sm-2"><select name="board2" class="form-control">
<option value="0" selected="selected">Select</option>
<option value="HSC" <?php if($degree2=='HSC'){?> 
                 selected="selected" <?php } ?>>HSC</option>
<option value="Bachelor" <?php if($degree2=='Bachelor'){?> 
                 selected="selected" <?php } ?> >Bachelor</option>
<option value="Master" <?php if($degree2=='Master'){?> 
                 selected="selected" <?php } ?>>Master</option></select><?php echo $err_board2; ?></div>
<div class="col-sm-2"><input type="text" class="form-control" name="specialization2" placeholder="Specialization *" value="<?php echo $special2; ?>"><?php echo $err_special2; ?></div>
<div class="col-sm-2"><input type="text" class="form-control" name="university2" placeholder="University Name *" value="<?php echo $university2; ?>">
<div class="help-block err_txt"><?php echo $err_university2; ?></div>

</div>
<div class="col-sm-1"><select name="yop2" class="form-control">
<option value="0">Select Year</option>
<?php 
$years2 = range(date("Y"), date("Y", strtotime("now - 23 years"))); 
foreach($years2 as $yop2){
	?> 
    <option value="<?php echo $yop2 ?>" <?php if($yearofpass2==$yop2){echo "selected=selected";}?>><?php echo $yop2;?></option> 
    <?php
} 
?> 
</select>
<div class="help-block err_txt"><?php echo $err_yop1; ?></div>
</div>
<div class="col-sm-2"><input type="text" class="form-control" name="percent2" placeholder="Percentage *" value="<?php echo $percent2; ?>"><div class="help-block err_txt"><?php echo $err_percent2; ?></div></div>
</div>

<?php
/*
<div class="form-group">
<div class="col-sm-2"><select name="board2" class="form-control">
<option value="0" selected="selected">Select</option>
<option value="bachelor">Bachelor</option>
<option value="master">Master</option></select></div>
<div class="col-sm-2"><input type="text" class="form-control"  name="specialization2" placeholder="Specialization *" value="<?php echo $_POST['specialization2']; ?>"><div class="help-block err_txt"></div></div>
<div class="col-sm-2"><input type="text" class="form-control" name="university2" placeholder="University Name *" value="<?php echo $_POST['university2']; ?>"><div class="help-block err_txt"></div></div>
<div class="col-sm-1"><select name="yop2" class="form-control">
<option value="0">Select Year</option>
<?php 
$years2 = range(date("Y"), date("Y", strtotime("now - 23 years"))); 
foreach($years2 as $yop2){
	?> 
    <option value="<?php echo $yop2 ?>"><?php echo $yop2;?></option> 
    <?php
} 
?> 
</select><div class="help-block err_txt"></div></div>
<div class="col-sm-2"><input type="text" class="form-control" name="percent2" placeholder="Percentage *" value="<?php echo $_POST['percent2']; ?>"><div class="help-block err_txt"></div></div>
</div>
*/ ?>


<?php
    $test = $qualifyid;    
    $newstring = str_replace("QUALIFY", "", $test);
    //print $newstring;
    $test1 = $newstring + 3;
    $newstring11 = str_replace("$test", "QUALIFY$test1", $test);

//echo "SELECT * FROM seeker_qualify WHERE seekerid = '$session_seekid' and qualifyid=$newstring11";
$seekeriddssq3 = mysql_query("SELECT * FROM seeker_qualify WHERE seekerid = '$session_seekid' and qualifyid='$newstring11'");
$seekeriddssq345 = mysql_fetch_array($seekeriddssq3); 
$sidd = $seekeriddssq345['id'];
$qualifyid3 = $seekeriddssq345['qualifyid']; 
$degree3 = $seekeriddssq345['degree'];
$special3 = $seekeriddssq345['special']; 
$university3 = $seekeriddssq345['university'];
$yearofpass3 = $seekeriddssq345['yearofpass']; 
$percent3 = $seekeriddssq345['percent'];
?>

<div class="form-group  clr_both top_space">
<div class="col-sm-2"><select name="board3" class="form-control">
<option value="0" selected="selected">Select</option>
<option value="HSC" <?php if($degree3=='HSC'){?> 
                 selected="selected" <?php } ?>>HSC</option>
<option value="Bachelor" <?php if($degree3=='Bachelor'){?> 
                 selected="selected" <?php } ?> >Bachelor</option>
<option value="Master" <?php if($degree3=='Master'){?> 
                 selected="selected" <?php } ?>>Master</option></select><?php echo $err_board3; ?></div>
<div class="col-sm-2"><input type="text" class="form-control" name="specialization3" placeholder="Specialization *" value="<?php echo $special3; ?>"><?php echo $err_special3; ?></div>
<div class="col-sm-2"><input type="text" class="form-control" name="university3" placeholder="University Name *" value="<?php echo $university3; ?>">
<div class="help-block err_txt"><?php echo $err_university3; ?></div>

</div>
<div class="col-sm-1"><select name="yop3" class="form-control">
<option value="0">Select Year</option>
<?php 
$years3 = range(date("Y"), date("Y", strtotime("now - 23 years"))); 
foreach($years3 as $yop3){
	?> 
    <option value="<?php echo $yop3 ?>" <?php if($yearofpass3==$yop3){echo "selected=selected";}?>><?php echo $yop3;?></option> 
    <?php
} 
?> 
</select>
<div class="help-block err_txt"><?php echo $err_yop1; ?></div>
</div>
<div class="col-sm-2"><input type="text" class="form-control" name="percent3" placeholder="Percentage *" value="<?php echo $percent3; ?>"><div class="help-block err_txt"><?php echo $err_percent3; ?></div></div>
</div>


<?php
/*
<div class="form-group">
<div class="col-sm-2"><select name="board3" class="form-control">
<option value="0" selected="selected">Select</option>
<option value="master">Master</option></select></div>
<div class="col-sm-2"><input type="text" class="form-control" name="specialization3" placeholder="Specialization *" value="<?php echo $_POST['specialization3']; ?>"></div>
<div class="col-sm-2"><input type="text" class="form-control" name="university3" placeholder="University Name *" value="<?php echo $_POST['university3']; ?>"></div>
<div class="col-sm-1"><select name="yop3" class="form-control">
<option value="0">Select Year</option>
<?php 
$years3 = range(date("Y"), date("Y", strtotime("now  - 23 years"))); 
foreach($years3 as $yop3){
	?> 
    <option value="<?php echo $yop3 ?>"><?php echo $yop3;?></option> 
    <?php
} 
?> 
</select></div>
<div class="col-sm-2"><input type="text" class="form-control" name="percent3" placeholder="Percentage *" value="<?php echo $_POST['percent3']; ?>"></div>
</div>
 
 */
?>

<div class="form-group" style="padding-top:15%">

<div class="col-sm-4 col-xs-offset-4">
<input class="btn btn-warning" type="submit" name="submit" value="Update"/>
<input class="btn btn-warning" type="button" onClick="window.location.href='seek_home.php'" value="Back" style="margin-left:3%;"/>
</div>
</div>


</form>
</div>
</div>




</div>
</div>
</div>


<div class="container-fluid">
<?php include("includes/footer.php"); ?>
</div>
</body>
</html>
