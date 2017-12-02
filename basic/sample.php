<?php
require 'lib/db.php';
require 'lib/facebook.php';
require 'lib/fbconfig.php';
session_start();


$userdata = $_SESSION['userdata'];


//Facebook Access Token

echo $first_name=$userdata['name'];
?>