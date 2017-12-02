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
			
			if(($company != "")) {
				
			if ( !preg_match('/^[a-zA-Z0-9]+$/', $company) ) 
			$err_company = "Enter Valid Company Name";
				
				/*if($company == "")
				$err_company = "Company Name is mandatory";*/
				
			if ( !preg_match('/^[a-zA-Z0-9]+$/', $designation) ) 
			$err_designation = "Enter Valid Designation Name";
				
			if($fromdate == "")
			$err_fromdate = "From Date is mandatory";

			if($todate == "")
			$err_todate = "To Date is mandatory";
			
			  
				 if(!empty($company1)) { 
				if ( !preg_match('/^[a-zA-Z0-9]+$/', $company1) ) 
			$err_company1 = "Enter Valid Company Name";			
				 }
				
				
			if(!empty($designation1)) { 
			if ( !preg_match('/^[a-zA-Z0-9]+$/', $designation1) ) 
			$err_designation1 = "Enter Valid Designation Name";
			}
				
				if(!empty($company2)) { 
				if ( !preg_match('/^[a-zA-Z0-9]+$/', $company2) ) 
			$err_company2 = "Enter Valid Company Name";			
				 }
				
				
			if(!empty($designation2)) { 
			if ( !preg_match('/^[a-zA-Z0-9]+$/', $designation2) ) 
			$err_designation2 = "Enter Valid Designation Name";
			}
			
			if(!empty($company3)) { 
				if ( !preg_match('/^[a-zA-Z0-9]+$/', $company3) ) 
			$err_company3 = "Enter Valid Company Name";			
				 }
				
				
			if(!empty($designation3)) { 
			if ( !preg_match('/^[a-zA-Z0-9]+$/', $designation3) ) 
			$err_designation3 = "Enter Valid Designation Name";
			}
			
				
				
				$errors .= $err_company.$err_designation.$err_fromdate.$err_todate.$err_company1.$err_designation1.$err_company2.$err_designation2.$err_company3.$err_designation3;
				
				$validation_check = "";
				if(isset($errors))
				$validation_check .= $errors;
					
				if(!$validation_check) {
					
						mysql_query("INSERT INTO seeker_experience(seekerid,companyname,designation,fromdate,todate)VALUES('".$seekerid."','".$company."','".$designation."','".$fromdate."','".$todate."')");
			
			mysql_query("UPDATE seeker_experience SET expid = CONCAT('EXP',id) ORDER BY id DESC LIMIT 1");

						mysql_query("INSERT INTO seeker_experience(seekerid,companyname,designation,fromdate,todate)VALUES('".$seekerid."','".$company1."','".$designation1."','".$fromdate1."','".$todate1."')");
			
			mysql_query("UPDATE seeker_experience SET expid = CONCAT('EXP',id) ORDER BY id DESC LIMIT 1");

						mysql_query("INSERT INTO seeker_experience(seekerid,companyname,designation,fromdate,todate)VALUES('".$seekerid."','".$company2."','".$designation2."','".$fromdate2."','".$todate2."')");
			
			mysql_query("UPDATE seeker_experience SET expid = CONCAT('EXP',id) ORDER BY id DESC LIMIT 1");

						mysql_query("INSERT INTO seeker_experience(seekerid,companyname,designation,fromdate,todate)VALUES('".$seekerid."','".$company3."','".$designation3."','".$fromdate3."','".$todate3."')");
			
			mysql_query("UPDATE seeker_experience SET expid = CONCAT('EXP',id) ORDER BY id DESC LIMIT 1");
			
	?>
    
    <script>
	window.location = "seek_success.php?id=<?php echo $ID; ?>";
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
    
<script type="text/javascript" src="js/jquery-1.11.2.js"></script>
<script type="text/javascript" src="js/bootstrap.js"></script>
<script type="text/javascript" src="js/bootstrap-dropdown.js"></script>
<script type="text/javascript" src="js/bootstrap-datepicker.js"></script>
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
<script>
  $(document).ready(function() {
	   $("#fromdate, #fromdate1, #fromdate2, #fromdate3, #todate, #todate1, #todate2, #todate3").datepicker({
     		format: 'dd/mm/yyyy'
	});
}); 
</script>
</head>

<body>

<?php include("includes/header.php"); ?>
	 



<div class="container-fluid white_bg">

<div class="container">
<div class="panel panel-default">

<div class="panel-heading"><h3 class="panel-title">Job Seekers Registration - Experience</h3></div>
<div class="panel-body">

  <div class="form-group">
 
  <img src="images/seeker_reg_4.jpg" class="img-responsive" />
  </div>
  <div class="col-sm-1">
</div>
<div class="col-sm-9">
<form class="form_top_space" action="" method="post" enctype="multipart/form-data">

<div class="form-group">
<div class="col-sm-2"><b>Company Name</b></div>
<div class="col-sm-2"><b>Designation</b></div>
<div class="col-sm-2"><b>From Date</b></div>
<div class="col-sm-2"><b>To Date</b></div>
</div><br />
<br />

<div class="form-group clr_both">
<div class="col-sm-2"><input type="text"  name="company" placeholder="Company Name *"  class="form-control" value="<?php echo $_POST['company']; ?>"><div class="help-block err_txt"><?php echo $err_company; echo $err_invalid; ?></div></div>
<div class="col-sm-2"><input type="text"  name="designation" placeholder="Designation *" value="<?php echo $_POST['designation']; ?>" class="form-control"><div class="help-block err_txt"><?php echo $err_designation; ?></div></div>
<div class="col-sm-2"><input type="text"  name="fromdate" id="fromdate" readonly placeholder="From Date *" value="" class="form-control"><div class="help-block err_txt"><?php echo $err_fromdate; ?></div></div>
<div class="col-sm-2"><input type="text"  name="todate" id="todate" readonly placeholder="To Date *" value="" class="form-control"><div class="help-block err_txt"><?php echo $err_todate; ?></div></div>
</div>

<div class="form-group clr_both">
<div class="col-sm-2"><input type="text"  class="form-control" name="company1" placeholder="Company Name *" value="<?php echo $_POST['company1']; ?>"><div class="help-block err_txt"><?php echo $err_company1;  ?></div></div>
<div class="col-sm-2"><input type="text" class="form-control"  name="designation1" placeholder="Designation *" value="<?php echo $_POST['designation1']; ?>"><div class="help-block err_txt"><?php echo $err_designation1; ?></div></div>
<div class="col-sm-2"><input type="text"  class="form-control" name="fromdate1" id="fromdate1" readonly placeholder="From Date *" value=""><div class="help-block err_txt"><?php echo $err_fromdate1; ?></div></div>
<div class="col-sm-2"><input type="text" class="form-control"  name="todate1" id="todate1" readonly placeholder="To Date *" value=""><div class="help-block err_txt"><?php echo $err_todate1; ?></div></div>
</div>

<div class="form-group clr_both">
<div class="col-sm-2"><input type="text"  class="form-control" name="company2" placeholder="Company Name *" value="<?php echo $_POST['company2']; ?>"><div class="help-block err_txt"><?php echo $err_company2;  ?></div></div>
<div class="col-sm-2"><input type="text"  class="form-control" name="designation2" placeholder="Designation *" value="<?php echo $_POST['designation2']; ?>"><div class="help-block err_txt"><?php echo $err_designation2; ?></div></div>
<div class="col-sm-2"><input type="text" class="form-control" name="fromdate2" id="fromdate2" readonly placeholder="From Date *" value=""><div class="help-block err_txt"></div>
</div>
<div class="col-sm-2"><input type="text" class="form-control" name="todate2" id="todate2" readonly placeholder="To Date *" value=""><div class="help-block err_txt"></div></div>
</div>

<div class="form-group clr_both">
<div class="col-sm-2"><input type="text" class="form-control" name="company3" placeholder="Company Name *" value="<?php echo $_POST['company3']; ?>"><div class="help-block err_txt"><?php echo $err_company3;  ?></div></div>
<div class="col-sm-2"><input type="text"  class="form-control" name="designation3" placeholder="Designation *" value="<?php echo $_POST['designation3']; ?>"><div class="help-block err_txt"><?php echo $err_designation3; ?></div></div>
<div class="col-sm-2"><input type="text" class="form-control"  name="fromdate3" id="fromdate3" readonly placeholder="From Date *" value=""><div class="help-block err_txt"></div></div>
<div class="col-sm-2"><input type="text" class="form-control"  name="todate3" id="todate3" readonly placeholder="To Date *" value=""><div class="help-block err_txt"></div></div></div>


<div class="form-group clr_both" >
<label class="col-sm-1 control-label"></label>
<div class="col-sm-6">
<input class="btn btn-warning" type="submit" name="submit" value="Finish"/>
<a href="seek_success.php?id=<?php echo $ID; ?>" class="btn btn-warning" style="margin-left:3%">Skip & Continue</a></div></div>


</form>
</div>
</div>
</div>
</div>
</div>



<?php include("includes/footer.php"); ?>
<?php include "includes/login_popup.php"; ?>



</body>
</html>
