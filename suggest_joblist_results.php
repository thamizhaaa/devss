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
//echo $page_cur;
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
//echo $frmresults;
//echo $frmresults = explode("MANGESH",$_POST['formData']);
$splittedstringg=explode("&",$frmresults);
$splittedstringg11 = str_replace('+',' ',$frmresults);
$splittedstringg111 = str_replace(' %26 ',' & ',$splittedstringg11);
$connt = count($splittedstringg);
echo 'karthik'.$connt;

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


    <div class="col-md-7 top_space" >
	
<div class="panel panel-default">
<div class="panel-heading"><h2 class="panel-title">Suggested Jobs for you</h2></div>
</div>

           
                <?php
               // echo 'uguiguiguguigugugugug'.$frmresults;
                if($frmresults=="")
                {     
				
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

