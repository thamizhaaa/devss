<?php
error_reporting(0);
include ("includes/config.php");
session_start();
$facebook=$_SESSION['facebook'];
$userdata=$_SESSION['userdata'];
$fbemail = $userdata['email']; 

$usergoogle = $_SESSION['google_data'];
$gooemail = $usergoogle['email'];
if($fbemail == ''){
require 'includes/facebook.php';
require 'includes/fbconfig.php';
}
if($gooemail == ''){
require_once 'google/Google_Client.php';
require_once 'google/contrib/Google_Oauth2Service.php';
}
if($_SESSION['tw_oauth_id'] == "" ) { 
require_once('twitteroauth/twconfig.php');
require_once('twitteroauth/twitteroauth.php');
}
$location = $_REQUEST['location'];
echo 'karthik'.$location;
$posted_date=$_REQUEST['posted_date'];
$catagory = $_REQUEST['catagory'];
$jobtype = $_REQUEST['job_type'];	
$query1="SELECT * FROM postjob  WHERE status='1'";
if (($location != ""))
{
$query1  .= "and  location LIKE '%".$location."%' ";
}
if ($posted_date!='')
{
	if  (($location!='')) { $query1 .= ' and '; } else { $query .= ' and '; }
	$query1  .= " NOW( ) - INTERVAL '".$posted_date."' DAY <  `postdate`";
}
if ($catagory!='')
{
	if  (($location!='') || ($posted_date!='')) { $query1 .= ' and '; } else { $query .= ' and '; }
	$query1  .= " employer_name = '".$catagory."'";
}	
if ($jobtype != '')
{
	if  (($location!='') || ($posted_date!='') || ($catagory!='')) { $query1 .= ' and '; } else { $query .= ' and '; }
	$query1  .= " job_type = '".$jobtype."'";
}	
        $pagin_query = mysql_query($query1); 
	$total=mysql_num_rows($pagin_query);
	$dis=10;
	$total_page=ceil($total/$dis);
	$page_cur=(isset($_GET['page']))?$_GET['page']:1;
	$k=($page_cur-1)*$dis;
        
        if(($location != "") || ($catagory != "") || ($posted_date != "")) {
	
$query="SELECT * FROM postjob  WHERE status='1'";


if (($location != ""))
{

$query  .= "AND location LIKE '%".$location."%' ";

}



if ($posted_date!='')
{
	
		if  (($location!='')) { $query .= ' and '; } else { $query .= ' and '; }
	$query  .= " NOW( ) - INTERVAL '".$posted_date."' DAY <  `postdate`";
	
}
if ($catagory!='')
{
		if  (($location!='') || ($posted_date!='')) { $query .= ' and '; } else { $query .= ' and '; }
	$query  .= " employer_name = '".$catagory."'";
	
}	

if ($jobtype != '')
{
		if  (($location!='') || ($posted_date!='') || ($catagory!='')) { $query .= ' and '; } else { $query .= ' and '; }
	$query  .= " job_type = '".$jobtype."'";
	
}	

$query .= "ORDER BY id DESC limit $k,$dis";	
} else {
 $query = "select * from postjob where status='1' ORDER BY id DESC limit $k,$dis";	
	
}



?>
<!DOCTYPE html>
<html >
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>StaffingSpot | Suggestions</title>


<link rel="stylesheet" type="text/css" href="styles/bootstrap.css"/>
<link rel="stylesheet" type="text/css" href="styles/styles_basic.css" />
<link rel="stylesheet" href="lib_files/font-awesome-4.0.3-css-font-awesome.min.css" />
<link rel="stylesheet" href="lib_files/1.11.2-themes-smoothness-jquery-ui.css">
<!--<link rel="stylesheet" href="lib_files/1.11.2-themes-smoothness-jquery-ui.css">-->
  <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
        <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
        <!--[if lt IE 9]>
          <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
          <script src="https://oss.maxcdn.com/libs/respond.js/1.3.0/respond.min.js"></script>
        <![endif]-->
<script type="text/javascript" src="js/jquery-1.10.2.min.js"></script>
<script type="text/javascript" src="js/bootstrap.js"></script>
<script type="text/javascript" src="js/custom.js"></script>
<script type="text/javascript" src="js/bootstrap-dropdown.js"></script>

