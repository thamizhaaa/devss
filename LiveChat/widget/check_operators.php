<?php
header('Access-Control-Allow-Origin: *');
header('Access-Control-Allow-Methods: GET, POST');
header("Access-Control-Allow-Headers: X-Requested-With");

date_default_timezone_set('UTC');

include("../data/config/config.php");
$PDO = PDO_CONNECT();

$time = time()-30;
$command_admin_ready = "SELECT * FROM users WHERE status > $time";
$result_admin_ready = $PDO->prepare($command_admin_ready);
$result_admin_ready->execute();
$num_rows = $result_admin_ready->rowCount();

echo $num_rows;

die();