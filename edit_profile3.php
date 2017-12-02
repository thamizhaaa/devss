<?php 	

error_reporting(0);
include "reg_session.php";

        $array1 = array();		
        $ins_query = mysql_query("SELECT expid FROM seeker_experience WHERE seekerid='$session_seekid'");
        while($arr_query = mysql_fetch_assoc($ins_query))
        {		
        $array1[] = $arr_query;
        }		
	$expid1 = $array1[0]['expid'];
	$expid2 = $array1[1]['expid']; 
	$expid3 = $array1[2]['expid']; 
	$expid4 = $array1[3]['expid'];
        $id =$_REQUEST['seekid'];
   
   if($id != "") {
	   
	$form2_id = mysql_query("SELECT * FROM seeker_experience WHERE seekerid = '$id'");
   
    $form2_row = mysql_fetch_array($form2_id); 
	$ID = $form2_row['id'];
	$seekerid = $form2_row['seekerid'];

   } else {
?>	   
	<script>
	//window.location = "seeker_reg2.php";
	</script>
<?php } ?>
	
	
    <?php
		
		if(isset($_POST['submit'])) {
		
			$company = $_POST['company'];
			$designation = $_POST['designation'];
			$fromdate = $_POST['fromdate'];
			$todate = $_POST['todate'];
			
			$company1 = $_POST['company1'];
			$designation1 = $_POST['designation1'];
			$fromdate1 = $_POST['fromdate1'];
			$todate1 = $_POST['todate1'];
			
			$company2 = $_POST['company2'];
			$designation2 = $_POST['designation2'];
			$fromdate2 = $_POST['fromdate2'];
			$todate2 = $_POST['todate2'];
			
			$company3 = $_POST['company3'];
			$designation3 = $_POST['designation3'];
			$fromdate3 = $_POST['fromdate3'];
			$todate3 = $_POST['todate3'];
			
			if(($company != "") || ($company1 == "") || ($company2 == "") || ($company3 == "")) {
				
				if($company == "")
				$err_company = "Company Name is mandatory";

				if($designation == "")
				$err_designation = "Designation is mandatory";
				
				if($fromdate == "")
				$err_fromdate = "From Date is mandatory";

				if($todate == "")
				$err_todate = "To Date is mandatory";
				
				$errors .= $err_company.$err_designation.$err_fromdate.$err_todate;
				
				$validation_check = "";
				if(isset($errors))
				$validation_check .= $errors;
					
				if(!$validation_check) {
					
					$ins_query = mysql_query("SELECT * FROM seeker_experience WHERE seekerid='$session_seekid'");
					$con_query = mysql_num_rows($ins_query);
					
					if($con_query > 0) { 
					
						mysql_query("UPDATE seeker_experience SET companyname='$company',designation='$designation',fromdate='$fromdate',todate='$todate' ,modified_date=NOW() WHERE expid='$expid1'");
						mysql_query("UPDATE seeker_experience SET companyname='$company1',designation='$designation1',fromdate='$fromdate1',todate='$todate1' ,modified_date=NOW() WHERE expid='$expid2'");
						mysql_query("UPDATE seeker_experience SET companyname='$company2',designation='$designation2',fromdate='$fromdate2',todate='$todate2' ,modified_date=NOW() WHERE expid='$expid3'");
						mysql_query("UPDATE seeker_experience SET companyname='$company3',designation='$designation3',fromdate='$fromdate3',todate='$todate3' ,modified_date=NOW() WHERE expid='$expid4'");
					
					
					} else {
						
						mysql_query("INSERT INTO seeker_experience(seekerid,companyname,designation,fromdate,todate)VALUES('".$id."','".$company."','".$designation."','".$fromdate."','".$todate."')");
			
			mysql_query("UPDATE seeker_experience SET expid = CONCAT('EXP',id) ORDER BY id DESC LIMIT 1");

						mysql_query("INSERT INTO seeker_experience(seekerid,companyname,designation,fromdate,todate)VALUES('".$id."','".$company1."','".$designation1."','".$fromdate1."','".$todate1."')");
			
			mysql_query("UPDATE seeker_experience SET expid = CONCAT('EXP',id) ORDER BY id DESC LIMIT 1");

						mysql_query("INSERT INTO seeker_experience(seekerid,companyname,designation,fromdate,todate)VALUES('".$id."','".$company2."','".$designation2."','".$fromdate2."','".$todate2."')");
			
			mysql_query("UPDATE seeker_experience SET expid = CONCAT('EXP',id) ORDER BY id DESC LIMIT 1");

						mysql_query("INSERT INTO seeker_experience(seekerid,companyname,designation,fromdate,todate)VALUES('".$id."','".$company3."','".$designation3."','".$fromdate3."','".$todate3."')");
			
			mysql_query("UPDATE seeker_experience SET expid = CONCAT('EXP',id) ORDER BY id DESC LIMIT 1");
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
<link rel="stylesheet" type="text/css" href="styles/datepicker.css">
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
	<script type="text/javascript" src="js/bootstrap-datepicker.js"></script>
	

  <script>
  $(document).ready(function() {
	   $("#fromdate, #fromdate1, #fromdate2, #fromdate3, #todate, #todate1, #todate2, #todate3").datepicker(
    {
     format: 'dd/mm/yyyy'
	});
}); 
</script>
</head>

<body>
<div class="container-fluid white_bg">
<?php 
	 include("includes/header.php"); ?>

<div class="row">
<?php include "includes/edit_listmenu.php"; ?>

<div class="col-sm-9" style="margin-top:10px;">
<div class="panel panel-default">
<div class="panel-heading"><h3 class="panel-title">Edit Profile - Experience</h3></div>
<div class="panel-body">

<form class="form_top_space" action="" method="post" enctype="multipart/form-data">

<div class="form-group">
<div class="col-sm-2"><b>Company Name</b></div>
<div class="col-sm-2"><b>Designation</b></div>
<div class="col-sm-2"><b>From Date</b></div>
<div class="col-sm-2"><b>To Date</b></div>
</div><br />
<br />

<?php
    $seekerexpr = mysql_query("SELECT * FROM seeker_experience WHERE seekerid = '$id'");   
    $seekerexpres = mysql_fetch_array($seekerexpr); 
    $ID = $seekerexpres['id'];
    $seekerexprid = $seekerexpres['expid'];
    $seekercompname = $seekerexpres['companyname'];
    $seekerdesg = $seekerexpres['designation'];
    $seekerexprfrmdt = $seekerexpres['fromdate'];
    $seekerexprtodt = $seekerexpres['todate'];
?>

<div class="form-group clr_both">
<div class="col-sm-2"><input type="text"  name="company" placeholder="Company Name *" class="form-control" value="<?php echo $seekercompname; ?>"><div class="help-block err_txt"><?php echo $err_company; echo $err_invalid; ?></div></div>
<div class="col-sm-2"><input type="text"  name="designation" placeholder="Designation *" value="<?php echo $seekerdesg; ?>" class="form-control"><div class="help-block err_txt"><?php echo $err_designation; ?></div></div>
<div class="col-sm-2"><input type="text"  name="fromdate" id="fromdate" readonly placeholder="From Date *" value="<?php echo $seekerexprfrmdt; ?>" class="form-control"><div class="help-block err_txt"><?php echo $err_fromdate; ?></div></div>
<div class="col-sm-2"><input type="text"  name="todate" id="todate" readonly placeholder="To Date *" value="<?php echo $seekerexprtodt; ?>" class="form-control"><div class="help-block err_txt"><?php echo $err_todate; ?></div></div>
</div>

<?php
    $test = $seekerexprid;    
    $newstring = str_replace("EXP", "", $test);
    //print $newstring;
    $test1 = $newstring + 1;
    $newstring1 = str_replace("$test", "EXP$test1", $test);
    //$seekerexprid;
    $seekerexpr1 = mysql_query("SELECT * FROM seeker_experience WHERE seekerid = '$id' and expid='$newstring1'");   
    $seekerexpres1 = mysql_fetch_array($seekerexpr1); 
    $ID1 = $seekerexpres1['id'];
    $seekerexprid1 = $seekerexpres1['expid'];
    $seekercompname1 = $seekerexpres1['companyname'];
    $seekerdesg1 = $seekerexpres1['designation'];
    $seekerexprfrmdt1 = $seekerexpres1['fromdate'];
    $seekerexprtodt1 = $seekerexpres1['todate'];
?>



<div class="form-group clr_both">
<div class="col-sm-2"><input type="text"  class="form-control" name="company1" placeholder="Company Name *" value="<?php echo $seekercompname1; ?>"><div class="help-block err_txt"></div></div>
<div class="col-sm-2"><input type="text" class="form-control"  name="designation1" placeholder="Designation *" value="<?php echo $seekerdesg1; ?>"><div class="help-block err_txt"></div></div>
<div class="col-sm-2"><input type="text"  class="form-control" name="fromdate1" id="fromdate1" readonly placeholder="From Date *" value="<?php echo $seekerexprfrmdt1; ?>"><div class="help-block err_txt"></div></div>
<div class="col-sm-2"><input type="text" class="form-control"  name="todate1" id="todate1" readonly placeholder="To Date *" value="<?php echo $seekerexprtodt1; ?>"><div class="help-block err_txt"></div></div>
</div>
<?php
    $test = $seekerexprid;    
    $newstring = str_replace("EXP", "", $test);
    //print $newstring;
    $test2 = $newstring + 2;
    $newstring2 = str_replace("$test", "EXP$test2", $test);
    //$seekerexprid;
    $seekerexpr2 = mysql_query("SELECT * FROM seeker_experience WHERE seekerid = '$id' and expid='$newstring2'");   
    $seekerexpres2 = mysql_fetch_array($seekerexpr2); 
    $ID2 = $seekerexpres2['id'];
    $seekerexprid2 = $seekerexpres2['expid'];
    $seekercompname2 = $seekerexpres2['companyname'];
    $seekerdesg2 = $seekerexpres2['designation'];
    $seekerexprfrmdt2 = $seekerexpres2['fromdate'];
    $seekerexprtodt2 = $seekerexpres2['todate'];
?>

<div class="form-group clr_both">
<div class="col-sm-2"><input type="text"  class="form-control" name="company2" placeholder="Company Name *" value="<?php echo $seekercompname2; ?>"><div class="help-block err_txt"></div></div>
<div class="col-sm-2"><input type="text"  class="form-control" name="designation2" placeholder="Designation *" value="<?php echo $seekerdesg2; ?>"><div class="help-block err_txt"></div></div>
<div class="col-sm-2"><input type="text" class="form-control" name="fromdate2" id="fromdate2" readonly placeholder="From Date *" value="<?php echo $seekerexprfrmdt2; ?>"><div class="help-block err_txt"></div>
</div>
<div class="col-sm-2"><input type="text" class="form-control" name="todate2" id="todate2" readonly placeholder="To Date *" value="<?php echo $seekerexprtodt2; ?>"><div class="help-block err_txt"></div></div>
</div>

<?php
    $test = $seekerexprid;    
    $newstring = str_replace("EXP", "", $test);
    //print $newstring;
    $test3 = $newstring + 2;
    $newstring3 = str_replace("$test", "EXP$test3", $test);
    //$seekerexprid;
    $seekerexpr3 = mysql_query("SELECT * FROM seeker_experience WHERE seekerid = '$id' and expid='$newstring3'");   
    $seekerexpres3 = mysql_fetch_array($seekerexpr3); 
    $ID3 = $seekerexpres3['id'];
    $seekerexprid3 = $seekerexpres3['expid'];
    $seekercompname3 = $seekerexpres3['companyname'];
    $seekerdesg3 = $seekerexpres3['designation'];
    $seekerexprfrmdt3 = $seekerexpres3['fromdate'];
    $seekerexprtodt3 = $seekerexpres3['todate'];
?>


<div class="form-group clr_both">
<div class="col-sm-2"><input type="text" class="form-control" name="company3" placeholder="Company Name *" value="<?php echo $seekercompname3;?>"><div class="help-block err_txt"></div></div>
<div class="col-sm-2"><input type="text"  class="form-control" name="designation3" placeholder="Designation *" value="<?php echo $seekerdesg3;?>"><div class="help-block err_txt"></div></div>
<div class="col-sm-2"><input type="text" class="form-control"  name="fromdate3" id="fromdate3" readonly placeholder="From Date *" value="<?php echo $seekerexprfrmdt3;?>"><div class="help-block err_txt"></div></div>
<div class="col-sm-2"><input type="text" class="form-control"  name="todate3" id="todate3" readonly placeholder="To Date *" value="<?php echo $seekerexprtodt3;?>"><div class="help-block err_txt"></div></div></div>


<div class="form-group" style="padding-top:5%;">
<div class="col-sm-4 col-xs-offset-4">
<input class="btn btn-warning" type="submit" name="submit" value="Update"/>
<input class="btn btn-warning" style="margin-left:4%;" type="button" onClick="window.location.href='seek_home.php'"  value="Back"/></div></div>


</form>

</div>
</div>



</div>
</div>
</div>

<?php include "includes/login_popup.php"; ?>
<?php include "includes/login_popup1.php"; ?>
<?php include("includes/footer.php"); ?>

</body>
</html>
