<?php
error_reporting(E_ALL ^ E_NOTICE);
error_reporting(E_ERROR);
@include('config.php');
$user_id = $_SESSION['user_id'];

?>
<html lang="en">

    <head>
        <meta http-equiv="content-type" content="text/html;charset=UTF-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta name="description" content="">
        <meta name="author" content="vinformax">
        <title>Staffingspot Job Portal</title>
        <link rel="icon" href="favicon.ico" type="image/x-icon">
        <link rel="stylesheet" href="css/bootstrap.min.css">
        <link href="css/select2.min.css" rel="stylesheet" />
        <link rel="stylesheet" href="css/mega_menu.min.css">
        <link rel="stylesheet" href="css/animate.min.css">
        <link rel="stylesheet" href="css/owl.carousel.css">
        <link rel="stylesheet" href="css/owl.style.css">
        <link rel="stylesheet" href="css/style.css">
        <link rel="stylesheet" href="css/style1.css">
        <link rel="stylesheet" href="css/mobile.css">
        <link rel="stylesheet" type="text/css" href="css/font-awesome.min.css">
        <link rel="stylesheet" href="css/et-line-fonts.css" type="text/css">
        <link href="http://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,900" rel="stylesheet" type="text/css">
        <link href="https://fonts.googleapis.com/css?family=Open+Sans:400,600,700" rel="stylesheet" type="text/css">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/chosen/1.4.2/chosen.css">
        <script src="js/modernizr.js"></script>

        <style>
            #video_div{
                display: none;
            }
            .required{color:red;}
        </style>



    </head>
   
        
    <body>
        <div class="page category-page">



            <?php
            @include("top.php");
            
            if (isset($_POST['upload']) && $_POST['upload'] != '') {
   $date=date('Y-m-d H:i:s');
//data: "resumetitle="+resumetitle+"&resumefile="+resumefile,
$resumetitle = $_REQUEST['resumetitle'];
$allowedExts = array("mp4");
$temp = explode(".", $_FILES["resumefile"]["name"]);
$extension = end($temp);
 
//print_r($_FILES["resumefile"]["type"]);exit;
//print_r($extension);
//print_r($allowedExts);
 $file_size_max = 8388608;
if(($_FILES["resumefile"]["type"] == "video/mp4") && in_array($extension, $allowedExts))
{
    if($_FILES["resumefile"]["size"] < $file_size_max){
if ($_FILES["resumefile"]["error"] > 0) {
echo "Return Code: ".$_FILES["resumefile"]["error"] . "<br>";
} else {
move_uploaded_file($_FILES["resumefile"]["tmp_name"],
"video/" .$_FILES["resumefile"]["name"]);
$upload_resume =  "video/" .$_FILES["resumefile"]["name"];
}

?> <script>
        swal(
                '',
                'Uploaded Successfully!',
                'success'
        )
        $('.swal2-confirm').click(function(){
            window.location.href="self_esteem_video.php";
        });
	</script>
        <?php
//}       

$sekersel = "Select * from tbl_esteem_video where fld_emp_id = '$user_id'";
$sekersel_query = mysql_query($sekersel);  
$countresume = mysql_num_rows($sekersel_query);
if($countresume >=1)
{
    $sekerins = "INSERT INTO tbl_esteem_video(fld_esteem_video,fld_esteem_video_title,fld_emp_id,fld_video_createdon)VALUES('".$upload_resume."','".$resumetitle."','".$user_id."','".$date."')";
    $seek_query = mysql_query($sekerins);  
    header('Location: self_esteem_video.php');
}
else
{
    $sekerins = "INSERT INTO tbl_esteem_video(fld_esteem_video,fld_esteem_video_title,fld_emp_id,fld_status,fld_video_createdon)VALUES('".$upload_resume."','".$resumetitle."','".$user_id."','1','".$date."')";
    $seek_query = mysql_query($sekerins); 
     header('Location: self_esteem_video.php');
}

} else {
    ?> <script>
        swal(
        '',
        'Please provide file size less than 8Mb',
        'warning'
        ) 
        $('.swal2-confirm').click(function(){
            window.location.href="esteem_video.php";
        });
	</script>
        <?php
  
    
} }
 else { ?> <script>
        swal(
            '',
            'Please provide valid file',
            'warning'
          )
        $('.swal2-confirm').click(function(){
            window.location.href="esteem_video.php";
        });
	</script>
        <?php
  
} 
}
            ?>  
            <section class="job-breadcrumb">
                <div class="container">
                    <div class="row">
                        <div class="col-md-6 col-sm-7 co-xs-12 text-left">
                            <h3>Esteem Profile Video</h3>
                        </div>
                        <div class="col-md-6 col-sm-5 co-xs-12 text-right">
                            <div class="bread">
                                <ol class="breadcrumb">
                                    <li><a href="index.php">Home</a> </li>
                                    <li class="active">Esteem Profile Video</li>
                                </ol>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
            <section class="categories-list-page light-grey">
                <div class="container">
                    <div class="row">
                        <div class="col-md-12 col-sm-12 col-xs-12">
                            <div class="col-md-12 col-sm-12 col-xs-12 nopadding">
                                <div id="posts-masonry" class="posts-masonry">
                                    <div class="col-md-6 col-sm-6 col-xs-12">
                                        <div class="blog">
                                            <div class="post-img">
                                                <iframe id="video" width="100%" height="494" src="https://www.youtube.com/embed/J3xibpxieW0" frameborder="0" allowfullscreen></iframe>
                                                <video width="100%" id="video_div" controls>
                                                    <source src="" id="video_here" >                                          
                                                </video>
                                            </div>

                                        </div>
                                    </div>

                                    <div class="col-md-6 col-sm-6 col-xs-12">
                                        <div class="blog">
                                            <h3 class="post-title"> Esteem Profile Description</h3>
                                            <p class="post-excerpt">
                                                We are recently discovered the ability to have a profile video rather than a profile picture. 
                                                As our staffingspot is focusing on video a lot we would also love to implement to increase job seeker profile visibility and strength.
                                            </p>
                                        </div>
                                        <div class="col-md-4 col-sm-4 col-xs-12 nopadding">
                                            <?php
                                            if ($user_id == "") {
                                                ?>   
                                                <a class="btn btn-default" data-toggle="modal" data-target="#myModal"><i class="fa fa-upload"></i> Upload Video</a>
                                                <?php
                                            } else {
                                                ?>
<!--                                                href="self_esteem_video.php?jid=<?php //echo $user_id; ?> "-->
                                                <a id="tester" class="btn btn-default" >Upload Video</a>
                                                <?php
                                            }
                                            ?>

                                        </div>
                                    </div>
                                    <div class="col-md-6 col-sm-6 col-xs-12">
                                        <form method="post"  name="uploadform" id="uploadform" action="" enctype="multipart/form-data">
                                <div class="col-md-12 col-sm-12 nopadding blog-post">
                                   
                                    <div class="preview">
                                        <div class="col-md-6 col-sm-6 col-xs-11 vdo-tit">
                                            <p>
                                                <label>Video Title <span class="required">*</span></label>
                                                <input type="text" name="resumetitle" id="resumetitle" class="form-control" required>
                                            </p>
                                    <p>
                                        <label>Choose Esteem video <span class="required">*</span></label>
                                        <input type="file" name="resumefile" class="file_multi_video" id="resumefile" accept="video/mp4">
                                        <span style="color :#f44242">Accept mp4 format and video size below 8MB only</span>
                                    </p>
                                            <input type="submit" name="upload" id="upload" class="btn btn-default" value="Save">
                                        </div>
                                        <button class="btn btn-default vdo-x vdo-tit" onclick="closeWin()">X</button>
                                    </div>
                                </div>
                                    
                                </form>

                                        
                            </div>


                                   
                        </div>
                              

                    </div>


                </div>
                    </div>
                </div>
            </section>

            <?php
            @include("bottom.php");
            ?>
            <a href="#" class="scrollup"><i class="fa fa-chevron-up"></i></a>
        
   
    <!--   onclick function    -->
            <script>
                $(document).on("change", ".file_multi_video", function (evt) {
                    $('#video_div').css({'display' : 'block'});
                    $('#video').css({'display' : 'none'});
                    var $source = $('#video_here');
                    $source[0].src = URL.createObjectURL(this.files[0]);
                    $source.parent()[0].load();
                });
               
