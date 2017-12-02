<?php
include('config.php');
$user_id = $_SESSION['user_id'];
?>


<!DOCTYPE html>
<html lang="en">
    <head>
	<meta http-equiv="content-type" content="text/html;charset=UTF-8" />   
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<meta name="description" content="">
	<meta name="author" content="vinforma">
	<title>Job Alert | Employer | Staffingspot | Job Portal</title>
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
	<link rel="stylesheet" href="css/style1.css">
	<link rel="stylesheet" href="css/mobile.css">

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
	<!--<script type="text/javascript" src="js/jquery-migrate-1.2.1.min.js"></script>-->

        <!-- BOOTSTRAP CORE JS -->
        <script type="text/javascript" src="js/bootstrap.min.js"></script>

<!--<script src="//cdn.ckeditor.com/4.5.5/standard/ckeditor.js"></script>-->
<!--    <style>
        .Exp{margin-left: -30px;}
        .expyr{width: 130px;}
        .Expyr1{width: 123px;margin-left: -33px;}
        .nav > li > a{font-size: 20px;}
        .fcolr{color: black;}
    </style>-->

    </head>

    <body>
	<?php
	@include("top.php");
	?>

        <div id="spinner">
            <div class="spinner-img">
                <img alt="Staffing Spot - the spot for your career" src="images/loader.svg" />
                <h2>Please Wait...</h2>
            </div>
        </div>
	<section class="job-breadcrumb">
            <div class="container">
                <div class="row">
                    <div class="col-md-12 col-sm-12 col-xs-12">
                        <div class="col-md-6 col-sm-7 co-xs-12 text-left">
                            <h3>Job Alert</h3>
                        </div>
                        <div class="col-md-6 col-sm-5 co-xs-12 text-right">
                            <div class="bread">
                                <ol class="breadcrumb">
                                    <li><a href="index.php">Home</a> </li>
                                    <li class="active">Job Alert</li>
                                </ol>
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

                        <div class="col-md-8 col-sm-12 col-xs-12" id="postjobtab">
			    <div class="Heading-title-left black small-heading">
				<h3>Job Alert</h3>

			    </div>
			    <div class="post-job2-panel">
				<form class="row" id="form123" enctype="multipart/formdata" method="post">

				    <div class="col-md-6 col-sm-6 col-xs-12 bdr-0">
					<div class="form-group">
					    <label>Keyword <span class="required">*</span></label>

                                    <input type='text' placeholder='Select skill' class='skill_allresults' data-data='skills.json' data-search-in='skill' multiple='multiple' data-selection-required='true' data-value-property='*' data-min-length='0' name='skill'>

<!--                                            <select class="questions-category form-control" style="height: 49px;" required="true" data-placeholder="Search by Skills..."  multiple="true"  id="skill"  name="skill">
					    <?php


                                            $sql="SELECT distinct fld_skillset from tbl_skills where fld_delstatus = 0";
                                            $res=mysql_query($sql);  
                                            while($rows=mysql_fetch_assoc($res))           
                                            {   
						// $roles=explode(",", $row['fld_city']);
						?>
                                            <option value="<?php echo $rows['fld_skillset'];?>" ><?php echo $rows['fld_skillset'];?></option><?php


                                            }  ?>
	</select>-->

					    <div id="job_skill"></div>
					</div>
				    </div>


				    <div class="col-md-6 col-sm-6 col-xs-12 bdr-0">
					<div class="form-group">
					    <label>Location <span class="required">*</span></label>
                                <input type='text' placeholder='Select city' class='flexdatalist city_allresults' data-data='city.json' data-search-in='city' multiple='multiple' data-selection-required='true' data-value-property='*' data-min-length='0' name='city'>
	    <!--                                            <select class="questions-category form-control" style="height: 23px;" required="true" multiple="true" data-placeholder="Search By City..." id="city" >