<script>
	
	$(document).ready(function() {
		
		$( ".button-search" ).hover(function() {
			$("#search input").addClass('hover_search');
			$("#search input").removeClass('main_search');
			$(".input_close").css('display', 'block');
		});
		
		$( ".input_close" ).click(function() {
			$("#search input").addClass('main_search');
			$("#search input").removeClass('hover_search');
			$(".input_close").css('display', 'none');
		});
	});
</script>
<script>
$(document).ready(function(e) {

  size_div = $('#location_count div.radio').size();

  x=6;
  $('#location_count div.radio:lt('+x+')').show();
 	$('#loadMore').click(function () {			
		x= (x+3 <= size_div) ? x+3 : size_div;
        $('#location_count div.radio:lt('+x+')').show();	
    });
	$('#showLess').click(function () {		
        x=(x-8<0) ? 6 : x-3;
        $('#location_count div.radio').not(':lt('+x+')').hide();
    });
});

</script>

</head>

<body>

<header>
    
    <script src="lib_files/ajax-libs-jqueryui-1.11.2-jquery-ui.min.js"></script>
    <script>
function submitform()
{
    document.myform.submit();
}
	$(document).ready(function() {		
		$( ".button-search" ).hover(function() {
			$("#search input").addClass('hover_search');
			$("#search input").removeClass('main_search');
			$(".input_close").css('display', 'block');
		});		
		$( ".input_close" ).click(function() {
			$("#search input").addClass('main_search');
			$("#search input").removeClass('hover_search');
			$(".input_close").css('display', 'none');
		});
	});
</script>
<script type="text/javascript">
$(document).ready(function() {
$('#kwords').autocomplete({
		      	source: function( request, response ) {
		      		$.ajax({
		      			url : 'search.php',
		      			dataType: "json",
						data: {
						   name_startsWith: request.term,
						   type: 'country'
						   
						},
						 success: function( data ) {
							 response( $.map( data, function( item ) {
								return {
									label: item,
									value: item
								}
							}));
						}
		      		});
		      	},
		      	autoFocus: true,
		      	minLength: 0,				  	
		      });			  
			  });
</script>
<script type="text/javascript">
$(document).ready(function() {
$('#location').autocomplete({
		      	source: function( request, response ) {
		      		$.ajax({
		      			url : 'search.php',
		      			dataType: "json",
						data: {
						   name_With: request.term,
						   type: 'zipcode'
						   
						},
						 success: function( data ) {
							 response( $.map( data, function( item ) {
								return {
									label: item,
									value: item
								}
							}));
						}
		      		});
		      	},
		      	autoFocus: true,
		      	minLength: 0,
				    	
		      });			  
			  });
</script>
<style>
.filtersubmenu
{
	    list-style-type: none;
}
</style>
    
<?php include "includes/header.php"; ?> 



</header>
<div class="clr_both" style="margin-top:20px;">

</div>



<div class="container-fluid white_bg">

