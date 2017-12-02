<?php
session_start();
error_reporting(0);
//echo 'karthik'.$_POST['formData'];
include("config.php");
echo $_GET['experience'];

if ( $_REQUEST['Jobtype']!= '' ||  $_REQUEST['exp']!= '') {
    
    
    $Jobtype=$_REQUEST['Jobtype'];
        $exp=$_REQUEST['exp'];
       //echo $Jobtype;
        //echo $exp;
    
}
//echo 'karthik'.$frmresults;
if (isset($_POST['formData'])) {
    $frmresults      = $_POST['formData'];
    //echo 'karthik'.$frmresults;
    //echo $frmresults = explode("MANGESH",$_POST['formData']);
    $splittedstringg = explode("&", $frmresults);
    
    $splittedstringg11  = str_replace('+', ' ', $frmresults);
    //echo $splittedstringg11;
    $splittedstringg111 = str_replace('', ' & ', $splittedstringg11);
    $connt              = count($splittedstringg);
    //echo 'jhuoghuouo'.$connt;
    
    if ($connt != 1) {
        $first  = str_replace("=", " in ('", $splittedstringg111);
        $second = str_replace(",", "','", $first);
        $third  = str_replace("&", "') and ", $second);
        $final  = $third . "')";
        //echo $second = str_replace("&",") and ",$first);
    } else {
        $first  = str_replace("=", " in ('", $splittedstringg111);
        $second = str_replace(",", "','", $first);
        $final  = $second . "')";
    }
    
    //echo $third = $second.")";
    
    
    //$splittedstringg=explode("&",$frmresults);
    //$splittedstringg1 = str_replace('+',' ',$splittedstringg);
    //$splittedstringq = str_replace('&',' and ',$splittedstringg1);
    //$splittedstring = str_replace('%26',' & ',$splittedstringq);
    
    //$cnnt = count($splittedstring);
    //echo $cnnt;
    
    //echo $_SESSION['size'] = $_GET['speclfiltrs'];
}
?>


    <div class="col-md-12 top_space nopadding" >
    

          
                <?php
