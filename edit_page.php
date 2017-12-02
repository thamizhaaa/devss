<?php error_reporting(0); 
include "reg_session.php";
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Job Portal</title>

        <!-- CUSTOM STYLES-->
<link rel="stylesheet" type="text/css" href="styles/styles_basic.css" />
<link rel="stylesheet" href="styles/bootstrap.css" type="text/css" />
<link rel="stylesheet" href="//code.jquery.com/ui/1.11.2/themes/smoothness/jquery-ui.css">
<link rel="icon" type="image/x-icon" href="images/favicon.png" >
 <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
        <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
        <!--[if lt IE 9]>
          <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
          <script src="https://oss.maxcdn.com/libs/respond.js/1.3.0/respond.min.js"></script>
        <![endif]-->

    
<script type="text/javascript" src="js/bootstrap.js"></script>
<script type="text/javascript" src="js/jquery-1.10.2.min.js"></script>
<script type="text/javascript" src="js/bootstrap-dropdown.js"></script>
  
	
</head>

<body>


<?php include("includes/header.php"); ?>

<div class="container-fluid white_bg">
<div class="row">

<?php include "includes/edit_listmenu.php"; ?>

<div class="col-sm-9 top_space">
<div class="panel panel-default">
<div class="panel-heading">Job Seekers - Edit Profile</div>
<div class="panel-body">
<div style="margin:15px 0px 0px 15px;">
<font><h4>
Job seeker Edit profile page, To Edit your profile use side menu
</h4><a class="btn btn-lg btn-warning" style="text-decoration:none" href="seek_home.php">Back</a>
</font>
</div>



</div>
</div>
</div>

</div>
</div>

<br />
<br />

<?php include("includes/footer.php"); ?>

</body>
</html>
