<?php
error_reporting(0);

include "admin_session.php";
	
	$oper = $_REQUEST['op'];
	
	
	



if($oper == 'update')
	{
    
	            $sqll = mysql_query("SELECT table_name FROM information_schema.tables WHERE table_type = 'base table' AND table_schema='ss_latest' and table_name!='tbl_split_tables'");
		    $count = mysql_num_rows($sqll);
		    while($rows=mysql_fetch_array($sqll)){
		       $names[]= $rows['table_name'];
		    }

		  foreach($names as $name){  
		  $sqlquery = mysql_query("SELECT fld_tables_name FROM tbl_split_tables WHERE fld_tables_name='$name' ");
		  $cnt = mysql_num_rows($sqlquery);

		   if($cnt==0){ 
			$query = mysql_query("INSERT INTO tbl_split_tables(fld_tables_name)VALUES('" . $name . "')");	 
		   } 
		  }

		  
		  
		  $value = $_POST['val'];
		  $value_unchk = $_POST['val1'];
		  
		    $valuee = explode(',',$value); 
		    
		    $countskills = count($valuee);
		    $name='';
		    foreach ($valuee as $value321) {
			if($countskills > 1)
			{
			$name .= "fld_tables_name='$value321'"." OR ";
			$skillvals = substr($name, 0, -3);
			}
			else{
			     $skillvals .= "fld_tables_name='$value321'";        
			     }

		    }
	
		    
		    
		    $value = explode(',',$value_unchk); 
		    $countskill = count($value);
		    $name1='';
		    foreach ($value as $value1) {
			if($countskill > 1)
			     {
			    
			    
			$name1 .= "fld_tables_name='$value1'"." OR ";
			$skillvals1 = substr($name1, 0, -3);
		    }else{
			     $skillvals1 .= "fld_tables_name='$value1'";        
			     }

		    }
	
		    

		     $query_update = "UPDATE tbl_split_tables SET fld_status='1' WHERE ($skillvals)";
		     $queryy_update = "UPDATE tbl_split_tables SET fld_status='0' WHERE ($skillvals1)";
//		     echo $query_update;
//		     echo $queryy_update;
//		     echo "UPDATE tbl_split_tables SET fld_status='1' WHERE ($skillvals)";
//		     echo "UPDATE tbl_split_tables SET fld_status='0' WHERE ($skillvals1)";
		     
		     
		     $sql = mysql_query($query_update);
		     $sql1 = mysql_query($queryy_update);
		     
		     if($sql && $sql1) {
			 echo "1";
		     } else {
			 echo "2";
		     }
		 
}
	
//if($oper == 'delete')
//	{	
//	
//$val=$_POST['id'];
//
//$sql = "UPDATE tbl_split_tables SET fld_delete_status='2' WHERE fld_tables_name='$val'";
//
//$sqll = mysql_query($sql);
//
//	if($sqll) {
//			 echo "1";
//		     } else {
//			 echo "2";
//		     }
//	}
	
	
	
	
	
if($oper == 'truncate'){

    $truncate=$_POST['val'];

      $truncate_table = explode(',',$truncate); 

//print_r($truncate_table);

      foreach($truncate_table as $truncate_tables){

	  $query = mysql_query("TRUNCATE TABLE $truncate_tables ");

      }
      
      if($query) {
			 echo "1";
		     } else {
			 echo "2";
		     }
}
?>