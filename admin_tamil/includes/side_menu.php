<?php
$directoryURI = $_SERVER['REQUEST_URI'];
$file = basename($directoryURI);
$var = strstr($file, '?', true);
//$path = parse_url($directoryURI, PHP_URL_PATH);
//$components = explode('.', $path);
//$url = $_SERVER[PHP_SELF];
//$urlary = explode("/",$url);
//$urlend = end($urlary);
//$urltrunc = explode(".php",$urlend);
//$urlcurr = current($urltrunc);
//$urlget = str_replace("_"," ",$urlcurr);
//$module_name = explode('_',$urlcurr);
?>


<aside class="left-side sidebar-offcanvas">
	

    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">
	<!-- Sidebar user panel -->
	<div class="user-panel">
	    <div class="pull-left image">
		<img src="img/avatar3.png" class="img-circle" alt="User Image" />
	    </div>
	    <div class="pull-left info">
		<p>Hello Administrator</p>

		<a href="#"><i class="fa fa-circle text-success"></i> Online</a>
	    </div>
	</div>
	<!-- search form -->
	<!--                    <form action="#" method="get" class="sidebar-form">
				<div class="input-group">
				    <input type="text" name="q" class="form-control" placeholder="Search..."/>
				    <span class="input-group-btn">
					<button type='submit' name='search' id='search-btn' class="btn btn-flat"><i class="fa fa-search"></i></button>
				    </span>
				</div>
			    </form>-->
	<!-- /.search form -->
	<!-- sidebar menu: : style can be found in sidebar.less -->
	<ul class="sidebar-menu">
	    <li class="active">
		<a href="admin_home.php">
		    <i class="fa fa-dashboard"></i> <span>Dashboard</span>
		</a>
	    </li>

	    <!-- Master's Management -->

	    <li class="treeview <?php
	    if ($file == 'industype_master.php' || $file == 'master_banner.php' || $file == 'scheduled_banner.php' || $file == 'social_type.php' || $var == 'industype_master.php' || $var == 'master_banner.php' || $var == 'scheduled_banner.php' || $var == 'social_type.php') {
		echo 'active';
	    }
	    ?>">
		<a href="#">
		    <i class="fa fa-bar-chart-o"></i>
		    <span>Master Management</span>
		    <i class="fa fa-angle-left pull-right"></i>
		</a>
		<ul class="treeview-menu">



		    <li <?php
	    if ($file == 'industype_master.php' || $var == 'industype_master.php') {
		echo 'class= "active" ';
	    }
	    ?>><a href="industype_master.php"><i class="fa fa-angle-double-right"></i>Industry Type Master</a></li>


<!--  							<li><a href="master_jobtype.php"><i class="fa fa-angle-double-right"></i>Job Type Master</a></li>-->

		    <li <?php
		    if ($file == 'master_banner.php' || $var == 'master_banner.php') {
			echo 'class= "active" ';
		    }
		    ?>><a href="master_banner.php"><i class="fa fa-angle-double-right"></i>Banner Master</a></li>

		    <li <?php
		    if ($file == 'scheduled_banner.php' || $var == 'scheduled_banner.php') {
			echo 'class= "active" ';
		    }
		    ?>><a href="scheduled_banner.php"><i class="fa fa-angle-double-right"></i>Scheduled Banner</a></li>
		    <li <?php
		    if ($file == 'social_type.php' || $var == 'social_type.php') {
			echo 'class= "active" ';
		    }
		    ?>><a href="social_type.php"><i class="fa fa-angle-double-right"></i>Social Type</a></li>
		</ul>
	    </li>

	    <li class="treeview <?php
			if ($file == 'master_country.php' || $file == 'master_city.php' || $file == 'master_state.php' || $var == 'master_country.php' || $var == 'master_city.php' || $var == 'master_state.php') {
			    echo 'active';
			}
			?>">
		<a href="#">
		    <i class="fa fa-location-arrow"></i>
		    <span>Location Management</span>
		    <i class="fa fa-angle-left pull-right"></i>
		</a>
		<ul class="treeview-menu">
		    <li <?php
		    if ($file == 'master_country.php' || $file == 'master_country.php') {
			echo 'class= "active" ';
		    }
			?>><a href="master_country.php"><i class="fa fa-angle-double-right"></i>Country Master</a></li>
			<li <?php
		    if ($file == 'master_state.php' || $file == 'master_state.php') {
			echo 'class= "active" ';
		    }
			?>><a href="master_state.php"><i class="fa fa-angle-double-right"></i>State Master</a></li>	
		    <li <?php
		    if ($file == 'master_city.php' || $file == 'master_city.php') {
			echo 'class= "active" ';
		    }
			?>><a href="master_city.php"><i class="fa fa-angle-double-right"></i>City Master</a></li>
		    

		</ul> 
	    </li>

	    <!-- Pricing Management -->

	    <li class="treeview <?php
		    if ($file == 'mem_priceform.php' || $file == 'booster.php' || $var == 'mem_priceform.php' || $var == 'booster.php') {
			echo 'active';
		    }
			?>">
		<a href="mem_priceform.php">
		    <i class="fa fa-usd"></i>
		    <span>Pricing Management</span>
		    <i class="fa fa-angle-left pull-right"></i>
		</a>
		<ul class="treeview-menu">
		    <li <?php
		    if ($file == 'mem_priceform.php' || $var == 'mem_priceform.php') {
			echo 'class= "active" ';
		    }
			?>><a href="mem_priceform.php"><i class="fa fa-angle-double-right"></i>Package</a></li>
		    <li <?php
		    if ($file == 'currency_types.php' || $var == 'currency_types.php') {
			echo 'class= "active" ';
		    }
			?>><a href="currency_types.php"><i class="fa fa-angle-double-right"></i>Currency Types</a></li>
                    
                    <li <?php
		    if ($file == 'booster.php' || $var == 'booster.php') {
			echo 'class= "active" ';
		    }
			?>><a href="booster.php"><i class="fa fa-angle-double-right"></i>Booster</a></li>

		</ul>
	    </li>

	    <!-- Employer Management -->

	    <li>
		<a href="emp_manage.php">
		    <i class="fa fa-user"></i> <span>Employer Management</span>