<div class="col-lg-12" style="margin-top:10px;">
<div class="col-md-2" style="margin-top:10px;">
     <div class="panel panel-default">
	 
		 <form id="form3" name="form3" method="post">
                             <?php
										$queryyyy = "select * from postjob"; 
										$query1 = mysql_query($queryyyy);
										$counnt = mysql_num_fields($query1)- 26;
										$specheadinng=array();  
										$specheadinng1=array();  
										$tesst =array();
										$columnnamees = array();
										//$specname=array();
										$i=0;
										$j=0;
										while($propertyy = mysql_fetch_field($query1))
											{
											if($i>5 && $i<$counnt+3)
												{
													$specheadinng = $propertyy->name;
													$remove = array("fld_");
													$spec = str_replace($remove, "", $specheadinng);
													$spec1 = strtolower($spec);
													$specname = strtoupper($spec1);
													//echo $specname;									
													$columnnames[$j] = $specheadinng;													
													$tesst_fld[$j]=$specname;
                                                                                                         $chkfield[$j]  = $spec1;
													$j++;														
												}
											$i++;
											}
										
											
											//$refarray[0];
											
                                                                                for($f=0;$f<$counnt-4;$f++)
    										{		
    										if($tesst_fld[$f] == 'JOB_TYPE')
											{
    										echo '<h4 style="margin-left: 15%;">BROWSE BY JOB TYPE</h4>';
											}
											else if($tesst_fld[$f] == 'EMPLOYER_NAME')
											{
    										echo '<h4 style="margin-left: 7%;">BROWSE BY COMPANY NAME</h4>';
											}
											else
											{
											echo '<h4 style="margin-left: 15%;">BROWSE BY '.$tesst_fld[$f].'</h4>';
											}
											
											
    										echo '<div class="panel-group" id="accordion">
    												<div class="panel panel-info">
    													<div id="specs">							
    														<ul class="filtersubmenu">';
											 		  
												$testing = "refine";
												$refarray = $testing.$f;
												$refarray = array();
												$querry1 = "select distinct $columnnames[$f] from postjob"; 
												$querry = mysql_query($querry1);
												$p=0;
												while($row = mysql_fetch_array($querry))
												{
												$refarray[$p] = $row[$columnnames[$f]];
                        
                if($refarray[$p] !="")
                {
                        if(in_array($refarray[$p],$splfilters))
                        {
                            echo '<li class="li_level3">
							<a><label class="label_check_level3">
							<input class="input_check_level3" type="checkbox" id="chkids" name="'.$columnnames[$f].'" value="'.$refarray[$p].'" checked="checked"/>'.$refarray[$p].'</label></a>
							</li>';    
                        }
                        else
                        {
                            echo '<li class="li_level3"><a><label class="label_check_level3"><input class="input_check_level3" type="checkbox" id="chkids" name="'.$columnnames[$f].'" value="'.$refarray[$p].'"/>'.$refarray[$p].'</label></a></li>';
                        }
                }
													$p++;				
												}												
										
    														echo '</ul>							
    													</div>
    												</div> 	  
    											  </div>';										
    										}
                                    ?>
                                    </form>
                                   
	 
  <?php
/*  <div class="panel-heading"><h3 class="panel-title">Company Name</h3></div>
             <div class="panel-body">
        <?php
	 $filter_cat_query = mysql_query("SELECT DISTINCT employer_name FROM postjob");	
		while($filter_cat_array=mysql_fetch_array($filter_cat_query)){
			$filter_cat = $filter_cat_array['employer_name'];
			
			$cat_query =mysql_query("SELECT COUNT(employer_name) as total FROM postjob WHERE employer_name='$filter_cat'");				
	
				while($cat_array = mysql_fetch_array($cat_query)){
					$cat_count = $cat_array['total'];
					?>
                    <div class="checkbox">
          <label >
			  <input  type="checkbox" onclick="window.location='suggest_joblist.php?catagory=<?php echo $filter_cat; ?>&location=<?php echo $location; ?>'" value="<?php echo $filter_cat; ?>" <?php if($catagory == $filter_cat) echo 'checked="checked"' ?>  /><?php echo $filter_cat." "."(".$cat_count.")" ?></label>
              </div>                   
					<?php	} }	?>
 

</div>
*/
?>
</div>

</div>
<!--//pagination
//coded by karthik-->
<div id="rightpanel">

<?php
session_start();

include("includes/config.php");
$pagin_query =mysql_query("select count(*) as total  from  postjob");

$pagin_row=mysql_fetch_array($pagin_query);
print_r( $pagin_row);
$total=$pagin_row['total'];
echo $total;
//exit();
$dis=10;
$total_page=ceil($total/$dis);
print_r($total_page);
$page_cur=(isset($_GET['page']))?$_GET['page']:1;
echo $page_cur;
$k=($page_cur-1)*$dis;
//echo $k;
//$total=$pagin_row['total'];
 //echo $total
//exit;
//$thumbpath = 'Product_Image/small/';
$thumbpath = 'product_images/';
error_reporting(E_ALL ^ E_NOTICE);