<?php


                                            $sql="select fld_name from tbl_cities_old WHERE fld_status=0 OR fld_status=1";
                                            $res=mysql_query($sql);  
                                            while($rows=mysql_fetch_assoc($res))           
                                            {   
    // $roles=explode(",", $row['fld_city']);
    ?>
                                            <option value="<?php echo $rows['fld_name'];?>" ><?php echo $rows['fld_name'];?></option><?php


                                            }  ?>
							</select>-->
					    <div id="job_city"></div>
					</div>
				    </div>






				    <div class="col-md-6 col-sm-6 col-xs-12">

					<div class="form-group">
					    <label>Job Experience <span class="required">*</span></label>
<select class="questions-category form-control" id="experience" name="exp" data-placeholder="Select Job Experience">
                                            <option value="">Select Job Experience</option>       
						<option value="0">0</option>       
						<option value="1">1</option>
						<option value="2">2</option>
						<option value="3">3</option>
						<option value="4">4</option>
						<option value="5">5</option>
						<option value="6">6</option>
						<option value="7">7</option>
						<option value="8">8</option>
						<option value="9">9</option>
						<option value="10">10</option>
						<option value="11">11</option>
						<option value="12">12</option>
						<option value="13">13</option>
						<option value="14">14</option>
						<option value="15">15</option>
						<option value="16">16</option>
						<option value="17">17</option>
						<option value="18">18</option>
						<option value="19">19</option>
						<option value="20">20</option>
						<option value="21">21</option>
						<option value="22">22</option>
						<option value="23">23</option>
						<option value="24">24</option>
						<option value="25">25</option>
						<option value="26">26</option>
						<option value="27">27</option>
						<option value="28">28</option>
						<option value="29">29</option>
						<option value="30">30</option>
						<option value="31">31</option>
						<option value="32">32</option>
						<option value="33">33</option>
						<option value="34">34</option>
						<option value="35+">35+</option>
					    </select>

<!--                                                    <select class="questions-category form-control" id="experience" >
<?php
$sql123 = " SELECT distinct fld_experience_year FROM `tbl_jobseeker_details` ORDER BY fld_experience_year  ASC ";
                                                        $res    = mysql_query($sql123);
