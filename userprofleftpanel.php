<div class="col-md-4 col-sm-4 col-xs-12">
                        
                        <?php
                
         
                $refineprodcuts = "Select js.fld_name, js.fld_email, js.fld_mobile, js.fld_password, jsd.fld_profilepic, jsd.fld_city, jsd.fld_address, jsd.fld_address1, jsd.fld_dob, jsd.fld_gender, jsd.fld_mobile,jsd.fld_residence_no,jsd.fld_aboutmyself from tbl_jobseeker js join tbl_jobseeker_details jsd on jsd.fld_js_id = js.fld_id where js.fld_delstatus=0 and jsd.fld_js_id = $user_id and js.fld_js_status=1 and jsd.fld_profilepic != 'NULL'";
//              echo $refineprodcuts;
                $refineprodcuts11 = mysql_query($refineprodcuts);
                while($row=mysql_fetch_array($refineprodcuts11,MYSQL_ASSOC))
                {
                    
                    $name= $row['fld_name'];
                    $email= $row['fld_email'];
                    $mobile= $row['fld_mobile'];
                    $jsdetailsid= $row['fld_id'];
                    $profpic = $row['fld_profilepic'];
                    $country = $row['fld_country'];
                    $state = $row['fld_state'];
                    $city = $row['fld_city'];
                    $address = $row['fld_address'];
                    $address1 = $row['fld_address1'];
                    $dob = $row['fld_dob'];
                    $gender = $row['fld_gender'];
                    $mobile = $row['fld_mobile'];
                    $residence_no = $row['fld_residence_no'];
                    $aboutmyself = $row['fld_aboutmyself'];                 
                    $profilepicpath = 'images/profilepic/';
                    $profileimage = $profilepicpath.$profpic;
                }
//                echo 'hi'. $profileimage;
                ?>
        
                        
                        
                        <div class="profile-card">
                        <div class="banner">
                        <img src="images/profile-pic-bg.jpg" alt="" class="img-responsive">
                        </div>
                        <div class="user-image" id="imgdiv">
                        <?php
                         if(file_exists($profileimage) && (preg_match('/\.([^\.]+)$/', $profileimage)))
                         {
                         ?>
                        <form id="imageform" name="imageform" method="post" enctype="multipart/form-data" action="upload_user_pic.php">
                        <div class="uploadFile timelineUploadBG">
                            <input type="file" name="photoimg" id="photoimg" class=" custom-file-input" original-title="Change Cover Picture" accept="image/jpg,image/png,image/jpeg,image/JPEG,image/PNG,image/JPG"/>
                        </div>
                        </form>      
                        <img src="<?php echo $profileimage;?>" alt="" class="img-responsive img-circle" id="imgbg">
                        <?php
                        }
                        else
                        {
                        ?>
                        <form id="imageform" name="imageform" method="post" enctype="multipart/form-data" action="upload_user_pic.php">
                        <div class="uploadFile timelineUploadBG">
                        <input type="file" name="photoimg" id="photoimg" class=" custom-file-input" original-title="Change Cover Picture" accept="image/jpg,image/png,image/jpeg,image/JPEG,image/PNG,image/JPG"/>
                        </div>
                        </form>
                        <img src="images/nopicture.jpg" alt="" class="img-responsive img-circle">
                                           
                        <?php
                        }
                        ?>
                                    
                                </div>
                                <div class="card-body">
                                    <h3><?php echo $name; ?></h3>
                                    <span class="title"><?php echo $designation; ?></span>
                                </div>
<!--                                <ul class="social-network social-circle onwhite">
                                    <li><a href="#" class="icoFacebook" title="Facebook"><i class="fa fa-facebook"></i></a></li>
                                    <li><a href="#" class="icoTwitter" title="Twitter"><i class="fa fa-twitter"></i></a></li>
                                    <li><a href="#" class="icoGoogle" title="Google +"><i class="fa fa-google-plus"></i></a></li>
                                    <li><a href="#" class="icoLinkedin" title="Linkedin +"><i class="fa fa-linkedin"></i></a></li>
                                </ul>-->
                            </div>
                            <div class="profile-nav">
                                <div class="panel">
                                    <ul class="nav nav-pills nav-stacked">

                                        <?php 
                                        $directoryURI = $_SERVER['REQUEST_URI'];
                                        $file = basename($directoryURI); 
                                        $files=strstr($file, '?', true);
                                        // $path = parse_url($directoryURI, PHP_URL_PATH);
                                        // $components = explode('.', $path);
                                        // echo "aaa".$first_part = $components[0];
