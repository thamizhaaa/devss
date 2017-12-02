<?php
error_reporting(E_ALL);
date_default_timezone_set('UTC');

include("../../../data/config/config.php");
$PDO = PDO_CONNECT();

if (isset($_POST['message'])){
	
	if($_POST['message'] != ''){
		
    	$command = "INSERT INTO prepared_messages VALUES('', :message)";
    	$result = $PDO->prepare($command);
    	$result->bindParam(':message', $_POST['message']);
    	$result->execute();
		
    	echo 'added';
	}
	else{
	    echo 'empty';
	}
}

if (isset($_POST['message_id']) && $_POST['message_id'] != ''){

    $command = "DELETE FROM prepared_messages WHERE id = :message_id";
    $result = $PDO->prepare($command);
    $result->bindParam(':message_id', $_POST['message_id']);
    $result->execute();

    echo 'deleted';
}



die();