if(isset($_POST['formData']))
{
$frmresults = $_POST['formData'];
//echo $frmresults = explode("MANGESH",$_POST['formData']);
$splittedstringg=explode("&",$frmresults);
$splittedstringg11 = str_replace('+',' ',$frmresults);
$splittedstringg111 = str_replace(' %26 ',' & ',$splittedstringg11);
$connt = count($splittedstringg);

if($connt != 1)
{
    $first = str_replace("="," in ('",$splittedstringg111);
    $second = str_replace(",","','",$first);
    $third = str_replace("&","') and ",$second);    
    $final = $third."')";
    //echo $second = str_replace("&",") and ",$first);
}else
{
    $first = str_replace("="," in ('",$splittedstringg111);
    $second = str_replace(",","','",$first);
    $final = $second."')";
}

//echo $third = $second.")";


//$splittedstringg=explode("&",$frmresults);
//$splittedstringg1 = str_replace('+',' ',$splittedstringg);
//$splittedstringq = str_replace('&',' and ',$splittedstringg1);
//$splittedstring = str_replace('%26',' & ',$splittedstringq);

$cnnt = count($splittedstring);

//echo $_SESSION['size'] = $_GET['speclfiltrs'];
}
?>


    <div class="col-md-12 top_space" >
	
<div class="panel panel-default">
<div class="panel-heading"><h2 class="panel-title">Suggested Jobs for you</h2></div>
</div>

           
                <?php
                if($frmresults=="")
                {     
				//echo "empty";
                ?>  
										<?php                    
										$query = mysql_query("select * from postjob") or die("mysql error"); 
										$count1 = mysql_num_fields($query)- 26;
										$specheadingg=array();  
										$specheadingg1=array();  
										$testt =array();
										$columnnamess = array();
										//$specname=array();
										$i=0;
										$j=0;
										while ($property = mysql_fetch_field($query))
											{
											if($i>5 && $i<$count1+3)
												{
													$specheadingg = $property->name;
													$remove = array("fld_");
													$spec = str_replace($remove, "", $specheadingg);
													$spec1 = strtolower($spec);
													$specname = ucwords($spec1);
													//echo $specname;									
													$columnnamess[$j] = $specheadingg;
													
													$test_fld[$j]=$specname;
													$j++;
												}
											$i++;
											}	
										$query1 = "select * from postjob order by id desc limit $k,$dis"; 
										$query = mysql_query($query1);
										
										$count1 = mysql_num_fields($query) -5;			
										$specs = array();
										$test1=array();		
										$k=0;											
										$row=mysql_fetch_array($query);
										
										foreach($columnnamess as $specs)
										{
										$testt = ($specs);
										$specifications = $row[$testt];				
										$test1[$k]=$specifications;
										$k++;
										}
										//$capprodname2 = str_replace('-',' ',$capprodname1);
										//$capprodname11 = (strlen($capprodname1) > 20) ? substr($capprodname1,0,20).'...' : $capprodname1;
                ?>
                       
					   
							<div class="panel-body">
							<div id="loading"></div>							
							 <div class="data">
							<ul class="joblist">
							<?php
							while($seek_result = mysql_fetch_array($query))
							{ 
							$id = $seek_result['jobcode'];
							$name = $seek_result['jobtitle'];
							$location1=$seek_result['fld_country'];
                                                        $location=$seek_result['fld_state'];
							$pdate=$seek_result['postdate'];
							$desc = $seek_result['description'];
							$exp=$seek_result['experience'];
							$empid=$seek_result['empid'];
							$empname=$seek_result['fld_employer_name'];
                                                        $logo=$seek_result['fld_logo'];
							$postdate = date_create($seek_result['postdate']);
							$today = date_format($postdate,"F j, Y"); 
							?>
							<div class="job-box">
                                    <div class="col-md-2 col-sm-2 col-xs-12 hidden-xs hidden-sm">
                                        
                                        <div class="comp-logo">
<!--                                            <a href="#"> <img src="images/company/1.png" class="img-responsive" alt="Staffing Spot"></a>-->
                                             <?php //echo  $project['logo'];
                                               $test= $project['fld_logo'];
                                               //echo $test;
                                             ?>
<!--                                            <img src="employer/logo/28939811473416622HJA2PZ.jpg" class="img-responsive" alt="Staffing Spot">-->
                                           
                                            <img src="<?=$test;?>" class="img-responsive" alt="Staffing Spot">
                                        </div>
                                    </div>
                                    <div class="col-md-6 col-sm-6 col-xs-12 nopadding">
        
                                        <div class="job-title-box">                                     
                                        <?php echo $empname; ?> <br><br>
                                        <?php echo $location; ?>  &nbsp; - &nbsp; <?php echo  $location1; ?>
                                        </div>
                                    </div>

                                    <div class="col-md-2 col-sm-3 col-xs-6">
                                        <a href="#">
                                            <div class="job-type jt-remote-color">
                                                <i class="fa fa-clock-o"></i> <?php echo $seek_result['fld_indusType']; ?>
                                                <br/>
                                                <i class="fa fa-user" aria-hidden="true"></i>
                                                <?php 
                                                $exper = explode(",", $seek_result['fld_experience']);
                                                $firstexper = $exper[0];
                                                $secondexper = $exper[1];

                                                if($secondexper=='1')
                                                {
                                                    $yearname = "Year";
                                                }
                                                else
                                                {
                                                    $yearname = "Years";   
                                                }

                                                echo $firstexper."-".$secondexper." ".$yearname;

                                                ?>
                                                
                                            </div>
                                        </a>
                                    </div>
                                    <div class="col-md-2 col-sm-2 col-xs-12 nopadding">
<!--                                        <button  class="btn btn-primary btn-custom">Apply Now</button>-->
                                       
                                    <a href="singlejob.php?jid=<?php echo $seek_result['fld_id'];?>"><input type="button" class="btn btn-default btn-search-submit" value="Apply Now"/></a>

                                    </div>
                                </div>
							<?php }  
							?>
							</ul>
							</div>
							
							 <div class="pagination"></div>
							
							</div>
					   
                        
            
            <?php
				
				}                
                else
                {
                //echo "filters";
                ?>   
              		<div class="load_content" id="load_more_ctnt">
  	       				 
				<?php /*?><h4><center><?php echo $Caprprodsubminicatname1; ?></center></h4><?php */?>
                <?php               
					//echo $groupss;
                    $prodidds123 = array();
                    $select ="select * from postjob where";
                    $orderby = " Order by RAND() Limit 12";                    
                    $refineprodcuts = $select." ".$final.$orderby;
					$refineprodcuts11 = mysql_query($refineprodcuts);                   
                ?>
				
							<div class="panel-body">

							<ul class="joblist">
							<?php
							while($seek_result = mysql_fetch_array($refineprodcuts11))
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
							?>
							<li> <a href="job_details_seek.php?id=<?php echo $id; ?>"> 
							<h4 style="color:#006699"><?php echo $name;?></h4> </a>
							<a href="company_detail.php?empid=<?php echo $empid; ?>"><font style="font-size:15px;"><?php echo $empname;?></font></a>
							<h5><span class="glyphicon glyphicon-map-marker" aria-hidden="true" style="margin-right:5px"></span><?php echo $location1;?></h5>

							<!--<h4 class="clr_both"><small><?php echo substr($desc,0,500)."..."; ?></small></h4>-->
							<h5 class="clr_both">Last Update : <small><?php echo $today; ?></small></h5>

							</li>
							<?php }  
							?>
							</ul>

							</div>
            
            <?php                
				                                       
                }
				?>
                </div>
                 </div>
	
	 <div class="pagination">
	<?php if($total > $dis) { ?>
<ul class="pagination" style="font-weight:bolder;">

<?php if($page_cur>1) { ?>

<li class="disabled" ><a href="suggest_joblist.php?page=<?php echo ($page_cur-1);?>">Prev</a></li>
<?php } else { ?>
<li class="active"><a>Prev</a></li>
<?php } for($i=1;$i<$total_page;$i++) {
	
		if($page_cur==$i)
		{ ?>
        <li class="active"><a><?php echo $i; ?></a></li>
  
  <?php } else { ?>
  <li class="disabled" ><a href="suggest_joblist.php?page=<?php echo $i; ?>"><?php echo $i; ?></a></li>
  
  <?php } }
	if($page_cur<$total_page) {?>
    
    <li class="disabled" ><a href="suggest_joblist.php?page=<?php echo ($page_cur+1); ?>">Next>></a></li>
    <?php } else { ?>
		
		<li class="active" ><a>Next >></a></li>
		<?php } ?>
		 
  
</ul>
<?php } ?>
	 