//                                        echo $file;
                                        $files=strstr($file, '?', true);
                                        ?>

                                        <li class="<?php if ($file=="user-dashboard.php") {echo "active"; } else  {echo "noactive";}?>">
                                            <a href="user-dashboard.php"> <i class="fa fa-user"></i> Profile</a>
                                        </li>
                                        <li class="<?php if ($file=="user-edit-profile.php") {echo "active"; } else  {echo "noactive";}?>">
                                            <a href="user-edit-profile.php"> <i class="fa fa-edit"></i> Edit Profile</a>
                                        </li>
                                        
                                        <li class="<?php if ($file=="self_esteem_video.php") {echo "active"; } else  {echo "noactive";}?>">
                                            <a href="self_esteem_video.php"> <i class="fa fa-file"></i> Self Esteem Video</a>
                                        </li>
                                        
                                        <li class="<?php if ($file=="user-resume-build.php") {echo "active"; } else  {echo "noactive";}?>">
                                            <a href="user-resume-build.php"> <i class="fa fa-file-o"></i>Detailed Profile </a>
                                        </li>
                                        <li class="<?php if ($file=="user-resume.php") { echo "active"; } else  {echo "noactive";}?>">
                                            <a href="user-resume.php"> <i class="fa fa-file-o"></i>Resume Profile(s)</a>
                                        </li>
                                        <li class="<?php if ($file=="user-job-applied.php" || $files=="user-job-applied.php") {echo "active"; } else  {echo "noactive";}?>">
                                            <a href="user-job-applied.php"> <i class="fa  fa-list-ul"></i> Job(s) Applied</a>
                                        </li>
                                        <li class="<?php if ($file=="user-followed-companies.php" || $files=="user-followed-companies.php") {echo "active"; } else  {echo "noactive";}?>">
                                            <a href="user-followed-companies.php"> <i class="fa  fa-bookmark-o"></i> Followed Company(s) </a>
                                        </li>
                    <li class="<?php if ($file=="user-history.php" || $files=="user-history.php") {echo "active"; } else  {echo "noactive";}?>">
                                            <a href="user-history.php"> <i class="fa  fa-history"></i>Search History </a>
                                        </li>
                    <li class="<?php if ($file=="user-change-password.php") {echo "active"; } else  {echo "noactive";}?>">
                                            <a href="user-change-password.php"> <i class="fa  fa-lock"></i> Change Password </a>
                                        </li>
                    <li class="<?php if ($file=="user-matched-jobs.php" || $files=="user-matched-jobs.php") {echo "active"; } else  {echo "noactive";}?>">
                                            <a href="user-matched-jobs.php"> <i class="fa  fa-search"></i> Matched Job(s) </a>
                                        </li>
                                        <li class="<?php if ($file=="user-visibility-status.php") {echo "active"; } else  {echo "noactive";}?>">
                                            <a href="user-visibility-status.php"> <i class="fa  fa-cog"></i> Visibility Setting(s) </a>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </div>

<!--<script type="text/javascript" src="scripts/jquery.min.js"></script>-->
<script type="text/javascript" src="scripts/jquery.form.js"></script>
<script type="text/javascript">
 $(document).ready(function() {        
            $('#photoimg').on('change', function(){
        
         var prof_image = $('input[name="photoimg"]').val();
         if(prof_image != '' && typeof prof_image !== 'undefined')
         {
            var ext = $('#photoimg').val().split('.').pop().toLowerCase(); 
                    var allow = new Array('png','jpg','jpeg'); 
                    if($.inArray(ext, allow) == -1)
            { 
                swal(
		    '',
		    'Please select only image file!',
		    'warning'
		    )       
//		alert("Please select only image file");
                    }
            else
            {
            $("#imageform").ajaxForm({
            success: function(data) {
            if(data == 1 || data == 2){
//            alert("Your Profile Has been Successfully Updated");
		swal(
		    '',
		    'Your Profile Has been Successfully Updated!',
		    'success'
		    )      
            $('.swal2-confirm').click(function(){
                location.reload();
            });
            }else if(data == 3){
//            alert("Please give vaild dimensions above (400 * 400)");
	    swal(
		    '',
		    'Please give vaild dimensions above (125 * 125)!',
		    'error'
		    )   
            } else if(data == 'failed'){
//            alert("Please give size less than 2MB");
	    swal(
		    '',
		    'Please give size less than 2MB!',
		    'error'
		    ) 
            }
            }
             }).submit();
           }        
        }
        });
 });
</script>

<!-- User image icon position -->
<script>
    $(document).ready(function() {        
        $banner_width = $(".banner").width() / 2;
        $userimg_height = $("#imgdiv").height() / 2;

        $topsize = $userimg_height - 15;

        //alert($userimg_height);

        $(".timelineUploadBG").css({
           "margin-left" : $banner_width - 15,
           "margin-top" : $topsize
        });
    });
</script>


<style>
    #timelineProfilePic {
width: 170px;
height: 170px;
border: 1px solid #666666;
background-color: #ffffff;
position: absolute;
margin-top: -145px;
margin-left: 20px;
z-index: 1000;
overflow: hidden;
border-radius: 3px;
-moz-border-radius: 3px;
-webkit-border-radius: 3px;
}
#timelineTitle {
color: #ffffff;
font-size: 24px;
margin-top: -45px;
position: absolute;
margin-left: 206px;
font-weight: bold;
text-rendering: optimizelegibility;
text-shadow: 0 0 3px rgba(0,0,0,.8);
z-index: 999;
text-transform: capitalize;
}

.timelineUploadBG {
position: absolute;
height: 32px;
width: 32px;
/*margin-left: 41%;
margin-top: -15%;*/
}

.uploadFile {
  background: rgba(0, 0, 0, 0) url("images/whitecam.png") no-repeat scroll 0 0;
    cursor: pointer;
    height: 32px;
    overflow: hidden;
    width: auto;
    z-index: 8;
}
.uploadFile:hover {
 opacity: 0.4;
}
.uploadFile input {
filter: alpha(opacity=0);
opacity: 0;
margin-left: -110px;
}
</style>