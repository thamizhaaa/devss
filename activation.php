<?php
include 'includes/config.php';

?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Activate | StaffingSpot</title>
<link rel="stylesheet" href="styles/bootstrap.css" type="text/css" />

<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>   
<script type="text/javascript" src="js/jquery-1.10.2.min.js"></script>
<script type="text/javascript" src="js/bootstrap.js"></script>

<script type="text/javascript">
	
	$(document).ready(function(){
     $("#myModal").modal({
            show:true,
            keyboard: false,
            backdrop: 'static'        
        });
	});
</script>
</head>

<body>




<?php
include 'includes/config.php';
$msg='';
if(!empty($_GET['code']) && isset($_GET['code']))
{
$code=$_GET['code'];
$c=mysql_query("SELECT id FROM seeker_personal WHERE activation='$code'");

if(mysql_num_rows($c) > 0)
{
$count=mysql_query("SELECT id FROM seeker_personal WHERE activation='$code' and status='0'");

if(mysql_num_rows($count) == 1)
{
mysql_query("UPDATE seeker_personal SET status='1' WHERE activation='$code'");
?>

<div id="myModal" class="modal fade" data-backdrop="static" >
  <div class="modal-dialog" style="margin-top:20%">
    <div class="modal-content">
      <div class="modal-header">
        <h4 class="modal-title"><img src="images/favicon.png" />&nbsp;&nbsp;Congratulation</h4>
      </div>
      <div class="modal-body">
        <p class="lead">Your account is activated</p>
      </div>
      <div class="modal-footer">
       <a href="index.php" class="btn btn-warning col-sm-3 pull-right">OK</a>
       
      </div>
    </div><!-- /.modal-content -->
  </div><!-- /.modal-dialog -->
</div>
 
<?php
}
else
{
	?>
    <div id="myModal" class="modal fade" data-backdrop="static" >
  <div class="modal-dialog" style="margin-top:20%">
    <div class="modal-content">
      <div class="modal-header">
        <h4 class="modal-title"><img src="images/favicon.png" />&nbsp;&nbsp;OOPS...</h4>
      </div>
      <div class="modal-body">
        <p class="lead">Your account is already active, no need to activate again</p>
      </div>
      <div class="modal-footer">
       <a href="login_seek.php" class="btn btn-warning col-sm-3 pull-right">OK</a>
       
      </div>
    </div><!-- /.modal-content -->
  </div><!-- /.modal-dialog -->
</div>

<?php
}

}
else
{
	?>
    <div id="myModal" class="modal fade" data-backdrop="static" >
  <div class="modal-dialog" style="margin-top:20%">
    <div class="modal-content">
      <div class="modal-header">
        <h4 class="modal-title"><img src="images/favicon.png" />&nbsp;&nbsp;OOPS...</h4>
      </div>
      <div class="modal-body">
        <p class="lead">Wrong activation code.</p>
      </div>
      <div class="modal-footer">
       <a href="index.php" class="btn btn-warning col-sm-3 pull-right">OK</a>
       
      </div>
    </div><!-- /.modal-content -->
  </div><!-- /.modal-dialog -->
</div>

<?php
}

}
?>

<?php echo $msg; ?>
</body>
</html>