<?php
include('config.php');
session_start();

$name = $_SESSION["empuser_name"];
$id = $_SESSION['empuser_id'];

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta http-equiv="content-type" content="text/html;charset=UTF-8" />
    <!--[if IE]>
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
<![endif]-->
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="ScriptsBundle">
    <title>Opportunities A Mega Job Board Template</title>
    <link rel="icon" href="images/favicon.ico" type="image/x-icon">

    <!-- BOOTSTRAPE STYLESHEET CSS FILES -->
    <link rel="stylesheet" href="css/bootstrap.min.css">

    <!-- JQUERY SELECT -->
    <link href="css/select2.min.css" rel="stylesheet" />

    <!-- JQUERY MENU -->
    <link rel="stylesheet" href="css/mega_menu.min.css">

    <!-- ANIMATION -->
    <link rel="stylesheet" href="css/animate.min.css">

    <!-- OWl  CAROUSEL-->
    <link rel="stylesheet" href="css/owl.carousel.css">
    <link rel="stylesheet" href="css/owl.style.css">

    <!-- TOASTER CSS -->
    <link rel="stylesheet" href="css/toastr.min.css">
<link rel="stylesheet" href="css/jquery.tagsinput.min.css">
    <!-- TEMPLATE CORE CSS -->
    <link rel="stylesheet" href="css/style.css">

    <!-- FONT AWESOME -->
    <link rel="stylesheet" type="text/css" href="css/font-awesome.min.css">
    <link rel="stylesheet" href="css/et-line-fonts.css" type="text/css">

    <!-- Google Fonts -->
    <link href="http://fonts.googleapis.com/css?family=Source+Sans+Pro:400,600,700,900,300" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:400,600,700" rel="stylesheet" type="text/css">
	
    <!-- JavaScripts -->
    <script src="js/modernizr.js"></script>
	
    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
        <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
<![endif]-->

<script src="//cdn.ckeditor.com/4.5.5/standard/ckeditor.js"></script>
    <style>
        .Exp{margin-left: -30px;}
        .expyr{width: 130px;}
        .Expyr1{width: 123px;margin-left: -33px;}
        .nav > li > a{font-size: 20px;}
        .fcolr{color: black;}
    </style>

</head>

<body>
    <div class="page category-page">
        <div id="spinner">
            <div class="spinner-img">
                <img alt="Opportunities Preloader" src="images/loader.gif" />
                <h2>Please Wait.....</h2>
            </div>
        </div>

        <?php @include("top.php");?>
        <div class="clearfix"></div>
		<div class="clearfix"></div>
     

        <section class="company-dashboard">
            <div class="container">
                <div class="row">
                    <div class="col-md-12 col-sm-12 col-xs-12 nopadding">
                        <div class="dashboard-header">
                            <div class="col-md-6 col-sm-6 col-xs-12">
                                <div class="dashboard-header-logo-box">
                                    <div class="company-logo">
                                        <?php $sql="select * from tbl_employer_details where fld_empid=$id";
                                        
                                       // echo $sql;
                                        $result=mysql_query($sql);
                                        while($rows= mysql_fetch_assoc($result))
                                                {
                                                    $empname = $rows['fld_employer_name'];
                                            
                                       //print_r($rows);
                                        
                                            
                                            ?>
                                        <img src="<?php echo $rows['fld_logo']?>" alt="" class="img-responsive center-block "></a>
                                                
                                       
                                    </div>
                                    <h3><?php  echo $rows['fld_employer_name']?></h3>
                                    <p><?php  echo $rows['fld_address']?></p>
                                    <?php }?>
                                    <ul class="social-links list-inline">
                                        <li> <a href="#"><i class="icon-facebook"></i></a></li>
                                        <li> <a href="#"><i class="icon-twitter"></i></a></li>
                                        <li> <a href="#"><i class="icon-googleplus"></i></a></li>
                                        <li> <a href="#"><i class="icon-linkedin"></i></a></li>
                                    </ul>
                                </div>
                            </div>
                            <div class="col-md-3 col-sm-3 col-xs-12">
                                <div class="rad-info-box">
                                    <i class="icon icon-profile-male"></i>
                                    <span class="title-dashboard">Followers</span>
                                    <span class="value"><span>450M</span></span>
                                </div>
                                <?php
                                $todayydate = date('Y-m-d H:i:s', strtotime('-5 days'));                                
                                $sql1="SELECT count(fld_id),`fld_keyskills` FROM `tbl_postjob` WHERE `fld_empid` in(select fld_empid from tbl_employer_details where fld_empid=$id)";                                        
                                    $result1=mysql_query($sql1);
                                    while($row=mysql_fetch_assoc($result1)) 
                                   {
                                        $postedcountid = $row['count(fld_id)'];
                                        $key = $row['fld_keyskills'];
                                        $array_keys=explode(",",$key);                                       
                                        $sum=0;
                                          foreach ($array_keys as $array_key)
                                          {
                                               $array_key1 = trim($array_key);
                                               $sql="(SELECT count(fld_id) FROM `tbl_seeker_profess` WHERE fld_keyskills like '%$array_key1%' and fld_created_date > '$todayydate')";
                                               $result=mysql_query($sql);                                                      
                                               while($rows=mysql_fetch_assoc($result))
                                               {                                                       
                                               $sum += $rows['count(fld_id)'];                                                                  
                                               }                                                  
                                          }
                                    }                                       
                                       
                                        ?>
                                       
                                <div class="rad-info-box">
                                    <i class="icon icon-presentation"></i>
                                    <span class="title-dashboard">Jobs Posted</span>
                                    <span class="value"><span><?php echo $postedcountid; ?></span></span>
                                </div>
                            </div>
                             <?php 
                            // echo "select '*' from postjob where keyskills='".$row['keyskills']."'";