<!--                                <i class="fa fa-angle-left pull-right"></i>-->
		</a>

	    </li>
	    <!-- Employer Management -->

	    <li>
		<a href="jobs_manage.php">
		    <i class="fa fa-tasks"></i> <span>Job Management</span>
<!--                                <i class="fa fa-angle-left pull-right"></i>-->
		</a>

	    </li>

	    <!-- JobSeeker's Management -->

	    <li >
		<a href="seek_manage.php">
		    <i class="fa fa-user-md"></i> <span>JobSeeker Management</span>
<!--                                <i class="fa fa-angle-left pull-right"></i>-->
		</a>

	    </li>

	    <li class="treeview <?php
		    if ($file == 'forget_seekcontent.php' || $file == 'forget_empcontent.php' || $file == 'reg_seekcontent.php' || $file == 'reg_empcontent.php' || $file == 'jobalert_content.php' || $var == 'forget_seekcontent.php' || $var == 'forget_empcontent.php' || $var == 'reg_seekcontent.php' || $var == 'reg_empcontent.php' || $var == 'jobalert_content.php') {
			echo 'active';
		    }
			?>">
		<a href="#">
		    <!--<i class="fa fa-tasks"></i> <span>Email Content Management</span>-->
		    <i class="fa fa-envelope"></i> <span>Email Content Management</span>
		    <i class="fa fa-angle-left pull-right"></i>
		</a>
		<ul class="treeview-menu">
		    <li <?php
		    if ($file == 'forget_seekcontent.php' || $var == 'forget_seekcontent.php') {
			echo 'class= "active" ';
		    }
			?>><a href="forget_seekcontent.php"><i class="fa fa-angle-double-right"></i>Forget Password(Seeker)</a></li>
		    <li <?php
		    if ($file == 'forget_empcontent.php' || $var == 'forget_empcontent.php') {
			echo 'class= "active" ';
		    }
		    ?>><a href="forget_empcontent.php"><i class="fa fa-angle-double-right"></i>Forget Password(Employer)</a></li>
		    <li <?php
		    if ($file == 'reg_seekcontent.php' || $var == 'reg_seekcontent.php') {
			echo 'class= "active" ';
		    }
		    ?>><a href="reg_seekcontent.php"><i class="fa fa-angle-double-right"></i>Registration(Seeker's)</a></li>
		    <li <?php
			if ($file == 'reg_empcontent.php' || $var == 'reg_empcontent.php') {
			    echo 'class= "active" ';
			}
			?>><a href="reg_empcontent.php"><i class="fa fa-angle-double-right"></i>Registration(Employer's)</a></li>
		    <li <?php
			if ($file == 'jobalert_content.php' || $var == 'jobalert_content.php') {
			    echo 'class= "active" ';
			}
			?>><a href="jobalert_content.php"><i class="fa fa-angle-double-right"></i>Job Alert</a></li>
		</ul>
	    </li>


	    <!-- Front Page  Management -->

	    <li class="treeview <?php
			if ($file == 'resume_tips.php' || $file == 'interview_tips.php' || $file == 'terms_condition.php' || $file == 'about_us.php' || $var == 'resume_tips.php' || $var == 'interview_tips.php' || $var == 'terms_condition.php' || $var == 'about_us.php') {
			    echo 'active';
			}
			?>">
		<a href="#">
		    <i class="fa fa-clipboard"></i> <span>Front Page Management</span>
		    <i class="fa fa-angle-left pull-right"></i>
		</a>
		<ul class="treeview-menu">
<!--		    <li><a href="resume_tips.php"><i class="fa fa-angle-double-right"></i> Resume Tips</a></li>
		    <li><a href="interview_tips.php"><i class="fa fa-angle-double-right"></i> Interview Tips</a></li>-->
		    <li <?php
			if ($file == 'resume_tips.php' || $var == 'resume_tips.php') {
			    echo 'class= "active" ';
			}
			?>><a href="resume_tips.php"><i class="fa fa-angle-double-right"></i> Resume Tips</a></li>
		    <li <?php
			if ($file == 'interview_tips.php' || $var == 'interview_tips.php') {
			    echo 'class= "active" ';
			}
			?>><a href="interview_tips.php"><i class="fa fa-angle-double-right"></i> Interview Tips</a></li>
		    <li <?php
	    if ($file == 'terms_condition.php' || $var == 'terms_condition.php') {
		echo 'class= "active" ';
	    }
	    ?>><a href="terms_condition.php"><i class="fa fa-angle-double-right"></i> Terms & Conditions</a></li>
		    <li <?php
	    if ($file == 'about_us.php' || $var == 'about_us.php') {
		echo 'class= "active" ';
	    }
	    ?>><a href="about_us.php"><i class="fa fa-angle-double-right"></i> About Us</a></li>
		</ul>
	    </li>

	    <!-- Administration Security Page -->

	  <!--   <li class="treeview <?php
		    if ($file == 'quick_mail.php') {
			echo 'active';
		    }
		    ?>">
		<a href="#">
		    <i class="fa fa-lock"></i> <span>Administration Security</span>
		    <i class="fa fa-angle-left pull-right"></i>
		</a>
		<ul class="treeview-menu">
		    <li <?php
		    if ($file == 'quick_mail.php') {
			echo 'class= "active" ';
		    }
		    ?>><a href="quick_mail.php"><i class="fa fa-angle-double-right"></i>Quick Mail</a></li>                           
		</ul>
	    </li>
 -->
	    <!-- Calendar -->

	    <!--<li>
		<a href="pages/calendar.html">
		    <i class="fa fa-calendar"></i> <span>Calendar</span>
		    <small class="badge pull-right bg-red">3</small>
		</a>
	    </li>-->

	    <!-- Mail Box-->

	    <!-- <li>
		 <a href="pages/mailbox.html">
		     <i class="fa fa-envelope"></i> <span>Mailbox</span>
		     <small class="badge pull-right bg-yellow">12</small>
		 </a>
	     </li>-->
	    <!-- <li class="treeview <?php
		    if ($file == 'db_management.php' || $file == 'master_tables.php' || $file == 'transactional_tables.php' || $var == 'db_management.php' || $var == 'master_tables.php' || $var == 'transactional_tables.php') {
			echo 'active';
		    }
		    ?>">
		<a href="#">
		    <i class="fa fa-database"></i>
		    <span>Database Management</span>
		    <i class="fa fa-angle-left pull-right"></i>
		</a>
		<ul class="treeview-menu">
		    <li <?php
		    if ($file == 'db_management.php' || $var == 'db_management.php') {
			echo 'class= "active" ';
		    }
		    ?>><a href="db_management.php"><i class="fa fa-angle-double-right"></i>Table Management</a></li>
		    <li <?php
		    if ($file == 'master_tables.php' || $var == 'master_tables.php') {
			echo 'class= "active" ';
		    }
		    ?>><a href="master_tables.php"><i class="fa fa-angle-double-right"></i>Master Tables</a></li>
		    <li <?php
		    if ($file == 'transactional_tables.php' || $var == 'transactional_tables.php') {
			echo 'class= "active" ';
		    }
		    ?>><a href="transactional_tables.php"><i class="fa fa-angle-double-right"></i>Transactional Tables</a></li>

		</ul> 
	    </li> -->

	</ul>
    </section>
    <!-- /.sidebar -->
</aside>