?><option value=""> Select </option><?php
while ($rows = mysql_fetch_assoc($res)) {

    ?>
    	  <option value="<?php
    echo $rows['fld_experience_year'];
    ?>" ><?php
    echo $rows['fld_experience_year'];
    ?></option><?php


					    }
					    ?>
   </select>
					    -->
                                        <div id="job_exp"></div>
					</div>
				    </div>


				    <div class="col-md-6 col-sm-6 col-xs-12">
					<div class="form-group">
					    <label>Expected Salary (In Lakhs) <span class="required">*</span></label>



 <select id="salary" class="questions-category form-control" name="salary" data-placeholder="Select Expected Salary">
                                                    <option value="">Select expected salary</option>       
                                                    <option value="0">0</option>       
						<option value="1">1</option>
						<option value="2">2</option>
						<option value="3">3</option>
						<option value="4">4</option>
						<option value="5">5</option>
						<option value="6">6</option>
						<option value="7">7</option>
						<option value="8">8</option>
						<option value="9">9</option>
						<option value="10">10</option>
						<option value="11">11</option>
						<option value="12">12</option>
						<option value="13">13</option>
						<option value="14">14</option>
						<option value="15">15</option>
						<option value="16">16</option>
						<option value="17">17</option>
						<option value="18">18</option>
						<option value="19">19</option>
						<option value="20">20</option>
						<option value="21">21</option>
						<option value="22">22</option>
						<option value="23">23</option>
						<option value="24">24</option>
						<option value="25">25</option>
						<option value="26">26</option>
						<option value="27">27</option>
						<option value="28">28</option>
						<option value="29">29</option>
						<option value="30">30</option>
						<option value="31">31</option>
						<option value="32">32</option>
						<option value="33">33</option>
						<option value="34">34</option>
						<option value="35">35+</option>
						<!-- <option value="36">36+</option>
						<option value="37">37+</option>
						<option value="38">38+</option>
						<option value="39">39+</option>
						<option value="40">40+</option>
						<option value="41">41+</option>
						<option value="42">42+</option>
						<option value="43">43+</option>
						<option value="44">44+</option>
						<option value="45">45+</option>
						<option value="46">46+</option>
						<option value="47">47+</option>
						<option value="48">48+</option>
						<option value="49">49+</option>
						<option value="50">50+</option>
						<option value="51">51+</option>
						<option value="52">52+</option>
						<option value="53">53+</option>
						<option value="54">54+</option>
						<option value="55">55+</option>
						<option value="56">56+</option>
						<option value="57">57+</option>
						<option value="58">58+</option>
						<option value="59">59+</option>
						<option value="60">60+</option>

						<option value="61">61+</option>
						<option value="62">62+</option>
						<option value="63">63+</option>
						<option value="64">64+</option>
						<option value="65">65+</option>
						<option value="66">66+</option>
						<option value="67">67+</option>
						<option value="68">68+</option>
						<option value="68">68+</option>
						<option value="69">69+</option>
						<option value="70">70+</option>
						<option value="71">71+</option>
						<option value="72">72+</option>
						<option value="73">73+</option>
						<option value="74">74+</option>
						<option value="75">75+</option>
						<option value="76">76+</option>
						<option value="77">77+</option>
						<option value="78">78+</option>
						<option value="79">79+</option>
						<option value="80">80+</option>
						<option value="81">81+</option>
						<option value="82">82+</option>
						<option value="83">83+</option>
						<option value="84">84+</option>
						<option value="85">85+</option>
						<option value="86">86+</option>
						<option value="87">87+</option>
						<option value="88">88+</option>
						<option value="89">89+</option>
						<option value="90">90+</option>
						<option value="91">91+</option>
						<option value="92">92+</option>
						<option value="93">93+</option>
						<option value="94">94+</option>
						<option value="95">95+</option>
						<option value="96">96+</option>
						<option value="97">97+</option>
						<option value="98">98+</option>
						<option value="99">99+</option>
						<option value="100">100+</option> -->
					    </select>                                           
                                        <div id="job_salary"></div>                            
					</div>
				    </div>



				    <div class="col-md-12 col-sm-12 col-xs-12">
					<div class="form-group" id="cate">
					    <label>Industry Type <span class="required">*</span></label>
					    <select id="industry" name="industry_type" class="questions-category form-control"  data-placeholder="Select Industry Type">
                                                <option value="">Select Industry Type</option>
<?php
                                        $sql="select * from `tbl_industry_type` WHERE fld_delstatus!=2 order by fld_industrytype ASC";
                                        $res=mysql_query($sql);
                                            while($row=mysql_fetch_assoc($res))
                                        {
    ?>
    						<option value="<?php echo $row['fld_industrytype'] ?>"><?php echo $row['fld_industrytype'] ?></option>
                                        <?php }?>

					    </select>
                                        <div id="job_industry_type"></div>
					</div>
				    </div>



				    <div class="col-md-12 col-sm-12 col-xs-12">
					<div class="form-group"  id="cate">
					    <label>Job Category <span class="required">*</span></label>
					    <select id="category" name="job_category" class="questions-category form-control"  data-placeholder="Select Job Category">
                                                <option value="">Select Job Category</option>