//                             $sql12="SELECT * FROM `seeker_profess`  WHERE `keyskills` in(select '*' from postjob where keyskills='".$row['keyskills']."' ) ";
//                             echo "SELECT count(*) FROM `seeker_profess`  WHERE `keyskills` in(select 'keyskills' from postjob where keyskills='".$row['keyskills']."' ) ";
//                                       $result1=mysql_query($sql12);
//                                   while($row12=mysql_fetch_assoc($result12)) 
//                                        {
//                                      $key=$row12['keyskills'];
//                                        echo $key;
//                                      }
//                                    
                             ?>
                            
                            <div class="col-md-3 col-sm-3 col-xs-12">
                                <div class="rad-info-box">
                                    <i class="icon icon-documents"></i>
                                    
                                    <span class="title-dashboard">New resume</span>
                                    <span class="value"><span><?php echo $sum;?></span></span>
                                       </div>
                                <div class="rad-info-box rad-txt-success">
                                    <i class="icon icon-briefcase"></i>
                                    <span class="title-dashboard">Hired</span>
                                    <span class="value"><span>6500</span></span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <section class="dashboard-body">
            <div class="container">
                <div class="row">
                    <div class="col-md-12 col-sm-12 col-xs-12">
                        <div class="col-md-4 col-sm-4 col-xs-12">
                            <div class="profile-nav">
                                <div class="panel">
                                    <ul class="nav nav-pills nav-stacked">
                                        <li class="active">
                                            <a href="company-dashboard.php"> <i class="fa fa-user"></i> Dashboard</a>
                                        </li>
                                        <li>
                                            <a href="company-dashboard-edit-profile.php"> <i class="fa fa-edit"></i> Edit Profile</a>
                                        </li>
                                        <li>
                                            <a href="company-dashboard-resume.php"> <i class="fa fa-file-o"></i>Resume </a>
                                        </li>
                                        <li>
                                            <a href="postjob.php"> <i class="fa fa-list-ul"></i> Post Jobs</a>
                                        </li>
                                        <li>
                                            <a href="company-dashboard-active-jobs.php"> <i class="fa  fa-list-ul"></i> Active Jobs</a>
                                        </li>
                                        <li>
                                            <a href="company-dashboard-featured-jobs.php"> <i class="fa  fa-list-alt"></i> Featured Jobs</a>
                                        </li>
                                        <li>
                                            <a href="company-dashboard-followers.php"> <i class="fa  fa-bookmark-o"></i> Followers </a>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-8 col-sm-12 col-xs-12">
                        <div class="Heading-title-left black small-heading">
                            <h3>Post A New job</h3>
                            <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor.At vero eos et accusamus et iusto odio dignissimos ducimus qui blanditiis praesentium</p>
                        </div>
                        <div class="post-job2-panel">
                            <form class="row" id="form123" enctype="multipart/formdata" method="post" action="">
                                <div class="col-md-6 col-sm-6 col-xs-12">
                                    <div class="form-group">
                                        <label>Job Title</label>
                                        <input type="text" placeholder="Job Title" id="title" class="form-control" style="height:47px">
                                    </div>
                                </div>
                                <div class="col-md-6 col-sm-6 col-xs-12">
                                    <div class="form-group">
                                        <label>Location</label>
                                              
