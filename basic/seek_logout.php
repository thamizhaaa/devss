<?php
session_start();
$user='';
$userdata='';
session_destroy();
header("Location: fblogin.php");
?>?