//echo 'uguiguiguguigugugugug'.$frmresults;
if ($frmresults =="") {
   //echo "empty";
?>  
                                        <div class="all-jobs-list-box" id="rightpanel12">
                                    <?php
if ($Jobtype!=' ') {
    
$records1 .= "sp.fld_jobtype  like '%$Jobtype%' ";
//$records1 .= "tp.fld_location like '%$city11%' OR ";
}
if ($exp!=' ') {
    
$records11 .= "sp.fld_experience like '%$exp%' OR ";
//$records11 .= "tp.fld_keyskills  like '%$skill11%' OR ";
}
//$records1 = substr($records1, 0, -3);
//
//foreach ($type1 as $type11) {
//    $records11 .= "sp.fld_jobtype like '%$type11%' OR ";
//    //$records11 = substr($records11, 0, -3);
//}
//$sql111 = substr($sql, 0, -3);

if ($exp != '' && $Jobtype == '') {
    //echo "dju9hbvi";
    $sql = "select * from tbl_seeker_profess sp join tbl_jobseeker_details tj on sp.fld_seekerid=tj.fld_js_id join tbl_jobseeker js on js.fld_id=tj.fld_js_id   WHERE $records11";
    //echo '1st'.$sql;
    
    $sql111 = substr($sql, 0, -3);
    // $count=count($sql111);
    //echo "1st".$sql = substr_replace($sql1, "", -1);
}
if ($Jobtype != '' && $exp == '') {
    $sql = "select * from tbl_seeker_profess sp join tbl_jobseeker_details tj on sp.fld_seekerid=tj.fld_js_id join tbl_jobseeker js on js.fld_id=tj.fld_js_id  WHERE $records1";
    //echo '2nd'.$sql;
    $sql111 = substr($sql, 0, -3);
}

if ($exp != '' && $Jobtype != '') {
     $sql = "select * from tbl_seeker_profess sp join tbl_jobseeker_details tj on sp.fld_seekerid=tj.fld_js_id join tbl_jobseeker js on js.fld_id=tj.fld_js_id  WHERE $records1  AND $records11";
     $sql111 = substr($sql, 0, -3);
    
}

//$sql = "select * from tbl_employer_details ed join tbl_postjob tp  on ed.fld_empid=tp.fld_empid WHERE $records1";
//echo "final".$sql = rtrim($sql, 'OR');                          
$sql111 = substr($sql, 0, -3);


$records = mysql_query($sql111);
//$count=count($records);
?>        
                                    <?php
$projects = array();
while ($project = mysql_fetch_assoc($records)) {
    $projects[] = $project;
}
$r = 0;
foreach ($projects as $project) {
    $r++;
?>
                                            <div class="job-box">
                                            <div class="col-md-2 col-sm-2 col-xs-12 hidden-xs hidden-sm">

                                                <div class="comp-logo">
        <!--                                            <a href="#"> <img src="images/company/1.png" class="img-responsive" alt="Staffing Spot"></a>-->
                                        <?php
    //echo  $project['logo'];
    $test = $project['fld_profilepic'];
    //echo $test;
?>
      <!--                                            <img src="employer/logo/28939811473416622HJA2PZ.jpg" class="img-responsive" alt="Staffing Spot">-->
<?php// echo 'karthik'.$test;?>
                                                    <img src="images/profilepic/<?php echo $test; ?>" class="img-responsive" alt="Staffing Spot">
                                                </div>
                                            </div>
                                            <div class="col-md-4 col-sm-4 col-xs-12 nopadding">

                                                <div class="job-title-box">                                    
                                        <?php
    echo $project['fld_name'];
?> <br><br>
                                        <?php
    echo $project['fld_email'];
?>  &nbsp; - &nbsp; <?php
    echo $project['fld_mobile'];
?>
                                              </div>
                                            </div>

                                            <div class="col-md-4 col-sm-4 col-xs-6">
                                                <a href="#">
                                                    <div class="job-type jt-remote-color">
                                                         <?php
    echo $project['fld_resumetitle'];
?>
                                                      <br/>
                                                        <i class="fa fa-user" aria-hidden="true"></i>
    <?php
    $exper       = explode(",", $project['fld_experience']);
    $firstexper  = $exper[0];
    $secondexper = $exper[1];
    
    if ($secondexper == '1') {
        $yearname = "Year";
    } else {
        $yearname = "Years";
    }
    
    echo $firstexper . "-" . $secondexper . " " . $yearname;
?>

                                                    </div>
                                                </a>
                                            </div>
                                            <div class="col-md-2 col-sm-2 col-xs-12 nopadding">
                                                <!--                                        <button  class="btn btn-primary btn-custom">Apply Now</button>-->

                                                <a href="user-dashboard.php?jid=<?php
    echo $project['fld_id'];
?>"><input type="button" class="btn btn-default btn-search-submit" value="HIRE"/></a>

                                            </div>
                                        </div>
                                      
    <?php
}
?>
                                 
                                </div>
                      
                        
            
            <?php
    
} else {
    
?>  
                      <div class="load_content" id="load_more_ctnt">
                              
                <?php
    /*?><h4><center><?php echo $Caprprodsubminicatname1; ?></center></h4><?php */
?>
               <?php
    //echo $groupss;
    $prodidds123      = array();
    $select           = "select * from tbl_seeker_profess sp join tbl_jobseeker_details tj on sp.fld_seekerid=tj.fld_js_id join tbl_jobseeker js on js.fld_id=tj.fld_js_id where ";
    $orderby          = " Order by RAND() Limit 12";
    $refineprodcuts   = $select . " " . $final . $orderby;
    echo $refineprodcuts;
    $refineprodcuts11 = mysql_query($refineprodcuts);
?>
               
                            <div class="panel-body nopadding">

                            <ul class="joblist nopadding">
                            <?php
    
$projects = array();
while ($project = mysql_fetch_assoc($refineprodcuts11)) {
    $projects[] = $project;
}
$r = 0;
foreach ($projects as $project) {
    $r++;
?>
                                      <div class="job-box">
                                            <div class="col-md-2 col-sm-2 col-xs-12 hidden-xs hidden-sm">

                                                <div class="comp-logo">
        <!--                                            <a href="#"> <img src="images/company/1.png" class="img-responsive" alt="Staffing Spot"></a>-->
                                        <?php
    //echo  $project['logo'];
    $test = $project['fld_profilepic'];
    //echo $test;
?>
      <!--                                            <img src="employer/logo/28939811473416622HJA2PZ.jpg" class="img-responsive" alt="Staffing Spot">-->
<?php// echo 'karthik'.$test;?>
                                                    <img src="images/profilepic/<?php echo $test; ?>" class="img-responsive" alt="Staffing Spot">
                                                </div>
                                            </div>
                                            <div class="col-md-4 col-sm-4 col-xs-12 nopadding">

                                                <div class="job-title-box">                                    
                                        <?php
    echo $project['fld_name'];
?> <br><br>
                                        <?php
    echo $project['fld_email'];
?>  &nbsp; - &nbsp; <?php
    echo $project['fld_mobile'];
?>
                                              </div>
                                            </div>

                                            <div class="col-md-4 col-sm-4 col-xs-6">
                                                <a href="#">
                                                    <div class="job-type jt-remote-color">
                                                         <?php
    echo $project['fld_resumetitle'];
?>
                                                      <br/>
                                                        <i class="fa fa-user" aria-hidden="true"></i>
    <?php
    $exper       = explode(",", $project['fld_experience']);
    $firstexper  = $exper[0];
    $secondexper = $exper[1];
    
    if ($secondexper == '1') {
        $yearname = "Year";
    } else {
        $yearname = "Years";
    }
    
    echo $firstexper . "-" . $secondexper . " " . $yearname;
?>

                                                    </div>
                                                </a>
                                            </div>
                                            <div class="col-md-2 col-sm-2 col-xs-12 nopadding">
                                                <!--                                        <button  class="btn btn-primary btn-custom">Apply Now</button>-->

                                                <a href="user-dashboard.php?jid=<?php
    echo $project['fld_id'];
?>"><input type="button" class="btn btn-default btn-search-submit" value="HIRE"/></a>

                                            </div>
                                        </div>
    <?php
}
?>
                                 
                           </ul>

                            </div>
            
            <?php
    
}
?>
               </div>
                 </div>
    
     <div class="pagination">
    <?php
if ($total > $dis) {
?>
<ul class="pagination" style="font-weight:bolder;">

<?php
    if ($page_cur > 1) {
?>

<li class="disabled" ><a href="suggest_joblist.php?page=<?php
        echo ($page_cur - 1);
?>">Prev</a></li>
<?php
    } else {
?>
<li class="active"><a>Prev</a></li>
<?php
    }
    for ($i = 1; $i < $total_page; $i++) {
        
        if ($page_cur == $i) {
?>
       <li class="active"><a><?php
            echo $i;
?></a></li>
  
  <?php
        } else {
?>
 <li class="disabled" ><a href="suggest_joblist.php?page=<?php
            echo $i;
?>"><?php
            echo $i;
?></a></li>
  
  <?php
        }
    }
    if ($page_cur < $total_page) {
?>
   
    <li class="disabled" ><a href="suggest_joblist.php?page=<?php
        echo ($page_cur + 1);
?>">Next>></a></li>
    <?php
    } else {
?>
       
        <li class="active" ><a>Next >></a></li>
        <?php
    }
?>
       
  
</ul>
<?php
}
?>
   

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