<?php
error_reporting(0);
include "includes/config.php";
include "includes/email_config.php";

if (isset($_POST['submit'])){
	
    $username = $_POST['email'];
	
	$username = (filter_var($_POST['email'], FILTER_SANITIZE_EMAIL));
  	if (!filter_var($username, FILTER_VALIDATE_EMAIL)) {
	$error .= "<span style='color: #ff0000;'> Please enter a correct email address.       ";
	
	} else {
		
		$for_query=mysql_query("select * from seeker_personal where mailid='$username'");
  		$for_count=mysql_num_rows($for_query);
	
	
    
    // If the count is equal to one, we will send message other wise display an error message.
    if($for_count==1)
    {
       $rows=mysql_fetch_array($for_query);
        $pass  =  $rows['pass'];//FETCHING PASS
        //echo "your pass is ::".($pass)."";
        $to = $rows['mailid'];
		$uname = $rows['loginid'];
        //echo "your email is ::".$email;
        //Details for sending E-mail
       // $from = "ROTASMART";
	   
	    $url = "www.staffingspot.in";
   		$subject = "Password Recovery";
   		$message = "password recovery \r\n
        -----------------------------------------------\r\n
        Url : $url;\r\n
        email Details is : $to;\r\n
		USERNAME : $uname \r\n
        Here is your password  : $pass\r\n
        Sincerely,\r\n
        StaffingSpot.in";

   /*$retval = mail ($to,$subject,$message);*/
   $retval =  emailFunction($subject,$message,$to);
    if( $retval != "" )  
   {
	  ?>
<div id="myModal" class="modal fade" data-backdrop="static" >
  <div class="modal-dialog" style="margin-top:20%">
    <div class="modal-content">
      <div class="modal-header">
        <h4 class="modal-title"><img src="images/favicon.png" />&nbsp;&nbsp;Message...</h4>
      </div>
      <div class="modal-body">
        <p class="lead">Password sent successfully to <?php echo $to; ?> </p>
      </div>
      <div class="modal-footer">
       <a href="index.php" class="btn btn-warning col-sm-3 pull-right">OK</a>
       
      </div>
    </div><!-- /.modal-content -->
  </div><!-- /.modal-dialog -->
</div>
	  
	  <?php
   
   } else {
	     
      $error .= "<span style='color: #ff0000;'> Message could not be sent...";
   }
   
	} else {
		
		$error .= "<span style='color: #ff0000;'> $username not Available...";
	}
   
	}
	
}
?>

<!DOCTYPE html>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Job Portal</title>
<meta name="viewport" content="width=device-width, initial-scale=1">


<link href="styles/styles_basic.css" rel="stylesheet" type="text/css" />
<link rel="stylesheet" type="text/css" href="styles/bootstrap.css"/>
<link rel="stylesheet" href="lib_files/font-awesome-4.0.3-css-font-awesome.min.css" />
  <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
        <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
        <!--[if lt IE 9]>
          <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
          <script src="https://oss.maxcdn.com/libs/respond.js/1.3.0/respond.min.js"></script>
        <![endif]-->
<script type="text/javascript" src="js/jquery-1.10.2.min.js"></script>    
<script type="text/javascript" src="js/bootstrap.js"></script>
<script>
$(document).ready(function(){
     $("#myModal").modal({
            show:true,
            keyboard: false,
            backdrop: 'static'        
        });
	});	
</script>



</head>

<body style="background:url(images/1.jpg) no-repeat center center fixed;">



<div id="mainWrap">
<div id="loggit">

<h1 style="color:#FFF"><img src="images/favicon.png" />StaffingSpot</h1>
<h3>
Job Seeker's

<strong>Forgot Password</strong>
</h3>

<?php if($error != "") { ?>
<div class="alert alert-danger col-xs-10" role="alert"><span class="fa fa-times-circle" aria-hidden="true"></span>&nbsp;<b><?php echo $error ; ?></b></div>
<?php } ?>
<form class="form-horizontal" method="post" action="">
<div class="form-group">
<div class="col-xs-10">
<div class="input-group">
<span class="input-group-addon">
<i class="fa fa-envelope fa-fw"></i>
</span>
<input type="text" class="form-control"  name="email" placeholder="Enter Your Email Id *" value="<?php echo $_POST['email'] ?>" />
</div>


</div>
</div>

<div class="form-group formSubmit">
<div class="col-sm-4">


</div>
<div class="col-sm-6 submitWrap">
<input type="submit" name="submit" value="Submit" class="btn btn-warning" />
<a href="index.php" class="btn btn-warning" style="margin-right:12px;"><strong>Back</strong></a>
</div>
</div>


<div class="form-group formNotice">

</div>
</form>



</div>




</div>



	

</body>
</html>
