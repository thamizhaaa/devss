<?php
error_reporting(0);
session_start();
include("includes/config.php");
//$username = $_SESSION["user_name"];
//$user_email = $_SESSION['user_email']; 
//$user_id = $_SESSION['user_id'];

$oper = $_REQUEST['op'];

if($oper =='editstate')
{

	$stateid = $_REQUEST['getstateid'];
	$fetchstateid = "select ts.fld_id,tc.fld_name as country_name,ts.fld_name as state_name from tbl_states ts join tbl_countries tc on ts.fld_country_id = tc.fld_id  where ts.fld_id=$stateid";
//        echo "select ts.fld_id as country_id,tc.fld_name as country_name,ts.fld_name as state_name from tbl_states ts join tbl_countries tc on ts.fld_country_id = tc.fld_id  where ts.fld_id=$stateid";
	$fetchstateidsql = mysql_query($fetchstateid);	
	$row=mysql_fetch_array($fetchstateidsql);	
		$id = $row['fld_id'];
		$state_name = $row['state_name'];
                $country_name = $row['country_name'];
                $country_id = $row['country_id'];
		
             
	    echo '<div class="modal-dialog modal-md" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                        <h4 class="modal-title" id="myModalLabel">Edit/Update State Details</h4>
                    </div>
                    <div class="modal-body">     
                        <form role="form" class="form-horizontal" autocomplete="off">
                        
                        
                       	
                        <div class="col-md-12 col-sm-12 col-xs-12">
                            <div class="form-group">
                               <label class="col-sm-6">Country name <span class="required"></span></label>
                                <div class="col-sm-6">

                                
<input class="flexdatalist country_allresults_edit" data-data="country.json" data-search-in="country" data-selection-required="true" data-value-property="country" data-text-property="{country}" data-min-length="0" name="country" id="country_id" placeholder="Enter The country name"  type="text"  value="'.$country_name.'">
<input type="hidden" value="" id="country_id" name="country_id" >
<span class="err_txt help-block" id="err3" style="display:none;">This field is required</span>
</div>
                            </div>
                        </div>

                        <div class="col-md-12 col-sm-12 col-xs-12">
                            <div class="form-group">
                               <label class="col-sm-6">State name<span class="required"></span></label>
                                <div class="col-sm-6">
                               <input id="statename" placeholder="Enter the state name" class="form-control" type="text" value="'.$state_name.'">
                                   <span class="err_txt help-block" id="err4" style="display:none;">This field is required</span>
                                </div>
                            </div>
                            </div>
                            

                                                  
                    </form>
                    </div>
            <div class="modal-footer">
            <input id="edit_state"  type="button" class="btn btn-success" value ="Save"> 
            </div>                    
                </div>
				</div>';
}
?>
<link href="../scripts/ddl/jquery.flexdatalist.css" rel="stylesheet" type="text/css">
<link href="../scripts/ddl/jquery.flexdatalist.min.css" rel="stylesheet" type="text/css">
<script src="../scripts/ddl/jquery.flexdatalist.min.js"></script>
<script src="../scripts/ddl/jquery.flexdatalist.js"></script>

<script>
 $('.country_allresults_edit').flexdatalist({
     minLength: 0,
     valueProperty: '*',
     selectionRequired: true, 
     textProperty: '{country}',
     searchIn: 'country',
     data: 'country.json'
});

</script>

<script>
    $('#edit_state').click(function(){  
//    var country = $("#country_id").val();
    var country = $(".country_allresults_edit").val();
                       if(country == "" ){
                           $('#err3').show();
                           $('#err3').fadeOut(3000);
                }
    
   var state = $("#statename").val();
                       if(state == "" ){
                           $('#err4').show();
                           $('#err4').fadeOut(3000);
                }
    
    
    
    if(country != '' && state !=''  ){
    
    
//function fn_state(cityid)
//{
//alert(id);
var countryname = $("#country_id").val();
var statename = $("#statename").val();
var cityid = '<?php echo $stateid; ?> '; 


// var ckeditor_description = CKEDITOR.instances['description'].getData();
//var description = $(ckeditor_description).text();
var dataString = '&statename='+ statename + '&countryname='+countryname+'&state_id='+cityid;
//alert(dataString);

$.ajax({
type: "POST",
url: "edit_state.php",
data: dataString,
cache: false,
success: function(result){
    var result1=$.trim(result);
    
       
    alert("Updated Successfully");

    location.reload();
   //alert(result);

}
});

return false;


//}
    }
    });

  
$('.country_allresults_edit').change(function () {
   
                    var value = $(this).val();
            
                    var items = [];

                              $.getJSON('country.json',function(data){
                        var data_length = Object.keys(data).length;
                                for(var j=0; j < data_length ; j++){
                                    if (data[j].country == value) {
                                      items.push(data[j].id);
                            }
                          }
                        var country_id = items.join(",");
                   
                        $('#country_id').val(country_id);
                    
                    $.ajax({
                        type: "POST",
                        url: "ajaxdel.php?op=addstate",
                        data: ({country_id: country_id}),
                        success: function (data) {
                         
                            $("#state").html(data);
                        }
                    });
                    });
//                             });
                });
</script>