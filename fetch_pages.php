<?php
include("includes/config.php");
$item_per_page = 30;
//sanitize post value
if(isset($_POST["page"])){
	$page_number = filter_var($_POST["page"], FILTER_SANITIZE_NUMBER_INT, FILTER_FLAG_STRIP_HIGH);
	if(!is_numeric($page_number)){die('Invalid page number!');} //incase of invalid page number
}else{
	$page_number = 1;
}
//get current starting point of records
$position = (($page_number-1) * $item_per_page);

$item_per_page_new = $item_per_page + $position ; 

//echo "SELECT * FROM postjob where id > $position and id<=$item_per_page_new ORDER BY id ASC LIMIT 30";
//Limit our results within a specified range. 
$results = mysql_query("SELECT * FROM postjob where id > $position and id<=$item_per_page_new ORDER BY id ASC LIMIT 30");
			echo '<ul class="joblist">';
			while($seek_result = mysql_fetch_array($results))
			{ 
			$id = $seek_result['jobcode'];
			$name = $seek_result['jobtitle'];
			$location1=$seek_result['location'];
			$pdate=$seek_result['postdate'];
			$desc = $seek_result['description'];
			$exp=$seek_result['experience'];
			$empid=$seek_result['empid'];
			$empname=$seek_result['employer_name'];
			$postdate = date_create($seek_result['postdate']);
			$today = date_format($postdate,"F j, Y"); 
			
			echo'<li> <a href="job_details_seek.php?id='.$id.'> 
			<h4 style="color:#006699"> '.$name.'</h4> </a>
			<a href="company_detail.php?empid='.$empid.'><font style="font-size:15px;">'.$empname.'</font></a>
			<h5><span class="glyphicon glyphicon-map-marker" aria-hidden="true" style="margin-right:5px"></span>'.$location1.'</h5>			
			<h5 class="clr_both">Last Update : <small>'.$today.'</small></h5>
			</li>';
			}			
			echo '</ul>';




?>