//$(document).ready(function(){
   $(".preview").hide();
      $("#tester").click(function(){
        $(".preview").show();
    });
//});
function closeWin() {
    $(".preview").hide();
    $('#uploadform').trigger("reset");
    $('#video_div').css({'display' : 'none'});
    $('#video').css({'display' : 'block'});
}
</script>
            <!-- JAVASCRIPT JS  -->
        

        
  
            <script type="text/javascript" src="js/jquery-3.1.1.min.js"></script>

            <!-- JAVASCRIPT JS  --> 
            <!--<script type="text/javascript" src="js/jquery-migrate-1.2.1.min.js"></script>-->

            <!-- BOOTSTRAP CORE JS -->
            <script type="text/javascript" src="js/bootstrap.min.js"></script>

            <!-- JQUERY SELECT -->
            <script type="text/javascript" src="js/select2.min.js"></script>

            <!-- MEGA MENU -->
            <script type="text/javascript" src="js/mega_menu.min.js"></script>



            <!-- JQUERY COUNTERUP -->
            <script type="text/javascript" src="js/counterup.js"></script>

            <!-- JQUERY WAYPOINT -->
            <script type="text/javascript" src="js/waypoints.min.js"></script>

            <!-- JQUERY REVEAL -->
            <script type="text/javascript" src="js/footer-reveal.min.js"></script>

            <!-- Owl Carousel -->
            <script type="text/javascript" src="js/owl-carousel.js"></script>

            <!-- FOR THIS PAGE ONLY -->
            <script src="js/imagesloaded.js"></script>
            <script src="js/isotope.min.js"></script>

            <!-- CORE JS -->
            <script type="text/javascript" src="js/custom.js"></script>

            <script type="text/javascript">
                (function ($) {
                    "use strict";
                    $('#posts-masonry').imagesLoaded(function () {
                        $('#posts-masonry').isotope({
                            layoutMode: 'masonry',
                            transitionDuration: '0.3s'
                        });
                    });
                })(jQuery);
                
            </script>

        </div>
    </body>

</html>