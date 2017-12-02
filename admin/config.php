<?php
@include("./config.php");




//Cities
$result_city=mysql_query("SELECT distinct fld_name,fld_state_id FROM tbl_cities where fld_status <> 2 Order by fld_name");
$i=0;
while($row=mysql_fetch_array($result_city)) { 
$citystr = $row['fld_name'];
$citystr1 = ltrim($citystr, "'");
$citystr11 = ltrim($citystr1, " ");
$response_city[$i]['city'] = $citystr11;

$response_city[$i]['state_id']= $row['fld_state_id'];
$i=$i+1;
} 
$json_string_city = json_encode($response_city);
$file_city = 'city.json';
file_put_contents($file_city, $json_string_city);

//States
$result_state=mysql_query("SELECT distinct fld_id,fld_name,fld_country_id FROM tbl_states where fld_status <> 2 Order by fld_name");
$i=0;
while($row=mysql_fetch_array($result_state)) { 
$response_state[$i]['id']= $row['fld_id'];
$response_state[$i]['state']= $row['fld_name'];
$response_state[$i]['country_id']= $row['fld_country_id'];
$i=$i+1;
} 
$json_string_state = json_encode($response_state);
$file_state = 'state.json';
file_put_contents($file_state, $json_string_state);


//Country
$result_country=mysql_query("SELECT distinct fld_id,fld_name FROM tbl_countries where fld_status <> 2 Order by fld_name");
$i=0;
while($row=mysql_fetch_array($result_country)) { 
$response_country[$i]['id']= $row['fld_id'];
$response_country[$i]['country']= $row['fld_name'];
$i=$i+1;
} 
$json_string_country = json_encode($response_country);
$file_country = 'country.json';
file_put_contents($file_country, $json_string_country);


//Skills
$sql=mysql_query("select fld_keyword from tbl_jobseeker_details where fld_delstatus = 0");
$sql1=mysql_query("SELECT `fld_keyskills` FROM `tbl_postjob` WHERE `fld_job_status`=1 AND `fld_delstatus`=0");
while($row=mysql_fetch_assoc($sql))           
{
  $key = $row['fld_keyword'].'<br>';
  $value = explode(',',$row['fld_keyword']); 
  foreach ($value as $key => $value321) {
      //echo $value321.'<br>';
      $test_id[] = $value321;
  }  
}
while($row=mysql_fetch_assoc($sql1))           
{
  $key1 = $row['fld_keyskills'].'<br>';
  $value1 = explode(',',$row['fld_keyskills']); 
  foreach ($value1 as $key1 => $value321) {
      //echo $value321.'<br>';
      $test_id1[] = $value321;
  } 
}

//$array1 = array_unique($test_id);
//$array2 = array_unique($test_id1);

$result1 = array_merge($test_id,$test_id1);
$result111 = array_unique($result1);
//print_r($result111);

//print_r(ksort($result111));
//$result = array_filter($result111);

$result = array_filter($result111, function($var){return !is_null($var);} );



//$result11= sort($result);

//echo 'count'.count($result);
$i=0;
foreach ($result as $skillresult)
{
    //if($result[$i] != ''){
    $response1[$i]['skill']= $skillresult;
    $i++;
   // } 
}
$json_string1 = json_encode($response1);
$file1 = 'skills.json';
file_put_contents($file1, $json_string1);


?>
