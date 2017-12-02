<div id="AppliedJob" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" data-backdrop="static">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
               
                <h4 class="modal-title text-danger">Applied Jobs</h4>
            </div>
            <div class="modal-body">
               <?php 
$show_query = mysql_query("SELECT jobcode,applieddate FROM seeker_appliedjob WHERE seekerid = '$session_seekid'");
		
		$show_row = mysql_num_rows($show_query);
		
		if($show_row > 0) {
  		
				while($show_array = mysql_fetch_array($show_query)){
					
					$check_jobcode = $show_array['jobcode'];
					$check_date1 = date_create($show_array['applieddate']);
					$check_date = date_format($check_date1,'d-M-y');
					
						$get_query = mysql_query("SELECT * FROM postjob WHERE jobcode ='$check_jobcode'");
						
							while($get_array = mysql_fetch_array($get_query)){
									$get_empid = $get_array['empid'];
									$get_empname = $get_array['employer_name'];
									$get_jobtitle = $get_array['jobtitle'];
									$get_location = $get_array['location'];
									$get_description = $get_array['description'];
							?>
                            


<div class="col-sm-12 padleft padright search-list" style="border-bottom:1px #CCCCCC dashed;padding-bottom:1%;">
<div class="col-sm-12 padleft padright">
<div class="col-sm-12 padleft padright">
<a class="job-title" target="_blank" href="#" style="margin-left:22px;">
<?php echo $get_jobtitle;?>
</a>
</div>
<div class="col-sm-12 padleft padright" style="margin-top:1%;">
<span class="job-posted pull-right">Applied date:<?php echo $check_date; ?></span>
</div>
<div class="col-sm-12 padleft padright" style="margin-top:1.5%;">
<a class="job-company" href="company_detail.php?empid=<?php echo $get_empid; ?>"><?php echo $get_empname;?></a>
</div>
</div>


<div class="col-sm-12 padleft padright" style="margin-top:1%;">
<span class="job-loc" style="margin-left:22px;"><i class="fa fa-map-marker"></i>&nbsp;&nbsp;<?php echo $get_location; ?></span>
</div>
<div class="col-sm-12 padleft padright" style="margin-top:1%;">
<span class="job-desc pull-left"><?php $strip_desc =  strip_tags($get_description); echo $sub_desc = substr($strip_desc,0,200) ; ?></span>
</div>
</div>




                            <?php		
									
							} 
				}
				?>			
                
			<?php	} else { ?>
			<div class="alert alert-danger" role="alert">
  				<a href="#" class="alert-link text-center"><i class="fa fa-exclamation-triangle"></i>&nbsp;No applied jobs</a>
			</div>		
				
			<?php	}  ?> 
            </div>
            <div class="modal-footer">
               
                <button type="button" class="btn btn-danger pull-right col-sm-3" data-dismiss="modal">Close</button>
            </div>
        </div>
        <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
</div>
<!-- /.modal -->