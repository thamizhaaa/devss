<?php 
error_reporting(0);

include "admin_session.php";

if(isset($_POST['submit']))
      {
		
	 $passwordvalue=$_POST['cur_pwd'];
     $password=$_POST['password'];
     $confirm_pwd=$_POST['confirm_pwd'];   
	 
	  $select=mysql_query("select * from admin"); 
      $fetch=mysql_fetch_array($select);
      $data_pwd=$fetch['pass'];
      $email=$fetch['email'];
	  
	  if($passwordvalue==""){
		  
		 $login1 .= "Enter Existing password"; 
		 
	  }else if($password==""){
		  
	     $login1 .= "Plz Enter new password"; 
	   
	  }else if($confirm_pwd==""){
		  
		 $login1 .= "Plz Enter confirm password"; 
	  }else if($password==$confirm_pwd && $data_pwd==$passwordvalue)
        
		{
		
		  $insert=mysql_query("update admin set pass='$confirm_pwd',lastlogindate=NOW()  where email='$email'"); 
       		$login1 .="* password changed";
	   ?>
       <script>
	   window:location = "admin_home.php";
	   </script>
       <?php
        } else {
       
    		 $login1 .="* password not match plz try again";
        }
	  }

?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Job Portal</title>

    <link href="css/custom.css" rel="stylesheet" />

    <link href="css/styles_basic.css" rel="stylesheet" >
    <link href="css/bootstrap.css" rel="stylesheet" >

	<script type="text/javascript" src="js/jquery-1.10.2.min.js"></script>
    <script type="text/javascript" src="js/bootstrap-dropdown.js"></script>
    <script type="text/javascript" src="js/bootstrap.js"></script>
    
</head>

<body>


<div class="container-fluid white_bg">

<?php  include("includes/header.php");	?>

</div>

<div class="container-fluid content_top_space" style="padding:0px;">
<div class="col-sm-2 " >&nbsp; 
     
    

</div>
<div class="col-sm-6 " style="margin-top:10px;">

    <div class="title">Change Password</div>

     <form class="" action="" method="post" role="form">
      <div class="clr_both form-group">
 
        <font  class="help-block err_txt" style="text-align:center; color:#F00;"><?php echo $login4_err.$login1 ; ?></font>
        
        </div>
    <div class="form-group  top_space">
 <label class="col-sm-3 control-label" >Current Password *</label>

       <div class="col-sm-6"><input class="form-control" type="password" name="cur_pwd" placeholder="Current Password *" value="<?php echo $_POST['cur_pwd']; ?>"/><span class="help-block"><?php echo $login1_err; ?></span></div>
</div>


<div class=" clr_both form-group  top_space">
 <label class="col-sm-3 control-label" >New Password *</label>
<div class="col-sm-6"> <input type="password" name="password" placeholder="New Password *" class="form-control"  /><span class="help-block"><?php echo $login2_err; ?></span></div>
</div>

 <div class="clr_both form-group">
 <label class="col-sm-3 control-label" >Confirm Password *</label>
<div class="col-sm-6">  <input  type="password" name="confirm_pwd" class="form-control"  placeholder="Confirm Password *" /><span class="help-block"><?php echo $login3_err; ?></span></div>
</div>

        <div class="clr_both form-group"> 
        <label class="col-sm-3 control-label" >&nbsp;</label>
<div class="col-sm-6">

  <input type="submit" name="submit" id="submit" value="Change Password" class="frm_btn btn"/>
  <input type="reset" name="reset"  value="Reset" class="frm_btn btn"/>
 </div>
 </div>
 
</form>

</div>

</div>





<?php include "includes/footer.php"; ?>


</body>
</html>