<select id="city" class="questions-category form-control"  multiple="true">
    <?php
   $sql="select fld_name from tbl_cities";
   $res=mysql_query($sql);  
   while($rows=mysql_fetch_assoc($res))           
   {   
   ?>
   <option  value="<?php echo $rows['fld_name'];?>" ><?php echo $rows['fld_name'];?></option><?php
    

   }  ?>
    </select>
               
                                    </div>
                                </div>
                              
                                <div class="col-md-12 col-sm-12 col-xs-12">
                                    <div class="form-group">
                                        <label>Industry Type</label>
                                        
                                       
                                        <select id="type" class="questions-category form-control" multiple="multiple">
                                            <?php 
                                        $sql="select * from `tbl_industry_type`";
                                        $res=mysql_query($sql);
                                            while($row=mysql_fetch_assoc($res))
                                        {
                                        ?>
                                             <option value="<?php echo $row['fld_industrytype'] ?>"><?php echo $row['fld_industrytype'] ?></option>
                                            
                                        
                                        <?php }?></select>
                                    </div>
                                </div>
                                <div class="col-md-12 col-sm-12 col-xs-12">
                                    <div class="form-group">
                                        <label>Functional Area</label>
                                        <select id="area" class="questions-category form-control" multiple="multiple">
                                             <?php 
                                        $sql="select * from `tbl_funtional_area`";
                                        $res=mysql_query($sql);
                                            while($row=mysql_fetch_assoc($res))
                                        {
                                        ?>
                                             <option value="<?php echo $row['fld_fuctionalarea'] ?>"><?php echo $row['fld_fuctionalarea'] ?></option>
                                            
                                        
                                        <?php }?>
                                            
                                        </select>
                                    </div>
                                </div>
                                 <div class="col-md-6 col-sm-6 col-xs-12">
                                    <div class="form-group">
                                        <label>Role </label>
                                        <select   id="role"class="questions-category form-control">
                                            <?php 
                                             $sql="select * from `tbl_role`";
                                        $res=mysql_query($sql);
                                            while($row=mysql_fetch_assoc($res))
                                        {
                                        ?>
                                             <option value="<?php echo $row['fld_role'] ?>"><?php echo $row['fld_role'] ?></option>
                                            
                                        
                                        <?php }?>
                                            
                                        </select>
                                    </div>
                                </div>
                                <div class="col-md-6 col-sm-6 col-xs-12">
                                    <div class="form-group">
                                        <label>Job Type</label>
                                        <select id="jobtype" class="questions-category form-control">
                                            <option value="Full Time">Full Time</option>
                                            <option value="Part Time">Part Time</option>
                                            <option value="Remote">Remote</option>
                                            <option value="Freelancer">Freelancer</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="clearfix"></div>
                                <div class="col-md-6 col-sm-6 col-xs-12">
                                    
                                    <div class="form-group">
                                        <label>Job Experience</label>
                                        <div class="col-md-12 col-sm-12 col-xs-12 Exp">
                                            
                                            <div class="col-md-3 col-sm-3 col-xs-12">
                                                <select  id="exp" class="questions-category form-control">
                                            <option value="0">0</option>
                                            <option value="1">1 </option>
                                            <option value="2">2 </option>
                                            <option value="3">3 </option>
                                            <option value="1">4 </option>
                                            <option value="2">5 </option>
                                            <option value="3">6+ </option>
                                        </select>
                                           </div>
                                            <div class="col-md-3 col-sm-3 col-xs-12">
                                        <label style="margin-top:10px;margin-left: -20px;">year</label>
                                           </div> 
                                            <div class="col-md-3 col-sm-3 col-xs-12"> <select id="exp1" class="questions-category form-control" >
                                            <option value="0">0</option>
                                            <option value="1">1 </option>
                                            <option value="2">2 </option>
                                            <option value="3">3 </option>
                                            <option value="4">4 </option>
                                            <option value="5">5 </option>
                                            <option value="6">6</option>
                                            <option value="2">7 </option>
                                            <option value="3">8</option>
                                            <option value="4">9 </option>
                                            <option value="5">10 </option>
                                            <option value="6">11</option>
                                            
                                            
                                        
                                        </select>
                                             </div>
                                            
                                             <div class="col-md-3 col-sm-3 col-xs-12">
                                        <label style="margin-top:10px;margin-left: -20px;" >month</label>
                                           </div> 
                                        </div>
                                       
                                       
                                        
                                    </div>
                                </div>
                                
                                
                                <div class="col-md-6 col-sm-6 col-xs-12">
                                    
                                    <div class="form-group">
                                        <label>Expected Salary</label>
                                        <div class="col-md-12 col-sm-12 col-xs-12 Exp">
                                            
                                            <div class="col-md-3 col-sm-3 col-xs-12">
                                                <select id="expyr" class="questions-category form-control">
                                            <option value="1">1</option>
                                            <option value="2">2</option>
                                            <option value="3">3</option>
                                            <option value="4">4</option>
                                            <option value="5">5</option>
                                            <option value="6">6</option>
                                            <option value="7">7</option>
                                             <option value="8">8</option>
                                              <option value="9">9</option>
                                              
                                        </select>
                                               
                                           </div>
                                            <div class="col-md-2 col-sm-2 col-xs-12">
                                        <label style="margin-top:10px;margin-left: -20px;">Lacs</label>
                                           </div> 
                                            <div class="col-md-5 col-sm-5 col-xs-12 Expyr1">  <select id="expyr1" class="questions-category form-control">
                                           
                                            <option value="10,000">10,000 +</option>
                                            <option value="20,000">20,000 +</option>
                                            <option value="30,000">30,000 +</option>
                                            <option value="40,000">40,000 +</option>
                                            <option value="50,000 ">50,000 +</option>
                                            <option value="60,000">60,000 +</option>
                                            
                                        </select>
                                             </div>
                                            
                                             <div class="col-md-2 col-sm-2 col-xs-12">
                                        <label style="margin-top:10px;margin-left: -20px;" >Thousands</label>
                                           </div> 
                                        </div>
                                       
                                       
                                        
                                    </div>
                                </div>
                                
                                
                                
                                
                               
                                <div class="col-md-12 col-sm-12 col-xs-12">
                                    <div class="form-group">
                                        <label>Keywords</label>
                                        <input type="text" id="tags" value="software ,laravel, html" class="form-control" data-role="tagsinput">
                                    </div>
                                </div>
                                <div class="col-md-12 col-sm-12 col-xs-12">
                                    <div class="form-group">
                                        <label>Job Detials</label>
                                        <textarea name="ckeditor" class="ckeditor" id="ckeditor"></textarea>
                                    </div>
                                </div>
                                <div class="col-md-12 col-sm-12 col-xs-12">
                                    <input type='button' class="btn btn-default pull-right" id="postjob" onClick="fn_post(<?php echo 1;?>)"value="Post Job" >             
                                </div>
                            </form>
                        </div>
                    </div>                   
                    </div>
                </div>
            </div>
        </section>

       <?php @include("bottom.php");?>



            <script>
             function fn_post(updateid)
                {
                var title = $("#title").val();
                var city = $("#city").val();
                var type = $("#type").val();
                var area = $("#area").val();
                var role = $("#role").val();
                var exp = $("#exp").val();
                var exp1 = $("#exp1").val();
                var expyr = $("#expyr").val();
                var expyr1 = $("#expyr1").val();
                var ckeditor = CKEDITOR.instances['ckeditor'].getData()
                var jobtype = $("#jobtype").val();
                var tags=$("#tags").val();
               
                if(title == ""){            
                $("#title").focus();
                return false;
                }       
                else if(city == ""){            
                $('#infoerror').css('background-color', 'gray');
                $('#infoerror').css('color', '#fff');
                $("#infoerror").css("display", "block");
                $("#infoerror").html("Please Select Quarter!");
                $("#city").focus();
                return false;           
                }       
                else if(type == ""){
                $('#infoerror').css('background-color', 'gray');
                $('#infoerror').css('color', '#fff');
                $("#infoerror").css("display", "block");
                $("#infoerror").html("Please Select the Date!");
                $("#type").focus();
                return false;           
                }   
                else if(area == ""){
                $('#infoerror').css('background-color', 'gray');
                $('#infoerror').css('color', '#fff');
                $("#infoerror").css("display", "block");
                $("#infoerror").html("Please Select the Date!");
                $("#type").focus();
                return false;           
                }   
                else if(role == ""){
                $('#infoerror').css('background-color', 'gray');
                $('#infoerror').css('color', '#fff');
                $("#infoerror").css("display", "block");
                $("#infoerror").html("Please Select the Date!");
                $("#type").focus();
                return false;           
                }   else if(exp == ""){
                $('#infoerror').css('background-color', 'gray');
                $('#infoerror').css('color', '#fff');
                $("#infoerror").css("display", "block");
                $("#infoerror").html("Please Select the Date!");
                $("#type").focus();
                return false;           
                }   
                else if(exp1 == ""){
                $('#infoerror').css('background-color', 'gray');
                $('#infoerror').css('color', '#fff');
                $("#infoerror").css("display", "block");
                $("#infoerror").html("Please Select the Date!");
                $("#type").focus();
                return false;           
                }   
                else if(expyr == ""){
                $('#infoerror').css('background-color', 'gray');
                $('#infoerror').css('color', '#fff');
                $("#infoerror").css("display", "block");
                $("#infoerror").html("Please Select the Date!");
                $("#type").focus();
                return false;           
                }   
                else if(expyr1 == ""){
                $('#infoerror').css('background-color', 'gray');
                $('#infoerror').css('color', '#fff');
                $("#infoerror").css("display", "block");
                $("#infoerror").html("Please Select the Date!");
                $("#type").focus();
                return false;           
                }   
                
//                
                else
                {
                        $("#infoerror").css("display", "none"); 
                        $("#divmsgbox").html("<div class='msgboxinfo'><img src='ajax-loaderdrop.gif'/></div>");                 
                        //alert(updateid);
                                $.ajax({
                           type: "POST",
                           url: "featured-jobs.php?op=addinfo",
                           //data: "infoupdateid="+updateid+"&info="+investinfodetails+"&linkurl="+linkurl+"&infodate="+infodate,
                          // data : {infoupdateid: updateid , info: investinfodetails, linkurl: linkurl, infodate: infodate},
                           data : {title: title, city: city , type: type, area: area, role: role, exp1: exp1,exp: exp, expyr: expyr, expyr1: expyr1, tags: tags, jobtype: jobtype, ckeditor: ckeditor},
                           success: function(data){ 
                               alert(data);
                               //window.Location('company-dashboard-featured-jobs.php');
                               $(location).attr('href', 'company-dashboard-featured-jobs.php');
                                //alert(data);
                               // location.reload();
//                                $("#infoerror").css("display", "block");
//                                $("#infoerror").html("Investor Details are Updated Succesfully");
//                                //$("#form1").trigger('reset');               
//                                $("#results").load("fetch_pages_investor_info.php");
//                                $("#infodetailslisting").load(window.location + " #infodetailslisting");
//                                $("#newinfodetailsinside").load(window.location + " #newinfodetailsinside");
//                               
                                                               
                                
                           },
                           
                         });
                }
}

       </script>
        

        <a href="#" class="scrollup"><i class="fa fa-chevron-up"></i></a>

        <!-- JAVASCRIPT JS  -->
        <script type="text/javascript" src="js/jquery-3.1.1.min.js"></script>
    
    <!-- JAVASCRIPT JS  --> 
    <script type="text/javascript" src="js/jquery-migrate-1.2.1.min.js"></script>

        <!-- BOOTSTRAP CORE JS -->
        <!--<script type="text/javascript" src="js/bootstrap.min.js"></script>-->

        <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js"></script>

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

        <!-- TOASTER JS -->
        <script type="text/javascript" src="js/toastr.min.js"></script>

        <!-- CORE JS -->
        <script type="text/javascript" src="js/custom.js"></script>

         <script type="text/javascript" src="js/jquery.tagsinput.min.js"></script>
        <script type="text/javascript">
            $('#tags').tagsInput({
                width: 'auto'
            });
        </script>
         <script type="text/javascript" src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCVj6yChAfe1ilA4YrZgn_UCAnei8AhQxQ&amp;sensor=false"></script>
        <script type="text/javascript" src="js/map.js"></script>

        <script type="text/javascript">
            toastr.options = {
                "closeButton": true,
                "positionClass": "toast-bottom-right",
                "showMethod": "fadeIn",
                "hideMethod": "fadeOut"
            }
            toastr["success"]("You Got <?php echo $sum;?> New Resumes", "Hello <?php echo $empname; ?>", {
                timeOut: 9000
            })
        </script>



    </div>
</body>
</html>