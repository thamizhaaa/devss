<?php
error_reporting(0);
include ("config.php");
session_start();  

if(isset($_POST['submit'])) {
    
    $resume = $_POST['resume'];
    echo $resume;
     $allowedExts = array("pdf", "doc", "docx");
$temp = explode(".", $_FILES["resume"]["name"]);
$extension = end($temp);

if ((($_FILES["resume"]["type"] == "application/msword")
|| ($_FILES["resume"]["type"] == "application/pdf")
|| ($_FILES["resume"]["type"] == "text/doc")
|| ($_FILES["resume"]["type"] == "text/docx")
|| ($_FILES["resume"]["type"] == "application/vnd.openxmlformats-officedocument.wordprocessingml.document"))
&& ($_FILES["resume"]["size"] < 2000000)
&& in_array($extension, $allowedExts)) {
  if ($_FILES["resume"]["error"] > 0) {
    echo "Return Code: ".$_FILES["resume"]["error"] . "<br>";
  } else {
	 move_uploaded_file($_FILES["resume"]["tmp_name"],
      "resume/" .$id. $_FILES["resume"]["name"]);
       $upload_resume =  "resume/" .$id. $_FILES["resume"]["name"];
  }
}
       
      
        $seek_query = mysql_query("INSERT INTO tbl_user_resume(fld_resume,fld_resume_title)VALUES('".$upload_resume."','".$resume."')");
        echo "INSERT INTO user_resume(resume,resume_title)VALUES('".$upload_resume."','".$resume."')";

}

header("Location: http://localhost:8080/staffingspotnew/user-resume.php"); /* Redirect browser */
// /exit();
?>