<?php
                                        $sql="select * from `tbl_funtional_area` where fld_delstatus <> 2 Order by fld_fuctionalarea ASC";
                                        $res=mysql_query($sql);
                                            while($row=mysql_fetch_assoc($res))
                                        {
    ?>
    						<option value="<?php echo $row['fld_fuctionalarea'] ?>"><?php echo $row['fld_fuctionalarea'] ?></option>


                                        <?php }?>

					    </select>
                                        <div id="job_job_category"></div>
					</div>
				    </div>


				    <div class="col-md-6 col-sm-6 col-xs-12">
					<div class="form-group">
					    <label>Role <span class="required">*</span></label>
					    <select id="role"  name="role" class="questions-category form-control"  data-placeholder="Select Role">
                                            <option value="">Select Role</option>
						<?php
                                             $sql="select * from `tbl_role` where fld_delstatus <>2 Order by fld_role ASC";
                                        $res=mysql_query($sql);
                                            while($row=mysql_fetch_assoc($res))
                                        {
						    ?>
    						<option value="<?php echo $row['fld_role'] ?>"><?php echo $row['fld_role'] ?></option>


                                        <?php }?>

					    </select>
                                        <div id="job_role"></div>
					</div>
				    </div>



				    <div class="col-md-12 col-sm-12 col-xs-12">

					<div class="form-group">
					    <label>Name Your Job Alert <span class="required">*</span></label>
					    <input type="text" placeholder="Job Alert" name="title" id="title" class="form-control mh">
					</div>

				    </div>


				    <div class="col-md-12 col-sm-12 col-xs-12">

					<div class="form-group">
					    <label>Enter the E-Mail <span class="required">*</span></label>
					    <input type="email" placeholder="Enter the E-Mail" id="mail"  name="mail" required="true" class="form-control" style="height:47px">
					</div>

				    </div>


				    <div class="col-md-12 col-sm-12 col-xs-12">
    			    <!--<input type='button' class="btn btn-default pull-right" id="postjob"  value="Post Job" >-->             
    					<input type='submit' class="btn btn-default pull-right" id="postjob"  value="Create Job Alert" > 

				    </div>
				    <!--                                <div class="alert alert-success alert-dismissable">
									<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
									Success! message sent successfully.
								    </div>-->
				</form>
			    </div>
			</div>      


			<div class="col-md-4 col-sm-12 col-xs-12">
                            <aside>
                                <div class="widget">
                                    <div class="widget-heading"><span class="title">Hot Jobs</span></div>
                                    <ul class="related-post">
                                        <?php
                                        $fetchqrynew = "select distinct e.fld_logo,e.fld_employer_name,pj.fld_id,pj.fld_job_type,pj.fld_location,pj.fld_jobtitle,pj.fld_postdate,pj.fld_expirydate,e.fld_empid from tbl_employer_details e INNER JOIN tbl_postjob pj ON e.fld_empid=pj.fld_empid JOIN tbl_employer emp on emp.fld_id = e.fld_empid where pj.fld_expirydate >= DATE(NOW()) and pj.fld_job_status=1 and pj.fld_delstatus=0 and emp.fld_emp_status = 1  ORDER BY Rand() LIMIT 5";

                                        $records = mysql_query($fetchqrynew) or die("Query fail: " . mysqli_error());
                                        $projects = array();
                                        while ($project =  mysql_fetch_assoc($records))
                                        {
                                        $projects[] = $project;
                                        }
                                        foreach($projects as $project)
                                        {
                                            $postdate=date_create($project['fld_postdate']);
                                            $expirydate=date_create($project['fld_expirydate']);
                                        ?>
                                        <li>
                                            <a href="singlejob.php?jid=<?php echo $project['fld_id'];  ?> "><?php echo $project['fld_jobtitle']; ?></a>
                                            <span><i class="fa fa-map-marker"></i><?php echo $project['fld_location']; ?> </span>
                                            <span><i class="fa fa-calendar"></i><?php echo date_format($postdate,"M").date_format($postdate,"d").', '.date_format($postdate,"Y"); ?>  - <?php echo date_format($expirydate,"M").date_format($expirydate,"d").', '.date_format($expirydate,"Y"); ?> </span>
                                        </li>
                                        <?php } ?>

                                    </ul>
                                </div>

                                <div class="widget">
                                    <div class="widget-heading"><span class="title">Hot Categories</span></div>
                                    <ul class="categories-module">
                                        
                                        <?php 
                                        $sql_industype = mysql_query("SELECT * FROM tbl_postjob WHERE fld_expirydate >= DATE(NOW()) and fld_job_status=1 and fld_delstatus=0 order by rand()");
                                        while($row=mysql_fetch_assoc($sql_industype)){
                                            $id[] = $row['fld_id'];
                                            $indus_type[] = $row['fld_industry_type'];
                                        }
                                       
                                        $industrytype =array_unique($indus_type);
                                        $i=0;
                                        foreach($industrytype as $industrytype1){
                                            $query = mysql_query("select count(*) as count from tbl_postjob where fld_expirydate >= DATE(NOW()) and fld_industry_type like '%$industrytype1%' and fld_job_status=1 and fld_delstatus=0 order by rand()");
                                            while($roww=mysql_fetch_assoc($query)){
                                                $fld_id = $roww['count'];
                                            }
                                            if($i<5){
                                            ?>
                                        <li> <a href="searchjoblist.php?action=joblist&industype=<?php echo $industrytype1; ?>"><?php echo $industrytype1 ?><span>(<?php echo $fld_id; ?>)</span> </a> </li>
                                        <?php } $i++;} ?>
                                    </ul>
                                </div>
                                

                            </aside>
                        </div>


			<!-- Edit job Tab Start-->

                    </div>
                </div>
            </div>
        </section>





       <?php @include("bottom.php");?>





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


        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
	<link href="scripts/ddl/jquery.flexdatalist.css" rel="stylesheet" type="text/css">
	<link href="scripts/ddl/jquery.flexdatalist.min.css" rel="stylesheet" type="text/css">
	<script src="scripts/ddl/jquery.flexdatalist.min.js"></script>
	<script src="scripts/ddl/jquery.flexdatalist.js"></script>


	<script>
            $('.skill_allresults').flexdatalist({
		minLength: 0,
		valueProperty: '*',
		selectionRequired: true,
		textProperty: '{skill}',
		searchIn: 'skill',
		data: 'skills.json'
	    });
	    $('.city_allresults').flexdatalist({
		minLength: 0,
		valueProperty: '*',
		selectionRequired: true,
		textProperty: '{city}',
		searchIn: 'city',
		data: 'city.json'
	    });
	    
	</script>

	<script type="text/javascript" src="js/jquery.tagsinput.min.js"></script>
        <script type="text/javascript">
	    $('#tags').tagsInput({
		width: 'auto'
	    });
	</script>




	<script type="text/javascript" src="scripts/validate.min.js"></script>
		<!--<script type="text/javascript" src="scripts/jquery.form.js"></script>-->

	<script>
