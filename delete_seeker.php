<?php
include("config.php");

$oper=$_REQUEST['op'];
if($oper=="delete")
{
	$id=$_POST['id'];
	$id = mysql_escape_String($id);
	$sql = "UPDATE `tbl_user_resume` SET `fld_delstatus`=2  where fld_id='$id'";
        $result=mysql_query($sql);	
	if($result)
	{
	echo "Successful";
	}
	else
	{
	 echo "ERROR";
    }
}
if($oper=="delete_video")
{
	$id=$_POST['id'];
	$id = mysql_escape_String($id);
	$sql = "UPDATE `tbl_esteem_video` SET `fld_del_status`=1  where fld_id='$id'";
        $result=mysql_query($sql);	
	if($result)
	{
	echo "Successful";
	}
	else
	{
	 echo "ERROR";
    }
}
?>