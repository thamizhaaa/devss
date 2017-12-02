<?php
error_reporting(E_ALL);
date_default_timezone_set('UTC');

require_once '../../../config.php';
require_once $configArr['engine_path'] . "/initEngine.php";

$PDO = PDO_CONNECT();

####################################################

if (empty($_FILES)){
    echo 'Error';
    die();
}

$fileName = $_FILES["file"]["name"]; // The file name
$fileTmpLoc = $_FILES["file"]["tmp_name"]; // File in the PHP tmp folder
$fileType = $_FILES["file"]["type"]; // The type of file it is
$fileSize = $_FILES["file"]["size"]; // File size in bytes
$fileErrorMsg = $_FILES["file"]["error"]; // 0 for false... and 1 for true


if (!$fileTmpLoc) { // if file not chosen
    echo "ERROR: Please browse for a file before clicking the upload button.";
    exit();
}

if (isset($_POST['userID'])) {
    if (move_uploaded_file($fileTmpLoc, $configArr['root_path'] . "data/config/uploads/avatars/" . $fileName)) {
        $uploadedFile = "config/uploads/avatars/" . $fileName;
        $command = "UPDATE users SET avatar = :fileName WHERE user_id = :userID";
        $result = $PDO->prepare($command);
        $result->bindParam(':fileName', $uploadedFile);
        $result->bindParam(':userID', $_POST['userID']);
        $result->execute();

        echo "data/config/uploads/avatars/" . $fileName;
		
		if(isset($_SESSION['user'])){
			$_SESSION['user']['avatar'] = "config/uploads/avatars/" . $fileName;
		}
    } else {
        echo "Upload failed";
    }
}
else{
    if (move_uploaded_file($fileTmpLoc, $configArr['root_path']."data/config/uploads/".$_POST['type']."/".$fileName)) {
        echo "data/config/uploads/".$_POST['type']."/".$fileName;
    } else {
        echo "Upload failed";
    }
}

die();
