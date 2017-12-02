<?php 
@include("config.php");
$username = $_SESSION["user_name"];
$user_email = $_SESSION['user_email']; 
$user_id = $_SESSION['user_id'];

$empusername = $_SESSION["empuser_name"];
$empuser_email = $_SESSION['empuser_email']; 
$empuser_id = $_SESSION['empuser_id'];
$empotherdetails = $_SESSION["emp_other_details"];


// if ($user_id == "")
// {	
//  	session_destroy();
// 	$httpurl = $_SERVER['HTTP_HOST'].'/'.'staffingspotnew'.'/'.'index.php';
// 	//header('Location: '.'".$httpurl."'");  
// 	//exit;
// 	//redirectagain($httpurl . "index.php");
// }
?>