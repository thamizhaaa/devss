<?php
include('config.php');
$getmail = base64_decode($_GET['email']);
//$url = $_SERVER[PHP_SELF];
//$urlary = explode("?",$url);
//$urlend = end($urlary);	
//echo $urlend;
//echo $url;
//echo $getmail;
?>

<html lang="en">
<head>
    <meta http-equiv="content-type" content="text/html;charset=UTF-8" />   
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="vinforma">
    <title>Post Job | Employer | Staffingspot | Job Portal</title>
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
    
    <!-- JAVASCRIPT JS  -->
        <script type="text/javascript" src="js/jquery-3.1.1.min.js"></script>
    
    <!-- JAVASCRIPT JS  --> 
    <script type="text/javascript" src="js/jquery-migrate-1.2.1.min.js"></script>

      

</head>

<body>
     <?php   
@include("top.php");

?>
    <div class="page category-page">
        <div id="spinner">
            <div class="spinner-img">
                <img alt="Staffing Spot - the spot for your career" src="images/loader.svg" />
                <h2>Please Wait...</h2>
            </div>
        </div>
<section class="job-breadcrumb">
            <div class="container">
                <div class="row">
                    <div class="col-md-6 col-sm-7 co-xs-12 text-left">
                        <h3>Forgot Password</h3>
                    </div>
                    <div class="col-md-6 col-sm-5 co-xs-12 text-right">
                        <div class="bread">
                            <ol class="breadcrumb">
                                <li><a>Home</a></li>
                                <li class="active">Forgot Password</li>
                            </ol>
                        </div>
                    </div>
                </div>
            </div>
        </section>
      
     
       
        
        <section class="dashboard-body">
            <div class="container">
                <div class="row">
                    <div class="col-md-12 col-sm-12 col-xs-12">
                     
                        <div class="col-md-8 col-sm-12 col-xs-12" id="postjobtab">
                        <div class="Heading-title-left black small-heading">
                            <h3>Forgot Password</h3>                          
                        </div>
                        <div class="post-job2-panel">
                            <form class="row" id="form123" name="forgotpass" enctype="multipart/formdata" method="post">
                           
                            <div class="form-group">
                                    <label for="password" class="col-sm-3 control-label">
                                       New Password</label>
                                    <div class="col-sm-10">
                                        <input type="password" class="form-control" id="newpass" name="newpass" placeholder="Enter New Password" />
                                    </div>
                            </div>
                            <div class="form-group">
                                    <label for="password" class="col-sm-3 control-label">
                                       Confirm New Password</label>
                                    <div class="col-sm-10">
                                        <input type="password" class="form-control" id="confirmpass" name="confirmpass" placeholder="Enter Confirm New Password" />
                                    </div>
                            </div>
                                
				<div class="form-group">
                                    <div class="col-sm-2">
                                    </div>
                                    <div class="col-sm-10" style="margin-top:2%">                                     
											
				    <button type="submit" id="fp_btn" class="btn btn-primary">Reset</button>
                                             
                                    </div>
				</div>
                            </form>
                        </div>
                    </div>      

                    

                    </div>
                </div>
            </div>
        </section>

       <?php @include("bottom.php");?>

    </div>      

       

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
        
      

        
<script type="text/javascript" src="scripts/validate.min.js"></script>
        


<script>
// $(document).ready(function () {

		$("form[name='forgotpass']").validate({
		    
		    rules: {
			newpass: {
			    required: true,
			    minlength: 6
			},
			confirmpass: {
			    required: true,
			    equalTo: "#newpass"
			}
		    },
		    messages: {
			newpass: {
			    required: "Please provide New Password"
			},
			confirmpass: {
			    required: "Please provide Confirm Password"
			}
		    },
		    submitHandler: function (form) {
			if (confirm("Are you sure, do you want to update?")) {
			    var pass = $("#newpass").val();
			    var cpass = $("#confirmpass").val();
			    var mail = '<?php echo $getmail ?>';
//			    alert(mail);
//			    alert(cpass);
			    
			    
			    $.ajax({
				type: "POST",
				url: "email_forgot_password.php?op=forgotpassword",
				data: "&pass="+pass+"&cpass="+cpass+"&mail="+mail,
				success: function (html)
				{
				    var response = $.trim(html);
				    
					if(response == "ok")
					{
//					    alert("Password has been Changed Successfully");
					    swal
					    (
						    '',
						    'Password has been Changed Successfully',
						    'success'
					    )
					    location.reload();
					    $(location).attr('href', 'index.php');
					}else{
//					    alert("Please check your email and reset the password");
					    swal
					    (
						    '',
						    'Please check your email and reset the password!',
						    'error'
					    )
					}	
				}
			    });

			    return true;
			} else {
			    return false;
			}
		    }
		});
	    // });
            
</script>


  
</body>
</html>