<div id="myModal" class="modal fade">
        <div class="modal-dialog">
            <div class="modal-content">
                <!-- Content will be loaded here from "remote.php" file -->
            </div>
        </div>
    </div>
</div>
</div>
                   
                </section><!-- /.content -->
            </aside><!-- /.right-side -->
        </div><!-- ./wrapper -->

        <script src="//ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
        <script src="js/bootstrap.min.js" type="text/javascript"></script>
        <!-- AdminLTE App -->
        <script src="js/AdminLTE/app.js" type="text/javascript"></script>
        <!-- AdminLTE for demo purposes -->
        <script src="js/AdminLTE/demo.js" type="text/javascript"></script>
	</div>
	
	<script>
( function( window ) {

'use strict';

var progressElem, statusElem;
var supportsProgress;
var loadedImageCount, imageCount;

window.onload = function() {
  var demo = document.querySelector('#demo');
  var container = demo.querySelector('#linking');
  statusElem = demo.querySelector('#status');
  progressElem = demo.querySelector('progress');

  supportsProgress = progressElem &&
    // IE does not support progress
    progressElem.toString().indexOf('Unknown') === -1;

  demo.querySelector('#add').onclick = function() {
    // add new images
    var fragment = getItemsFragment();
    container.insertBefore( fragment, container.firstChild );
    // use ImagesLoaded
    var imgLoad = imagesLoaded( container );
    imgLoad.on( 'progress', onProgress );
    imgLoad.on( 'always', onAlways );
    // reset progress counter
    imageCount = imgLoad.images.length;
    resetProgress();
    updateProgress( 0 );
  };

  // reset container
  document.querySelector('#reset').onclick = function() {
    empty( container );
  };
};

// ----- set text helper ----- //

var docElem = document.documentElement;
var textSetter = docElem.textContent !== undefined ? 'textContent' : 'innerText';

function setText( elem, value ) {
  elem[ textSetter ] = value;
}

function empty( elem ) {
  while ( elem.firstChild ) {
    elem.removeChild( elem.firstChild );
  }
}

// -----  ----- //

// return doc fragment with
function getItemsFragment() {
  var fragment = document.createDocumentFragment();
  for ( var i = 0; i < 7; i++ ) {
    var item = getImageItem();
    fragment.appendChild( item );
  }
  return fragment;
}

// return an <li> with a <img> in it
function getImageItem() {
  var item = document.createElement('li');
  item.className = 'is-loading';
  var img = document.createElement('img');
  var size = Math.random() * 3 + 1;
  var width = Math.random() * 110 + 100;
  width = Math.round( width * size );
  var height = Math.round( 140 * size );
  var rando = Math.ceil( Math.random() * 1000 );
  // 10% chance of broken image src
  // random parameter to prevent cached images
  img.src = rando < 100 ? '//foo/broken-' + rando + '.jpg' :
    // use lorempixel for great random images
    '//lorempixel.com/' + width + '/' + height + '/' + '?' + rando;
  item.appendChild( img );
  return item;
}

// -----  ----- //

function resetProgress() {
  statusElem.style.opacity = 1;
  loadedImageCount = 0;
  if ( supportsProgress ) {
    progressElem.setAttribute( 'max', imageCount );
  }
}

function updateProgress( value ) {
  if ( supportsProgress ) {
    progressElem.setAttribute( 'value', value );
  } else {
    // if you don't support progress elem
    setText( statusElem, value + ' / ' + imageCount );
  }
}

// triggered after each item is loaded
function onProgress( imgLoad, image ) {
  // change class if the image is loaded or broken
  image.img.parentNode.className = image.isLoaded ? '' : 'is-broken';
  // update progress element
  loadedImageCount++;
  updateProgress( loadedImageCount );
}

// hide status when done
function onAlways() {
  statusElem.style.opacity = 0;
}

})( window );
</script>



					   
							
							
							
                        
            