//            $(document).ready(function () {
		//                alert("haii");

		$("#form123").validate({
                    ignore: [],
		    rules: {
			skill: {
			    required: true
			},
                        city : {
			    required: true
			},
                        industry_type:{
			    required: true
			},
                        job_category:{
			    required: true
                        },
                        exp : {
                            required: true
                        },
                        role : {
                            required: true
                        },
                        salary : {
                            required: true
                        },
                        title : {
                            required: true
                        },
                        mail : {
                            required: true
			}
		    },
		    messages: {
			skill: {
			    required: "Please provide Skill"
			},
                        city : {
			    required: "Please provide City"
			},
                        industry_type:{
                            required: "Please provide industry type"
                        },
                        exp : {
                            required: "Please provide job experience"
                        },
                        role : {
                            required: "Please provide Role"
                        },
                        salary : {
                            required: "Please provide expected salary"
                        },
                        job_category:{
                            required: "Please provied job category"
                        },
                        title : {
			    required: "Please provide Job Alert name"
			},
                        mail : {
			    required: "Please provide email"
			}
		    },
                    errorElement: "label", // can be 'label'
                    errorPlacement: function (error, element) {
                        var elementName = $(element).attr('name');
                        if (elementName == 'skill') {
                            $('#job_' + elementName).after(error);
                        } else if (elementName == 'city') {
                            $('#job_' + elementName).after(error);
                        } else if (elementName == 'job_category') {
                            $('#job_' + elementName).after(error);
                        } else if (elementName == 'role') {
                            $('#job_' + elementName).after(error);
                        } else if (elementName == 'industry_type') {
                            $('#job_' + elementName).after(error);
                        }  else if (elementName == 'salary') {
                            $('#job_' + elementName).after(error);
                        } else if (elementName == 'exp') {
                            $('#job_' + elementName).after(error);
                        } else {
                            element.after(error);
                        }
                    },
		    submitHandler: function (form) {
			//                        if (confirm("Are you sure want to insert")) {
			swal({
			    title: 'Are you sure?',
			    text: "You want to create job alert!",
			    type: 'warning',
			    showCancelButton: true,
			    confirmButtonColor: '#3085d6',
			    cancelButtonColor: '#d33',
			    confirmButtonText: 'Yes, create job alert!',
			    cancelButtonText: 'No, cancel!',
			    confirmButtonClass: 'btn btn-success',
			    cancelButtonClass: 'btn btn-danger',
			    buttonsStyling: false
			}).then(function () {

                            var city_name=[];
                var skill_name=[];

			    var test_city = $(".city_allresults").val();
			    //alert(test);
                if(test_city != ''){
				data = JSON.parse(test_city);
				var data_length = Object.keys(data).length;
				for (var i = 0; i < data_length; i++) {
				    if (data[i] != '') {
					//      console.log('city:',data[i].city);
					city_name.push(data[i].city);

				    }
				}
			    }
			    var test_skill = $(".skill_allresults").val();
                if(test_skill != ''){
				data = JSON.parse(test_skill);
				var data_length = Object.keys(data).length;
				for (var i = 0; i < data_length; i++) {
				    if (data[i] != '') {
					skill_name.push(data[i].skill);
				    }
				}
			    }
			    var locations = city_name.join(",");
//                            alert (location);
			    //console.log('city_names:',city1);
			    //var city1 = $("#city").val();

			    //var skill1 = $("#skill").val();
			    var skill = skill_name.join(",");


			    //var skill = $("#skill").val();		
			    //var location = $("#city").val();		
			    var experience = $("#experience").val();
			    var salary = $("#salary").val();
			    var industry = $("#industry").val();
			    var category = $("#category").val();
			    var role = $("#role").val();
			    var alert = $("#title").val();
			    var email = $("#mail").val();
                            var seekerid = '<?php echo $user_id;?>';
			    $.ajax({
				type: "POST",
				url: "jobalert_insert.php",
				data:
					{
                                seekerid:seekerid,skill : skill, locations: locations,experience: experience,salary: salary,industry: industry,category: category,role: role,alert: alert,email: email				
					},
//                                datatype: 'html',
				success: function (data)
				{
				    swal(
					    '',
                                            'Job Alert Created Successfully!',
					    'success'
					    )
                                     $('.swal2-confirm').click(function(){
//                                      $(location).attr('href', 'jobalert.php');
                                      location.reload();
                                  });
                                   $('.overlaymodal').hide();
				},
                               beforeSend:function()
                                {
                                 $(".overlaymodal").show();                        
                                }
                              
			    });
			    return true;
                                    
			}, function (dismiss) {
			    // dismiss can be 'cancel', 'overlay',
			    // 'close', and 'timer'
			    if (dismiss === 'cancel') {
				swal(
					'Cancelled',
					'',
					'error'
					)
				$('.swal2-confirm').click(function(){
                                      location.reload();
                                  });
			    }
			})
		    }
		});
//            });



	</script>

	<script>
	    //	$(".city_allresults, .skill_allresults").on('focus', function(){
        $(document).click(function(){
		var skill = $("input.skill_allresults").val();
		var city = $("input.city_allresults").val();

            if(skill == ''){$("input.skill_allresults").attr('placeholder', "Select skill");}
            if(skill != ''){$("input.skill_allresults").attr('placeholder', "");}
            if(city == ''){$("input.city_allresults").attr('placeholder', "Select city");}
            if(city != ''){$("input.city_allresults").attr('placeholder', "");}
	    });
	</script>


    </body>
</html>