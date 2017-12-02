<?php

$baseURL = 'http://staffingspot.in/';
$callbackURL = 'http://staffingspot.localhost.com/linkedin_process.php';
$linkedinApiKey = '81du2t161zbr2i';
$linkedinApiSecret = 'u2YLj12S9qRcTuBs';
$linkedinScope = 'r_basicprofile r_emailaddress';


class DB 
{
	function __construct(){
		$this->userTable = 'seeker_personal';
	}
	
	/*function checkUser($userdata){
		$oauth_uid = $userdata->id;
		$email = $userdata->emailAddress;
		$check = $this->db->query("SELECT * FROM $this->userTable WHERE oauth_uid = '".$oauth_uid."' AND email = '".$email."'");
		if(mysqli_num_rows($check) > 0){
			$result = $check->fetch_array(MYSQLI_ASSOC);
			$query = "UPDATE $this->userTable SET fname = '".$userdata->firstName."', lname = '".$userdata->lastName."', email = '".$userdata->emailAddress."', location = '".$userdata->location->name."', country = '".$userdata->location->country->code."', picture_url = '".$userdata->pictureUrl."', profile_url = '".$userdata->publicProfileUrl."', modified = '".date("Y-m-d H:i:s")."' WHERE id = ".$result['id'];
			$this->db->query($query);
			return $result['id'];
		}else{
			$query = "INSERT INTO 
						$this->userTable(oauth_provider,oauth_uid,fname,lname,email,location,country,picture_url,profile_url,created,modified) 
						VALUES('linkedin','".$userdata->id."','".$userdata->firstName."','".$userdata->lastName."','".$userdata->emailAddress."','".$userdata->location->name."','".$userdata->location->country->code."','".$userdata->pictureUrl."','".$userdata->publicProfileUrl."','".date("Y-m-d H:i:s")."','".date("Y-m-d H:i:s")."')";
			$this->db->query($query);
			return $this->db->insert_id;
		}
	}*/
	function checkUser($userdata){
	$oauth_uid = $userdata->id;
	$email = $userdata->emailAddress;
	$firstName = $userdata->firstName;
	$lastName = $userdata->lastName;
	$location = $userdata->location->country->name;
	$country = $userdata->location->country->code;
	$check = mysql_query("SELECT * FROM $this->userTable WHERE fid = '".$oauth_uid."' AND mailid = '".$email."'");
	if(mysql_num_rows($check) == 0){
	$query = mysql_query("insert into $this->userTable
	(provider_name,fid,fname,lname,mailid,state)
	values
	('linkedin','".$oauth_uid."','".$firstName."','".$lastName."','".$email."','".$location."')");	
	mysql_query("UPDATE seeker_personal SET seekerid = CONCAT('SEEK',id) ORDER BY id DESC LIMIT 1");
	
	}
	
	}
	
}
?>