<div id="myModal" class="modal fade">
        <div class="modal-dialog">
            <div class="modal-content">
                <!-- Content will be loaded here from "remote.php" file -->
            </div>
        </div>
    </div>
</div>
</div>
                   
                </section><!-- /.content -->
            </aside><!-- /.right-side -->
        </div><!-- ./wrapper -->

        <script src="//ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
        <script src="js/bootstrap.min.js" type="text/javascript"></script>
        <!-- AdminLTE App -->
        <script src="js/AdminLTE/app.js" type="text/javascript"></script>
        <!-- AdminLTE for demo purposes -->
        <script src="js/AdminLTE/demo.js" type="text/javascript"></script>
	</div>
	
	<script>
( function( window ) {

'use strict';

var progressElem, statusElem;
var supportsProgress;
var loadedImageCount, imageCount;

window.onload = function() {
  var demo = document.querySelector('#demo');
  var container = demo.querySelector('#linking');
  statusElem = demo.querySelector('#status');
  progressElem = demo.querySelector('progress');

  supportsProgress = progressElem &&
    // IE does not support progress
    progressElem.toString().indexOf('Unknown') === -1;

  demo.querySelector('#add').onclick = function() {
    // add new images
    var fragment = getItemsFragment();
    container.insertBefore( fragment, container.firstChild );
    // use ImagesLoaded
    var imgLoad = imagesLoaded( container );
    imgLoad.on( 'progress', onProgress );
    imgLoad.on( 'always', onAlways );
    // reset progress counter
    imageCount = imgLoad.images.length;
    resetProgress();
    updateProgress( 0 );
  };

  // reset container
  document.querySelector('#reset').onclick = function() {
    empty( container );
  };
};

// ----- set text helper ----- //

var docElem = document.documentElement;
var textSetter = docElem.textContent !== undefined ? 'textContent' : 'innerText';

function setText( elem, value ) {
  elem[ textSetter ] = value;
}

function empty( elem ) {
  while ( elem.firstChild ) {
    elem.removeChild( elem.firstChild );
  }
}

// -----  ----- //

// return doc fragment with
function getItemsFragment() {
  var fragment = document.createDocumentFragment();
  for ( var i = 0; i < 7; i++ ) {
    var item = getImageItem();
    fragment.appendChild( item );
  }
  return fragment;
}

// return an <li> with a <img> in it
function getImageItem() {
  var item = document.createElement('li');
  item.className = 'is-loading';
  var img = document.createElement('img');
  var size = Math.random() * 3 + 1;
  var width = Math.random() * 110 + 100;
  width = Math.round( width * size );
  var height = Math.round( 140 * size );
  var rando = Math.ceil( Math.random() * 1000 );
  // 10% chance of broken image src
  // random parameter to prevent cached images
  img.src = rando < 100 ? '//foo/broken-' + rando + '.jpg' :
    // use lorempixel for great random images
    '//lorempixel.com/' + width + '/' + height + '/' + '?' + rando;
  item.appendChild( img );
  return item;
}

// -----  ----- //

function resetProgress() {
  statusElem.style.opacity = 1;
  loadedImageCount = 0;
  if ( supportsProgress ) {
    progressElem.setAttribute( 'max', imageCount );
  }
}

function updateProgress( value ) {
  if ( supportsProgress ) {
    progressElem.setAttribute( 'value', value );
  } else {
    // if you don't support progress elem
    setText( statusElem, value + ' / ' + imageCount );
  }
}

// triggered after each item is loaded
function onProgress( imgLoad, image ) {
  // change class if the image is loaded or broken
  image.img.parentNode.className = image.isLoaded ? '' : 'is-broken';
  // update progress element
  loadedImageCount++;
  updateProgress( loadedImageCount );
}

// hide status when done
function onAlways() {
  statusElem.style.opacity = 0;
}

})( window );
</script>


</div>
</div>

<?php include 'includes/view_appliedjob.php'; ?>
<?php include "includes/login_popup.php"; ?>
<?php include("includes/footer.php"); ?>


</body>
</html>
<script src="lib_files/code-jquery-com-jquery-1.10.2.js"></script>

<script type="text/javascript"> 
   
    $(document).ready(function(){
         function compress(data)
         {
             alert(data);
            
         data = data.replace(/([^&=]+=)([^&]*)(.*?)&\1([^&]*)/g, "$1$2,$4$3");
         return /([^&=]+=).*?&\1/.test(data) ? compress(data) : data;
          
         }
         function showValues()
         {   
             var str = compress($("#form3").serialize());
             $.ajax({
                     type	: "POST",
                     url	: "suggest_joblist_results.php",
                     data	: {		
                     "formData" : str
                     },
                     datatype : 'html',
                     success: function(data)
                     {	
                         alert(data);
                      $('#rightpanel').html(data);        
                     }
                  });           
           
         }
         $("input[type='checkbox']").on("click",showValues);
         showValues();

     });
 </script> 